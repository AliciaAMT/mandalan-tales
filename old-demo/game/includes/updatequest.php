<?php

$stmt = $db->prepare('UPDATE flags SET :flagname = :flagnumber WHERE charname= :charname') ;
					$stmt->execute(array(':flagname' => $flagname, ':flagnumber' => $flagnumber,':charname' => $charname)); 
$stmt = $db->prepare('UPDATE charstats SET experience = experience + :experienceamt WHERE charname= :charname') ;
					$stmt->execute(array(':experienceamt' => $experienceamt, ':charname' => $charname));
					?>