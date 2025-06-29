<?php
//include config
require( $_SERVER['DOCUMENT_ROOT'] . '/game/includes/config2.php');
//if not logged in redirect to login page
if(!$user->is_logged_in()){ header('Location: login.php'); die('This site works best with redirections turned on, but you may continue with them turned off. <a href="login.php">Continue</a>'); }
$username = $_SESSION['username'];
$charname= $_SESSION['charname'];
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
$stmt = $db->prepare("SELECT homefireplace FROM flags WHERE charname=:charname");
				$stmt->execute(array(':charname' => $charname));
while($row = $stmt->fetch())
	{
echo "<table class=\"page\"><tr><td class=\"center\" colspan=\"2\"><h3>You Search the Fireplace...</h3></td></tr>";
if ($row['homefireplace']==1)
  {
echo "<tr><td class=\"page\" colspan=\"2\">Nothing Here</td></tr><tr><td class=\"center\"><table class=\"page\"><tr><td class=\"page\" colspan=\"2\">

<a class=\"small\" href=\"maingraphics.php?";
echo time();
echo "\">Back to Map</a></td></tr></table></td></tr></table";
}
if ($row['homefireplace']==0)
  {
$stmt = $db->prepare('UPDATE flags SET homefireplace=1 WHERE charname = :charname');
					$stmt->execute(array(':charname' => $charname));  
$stmt = $db->prepare('UPDATE charstats SET experience=experience+10 WHERE charname = :charname');
					$stmt->execute(array(':charname' => $charname));    
include ('includes/zeroinv.php');
$itemname="Tinderbox";
$itemdescription="This tinderbox contains items to start a fire including flint and tinder.";
$itemtype="Other";
$itemimage="tinderbox";
$itemlevel=1;
$itemrarity="Common";
$itemvalue=0;
$keep=1;
$othertype="Container";
include ('includes/addinv.php');
include ('includes/getitems.php');
if ($firewood==0)
{
include ('includes/zeroinv.php');	
$itemname="Firewood";
$itemdescription="With firewood and flint you can start a fire in the proper area such as a fireplace or campsite.";
$itemtype="Other";
$itemimage="firewood";
$itemlevel=1;
$itemrarity="Common";
$itemvalue=0;
$keep=3;
$othertype="Firewood";
include ('includes/addinv.php');
}

else
{
	$stmt = $db->prepare('UPDATE inventory SET keep=keep+3 WHERE charname = :charname and itemname="Firewood"');
					$stmt->execute(array(':charname' => $charname));  
}
echo "</td></tr><tr><td class=\"left\"><h3>Found:</h3></td><td class=\"center\"><img src=\"images/tinderbox.png\" /><br />Tinderbox</td></tr><tr><td class=\"left\"><h3>Found:</h3></td><td class=\"center\"><img src=\"images/firewood.png\" /><br />Firewood x3</td></tr><tr><td class=\"left\"><h3>Experience:</h3></td><td class=\"left\"><h3>+10</h3></td></tr></table><br /><table class=\"page\"><tr><td class=\"page\">
<a class=\"small\" href=\"maingraphics.php?";
echo time();
echo "\">Back to Map</a></td></tr></table>";
}
}
?>
</body></html>