<?php
include ('includes/zeroinv.php');

$rand=mt_rand(1,2);

if ($rand==1)
{

if (!$lifepotion1)
{
$itemname="Life Potion 1";
$itemdescription="This potion restores life points.";
$itemtype="Potion";
$itemimage="lifepotion";
$itemlevel=1;
$itemrarity="Common";
$itemvalue=1;
$keep=3;
$consumable=1;
$combatuse=1;
$singleuse=1;
$othertype="Blessing";
$enhancement1="Life +15";
include ('includes/addinv.php');
}

else
{
$itemname="Life Potion 1";
$itemimage="lifepotion";
$keep=3;
include ('includes/updateinv.php');
}
}

if ($rand==2)
{

if (!$ddisease1)
{
$itemname="Dreaded Disease 1";
$itemdescription="This potion can be used to inflict disease damage onto your enemy.";
$itemtype="Potion";
$itemimage="diseasepot";
$itemlevel=1;
$itemrarity="Common";
$itemvalue=1;
$keep=3;
$combatuse=1;
$singleuse=1;
$othertype="Curse";
$enhancement1="Life -15";
include ('includes/addinv.php');
}

else
{

$itemimage="diseasepot";
$itemname="Dreaded Disease 1";
$keep=3;
include ('includes/updateinv.php');

}

}

?>