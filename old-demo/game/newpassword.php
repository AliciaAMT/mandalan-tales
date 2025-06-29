<?php
//include config
require( $_SERVER['DOCUMENT_ROOT'] . '/game/includes/config2.php');
?>
<?php
$_SESSION['sessData'] = 'Choose New Password';
if(isset($_POST['resetSubmit']))
{
    $fp_code = '';
	$password = $user->password_hash($_POST['password'], PASSWORD_BCRYPT);
    if(!empty($_POST['password']) && !empty($_POST['confirm_password']) && !empty($_POST['fp_code']))
	{
        $fp_code = $_POST['fp_code'];
        //password and confirm password comparison
        if($_POST['password'] !== $_POST['confirm_password'])
		{
            $sessData = 'Confirm password must match with the password.'; 
        }
		else
		{
            //check whether identity code exists in the database
			
				$stmt = $db->prepare("SELECT * FROM accounts WHERE temporary=:temporary");
				$stmt->execute(array(':temporary' => $fp_code));
while($row = $stmt->fetch())
{
	
		$email = $row['email'];
		$username = $row['username'];
	
}
if (!$email)
{
   $sessData = 'You are not authorized to reset new password of this account.';
}
else
{
//update data with new password
$stmt = $db->prepare('UPDATE accounts SET password = :password WHERE email= :email');
	$stmt->execute(array(':password' => $password, ':email' => $email)); 
				
    if($stmt)
	{
                    $sessData = 'Your account password has been reset successfully. Please login with your new password.';
                }
		else
	{
                $sessData = 'Some problem occurred, please try again.';
            }
}
		}
	}
	else
	{
    $sessData = 'All fields are mandatory, please fill all the fields.'; 
    }
    //store reset password status into the session
    $_SESSION['sessData'] = $sessData;
    
	$redirectURL = 'resetpassword.php?fp_code='.$fp_code;
    //redirect to the login/reset pasword page
    header("Location:".$redirectURL);
	 die('This site works best with redirections turned on, but you may continue with them turned off. <a href="resetpassword.php">Continue</a>');
}
echo $_SESSION['sessData'];
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
<h2>Reset Your Account Password</h2>
        <form action="resetpassword.php" method="post">
            <input type="password" name="password" placeholder="PASSWORD" required="">
            <input type="password" name="confirm_password" placeholder="CONFIRM PASSWORD" required="">
            <div class="send-button">
                <input type="hidden" name="fp_code" value="<?php echo $_REQUEST['fp_code']; ?>"/>
                <input type="submit" name="resetSubmit" value="RESET PASSWORD">
            </div>
        </form>
    </body>
</html>