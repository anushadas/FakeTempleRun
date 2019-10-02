<?php

 /* 
  * This function returns the current monster.
  * if there is no current monster one is chosen.  
  * If there are no more monsters and they are all dead youWin()!
  */
  
  function getCurrentMonster()
  {
    //Make sure the current monster and all the monsters are in scope.
    global $currentMonster; 
    global $monsters;

    //See if the current Monster is set, or the current monster is dead, then select a new random one.
    
    if($currentMonster == '' || $currentMonster[2] == "dead")
    {
        //Check if all the monsters are dead, use a flag
        $aliveMonsters = false;
        
        //Iterate through all the monsters
        foreach($monsters as $monster)
        {
             //Check if any are alive
            if($monster[2] == "alive")
            {
                //Set the aliveMonsters flag
               $aliveMonsters = true;
            }

        }
           
           
        //If all the monsters are dead...
        if (!$aliveMonsters)   {

            youWin();
        }
        else
        {
        //There must be some alive monsters...
        
            //Select Monster flag to false
            $selectMonster = false;
            //Picking a new random monster
            $randMonster = $monsters[rand(0,2)];

                //If the new monster is alive, assign it as currMonsster    
                    if($randMonster[2] == "alive")
                        $currentMonster = $randMonster;
                        //Notify the player a new monster has arrived!
                        echo $currentMonster[0]. " has arrived.\n";
        }
    }
    else
    {
        echo $currentMonster[0]. " has arrived.\n";
    }
    return $currentMonster;
          
    }

//This function handles monster damage.
function monsterDamage($damage) {
    //Make sure the appropriate variable is available
    global $currentMonster;
    $health = $currentMonster[1];

    //Remove the damange from the current monsters health
    $health -= $damage;
    $currentMonster[1] = $health;
    //If the monster's health is less than or equal to 0, they are dead.
    if($health <= 0)
    {
        //Notify the player they are dead
        echo $currentMonster[0]. " IS DEAD! \n";
        //Set the monster status to dead!
        $currentMonster[2] = "dead";
        //Get a new Monster!
        $currentMonster = getCurrentMonster();
    }

}

?>
