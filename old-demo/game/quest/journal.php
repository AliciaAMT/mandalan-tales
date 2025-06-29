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
<?php

echo "<table class=\"page\" width=\"100%\"><tr><td class=\"page\"><div class=\"border1\">";

?>
<?php
$type=strip_tags($_POST["type"]);
if (!$type)
{
echo "<table class=\"page\" width=\"100%\">";
if ($quest4==1) {
echo "<tr><td class=\"border\">The Family Crest</td><td class=\"borderl\">You found the family crest. You should talk to your father about it.</td></tr>";
}
else {
  if ($quest1==0) {
  echo "<tr><td class=\"border\">The Apprentice</td><td class=\"borderl\">Your new father wants to talk to you.</td></tr>";
  }
  if ($quest1==2) {
  echo "<tr><td class=\"border\">The Apprentice</td><td class=\"borderl\">You have decided to travel north to be an apprentice to Solias the mystic. Perhaps he can explain how you came to be in this strange world.";
  echo "You are to show Solias's letter to gain entrance to the House of Elders where Solias resides. ";
  echo "Your father warned you to gather supplies at home before you venture out on the treacherous roads.</td></tr>";
  }
  if ($quest1==1) {
  echo "<tr><td class=\"border\">The Apprentice</td><td class=\"borderl\">Your new father wishes your to travel north and to visit Solias the mystic, but you refused. ";
  echo "Your father hopes that you will reconsider.</td></tr>";
  }
  if ($quest2==1) {
  echo "<tr><td class=\"border\">The Hidden Key</td><td class=\"borderl\">You found a small rusted key hidden under your bedroom rug. Now if you could only find your locked box. You have a vague memory that you locked something valuable in it, but you do not remember where you hid the box.</td></tr>";
  }
  if ($quest2==2) {
  echo "<tr><td class=\"border\">The Hidden Key</td><td class=\"borderl\">You found a small locked box under your bed in your bedroom, but you only have a vague memory of where you hid the key.</td></tr>";
  }
  if ($quest2==3) {
  echo "<tr><td class=\"border\">The Hidden Key</td><td class=\"borderl\">You found the key and the locked box. Now you can look in your inventory and unlock the box to get your prized possession.</td></tr>";
  }
  if ($shepfeed>0) {
  if ($shepfeed==1) {
  echo "<tr><td class=\"border\">Hungry Dog</td><td class=\"borderl\">You fed Old Shep, and he appears to be happy to see you now. Perhaps now he will let you look in his dog house.</td></tr>";
}
  if ($shepfeed==2) {
  echo "<tr><td class=\"border\">The Lost Key</td><td class=\"borderl\">You found an old key in Shep the dog's house. Maybe you should talk to your father about it.</td></tr>";
}
}
}
}
echo "</table>";
}
if ($type=="Main Quests")
{

echo "<table class=\"page\" width=\"100%\">";

$query = sprintf("select * from flags where username='%s';",mysql_real_escape_string($username));

$result=mysql_query($query);

while($row = mysql_fetch_array($result))

  {
    if ($row['quest4']==1)
{
echo "<tr><td class=\"border\">The Family Crest</td><td class=\"borderl\">You found the family crest. You should talk to your father about it.</td></tr>";
}
else
{

  if ($row['quest1']==0)

  {

  echo "<tr><td class=\"border\">The Apprentice</td><td class=\"borderl\">Your new father wants to talk to you.</td></tr>";

  }

   if ($row['quest1']==2)

  {

  echo "<tr><td class=\"border\">The Apprentice</td><td class=\"borderl\">You have decided to travel north to be an apprentice to Solias the mystic. Perhaps he can explain how you came to be in this strange world.";

  echo "You are to show Solias's letter to gain entrance to the House of Elders where Solias resides. ";

  echo "Your father warned you to gather supplies at home before you venture out on the treacherous roads.</td></tr>";

  }

   if ($row['quest1']==1)

  {

  echo "<tr><td class=\"border\">The Apprentice</td><td class=\"borderl\">Your new father wishes your to travel north and to visit Solias the mystic, but you refused. ";

  echo "Your father hopes that you will reconsider.</td></tr>";

  }

}

}

echo "</table>";
 
} 
if ($type=="Side Quests")
{  
  
echo "<table class=\"page\" width=\"100%\">";

$query = sprintf("select * from flags where username='%s';",mysql_real_escape_string($username));

$result=mysql_query($query);

while($row = mysql_fetch_array($result))

  {
if ($row['quest2']==1)

  {

  echo "<tr><td class=\"border\">The Hidden Key</td><td class=\"borderl\">You found a small rusted key hidden under your bedroom rug. Now if you could only find your locked box. You have a vague memory that you locked something valuable in it, but you do not remember where you hid the box.</td></tr>";

  }

  if ($row['quest2']==2)

  {

  echo "<tr><td class=\"border\">The Hidden Key</td><td class=\"borderl\">You found a small locked box under your bed in your bedroom, but you only have a vague memory of where you hid the key.</td></tr>";

  }

if ($row['quest2']==3)

  {

  echo "<tr><td class=\"border\">The Hidden Key</td><td class=\"borderl\">You found the key and the locked box. Now you can look in your inventory and unlock the box to get your prized possession.</td></tr>";

  }

  if ($row['shepfeed']>0)
{

if ($row['shepfeed']==1)
{

echo "<tr><td class=\"border\">Hungry Dog</td><td class=\"borderl\">You fed Old Shep, and he appears to be happy to see you now. Perhaps now he will let you look in his dog house.</td></tr>";
}

if ($row['shepfeed']==2)
{
echo "<tr><td class=\"border\">The Lost Key</td><td class=\"borderl\">You found an old key in Shep the dog's house. Maybe you should talk to your father about it.</td></tr>";
}

}

}

echo "</table>";

}
if ($type=="All Quests")
{
echo "<table class=\"page\" width=\"100%\">";

$query = sprintf("select * from flags where username='%s';",mysql_real_escape_string($username));

$result=mysql_query($query);

while($row = mysql_fetch_array($result))

  {
  
  if ($row['quest4']==1)
{
echo "<tr><td class=\"border\">The Family Crest</td><td class=\"borderl\">You found the family crest. You should talk to your father about it.</td></tr>";
}
else
{

  if ($row['quest1']==0)

  {

  echo "<tr><td class=\"border\">The Apprentice</td><td class=\"borderl\">Your new father wants to talk to you.</td></tr>";

  }

   if ($row['quest1']==2)

  {

  echo "<tr><td class=\"border\">The Apprentice</td><td class=\"borderl\">You have decided to travel north to be an apprentice to Solias the mystic. Perhaps he can explain how you came to be in this strange world.";

  echo "You are to show Solias's letter to gain entrance to the House of Elders where Solias resides. ";

  echo "Your father warned you to gather supplies at home before you venture out on the treacherous roads.</td></tr>";

  }

   if ($row['quest1']==1)

  {

  echo "<tr><td class=\"border\">The Apprentice</td><td class=\"borderl\">Your new father wishes your to travel north and to visit Solias the mystic, but you refused. ";

  echo "Your father hopes that you will reconsider.</td></tr>";

  }

  if ($row['quest2']==1)

  {

  echo "<tr><td class=\"border\">The Hidden Key</td><td class=\"borderl\">You found a small rusted key hidden under your bedroom rug. Now if you could only find your locked box. You have a vague memory that you locked something valuable in it, but you do not remember where you hid the box.</td></tr>";

  }

  if ($row['quest2']==2)

  {

  echo "<tr><td class=\"border\">The Hidden Key</td><td class=\"borderl\">You found a small locked box under your bed in your bedroom, but you only have a vague memory of where you hid the key.</td></tr>";

  }

if ($row['quest2']==3)

  {

  echo "<tr><td class=\"border\">The Hidden Key</td><td class=\"borderl\">You found the key and the locked box. Now you can look in your inventory and unlock the box to get your prized possession.</td></tr>";

  }

  if ($row['shepfeed']>0)
{

if ($row['shepfeed']==1)
{

echo "<tr><td class=\"border\">Hungry Dog</td><td class=\"borderl\">You fed Old Shep, and he appears to be happy to see you now. Perhaps now he will let you look in his dog house.</td></tr>";
}

if ($row['shepfeed']==2)
{
echo "<tr><td class=\"border\">The Lost Key</td><td class=\"borderl\">You found an old key in Shep the dog's house. Maybe you should talk to your father about it.</td></tr>";
}

}

}

}
echo "</table>";
  }
?>
<?php
echo "</div></td><td class=\"page\" width=\"25%\"><div class=\"border1\">";
?>
<?php
echo "<table class=\"page\"><tr><td class=\"center\"><h2>Quest Journal</h2>";
echo "</td></tr><tr><td class=\"center\"><form action=\"journal.php?";
echo time();
echo "\" method=\"post\"><input class=\"invisible\" type=\"radio\" name=\"type\" checked=\"checked\" value=\"Main Quests\" /><input class=\"small\" type=\"submit\" value=\"Main Quests\" /></form></td></tr><tr><td class=\"center\"><form action=\"journal.php?";
echo time();
echo "\" method=\"post\"><input class=\"invisible\" type=\"radio\" name=\"type\" checked=\"checked\" value=\"Side Quests\" /><input class=\"small\" type=\"submit\" value=\"Side Quests\" /></form></td></tr><tr><td class=\"center\"><form action=\"journal.php?";
echo time();
echo "\" method=\"post\"><input class=\"invisible\" type=\"radio\" name=\"type\" checked=\"checked\" value=\"All Quests\" /><input class=\"small\" type=\"submit\" value=\"All Quests\" /></form></td></tr><tr><td class=\"center\"><br /><form action=\"../maingraphics.php?";
echo time();
echo "\" method=\"post\"><input class=\"small\" type=\"submit\" value=\"Back to Map\" /></form></td></tr></table>";
?>
<?php
echo "</td></tr></table></body></html>";
?>