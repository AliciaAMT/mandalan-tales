<?php
$defense=0;
$stmt = $db->prepare("SELECT equip, armorbase, itemlevel, defense FROM inventory WHERE equip>0 and charname=:charname AND equip > 0");
				$stmt->execute(array(':charname' => $charname));
while($row = $stmt->fetch())
	{
	if ($row['equip']>0 and $row['armorbase']>0)
	{
	$defense=$defense+$row['armorbase']+$row['itemlevel'];
	}
	if ($row['equip']>0)
	{
	$defense=$defense+$row['defense'];
	}
}
?>