<?php
$stmt = $db->prepare("SELECT magicfind FROM charstats WHERE charname=:charname;");
				$stmt->execute(array(':charname' => $charname));
				
while($row = $stmt->fetch())
{
$magicfind=$row['magicfind'];
$magicfind=$magicfind+$bmagicfind;
}
?>