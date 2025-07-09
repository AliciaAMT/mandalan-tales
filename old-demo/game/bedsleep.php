<?php
//include config
require( $_SERVER['DOCUMENT_ROOT'] . '/game/includes/config2.php');
//if not logged in redirect to login page
if(!$user->is_logged_in()){ header('Location: login.php'); die('This site works best with redirections turned on, but you may continue with them turned off. <a href="monsters/nomove.php">Continue</a>');}
$username = $_SESSION['username'];
$charname= $_SESSION['charname'];
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
	
//write plague consequence, only speep in bed cures, cannot camp or drink water to heal
$stmt = $db->prepare("UPDATE charstats SET life = :maxlife WHERE charname=:charname;");
				$stmt->execute(array(':maxlife' => $maxlife, ':charname' => $charname));
$stmt = $db->prepare("UPDATE charstats SET mana = :maxmana WHERE charname=:charname;");
				$stmt->execute(array(':maxmana' => $maxmana, ':charname' => $charname));
$stmt = $db->prepare("UPDATE charstats SET savemap = map WHERE charname=:charname;");
				$stmt->execute(array(':charname' => $charname));
$stmt = $db->prepare("UPDATE charstats SET savemapdimensions = mapdimensions WHERE charname=:charname;");
				$stmt->execute(array(':charname' => $charname));
$stmt = $db->prepare("UPDATE charstats SET savexaxis = xaxis WHERE charname=:charname;");
				$stmt->execute(array(':charname' => $charname));
$stmt = $db->prepare("UPDATE charstats SET saveyaxis = yaxis WHERE charname=:charname;");
				$stmt->execute(array(':charname' => $charname));
 
if ($condition="Plagued")
{
$stmt = $db->prepare("UPDATE charstats SET cond = 'Good' WHERE charname=:charname;");
				$stmt->execute(array(':charname' => $charname));
}
//********************END SLEEP********************
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
</head>
<body>
<table class="page"><tr><td class="center">
<img src="images/bed.png" /></td></tr>
<tr><td class="left">
You rest and recover full life and mana. If you die, you will wake up here alive, but you will be penalized in experience. If you sleep somewhere else, that spot will be where you wake up upon death. Sleeping can also heal conditions such as Plague and Disease. It will not heal Poison.
</td></tr>
<tr><td class="center">
<table class="page"><tr><td class="page">
<a class="small" href="maingraphics.php?<?php echo time(); ?>">Back to Map</a>
</td></tr></table>
</td></tr></table>
</body></html>