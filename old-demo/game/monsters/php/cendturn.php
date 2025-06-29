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
//check if enemy dead
if ($enemylife<1) {
	//**********redirect to loot.php
include ('php/enemydead.php');
}
//speed check goes here when removed from typedamage
  //***************speed check***************
  $espeedrand=mt_rand(1,500)+$espeed;
  $speedrand=mt_rand(1,100)+$speed+$luck;
  if ($espeedrand<$speedrand) { 
  $move="You are fast enough for another move!<br />";
  $report=$report.$move;
  include ('php/endround.php');
  }
  else {
  include ('php/enemyturn.php');
}

?>