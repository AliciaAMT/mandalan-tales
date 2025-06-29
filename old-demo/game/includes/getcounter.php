<?php 
$stmt = $db->prepare("SELECT * FROM counters WHERE charname=:charname");
				$stmt->execute(array(':charname' => $charname));
while($row = $stmt->fetch())
{
$ebleed = $row['ebleed'];
$eheld = $row['eheld'];
$einferno = $row['einferno'];
$efrozen = $row['efrozen'];
$estunned = $row['estunned'];
$epoisoned = $row['epoisoned'];
$held = $row['held'];
$bleeding = $row['bleeding'];
$inferno = $row['inferno'];
$frozen = $row['frozen'];
$stunned = $row['stunned'];
$poisoned = $row['poisoned'];
}
?>