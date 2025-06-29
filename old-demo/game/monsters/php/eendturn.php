<?php
include ('../includes/getstats.php');
include ('../includes/getweapontype.php');
include ('../includes/getskills.php');
include ('../includes/getdamage.php');
include ('../includes/getdefense.php');
//***************getflags*****************************
include ('../includes/getflags.php');
//******************get charstats************************
include ('../includes/getcharstats.php');
include ('../includes/getestats.php');
include ('../includes/getcounter.php');

//check if char dead
if ($life<1) {
	//**********redirect to loot.php
include ('php/chardead.php');
}

  $speedrand=mt_rand(1,500)+$speed;
  $espeedrand=mt_rand(1,100)+$espeed+$eluck;
  if ($speedrand<$espeedrand) { 
  $move="Your enemy is fast enough for another move!<br />";
  $counter=$counter.$move;
  $report=$report.$counter;
  include ('php/enemyendround.php');
  }
  else {
	  $report=$report.$counter;
	  include ('php/endround.php');
  }
?>