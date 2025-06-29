<?php
$damage=0;
$stmt = $db->prepare("SELECT equip, weaponbase, itemlevel, damage FROM inventory WHERE equip>0 and itemtype = 'Weapon' and charname=:charname AND equiplocation = 'Weapon' and equip > 0");
				$stmt->execute(array(':charname' => $charname));
while($row = $stmt->fetch())
	{
	if ($row['equip']>0 and $row['weaponbase']>0)
	{
	$damage=$damage+$row['weaponbase']+$row['itemlevel'];
	}
//**************DO THIS LATER*********
//	if ($row['equip']>0)
//  {
//	$damage=$damage+$row['damage'];
//	}
}
?>