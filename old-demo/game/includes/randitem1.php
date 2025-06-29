<?php
//************NOT FINISHED!!!********************************
//**************getmagicfind*********************************
include ('includes/getmagicfind.php');
//**************getlevel*********************************
include ('includes/getlevel.php');
// includezeroinventory instead*****************************
include ('includes/zeroinv.php');
//*******single equipable items only************
$keep=1;
$equipable=1;
$rand=mt_rand(1,5);
$itemlevel=$level-$rand+5;
$rand=mt_rand(1,150);
$rand=$rand-$magicfind;
if ($rand<5) {
//legendary or set items???&&&&&&&&&&&&&&&&&&&&&&&&&&&
$itemname="Belt of the Warrior";
$itemdescription="Stories revolve around this legendary belt. It is said it has special powers that enhance a persons's life force as well as their mind.";
$itemtype="Accessory";
$itemimage="beltowar";
//calculate level of item according to level of player
$itemrarity="Legendary";
//create value calculation
$itemvalue=$itemlevel*1500000;
$equiplocation="Waist";
$acctype="Belt";
$accbase=$itemlevel*2;
$enhancement1="Adds to Life Force.";
$enhancement2="Adds to Mind's Force.";
$legendary=1;
$bonus=$itemlevel*.5;
$bonus=round($bonus);
$life=$level+$itemlevel+$bonus;
$mana=$level+$itemlevel+$bonus;
}
else {
if ($rand<15) {
//ultra-rare item??
$itemrarity="Ultra-Rare";
//*************getitemtype***************
include ('includes/getitemtype.php');
//**********endgetitemtype**************
$itemvalue=$itemvalue*4;
include ('includes/enhance.php');
include ('includes/enhance2.php');
include ('includes/enhance3.php');
}
else {
if ($rand<25) {
//rare item ?????*****************************************************
$itemrarity="Rare";
include ('includes/getitemtype.php');
$itemvalue=$itemvalue*3;
include ('includes/enhance.php');
include ('php/enhance2.php');
}
else {
if ($rand<50) {
//uncommon
$itemrarity="Uncommon";
include ('includes/getitemtype.php');
$itemvalue=$itemvalue*2;
include ('includes/enhance.php');
}
else {
//common item
include ('includes/getitemtype.php');
}
}
}
}
include ('includes/addinv.php');
?>