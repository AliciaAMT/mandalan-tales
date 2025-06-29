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
echo "</b></h5><table class=\"page\" style=\"font-size: 12px\">";
if ($row['itemtype']=="Armor") {

$defense=$row['armorbase']+$row['itemlevel'];
echo "<tr><td class=\"right\" style=\"width: 50%\"><h6 style=\"padding: 0px 0px 0px 0px; margin: 0px 0px 0px 0px;\"><b>Armor Rating:</b></h6></td><td class=\"left\" style=\"width: 50%\"><b>".$defense."</b></td></tr>";
}
if ($row['itemtype']=="Other") {
	
//*account for armor accessories
	$defense=$row['armorbase']+$row['itemlevel'];
if ($defense>0) {
echo "<tr><td class=\"right\"><h6 style=\"padding: 0px 0px 0px 0px; margin: 0px 0px 0px 0px;\"><b>Armor Rating:</b></h6></td><td class=\"left\"><b>".$defense."</b></td></tr>";
}

}
if ($row['itemtype']=="Weapon") {
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

?>