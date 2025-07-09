<?php
$stmt = $db->prepare('UPDATE charstats SET level = level + 1 WHERE charname = :charname') ;
					$stmt->execute(array(':charname' => $charname));
$stmt = $db->prepare('UPDATE charstats SET skillpoints = skillpoints + 3 WHERE charname = :charname') ;
					$stmt->execute(array(':charname' => $charname));
$stmt = $db->prepare('UPDATE charstats SET maxlife = maxlife + 3 WHERE charname = :charname') ;
					$stmt->execute(array(':charname' => $charname));
$stmt = $db->prepare('UPDATE charstats SET life = life + 3 WHERE charname = :charname') ;
					$stmt->execute(array(':charname' => $charname));
$stmt = $db->prepare('UPDATE charstats SET maxmana = maxmana + 3 WHERE charname = :charname') ;
					$stmt->execute(array(':charname' => $charname));
$stmt = $db->prepare('UPDATE charstats SET mana = mana + 3 WHERE charname = :charname') ;
					$stmt->execute(array(':charname' => $charname));
?>
