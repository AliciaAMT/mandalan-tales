<?php
//include config
require_once( $_SERVER['DOCUMENT_ROOT'] . '/game/includes/config2.php');
//if not logged in redirect to login page
if(!$user->is_logged_in()){ header('Location: ../login.php'); die('This site works best with redirections turned on, but you may continue with them turned off. <a href="../login.php">Continue</a>');}
$username = $_SESSION['username'];
$charname= $_SESSION['charname'];
?>
<?php
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
<table class="page"><tr><td class="page"><div class="border1">
<?php
$stmt = $db->prepare("SELECT * FROM cookbook WHERE charname=:charname");
		$stmt->execute(array(':charname' => $charname));
while($row = $stmt->fetch())
{
$friedmeat=$row['friedmeat'];
$meatsandwich=$row['friedmeatsandwich'];
$applesauce=$row['applesauce'];
$cesarsalad=$row['cesarsalad'];
$lifepotion=$row['lifepotion'];
$friedeggs=$row['friedeggs'];
$diseasepotion=$row['diseasepot'];
$holdpotion=$row['holdpot'];
}
$type=strip_tags($_POST["type"]);
echo "<table class=\"page\">";
if (!$type)
{
$stmt = $db->prepare("SELECT * FROM inventory WHERE charname=:charname and keep>0 and itemtype = 'Food' ORDER BY itemtype desc, weapontype, itemlevel desc, itemrarity desc");
		$stmt->execute(array(':charname' => $charname));
while($row = $stmt->fetch())
{
echo "<tr><td class=\"border\">
<img src=\"../images/".$row['itemimage'].".png\" /><br />".$row['itemname']."<br />Level ".$row['itemlevel']."<br />".$row['itemrarity'];
if ($row['keep']>1)
{
echo "<br />Amount: ".$row['keep'];
}
echo "</td><td class=\"border\">
<table class=\"page\"><tr><td class=\"left\">Description:</td><td class=\"left\">".$row['itemdescription'];
echo "</td></tr><tr><td class=\"left\">Item Type:</td><td class=\"left\">".$row['itemtype']."</td></tr>";
if ($row['enhancement1']!="None")
{
echo "<tr><td class=\"left\">Effect:</td><td class=\"left\">".$row['enhancement1']."</td></tr>";
}
if ($row['enhancement2']!="None")
{
echo "<tr><td class=\"left\">Effect:</td><td class=\"left\">".$row['enhancement2']."</td></tr>";
}
if ($row['itemvalue']>0)
{

echo "<tr><td class=\"left\">Value:</td><td class=\"left\">".$row['itemvalue']." Gold</td></tr>";

}
if ($row['maxwater']>0)
{

echo "<tr><td class=\"left\">Life: +10</td><td class=\"left\">Mana: +10</td></tr>";

echo "<tr><td class=\"left\">Water Units:</td><td class=\"left\">".$row['waterunits']."/".$row['maxwater']."</td></tr>";

}
if ($row['waterunits']>0)
{

echo "<tr><td class=\"center\" colspan=\"2\">
<table class=\"page\"><tr><td class=\"page\"><form name=\"drink\" action=\"drink.php?".time();

  echo "\" method=\"get\"><input class=\"invisible\" type=\"radio\" name=\"drink\" checked=\"checked\" value=\"".$row['itemnumber'];

  echo "\"><br /><input type=\"submit\" value=\"Drink Water\" class=\"small\"></form></td></tr></table>
</td></tr>";

}
if ($row['consumable']==1)
{
echo "<tr><td class=\"page\" colspan=\"2\"><table class=\"page\"><tr><td class=\"page\"><form name=\"cook\" action=\"consume.php?".time()."\" method=\"get\"><input class=\"invisible\" type=\"radio\" name=\"food\" checked=\"checked\" value=\"".$row['itemname']."\"><br /><input type=\"submit\" value=\"Consume\" class=\"small\"></form></td></tr></table></td></tr>";
}
echo "</table>";
echo "</td></tr>";
}
echo "</table>";
}
if ($type=="Ingredients")
{
	$stmt = $db->prepare("SELECT * FROM inventory WHERE charname=:charname and keep>0 and itemtype = 'Food' ORDER BY itemtype desc, weapontype, itemlevel desc, itemrarity desc");
		$stmt->execute(array(':charname' => $charname));
while($row = $stmt->fetch())
{
echo "<tr><td class=\"border\">
<img src=\"../images/".$row['itemimage'].".png\" /><br />".$row['itemname']."<br />Level ".$row['itemlevel']."<br />".$row['itemrarity'];
if ($row['keep']>1)
{
echo "<br />Amount: ".$row['keep'];
}
echo "</td><td class=\"border\">
<table class=\"page\"><tr><td class=\"left\">Description:</td><td class=\"left\">".$row['itemdescription'];
echo "</td></tr><tr><td class=\"left\">Item Type:</td><td class=\"left\">".$row['itemtype']."</td></tr>";
if ($row['enhancement1']!="None")
{
echo "<tr><td class=\"left\">Effect:</td><td class=\"left\">".$row['enhancement1']."</td></tr>";
}
if ($row['enhancement2']!="None")
{
echo "<tr><td class=\"left\">Effect:</td><td class=\"left\">".$row['enhancement2']."</td></tr>";
}
if ($row['itemvalue']>0)
{
echo "<tr><td class=\"left\">Value:</td><td class=\"left\">".$row['itemvalue']." Gold</td></tr>";
}
if ($row['maxwater']>0)
{
echo "<tr><td class=\"left\">Life: +10</td><td class=\"left\">Mana: +10</td></tr>";
echo "<tr><td class=\"left\">Water Units:</td><td class=\"left\">".$row['waterunits']."/".$row['maxwater']."</td></tr>";
}
if ($row['waterunits']>0)
{
echo "<tr><td class=\"center\" colspan=\"2\">
<table class=\"page\"><tr><td class=\"page\"><form name=\"drink\" action=\"drink.php?".time();

  echo "\" method=\"get\"><input class=\"invisible\" type=\"radio\" name=\"drink\" checked=\"checked\" value=\"".$row['itemnumber'];

  echo "\"><br /><input type=\"submit\" value=\"Drink Water\" class=\"small\"></form></td></tr></table>
</td></tr>";

}

if ($row['consumable']==1)
{
echo "<tr><td class=\"page\" colspan=\"2\"><table class=\"page\"><tr><td class=\"page\"><form name=\"cook\" action=\"consume.php?".time()."\" method=\"get\"><input class=\"invisible\" type=\"radio\" name=\"food\" checked=\"checked\" value=\"".$row['itemname']."\"><br /><input type=\"submit\" value=\"Consume\" class=\"small\"></form></td></tr></table></td></tr>";
}
echo "</table>";
echo "</td></tr>";
}
echo "</table>";
}
if ($type=="Recipes")
{
if ($friedmeat>0)
{
echo "<tr><td class=\"border\">
<table class=\"page\"><tr><td class=\"center\" colspan=\"2\"><h2>Fried Meat</h2><br /><img src=\"../images/friedmeat.png\" /></td></tr><tr><td class=\"left\" colspan=\"2\">This classic dish is one of the simplest recipes you know.</td></tr><tr><td class=\"center\">

<table class=\"page\"><tr><td class=\"page\">
<h3>Ingredients</h3></td></tr><tr><td class=\"left\">Fire<br />Skillet<br />Raw Meat<br /></td></tr></table></td><td class=\"center\">
<table class=\"page\"><tr><td class=\"page\">
<h3>Effects</h3></td></tr><tr><td class=\"center\">
<table class=\"page\"><tr><td class=\"left\">Life:</td><td class=\"left\"> +15</td></tr>
<tr><td class=\"left\">Mana:</td><td class=\"left\"> +5</td></tr></table></td></tr></td></tr></table>

<tr><td class=\"page\" colspan=\"2\"><table class=\"page\"><tr><td class=\"page\"><form name=\"cook\" action=\"cook.php?".time()."\" method=\"get\"><input class=\"invisible\" type=\"radio\" name=\"food\" checked=\"checked\" value=\"friedmeat\"><br /><input type=\"submit\" value=\"Cook\" class=\"small\"></form></td></tr></table></td></tr></table>
</td></tr>";
}
if ($lifepotion>0)
{
echo "<tr><td class=\"border\">
<table class=\"page\"><tr><td class=\"center\" colspan=\"2\"><h2>Life Potion</h2><br /><img src=\"../images/lifepotion.png\" /></td></tr><tr><td class=\"left\" colspan=\"2\">This is a simple life potion.</td></tr><tr><td class=\"center\">

<table class=\"page\"><tr><td class=\"page\">
<h3>Ingredients</h3></td></tr><tr><td class=\"left\">Potion Bottle<br />Water<br />Aloe<br /></td></tr></table></td><td class=\"center\">
<table class=\"page\"><tr><td class=\"page\">
<h3>Effects</h3></td></tr><tr><td class=\"center\">
<table class=\"page\"><tr><td class=\"left\">Life:</td><td class=\"left\"> +15</td></tr></table></td></tr></td></tr></table>

<tr><td class=\"page\" colspan=\"2\"><table class=\"page\"><tr><td class=\"page\"><form name=\"cook\" action=\"cook.php?".time()."\" method=\"get\"><input class=\"invisible\" type=\"radio\" name=\"food\" checked=\"checked\" value=\"lifepotion\"><br /><input type=\"submit\" value=\"Brew\" class=\"small\"></form></td></tr></table></td></tr></table>
</td></tr>";
}
if ($meatsandwich>0)
{
echo "<tr><td class=\"border\">
<table class=\"page\"><tr><td class=\"center\" colspan=\"2\"><h2>Fried Meat Sandwich</h2><br /><img src=\"../images/meatsandwich.png\" /></td></tr><tr><td class=\"left\" colspan=\"2\">This classic dish is one of the simplest recipes you know, but it is more nutritous than meat or bread alone.</td></tr><tr><td class=\"center\">

<table class=\"page\"><tr><td class=\"page\">
<h3>Ingredients</h3></td></tr><tr><td class=\"left\">Fried Meat<br />Bread x2</td></tr></table></td><td class=\"center\">
<table class=\"page\"><tr><td class=\"page\">
<h3>Effects</h3></td></tr><tr><td class=\"center\">
<table class=\"page\"><tr><td class=\"left\">Life:</td><td class=\"left\"> +30</td></tr>
<tr><td class=\"left\">Mana:</td><td class=\"left\"> +20</td></tr></table></td></tr></td></tr></table>

<tr><td class=\"page\" colspan=\"2\"><table class=\"page\"><tr><td class=\"page\"><form name=\"cook\" action=\"cook.php?".time()."\" method=\"get\"><input class=\"invisible\" type=\"radio\" name=\"food\" checked=\"checked\" value=\"meatsandwich\"><br /><input type=\"submit\" value=\"Cook\" class=\"small\"></form></td></tr></table></td></tr></table>
</td></tr>";

}

if ($applesauce>0)
{
echo "<tr><td class=\"border\">
<table class=\"page\"><tr><td class=\"center\" colspan=\"2\"><h2>Applesauce</h2><br /><img src=\"../images/applesauce.png\" /></td></tr><tr><td class=\"left\" colspan=\"2\">This classic dish is one of the simplest recipes you know, but it is more nutritous than plain apples.</td></tr><tr><td class=\"center\">

<table class=\"page\"><tr><td class=\"page\">
<h3>Ingredients</h3></td></tr><tr><td class=\"left\">Apples x3<br />Cinnamon<br />Sugar</td></tr></table></td><td class=\"center\">
<table class=\"page\"><tr><td class=\"page\">
<h3>Effects</h3></td></tr><tr><td class=\"center\">
<table class=\"page\"><tr><td class=\"left\">Life:</td><td class=\"left\"> +15</td></tr>
<tr><td class=\"left\">Mana:</td><td class=\"left\"> +15</td></tr></table></td></tr></td></tr></table>

<tr><td class=\"page\" colspan=\"2\"><table class=\"page\"><tr><td class=\"page\"><form name=\"cook\" action=\"cook.php?".time()."\" method=\"get\"><input class=\"invisible\" type=\"radio\" name=\"food\" checked=\"checked\" value=\"applesauce\"><br /><input type=\"submit\" value=\"Cook\" class=\"small\"></form></td></tr></table></td></tr></table>
</td></tr>";

}

if ($cesarsalad>0)
{
echo "<tr><td class=\"border\">
<table class=\"page\"><tr><td class=\"center\" colspan=\"2\"><h2>Cesar Salad</h2><br /><img src=\"../images/salad.png\" /></td></tr><tr><td class=\"left\" colspan=\"2\">This classic dish is one of the simplest recipes you know.</td></tr><tr><td class=\"center\">

<table class=\"page\"><tr><td class=\"page\">
<h3>Ingredients</h3></td></tr><tr><td class=\"left\">Lettuce x3<br />Vegetables<br />Salt<br />Oil<br />Vinegar</td></tr></table></td><td class=\"center\">
<table class=\"page\"><tr><td class=\"page\">
<h3>Effects</h3></td></tr><tr><td class=\"center\">
<table class=\"page\"><tr><td class=\"left\">Life:</td><td class=\"left\"> +20</td></tr>
<tr><td class=\"left\">Mana:</td><td class=\"left\"> +20</td></tr></table></td></tr></td></tr></table>

<tr><td class=\"page\" colspan=\"2\"><table class=\"page\"><tr><td class=\"page\"><form name=\"cook\" action=\"cook.php?".time()."\" method=\"get\"><input class=\"invisible\" type=\"radio\" name=\"food\" checked=\"checked\" value=\"cesarsalad\"><br /><input type=\"submit\" value=\"Cook\" class=\"small\"></form></td></tr></table></td></tr></table>
</td></tr>";

}

if ($friedeggs>0)
{
echo "<tr><td class=\"border\">
<table class=\"page\"><tr><td class=\"center\" colspan=\"2\"><h2>Fried Eggs</h2><br /><img src=\"../images/friedeggs.png\" /></td></tr><tr><td class=\"left\" colspan=\"2\">This classic dish is one of the simplest recipes you know.</td></tr><tr><td class=\"center\">

<table class=\"page\"><tr><td class=\"page\">
<h3>Ingredients</h3></td></tr><tr><td class=\"left\">Fire<br />Skillet<br />Eggs x3<br />Salt<br /></td></tr></table></td><td class=\"center\">
<table class=\"page\"><tr><td class=\"page\">
<h3>Effects</h3></td></tr><tr><td class=\"center\">
<table class=\"page\"><tr><td class=\"left\">Life:</td><td class=\"left\"> +35</td></tr>
<tr><td class=\"left\">Mana:</td><td class=\"left\"> +35</td></tr></table></td></tr></td></tr></table>

<tr><td class=\"page\" colspan=\"2\"><table class=\"page\"><tr><td class=\"page\"><form name=\"cook\" action=\"cook.php?".time()."\" method=\"get\"><input class=\"invisible\" type=\"radio\" name=\"food\" checked=\"checked\" value=\"friedeggs\"><br /><input type=\"submit\" value=\"Cook\" class=\"small\"></form></td></tr></table></td></tr></table>
</td></tr>";
}
if ($diseasepotion>0)
{
echo "<tr><td class=\"border\">
<table class=\"page\"><tr><td class=\"center\" colspan=\"2\"><h2>Disease Potion</h2><br /><img src=\"../images/diseasepot.png\" /></td></tr><tr><td class=\"left\" colspan=\"2\">This is a simple disease potion.</td></tr><tr><td class=\"center\">

<table class=\"page\"><tr><td class=\"page\">
<h3>Ingredients</h3></td></tr><tr><td class=\"left\">Potion Bottle<br />Vinegar<br />Rat Tails x5<br /></td></tr></table></td><td class=\"center\">
<table class=\"page\"><tr><td class=\"page\">
<h3>Effects</h3></td></tr><tr><td class=\"center\">
<table class=\"page\"><tr><td class=\"left\">Life:</td><td class=\"left\"> -15</td></tr><tr><td class=\"left\">Accuracy:</td><td class=\"left\"> -15</td></tr></table></td></tr></td></tr></table>

<tr><td class=\"page\" colspan=\"2\"><table class=\"page\"><tr><td class=\"page\"><form name=\"cook\" action=\"cook.php?".time()."\" method=\"get\"><input class=\"invisible\" type=\"radio\" name=\"food\" checked=\"checked\" value=\"diseasepot\"><br /><input type=\"submit\" value=\"Brew\" class=\"small\"></form></td></tr></table></td></tr></table>
</td></tr>";
}
echo "</table>";
}
?>
<?php
echo "</div></td><td class=\"page\"><div class=\"border1\"><table class=\"page\"><tr><td class=\"page\">";
?>
<?php

echo "<table class=\"page\"><tr><td class=\"center\"><img src=\"../images/inventory.png\" /><h2>Cookbook</h2>";

echo "</td></tr>

<tr><td class=\"center\"><form action=\"cookbook.php?";



echo time();

echo "\" method=\"post\"><input class=\"invisible\" type=\"radio\" name=\"type\" checked=\"checked\" value=\"Ingredients\" /><input class=\"small\" type=\"submit\" value=\"Ingredients\" /></form></td></tr>


<tr><td class=\"center\"><form action=\"cookbook.php?";



echo time();

echo "\" method=\"post\"><input class=\"invisible\" type=\"radio\" name=\"type\" checked=\"checked\" value=\"Recipes\" /><input class=\"small\" type=\"submit\" value=\"Recipes\" /></form></td></tr>
<tr><td class=\"page\"><br /></td></tr><tr><td class=\"center\"><form action=\"../maingraphics.php?";



echo time();

echo "\" method=\"post\"><input class=\"small\" type=\"submit\" value=\"Back to Map\" /></form></td></tr></table>";

?>
<?php
echo "</div></td></tr></table></body></html>";
?>