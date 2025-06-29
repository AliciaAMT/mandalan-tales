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
//**********equip items according to itemnumber**********
$equipnumber = 0;//****new equip***
$equiplhnumber=0;
$equiprhnumber=0;
$tradenumber = 0;
$equipnumber=strip_tags($_GET["equip"]);
$tradenumber=strip_tags($_GET["trade"]);
$equiplhnumber=strip_tags($_GET["equiplh"]);
$equiprhnumber=strip_tags($_GET["equiprh"]);
$type=strip_tags($_POST["type"]);
if ($equipnumber!=0)
{
$stmt = $db->prepare("SELECT itemnumber, equiplocation FROM inventory WHERE charname=:charname;");
				$stmt->execute(array(':charname' => $charname));
while($row = $stmt->fetch())
{
if ($row['itemnumber']==$equipnumber)
{
$location=$row['equiplocation'];
}
}
if ($location=="Finger")
{
$ring=0;
$stmt = $db->prepare("SELECT * from inventory where equip>0 and equiplocation = 'Finger' and charname=:charname;");
				$stmt->execute(array(':charname' => $charname));
while($row = $stmt->fetch())
	{
$ring=$ring+$row['equip'];
}
//*************************************************
if ($ring>3)
{
die ("You already have 4 rings equipped. You must unequip one before you can wear another.<br /><table class=\"page\"><tr><td class=\"page\"><form action=\"keep.php?".time()."\" method=\"post\"><input class=\"small\" type=\"submit\" value=\"Continue\" /></form></td></tr></table></body></html>");
}
if ($ring<4)
{
$stmt = $db->prepare('UPDATE inventory SET equip = 1, equiplh = 0, equiprh = 0, keep = 0 WHERE charname = :charname and itemnumber = :equipnumber and keep = 1') ;
					$stmt->execute(array(':charname' => $charname, ':equipnumber' => $equipnumber));     
  }
}
if ($location!="Finger")
{
//*********remove equipped item to make room for new*********
$stmt = $db->prepare('UPDATE inventory SET equip = 0, equiplh = 0, equiprh = 0, keep = 1 WHERE charname = :charname and equiplocation = :location and equip = 1') ;
					$stmt->execute(array(':charname' => $charname, ':location' => $location));
}
//**********************equip item************************
$stmt = $db->prepare('UPDATE inventory SET equip = 1, keep = 0 WHERE charname = :charname and itemnumber = :equipnumber') ;
					$stmt->execute(array(':charname' => $charname, ':equipnumber' => $equipnumber));     
$stmt = $db->prepare("SELECT itemtype from inventory where itemnumber = :equipnumber and charname=:charname;");
				$stmt->execute(array(':equipnumber' => $equipnumber,':charname' => $charname));
while($row = $stmt->fetch())
	{
if ($row['itemtype']=="Weapon")
{
$stmt = $db->prepare('UPDATE inventory SET equip = 0, keep = 1 WHERE charname = :charname and equip = 1 and itemtype = "Weapon" and duality = 1') ;
					$stmt->execute(array(':charname' => $charname)); 
}
}
}
if ($tradenumber!=0)
{
$stmt = $db->prepare('UPDATE inventory SET equip = 0, equiplh = 0, equiplh = 0, keep = 0, trade = 1 WHERE charname= :charname AND itemnumber = :tradenumber') ;
					$stmt->execute(array(':charname' => $charname, ':tradenumber' => $tradenumber));
}
if ($equiplhnumber!=0)
{
$stmt = $db->prepare('UPDATE inventory SET equip = 0, keep = 1 WHERE charname= :charname AND equip = 1 and itemtype = "Weapon" and duality = 0');
					$stmt->execute(array(':charname' => $charname));	
$stmt = $db->prepare('UPDATE inventory SET equip = 0, equiplh = 0, equiprh = 0, keep = 1 WHERE charname= :charname AND equiplh = 1 and equip = 1');
					$stmt->execute(array(':charname' => $charname));
$stmt = $db->prepare('UPDATE inventory SET equip = 1, equiplh = 1, keep = 0 WHERE charname= :charname AND itemnumber = :equiplhnumber');
					$stmt->execute(array(':charname' => $charname, ':equiplhnumber' => $equiplhnumber));
}
if ($equiprhnumber!=0)
{
$stmt = $db->prepare('UPDATE inventory SET equip = 0, keep = 1 WHERE charname= :charname AND equip = 1 and itemtype = "Weapon" and duality = 0');
					$stmt->execute(array(':charname' => $charname));
$stmt = $db->prepare('UPDATE inventory SET equip = 0, equiprh = 0, equiplh = 0, keep = 1 WHERE charname= :charname AND equiprh = 1 and equip = 1');
					$stmt->execute(array(':charname' => $charname));
$stmt = $db->prepare('UPDATE inventory SET equip = 1, equiprh = 1, keep = 0 WHERE charname= :charname AND itemnumber = :equiprhnumber');
					$stmt->execute(array(':charname' => $charname, ':equiprhnumber' => $equiprhnumber));
}
echo "<table class=\"page\">";
//************display only types of items or all according to form**********
if (!$type)
{
$stmt = $db->prepare("SELECT * FROM inventory WHERE charname=:charname and keep>0 and itemtype != 'Food' ORDER BY equipable desc, itemtype desc, weapontype, itemlevel desc, itemrarity desc");
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
<table class=\"page\"><tr><td class=\"left\"><h3>Description:</h3></td><td class=\"left\">".$row['itemdescription'];
echo "</td></tr><tr><td class=\"left\"><h3>Item Type:</h3></td><td class=\"left\">".$row['itemtype']."</td></tr>";
if ($row['itemtype']=="Armor")
{
echo "<tr><td class=\"left\"><h3>Armor Type:</h3></td><td class=\"left\">".$row['armortype']."</td></tr>";
$defense=$row['armorbase']+$row['itemlevel'];
echo "<tr><td class=\"left\"><h3>Armor Rating:</h3></td><td class=\"left\">".$defense."</td></tr>";
}
if ($row['itemtype']=="Other")
{

echo "<tr><td class=\"left\"><h3>Other Type:</h3></td><td class=\"left\">".$row['othertype']."</td></tr>";

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

echo "<tr><td class=\"left\"><h3>Value:</h3></td><td class=\"left\">".$row['itemvalue']." Gold</td></tr>";

}
echo "</table>";
if ($row['readable']>0)
{

  echo "<table class=\"page\"><tr><td class=\"page\">";

  echo "<form name=\"read\" action=\"read.php?".time();

  echo "\" method=\"get\"><input class=\"invisible\" type=\"radio\" name=\"read\" checked=\"checked\" value=\"".$row['itemname'];

  echo "\"><br /><input type=\"submit\" value=\"Read\" class=\"small\"></form></td></tr></table>";

  }
if ($row['keylock']>0)
{

  echo "<table class=\"page\"><tr><td class=\"page\">";

  echo "<form name=\"read\" action=\"keylock.php?".time();

  echo "\" method=\"get\"><input class=\"invisible\" type=\"radio\" name=\"keylock\" checked=\"checked\" value=\"".$row['itemname'];

  echo "\"><input class=\"invisible\" type=\"radio\" name=\"itemnumber\" checked=\"checked\" value=\"".$row['itemnumber'];

  echo "\"><br /><input type=\"submit\" value=\"Unlock\" class=\"small\"></form></td></tr></table>";

  }
if ($row['keylock']==0 and $row['othertype']=="Container" and $row['itemname']!="Tinderbox")
{

  echo "<table class=\"page\"><tr><td class=\"page\">";

  echo "<form name=\"read\" action=\"open.php?".time();

  echo "\" method=\"get\"><input class=\"invisible\" type=\"radio\" name=\"keylock\" checked=\"checked\" value=\"".$row['itemname'];

  echo "\"><input class=\"invisible\" type=\"radio\" name=\"number\" checked=\"checked\" value=\"".$row['itemnumber'];

  echo "\"><br /><input type=\"submit\" value=\"Open\" class=\"small\"></form></td></tr></table>";

  }
if ($row['duality']>0)
{

echo "<table class=\"page\"><tr><td class=\"page\">";

echo "<form name=\"equiplh\" action=\"keep.php?".time();

  echo "\" method=\"get\"><input class=\"invisible\" type=\"radio\" name=\"equiplh\" checked=\"checked\" value=\"".$row['itemnumber'];

  echo "\"><br /><input type=\"submit\" value=\"Equip Left\" class=\"small\"></form></td><td class=\"page\"><form name=\"equiprh\" action=\"keep.php?".time();

  echo "\" method=\"get\"><input class=\"invisible\" type=\"radio\" name=\"equiprh\" checked=\"checked\" value=\"".$row['itemnumber'];

  echo "\"><br /><input type=\"submit\" value=\"Equip Right\" class=\"small\"></form></td></tr><tr><td class=\"page\" colspan=\"2\"><form name=\"trade\" action=\"keep.php?".time();

  echo "\" method=\"get\"><input class=\"invisible\" type=\"radio\" name=\"trade\" checked=\"checked\" value=\"".$row['itemnumber'];

  echo "\"><br /><input type=\"submit\" value=\"Trade\" class=\"small\"></form></td></tr></table>";

  }
//add flag equipable and criticalhit
if ($row['duality']==0 and $row['equipable']==1)
{

  echo "<table class=\"page\"><tr><td class=\"page\">";

  echo "<form name=\"equip\" action=\"keep.php?".time();

  echo "\" method=\"get\"><input class=\"invisible\" type=\"radio\" name=\"equip\" checked=\"checked\" value=\"".$row['itemnumber'];

  echo "\"><br /><input type=\"submit\" value=\"Equip\" class=\"small\"></form></td></tr><tr><td class=\"page\"><form name=\"trade\" action=\"keep.php?".time();

  echo "\" method=\"get\"><input class=\"invisible\" type=\"radio\" name=\"trade\" checked=\"checked\" value=\"".$row['itemnumber'];

  echo "\"><br /><input type=\"submit\" value=\"Trade\" class=\"small\"></form>";

  echo "</td></tr></table>";

  }
echo "</td></tr>";
}
echo "</table>";
}
else
{
$stmt = $db->prepare("SELECT * FROM inventory WHERE charname=:charname and keep>0 and itemtype = :type order by itemtype, weapontype, itemlevel desc, itemrarity");
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
<table class=\"page\"><tr><td class=\"left\"><h3>Description:</h3></td><td class=\"left\">".$row['itemdescription'];
echo "</td></tr><tr><td class=\"left\"><h3>Item Type:</h3></td><td class=\"left\">".$row['itemtype']."</td></tr>";
if ($row['itemtype']=="Armor")
{
echo "<tr><td class=\"left\"><h3>Armor Type:</h3></td><td class=\"left\">".$row['armortype']."</td></tr>";
$defense=$row['armorbase']+$row['itemlevel'];
echo "<tr><td class=\"left\"><h3>Armor Rating:</h3></td><td class=\"left\">".$defense."</td></tr>";
}
if ($row['itemtype']=="Other")
{
echo "<tr><td class=\"left\"><h3>Other Type:</h3></td><td class=\"left\">".$row['othertype']."</td></tr>";
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

echo "<tr><td class=\"left\"><h3>Value:</h3></td><td class=\"left\">".$row['itemvalue']." Gold</td></tr>";

}
echo "</table>";
if ($row['readable']>0)
{

  echo "<table class=\"page\"><tr><td class=\"page\">";

  echo "<form name=\"read\" action=\"read.php?".time();

  echo "\" method=\"get\"><input class=\"invisible\" type=\"radio\" name=\"read\" checked=\"checked\" value=\"".$row['itemname'];

  echo "\"><br /><input type=\"submit\" value=\"Read\" class=\"small\"></form></td></tr></table>";

  }
if ($row['keylock']>0)
{

  echo "<table class=\"page\"><tr><td class=\"page\">";

  echo "<form name=\"read\" action=\"keylock.php?".time();

  echo "\" method=\"get\"><input class=\"invisible\" type=\"radio\" name=\"keylock\" checked=\"checked\" value=\"".$row['itemname'];

  echo "\"><input class=\"invisible\" type=\"radio\" name=\"itemnumber\" checked=\"checked\" value=\"".$row['itemnumber'];

  echo "\"><br /><input type=\"submit\" value=\"Unlock\" class=\"small\"></form></td></tr></table>";

  }
if ($row['keylock']==0 and $row['othertype']=="Container" and $row['itemname']!="Tinderbox")
{

  echo "<table class=\"page\"><tr><td class=\"page\">";

  echo "<form name=\"read\" action=\"open.php?".time();

  echo "\" method=\"get\"><input class=\"invisible\" type=\"radio\" name=\"keylock\" checked=\"checked\" value=\"".$row['itemname'];

  echo "\"><input class=\"invisible\" type=\"radio\" name=\"number\" checked=\"checked\" value=\"".$row['itemnumber'];

  echo "\"><br /><input type=\"submit\" value=\"Open\" class=\"small\"></form></td></tr></table>";

  }
if ($row['duality']>0)
{

echo "<table class=\"page\"><tr><td class=\"page\">";

echo "<form name=\"equiplh\" action=\"keep.php?".time();

  echo "\" method=\"get\"><input class=\"invisible\" type=\"radio\" name=\"equiplh\" checked=\"checked\" value=\"".$row['itemnumber'];

  echo "\"><br /><input type=\"submit\" value=\"Equip Left\" class=\"small\"></form></td><td class=\"page\"><form name=\"equiprh\" action=\"keep.php?".time();

  echo "\" method=\"get\"><input class=\"invisible\" type=\"radio\" name=\"equiprh\" checked=\"checked\" value=\"".$row['itemnumber'];

  echo "\"><br /><input type=\"submit\" value=\"Equip Right\" class=\"small\"></form></td></tr><tr><td class=\"page\" colspan=\"2\"><form name=\"trade\" action=\"keep.php?".time();

  echo "\" method=\"get\"><input class=\"invisible\" type=\"radio\" name=\"trade\" checked=\"checked\" value=\"".$row['itemnumber'];

  echo "\"><br /><input type=\"submit\" value=\"Trade\" class=\"small\"></form></td></tr></table>";

  }
//add flag equipable and criticalhit
if ($row['duality']==0 and $row['equipable']==1)
{

  echo "<table class=\"page\"><tr><td class=\"page\">";

  echo "<form name=\"equip\" action=\"keep.php?".time();

  echo "\" method=\"get\"><input class=\"invisible\" type=\"radio\" name=\"equip\" checked=\"checked\" value=\"".$row['itemnumber'];

  echo "\"><br /><input type=\"submit\" value=\"Equip\" class=\"small\"></form></td></tr><tr><td class=\"page\"><form name=\"trade\" action=\"keep.php?".time();

  echo "\" method=\"get\"><input class=\"invisible\" type=\"radio\" name=\"trade\" checked=\"checked\" value=\"".$row['itemnumber'];

  echo "\"><br /><input type=\"submit\" value=\"Trade\" class=\"small\"></form>";

  echo "</td></tr></table>";

  }
echo "</td></tr>";
}
echo "</table>";
}
?>
<?php 
echo "</div></td><td class=\"page\" width=\"25%\"><div class=\"border1\"><table class=\"page\"><tr><td class=\"page\">";
 ?>
<?php

echo "<table class=\"page\"><tr><td class=\"center\"><img src=\"../images/inventory.png\" /><h2>Keep Pocket</h2>";

echo "</td></tr><tr><td class=\"center\"><form action=\"keep.php?";



echo time();

echo "\" method=\"post\"><input class=\"invisible\" type=\"radio\" name=\"type\" checked=\"checked\" value=\"Weapon\" /><input class=\"small\" type=\"submit\" value=\"Weapons\" /></form></td></tr><tr><td class=\"center\"><form action=\"keep.php?";



echo time();

echo "\" method=\"post\"><input class=\"invisible\" type=\"radio\" name=\"type\" checked=\"checked\" value=\"Armor\" /><input class=\"small\" type=\"submit\" value=\"Armor\" /></form></td></tr><tr><td class=\"center\"><form action=\"keep.php?";



echo time();

echo "\" method=\"post\"><input class=\"invisible\" type=\"radio\" name=\"type\" checked=\"checked\" value=\"Accessory\" /><input class=\"small\" type=\"submit\" value=\"Accessories\" /></form></td></tr><tr><td class=\"center\"><form action=\"keep.php?";



echo time();

echo "\" method=\"post\"><input class=\"invisible\" type=\"radio\" name=\"type\" checked=\"checked\" value=\"Other\" /><input class=\"small\" type=\"submit\" value=\"Other\" /></form></td></tr><tr><td class=\"page\"><br /></td></tr><tr><td class=\"center\"><form action=\"inventory.php?";



echo time();

echo "\" method=\"post\"><input class=\"small\" type=\"submit\" value=\"Back\" /></form></td></tr></table>";

?>
<?php
 echo "</td></tr></table></body></html>";
 ?>

