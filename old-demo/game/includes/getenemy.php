<?php
$fight = 0;
$stmt = $db->prepare("SELECT fight FROM enemy WHERE charname=:charname;");
				$stmt->execute(array(':charname' => $charname));
while($row = $stmt->fetch())
	{
	$fight = $fight + $row['fight'];
	}
	?>