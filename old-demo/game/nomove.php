<?php
//include config
require_once( $_SERVER['DOCUMENT_ROOT'] . '/game/includes/config2.php');
//if not logged in redirect to login page
if(!$user->is_logged_in()){ header('Location: ../login.php'); die('This site works best with redirections turned on, but you may continue with them turned off. <a href="../login.php">Continue</a>');}
$username = $_SESSION['username'];
$charname= $_SESSION['charname'];
?>
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
</head>
<body>
<?php
//******************getstats inv*******************
include ('../includes/getstats.php');
include ('../includes/getweapontype.php');
include ('../includes/getskills.php');
include ('../includes/getdamage.php');
include ('../includes/getdefense.php');
//***************getflags*****************************
include ('../includes/getflags.php');
//******************get charstats************************
include ('../includes/getcharstats.php');
include ('../includes/getestats.php');
include ('../includes/getcounter.php');

//****enemy fled or user tryig to back button or cheat**********
if ($fight==0) {
	//***********redirect to main 
	header('Location: ../maingraphics.php'); die('This site works best with redirections turned on, but you may continue with them turned off. <a href="../maingraphics.php">Continue</a>');
}

  ?>
<div class="container-fluid" style="margin: 0px 0px 0px 0px;">
<div class="row">
<div class="col-sm-12" style="max-height: 30vh;">
<div class="fightlog">
<?php
  echo $event;
?>
</div>
</div>
</div>
<div class="row">
<div class="col-sm-5">
<table class="page"><tr>
<td class="page" colspan="2">
<img src="../images/<?php echo $portrait; ?>.png" />
<br />
<?php echo $charname; ?>
<br />
<br />
</td></tr><tr><td class="page">
<img src="../images/life.png" border="0" />
</td><td class="page">
<?php echo $life; echo "/"; echo $maxlife; ?>
</td></tr><tr><td class="page">
<img src="../images/mana.png" border="0" />
</td><td class="page">
<?php echo $mana; echo "/"; echo $maxmana; ?>
</td></tr><tr>
<td class="page" colspan="2">
Condition: <?php echo $cond; ?>
</td></tr>
</table>
</div>
<div class="col-sm-2">
<table class="page"><tr><td class="page">
<a class="small" href="attack.php?<?php echo time(); ?>">Attack</a>
</td></tr><tr><td class="page">
<a class="small" href="qspell.php?<?php echo time(); ?>">Quickspell</a>
</td></tr><tr><td class="page">
<a class="small" href="../spells/spellbook.php?<?php echo time(); ?>">Spellbook</a>
</td></tr><tr><td class="page">
<a class="small" href="heal.php?<?php echo time(); ?>">Heal</a>
</td></tr><tr><td class="page">
<a class="small" href="../inventory/useitem.php?<?php echo time(); ?>">Use Item</a>
</td></tr><tr><td class="page">
<a class="small" href="flee.php?<?php echo time(); ?>">Flee</a>
</td></tr></table>
</div>
<div class="col-sm-5">
<table class="page"><tr><td class="page" colspan="2">
<img src="../images/<?php echo $enemy; ?>.png" height="128px" />
<br />
<?php
echo $enemyname;
echo "Level ";
echo $enemylevel;
?>
<br />
<br />
</td></tr><tr><td class="page">
<img src="../images/life.png" border="0" />
</td><td class="page">
<?php
echo $enemylife;
echo "/";
echo $enemymaxlife;
?>
</td></tr><tr><td class="page">
<img src="../images/mana.png" border="0" />
</td><td class="page">
<?php
echo $enemylife;
echo "/";
echo $enemymaxlife;
?>
</td></tr><tr><td class="page" colspan="2">
Condition: <?php echo $enemycondition; ?></td></tr></table>
</div>
</div>
</div>
</body>
</html>