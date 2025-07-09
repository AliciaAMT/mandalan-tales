<?php
//include config
require_once( $_SERVER['DOCUMENT_ROOT'] . '/game/includes/config2.php');
//if not logged in redirect to login page
if(!$user->is_logged_in()){ header('Location: ../login.php'); die('This site works best with redirections turned on, but you may continue with them turned off. <a href="../login.php">Continue</a>');}
$username = $_SESSION['username'];
$charname= $_SESSION['charname'];
?>
<?php
//******************getstats inv*******************
include ('../includes/getstats.php');
include ('../includes/getweapontype.php');
include ('../includes/getskills.php');
include ('../includes/getdamage.php');
include ('../includes/getdefense.php');
//***************getflags*****************************
include ('../includes/getflags.php');
//******************get charstats************************
include ('../includes/getcharstats.php');
include ('../includes/getestats.php');
?>
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
<link href="../main.css?<?php echo time(); ?>" rel="stylesheet"></link>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
</head>
<body>
<?php
$stmt = $db->prepare("UPDATE charstats SET wins = wins + 1 WHERE charname = :charname");
	$stmt->execute(array(':charname' => $charname));
$stmt = $db->prepare("UPDATE enemy SET fight = 0 WHERE charname = :charname");
	$stmt->execute(array(':charname' => $charname));
 $outcome="Win";
if ($enemyname=="Rat") {
$experience=2*$enemylevel;
  if ($bexpbonus>0)
  {
  $experience=$experience*2;//write different later
  }
$stmt = $db->prepare("UPDATE inventory SET keep=keep+1 WHERE itemname='Rat Tail' and charname = :charname");
	$stmt->execute(array(':charname' => $charname));
$stmt = $db->prepare("UPDATE charstats SET experience=experience + :experience WHERE charname = :charname");
	$stmt->execute(array(':experience' => $experience, ':charname' => $charname));
	
//AFTER LOOT! or FLED! or I DIED!

//UPDATE FIGHTLOG AND END FIGHT
$stmt = $db->prepare('UPDATE enemy SET fight=0 WHERE charname= :charname');
	$stmt->execute(array(':charname' => $charname));
$stmt = $db->prepare("SELECT event FROM enemy WHERE charname=:charname");
				$stmt->execute(array(':charname' => $charname));
while($row = $stmt->fetch()) {
	$event = $row['event'];
}
$stmt = $db->prepare('INSERT INTO fightlogs (charname,logcontent,enemyname,enemylevel,outcome) VALUES (:charname, :event, :enemyname, :enemylevel, :outcome)') ;
	$stmt->execute(array(
		':charname' => $charname,
		':event' => $event,
		':enemyname' => $enemyname,
		':enemylevel' => $enemylevel,
		':outcome' => $outcome		
	));	
	//*********REWRITE THIS !!!!!!!!!!****************
echo "<div class=\"full\"><table class=\"page\"><tr><td class=\"border\"><br />You gain ".$experience." experience!<br /><br />You find:<br /><br /><img src=\"../images/rattail.png\" border=\"0\" /><br />Rat Tail";
echo "<br /><br /><table class=\"page\"><tr><td class=\"page\"><table class=\"page\"><tr><td class=\"page\"><form action=\"../maingraphics.php?".time()."\" method=\"post\"><input class=\"small\" type=\"submit\" value=\"Continue\" /></form></td></tr></table></td></tr></table></td></tr></table></div></body></html>";
}
if ($enemyname=="Cellar Spider")
{
include ('php/spidersilk.php');
$experience=50*$row['enemylevel'];
  if ($bexpbonus>0)
  {
  $experience=$experience*2;
  }
$query=sprintf("update stats set experience=experience+50 where username='%s';", mysql_real_escape_string($username));
mysql_query($query);

$query=sprintf("update stats set wins=wins+1 where username='%s';", mysql_real_escape_string($username));
mysql_query($query);

$query=sprintf("update enemy set fight=0 where username='%s';", mysql_real_escape_string($username));
mysql_query($query);

$query=sprintf("update flags set cellarspider=1 where username='%s';", mysql_real_escape_string($username));
mysql_query($query);

echo "<div class=\"full\"><table class=\"page\"><tr><td class=\"border\"><br />You gain 50 experience!<br /><br />You find:<br /><br /><img src=\"../images/web.png\" border=\"0\" /><br />Spider Silk<br /><br /><table class=\"page\"><tr><td class=\"page\"><table class=\"page\"><tr><td class=\"page\"><form action=\"../maingraphics.php?".time()."\" method=\"post\"><input class=\"small\" type=\"submit\" value=\"Continue\" /></form></td></tr></table></td></tr></table></td></tr></table></div></body></html>";
}
if ($enemyname=="Spider")
{
$experience=25*$row['enemylevel'];
  if ($bexpbonus>0)
  {
  $experience=$experience*2;
  }
include ('php/spidersilk.php');

$query=sprintf("update stats set experience=experience+'%s' where username='%s';", mysql_real_escape_string($experience), mysql_real_escape_string($username));
mysql_query($query);

$query=sprintf("update stats set wins=wins+1 where username='%s';", mysql_real_escape_string($username));
mysql_query($query);

$query=sprintf("update enemy set fight=0 where username='%s';", mysql_real_escape_string($username));
mysql_query($query);

echo "<div class=\"full\"><table class=\"page\"><tr><td class=\"border\"><br />You gain ".$experience." experience!<br /><br />You find:<br /><br /><img src=\"../images/web.png\" border=\"0\" /><br />Spider Silk<br /><br /><table class=\"page\"><tr><td class=\"page\"><table class=\"page\"><tr><td class=\"page\"><form action=\"../maingraphics.php?".time()."\" method=\"post\"><input class=\"small\" type=\"submit\" value=\"Continue\" /></form></td></tr></table></td></tr></table></td></tr></table></div></body></html>";

}
if ($enemyname=="Goblin")
{
$experience=35*$row['enemylevel'];
  if ($bexpbonus>0)
  {
  $experience=$experience*2;
  }

  $rand=mt_rand(1,2);
  if ($rand==1)
  {
  include ('php/randother.php');
  }
  
  if ($rand==2)
  {
  
  include ('php/randitem1.php');
  
  
  }
  
$query=sprintf("update stats set experience=experience+'%s' where username='%s';", mysql_real_escape_string($experience), mysql_real_escape_string($username));
mysql_query($query);

echo "<div class=\"full\"><table class=\"page\"><tr><td class=\"border\"><br />You gain ".$experience." experience!<br /><br />You find:<br /><br /><img src=\"../images/".$itemimage.".png\" border=\"0\" /><br />".$itemname;

echo "<br /><br /><table class=\"page\"><tr><td class=\"page\"><table class=\"page\"><tr><td class=\"page\"><form action=\"../maingraphics.php?".time()."\" method=\"post\"><input class=\"small\" type=\"submit\" value=\"Continue\" /></form></td></tr></table></td></tr></table></td></tr></table></div></body></html>";
}
if ($enemyname=="Scorpion")
{
$experience=25*$row['enemylevel'];
  if ($bexpbonus>0)
  {
  $experience=$experience*2;
  }
  $rand=mt_rand(1,10);
  $goldadd=$row['enemylevel']*$rand;
  $goldadd=round($goldadd);
  
$query=sprintf("update stats set gold=gold+'%s' where username='%s';", mysql_real_escape_string($goldadd),
mysql_real_escape_string($username));
mysql_query($query);

$query=sprintf("update stats set experience=experience+'%s' where username='%s';", mysql_real_escape_string($experience), mysql_real_escape_string($username));
mysql_query($query);

echo "<div class=\"full\"><table class=\"page\"><tr><td class=\"border\"><br />You gain ".$experience." experience!<br /><br />You find:<br /><br /><img src=\"../images/gold.png\" border=\"0\" /><br />".$goldadd;

echo "<br /><br /><table class=\"page\"><tr><td class=\"page\"><table class=\"page\"><tr><td class=\"page\"><form action=\"../maingraphics.php?".time()."\" method=\"post\"><input class=\"small\" type=\"submit\" value=\"Continue\" /></form></td></tr></table></td></tr></table></td></tr></table></div></body></html>";
}
if ($enemyname=="Giant Scorpion")
{
$experience=25*$row['enemylevel'];
  if ($bexpbonus>0)
  {
  $experience=$experience*2;
  }
  include ('php/gscorpionflag.php');
  
  
  $rand=mt_rand(1,50);
  $goldadd=$row['enemylevel']*$rand;
  $goldadd=round($goldadd);
  
$query=sprintf("update stats set gold=gold+'%s' where username='%s';", mysql_real_escape_string($goldadd),
mysql_real_escape_string($username));
mysql_query($query);

$query=sprintf("update stats set experience=experience+'%s' where username='%s';", mysql_real_escape_string($experience), mysql_real_escape_string($username));
mysql_query($query);



include ('../php/addlhol.php');

echo "<div class=\"full\"><table class=\"page\"><tr><td class=\"border\"><br />You gain ".$experience." experience!<br /><br />You find:<br /><br /><img src=\"../images/gold.png\" border=\"0\" /><br />".$goldadd;

echo "<br /><br /><img src=\"../images/leatherhead.png\" border=\"0\" /><br />Legendary Leather Headband of Life<br /><br /><table class=\"page\"><tr><td class=\"page\"><table class=\"page\"><tr><td class=\"page\"><form action=\"../maingraphics.php?".time()."\" method=\"post\"><input class=\"small\" type=\"submit\" value=\"Continue\" /></form></td></tr></table></td></tr></table></td></tr></table></div></body></html>";
}
if ($enemyname=="Bat")
{
$experience=25*$row['enemylevel'];
  if ($bexpbonus>0)
  {
  $experience=$experience*2;
  }
include ('php/addbatwings.php');

$query=sprintf("update stats set experience=experience+'%s' where username='%s';", mysql_real_escape_string($experience), mysql_real_escape_string($username));
mysql_query($query);

echo "<div class=\"full\"><table class=\"page\"><tr><td class=\"border\"><br />You gain ".$experience." experience!<br /><br />You find:<br /><br /><img src=\"../images/batwings.png\" border=\"0\" /><br />Bat Wings";

echo "<br /><br /><table class=\"page\"><tr><td class=\"page\"><table class=\"page\"><tr><td class=\"page\"><form action=\"../maingraphics.php?".time()."\" method=\"post\"><input class=\"small\" type=\"submit\" value=\"Continue\" /></form></td></tr></table></td></tr></table></td></tr></table></div></body></html>";
}
if ($enemyname=="Giant Bat")
{
$experience=25*$row['enemylevel'];
  if ($bexpbonus>0)
  {
  $experience=$experience*2;
  }
include ('php/addbatwings.php');

$query=sprintf("update stats set experience=experience+'%s' where username='%s';", mysql_real_escape_string($experience), mysql_real_escape_string($username));
mysql_query($query);

$query=sprintf("update flags set giantbat=1 where username='%s';", mysql_real_escape_string($username));
mysql_query($query);



echo "<div class=\"full\"><table class=\"page\"><tr><td class=\"border\"><br />You gain ".$experience." experience!<br /><br />You find:<br /><br /><img src=\"../images/batwings.png\" border=\"0\" /><br />Bat Wings";

echo "<br /><br /><img src=\"../images/ring1.png\" border=\"0\" /><br />Legendary Blood Red Ring";
include ('php/addlbrr.php');
echo "<br /><br /><table class=\"page\"><tr><td class=\"page\"><table class=\"page\"><tr><td class=\"page\"><form action=\"../maingraphics.php?".time()."\" method=\"post\"><input class=\"small\" type=\"submit\" value=\"Continue\" /></form></td></tr></table></td></tr></table></td></tr></table></div></body></html>";
}
if ($enemyname=="Snake")
{
$experience=35*$row['enemylevel'];
  if ($bexpbonus>0)
  {
  $experience=$experience*2;
  }

  $rand=mt_rand(1,100);
  if ($rand>0 and $rand<98)
  {
  include ('php/randother.php');
  }
  else
  {
  include ('php/randitem1.php');
  }
  
$query=sprintf("update stats set experience=experience+'%s' where username='%s';", mysql_real_escape_string($experience), mysql_real_escape_string($username));
mysql_query($query);

echo "<div class=\"full\"><table class=\"page\"><tr><td class=\"border\"><br />You gain ".$experience." experience!<br /><br />You find:<br /><br /><img src=\"../images/".$itemimage.".png\" border=\"0\" /><br />".$itemname;

echo "<br /><br /><table class=\"page\"><tr><td class=\"page\"><table class=\"page\"><tr><td class=\"page\"><form action=\"../maingraphics.php?".time()."\" method=\"post\"><input class=\"small\" type=\"submit\" value=\"Continue\" /></form></td></tr></table></td></tr></table></td></tr></table></div></body></html>";
}
if ($enemyname=="Giant Snake")
{
$experience=35*$row['enemylevel'];
  if ($bexpbonus>0)
  {
  $experience=$experience*2;
  }

  
  include ('php/randitem1.php');
 
  
$query=sprintf("update stats set experience=experience+'%s' where username='%s';", mysql_real_escape_string($experience), mysql_real_escape_string($username));
mysql_query($query);

$query=sprintf("update flags set giantsnake=1 where username='%s';", mysql_real_escape_string($username));
mysql_query($query);

echo "<div class=\"full\"><table class=\"page\"><tr><td class=\"border\"><br />You gain ".$experience." experience!<br /><br />You find:<br /><br /><img src=\"../images/".$itemimage.".png\" border=\"0\" /><br />".$itemname;

echo "<br /><br /><table class=\"page\"><tr><td class=\"page\"><table class=\"page\"><tr><td class=\"page\"><form action=\"../maingraphics.php?".time()."\" method=\"post\"><input class=\"small\" type=\"submit\" value=\"Continue\" /></form></td></tr></table></td></tr></table></td></tr></table></div></body></html>";
}
if ($enemyname=="Anubis")
{
$experience=35*$row['enemylevel'];
  if ($bexpbonus>0)
  {
  $experience=$experience*2;
  }
echo "<div class=\"full\"><table class=\"page\"><tr><td class=\"border\"><br />You gain ".$experience." experience!<br /><br />You find:";
  
  include ('php/randitem1.php');echo "<br /><br /><img src=\"../images/".$itemimage.".png\" border=\"0\" /><br />".$itemname;

echo "<br /><br />";
  include ('php/addsetitem.php');echo "<br /><br /><img src=\"../images/".$itemimage.".png\" border=\"0\" /><br />".$itemname;

echo "<br /><br />";
  include ('php/addstela.php');echo "<br /><br /><img src=\"../images/".$itemimage.".png\" border=\"0\" /><br />".$itemname;

echo "<br /><br />";
 
  
$query=sprintf("update stats set experience=experience+'%s' where username='%s';", mysql_real_escape_string($experience), mysql_real_escape_string($username));
mysql_query($query);

$query=sprintf("update flags set anubis=1 where username='%s';", mysql_real_escape_string($username));
mysql_query($query);



echo "<table class=\"page\"><tr><td class=\"page\"><table class=\"page\"><tr><td class=\"page\"><form action=\"../maingraphics.php?".time()."\" method=\"post\"><input class=\"small\" type=\"submit\" value=\"Continue\" /></form></td></tr></table></td></tr></table></td></tr></table></div></body></html>";
}

  ?>