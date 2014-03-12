#!/usr/bin/php
<?php
$map    = "";   //  name of the current map
$map_id = "";   //  the hash format of the current map + .txt
$game_time = 0; //  the current game time

$race_work     = false; //  flag to get the race going
$race_done     = false; //  flag for when race is complete

$first = true;      //  flag to indicate first player entered
$first_player = ""; //  the name of the first player
$first_time = 0;    //  the finished time of the first player
$rank = 0;          //  rank counter for each entered player

$timer_active  = false; //  flag for running the delay timer
$timer_delay   = 100;   //  amount of seconds to delay before ending round (kill all players)
$timer_counter = -1;    //  counter for the delay (-ve)

$idle_speed = 25;   //  idle speed of players
$idle_delay = 5;    //  the delay between idle kill activation
$idle_warnings = 1; //  number of warnings to send to player about their idle status

$records = array();  //  records holder by map and the order in which the players entered
$cycles  = array();  //  list of cycles active on the grid

$humans       = 0;
$ais          = 0;
$humans_alive = 0;
$ais_alive    = 0;

while (!feof(STDIN))
{
    $line = rtrim(fgets(STDIN, 1024));
    $part = explode(" ", $line);

    //  no need to process script when the line has useless information
    if ((count($part) == 0) || (count($part) == 1)) continue;

    //  ROUND_STARTED [time]
    if ($part[0] == "ROUND_STARTED")
    {
        if (isset($records[$map_id]))
        {
            for($a = 0; $a < 3; $a++)
            {
                if (isset($records[$map_id][$a]))
                {
                    con("0xff8800".($a + 1)."0xRESETT) 0x0099ff".$records[$map_id][$a][1]." 0xffff7f- 0x88ff22".$records[$map_id][$a][0]);
                    usleep(200000);
                }
            }
        }
    }
    //  CURRENT_MAP [factor] [multiplier] [MAP_FILE]
    elseif ($part[0] == "CURRENT_MAP")
    {
        //  very handy to clear ladderlog since it does get big in a round
        echo "CLEAR_LADDERLOG\n";

        //  fetch the map name from the 3rd part (if contains spaces)
        $map = BridgeParts($part, 3);

        /*
         * This process is to ensure to get the MAP_FILE only and not the appended MAP_URI like in the example:
         * Your_mom/clever/ctfsty-0.0.2.aamap.xml(http://maps.ix.ihptru.net/Your_mom/clever/ctfsty-0.0.2.aamap.xml)
         * The only needed information is the actual MAP_FILE: Your_mom/clever/ctfsty-0.0.2.aamap.xml
         */
        if (false !== ($pos = strpos($map, "(")))
            $map = substr($map, 0, $pos);

        $map_id = md5($map.".txt");
        if ($race_work && !$race_done)
        {
            //  reset records for new entries
            if (isset($records[$map_id]))
                unset($records[$map_id]);
            $records[$map_id] = array();

            //  reset the file for fresh entries
            $file = fopen("./data/".$map_id.".txt", "w+");
            ftruncate($file, 0);
            fclose($file);

            $map_ext = explode("-", basename($map));
            con("0x8811ff> 0xRESETTLoaded map: 0x00ccff".$map_ext[0]);
        }

        $first = true;
        $rank = 0;

        $timer_active  = false;
        $timer_counter = -1;

        //  reset the cycles list
        unset($cycles);
        $cycles = array();
    }
    //  CYCLE_CREATED [auth_name] [posx] [poxy] [dirx] [diry] [team_name] [time]
    elseif ($part[0] == "CYCLE_CREATED")
    {
        //                            speed, idle,  next_time, warnings
        $cycles[md5($part[1])] = array(15,   false, 0,         0);
    }
    //  CYCLE_DESTROYED [auth_name] [posx] [posy] [dirx] [diry] [team_name] [time]
    elseif ($part[0] == "CYCLE_DESTROYED")
    {
        $p_id = md5($part[1]);
        if (isset($cycles[$p_id]))
            unset($cycles[$p_id]);
    }
    //  PLAYER_GRIDPOS [player_username] [pos_x] [pos_y] [dir_x] [dir_y] [cycle_speed] [player_rubber] [cycle_rubber] [team]
    elseif ($part[0] == "PLAYER_GRIDPOS")
    {
        $p_id = md5($part[1]);

        //  do not function if the script doesn't recognise the player is alive (even if on grid)
        if (!isset($cycles[$p_id])) continue;

        //  store the speed currently travelling by the user
        $cycles[$p_id][0] = floatval($part[6]);

        //  do idle kill
        if ($cycles[$p_id][0] <= $idle_speed)
        {
            if ($cycles[$p_id][2] == 0)
                $cycles[$p_id][2] = $game_time + $idle_delay;

            //  if the game time approached the delayed time
            if ($game_time >= $cycles[$p_id][2])
            {
                //  if the player needs warnings
                if ($cycles[$p_id][3] < $idle_warnings)
                {
                    //  send the warnings and count it up
                    pm($part[2], "0x8811ff> 0xff9999Idle Warning: 0xRESETTHold down your brake button (v) key to go faster.");
                    $cycles[$p_id][2] = $game_time + $idle_delay;
                    $cycles[$p_id][3] += 1;
                    continue;
                }

                //  if the player is already actively idle, kill them
                if ($cycles[$p_id][1])
                {
                    echo "KILL ".$part[1]."\n";
                    con("0x8811ff> 0xRESETT".$part[1]." is killed for idling around!");
                    unset($cycles[$p_id]);
                }
                else
                {
                    //  make them actively idle
                    $cycles[$p_id][1] = true;
                    $cycles[$p_id][2] = $game_time + $idle_delay;
                }
            }
        }
        else
        {
            //  when they are not idle, disable the idle and warnings
            $cycles[$p_id][1] = false;
            $cycles[$p_id][2] = 0;
            $cycles[$p_id][3] = 0;
        }
    }
    //  TARGETZONE_PLAYER_ENTER <object_id> <zone_name> <cx> <cy> <player> <x> <y> <xdir> <ydir> <time>
    //  WINZONE_PLAYER_ENTER <object id> <zone_name> <cx> <cy> <player> <x> <y> <xdir> <ydir> <time>
    elseif (($part[0] == "TARGETZONE_PLAYER_ENTER") || ($part[0] == "WINZONE_PLAYER_ENTER"))
    {
        $user = $part[5];
        $p_id = md5($user);
        $time = floatval(trim($part[10]));

        //  do not function if the script doesn't recognise the player is alive (even if on grid)
        if (!isset($cycles[$p_id])) continue;

        $found = false;
        $found_id = 0;
        if (isset($records[$map_id]))
        {
            //  check for user existence in the records and their id
            for ($r_id = 0; $r_id < count($records[$map_id]); $r_id++)
            {
                if ($records[$map_id][$r_id][0] == $user)
                {
                    $found = true;
                    $found_id = $r_id;
                    break;
                }
            }
        }

        //  kill the user since they finished the race
        echo "KILL ".$user."\n";
        unset($cycles[$p_id]);

        //  increase the rank of entry. Default: 0. So increase by 1 each time.
        $rank++;

        //  if the user is the first to finish
        if ($first)
        {
            con($rank.") 0x9955ff".$user." 0xffff44finished in 0x88ff33".$time." seconds0xffff44.");

            $first = false;
            $first_player = $user;
            $first_time = $time;

            //  start the timer
            $timer_active = true;
        }
        //  if the user is to finish after the FIRST player has
        else
            con($rank.") 0x9955ff".$user." 0xffff44finished in 0x88ff33".$time." seconds 0x92aba0(0x00aa11".($time - $first_time)." 0xffaa00seconds behind 0xff77ff".$first_player." 0x92aba0).");

        //  if the player already exists within the records
        if ($found)
        {
            //  if their current time is better than their first race
            if ($records[$map_id][$found_id][1] < $time)
            {
                //  tell the player how much faster they were
                pm($user, " 0x00ccffYou are ".($time - $records[$map_id][$found_id][1])."s faster from your first race.");
            }
            //  if their current time is worse than their first race
            elseif ($records[$map_id][$found_id][1] > $time)
            {
                //  tell the player how much slower they were
                pm($user, " 0x00ccffYou are ".($time - $records[$map_id][$found_id][1])."s slower from your first race.");
            }
        }
        else
        {
            //  if the records don't exist yet, create it!
            if (!isset($records[$map_id]))
                $records[$map_id] = array();

            //  add the player's user and time into the map record (finish based)
            $records[$map_id][] = array($user, $time);

            //  if the race is working and not done yet, append their name and time to the file
            if ($race_work && !$race_done)
            {
                file_put_contents("./data/".$map_id.".txt", $user." ".$time."\n", FILE_APPEND);
            }
        }

        //  sort the ranks by their times (shortest to longest)
        sort($records[$map_id]);
    }
    //  INVALID_COMMAND [command] [player_username] [ip_address] [access_level] [params] ...
    elseif ($part[0] == "INVALID_COMMAND")
    {
        if ($part[4] <= 1)  //  allow only officers and lower level users
        {
            //  Let's start the race if it isn't done
            if ($part[1] == "/start")
            {
                if ($race_done)
                {
                    pm($part[2], "Can't start the race when it's done.");
                    continue;
                }

                if ($race_work)
                {
                    pm($part[2], "The race is already active.");
                    continue;
                }

                echo "START_NEW_MATCH\n";
                echo "KILL_ALL\n";
                echo "COLLAPSE_ALL\n";
                echo "RESET_ROTATION\n";

                $race_work = true;
                $race_done = false;
                con("0x8811ff> 0xRESETTThe race will begin from next match.");
            }
            //  Let's stop the race if it isn't done
            elseif ($part[1] == "/stop")
            {
                if ($race_done)
                {
                    pm($part[2], "Can't stop the race when it's done.");
                    continue;
                }

                if (!$race_work)
                {
                    pm($part[2], "The race is already inactive.");
                    continue;
                }

                $race_work = false;
                $race_done = false;
                con("0x8811ff> 0xRESETTThe race will now stop.");
            }
            //  Let's end the race so it's done
            elseif ($part[1] == "/end")
            {
                if ($race_done)
                {
                    pm($part[2], "Can't end the race when it's done.");
                    continue;
                }

                if (!$race_work)
                {
                    pm($part[2], "The race is inactive to end it.");
                    continue;
                }

                $race_work = false;
                $race_done = true;
                con("0x8811ff> 0xRESETTThe race is now done.");
            }
            //  Let's reset the race for fresh start
            elseif ($part[1] == "/reset")
            {
                if ($race_done)
                {
                    $choice = strtolower(trim(@$part[5]));
                    if ($choice == "")
                    {
                        pm($part[2], "Do you still want to reset since the race is done?");
                        continue;
                    }
                    elseif (($choice == "y") || ($choice == "yes"))
                    {
                        pm($part[2], "Fine. The script will reset the race now.");
                    }
                    else
                    {
                        pm($part[2], "The race will not reset.");
                        continue;
                    }
                }

                $race_work = false;
                $race_done = false;

                $first = true;
                $rank = 0;

                $timer_active  = false;
                $timer_counter = -1;

                //  reset the lists
                unset($cycles);
                unset($records);
                $cycles = array();
                $records = array();

                //  remove all the possible files created in the data directory
                $files = scandir("./data");
                if (($files !== false) && (count($files) > 0))
                {
                    for($f_id = 0; $f_id < count($files); $f_id++)
                    {
                        if (is_file("./data/".$files[$f_id]))
                            unlink("./data/".$files[$f_id]);
                    }
                }

                con("0x8811ff> 0xRESETTThe race is now reset for a fresh start.");
            }
        }
        else pm($part[2], 'You do not have the required access level to access "'.$part[1].'"');
    }
    //  ONLINE_PLAYERS_COUNT <humans> <ais> <humans alive> <ai alive> <humans dead> <ai dead>
    elseif ($part[0] == "ONLINE_PLAYERS_COUNT")
    {
        $humans       = intval($part[1]);
        $ais          = intval($part[2]);
        $humans_alive = intval($part[3]);
        $ais_alive    = intval($part[4]);
        $humans_dead  = intval($part[5]);
        $ais_dead     = intval($part[6]);

        //  if only one human is alive, then activate the timer
        if (($humans_alive == 1) && ($humans_dead > 0) && !$timer_active)
        {
            $timer_active = true;
        }
        //  if all humans are dead, deactivate the timer and collapse all zones
        elseif ($humans_alive == 0)
        {
            $timer_active = false;
            echo "COLLAPSE_ALL\n";
        }
    }
    //  GAME_TIME <time> (see also: GAME_TIME_INTERVAL)
    elseif ($part[0] == "GAME_TIME")
    {
        $game_time = floatval(trim($part[1]));

        if ($timer_active)
        {
            if ($timer_counter == -1)
                $timer_counter = $timer_delay + 1;

            $timer_counter--;
            cen($timer_counter."                    ");

            if ($timer_counter == 0)
            {
                $timer_active = false;
                echo "KILL_ALL\n";
                echo "COLLAPSE_ALL\n";
            }
        }
    }
    //  ROUND_FINISHED [time]
    if ($part[0] == "ROUND_FINISHED")
    {
        if (isset($records[$map_id]))
        {
            for($a = 0; $a < 3; $a++)
            {
                if (isset($records[$map_id][$a]))
                {
                    $prev_index = $a - 1;
                    $next_index = $a + 1;

                    //  show the previous rank (if it exists)
                    if (isset($records[$map_id][$prev_index]))
                    {
                        pm($records[$map_id][$a][0], "0x8800ff".($prev_index + 1)."0xRESETT) 0xff5555".$records[$map_id][$prev_index][1]." 0xffff7f- 0x88ff22".$records[$map_id][$prev_index][0]);
                        usleep(200000);
                    }

                    //  show the current rank
                    pm($records[$map_id][$a][0], "0x00ffff".($a + 1)."0xRESETT) 0xff44ff".$records[$map_id][$a][1]." 0xffff7f- 0xffdd00".$records[$map_id][$a][0]);
                    usleep(200000);

                    //  show the next rank (if it exists)
                    if (isset($records[$map_id][$next_index]))
                    {
                        pm($records[$map_id][$a][0], "0x8800ff".($next_index + 1)."0xRESETT) 0xff5555".$records[$map_id][$next_index][1]." 0xffff7f- 0x88ff22".$records[$map_id][$next_index][0]);
                        usleep(200000);
                    }
                }
            }
        }
    }
}

function con($msg)
{
    echo "CONSOLE_MESSAGE ".$msg."\n";
}

function cen($msg)
{
    echo "CENTER_MESSAGE ".$msg."\n";
}

function pm($user, $msg)
{
    echo "PLAYER_MESSAGE ".$user.' "'.addslashes($msg).'"'."\n";
}

function BridgeParts($parts, $x, $separator = " ", $end_with = "")
{
    $ret = "";

    for(; $x < count($parts); $x++)
    {
        if (($x + 1) == count($parts))
            $ret .= $parts[$x].$end_with;
        else
            $ret .= $parts[$x].$separator;
    }

    return $ret;
}
?>
