<?php

    //Add all the required files, make sure you have the right order!
    require_once("inc/config.inc.php");
    require_once("inc/player.inc.php");
    require_once("inc/monster.inc.php");
    require_once("inc/logic.inc.php");

    //Variable to hold the current monster
    $currentMonster;

    //Drop the user into the loop
    while(true)
    {
    //Make sure you have a current monster selected
        $currentMonster = getCurrentMonster();
            //Display the status
            echo "Would you like to (f)ight, (r)un or (q)uit?\n";
            $input = stream_get_line(STDIN, 1024, PHP_EOL);

            //Proccess the commands using a switch statement (we've done this before)
            switch($input)
            {
                //Fight
                case 'f':
                fight();
                break;

                //Run!
                case 'r':
                run();
                break;
                
                //Quit!
                case 'q':
                exit();
                break;
       

        //Do the right thing!
            }
    } 
 

?>