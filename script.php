#!/usr/bin/php
<?php
$maps = array("Animuson/maps/Nebraska-5.0.2.aamap.xml", "Lover-Boy/racing/Chain_of_Destruction-1.0.0.aamap.xml", "Lover-Boy/Advanced/Racing/Zeltrus-1.0.2.aamap.xml", "Lover-Boy/Advanced/Racing/Stereo-1.0.0.aamap.xml", "Blaze/maps/Jester-5.0.1.aamap.xml", "Hoop/maps/Colombo-5.0.4.aamap.xml", "Animuson/maps/A_Quick_Explosion-5.0.0.aamap.xml", "Animuson/maps/Square_Root-5.0.0.aamap.xml", "VOV/maps/Robot-5.0.0.aamap.xml", "Hoop/maps/Mario-5.0.0.aamap.xml", "Lover-Boy/Advanced/Racing/Maletrus-1.0.1.aamap.xml", "Lover-Boy/racing/SwordHandle-1.0.0.aamap.xml", "Lover-Boy/racing/Termitrators-1.0.0.aamap.xml", "VOV/maps/Evil-5.0.0.aamap.xml", "Eristan/maps/Nopo-5.0.0.aamap.xml", "Animuson/maps/Dont_Flinch-5.0.0.aamap.xml", "Lover-Boy/Advanced/Racing/Mini_XYBlaster-1.0.2.aamap.xml", "Lover-Boy/Advanced/Racing/Confusion-0.0.1.aamap.xml", "MrO/maps/Shopping_Mall-5.0.0.aamap.xml", "LoverBoy/maps/Organius-5.0.4.aamap.xml", "Durf/maps/Chica-4.0.2.aamap.xml", "Animuson/maps/Benign_Revolution-5.0.0.aamap.xml", "TestSubject/maps/Pothead-0.2.aamap.xml", "Lover-Boy/Advanced/Racing/Optional_Prism-1.0.1.aamap.xml", "Lover-Boy/Advanced/Racing/Rare_Candy-1.0.1.aamap.xml", "Lover-Boy/Advanced/Racing/Strangler-1.0.1.aamap.xml", "DarkChaos/maps/Three-5.0.1.aamap.xml", "Eristan/maps/English-5.0.0.aamap.xml", "Lover-Boy/Advanced/Racing/Highliter-1.0.2.aamap.xml", "Durf/maps/Tunnels-4.0.0.aamap.xml", "Lover-Boy/Advanced/Racing/Triapazointal-0.0.1.aamap.xml", "Smoothice/maps/Insanity-5.0.0.aamap.xml", "Lover-Boy/Advanced/Racing/Long_Nose-1.0.1.aamap.xml", "Slash/maps/Small-5.0.4.aamap.xml", "Animuson/maps/Movin_On_Up-5.0.0.aamap.xml", "Lover-Boy/Advanced/Racing/Cuppas-1.0.2.aamap.xml", "DarkChaos/maps/Six-5.0.0.aamap.xml", "Durf/maps/WhichWay-4.0.0.aamap.xml", "Lover-Boy/Advanced/Racing/Maxtram-1.0.1.aamap.xml", "Smart/maps/PentaGone2Death-4.0.1.aamap.xml", "Smart/maps/BigCityNights-5.0.2.aamap.xml", "Hoop/maps/Verta-5.0.5.aamap.xml", "Lover-Boy/Advanced/Racing/Tempest-0.0.1.aamap.xml", "VOV/maps/Mission_Impossible-5.0.1.aamap.xml", "Eristan/maps/ILoveYou-5.1.0.aamap.xml", "PuffyFluff/maps/CandyBar-5.0.0.aamap.xml", "Lover-Boy/Advanced/Racing/Racket-1.0.1.aamap.xml", "Lover-Boy/racing/Nostalgic-1.0.0.aamap.xml", "Lover-Boy/Advanced/Racing/Hand_of_Glory-1.0.1.aamap.xml", "Lover-Boy/Advanced/Racing/Heart_Scale-1.0.1.aamap.xml", "Lover-Boy/Advanced/Racing/Glass-0.0.1.aamap.xml", "Lover-Boy/Advanced/Racing/Recta_Fire-1.0.1.aamap.xml", "Lover-Boy/Advanced/Racing/Small_Disastor-1.0.1.aamap.xml", "VOV/maps/Insane-5.0.1.aamap.xml", "Blaze/maps/Illusion-5.0.0.aamap.xml", "Soapy/maps/The_Bathtub-5.1.0.aamap.xml", "TestSubject/maps/Unbelieveble-0.2.aamap.xml", "Lover-Boy/Advanced/Racing/Zel_Trex-1.0.1.aamap.xml", "Smoothice/maps/Around_and_Around-5.0.1.aamap.xml", "VOV/maps/Zone_4-5.0.0.aamap.xml", "VOV/maps/Xploder_Pro-5.0.2.aamap.xml", "Lover-Boy/Advanced/Racing/Polar_Pointer-1.0.0.aamap.xml", "VOV/maps/InsanitysBrother-5.0.0.aamap.xml", "Lover-Boy/racing/RocketFire-1.0.0.aamap.xml", "Lover-Boy/racing/Fantasium-1.0.0.aamap.xml", "INW/maps/Around_The_Horn-5.0.0.aamap.xml", "Lover-Boy/Advanced/Racing/Vortex-0.0.1.aamap.xml", "Lover-Boy/Advanced/Racing/Start_And_Ignite-1.0.1.aamap.xml", "Lover-Boy/Advanced/Racing/Puzzle-0.0.1.aamap.xml", "VOV/maps/Minefield-5.1.0.aamap.xml", "Lover-Boy/racing/Dizzy-1.0.0.aamap.xml", "Lover-Boy/Advanced/Racing/Steelux-0.0.1.aamap.xml", "Blaze/maps/Road_Less_Traveled-5.0.0.aamap.xml", "Lover-Boy/Advanced/Racing/Cargo-1.0.0.aamap.xml", "Lover-Boy/racing/Destroyer-1.0.0.aamap.xml", "Lover-Boy/racing/BlastOff-1.0.0.aamap.xml", "Durf/maps/Butterfly-4.0.0.aamap.xml", "TestSubject/maps/DeathStar-0.2.aamap.xml", "INW/maps/Tanners_Big_Tron_Daddy-5.0.3.aamap.xml", "Lover-Boy/racing/MegaPlane-1.0.0.aamap.xml", "Lover-Boy/Advanced/Racing/Resistrator-1.0.1.aamap.xml", "Lover-Boy/Advanced/Racing/Puzzler-1.0.2.aamap.xml", "StyX/racing/River_of_Death-0.0.1.aamap.xml", "Animuson/maps/Point_Of_No_Return-5.0.0.aamap.xml", "Lover-Boy/Advanced/Racing/Martin_Boxer-1.0.3.aamap.xml", "Durf/maps/Batman-4.0.0.aamap.xml", "Lover-Boy/Advanced/Racing/Moon_Crystal-1.0.1.aamap.xml", "Lover-Boy/racing/SpaceCraft-1.0.0.aamap.xml", "Durf/maps/epo-4.0.0.aamap.xml", "Lover-Boy/Advanced/Racing/Dream_Buster-1.0.0.aamap.xml", "Lover-Boy/Advanced/Racing/Bandage-1.0.1.aamap.xml", "Animuson/maps/Death_Octagon-5.1.0.aamap.xml", "Lover-Boy/racing/Chain_of_Chaos-1.0.0.aamap.xml", "Lover-Boy/Advanced/Racing/Digimon-0.0.1.aamap.xml", "Lover-Boy/Advanced/Racing/Catcher-1.0.0.aamap.xml", "Animuson/maps/Frizzle_Fraz-5.0.1.aamap.xml", "Lover-Boy/Advanced/Racing/TriStand-1.0.0.aamap.xml", "Smart/maps/Default-5.1.1.aamap.xml", "Lover-Boy/Advanced/Racing/Hand_of_Blood-1.0.2.aamap.xml", "Lover-Boy/Advanced/Racing/Multitude-0.0.1.aamap.xml");
$map_counter = 0;
$map_previous = 0;
$map_progress = 0;

$map    = "";   //  name of the current map
$map_id = "";   //  the hash format of the current map + .txt
$game_time = 0; //  the current game time

//  set the race start and finish time to week
$race_start_time  = strtotime("+1 week");
$race_finish_time = strtotime("+2 week");

$race_work  = false; //  flag to get the race going
$race_pause = false; //  flag to pause the race
$race_done  = false; //  flag for when race is complete

$first = true;      //  flag to indicate first player entered
$first_player = ""; //  the name of the first player
$first_time = 0;    //  the finished time of the first player
$finish_place = 0;  //  rank counter for each entered player

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

    //  ROUND_COMMENCING [current_round] [total_rounds]
    if ($part[0] == "ROUND_COMMENCING")
    {
        //  time for the race to start
        if ((time() >= $race_start_time) && !$race_work &&!$race_done)
        {
            echo "START_NEW_MATCH\n";
            echo "KILL_ALL\n";
            echo "COLLAPSE_ALL\n";
            echo "ROUND_WAIT 0\n";

            $map_counter = 0;   //  reset map counter for fresh start
            $map_progress = 0;

            if (isset($records[$map_id]))
                unset($records[$map_id]);
            $records[$map_id] = array();

            $race_work = true;
            $race_done = false;
            $race_pause = false;
            con("0xffff00> 0xRESETTThe race will begin from next match.");
        }

        //  time for the race to finish
        if ((time() >= $race_finish_time) && $race_work && !$race_done)
        {
            $race_work = false;
            $race_done = true;
            $race_pause = false;

            con("0xffff00> 0xRESETTThe race is now finished.");
        }

        echo "CLEAR_LADDERLOG\n";
        echo "ROUND_WAIT 1\n";

        if ($map_counter == count($maps))
        {
            $map_counter = 0;
        }
        else
        {
            //  store the current progress of the map rotation for the race
            if ($race_work && !$race_done && !$race_pause)
            {
                $map_progress = $map_counter;
            }
        }
        echo "MAP_FILE ".trim($maps[$map_previous = $map_counter++])."\n";

        SaveMapRecords($map_id, $records[$map_id]);

        echo "WAIT_FOR_EXTERNAL_SCRIPT 0\n";
        sleep(2);
        echo "WAIT_FOR_EXTERNAL_SCRIPT 1\n";
    }
    //  ROUND_STARTED [time]
    elseif ($part[0] == "ROUND_STARTED")
    {
        if (isset($records[$map_id]) && (count($records[$map_id]) > 0))
        {
            con("0xcccc00Top ranks of racers:");

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
    //  CURRENT_MAP [factor] [multi] [MAP_FILE]
    elseif ($part[0] == "CURRENT_MAP")
    {
        //  fetch the map name from the 3rd part (if contains spaces)
        $map = trim(BridgeParts($part, 3));

        /*
         * This process is to ensure to get the MAP_FILE only and not the appended MAP_URI like in the example:
         * Your_mom/clever/ctfsty-0.0.2.aamap.xml(http://maps.ix.ihptru.net/Your_mom/clever/ctfsty-0.0.2.aamap.xml)
         * The only needed information is the actual MAP_FILE: Your_mom/clever/ctfsty-0.0.2.aamap.xml
         */
        if (false !== ($pos = strpos($map, "(")))
            $map = substr($map, 0, $pos);

        $map_ext = explode("-", basename($map));
        con("0xffff00> 0xRESETTLoaded map: 0x00ccff".$map_ext[0]);

        $map_id = md5($map.".txt");

        $current_map_id = md5($maps[$map_previous].".txt");
        if ($current_map_id != $map_id)
            con("0xffff00> 0xff9999Loaded map 0xcccc00".$map." 0xff9999instead of 0xcccc00".$maps[$map_previous]."0xff9999.");

        $first = true;
        $finish_place = 0;

        $timer_active  = false;
        $timer_counter = -1;

        //  reset the cycles list
        unset($cycles);
        $cycles = array();
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
        if (($humans_alive == 1) && ((($ais_alive == 0) && ($humans > 1)) || ($race_work && !$race_done)) && !$timer_active)
        {
            $timer_active = true;
        }
        //  if all humans are dead, deactivate the timer and collapse all zones
        elseif ($humans_alive == 0)
        {
            $timer_active = false;
            echo "ROUND_WAIT 0\n";
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
            cen("0xff7777".$timer_counter."                    ");

            if ($timer_counter == 0)
            {
                $timer_active = false;
                echo "KILL_ALL\n";
                echo "COLLAPSE_ALL\n";
            }
        }
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
                    pm($part[1], "0xffff00> 0xff9999Idle Warning: 0xRESETTHold down your brake button (v) key to go faster.");
                    $cycles[$p_id][2] = $game_time + $idle_delay;
                    $cycles[$p_id][3] += 1;
                }
                else
                {
                    //  if the player is already actively idle, kill them
                    if ($cycles[$p_id][1])
                    {
                        echo "KILL ".$part[1]."\n";
                        con("0xffff00> 0xRESETT".$part[1]." is killed for idling around!");
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
        $finish_place++;

        $racer_time_changed = false;
        $racer_old_time = 0;
        $racer_old_rank = 0;
        $new_racer = false;

        //  if the player already exists within the records
        if ($found)
        {
            //  if their current time is better than their first race
            if ($records[$map_id][$found_id][1] < $time)
            {
                $racer_time_changed = true;
                $racer_old_time = $records[$map_id][$found_id][1];
                $racer_old_rank = $found_id + 1;

                //  update the time
                $records[$map_id][$found_id][1] = $time;
            }

            //  increase the times finished counter
            $records[$map_id][$found_id][2] += 1;
        }
        else
        {
            //  if the records don't exist yet, create it!
            if (!isset($records[$map_id]))
                $records[$map_id] = array();

            //                          user, time, times_finished, can_save?
            $records[$map_id][] = array($user, $time, 1,            $race_work);

            $new_racer = true;
        }

        //  sort the ranks by their times (shortest to longest)
        usort($records[$map_id], "CompareRecords");

        if ($racer_time_changed)
        {
            //  check if the sorting chose this player as the best (rank 1)
            if ($records[$map_id][0][0] == $user)
            {
                $map_ext = explode("-", basename($map));
                con("0xffff00*0x88ff22*0x00ccff*0xff3300* 0xffcc55Congratulations 0x00ccff".$user."0xffcc55! They now hold the best time for 0x55cc99".$map_ext[0]."0xffcc55! 0xff3300*0x00ccff*0x88ff22*0xffff00*");
            }
            else
            {
                //  check for user existence in the records and their id
                for ($r_id = 0; $r_id < count($records[$map_id]); $r_id++)
                {
                    if ($records[$map_id][$r_id][0] == $user)
                    {
                        if ($new_racer)
                        {
                            con("0xff8800".$finish_place.") 0x55cc99".$user." 0x44ccfffinished in 0xaacc88".$time."s 0x44ccffand is placed in rank 0xcccccc".($r_id + 1)."0x44ccff.");
                        }
                        else
                        {
                            con("0xff8800".$finish_place.") 0x55cc99".$user." 0x44ccfffinished in 0xaacc88".$time."s 0xcccc7c(0xcccc34".($time - $racer_old_time)."s faster 0xcccc7c) 0x44ccffand ".(($racer_old_rank == $r_id + 1) ? "stayed at" : "rose to")." rank 0xcccccc".($r_id + 1)."0x44ccff.");
                        }
                        break;
                    }
                }
            }
        }
        else
        {
            con("0xff8800".$finish_place.") 0x55cc99".$user." 0x44ccfffinished in 0xaacc88".$time."s 0xcccc7c(0xccff88".($time - $racer_old_time)."s slower 0xcccc7c) 0x44ccffand stayed at rank 0xcccccc".($found_id + 1)."0x44ccff.");
        }

        //  if the user is the first to finish
        if ($first)
        {
            $first = false;
            $first_player = $user;
            $first_time = $time;

            //  start the timer if more than one human is alive
            if ($humans_alive > 1)
                $timer_active = true;
        }
    }
    //  INVALID_COMMAND [command] [player_username] [ip_address] [access_level] [params] ...
    elseif ($part[0] == "INVALID_COMMAND")
    {
        if ($part[4] <= 1)  //  allow only officers and lower level users
        {
            //  Let's pause the race if it isn't done
            if ($part[1] == "/pause")
            {
                if ($race_done)
                {
                    pm($part[2], "Can't pause the race when it's done.");
                    continue;
                }

                if ($race_pause)
                {
                    pm($part[2], "The race is already paused.");
                    continue;
                }
                elseif (!$race_work)
                {
                    pm($part[2], "The race is needs to be active to pause it.");
                    continue;
                }

                $race_work = false;
                $race_done = false;
                $race_pause = true;
                con("0xffff00> 0xRESETTThe race is now paused.");
            }
            //  Let's resume the race if it isn't done
            elseif ($part[1] == "/resume")
            {
                if ($race_done)
                {
                    pm($part[2], "Can't resume the race when it's done.");
                    continue;
                }

                if (!$race_pause)
                {
                    pm($part[2], "The race is already in-progress.");
                    continue;
                }

                $race_work = true;
                $race_done = false;
                $race_pause = false;

                $map_counter = $map_progress;

                con("0xffff00> 0xRESETTThe race will now resume.");
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
                $race_pause = false;

                $map_counter = 0;
                $map_progress = 0;

                $first = true;
                $rank = 0;

                $timer_active  = false;
                $timer_counter = -1;

                echo "ROUND_WAIT 0\n";
                echo "KILL_ALL\n";
                echo "COLLAPSE_ALL\n";

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

                con("0xffff00> 0xRESETTThe race is now reset for a fresh start.");
            }
            else echo "CUSTOM_PLAYER_MESSAGE ".$part[2]." chat_command_unknown ".$part[1]."\n";
        }
        else pm($part[2], 'You do not have the required access level to access "'.$part[1].'"');
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

                    pm($records[$map_id][$a][0], "0x0099ffYour relative position:");

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

function CompareRecords($a, $b)
{
    if ($a[1] == $b[1])
        return 0;
    else
        return ($a[1] < $b[1]) ? -1 : 1;
}

function SaveRecords($map_id = null)
{
    global $maps, $records;

    if (isset($map_id) && isset($records[$map_id]))
    {
        SaveMapRecords($map_id, $records[$map_id]);
    }
    else
    {
        if (count($records) > 0)
        {
            foreach ($records as $map)
                SaveMapRecords($map, $records[$map]);
        }
    }
}

function SaveMapRecords($map_id, $records)
{
    global $maps;

    $map_file = "";
    foreach ($maps as $map)
        if (md5($map.".txt") == $map_id)
            $map_file = $map;
    con("0xffff00> 0xRESETTSaving records of ".$map_file." to file...");

    $f_res = fopen("./data/".$map_id.".txt", "w+");
    for ($r_id = 0; $r_id < count($records); $r_id++)
    {
        //  don't save records that aren't done during the race
        if (!$records[$r_id][3]) continue;

        //                  username               time                finished times
        fwrite($f_res, $records[$r_id][0]." ".$records[$r_id][1]." ".$records[$r_id][2]."\n");
    }
    fclose($f_res);
}
?>
