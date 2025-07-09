<?php
//AFTER LOOT! or FLED! or I DIED!
$report = $report.'FIGHT OVER! <a class="small" style="width: auto" href="../maingraphics.php">Back<a>';
//*********************update eventlog***************
$stmt = $db->prepare("UPDATE enemy SET event = CONCAT(IFNULL(event,''), :report) WHERE charname= :charname");
				$stmt->execute(array(':report' => $report, ':charname' => $charname));
//UPDATE FIGHTLOG AND END FIGHT
$stmt = $db->prepare('UPDATE enemy SET fight=0 WHERE charname= :charname');
	$stmt->execute(array(':charname' => $charname));
$stmt = $db->prepare("SELECT event FROM enemy WHERE charname=:charname");
				$stmt->execute(array(':charname' => $charname));
while($row = $stmt->fetch()) {
	$event = $row['event'];
}
$stmt = $db->prepare('INSERT INTO fightlogs (charname,logcontent,enemyname,enemylevel,outcome) VALUES (:charname, :event, :enemyname, :enemylevel, :outcome)') ;
	$stmt->execute(array(
		':charname' => $charname,
		':event' => $event,
		':enemyname' => $enemyname,
		':enemylevel' => $enemylevel,
		':outcome' => $outcome		
	));
?>