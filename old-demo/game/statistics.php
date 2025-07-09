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
<div class="container">
<div class="row">
<div class="col-sm-12">
<a class="small" style="width: auto;" href="maingraphics.php">Back</a>
</div>
<div class="col-sm-2 col-md-3">
<table class="page"><tr><td class="page" colspan="2"><img src="images/<?php echo $portrait; ?>.png" border="0" />
<br />
<?php echo $charname; ?>
</td></tr><tr><td class="left">
Condition
</td><td class="left">
<?php echo $cond; ?>
</td></tr><tr>
<td class="left">
Title
</td>
<td class="left">
<?php echo $title; ?>
</td></tr>
<tr><td class="left">
Class
</td><td class="left">
<?php echo $mclass; ?>
</td></tr>
<tr><td class="left">Race</td><td class="left">
<?php echo $race; ?>
</td></tr>
<tr><td class="left">
Exp. 
</td>
<td class="left">
<?php echo $experience; ?>
</td>
</tr>
<tr><td class="left">
Level 
</td>
<td class="left">
<?php echo $level; ?>
</td>
</tr>
<tr><td class="left">
Life
</td>
<td class="left">
<?php echo $life; ?> / <?php echo $maxlife; ?>
</td></tr>
<tr><td class="left">
Mana
</td>
<td class="left">
<?php echo $mana; ?> / <?php echo $maxmana; ?>
</td></tr></table>
</div>
<div class="col-sm-2 col-md-3">
<table class="page"><tr><td class="center" colspan="2">
<h2>Main Stats</h2></td></tr>
<tr><td class="left">
Armor
</td><td class="left">
<?php echo $defense; ?>
</td>
</tr>
<tr><td class="left">
Damage
</td><td class="left">
<?php echo $damage; ?>
</td></tr>
<tr><td class="left">Critical</td><td class="left">
<?php echo $critical; ?>
</td></tr>
<tr><td class="left">Speed</td><td class="left">
<?php echo $speed; ?>
</td></tr>
<tr><td class="left">Accuracy</td><td class="left">
<?php echo $accuracy; ?>
</td></tr>
<tr><td class="left">Strength</td><td class="left">
<?php echo $strength; ?>
</td></tr>
<tr><td class="left">Agility</td><td class="left">
<?php echo $agility; ?>
</td></tr>
<tr><td class="left">Wisdom</td><td class="left">
<?php echo $wisdom; ?>
</td></tr>
<tr><td class="left">Luck</td><td class="left">
<?php echo $luck; ?>
</td></tr>
<tr><td class="left">Wins</td><td class="left">
<?php echo $wins; ?>
</td></tr>
<tr><td class="left">
Deaths
</td><td class="left">
<?php
echo $deaths;
?>
</td></tr></table>
</div>
<div class="col-sm-2 col-md-3">
<table>
<tr><td colspan="2" class="center"><h2>Secondary Skills</h2></td></tr>
<tr><td class="left">
Magic Find
</td><td class="left">
<?php
echo $magicfind;
?>
</td></tr>
<tr><td class="left">
Lockpicking
</td><td class="left">
<?php
echo $lockpicking;
?>
</td></tr>
<tr><td class="left">
Cooking
</td><td class="left">
<?php
echo $cooking;
?>
</td></tr>
<tr><td class="left">
Alchemy
</td><td class="left">
<?php
echo $alchemy;
?>
</td></tr>
<tr><td class="left">
Enchanting
</td><td class="left">
<?php
echo $enchanting;
?>
</td></tr>
</table>
</div>
<div class="col-sm-2 col-md-3">
<table>
<tr><td class="page" colspan="2"><h2>Resistances</h2></td></tr>
<tr><td class="left">Fire</td><td class="left">
<?php
echo $fireresist;
?>
</td></tr>
<tr><td class="left">Water</td><td class="left">
<?php
echo $iceresist;
?>
</td></tr>
<tr><td class="left">Air</td><td class="left">
<?php
echo $airresist;
?>
</td></tr>
<tr><td class="left">Earth</td><td class="left">
<?php
echo $earthresist;
?>
</td></tr>
<tr><td class="left">Dark Magic</td><td class="left">
<?php
echo $darkresist;
?>
</td></tr>
<tr><td class="left">Poison</td><td class="left">
<?php
echo $poisonresist;
?>
</td></tr>
<tr><td class="left">Immobilize</td><td class="left">
<?php
echo $immobilizeresist;
?>
</td></tr>
<tr><td class="left">Mind</td><td class="left">
<?php
echo $mindresist;
?>
</td></tr>
<tr><td class="left">Critical Hit</td><td class="left">
<?php
echo $criticalresist;
?>
</td></tr>
<tr><td class="left">Bleeding</td><td class="left">
<?php
echo $bleedresist;
?>
</td></tr>
</table>
</div>
</div>
</div>
</body>
</html>