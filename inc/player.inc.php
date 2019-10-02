<?php

//This function applies the the damage sustained to a player and determines if they are dead.
function playerDamage($damage)
{
    //Make sure the appropriate variable is available.
    global $player;

        //Get the current health
        $playerHealth = $player["Anusha"];
    
        //Remove the damage from the player's health
        $playerHealth -= $damage;
        $player["Anusha"] = $playerHealth;

        //Check if the player is dead, exit the game
        if($playerHealth <= 0)
        {
            //If the player lost, display a message and exit.
            youLose();
            
        }
        // else
        // {
        //     //If the player won! display a message and exit.
        //     youWin();
            
        // }
}

    
//This function handles if the user tries to run, roll the dice and there is a 70% chance they can run, 
//if they can then add the dice roll back to their health, otherwise fight!
function run()
{
    //Make sure you can access the player
    global $player;
    $name = array_keys($player);

    //Roll the dice
    $outcome = rollDice();

    //70% percent chance to succeed
    if((($outcome/20)*100) <= RUN_PROBABILITY)
    {
        //Add the health back
        echo "You escaped, $name[0]. You gained $outcome health! \n";
        $player["Anusha"] += $outcome;
        displayStatus();
    }
    else
    {
        //If they didnt make it, fight!
        echo "You didn't make it $name[0], you have to fight.\n";
        fight();
    }

}

function youWin()
{
    global $player;
    $name = array_keys($player);
    echo "CONGRATULATIONS! $name[0], YOU WIN!\n"; 
    exit();
}
function youLose()
{
    global $player;
    $name = array_keys($player);
    echo "Sorry $name[0], you died.\n";
    exit(); 

}

?>
    
