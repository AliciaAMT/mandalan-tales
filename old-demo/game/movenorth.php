<?php
//include config
require( $_SERVER['DOCUMENT_ROOT'] . '/game/includes/config2.php');
//if not logged in redirect to login page
if(!$user->is_logged_in()){ header('Location: login.php'); die('This site works best with redirections turned on, but you may continue with them turned off. <a href="login.php">Continue</a>'); }
$username = $_SESSION['username'];
$charname= $_SESSION['charname'];
?>
<?php
//*****************set variables************
//   fireout
$stmt = $db->prepare('UPDATE flags SET firelit="n" WHERE charname= :charname') ;
					$stmt->execute(array(':charname' => $charname));
?>
<?php 
//***************move north**********************************
$stmt = $db->prepare('UPDATE charstats SET yaxis = yaxis+1 WHERE charname= :charname') ;
					$stmt->execute(array(':charname' => $charname)); 

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

<?php
//********************UPDATE MAP LOCATION*********************
$loc = 'Location: maingraphics.php?'.time();
header($loc);
die('This site works best with redirections turned on, but you may continue with them turned off. <a href="maingraphics.php">Continue</a>');
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
    var contentcollapse1 = localStorage.getItem("contentcollapse1");
	var contentcollapse2 = localStorage.getItem("contentcollapse2");
	var contentcollapse3 = localStorage.getItem("contentcollapse3");
	var contentcollapse4 = localStorage.getItem("contentcollapse4");
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
</script>
</head>
<body>

</body></html>