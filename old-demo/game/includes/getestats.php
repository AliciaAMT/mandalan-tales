<?php
//*****get estats**************
$enemylevel=0;
$enemyarmor=0;
$estrength=0;
$eaccuracy=0;
$espeed=0;
$eagility=0;
$ewisdom=0;
$eluck=0;
$efireresist=0;
$ewaterresist=0;
$eairresist=0;
$eearthresist=0;
$ecriticalresist=0;
$emindresist=0;
$eholdresist=0;
$ebleedresist=0;
$edarkresist=0;
$elightresist=0;
$stmt = $db->prepare("SELECT * FROM enemy WHERE charname=:charname");
				$stmt->execute(array(':charname' => $charname));
while($row = $stmt->fetch())
  {
	$fight = $row['fight'];
	$enemy = $row['enemy'];
	$enemyname = $row['enemyname'];
	$enemylife = $row['enemylife'];
	$enemymaxlife = $row['enemymaxlife'];
	$enemymana = $row['enemymana'];
	$enemymaxmana = $row['enemymaxmana'];
	$enemycondition = $row['enemycondition'];
	$enemyatt1 = $row['enemyatt1'];
	$enemyatt1dam = $row['enemyatt1dam'];
	$enemyatt2 = $row['enemyatt2'];
	$enemyatt2dam = $row['enemyatt2dam'];
	$enemypower = $row['enemypower'];
	$event = $row['event'];
	$enemylevel=$enemylevel+$row['enemylevel'];
$enemyarmor=$enemyarmor+$row['enemyarmor'];
$estrength=$estrength+$row['enemystrength'];
$eaccuracy=$eaccuracy+$row['enemyaccuracy'];
$espeed=$espeed+$row['enemyspeed'];
$eagility=$eagility+$row['enemyagility'];
$ewisdom=$ewisdom+$row['enemywisdom'];
$eluck=$eluck+$row['enemyluck'];
$efireresist=$efireresist+$row['efireresist'];
$ewaterresist=$ewaterresist+$row['ewaterresist'];
$eairresist=$eairresist+$row['eairresist'];
$eearthresist=$eearthresist+$row['eearthresist'];
$ecriticalresist=$ecriticalresist+$row['ecriticalresist'];
$emindresist=$emindresist+$row['emindresist'];
$eholdresist=$eholdresist+$row['eholdresist'];
$ebleedresist=$ebleedresist+$row['ebleedresist'];
$edarkresist=$edarkresist+$row['edarkresist'];
$elightresist=$elightresist+$row['elightresist'];
  }
  
  ?>
