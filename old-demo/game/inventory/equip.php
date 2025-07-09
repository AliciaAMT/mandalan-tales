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
include ('../includes/getenemy.php');
?>
<body>
<table class="page"><tr><td class="page">
<?php
if (isset($_POST['type']))
{
$type=$_POST["type"];	
}
if(isset($_POST['keep']))
{
$keepnumber=strip_tags($_GET["keep"]);
$stmt = $db->prepare('UPDATE inventory SET equip = 0, equiplh = 0, equiprh = 0, keep = 1, trade = 0 WHERE charname = :charname and itemnumber = :keepnumber') ;
					$stmt->execute(array(':charname' => $charname, ':keepnumber' => $keepnumber)); 
}
if(isset($_POST['trade']))
{
	$tradenumber=strip_tags($_GET["trade"]);
$stmt = $db->prepare('UPDATE inventory SET equip = 0, equiplh = 0, equiprh = 0, keep = 0, trade = 1 WHERE charname = :charname and itemnumber = :tradenumber') ;
					$stmt->execute(array(':charname' => $charname, ':tradenumber' => $tradenumber));  
}
echo "<table class=\"page\">";
if (!$type)
{
$stmt = $db->prepare("SELECT * FROM inventory WHERE charname=:charname and equip>0 ORDER BY itemtype desc, weapontype, itemlevel desc, itemrarity desc");
				$stmt->execute(array(':charname' => $charname));
while($row = $stmt->fetch())
{

echo "<tr><td class=\"border\">

<img src=\"../images/".$row['itemimage'].".png\" /><br />".$row['itemname']."<br />Level ".$row['itemlevel']."<br />".$row['itemrarity'];

if ($row['keep']>1)

{
echo "<br />Amount: ".$row['keep'];
}
//display enchantable, transmutable, or adjustable
if ($row['enchantment1']>0)
{

echo "<br />Enchantable";

}
if ($row['transmute1']>0)
{

echo "<br />Transmutable";

}
if ($row['adjustable']>0)
{

echo "<br />Adjustable";

}
echo "</td><td class=\"border\">
<table class=\"page\"><tr><td class=\"left\">Description:</td><td class=\"left\">".$row['itemdescription'];
echo "</td></tr><tr><td class=\"left\">Item Type:</td><td class=\"left\">".$row['itemtype']."</td></tr>";
if ($row['itemtype']=="Armor")
{

echo "<tr><td class=\"left\"><h3>Armor Type:</h3></td><td class=\"left\">".$row['armortype']."</td></tr>";
$defense=$row['armorbase']+$row['itemlevel'];
echo "<tr><td class=\"left\"><h3>Armor Rating:</h3></td><td class=\"left\">".$defense."</td></tr>";

}
if ($row['itemtype']=="Weapon")
{

echo "<tr><td class=\"left\">Weapon Type:</td><td class=\"left\">".$row['weapontype']."</td></tr>";

echo "<tr><td class=\"left\">Range:</td><td class=\"left\">".$row['itemrange']."</td></tr>";

echo "<tr><td class=\"left\">Speed:</td><td class=\"left\">".$row['itemspeed']."</td></tr>";

echo "<tr><td class=\"left\">Dualwield:</td><td class=\"left\">";

	if ($row['duality']==0)

	{ echo "No</td></tr>";}

	if ($row['duality']>0)

	{ echo "Yes</td></tr>";}

$damage=$row['weaponbase']+$row['itemlevel'];

echo "<tr><td class=\"left\">Damage:</td><td class=\"left\">".$damage."</td></tr>";

}
if ($row['enhancement1']!="None")
{

	echo "<tr><td class=\"center\" colspan=\"2\"><h3>Enhancements</h3></td></tr><tr><td class=\"left\" colspan=\"2\">".$row['enhancement1']."</td></tr>";

	}
if ($row['enhancement2']!="None")
{

	echo "<tr><td class=\"left\" colspan=\"2\">".$row['enhancement2']."</td></tr>";

	}
if ($row['enhancement3']!="None")
{

	echo "<tr><td class=\"left\" colspan=\"2\">".$row['enhancement3']."</td></tr>";

	}
if ($row['itemvalue']>0)
{
echo "<tr><td class=\"left\">Value:</td><td class=\"left\">".$row['itemvalue']." Gold</td></tr>";
}
echo "</table>";
echo "<table class=\"page\"><tr><td class=\"page\">";
echo "<form name=\"keep\" action=\"equip.php?".time();
echo "\" method=\"get\"><input class=\"invisible\" type=\"radio\" name=\"keep\" checked=\"checked\" value=\"".$row['itemnumber'];
echo "\"><br /><input type=\"submit\" value=\"Unequip\" class=\"small\"></form></td></tr><tr><td class=\"page\"><form name=\"trade\" action=\"equip.php?".time();

  echo "\" method=\"get\"><input class=\"invisible\" type=\"radio\" name=\"trade\" checked=\"checked\" value=\"".$row['itemnumber'];

  echo "\"><br /><input type=\"submit\" value=\"Trade\" class=\"small\"></form>";

  echo "</td></tr></table>";

  echo "</td></tr>";

}
echo "</table>";
}
else
{
$stmt = $db->prepare("SELECT * FROM inventory WHERE charname=:charname and equip>0 and itemtype = :type ORDER BY itemtype, weapontype, itemlevel desc, itemrarity");
				$stmt->execute(array(':charname' => $charname, ':type' => $type));
while($row = $stmt->fetch())
{
echo "<tr><td class=\"border\">

<img src=\"../images/".$row['itemimage'].".png\" /><br />".$row['itemname']."<br />Level ".$row['itemlevel']."<br />".$row['itemrarity'];



if ($row['keep']>1)

{

echo "<br />Amount: ".$row['keep'];

}

//display enchantable, transmutable, or adjustable

if ($row['enchantment1']>0)

{

echo "<br />Enchantable";

}



if ($row['transmute1']>0)

{

echo "<br />Transmutable";

}

if ($row['adjustable']>0)

{

echo "<br />Adjustable";

}

  

echo "</td><td class=\"border\">


<table class=\"page\"><tr><td class=\"left\">Description:</td><td class=\"left\">".$row['itemdescription'];

echo "</td></tr><tr><td class=\"left\">Item Type:</td><td class=\"left\">".$row['itemtype']."</td></tr>";


if ($row['itemtype']=="Armor")

{

echo "<tr><td class=\"left\"><h3>Armor Type:</h3></td><td class=\"left\">".$row['armortype']."</td></tr>";
$defense=$row['armorbase']+$row['itemlevel'];
echo "<tr><td class=\"left\"><h3>Armor Rating:</h3></td><td class=\"left\">".$defense."</td></tr>";

}



if ($row['itemtype']=="Weapon")

{

echo "<tr><td class=\"left\">Weapon Type:</td><td class=\"left\">".$row['weapontype']."</td></tr>";

echo "<tr><td class=\"left\">Range:</td><td class=\"left\">".$row['itemrange']."</td></tr>";

echo "<tr><td class=\"left\">Speed:</td><td class=\"left\">".$row['itemspeed']."</td></tr>";

echo "<tr><td class=\"left\">Dualwield:</td><td class=\"left\">";

	if ($row['duality']==0)

	{ echo "No</td></tr>";}

	if ($row['duality']>0)

	{ echo "Yes</td></tr>";}

$damage=$row['weaponbase']+$row['itemlevel'];

echo "<tr><td class=\"left\">Damage:</td><td class=\"left\">".$damage."</td></tr>";

}

	if ($row['enhancement1']!="None")

	{

	echo "<tr><td class=\"center\" colspan=\"2\"><h3>Enhancements</h3></td></tr><tr><td class=\"left\" colspan=\"2\">".$row['enhancement1']."</td></tr>";

	}
if ($row['enhancement2']!="None")

	{

	echo "<tr><td class=\"left\" colspan=\"2\">".$row['enhancement2']."</td></tr>";

	}
	
	if ($row['enhancement3']!="None")

	{

	echo "<tr><td class=\"left\" colspan=\"2\">".$row['enhancement3']."</td></tr>";

	}






if ($row['itemvalue']>0)

{

echo "<tr><td class=\"left\">Value:</td><td class=\"left\">".$row['itemvalue']." Gold</td></tr>";

}



echo "</table>";


echo "<table class=\"page\"><tr><td class=\"page\">";

  echo "<form name=\"keep\" action=\"equip.php?".time();

  echo "\" method=\"get\"><input class=\"invisible\" type=\"radio\" name=\"keep\" checked=\"checked\" value=\"".$row['itemnumber'];

  echo "\"><br /><input type=\"submit\" value=\"Unequip\" class=\"small\"></form></td></tr><tr><td class=\"page\"><form name=\"trade\" action=\"equip.php?".time();

  echo "\" method=\"get\"><input class=\"invisible\" type=\"radio\" name=\"trade\" checked=\"checked\" value=\"".$row['itemnumber'];

  echo "\"><br /><input type=\"submit\" value=\"Trade\" class=\"small\"></form>";

  echo "</td></tr></table>";

  echo "</td></tr>";

}
echo "</table>";
}
?>
<?php 
echo "</div></td><td class=\"page\" width=\"25%\"><div class=\"border1\"><table class=\"page\"><tr><td class=\"page\">";
 ?>
<?php

echo "<table class=\"page\"><tr><td class=\"center\"><img src=\"../images/inventory.png\" /><h2>Equip Pocket</h2>";

echo "</td></tr><tr><td class=\"center\"><form action=\"equip.php?";



echo time();

echo "\" method=\"post\"><input class=\"invisible\" type=\"radio\" name=\"type\" checked=\"checked\" value=\"Weapon\" /><input class=\"small\" type=\"submit\" value=\"Weapons\" /></form></td></tr><tr><td class=\"center\"><form action=\"equip.php?";



echo time();

echo "\" method=\"post\"><input class=\"invisible\" type=\"radio\" name=\"type\" checked=\"checked\" value=\"Armor\" /><input class=\"small\" type=\"submit\" value=\"Armor\" /></form></td></tr><tr><td class=\"center\"><form action=\"equip.php?";



echo time();

echo "\" method=\"post\"><input class=\"invisible\" type=\"radio\" name=\"type\" checked=\"checked\" value=\"Accessory\" /><input class=\"small\" type=\"submit\" value=\"Accessories\" /></form></td></tr><tr><td class=\"center\"><form action=\"equip.php?";



echo time();

echo "\" method=\"post\"><input class=\"invisible\" type=\"radio\" name=\"type\" checked=\"checked\" value=\"Other\" /><input class=\"small\" type=\"submit\" value=\"Other\" /></form></td></tr><tr><td class=\"page\"><br /></td></tr><tr><td class=\"center\"><form action=\"inventory.php?";



echo time();

echo "\" method=\"post\"><input class=\"small\" type=\"submit\" value=\"Back\" /></form></td></tr></table>";

?>
<?php
 echo "</td></tr></table></body></html>";
 ?>
