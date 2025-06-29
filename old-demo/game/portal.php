<?php
//include config
require( $_SERVER['DOCUMENT_ROOT'] . '/game/includes/config2.php');
//if not logged in redirect to login page
if(!$user->is_logged_in()){ header('Location: login.php'); die('This site works best with redirections turned on, but you may continue with them turned off. <a href="login.php">Continue</a>');}
$username = $_SESSION['username'];
$charname= $_SESSION['charname'];
?>
<?php
//******************getstats inv*******************
include ('includes/getstats.php');
include ('includes/getweapontype.php');
include ('includes/getskills.php');
include ('includes/getdamage.php');
include ('includes/getdefense.php');
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
  //redirect 
	$loc = 'Location: maingraphics.php?'.time();
    header ($loc);die('This site works best with redirections turned on, but you may continue with them turned off. <a href="maingraphics.php">Continue</a>');
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
<script>
window.onload = function () {
    var contentcollapse1 = localStorage.getItem("contentcollapse1");
	var contentcollapse2 = localStorage.getItem("contentcollapse2");
	var contentcollapse3 = localStorage.getItem("contentcollapse3");
	var contentcollapse4 = localStorage.getItem("contentcollapse4");
    if (contentcollapse1==="true") {
        openContentcollapse1();
    } else {
        closeContentcollapse1();
    }
	if (contentcollapse2==="true") {
        openContentcollapse2();
    } else {
        closeContentcollapse2();
    }
	if (contentcollapse3==="true") {
        openContentcollapse3();
    } else {
        closeContentcollapse3();
    }
	if (contentcollapse4==="true") {
        openContentcollapse4();
    } else {
        closeContentcollapse4();
    }
    }
function checkContentcollapse1() {
    var contentcollapse1 = localStorage.getItem("contentcollapse1");
        if (contentcollapse1==="true") {
        closeContentcollapse1();
    } else {
        openContentcollapse1();
    }
    }   
function checkContentcollapse2() {
    var contentcollapse2 = localStorage.getItem("contentcollapse2");
        if (contentcollapse2==="true") {
        closeContentcollapse2();
    } else {
        openContentcollapse2();
    }
    }
function checkContentcollapse4() {
    var contentcollapse4 = localStorage.getItem("contentcollapse4");
        if (contentcollapse4==="true") {
        closeContentcollapse4();
    } else {
        openContentcollapse4();
    }
    }
function checkContentcollapse3() {
    var contentcollapse3 = localStorage.getItem("contentcollapse3");
        if (contentcollapse3==="true") {
        closeContentcollapse3();
    } else {
        openContentcollapse3();
    }
    }	
function openContentcollapse1() {
	document.getElementById("contentcollapse1").style.display = "block";
    localStorage.setItem("contentcollapse1", "true");
}
function openContentcollapse2() {
	document.getElementById("contentcollapse2").style.display = "block";
    localStorage.setItem("contentcollapse2", "true");
}
function openContentcollapse3() {
	document.getElementById("contentcollapse3").style.display = "block";
    localStorage.setItem("contentcollapse3", "true");
}
function openContentcollapse4() {
	document.getElementById("contentcollapse4").style.display = "block";
    localStorage.setItem("contentcollapse4", "true");
}
function closeContentcollapse1() {
    document.getElementById("contentcollapse1").style.display = "none";
    localStorage.setItem("contentcollapse1", "false");
}
function closeContentcollapse2() {
    document.getElementById("contentcollapse2").style.display = "none";
    localStorage.setItem("contentcollapse2", "false");
}
function closeContentcollapse3() {
    document.getElementById("contentcollapse3").style.display = "none";
    localStorage.setItem("contentcollapse3", "false");
}
function closeContentcollapse4() {
    document.getElementById("contentcollapse4").style.display = "none";
    localStorage.setItem("contentcollapse4", "false");
}
</script>
</head>
<body>


</body></html>