<?php
$stmt5 = $db->prepare('insert into cookbook (charname) values (:charname)');
				$stmt5->execute(array(':charname' => $charname));
?>