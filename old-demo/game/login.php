<?php
//include config
require( $_SERVER['DOCUMENT_ROOT'] . '/game/includes/config2.php');
//check if already logged in
if( $user->is_logged_in() ){ header('Location: choosecharacterg.php'); 
die('This site works best with redirections turned on, but you may continue with them turned off. <a href="choosecharacterg.php">Continue</a>');
} 
?>
<?php
	//process login form if submitted
	if(isset($_POST['submit'])){
		$username = trim($_POST['username']);
		$password = trim($_POST['password']);
		if($user->login($username,$password)){ 
			//logged in return to index page
			header('Location: choosecharacterg.php');
			die('This site works best with redirections turned on, but you may continue with them turned off. <a href="choosecharacterg.php">Continue</a>');
		} else {
			$message = '<p class="error">Wrong username or password</p>';
		}
	}//end if submit
	if(isset($message)){ echo $message; }
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
<div id="login">
<table><tr><td>
	<form action="" method="post">
	<p><label>Username</label><input type="text" name="username" value=""  /></p>
	<p><label>Password</label><input type="password" name="password" value=""  /><br /><a href="resetpassword.php"><small>Reset Password</small></a></p>
	<p><label></label><input class="small" type="submit" name="submit" value="Login"  /></p>
	</form>
</td></tr><tr><td><a class="small" href="mandala.php">Back</a></td></tr></table>
</div>
</body>
</html>