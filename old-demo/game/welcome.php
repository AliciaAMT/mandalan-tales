<?php
if (isset($_POST['mode']))
{
$mode = $_POST['mode'];
if ($mode == 1)
{ 
//*****************************************
$loc = 'Location: mandala.php?'.time();
header($loc);
die('This site works best with redirections turned on, but you may continue with them turned off. <a href="mandala.php">Continue</a>');
} 
if ($mode == 2)
{ 
//*****************************************
$loc = 'Location: mandalatext.php?'.time();
header($loc);
die('This site works best with redirections turned on, but you may continue with them turned off. <a href="mandalatext.php">Continue</a>');
} 
else {
			$message = 'Something went wrong. Please contact website administrator.';
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
<?php 
echo '
<body style="margin: 0; padding: 0;">';
include ('includes/banner.php');
?>
<table class="page">
<tr><td class="page"><table class="page">
<tr><td class="page">
<form action="welcome.php?<?php echo time(); ?>" method="post">
<select name="mode"><option value="1">Graphics Mode</option><option value="2">Text Mode</option></select>
<input class="small" type="submit" value="Select Mode" /></form>
</td></tr></table><tr><td class="page"><h2>Welcome!</h2></td></tr><tr><td class="left"><p>This is the portal to an online role-playing game (RPG) designed to be accessible for blind and visually impaired people. Graphics Mode is best for those who can see or use a magnifier, and Text Mode is best for those who are totally blind.</p><p>This game takes place in the fantasy land of Mandala. In Mandala you will find magic, weapons, armor, treasure, quests, and honour. Find your way back to your own world, and save another if you have the courage to enter...</p><p>Notice! This game is currently under development, hopefully to be part of a series called Mandalan Tales. Since the game is only a demo, it is totally free. Your character is continuously saved on the server, so you do not need to save your game, and if your internet browser crashes, your game will not be affected. Additions to the game are made continuously so check back often for updates. </p><p>

<b>Development News:</b>

<table class="border1"><tr><td class="border1"><b>12/17/2018</b></td><td class="border1">
It's been over 9 years since this has been updated. I have just begun rewriting the entire code from scratch to make use of newer code and to fix deprecated code. Hopefully a small working demo will be ready after the new year. Happy Holidays!
</td></tr><tr><td class="border1"><b>12/07/2009</b></td><td class="border1">Added some quests and rewrote the fight sequence to include backstabbing and bleeding among other things. Added skills, stats, and life/mana for levelling up. Changed level up schedule. Next will be Ishandar and the Goblin caves in Ishandar forest.I am focusing on graphics mode for now, then will convert files to text mode when I am done with Ishandar and the goblin caves.</td></tr><tr><td class="border1"><b>10/18/2009</b></td><td class="border1">There is a bug in Firefox that cuts off some forms, especially in battle when you die. I suggest using IE for now until the bug is fixed.</td></tr><tr><td class="border1"><b>10/17/2009</b></td><td class="border1">Fixed the Flee action in battle, fixed some text mode pages including Quest Journal and some other random bugs.</td></tr><tr><td class="border1"><b>10/14/2009</b></td><td class="border1">I am finding more and more bugs in the game, particularly in the fighting. Please bear with me. I should have fighting fixed in a week or so. As of right now you may only "Attack" the rat by the table downstairs. All other actions may not work.</td></tr><tr><td class="border1"><b>10/9/2009</b></td><td class="border1">My server was hacked resulting in making the game unplayable for new characters. This is now fixed. If you come across any other problems please email me at owner@mandalantales.info, thank you! You should be able to play inside the first house and fight the rat now, although skills may not work correctly yet. I am still updating the game.</td></tr><tr><td class="border1"><b>9/7/2009</b></td><td class="border1">Major update in the works. Changes made so that you can create one account based on your email, and with each account you may create up to 6 characters. These characters and your other friends in the game will be able to trade goods and interact. While the game will not be truly multiplayer, this will still foster a feeling of comradery amongst players. There will also be a major update to the database which will allow the server to funtion much faster resulting in faster page loads, especially during battle.</td></tr><tr><td class="border1"><b>7/24/2009:</b></td><td class="border1">Playable. You can roam your father's house, gather supplies, go into the cellar, and kill monsters. There are a few starter quests, and I am currently working on Ishadar Forest map and the Barn. I also need to make a major update for text mode.</td></tr></table> <br />Send questions or comments to aliciataylorguitar@gmail.com subject: Mandalan Tales</p></td></tr></table>
</body>
</html>