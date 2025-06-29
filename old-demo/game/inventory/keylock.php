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
<body>
<?php
$keylock=strip_tags($_POST["keylock"]);
$stmt = $db->prepare("SELECT itemname FROM inventory WHERE charname=:charname");
				$stmt->execute(array(':charname' => $charname));
while($row = $stmt->fetch())
  {
	  if($row['itemname']='Small Rusty Key')
	  {$thehiddenkey=3;}
  }
if ($keylock=='Locked Box' and $thehiddenkey==3)
{

echo "<table class=\"page\"><tr><td class=\"center\"><h3>Unlock Box</h3></td></tr><tr><td class=\"left\">You unlock the box with the key and find:</td><td class=\"center\"><img src=\"../images/sharpdagger.png\" /><br />Sharpened Bone Dagger</td></tr><tr><td class=\"left\"><h3>Experience:</h3></td><td class=\"left\"><h3>+5</h3></td></tr><tr><td class=\"left\"><h3>Quest Completed:</h3></td><td class=\"left\"><h3>\"The Hidden Key Quest\"</h3></td></tr></table>";


include ('../includes/zeroinv.php');
$itemname="Sharp Bone Dagger";
$itemdescription="This dagger appears to be particularly deadly.";
$itemtype="Weapon";
$itemimage="sharpdagger";
$itemlevel=1;
$itemrarity="Relic";
$keep=1;
$equiplocation="Weapon";
$equipable=1;
$weapontype="Dagger";
$relic=1;
$criticalhit=25;
$duality=1;
$sharpened=2;
$itemrange=0;
$itemspeed=20;
$weaponbase=4;
$itemvalue=3*$itemlevel*5;
$damage = ($weaponbase * $itemlevel) + $sharpened;
include ('../includes/addinv.php');
$stmt = $db->prepare('UPDATE inventory SET keep = 0 where  itemname = "Small Rusty Key" and charname = :charname') ;
					$stmt->execute(array(':charname' => $charname));
$stmt = $db->prepare('UPDATE inventory SET keep = 0 where  itemname = "Locked Box" and charname = :charname') ;
					$stmt->execute(array(':charname' => $charname));
$stmt = $db->prepare('UPDATE flags SET thehiddenkey = 4 where charname = :charname') ;
					$stmt->execute(array(':charname' => $charname));
echo "</td></tr><tr><td class=\"center\"><table class=\"page\"><tr><td class=\"page\">";
}
if ($keylock=="Locked Box" and $thehiddenkey!=3)
{
echo "<table class=\"page\"><tr><td class=\"center\"><h3>Unlock Box</h3></td></tr><tr><td class=\"left\">You do not have the appropriate key. You cannot unlock the box at this time.</td></tr></table>";
}
echo "<a style=\"width: auto;\" class=\"small\" href=\"inventory.php?";
echo time();
echo "\">Back to Inventory</a></td></tr><tr><td class=\"page\">";
echo "<a style=\"width: auto;\" class=\"small\" href=\"../maingraphics.php?";
echo time();
echo "\">Back to Map</a>";
echo "</td></tr></table></td></tr></table>";
?>
</body></html>