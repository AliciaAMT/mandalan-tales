<?php
//include config
require_once( $_SERVER['DOCUMENT_ROOT'] . '/game/includes/config2.php');


//check if already logged in
if( $user->is_logged_in() ){ header('Location: index1.php'); } 
?>
<?php include( $_SERVER['DOCUMENT_ROOT'] . '/game/includes/head.php'); ?>
<?php include( $_SERVER['DOCUMENT_ROOT'] . '/game/includes/menu.php'); ?>

<div id="login">

	<?php

	//process login form if submitted
	if(isset($_POST['submit'])){

		$username = trim($_POST['username']);
		$password = trim($_POST['password']);
		
		if($user->login($username,$password)){ 

			//logged in return to index page
			header('Location: index.php');
			exit;
		

		} else {
			$message = '<p class="error">Wrong username or password</p>';
		}

	}//end if submit

	if(isset($message)){ echo $message; }
	?>

	<form action="" method="post">
	<p><label>Username</label><input type="text" name="username" value=""  /></p>
	<p><label>Password</label><input type="password" name="password" value=""  /></p>
	<p><label></label><input type="submit" name="submit" value="Login"  /></p>
	</form>

</div>
<?php include( $_SERVER['DOCUMENT_ROOT'] . '/game/includes/about.php'); ?>
<?php include( $_SERVER['DOCUMENT_ROOT'] . '/game/includes/foot.php'); ?>

