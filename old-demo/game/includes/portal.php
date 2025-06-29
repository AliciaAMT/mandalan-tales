<?php
//include config
require( $_SERVER['DOCUMENT_ROOT'] . '/game/includes/config2.php');
//if not logged in redirect to login page
if(!$user->is_logged_in()){ header('Location: login.php'); }
$username = $_SESSION['username'];
$charname= $_SESSION['charname'];
require( $_SERVER['DOCUMENT_ROOT'] . '/game/includes/head.php');
?>
<body>
<?php
//***************getflags*****************************
include ('includes/getflags.php');
//******************get charstats************************
include ('includes/getcharstats.php');
//***********************check out of bounds************
include ('includes/mapboundaries.php');
//************redeclare variables for map******************
include ('includes/getmap.php');
//***********CHECK IF ENGAGED IN A FIGHT AND REDIRECT***********
//ENEMY FLAG(TABLE), FIGHT ENEMY(TABLE), 
include ('includes/getenemy.php');
include ('includes/getnomove.php');
//******************getstats inv*******************
include ('includes/getstats.php');
//********************add stats plus inv stats************
$life=$blife+$life;
$mana=$bmana+$mana;
$maxlife=$maxlife+$bmaxlife;
$maxmana=$maxmana+$bmaxmana;
//******************tutorial*********************
include ('includes/tutorial.php');
?>

<?php
$stmt = $db->prepare("SELECT * FROM charstats WHERE charname=:charname");
				$stmt->execute(array(':charname' => $charname));
while($row = $stmt->fetch())
  {
if ($row['map']=="homeup" and $row['xaxis']==1 and $row['yaxis']==1)
  {
	  $stmt = $db->prepare('UPDATE charstats SET map = "home" WHERE charname= :charname');
					$stmt->execute(array(':charname' => $charname));
  }
if ($row['map']=="home" and $row['xaxis']==1 and $row['yaxis']==1)
  {
  $stmt = $db->prepare('UPDATE charstats SET map = "homeup" WHERE charname= :charname');
					$stmt->execute(array(':charname' => $charname));
  }
if ($row['map']=="home" and $row['xaxis']==2 and $row['yaxis']==1)
  {
  $query=sprintf("update stats set map='yard' where username='%s';",mysql_real_escape_string($username));
mysql_query($query);

$query=sprintf("update stats set yaxis=3 where username='%s';",mysql_real_escape_string($username));
mysql_query($query);

  }
if ($row['map']=="home" and $row['xaxis']==3 and $row['yaxis']==3)
  {
$query=sprintf("update stats set map='ishforest' where username='%s';",mysql_real_escape_string($username));
mysql_query($query);

$query=sprintf("update stats set yaxis=1 where username='%s';",mysql_real_escape_string($username));
mysql_query($query); 

$query=sprintf("update stats set mapdimensions=44 where username='%s';",mysql_real_escape_string($username));
mysql_query($query);

$query=sprintf("update stats set xaxis=2 where username='%s';",mysql_real_escape_string($username));
mysql_query($query);
}
if ($row['map']=="ishforest" and $row['xaxis']==2 and $row['yaxis']==1)
  {
$query=sprintf("update stats set map='home' where username='%s';",mysql_real_escape_string($username));
mysql_query($query);

$query=sprintf("update stats set yaxis=3 where username='%s';",mysql_real_escape_string($username));
mysql_query($query); 

$query=sprintf("update stats set mapdimensions=33 where username='%s';",mysql_real_escape_string($username));
mysql_query($query);

$query=sprintf("update stats set xaxis=3 where username='%s';",mysql_real_escape_string($username));
mysql_query($query);
}
if ($row['map']=="yard" and $row['xaxis']==1 and $row['yaxis']==3)
  {

if ($shepfeed>1)
{
  $query=sprintf("update stats set map='cellar' where username='%s';",mysql_real_escape_string($username));
mysql_query($query);

$query=sprintf("update stats set yaxis=1 where username='%s';",mysql_real_escape_string($username));
mysql_query($query);
$query=sprintf("update stats set mapdimensions=00 where username='%s';",mysql_real_escape_string($username));
mysql_query($query);

$query=sprintf("update stats set xaxis=2 where username='%s';",mysql_real_escape_string($username));
mysql_query($query);

}
else
{
die ("<table class=\"page\"><tr><td class=\"border\">You try to open the cellar door, but it is locked. You cannot pick this lock. You will have to find the key before you can venture any further here.</td></tr><tr><td class=\"page\"><table class=\"page\"><tr><td class=\"page\"><form name=\"sleep\" action=\"maingraphics.php?".time()."\" method=\"get\"><input type=\"submit\" value=\"Back to Map\" class=\"small\"></form></td></tr></table></td></tr></table></body></html>"); 

}
 
 }
if ($row['map']=="yard" and $row['xaxis']==1 and $row['yaxis']==1)
  {
$query=sprintf("update stats set map='barn' where username='%s';",mysql_real_escape_string($username));
mysql_query($query);

$query=sprintf("update stats set xaxis=2 where username='%s';",mysql_real_escape_string($username));
mysql_query($query);
} 
if ($row['map']=="barn" and $row['xaxis']==2 and $row['yaxis']==1)
  {
$query=sprintf("update stats set map='yard' where username='%s';",mysql_real_escape_string($username));
mysql_query($query);

$query=sprintf("update stats set xaxis=1 where username='%s';",mysql_real_escape_string($username));
mysql_query($query);
} 
if ($row['map']=="yard" and $row['xaxis']==2 and $row['yaxis']==3)
  {
  $query=sprintf("update stats set map='home' where username='%s';",mysql_real_escape_string($username));
mysql_query($query);

$query=sprintf("update stats set yaxis=1 where username='%s';",mysql_real_escape_string($username));
mysql_query($query);

$query=sprintf("update stats set xaxis=2 where username='%s';",mysql_real_escape_string($username));
mysql_query($query);

  }
if ($row['map']=="cellar" and $row['xaxis']==2 and $row['yaxis']==1)
  {

  $query=sprintf("update stats set map='yard' where username='%s';",mysql_real_escape_string($username));
mysql_query($query);

$query=sprintf("update stats set yaxis=3 where username='%s';",mysql_real_escape_string($username));
mysql_query($query);

$query=sprintf("update stats set xaxis=1 where username='%s';",mysql_real_escape_string($username));
mysql_query($query);

$query=sprintf("update stats set mapdimensions=33 where username='%s';",mysql_real_escape_string($username));
mysql_query($query);
  }
if ($row['map']=="ishforest" and $row['xaxis']==4 and $row['yaxis']==4)
  {

  $query=sprintf("update stats set map='ishandar' where username='%s';",mysql_real_escape_string($username));
mysql_query($query);

$query=sprintf("update stats set yaxis=2 where username='%s';",mysql_real_escape_string($username));
mysql_query($query);

$query=sprintf("update stats set xaxis=1 where username='%s';",mysql_real_escape_string($username));
mysql_query($query);

$query=sprintf("update stats set mapdimensions=77 where username='%s';",mysql_real_escape_string($username));
mysql_query($query);
  }
if ($row['map']=="ishandar" and $row['xaxis']==1 and $row['yaxis']==2)
  {

  $query=sprintf("update stats set map='ishforest' where username='%s';",mysql_real_escape_string($username));
mysql_query($query);

$query=sprintf("update stats set yaxis=4 where username='%s';",mysql_real_escape_string($username));
mysql_query($query);

$query=sprintf("update stats set xaxis=4 where username='%s';",mysql_real_escape_string($username));
mysql_query($query);

$query=sprintf("update stats set mapdimensions=44 where username='%s';",mysql_real_escape_string($username));
mysql_query($query);
  }
if ($row['map']=="barn" and $row['xaxis']==3 and $row['yaxis']==1)
  {

  echo "Sorry you cannot enter. The door is locked and you cannot pick the lock. It seems to be enchanted.";
  }
if ($row['map']=="ishforest" and $row['xaxis']==4 and $row['yaxis']==2)
  {

  $query=sprintf("update stats set map='marah' where username='%s';",mysql_real_escape_string($username));
mysql_query($query);

$query=sprintf("update stats set yaxis=2 where username='%s';",mysql_real_escape_string($username));
mysql_query($query);

$query=sprintf("update stats set xaxis=1 where username='%s';",mysql_real_escape_string($username));
mysql_query($query);

$query=sprintf("update stats set mapdimensions=33 where username='%s';",mysql_real_escape_string($username));
mysql_query($query);
  }
if ($row['map']=="marah" and $row['xaxis']==1 and $row['yaxis']==2)
  {

  $query=sprintf("update stats set map='ishforest' where username='%s';",mysql_real_escape_string($username));
mysql_query($query);

$query=sprintf("update stats set yaxis=2 where username='%s';",mysql_real_escape_string($username));
mysql_query($query);

$query=sprintf("update stats set xaxis=4 where username='%s';",mysql_real_escape_string($username));
mysql_query($query);

$query=sprintf("update stats set mapdimensions=44 where username='%s';",mysql_real_escape_string($username));
mysql_query($query);
  }
if ($row['map']=="ishforest" and $row['xaxis']==4 and $row['yaxis']==1)
  {

  $query=sprintf("update stats set map='cave' where username='%s';",mysql_real_escape_string($username));
mysql_query($query);

$query=sprintf("update stats set yaxis=3 where username='%s';",mysql_real_escape_string($username));
mysql_query($query);

$query=sprintf("update stats set xaxis=1 where username='%s';",mysql_real_escape_string($username));
mysql_query($query);

$query=sprintf("update stats set mapdimensions=00 where username='%s';",mysql_real_escape_string($username));
mysql_query($query);
  }
if ($row['map']=="cave" and $row['xaxis']==1 and $row['yaxis']==3)
  {

  $query=sprintf("update stats set map='ishforest' where username='%s';",mysql_real_escape_string($username));
mysql_query($query);

$query=sprintf("update stats set yaxis=1 where username='%s';",mysql_real_escape_string($username));
mysql_query($query);

$query=sprintf("update stats set xaxis=4 where username='%s';",mysql_real_escape_string($username));
mysql_query($query);

$query=sprintf("update stats set mapdimensions=44 where username='%s';",mysql_real_escape_string($username));
mysql_query($query);
  }
if ($row['map']=="ishforest" and $row['xaxis']==1 and $row['yaxis']==4)
  {

  $query=sprintf("update stats set map='pyramid' where username='%s';",mysql_real_escape_string($username));
mysql_query($query);

$query=sprintf("update stats set yaxis=1 where username='%s';",mysql_real_escape_string($username));
mysql_query($query);

$query=sprintf("update stats set xaxis=2 where username='%s';",mysql_real_escape_string($username));
mysql_query($query);

$query=sprintf("update stats set mapdimensions=33 where username='%s';",mysql_real_escape_string($username));
mysql_query($query);
  }
if ($row['map']=="pyramid" and $row['xaxis']==2 and $row['yaxis']==1)
  {

  $query=sprintf("update stats set map='ishforest' where username='%s';",mysql_real_escape_string($username));
mysql_query($query);

$query=sprintf("update stats set yaxis=4 where username='%s';",mysql_real_escape_string($username));
mysql_query($query);

$query=sprintf("update stats set xaxis=1 where username='%s';",mysql_real_escape_string($username));
mysql_query($query);

$query=sprintf("update stats set mapdimensions=44 where username='%s';",mysql_real_escape_string($username));
mysql_query($query);
  }
if ($row['map']=="pyramid" and $row['xaxis']==2 and $row['yaxis']==3)
  {

  $query=sprintf("update stats set map='pyramida' where username='%s';",mysql_real_escape_string($username));
mysql_query($query);

$query=sprintf("update stats set yaxis=1 where username='%s';",mysql_real_escape_string($username));
mysql_query($query);

$query=sprintf("update stats set xaxis=6 where username='%s';",mysql_real_escape_string($username));
mysql_query($query);

$query=sprintf("update stats set mapdimensions=00 where username='%s';",mysql_real_escape_string($username));
mysql_query($query);
  }
if ($row['map']=="pyramida" and $row['xaxis']==6 and $row['yaxis']==1)
  {

  $query=sprintf("update stats set map='pyramid' where username='%s';",mysql_real_escape_string($username));
mysql_query($query);

$query=sprintf("update stats set yaxis=3 where username='%s';",mysql_real_escape_string($username));
mysql_query($query);

$query=sprintf("update stats set xaxis=2 where username='%s';",mysql_real_escape_string($username));
mysql_query($query);

$query=sprintf("update stats set mapdimensions=44 where username='%s';",mysql_real_escape_string($username));
mysql_query($query);
  }
if ($row['map']=="pyramida" and $row['xaxis']==6 and $row['yaxis']==12)
  {

  $query=sprintf("update stats set map='pyramidb' where username='%s';",mysql_real_escape_string($username));
mysql_query($query);

$query=sprintf("update stats set yaxis=1 where username='%s';",mysql_real_escape_string($username));
mysql_query($query);

$query=sprintf("update stats set xaxis=2 where username='%s';",mysql_real_escape_string($username));
mysql_query($query);

$query=sprintf("update stats set mapdimensions=33 where username='%s';",mysql_real_escape_string($username));
mysql_query($query);
  }
if ($row['map']=="pyramidb" and $row['xaxis']==2 and $row['yaxis']==1)
  {

  $query=sprintf("update stats set map='pyramida' where username='%s';",mysql_real_escape_string($username));
mysql_query($query);

$query=sprintf("update stats set yaxis=12 where username='%s';",mysql_real_escape_string($username));
mysql_query($query);

$query=sprintf("update stats set xaxis=6 where username='%s';",mysql_real_escape_string($username));
mysql_query($query);

$query=sprintf("update stats set mapdimensions=00 where username='%s';",mysql_real_escape_string($username));
mysql_query($query);
  }
if ($row['map']=="hoe" and $row['xaxis']==2 and $row['yaxis']==3)
  {

  $query=sprintf("update stats set map='ishandar' where username='%s';",mysql_real_escape_string($username));
mysql_query($query);

$query=sprintf("update stats set yaxis=5 where username='%s';",mysql_real_escape_string($username));
mysql_query($query);

$query=sprintf("update stats set xaxis=3 where username='%s';",mysql_real_escape_string($username));
mysql_query($query);

$query=sprintf("update stats set mapdimensions=77 where username='%s';",mysql_real_escape_string($username));
mysql_query($query);
  }
  }
  //redirect 
	$loc = 'Location: maingraphics.php?'.time();
    header ($loc);
  
?>
</body>
</html>