<?php
//include config
require_once( $_SERVER['DOCUMENT_ROOT'] . '/game/includes/config2.php');
//if not logged in redirect to login page
if(!$user->is_logged_in()){ header('Location: login.php'); die('This site works best with redirections turned on, but you may continue with them turned off. <a href="login.php">Continue</a>');}
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

<script>
function openNav1() {
  document.getElementById("myNav1").style.height = "100%";
}

function closeNav1() {
  document.getElementById("myNav1").style.height = "0%";
}
function openNav2() {
  document.getElementById("myNav2").style.height = "100%";
}

function closeNav2() {
  document.getElementById("myNav2").style.height = "0%";
}
function openNav3() {
  document.getElementById("myNav3").style.height = "100%";
}

function closeNav3() {
  document.getElementById("myNav3").style.height = "0%";
}
</script>

</head>
<body style="margin: 0; padding: 0;">
<?php
include ('includes/banner.php');
?>
<!-- The overlay -->
<div id="myNav1" class="overlay">
  <!-- Button to close the overlay navigation -->
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav1()"> X </a>
  <!-- Overlay content -->
  <div class="overlay-content">
    <table>
<tr>
<td colspan="2"><b>Your character's race will slightly affect your starting attributes as follows:</b></td>
</tr><tr>
<td><b>Human</b></td><td>+5 Life, +25 Magicfind</td>
</tr><tr>
<td><b>Half-Elf</b></td><td>strength-3, speed+3, agility+3, accuracy+3, wisdom+3, life+2, fireresist+1, iceresist+1, lightresist+1, darkresist+1, poisonresist+1, earthresist+1, magicfind+10</td>
</tr><tr>
<td><b>Dark-Elf</b></td><td>strength-5, speed+5, agility+5, accuracy+5, wisdom+5, fireresist+2, iceresist+2, lightresist-5, darkresist+5, poisonresist+2</td>
</tr><tr>
<td><b>Light-Elf</b></td><td>strength-5, speed+5, agility+5, accuracy+5, wisdom+5, fireresist+2, iceresist+2, lightresist+5, darkresist-5, poisonresist+2</td>
</tr><tr>
<td><b>Wood-Elf</b></td><td>strength-5, speed+5, agility+5, accuracy+5, wisdom+5, fireresist+5, iceresist+5, lightresist+2, darkresist+2, poisonresist+2</td>
</tr><tr>
<td><b>Dwarf</b></td><td>life+10, speed-3, strength+5, agility-3, fireresist+3, criticalresist+3, bleedresist+3</td>
</tr><tr>
<td><b>Half-Giant</b></td><td>life+15, strength+7, speed-3, agility-5, holdresist+7, mindresist-5, wisdom-5</td>
</tr></table>

  </div>

</div>

<!-- The overlay -->
<div id="myNav2" class="overlay">
  <!-- Button to close the overlay navigation -->
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav2()"> X </a>
  <!-- Overlay content -->
  <div class="overlay-content">
    <table>
	<tr>
<td colspan="2">Your character's class will slightly affect your starting attributes as follows:</td>
</tr><tr>
<td>Knight</td><td>strength+7, accuracy+7, speed+2, criticalresist+5, skillpoints+7</td>
</tr><tr>
<td>Paladin</td><td>strength+5, accuracy+3, speed+1, criticalresist+5, skillpoints+3, wisdom+3, darkresist+5, mana+5</td>
</tr><tr>
<td>Ninja</td><td>strength+5, accuracy+5, speed+5, skillpoints+3, wisdom+2, agility+5, fireresist+5, iceresist+5</td>
</tr><tr>
<td>Mystic</td><td>wisdom+10, mindresist+10, lightresist+5, darkresist+5, skillpoints+5, mana+15, enchanting+25</td>
</tr><tr>
<td>Rogue</td><td>speed+7, accuracy+5, agility+7, wisdom+2, holdresist+5, skillpoints+5, lockpicking+25</td>
</tr><tr>
<td>Shaman</td><td>wisdom+10, fireresist+10, iceresist+10, skillpoints+3, mana+15, earthresist+10, alchemy+25</td></tr>
</table>
  </div>
</div>

<!-- The overlay -->
<div id="myNav3" class="overlay">
  <!-- Button to close the overlay navigation -->
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav3()">X</a>
  <!-- Overlay content -->
  <div class="overlay-content">
    <table><tr>
<td>Males and Females are equal in the land of Mandala.</td>
</tr>
</table>
  </div>
</div>

<table class="page">
<tr>
<td class="page"><h2>Character Creation</h2>
</td>
</tr>
<tr>
<td class="page">

<form action="charactercreated.php? <?php echo time(); ?>" method="post">
<table>
<tr>
<td class="left">
Name: 
</td>
<td class="left">
<input type="text" name="name" maxlength="15" />
</td>
</tr>
<tr><td class="left">Choose Race: </td><td class="left"><select name="race">
<option value="Human">Human</option>
<option value="Half-Elf">Half-Elf</option>
<option value="Dark-Elf">Dark-Elf</option>
<option value="Light-Elf">Light-Elf</option><option value="Wood-Elf">Wood-Elf</option><option value="Dwarf">Dwarf</option><option value="Half-Giant">Half-Giant</option>
</select> 

<!-- Use any element to open/show the overlay navigation menu -->
<span style="cursor:pointer" onclick="openNav1()">?</span>

</td></tr><tr><td class="left">Choose Primary Class: </td><td class="left"><select name="class">
<option value="Knight">Knight</option>
<option value="Paladin">Paladin</option>
<option value="Ninja">Ninja</option>
<option value="Rogue">Rogue</option>
<option value="Mystic">Mystic</option>
<option value="Shaman">Shaman</option>
</select> 
<!-- Use any element to open/show the overlay navigation menu -->
<span style="cursor:pointer" onclick="openNav2()">?</span>

</td></tr><tr><td class="left">Choose Gender: </td><td class="left"><select name="gender">
<option value="Male">Male</option>
<option value="Female">Female</option>
</select> <!-- Use any element to open/show the overlay navigation menu -->
<span style="cursor:pointer" onclick="openNav3()">?</span>
</td></tr>
<tr>
<td class="page" colspan="2">
<table class="page">
<tr><td class="border"><table class="page"><tr><td class="page"><img src="images/male1i.png" border="0" /></td></tr><td class="page"><input type="radio" name="portrait" value="male1"></td></tr></table></td><td class="border"><table class="page"><tr><td class="page"><img src="images/male2i.png" border="0" /></td></tr><tr><td class="page"><input type="radio" name="portrait" value="male2"></td></tr></table></td><td class="border"><table class="page"><tr><td class="page"><img src="images/male3i.png" border="0" /></td></tr><tr><td class="page"><input type="radio" name="portrait" value="male3"></td></tr></table></td><td class="border"><table class="page"><tr><td class="page"><img src="images/male4i.png" border="0" /></td></tr><tr><td class="page"><input type="radio" name="portrait" value="male4"></td></tr></table></td><td class="border"><table class="page"><tr><td class="page"><img src="images/male5i.png" border="0" /></td></tr><tr><td class="page"><input type="radio" name="portrait" value="male5"></td></tr></table>
</td></tr><tr><td class="border">
<table class="page">
<tr><td class="page"><img src="images/male6i.png" border="0" /></td></tr><td class="page"><input type="radio" name="portrait" value="male6"></td></tr></table></td><td class="border"><table class="page"><tr><td class="page"><img src="images/male7i.png" border="0" /></td></tr><tr><td class="page"><input type="radio" name="portrait" value="male7"></td></tr></table></td><td class="border"><table class="page"><tr><td class="page"><img src="images/male8i.png" border="0" /></td></tr><tr><td class="page"><input type="radio" name="portrait" value="male8"></td></tr></table></td><td class="border"><table class="page"><tr><td class="page"><img src="images/male9i.png" border="0" /></td></tr><tr><td class="page"><input type="radio" name="portrait" value="male9"></td></tr></table></td><td class="border"><table class="page"><tr><td class="page"><img src="images/male10i.png" border="0" /></td></tr><tr><td class="page"><input type="radio" name="portrait" value="male10"></td></tr></table></td></tr>
<tr><td class="border"><table class="page"><tr><td class="page"><img src="images/female1i.png" border="0" /></td></tr><td class="page"><input type="radio" name="portrait" value="female1"></td></tr></table></td><td class="border"><table class="page"><tr><td class="page"><img src="images/female2i.png" border="0" /></td></tr><tr><td class="page"><input type="radio" name="portrait" value="female2"></td></tr></table></td><td class="border"><table class="page"><tr><td class="page"><img src="images/female3i.png" border="0" /></td></tr><tr><td class="page"><input type="radio" name="portrait" value="female3"></td></tr></table></td><td class="border"><table class="page"><tr><td class="page"><img src="images/female4i.png" border="0" /></td></tr><tr><td class="page"><input type="radio" name="portrait" value="female4"></td></tr></table></td><td class="border"><table class="page"><tr><td class="page"><img src="images/female5i.png" border="0" /></td></tr><tr><td class="page"><input type="radio" name="portrait" value="female5"></td></tr></table>
</td></tr>
<tr><td class="border"><table class="page"><tr><td class="page"><img src="images/female6i.png" border="0" /></td></tr><td class="page"><input type="radio" name="portrait" value="female6"></td></tr></table></td><td class="border"><table class="page"><tr><td class="page"><img src="images/female7i.png" border="0" /></td></tr><tr><td class="page"><input type="radio" name="portrait" value="female7"></td></tr></table></td><td class="border"><table class="page"><tr><td class="page"><img src="images/female8i.png" border="0" /></td></tr><tr><td class="page"><input type="radio" name="portrait" value="female8"></td></tr></table></td><td class="border"><table class="page"><tr><td class="page"><img src="images/female9i.png" border="0" /></td></tr><tr><td class="page"><input type="radio" name="portrait" value="female9"></td></tr></table></td><td class="border"><table class="page"><tr><td class="page"><img src="images/female10i.png" border="0" /></td></tr><tr><td class="page"><input type="radio" name="portrait" value="female10"></td></tr></table></td></tr>
</td></tr></table></td></tr>
<tr><td class="center" colspan="2"><input class="small" type="submit" value="Create Character" /></td></tr></table>
</td></tr>
</table>
</form>
</td></tr>
<tr><td class="page">
<a href="mandala.php">Back</a>
</td></tr></table>
</td></tr></table>
</body>
</html>