<?php 
$stmt = $db->prepare('UPDATE enemy SET enemylife=enemylife-:damage WHERE charname= :charname');
	$stmt->execute(array(':damage' => $damage, ':charname' => $charname));
	?>