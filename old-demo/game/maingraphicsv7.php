<?php
//include config
require( $_SERVER['DOCUMENT_ROOT'] . '/game/includes/config2.php');
//if not logged in redirect to login page
if(!$user->is_logged_in()){ header('Location: login.php'); }
$username = $_SESSION['username'];
$charname= $_SESSION['charname'];
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
window.onload = function () 
{
    var Contentcollapse1 = localStorage.getItem("Contentcollapse1");
	var Contentcollapse2 = localStorage.getItem("Contentcollapse2");
	var Contentcollapse3 = localStorage.getItem("Contentcollapse3");
	var Contentcollapse4 = localStorage.getItem("Contentcollapse4");
    if (Contentcollapse1==="true") {
        openContentcollapse1();
    } else {
        closeContentcollapse1();
    }
	if (Contentcollapse2==="true") {
        openContentcollapse2();
    } else {
        closeContentcollapse2();
    }
	if (Contentcollapse3==="true") {
        openContentcollapse3();
    } else {
        closeContentcollapse3();
    }
	if (Contentcollapse4==="true") {
        openContentcollapse4();
    } else {
        closeContentcollapse4();
    }
    }
function checkContentcollapse1() 
{
    var Contentcollapse1 = localStorage.getItem("Contentcollapse1");
        if (Contentcollapse1==="true") {
        openContentcollapse1();
    } else {
        closeContentcollapse1();
    }
    }   
function checkContentcollapse2() {
    var Contentcollapse2 = localStorage.getItem("Contentcollapse2");
        if (Contentcollapse2==="true") {
        closeContentcollapse2();
    } else {
        openContentcollapse2();
    }
    }
function checkContentcollapse4() {
    var Contentcollapse4 = localStorage.getItem("Contentcollapse4");
        if (Contentcollapse4==="true") {
        closeContentcollapse4();
    } else {
        openContentcollapse4();
    }
    }
function checkContentcollapse3() {
    var Contentcollapse3 = localStorage.getItem("Contentcollapse3");
        if (Contentcollapse3==="true") {
        closeContentcollapse3();
    } else {
        openContentcollapse3();
    }
    }	
function openContentcollapse1() {
	document.getElementById("Contentcollapse1").style.display = "block";
    localStorage.setItem("Contentcollapse1", "true");
}
function openContentcollapse2() {
	document.getElementById("Contentcollapse2").style.display = "block";
    localStorage.setItem("Contentcollapse2", "true");
}
function openContentcollapse3() {
	document.getElementById("Contentcollapse3").style.display = "block";
    localStorage.setItem("Contentcollapse3", "true");
}
function openContentcollapse4() {
	document.getElementById("Contentcollapse4").style.display = "block";
    localStorage.setItem("Contentcollapse4", "true");
}
function closeContentcollapse1() {
    document.getElementById("Contentcollapse1").style.display = "none";
    localStorage.setItem("Contentcollaspse1", "false");
}
function closeContentcollapse2() {
    document.getElementById("Contentcollapse2").style.display = "none";
    localStorage.setItem("Contentcollapse2", "false");
}
function closeContentcollapse3() {
    document.getElementById("Contentcollapse3").style.display = "none";
    localStorage.setItem("Contentcollapse3", "false");
}
function closeContentcollapse4() {
    document.getElementById("Contentcollapse4").style.display = "none";
    localStorage.setItem("Contentcollapse4", "false");
}
function openNav1() {
  document.getElementById("myNav1").style.height = "100%";
}
function closeNav1() {
  document.getElementById("myNav1").style.height = "0%";
}
function openNav2() {
  document.getElementById("myNav2").style.height = "100%";
}
function closeNav2() {
  document.getElementById("myNav2").style.height = "0%";
}
function openNav3() {
  document.getElementById("myNav3").style.height = "100%";
}
function closeNav3() {
  document.getElementById("myNav3").style.height = "0%";
}
</script>
</head>
<body>
<?php
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
//******************getstats inv*******************
include ('includes/getstats.php');
//********************add stats plus inv stats************
$life=$blife+$life;
$mana=$bmana+$mana;
$maxlife=$maxlife+$blife;
$maxmana=$maxmana+$bmana;
//******************tutorial*********************
include ('includes/tutorial.php');
?>
<table>
<tr>
<td width=800px>
<div class="container">
<div class="row">
<div class="col-sm-3" style="padding: 0px; margin: 0px; background-color: black;">
<button class="collapsible1" style="padding: 5px; margin: 0px;color: rgb(210,180,150); text-align: center; background-color: black;" onclick="openContentcollapse1()">Quick Stats</button>
<div id="contentcollapse1" class="contentcollapse1" style="padding: 0px; margin: 0px;">
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
<div class="col-sm-6">
<button class="collapsible2" style="padding: 5px; margin: 0px;color: rgb(210,180,150); text-align: center; background-color: black;" onclick="openContentcollapse2()">Map</button>
<div id="contentcollapse2" class="contentcollapse2" style="padding: 0px; margin: 0px;">
<div class="map">
<table><tr><td width=300px>
<?php include ('includes/map.php'); ?>
</td></tr></table>
</div>
</div>
</div>
<div class="col-sm-3">
<button class="collapsible3" style="padding: 5px; margin: 0px;color: rgb(210,180,150); text-align: center; background-color: black;" onclick="checkContentcollapse3()">Tile Actions</button>
<div id="contentcollapse3" class="contentcollapse3" style="padding: 0px; margin: 0px;">
<div style="height: 300px; overflow: auto">
<table><tr><td  style="height: 300px; width: auto; top: 0">
<h4>Tile Actions</h4>
<?php 
include ('includes/gtilenpc.php');
include ('includes/gtileobjects.php');
include ('includes/gtileportals.php');
?>
</td></tr></table>
</div>
</div>
</div>
</div>
<div class="row">
<div class="col-sm-12">
<button class="collapsible4" style="padding: 5px; margin: 0px;color: rgb(210,180,150); text-align: center; background-color: black;" onclick="checkContentcollapse4()">Main Menu</button>
<div id="contentcollapse4" class="contentcollapse4" style="padding: 0px; margin: 0px;">
<table><tr><td style="width: 16%">
<a href="statistics.php?
<?php
echo time();
?>
">
<img src="images/stats.png" border="0" /><br />Statistics</a>
</td><td style="width: 16%">
<a href="inventory/inventory.php?
<?php
echo time();
?>
"><img src="images/inventory.png" border="0" /><br />Inventory</a>
</td><td style="width: 16%">
<a href="spells/spellbook.php?
<?php
echo time();
?>
"><img src="images/spellbook.png" border="0" /><br />Spellbook</a>
</td><td style="width: 16%">
<a href="skills/skills.php?
<?php
echo time();
?>
"><img src="images/equipment.png" border="0" /><br />Skills</a>
</td><td style="width: 16%">
<a href="cook/cookbook.php?
<?php
echo time();
?>
"><img src="images/cook.png" border="0" /><br />Cooking</a>
</td><td style="width: 16%">
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
</td></tr>
</table>
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