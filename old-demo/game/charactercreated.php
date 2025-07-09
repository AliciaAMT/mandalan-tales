<?php
//include config
require( $_SERVER['DOCUMENT_ROOT'] . '/game/includes/config2.php');
//if not logged in redirect to login page
if(!$user->is_logged_in()){ header('Location: login.php'); die('This site works best with redirections turned on, but you may continue with them turned off. <a href="login.php">Continue</a>');}
$username = $_SESSION['username'];
?>
<?php
$charname=strip_tags($_POST["name"]);
$portrait=strip_tags($_POST["portrait"]);
$race=strip_tags($_POST["race"]);
$mclass=strip_tags($_POST["class"]);
$gender=strip_tags($_POST["gender"]);
//sanitize
if (!$charname)
{
die ("You must choose a Name!<br /><form action=\"createcharacter.php\" method=\"post\"><input type=\"submit\" class=\"small\" value=\"Create Character\" /></form>");
}
if (!$portrait)
{
die ("You must choose a Portrait!<br /><form action=\"createcharacter.php\" method=\"post\"><input type=\"submit\" class=\"small\" value=\"Create Character\" /></form>");
}
$life=50;
$maxlife=50;
$mana=30;
$maxmana=30;
$speed=mt_rand(10,15);
$accuracy=mt_rand(10,15);
$strength=mt_rand(10,15);
$agility=mt_rand(10,15);
$wisdom=mt_rand(10,15);
$fireresist=mt_rand(0,10);
$iceresist=mt_rand(0,10);
$airresist=mt_rand(0,10);
$lightresist=mt_rand(0,10);
$darkresist=mt_rand(0,10);
$poisonresist=mt_rand(0,10);
$mindresist=mt_rand(0,10);
$holdresist=mt_rand(0,10);
$criticalresist=mt_rand(0,10);
$bleedresist=mt_rand(0,10);
$skillpoints=5;
$earthresist=mt_rand(0,10);
$luck=mt_rand(10,15);
$magicfind=0;
$lockpicking=0;
$cooking=mt_rand(0,10);
$alchemy=0;
$enchanting=0;
//add stat bonuses according to class and race
if ($mclass=="Knight")
{
$strength=$strength+7;
$accuracy=$accuracy+7;
$speed=$speed+2;
$criticalresist=$criticalresist+5;
$skillpoints=$skillpoints+7;
}
if ($mclass=="Paladin")
{
$strength=$strength+5;
$accuracy=$accuracy+3;
$speed=$speed+1;
$criticalresist=$criticalresist+5;
$skillpoints=$skillpoints+3;
$wisdom=$wisdom+3;
$darkresist=$darkresist+5;
$mana=$mana+5;
$maxmana=$maxmana+5;
}
if ($mclass=="Ninja")
{
$strength=$strength+5;
$accuracy=$accuracy+5;
$speed=$speed+5;
$skillpoints=$skillpoints+5;
$wisdom=$wisdom+2;
$agility=$agility+5;
$fireresist=$fireresist+5;
$iceresist=$iceresist+5;
}
if ($mclass=="Mystic")
{
$wisdom=$wisdom+10;
$mindresist=$mindresist+10;
$lightresist=$lightresist+5;
$darkresist=$darkresist+5;
$skillpoints=$skillpoints+5;
$mana=$mana+15;
$maxmana=$maxmana+15;
$enchanting=$enchanting+25;
//add a spell and enchantment
}
if($mclass=="Rogue")
{
$speed=$speed+7;
$accuracy=$accuracy+5;
$agility=$agility+7;
$wisdom=$wisdom+2;
$holdresist=$holdresist+5;
$skillpoints=$skillpoints+5;
$lockpicking=$lockpicking+25;
//add scroll
}
if ($mclass=="Shaman")
{
$wisdom=$wisdom+10;
$fireresist=$fireresist+10;
$iceresist=$iceresist+10;
$skillpoints=$skillpoints+3;
$mana=$mana+15;
$maxmana=$maxmana+15;
$earthresist=$earthresist+10;
$alchemy=$alchemy+25;
//add spell and potion
}
if ($race=="Human")
{
$life=$life+5;
$maxlife=$maxlife+5;
$magicfind=$magicfind+25;
}
if ($race=="Half-Elf")
{
$strength=$strength-3;
$speed=$speed+3;
$agility=$agility+3;
$accuracy=$accuracy+3;
$wisdom=$wisdom+3;
$maxlife=$maxlife+2;
$life=$life+2;
$fireresist=$fireresist+1;
$iceresist=$iceresist+1;
$lightresist=$lightresist+1;
$darkresist=$darkresist+1;
$poisonresist=$poisonresist+1;
$earthresist=$earthresist+1;
$magicfind=$magicfind+10;
}
if ($race=="Dark-Elf")
{$strength=$strength-5;
$speed=$speed+5;
$agility=$agility+5;
$accuracy=$accuracy+5;
$wisdom=$wisdom+5;
$fireresist=$fireresist+2;
$iceresist=$iceresist+2;
$lightresist=$lightresist-5;
$darkresist=$darkresist+5;
$poisonresist=$poisonresist+2;}
if ($race=="Light-Elf")
{$strength=$strength-5;
$speed=$speed+5;
$agility=$agility+5;
$accuracy=$accuracy+5;
$wisdom=$wisdom+5;
$fireresist=$fireresist+2;
$iceresist=$iceresist+2;
$lightresist=$lightresist+5;
$darkresist=$darkresist-5;
$poisonresist=$poisonresist+2;}
if ($race=="Wood-Elf")
{
$strength=$strength-5;
$speed=$speed+5;
$agility=$agility+5;
$accuracy=$accuracy+5;
$wisdom=$wisdom+5;
$fireresist=$fireresist+5;
$iceresist=$iceresist+5;
$lightresist=$lightresist+2;
$darkresist=$darkresist+2;
$poisonresist=$poisonresist+2;}
if ($race=="Dwarf")
{$life=$life+10;
$maxlife=$maxlife+10;
$speed=$speed-3;
$strength=$strength+5;
$agility=$agility-3;
$fireresist=$fireresist+3;
$criticalresist=$criticalresist+3;
$bleedresist=$bleedresist+3;
}
if ($race=="Half-Giant")
{
$life=$life+15;
$maxlife=$maxlife+15;
$strength=$strength+7;
$speed=$speed-3;
$agility=$agility-5;
$holdresist=$holdresist+7;
$mindresist=$mindresist-5;
$wisdom=$wisdom-5;
}
$stmt = $db->query('SELECT charname FROM charstats');
while($row = $stmt->fetch()){
if ($row['charname']==$charname)
	{
	die ("That name is already taken, please choose another.<br /><form action=\"createcharacter.php\" method=\"post\"><input type=\"submit\" class=\"small\" value=\"Create Character\" /></form>");
	}
}
//debug here**************************************
$stmt3 = $db->prepare('SELECT * FROM accounts WHERE username=:username');
				$stmt3->execute(array(':username' => $username));
while($row = $stmt3->fetch())
	{
if ($row['char1']=="None")
{
$stmt2 = $db->prepare('UPDATE accounts SET char1 = :charname WHERE username = :username') ;
					$stmt2->execute(array(
						':charname' => $charname,
						':username' => $username
					));
}
else
{
if ($row['char2']=="None")
{
$stmt = $db->prepare('UPDATE accounts SET char2 = :charname WHERE username = :username') ;
					$stmt->execute(array(
						':charname' => $charname,
						':username' => $username
					));
}
else
{
if ($row['char3']=="None")
{
$stmt = $db->prepare('UPDATE accounts SET char3 = :charname WHERE username = :username') ;
					$stmt->execute(array(
						':charname' => $charname,
						':username' => $username
					));
}
else
{
if ($row['char4']=="None")
{
$stmt = $db->prepare('UPDATE accounts SET char4 = :charname WHERE username = :username') ;
					$stmt->execute(array(
						':charname' => $charname,
						':username' => $username
					));
}
else
{
if ($row['char5']=="None")
{
$stmt = $db->prepare('UPDATE accounts SET char5 = :charname WHERE username = :username') ;
					$stmt->execute(array(
						':charname' => $charname,
						':username' => $username
					));
}
else
{
if ($row['char6']=="None")
{
$stmt = $db->prepare('UPDATE accounts SET char6 = :charname WHERE username = :username') ;
					$stmt->execute(array(
						':charname' => $charname,
						':username' => $username
					));
}
else
{
die ("You do not have an empty character slot. You must delete a character before you create a new one.<br /><table class=\"page\"><tr><td class=\"page\"><form action=\"choosecharacter.php?".time()."\" method=\"post\"><input class=\"small\" type=\"submit\" value=\"Back\" /></form></td></tr></table></body></html>");
}
}
}
}
}
}
}
$guild='None';
$title='Peasant';
$cond='Good';
$level=1;
$experience=0;
$map='homeup';
$mapdimensions=33;
$xaxis=2;
$yaxis=2;
$savemap='homeup';
$savemapdimensions=33;
$savexaxis=1;
$saveyaxis=3;

$stmt = $db->prepare('INSERT INTO charstats (
charname,
guild,
portrait,
race,
mclass,
title,
gender,
cond,
level,
experience,
map,
mapdimensions,
xaxis,
yaxis,
savemap,
savemapdimensions,
savexaxis,
saveyaxis,
life,
maxlife,
mana,
maxmana,
strength,
agility,
speed,
accuracy,
wisdom,
luck,
magicfind,
lockpicking,
cooking,
alchemy,
enchanting,
fireresist,
iceresist,
earthresist,
airresist,
darkresist,
lightresist,
mindresist,
holdresist,
bleedresist,
criticalresist,
skillpoints
)

 VALUES 

(
:charname,
:guild,
:portrait,
:race,
:mclass,
:title,
:gender,
:cond,
:level,
:experience,
:map,
:mapdimensions,
:xaxis,
:yaxis,
:savemap,
:savemapdimensions,
:savexaxis,
:saveyaxis,
:life,
:maxlife,
:mana,
:maxmana,
:strength,
:agility,
:speed,
:accuracy,
:wisdom,
:luck,
:magicfind,
:lockpicking,
:cooking,
:alchemy,
:enchanting,
:fireresist,
:iceresist,
:earthresist,
:airresist,
:darkresist,
:lightresist,
:mindresist,
:holdresist,
:bleedresist,
:criticalresist,
:skillpoints
)') ;
				$stmt->execute(array(

':charname' => $charname,
':guild' => $guild,
':portrait' => $portrait,
':race' => $race,
':mclass' => $mclass,
':title' => $title,
':gender' => $gender,
':cond' => $cond,
':level' => $level,
':experience' => $experience,
':map' => $map,
':mapdimensions' => $mapdimensions,
':xaxis' => $xaxis,
':yaxis' => $yaxis,
':savemap' => $savemap,
':savemapdimensions' => $savemapdimensions,
':savexaxis' => $savexaxis,
':saveyaxis' => $saveyaxis,
':life' => $life,
':maxlife' => $maxlife,
':mana' => $mana,
':maxmana' => $maxmana,
':strength' => $strength,
':agility' => $agility,
':speed' => $speed,
':accuracy' => $accuracy,
':wisdom' => $wisdom,
':luck' => $luck,
':magicfind' => $magicfind,
':lockpicking' => $lockpicking,
':cooking' => $cooking,
':alchemy' => $alchemy,
':enchanting' => $enchanting,
':fireresist' => $fireresist,
':iceresist' => $iceresist,
':earthresist' => $earthresist,
':airresist' => $airresist,
':darkresist' => $darkresist,
':lightresist' => $lightresist,
':mindresist' => $mindresist,
':holdresist' => $holdresist,
':bleedresist' => $bleedresist,
':criticalresist' => $criticalresist,
':skillpoints' => $skillpoints
));
//rattail
include ('includes/zeroinv.php');
$itemname="Rat Tail";
$itemdescription="Rat tails are common ingredients in potions and enchantments.";
$itemtype="Other";
$itemimage="rattail";
$itemlevel=1;
$itemrarity="Common";
$itemvalue=0;
$keep=0;
$othertype="Reagent";

include ('includes/addinv.php');
//end rattail
//lockpick
include ('includes/zeroinv.php');
$itemname="Lockpick";
$itemdescription="Lockpicks can be used on most locks that do not require special keys.";
$itemtype="Other";
$itemimage="lockpick";
$itemlevel=1;
$itemrarity="Common";
$itemvalue=0;
$keep=0;
$othertype="Tool";
include ('includes/addinv.php');
include ('includes/addspellbook.php');
$stmt = $db->prepare('INSERT INTO skills (charname) VALUES (:charname)') ;
				$stmt->execute(array(':charname' => $charname));
$stmt = $db->prepare('INSERT INTO enemy (charname) VALUES (:charname)') ;
				$stmt->execute(array(':charname' => $charname));
$stmt = $db->prepare('INSERT INTO counters (charname) VALUES (:charname)') ;
				$stmt->execute(array(':charname' => $charname));
$stmt = $db->prepare('INSERT INTO flags (charname) VALUES (:charname)') ;
				$stmt->execute(array(':charname' => $charname));
$stmt = $db->prepare('INSERT INTO cookbook (charname) VALUES (:charname)') ;
				$stmt->execute(array(':charname' => $charname));
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
echo "Name: ";
echo $charname;
echo "<br /><img src=\"images/".$portrait;
echo ".png\" border=\"0\" />";
echo "<br />";
?>
<br />
This character has been created. Please login: 
<br />
<table class="page"><tr><td class="page">
<a class="small" href="choosecharacterg.php">Login</a>
</td></tr></table>
</td></tr></table>
</body>
</html>