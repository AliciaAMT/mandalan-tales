<?php 
 //***********get damage, calculate deflection/earmor
//**********include turnstoppers POWERS???
  //**********check skilled attacks based on skills and items
   
  $rand=mt_rand(1,100);
  if ($scatapult+$bcatapult+$sscatapult>$rand) {
	  //*test for critical attack, double, triple strike, piercing
  include ('../includes/regulardamage.php');//write one for power damage crit possibilities
  $damage = $damage + $scatapult + $bcatapult + $sscatapult;
  $report=$report."<span class=\"green\">You <b>Catapult</b> you enemy into the air for ".$damage." damage!<br /><b>".$deflect." </b>Damage is Deflected!</b><br />You get to make another move!</span><br />";
  include ('php/cendturn.php');  
  }
  else {
  $rand=mt_rand(1,100);
  if ($sstun>$rand) {
  $damage=$damage+$sstun;
  include ('../includes/regulardamage.php');  
  $report="<span class=\"green\">You perform a <b>Stunning Attack</b> for <b>".$damage."</b> damage! You get to make another move!</span><br />";
  
  //******start stun counter***********  
  $stmt = $db->prepare("UPDATE counters SET estun=3 WHERE charname= :charname");
				$stmt->execute(array(':charname' => $charname));
    //***************speed check***************
  $espeedrand=mt_rand(1,500)+$espeed;
  $speedrand=mt_rand(1,100)+$speed+$luck;
  if ($espeedrand<$speedrand) { 
  $move="You are fast enough for another move!";
  $report=$report.$move;
  }
  else {
  include ('php/counter.php');
  }
  include ('php/endturn.php');  
  }
  else {
  $rand=mt_rand(1,100);
  if ($slongarm>$rand) {
  $damage=$damage+$slongarm;
  include ('../includes/regulardamage.php');
  $report="<span class=\"green\">You perform a <b>Longarm Attack</b> for <b>".$damage."</b> damage! You keep your enemy at bay and may move again.</span><br />";
    //***************speed check***************
  $espeedrand=mt_rand(1,500)+$espeed;
  $speedrand=mt_rand(1,100)+$speed+$luck;
  if ($espeedrand<$speedrand) { 
  $move="You are fast enough for another move!";
  $report=$report.$move;
  }
  else {
  include ('php/counter.php');
  }
  include ('php/endturn.php');  
  }
  else {
  $rand=mt_rand(1,100);
  if ($ssweepcombo>$rand) {
  $damage=$damage+$ssweepcombo;
  include ('../includes/regulardamage.php');
  $report="<span class=\"green\">You perform a <b>Sweep Combo Attack</b> for <b>".$damage."</b> damage! You keep your enemy down and may move again.</span><br />";
    //***************speed check***************
  $espeedrand=mt_rand(1,500)+$espeed;
  $speedrand=mt_rand(1,100)+$speed+$luck;
  if ($espeedrand<$speedrand) { 
  $move="You are fast enough for another move!";
  $report=$report.$move;
  }
  else {
  include ('php/counter.php');
  }
  include ('php/endturn.php');  
  }
  else {
  $rand=mt_rand(1,100);
  if ($sintimidate+$bfear>$rand) {
  $damage=$damage+$sintimidate;
  include ('../includes/regulardamage.php');
  $report=$report."<span class=\"green\">You perform an <b>Intimidating Attack</b> for <b>".$damage."</b> damage! Your enemy cowers and you may move again.</span><br />";
    //***************speed check***************
  $espeedrand=mt_rand(1,500)+$espeed;
  $speedrand=mt_rand(1,100)+$speed+$luck;
  if ($espeedrand<$speedrand) { 
  $move="You are fast enough for another move!";
  $report=$report.$move;
  }
  else {
  include ('php/counter.php');
  }
  include ('php/endturn.php');  
  }
  else {
  $rand=mt_rand(1,100);
  if ($bblindness>$rand) {
  $damage = $damage + $bblindness;	  
  include ('../includes/regulardamage.php');
  $move="<b>Your enemy is blind! You may make another move!</b>";
  $report=$report.$move;
//****lower eaccuracy
$stmt = $db->prepare("UPDATE enemy SET eaccuracy=eaccuracy - :bblindness WHERE charname= :charname");
				$stmt->execute(array(':bblindness' => $bblindness, ':charname' => $charname));
    //***************speed check***************
  $espeedrand=mt_rand(1,500)+$espeed;
  $speedrand=mt_rand(1,100)+$speed+$luck;
  if ($espeedrand<$speedrand) { 
  $move="You are fast enough for another move!";
  $report=$report.$move;
  }
  else {
  include ('php/counter.php');
  }
  include ('php/endturn.php');  
  }
  else {
  $rand=mt_rand(1,100);
  if ($bsleep>$rand) {
  $move="Your enemy is asleep! You may make another move!";
  $report=$report.$move;
  $damage = $damage + $bsleep;
  include ('../includes/regulardamage.php');
  //************add condition and set results for no flee, no evade,
    //***************speed check***************
  $espeedrand=mt_rand(1,500)+$espeed;
  $speedrand=mt_rand(1,100)+$speed+$luck;
  if ($espeedrand<$speedrand) { 
  $move="You are fast enough for another move!";
  $report=$report.$move;
  }
  else {
  include ('php/counter.php');
  }
  include ('php/endturn.php');  

  }
  else {
  $rand=mt_rand(1,100);
  if ($bknockback>$rand) {
  $move="<b>Your enemy is knocked back! You may make another move!</b>";
  $report=$report.$move;
  $damage = $damage + $bknockback;
  include ('../includes/regulardamage.php');
    //***************speed check***************
  $espeedrand=mt_rand(1,500)+$espeed;
  $speedrand=mt_rand(1,100)+$speed+$luck;
  if ($espeedrand<$speedrand) { 
  $move="You are fast enough for another move!";
  $report=$report.$move;
  }
  else {
  include ('php/counter.php');
  }
  include ('php/endturn.php');  
  }
  else {
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
//************check extra attack bonuses*********
include ('../includes/attackbonus.php');
  //***************speed check***************
  $espeedrand=mt_rand(1,500)+$espeed;
  $speedrand=mt_rand(1,100)+$speed+$luck;
  if ($espeedrand<$speedrand) { 
  $move="You are fast enough for another move!";
  $report=$report.$move;
  }
  else {
  include ('php/counter.php');
  }
  include ('php/endturn.php');  
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
//************check extra attack bonuses*********
include ('../includes/attackbonus.php');
  //***************speed check***************
  $espeedrand=mt_rand(1,500)+$espeed;
  $speedrand=mt_rand(1,100)+$speed+$luck;
  if ($espeedrand<$speedrand) { 
  $move="You are fast enough for another move!";
  $report=$report.$move;
  }
  else {
  include ('php/counter.php');
  }
  include ('php/endturn.php');  
  }
else {
include ('../includes/regulardamage.php');
//************check extra attack bonuses*********
include ('../includes/attackbonus.php');
  //***************speed check***************
  $espeedrand=mt_rand(1,500)+$espeed;
  $speedrand=mt_rand(1,100)+$speed+$luck;
  if ($espeedrand<$speedrand) { 
  $move="You are fast enough for another move!";
  $report=$report.$move;
  }
  else {
  include ('php/counter.php');
  }
  include ('php/endturn.php');  

  }
  }
  }
  }
  }
  }
  }
  }
  }
  }
  }
  }
  }