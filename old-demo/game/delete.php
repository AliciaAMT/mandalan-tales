<?php
//include config
require( $_SERVER['DOCUMENT_ROOT'] . '/game/includes/config2.php');
//if not logged in redirect to login page
if(!$user->is_logged_in()){ header('Location: login.php');  die('This site works best with redirections turned on, but you may continue with them turned off. <a href="login.php">Continue</a>');}
$username = $_SESSION['username'];
?>
<?php
$charname=strip_tags($_POST['charname']);

$stmt5 = $db->prepare('delete FROM charstats WHERE charname = :charname;');
				$stmt5->execute(array(':charname' => $charname));
$stmt5 = $db->prepare('delete FROM cookbook WHERE charname = :charname;');
				$stmt5->execute(array(':charname' => $charname));				
$stmt5 = $db->prepare('delete FROM counters WHERE charname = :charname;');
				$stmt5->execute(array(':charname' => $charname));	
$stmt5 = $db->prepare('delete FROM enemy WHERE charname = :charname;');
				$stmt5->execute(array(':charname' => $charname));
$stmt5 = $db->prepare('delete FROM flags WHERE charname = :charname;');
				$stmt5->execute(array(':charname' => $charname));
$stmt5 = $db->prepare('delete FROM inventory WHERE charname = :charname;');
				$stmt5->execute(array(':charname' => $charname));
$stmt5 = $db->prepare('delete FROM skills WHERE charname = :charname;');
				$stmt5->execute(array(':charname' => $charname));
$stmt5 = $db->prepare('delete FROM spellbook WHERE charname = :charname;');
				$stmt5->execute(array(':charname' => $charname));

$stmt = $db->prepare("SELECT * FROM accounts WHERE username=:username;");
				$stmt->execute(array(':username' => $username));
				$row = $stmt->fetch();


$char1 = $row["char1"];$char2 = $row["char2"];$char3 = $row["char3"];$char4 = $row["char4"];$char5 = $row["char5"];$char6 = $row["char6"];
?>
<?php
$stmt3 = $db->prepare('UPDATE accounts SET char1 = "None" WHERE char1 = :charname and username = :username') ;
					$stmt3->execute(array(
						':charname' => $charname,
						':username' => $username
					));

if ($charname==$char1)
{

$stmt2 = $db->prepare('UPDATE accounts SET char1 = "None" WHERE char1 = :charname and username = :username') ;
					$stmt2->execute(array(
						':charname' => $charname,
						':username' => $username
					));
}
else
{
if ($charname==$char2)
{

$stmt2 = $db->prepare('UPDATE accounts SET char2 = "None" WHERE char2 = :char2 and username = :username') ;
					$stmt2->execute(array(
						':char2' => $char2,
						':username' => $username
					));
}
else
{

if ($charname==$char3)
{

$stmt2 = $db->prepare('UPDATE accounts SET char3 = "None" WHERE char3 = :char3 and username = :username') ;
					$stmt2->execute(array(
						':char3' => $char3,
						':username' => $username
					));
}

else
{
if ($charname==$char4)
{
$stmt2 = $db->prepare('UPDATE accounts SET char4 = "None" WHERE char4 = :char4 and username = :username') ;
					$stmt2->execute(array(
						':char4' => $char4,
						':username' => $username
					));
}

else
{
if ($charname==$char5)
{

$stmt2 = $db->prepare('UPDATE accounts SET char5 = "None" WHERE char5 = :char5 and username = :username') ;
					$stmt2->execute(array(
						':char5' => $char5,
						':username' => $username
					));
}
else
{
if ($charname==$char6)
{

$stmt2 = $db->prepare('UPDATE accounts SET char6 = "None" WHERE char6 = :char6 and username = :username') ;
					$stmt2->execute(array(
						':char6' => $char6,
						':username' => $username
					));
}
}
}
}
}
}

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
echo "<table class=\"page\"><tr><td class=\"page\"><b>".$charname." has been deleted!</b>";
echo "<table class=\"page\"><tr><td class=\"page\"><form action=\"choosecharacterg.php?";
echo time();
echo "\" method=\"post\"><input class=\"small\" type=\"submit\" value=\"Ok\" /></form></td></tr></table></td></tr></table>";
?>
</body></html>