<?php
$deflect = 0;
//***critical chance based on luck and crit****
  $critical=$bcritical+$scritical+$luck;
  $rand=mt_rand(1,200);
  if ($critical>$rand) {
$strongbonus=$strength;
$strongbonus=$strongbonus*.1;
$strongbonus=$damage*$strongbonus;
$damage=$damage+$strongbonus;
$levelbonus=$level;
$damage=$damage+$levelbonus;
$damage=round($damage);
$report="<span class=\"green\">You attack and hit with a <b>Critical Hit of ";
$report=$report.$damage;
$report=$report."!</b></span><br />";
$stmt = $db->prepare('UPDATE enemy SET enemylife=enemylife-:damage WHERE charname= :charname');
	$stmt->execute(array(':damage' => $damage, ':charname' => $charname));
//************check extra attack bonuses*********
//include attackbonus
$stmt = $db->prepare('UPDATE enemy SET enemylife=enemylife-:damage WHERE charname= :charname');
	$stmt->execute(array(':damage' => $damage, ':charname' => $charname));
//************check extra attack bonuses*********

  //***************speed check***************
  $espeedrand=mt_rand(1,500)+$espeed;
  $speedrand=mt_rand(1,100)+$speed+$luck;
  if ($espeedrand<$speedrand) { 
  $move="You are fast enough for another move!";
  $report=$report.$move;
  include ('php/cendturn.php');
  }
  else {
  include ('php/enemyturn.php');
  }
  }
else {
	$pierce=$accuracy+$luck;
$rand=mt_rand(1,200);
if ($pierce>$rand) {
$strongbonus=$strength;
$strongbonus=$strongbonus*.1;
$damage=$damage+$strongbonus;
$amount=mt_rand(1,100);
$amount=$amount*.01;
$damage=round($damage*$amount);
$levelbonus=$level;
$damage=$damage+$levelbonus;
$report="<span class=\"green\">You attack and hit for <b>";
$report=$report.$damage;
$report=$report." </b>Damage!<br />";
$stmt = $db->prepare('UPDATE enemy SET enemylife=enemylife-:damage WHERE charname= :charname');
	$stmt->execute(array(':damage' => $damage, ':charname' => $charname));
//************check extra attack bonuses*********

  //***************speed check***************
  $espeedrand=mt_rand(1,500)+$espeed;
  $speedrand=mt_rand(1,100)+$speed+$luck;
  if ($espeedrand<$speedrand) { 
  $move="You are fast enough for another move!";
  $report=$report.$move;
  include ('php/cendturn.php');
  }
  else {
  include ('php/enemyturn.php');
  }
  }
else {
	$strongbonus=$strength;
$strongbonus=$strongbonus*.01;
$damage=$damage+$strongbonus;
$amount=mt_rand(1,100);
$amount=$amount*.01;
$damage=round($damage*$amount);
$levelbonus=$level;
$damage=$damage+$levelbonus;
//**********deflect/armor*******
$deflect=$deflect + $enemyarmor;
$rand=mt_rand(1,100);
$rand=$rand*.01;
$deflect=$deflect*$rand;
$deflect=round($deflect);
if ($deflect>$damage)
{
$deflect=$damage;
}
$damage = $damage - $deflect;
$report="<span class=\"green\">You attack and hit for <b>";
$report=$report.$damage;
$report=$report." </b>Damage!<br />".$deflect." damage was deflected.<br /></span>";
$stmt = $db->prepare('UPDATE enemy SET enemylife=enemylife-:damage WHERE charname= :charname');
	$stmt->execute(array(':damage' => $damage, ':charname' => $charname));
//************check extra attack bonuses*********

  //***************speed check***************
  $espeedrand=mt_rand(1,500)+$espeed;
  $speedrand=mt_rand(1,100)+$speed+$luck;
  if ($espeedrand<$speedrand) { 
  $move="You are fast enough for another move!";
  $report=$report.$move;
  include ('php/cendturn.php');
  }
  else {
  include ('php/enemyturn.php');
}
}
}
?>