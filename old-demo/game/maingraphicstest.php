<?php
//include config
require( $_SERVER['DOCUMENT_ROOT'] . '/game/includes/config2.php');
//if not logged in redirect to login page
if(!$user->is_logged_in()){ header('Location: login.php'); }
$username = $_SESSION['username'];
$charname= $_SESSION['charname'];
require( $_SERVER['DOCUMENT_ROOT'] . '/game/includes/head.php');
?>
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
$maxlife=$maxlife+$bmaxlife;
$maxmana=$maxmana+$bmaxmana;
//******************tutorial*********************
include ('includes/tutorial.php');
?>
<table><tr><td style="width: 800px">
<div class="container">
<div class="row">
<div class="col-sm-3">

<table><tr><td>

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
</td></tr></table>


</div>
<div class="col-sm-6">
<div class="map">
<table><tr><td width=300px>
<?php include ('includes/map.php'); ?>
</td></tr></table>
</div>
</div>
<div class="col-sm-3">
<div style="height: 300px; overflow: auto">

<table><tr><td  style="height: 300px; width: auto">
<h2>Tile Actions</h2>
<?php 
include ('includes/gtilenpc.php');
include ('includes/gtileobjects.php');
include ('includes/gtileportals.php');
?>
</td></tr></table>

</div>
</div>
</div>
<div class="row">
<div class="col-sm-12">
<div class="container">
<div class="row">
<div class="col-sm-2">
<a href="statistics.php?
<?php
echo time();
?>
">
<img src="images/stats.png" border="0" /><br />Statistics</a>
</div>

<div class="col-sm-2">
<a href="inventory/inventory.php?
<?php
echo time();
?>
"><img src="images/inventory.png" border="0" /><br />Inventory</a>
</div>

<div class="col-sm-2">
<a href="spells/spellbook.php?
<?php
echo time();
?>
"><img src="images/spellbook.png" border="0" /><br />Spellbook</a>
</div>

<div class="col-sm-2">
<a href="skills/skills.php?
<?php
echo time();
?>
"><img src="images/equipment.png" border="0" /><br />Skills</a>
</div>

<div class="col-sm-2">
<a href="cook/cookbook.php?
<?php
echo time();
?>
"><img src="images/cook.png" border="0" /><br />Cooking</a>
</div>

<div class="col-sm-2">
<a href="quests/journal.php?
<?php
echo time();
?>
"><img src="images/questjournal.png" border="0" /><br />Quests</a>
</div>
</div>
</div>
</div>
</div>
</div>

</td></tr></table>
<table class="page"><tr><td class="page">
<a href="welcome.php">Home</a> * 
<a href="premium.php">Premium Membership</a> * 
<a href="http://mandalantales.proboards.com/index.cgi">Forum</a> * 
<a href="help.php">Help</a> *
<a href="logout.php">Logout</a>
</td></tr>
</table>
</body></html>