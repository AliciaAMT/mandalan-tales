<?php
//include config
require_once( $_SERVER['DOCUMENT_ROOT'] . '/game/includes/config2.php');
//if not logged in redirect to login page
if(!$user->is_logged_in()){ header('Location: ../login.php'); die('This site works best with redirections turned on, but you may continue with them turned off. <a href="login.php">Continue</a>');}
$username = $_SESSION['username'];
$charname= $_SESSION['charname'];
?>
<?php
include ('php/getfight.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Mandalan Tales RPG</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="RPG Role Playing Game - Interactive Fiction">
  <meta name="keywords" content="rpg, role-playing game, interactive fiction, text, graphics, old-school, browser based game ">
  <meta name="author" content="TheWayMedia">
<link rel="shortcut icon" href="/favicon.ico?" type="image/x-icon">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
<!--style sheet-->
<link href="https://www.w3schools.com/w3css/4/w3.css" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Frank+Ruhl+Libre:400,500|Philosopher" rel="stylesheet"></link>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="../main.css?<?php echo time(); ?>" rel="stylesheet"></link>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
<script>
window.onload = function () {
    var contentcollapse1 = localStorage.getItem("contentcollapse1");
	var contentcollapse2 = localStorage.getItem("contentcollapse2");
	var contentcollapse3 = localStorage.getItem("contentcollapse3");
	var contentcollapse4 = localStorage.getItem("contentcollapse4");
	var contentcollapse5 = localStorage.getItem("contentcollapse5");
	var contentcollapse6 = localStorage.getItem("contentcollapse6");
	var contentcollapse7 = localStorage.getItem("contentcollapse7");
	var contentcollapse8 = localStorage.getItem("contentcollapse8");
    if (contentcollapse1==="true") {
        openContentcollapse1();
    } else {
        closeContentcollapse1();
    }
	if (contentcollapse2==="true") {
        openContentcollapse2();
    } else {
        closeContentcollapse2();
    }
	if (contentcollapse3==="true") {
        openContentcollapse3();
    } else {
        closeContentcollapse3();
    }
	if (contentcollapse4==="true") {
        openContentcollapse4();
    } else {
        closeContentcollapse4();
    }
	if (contentcollapse5==="true") {
        openContentcollapse5();
    } else {
        closeContentcollapse5();
    }
	if (contentcollapse6==="true") {
        openContentcollapse6();
    } else {
        closeContentcollapse6();
    }
	if (contentcollapse7==="true") {
        openContentcollapse7();
    } else {
        closeContentcollapse7();
    }
	if (contentcollapse8==="true") {
        openContentcollapse8();
    } else {
        closeContentcollapse8();
    }
    }
function checkContentcollapse1() {
    var contentcollapse1 = localStorage.getItem("contentcollapse1");
        if (contentcollapse1==="true") {
        closeContentcollapse1();
    } else {
        openContentcollapse1();
    }
    }   
function checkContentcollapse2() {
    var contentcollapse2 = localStorage.getItem("contentcollapse2");
        if (contentcollapse2==="true") {
        closeContentcollapse2();
    } else {
        openContentcollapse2();
    }
    }
function checkContentcollapse4() {
    var contentcollapse4 = localStorage.getItem("contentcollapse4");
        if (contentcollapse4==="true") {
        closeContentcollapse4();
    } else {
        openContentcollapse4();
    }
    }
function checkContentcollapse3() {
    var contentcollapse3 = localStorage.getItem("contentcollapse3");
        if (contentcollapse3==="true") {
        closeContentcollapse3();
    } else {
        openContentcollapse3();
    }
    }
function checkContentcollapse5() {
    var contentcollapse5 = localStorage.getItem("contentcollapse5");
        if (contentcollapse5==="true") {
        closeContentcollapse5();
    } else {
        openContentcollapse5();
    }
    }  
function checkContentcollapse6() {
    var contentcollapse6 = localStorage.getItem("contentcollapse6");
        if (contentcollapse6==="true") {
        closeContentcollapse6();
    } else {
        openContentcollapse6();
    }
    }  
function checkContentcollapse7() {
    var contentcollapse7 = localStorage.getItem("contentcollapse7");
        if (contentcollapse7==="true") {
        closeContentcollapse7();
    } else {
        openContentcollapse7();
    }
    }  
function checkContentcollapse8() {
    var contentcollapse8 = localStorage.getItem("contentcollapse8");
        if (contentcollapse8==="true") {
        closeContentcollapse8();
    } else {
        openContentcollapse8();
    }
    }  	
function openContentcollapse1() {
	document.getElementById("contentcollapse1").style.display = "block";
    localStorage.setItem("contentcollapse1", "true");
}
function openContentcollapse2() {
	document.getElementById("contentcollapse2").style.display = "block";
    localStorage.setItem("contentcollapse2", "true");
}
function openContentcollapse3() {
	document.getElementById("contentcollapse3").style.display = "block";
    localStorage.setItem("contentcollapse3", "true");
}
function openContentcollapse4() {
	document.getElementById("contentcollapse4").style.display = "block";
    localStorage.setItem("contentcollapse4", "true");
}
function openContentcollapse8() {
	document.getElementById("contentcollapse8").style.display = "block";
    localStorage.setItem("contentcollapse8", "true");
}
function openContentcollapse5() {
	document.getElementById("contentcollapse5").style.display = "block";
    localStorage.setItem("contentcollapse5", "true");
}
function openContentcollapse6() {
	document.getElementById("contentcollapse6").style.display = "block";
    localStorage.setItem("contentcollapse6", "true");
}
function openContentcollapse7() {
	document.getElementById("contentcollapse7").style.display = "block";
    localStorage.setItem("contentcollapse7", "true");
}
function closeContentcollapse1() {
    document.getElementById("contentcollapse1").style.display = "none";
    localStorage.setItem("contentcollapse1", "false");
}
function closeContentcollapse2() {
    document.getElementById("contentcollapse2").style.display = "none";
    localStorage.setItem("contentcollapse2", "false");
}
function closeContentcollapse3() {
    document.getElementById("contentcollapse3").style.display = "none";
    localStorage.setItem("contentcollapse3", "false");
}
function closeContentcollapse4() {
    document.getElementById("contentcollapse4").style.display = "none";
    localStorage.setItem("contentcollapse4", "false");
}
function closeContentcollapse5() {
    document.getElementById("contentcollapse5").style.display = "none";
    localStorage.setItem("contentcollapse5", "false");
}
function closeContentcollapse6() {
    document.getElementById("contentcollapse6").style.display = "none";
    localStorage.setItem("contentcollapse6", "false");
}
function closeContentcollapse7() {
    document.getElementById("contentcollapse7").style.display = "none";
    localStorage.setItem("contentcollapse7", "false");
}
function closeContentcollapse8() {
    document.getElementById("contentcollapse8").style.display = "none";
    localStorage.setItem("contentcollapse8", "false");
}
</script>
</head>
<body>
<div class="container-fluid" style="margin: 0px 0px 0px 0px;">
<div class="row">
<div class="col-sm-6" style="text-align: center; margin: 0px 0px 0px 0px; height: 100vh; overflow: overlay;">
<!--container for collapsible menu equipped itemw-->
<div class="container" style="text-align: center; margin: 0px 0px 0px 0px; padding: 0px 0px 0px 0px; width: 96%;">
<div class="row" style="text-align: center;">
<div class="col-sm-12" style="text-align: center; padding: 0px 0px 0px 0px; margin: 0px 0px 0px 0px;">
<!--collapse title and button-->
<button class="collapsible1" style="border: 1px solid #c9a682;padding: 5px 5px 5px 5px; margin: 0px 0px 0px 0px; color: black; text-align: center; background-color: transparent; background-image: linear-gradient(cornsilk, #c9a682);" onclick="checkContentcollapse5()">Keep Pocket</button>
<div id="contentcollapse5" class="contentcollapse5" style="text-align: center; padding: 5px; margin: 0px 0px 0px 0px; background-color: transparent; background-image: linear-gradient(cornsilk, #c9a682);">
<div class="container-fluid" style=" border: 1px solid #c9a682; border-radius: 3rem; background-color: black; margin: 0px; text-align: center">
<div class="container-fluid">
<div class="row">
<div class="col-sm-12">
<a class="small" href="keep.php?<?php echo time(); ?>">All</a>
</div>
</div>
<div class="row">
<div class="col-sm-6">
<form action="inventory.php?<?php echo time(); ?>" method="post"><input class="invisible" type="radio" name="type" checked="checked" value="Weapon" /><input class="small" type="submit" value="Weapons" /></form>
</div>
<div class="col-sm-6">
<form action="inventory.php?<?php echo time(); ?>" method="post"><input class="invisible" type="radio" name="type" checked="checked" value="Armor" /><input class="small" type="submit" value="Armor" /></form>
</div>
</div>
<div class="row">
<div class="col-sm-6">
<form action="inventory.php?<?php echo time(); ?>" method="post"><input class="invisible" type="radio" name="type" checked="checked" value="Accessory" /><input class="small" type="submit" value="Accessories" /></form>
</div>
<div class="col-sm-6">
<form action="inventory.php?<?php echo time(); ?>" method="post"><input class="invisible" type="radio" name="type" checked="checked" value="Other" /><input class="small" type="submit" value="Other" /></form>
</div>
</div>
</div>
<div class="container-fluid">
<div class="row">
<div class="col-sm-12" style="font-size: 15px">
<?php
//**********equip items according to itemnumber**********

if (isset($_GET)) {
$equipnumber = 0;//****new equip***
$equiplhnumber=0;
$equiprhnumber=0;
$tradenumber = 0;
$equipnumber=strip_tags($_GET["equip"]);
$tradenumber=strip_tags($_GET["trade"]);
$equiplhnumber=strip_tags($_GET["equiplh"]);
$equiprhnumber=strip_tags($_GET["equiprh"]);

if ($equipnumber!=0)
{
$stmt = $db->prepare("SELECT itemnumber, equiplocation FROM inventory WHERE charname=:charname;");
				$stmt->execute(array(':charname' => $charname));
while($row = $stmt->fetch())
{
if ($row['itemnumber']==$equipnumber)
{
$location=$row['equiplocation'];
}
}
if ($location=="Finger")
{
$ring=0;
$stmt = $db->prepare("SELECT * from inventory where equip>0 and equiplocation = 'Finger' and charname=:charname;");
				$stmt->execute(array(':charname' => $charname));
while($row = $stmt->fetch())
	{
$ring=$ring+$row['equip'];
}
//*************************************************
if ($ring>3)
{
die ("You already have 4 rings equipped. You must unequip one before you can wear another.<br /><table class=\"page\"><tr><td class=\"page\"><form action=\"inventory.php?".time()."\" method=\"post\"><input class=\"small\" type=\"submit\" value=\"Continue\" /></form></td></tr></table></body></html>");
}
if ($ring<4)
{
$stmt = $db->prepare('UPDATE inventory SET equip = 1, equiplh = 0, equiprh = 0, keep = 0 WHERE charname = :charname and itemnumber = :equipnumber and keep = 1') ;
					$stmt->execute(array(':charname' => $charname, ':equipnumber' => $equipnumber));     
  }
}
if ($location!="Finger")
{
//*********remove equipped item to make room for new*********
$stmt = $db->prepare('UPDATE inventory SET equip = 0, equiplh = 0, equiprh = 0, keep = 1 WHERE charname = :charname and equiplocation = :location and equip = 1') ;
					$stmt->execute(array(':charname' => $charname, ':location' => $location));
}
//**********************equip item************************
$stmt = $db->prepare('UPDATE inventory SET equip = 1, keep = 0 WHERE charname = :charname and itemnumber = :equipnumber') ;
					$stmt->execute(array(':charname' => $charname, ':equipnumber' => $equipnumber));     
$stmt = $db->prepare("SELECT itemtype from inventory where itemnumber = :equipnumber and charname=:charname;");
				$stmt->execute(array(':equipnumber' => $equipnumber,':charname' => $charname));
while($row = $stmt->fetch())
	{
if ($row['itemtype']=="Weapon")
{
$stmt = $db->prepare('UPDATE inventory SET equip = 0, keep = 1 WHERE charname = :charname and equip = 1 and itemtype = "Weapon" and duality = 1') ;
					$stmt->execute(array(':charname' => $charname)); 
}
}
}
if ($tradenumber!=0)
{
$stmt = $db->prepare('UPDATE inventory SET equip = 0, equiplh = 0, equiplh = 0, keep = 0, trade = 1 WHERE charname= :charname AND itemnumber = :tradenumber') ;
					$stmt->execute(array(':charname' => $charname, ':tradenumber' => $tradenumber));
}
if ($equiplhnumber!=0)
{
$stmt = $db->prepare('UPDATE inventory SET equip = 0, keep = 1 WHERE charname= :charname AND equip = 1 and itemtype = "Weapon" and duality = 0');
					$stmt->execute(array(':charname' => $charname));	
$stmt = $db->prepare('UPDATE inventory SET equip = 0, equiplh = 0, equiprh = 0, keep = 1 WHERE charname= :charname AND equiplh = 1 and equip = 1');
					$stmt->execute(array(':charname' => $charname));
$stmt = $db->prepare('UPDATE inventory SET equip = 1, equiplh = 1, keep = 0 WHERE charname= :charname AND itemnumber = :equiplhnumber');
					$stmt->execute(array(':charname' => $charname, ':equiplhnumber' => $equiplhnumber));
}
if ($equiprhnumber!=0)
{
$stmt = $db->prepare('UPDATE inventory SET equip = 0, keep = 1 WHERE charname= :charname AND equip = 1 and itemtype = "Weapon" and duality = 0');
					$stmt->execute(array(':charname' => $charname));
$stmt = $db->prepare('UPDATE inventory SET equip = 0, equiprh = 0, equiplh = 0, keep = 1 WHERE charname= :charname AND equiprh = 1 and equip = 1');
					$stmt->execute(array(':charname' => $charname));
$stmt = $db->prepare('UPDATE inventory SET equip = 1, equiprh = 1, keep = 0 WHERE charname= :charname AND itemnumber = :equiprhnumber');
					$stmt->execute(array(':charname' => $charname, ':equiprhnumber' => $equiprhnumber));
}
}
//************display only types of items or all according to form**********
$type=strip_tags($_POST["type"]);
if (!$type)
{
$stmt = $db->prepare("SELECT * FROM inventory WHERE charname=:charname and keep>0 and itemtype != 'Food' ORDER BY equipable desc, itemtype desc, weapontype, itemlevel desc, itemrarity desc");
				$stmt->execute(array(':charname' => $charname));
while($row = $stmt->fetch())
{
	include ('../includes/displayinv.php');
}

}
else
{
$stmt = $db->prepare("SELECT * FROM inventory WHERE charname=:charname and keep>0 and itemtype = :type order by itemtype, weapontype, itemlevel desc, itemrarity");
				$stmt->execute(array(':charname' => $charname,
				':type' => $type
				));
while($row = $stmt->fetch())
{
	include ('../includes/displayinv.php');
}
?>
</div>
</div>
</div>
</div>
</div>
<!--trade pocket-->
<button class="collapsible1" style="border: 1px solid #c9a682;padding: 5px; margin: 0px;color: black; text-align: center; background-color: transparent; background-image: linear-gradient(cornsilk, #c9a682);" onclick="checkContentcollapse6()">Trade Pocket</button>
<div id="contentcollapse6" class="contentcollapse6" style="padding: 5px; margin: 0px; background-color: transparent; background-image: linear-gradient(cornsilk, #c9a682);">
<div class="container-fluid" style=" border: 1px solid #c9a682; border-radius: 3rem; background-color: black; margin: 0px;">
<div class="row">
<div class="col-sm-4">
<h6>Head</h6>
</div>
<div class="col-sm-4">
<h6>Back</h6>
</div>
<div class="col-sm-4">
<h6>Chest</h6>
</div>
<div class="col-sm-4">
<h6>Legs</h6>
</div>
<div class="col-sm-4">
<h6>Hands</h6>
</div>
<div class="col-sm-4">
<h6>Feet</h6>
</div>
</div>
</div>
</div>
<!--Food pocket-->
<button class="collapsible1" style="border: 1px solid #c9a682;padding: 5px 5px 5px 5px; margin: 0px 0px 0px 0px;color: black; text-align: center; background-color: transparent; background-image: linear-gradient(cornsilk, #c9a682);" onclick="checkContentcollapse7()">Food Pocket</button>
<div id="contentcollapse7" class="contentcollapse7" style="padding: 5px 5px 5px 5px; margin: 0px 0px 0px 0px; background-color: transparent; background-image: linear-gradient(cornsilk, #c9a682);text-align: center;">
<div class="container-fluid" style="text-align: center; border: 1px solid #c9a682; border-radius: 3rem; background-color: black; padding: 0px 0px 0px 0px; margin: 0px 0px 0px 0px;">
<div class="row">
<div class="col-sm-6">
<h6 style="font-size: 10px;">Left Hand</h6>
<?php 
//***********get weapontype*********
$stmt = $db->prepare("SELECT * FROM inventory WHERE charname=:charname and equip>0 and duality>0 ORDER BY itemtype desc, weapontype, itemlevel desc, itemrarity desc");
				$stmt->execute(array(':charname' => $charname));
while($row = $stmt->fetch())
{

echo "<table><tr><td class=\"center\" style=\"font-size: 10px\">

<img style=\"width: 90%; height: auto;\" src=\"../images/".$row['itemimage'].".png\" /><br />".$row['itemname']."<br />Level ".$row['itemlevel']."<br />".$row['itemrarity'];
if ($row['keep']>1)

{
echo "<br />Amount: ".$row['keep'];
}
//display enchantable, transmutable, or adjustable
if ($row['enchantment1']>0)
{

echo "<br />Enchantable";

}
if ($row['transmute1']>0)
{

echo "<br />Transmutable";

}
if ($row['adjustable']>0)
{

echo "<br />Adjustable";

}
echo "</td></tr><tr><td>
<table class=\"page\" style=\"font-size: 10px\"><tr><td class=\"right\" style=\"padding: 3px; margin: 0px 0px 0px 0px;\">Description: </td><td class=\"left\" style=\"padding: 3px; margin: 0px 0px 0px 0px;\">".$row['itemdescription'];
echo "</td></tr><tr><td class=\"right\" style=\"padding: 3px; margin: 0px 0px 0px 0px;\">Item Type: </td><td class=\"left\" style=\"padding: 3px; margin: 0px 0px 0px 0px;\">".$row['itemtype']."</td></tr>";
if ($row['itemtype']=="Weapon")
{

echo "<tr><td class=\"right\" style=\"padding: 3px; margin: 0px 0px 0px 0px;\">Weapon Type:</td><td class=\"left\" style=\"padding: 3px; margin: 0px 0px 0px 0px;\">".$row['weapontype']."</td></tr>";

echo "<tr><td class=\"right\" style=\"padding: 3px; margin: 0px 0px 0px 0px;\">Range:</td><td class=\"left\" style=\"padding: 0px 0px 0px 0px; margin: 0px 0px 0px 0px;\">".$row['itemrange']."</td></tr>";

echo "<tr><td class=\"right\">Speed:</td><td class=\"left\">".$row['itemspeed']."</td></tr>";

echo "<tr><td class=\"right\">Dualwield:</td><td class=\"left\">";

	if ($row['duality']==0)

	{ echo "No</td></tr>";}

	if ($row['duality']>0)

	{ echo "Yes</td></tr>";}

$damage=$row['weaponbase']+$row['itemlevel'];

echo "<tr><td class=\"right\">Damage:</td><td class=\"left\">".$damage."</td></tr>";

}
if ($row['enhancement1']!="None")
{

	echo "<tr><td class=\"center\" colspan=\"2\"><h3>Enhancements</h3></td></tr><tr><td class=\"left\" colspan=\"2\">".$row['enhancement1']."</td></tr>";

	}
if ($row['enhancement2']!="None")
{

	echo "<tr><td class=\"left\" colspan=\"2\">".$row['enhancement2']."</td></tr>";

	}
if ($row['enhancement3']!="None")
{

	echo "<tr><td class=\"left\" colspan=\"2\">".$row['enhancement3']."</td></tr>";

	}
if ($row['itemvalue']>0)
{
echo "<tr><td class=\"right\">Value:</td><td class=\"left\">".$row['itemvalue']." Gold</td></tr>";
}
echo "</table>";
echo "<table class=\"page\"><tr><td class=\"page\">";
echo "<form name=\"keep\" action=\"equip.php?".time();
echo "\" method=\"get\"><input class=\"invisible\" type=\"radio\" name=\"keep\" checked=\"checked\" value=\"".$row['itemnumber'];
echo "\"><br /><input type=\"submit\" value=\"Unequip\" class=\"small\" style=\"font-size: 10px;\"></form></td></tr><tr><td class=\"page\"><form name=\"trade\" action=\"equip.php?".time();

  echo "\" method=\"get\"><input class=\"invisible\" type=\"radio\" name=\"trade\" checked=\"checked\" value=\"".$row['itemnumber'];

  echo "\"><br /><input type=\"submit\" value=\"Trade\" class=\"small\" style=\"font-size: 10px;\"></form>";

  echo "</td></tr></table>";

  echo "</td></tr>";
echo "</table>";
}






$stmt = $db->prepare("SELECT * FROM inventory WHERE charname=:charname and equip>0 and equiplh>0 ORDER BY itemtype desc, weapontype, itemlevel desc, itemrarity desc");
				$stmt->execute(array(':charname' => $charname));
while($row = $stmt->fetch())
{

echo "<table><tr><td class=\"center\" style=\"font-size: 10px\">

<img style=\"width: 90%; height: auto;\" src=\"../images/".$row['itemimage'].".png\" /><br />".$row['itemname']."<br />Level ".$row['itemlevel']."<br />".$row['itemrarity'];
if ($row['keep']>1)

{
echo "<br />Amount: ".$row['keep'];
}
//display enchantable, transmutable, or adjustable
if ($row['enchantment1']>0)
{

echo "<br />Enchantable";

}
if ($row['transmute1']>0)
{

echo "<br />Transmutable";

}
if ($row['adjustable']>0)
{

echo "<br />Adjustable";

}
echo "</td></tr><tr><td>
<table class=\"page\" style=\"font-size: 10px\"><tr><td class=\"right\" style=\"padding: 3px; margin: 0px 0px 0px 0px;\">Description: </td><td class=\"left\" style=\"padding: 3px; margin: 0px 0px 0px 0px;\">".$row['itemdescription'];
echo "</td></tr><tr><td class=\"right\" style=\"padding: 3px; margin: 0px 0px 0px 0px;\">Item Type: </td><td class=\"left\" style=\"padding: 3px; margin: 0px 0px 0px 0px;\">".$row['itemtype']."</td></tr>";
if ($row['itemtype']=="Weapon")
{

echo "<tr><td class=\"right\" style=\"padding: 3px; margin: 0px 0px 0px 0px;\">Weapon Type:</td><td class=\"left\" style=\"padding: 3px; margin: 0px 0px 0px 0px;\">".$row['weapontype']."</td></tr>";

echo "<tr><td class=\"right\" style=\"padding: 3px; margin: 0px 0px 0px 0px;\">Range:</td><td class=\"left\" style=\"padding: 0px 0px 0px 0px; margin: 0px 0px 0px 0px;\">".$row['itemrange']."</td></tr>";

echo "<tr><td class=\"right\">Speed:</td><td class=\"left\">".$row['itemspeed']."</td></tr>";

echo "<tr><td class=\"right\">Dualwield:</td><td class=\"left\">";

	if ($row['duality']==0)

	{ echo "No</td></tr>";}

	if ($row['duality']>0)

	{ echo "Yes</td></tr>";}

$damage=$row['weaponbase']+$row['itemlevel'];

echo "<tr><td class=\"right\">Damage:</td><td class=\"left\">".$damage."</td></tr>";

}
if ($row['enhancement1']!="None")
{

	echo "<tr><td class=\"center\" colspan=\"2\"><h3>Enhancements</h3></td></tr><tr><td class=\"left\" colspan=\"2\">".$row['enhancement1']."</td></tr>";

	}
if ($row['enhancement2']!="None")
{

	echo "<tr><td class=\"left\" colspan=\"2\">".$row['enhancement2']."</td></tr>";

	}
if ($row['enhancement3']!="None")
{

	echo "<tr><td class=\"left\" colspan=\"2\">".$row['enhancement3']."</td></tr>";

	}
if ($row['itemvalue']>0)
{
echo "<tr><td class=\"right\">Value:</td><td class=\"left\">".$row['itemvalue']." Gold</td></tr>";
}
echo "</table>";
echo "<table class=\"page\"><tr><td class=\"page\">";
echo "<form name=\"keep\" action=\"equip.php?".time();
echo "\" method=\"get\"><input class=\"invisible\" type=\"radio\" name=\"keep\" checked=\"checked\" value=\"".$row['itemnumber'];
echo "\"><br /><input type=\"submit\" value=\"Unequip\" class=\"small\" style=\"font-size: 10px;\"></form></td></tr><tr><td class=\"page\"><form name=\"trade\" action=\"equip.php?".time();

  echo "\" method=\"get\"><input class=\"invisible\" type=\"radio\" name=\"trade\" checked=\"checked\" value=\"".$row['itemnumber'];

  echo "\"><br /><input type=\"submit\" value=\"Trade\" class=\"small\" style=\"font-size: 10px;\"></form>";

  echo "</td></tr></table>";

  echo "</td></tr>";
echo "</table>";
}
?>
</div>
<div class="col-sm-6">
<h6 style="font-size: 10px;">Right Hand</h6>
<?php 
//***********get weapontype*********
$stmt = $db->prepare("SELECT * FROM inventory WHERE charname=:charname and equip>0 and duality>0 ORDER BY itemtype desc, weapontype, itemlevel desc, itemrarity desc");
				$stmt->execute(array(':charname' => $charname));
while($row = $stmt->fetch())
{

echo "<table><tr><td class=\"center\" style=\"font-size: 10px\">

<img style=\"width: 90%; height: auto;\" src=\"../images/".$row['itemimage'].".png\" /><br />".$row['itemname']."<br />Level ".$row['itemlevel']."<br />".$row['itemrarity'];
if ($row['keep']>1)

{
echo "<br />Amount: ".$row['keep'];
}
//display enchantable, transmutable, or adjustable
if ($row['enchantment1']>0)
{

echo "<br />Enchantable";

}
if ($row['transmute1']>0)
{

echo "<br />Transmutable";

}
if ($row['adjustable']>0)
{

echo "<br />Adjustable";

}
echo "</td></tr><tr><td>
<table class=\"page\" style=\"font-size: 10px\"><tr><td class=\"right\" style=\"padding: 3px; margin: 0px 0px 0px 0px;\">Description: </td><td class=\"left\" style=\"padding: 3px; margin: 0px 0px 0px 0px;\">".$row['itemdescription'];
echo "</td></tr><tr><td class=\"right\" style=\"padding: 3px; margin: 0px 0px 0px 0px;\">Item Type: </td><td class=\"left\" style=\"padding: 3px; margin: 0px 0px 0px 0px;\">".$row['itemtype']."</td></tr>";
if ($row['itemtype']=="Weapon")
{

echo "<tr><td class=\"right\" style=\"padding: 3px; margin: 0px 0px 0px 0px;\">Weapon Type:</td><td class=\"left\" style=\"padding: 3px; margin: 0px 0px 0px 0px;\">".$row['weapontype']."</td></tr>";

echo "<tr><td class=\"right\" style=\"padding: 3px; margin: 0px 0px 0px 0px;\">Range:</td><td class=\"left\" style=\"padding: 0px 0px 0px 0px; margin: 0px 0px 0px 0px;\">".$row['itemrange']."</td></tr>";

echo "<tr><td class=\"right\">Speed:</td><td class=\"left\">".$row['itemspeed']."</td></tr>";

echo "<tr><td class=\"right\">Dualwield:</td><td class=\"left\">";

	if ($row['duality']==0)

	{ echo "No</td></tr>";}

	if ($row['duality']>0)

	{ echo "Yes</td></tr>";}

$damage=$row['weaponbase']+$row['itemlevel'];

echo "<tr><td class=\"right\">Damage:</td><td class=\"left\">".$damage."</td></tr>";

}
if ($row['enhancement1']!="None")
{

	echo "<tr><td class=\"center\" colspan=\"2\"><h3>Enhancements</h3></td></tr><tr><td class=\"left\" colspan=\"2\">".$row['enhancement1']."</td></tr>";

	}
if ($row['enhancement2']!="None")
{

	echo "<tr><td class=\"left\" colspan=\"2\">".$row['enhancement2']."</td></tr>";

	}
if ($row['enhancement3']!="None")
{

	echo "<tr><td class=\"left\" colspan=\"2\">".$row['enhancement3']."</td></tr>";

	}
if ($row['itemvalue']>0)
{
echo "<tr><td class=\"right\">Value:</td><td class=\"left\">".$row['itemvalue']." Gold</td></tr>";
}
echo "</table>";
echo "<table class=\"page\"><tr><td class=\"page\">";
echo "<form name=\"keep\" action=\"equip.php?".time();
echo "\" method=\"get\"><input class=\"invisible\" type=\"radio\" name=\"keep\" checked=\"checked\" value=\"".$row['itemnumber'];
echo "\"><br /><input type=\"submit\" value=\"Unequip\" class=\"small\" style=\"font-size: 10px;\"></form></td></tr><tr><td class=\"page\"><form name=\"trade\" action=\"equip.php?".time();

  echo "\" method=\"get\"><input class=\"invisible\" type=\"radio\" name=\"trade\" checked=\"checked\" value=\"".$row['itemnumber'];

  echo "\"><br /><input type=\"submit\" value=\"Trade\" class=\"small\" style=\"font-size: 10px;\"></form>";

  echo "</td></tr></table>";

  echo "</td></tr>";
echo "</table>";
}

$stmt = $db->prepare("SELECT * FROM inventory WHERE charname=:charname and equip>0 and equiprh>0 ORDER BY itemtype desc, weapontype, itemlevel desc, itemrarity desc");
				$stmt->execute(array(':charname' => $charname));
while($row = $stmt->fetch())
{

echo "<table><tr><td class=\"center\" style=\"font-size: 10px\">

<img style=\"width: 90%; height: auto;\" src=\"../images/".$row['itemimage'].".png\" /><br />".$row['itemname']."<br />Level ".$row['itemlevel']."<br />".$row['itemrarity'];
if ($row['keep']>1)

{
echo "<br />Amount: ".$row['keep'];
}
//display enchantable, transmutable, or adjustable
if ($row['enchantment1']>0)
{

echo "<br />Enchantable";

}
if ($row['transmute1']>0)
{

echo "<br />Transmutable";

}
if ($row['adjustable']>0)
{

echo "<br />Adjustable";

}
echo "</td></tr><tr><td>
<table class=\"page\" style=\"font-size: 10px\"><tr><td class=\"right\" style=\"padding: 3px; margin: 0px 0px 0px 0px;\">Description: </td><td class=\"left\" style=\"padding: 3px; margin: 0px 0px 0px 0px;\">".$row['itemdescription'];
echo "</td></tr><tr><td class=\"right\" style=\"padding: 3px; margin: 0px 0px 0px 0px;\">Item Type: </td><td class=\"left\" style=\"padding: 3px; margin: 0px 0px 0px 0px;\">".$row['itemtype']."</td></tr>";
if ($row['itemtype']=="Weapon")
{

echo "<tr><td class=\"right\" style=\"padding: 3px; margin: 0px 0px 0px 0px;\">Weapon Type:</td><td class=\"left\" style=\"padding: 3px; margin: 0px 0px 0px 0px;\">".$row['weapontype']."</td></tr>";

echo "<tr><td class=\"right\" style=\"padding: 3px; margin: 0px 0px 0px 0px;\">Range:</td><td class=\"left\" style=\"padding: 0px 0px 0px 0px; margin: 0px 0px 0px 0px;\">".$row['itemrange']."</td></tr>";

echo "<tr><td class=\"right\">Speed:</td><td class=\"left\">".$row['itemspeed']."</td></tr>";

echo "<tr><td class=\"right\">Dualwield:</td><td class=\"left\">";

	if ($row['duality']==0)

	{ echo "No</td></tr>";}

	if ($row['duality']>0)

	{ echo "Yes</td></tr>";}

$damage=$row['weaponbase']+$row['itemlevel'];

echo "<tr><td class=\"right\">Damage:</td><td class=\"left\">".$damage."</td></tr>";

}
if ($row['enhancement1']!="None")
{

	echo "<tr><td class=\"center\" colspan=\"2\"><h3>Enhancements</h3></td></tr><tr><td class=\"left\" colspan=\"2\">".$row['enhancement1']."</td></tr>";

	}
if ($row['enhancement2']!="None")
{

	echo "<tr><td class=\"left\" colspan=\"2\">".$row['enhancement2']."</td></tr>";

	}
if ($row['enhancement3']!="None")
{

	echo "<tr><td class=\"left\" colspan=\"2\">".$row['enhancement3']."</td></tr>";

	}
if ($row['itemvalue']>0)
{
echo "<tr><td class=\"right\">Value:</td><td class=\"left\">".$row['itemvalue']." Gold</td></tr>";
}
echo "</table>";
echo "<table class=\"page\"><tr><td class=\"page\">";
echo "<form name=\"keep\" action=\"equip.php?".time();
echo "\" method=\"get\"><input class=\"invisible\" type=\"radio\" name=\"keep\" checked=\"checked\" value=\"".$row['itemnumber'];
echo "\"><br /><input type=\"submit\" value=\"Unequip\" class=\"small\" style=\"font-size: 10px;\"></form></td></tr><tr><td class=\"page\"><form name=\"trade\" action=\"equip.php?".time();

  echo "\" method=\"get\"><input class=\"invisible\" type=\"radio\" name=\"trade\" checked=\"checked\" value=\"".$row['itemnumber'];

  echo "\"><br /><input type=\"submit\" value=\"Trade\" class=\"small\" style=\"font-size: 10px;\"></form>";

  echo "</td></tr></table>";

  echo "</td></tr>";
echo "</table>";
}
?>

</div>
</div>
</div>
</div>
<button class="collapsible1" style="border: 1px solid #c9a682;padding: 5px; margin: 0px;color: black; text-align: center; background-color: transparent; background-image: linear-gradient(cornsilk, #c9a682);" onclick="checkContentcollapse8()">Equip Pocket</button>
<div id="contentcollapse8" class="contentcollapse8" style="padding: 5px; margin: 0px; background-color: transparent; background-image: linear-gradient(cornsilk, #c9a682);transition: display 2.2s ease-out;">
<div class="container-fluid" style=" border: 1px solid #c9a682; border-radius: 3rem; background-color: black; margin: 0px;">
<div class="row">
<div class="col-sm-12">
<h6 style="font-size: 10px;">Rings</h6>
</div>
<div class="col-sm-6">
<h6 style="font-size: 10px;">Necklace</h6>
</div>
<div class="col-sm-6">
<h6 style="font-size: 10px;">Belt</h6>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
<div class="col-sm-6" style="text-align: center; margin: 0px 0px 0px 0px; height: 100vh; overflow: overlay;">
<!--container for collapsible menu equipped itemw-->
<div class="container-fluid" style="text-align: center; margin: 0px 0px 0px 0px; padding: 0px 0px 0px 0px; width: 96%;">
<div class="row" style="text-align: center;">
<div class="col-sm-12" style="text-align: center; padding: 0px 0px 0px 0px; margin: 0px 0px 0px 0px;">
<!--collapse title and button-->
<button class="collapsible1" style="border: 1px solid #c9a682;padding: 5px 5px 5px 5px; margin: 0px 0px 0px 0px; color: black; text-align: center; background-color: transparent; background-image: linear-gradient(cornsilk, #c9a682);" onclick="checkContentcollapse1()">Equipment Slots</button>
<div id="contentcollapse1" class="contentcollapse1" style="text-align: center; padding: 0px 0px 0px 0px; margin: 0px 0px 0px 0px; background-color: transparent; background-image: linear-gradient(cornsilk, #c9a682);">
<div style="text-align: center;">
<button class="collapsible1" style="border: 1px solid #c9a682;padding: 5px 5px 5px 5px; margin: 0px 0px 0px 0px;color: black; text-align: center; background-color: transparent; background-image: linear-gradient(cornsilk, #c9a682);" onclick="checkContentcollapse2()">Weapon Slots</button>
<div id="contentcollapse2" class="contentcollapse2" style="padding: 5px 5px 5px 5px; margin: 0px 0px 0px 0px; background-color: transparent; background-image: linear-gradient(cornsilk, #c9a682);text-align: center;">
<div class="container-fluid" style="text-align: center; border: 1px solid #c9a682; border-radius: 3rem; background-color: black; padding: 0px 0px 0px 0px; margin: 0px 0px 0px 0px;">
<div class="row">
<div class="col-sm-6">
<h6 style="font-size: 10px;">Left Hand</h6>
<?php 
//***********get weapontype*********
$stmt = $db->prepare("SELECT * FROM inventory WHERE charname=:charname and equip>0 and duality>0 ORDER BY itemtype desc, weapontype, itemlevel desc, itemrarity desc");
				$stmt->execute(array(':charname' => $charname));
while($row = $stmt->fetch())
{

echo "<table><tr><td class=\"center\" style=\"font-size: 10px\">

<img style=\"width: 90%; height: auto;\" src=\"../images/".$row['itemimage'].".png\" /><br />".$row['itemname']."<br />Level ".$row['itemlevel']."<br />".$row['itemrarity'];
if ($row['keep']>1)

{
echo "<br />Amount: ".$row['keep'];
}
//display enchantable, transmutable, or adjustable
if ($row['enchantment1']>0)
{

echo "<br />Enchantable";

}
if ($row['transmute1']>0)
{

echo "<br />Transmutable";

}
if ($row['adjustable']>0)
{

echo "<br />Adjustable";

}
echo "</td></tr><tr><td>
<table class=\"page\" style=\"font-size: 10px\"><tr><td class=\"right\" style=\"padding: 3px; margin: 0px 0px 0px 0px;\">Description: </td><td class=\"left\" style=\"padding: 3px; margin: 0px 0px 0px 0px;\">".$row['itemdescription'];
echo "</td></tr><tr><td class=\"right\" style=\"padding: 3px; margin: 0px 0px 0px 0px;\">Item Type: </td><td class=\"left\" style=\"padding: 3px; margin: 0px 0px 0px 0px;\">".$row['itemtype']."</td></tr>";
if ($row['itemtype']=="Weapon")
{

echo "<tr><td class=\"right\" style=\"padding: 3px; margin: 0px 0px 0px 0px;\">Weapon Type:</td><td class=\"left\" style=\"padding: 3px; margin: 0px 0px 0px 0px;\">".$row['weapontype']."</td></tr>";

echo "<tr><td class=\"right\" style=\"padding: 3px; margin: 0px 0px 0px 0px;\">Range:</td><td class=\"left\" style=\"padding: 0px 0px 0px 0px; margin: 0px 0px 0px 0px;\">".$row['itemrange']."</td></tr>";

echo "<tr><td class=\"right\">Speed:</td><td class=\"left\">".$row['itemspeed']."</td></tr>";

echo "<tr><td class=\"right\">Dualwield:</td><td class=\"left\">";

	if ($row['duality']==0)

	{ echo "No</td></tr>";}

	if ($row['duality']>0)

	{ echo "Yes</td></tr>";}

$damage=$row['weaponbase']+$row['itemlevel'];

echo "<tr><td class=\"right\">Damage:</td><td class=\"left\">".$damage."</td></tr>";

}
if ($row['enhancement1']!="None")
{

	echo "<tr><td class=\"center\" colspan=\"2\"><h3>Enhancements</h3></td></tr><tr><td class=\"left\" colspan=\"2\">".$row['enhancement1']."</td></tr>";

	}
if ($row['enhancement2']!="None")
{

	echo "<tr><td class=\"left\" colspan=\"2\">".$row['enhancement2']."</td></tr>";

	}
if ($row['enhancement3']!="None")
{

	echo "<tr><td class=\"left\" colspan=\"2\">".$row['enhancement3']."</td></tr>";

	}
if ($row['itemvalue']>0)
{
echo "<tr><td class=\"right\">Value:</td><td class=\"left\">".$row['itemvalue']." Gold</td></tr>";
}
echo "</table>";
echo "<table class=\"page\"><tr><td class=\"page\">";
echo "<form name=\"keep\" action=\"equip.php?".time();
echo "\" method=\"get\"><input class=\"invisible\" type=\"radio\" name=\"keep\" checked=\"checked\" value=\"".$row['itemnumber'];
echo "\"><br /><input type=\"submit\" value=\"Unequip\" class=\"small\" style=\"font-size: 10px;\"></form></td></tr><tr><td class=\"page\"><form name=\"trade\" action=\"equip.php?".time();

  echo "\" method=\"get\"><input class=\"invisible\" type=\"radio\" name=\"trade\" checked=\"checked\" value=\"".$row['itemnumber'];

  echo "\"><br /><input type=\"submit\" value=\"Trade\" class=\"small\" style=\"font-size: 10px;\"></form>";

  echo "</td></tr></table>";

  echo "</td></tr>";
echo "</table>";
}






$stmt = $db->prepare("SELECT * FROM inventory WHERE charname=:charname and equip>0 and equiplh>0 ORDER BY itemtype desc, weapontype, itemlevel desc, itemrarity desc");
				$stmt->execute(array(':charname' => $charname));
while($row = $stmt->fetch())
{

echo "<table><tr><td class=\"center\" style=\"font-size: 10px\">

<img style=\"width: 90%; height: auto;\" src=\"../images/".$row['itemimage'].".png\" /><br />".$row['itemname']."<br />Level ".$row['itemlevel']."<br />".$row['itemrarity'];
if ($row['keep']>1)

{
echo "<br />Amount: ".$row['keep'];
}
//display enchantable, transmutable, or adjustable
if ($row['enchantment1']>0)
{

echo "<br />Enchantable";

}
if ($row['transmute1']>0)
{

echo "<br />Transmutable";

}
if ($row['adjustable']>0)
{

echo "<br />Adjustable";

}
echo "</td></tr><tr><td>
<table class=\"page\" style=\"font-size: 10px\"><tr><td class=\"right\" style=\"padding: 3px; margin: 0px 0px 0px 0px;\">Description: </td><td class=\"left\" style=\"padding: 3px; margin: 0px 0px 0px 0px;\">".$row['itemdescription'];
echo "</td></tr><tr><td class=\"right\" style=\"padding: 3px; margin: 0px 0px 0px 0px;\">Item Type: </td><td class=\"left\" style=\"padding: 3px; margin: 0px 0px 0px 0px;\">".$row['itemtype']."</td></tr>";
if ($row['itemtype']=="Weapon")
{

echo "<tr><td class=\"right\" style=\"padding: 3px; margin: 0px 0px 0px 0px;\">Weapon Type:</td><td class=\"left\" style=\"padding: 3px; margin: 0px 0px 0px 0px;\">".$row['weapontype']."</td></tr>";

echo "<tr><td class=\"right\" style=\"padding: 3px; margin: 0px 0px 0px 0px;\">Range:</td><td class=\"left\" style=\"padding: 0px 0px 0px 0px; margin: 0px 0px 0px 0px;\">".$row['itemrange']."</td></tr>";

echo "<tr><td class=\"right\">Speed:</td><td class=\"left\">".$row['itemspeed']."</td></tr>";

echo "<tr><td class=\"right\">Dualwield:</td><td class=\"left\">";

	if ($row['duality']==0)

	{ echo "No</td></tr>";}

	if ($row['duality']>0)

	{ echo "Yes</td></tr>";}

$damage=$row['weaponbase']+$row['itemlevel'];

echo "<tr><td class=\"right\">Damage:</td><td class=\"left\">".$damage."</td></tr>";

}
if ($row['enhancement1']!="None")
{

	echo "<tr><td class=\"center\" colspan=\"2\"><h3>Enhancements</h3></td></tr><tr><td class=\"left\" colspan=\"2\">".$row['enhancement1']."</td></tr>";

	}
if ($row['enhancement2']!="None")
{

	echo "<tr><td class=\"left\" colspan=\"2\">".$row['enhancement2']."</td></tr>";

	}
if ($row['enhancement3']!="None")
{

	echo "<tr><td class=\"left\" colspan=\"2\">".$row['enhancement3']."</td></tr>";

	}
if ($row['itemvalue']>0)
{
echo "<tr><td class=\"right\">Value:</td><td class=\"left\">".$row['itemvalue']." Gold</td></tr>";
}
echo "</table>";
echo "<table class=\"page\"><tr><td class=\"page\">";
echo "<form name=\"keep\" action=\"equip.php?".time();
echo "\" method=\"get\"><input class=\"invisible\" type=\"radio\" name=\"keep\" checked=\"checked\" value=\"".$row['itemnumber'];
echo "\"><br /><input type=\"submit\" value=\"Unequip\" class=\"small\" style=\"font-size: 10px;\"></form></td></tr><tr><td class=\"page\"><form name=\"trade\" action=\"equip.php?".time();

  echo "\" method=\"get\"><input class=\"invisible\" type=\"radio\" name=\"trade\" checked=\"checked\" value=\"".$row['itemnumber'];

  echo "\"><br /><input type=\"submit\" value=\"Trade\" class=\"small\" style=\"font-size: 10px;\"></form>";

  echo "</td></tr></table>";

  echo "</td></tr>";
echo "</table>";
}
?>
</div>
<div class="col-sm-6">
<h6 style="font-size: 10px;">Right Hand</h6>
<?php 
//***********get weapontype*********
$stmt = $db->prepare("SELECT * FROM inventory WHERE charname=:charname and equip>0 and duality>0 ORDER BY itemtype desc, weapontype, itemlevel desc, itemrarity desc");
				$stmt->execute(array(':charname' => $charname));
while($row = $stmt->fetch())
{

echo "<table><tr><td class=\"center\" style=\"font-size: 10px\">

<img style=\"width: 90%; height: auto;\" src=\"../images/".$row['itemimage'].".png\" /><br />".$row['itemname']."<br />Level ".$row['itemlevel']."<br />".$row['itemrarity'];
if ($row['keep']>1)

{
echo "<br />Amount: ".$row['keep'];
}
//display enchantable, transmutable, or adjustable
if ($row['enchantment1']>0)
{

echo "<br />Enchantable";

}
if ($row['transmute1']>0)
{

echo "<br />Transmutable";

}
if ($row['adjustable']>0)
{

echo "<br />Adjustable";

}
echo "</td></tr><tr><td>
<table class=\"page\" style=\"font-size: 10px\"><tr><td class=\"right\" style=\"padding: 3px; margin: 0px 0px 0px 0px;\">Description: </td><td class=\"left\" style=\"padding: 3px; margin: 0px 0px 0px 0px;\">".$row['itemdescription'];
echo "</td></tr><tr><td class=\"right\" style=\"padding: 3px; margin: 0px 0px 0px 0px;\">Item Type: </td><td class=\"left\" style=\"padding: 3px; margin: 0px 0px 0px 0px;\">".$row['itemtype']."</td></tr>";
if ($row['itemtype']=="Weapon")
{

echo "<tr><td class=\"right\" style=\"padding: 3px; margin: 0px 0px 0px 0px;\">Weapon Type:</td><td class=\"left\" style=\"padding: 3px; margin: 0px 0px 0px 0px;\">".$row['weapontype']."</td></tr>";

echo "<tr><td class=\"right\" style=\"padding: 3px; margin: 0px 0px 0px 0px;\">Range:</td><td class=\"left\" style=\"padding: 0px 0px 0px 0px; margin: 0px 0px 0px 0px;\">".$row['itemrange']."</td></tr>";

echo "<tr><td class=\"right\">Speed:</td><td class=\"left\">".$row['itemspeed']."</td></tr>";

echo "<tr><td class=\"right\">Dualwield:</td><td class=\"left\">";

	if ($row['duality']==0)

	{ echo "No</td></tr>";}

	if ($row['duality']>0)

	{ echo "Yes</td></tr>";}

$damage=$row['weaponbase']+$row['itemlevel'];

echo "<tr><td class=\"right\">Damage:</td><td class=\"left\">".$damage."</td></tr>";

}
if ($row['enhancement1']!="None")
{

	echo "<tr><td class=\"center\" colspan=\"2\"><h3>Enhancements</h3></td></tr><tr><td class=\"left\" colspan=\"2\">".$row['enhancement1']."</td></tr>";

	}
if ($row['enhancement2']!="None")
{

	echo "<tr><td class=\"left\" colspan=\"2\">".$row['enhancement2']."</td></tr>";

	}
if ($row['enhancement3']!="None")
{

	echo "<tr><td class=\"left\" colspan=\"2\">".$row['enhancement3']."</td></tr>";

	}
if ($row['itemvalue']>0)
{
echo "<tr><td class=\"right\">Value:</td><td class=\"left\">".$row['itemvalue']." Gold</td></tr>";
}
echo "</table>";
echo "<table class=\"page\"><tr><td class=\"page\">";
echo "<form name=\"keep\" action=\"equip.php?".time();
echo "\" method=\"get\"><input class=\"invisible\" type=\"radio\" name=\"keep\" checked=\"checked\" value=\"".$row['itemnumber'];
echo "\"><br /><input type=\"submit\" value=\"Unequip\" class=\"small\" style=\"font-size: 10px;\"></form></td></tr><tr><td class=\"page\"><form name=\"trade\" action=\"equip.php?".time();

  echo "\" method=\"get\"><input class=\"invisible\" type=\"radio\" name=\"trade\" checked=\"checked\" value=\"".$row['itemnumber'];

  echo "\"><br /><input type=\"submit\" value=\"Trade\" class=\"small\" style=\"font-size: 10px;\"></form>";

  echo "</td></tr></table>";

  echo "</td></tr>";
echo "</table>";
}

$stmt = $db->prepare("SELECT * FROM inventory WHERE charname=:charname and equip>0 and equiprh>0 ORDER BY itemtype desc, weapontype, itemlevel desc, itemrarity desc");
				$stmt->execute(array(':charname' => $charname));
while($row = $stmt->fetch())
{

echo "<table><tr><td class=\"center\" style=\"font-size: 10px\">

<img style=\"width: 90%; height: auto;\" src=\"../images/".$row['itemimage'].".png\" /><br />".$row['itemname']."<br />Level ".$row['itemlevel']."<br />".$row['itemrarity'];
if ($row['keep']>1)

{
echo "<br />Amount: ".$row['keep'];
}
//display enchantable, transmutable, or adjustable
if ($row['enchantment1']>0)
{

echo "<br />Enchantable";

}
if ($row['transmute1']>0)
{

echo "<br />Transmutable";

}
if ($row['adjustable']>0)
{

echo "<br />Adjustable";

}
echo "</td></tr><tr><td>
<table class=\"page\" style=\"font-size: 10px\"><tr><td class=\"right\" style=\"padding: 3px; margin: 0px 0px 0px 0px;\">Description: </td><td class=\"left\" style=\"padding: 3px; margin: 0px 0px 0px 0px;\">".$row['itemdescription'];
echo "</td></tr><tr><td class=\"right\" style=\"padding: 3px; margin: 0px 0px 0px 0px;\">Item Type: </td><td class=\"left\" style=\"padding: 3px; margin: 0px 0px 0px 0px;\">".$row['itemtype']."</td></tr>";
if ($row['itemtype']=="Weapon")
{

echo "<tr><td class=\"right\" style=\"padding: 3px; margin: 0px 0px 0px 0px;\">Weapon Type:</td><td class=\"left\" style=\"padding: 3px; margin: 0px 0px 0px 0px;\">".$row['weapontype']."</td></tr>";

echo "<tr><td class=\"right\" style=\"padding: 3px; margin: 0px 0px 0px 0px;\">Range:</td><td class=\"left\" style=\"padding: 0px 0px 0px 0px; margin: 0px 0px 0px 0px;\">".$row['itemrange']."</td></tr>";

echo "<tr><td class=\"right\">Speed:</td><td class=\"left\">".$row['itemspeed']."</td></tr>";

echo "<tr><td class=\"right\">Dualwield:</td><td class=\"left\">";

	if ($row['duality']==0)

	{ echo "No</td></tr>";}

	if ($row['duality']>0)

	{ echo "Yes</td></tr>";}

$damage=$row['weaponbase']+$row['itemlevel'];

echo "<tr><td class=\"right\">Damage:</td><td class=\"left\">".$damage."</td></tr>";

}
if ($row['enhancement1']!="None")
{

	echo "<tr><td class=\"center\" colspan=\"2\"><h3>Enhancements</h3></td></tr><tr><td class=\"left\" colspan=\"2\">".$row['enhancement1']."</td></tr>";

	}
if ($row['enhancement2']!="None")
{

	echo "<tr><td class=\"left\" colspan=\"2\">".$row['enhancement2']."</td></tr>";

	}
if ($row['enhancement3']!="None")
{

	echo "<tr><td class=\"left\" colspan=\"2\">".$row['enhancement3']."</td></tr>";

	}
if ($row['itemvalue']>0)
{
echo "<tr><td class=\"right\">Value:</td><td class=\"left\">".$row['itemvalue']." Gold</td></tr>";
}
echo "</table>";
echo "<table class=\"page\"><tr><td class=\"page\">";
echo "<form name=\"keep\" action=\"equip.php?".time();
echo "\" method=\"get\"><input class=\"invisible\" type=\"radio\" name=\"keep\" checked=\"checked\" value=\"".$row['itemnumber'];
echo "\"><br /><input type=\"submit\" value=\"Unequip\" class=\"small\" style=\"font-size: 10px;\"></form></td></tr><tr><td class=\"page\"><form name=\"trade\" action=\"equip.php?".time();

  echo "\" method=\"get\"><input class=\"invisible\" type=\"radio\" name=\"trade\" checked=\"checked\" value=\"".$row['itemnumber'];

  echo "\"><br /><input type=\"submit\" value=\"Trade\" class=\"small\" style=\"font-size: 10px;\"></form>";

  echo "</td></tr></table>";

  echo "</td></tr>";
echo "</table>";
}
?>

</div>
</div>
</div>
</div>
<button class="collapsible1" style="border: 1px solid #c9a682;padding: 5px; margin: 0px;color: black; text-align: center; background-color: transparent; background-image: linear-gradient(cornsilk, #c9a682);" onclick="checkContentcollapse3()">Accessory Slots</button>
<div id="contentcollapse3" class="contentcollapse3" style="padding: 5px; margin: 0px; background-color: transparent; background-image: linear-gradient(cornsilk, #c9a682);transition: display 2.2s ease-out;">
<div class="container-fluid" style=" border: 1px solid #c9a682; border-radius: 3rem; background-color: black; margin: 0px;">
<div class="row">
<div class="col-sm-12">
<h6 style="font-size: 10px;">Rings</h6>
</div>
<div class="col-sm-6">
<h6 style="font-size: 10px;">Necklace</h6>
</div>
<div class="col-sm-6">
<h6 style="font-size: 10px;">Belt</h6>
</div>
</div>
</div>
</div>
<button class="collapsible1" style="border: 1px solid #c9a682;padding: 5px; margin: 0px;color: black; text-align: center; background-color: transparent; background-image: linear-gradient(cornsilk, #c9a682);" onclick="checkContentcollapse4()">Armor Slots</button>
<div id="contentcollapse4" class="contentcollapse4" style="padding: 5px; margin: 0px; background-color: transparent; background-image: linear-gradient(cornsilk, #c9a682);">
<div class="container-fluid" style=" border: 1px solid #c9a682; border-radius: 3rem; background-color: black; margin: 0px;">
<div class="row">
<div class="col-sm-4">
<h6>Head</h6>
</div>
<div class="col-sm-4">
<h6>Back</h6>
</div>
<div class="col-sm-4">
<h6>Chest</h6>
</div>
<div class="col-sm-4">
<h6>Legs</h6>
</div>
<div class="col-sm-4">
<h6>Hands</h6>
</div>
<div class="col-sm-4">
<h6>Feet</h6>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</body></html>