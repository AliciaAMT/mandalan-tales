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
$stmt = $db->prepare("SELECT keep FROM inventory WHERE charname=:charname and itemname='Firewood'");
				$stmt->execute(array(':charname' => $charname));
while($row = $stmt->fetch())
  {
  $firewood=$row['keep'];
}
$stmt = $db->prepare("SELECT keep FROM inventory WHERE charname=:charname and itemname='Tinderbox'");
				$stmt->execute(array(':charname' => $charname));
while($row = $stmt->fetch())
  {
  $tinderbox=$row['keep'];
}
$stmt = $db->prepare("SELECT firelit FROM flags WHERE charname=:charname");
				$stmt->execute(array(':charname' => $charname));
while($row = $stmt->fetch())
	{
echo "<h2>Fireplace</h2><br /><img src=\"images/fireplace.png\" border=\"0\" /><br /><br />";

if ($row['firelit']=='y')
{
echo "<img src=\"images/fire.png\" border=\"0\" /><br />Fire is lit. You may cook here or rest.<br /><br />";
}
//######################################add firewood and tinderbox code here
if ($firewood>0 and $tinderbox>0 and $row['firelit']!='y')
{
echo "<table class=\"page\"><tr><td class=\"page\">
<table class=\"page\"><tr><td class=\"page\"><a class=\"small\" href=\"lightfire.php?";

echo time();

echo "\">Light Fire</a></td></tr></table></td></tr></table><br />";
}
if ($row['homefireplace']==0)
{
echo "<table class=\"page\"><tr><td class=\"page\">
<table class=\"page\"><tr><td class=\"page\"><a class=\"small\" href=\"homemantle.php?";

echo time();

echo "\">Search Fireplace</a></td></tr></table>
</td></tr></table><br />";
}
if ($row['firelit']=='y')
{
echo "<table class=\"page\"><tr><td class=\"page\">";


echo "<table class=\"page\"><tr><td class=\"page\"><a class=\"small\" href=\"cook/cookbook.php?";

echo time();

echo "\">Cook</a>";

echo "</td></tr><tr><td class=\"page\">";


echo "<a class=\"small\" href=\"camp.php?";

echo time();

echo "\">Rest</a></td></tr></table></td></tr></table>";
}
if ($row['firelit']!='y')
{
echo "<table class=\"page\"><tr><td class=\"page\">Tip: If you light a fire you can cook or rest here. You need flint and firewood to light a fire.</td></tr><tr><td class=\"page\">";
echo "<table class=\"page\"><tr><td class=\"page\"><a class=\"small\" href=\"maingraphics.php?";

echo time();

echo "\">Back</a></td></tr></table></td></tr></table></td></tr></table>";
}
}
?>
</body></html>