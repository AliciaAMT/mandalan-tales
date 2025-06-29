<?php
$stmt = $db->prepare('UPDATE charstats SET life=life-:damage WHERE charname= :charname');
	$stmt->execute(array(':damage' => $enemydamage, ':charname' => $charname));
	?>