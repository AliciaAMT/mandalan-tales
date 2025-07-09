<?php
//include config
require_once('includes/config2.php');
//if not logged in redirect to login page
if(!$user->is_logged_in()){ header('Location: login.php'); }
$username = $_SESSION['username'];
$charname= $_SESSION['charname'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>The Way</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="Not a religion...a RELATIONSHIP!">
  <meta name="keywords" content="bible, christian, meditation, prayer, study, daily, buddhism, jewish, yeshua, jesus, god, hashem, comparative, religion, philosophy, hitbodedut, mussar ">
  <meta name="author" content="Anonymous">


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

function loadCollapse() {
    var contentcollapsestate = JSON.parse(localStorage.getItem("contentcollapsestate"));
    
    if (contentcollapsestate) {
       document.getElementById("contentcollapse1").style.maxHeight = document.getElementById("contentcollapse1").scrollHeight + "px";
	   localStorage.setItem("contentcollapsestate", "true");
    } else {
        document.getElementById("contentcollapse1").style.maxHeight = null;
	  localStorage.setItem("contentcollapsestate", "false");
    }
    
})

</script>

  </head>

<body onload="loadCollapse()">

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
<div class="container">
<div class="row">
<div class="col-sm-3" style="padding: 0px; margin: 0px; background-color: black;">
<button class="collapsible" style="padding: 5px; margin: 0px;color: rgb(210,180,150); text-align: center; background-color: black;" >Quick Stats</button>
<div id="contentcollapse1" class="contentcollapse" style="padding: 0px; margin: 0px;">
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
<div class="col-sm-6" style="padding: 0px; background-color: black; margin: 0px;">
<button class="collapsible" style="padding: 5px; background-color: black; margin: 0px;color: rgb(210,180,150); text-align: center;">Map</button>
<div class="contentcollapse" style="padding: 0px; margin: 0px;">
<div class="map">
<table><tr><td width=300px>
<?php include ('includes/map.php'); ?>
</td></tr></table>
</div>
</div>
</div>
<div class="col-sm-3" style="padding: 0px; background-color: black; margin: 0px;">
<button class="collapsible" style="padding: 5px; margin: 0px;color: rgb(210,180,150); background-color: black; text-align: center;">Tile Actions</button>
<div class="contentcollapse" style="padding: 0px; margin: 0px;">
<div style="height: 300px; overflow: auto">
<table><tr><td  style="top: 0">
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
<div class="col-sm-12" style="padding: 0px; background-color: black; margin: 0px;">
<button class="collapsible" style="padding: 5px; background-color: black; margin: 0px;color: rgb(210,180,150); text-align: center;">Main Menu</button>
<div class="contentcollapse" style="padding: 0px; margin: 0px;">
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
<script>
var coll = document.getElementsByClassName("collapsible");
var i;

for (i = 0; i < coll.length; i++) {
  coll[i].addEventListener("click", function() {
    this.classList.toggle("active");
    var contentcollapse = this.nextElementSibling;
    if (contentcollapse.style.maxHeight){
      contentcollapse.style.maxHeight = null;
	   localStorage.setItem("contentcollapsestate", "false");
    } else {
      contentcollapse.style.maxHeight = contentcollapse.scrollHeight + "px";
	   localStorage.setItem("contentcollapsestate", "true");
    } 
  });
}
</script>
<table class="page"><tr><td class="page">
<a href="welcome.php">Home</a> * 
<a href="premium.php">Premium Membership</a> * 
<a href="http://mandalantales.proboards.com/index.cgi">Forum</a> * 
<a href="help.php">Help</a> *
<a href="logout.php">Logout</a>
</td></tr>
</table>
</body></html>