<?php
$stmt = $db->prepare("UPDATE enemy SET event = CONCAT(IFNULL(event,''), :report) WHERE charname = :charname");
	$stmt->execute(array(':report' => $report, ':charname' => $charname));
header('Location: nomove.php'); die('This site works best with redirections turned on, but you may continue with them turned off. <a href="nomove.php">Continue</a>');
?>				