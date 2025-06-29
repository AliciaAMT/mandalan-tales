<?php 
require( $_SERVER['DOCUMENT_ROOT'] . '/game/includes/config2.php');
?>
<?php
//if form has been submitted process it
	if(isset($_POST['submit'])){
		//collect form data
		extract($_POST);
		//very basic validation
		if($username ==''){
			$error[] = 'Please enter the username.';
		}
		if($password ==''){
			$error[] = 'Please enter the password.';
		}
		if($passwordConfirm ==''){
			$error[] = 'Please confirm the password.';
		}
		if($password != $passwordConfirm){
			$error[] = 'Passwords do not match.';
		}
		if($email ==''){
			$error[] = 'Please enter the email address.';
		}
			strtolower($email);
		//**********add more validation if email syntax correct*********
		$stmt = $db->prepare("SELECT * FROM accounts WHERE email=:email");
				$stmt->execute(array(':email' => $email));
while($row = $stmt->fetch())
{
	//validate email copy
	if ($row['email'] = $email)	{
		$error[] = 'This email has already been registered. You can recover your password at the login page.';
	}
}
$stmt = $db->prepare("SELECT * FROM accounts WHERE username=:username");
				$stmt->execute(array(':username' => $username));
while($row = $stmt->fetch())
{
	//validate username copy
	if ($row['username'] = $username)
	{
		$error[] = 'This username has already been registered. Choose another.';
	}
}		
	if(!isset($error)){
	$hashedpassword = $user->password_hash($_POST['password'], PASSWORD_BCRYPT);
		try {
			//insert into database
			$stmt = $db->prepare('INSERT INTO accounts (username,password,email) VALUES (:username, :password, :email)') ;
				$stmt->execute(array(
					':username' => $username,
					':password' => $hashedpassword,
					':email' => $email
				));
$to = "aliciataylorguitar@gmail.com";
 $subject = $email;
 mail($to, $subject, $email);echo "Email: ";
				//redirect to index page
				header('Location: accountresult.php?action=added');
				die('This site works best with redirections turned on, but you may continue with them turned off. <a href="accountresult.php?action=added">Continue</a>');
			} catch(PDOException $e) {
			    echo $e->getMessage();
			}
		}
	}
	//check for any errors
	if(isset($error)){
		foreach($error as $error){
			echo '<p class="error">'.$error.'</p>';
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
<table class="page">
<tr><td class="page">
<div id="wrapper">
<h2>New Account Creation</h2>

	<form action='' method='post'>
		<p><label>Username</label><br />
		<input type='text' name='username' value='<?php if(isset($error)){ echo $_POST['username'];}?>'></p>
		<p><label>Password</label><br />
		<input type='password' name='password' value='<?php if(isset($error)){ echo $_POST['password'];}?>'></p>
		<p><label>Confirm Password</label><br />
		<input type='password' name='passwordConfirm' value='<?php if(isset($error)){ echo $_POST['passwordConfirm'];}?>'></p>
		<p><label>Email</label><br />
		<input type='text' name='email' value='<?php if(isset($error)){ echo $_POST['email'];}?>'></p>
		<p><input class="small" type='submit' name='submit' value='Add User'></p>
	</form>
<a class="small" href="mandala.php">Back</a>
</div>
</td></tr></table>
</body>
</html>