<?php
//include config
require( $_SERVER['DOCUMENT_ROOT'] . '/game/includes/config2.php');
//if not logged in redirect to login page
if(!$user->is_logged_in()){ header('Location: ../login.php'); die('This site works best with redirections turned on, but you may continue with them turned off. <a href="../login.php">Continue</a>');}
$username = $_SESSION['username'];
$charname = $_SESSION['charname'];

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
?>
<?php
$type = 0;
if(isset($_POST['type'])) {
$type=strip_tags($_POST["type"]);

if ($type=="critical") {
$query=sprintf("update skills set sbcritical=sbcritical+1 where username='%s';", mysql_real_escape_string($username));
mysql_query($query);
	
$query=sprintf("update stats set skillpoints=skillpoints-1 where username='%s';", mysql_real_escape_string($username));
mysql_query($query);
}
if ($type=="blocking") {
$query=sprintf("update skills set sbblocking=sbblocking+1 where username='%s';", mysql_real_escape_string($username));
mysql_query($query);
	
$query=sprintf("update stats set skillpoints=skillpoints-1 where username='%s';", mysql_real_escape_string($username));
mysql_query($query);
}
if ($type=="backstabbing") {
$query=sprintf("update skills set sbbackstab=sbbackstab+1 where username='%s';", mysql_real_escape_string($username));
mysql_query($query);
	
$query=sprintf("update stats set skillpoints=skillpoints-1 where username='%s';", mysql_real_escape_string($username));
mysql_query($query);
}
if ($type=="bleed") {
$query=sprintf("update skills set sbbleed=sbbleed+1 where username='%s';", mysql_real_escape_string($username));
mysql_query($query);
	
$query=sprintf("update stats set skillpoints=skillpoints-1 where username='%s';", mysql_real_escape_string($username));
mysql_query($query);
}
}
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
<table class="page" width="100%">
<tr><td class="page" width="35%">
<div class="border1">
<table class="page">
<tr><td class="page" colspan="2">
<img src="../images/equipment.png" />
<h2>Skills Menu</h2>
</td></tr><tr><td class="left" colspan="2">
Skill Points: <?php echo $skillpoints; ?></td></tr>
<tr><td class="left">
<form action="blade.php?<?php echo time(); ?>" method="post">
<input class="small" type="submit" value="Blade" /></form>
</td><td class="left">
<form action="staff.php?<?php echo time(); ?>" method="post"><input class="small" type="submit" value="Staff/Wand" /></form>
</td></tr><tr><td class="left">
<form action="missile.php?<?php echo time(); ?>" method="post"><input class="small" type="submit" value="Missile" /></form>
</td><td class="left">
<form action="blunt.php?<?php echo time(); ?>" method="post"><input class="small" type="submit" value="Blunt" /></form>
</td></tr><tr><td class="left">
<form action="pole.php?<?php echo time(); ?>" method="post"><input class="small" type="submit" value="Pole-Arm" /></form>
</td><td class="left"><form action="exotic.php?<?php echo time(); ?>" method="post"><input class="small" type="submit" value="Exotic" /></form>
</td></tr><tr><td class="left">
<form action="fire.php?<?php echo time(); ?>" method="post"><input class="small" type="submit" value="Fire" /></form>
</td><td class="left">
<form action="water.php?<?php echo time(); ?>" method="post"><input class="small" type="submit" value="Water" /></form>
</td></tr><tr><td class="left">
<form action="air.php?<?php echo time(); ?>" method="post"><input class="small" type="submit" value="Air" /></form>
</td><td class="left"><form action="earth.php?<?php echo time(); ?>" method="post"><input class="small" type="submit" value="Earth" /></form>
</td></tr><tr><td class="left">
<form action="dark.php?<?php echo time(); ?>" method="post"><input class="small" type="submit" value="Dark" /></form>
</td><td class="left">
<form action="light.php?<?php echo time(); ?>" method="post"><input class="small" type="submit" value="Light" /></form>
</td></tr><tr><td class="center" colspan="2"><form action="../maingraphics.php?<?php echo time(); ?>" method="post"><input class="small" type="submit" value="Back to Map" /></form>
</td></tr>
</table>
</div>
</td><td class="page">
<table class="page">
<tr><td class="page">

<div class="border1">
<table class="page">
<tr><td class="border">
<table class="page">
<tr><td class="page" colspan="2">
<h2>Critical Hit</h2>
</td></tr><tr><td class="left" colspan="2">
This skill provides the blades master knowledge for an increased chance for a critical hit and increased critical hit damage.
</td></tr><tr><td class="left">
Skill Points Spent: <?php echo $scritical; ?>
</td><td class="page">
<form action="addblade.php?<?php echo time(); ?>" method="post"><input class="invisible" type="radio" name="type" checked="checked" value="critical" /><input class="small" type="submit" value="Spend Point" /></form>
</td></tr>
</table>
</td></tr><tr><td class="border">
<table class="page">
<tr><td class="page" colspan="2">
<h2>Blocking Blades</h2>
</td></tr><tr><td class="left" colspan="2">
Training in this skill increases the chance that you will block the opponent's attack when equipped with a blade. The effect is doubled when using dual blades.
</td></tr><tr><td class="left">
Skill Points Spent: <?php echo $sblocking; ?>
</td><td class="page">
<form action="addblade.php?<?php echo time();  ?>" method="post"><input class="invisible" type="radio" name="type" checked="checked" value="blocking" /><input class="small" type="submit" value="Spend Point" /></form>
</td></tr>
</table>
</td></tr><tr><td class="border">
<table class="page"><tr><td class="page" colspan="2">
<h2>Backstabbing</h2>
</td></tr><tr><td class="left" colspan="2">
This skills trains you to do a backstabbing attack which is a critical hit from which the victim is not able to react, allowing you to attack again. Chances to backstab are better when the victim is running away.
</td></tr><tr><td class="left">
Skill Points Spent: <?php echo $sbackstab; ?>
</td><td class="page">
<form action="addblade.php?<?php echo time(); ?>" method="post"><input class="invisible" type="radio" name="type" checked="checked" value="backstabbing" /><input class="small" type="submit" value="Spend Point" /></form>
</td></tr></table>
</td></tr><tr><td class="border">
<table class="page"><tr><td class="page" colspan="2">
<h2>Bleeding</h2>
</td></tr><tr><td class="left" colspan="2">
Training in anatamy allows the skilled blade master to strike areas of the body that will leave the victim wounded in such a way that they continue to bleed even after the attack.
</td></tr><tr><td class="left">
Skill Points Spent: <?php echo $sbleed; ?>
</td><td class="page">
<form action="addblade.php?<?php echo time(); ?>" method="post"><input class="invisible" type="radio" name="type" checked="checked" value="bleed" /><input class="small" type="submit" value="Spend Point" /></form>
</td></tr></table>
</td></tr>
</table>
</div>
</td></tr>
</table>
</tr></td>
</table>
</body>
</html>