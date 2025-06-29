<?php  
  $rand=mt_rand(1,100);
  if ($bphysdamage>$rand) {
  
  $query = sprintf("update enemy set life=life-'%s' where username='%s';",
mysql_real_escape_string($level),
mysql_real_escape_string($username));
mysql_query($query);
  
  $move="<b>You hit your enemy with physical pain for ".$level." damage!</b><br />";

$report=$report.$move;

$query = sprintf("update enemy set event='%s' where username='%s';",
mysql_real_escape_string($report),
mysql_real_escape_string($username));
mysql_query($query);
  
  }
  $rand=mt_rand(1,100);
  if ($bdisease>$rand) {
  
  $query = sprintf("update enemy set life=life-'%s' where username='%s';",
mysql_real_escape_string($bdisease),
mysql_real_escape_string($username));
mysql_query($query);
  
  $move="<b>Your enemy is diseased for ".$bdisease." damage!</b><br />";

$report=$report.$move;

$query = sprintf("update enemy set event='%s' where username='%s';",
mysql_real_escape_string($report),
mysql_real_escape_string($username));
mysql_query($query);
  
  }
  $rand=mt_rand(1,100);
  if ($bacid>$rand) {
  
  $query = sprintf("update enemy set life=life-'%s' where username='%s';",
mysql_real_escape_string($level),
mysql_real_escape_string($username));
mysql_query($query);
  
  $move="<b>You burn your enemy with acid for ".$level." damage!</b><br />";

$report=$report.$move;

$query = sprintf("update enemy set event='%s' where username='%s';",
mysql_real_escape_string($report),
mysql_real_escape_string($username));
mysql_query($query);
  
  }
  $rand=mt_rand(1,100);
  if ($bmanadrain>$rand) {
	  
  $bmanadrain=round($bmanadrain);
  $query = sprintf("update enemy set mana=0 where username='%s';",
mysql_real_escape_string($username));
mysql_query($query);

$query = sprintf("update stats set mana=mana+'%s' where username='%s';",
mysql_real_escape_string($bmanadrain),
mysql_real_escape_string($username));
mysql_query($query);
  
  $move="<b>You drain your enemy's mana for ".$bmanadrain."!</b><br />";

$report=$report.$move;

$query = sprintf("update enemy set event='%s' where username='%s';",
mysql_real_escape_string($report),
mysql_real_escape_string($username));
mysql_query($query);
  
  }
  $rand=mt_rand(1,100);
  if ($bweaken>$rand) {
  $query = sprintf("update enemy set estrength=0 where username='%s';",
mysql_real_escape_string($username));
mysql_query($query);


$move="<b>You weaken your enemy!</b><br />";

$report=$report.$move;

$query = sprintf("update enemy set event='%s' where username='%s';",
mysql_real_escape_string($report),
mysql_real_escape_string($username));
mysql_query($query);
  }
  $rand=mt_rand(1,100);
  if ($bdebility>$rand) {
  
  $query = sprintf("update enemy set life=life-'%s' where username='%s';",
mysql_real_escape_string($level),
mysql_real_escape_string($username));
mysql_query($query);
  
  $move="<b>You cast debility on your enemy for ".$level." damage!</b><br />";

$report=$report.$move;

$query = sprintf("update enemy set event='%s' where username='%s';",
mysql_real_escape_string($report),
mysql_real_escape_string($username));
mysql_query($query);
  
  }

if ($bfire>0) {
$damage = $damage + $bfire;
$report="<span class=\"green\">You hit with fire for <b>";
$report=$report.$bfire;
$report=$report." </b>Damage!<br />";
}
if ($bwater>0) {
$damage = $damage + $bwater;
$report="<span class=\"green\">You hit with water for <b>";
$report=$report.$bwater;
$report=$report." </b>Damage!<br />";
}
if ($bair>0) {
$damage = $damage + $bair;
$report="<span class=\"green\">You hit with lightning for <b>";
$report=$report.$bair;
$report=$report." </b>Damage!<br />";
}
if ($bearth>0) {
$damage = $damage + $bearth;
$report="<span class=\"green\">You hit with earth for <b>";
$report=$report.$bearth;
$report=$report." </b>Damage!<br />";
}
if ($blight>0) {
$damage = $damage + $blight;
$report="<span class=\"green\">You hit with light magic for <b>";
$report=$report.$blight;
$report=$report." </b>Damage!<br />";
}
if ($bdark>0) {
$damage = $damage + $bdark;
$report="<span class=\"green\">You hit with dark magic for <b>";
$report=$report.$bdark;
$report=$report." </b>Damage!<br />";
}
$rand=mt_rand(1,100);
if ($selemental+$sselemental>$rand) {
  $sdamage = $selemental+$sselemental;
  $damage=$damage+$selemental+$sselemental;
  $report="<span class=\"green\">You perform an <b>Elemental Attack</b> for <b>".$sdamage."</b> damage!</span><br />";
  }
$rand=mt_rand(1,100);
if ($smpoison+$spoison>$rand) {
  $pdamage = $spoison+$smpoison;
  $damage=$damage+$spoison+$smpoison;
  $report="<span class=\"green\">You perform a <b>Poison Attack</b> for <b>".$pdamage."</b> damage!</span><br />";
//******start stun counter***********  
$stmt = $db->prepare("UPDATE counters SET epoison=3 WHERE charname= :charname");
				$stmt->execute(array(':charname' => $charname));
  }
$rand=mt_rand(1,100);
if ($sfire+$smfire>$rand) {
  $fdamage = $sfire+$smfire;
  $damage=$damage+$sfire+$smfire;
  $report="<span class=\"green\">You perform a <b>Fire Attack</b> for <b>".$fdamage."</b> damage!</span><br />";
//******start stun counter***********  
$stmt = $db->prepare("UPDATE counters SET einferno=3 WHERE charname= :charname");
				$stmt->execute(array(':charname' => $charname));
  }
$rand=mt_rand(1,100);
if ($scrush>$rand) {
  $damage=$damage+$scrush;
  $report="<span class=\"green\">You perform a <b>Crushing Attack</b> for <b>".$scrush."</b> damage!</span><br />";
  }
$rand=mt_rand(1,100);
if ($bdoublestrike>$rand) {
$damage = $damage + $damage;
$report="<span class=\"green\">You double strike and hit for <b>";
$report=$report.$damage;
$report=$report." </b>Damage!<br />";
}
$rand=mt_rand(1,100);
if ($btriplestrike>$rand) {
	$damage = $damage + $damage + $damage;
$report="<span class=\"green\">You triple strike and hit for <b>";
$report=$report.$damage;
$report=$report." </b>Damage!<br />";
}
$rand=mt_rand(1,100);
if ($bvampiric>$rand) {
  
  $report="<span class=\"green\">You <b>Drain</b> your enemy's life for ".$damage." damage!</span><br />";
$stmt = $db->prepare("UPDATE charstats SET life = life + :damage WHERE charname= :charname");
				$stmt->execute(array(':damage' => $damage, ':charname' => $charname));
  }
//*********chance to cause bleeding
$rand=mt_rand(1,100);
if ($sbleed+$bbleed>$rand) {
$bleedcount=3;
$bleeddamage=mt_rand(1,10);
$bleeddamage = $bleeddamage + $damage;
$report=$report."<span class=\"green\">You seriously wound your enemy, causing bleeding and inflicting <b>".$bleeddamage."<b> damage!</span></br>";
}

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


?>