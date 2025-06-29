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
function addskill() {
	$stmt = $db->prepare('UPDATE skills SET :type = :type + 1 WHERE charname= :charname') ;
					$stmt->execute(array(':type' => $type, ':charname' => $charname));
    $stmt = $db->prepare('UPDATE charstats SET skillpoints=skillpoints-1 WHERE charname= :charname') ;
					$stmt->execute(array(':charname' => $charname));
}
$type = " ";
if(isset($_POST['type'])) {
$type=strip_tags($_POST["type"]);
if ($type!=" ") {
addskill($type);
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
	var contentcollapse8 = localStorage.getItem("contentcollapse9");
	var contentcollapse8 = localStorage.getItem("contentcollapse10");
	var contentcollapse8 = localStorage.getItem("contentcollapse11");
	var contentcollapse8 = localStorage.getItem("contentcollapse12");
	
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
    if (contentcollapse9==="true") {
        openContentcollapse9();
    } else {
        closeContentcollapse9();
    }
	if (contentcollapse10==="true") {
        openContentcollapse10();
    } else {
        closeContentcollapse10();
    }
	if (contentcollapse11==="true") {
        openContentcollapse11();
    } else {
        closeContentcollapse11();
    }
	if (contentcollapse12==="true") {
        openContentcollapse12();
    } else {
        closeContentcollapse12();
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
function checkContentcollapse9() {
    var contentcollapse9 = localStorage.getItem("contentcollapse9");
        if (contentcollapse9==="true") {
        closeContentcollapse9();
    } else {
        openContentcollapse9();
    }
    }  	
function checkContentcollapse10() {
    var contentcollapse10 = localStorage.getItem("contentcollapse10");
        if (contentcollapse10==="true") {
        closeContentcollapse10();
    } else {
        openContentcollapse10();
    }
    }  	
function checkContentcollapse11() {
    var contentcollapse11 = localStorage.getItem("contentcollapse11");
        if (contentcollapse11==="true") {
        closeContentcollapse11();
    } else {
        openContentcollapse11();
    }
    }  	
function checkContentcollapse12() {
    var contentcollapse12 = localStorage.getItem("contentcollapse12");
        if (contentcollapse12==="true") {
        closeContentcollapse12();
    } else {
        openContentcollapse12();
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
function openContentcollapse9() {
	document.getElementById("contentcollapse9").style.display = "block";
    localStorage.setItem("contentcollapse9", "true");
}
function openContentcollapse10() {
	document.getElementById("contentcollapse10").style.display = "block";
    localStorage.setItem("contentcollapse10", "true");
}
function openContentcollapse11() {
	document.getElementById("contentcollapse11").style.display = "block";
    localStorage.setItem("contentcollapse11", "true");
}
function openContentcollapse12() {
	document.getElementById("contentcollapse12").style.display = "block";
    localStorage.setItem("contentcollapse12", "true");
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
function closeContentcollapse9() {
    document.getElementById("contentcollapse9").style.display = "none";
    localStorage.setItem("contentcollapse9", "false");
}
function closeContentcollapse10() {
    document.getElementById("contentcollapse10").style.display = "none";
    localStorage.setItem("contentcollapse10", "false");
}
function closeContentcollapse11() {
    document.getElementById("contentcollapse11").style.display = "none";
    localStorage.setItem("contentcollapse11", "false");
}
function closeContentcollapse12() {
    document.getElementById("contentcollapse12").style.display = "none";
    localStorage.setItem("contentcollapse12", "false");
}

</script>
</head>
<body style="padding: 0px 0px 0px 0px; margin: 0px 0px 0px 0px; overflow-y: hidden;">
<div class="container-fluid" style="margin: 0px 0px 0px 0px;padding: 0px 0px 0px 0px; overflow: hidden;">
<div class="row">
<div class="col-sm-12" style="margin: 0px 0px 0px 0px; overflow: hidden;">
<a class="small" style="float: left; width: 100vw; margin: 0px 0px 0px 0px;border-radius: 0rem;" href="../maingraphics.php">Back</a>
<img border="0" style="position: inline-block; margin: 0px 0px 0px 0px;padding: 0px 0px 0px 0px;max-width: 2800px; max-height: 2800px; width: 100vw; float: left;" src="../images/border2.png" />
<table class="page">
<tr><td class="page" colspan="2">
<img src="../images/equipment.png" />
<h2>Skills Menu</h2>
</td></tr><tr><td class="left" colspan="2">
Skill Points: <?php echo $skillpoints; ?></td></tr></table>
</div>
</div>
<div class="row">
<div class="col-sm-6" style="text-align: center; margin: 0px 0px 0px 0px; height: 100vh; overflow: overlay;">
<!--container for collapsible menu equipped itemw-->
<div class="container" style="text-align: center; margin: 0px 0px 0px 0px; padding: 0px 0px 0px 0px; width: 96%;">
<div class="row" style="text-align: center;">
<div class="col-sm-12" style="text-align: center; padding: 0px 0px 0px 0px; margin: 0px 0px 0px 0px;">
<!--collapse title and button-->
<button class="collapsible1" style="border: 1px solid #105050;padding: 5px 5px 5px 5px; margin: 0px 0px 0px 0px; color: #105050; text-align: center; background-color: transparent; background-image: linear-gradient(cornsilk, #c9a682);" onclick="checkContentcollapse5()">Blade</button>
<div id="contentcollapse5" class="contentcollapse5" style="text-align: center; padding: 5px;border: 1px solid #105050; margin: 0px 0px 0px 0px; background-color: transparent; background-image: linear-gradient(cornsilk, #c9a682);">
    <div class="container-fluid" style=" border: 1px solid #c9a682; border-radius: 3rem; background-color: black; margin: 0px; text-align: center">
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
<form action="skills.php?<?php echo time(); ?>" method="post"><input class="invisible" type="radio" name="type" checked="checked" value="scritical" /><input class="small" type="submit" value="Spend Point" /></form>
</td></tr>
</table>
</td></tr><tr><td class="border">
<table class="page">
<tr><td class="page" colspan="2">
<h2>Blocking Blades</h2>
</td></tr><tr><td class="left" colspan="2">
Training in this skill increases the chance that you will block the opponent's attack when equipped with a blade. The effect is doubled when using dual blades.
</td></tr><tr><td class="left">
Skill Points Spent: <?php echo $sblock; ?>
</td><td class="page">
<form action="skills.php?<?php echo time();  ?>" method="post"><input class="invisible" type="radio" name="type" checked="checked" value="sblock" /><input class="small" type="submit" value="Spend Point" /></form>
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
<form action="skills.php?<?php echo time(); ?>" method="post"><input class="invisible" type="radio" name="type" checked="checked" value="sbackstab" /><input class="small" type="submit" value="Spend Point" /></form>
</td></tr></table>
</td></tr><tr><td class="border">
<table class="page"><tr><td class="page" colspan="2">
<h2>Bleeding</h2>
</td></tr><tr><td class="left" colspan="2">
Training in anatamy allows the skilled blade master to strike areas of the body that will leave the victim wounded in such a way that they continue to bleed even after the attack.
</td></tr><tr><td class="left">
Skill Points Spent: <?php echo $sbleed; ?>
</td><td class="page">
<form action="skills.php?<?php echo time(); ?>" method="post"><input class="invisible" type="radio" name="type" checked="checked" value="sbleed" /><input class="small" type="submit" value="Spend Point" /></form>
</td></tr></table>
</td></tr>
</table>
</div>
    </div>
</div>
<!--trade pocket-->
<button class="collapsible1" style="border: 1px solid #105050;padding: 5px; margin: 0px;color: #105050; text-align: center; background-color: transparent; background-image: linear-gradient(cornsilk, #c9a682);" onclick="checkContentcollapse6()">Staff</button>
<div id="contentcollapse6" class="contentcollapse6" style="border: 1px solid #105050;padding: 5px; margin: 0px; background-color: transparent; background-image: linear-gradient(cornsilk, #c9a682);">
<div class="container-fluid" style=" border: 1px solid #c9a682; border-radius: 3rem; background-color: black; margin: 0px; text-align: center">
<div class="border1">
<table class="page">
<tr><td class="page" colspan="2">
<h2>Critical Hit</h2>
</td></tr><tr>
<td class="left" colspan="2">
This skill provides the staff master knowledge for an increased chance for a critical hit and increased critical hit damage.
</td></tr><tr><td class="left">
Skill Points Spent: <?php echo $sscritical; ?>
</td><td class="page">
<form action="skills.php?<?php echo time(); ?>" method="post"><input class="invisible" type="radio" name="type" checked="checked" value="sscritical" /><input class="small" type="submit" value="Spend Point" /></form>
</td></tr>
</table>
</td></tr><tr><td class="border">
<table class="page">
<tr><td class="page" colspan="2">
<h2>Blocking Staff</h2>
</td></tr><tr><td class="left" colspan="2">
Training in this skill increases the chance that you will block the opponent's attack when equipped with a staff. The effect is doubled when using dual staves.
</td></tr><tr><td class="left">
Skill Points Spent: <?php echo $ssblocking; ?>
</td><td class="page">
<form action="skills.php?<?php echo time(); ?>" method="post"><input class="invisible" type="radio" name="type" checked="checked" value="ssblocking" /><input class="small" type="submit" value="Spend Point" /></form>
</td></tr></table>
</td></tr><tr><td class="border">
<table class="page">
<tr><td class="page" colspan="2">
<h2>Catapult</h2>
</td></tr><tr><td class="left" colspan="2">
This skills trains you to use your staff weapon as a lever to catapult your enemy into the air, causing him to use his next turn to recover.
</td></tr><tr><td class="left">
Skill Points Spent: <?php echo $sscatapult; ?>
</td><td class="page">
<form action="skills.php?<?php echo time(); ?>" method="post"><input class="invisible" type="radio" name="type" checked="checked" value="sscatapult" /><input class="small" type="submit" value="Spend Point" /></form>
</td></tr></table>
</td></tr><tr><td class="border">
<table class="page">
<tr><td class="page" colspan="2">
<h2>Elemental Staff</h2>
</td></tr><tr><td class="left" colspan="2">
Training in the elements allows a skilled staff master to simultaneosly create a random elemental attack along with the physical staff attack. Chances for an elemental attack increase as skill increases.
</td></tr><tr><td class="left">
Skill Points Spent: <?php echo $sselemental; ?>
</td><td class="page">
<form action="skills.php?<?php echo time(); ?>" method="post"><input class="invisible" type="radio" name="type" checked="checked" value="sselemental" /><input class="small" type="submit" value="Spend Point" /></form>
</td></tr>
</table>
</div>
</div>
</div>
<!--Food pocket-->
<button class="collapsible1" style="border: 1px solid #105050;padding: 5px 5px 5px 5px; margin: 0px 0px 0px 0px;color: #105050; text-align: center; background-color: transparent; background-image: linear-gradient(cornsilk, #c9a682);" onclick="checkContentcollapse7()">Missile</button>
<div id="contentcollapse7" class="contentcollapse7" style="border: 1px solid #105050;padding: 5px 5px 5px 5px; margin: 0px 0px 0px 0px; background-color: transparent; background-image: linear-gradient(cornsilk, #c9a682);text-align: center;">
<div class="container-fluid" style=" border: 1px solid #c9a682; border-radius: 3rem; background-color: black; margin: 0px; text-align: center">
<div class="border1">
<table class="page">
<tr><td class="page" colspan="2">
<h2>Critical Hit</h2>
</td></tr><tr>
<td class="left" colspan="2">
This skill provides the missile weapons master knowledge for an increased chance for a critical hit and increased critical hit damage.
</td></tr><tr><td class="left">
Skill Points Spent: <?php echo $smcritical; ?>
</td><td class="page">
<form action="skills.php?<?php echo time(); ?>" method="post"><input class="invisible" type="radio" name="type" checked="checked" value="smcritical" /><input class="small" type="submit" value="Spend Point" /></form>
</td></tr>
</table>
</td></tr><tr><td class="border">
<table class="page">
<tr><td class="page" colspan="2">
<h2>Eagle Eye</h2>
</td></tr><tr><td class="left" colspan="2">
With this skill you learn to sharpen your senses, especially your vision, to improve your accuracy.
</td></tr><tr><td class="left">
Skill Points Spent: <?php echo $smeagle; ?>
</td><td class="page">
<form action="skills.php?<?php echo time(); ?>" method="post"><input class="invisible" type="radio" name="type" checked="checked" value="smeagle" /><input class="small" type="submit" value="Spend Point" /></form>
</td></tr></table>
</td></tr><tr><td class="border">
<table class="page">
<tr><td class="page" colspan="2">
<h2>Poison Projectiles</h2>
</td></tr><tr><td class="left" colspan="2">
You learn how to coat the tips of your weapons with a powerful and deadly poison.
</td></tr><tr><td class="left">
Skill Points Spent: <?php echo $smpoison; ?>
</td><td class="page">
<form action="skills.php?<?php echo time(); ?>" method="post"><input class="invisible" type="radio" name="type" checked="checked" value="smpoison" /><input class="small" type="submit" value="Spend Point" /></form>
</td></tr></table>
</td></tr><tr><td class="border">
<table class="page">
<tr><td class="page" colspan="2">
<h2>Flaming Projectiles</h2>
</td></tr><tr><td class="left" colspan="2">
With this skill you add fire to your attack and burn your enemies for several rounds.
</td></tr><tr><td class="left">
Skill Points Spent: <?php echo $smfire; ?>
</td><td class="page">
<form action="skills.php?<?php echo time(); ?>" method="post"><input class="invisible" type="radio" name="type" checked="checked" value="smfire" /><input class="small" type="submit" value="Spend Point" /></form>
</td></tr>
</table>
</div></div>
</div>
<button class="collapsible1" style="border: 1px solid #105050;padding: 5px; margin: 0px;color: #105050; text-align: center; background-color: transparent; background-image: linear-gradient(cornsilk, #c9a682);" onclick="checkContentcollapse8()">Fire</button>
<div id="contentcollapse8" class="contentcollapse8" style="border: 1px solid #105050;padding: 5px; margin: 0px; background-color: transparent; background-image: linear-gradient(cornsilk, #c9a682);transition: display 2.2s ease-out;">
<div class="container-fluid" style=" border: 1px solid #c9a682; border-radius: 3rem; background-color: black; margin: 0px; text-align: center">
<div class="border1">
<table class="page">
<tr><td class="page" colspan="2">
<h2>Critical Hit</h2>
</td></tr><tr>
<td class="left" colspan="2">
This skill provides the Fire master knowledge for an increased chance for a critical hit and increased critical hit damage.</td></tr><tr><td class="left">
Skill Points Spent: <?php echo $sfcritical; ?>
</td><td class="page">
<form action="skills.php?<?php echo time(); ?>" method="post"><input class="invisible" type="radio" name="type" checked="checked" value="sfcritical" /><input class="small" type="submit" value="Spend Point" /></form>
</td></tr>
</table>
</td></tr><tr><td class="border">
<table class="page">
<tr><td class="page" colspan="2">
<h2>Fire Restistance</h2>
</td></tr><tr><td class="left" colspan="2">
As a Fire master learns to manipulate the flames, he also becomes resistant to thier burning heat.
</td></tr><tr><td class="left">
Skill Points Spent: <?php echo $sfresist; ?>
</td><td class="page">
<form action="skills.php?<?php echo time(); ?>" method="post"><input class="invisible" type="radio" name="type" checked="checked" value="sfresist" /><input class="small" type="submit" value="Spend Point" /></form>
</td></tr></table>
</td></tr><tr><td class="border">
<table class="page">
<tr><td class="page" colspan="2">
<h2>Smoke Screen</h2>
</td></tr><tr><td class="left" colspan="2">
With smoke surrounding your enemy, he will find it difficult to see you during attack.
</td></tr><tr><td class="left">
Skill Points Spent: <?php echo $sfsmoke; ?>
</td><td class="page">
<form action="skills.php?<?php echo time(); ?>" method="post"><input class="invisible" type="radio" name="type" checked="checked" value="sfsmoke" /><input class="small" type="submit" value="Spend Point" /></form>
</td></tr></table>
</td></tr><tr><td class="border">
<table class="page">
<tr><td class="page" colspan="2">
<h2>Inferno</h2>
</td></tr><tr><td class="left" colspan="2">
You learn to burn your enemy in such a way that the burning continues for several rounds.
</td></tr><tr><td class="left">
Skill Points Spent: <?php echo $sfinferno; ?>
</td><td class="page">
<form action="skills.php?<?php echo time(); ?>" method="post"><input class="invisible" type="radio" name="type" checked="checked" value="sfinferno" /><input class="small" type="submit" value="Spend Point" /></form>
</td></tr>
</table>
</div>
</div>
</div>
<button class="collapsible1" style="border: 1px solid #105050;padding: 5px; margin: 0px;color: #105050; text-align: center; background-color: transparent; background-image: linear-gradient(cornsilk, #c9a682);" onclick="checkContentcollapse9()">Water</button>
<div id="contentcollapse9" class="contentcollapse9" style="border: 1px solid #105050;padding: 5px; margin: 0px; background-color: transparent; background-image: linear-gradient(cornsilk, #c9a682);transition: display 2.2s ease-out;">
<div class="container-fluid" style=" border: 1px solid #c9a682; border-radius: 3rem; background-color: black; margin: 0px; text-align: center">
<div class="border1">
<table class="page">
<tr><td class="page" colspan="2">
<h2>Critical Hit</h2>
</td></tr><tr>
<td class="left" colspan="2">
This skill provides the Water master knowledge for an increased chance for a critical hit and increased critical hit damage.</td></tr><tr><td class="left">
Skill Points Spent: <?php echo $sicritical; ?>
</td><td class="page">
<form action="skills.php?<?php echo time(); ?>" method="post"><input class="invisible" type="radio" name="type" checked="checked" value="sicritical" /><input class="small" type="submit" value="Spend Point" /></form>
</td></tr>
</table>
</td></tr><tr><td class="border">
<table class="page">
<tr><td class="page" colspan="2">
<h2>Water Restistance</h2>
</td></tr><tr><td class="left" colspan="2">
As a Water master learns to manipulate the water, he also becomes resistant to it's destructive forces.
</td></tr><tr><td class="left">
Skill Points Spent: <?php echo $siresist; ?>
</td><td class="page">
<form action="skills.php?<?php echo time(); ?>" method="post"><input class="invisible" type="radio" name="type" checked="checked" value="siresist" /><input class="small" type="submit" value="Spend Point" /></form>
</td></tr></table>
</td></tr><tr><td class="border">
<table class="page">
<tr><td class="page" colspan="2">
<h2>Coldblood</h2>
</td></tr><tr><td class="left" colspan="2">
With this skill you learn how to cool the water in your blood to slow the flow and prevent severe bleeding.
</td></tr><tr><td class="left">
Skill Points Spent: <?php echo $sicoldblood; ?>
</td><td class="page">
<form action="skills.php?<?php echo time(); ?>" method="post"><input class="invisible" type="radio" name="type" checked="checked" value="sicoldblood" /><input class="small" type="submit" value="Spend Point" /></form>
</td></tr></table>
</td></tr><tr><td class="border">
<table class="page">
<tr><td class="page" colspan="2">
<h2>Dry Ice</h2>
</td></tr><tr><td class="left" colspan="2">
You freeze your enemy in such a way that the next blow causes critical damage.
</td></tr><tr><td class="left">
Skill Points Spent: <?php echo $sidryice; ?>
</td><td class="page">
<form action="skills.php?<?php echo time(); ?>" method="post"><input class="invisible" type="radio" name="type" checked="checked" value="sidryice" /><input class="small" type="submit" value="Spend Point" /></form>
</td></tr>
</table>
</div>
</div>
</div>
<button class="collapsible1" style="border: 1px solid #105050;padding: 5px; margin: 0px;color: #105050; text-align: center; background-color: transparent; background-image: linear-gradient(cornsilk, #c9a682);" onclick="checkContentcollapse10()">Air</button>
<div id="contentcollapse10" class="contentcollapse10" style="border: 1px solid #105050;padding: 5px; margin: 0px; background-color: transparent; background-image: linear-gradient(cornsilk, #c9a682);transition: display 2.2s ease-out;">
<div class="container-fluid" style=" border: 1px solid #c9a682; border-radius: 3rem; background-color: black; margin: 0px; text-align: center">
<div class="border1">
<table class="page">
<tr><td class="page" colspan="2">
<h2>Critical Hit</h2>
</td></tr><tr>
<td class="left" colspan="2">
This skill provides the Air master knowledge for an increased chance for a critical hit and increased critical hit damage.</td></tr><tr><td class="left">
Skill Points Spent: <?php echo $slcritical; ?>
</td><td class="page">
<form action="skills.php?<?php echo time(); ?>" method="post"><input class="invisible" type="radio" name="type" checked="checked" value="slcritical" /><input class="small" type="submit" value="Spend Point" /></form>
</td></tr>
</table>
</td></tr><tr><td class="border">
<table class="page">
<tr><td class="page" colspan="2">
<h2>Air Restistance</h2>
</td></tr><tr><td class="left" colspan="2">
As an Air master learns to manipulate the air, he also becomes resistant to it's destructive forces.
</td></tr><tr><td class="left">
Skill Points Spent: <?php echo $slresist; ?>
</td><td class="page">
<form action="skills.php?<?php echo time(); ?>" method="post"><input class="invisible" type="radio" name="type" checked="checked" value="slresist" /><input class="small" type="submit" value="Spend Point" /></form>
</td></tr></table>
</td></tr><tr><td class="border">
<table class="page">
<tr><td class="page" colspan="2">
<h2>Stun</h2>
</td></tr><tr><td class="left" colspan="2">
This skill increases your chances for your attack to stun your opponent with a zap of lightning.
</td></tr><tr><td class="left">
Skill Points Spent: <?php echo $slstun; ?>
</td><td class="page">
<form action="skills.php?<?php echo time(); ?>" method="post"><input class="invisible" type="radio" name="type" checked="checked" value="slstun" /><input class="small" type="submit" value="Spend Point" /></form>
</td></tr></table>
</td></tr><tr><td class="border">
<table class="page">
<tr><td class="page" colspan="2">
<h2>Reviving Jolt</h2>
</td></tr><tr><td class="left" colspan="2">
Upon death you have a chance to jolt your heart back into rythm restoring minimal life.
</td></tr><tr><td class="left">
Skill Points Spent: <?php echo $slrevive; ?>
</td><td class="page">
<form action="skills.php?<?php echo time(); ?>" method="post"><input class="invisible" type="radio" name="type" checked="checked" value="slrevive" /><input class="small" type="submit" value="Spend Point" /></form>
</td></tr>
</table>
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
<button class="collapsible1" style="border: 1px solid #105050; padding: 5px 5px 5px 5px; margin: 0px 0px 0px 0px; color: #105050; text-align: center; background-color: transparent; background-image: linear-gradient(cornsilk, #c9a682);" onclick="checkContentcollapse1()">Blunt</button>
<div id="contentcollapse1" class="contentcollapse1" style="border: 1px solid #105050; text-align: center; padding: 0px 0px 0px 0px; margin: 0px 0px 0px 0px; background-color: transparent; background-image: linear-gradient(cornsilk, #c9a682);">
<div class="container-fluid" style="text-align: center; border: 1px solid #c9a682; border-radius: 3rem; background-color: black; padding: 0px 0px 0px 0px; margin: 0px 0px 0px 0px; font-size: 12px;">
<div class="border1">
<table class="page">
<tr><td class="page" colspan="2">
<h2>Critical Hit</h2>
</td></tr><tr>
<td class="left" colspan="2">
This skill provides the blunt weapons master knowledge for an increased chance for a critical hit and increased critical hit damage.</td></tr><tr><td class="left">
Skill Points Spent: <?php echo $sccritical; ?>
</td><td class="page">
<form action="skills.php?<?php echo time(); ?>" method="post"><input class="invisible" type="radio" name="type" checked="checked" value="sccritical" /><input class="small" type="submit" value="Spend Point" /></form>
</td></tr>
</table>
</td></tr><tr><td class="border">
<table class="page">
<tr><td class="page" colspan="2">
<h2>Blocking Weapons</h2>
</td></tr><tr><td class="left" colspan="2">
Training in this skill increases the chance that you will block the opponent's attack when equipped with a blunt weapon. The effect is doubled when using dual blunt weapons.
</td></tr><tr><td class="left">
Skill Points Spent: <?php echo $scblocking; ?>
</td><td class="page">
<form action="skills.php?<?php echo time(); ?>" method="post"><input class="invisible" type="radio" name="type" checked="checked" value="scblocking" /><input class="small" type="submit" value="Spend Point" /></form>
</td></tr></table>
</td></tr><tr><td class="border">
<table class="page">
<tr><td class="page" colspan="2">
<h2>Stunning Blow</h2>
</td></tr><tr><td class="left" colspan="2">
You learn how to stun your opponent with your blunt weapons. While stunned, your opponent will be unable to defend or attack.
</td></tr><tr><td class="left">
Skill Points Spent: <?php echo $scstun; ?>
</td><td class="page">
<form action="skills.php?<?php echo time(); ?>" method="post"><input class="invisible" type="radio" name="type" checked="checked" value="scstun" /><input class="small" type="submit" value="Spend Point" /></form>
</td></tr></table>
</td></tr><tr><td class="border">
<table class="page">
<tr><td class="page" colspan="2">
<h2>Crushing Blow</h2>
</td></tr><tr><td class="left" colspan="2">
This attack both stuns and deals a critical blow to your opponent by crushing his skull.
</td></tr><tr><td class="left">
Skill Points Spent: <?php echo $sccrush; ?>
</td><td class="page">
<form action="skills.php?<?php echo time(); ?>" method="post"><input class="invisible" type="radio" name="type" checked="checked" value="sccrush" /><input class="small" type="submit" value="Spend Point" /></form>
</td></tr>
</table>
</div>
</div>
</div>
<button class="collapsible1" style="border: 1px solid #105050; padding: 5px 5px 5px 5px; margin: 0px 0px 0px 0px;color: #105050; text-align: center; background-color: transparent; background-image: linear-gradient(cornsilk, #c9a682);" onclick="checkContentcollapse2()">Pole</button>
<div id="contentcollapse2" class="contentcollapse2" style="border: 1px solid #105050;padding: 5px 5px 5px 5px; margin: 0px 0px 0px 0px; background-color: transparent; background-image: linear-gradient(cornsilk, #c9a682);text-align: center;">
<div class="container-fluid" style="text-align: center; border: 1px solid #c9a682; border-radius: 3rem; background-color: black; padding: 0px 0px 0px 0px; margin: 0px 0px 0px 0px; font-size: 12px;">
<div class="border1">
<table class="page">
<tr><td class="page" colspan="2">
<h2>Critical Hit</h2>
</td></tr><tr>
<td class="left" colspan="2">
This skill provides the pole-arms master knowledge for an increased chance for a critical hit and increased critical hit damage.
</td></tr><tr><td class="left">
Skill Points Spent: <?php echo $spcritical; ?>
</td><td class="page">
<form action="skills.php?<?php echo time(); ?>" method="post"><input class="invisible" type="radio" name="type" checked="checked" value="spcritical" /><input class="small" type="submit" value="Spend Point" /></form>
</td></tr>
</table>
</td></tr><tr><td class="border">
<table class="page">
<tr><td class="page" colspan="2">
<h2>Long-Arm</h2>
</td></tr><tr><td class="left" colspan="2">
You learn to keep your opponent at a distance by using your weapon as an extension of your arm.
</td></tr><tr><td class="left">
Skill Points Spent: <?php echo $splongarm; ?>
</td><td class="page">
<form action="skills.php?<?php echo time(); ?>" method="post"><input class="invisible" type="radio" name="type" checked="checked" value="splongarm" /><input class="small" type="submit" value="Spend Point" /></form>
</td></tr></table>
</td></tr><tr><td class="border">
<table class="page">
<tr><td class="page" colspan="2">
<h2>Catapult</h2>
</td></tr><tr><td class="left" colspan="2">
You learn how to use your Pole-Arm weapon as a lever to catapult your enemy into the air causing him to recover one turn.
</td></tr><tr><td class="left">
Skill Points Spent: <?php echo $spcatapult; ?>
</td><td class="page">
<form action="skills.php?<?php echo time(); ?>" method="post"><input class="invisible" type="radio" name="type" checked="checked" value="spcatapult" /><input class="small" type="submit" value="Spend Point" /></form>
</td></tr></table>
</td></tr><tr><td class="border">
<table class="page">
<tr><td class="page" colspan="2">
<h2>Long Sweep Combo</h2>
</td></tr><tr><td class="left" colspan="2">
This attack sweeps your opponent off his feet so you can follow with a critical blow to the head while the enemy is down.
</td></tr><tr><td class="left">
Skill Points Spent: <?php echo $spsweep; ?>
</td><td class="page">
<form action="skills.php?<?php echo time(); ?>" method="post"><input class="invisible" type="radio" name="type" checked="checked" value="spsweep" /><input class="small" type="submit" value="Spend Point" /></form>
</td></tr>
</table>
</div>
</div>
</div>
<button class="collapsible1" style="border: 1px solid #105050;padding: 5px; margin: 0px;color: #105050; text-align: center; background-color: transparent; background-image: linear-gradient(cornsilk, #c9a682);" onclick="checkContentcollapse3()">Exotic</button>
<div id="contentcollapse3" class="contentcollapse3" style="border: 1px solid #105050;padding: 5px; margin: 0px; background-color: transparent; background-image: linear-gradient(cornsilk, #c9a682);transition: display 2.2s ease-out;">
<div class="container-fluid" style=" border: 1px solid #c9a682; border-radius: 3rem; background-color: black; margin: 0px;">
<div class="border1">
<table class="page">
<tr><td class="page" colspan="2">
<h2>Critical Hit</h2>
</td></tr><tr>
<td class="left" colspan="2">
This skill provides the exotic weapons master knowledge for an increased chance for a critical hit and increased critical hit damage.
</td></tr><tr><td class="left">
Skill Points Spent: <?php echo $sxcritical; ?>
</td><td class="page">
<form action="skills.php?<?php echo time(); ?>" method="post"><input class="invisible" type="radio" name="type" checked="checked" value="sxcritical" /><input class="small" type="submit" value="Spend Point" /></form>
</td></tr>
</table>
</td></tr><tr><td class="border">
<table class="page">
<tr><td class="page" colspan="2">
<h2>Blocking Weapons</h2>
</td></tr><tr><td class="left" colspan="2">
You learn to use your exotic weapons to block your opponents attacks. The effect is doubled when dual wielding exotic weapons.
</td></tr><tr><td class="left">
Skill Points Spent: <?php echo $sxblocking; ?>
</td><td class="page">
<form action="skills.php?<?php echo time(); ?>" method="post"><input class="invisible" type="radio" name="type" checked="checked" value="sxblocking" /><input class="small" type="submit" value="Spend Point" /></form>
</td></tr></table>
</td></tr><tr><td class="border">
<table class="page">
<tr><td class="page" colspan="2">
<h2>Intimidate</h2>
</td></tr><tr><td class="left" colspan="2">
You learn to flourish your weapons in order to intimidate the enemy with your skill.
</td></tr><tr><td class="left">
Skill Points Spent: <?php echo $sxintimidate; ?>
</td><td class="page">
<form action="skills.php?<?php echo time(); ?>" method="post"><input class="invisible" type="radio" name="type" checked="checked" value="sxintimidate" /><input class="small" type="submit" value="Spend Point" /></form>
</td></tr></table>
</td></tr><tr><td class="border">
<table class="page">
<tr><td class="page" colspan="2">
<h2>Bleeding</h2>
</td></tr><tr><td class="left" colspan="2">
You learn how to attack your enemy in a way that causes him to bleed for several turns.
</td></tr><tr><td class="left">
Skill Points Spent: <?php echo $sxbleed; ?>
</td><td class="page">
<form action="skills.php?<?php echo time(); ?>" method="post"><input class="invisible" type="radio" name="type" checked="checked" value="sxbleed" /><input class="small" type="submit" value="Spend Point" /></form>
</td></tr>
</table>
</div>
</div>
</div>
<button class="collapsible1" style="border: 1px solid #105050;padding: 5px; margin: 0px;color: #105050; text-align: center; background-color: transparent; background-image: linear-gradient(cornsilk, #c9a682);" onclick="checkContentcollapse4()">Earth</button>
<div id="contentcollapse4" class="contentcollapse4" style="border: 1px solid #105050;padding: 5px; margin: 0px; background-color: transparent; background-image: linear-gradient(cornsilk, #c9a682);">
<div class="container-fluid" style=" border: 1px solid #c9a682; border-radius: 3rem; background-color: black; margin: 0px;">
<div class="border1">
<table class="page">
<tr><td class="page" colspan="2">
<h2>Critical Hit</h2>
</td></tr><tr>
<td class="left" colspan="2">
This skill provides the Earth master knowledge for an increased chance for a critical hit and increased critical hit damage.
</td></tr><tr><td class="left">
Skill Points Spent: <?php echo $secritical; ?>
</td><td class="page">
<form action="skills.php?<?php echo time(); ?>" method="post"><input class="invisible" type="radio" name="type" checked="checked" value="secritical" /><input class="small" type="submit" value="Spend Point" /></form>
</td></tr>
</table>
</td></tr><tr><td class="border">
<table class="page">
<tr><td class="page" colspan="2">
<h2>Earth Restistance</h2>
</td></tr><tr><td class="left" colspan="2">
As an Earth master learns to manipulate the earth, he also becomes resistant to it's destructive forces.
</td></tr><tr><td class="left">
Skill Points Spent: <?php echo $seresist; ?>
</td><td class="page">
<form action="skills.php?<?php echo time(); ?>" method="post"><input class="invisible" type="radio" name="type" checked="checked" value="seresist" /><input class="small" type="submit" value="Spend Point" /></form>
</td></tr></table>
</td></tr><tr><td class="border">
<table class="page">
<tr><td class="page" colspan="2">
<h2>Tremors</h2>
</td></tr><tr><td class="left" colspan="2">
You learn how to make the ground shake, knocking your enemy off his feet. Strength and duration of tremors increase with skill.
</td></tr><tr><td class="left">
Skill Points Spent: <?php echo $setremor; ?>
</td><td class="page">
<form action="skills.php?<?php echo time(); ?>" method="post"><input class="invisible" type="radio" name="type" checked="checked" value="setremor" /><input class="small" type="submit" value="Spend Point" /></form>
</td></tr></table>
</td></tr><tr><td class="border">
<table class="page">
<tr><td class="page" colspan="2">
<h2>Swarming Plague</h2>
</td></tr><tr><td class="left" colspan="2">
You unleash an swarm of poisonous insects that both distract and damage your enemies.
</td></tr><tr><td class="left">
Skill Points Spent: <?php echo $seswarm; ?>
</td><td class="page">
<form action="skills.php?<?php echo time(); ?>" method="post"><input class="invisible" type="radio" name="type" checked="checked" value="seswarm" /><input class="small" type="submit" value="Spend Point" /></form>
</td></tr>
</table>
</div>
</div>
</div>
<button class="collapsible1" style="border: 1px solid #105050;padding: 5px; margin: 0px;color: #105050; text-align: center; background-color: transparent; background-image: linear-gradient(cornsilk, #c9a682);" onclick="checkContentcollapse11()">Dark</button>
<div id="contentcollapse11" class="contentcollapse11" style="border: 1px solid #105050;padding: 5px; margin: 0px; background-color: transparent; background-image: linear-gradient(cornsilk, #c9a682);">
<div class="container-fluid" style=" border: 1px solid #c9a682; border-radius: 3rem; background-color: black; margin: 0px;">
<div class="border1">
<table class="page">
<tr><td class="page" colspan="2">
<h2>Critical Hit</h2>
</td></tr><tr>
<td class="left" colspan="2">
This skill provides the Dark master knowledge for an increased chance for a critical hit and increased critical hit damage.
</td></tr><tr><td class="left">
Skill Points Spent: <?php echo $sdcritical; ?>
</td><td class="page">
<form action="skills.php?<?php echo time(); ?>" method="post"><input class="invisible" type="radio" name="type" checked="checked" value="sdcritical" /><input class="small" type="submit" value="Spend Point" /></form>
</td></tr>
</table>
</td></tr><tr><td class="border">
<table class="page">
<tr><td class="page" colspan="2">
<h2>Dark Restistance</h2>
</td></tr><tr><td class="left" colspan="2">
As a Dark master learns to manipulate the dark, he also becomes resistant to it's destructive forces.
</td></tr><tr><td class="left">
Skill Points Spent: <?php echo $sdresist; ?>
</td><td class="page">
<form action="skills.php?<?php echo time(); ?>" method="post"><input class="invisible" type="radio" name="type" checked="checked" value="sdresist" /><input class="small" type="submit" value="Spend Point" /></form>
</td></tr></table>
</td></tr><tr><td class="border">
<table class="page">
<tr><td class="page" colspan="2">
<h2>Vampiric Drain</h2>
</td></tr><tr><td class="left" colspan="2">
You learn how to drain your opponent's life and add it to your own. You must be a Dark Magic Master to benefit from this skill.
</td></tr><tr><td class="left">
Skill Points Spent: <?php echo $sdvampire; ?>
</td><td class="page">
<form action="skills.php?<?php echo time(); ?>" method="post"><input class="invisible" type="radio" name="type" checked="checked" value="sdvampire" /><input class="small" type="submit" value="Spend Point" /></form>
</td></tr></table>
</td></tr><tr><td class="border">
<table class="page">
<tr><td class="page" colspan="2">
<h2>Eye of Dispair</h2>
</td></tr><tr><td class="left" colspan="2">
You practice a gaze that fills your opponent with so much dispair they give up and allow themselves to be killed. You must be a Dark Magic Master to benefit from this skill.
</td></tr><tr><td class="left">
Skill Points Spent: <?php echo $sdeye; ?>
</td><td class="page">
<form action="skills.php?<?php echo time(); ?>" method="post"><input class="invisible" type="radio" name="type" checked="checked" value="sdeye" /><input class="small" type="submit" value="Spend Point" /></form>
</td></tr>
</table>
</div>
</div>
</div>
<button class="collapsible1" style="border: 1px solid #105050;padding: 5px; margin: 0px;color: #105050; text-align: center; background-color: transparent; background-image: linear-gradient(cornsilk, #c9a682);" onclick="checkContentcollapse12()">Light</button>
<div id="contentcollapse12" class="contentcollapse12" style="border: 1px solid #105050;padding: 5px; margin: 0px; background-color: transparent; background-image: linear-gradient(cornsilk, #c9a682);">
<div class="container-fluid" style=" border: 1px solid #c9a682; border-radius: 3rem; background-color: black; margin: 0px;">
<div class="border1">
<table class="page">
<tr><td class="page" colspan="2">
<h2>Critical Hit</h2>
</td></tr><tr>
<td class="left" colspan="2">
This skill provides the Light master knowledge for an increased chance for a critical hit and increased critical hit damage.
</td></tr><tr><td class="left">
Skill Points Spent: <?php echo $stcritical; ?>
</td><td class="page">
<form action="skills.php?<?php echo time(); ?>" method="post"><input class="invisible" type="radio" name="type" checked="checked" value="stcritical" /><input class="small" type="submit" value="Spend Point" /></form>
</td></tr>
</table>
</td></tr><tr><td class="border">
<table class="page">
<tr><td class="page" colspan="2">
<h2>Ultimate Restistance</h2>
</td></tr><tr><td class="left" colspan="2">
As a Light master learns to summon the light, he uses it to become resistant to all destructive forces. You must be a Light Magic Master to benefit from this skill.
</td></tr><tr><td class="left">
Skill Points Spent: <?php echo $stresist; ?>
</td><td class="page">
<form action="skills.php?<?php echo time(); ?>" method="post"><input class="invisible" type="radio" name="type" checked="checked" value="stresist" /><input class="small" type="submit" value="Spend Point" /></form>
</td></tr></table>
</td></tr><tr><td class="border">
<table class="page">
<tr><td class="page" colspan="2">
<h2>Regeneration</h2>
</td></tr><tr><td class="left" colspan="2">
You learn how to use the light to regenerate your life and mana. You must be a Light Magic Master to benefit from this skill.
</td></tr><tr><td class="left">
Skill Points Spent: <?php echo $stregenerate; ?>
</td><td class="page">
<form action="skills.php?<?php echo time(); ?>" method="post"><input class="invisible" type="radio" name="type" checked="checked" value="stregenerate" /><input class="small" type="submit" value="Spend Point" /></form>
</td></tr></table>
</td></tr><tr><td class="border">
<table class="page">
<tr><td class="page" colspan="2">
<h2>Ultimate Revive</h2>
</td></tr><tr><td class="left" colspan="2">
Occassionally you are blessed by a burst of Light that revives your life and mana. You must be a Light Magic Master to benefit from this skill.
</td></tr><tr><td class="left">
Skill Points Spent: <?php echo $strevive; ?>
</td><td class="page">
<form action="skills.php?<?php echo time(); ?>" method="post"><input class="invisible" type="radio" name="type" checked="checked" value="strevive" /><input class="small" type="submit" value="Spend Point" /></form>
</td></tr>
</table>
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