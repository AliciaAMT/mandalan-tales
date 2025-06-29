<?php
//include config
require( $_SERVER['DOCUMENT_ROOT'] . '/game/includes/config2.php');
//if not logged in redirect to login page
if(!$user->is_logged_in()){ header('Location: login.php');  die('This site works best with redirections turned on, but you may continue with them turned off. <a href="login.php">Continue</a>');}
$username = $_SESSION['username'];
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
<body style="margin: 0; padding: 0;">
<?php
include ('includes/banner.php');
?>
<?php



echo "<table class=\"page\"><tr><td class=\"page\"><b>Warning!</b><br />Are you sure you want to delete a character? You will lose it forever!<br />";

echo "<table class=\"page\"><tr><td class=\"page\"><form action=\"deletechoose.php?";
echo time();
echo "\" method=\"post\"><input class=\"small\" type=\"submit\" value=\"Yes\" /></form>";

echo "</td></tr><tr><td class=\"page\"><form action=\"choosecharacter1.php?";
echo time();
echo "\" method=\"post\">";
echo "<input class=\"small\" type=\"submit\" value=\"No\" /></form></td></tr></table></td></tr></table>
</body></html>

";
?>

