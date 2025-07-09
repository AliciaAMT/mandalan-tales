<?php
$stmt = $db->prepare('UPDATE charstats SET strength = strength + 1 WHERE charname = :charname') ;
					$stmt->execute(array(':charname' => $charname));
$stmt = $db->prepare('UPDATE charstats SET agility=agility+1 WHERE charname = :charname') ;
					$stmt->execute(array(':charname' => $charname));
$stmt = $db->prepare('UPDATE charstats SET speed = speed + 1 WHERE charname = :charname') ;
					$stmt->execute(array(':charname' => $charname));
$stmt = $db->prepare('UPDATE charstats SET accuracy = accuracy + 1 WHERE charname = :charname') ;
					$stmt->execute(array(':charname' => $charname));
$stmt = $db->prepare('UPDATE charstats SET wisdom = wisdom + 1 WHERE charname = :charname') ;
					$stmt->execute(array(':charname' => $charname));
$stmt = $db->prepare('UPDATE charstats SET luck = luck + 1 WHERE charname = :charname') ;
					$stmt->execute(array(':charname' => $charname));
?>