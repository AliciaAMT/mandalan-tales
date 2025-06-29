<?php
//include config
require( $_SERVER['DOCUMENT_ROOT'] . '/game/includes/config2.php');
//if not logged in redirect to login page
if(!$user->is_logged_in()){ header('Location: login.php'); die('This site works best with redirections turned on, but you may continue with them turned off. <a href="login.php">Continue</a>');}
$username = $_SESSION['username'];
$charname = $_SESSION['charname'];
?>
<?php
//******************getstats inv*******************
include ('includes/getstats.php');
include ('includes/getweapontype.php');
include ('includes/getskills.php');
include ('includes/getdamage.php');
include ('includes/getdefense.php');
//***************getflags*****************************
include ('includes/getflags.php');
//******************get charstats************************
include ('includes/getcharstats.php');
//***********************check out of bounds************
include ('includes/mapboundaries.php');
//************redeclare variables for map******************
include ('includes/getmap.php');
//***********CHECK IF ENGAGED IN A FIGHT AND REDIRECT***********
//ENEMY FLAG(TABLE), FIGHT ENEMY(TABLE), 
include ('includes/getenemy.php');
include ('includes/getnomove.php');
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
<link href="main.css?<?php echo time(); ?>" rel="stylesheet"></link>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
<script>
window.onload = function () {
    var contentcollapse1a = localStorage.getItem("contentcollapse1a");
	var contentcollapse2a = localStorage.getItem("contentcollapse2a");
	var contentcollapse3a = localStorage.getItem("contentcollapse3a");
	var contentcollapse4a = localStorage.getItem("contentcollapse4a");
    if (contentcollapse1a==="true") {
        openContentcollapse1a();
    } else {
        closeContentcollapse1a();
    }
	if (contentcollapse2a==="true") {
        openContentcollapse2a();
    } else {
        closeContentcollapse2a();
    }
	if (contentcollapse3a==="true") {
        openContentcollapse3a();
    } else {
        closeContentcollapse3a();
    }
	if (contentcollapse4a==="true") {
        openContentcollapse4a();
    } else {
        closeContentcollapse4a();
    }
    }
function checkContentcollapse1a() {
    var contentcollapse1a = localStorage.getItem("contentcollapse1a");
        if (contentcollapse1a==="true") {
        closeContentcollapse1a();
    } else {
        openContentcollapse1a();
    }
    }   
function checkContentcollapse2a() {
    var contentcollapse2a = localStorage.getItem("contentcollapse2a");
        if (contentcollapse2a==="true") {
        closeContentcollapse2a();
    } else {
        openContentcollapse2a();
    }
    }
function checkContentcollapse4a() {
    var contentcollapse4a = localStorage.getItem("contentcollapse4a");
        if (contentcollapse4a==="true") {
        closeContentcollapse4a();
    } else {
        openContentcollapse4a();
    }
    }
function checkContentcollapse3a() {
    var contentcollapse3a = localStorage.getItem("contentcollapse3a");
        if (contentcollapse3a==="true") {
        closeContentcollapse3a();
    } else {
        openContentcollapse3a();
    }
    }	
function openContentcollapse1a() {
	document.getElementById("contentcollapse1a").style.display = "block";
    localStorage.setItem("contentcollapse1a", "true");
}
function openContentcollapse2a() {
	document.getElementById("contentcollapse2a").style.display = "block";
    localStorage.setItem("contentcollapse2a", "true");
}
function openContentcollapse3a() {
	document.getElementById("contentcollapse3a").style.display = "block";
    localStorage.setItem("contentcollapse3a", "true");
}
function openContentcollapse4a() {
	document.getElementById("contentcollapse4a").style.display = "block";
    localStorage.setItem("contentcollapse4a", "true");
}
function closeContentcollapse1a() {
    document.getElementById("contentcollapse1a").style.display = "none";
    localStorage.setItem("contentcollapse1a", "false");
}
function closeContentcollapse2a() {
    document.getElementById("contentcollapse2a").style.display = "none";
    localStorage.setItem("contentcollapse2a", "false");
}
function closeContentcollapse3a() {
    document.getElementById("contentcollapse3a").style.display = "none";
    localStorage.setItem("contentcollapse3a", "false");
}
function closeContentcollapse4a() {
    document.getElementById("contentcollapse4a").style.display = "none";
    localStorage.setItem("contentcollapse4a", "false");
}
</script>
</head>
<body><?php
//******************tutorial*********************
include ('includes/tutorial.php');
?>
<div class="container-fluid">
<div class="row">
<div class="col-sm-12" style="padding: 0px; margin: 0px; background-color: black;">

<div class="container-fluid">
<div class="row">
<div class="col-sm-3" style="padding: 0px; margin: 0px; background-color: black;">
<button class="collapsible2" style="padding: 5px; margin: 0px;color: rgb(210,180,150); text-align: center; background-color: black;" onclick="checkContentcollapse1a()">Quick Stats</button>
<div id="contentcollapse1a" class="contentcollapse1a" style="padding: 0px; margin: 0px;">
<div>
<table class="page">
<tr><td class="center"><img style="height: 55px" src="images/
<?php 
echo $portrait;
?>
i.png" border="0" /></td><td class="center">
<?php
echo $charname;
?>
<br>
<?php
echo $title;
?>
</td></tr><tr><td class="center"><img style="height: 55px" src="images/hourglass.png" border="0" /></td><td class="page">Level
<?php
echo " ";
echo $level;
?>
<br>
<?php
echo $experience;
?>
</td></tr><tr><td class="center"><img style="height: 40px" src="images/life.png" border="0" /></td><td class="page">
<?php
echo $life;
?>
/
<?php
echo $maxlife;
?>
</td></tr><tr><td class="center"><img style="height: 40px" src="images/mana.png" border="0" /></td><td class="page">
<?php
echo $mana;
?>
/
<?php
echo $maxmana;
?>
</td></tr><tr><td class="center"><img style="height: 35px" src="images/gold.png" border="0" /></td><td class="page">
<?php
echo $gold;
?>
</td></tr>
</table>
</div>
</div>
</div>
<div class="col-sm-6">
<button class="collapsible2" style="padding: 5px; margin: 0px;color: rgb(210,180,150); text-align: center; background-color: black;" onclick="checkContentcollapse2a()">Map</button>
<div id="contentcollapse2a" class="contentcollapse2a" style="padding: 0px; margin: 0px;">
<div class="map">
<table><tr><td width="300px">
<?php include ('includes/map.php'); ?>
</td></tr></table>
</div>
</div>
</div>
<div class="col-sm-3">
<button 
class="collapsible3" 
style="padding: 5px; margin: 0px;color: rgb(210,180,150); text-align: center; background-color: black;" 
onclick="checkContentcollapse3a()" >Tile Actions</button>
<div id="contentcollapse3a" class="contentcollapse3a" style="padding: 0px; margin: 0px;">
<div style="height: 300px; overflow: auto">
<table><tr><td  style="height: 300px; width: auto; top: 0">
<span style="top: 0;">
<?php 
include ('includes/gtilenpc.php');
include ('includes/gtileobjects.php');
include ('includes/gtileportals.php');
?>
</span>
</td></tr></table>
</div>
</div>
</div>
</div>
<div class="row">
<div class="col-sm-12">
<button class="collapsible4" style="padding: 5px; margin: 0px;color: rgb(210,180,150); text-align: center; background-color: black;" onclick="checkContentcollapse4a()">Main Menu</button>
<div id="contentcollapse4a" class="contentcollapse4a" style="padding: 0px; margin: 0px;">
<div class="container-fluid">
<div class="row">
<div class="col-sm-2">
<table>
<tr>
<td>
<a href="statistics.php?
<?php
echo time();
?>
">
<img src="images/stats.png" border="0" /><br />Statistics</a>
</td></tr></table>
</div><div class="col-sm-2 col-sx-4">
<table>
<tr>
<td>
<a href="inventory/inventory.php?
<?php
echo time();
?>
"><img src="images/inventory.png" border="0" /><br />Inventory</a>
</td></tr></table></div><div class="col-sm-2 col-sx-4">
<table>
<tr>
<td>
<a href="spells/spellbook.php?
<?php
echo time();
?>
"><img src="images/spellbook.png" border="0" /><br />Spellbook</a>
</td></tr></table></div><div class="col-sm-2 col-sx-4">
<table>
<tr>
<td>
<a href="skills/skills.php?
<?php
echo time();
?>
"><img src="images/equipment.png" border="0" /><br />Skills</a>
</td></tr></table></div><div class="col-sm-2 col-sx-4">
<table>
<tr>
<td>
<a href="cook/cookbook.php?
<?php
echo time();
?>
"><img src="images/cook.png" border="0" /><br />Cooking</a>
</td></tr></table></div><div class="col-sm-2 col-sx-4">
<table>
<tr>
<td>
<a href="quests/journal.php?
<?php
echo time();
?>
"><img src="images/questjournal.png" border="0" /><br />Quests</a>
</td></tr></table>
</div>
</div>
</div>
</div>
</div>
</div>
</div>

</div>
</div></div>
<table class="page">
<tr><td class="page">
<a href="welcome.php">Home</a> * 
<a href="premium.php">Premium Membership</a> * 
<a href="http://mandalantales.proboards.com/index.cgi">Forum</a> * 
<a href="help.php">Help</a> *
<a href="logout.php">Logout</a>
</td></tr>
</table>
</body></html>