<?php
//include config
require( $_SERVER['DOCUMENT_ROOT'] . '/game/includes/config2.php');
//if not logged in redirect to login page
if(!$user->is_logged_in()){ header('Location: login.php'); die('This site works best with redirections turned on, but you may continue with them turned off. <a href="login.php">Continue</a>');}
$username = $_SESSION['username'];
$charname = $_SESSION['charname'];
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
</head>
<body>
<?php
//******************getstats inv*******************
include ('includes/getstats.php');
//***************getflags*****************************
include ('includes/getflags.php');
//******************get charstats************************
include ('includes/getcharstats.php');
//include ('php/getlockpick.php');
$lockpick=0;
$stmt = $db->prepare("SELECT keep FROM inventory WHERE charname=:charname and itemname='Lockpick'");
				$stmt->execute(array(':charname' => $charname));
while($row = $stmt->fetch())
  {
  $lockpick=$lockpick+$row['keep'];
}
$lockpicking=$lockpicking+$blockpicking+$level+$luck+$bluck+$bthieving;
if ($lockpick<1)
{
	
die ("<table class=\"page\"><tr><td class=\"center\">You do not have a lockpick.</td></tr></table><br /><table class=\"page\"><tr><td class=\"page\">
<a class=\"small\" href
=\"maingraphics.php?".time()."\">Back to Map</a></td></tr></table></td></tr></table></body></html>");
}
if ($map=="home" and $xaxis==3 and $yaxis==1)
{
$rand=mt_rand(1,20);
if($lockpicking<$rand)
{
$stmt = $db->prepare('UPDATE inventory SET keep=keep-1 WHERE charname = :charname and itemname="Lockpick"');
					$stmt->execute(array(':charname' => $charname)); 	

echo "<table class=\"page\"><tr><td class=\"center\"><img src=\"images/lockpick.png\" /></td></tr>";
echo "<tr><td class=\"center\">";
echo "You attempt to pick the lock, but your lockpick broke.";
echo "</td></tr>";

echo "<tr><td class=\"center\">";

echo "<table class=\"page\"><tr><td class=\"page\"><a class=\"small\" href=\"picklock.php?".time();
echo "\">Try Again</a></td></tr></table>";
  
echo "</td></tr></table>";

}

else

{
        
  echo "<table class=\"page\"><tr><td class=\"center\" colspan=\"2\"><h3>You unlock the chest...</h3></td></tr><tr><td class=\"left\"><h3>Found:</h3></td><td class=\"center\"><img src=\"images/familycrest.png\" /><br />Family Crest Amulet</td></tr><tr><td class=\"left\"><h3>Experience:</h3></td><td class=\"left\"><h3>+5</h3></td></tr><tr><td class=\"left\"><h3>Quest Updated:</h3></td><td class=\"left\"><h3>\"The Family Crest Quest\"</h3></td></tr></table><br /><table class=\"page\"><tr><td class=\"page\"><a class=\"small\" href=\"maingraphics.php?";

echo time();

echo "\">Back to Map</a></td></tr></table>";
$stmt = $db->prepare('UPDATE flags SET homechest=1 WHERE charname = :charname');
					$stmt->execute(array(':charname' => $charname)); 
$stmt = $db->prepare('UPDATE charstats SET experience=experience+5 WHERE charname = :charname');
					$stmt->execute(array(':charname' => $charname)); 
$stmt = $db->prepare('UPDATE flags SET quest4=1 WHERE charname = :charname');
					$stmt->execute(array(':charname' => $charname));   

include ('includes/zeroinv.php');
$itemname="Family Crest Amulet";
$itemdescription="This Family Crest Amulet is decorated with precious gems and a carving of a dragon. It has a mystical glow and you can feel the magic radiating from it.";
$itemtype="Accessory";
$itemimage="familycrest";
$itemlevel=1;
$itemrarity="Relic";
$itemvalue=10000;
$keep=1;
$trade=0;
$equiplocation="Neck";
$equipable=1;
$acctype="Amulet";
$accbase=1;
$legendary=1;
$relic=1;
$defense=1;
$lightsource=1;
include ('includes/addinv.php');
$stmt = $db->prepare('UPDATE flags SET familycrest=1 WHERE charname = :charname');
					$stmt->execute(array(':charname' => $charname));  
}
  }
?>
</body></html>