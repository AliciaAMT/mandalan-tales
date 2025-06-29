<?php
function enemyturn(){
//******************getstats inv*******************
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

//****enemy fled or user tryig to back button or cheat**********
if ($fight==0) {
	//***********redirect to main 
	header('Location: ../maingraphics.php'); die('This site works best with redirections turned on, but you may continue with them turned off. <a href="../maingraphics.php">Continue</a>');
}
//*********enemydead*********
if ($enemylife<1) {
	//**********redirect to loot.php
include ('php/enemydead.php');
}
 //************alternate enemy flee chance********** 
$rand=mt_rand(1,10);
if ($enemylife<6 and $rand <4) {
$enemyevade=$espeed+$eagility;
$enemyevade = intdiv($enemyevade, 2);
$rande=mt_rand(1,100);
$randee=$rande*.01;
$randee=$randee*$enemyevade;
$randee=round($randee);
$randy=mt_rand(1,100);
$randey=$randy*.01;
$catchem=$speed + $agility;
$randey=$randey*$catchem;
$randey=round($randey);
if ($randee<$randey) {
$counter=$counter."<span class=\"red\">";
$counter=$counter.$enemyname;
$counter=$counter." attempts to flee and <b>Fails!</b></span><br />";

include ('php/eendturn.php');
}
else {

$counter=$counter."<span class=\"red\">";
$counter=$counter.$enemyname;
$counter=$counter." attempts to flee and <b>Succeeds!</b></span><br />";
$outcome = 'Enemy Fled';
$report=$report.$counter;
include ('php/endfight.php');

}
}

//**********miss**********
  $rand=mt_rand(1,100);
  $miss=mt_rand(1,100);
  //***************accuracy check *********
  $miss=$miss-$eaccuracy-$eluck;
  //***************enemy agility check*********
  $miss = $miss + $agility + $luck;
  if ($miss>$rand) {
 $counter=$counter."<span class=\"red\">";
$counter=$counter.$enemyname;
$counter=$counter." <b>Misses!</b></span><br />";
include ('php/eendturn.php');
  }
  else {
//*********player chance evade**********add luck both sides
 $rand=mt_rand(1,100);
  $evade=$agility;
  $rand = $rand + $eaccuracy;
  if ($evade>$rand) {
$counter=$counter."<span class=\"red\">";
$counter=$counter.$enemyname;
$counter=$counter." lunges and you <b>Evade!</b></span><br />";
include ('php/eendturn.php');
}
else {
//      CHANCE TO BLOCK
//***enemy block chance***
  $eblock=$strength+$speed-$espeed;
  $rand=mt_rand(1,100);
  if ($eblock>$rand) {
  $counter=$counter."<span class=\"red\">You <b>Block!</b></span><br />";
//***FUTURE  include attackbonus
  include ('php/eendturn.php');
  }
else {
//**************POWERS***see epowers.php or not *******************************
$power=10;
$chance=mt_rand(1,100);
if ($chance<$power) {
if ($enemy=="giantscorpion") {
$rand=mt_rand(1,100);
$rand=$rand-$luck;
if ($holdresist>$rand) {
$counter=$counter."<span class=\"red\">";
$counter=$counter.$enemyname;
$counter=$counter." attempts to hold you with <b>Pincher Claws!</b> <b>You resist!</b></span><br />";
include ('php/eendturn.php');
}
else {
$counter=$counter."<span class=\"red\">";
$counter=$counter.$enemyname;
$counter=$counter." attempts to hold you with <b>Pincher Claws!</b> You cannot move for <b>1</b> turn and the Scorpion inflicts <b>25</b> damage!</span><br />";
$stmt = $db->prepare('UPDATE charstats SET life=life-25 WHERE charname= :charname');
	$stmt->execute(array(':charname' => $charname));
$stmt = $db->prepare('UPDATE counters SET held=1 WHERE charname= :charname');
	$stmt->execute(array(':charname' => $charname));
if ($life-25<0) {
$rand=mt_rand(1,100);
if ($rand<$brevivingjolt) {
$counter=$counter."<br /><br /><table class=\"page\"><tr><td class=\"border\">You have died! However, unexpectedly a great thunderbolt is summoned from the heavens and it jolts you back to life!<br  /><br /><table class=\"page\"><tr><td class=\"page\">
<table class=\"page\"><tr><td class=\"page\"><form action=\"jolt.php?".time()."\" method=\"post\"><input class=\"small\" type=\"submit\" value=\"Go Towards the Light\" /></form></td></tr></table></td></tr></table></td></tr></table></body></html>";
}
else {
$counter=$counter."<br /><br /><table class=\"page\"><tr><td class=\"border\">You have died!<br  /><br /><table class=\"page\"><tr><td class=\"page\">
<table class=\"page\"><tr><td class=\"page\"><form action=\"revive.php?".time()."\" method=\"post\"><input class=\"small\" type=\"submit\" value=\"Go Towards the Light\" /></form></td></tr></table></td></tr></table></td></tr></table></body></html>";
}
}
include ('php/counter.php');
}
}
if ($enemy=="scorpion") {
$rand=mt_rand(1,100);
$rand=$rand-$luck;
if ($holdresist>$rand) {
$counter=$counter."<span class=\"red\">";
$counter=$counter.$enemyname;
$counter=$counter." attempts to hold you with <b>Pincher Claws!</b> <b>You resist!</b></span><br />";
include ('php/eendturn.php');
}
else {
$counter=$counter."<span class=\"red\">";
$counter=$counter.$enemyname;
$counter=$counter." attempts to hold you with <b>Pincher Claws!</b> You cannot move for <b>1</b> turn and the Scorpion inflicts <b>25</b> damage!</span><br />";
$stmt = $db->prepare('UPDATE charstats SET life=life-25 WHERE charname= :charname');
	$stmt->execute(array(':charname' => $charname));
$stmt = $db->prepare('UPDATE counters SET held=1 WHERE charname= :charname');
	$stmt->execute(array(':charname' => $charname));
if ($life-25<0) {
$rand=mt_rand(1,100);
if ($rand<$brevivingjolt) {
$counter=$counter."<br /><br /><table class=\"page\"><tr><td class=\"border\">You have died! However, unexpectedly a great thunderbolt is summoned from the heavens and it jolts you back to life!<br  /><br /><table class=\"page\"><tr><td class=\"page\">
<table class=\"page\"><tr><td class=\"page\"><form action=\"jolt.php?".time()."\" method=\"post\"><input class=\"small\" type=\"submit\" value=\"Go Towards the Light\" /></form></td></tr></table></td></tr></table></td></tr></table></body></html>";
}
else {
$counter=$counter."<br /><br /><table class=\"page\"><tr><td class=\"border\">You have died!<br  /><br /><table class=\"page\"><tr><td class=\"page\">
<table class=\"page\"><tr><td class=\"page\"><form action=\"revive.php?".time()."\" method=\"post\"><input class=\"small\" type=\"submit\" value=\"Go Towards the Light\" /></form></td></tr></table></td></tr></table></td></tr></table></body></html>";
}
}
include ('php/counter.php');
}
}
if ($enemy=="anubis") {
$rand=mt_rand(1,100);
$rand=$rand-$luck;
if ($holdresist>$rand) {
$counter=$counter."<span class=\"red\">";
$counter=$counter.$enemyname;
$counter=$counter." attempts to hold you with <b>Stone Gaze!</b> <b>You resist!</b></span><br />";
include ('php/eendturn.php');
}
else {
$counter=$counter."<span class=\"red\">";
$counter=$counter.$enemyname;
$counter=$counter." attempts to hold you with <b>Stone Gaze!</b> You cannot move for <b>1</b> turn and Anubis inflicts <b>50</b> damage!</span><br />";
$stmt = $db->prepare('UPDATE charstats SET life=life-50 WHERE charname= :charname');
	$stmt->execute(array(':charname' => $charname));
$stmt = $db->prepare('UPDATE counters SET held=1 WHERE charname= :charname');
	$stmt->execute(array(':charname' => $charname));
if ($life-50<0) {
$rand=mt_rand(1,100);
if ($rand<$brevivingjolt) {
$counter=$counter."<br /><br /><table class=\"page\"><tr><td class=\"border\">You have died! However, unexpectedly a great thunderbolt is summoned from the heavens and it jolts you back to life!<br  /><br /><table class=\"page\"><tr><td class=\"page\">
<table class=\"page\"><tr><td class=\"page\"><form action=\"jolt.php?".time()."\" method=\"post\"><input class=\"small\" type=\"submit\" value=\"Go Towards the Light\" /></form></td></tr></table></td></tr></table></td></tr></table></body></html>";
}
else {
$counter=$counter."<br /><br /><table class=\"page\"><tr><td class=\"border\">You have died!<br  /><br /><table class=\"page\"><tr><td class=\"page\">
<table class=\"page\"><tr><td class=\"page\"><form action=\"revive.php?".time()."\" method=\"post\"><input class=\"small\" type=\"submit\" value=\"Go Towards the Light\" /></form></td></tr></table></td></tr></table></td></tr></table></body></html>";
}
}
include ('php/counter.php');
}
}
if ($enemy=="snake") {
$rand=mt_rand(1,100);
$rand=$rand-$luck;
if ($holdresist>$rand) {
$counter=$counter."<span class=\"red\">";
$counter=$counter.$enemyname;
$counter=$counter." attempts to hold you with <b>Constriction!</b> <b>You resist!</b></span><br />";
include ('php/eendturn.php');
}
else {
$counter=$counter."<span class=\"red\">";
$counter=$counter.$enemyname;
$counter=$counter." attempts to hold you with <b>Constriction!</b> You cannot move for <b>1</b> turn and the Snake inflicts <b>30</b> damage!</span><br />";
$stmt = $db->prepare('UPDATE charstats SET life=life-30 WHERE charname= :charname');
	$stmt->execute(array(':charname' => $charname));
$stmt = $db->prepare('UPDATE counters SET held=1 WHERE charname= :charname');
	$stmt->execute(array(':charname' => $charname));
if ($life-30<0) {
$rand=mt_rand(1,100);
if ($rand<$brevivingjolt) {
$counter=$counter."<br /><br /><table class=\"page\"><tr><td class=\"border\">You have died! However, unexpectedly a great thunderbolt is summoned from the heavens and it jolts you back to life!<br  /><br /><table class=\"page\"><tr><td class=\"page\">
<table class=\"page\"><tr><td class=\"page\"><form action=\"jolt.php?".time()."\" method=\"post\"><input class=\"small\" type=\"submit\" value=\"Go Towards the Light\" /></form></td></tr></table></td></tr></table></td></tr></table></body></html>";
}
else {
$counter=$counter."<br /><br /><table class=\"page\"><tr><td class=\"border\">You have died!<br  /><br /><table class=\"page\"><tr><td class=\"page\">
<table class=\"page\"><tr><td class=\"page\"><form action=\"revive.php?".time()."\" method=\"post\"><input class=\"small\" type=\"submit\" value=\"Go Towards the Light\" /></form></td></tr></table></td></tr></table></td></tr></table></body></html>";
}
}
include ('php/counter.php');
}
}
if ($enemy=="giantsnake") {
$rand=mt_rand(1,100);
$rand=$rand-$luck;
if ($holdresist>$rand) {
$counter=$counter."<span class=\"red\">";
$counter=$counter.$enemyname;
$counter=$counter." attempts to hold you with <b>Constriction!</b> <b>You resist!</b></span><br />";
include ('php/eendturn.php');
}
else {
$counter=$counter."<span class=\"red\">";
$counter=$counter.$enemyname;
$counter=$counter." attempts to hold you with <b>Constriction!</b> You cannot move for <b>1</b> turn and the Giant Snake inflicts <b>35</b> damage!</span><br />";

$stmt = $db->prepare('UPDATE charstats SET life=life-35 WHERE charname= :charname');
	$stmt->execute(array(':charname' => $charname));
$stmt = $db->prepare('UPDATE counters SET held=1 WHERE charname= :charname');
	$stmt->execute(array(':charname' => $charname));
if ($life-35<0) {
$rand=mt_rand(1,100);
if ($rand<$brevivingjolt) {
$counter=$counter."<br /><br /><table class=\"page\"><tr><td class=\"border\">You have died! However, unexpectedly a great thunderbolt is summoned from the heavens and it jolts you back to life!<br  /><br /><table class=\"page\"><tr><td class=\"page\">
<table class=\"page\"><tr><td class=\"page\"><form action=\"jolt.php?".time()."\" method=\"post\"><input class=\"small\" type=\"submit\" value=\"Go Towards the Light\" /></form></td></tr></table></td></tr></table></td></tr></table></body></html>";
}
else {
$counter=$counter."<br /><br /><table class=\"page\"><tr><td class=\"border\">You have died!<br  /><br /><table class=\"page\"><tr><td class=\"page\">
<table class=\"page\"><tr><td class=\"page\"><form action=\"revive.php?".time()."\" method=\"post\"><input class=\"small\" type=\"submit\" value=\"Go Towards the Light\" /></form></td></tr></table></td></tr></table></td></tr></table></body></html>";
}
}
include ('php/counter.php');
}
}
if ($enemy=="cellarspider") {
$rand=mt_rand(1,100);
$rand=$rand-$luck;
if ($holdresist>$rand) {
$counter=$counter."<span class=\"red\">";
$counter=$counter.$enemyname;
$counter=$counter." attempts to hold you with <b>Spider Webs!</b> <b>You resist!</b></span><br />";
include ('php/eendturn.php');
}
else {
$counter=$counter."<span class=\"red\">";
$counter=$counter.$enemyname;
$counter=$counter." attempts to hold you with <b>Spider Webs!</b> You cannot move for <b>1</b> turn and the Spider inflicts <b>5</b> damage!</span><br />";
$stmt = $db->prepare('UPDATE charstats SET life=life-5 WHERE charname= :charname');
	$stmt->execute(array(':charname' => $charname));
$stmt = $db->prepare('UPDATE counters SET held=1 WHERE charname= :charname');
	$stmt->execute(array(':charname' => $charname));
if ($life-5<0) {
$rand=mt_rand(1,100);
if ($rand<$brevivingjolt) {
$counter=$counter."<br /><br /><table class=\"page\"><tr><td class=\"border\">You have died! However, unexpectedly a great thunderbolt is summoned from the heavens and it jolts you back to life!<br  /><br /><table class=\"page\"><tr><td class=\"page\">
<table class=\"page\"><tr><td class=\"page\"><form action=\"jolt.php?".time()."\" method=\"post\"><input class=\"small\" type=\"submit\" value=\"Go Towards the Light\" /></form></td></tr></table></td></tr></table></td></tr></table></body></html>";
}
else {
$counter=$counter."<br /><br /><table class=\"page\"><tr><td class=\"border\">You have died!<br  /><br /><table class=\"page\"><tr><td class=\"page\">
<table class=\"page\"><tr><td class=\"page\"><form action=\"revive.php?".time()."\" method=\"post\"><input class=\"small\" type=\"submit\" value=\"Go Towards the Light\" /></form></td></tr></table></td></tr></table></td></tr></table></body></html>";
}
}
include ('php/counter.php');
}
}
if ($enemy=="spider") {
$rand=mt_rand(1,100);
if ($holdresist>$rand) {
$counter=$counter."<span class=\"red\">";
$counter=$counter.$enemyname;
$counter=$counter." attempts to hold you with <b>Spider Webs!</b> <b>You resist!</b></span><br />";
include ('php/eendturn.php');
}
else {
$counter=$counter."<span class=\"red\">";
$counter=$counter.$enemyname;
$counter=$counter." attempts to hold you with <b>Spider Webs!</b> You cannot move for <b>1</b> turn and the Spider inflicts <b>5</b> damage!</span><br />";
$stmt = $db->prepare('UPDATE charstats SET life=life-5 WHERE charname= :charname');
	$stmt->execute(array(':charname' => $charname));
$stmt = $db->prepare('UPDATE counters SET held=1 WHERE charname= :charname');
	$stmt->execute(array(':charname' => $charname));
if ($life-5<0) {
$rand=mt_rand(1,100);
if ($rand<$brevivingjolt) {
$counter=$counter."<br /><br /><table class=\"page\"><tr><td class=\"border\">You have died! However, unexpectedly a great thunderbolt is summoned from the heavens and it jolts you back to life!<br  /><br /><table class=\"page\"><tr><td class=\"page\">
<table class=\"page\"><tr><td class=\"page\"><form action=\"jolt.php?".time()."\" method=\"post\"><input class=\"small\" type=\"submit\" value=\"Go Towards the Light\" /></form></td></tr></table></td></tr></table></td></tr></table></body></html>";
}
else {
$counter=$counter."<br /><br /><table class=\"page\"><tr><td class=\"border\">You have died!<br  /><br /><table class=\"page\"><tr><td class=\"page\">
<table class=\"page\"><tr><td class=\"page\"><form action=\"revive.php?".time()."\" method=\"post\"><input class=\"small\" type=\"submit\" value=\"Go Towards the Light\" /></form></td></tr></table></td></tr></table></td></tr></table></body></html>";
}
}
include ('php/counter.php');
}
}
if ($enemy=="rat") {
$rand=mt_rand(1,100);
if ($earthresist>$rand) {
$counter=$counter."<span class=\"red\">";
$counter=$counter.$enemyname;
$counter=$counter." attempts to infect you with the <b>Plague!</b> <b>You resist!</b></span><br />";
include ('php/eendturn.php');
}
else {
$counter=$counter."<span class=\"red\">";
$counter=$counter.$enemyname;
$counter=$counter." infects you with the <b>Plague!</b> The infected bite inflicts <b>15</b> damage!</span><br />";
$stmt = $db->prepare('UPDATE charstats SET cond="Plagued" WHERE charname= :charname');
	$stmt->execute(array(':charname' => $charname));
$stmt = $db->prepare('UPDATE charstats SET life=life-15 WHERE charname= :charname');
	$stmt->execute(array(':charname' => $charname));
include ('php/eendturn.php');

}
}
if ($enemy=="giantbat") {
$rand=mt_rand(1,100);
if ($earthresist>$rand) {
$counter=$counter."<span class=\"red\">";
$counter=$counter.$enemyname;
$counter=$counter." attempts to infect you with the <b>Plague!</b> <b>You resist!</b></span><br />";
include ('php/eendturn.php');
}
else {
$counter=$counter."<span class=\"red\">";
$counter=$counter.$enemyname;
$counter=$counter." infects you with the <b>Plague!</b> The infected bite inflicts <b>40</b> damage!</span><br />";
$stmt = $db->prepare('UPDATE charstats SET cond="Plagued" WHERE charname= :charname');
	$stmt->execute(array(':charname' => $charname));
$stmt = $db->prepare('UPDATE charstats SET life=life-5 WHERE charname= :charname');
	$stmt->execute(array(':charname' => $charname));
include ('php/eendturn.php');
if ($life-10<0) {
$rand=mt_rand(1,100);
if ($rand<$brevivingjolt) {
$counter=$counter."<br /><br /><table class=\"page\"><tr><td class=\"border\">You have died! However, unexpectedly a great thunderbolt is summoned from the heavens and it jolts you back to life!<br  /><br /><table class=\"page\"><tr><td class=\"page\">
<table class=\"page\"><tr><td class=\"page\"><form action=\"jolt.php?".time()."\" method=\"post\"><input class=\"small\" type=\"submit\" value=\"Go Towards the Light\" /></form></td></tr></table></td></tr></table></td></tr></table></body></html>";
}
else {
$counter=$counter."<br /><br /><table class=\"page\"><tr><td class=\"border\">You have died!<br  /><br /><table class=\"page\"><tr><td class=\"page\">
<table class=\"page\"><tr><td class=\"page\"><form action=\"revive.php?".time()."\" method=\"post\"><input class=\"small\" type=\"submit\" value=\"Go Towards the Light\" /></form></td></tr></table></td></tr></table></td></tr></table></body></html>";
}
}
}
}
if ($enemy=="bat") {
$rand=mt_rand(1,100);
if ($earthresist>$rand) {
$counter=$counter."<span class=\"red\">";
$counter=$counter.$enemyname;
$counter=$counter." attempts to infect you with the <b>Plague!</b> <b>You resist!</b></span><br />";
include ('php/eendturn.php');
}
else {
$counter=$counter."<span class=\"red\">";
$counter=$counter.$enemyname;
$counter=$counter." infects you with the <b>Plague!</b> The infected bite inflicts <b>30</b> damage!</span><br />";
$stmt = $db->prepare('UPDATE charstats SET cond="Plagued" WHERE charname= :charname');
	$stmt->execute(array(':charname' => $charname));
$stmt = $db->prepare('UPDATE charstats SET life=life-30 WHERE charname= :charname');
	$stmt->execute(array(':charname' => $charname));
include ('php/eendturn.php');
if ($life-10<0) {
$rand=mt_rand(1,100);
if ($rand<$brevivingjolt) {
$counter=$counter."<br /><br /><table class=\"page\"><tr><td class=\"border\">You have died! However, unexpectedly a great thunderbolt is summoned from the heavens and it jolts you back to life!<br  /><br /><table class=\"page\"><tr><td class=\"page\">
<table class=\"page\"><tr><td class=\"page\"><form action=\"jolt.php?".time()."\" method=\"post\"><input class=\"small\" type=\"submit\" value=\"Go Towards the Light\" /></form></td></tr></table></td></tr></table></td></tr></table></body></html>";
}
else {
$counter=$counter."<br /><br /><table class=\"page\"><tr><td class=\"border\">You have died!<br  /><br /><table class=\"page\"><tr><td class=\"page\">
<table class=\"page\"><tr><td class=\"page\"><form action=\"revive.php?".time()."\" method=\"post\"><input class=\"small\" type=\"submit\" value=\"Go Towards the Light\" /></form></td></tr></table></td></tr></table></td></tr></table></body></html>";
}
}
}
}
}
else {
//#################################################critical hit
$critical=12;
$hit=mt_rand(1,100);
if ($hit<$critical) {
//write chance to resist based on resistances add to player attack
$rhit=mt_rand(1,100);
if ($rhit<$criticalresist) {
$counter=$counter."<span class=\"red\">";
$counter=$counter.$enemyname;
$counter=$counter." attacks with a <b>Critical Hit!</b> But you <b>Resist</b>!</span><br />";
include ('php/eendturn.php');
}
else {
$enemydamage=$enemyatt2dam;
$estrongbonus=$estrength;
$estrongbonus=$estrongbonus*.01;
$estrongbonus=$enemydamage*$strongbonus;
$enemydamage=$enemydamage+$estrongbonus;
$enemydamage=$enemydamage*1.5;
$elevelbonus=$enemylevel;
$enemydamage=$enemydamage+$elevelbonus;
$enemydamage=round($enemydamage);





$counter=$counter."<span class=\"red\">";
$counter=$counter.$enemyname;
$counter=$counter." attacks with a <b>Critical Hit of ";
$counter=$counter.$enemydamage;
$counter=$counter."!</b></span><br />";
$stmt = $db->prepare('UPDATE charstats SET life=life-:enemydamage WHERE charname= :charname');
	$stmt->execute(array(':enemydamage' => $enemydamage, ':charname' => $charname));
include ('php/eendturn.php');
}
}
else {
$randatt2=mt_rand(1,100);
if ($randatt2<30) {
$enemydamage=$enemyatt2dam;
$estrongbonus=$estrength;
$estrongbonus=$estrongbonus*.01;
$enemydamage=$enemydamage+$estrongbonus;
$amount=mt_rand(1,100);
$amount=$amount*.01;
$enemydamage=round($enemydamage*$amount);
$elevelbonus=$enemylevel;
$enemydamage=$enemydamage+$elevelbonus;

//armor deflect up to half
// doesn't work defense=defense/6
$defense = intdiv($defense, 6);
$defense=$defense+$level;
$randdef=mt_rand(0,50);
$defense=$defense*$randdef*.01;
$defense=round($defense);
$difference=$enemydamage-$defense;
if($difference<0)
{$difference=0;}
$counter=$counter."<span class=\"red\">";
$counter=$counter.$enemyname;
$counter=$counter." attacks with ";
$counter=$counter.$enemyatt2;
$counter=$counter." for <b>";
$counter=$counter.$enemydamage;
$counter=$counter." damage!</b>You deflect <b>";
$counter=$counter.$defense;
$counter=$counter." damage!</b></span><br />";
$stmt = $db->prepare('UPDATE charstats SET life=life-:difference WHERE charname= :charname');
	$stmt->execute(array(':difference' => $difference, ':charname' => $charname));
include ('php/eendturn.php');
}
else {
$enemydamage=$enemyatt1dam;
$estrongbonus=$estrength;
$estrongbonus=$estrongbonus*.01;
$enemydamage=$enemydamage+$estrongbonus;
$amount=mt_rand(1,100);
$amount=$amount*.01;
$enemydamage=round($enemydamage*$amount);
$elevelbonus=$enemylevel;
$enemydamage=$enemydamage+$elevelbonus;

$defense = intdiv($defense, 6);
$defense=$defense+$level;
$randdef=mt_rand(0,50);
$randdef=$randdef*.01;
$defense=$defense*$randdef;
$defense=round($defense);
$difference=$enemydamage-$defense;
if($difference<0)
{$difference=0;}
$counter=$counter."<span class=\"red\">";
$counter=$counter.$enemyname;
$counter=$counter." attacks with ";
$counter=$counter.$enemyatt1;
$counter=$counter." for <b>";
$counter=$counter.$enemydamage;
$counter=$counter." damage!</b> You deflect <b>";
$counter=$counter.$defense;
$counter=$counter." damage!</b></span><br />";
$stmt = $db->prepare('UPDATE charstats SET life=life-:difference WHERE charname= :charname');
	$stmt->execute(array(':difference' => $difference, ':charname' => $charname));
include ('php/eendturn.php');
}
}
}
}
}
}
}
?>
