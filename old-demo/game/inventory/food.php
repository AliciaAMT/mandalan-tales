<?php
//include config
require( $_SERVER['DOCUMENT_ROOT'] . '/game/includes/config2.php');
//if not logged in redirect to login page
if(!$user->is_logged_in()){ header('Location: login.php'); }
$username = $_SESSION['username'];
$charname= $_SESSION['charname'];
require( $_SERVER['DOCUMENT_ROOT'] . '/game/includes/head.php');
?>
<?php
include ('php/getfight.php');
?>
<body>
<table class="page"><tr><td class="page">
<?php
$type=strip_tags($_POST["type"]);
echo "<table class=\"page\">";
if (!$type)
{
$stmt = $db->prepare("SELECT * FROM inventory WHERE charname=:charname and keep>0 and itemtype = 'Food'");
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
echo "<tr><td class=\"left\">Enhancement:</td><td class=\"left\">".$row['enhancement1']."</td></tr>";
}
if ($row['enhancement2']!="None")
{
echo "<tr><td class=\"left\">Enhancement:</td><td class=\"left\">".$row['enhancement2']."</td></tr>";
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
echo "<tr><td class=\"center\" colspan=\"2\"><table class=\"page\"><tr><td class=\"page\"><form name=\"drink\" action=\"drink.php?".time();
echo "\" method=\"get\"><input class=\"invisible\" type=\"radio\" name=\"drink\" checked=\"checked\" value=\"".$row['itemnumber'];
echo "\"><br /><input type=\"submit\" value=\"Drink Water\" class=\"small\"></form></td></tr></table></td></tr>";
}
echo "</table>";
echo "</td></tr>";
}
echo "</table>";
}
else
{
$stmt = $db->prepare("SELECT * FROM inventory WHERE charname=:charname and keep>0 and itemtype = 'Food' and othertype = :type");
				$stmt->execute(array(':charname' => $charname,
				':type' => $type
				));
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
echo "<tr><td class=\"left\">Enhancement:</td><td class=\"left\">".$row['enhancement1']."</td></tr>";
}
if ($row['enhancement2']!="None")
{
echo "<tr><td class=\"left\">Enhancement:</td><td class=\"left\">".$row['enhancement2']."</td></tr>";
}
if ($row['itemvalue']>0)

{

echo "<tr><td class=\"left\">Value:</td><td class=\"left\">".$row['itemvalue']." Gold</td></tr>";

}

if ($row['maxwater']>0)

{

echo "<tr><td class=\"left\">Life: +5</td><td class=\"left\">Mana: +5</td></tr>";

echo "<tr><td class=\"left\">Water Units:</td><td class=\"left\">".$row['waterunits']."/".$row['maxwater']."</td></tr>";

}

if ($row['waterunits']>0)

{

echo "<tr><td class=\"center\" colspan=\"2\"><table class=\"page\"><tr><td class=\"page\"><form name=\"drink\" action=\"drink.php?".time();

  echo "\" method=\"get\"><input class=\"invisible\" type=\"radio\" name=\"drink\" checked=\"checked\" value=\"".$row['itemnumber'];

  echo "\"><br /><input type=\"submit\" value=\"Drink Water\" class=\"small\"></form></td></tr></table></td></tr>";
}
echo "</table>";
echo "</td></tr>";
}
echo "</table>";
}
?>
<?php 
echo "</div></td><td class=\"page\" width=\"25%\"><div class=\"border1\"><table class=\"page\"><tr><td class=\"page\">";
 ?>
<?php

echo "<table class=\"page\"><tr><td class=\"center\"><img src=\"../images/inventory.png\" /><h2>Food Pocket</h2>";

echo "</td></tr><tr><td class=\"center\"><form action=\"food.php?";



echo time();

echo "\" method=\"post\"><input class=\"invisible\" type=\"radio\" name=\"type\" checked=\"checked\" value=\"Water\" /><input class=\"small\" type=\"submit\" value=\"Water\" /></form></td></tr><tr><td class=\"center\"><form action=\"food.php?";



echo time();

echo "\" method=\"post\"><input class=\"invisible\" type=\"radio\" name=\"type\" checked=\"checked\" value=\"Consumable\" /><input class=\"small\" type=\"submit\" value=\"Consumable\" /></form></td></tr><tr><td class=\"center\"><form action=\"food.php?";



echo time();

echo "\" method=\"post\"><input class=\"invisible\" type=\"radio\" name=\"type\" checked=\"checked\" value=\"Ingredient\" /><input class=\"small\" type=\"submit\" value=\"Ingredients\" /></form></td></tr><tr><td class=\"page\"><br /></td></tr><tr><td class=\"center\"><form action=\"inventory.php?";



echo time();

echo "\" method=\"post\"><input class=\"small\" type=\"submit\" value=\"Back\" /></form></td></tr></table>";

?>
<?php
 echo "</td></tr></table></body></html>";
 ?>
