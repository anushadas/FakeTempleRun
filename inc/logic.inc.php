 <?php


//This is the function to fight, it rolls the dice and determines
function fight()
{
    
    //Make sure the appropriate variables are accessible
    global $player;

    //roll the dice and save it to a variable
    $outcome = rollDice();
    /**
     * Roll the dice, if the percentage is greater than HIT_PROBABILITY 
     * then you hit (deice roll - 20) * 5 to determine hit points.
     */
    
    //Calculate the hit probabililty 50/50
    if((($outcome/20)*100) > HIT_PROBABILITY)
    {
        //Calculate the damage
        $damage = (20-$outcome) * 5;

        //Notify the user of how much damage they inflicted
        echo "Hit! Monster lost $damage health. \n";
        
        //Remove the damage from the current Monster
        monsterDamage($damage);
       
    }
    else
    {
    //otherwise the oponent hits
        //Calculate the damage the player inflicted
        $damage = (20-$outcome) * 5;
        
        //Notify the player they missed
        $name = array_keys($player);
        echo "You missed! $name[0], the monster countered with $damage.\n";

        //Remove the damaage from the player
        playerDamage($damage);

    }
    displayStatus();

}

//This function handles rolling the dice.  It returns an integer which represents the result of rolling the dice.
function rollDice() : int {
    //Return a dice roll between  and 20.
    return rand(1,20);
}

//This function displays the status of the player and the current monster
function displayStatus()    {
    
    //Make sure all the variables you need are in place.
    global $player;
    global $currentMonster;
    
    $name = key($player);
    $playerHealth = $player["Anusha"];
    $type = $currentMonster[0];
    $monsterHealth = $currentMonster[1];
    

    /**
     * Display should be as follows:
     * 
     * Player Stats: Name: Sam Health: 20
     * Monster Stats: Type: Beast Health: 15
     */
    echo "Player Stats: Name: $name Health: $playerHealth \n";
    echo "Monster Stats: Type: $type Health: $monsterHealth \n";
   

}


?>