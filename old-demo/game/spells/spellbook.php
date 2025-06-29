<?php
//include config
require_once( $_SERVER['DOCUMENT_ROOT'] . '/game/includes/config2.php');
//if not logged in redirect to login page
if(!$user->is_logged_in()){ header('Location: ../login.php'); die('This site works best with redirections turned on, but you may continue with them turned off. <a href="../login.php">Continue</a>');}
$username = $_SESSION['username'];
$charname= $_SESSION['charname'];
include ('../includes/getenemy.php');
if (!isset($_POST['type'])) {
$type = 0;
}
else {
$type=strip_tags($_POST["type"]);
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
<body style="padding: 0px 0px 0px 0px; overflow-y: hidden;">
<?php

echo "<table class=\"page\" width=\"100%\"><tr><td class=\"center\" colspan=\"3\"><img src=\"../images/spellbook.png\" /><br /><h2>Spellbook</h2>";
echo "</td></tr><tr><td class=\"center\"><form action=\"spellbook.php?";

echo time();
echo "\" method=\"post\"><input class=\"small\" type=\"submit\" value=\"Elemental Spells\" /></form></td><td class=\"center\"><br />";
echo "</td><td class=\"center\"><form action=\"spellbook.php?";

echo time();
echo "\" method=\"post\"><input class=\"small\" type=\"submit\" value=\"Enchantments\" /></form></td></tr><tr><td class=\"center\"><form action=\"spellbook.php?";

echo time();
echo "\" method=\"post\"><input class=\"small\" type=\"submit\" value=\"Potions\" /></form></td><td class=\"center\"><br />";
echo "</td><td class=\"center\"><form action=\"spellbook.php?";

echo time();
echo "\" method=\"post\"><input class=\"small\" type=\"submit\" value=\"Scrolls\" /></form></td></tr>";


if ($fight==0)
{
echo "<tr><td class=\"center\" colspan=\"3\"><form action=\"../maingraphics.php?";

echo time();

echo "\" method=\"post\"><input class=\"small\" type=\"submit\" value=\"Back to Map\" /></form></td></tr></table>";
}

if ($fight==1)
{
echo "<tr><td class=\"center\" colspan=\"3\"><form action=\"../monsters/nomove.php?";

echo time();

echo "\" method=\"post\"><input class=\"small\" type=\"submit\" value=\"Back to Battle\" /></form></td></tr></table>";
}

?>
<?php
if (!$type) {
$stmt = $db->prepare("SELECT * FROM spellbook WHERE charname=:charname and spelltype='Elemental' and learned>0 order by spelltype desc, element, spelllevel desc");
				$stmt->execute(array(':charname' => $charname));
while($row = $stmt->fetch())
{
echo '
<img src="../images/'.$row['spellimage'].'.png" />
<br />
'.$row['spellname'].'
<br />
Level '.$row['spelllevel'].'
<table class="page">
<tr><td class="left">Description:</td><td class="left">'.$row['spelldescription'].'</td></tr>
<tr><td class="left">Spell Type:</td><td class="left">'.$row['spelltype'].'</td></tr>';
if ($row['spelltype']=="Elemental") {
echo "<tr><td class=\"left\">Element Type:</td><td class=\"left\">".$row['element'];
echo "</td></tr>";
}
echo "<tr><td class=\"left\">Mana Cost:</td><td class=\"left\">".$row['manacost'];
echo "</td></tr>";
if ($row['heallife']>0) {
echo "<tr><td class=\"left\">Life Heal:</td><td class=\"left\">".$row['heallife'];
echo "</td></tr>";
}
if ($row['damage']>0) {
echo "<tr><td class=\"left\">Damage:</td><td class=\"left\">".$row['damage'];
echo "</td></tr>";
}
if ($fight==1 || $row['offensive']==0) {
echo "<tr><td class=\"center\"><form action=\"castspell.php?";
echo time();
echo "\" method=\"post\"><input class=\"invisible\" type=\"radio\" name=\"type\" checked=\"checked\" value=\"";
echo $row['spellname']." ".$row['spelllevel'];echo "\" /><input class=\"small\" type=\"submit\" value=\"Cast Spell\" /></form>";
//form to cast spellbook

echo "</td><td class=\"center\"></table><form action=\"setspell.php?";

echo time();
echo "\" method=\"post\"><input class=\"invisible\" type=\"radio\" name=\"type\" checked=\"checked\" value=\"";
echo $row['spellname']." ".$row['spelllevel'];echo "\" /><input class=\"invisible\" type=\"radio\" name=\"image\" checked=\"checked\" value=\"";

echo $row['spellimage'];

echo "\" /><input class=\"small\" type=\"submit\" value=\"Set Quickspell\" /></form>";
}
if ($fight==0 and $row['offensive']==1) {
echo "<form action=\"setspell.php?";
echo time();
echo "\" method=\"post\"><input class=\"invisible\" type=\"radio\" name=\"type\" checked=\"checked\" value=\"";
echo $row['spellname']." ".$row['spelllevel'];echo "\" /><input class=\"invisible\" type=\"radio\" name=\"image\" checked=\"checked\" value=\"";
echo $row['spellimage'];
echo "\" /><input class=\"small\" type=\"submit\" value=\"Set Quickspell\" /></form>";
}
}
}
if ($type=="Light") {
$stmt = $db->prepare("SELECT * FROM spellbook WHERE charname=:charname and learned>0 and spelltype='Elemental' and element='Light' order by spelltype desc, element, spelllevel desc");
				$stmt->execute(array(':charname' => $charname));
while($row = $stmt->fetch())
{
echo "<tr><td class=\"border\">
<img src=\"../images/".$row['spellimage'].".png\" /><br />".$row['spellname']."<br />Level ".$row['spelllevel'];
echo "</td><td class=\"border\">
<table class=\"page\"><tr><td class=\"left\">Description:</td><td class=\"left\">".$row['spelldescription'];
echo "</td></tr><tr><td class=\"left\">Spell Type:</td><td class=\"left\">".$row['spelltype']."</td></tr>";
if ($row['spelltype']=="Elemental")
{
echo "<tr><td class=\"left\">Element Type:</td><td class=\"left\">".$row['element'];

echo "</td></tr>";

}

echo "<tr><td class=\"left\">Mana Cost:</td><td class=\"left\">".$row['manacost'];

echo "</td></tr>";

if ($row['heallife']>0)

{

echo "<tr><td class=\"left\">Life Heal:</td><td class=\"left\">".$row['heallife'];


echo "</td></tr>";

}

if ($fight==1 || $row['offensive']==0)

{

echo "<tr><td class=\"center\"><form action=\"castspell.php?";

echo time();

echo "\" method=\"post\"><input class=\"invisible\" type=\"radio\" name=\"type\" checked=\"checked\" value=\"";


echo $row['spellname']." ".$row['spelllevel'];echo "\" /><input class=\"small\" type=\"submit\" value=\"Cast Spell\" /></form>";

//form to cast spellbook

echo "</td><td class=\"center\"><table class=\"page\"><tr><td class=\"page\"><form action=\"setspell.php?";

echo time();


echo "\" method=\"post\"><input class=\"invisible\" type=\"radio\" name=\"type\" checked=\"checked\" value=\"";


echo $row['spellname']." ".$row['spelllevel'];echo "\" /><input class=\"invisible\" type=\"radio\" name=\"image\" checked=\"checked\" value=\"";

echo $row['spellimage'];

echo "\" /><input class=\"small\" type=\"submit\" value=\"Set Quickspell\" /></form></td></tr></table>";

}

if ($fight==0 and $row['offensive']==1)

{

echo "<tr><td class=\"center\"><td class=\"center\" colspan=\"2\"><table class=\"page\"><tr><td class=\"page\"><form action=\"setspell.php?";

echo time();

echo "\" method=\"post\"><input class=\"invisible\" type=\"radio\" name=\"type\" checked=\"checked\" value=\"";

echo $row['spellname']." ".$row['spelllevel'];echo "\" /><input class=\"invisible\" type=\"radio\" name=\"image\" checked=\"checked\" value=\"";

echo $row['spellimage'];

echo "\" /><input class=\"small\" type=\"submit\" value=\"Set Quickspell\" /></form></td></tr></table>";

}

echo "</td></tr>";

echo "</table>";

echo "</td></tr>";

}

}
if ($type=="Dark") {

$query=sprintf("select * from spellbook where username='%s' and learned>0 and spelltype='Elemental' and element='Dark' order by spelltype desc, element, spelllevel desc;",mysql_real_escape_string($username));

$result=mysql_query($query);

while($row = mysql_fetch_array($result))

{


echo "<tr><td class=\"border\">

<img src=\"../images/".$row['spellimage'].".png\" /><br />".$row['spellname']."<br />Level ".$row['spelllevel'];

echo "</td><td class=\"border\">

<table class=\"page\"><tr><td class=\"left\">Description:</td><td class=\"left\">".$row['spelldescription'];


echo "</td></tr><tr><td class=\"left\">Spell Type:</td><td class=\"left\">".$row['spelltype']."</td></tr>";

if ($row['spelltype']=="Elemental")

{

echo "<tr><td class=\"left\">Element Type:</td><td class=\"left\">".$row['element'];

echo "</td></tr>";

}

echo "<tr><td class=\"left\">Mana Cost:</td><td class=\"left\">".$row['manacost'];

echo "</td></tr>";

if ($row['heallife']>0)

{

echo "<tr><td class=\"left\">Life Heal:</td><td class=\"left\">".$row['heallife'];


echo "</td></tr>";

}

if ($fight==1 || $row['offensive']==0)

{

echo "<tr><td class=\"center\"><form action=\"castspell.php?";

echo time();

echo "\" method=\"post\"><input class=\"invisible\" type=\"radio\" name=\"type\" checked=\"checked\" value=\"";


echo $row['spellname']." ".$row['spelllevel'];echo "\" /><input class=\"small\" type=\"submit\" value=\"Cast Spell\" /></form>";

//form to cast spellbook

echo "</td><td class=\"center\"><table class=\"page\"><tr><td class=\"page\"><form action=\"setspell.php?";

echo time();


echo "\" method=\"post\"><input class=\"invisible\" type=\"radio\" name=\"type\" checked=\"checked\" value=\"";


echo $row['spellname']." ".$row['spelllevel'];echo "\" /><input class=\"invisible\" type=\"radio\" name=\"image\" checked=\"checked\" value=\"";

echo $row['spellimage'];

echo "\" /><input class=\"small\" type=\"submit\" value=\"Set Quickspell\" /></form></td></tr></table>";

}

if ($fight==0 and $row['offensive']==1)

{

echo "<tr><td class=\"center\"><td class=\"center\" colspan=\"2\"><table class=\"page\"><tr><td class=\"page\"><form action=\"setspell.php?";

echo time();

echo "\" method=\"post\"><input class=\"invisible\" type=\"radio\" name=\"type\" checked=\"checked\" value=\"";

echo $row['spellname']." ".$row['spelllevel'];echo "\" /><input class=\"invisible\" type=\"radio\" name=\"image\" checked=\"checked\" value=\"";

echo $row['spellimage'];

echo "\" /><input class=\"small\" type=\"submit\" value=\"Set Quickspell\" /></form></td></tr></table>";

}

echo "</td></tr>";

echo "</table>";

echo "</td></tr>";

}

}
if ($type=="Fire") {

$query=sprintf("select * from spellbook where username='%s' and learned>0 and spelltype='Elemental' and element='Fire' order by spelltype desc, element, spelllevel desc;",mysql_real_escape_string($username));

$result=mysql_query($query);

while($row = mysql_fetch_array($result))

{


echo "<tr><td class=\"border\">

<img src=\"../images/".$row['spellimage'].".png\" /><br />".$row['spellname']."<br />Level ".$row['spelllevel'];

echo "</td><td class=\"border\">

<table class=\"page\"><tr><td class=\"left\">Description:</td><td class=\"left\">".$row['spelldescription'];


echo "</td></tr><tr><td class=\"left\">Spell Type:</td><td class=\"left\">".$row['spelltype']."</td></tr>";

if ($row['spelltype']=="Elemental")

{

echo "<tr><td class=\"left\">Element Type:</td><td class=\"left\">".$row['element'];

echo "</td></tr>";

}

echo "<tr><td class=\"left\">Mana Cost:</td><td class=\"left\">".$row['manacost'];

echo "</td></tr>";

if ($row['heallife']>0)

{

echo "<tr><td class=\"left\">Life Heal:</td><td class=\"left\">".$row['heallife'];


echo "</td></tr>";

}

if ($fight==1 || $row['offensive']==0)

{

echo "<tr><td class=\"center\"><form action=\"castspell.php?";

echo time();

echo "\" method=\"post\"><input class=\"invisible\" type=\"radio\" name=\"type\" checked=\"checked\" value=\"";


echo $row['spellname']." ".$row['spelllevel'];echo "\" /><input class=\"small\" type=\"submit\" value=\"Cast Spell\" /></form>";

//form to cast spellbook

echo "</td><td class=\"center\"><table class=\"page\"><tr><td class=\"page\"><form action=\"setspell.php?";

echo time();


echo "\" method=\"post\"><input class=\"invisible\" type=\"radio\" name=\"type\" checked=\"checked\" value=\"";


echo $row['spellname']." ".$row['spelllevel'];echo "\" /><input class=\"invisible\" type=\"radio\" name=\"image\" checked=\"checked\" value=\"";

echo $row['spellimage'];

echo "\" /><input class=\"small\" type=\"submit\" value=\"Set Quickspell\" /></form></td></tr></table>";

}

if ($fight==0 and $row['offensive']==1)

{

echo "<tr><td class=\"center\"><td class=\"center\" colspan=\"2\"><table class=\"page\"><tr><td class=\"page\"><form action=\"setspell.php?";

echo time();

echo "\" method=\"post\"><input class=\"invisible\" type=\"radio\" name=\"type\" checked=\"checked\" value=\"";

echo $row['spellname']." ".$row['spelllevel'];echo "\" /><input class=\"invisible\" type=\"radio\" name=\"image\" checked=\"checked\" value=\"";

echo $row['spellimage'];

echo "\" /><input class=\"small\" type=\"submit\" value=\"Set Quickspell\" /></form></td></tr></table>";

}

echo "</td></tr>";

echo "</table>";

echo "</td></tr>";

}

}
if ($type=="Water") {

$query=sprintf("select * from spellbook where username='%s' and learned>0 and spelltype='Elemental' and element='Water' order by spelltype desc, element, spelllevel desc;",mysql_real_escape_string($username));

$result=mysql_query($query);

while($row = mysql_fetch_array($result))

{


echo "<tr><td class=\"border\">

<img src=\"../images/".$row['spellimage'].".png\" /><br />".$row['spellname']."<br />Level ".$row['spelllevel'];

echo "</td><td class=\"border\">

<table class=\"page\"><tr><td class=\"left\">Description:</td><td class=\"left\">".$row['spelldescription'];


echo "</td></tr><tr><td class=\"left\">Spell Type:</td><td class=\"left\">".$row['spelltype']."</td></tr>";

if ($row['spelltype']=="Elemental")

{

echo "<tr><td class=\"left\">Element Type:</td><td class=\"left\">".$row['element'];

echo "</td></tr>";

}

echo "<tr><td class=\"left\">Mana Cost:</td><td class=\"left\">".$row['manacost'];

echo "</td></tr>";

if ($row['heallife']>0)

{

echo "<tr><td class=\"left\">Life Heal:</td><td class=\"left\">".$row['heallife'];


echo "</td></tr>";

}

if ($fight==1 || $row['offensive']==0)

{

echo "<tr><td class=\"center\"><form action=\"castspell.php?";

echo time();

echo "\" method=\"post\"><input class=\"invisible\" type=\"radio\" name=\"type\" checked=\"checked\" value=\"";


echo $row['spellname']." ".$row['spelllevel'];echo "\" /><input class=\"small\" type=\"submit\" value=\"Cast Spell\" /></form>";

//form to cast spellbook

echo "</td><td class=\"center\"><table class=\"page\"><tr><td class=\"page\"><form action=\"setspell.php?";

echo time();


echo "\" method=\"post\"><input class=\"invisible\" type=\"radio\" name=\"type\" checked=\"checked\" value=\"";


echo $row['spellname']." ".$row['spelllevel'];echo "\" /><input class=\"invisible\" type=\"radio\" name=\"image\" checked=\"checked\" value=\"";

echo $row['spellimage'];

echo "\" /><input class=\"small\" type=\"submit\" value=\"Set Quickspell\" /></form></td></tr></table>";

}

if ($fight==0 and $row['offensive']==1)

{

echo "<tr><td class=\"center\"><td class=\"center\" colspan=\"2\"><table class=\"page\"><tr><td class=\"page\"><form action=\"setspell.php?";

echo time();

echo "\" method=\"post\"><input class=\"invisible\" type=\"radio\" name=\"type\" checked=\"checked\" value=\"";

echo $row['spellname']." ".$row['spelllevel'];echo "\" /><input class=\"invisible\" type=\"radio\" name=\"image\" checked=\"checked\" value=\"";

echo $row['spellimage'];

echo "\" /><input class=\"small\" type=\"submit\" value=\"Set Quickspell\" /></form></td></tr></table>";

}

echo "</td></tr>";

echo "</table>";

echo "</td></tr>";

}

}
if ($type=="Air") {

$query=sprintf("select * from spellbook where username='%s' and spelltype='Elemental' and learned>0 and element='Air' order by spelltype desc, element, spelllevel desc;",mysql_real_escape_string($username));

$result=mysql_query($query);

while($row = mysql_fetch_array($result))

{


echo "<tr><td class=\"border\">

<img src=\"../images/".$row['spellimage'].".png\" /><br />".$row['spellname']."<br />Level ".$row['spelllevel'];

echo "</td><td class=\"border\">

<table class=\"page\"><tr><td class=\"left\">Description:</td><td class=\"left\">".$row['spelldescription'];


echo "</td></tr><tr><td class=\"left\">Spell Type:</td><td class=\"left\">".$row['spelltype']."</td></tr>";

if ($row['spelltype']=="Elemental")

{

echo "<tr><td class=\"left\">Element Type:</td><td class=\"left\">".$row['element'];

echo "</td></tr>";

}

echo "<tr><td class=\"left\">Mana Cost:</td><td class=\"left\">".$row['manacost'];

echo "</td></tr>";

if ($row['heallife']>0)

{

echo "<tr><td class=\"left\">Life Heal:</td><td class=\"left\">".$row['heallife'];


echo "</td></tr>";

}

if ($fight==1 || $row['offensive']==0)

{

echo "<tr><td class=\"center\"><form action=\"castspell.php?";

echo time();

echo "\" method=\"post\"><input class=\"invisible\" type=\"radio\" name=\"type\" checked=\"checked\" value=\"";


echo $row['spellname']." ".$row['spelllevel'];echo "\" /><input class=\"small\" type=\"submit\" value=\"Cast Spell\" /></form>";

//form to cast spellbook

echo "</td><td class=\"center\"><table class=\"page\"><tr><td class=\"page\"><form action=\"setspell.php?";

echo time();


echo "\" method=\"post\"><input class=\"invisible\" type=\"radio\" name=\"type\" checked=\"checked\" value=\"";


echo $row['spellname']." ".$row['spelllevel'];echo "\" /><input class=\"invisible\" type=\"radio\" name=\"image\" checked=\"checked\" value=\"";

echo $row['spellimage'];

echo "\" /><input class=\"small\" type=\"submit\" value=\"Set Quickspell\" /></form></td></tr></table>";

}

if ($fight==0 and $row['offensive']==1)

{

echo "<tr><td class=\"center\"><td class=\"center\" colspan=\"2\"><table class=\"page\"><tr><td class=\"page\"><form action=\"setspell.php?";

echo time();

echo "\" method=\"post\"><input class=\"invisible\" type=\"radio\" name=\"type\" checked=\"checked\" value=\"";

echo $row['spellname']." ".$row['spelllevel'];echo "\" /><input class=\"invisible\" type=\"radio\" name=\"image\" checked=\"checked\" value=\"";

echo $row['spellimage'];

echo "\" /><input class=\"small\" type=\"submit\" value=\"Set Quickspell\" /></form></td></tr></table>";

}

echo "</td></tr>";

echo "</table>";

echo "</td></tr>";

}

}
if ($type=="Earth") {

$query=sprintf("select * from spellbook where username='%s' and spelltype='Elemental' and learned>0 and element='Earth' order by spelltype desc, element, spelllevel desc;",mysql_real_escape_string($username));

$result=mysql_query($query);

while($row = mysql_fetch_array($result))

{


echo "<tr><td class=\"border\">

<img src=\"../images/".$row['spellimage'].".png\" /><br />".$row['spellname']."<br />Level ".$row['spelllevel'];

echo "</td><td class=\"border\">

<table class=\"page\"><tr><td class=\"left\">Description:</td><td class=\"left\">".$row['spelldescription'];


echo "</td></tr><tr><td class=\"left\">Spell Type:</td><td class=\"left\">".$row['spelltype']."</td></tr>";

if ($row['spelltype']=="Elemental")

{

echo "<tr><td class=\"left\">Element Type:</td><td class=\"left\">".$row['element'];

echo "</td></tr>";

}

echo "<tr><td class=\"left\">Mana Cost:</td><td class=\"left\">".$row['manacost'];

echo "</td></tr>";

if ($row['heallife']>0)

{

echo "<tr><td class=\"left\">Life Heal:</td><td class=\"left\">".$row['heallife'];


echo "</td></tr>";

}

if ($fight==1 || $row['offensive']==0)

{

echo "<tr><td class=\"center\"><form action=\"castspell.php?";

echo time();

echo "\" method=\"post\"><input class=\"invisible\" type=\"radio\" name=\"type\" checked=\"checked\" value=\"";


echo $row['spellname']." ".$row['spelllevel'];echo "\" /><input class=\"small\" type=\"submit\" value=\"Cast Spell\" /></form>";

//form to cast spellbook

echo "</td><td class=\"center\"><table class=\"page\"><tr><td class=\"page\"><form action=\"setspell.php?";

echo time();


echo "\" method=\"post\"><input class=\"invisible\" type=\"radio\" name=\"type\" checked=\"checked\" value=\"";


echo $row['spellname']." ".$row['spelllevel'];echo "\" /><input class=\"invisible\" type=\"radio\" name=\"image\" checked=\"checked\" value=\"";

echo $row['spellimage'];

echo "\" /><input class=\"small\" type=\"submit\" value=\"Set Quickspell\" /></form></td></tr></table>";

}

if ($fight==0 and $row['offensive']==1)

{

echo "<tr><td class=\"center\"><td class=\"center\" colspan=\"2\"><table class=\"page\"><tr><td class=\"page\"><form action=\"setspell.php?";

echo time();

echo "\" method=\"post\"><input class=\"invisible\" type=\"radio\" name=\"type\" checked=\"checked\" value=\"";

echo $row['spellname']." ".$row['spelllevel'];echo "\" /><input class=\"invisible\" type=\"radio\" name=\"image\" checked=\"checked\" value=\"";

echo $row['spellimage'];

echo "\" /><input class=\"small\" type=\"submit\" value=\"Set Quickspell\" /></form></td></tr></table>";

}

echo "</td></tr>";

echo "</table>";

echo "</td></tr>";

}
}
?>
</body></html>