<?php
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
include ('php/chardead.php');
include ('../includes/getestats.php');
include ('../includes/getcounter.php');
//*********include everything before enemy turn or before new turn especially counters, life changes, and event report
if ($bliferegen>0) {
  $bliferegen=round($bliferegen);
  $move="<b>You regenerate ".$bliferegen." life!</b><br />";
  $report=$report.$move;
if ($life+$bliferegen>$maxlife) {
	$stmt = $db->prepare("UPDATE charstats SET life=maxlife WHERE charname= :charname");
				$stmt->execute(array(':charname' => $charname));
}
else {
$stmt = $db->prepare("UPDATE charstats SET life=life + :bliferegen WHERE charname= :charname");
				$stmt->execute(array(':bliferegen' => $bliferegen,':charname' => $charname));
  }
  }
if ($eheld>0) {
  $rand=mt_rand(1,100);
  $resist=100-$eholdresist;
  if ($rand>$resist) {
  $move="Your enemy resists being held!";
  $report=$report.$move;
  }
  else {
  $move="Your enemy is held! You may make another move!";
  $report=$report.$move;
}
  }
if ($ebleed>0) {
  $rand=mt_rand(1,100);
  $resist=100-$ebleedresist;
  if ($rand>$resist) {
  $move="Your enemy resists bleeding!";
  $report=$report.$move;
  }
  else {
  $ebleedamt=mt_rand(1,10);
  $stmt = $db->prepare("UPDATE counters SET ebleed=ebleed-1 WHERE charname= :charname");
				$stmt->execute(array(':charname' => $charname));  
  $stmt = $db->prepare("UPDATE enemy SET enemylife=enemylife-:ebleedamt WHERE charname= :charname");
				$stmt->execute(array(':ebleedamt' => $ebleedamt,':charname' => $charname));
  $report=$report."<span class=\"green\">Your enemy bleeds for <b>".$ebleedamt."</b> damage!</span><br />";
  }
  }
if ($einferno>0) {
  $rand=mt_rand(1,100);
  $resist=100-$efireresist;
  if ($rand>$resist) {
  $move="Your enemy resists inferno!";
  $report=$report.$move;
  }
  else {
  $eburnamt=mt_rand(1,20);
  $stmt = $db->prepare("UPDATE counters SET einferno=einferno-1 WHERE charname= :charname");
				$stmt->execute(array(':charname' => $charname));
  $stmt = $db->prepare("UPDATE enemy SET enemylife=enemylife-:eburnamt WHERE charname= :charname");
				$stmt->execute(array(':eburnamt' => $eburnamt,':charname' => $charname));
  $report=$report."<span class=\"green\">Your enemy burns for <b>".$eburnamt."</b> damage!</span><br />";

  }
  }
if ($epoisoned>0) {
  $rand=mt_rand(1,100);
  $resist=100-$eearthresist;
  if ($rand>$resist) {
  $move="Your enemy resists poison!";
  $report=$report.$move;
  }
  else {
  $epoisonedamt=mt_rand(1,30);
  $stmt = $db->prepare("UPDATE counters SET epoisoned=epoisoned-1 WHERE charname= :charname");
				$stmt->execute(array(':charname' => $charname));  
  $stmt = $db->prepare("UPDATE enemy SET enemylife=enemylife-:epoisonedamt WHERE charname= :charname");
				$stmt->execute(array(':epoisonedamt' => $epoisonedamt,':charname' => $charname));
  $report=$report."<span class=\"green\">Your enemy is poisoned for <b>".$epoisonedamt."</b> damage!</span><br />";
  }
  }
if ($efrozen>0) {
   $rand=mt_rand(1,100);
  $resist=100-$ewaterresist;
  if ($rand>$resist) {
  $move="Your enemy resists being frozen!";
  $report=$report.$move;
  }
  else {
  $move="Your enemy is frozen! You may make another move!";
  $report=$report.$move;
  }
  }
if ($estunned>0) {
  $move="Your enemy is stunned! You may make another move!";
  $report=$report.$move;
  }
else {
 include ('php/counter.php');
 $report=$report.$counter;

//*********************update enemy damage***************
$stmt = $db->prepare("UPDATE enemy SET enemylife=enemylife-:damage WHERE charname= :charname");
				$stmt->execute(array(':damage' => $damage, ':charname' => $charname));
//*********************update enemy damage***************
$stmt = $db->prepare("UPDATE enemy SET event = CONCAT(:report, IFNULL(event,'')) WHERE id = 1");
				$stmt->execute(array(':charname' => $charname))				
}
?>