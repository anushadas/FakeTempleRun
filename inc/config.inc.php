<?php
include("monster.inc.php");
include("logic.inc.php");
include("player.inc.php");
//Define the constant for the probability for RUN and HIT
define("HIT_PROBABILITY", 50);
define("RUN_PROBABILITY", 70);

/*
 * Store the following information for all three monsters, use an indexed array
 * Monster Type: Beast, Dragon, Elemental
 * Monster Health: 100, 100, 150
 * Monster status (dead/alive)
 */
$monsters = array(
    array("Beast", 100, "alive"),
    array("Dragon", 100, "alive"),
    array("Elemental", 150, "alive")
);

/*
 * Store all the information in an array called $player, use an associative array
 * Name
 * Health
 */
$player["Anusha"]= 100;