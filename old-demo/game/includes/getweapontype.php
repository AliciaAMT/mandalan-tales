<?php
$lhweapontype="None";
$rhweapontype="None";
$dualweapontype="None";
$stmt = $db->prepare("SELECT * FROM inventory WHERE charname=:charname AND equiplocation = 'Weapon' and equip > 0");
				$stmt->execute(array(':charname' => $charname));
while($row = $stmt->fetch())
	{
	if ($row['equiplh']>0)
	{
	$lhweapontype=$row['weapontype'];
	}
	if ($row['equiprh']>0)
	{
	$rhweapontype=$row['weapontype'];
	}
	if ($row['equip']>1 and $row['equiplh']==0 and $row['equiprh']==0)
	{
	$dualweapontype=$row['weapontype'];
	}
	}
?>