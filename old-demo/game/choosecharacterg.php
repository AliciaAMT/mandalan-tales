<?php
//include config
require( $_SERVER['DOCUMENT_ROOT'] . '/game/includes/config2.php');
//if not logged in redirect to login page
if(!$user->is_logged_in()){ header('Location: login.php'); 
die('This site works best with redirections turned on, but you may continue with them turned off. <a href="login.php">Continue</a>');
}
?>
<?php
$username = $_SESSION['username'];
	//process login form if submitted
	if(isset($_POST['submit'])){
		$charname = trim($_POST['charname']);
		$user->loginchar($charname);
			//logged in return to index page
			header('Location: startgame.php');
			die('This site works best with redirections turned on, but you may continue with them turned off. <a href="startgame.php">Continue</a>');
	}//end if submit
	if(isset($message)){ echo $message; }
	$stmt = $db->prepare("SELECT * FROM accounts WHERE username=:username;");
				$stmt->execute(array(':username' => $username));
				$row = $stmt->fetch();
$char1 = $row["char1"];$char2 = $row["char2"];$char3 = $row["char3"];$char4 = $row["char4"];$char5 = $row["char5"];$char6 = $row["char6"];
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
echo 'Welcome '.$username;
echo "<table class=\"page\"><tr><td class=\"border\"><form action=\"startgame.php?";
echo time();
echo "\" method=\"post\"><table><tr><td class=\"page\" colspan=\"2\"><h2>Choose a Character</h2></td></tr><tr><td class=\"left\">Mode: </td><td class=\"left\"><select name=\"mode\"><option value=\"1\">Single Player</option><option value=\"2\">Single Player w/Chat</option></select></td></tr><tr><td class=\"left\">Character: </td><td class=\"left\"><select name=\"charname\"><option value=\"";

echo $char1;

echo "\">";
echo $char1;
echo "</option><option value=\"";

echo $char2;

echo "\">";
echo $char2;
echo "</option>

<option value=\"";

echo $char3;

echo "\">";
echo $char3;
echo "</option>

<option value=\"";

echo $char4;

echo "\">";
echo $char4;
echo "</option>

<option value=\"";

echo $char5;

echo "\">";
echo $char5;
echo "</option>

<option value=\"";

echo $char6;

echo "\">";
echo $char6;
echo "</option>

</select>

</td>

</tr>
<tr>

<td class=\"page\" colspan=\"2\">

<input class=\"small\" type=\"submit\" value=\"Play\" />

</td>

</tr>

</table>

</form>
</td></tr>
<tr><td class=\"page\">
<a class=\"small\" href=\"createcharacter.php\">Create New Character</a>
</td></tr>
<tr><td class=\"page\">
<a class=\"small\" href=\"deletecharacter.php\">Delete Character</a>
<tr><td class=\"page\">
<a href=\"mandala.php?";
echo time();
echo "\">Back</a>
</td></tr>
<tr><td class=\"page\">
<a href=\"logout.php?";
echo time();
echo "\">Logout</a>
</td></tr>
</table>
</body>
</html>";
?>