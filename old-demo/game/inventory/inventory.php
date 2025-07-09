<?php
//include config
require_once( $_SERVER['DOCUMENT_ROOT'] . '/game/includes/config2.php');
//if not logged in redirect to login page
if(!$user->is_logged_in()){ header('Location: ../login.php'); die('This site works best with redirections turned on, but you may continue with them turned off. <a href="../login.php">Continue</a>');}
$username = $_SESSION['username'];
$charname= $_SESSION['charname'];
?>
<?php
$itype='All';
if (isset($_POST['itype'])) {
$itype=strip_tags($_POST['itype']);	
}
$type=' ';
if (isset($_POST['type'])) {
$type=strip_tags($_POST['type']);	
}
$equipnumber = " ";
if (isset($_POST['equip'])) {
//****new equip***
$equipnumber=strip_tags($_POST["equip"]);
}
$equiplhnumber = " ";
if (isset($_POST['equiplh'])) {
//****new equip***
$equiplhnumber=strip_tags($_POST["equiplh"]);
}
$equiprhnumber = " ";
if (isset($_POST['equiprh'])) {
//****new equip***
$equiprhnumber=strip_tags($_POST["equiprh"]);
}
$tradenumber = " ";
if (isset($_POST['trade'])) {
//****new equip***
$tradenumber=strip_tags($_POST["trade"]);
}
if ($equipnumber!=" ") {
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
if ($tradenumber!=" ") {
$stmt = $db->prepare('UPDATE inventory SET equip = 0, equiplh = 0, equiplh = 0, keep = 0, trade = 1 WHERE charname= :charname AND itemnumber = :tradenumber') ;
					$stmt->execute(array(':charname' => $charname, ':tradenumber' => $tradenumber));
}
if ($equiplhnumber!=" ") {
$stmt = $db->prepare('UPDATE inventory SET equip = 0, keep = 1 WHERE charname= :charname AND equip = 1 and itemtype = "Weapon" and duality = 0');
					$stmt->execute(array(':charname' => $charname));	
$stmt = $db->prepare('UPDATE inventory SET equip = 0, equiplh = 0, equiprh = 0, keep = 1 WHERE charname= :charname AND equiplh = 1 and equip = 1');
					$stmt->execute(array(':charname' => $charname));
$stmt = $db->prepare('UPDATE inventory SET equip = 1, equiplh = 1, keep = 0 WHERE charname= :charname AND itemnumber = :equiplhnumber');
					$stmt->execute(array(':charname' => $charname, ':equiplhnumber' => $equiplhnumber));
}
if ($equiprhnumber!=" ") {
$stmt = $db->prepare('UPDATE inventory SET equip = 0, keep = 1 WHERE charname= :charname AND equip = 1 and itemtype = "Weapon" and duality = 0');
					$stmt->execute(array(':charname' => $charname));
$stmt = $db->prepare('UPDATE inventory SET equip = 0, equiprh = 0, equiplh = 0, keep = 1 WHERE charname= :charname AND equiprh = 1 and equip = 1');
					$stmt->execute(array(':charname' => $charname));
$stmt = $db->prepare('UPDATE inventory SET equip = 1, equiprh = 1, keep = 0 WHERE charname= :charname AND itemnumber = :equiprhnumber');
					$stmt->execute(array(':charname' => $charname, ':equiprhnumber' => $equiprhnumber));
}
if(isset($_POST['elkeep'])) {
$elkeepnumber=strip_tags($_POST['elkeep']);
$stmt = $db->prepare('UPDATE inventory SET equip = 0, equiplh = 0, equiprh = 0, keep = 1, trade = 0 WHERE charname = :charname and itemnumber = :elkeepnumber') ;
					$stmt->execute(array(':charname' => $charname, ':elkeepnumber' => $elkeepnumber)); 
}
if(isset($_POST['eltrade'])) {
	$eltradenumber=strip_tags($_POST['eltrade']);
$stmt = $db->prepare('UPDATE inventory SET equip = 0, equiplh = 0, equiprh = 0, keep = 0, trade = 1 WHERE charname = :charname and itemnumber = :tradenumber') ;
					$stmt->execute(array(':charname' => $charname, ':tradenumber' => $eltradenumber));  
}
if(isset($_POST['erkeep'])) {
$erkeepnumber=strip_tags($_POST['erkeep']);
$stmt = $db->prepare('UPDATE inventory SET equip = 0, equiplh = 0, equiprh = 0, keep = 1, trade = 0 WHERE charname = :charname and itemnumber = :keepnumber') ;
					$stmt->execute(array(':charname' => $charname, ':keepnumber' => $erkeepnumber)); 
}
if(isset($_POST['ertrade'])) {
	$ertradenumber=strip_tags($_POST['ertrade']);
$stmt = $db->prepare('UPDATE inventory SET equip = 0, equiplh = 0, equiprh = 0, keep = 0, trade = 1 WHERE charname = :charname and itemnumber = :tradenumber') ;
					$stmt->execute(array(':charname' => $charname, ':tradenumber' => $ertradenumber));  
}
//*********neck*********
if(isset($_POST['enkeep'])) {
$enkeepnumber=strip_tags($_POST['enkeep']);
$stmt = $db->prepare('UPDATE inventory SET equip = 0, keep = 1, trade = 0 WHERE charname = :charname and itemnumber = :enkeepnumber') ;
					$stmt->execute(array(':charname' => $charname, ':enkeepnumber' => $enkeepnumber)); 
}
if(isset($_POST['entrade'])) {
	$entradenumber=strip_tags($_POST['entrade']);
$stmt = $db->prepare('UPDATE inventory SET equip = 0, keep = 0, trade = 1 WHERE charname = :charname and itemnumber = :tradenumber') ;
					$stmt->execute(array(':charname' => $charname, ':tradenumber' => $entradenumber));  
}
//**********head*********
if(isset($_POST['ehkeep'])) {
$ehkeepnumber=strip_tags($_POST['ehkeep']);
$stmt = $db->prepare('UPDATE inventory SET equip = 0, keep = 1, trade = 0 WHERE charname = :charname and itemnumber = :ehkeepnumber') ;
					$stmt->execute(array(':charname' => $charname, ':ehkeepnumber' => $ehkeepnumber)); 
}
if(isset($_POST['ehtrade'])) {
	$ehtradenumber=strip_tags($_POST['ehtrade']);
$stmt = $db->prepare('UPDATE inventory SET equip = 0, keep = 0, trade = 1 WHERE charname = :charname and itemnumber = :ehtradenumber') ;
					$stmt->execute(array(':charname' => $charname, ':ehtradenumber' => $ehtradenumber));  
}
//*******back************
if(isset($_POST['ebkeep'])) {
$ebkeepnumber=strip_tags($_POST['ebkeep']);
$stmt = $db->prepare('UPDATE inventory SET equip = 0, keep = 1, trade = 0 WHERE charname = :charname and itemnumber = :ebkeepnumber') ;
					$stmt->execute(array(':charname' => $charname, ':ebkeepnumber' => $ebkeepnumber)); 
}
if(isset($_POST['ebtrade'])) {
	$ebtradenumber=strip_tags($_POST['ebtrade']);
$stmt = $db->prepare('UPDATE inventory SET equip = 0, keep = 0, trade = 1 WHERE charname = :charname and itemnumber = :tradenumber') ;
					$stmt->execute(array(':charname' => $charname, ':tradenumber' => $ebtradenumber));  
}
//*******chest**********
if(isset($_POST['eckeep'])) {
$eckeepnumber=strip_tags($_POST['eckeep']);
$stmt = $db->prepare('UPDATE inventory SET equip = 0, keep = 1, trade = 0 WHERE charname = :charname and itemnumber = :keepnumber') ;
					$stmt->execute(array(':charname' => $charname, ':keepnumber' => $eckeepnumber)); 
}
if(isset($_POST['ectrade'])) {
	$ectradenumber=strip_tags($_POST['ectrade']);
$stmt = $db->prepare('UPDATE inventory SET equip = 0, keep = 0, trade = 1 WHERE charname = :charname and itemnumber = :tradenumber') ;
					$stmt->execute(array(':charname' => $charname, ':tradenumber' => $ectradenumber));  
}
//*********hands*********
if(isset($_POST['hekeep'])) {
$hekeepnumber=strip_tags($_POST['hekeep']);
$stmt = $db->prepare('UPDATE inventory SET equip = 0, keep = 1, trade = 0 WHERE charname = :charname and itemnumber = :keepnumber') ;
					$stmt->execute(array(':charname' => $charname, ':keepnumber' => $hekeepnumber)); 
}
if(isset($_POST['hetrade'])) {
	$hetradenumber=strip_tags($_POST['hetrade']);
$stmt = $db->prepare('UPDATE inventory SET equip = 0, keep = 0, trade = 1 WHERE charname = :charname and itemnumber = :tradenumber') ;
					$stmt->execute(array(':charname' => $charname, ':tradenumber' => $hetradenumber));  
}
//*********feet**********
if(isset($_POST['efkeep'])) {
$efkeepnumber=strip_tags($_POST['efkeep']);
$stmt = $db->prepare('UPDATE inventory SET equip = 0, keep = 1, trade = 0 WHERE charname = :charname and itemnumber = :keepnumber') ;
					$stmt->execute(array(':charname' => $charname, ':keepnumber' => $efkeepnumber)); 
}
if(isset($_POST['eftrade'])) {
	$eftradenumber=strip_tags($_POST['eftrade']);
$stmt = $db->prepare('UPDATE inventory SET equip = 0, keep = 0, trade = 1 WHERE charname = :charname and itemnumber = :tradenumber') ;
					$stmt->execute(array(':charname' => $charname, ':tradenumber' => $eftradenumber));  
}
//*********belt**********
if(isset($_POST['ebbkeep'])) {
$ebbkeepnumber=strip_tags($_POST['ebbkeep']);
$stmt = $db->prepare('UPDATE inventory SET equip = 0, keep = 1, trade = 0 WHERE charname = :charname and itemnumber = :keepnumber') ;
					$stmt->execute(array(':charname' => $charname, ':keepnumber' => $ebbkeepnumber)); 
}
if(isset($_POST['ebbtrade'])) {
	$ebbtradenumber=strip_tags($_POST['ebbtrade']);
$stmt = $db->prepare('UPDATE inventory SET equip = 0, keep = 0, trade = 1 WHERE charname = :charname and itemnumber = :tradenumber') ;
					$stmt->execute(array(':charname' => $charname, ':tradenumber' => $ebbtradenumber));  
}
//*********rings*********
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
<link href="https://fonts.googleapis.com/css?family=Frank+Ruhl+Libre:400,500|Philosopher" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="../main.css?<?php echo time(); ?>" rel="stylesheet">
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
<body style="padding: 0px 0px 0px 0px; margin: 0px 0px 0px 0px; overflow-y: hidden;">
<div class="container-fluid" style="margin: 0px 0px 0px 0px;padding: 0px 0px 0px 0px; overflow: hidden;">
<div class="row">
<div class="col-sm-12" style="margin: 0px 0px 0px 0px; overflow: hidden;">
<a class="small" style="float: left; width: 100vw; margin: 0px 0px 0px 0px;border-radius: 0rem;" href="../maingraphics.php">Back</a>
<img border="0" style="position: inline-block; margin: 0px 0px 0px 0px;padding: 0px 0px 0px 0px;max-width: 2800px; max-height: 2800px; width: 100vw; float: left;" src="../images/border2.png" />
</div>
</div>
<div class="row">
<div class="col-sm-6" style="text-align: center; margin: 0px 0px 0px 0px; height: 100vh; overflow: overlay;">
<!--container for collapsible menu equipped itemw-->
<div class="container" style="text-align: center; margin: 0px 0px 0px 0px; padding: 0px 0px 0px 0px; width: 96%;">
<div class="row" style="text-align: center;">
<div class="col-sm-12" style="text-align: center; padding: 0px 0px 0px 0px; margin: 0px 0px 0px 0px;">
<!--collapse title and button-->
<button class="collapsible1" style="border: 1px solid #105050;padding: 5px 5px 5px 5px; margin: 0px 0px 0px 0px; color: #105050; text-align: center; background-color: transparent; background-image: linear-gradient(cornsilk, #c9a682);" onclick="checkContentcollapse5()">Keep Pocket</button>
<div id="contentcollapse5" class="contentcollapse5" style="text-align: center; padding: 5px;border: 1px solid #105050; margin: 0px 0px 0px 0px; background-color: transparent; background-image: linear-gradient(cornsilk, #c9a682);">
<div class="container-fluid" style=" border: 1px solid #c9a682; border-radius: 3rem; background-color: black; margin: 0px; text-align: center">
<div class="container-fluid">
<div class="row">
<div class="col-sm-12" style="font-size: 12px">
<table><tr><td colspan="2">
<h4>Keep Pocket</h4>
<a class="small" href="inventory.php?<?php echo time(); ?>">All</a>
</td></tr><tr><td style="width: 50%;">
<form action="inventory.php?<?php echo time(); ?>" method="post"><input class="invisible" type="radio" name="itype" checked="checked" value="Weapon" /><input class="small" type="submit" value="Weapons" /></form>
</td><td style="width: 50%;">
<form action="inventory.php?<?php echo time(); ?>" method="post"><input class="invisible" type="radio" name="itype" checked="checked" value="Armor" /><input class="small" type="submit" value="Armor" /></form>
</td></tr><tr><td style="width: 50%;">
<form action="inventory.php?<?php echo time(); ?>" method="post"><input class="invisible" type="radio" name="itype" checked="checked" value="Accessory" /><input class="small" type="submit" value="Accessories" /></form>
</td><td style="width: 50%;">
<form action="inventory.php?<?php echo time(); ?>" method="post"><input class="invisible" type="radio" name="itype" checked="checked" value="Other" /><input class="small" type="submit" value="Other" /></form>
</td></tr>
</table>
</div>
</div>
</div>
<div class="container-fluid">
<div class="row">
<div class="col-sm-12" style="font-size: 12px">
<?php
if ($itype=='All')
{
$stmt = $db->prepare("SELECT * FROM inventory WHERE charname=:charname and keep>0 and itemtype != 'Food' ORDER BY equipable desc, itemtype desc, weapontype, itemlevel desc, itemrarity");
				$stmt->execute(array(':charname' => $charname));
while($row = $stmt->fetch())
{
include ('../includes/displayinv.php');
}
}
else
{
$stmt = $db->prepare("SELECT * FROM inventory WHERE charname=:charname and keep>0 and itemtype = :type order by weapontype, itemlevel desc, itemrarity");
				$stmt->execute(array(':charname' => $charname,
				':type' => $itype
				));
while($row = $stmt->fetch())
{
include ('../includes/displayinv.php');
}

}
?>
</div>
</div>
</div>
</div>
</div>
<!--trade pocket-->
<button class="collapsible1" style="border: 1px solid #105050;padding: 5px; margin: 0px;color: #105050; text-align: center; background-color: transparent; background-image: linear-gradient(cornsilk, #c9a682);" onclick="checkContentcollapse6()">Trade Pocket</button>
<div id="contentcollapse6" class="contentcollapse6" style="border: 1px solid #105050;padding: 5px; margin: 0px; background-color: transparent; background-image: linear-gradient(cornsilk, #c9a682);">
<div class="container-fluid" style=" border: 1px solid #c9a682; border-radius: 3rem; background-color: black; margin: 0px; text-align: center">
<div class="container-fluid">
<div class="row">
<div class="col-sm-12" style="font-size: 12px">
<table><tr><td colspan="2">
<h4>Trade Pocket</h4>
<a class="small" href="inventory.php?<?php echo time(); ?>">All</a>
</td></tr><tr><td style="width: 50%;">
<form action="inventory.php?<?php echo time(); ?>" method="post"><input class="invisible" type="radio" name="type" checked="checked" value="Weapon" /><input class="small" type="submit" value="Weapons" /></form>
</td><td style="width: 50%;">
<form action="inventory.php?<?php echo time(); ?>" method="post"><input class="invisible" type="radio" name="type" checked="checked" value="Armor" /><input class="small" type="submit" value="Armor" /></form>
</td></tr><tr><td style="width: 50%;">
<form action="inventory.php?<?php echo time(); ?>" method="post"><input class="invisible" type="radio" name="type" checked="checked" value="Accessory" /><input class="small" type="submit" value="Accessories" /></form>
</td><td style="width: 50%;">
<form action="inventory.php?<?php echo time(); ?>" method="post"><input class="invisible" type="radio" name="type" checked="checked" value="Other" /><input class="small" type="submit" value="Other" /></form>
</td></tr></table>
</div>
</div>
</div>
<div class="container-fluid">
<div class="row">
<div class="col-sm-12" style="font-size: 12px">
<?php
if (!$type)
{
$stmt = $db->prepare("SELECT * FROM inventory WHERE charname=:charname and trade>0 and itemtype != 'Food' ORDER BY itemrarity, itemlevel, weapontype, itemtype, equipable");
				$stmt->execute(array(':charname' => $charname));
while($row = $stmt->fetch())
{
include ('../includes/displaytrade.php');
}
}
else
{
$stmt = $db->prepare("SELECT * FROM inventory WHERE charname=:charname and trade>0 and itemtype = :type order by itemrarity, itemlevel, weapontype, itemtype");
				$stmt->execute(array(':charname' => $charname,
				':type' => $type
				));
while($row = $stmt->fetch())
{
include ('../includes/displaytrade.php');
}
}
?>
</div>
</div>
</div>
</div>
</div>
<!--Food pocket-->
<button class="collapsible1" style="border: 1px solid #105050;padding: 5px 5px 5px 5px; margin: 0px 0px 0px 0px;color: #105050; text-align: center; background-color: transparent; background-image: linear-gradient(cornsilk, #c9a682);" onclick="checkContentcollapse7()">Food Pocket</button>
<div id="contentcollapse7" class="contentcollapse7" style="border: 1px solid #105050;padding: 5px 5px 5px 5px; margin: 0px 0px 0px 0px; background-color: transparent; background-image: linear-gradient(cornsilk, #c9a682);text-align: center;">
<div class="container-fluid" style=" border: 1px solid #c9a682; border-radius: 3rem; background-color: black; margin: 0px; text-align: center">
<div class="container-fluid">
<div class="row">
<div class="col-sm-12" style="font-size: 12px">
<table>
<tr><td colspan="2">
<h4>Food Pocket</h4>
<a class="small" href="inventory.php?<?php echo time(); ?>">All</a>
</td></tr><tr><td style="width: 50%;">
<form action="inventory.php?<?php echo time(); ?>" method="post"><input class="invisible" type="radio" name="type" checked="checked" value="Ingredietn" /><input class="small" type="submit" value="Ingredient" /></form>
</td><td style="width: 50%;">
<form action="inventory.php?<?php echo time(); ?>" method="post"><input class="invisible" type="radio" name="type" checked="checked" value="Recipes" /><input class="small" type="submit" value="Recipes" /></form>
</td></tr><tr><td style="width: 50%;">
<form action="inventory.php?<?php echo time(); ?>" method="post"><input class="invisible" type="radio" name="type" checked="checked" value="Tools" /><input class="small" type="submit" value="Tools" /></form>
</td><td style="width: 50%;">
<form action="inventory.php?<?php echo time(); ?>" method="post"><input class="invisible" type="radio" name="type" checked="checked" value="Other" /><input class="small" type="submit" value="Other" /></form>
</td></tr>
</table>
</div>
</div>
</div>
<div class="container-fluid">
<div class="row">
<div class="col-sm-12" style="font-size: 12px">
<?php
$stmt = $db->prepare("SELECT * FROM cookbook WHERE charname=:charname");
		$stmt->execute(array(':charname' => $charname));
while($row = $stmt->fetch())
{
$friedmeat=$row['friedmeat'];
$meatsandwich=$row['meatsandwich'];
$applesauce=$row['applesauce'];
$cesarsalad=$row['cesarsalad'];
$lifepotion=$row['lifepotion'];
$friedeggs=$row['friedeggs'];
$diseasepotion=$row['diseasepotion'];
$holdpotion=$row['holdpotion'];
}
echo "<table class=\"page\">";
if ($type==" ") {
$stmt = $db->prepare("SELECT * FROM inventory WHERE charname=:charname and keep>0 and itemtype = 'Food' ORDER BY itemtype desc, weapontype, itemlevel desc, itemrarity desc");
		$stmt->execute(array(':charname' => $charname));
while($row = $stmt->fetch())
{
echo "<tr><td class=\"border\">
<img src=\"../images/".$row['itemimage'].".png\" /><br />".$row['itemname']."<br />Level ".$row['itemlevel']."<br />".$row['itemrarity'];
if ($row['keep']>1) {
echo "<br />Amount: ".$row['keep'];
}
echo "</td><td class=\"border\">
<table class=\"page\"><tr><td class=\"left\">Description:</td><td class=\"left\">".$row['itemdescription'];
echo "</td></tr><tr><td class=\"left\">Item Type:</td><td class=\"left\">".$row['itemtype']."</td></tr>";
if ($row['enhancement1']!="None")
{
echo "<tr><td class=\"left\">Effect:</td><td class=\"left\">".$row['enhancement1']."</td></tr>";
}
if ($row['enhancement2']!="None")
{
echo "<tr><td class=\"left\">Effect:</td><td class=\"left\">".$row['enhancement2']."</td></tr>";
}
if ($row['itemvalue']>0)
{

echo "<tr><td class=\"left\">Value:</td><td class=\"left\">".$row['itemvalue']." Gold</td></tr>";

}
if ($row['maxwater']>0)
{

echo "<tr><td class=\"left\">Life: +10</td><td class=\"left\">Mana: +10</td></tr>";

echo "<tr><td class=\"left\">Water Units:</td><td class=\"left\">".$row['waterunits']."/".$row['maxwater']."</td></tr>";

}
if ($row['waterunits']>0)
{

echo "<tr><td class=\"center\" colspan=\"2\">
<table class=\"page\"><tr><td class=\"page\"><form name=\"drink\" action=\"drink.php?".time();

  echo "\" method=\"get\"><input class=\"invisible\" type=\"radio\" name=\"drink\" checked=\"checked\" value=\"".$row['itemnumber'];

  echo "\"><br /><input type=\"submit\" value=\"Drink Water\" class=\"small\"></form></td></tr></table>
</td></tr>";

}
if ($row['consumable']==1)
{
echo "<tr><td class=\"page\" colspan=\"2\"><table class=\"page\"><tr><td class=\"page\"><form name=\"cook\" action=\"consume.php?".time()."\" method=\"get\"><input class=\"invisible\" type=\"radio\" name=\"food\" checked=\"checked\" value=\"".$row['itemname']."\"><br /><input type=\"submit\" value=\"Consume\" class=\"small\"></form></td></tr></table></td></tr>";
}
echo "</table>";
echo "</td></tr></table>";
}
}
if ($type=="Ingredients") {
	$stmt = $db->prepare("SELECT * FROM inventory WHERE charname=:charname and keep>0 and itemtype = 'Food' ORDER BY itemtype desc, weapontype, itemlevel desc, itemrarity desc");
		$stmt->execute(array(':charname' => $charname));
while($row = $stmt->fetch())
{
echo "<tr><td class=\"border\">
<img src=\"../images/".$row['itemimage'].".png\" /><br />".$row['itemname']."<br />Level ".$row['itemlevel']."<br />".$row['itemrarity'];
if ($row['keep']>1)
{
echo "<br />Amount: ".$row['keep'];
}
echo "</td><td class=\"border\">
<table class=\"page\"><tr><td class=\"left\">Description:</td><td class=\"left\">".$row['itemdescription'];
echo "</td></tr><tr><td class=\"left\">Item Type:</td><td class=\"left\">".$row['itemtype']."</td></tr>";
if ($row['enhancement1']!="None")
{
echo "<tr><td class=\"left\">Effect:</td><td class=\"left\">".$row['enhancement1']."</td></tr>";
}
if ($row['enhancement2']!="None")
{
echo "<tr><td class=\"left\">Effect:</td><td class=\"left\">".$row['enhancement2']."</td></tr>";
}
if ($row['itemvalue']>0)
{
echo "<tr><td class=\"left\">Value:</td><td class=\"left\">".$row['itemvalue']." Gold</td></tr>";
}
if ($row['maxwater']>0)
{
echo "<tr><td class=\"left\">Life: +10</td><td class=\"left\">Mana: +10</td></tr>";
echo "<tr><td class=\"left\">Water Units:</td><td class=\"left\">".$row['waterunits']."/".$row['maxwater']."</td></tr>";
}
if ($row['waterunits']>0)
{
echo "<tr><td class=\"center\" colspan=\"2\">
<table class=\"page\"><tr><td class=\"page\"><form name=\"drink\" action=\"drink.php?".time();

  echo "\" method=\"get\"><input class=\"invisible\" type=\"radio\" name=\"drink\" checked=\"checked\" value=\"".$row['itemnumber'];

  echo "\"><br /><input type=\"submit\" value=\"Drink Water\" class=\"small\"></form></td></tr></table>
</td></tr>";

}

if ($row['consumable']==1)
{
echo "<tr><td class=\"page\" colspan=\"2\"><table class=\"page\"><tr><td class=\"page\"><form name=\"cook\" action=\"consume.php?".time()."\" method=\"get\"><input class=\"invisible\" type=\"radio\" name=\"food\" checked=\"checked\" value=\"".$row['itemname']."\"><br /><input type=\"submit\" value=\"Consume\" class=\"small\"></form></td></tr></table></td></tr>";
}
echo "</table>";
echo "</td></tr>";
}
}
if ($type=="Recipes") {
if ($friedmeat>0)
{
echo "<tr><td class=\"border\">
<table class=\"page\"><tr><td class=\"center\" colspan=\"2\"><h2>Fried Meat</h2><br /><img src=\"../images/friedmeat.png\" /></td></tr><tr><td class=\"left\" colspan=\"2\">This classic dish is one of the simplest recipes you know.</td></tr><tr><td class=\"center\">

<table class=\"page\"><tr><td class=\"page\">
<h3>Ingredients</h3></td></tr><tr><td class=\"left\">Fire<br />Skillet<br />Raw Meat<br /></td></tr></table></td><td class=\"center\">
<table class=\"page\"><tr><td class=\"page\">
<h3>Effects</h3></td></tr><tr><td class=\"center\">
<table class=\"page\"><tr><td class=\"left\">Life:</td><td class=\"left\"> +15</td></tr>
<tr><td class=\"left\">Mana:</td><td class=\"left\"> +5</td></tr></table></td></tr></td></tr></table>

<tr><td class=\"page\" colspan=\"2\"><table class=\"page\"><tr><td class=\"page\"><form name=\"cook\" action=\"cook.php?".time()."\" method=\"get\"><input class=\"invisible\" type=\"radio\" name=\"food\" checked=\"checked\" value=\"friedmeat\"><br /><input type=\"submit\" value=\"Cook\" class=\"small\"></form></td></tr></table></td></tr></table>
</td></tr>";
}
if ($lifepotion>0)
{
echo "<tr><td class=\"border\">
<table class=\"page\"><tr><td class=\"center\" colspan=\"2\"><h2>Life Potion</h2><br /><img src=\"../images/lifepotion.png\" /></td></tr><tr><td class=\"left\" colspan=\"2\">This is a simple life potion.</td></tr><tr><td class=\"center\">

<table class=\"page\"><tr><td class=\"page\">
<h3>Ingredients</h3></td></tr><tr><td class=\"left\">Potion Bottle<br />Water<br />Aloe<br /></td></tr></table></td><td class=\"center\">
<table class=\"page\"><tr><td class=\"page\">
<h3>Effects</h3></td></tr><tr><td class=\"center\">
<table class=\"page\"><tr><td class=\"left\">Life:</td><td class=\"left\"> +15</td></tr></table></td></tr></td></tr></table>

<tr><td class=\"page\" colspan=\"2\"><table class=\"page\"><tr><td class=\"page\"><form name=\"cook\" action=\"cook.php?".time()."\" method=\"get\"><input class=\"invisible\" type=\"radio\" name=\"food\" checked=\"checked\" value=\"lifepotion\"><br /><input type=\"submit\" value=\"Brew\" class=\"small\"></form></td></tr></table></td></tr></table>
</td></tr>";
}
if ($meatsandwich>0)
{
echo "<tr><td class=\"border\">
<table class=\"page\"><tr><td class=\"center\" colspan=\"2\"><h2>Fried Meat Sandwich</h2><br /><img src=\"../images/meatsandwich.png\" /></td></tr><tr><td class=\"left\" colspan=\"2\">This classic dish is one of the simplest recipes you know, but it is more nutritous than meat or bread alone.</td></tr><tr><td class=\"center\">

<table class=\"page\"><tr><td class=\"page\">
<h3>Ingredients</h3></td></tr><tr><td class=\"left\">Fried Meat<br />Bread x2</td></tr></table></td><td class=\"center\">
<table class=\"page\"><tr><td class=\"page\">
<h3>Effects</h3></td></tr><tr><td class=\"center\">
<table class=\"page\"><tr><td class=\"left\">Life:</td><td class=\"left\"> +30</td></tr>
<tr><td class=\"left\">Mana:</td><td class=\"left\"> +20</td></tr></table></td></tr></td></tr></table>

<tr><td class=\"page\" colspan=\"2\"><table class=\"page\"><tr><td class=\"page\"><form name=\"cook\" action=\"cook.php?".time()."\" method=\"get\"><input class=\"invisible\" type=\"radio\" name=\"food\" checked=\"checked\" value=\"meatsandwich\"><br /><input type=\"submit\" value=\"Cook\" class=\"small\"></form></td></tr></table></td></tr></table>
</td></tr>";

}

if ($applesauce>0)
{
echo "<tr><td class=\"border\">
<table class=\"page\"><tr><td class=\"center\" colspan=\"2\"><h2>Applesauce</h2><br /><img src=\"../images/applesauce.png\" /></td></tr><tr><td class=\"left\" colspan=\"2\">This classic dish is one of the simplest recipes you know, but it is more nutritous than plain apples.</td></tr><tr><td class=\"center\">

<table class=\"page\"><tr><td class=\"page\">
<h3>Ingredients</h3></td></tr><tr><td class=\"left\">Apples x3<br />Cinnamon<br />Sugar</td></tr></table></td><td class=\"center\">
<table class=\"page\"><tr><td class=\"page\">
<h3>Effects</h3></td></tr><tr><td class=\"center\">
<table class=\"page\"><tr><td class=\"left\">Life:</td><td class=\"left\"> +15</td></tr>
<tr><td class=\"left\">Mana:</td><td class=\"left\"> +15</td></tr></table></td></tr></td></tr></table>

<tr><td class=\"page\" colspan=\"2\"><table class=\"page\"><tr><td class=\"page\"><form name=\"cook\" action=\"cook.php?".time()."\" method=\"get\"><input class=\"invisible\" type=\"radio\" name=\"food\" checked=\"checked\" value=\"applesauce\"><br /><input type=\"submit\" value=\"Cook\" class=\"small\"></form></td></tr></table></td></tr></table>
</td></tr>";

}

if ($cesarsalad>0)
{
echo "<tr><td class=\"border\">
<table class=\"page\"><tr><td class=\"center\" colspan=\"2\"><h2>Cesar Salad</h2><br /><img src=\"../images/salad.png\" /></td></tr><tr><td class=\"left\" colspan=\"2\">This classic dish is one of the simplest recipes you know.</td></tr><tr><td class=\"center\">

<table class=\"page\"><tr><td class=\"page\">
<h3>Ingredients</h3></td></tr><tr><td class=\"left\">Lettuce x3<br />Vegetables<br />Salt<br />Oil<br />Vinegar</td></tr></table></td><td class=\"center\">
<table class=\"page\"><tr><td class=\"page\">
<h3>Effects</h3></td></tr><tr><td class=\"center\">
<table class=\"page\"><tr><td class=\"left\">Life:</td><td class=\"left\"> +20</td></tr>
<tr><td class=\"left\">Mana:</td><td class=\"left\"> +20</td></tr></table></td></tr></td></tr></table>

<tr><td class=\"page\" colspan=\"2\"><table class=\"page\"><tr><td class=\"page\"><form name=\"cook\" action=\"cook.php?".time()."\" method=\"get\"><input class=\"invisible\" type=\"radio\" name=\"food\" checked=\"checked\" value=\"cesarsalad\"><br /><input type=\"submit\" value=\"Cook\" class=\"small\"></form></td></tr></table></td></tr></table>
</td></tr>";

}

if ($friedeggs>0)
{
echo "<tr><td class=\"border\">
<table class=\"page\"><tr><td class=\"center\" colspan=\"2\"><h2>Fried Eggs</h2><br /><img src=\"../images/friedeggs.png\" /></td></tr><tr><td class=\"left\" colspan=\"2\">This classic dish is one of the simplest recipes you know.</td></tr><tr><td class=\"center\">

<table class=\"page\"><tr><td class=\"page\">
<h3>Ingredients</h3></td></tr><tr><td class=\"left\">Fire<br />Skillet<br />Eggs x3<br />Salt<br /></td></tr></table></td><td class=\"center\">
<table class=\"page\"><tr><td class=\"page\">
<h3>Effects</h3></td></tr><tr><td class=\"center\">
<table class=\"page\"><tr><td class=\"left\">Life:</td><td class=\"left\"> +35</td></tr>
<tr><td class=\"left\">Mana:</td><td class=\"left\"> +35</td></tr></table></td></tr></td></tr></table>

<tr><td class=\"page\" colspan=\"2\"><table class=\"page\"><tr><td class=\"page\"><form name=\"cook\" action=\"cook.php?".time()."\" method=\"get\"><input class=\"invisible\" type=\"radio\" name=\"food\" checked=\"checked\" value=\"friedeggs\"><br /><input type=\"submit\" value=\"Cook\" class=\"small\"></form></td></tr></table></td></tr></table>
</td></tr>";
}
if ($diseasepotion>0)
{
echo "<tr><td class=\"border\">
<table class=\"page\"><tr><td class=\"center\" colspan=\"2\"><h2>Disease Potion</h2><br /><img src=\"../images/diseasepot.png\" /></td></tr><tr><td class=\"left\" colspan=\"2\">This is a simple disease potion.</td></tr><tr><td class=\"center\">

<table class=\"page\"><tr><td class=\"page\">
<h3>Ingredients</h3></td></tr><tr><td class=\"left\">Potion Bottle<br />Vinegar<br />Rat Tails x5<br /></td></tr></table></td><td class=\"center\">
<table class=\"page\"><tr><td class=\"page\">
<h3>Effects</h3></td></tr><tr><td class=\"center\">
<table class=\"page\"><tr><td class=\"left\">Life:</td><td class=\"left\"> -15</td></tr><tr><td class=\"left\">Accuracy:</td><td class=\"left\"> -15</td></tr></table></td></tr></td></tr></table>

<tr><td class=\"page\" colspan=\"2\"><table class=\"page\"><tr><td class=\"page\"><form name=\"cook\" action=\"cook.php?".time()."\" method=\"get\"><input class=\"invisible\" type=\"radio\" name=\"food\" checked=\"checked\" value=\"diseasepot\"><br /><input type=\"submit\" value=\"Brew\" class=\"small\"></form></td></tr></table></td></tr></table>
</td></tr>";
}
}
?>
</div>
</div>
</div>
</div>
</div>
<button class="collapsible1" style="border: 1px solid #105050;padding: 5px; margin: 0px;color: #105050; text-align: center; background-color: transparent; background-image: linear-gradient(cornsilk, #c9a682);" onclick="checkContentcollapse8()">Equip Pocket</button>
<div id="contentcollapse8" class="contentcollapse8" style="border: 1px solid #105050;padding: 5px; margin: 0px; background-color: transparent; background-image: linear-gradient(cornsilk, #c9a682);transition: display 2.2s ease-out;">
<div class="container-fluid" style=" border: 1px solid #c9a682; border-radius: 3rem; background-color: black; margin: 0px; text-align: center">
<div class="container-fluid">
<div class="row">
<div class="col-sm-12" style="font-size: 12px">
<table><tr><td colspan="2">
<h4>Equip Pocket</h4>
<a class="small" href="inventory.php?<?php echo time(); ?>">All</a>
</td></tr><tr><td style="width: 50%;">
<form action="inventory.php?<?php echo time(); ?>" method="post"><input class="invisible" type="radio" name="type" checked="checked" value="Weapon" /><input class="small" type="submit" value="Weapons" /></form>
</td><td style="width: 50%;">
<form action="inventory.php?<?php echo time(); ?>" method="post"><input class="invisible" type="radio" name="type" checked="checked" value="Armor" /><input class="small" type="submit" value="Armor" /></form>
</td></tr><tr><td style="width: 50%;">
<form action="inventory.php?<?php echo time(); ?>" method="post"><input class="invisible" type="radio" name="type" checked="checked" value="Accessory" /><input class="small" type="submit" value="Accessories" /></form>
</td><td style="width: 50%;">
<form action="inventory.php?<?php echo time(); ?>" method="post"><input class="invisible" type="radio" name="type" checked="checked" value="Other" /><input class="small" type="submit" value="Other" /></form>
</td></tr></table>
</div>
</div>
</div>
<div class="container-fluid">
<div class="row">
<div class="col-sm-12" style="font-size: 12px">
<?php
if (!$type)
{
$stmt = $db->prepare("SELECT * FROM inventory WHERE charname=:charname and equip>0 and itemtype != 'Food' ORDER BY itemrarity, itemlevel, weapontype, itemtype, equipable");
				$stmt->execute(array(':charname' => $charname));
while($row = $stmt->fetch())
{
include ('../includes/displayinv.php');
}
}
else
{
$stmt = $db->prepare("SELECT * FROM inventory WHERE charname=:charname and equip>0 and itemtype = :type order by itemrarity, itemlevel, weapontype, itemtype");
				$stmt->execute(array(':charname' => $charname,
				':type' => $type
				));
while($row = $stmt->fetch())
{
include ('../includes/displayinv.php');
}
}
?>
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
<button class="collapsible1" style="border: 1px solid #105050; padding: 5px 5px 5px 5px; margin: 0px 0px 0px 0px; color: #105050; text-align: center; background-color: transparent; background-image: linear-gradient(cornsilk, #c9a682);" onclick="checkContentcollapse1()">Equipment Slots</button>
<div id="contentcollapse1" class="contentcollapse1" style="border: 1px solid #105050; text-align: center; padding: 0px 0px 0px 0px; margin: 0px 0px 0px 0px; background-color: transparent; background-image: linear-gradient(cornsilk, #c9a682);">
<div style="text-align: center;">
<button class="collapsible1" style="border: 1px solid #105050; padding: 5px 5px 5px 5px; margin: 0px 0px 0px 0px;color: #105050; text-align: center; background-color: transparent; background-image: linear-gradient(cornsilk, #c9a682);" onclick="checkContentcollapse2()">Weapons Slot</button>
<div id="contentcollapse2" class="contentcollapse2" style="border: 1px solid #105050;padding: 5px 5px 5px 5px; margin: 0px 0px 0px 0px; background-color: transparent; background-image: linear-gradient(cornsilk, #c9a682);text-align: center;">
<div class="container-fluid" style="text-align: center; border: 1px solid #c9a682; border-radius: 3rem; background-color: black; padding: 0px 0px 0px 0px; margin: 0px 0px 0px 0px; font-size: 12px;">
<div class="row">
<div class="col-sm-12" style="font-size: 12px;"><h4>Weapons Slot</h4>
</div>
<div class="col-sm-6" style="font-size: 12px;">
<h5 style="font-size: 12px;"><b>Left Hand</b></h5>
<?php 
//***********get weapontype*********
$stmt = $db->prepare("SELECT * FROM inventory WHERE charname=:charname and equip>0 and duality=0 and itemtype='Weapon' ORDER BY itemtype desc, weapontype, itemlevel desc, itemrarity desc");
				$stmt->execute(array(':charname' => $charname));
while($row = $stmt->fetch())
{
include ('../includes/einvdisplay.php');

echo "<table class=\"page\"><tr><td class=\"page\">";
echo "<form name=\"elkeep\" action=\"inventory.php?".time();
echo "\" method=\"post\"><input class=\"invisible\" type=\"radio\" name=\"elkeep\" checked=\"checked\" value=\"".$row['itemnumber'];
echo "\"><input type=\"submit\" value=\"Unequip\" class=\"small\" style=\"font-size: 12px;\"></form></td></tr><tr><td class=\"page\"><form name=\"eltrade\" action=\"inventory.php?".time();
echo "\" method=\"post\"><input class=\"invisible\" type=\"radio\" name=\"eltrade\" checked=\"checked\" value=\"".$row['itemnumber'];
echo "\"><input type=\"submit\" value=\"Trade\" class=\"small\" style=\"font-size: 12px;\"></form>";
echo "</td></tr></table>";
}
$stmt = $db->prepare("SELECT * FROM inventory WHERE charname=:charname and equip>0 and equiplh>0 and itemtype='Weapon' ORDER BY itemtype desc, weapontype, itemlevel desc, itemrarity desc");
				$stmt->execute(array(':charname' => $charname));
while($row = $stmt->fetch())
{
include ('../includes/einvdisplay.php');	

echo "<table><tr><td class=\"page\">";
echo "<form name=\"elkeep\" action=\"inventory.php?".time();
echo "\" method=\"post\"><input class=\"invisible\" type=\"radio\" name=\"elkeep\" checked=\"checked\" value=\"".$row['itemnumber'];
echo "\"><input type=\"submit\" value=\"Unequip\" class=\"small\" style=\"font-size: 12px;\"></form></td></tr><tr><td class=\"page\"><form name=\"eltrade\" action=\"inventory.php?".time();
echo "\" method=\"post\"><input class=\"invisible\" type=\"radio\" name=\"eltrade\" checked=\"checked\" value=\"".$row['itemnumber'];
echo "\"><input type=\"submit\" value=\"Trade\" class=\"small\" style=\"font-size: 12px;\"></form>";
echo "</td></tr></table>";
}
?>
</div>
<div class="col-sm-6">
<h5 style="font-size: 12px;"><b>Right Hand</b></h5>
<?php 
//***********get weapontype*********
$stmt = $db->prepare("SELECT * FROM inventory WHERE charname=:charname and equip>0 and duality=0 and itemtype='Weapon' ORDER BY itemtype desc, weapontype, itemlevel desc, itemrarity desc");
				$stmt->execute(array(':charname' => $charname));
while($row = $stmt->fetch())
{
include ('../includes/einvdisplay.php');	

echo "<table class=\"page\"><tr><td class=\"page\">";
echo "<form name=\"erkeep\" action=\"inventory.php?".time();
echo "\" method=\"post\"><input class=\"invisible\" type=\"radio\" name=\"erkeep\" checked=\"checked\" value=\"".$row['itemnumber'];
echo "\"><br /><input type=\"submit\" value=\"Unequip\" class=\"small\" style=\"font-size: 12px;\"></form></td></tr><tr><td class=\"page\"><form name=\"ertrade\" action=\"inventory.php?".time();
echo "\" method=\"post\"><input class=\"invisible\" type=\"radio\" name=\"ertrade\" checked=\"checked\" value=\"".$row['itemnumber'];
echo "\"><br /><input type=\"submit\" value=\"Trade\" class=\"small\" style=\"font-size: 12px;\"></form>";
echo "</td></tr></table>";
}
$stmt = $db->prepare("SELECT * FROM inventory WHERE charname=:charname and equip>0 and equiprh>0 and itemtype='Weapon' ORDER BY itemtype desc, weapontype, itemlevel desc, itemrarity desc");
				$stmt->execute(array(':charname' => $charname));
while($row = $stmt->fetch())
{
include ('../includes/einvdisplay.php');	

echo "<table class=\"page\"><tr><td class=\"page\">";
echo "<form name=\"erkeep\" action=\"inventory.php?".time();
echo "\" method=\"post\"><input class=\"invisible\" type=\"radio\" name=\"erkeep\" checked=\"checked\" value=\"".$row['itemnumber'];
echo "\"><br /><input type=\"submit\" value=\"Unequip\" class=\"small\" style=\"font-size: 12px;\"></form></td></tr><tr><td class=\"page\"><form name=\"ertrade\" action=\"inventory.php?".time();
echo "\" method=\"post\"><input class=\"invisible\" type=\"radio\" name=\"ertrade\" checked=\"checked\" value=\"".$row['itemnumber'];
echo "\"><br /><input type=\"submit\" value=\"Trade\" class=\"small\" style=\"font-size: 12px;\"></form>";
echo "</td></tr></table>";
}
?>
</div>
</div>
</div>
</div>
<button class="collapsible1" style="border: 1px solid #105050;padding: 5px; margin: 0px;color: #105050; text-align: center; background-color: transparent; background-image: linear-gradient(cornsilk, #c9a682);" onclick="checkContentcollapse3()">Accessories Slot</button>
<div id="contentcollapse3" class="contentcollapse3" style="border: 1px solid #105050;padding: 5px; margin: 0px; background-color: transparent; background-image: linear-gradient(cornsilk, #c9a682);transition: display 2.2s ease-out;">
<div class="container-fluid" style=" border: 1px solid #c9a682; border-radius: 3rem; background-color: black; margin: 0px;">
<div class="row">
<div class="col-sm-12">
<h5 style="font-size: 12px;"><b>Rings</b></h5>
</div>
<div class="col-sm-6">
<h5 style="font-size: 12px;"><b>Necklace</b></h5>
<?php 
//***********get weapontype*********
$stmt = $db->prepare("SELECT * FROM inventory WHERE charname=:charname and equip>0 and equiplocation='Neck' ORDER BY itemtype desc, weapontype, itemlevel desc, itemrarity desc");
				$stmt->execute(array(':charname' => $charname));
while($row = $stmt->fetch())
{
include ('../includes/einvdisplay.php');	

echo "<table class=\"page\"><tr><td class=\"page\">";
echo "<form name=\"enkeep\" action=\"inventory.php?".time();
echo "\" method=\"post\"><input class=\"invisible\" type=\"radio\" name=\"enkeep\" checked=\"checked\" value=\"".$row['itemnumber'];
echo "\"><input type=\"submit\" value=\"Unequip\" class=\"small\" style=\"font-size: 12px;\"></form></td></tr><tr><td class=\"page\"><form name=\"entrade\" action=\"inventory.php?".time();
echo "\" method=\"post\"><input class=\"invisible\" type=\"radio\" name=\"entrade\" checked=\"checked\" value=\"".$row['itemnumber'];
echo "\"><input type=\"submit\" value=\"Trade\" class=\"small\" style=\"font-size: 12px;\"></form>";
echo "</td></tr></table>";
}
?>
</div>
<div class="col-sm-6">
<h5 style="font-size: 12px;"><b>Belt</b></h5>
</div>
</div>
</div>
</div>
<button class="collapsible1" style="border: 1px solid #105050;padding: 5px; margin: 0px;color: #105050; text-align: center; background-color: transparent; background-image: linear-gradient(cornsilk, #c9a682);" onclick="checkContentcollapse4()">Armor Slots</button>
<div id="contentcollapse4" class="contentcollapse4" style="border: 1px solid #105050;padding: 5px; margin: 0px; background-color: transparent; background-image: linear-gradient(cornsilk, #c9a682);">
<div class="container-fluid" style=" border: 1px solid #c9a682; border-radius: 3rem; background-color: black; margin: 0px;">
<div class="row">
<div class="col-sm-4">
<h6>Head</h6>
<?php 
//***********get weapontype*********
$stmt = $db->prepare("SELECT * FROM inventory WHERE charname=:charname and equip>0 and equiplocation='Head' ORDER BY itemtype desc, weapontype, itemlevel desc, itemrarity desc");
				$stmt->execute(array(':charname' => $charname));
while($row = $stmt->fetch())
{
include ('../includes/einvdisplay.php');	

echo "<table class=\"page\"><tr><td class=\"page\">";
echo "<form name=\"ehkeep\" action=\"inventory.php?".time();
echo "\" method=\"post\"><input class=\"invisible\" type=\"radio\" name=\"ehkeep\" checked=\"checked\" value=\"".$row['itemnumber'];
echo "\"><input type=\"submit\" value=\"Unequip\" class=\"small\" style=\"font-size: 12px;\"></form></td></tr><tr><td class=\"page\"><form name=\"ehtrade\" action=\"inventory.php?".time();
echo "\" method=\"post\"><input class=\"invisible\" type=\"radio\" name=\"ehtrade\" checked=\"checked\" value=\"".$row['itemnumber'];
echo "\"><input type=\"submit\" value=\"Trade\" class=\"small\" style=\"font-size: 12px;\"></form>";
echo "</td></tr></table>";
}
?>
</div>
<div class="col-sm-4">
<h6>Back</h6>
<?php 
//***********get weapontype*********
$stmt = $db->prepare("SELECT * FROM inventory WHERE charname=:charname and equip>0 and equiplocation='Back' ORDER BY itemtype desc, weapontype, itemlevel desc, itemrarity desc");
				$stmt->execute(array(':charname' => $charname));
while($row = $stmt->fetch())
{
include ('../includes/einvdisplay.php');	

echo "<table class=\"page\"><tr><td class=\"page\">";
echo "<form name=\"ebkeep\" action=\"inventory.php?".time();
echo "\" method=\"post\"><input class=\"invisible\" type=\"radio\" name=\"ebkeep\" checked=\"checked\" value=\"".$row['itemnumber'];
echo "\"><input type=\"submit\" value=\"Unequip\" class=\"small\" style=\"font-size: 12px;\"></form></td></tr><tr><td class=\"page\"><form name=\"ebtrade\" action=\"inventory.php?".time();
echo "\" method=\"post\"><input class=\"invisible\" type=\"radio\" name=\"ebtrade\" checked=\"checked\" value=\"".$row['itemnumber'];
echo "\"><input type=\"submit\" value=\"Trade\" class=\"small\" style=\"font-size: 12px;\"></form>";
echo "</td></tr></table>";
}
?>
</div>
<div class="col-sm-4">
<h6>Chest</h6>
<?php 
//***********get weapontype*********
$stmt = $db->prepare("SELECT * FROM inventory WHERE charname=:charname and equip>0 and equiplocation='Chest' ORDER BY itemtype desc, weapontype, itemlevel desc, itemrarity desc");
				$stmt->execute(array(':charname' => $charname));
while($row = $stmt->fetch())
{
include ('../includes/einvdisplay.php');	

echo "<table class=\"page\"><tr><td class=\"page\">";
echo "<form name=\"enkeep\" action=\"inventory.php?".time();
echo "\" method=\"post\"><input class=\"invisible\" type=\"radio\" name=\"enkeep\" checked=\"checked\" value=\"".$row['itemnumber'];
echo "\"><input type=\"submit\" value=\"Unequip\" class=\"small\" style=\"font-size: 12px;\"></form></td></tr><tr><td class=\"page\"><form name=\"entrade\" action=\"inventory.php?".time();
echo "\" method=\"post\"><input class=\"invisible\" type=\"radio\" name=\"ertnade\" checked=\"checked\" value=\"".$row['itemnumber'];
echo "\"><input type=\"submit\" value=\"Trade\" class=\"small\" style=\"font-size: 12px;\"></form>";
echo "</td></tr></table>";
}
?>
</div>
<div class="col-sm-4">
<h6>Legs</h6>
<?php 
//***********get weapontype*********
$stmt = $db->prepare("SELECT * FROM inventory WHERE charname=:charname and equip>0 and equiplocation='Legs' ORDER BY itemtype desc, weapontype, itemlevel desc, itemrarity desc");
				$stmt->execute(array(':charname' => $charname));
while($row = $stmt->fetch())
{
include ('../includes/einvdisplay.php');	

echo "<table class=\"page\"><tr><td class=\"page\">";
echo "<form name=\"enkeep\" action=\"inventory.php?".time();
echo "\" method=\"post\"><input class=\"invisible\" type=\"radio\" name=\"enkeep\" checked=\"checked\" value=\"".$row['itemnumber'];
echo "\"><input type=\"submit\" value=\"Unequip\" class=\"small\" style=\"font-size: 12px;\"></form></td></tr><tr><td class=\"page\"><form name=\"entrade\" action=\"inventory.php?".time();
echo "\" method=\"post\"><input class=\"invisible\" type=\"radio\" name=\"ertnade\" checked=\"checked\" value=\"".$row['itemnumber'];
echo "\"><input type=\"submit\" value=\"Trade\" class=\"small\" style=\"font-size: 12px;\"></form>";
echo "</td></tr></table>";
}
?>
</div>
<div class="col-sm-4">
<h6>Hands</h6>
<?php 
//***********get weapontype*********
$stmt = $db->prepare("SELECT * FROM inventory WHERE charname=:charname and equip>0 and equiplocation='Hands' ORDER BY itemtype desc, weapontype, itemlevel desc, itemrarity desc");
				$stmt->execute(array(':charname' => $charname));
while($row = $stmt->fetch())
{
include ('../includes/einvdisplay.php');	

echo "<table class=\"page\"><tr><td class=\"page\">";
echo "<form name=\"enkeep\" action=\"inventory.php?".time();
echo "\" method=\"post\"><input class=\"invisible\" type=\"radio\" name=\"enkeep\" checked=\"checked\" value=\"".$row['itemnumber'];
echo "\"><input type=\"submit\" value=\"Unequip\" class=\"small\" style=\"font-size: 12px;\"></form></td></tr><tr><td class=\"page\"><form name=\"entrade\" action=\"inventory.php?".time();
echo "\" method=\"post\"><input class=\"invisible\" type=\"radio\" name=\"ertnade\" checked=\"checked\" value=\"".$row['itemnumber'];
echo "\"><input type=\"submit\" value=\"Trade\" class=\"small\" style=\"font-size: 12px;\"></form>";
echo "</td></tr></table>";
}
?>
</div>
<div class="col-sm-4">
<h6>Feet</h6>
<?php 
//***********get weapontype*********
$stmt = $db->prepare("SELECT * FROM inventory WHERE charname=:charname and equip>0 and equiplocation='Feet' ORDER BY itemtype desc, weapontype, itemlevel desc, itemrarity desc");
				$stmt->execute(array(':charname' => $charname));
while($row = $stmt->fetch())
{
include ('../includes/einvdisplay.php');	

echo "<table class=\"page\"><tr><td class=\"page\">";
echo "<form name=\"enkeep\" action=\"inventory.php?".time();
echo "\" method=\"post\"><input class=\"invisible\" type=\"radio\" name=\"enkeep\" checked=\"checked\" value=\"".$row['itemnumber'];
echo "\"><input type=\"submit\" value=\"Unequip\" class=\"small\" style=\"font-size: 12px;\"></form></td></tr><tr><td class=\"page\"><form name=\"entrade\" action=\"inventory.php?".time();
echo "\" method=\"post\"><input class=\"invisible\" type=\"radio\" name=\"ertnade\" checked=\"checked\" value=\"".$row['itemnumber'];
echo "\"><input type=\"submit\" value=\"Trade\" class=\"small\" style=\"font-size: 12px;\"></form>";
echo "</td></tr></table>";
}
?>
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
</body>
</html>