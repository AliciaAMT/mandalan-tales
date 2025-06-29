<?php 
$stmt = $db->prepare("SELECT event FROM enemy WHERE charname=:charname");
				$stmt->execute(array(':charname' => $charname));
while($row = $stmt->fetch())
{
	$event = $row['event'];
}
?>