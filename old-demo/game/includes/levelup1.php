<?php 
$stmt = $db->prepare('UPDATE charstats SET strength = strength + 2 WHERE charname = :charname') ;
					$stmt->execute(array(':charname' => $charname));
$stmt = $db->prepare('UPDATE charstats SET agility=agility+2 WHERE charname = :charname') ;
					$stmt->execute(array(':charname' => $charname));
$stmt = $db->prepare('UPDATE charstats SET speed = speed + 2 WHERE charname = :charname') ;
					$stmt->execute(array(':charname' => $charname));
?>