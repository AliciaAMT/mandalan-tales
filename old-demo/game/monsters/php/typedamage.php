<?php
$deflect = 0;
//***critical chance based on luck and crit****
  $critical=$bcritical+$scritical+$luck;
  $rand=mt_rand(1,200);
  if ($critical>$rand) {
$strongbonus=$strength;
$strongbonus=$strongbonus*.01;
$strongbonus=$damage*$strongbonus;
$damage=$damage+$strongbonus;
$levelbonus=$level;
$damage=$damage+$levelbonus;
$damage=round($damage);
$report=$report."<span class=\"green\">You attack and hit with a <b>Critical Hit of ";
$report=$report.$damage;
$report=$report."!</b></span><br />";
$stmt = $db->prepare('UPDATE enemy SET enemylife=enemylife-:damage WHERE charname= :charname');
	$stmt->execute(array(':damage' => $damage, ':charname' => $charname));
//************check extra attack bonuses*********
  include ('php/cendturn.php');
  }
else {
	$pierce=$accuracy+$luck;
$rand=mt_rand(1,200);
if ($pierce>$rand) {
$strongbonus=$strength;
$strongbonus=$strongbonus*.01;
$damage=$damage+$strongbonus;
$amount=mt_rand(1,100);
$amount=$amount*.01;
$damage=round($damage*$amount);
$levelbonus=$level;
$damage=$damage+$levelbonus;
$report=$report."<span class=\"green\">You hit with a <b>Piercing Attack</b> for <b>";
$report=$report.$damage;
$report=$report." </b>Damage!</span><br />";
$stmt = $db->prepare('UPDATE enemy SET enemylife=enemylife-:damage WHERE charname= :charname');
	$stmt->execute(array(':damage' => $damage, ':charname' => $charname));
//************check extra attack bonuses*********
  include ('php/cendturn.php');
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
$rand=mt_rand(0,50);
$rand=$rand*.01;
$deflect=$deflect*$rand;
$deflect=round($deflect)*.01;
$deflect=$damage*$deflect;
$deflect=round($deflect);
$report=$report."<span class=\"green\">You hit for <b>".$damage." </b>Damage!<br /><b>".$deflect."</b> damage was deflected.</span><br />";
$damage = $damage - $deflect;
$stmt = $db->prepare('UPDATE enemy SET enemylife=enemylife-:damage WHERE charname= :charname');
	$stmt->execute(array(':damage' => $damage, ':charname' => $charname));
//************check extra attack bonuses*********
  include ('php/cendturn.php');
}
}
?>