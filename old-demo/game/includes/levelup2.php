<?php
$stmt = $db->prepare('UPDATE charstats SET accuracy = accuracy + 2 WHERE charname = :charname') ;
					$stmt->execute(array(':charname' => $charname));
$stmt = $db->prepare('UPDATE charstats SET wisdom = wisdom + 2 WHERE charname = :charname') ;
					$stmt->execute(array(':charname' => $charname));
$stmt = $db->prepare('UPDATE charstats SET luck = luck + 2 WHERE charname = :charname') ;
					$stmt->execute(array(':charname' => $charname));

?>