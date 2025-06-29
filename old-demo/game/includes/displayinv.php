<?php
echo "<br /><img src=\"../images/".$row['itemimage'].".png\" /><h5><b>".$row['itemname']."<br />Level ".$row['itemlevel']."<br />".$row['itemrarity'];
if ($row['keep']>1) {
echo "<br />Amount: ".$row['keep'];
}
//display enchantable, transmutable, or adjustable
if ($row['enchantment1']>0) {
echo "<br />Enchantable";
}
if ($row['transmute1']>0) {
echo "<br />Transmutable";
}
if ($row['adjustable']>0) {
echo "<br />Adjustable";
}
echo "</b></h5>
<h6 ><b>Description: ".$row['itemdescription'];
echo "</b></h6><table class=\"page\" style=\"font-size: 12px\">";
if ($row['itemtype']=="Armor") {
echo "<tr><td class=\"right\" style=\"width: 50%\"><h6 style=\"padding: 0px 0px 0px 0px; margin: 0px 0px 0px 0px;\"><b>Armor Type:</b></h6></td><td class=\"left\" style=\"width: 50%\"><b>".$row['equiplocation']."</b></td></tr>";
$defense=$row['armorbase']+$row['itemlevel'];
echo "<tr><td class=\"right\" style=\"width: 50%\"><h6 style=\"padding: 0px 0px 0px 0px; margin: 0px 0px 0px 0px;\"><b>Armor Rating:</b></h6></td><td class=\"left\" style=\"width: 50%\"><b>".$defense."</b></td></tr>";
}
if ($row['itemtype']=="Other") {
	echo "<tr><td class=\"right\"><h6 style=\"padding: 0px 0px 0px 0px; margin: 0px 0px 0px 0px;\"><b>Item Type: </b></h6></td><td class=\"left\"><b>".$row['othertype']."</b></td></tr>";
//*account for armor accessories
	$defense=$row['armorbase']+$row['itemlevel'];
if ($defense>0) {
echo "<tr><td class=\"right\"><h6 style=\"padding: 0px 0px 0px 0px; margin: 0px 0px 0px 0px;\"><b>Armor Rating:</b></h6></td><td class=\"left\"><b>".$defense."</b></td></tr>";
}

}
if ($row['itemtype']=="Weapon") {
echo "<tr><td class=\"right\" style=\"width: 50%\"><h6 style=\"padding: 0px 0px 0px 0px; margin: 0px 0px 0px 0px;\"><b>Item Type:</b></h6></td><td class=\"left\" style=\"width: 50%\"><b>".$row['itemtype']."</b></td></tr>";
echo "<tr><td class=\"right\" style=\"width: 50%\"><h6 style=\"padding: 0px 0px 0px 0px; margin: 0px 0px 0px 0px;\"><b>Weapon Type:</b></h6></td><td class=\"left\" style=\"width: 50%\"><b>".$row['weapontype']."</b></td></tr>";
echo "<tr><td class=\"right\" style=\"width: 50%\"><h6 style=\"padding: 0px 0px 0px 0px; margin: 0px 0px 0px 0px;\"><b>Range:</b></h6></td><td class=\"left\"><b>".$row['itemrange']."</b></td></tr>";
echo "<tr><td class=\"right\"><h6 style=\"padding: 0px 0px 0px 0px; margin: 0px 0px 0px 0px;\"><b>Speed:</b></h6></td><td class=\"left\"><b>".$row['itemspeed']."</b></td></tr>";
echo "<tr><td class=\"right\"><h6 style=\"padding: 0px 0px 0px 0px; margin: 0px 0px 0px 0px;\"><b>Dualwield:</b></h6></td><td class=\"left\">";
	if ($row['duality']==0)	{ 
	echo "<b>No</b></td></tr>";
	}
	if ($row['duality']>0) { 
	echo "<b>Yes</b></td></tr>";
	}
$damage=$row['weaponbase']+$row['itemlevel'];
echo "<tr><td class=\"right\"><h6 style=\"padding: 0px 0px 0px 0px; margin: 0px 0px 0px 0px;\"><b>Damage:</b></h6></td><td class=\"left\"><b>".$damage."</b></td></tr>";
if ($row['criticalhit']>0) {
echo "<tr><td class=\"right\"><h6 style=\"padding: 0px 0px 0px 0px; margin: 0px 0px 0px 0px;\"><b>Critical Hit:</b></h6></td><td class=\"left\"><b>+ ".$row['criticalhit']."</b></td></tr>";	
}
if ($row['sharpened']>0) {
	echo "<tr><td class=\"right\"><h6 style=\"padding: 0px 0px 0px 0px; margin: 0px 0px 0px 0px;\"><b>Sharpened:</b></h6></td><td class=\"left\"><b>+ ".$row['sharpened']."</b></td></tr>";
}
}
$lightsource = 0;
$lightsource = $row['lightsource'];
if ($lightsource>0) {
echo "<tr><td class=\"center\" colspan=\"2\"><h6 style=\"padding: 0px 0px 0px 0px; margin: 0px 0px 0px 0px;\"><b>Lightsource</b></h6></td></tr>";	
}
if ($row['enhancement1']!="None") {
	echo "<tr><td class=\"center\" colspan=\"2\"><h6><b>Enhancements</b></h6></td></tr><tr><td class=\"center\" colspan=\"2\"><b>".$row['enhancement1']."</b></td></tr>";
	}
if ($row['enhancement2']!="None") {
	echo "<tr><td class=\"center\" colspan=\"2\"><b>".$row['enhancement2']."</b></td></tr>";
	}
if ($row['enhancement3']!="None") {
	echo "<tr><td class=\"center\" colspan=\"2\"><b>".$row['enhancement3']."</b></td></tr>";
	}
if ($row['legendary']==1) {
	echo '<tr><td colspan="2"><h6><b>Legendary</b></h6></td></tr>';
}
if ($row['itemvalue']>0) {
echo "<tr><td class=\"right\"><h6 style=\"padding: 0px 0px 0px 0px; margin: 0px 0px 0px 0px;\"><b>Value:</b></h6></td><td class=\"left\"><b>".$row['itemvalue']." "." Gold</b></td></tr>";
}
echo '</table>';

if ($row['readable']>0) {
  echo "<form name=\"read\" action=\"read.php?".time();
  echo "\" method=\"post\"><input class=\"invisible\" type=\"radio\" name=\"read\" checked=\"checked\" value=\"".$row['itemname'];
  echo "\"><br /><input style=\"width: auto;\" type=\"submit\" value=\"Read\" class=\"small\"></form><br />";
  }
if ($row['keylock']>0) {
  echo "<form name=\"read\" action=\"keylock.php?".time();
  echo "\" method=\"post\"><input class=\"invisible\" type=\"radio\" name=\"keylock\" checked=\"checked\" value=\"".$row['itemname'];
  echo "\"><input class=\"invisible\" type=\"radio\" name=\"itemnumber\" checked=\"checked\" value=\"".$row['itemnumber'];
  echo "\"><br /><input style=\"width: auto;\" type=\"submit\" value=\"Unlock\" class=\"small\"></form><br />";
  }
if ($row['keylock']==0 and $row['othertype']=="Container" and $row['itemname']!="Tinderbox") {
  echo "<form name=\"read\" action=\"open.php?".time();
  echo "\" method=\"post\"><input class=\"invisible\" type=\"radio\" name=\"keylock\" checked=\"checked\" value=\"".$row['itemname'];
  echo "\"><input class=\"invisible\" type=\"radio\" name=\"number\" checked=\"checked\" value=\"".$row['itemnumber'];
  echo "\"><br /><input style=\"width: auto;\" type=\"submit\" value=\"Open\" class=\"small\"></form><br />";
  }
if ($row['duality']>0) {
echo "<table><tr><td class=\"center\" style=\"width: 50%\"><form name=\"equiplh\" action=\"inventory.php?".time();
  echo "\" method=\"post\"><input class=\"invisible\" type=\"radio\" name=\"equiplh\" checked=\"checked\" value=\"".$row['itemnumber'];
  echo "\"><input type=\"submit\" value=\"Equip Left\" class=\"small\"></form></td><td class=\"center\" style=\"width: 50%\"><form name=\"equiprh\" action=\"inventory.php?".time();
  echo "\" method=\"post\"><input class=\"invisible\" type=\"radio\" name=\"equiprh\" checked=\"checked\" value=\"".$row['itemnumber'];
  echo "\"><input type=\"submit\" value=\"Equip Right\" class=\"small\"></form></td></tr><tr><td class=\"center\" colspan=\"2\"><form name=\"trade\" action=\"inventory.php?".time();
  echo "\" method=\"post\"><input class=\"invisible\" type=\"radio\" name=\"trade\" checked=\"checked\" value=\"".$row['itemnumber'];
  echo "\"><input type=\"submit\" value=\"Trade\" class=\"small\"></form></td></tr></table>";
  }
//add flag equipable and criticalhit
if ($row['duality']==0 and $row['equipable']==1) {
  echo "<table><tr><td><form name=\"equip\" action=\"inventory.php?".time();
  echo "\" method=\"post\"><input class=\"invisible\" type=\"radio\" name=\"equip\" checked=\"checked\" value=\"".$row['itemnumber'];
  echo "\"><input type=\"submit\" value=\"Equip\" class=\"small\"></form></td></tr><tr><td><form name=\"trade\" action=\"inventory.php?".time();
  echo "\" method=\"post\"><input class=\"invisible\" type=\"radio\" name=\"trade\" checked=\"checked\" value=\"".$row['itemnumber'];
  echo "\"><input type=\"submit\" value=\"Trade\" class=\"small\"></form></td></tr></table>";
  }
echo "<hr />";
?>