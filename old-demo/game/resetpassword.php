<?php
//include config
require( $_SERVER['DOCUMENT_ROOT'] . '/game/includes/config2.php');
?>
<?php 
$sessData = 'Enter your email to reset your password.';

if(isset($_POST['forgotSubmit']))
{
    //check whether email is empty
    if(!empty($_POST['email']))
	{
        //check whether user exists in the database
		
		$email = strtolower($_POST['email']);
		$stmt = $db->prepare("SELECT * FROM accounts WHERE email=:email");
				$stmt->execute(array(':email' => $email));
while($row = $stmt->fetch())
{
	if (!$row['email'])
	{
		$sessData = 'Given email is not associated with any account.';
		$_SESSION['sessData'] = $sessData;
		//redirect to the forgot pasword page
	$loc = 'Location: resetpassword.php?'.time();
    header ($loc);
	 die('This site works best with redirections turned on, but you may continue with them turned off. <a href="resetpassword.php">Continue</a>');
	}
}
//generat unique string
$username = $row['username'];
            $uniqidStr = md5(uniqid(mt_rand()));;
            //update data with forgot pass code
			$stmt = $db->prepare('UPDATE accounts SET temporary = :uniqidStr WHERE email= :email');
					$stmt->execute(array(':uniqidStr' => $uniqidStr, ':email' => $email)); 
                $resetPassLink = 'http://www.theway417.org/game/newpassword.php?fp_code='.$uniqidStr;
                
                //get user details
                //$con['where'] = array('email'=>$_POST['email']);
                //$con['return_type'] = 'single';
                //$userDetails = $user->getRows($con);
                
                //send reset password email
                $to = $email;
                $subject = "Password Update Request";
                $mailContent = 'Dear '.$username.', 
                <br/>Recently a request was submitted to reset a password for your account. If this was a mistake, just ignore this email and nothing will happen.
                <br/>To reset your password, visit the following link: <a href="'.$resetPassLink.'">'.$resetPassLink.'</a>
                <br/><br/>Regards,
                <br/>Mandalan Tales';
                //set content-type header for sending HTML email
                $headers = "MIME-Version: 1.0" . "\r\n";
                $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
                //additional headers
                $headers .= 'From: Mandalan Tales<noreply@theway417.org>' . "\r\n";
                //send email
                mail($to,$subject,$mailContent,$headers);
                
                
                $sessData = 'Please check your e-mail, we have sent a password reset link to your registered email.';
    }
	else
	{
        $sessData = 'Enter email to recover password.'; 
    }
    //store reset password status into the session
    $_SESSION['sessData'] = $sessData;
    //redirect to the forgot pasword page
	$loc = 'Location: resetpassword.php?'.time();
    header ($loc);
	 die('This site works best with redirections turned on, but you may continue with them turned off. <a href="resetpassword.php">Continue</a>');
}
echo $sessData;
if ($_SESSION['sessData'])
{
	echo $_SESSION['sessData'];
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
<table><tr><td>
<form action="resetpassword.php" method="post">
            <input type="email" name="email" placeholder="EMAIL" required="">
            </td></tr><tr><td>
                <input class="small" type="submit" name="forgotSubmit" value="CONTINUE">
            
        </form>
		</td></tr><tr><td><a class="small" href="login.php">Back to Login</a></td></tr>
		</td></tr><tr><td><a class="small" href="mandala.php">Back to Main Menu</a></td></tr>
		</table>
		</body></html>