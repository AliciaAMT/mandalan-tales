<?php
//include config
require( $_SERVER['DOCUMENT_ROOT'] . '/game/includes/config2.php');
//if not logged in redirect to login page
if(!$user->is_logged_in()){ header('Location: login.php');die('This site works best with redirections turned on, but you may continue with them turned off. <a href="login.php">Continue</a>'); }
$username = $_SESSION['username'];
$charname= $_SESSION['charname'];
?>
<?php
//************************SET VARIABLES*****************
include ('includes/getflags.php');
include ('includes/getitems.php');
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

<table class="page"><tr><td class="page">
<?php
$stmt = $db->prepare("SELECT * FROM charstats WHERE charname=:charname");
				$stmt->execute(array(':charname' => $charname));
while($row = $stmt->fetch())
  {  
//*********declare variables for recurring html code ***********
$experience = "</td></tr><tr><td class=\"left\"><h3>Experience:</h3></td><td class=\"left\"><h3>+";
$quest = "</h3></td></tr><tr><td class=\"left\"><h3>Quest Updated:</h3></td><td class=\"left\"><h3>";
$endsearch = "</h3></td></tr></table><br /><table class=\"page\"><tr><td class=\"page\"><form action=\"maingraphics.php?".time()."\" method=\"post\"><input class=\"small\" type=\"submit\" value=\"Back to Map\" /></form></td></tr></table>";
//**********replaces old variables**********
$search1 = "<table class=\"page\"><tr><td class=\"center\" colspan=\"2\"><h3>You search ";
$search2 = "...</h3></td></tr><tr><td class=\"left\"><h3>";
$found1 = "Found:</h3></td><td class=\"center\"><img src=\"images/";
$found2 = ".png\" /><br />";
$found3 = "</td></tr><tr><td class=\"left\"><h3>Found:</h3></td><td class=\"center\"><img src=\"images/";
$nothing = "Nothing Here</h3></td></tr><tr><td class=\"center\"><table class=\"page\"><tr><td class=\"page\"><form action=\"maingraphics.php?".time()."\" method=\"post\"><input class=\"small\" type=\"submit\" value=\"Back to Map\" /></form></td></tr></table></td></tr></table>";
$nothingtryagain = "Nothing Here, try again later.</h3></td></tr><tr><td class=\"center\"><table class=\"page\"><tr><td class=\"page\"><form action=\"maingraphics.php?".time()."\" method=\"post\"><input class=\"small\" type=\"submit\" value=\"Back to Map\" /></form></td></tr></table></td></tr></table>";
$locked1 = "Locked:</h3></td><td class=\"center\">It looks like you can pick this lock with a lockpick.</td></tr><tr><td class=\"center\" colspan=\"2\"><table class=\"page\"><tr><td class=\"page\"><form action=\"picklock.php?".time()."\" method=\"post\"><input class=\"small\" type=\"submit\" value=\"Pick Lock\" /></form></td></tr></table></td></tr></table><br /><table class=\"page\"><tr><td class=\"page\"><form action=\"maingraphics.php?".time()."\" method=\"post\"><input class=\"small\" type=\"submit\" value=\"Back to Map\" /></form></td></tr></table>";
//**********end variables ****************

if ($row['map']=="homeup")
{
  if ($row['map']=="homeup" and $row['xaxis']==2 and $row['yaxis']==2)
  {
  if ($bedroomrug==0)
  {
//************HTML SEARCH AND FIND**********************
  echo $search1."under the rug".$search2.$found1."smallrustykey".$found2."Small Rusty Key".$experience."5".$quest."The Hidden Key Quest".$endsearch;
//***********UPDATE QUEST FLAG AND EXPERIENCE ************************
 $stmt = $db->prepare('UPDATE flags SET bedroomrug = 1 WHERE charname= :charname');
					$stmt->execute(array(':charname' => $charname)); 
 $stmt = $db->prepare('UPDATE charstats SET experience = experience + 5 WHERE charname= :charname') ;
					$stmt->execute(array(':charname' => $charname));
 //***************add key******************
include ('includes/zeroinv.php');

$itemname="Small Rusty Key";
$itemdescription="This is a special key you hid under your rug.";
$itemimage="smallrustykey";
$itemlevel=1;
$itemrarity="Relic";
$othertype="Quest";

include ('includes/addinv.php');
 //***********end key  *******************
//**************SET CO-OCCURRING QUEST ACCORDING TO POSSIBLE ORDERS FOR DIALOGUE FLOW********** 
if ($thehiddenkey==0)
  {
$stmt = $db->prepare('UPDATE flags SET thehiddenkey = 1 WHERE charname= :charname') ;
				$stmt->execute(array(':charname' => $charname));
  }
  if ($thehiddenkey==2)
  {
  $stmt = $db->prepare('UPDATE flags SET thehiddenkey = 3 WHERE charname= :charname') ;
					$stmt->execute(array(':charname' => $charname));
  }
  }
  if ($bedroomrug==1)
  {
//********* HTML FOR SEARCHING AND NOTHING FOUND ************
echo $search1."under the rug".$search2.$nothing;
  }
  }
if ($row['map']=="homeup" and $row['xaxis']==3 and $row['yaxis']==1)
  {
  if ($bedroomwardrobe==0)
  {
//************HTML SEARCH AND FIND**********************
  echo $search1."the wardrobe".$search2.$found1."worncanvasshirt".$found2."Worn Canvas Shirt".$found3."worncanvaspants".$found2."Worn Canvas Pants".$experience."10".$endsearch;
//***********UPDATE QUEST FLAG AND EXPERIENCE ************************
 $stmt = $db->prepare('UPDATE flags SET bedroomwardrobe = 1 WHERE charname= :charname') ;
					$stmt->execute(array(':charname' => $charname));
$stmt = $db->prepare('UPDATE charstats SET experience = experience + 10 WHERE charname= :charname') ;
					$stmt->execute(array(':charname' => $charname)); 
//*******************add canvas shirt*********
include ('includes/zeroinv.php');

$itemname="Worn Canvas Shirt";
$itemdescription="This is an ordinary Canvas Shirt, a little worn for the wear.";
$itemtype="Armor";
$itemimage="worncanvasshirt";
$itemlevel=1;
$itemrarity="Common";
$equiplocation="Chest";
$equipable=1;
$weapontype="None";
$armortype="Chest";
$armorbase=3;
$itemvalue = 2 * $itemlevel * 5;

include ('includes/addinv.php');
//**********************end canvas shirt ************
//*******************CANVAS PANTS*********
include ('includes/zeroinv.php');

$itemname="Worn Canvas Pants";
$itemdescription="This is an ordinary pair of Canvas Pants, a little worn for the wear.";
$itemtype="Armor";
$itemimage="worncanvaspants";

$itemlevel=1;
$itemrarity="Common";
$itemvalue = 2 * $itemlevel * 5;
$equiplocation="Legs";
$equipable=1;
$weapontype="None";
$armortype="Legs";
$armorbase=3;

include ('includes/addinv.php');
//**********************END CANVAS PANTS************
}
  if ($bedroomwardrobe==1)
  {
//********* HTML FOR SEARCHING AND NOTHING FOUND ************
echo $search1."the wardrobe".$search2.$nothing;
  }
  }
if ($row['map']=="homeup" and $row['xaxis']==3 and $row['yaxis']==2)
  {
  if ($bedroomdesk==0)
  {
//************HTML SEARCH AND FIND**********************
echo $search1."the desk".$search2.$found1."smallwaterskin".$found2."Small Waterskin".$found3."lockpick".$found2."3 Lockpicks".$experience."10".$endsearch;
//***********UPDATE QUEST FLAG AND EXPERIENCE ************************
 $stmt = $db->prepare('UPDATE flags SET bedroomdesk = 1 WHERE charname= :charname');
					$stmt->execute(array(':charname' => $charname));
$stmt = $db->prepare('UPDATE charstats SET experience = experience + 10 WHERE charname= :charname');
					$stmt->execute(array(':charname' => $charname)); 
//*******************add canvas shirt*********
include ('includes/zeroinv.php');

$itemname="Small Waterskin";
$itemdescription="This water container holds about one eight-hour serving of water, and it is refillable.";
$itemtype="Food";
$itemimage="smallwaterskin";
$itemlevel=1;
$itemrarity="Common";
$maxwater=1;
$othertype="Water";

include ('includes/addinv.php');
//**********************end canvas shirt ************
$stmt = $db->prepare('UPDATE inventory SET keep = keep + 3 WHERE charname= :charname AND itemname = "lockpick"');
					$stmt->execute(array(':charname' => $charname));
}
  if ($bedroomdesk==1)
  {
//********* HTML FOR SEARCHING AND NOTHING FOUND ************
echo $search1."the desk".$search2.$nothing;
  }
  }
if ($row['map']=="homeup" and $row['xaxis']==1 and $row['yaxis']==2)
  {
  if ($bedroomcoatrack==0)
  {
//************HTML SEARCH AND FIND**********************
  echo $search1."the coatrack".$search2.$found1."worncanvascloak".$found2."Worn Canvas Cloak".$found3."worncanvashat".$found2."Worn Canvas Hat".$experience."10".$endsearch;
  
//***********UPDATE QUEST FLAG AND EXPERIENCE ************************
 $stmt = $db->prepare('UPDATE flags SET bedroomcoatrack = 1 WHERE charname= :charname') ;
					$stmt->execute(array(':charname' => $charname));

$stmt = $db->prepare('UPDATE charstats SET experience = experience + 10 WHERE charname= :charname') ;
					$stmt->execute(array(':charname' => $charname));
//*******************add canvas shirt*********

include ('includes/zeroinv.php');

$itemname="Worn Canvas Cloak";
$itemdescription="This is an ordinary Canvas Cloak, a little worn for the wear.";
$itemtype="Armor";
$itemimage="worncanvascloak";

$itemlevel=1;
$itemrarity="Common";

$equiplocation="Back";
$equipable=1;
$armortype="Back";
$armorbase=3;
$itemvalue = 2 * $itemlevel * 5;

include ('includes/addinv.php');
 
//**********************end canvas shirt ************

//*******************add canvas shirt*********

include ('includes/zeroinv.php');

$itemname="Worn Canvas Hat";
$itemdescription="This is an ordinary Canvas Hat, a little worn for the wear.";
$itemtype="Armor";
$itemimage="worncanvashat";
$itemlevel=1;
$itemrarity="Common";

$equipable=1;
$equiplocation="Head";
$armortype="Head";
$armorbase=3;
$itemvalue = 2 * $itemlevel * 5;

include ('includes/addinv.php');
 
//**********************end canvas shirt ************

}
  if ($bedroomcoatrack==1)
  {
//********* HTML FOR SEARCHING AND NOTHING FOUND ************

echo $search1."the coat rack".$search2.$nothing;
  }
  }
  
if ($row['map']=="homeup" and $row['xaxis']==3 and $row['yaxis']==3)
  {
  if ($bedroomshelf==0)
  {
//************HTML SEARCH AND FIND**********************
  echo $search1."the shelf".$search2.$found1."bookoflaws".$found2."Book of Laws".$experience."5".$endsearch;

//***********UPDATE QUEST FLAG AND EXPERIENCE ************************
 $stmt = $db->prepare('UPDATE flags SET bedroomshelf = 1 WHERE charname= :charname') ;
					$stmt->execute(array(':charname' => $charname));

$stmt = $db->prepare('UPDATE charstats SET experience = experience + 5 WHERE charname= :charname') ;
					$stmt->execute(array(':charname' => $charname));

//*******************add inv*********

include ('includes/zeroinv.php');

$itemname="Book of Laws";
$itemdescription="This is your personal copy of the kingdom's required reading. On the worn cover the title, <b>'Book of Laws'</b> is scratched out, and under it is written <b>'Book O' Flaws'</b> in your own messy caligraphy.";
$itemtype="Other";
$itemimage="bookoflaws";
$itemlevel=1;
$itemrarity="Relic";
$readable=1;
$othertype="Book";

include ('includes/addinv.php');
 
//**********************end inv ************
}
  if ($bedroomshelf==1)
  {
//********* HTML FOR SEARCHING AND NOTHING FOUND ************

echo $search1."the shelf".$search2.$nothing;
  }
  }
  
if ($row['map']=="homeup" and $row['xaxis']==2 and $row['yaxis']==3)
  {
  if ($bedroomchest==0)
  {
//************HTML SEARCH AND FIND**********************
  echo $search1."the chest".$search2.$found1."worncanvasshoes".$found2."Worn Canvas Shoes".$experience."5".$endsearch;
 echo $search1."the chest".$search2.$found1."worncanvasshoes".$found2."Worn Canvas Shoes".$found3."worncanvasgloves".$found2."Worn Canvas Gloves".$experience."10".$endsearch;
//***********UPDATE QUEST FLAG AND EXPERIENCE ************************
 $stmt = $db->prepare('UPDATE flags SET bedroomchest = 1 WHERE charname= :charname') ;
					$stmt->execute(array(':charname' => $charname));

$stmt = $db->prepare('UPDATE charstats SET experience = experience + 10 WHERE charname= :charname') ;
					$stmt->execute(array(':charname' => $charname));

//*******************add inv*********

include ('includes/zeroinv.php');

$itemname="Worn Canvas Shoes";
$itemdescription="This is an ordinary pair of Canvas Shoes, a little worn for the wear.";
$itemtype="Armor";
$itemimage="worncanvasshoes";
$itemlevel=1;
$itemrarity="Common";

$equiplocation="Feet";
$equipable=1;
$armortype="Feet";
$armorbase=3;
$itemvalue = 2 * $itemlevel * 5;

include ('includes/addinv.php');

//add gloves
include ('includes/zeroinv.php');

$itemname="Worn Canvas Gloves";
$itemdescription="This is an ordinary pair of Canvas Gloves, a little worn for the wear.";
$itemtype="Armor";
$itemimage="worncanvasgloves";
$itemlevel=1;
$itemrarity="Common";

$equiplocation="Hands";
$equipable=1;
$armortype="Hands";
$armorbase=3;
$itemvalue = 2 * $itemlevel * 5;

include ('includes/addinv.php');
//**********************end inv ************
}
   if ($bedroomchest==1)
  {
//********* HTML FOR SEARCHING AND NOTHING FOUND ************
echo $search1."the Chest".$search2.$nothing;
  }
  }
  
if ($row['map']=="homeup" and $row['xaxis']==1 and $row['yaxis']==3)
  {
  if ($bedroombed==0)
  {

//************HTML SEARCH AND FIND**********************
  echo $search1."Bed".$search2.$found1."lockedbox".$found2."Locked Box".$experience."5".$quest."The Hidden Key Quest".$endsearch;
  
//***********UPDATE QUEST FLAG AND EXPERIENCE ************************
 $stmt = $db->prepare('UPDATE flags SET bedroombed = 1 WHERE charname= :charname') ;
					$stmt->execute(array(':charname' => $charname)); 

 $stmt = $db->prepare('UPDATE charstats SET experience = experience + 5 WHERE charname= :charname') ;
					$stmt->execute(array(':charname' => $charname));

//***************************************************ADD INV**********************************************************************
include ('includes/zeroinv.php');

$itemname="Locked Box";
$itemdescription="You remember hiding your most valued possession in this lockbox. It requires a special key.";
$itemtype="Other";
$itemimage="lockedbox";
$itemlevel=1;
$itemrarity="Relic";
$keylock=1;
$othertype="Container";

include ('includes/addinv.php');
//****************************************************END INV**********************************************************************

//**************SET CO-OCCURRING QUEST ACCORDING TO POSSIBLE ORDERS FOR DIALOGUE FLOW**********************************************
  if ($thehiddenkey==0)
  {
$stmt = $db->prepare('UPDATE flags SET thehiddenkey = 2 WHERE charname= :charname') ;
					$stmt->execute(array(':charname' => $charname));
  }
  if ($thehiddenkey==1)
  {
$stmt = $db->prepare('UPDATE flags SET thehiddenkey = 3 WHERE charname= :charname') ;
					$stmt->execute(array(':charname' => $charname));
  }
  if ($thehiddenkey==0)
  {
$stmt = $db->prepare('UPDATE flags SET thehiddenkey = 1 WHERE charname= :charname') ;
					$stmt->execute(array(':charname' => $charname));
  }
  if ($thehiddenkey==1)
  {
$stmt = $db->prepare('UPDATE flags SET thehiddenkey = 3 WHERE charname= :charname') ;
					$stmt->execute(array(':charname' => $charname));
  }
  }
      
  if ($bedroombed==1)
  {
//******************************************** HTML FOR SEARCHING AND NOTHING FOUND *****************************************
echo $search1."under the bed".$search2.$nothing;
  }
  }
}
if ($row['map']=="home")
{
if ($row['map']=="home" and $row['xaxis']==1 and $row['yaxis']==1)
  {
if ($homeshelf==0)
  {
//*******************************************************HTML SEARCH AND FIND************************************************
echo $search1."the shelf".$search2.$found1."book".$found2."Family History Book".$experience."5".$endsearch;
//*****************************************************UPDATE QUEST FLAG AND EXPERIENCE *************************************
$stmt = $db->prepare('UPDATE flags SET homeshelf = 1 WHERE charname= :charname') ;
					$stmt->execute(array(':charname' => $charname));
$stmt = $db->prepare('UPDATE charstats SET experience = experience + 5 WHERE charname= :charname') ;
					$stmt->execute(array(':charname' => $charname));
//************************************************************ADD INV********************************************************
include ('includes/zeroinv.php');

$itemname="Family History Book";
$itemdescription="This is your family's history book. It makes for interesting reading considering you do not know anything about your new family!";
$itemtype="Other";
$itemimage="book";
$itemlevel=1;
$itemrarity="Relic";
$readable=1;
$othertype="Book";

include ('includes/addinv.php');
//************************************************************END INV ********************************************************
  }
if ($homeshelf==1)
  {
//********************************************* HTML FOR SEARCHING AND NOTHING FOUND *****************************************
echo $search1."the Shelf".$search2.$nothing;  
}
}
if ($row['map']=="home" and $row['xaxis']==2 and $row['yaxis']==1)
{  
if ($homerug==0)
{
//*******************************************************HTML SEARCH AND FIND************************************************
  echo $search1."under the rug".$search2.$found1."lockpick".$found2."Lockpick".$experience."5".$endsearch;
//*****************************************************UPDATE QUEST FLAG AND EXPERIENCE *************************************
$stmt = $db->prepare('UPDATE flags SET homerug = 1 WHERE charname= :charname') ;
					$stmt->execute(array(':charname' => $charname));
$stmt = $db->prepare('UPDATE charstats SET experience = experience + 5 WHERE charname= :charname') ;
					$stmt->execute(array(':charname' => $charname));
 
$stmt = $db->prepare('UPDATE inventory SET keep = keep + 1 WHERE charname= :charname AND itemname = "Lockpick"');
					$stmt->execute(array(':charname' => $charname));
}
if ($homerug==1)
  {
//********************************************* HTML FOR SEARCHING AND NOTHING FOUND *****************************************
echo $search1."under the Rug".$search2.$nothing;  
  }
  }
if ($row['map']=="home" and $row['xaxis']==3 and $row['yaxis']==1)
  {
if ($homechest==0)
  {
echo $search1."the Chest".$search2.$locked1; 
 }
if ($homechest==1)
  {
echo $search1."the Chest".$search2.$nothing; 
  }
  }
if ($row['map']=="home" and $row['xaxis']==1 and $row['yaxis']==2)
  {
if ($homeshelf2==0)
  {

//*******************************************************HTML SEARCH AND FIND************************************************
  echo $search1."the Shelf".$search2.$found1."skillet".$found2."Skillet".$found3."oil".$found2."Cooking Oil".$experience."10".$endsearch;

//*****************************************************UPDATE QUEST FLAG AND EXPERIENCE *************************************
$stmt = $db->prepare('UPDATE flags SET homeshelf2 = 1 WHERE charname= :charname') ;
					$stmt->execute(array(':charname' => $charname));
$stmt = $db->prepare('UPDATE charstats SET experience = experience + 10 WHERE charname= :charname') ;
					$stmt->execute(array(':charname' => $charname));
//************************************************************ADD INV********************************************************
include ('includes/zeroinv.php');

$itemname="Iron Skillet";
$itemdescription="With this Iron Skillet and a fire source you can fry many foods.";
$itemtype="Other";
$itemimage="skillet";
$itemlevel=1;
$itemrarity="Common";
$othertype="Cooking";

include ('includes/addinv.php');

//************************************************************END INV ********************************************************
if (!$Oil)
{

//************************************************************ADD INV********************************************************
include ('includes/zeroinv.php');

$itemname="Oil";
$itemdescription="This type of cooking oil is needed for various recipes.";
$itemtype="Food";
$itemimage="oil";
$itemlevel=1;
$itemrarity="Common";
$itemvalue=1;
$singleuse=1;
$othertype="Ingredient";

include ('includes/addinv.php');

//************************************************************END INV ********************************************************
}
else
{
$stmt = $db->prepare('UPDATE inventory SET keep = keep + 1 WHERE charname= :charname AND itemname = "Oil"');
					$stmt->execute(array(':charname' => $charname));
}
}
if ($homeshelf2==1)
  {

//********************************************* HTML FOR SEARCHING AND NOTHING FOUND *****************************************
echo $search1."the Shelf".$search2.$nothing;  

}
}
if ($row['map']=="home" and $row['xaxis']==2 and $row['yaxis']==2)
  {
    
  if ($hometable==0)
  {
//*******************************************************HTML SEARCH AND FIND************************************************
  echo $search1."the table".$search2.$found1."rustyknife".$found2."Rusty Kitchen Knife".$experience."5".$endsearch;

//*****************************************************UPDATE QUEST FLAG AND EXPERIENCE *************************************
$stmt = $db->prepare('UPDATE flags SET hometable = 1 WHERE charname= :charname') ;
					$stmt->execute(array(':charname' => $charname));
$stmt = $db->prepare('UPDATE charstats SET experience = experience + 5 WHERE charname= :charname') ;
					$stmt->execute(array(':charname' => $charname));

//************************************************************ADD INV********************************************************
include ('includes/zeroinv.php');

$itemname="Rusty Kitchen Knife";
$itemdescription="This kitchen knife is quite rusty. It won't do much damage, but it is a weapon none the less.";
$itemtype="Weapon";
$itemimage="rustyknife";
$itemlevel=1;
$itemrarity="Common";
$equiplocation="Weapon";
$equipable=1;
$weapontype="Blade";
$weaponbase=2;
$damage=2;
$duality=1;
$itemrange=0;
$itemspeed=10;
$itemvalue=1*$itemlevel*5;



include ('includes/addinv.php');

//************************************************************END INV ********************************************************
}
  if ($hometable==1)
  {
//********************************************* HTML FOR SEARCHING AND NOTHING FOUND *****************************************
echo $search1."the Table".$search2.$nothing;  

}
}
if ($row['map']=="home" and $row['xaxis']==3 and $row['yaxis']==2)
  {

//*************************************************************************FIREPLACE DIALOGUE ***********************************************

$stmt = $db->prepare("SELECT homefireplace FROM flags WHERE charname=:charname;");
				$stmt->execute(array(':charname' => $charname));			
while($row = $stmt->fetch())
	{
if ($row['homefireplace']==1)
  {

//********************************************* HTML FOR SEARCHING AND NOTHING FOUND *****************************************
echo $search1."the Fireplace".$search2.$nothing;  

}
if ($row['homefireplace']==0)
  {

//*******************************************************HTML SEARCH AND FIND************************************************
  echo $search1."the Fireplace".$search2.$found1."tinderbox".$found2."Tinderbox".$found3."firewood".$found2."Firewood x3".$experience."10".$endsearch;

//*****************************************************UPDATE QUEST FLAG AND EXPERIENCE *************************************
$stmt = $db->prepare('UPDATE flags SET homefireplace = 1 WHERE charname= :charname') ;
					$stmt->execute(array(':charname' => $charname));
$stmt = $db->prepare('UPDATE charstats SET experience = experience + 10 WHERE charname= :charname') ;
					$stmt->execute(array(':charname' => $charname));
//************************************************************ADD INV********************************************************
include ('includes/zeroinv.php');

$itemname="Tinderbox";
$itemdescription="This tinderbox contains items to start a fire including flint and tinder.";
$itemtype="Other";
$itemimage="tinderbox";
$itemlevel=1;
$itemrarity="Common";
$othertype="Container";

include ('includes/addinv.php');

//************************************************************END INV ********************************************************

if (!$Firewood)
{
//************************************************************ADD INV********************************************************
include ('includes/zeroinv.php');
$itemname="Firewood";
$itemdescription="With firewood and flint you can start a fire in the proper area such as a fireplace or campsite.";
$itemtype="Other";
$itemimage="firewood";
$itemlevel=1;
$itemrarity="Common";
$itemvalue=0;
$keep=3;
$othertype="Firewood";
include ('includes/addinv.php');

//************************************************************END INV ********************************************************
}
else
{
$stmt = $db->prepare('UPDATE inventory SET keep = keep + 3 WHERE charname= :charname AND itemname = "Firewood"');
					$stmt->execute(array(':charname' => $charname));
}
}
}
}  
  
if ($row['map']=="home" and $row['xaxis']==1 and $row['yaxis']==3)
  {
  if ($homepantry==0)
  {
	//*******************************************************HTML SEARCH AND FIND************************************************
  echo $search1."the Kitchen Pantry".$search2.$found1."meat".$found2."Raw Meat x2".$found3."bread".$found2."Bread x6".$experience."10".$endsearch;  

//*****************************************************UPDATE QUEST FLAG AND EXPERIENCE *************************************
$stmt = $db->prepare('UPDATE flags SET homepantry = 1 WHERE charname= :charname') ;
					$stmt->execute(array(':charname' => $charname));
$stmt = $db->prepare('UPDATE charstats SET experience = experience + 10 WHERE charname= :charname') ;
					$stmt->execute(array(':charname' => $charname));


if (!$rawmeat)
{
//************************************************************ADD INV********************************************************
include ('includes/zeroinv.php');
$itemname="Raw Meat";
$itemdescription="This meat needs to be cooked before eaten.";
$itemtype="Food";
$itemimage="meat";
$itemlevel=1;
$itemrarity="Common";
$itemvalue=1;
$keep=2;
$othertype="Ingredient";
include ('includes/addinv.php');

//************************************************************END INV ********************************************************
}

else
{
$stmt = $db->prepare('UPDATE inventory SET keep = keep + 2 WHERE charname= :charname AND itemname = "Raw Meat"');
					$stmt->execute(array(':charname' => $charname));
}

if (!$Bread)
{
//************************************************************ADD INV********************************************************
include ('includes/zeroinv.php');
$itemname="Bread";
$itemdescription="This is regular wheat bread.";
$itemtype="Food";
$itemimage="bread";
$itemlevel=1;
$itemrarity="Common";
$itemvalue=1;
$keep=6;
$consumable=1;
$singleuse=1;
$othertype="Consumable";
$enhancement1="Life: +5";
$enhancement2="Mana: +5";
include ('includes/addinv.php');

//************************************************************END INV ********************************************************

}

else
{
$stmt = $db->prepare('UPDATE inventory SET keep = keep + 6 WHERE charname= :charname AND itemname = "Bread"');
					$stmt->execute(array(':charname' => $charname));
}


}
  if ($homepantry==1)
  {
//********************************************* HTML FOR SEARCHING AND NOTHING FOUND *****************************************
echo $search1."the Kitchen Pantry".$search2.$nothing; 	  
}
  }
 
if ($row['map']=="home" and $row['xaxis']==2 and $row['yaxis']==3)
  {
  if ($homerack==0)
  {
//*******************************************************HTML SEARCH AND FIND************************************************
  echo $search1."the Herb Rack".$search2.$found1."cinnamon".$found2."Cinnamon x2".$found3."salt".$found2."Salt x3".$experience."10".$endsearch;  
//*****************************************************UPDATE QUEST FLAG AND EXPERIENCE *************************************
$stmt = $db->prepare('UPDATE flags SET homerack = 1 WHERE charname= :charname') ;
					$stmt->execute(array(':charname' => $charname));
$stmt = $db->prepare('UPDATE charstats SET experience = experience + 10 WHERE charname= :charname') ;
					$stmt->execute(array(':charname' => $charname));

if (!$Cinnamon)
{
	//************************************************************ADD INV********************************************************
include ('includes/zeroinv.php');

$itemname="Cinnamon";
$itemdescription="This spice is an important ingredient for flavour for many recipes.";
$itemtype="Food";
$itemimage="cinnamon";
$itemlevel=1;
$itemrarity="Common";
$itemvalue=1;
$keep=2;
$othertype="Ingredient";
include ('includes/addinv.php');

//************************************************************END INV ********************************************************
}

else
{
	$stmt = $db->prepare('UPDATE inventory SET keep = keep + 2 WHERE charname= :charname AND itemname = "Cinnamon"');
					$stmt->execute(array(':charname' => $charname));
}

if (!$Salt)
{
//************************************************************ADD INV********************************************************
include ('includes/zeroinv.php');

$itemname="Salt";
$itemdescription="Salt is a very important ingredient to many recipes and potions.";
$itemtype="Food";
$itemimage="salt";
$itemlevel=1;
$itemrarity="Common";
$itemvalue=1;
$othertype="Ingredient";
include ('includes/addinv.php');

//************************************************************END INV ********************************************************
}

else
{
	$stmt = $db->prepare('UPDATE inventory SET keep = keep + 1 WHERE charname= :charname AND itemname = "Salt"');
					$stmt->execute(array(':charname' => $charname));
}


}
  if ($homerack==1)
  {
//********************************************* HTML FOR SEARCHING AND NOTHING FOUND *****************************************
echo $search1."the Herb Rack".$search2.$nothing; 
  }
  }

if ($row['map']=="home" and $row['xaxis']==3 and $row['yaxis']==3)
  {
  if ($homedrawer==0)
  {
	  //*******************************************************HTML SEARCH AND FIND************************************************
  echo $search1."the End Table Drawer".$search2.$found1."purse".$found2."Purse".$experience."5".$endsearch; 
 //*****************************************************UPDATE QUEST FLAG AND EXPERIENCE *************************************
$stmt = $db->prepare('UPDATE flags SET homedrawer = 1 WHERE charname= :charname') ;
					$stmt->execute(array(':charname' => $charname));
$stmt = $db->prepare('UPDATE charstats SET experience = experience + 5 WHERE charname= :charname') ;
					$stmt->execute(array(':charname' => $charname));  
//************************************************************ADD INV********************************************************
include ('includes/zeroinv.php');
$itemname="Purse";
$itemdescription="The only way to know what this purse contains is to open it.";
$itemtype="Other";
$itemimage="purse";
$itemlevel=1;
$itemrarity="Common";
$othertype="Container";
include ('includes/addinv.php');

//************************************************************END INV ********************************************************
}
  if ($homedrawer==1)
  {
	  //********************************************* HTML FOR SEARCHING AND NOTHING FOUND *****************************************
echo $search1."the End Table Drawer".$search2.$nothing; 
  }
  }

}
if ($row['map']=="yard")
{
if ($row['map']=="yard" and $row['xaxis']==3 and $row['yaxis']==3)
  {
  if ($shepfeed==0)
  {
	  //*******************************************************HTML SEARCH AND FIND************************************************
  echo $search1."the dog house and notice something strange in Shep's food bowl. You reach into the little house to get the strange item when".$search2."Old Shep snarls and bites you! Maybe Old Shep is hungry. He sure took a bite out of your arm! -5 Life".$endsearch;
 
$stmt = $db->prepare('UPDATE charstats SET life = life - 5 WHERE charname= :charname') ;
					$stmt->execute(array(':charname' => $charname)); 
}
    
  if ($shepfeed==1)
  {
	//*******************************************************HTML SEARCH AND FIND************************************************
  echo $search1."the dog house and notice something strange in Shep's food bowl. You reach into the little house to get the strange item when".$search2.$found1."bonekey".$found2."Bone Key".$experience."5".$quest."The Lost Key Quest".$endsearch; 
 //*****************************************************UPDATE QUEST FLAG AND EXPERIENCE *************************************
$stmt = $db->prepare('UPDATE flags SET shepfeed = 2 WHERE charname= :charname') ;
					$stmt->execute(array(':charname' => $charname));
$stmt = $db->prepare('UPDATE charstats SET experience = experience + 5 WHERE charname= :charname') ;
					$stmt->execute(array(':charname' => $charname));  
  
//add key
//************************************************************ADD INV********************************************************
include ('includes/zeroinv.php');
$itemname="Bone Key";
$itemdescription="This key appears to be made out of Bone, and is shaped like a bone as well.";
$itemtype="Other";
$itemimage="bonekey";
$itemlevel=2;
$itemrarity="Unique";
$othertype="Key"; 
include ('includes/addinv.php');

//************************************************************END INV ********************************************************
}

if ($shepfeed==2)
  {
//********************************************* HTML FOR SEARCHING AND NOTHING FOUND *****************************************
echo $search1."Shep's Dog House".$search2.$nothing;
}

}
if ($row['map']=="yard" and $row['xaxis']==2 and $row['yaxis']==1)
  {
  if ($yardgarden==0)
  {

//*******************************************************HTML SEARCH AND FIND************************************************
echo $search1."the Garden".$search2.$found1."lettuce".$found2."Lettuce x3".$experience."5".$endsearch;
//*****************************************************UPDATE QUEST FLAG AND EXPERIENCE *************************************
$stmt = $db->prepare('UPDATE flags SET yardgarden = 1 WHERE charname= :charname') ;
					$stmt->execute(array(':charname' => $charname));
$stmt = $db->prepare('UPDATE charstats SET experience = experience + 5 WHERE charname= :charname') ;
					$stmt->execute(array(':charname' => $charname));

if (!$lettuce)
{
//************************************************************ADD INV********************************************************
include ('includes/zeroinv.php');
$itemname="Lettuce";
$itemdescription="Lettuce may be consumed raw, but is much better in a recipe or salad.";
$itemtype="Food";
$itemimage="lettuce";
$itemlevel=1;
$itemrarity="Common";
$itemvalue=1;
$keep=3;
$consumable=1;
$singleuse=1;
$othertype="Consumable";
$enhancement1="Mana +5";
include ('includes/addinv.php');
//************************************************************END INV 
}

else
{
$stmt = $db->prepare('UPDATE inventory SET keep = keep + 3 WHERE charname= :charname AND itemname = "Lettuce"');
					$stmt->execute(array(':charname' => $charname));
}
}

 if ($yardgarden==1)
  {
//*******************************************************HTML SEARCH AND FIND************************************************
echo $search1."the Garden".$search2.$found1."lettuce".$found2."Lettuce x3".$experience."5".$endsearch;
//*****************************************************UPDATE QUEST FLAG AND EXPERIENCE *************************************
$stmt = $db->prepare('UPDATE flags SET yardgarden1 = 2 WHERE charname= :charname') ;
					$stmt->execute(array(':charname' => $charname));
$stmt = $db->prepare('UPDATE charstats SET experience = experience + 5 WHERE charname= :charname') ;
					$stmt->execute(array(':charname' => $charname));

if (!$lettuce)
{
//************************************************************ADD INV********************************************************
include ('includes/zeroinv.php');
$itemname="Lettuce";
$itemdescription="Lettuce may be consumed raw, but is much better in a recipe or salad.";
$itemtype="Food";
$itemimage="lettuce";
$itemlevel=1;
$itemrarity="Common";
$itemvalue=1;
$keep=3;
$consumable=1;
$singleuse=1;
$othertype="Consumable";
$enhancement1="Mana +5";
include ('includes/addinv.php');
//************************************************************END INV 
}

else
{
$stmt = $db->prepare('UPDATE inventory SET keep = keep + 3 WHERE charname= :charname AND itemname = "Lettuce"');
					$stmt->execute(array(':charname' => $charname));
}
$query=sprintf("update inventory set keep=keep+3 where username='%s' and itemname='Lettuce';", mysql_real_escape_string($username));
mysql_query ($query);

}


  if ($yardgarden==2)
  {
//********************************************* HTML FOR SEARCHING AND NOTHING FOUND *****************************************
echo $search1."the Garden".$search2.$nothingtryagain; 
}
}
if ($row['map']=="yard" and $row['xaxis']==1 and $row['yaxis']==2)
  {
  if ($yardmelon==0)
  {

//*******************************************************HTML SEARCH AND FIND************************************************
echo $search1."the Melon Vines".$search2.$found1."pumpkin".$found2."Melon x3".$experience."5".$endsearch;
//*****************************************************UPDATE QUEST FLAG AND EXPERIENCE *************************************
$stmt = $db->prepare('UPDATE flags SET yardmelon = 1 WHERE charname= :charname') ;
					$stmt->execute(array(':charname' => $charname));
$stmt = $db->prepare('UPDATE charstats SET experience = experience + 5 WHERE charname= :charname') ;
					$stmt->execute(array(':charname' => $charname));
if (!$melon)
{
//************************************************************ADD INV********************************************************
include ('includes/zeroinv.php');
$itemname="Melon";
$itemdescription="Melons may be consumed raw or cooked in recipes.";
$itemtype="Food";
$itemimage="melon";
$itemlevel=1;
$itemrarity="Common";
$itemvalue=1;
$keep=3;
$consumable=1;
$singleuse=1;
$othertype="Consumable";
$enhancement1="Life +5";
$enhancement2="Mana +5";
include ('includes/addinv.php');
//************************************************************END INV ****************

}

else
{
$stmt = $db->prepare('UPDATE inventory SET keep = keep + 3 WHERE charname= :charname AND itemname = "Melon"');
					$stmt->execute(array(':charname' => $charname));
}
}

if ($yardmelon==1)
  {
 //*******************************************************HTML SEARCH AND FIND************************************************
echo $search1."the Melon Vines".$search2.$found1."pumpkin".$found2."Melon x3".$experience."5".$endsearch;
//*****************************************************UPDATE QUEST FLAG AND EXPERIENCE *************************************
$stmt = $db->prepare('UPDATE flags SET yardmelon = 2 WHERE charname= :charname') ;
					$stmt->execute(array(':charname' => $charname));
$stmt = $db->prepare('UPDATE charstats SET experience = experience + 5 WHERE charname= :charname') ;
					$stmt->execute(array(':charname' => $charname));
  
if (!$melon)
{
//************************************************************ADD INV********************************************************
include ('includes/zeroinv.php');
$itemname="Melon";
$itemdescription="Melons may be consumed raw or cooked in recipes.";
$itemtype="Food";
$itemimage="melon";
$itemlevel=1;
$itemrarity="Common";
$itemvalue=1;
$keep=3;
$consumable=1;
$singleuse=1;
$othertype="Consumable";
$enhancement1="Life +5";
$enhancement2="Mana +5";
include ('includes/addinv.php');
//************************************************************END INV ****************

}

else
{
$stmt = $db->prepare('UPDATE inventory SET keep = keep + 3 WHERE charname= :charname AND itemname = "Melon"');
					$stmt->execute(array(':charname' => $charname));
}
}

  if ($yardmelon==2)
  {
//********************************************* HTML FOR SEARCHING AND NOTHING FOUND *****************************************
echo $search1."the Melon Vines".$search2.$nothingtryagain; 
}
  
}
if ($row['map']=="yard" and $row['xaxis']==3 and $row['yaxis']==1)
  {
  if ($yardtrees==0)
  {
 
//*******************************************************HTML SEARCH AND FIND************************************************
echo $search1."the Fruit Tree".$search2.$found1."apple".$found2."Apple x3".$experience."5".$endsearch;
//*****************************************************UPDATE QUEST FLAG AND EXPERIENCE *************************************
$stmt = $db->prepare('UPDATE flags SET yardtrees = 1 WHERE charname= :charname') ;
					$stmt->execute(array(':charname' => $charname));
$stmt = $db->prepare('UPDATE charstats SET experience = experience + 5 WHERE charname= :charname') ;
					$stmt->execute(array(':charname' => $charname));

if (!$apple)
{
//************************************************************ADD INV********************************************************
include ('includes/zeroinv.php');
$itemname="Apple";
$itemdescription="Apples may be consumed raw or cooked in recipes.";
$itemtype="Food";
$itemimage="apple";
$itemlevel=1;
$itemrarity="Common";
$itemvalue=1;
$keep=3;
$consumable=1;
$singleuse=1;
$othertype="Consumable";
$enhancement1="Life +5";
include ('includes/addinv.php');
//************************************************************END INV ****************
}

else
{
	$stmt = $db->prepare('UPDATE inventory SET keep = keep + 3 WHERE charname= :charname AND itemname = "Apple"');
					$stmt->execute(array(':charname' => $charname));
}
}

 if ($yardtrees==1)
  {
    
//*******************************************************HTML SEARCH AND FIND************************************************
echo $search1."the Fruit Tree".$search2.$found1."apple".$found2."Apple x3".$experience."5".$endsearch;
//*****************************************************UPDATE QUEST FLAG AND EXPERIENCE *************************************
$stmt = $db->prepare('UPDATE flags SET yardtrees = 2 WHERE charname= :charname') ;
					$stmt->execute(array(':charname' => $charname));
$stmt = $db->prepare('UPDATE charstats SET experience = experience + 5 WHERE charname= :charname') ;
					$stmt->execute(array(':charname' => $charname));

if (!$apple)
{
//************************************************************ADD INV********************************************************
include ('includes/zeroinv.php');
$itemname="Apple";
$itemdescription="Apples may be consumed raw or cooked in recipes.";
$itemtype="Food";
$itemimage="apple";
$itemlevel=1;
$itemrarity="Common";
$itemvalue=1;
$keep=3;
$consumable=1;
$singleuse=1;
$othertype="Consumable";
$enhancement1="Life +5";
include ('includes/addinv.php');
//************************************************************END INV ****************
}

else
{
	$stmt = $db->prepare('UPDATE inventory SET keep = keep + 3 WHERE charname= :charname AND itemname = "Apple"');
					$stmt->execute(array(':charname' => $charname));
}
}

  if ($yardtrees==2)
  {
//********************************************* HTML FOR SEARCHING AND NOTHING FOUND *****************************************
echo $search1."the Fruit Trees".$search2.$nothingtryagain; 	  

  }
}
if ($row['map']=="yard" and $row['xaxis']==3 and $row['yaxis']==2)
  {
  if ($yardcoop==0)
  {

//*******************************************************HTML SEARCH AND FIND************************************************
echo $search1."the Chicken Coop".$search2.$found1."egg".$found2."Egg x3".$experience."5".$endsearch;
//*****************************************************UPDATE QUEST FLAG AND EXPERIENCE *************************************
$stmt = $db->prepare('UPDATE flags SET yardcoop = 1 WHERE charname= :charname') ;
					$stmt->execute(array(':charname' => $charname));
$stmt = $db->prepare('UPDATE charstats SET experience = experience + 5 WHERE charname= :charname') ;
					$stmt->execute(array(':charname' => $charname));
 

if (!$egg)
{
//************************************************************ADD INV********************************************************
include ('includes/zeroinv.php');
$itemname="Egg";
$itemdescription="Eggs must be cooked in order to be eaten.";
$itemtype="Food";
$itemimage="egg";
$itemlevel=1;
$itemrarity="Common";
$itemvalue=1;
$keep=3;
$othertype="Ingredient";
include ('includes/addinv.php');
//************************************************************END INV ****************
}

else
{
$stmt = $db->prepare('UPDATE inventory SET keep = keep + 3 WHERE charname= :charname AND itemname = "Egg"');
					$stmt->execute(array(':charname' => $charname));
}
}

if ($yardcoop==1)
  {
  
//*******************************************************HTML SEARCH AND FIND************************************************
echo $search1."the Chicken Coop".$search2.$found1."egg".$found2."Egg x3".$experience."5".$endsearch;
//*****************************************************UPDATE QUEST FLAG AND EXPERIENCE *************************************
$stmt = $db->prepare('UPDATE flags SET yardcoop = 2 WHERE charname= :charname') ;
					$stmt->execute(array(':charname' => $charname));
$stmt = $db->prepare('UPDATE charstats SET experience = experience + 5 WHERE charname= :charname') ;
					$stmt->execute(array(':charname' => $charname));
 

if (!$egg)
{
//************************************************************ADD INV********************************************************
include ('includes/zeroinv.php');
$itemname="Egg";
$itemdescription="Eggs must be cooked in order to be eaten.";
$itemtype="Food";
$itemimage="egg";
$itemlevel=1;
$itemrarity="Common";
$itemvalue=1;
$keep=3;
$othertype="Ingredient";
include ('includes/addinv.php');
//************************************************************END INV ****************
}

else
{
$stmt = $db->prepare('UPDATE inventory SET keep = keep + 3 WHERE charname= :charname AND itemname = "Egg"');
					$stmt->execute(array(':charname' => $charname));
}
}

if ($yardcoop==2)
  {
//********************************************* HTML FOR SEARCHING AND NOTHING FOUND *****************************************
echo $search1."the Chicken Coop".$search2.$nothingtryagain; 
}
}
}
if ($row['map']=="cellar")
{
if ($row['xaxis']==1 and $row['yaxis']==1)
  {
//*****************ENTER ITEM AND FLAG**********
$itemsearched = 'the Canvas Bag';
$flagname = 'cellarrice';

if ($cellarrice==0)
  {
//*******************ENTER FLAG NUMBER AND EXPERIENCE AMOUNT**************
$flagnumber = 1;
$experienceamt = 5;	  

//**********************ENTER INVENTORY VARIABLES************************
if (!$rice)
{
//*********set variables new inventory item************
include ('includes/zeroinv.php');  
$itemname="Dry Rice";
$itemdescription="Dry Rice must be cooked before eaten.";
$itemtype="Food";
$itemimage="rice";
$itemlevel=1;
$itemrarity="Common";
$itemvalue=1;
$keep=10;
$othertype="Ingerdient";
include ('includes/addinv.php');
}
else
{
//**************set variables for each update
$itemname="Dry Rice";
$itemimage="rice";
$keep=10;
//**********************UPDATE INVENTORY****************************************************
$stmt = $db->prepare('UPDATE inventory SET keep = keep + :keep WHERE charname= :charname AND itemname = :itemname');
					$stmt->execute(array(
					':keep' => $keep,
					':charname' => $charname,
					':itemname' => $itemname
					));
}
//************HTML SEARCH AND FIND SINGLE ITEM**********************
echo $search1.$itemsearched.$search2.$found1.$itemimage.$found2.$itemname.' X'.$keep.$experience.$experienceamt.$endsearch;
//***********UPDATE QUEST FLAG AND EXPERIENCE ************************
$stmt = $db->prepare('UPDATE flags SET :flagname = :flagnumber WHERE charname= :charname') ;
					$stmt->execute(array(':flagname' => $flagname, ':flagnumber' => $flagnumber,':charname' => $charname)); 
$stmt = $db->prepare('UPDATE charstats SET experience = experience + :experienceamt WHERE charname= :charname') ;
					$stmt->execute(array(':experienceamt' => $experienceamt, ':charname' => $charname));
}
if ($cellarrice==1)
{
 //********************************************* HTML FOR SEARCHING AND NOTHING FOUND *****************************************
echo $search1.$itemsearched.$search2.$nothing; 
 } 
}
if ($row['map']=="cellar" and $row['xaxis']==3 and $row['yaxis']==1)
  {
//*****************ENTER ITEM AND FLAG**********
$itemsearched = 'the Canvas Bag';
$flagname = 'cellarveggie';	
  
if ($cellarveggie==0)
  {
//*******************ENTER FLAG NUMBER AND EXPERIENCE AMOUNT**************
$flagnumber = 1;
$experienceamt = 5;	  
	  
//**********************ENTER INVENTORY VARIABLES************************
if (!$vegetables)
{
//*********set variables new inventory item************
include ('includes/zeroinv.php');  
$itemname="Vegetable";
$itemdescription="The various vegetables you find may be consumed raw or cooked in recipes.";
$itemtype="Food";
$itemimage="vegetables";
$itemlevel=1;
$itemrarity="Common";
$itemvalue=1;
$keep=5;
$consumable=1;
$singleuse=1;
$othertype="Consumable";
$enhancement1="Life +5";
$enhancement2="Mana +5";
include ('includes/addinv.php');
}
else
{
//**************set variables for each update
$itemname="Vegetable";
$itemimage="vegetables";
$keep=5;
//**********************UPDATE INVENTORY****************************************************
$stmt = $db->prepare('UPDATE inventory SET keep = keep + :keep WHERE charname= :charname AND itemname = :itemname');
					$stmt->execute(array(
					':keep' => $keep,
					':charname' => $charname,
					':itemname' => $itemname
					));
}

//************HTML SEARCH AND FIND SINGLE ITEM**********************
echo $search1.$itemsearched.$search2.$found1.$itemimage.$found2.$itemname.' X'.$keep.$experience.$experienceamt.$endsearch;
//***********UPDATE QUEST FLAG AND EXPERIENCE ************************
$stmt = $db->prepare('UPDATE flags SET :flagname = :flagnumber WHERE charname= :charname') ;
					$stmt->execute(array(':flagname' => $flagname, ':flagnumber' => $flagnumber,':charname' => $charname)); 
$stmt = $db->prepare('UPDATE charstats SET experience = experience + :experienceamt WHERE charname= :charname') ;
					$stmt->execute(array(':experienceamt' => $experienceamt, ':charname' => $charname));

}

if ($cellarveggie==1)
  {
//********************************************* HTML FOR SEARCHING AND NOTHING FOUND *****************************************
echo $search1.$itemsearched.$search2.$nothing; 
}
}
if ($row['map']=="cellar" and $row['xaxis']==1 and $row['yaxis']==2)
  {
//*****************ENTER ITEM AND FLAG**********
$itemsearched = 'the Wooden Crate';
$flagname = 'cellaritem';	
	  
  if ($cellaritem==0)
  {
//*******************ENTER FLAG NUMBER AND EXPERIENCE AMOUNT**************
$flagnumber = 1;
$experienceamt = 5;	  
//************RRANDOM EQUIPABLE ITEM**************************************
include ('includes/randitem1.php');

//************HTML SEARCH AND FIND SINGLE ITEM**********************
echo $search1.$itemsearched.$search2.$found1.$itemimage.$found2.$itemname.' X'.$keep.$experience.$experienceamt.$endsearch;
//***********UPDATE QUEST FLAG AND EXPERIENCE ************************
$stmt = $db->prepare('UPDATE flags SET :flagname = :flagnumber WHERE charname= :charname') ;
					$stmt->execute(array(':flagname' => $flagname, ':flagnumber' => $flagnumber,':charname' => $charname)); 
$stmt = $db->prepare('UPDATE charstats SET experience = experience + :experienceamt WHERE charname= :charname') ;
					$stmt->execute(array(':experienceamt' => $experienceamt, ':charname' => $charname));
}

 if ($cellaritem==1)
  {
//********************************************* HTML FOR SEARCHING AND NOTHING FOUND *****************************************
echo $search1.$itemsearched.$search2.$nothing; 
}
}
if ($row['map']=="cellar" and $row['xaxis']==3 and $row['yaxis']==2)
  {
$itemsearched = 'the Wooden Crate';
$flagname = 'cellarpurse';		  
	  
  if ($cellarpurse==0)
  {
//*******************ENTER FLAG NUMBER AND EXPERIENCE AMOUNT**************
$flagnumber = 1;
$experienceamt = 5;	  
//**************right now just money purse, more added later maybe**************** 
include ('includes/randother.php');
//************HTML SEARCH AND FIND SINGLE ITEM**********************
echo $search1.$itemsearched.$search2.$found1.$itemimage.$found2.$itemname.' X'.$keep.$experience.$experienceamt.$endsearch;
//***********UPDATE QUEST FLAG AND EXPERIENCE ************************
include ('includes/updatequest.php');
}

 if ($cellarpurse==1)
  {
//********************************************* HTML FOR SEARCHING AND NOTHING FOUND *****************************************
echo $search1.$itemsearched.$search2.$nothing; 
}
}
if ($row['map']=="cellar" and $row['xaxis']==1 and $row['yaxis']==3)
  {
$itemsearched = 'the Bottle Rack';
$flagname = 'cellarbottle';		  
	  
if ($cellarbottle==0)
  {
//*******************ENTER FLAG NUMBER AND EXPERIENCE AMOUNT**************
$flagnumber = 1;
$experienceamt = 5;	  

//**********************ENTER INVENTORY VARIABLES************************
if (!$bottle)
{
//*********set variables new inventory item************
include ('includes/zeroinv.php');  
$itemname="Bottle";
$itemdescription="These bottles can be used to hold water or for use in potions.";
$itemtype="Food";
$itemimage="bottle";
$itemlevel=1;
$itemrarity="Common";
$itemvalue=1;
$keep=3;
$maxwater=1;
$othertype="Water";
include ('includes/addinv.php');
}
else
{
//**************set variables for each update
$itemimage = 'bottle';
$itemname = 'Bottle';
$keep=3;
//**********************UPDATE INVENTORY****************************************************
include ('includes/updateinv.php');
}
//************HTML SEARCH AND FIND SINGLE ITEM**********************
echo $search1.$itemsearched.$search2.$found1.$itemimage.$found2.$itemname.' X'.$keep.$experience.$experienceamt.$endsearch;

//***********UPDATE QUEST FLAG AND EXPERIENCE ************************
include ('includes/updatequest.php');

}
if ($cellarbottle==1)
  {
//********************************************* HTML FOR SEARCHING AND NOTHING FOUND *****************************************
echo $search1.$itemsearched.$search2.$nothing; 
}
}
if ($row['map']=="cellar" and $row['xaxis']==3 and $row['yaxis']==3)
  {
$itemsearched = 'the Wine Rack';
$flagname = 'cellarpotion';	

if ($cellarpotion==0)
  {
//*******************ENTER FLAG NUMBER AND EXPERIENCE AMOUNT**************
$flagnumber = 1;
$experienceamt = 5;	
//*****************INVENTORY*********************  
include ('includes/randpotion.php');
//************HTML SEARCH AND FIND SINGLE ITEM**********************
echo $search1.$itemsearched.$search2.$found1.$itemimage.$found2.$itemname.' X'.$keep.$experience.$experienceamt.$endsearch;

//***********UPDATE QUEST FLAG AND EXPERIENCE ************************
include ('includes/updatequest.php');
}

 if ($cellarpotion==1)
  {
//********************************************* HTML FOR SEARCHING AND NOTHING FOUND *****************************************
echo $search1.$itemsearched.$search2.$nothing; 
}
}
if ($row['map']=="cellar" and $row['xaxis']==3 and $row['yaxis']==4)
  {
$itemsearched = 'the Shelf';
$flagname = 'cellarshelf';		  
  if ($cellarshelf==0)
  {
//*******************ENTER FLAG NUMBER AND EXPERIENCE AMOUNT**************
$flagnumber = 1;
$experienceamt = 5;	
//*****************INVENTORY*********************  
include ('includes/randscroll.php');
//************HTML SEARCH AND FIND SINGLE ITEM**********************
echo $search1.$itemsearched.$search2.$found1.$itemimage.$found2.$itemname.' X'.$keep.$experience.$experienceamt.$endsearch;

//***********UPDATE QUEST FLAG AND EXPERIENCE ************************
include ('includes/updatequest.php'); 
}

 if ($cellarshelf==1)
  {
//********************************************* HTML FOR SEARCHING AND NOTHING FOUND *****************************************
echo $search1.$itemsearched.$search2.$nothing; 
}
}
if ($row['map']=="cellar" and $row['xaxis']==2 and $row['yaxis']==6)
  {
$itemsearched = 'the Chest';
$flagname = 'cellarchest';		  
  if ($cellarchest==0)
  {
$flagnumber = 1;
$experienceamt = 15;	
//*****************INVENTORY*********************    
include ('includes/zeroinv.php'); 
$itemname="Blue Ring of Ice Protection";
$itemdescription="This Sapphire Blue ring has been enchanted to protect against cold and water spells.";
$itemtype="Accessory";
$itemimage="bluering";
$itemlevel=1;
$itemrarity="Artifact";
$keep=1;
$equiplocation="Finger";
$equipable=1;
$acctype="Ring";
$accbase=9;
$enhancement1="Water Resistance";
$defense=5;
$iceresist=25;
include ('includes/addinv.php'); 
//************HTML SEARCH AND FIND SINGLE ITEM**********************
echo $search1.$itemsearched.$search2.$found1.$itemimage.$found2.$itemname.' X'.$keep.$experience.$experienceamt.$endsearch;
//***********UPDATE QUEST FLAG AND EXPERIENCE ************************
include ('includes/updatequest.php'); 
}

 if ($cellarchest==1)
  {
//********************************************* HTML FOR SEARCHING AND NOTHING FOUND *****************************************
echo $search1.$itemsearched.$search2.$nothing; 
}
}
}
if ($row['map']=="barn")
{
if ($row['map']=="barn" and $row['xaxis']==1 and $row['yaxis']==1)
  {
$itemsearched = 'the Woodpile';
$flagname = 'barnwood';  
if ($barnwood==0)
  {
$flagnumber = 1;
$experienceamt = 5;		  

if (!$Firewood)
{
include ('includes/zeroinv.php'); 
$itemname="Firewood";
$itemdescription="With firewood and flint you can start a fire in the proper area such as a fireplace or campsite.";
$itemtype="Other";
$itemimage="firewood";
$itemlevel=1;
$itemrarity="Common";
$itemvalue=0;
$keep=3;
$othertype="Firewood";
include ('includes/addinv.php'); 
}

else
{
//**************set variables for each update
$itemname="Firewood";
$itemimage="firewood";
$keep=3;
//**********************UPDATE INVENTORY****************************************************
$stmt = $db->prepare('UPDATE inventory SET keep = keep + :keep WHERE charname= :charname AND itemname = :itemname');
					$stmt->execute(array(
					':keep' => $keep,
					':charname' => $charname,
					':itemname' => $itemname
					));
}
//************HTML SEARCH AND FIND SINGLE ITEM**********************
echo $search1.$itemsearched.$search2.$found1.$itemimage.$found2.$itemname.' X'.$keep.$experience.$experienceamt.$endsearch;
//***********UPDATE QUEST FLAG AND EXPERIENCE ************************
include ('includes/updatequest.php'); 
}

if ($barnwood==1)
  {
//********************************************* HTML FOR SEARCHING AND NOTHING FOUND *****************************************
echo $search1.$itemsearched.$search2.$nothingtryagain; 
}
  
}
if ($row['map']=="barn" and $row['xaxis']==1 and $row['yaxis']==2)
  {
$itemsearched = 'the Haystack';
$flagname = 'barnhay';  	  
  if ($barnhay==0)
  {
$flagnumber = 1;
$experienceamt = 5;		

include ('includes/zeroinv.php'); 
$itemname="Needle";
$itemdescription="You are not sure what to do with this single needle, but you keep it. It may come in handy.";
$itemtype="Other";
$itemimage="needle";
$itemlevel=1;
$itemrarity="Common";
$itemvalue=0;
$keep=1;
$othertype="Object";
include ('includes/addinv.php'); 

//************HTML SEARCH AND FIND SINGLE ITEM**********************
echo $search1.$itemsearched.$search2.$found1.$itemimage.$found2.$itemname.' X'.$keep.$experience.$experienceamt.$endsearch;
//***********UPDATE QUEST FLAG AND EXPERIENCE ************************
include ('includes/updatequest.php'); 
}

 if ($barnhay==1)
  {
//********************************************* HTML FOR SEARCHING AND NOTHING FOUND *****************************************
echo $search1.$itemsearched.$search2.$nothing; 
}
}
if ($row['map']=="barn" and $row['xaxis']==2 and $row['yaxis']==3)
  {
$flagname = 'barncow';  

  if ($barncow==0)
  {
	  $flagnumber = 1;
	  $experienceamt = 5;
	  
	  //***********WRITE A WAY TO ONLY MILK COW WITH BOTTLES OR CONTAINERS***************AND A WAY TO TIME MILK TO COME BACK************************	  
	  if (!$milk)
{
include ('includes/zeroinv.php'); 
$itemname="Milk";
$itemdescription="You used a milk bottle near the cow to store the milk.";
$itemtype="Food";
$itemimage="milk";
$itemlevel=1;
$itemrarity="Common";
$itemvalue=0;
$keep=3;
$consumable=1;
$singleuse=1;
$othertype="Food";
include ('includes/addinv.php'); 
}

else
{
//**************set variables for each update
$itemname="Milk";
$itemimage="milk";
$keep=3;
//**********************UPDATE INVENTORY****************************************************
include ('includes/updateinv.php');
}
echo '<table class=\"page\"><tr><td class=\"center\" colspan=\"2\"><h3>You grab the nearest milk bucket and try milking the cow'.$search2.$found1.$itemimage.$found2.$itemname.' X'.$keep.$experience.$experienceamt.$endsearch;
//***********UPDATE QUEST FLAG AND EXPERIENCE ************************
include ('includes/updatequest.php'); 
}

 if ($barncow==1)
  {
	  
  echo "<table class=\"page\"><tr><td class=\"center\"><h3>You try milking the cow, but she is out of milk for now.".$endsearch;
}
}
if ($row['map']=="barn" and $row['xaxis']==1 and $row['yaxis']==3)
  {
  
  echo "<table class=\"page\"><tr><td class=\"center\" colspan=\"2\"><h3>Cheese Center:</h3></td></tr><table class=\"page\"><tr><td class=\"page\"><form action=\"makecheese.php?";

echo time();
echo "\" method=\"post\"><input class=\"small\" type=\"submit\" value=\"Make Cheese\" /></form></td></tr></table></td></tr></table>";
  
}
if ($row['map']=="barn" and $row['xaxis']==3 and $row['yaxis']==2)
  {
$itemsearched = 'the Canvas Sack';
$flagname = 'barnsack';  
	  
  if ($barnsack==0)
  {
$flagnumber = 1;
$experienceamt = 5;	

if (!$oats)
{
include ('includes/zeroinv.php'); 
$itemname="Oats";
$itemdescription="Oats are a nutritious and common ingredient in cooking.";
$itemtype="Food";
$itemimage="oats";
$itemlevel=1;
$itemrarity="Common";
$itemvalue=0;
$keep=3;
$othertype="Food";
include ('includes/addinv.php');

}

else
{
//**************set variables for each update
$itemname="Oats";
$itemimage="oats";
$keep=3;
//**********************UPDATE INVENTORY****************************************************
include ('includes/updateinv.php');
}
}

 if ($barnsack==1)
  {
//********************************************* HTML FOR SEARCHING AND NOTHING FOUND *****************************************
echo $search1.$itemsearched.$search2.$nothing;
}
}
}
if ($row['map']=="ishforest")
{
if ($row['map']=="ishforest" and $row['xaxis']==1 and $row['yaxis']==1)
  {
//*****************ENTER ITEM AND FLAG**********
$itemsearched = 'the Fruit Tree';
$flagname = 'ishforesttreea';
	
if ($ishforesttreea==0)
  {
//*******************ENTER FLAG NUMBER AND EXPERIENCE AMOUNT**************
$flagnumber = 1;
$experienceamt = 5;	  

//**********************ENTER INVENTORY VARIABLES************************
if (!$apple)
{
//************************************************************ADD INV********************************************************
include ('includes/zeroinv.php');
$itemname="Apple";
$itemdescription="Apples may be consumed raw or cooked in recipes.";
$itemtype="Food";
$itemimage="apple";
$itemlevel=1;
$itemrarity="Common";
$itemvalue=1;
$keep=3;
$consumable=1;
$singleuse=1;
$othertype="Consumable";
$enhancement1="Life +5";
include ('includes/addinv.php');
//************************************************************END INV ****************
}

else
{
//**************set variables for each update
$itemname="Apple";
$itemimage="apple";
$keep=3;
//**********************UPDATE INVENTORY****************************************************
include ('includes/updateinv.php'); 
}
//*******************************************************HTML SEARCH AND FIND************************************************
echo $search1.$itemsearched.$search2.$found1.$itemimage.$found2.$itemname.' x'.$keep.$experience.$experienceamt.$endsearch;
//*****************************************************UPDATE QUEST FLAG AND EXPERIENCE *************************************
include ('includes/updatequest.php');
}
if ($ishforesttreea==1)
  {
  //*******************ENTER FLAG NUMBER AND EXPERIENCE AMOUNT**************
$flagnumber = 2;
$experienceamt = 5;	  

//**********************ENTER INVENTORY VARIABLES************************
if (!$apple)
{
//************************************************************ADD INV********************************************************
include ('includes/zeroinv.php');
$itemname="Apple";
$itemdescription="Apples may be consumed raw or cooked in recipes.";
$itemtype="Food";
$itemimage="apple";
$itemlevel=1;
$itemrarity="Common";
$itemvalue=1;
$keep=3;
$consumable=1;
$singleuse=1;
$othertype="Consumable";
$enhancement1="Life +5";
include ('includes/addinv.php');
//************************************************************END INV ****************
}

else
{
//**************set variables for each update
$itemname="Apple";
$itemimage="apple";
$keep=3;
//**********************UPDATE INVENTORY****************************************************
include ('includes/updateinv.php'); 
}
//*******************************************************HTML SEARCH AND FIND************************************************
echo $search1.$itemsearched.$search2.$found1.$itemimage.$found2.$itemname.' x'.$keep.$experience.$experienceamt.$endsearch;
//*****************************************************UPDATE QUEST FLAG AND EXPERIENCE *************************************
include ('includes/updatequest.php');
	$stmt = $db->prepare('UPDATE inventory SET keep = keep + 3 WHERE charname= :charname AND itemname = "Apple"');
					$stmt->execute(array(':charname' => $charname));
}
if ($ishforesttreea==2)
  {
//********************************************* HTML FOR SEARCHING AND NOTHING FOUND *****************************************
echo $search1.$itemsearched.$search2.$nothingtryagain; 	  
}
}
if ($row['map']=="ishforest" and $row['xaxis']==1 and $row['yaxis']==2)
  {
//*****************ENTER ITEM AND FLAG**********
$itemsearched = 'the Fruit Tree';
$flagname = 'ishforesttreeb';
	
if ($ishforesttreeb==0)
  {
//*******************ENTER FLAG NUMBER AND EXPERIENCE AMOUNT**************
$flagnumber = 1;
$experienceamt = 5;	  

//**********************ENTER INVENTORY VARIABLES************************
if (!$apple)
{
//************************************************************ADD INV********************************************************
include ('includes/zeroinv.php');
$itemname="Apple";
$itemdescription="Apples may be consumed raw or cooked in recipes.";
$itemtype="Food";
$itemimage="apple";
$itemlevel=1;
$itemrarity="Common";
$itemvalue=1;
$keep=3;
$consumable=1;
$singleuse=1;
$othertype="Consumable";
$enhancement1="Life +5";
include ('includes/addinv.php');
//************************************************************END INV ****************
}

else
{
//**************set variables for each update
$itemname="Apple";
$itemimage="apple";
$keep=3;
//**********************UPDATE INVENTORY****************************************************
include ('includes/updateinv.php'); 
}
//*******************************************************HTML SEARCH AND FIND************************************************
echo $search1.$itemsearched.$search2.$found1.$itemimage.$found2.$itemname.' x'.$keep.$experience.$experienceamt.$endsearch;
//*****************************************************UPDATE QUEST FLAG AND EXPERIENCE *************************************
include ('includes/updatequest.php');
}
if ($ishforesttreeb==1)
  {
  //*******************ENTER FLAG NUMBER AND EXPERIENCE AMOUNT**************
$flagnumber = 2;
$experienceamt = 5;	  

//**********************ENTER INVENTORY VARIABLES************************
if (!$apple)
{
//************************************************************ADD INV********************************************************
include ('includes/zeroinv.php');
$itemname="Apple";
$itemdescription="Apples may be consumed raw or cooked in recipes.";
$itemtype="Food";
$itemimage="apple";
$itemlevel=1;
$itemrarity="Common";
$itemvalue=1;
$keep=3;
$consumable=1;
$singleuse=1;
$othertype="Consumable";
$enhancement1="Life +5";
include ('includes/addinv.php');
//************************************************************END INV ****************
}

else
{
//**************set variables for each update
$itemname="Apple";
$itemimage="apple";
$keep=3;
//**********************UPDATE INVENTORY****************************************************
include ('includes/updateinv.php'); 
}
//*******************************************************HTML SEARCH AND FIND************************************************
echo $search1.$itemsearched.$search2.$found1.$itemimage.$found2.$itemname.' x'.$keep.$experience.$experienceamt.$endsearch;
//*****************************************************UPDATE QUEST FLAG AND EXPERIENCE *************************************
include ('includes/updatequest.php');
	$stmt = $db->prepare('UPDATE inventory SET keep = keep + 3 WHERE charname= :charname AND itemname = "Apple"');
					$stmt->execute(array(':charname' => $charname));
}
if ($ishforesttreeb==2)
  {
//********************************************* HTML FOR SEARCHING AND NOTHING FOUND *****************************************
echo $search1.$itemsearched.$search2.$nothingtryagain; 	  
}
}
if ($row['map']=="ishforest" and $row['xaxis']==1 and $row['yaxis']==3)
  {
//*****************ENTER ITEM AND FLAG**********
$itemsearched = 'the Fruit Tree';
$flagname = 'ishforesttreec';
	
if ($ishforesttreec==0)
  {
//*******************ENTER FLAG NUMBER AND EXPERIENCE AMOUNT**************
$flagnumber = 1;
$experienceamt = 5;	  

//**********************ENTER INVENTORY VARIABLES************************
if (!$apple)
{
//************************************************************ADD INV********************************************************
include ('includes/zeroinv.php');
$itemname="Apple";
$itemdescription="Apples may be consumed raw or cooked in recipes.";
$itemtype="Food";
$itemimage="apple";
$itemlevel=1;
$itemrarity="Common";
$itemvalue=1;
$keep=3;
$consumable=1;
$singleuse=1;
$othertype="Consumable";
$enhancement1="Life +5";
include ('includes/addinv.php');
//************************************************************END INV ****************
}

else
{
//**************set variables for each update
$itemname="Apple";
$itemimage="apple";
$keep=3;
//**********************UPDATE INVENTORY****************************************************
include ('includes/updateinv.php'); 
}
//*******************************************************HTML SEARCH AND FIND************************************************
echo $search1.$itemsearched.$search2.$found1.$itemimage.$found2.$itemname.' x'.$keep.$experience.$experienceamt.$endsearch;
//*****************************************************UPDATE QUEST FLAG AND EXPERIENCE *************************************
include ('includes/updatequest.php');
}
if ($ishforesttreec==1)
  {
  //*******************ENTER FLAG NUMBER AND EXPERIENCE AMOUNT**************
$flagnumber = 2;
$experienceamt = 5;	  

//**********************ENTER INVENTORY VARIABLES************************
if (!$apple)
{
//************************************************************ADD INV********************************************************
include ('includes/zeroinv.php');
$itemname="Apple";
$itemdescription="Apples may be consumed raw or cooked in recipes.";
$itemtype="Food";
$itemimage="apple";
$itemlevel=1;
$itemrarity="Common";
$itemvalue=1;
$keep=3;
$consumable=1;
$singleuse=1;
$othertype="Consumable";
$enhancement1="Life +5";
include ('includes/addinv.php');
//************************************************************END INV ****************
}

else
{
//**************set variables for each update
$itemname="Apple";
$itemimage="apple";
$keep=3;
//**********************UPDATE INVENTORY****************************************************
include ('includes/updateinv.php'); 
}
//*******************************************************HTML SEARCH AND FIND************************************************
echo $search1.$itemsearched.$search2.$found1.$itemimage.$found2.$itemname.' x'.$keep.$experience.$experienceamt.$endsearch;
//*****************************************************UPDATE QUEST FLAG AND EXPERIENCE *************************************
include ('includes/updatequest.php');
	$stmt = $db->prepare('UPDATE inventory SET keep = keep + 3 WHERE charname= :charname AND itemname = "Apple"');
					$stmt->execute(array(':charname' => $charname));
}
if ($ishforesttreec==2)
  {
//********************************************* HTML FOR SEARCHING AND NOTHING FOUND *****************************************
echo $search1.$itemsearched.$search2.$nothingtryagain; 	  
}
}
if ($row['map']=="ishforest" and $row['xaxis']==1 and $row['yaxis']==4)
  {
  if ($ishforestpyramid==0)
  {
//********************************************* HTML FOR SEARCHING AND NOTHING FOUND *****************************************
echo $search1."the Pyramid"."...</h3></td></tr><tr><td class=\"left\"><h3>You see nothing but strange inscriptions.".$endsearch; 
}
if ($ishforestpyramid==1)
  {
  echo "<table class=\"page\"><tr><td class=\"center\" colspan=\"2\"><h3>You examine the pyramid:</h3></td></tr><tr><td class=\"left\"><h3>You say 'Open Sesame' and the face of the pyramid shudders as a hidden door opens.</h3></td></tr></table><br /><table class=\"page\"><tr><td class=\"page\"><form action=\"portal.php?";
echo time();
echo "\" method=\"post\"><input class=\"small\" type=\"submit\" value=\"Enter Pyramid\" /></form></td></tr></table><table class=\"page\"><tr><td class=\"page\"><form action=\"maingraphics.php?";
echo time();
echo "\" method=\"post\"><input class=\"small\" type=\"submit\" value=\"Back to Map\" /></form></td></tr></table>";
}
}
}
if ($row['map']=="cave")
{  
  if ($row['xaxis']==3 and $row['yaxis']==1)
  {
  if ($cavea==0)
  {
 
  $query=sprintf("update flags set cavea=1 where username='%s';", mysql_real_escape_string($username));
  mysql_query ($query);
  
  $query=sprintf("update stats set experience=experience+5 where username='%s';", mysql_real_escape_string($username));
  mysql_query ($query);
  
include ('php/cellar12.php');

 echo "<table class=\"page\"><tr><td class=\"center\" colspan=\"2\"><h3>You look inside the wooden crate:</h3></td></tr><tr><td class=\"left\"><h3>Found:</h3></td><td class=\"center\"><img src=\"images/".$itemimage.".png\" /><br />".$itemname."</td></tr><tr><td class=\"left\"><h3>Experience:</h3></td><td class=\"left\"><h3>+5</h3></td></tr></table><br /><table class=\"page\"><tr><td class=\"page\"><form action=\"maingraphics.php?";

echo time();
echo "\" method=\"post\"><input class=\"small\" type=\"submit\" value=\"Back to Map\" /></form></td></tr></table>";
  

}

 if ($cavea==1)
  {
//********************************************* HTML FOR SEARCHING AND NOTHING FOUND *****************************************
echo $search1."the Wooden Crate".$search2.$nothing;   	  
}
}

if ($row['xaxis']==3 and $row['yaxis']==5)
  {
  if ($caveb==0)
  {
 
  $query=sprintf("update flags set caveb=1 where username='%s';", mysql_real_escape_string($username));
  mysql_query ($query);
  
  $query=sprintf("update stats set experience=experience+5 where username='%s';", mysql_real_escape_string($username));
  mysql_query ($query);
  
include ('php/cellar12.php');

 echo "<table class=\"page\"><tr><td class=\"center\" colspan=\"2\"><h3>You look inside the wooden crate:</h3></td></tr><tr><td class=\"left\"><h3>Found:</h3></td><td class=\"center\"><img src=\"images/".$itemimage.".png\" /><br />".$itemname."</td></tr><tr><td class=\"left\"><h3>Experience:</h3></td><td class=\"left\"><h3>+5</h3></td></tr></table><br /><table class=\"page\"><tr><td class=\"page\"><form action=\"maingraphics.php?";

echo time();
echo "\" method=\"post\"><input class=\"small\" type=\"submit\" value=\"Back to Map\" /></form></td></tr></table>";
  

}

 if ($caveb==1)
  {
//********************************************* HTML FOR SEARCHING AND NOTHING FOUND *****************************************
echo $search1."the Wooden Crate".$search2.$nothing; 
}
  }
 if ($row['xaxis']==5 and $row['yaxis']==1)
  {
  if ($cavec==0)
  {
 
  $query=sprintf("update flags set cavec=1 where username='%s';", mysql_real_escape_string($username));
  mysql_query ($query);
  
  $query=sprintf("update stats set experience=experience+5 where username='%s';", mysql_real_escape_string($username));
  mysql_query ($query);
  
include ('php/cellar12.php');

 echo "<table class=\"page\"><tr><td class=\"center\" colspan=\"2\"><h3>You look inside the wooden crate:</h3></td></tr><tr><td class=\"left\"><h3>Found:</h3></td><td class=\"center\"><img src=\"images/".$itemimage.".png\" /><br />".$itemname."</td></tr><tr><td class=\"left\"><h3>Experience:</h3></td><td class=\"left\"><h3>+5</h3></td></tr></table><br /><table class=\"page\"><tr><td class=\"page\"><form action=\"maingraphics.php?";

echo time();
echo "\" method=\"post\"><input class=\"small\" type=\"submit\" value=\"Back to Map\" /></form></td></tr></table>";
  

}

 if ($cavec==1)
  {
//********************************************* HTML FOR SEARCHING AND NOTHING FOUND *****************************************
echo $search1."the Wooden Crate".$search2.$nothing;   	  
}
} 
  
if ($row['xaxis']==5 and $row['yaxis']==5)
  {
  if ($caved==0)
  {
 
  $query=sprintf("update flags set caved=1 where username='%s';", mysql_real_escape_string($username));
  mysql_query ($query);
  
  $query=sprintf("update stats set experience=experience+5 where username='%s';", mysql_real_escape_string($username));
  mysql_query ($query);
  
include ('php/cellar12.php');

 echo "<table class=\"page\"><tr><td class=\"center\" colspan=\"2\"><h3>You look inside the wooden crate:</h3></td></tr><tr><td class=\"left\"><h3>Found:</h3></td><td class=\"center\"><img src=\"images/".$itemimage.".png\" /><br />".$itemname."</td></tr><tr><td class=\"left\"><h3>Experience:</h3></td><td class=\"left\"><h3>+5</h3></td></tr></table><br /><table class=\"page\"><tr><td class=\"page\"><form action=\"maingraphics.php?";

echo time();
echo "\" method=\"post\"><input class=\"small\" type=\"submit\" value=\"Back to Map\" /></form></td></tr></table>";
  

}

 if ($caved==1)
  {
//********************************************* HTML FOR SEARCHING AND NOTHING FOUND *****************************************
echo $search1."the Wooden Crate".$search2.$nothing;   	  
}
  
}
  
if ($row['xaxis']==7 and $row['yaxis']==3)
  {
  if ($cavee==0)
  {
 
  $query=sprintf("update flags set cavee=1 where username='%s';", mysql_real_escape_string($username));
  mysql_query ($query);
  
  $query=sprintf("update flags set ishforestpyramid=1 where username='%s';", mysql_real_escape_string($username));
  mysql_query ($query);
  
  $query=sprintf("update stats set experience=experience+5 where username='%s';", mysql_real_escape_string($username));
  mysql_query ($query);
  
include ('php/cave73.php');

 echo "<table class=\"page\"><tr><td class=\"center\" colspan=\"2\"><h3>You look inside the chest:</h3></td></tr><tr><td class=\"left\"><h3>Found:</h3></td><td class=\"center\"><img src=\"images/book.png\" /><br />Book of Ancient Inscriptions</td></tr><tr><td class=\"left\"><h3>Experience:</h3></td><td class=\"left\"><h3>+5</h3></td></tr></table><br /><table class=\"page\"><tr><td class=\"page\"><form action=\"maingraphics.php?";

echo time();
echo "\" method=\"post\"><input class=\"small\" type=\"submit\" value=\"Back to Map\" /></form></td></tr></table>";
  

}

 if ($cavee==1)
  {
//********************************************* HTML FOR SEARCHING AND NOTHING FOUND *****************************************
echo $search1."the Wooden Crate".$search2.$nothing;   	  
}
}  
}
if ($row['map']=="pyramida")
{
if ($row['xaxis']==2 and $row['yaxis']==3)
  {
//*****************ENTER ITEM AND FLAG**********
$itemsearched = 'the Chest';
$flagname = 'pyramidachest1';	
	  
 if ($pyramidachest1==0)
  {
//*******************ENTER FLAG NUMBER AND EXPERIENCE AMOUNT**************
$flagnumber = 1;
$experienceamt = 5;	  
//************RRANDOM EQUIPABLE ITEM**************************************
include ('includes/randitem1.php');

//************HTML SEARCH AND FIND SINGLE ITEM**********************
echo $search1.$itemsearched.$search2.$found1.$itemimage.$found2.$itemname.' X'.$keep.$experience.$experienceamt.$endsearch;
//***********UPDATE QUEST FLAG AND EXPERIENCE ************************
$stmt = $db->prepare('UPDATE flags SET :flagname = :flagnumber WHERE charname= :charname') ;
					$stmt->execute(array(':flagname' => $flagname, ':flagnumber' => $flagnumber,':charname' => $charname)); 
$stmt = $db->prepare('UPDATE charstats SET experience = experience + :experienceamt WHERE charname= :charname') ;
					$stmt->execute(array(':experienceamt' => $experienceamt, ':charname' => $charname));
}
 if ($pyramidachest1==1)
  {
//********************************************* HTML FOR SEARCHING AND NOTHING FOUND *****************************************
echo $search1.$itemsearched.$search2.$nothing; 
}
}
if ($row['xaxis']==11 and $row['yaxis']==3)
  {
//*****************ENTER ITEM AND FLAG**********
$itemsearched = 'the Chest';
$flagname = 'pyramidachest2';	
	  
 if ($pyramidachest2==0)
  {
//*******************ENTER FLAG NUMBER AND EXPERIENCE AMOUNT**************
$flagnumber = 1;
$experienceamt = 5;	  
//************RRANDOM EQUIPABLE ITEM**************************************
include ('includes/randitem1.php');

//************HTML SEARCH AND FIND SINGLE ITEM**********************
echo $search1.$itemsearched.$search2.$found1.$itemimage.$found2.$itemname.' X'.$keep.$experience.$experienceamt.$endsearch;
//***********UPDATE QUEST FLAG AND EXPERIENCE ************************
$stmt = $db->prepare('UPDATE flags SET :flagname = :flagnumber WHERE charname= :charname') ;
					$stmt->execute(array(':flagname' => $flagname, ':flagnumber' => $flagnumber,':charname' => $charname)); 
$stmt = $db->prepare('UPDATE charstats SET experience = experience + :experienceamt WHERE charname= :charname') ;
					$stmt->execute(array(':experienceamt' => $experienceamt, ':charname' => $charname));
}
 if ($pyramidachest2==1)
  {
//********************************************* HTML FOR SEARCHING AND NOTHING FOUND *****************************************
echo $search1.$itemsearched.$search2.$nothing; 
}
}
if ($row['xaxis']==5 and $row['yaxis']==12)
  {
//*****************ENTER ITEM AND FLAG**********
$itemsearched = 'the Chest';
$flagname = 'pyramidachest3';	
	  
 if ($pyramidachest3==0)
  {
//*******************ENTER FLAG NUMBER AND EXPERIENCE AMOUNT**************
$flagnumber = 1;
$experienceamt = 5;	  
//************RRANDOM EQUIPABLE ITEM**************************************
include ('includes/randitem1.php');

//************HTML SEARCH AND FIND SINGLE ITEM**********************
echo $search1.$itemsearched.$search2.$found1.$itemimage.$found2.$itemname.' X'.$keep.$experience.$experienceamt.$endsearch;
//***********UPDATE QUEST FLAG AND EXPERIENCE ************************
$stmt = $db->prepare('UPDATE flags SET :flagname = :flagnumber WHERE charname= :charname') ;
					$stmt->execute(array(':flagname' => $flagname, ':flagnumber' => $flagnumber,':charname' => $charname)); 
$stmt = $db->prepare('UPDATE charstats SET experience = experience + :experienceamt WHERE charname= :charname') ;
					$stmt->execute(array(':experienceamt' => $experienceamt, ':charname' => $charname));
}
 if ($pyramidachest3==1)
  {
//********************************************* HTML FOR SEARCHING AND NOTHING FOUND *****************************************
echo $search1.$itemsearched.$search2.$nothing; 
}
	  
  }
if ($row['xaxis']==7 and $row['yaxis']==12)
  {
//*****************ENTER ITEM AND FLAG**********
$itemsearched = 'the Chest';
$flagname = 'pyramidachest4';	
	  
 if ($pyramidachest4==0)
  {
//*******************ENTER FLAG NUMBER AND EXPERIENCE AMOUNT**************
$flagnumber = 1;
$experienceamt = 5;	  
//************RRANDOM EQUIPABLE ITEM**************************************
include ('includes/randitem1.php');

//************HTML SEARCH AND FIND SINGLE ITEM**********************
echo $search1.$itemsearched.$search2.$found1.$itemimage.$found2.$itemname.' X'.$keep.$experience.$experienceamt.$endsearch;
//***********UPDATE QUEST FLAG AND EXPERIENCE ************************
$stmt = $db->prepare('UPDATE flags SET :flagname = :flagnumber WHERE charname= :charname') ;
					$stmt->execute(array(':flagname' => $flagname, ':flagnumber' => $flagnumber,':charname' => $charname)); 
$stmt = $db->prepare('UPDATE charstats SET experience = experience + :experienceamt WHERE charname= :charname') ;
					$stmt->execute(array(':experienceamt' => $experienceamt, ':charname' => $charname));
}
 if ($pyramidachest4==1)
  {
//********************************************* HTML FOR SEARCHING AND NOTHING FOUND *****************************************
echo $search1.$itemsearched.$search2.$nothing; 
}
}
}
if ($row['map']=="pyramidb")
{

if ($row['xaxis']==2 and $row['yaxis']==3)
  {
//*****************ENTER ITEM AND FLAG**********
$itemsearched = 'the Chest';
$flagname = 'pyramidbchest';	
	  
 if ($pyramidbchest==0)
  {
//*******************ENTER FLAG NUMBER AND EXPERIENCE AMOUNT**************
$flagnumber = 1;
$experienceamt = 5;	  
//************RRANDOM EQUIPABLE ITEM**************************************
include ('includes/zeroinv.php');
$itemname="Cloak of Invisibility";
$itemdescription="Wearing this cloak makes it very difficult for the enemy to see you.";
$itemtype="Armor";
$itemimage="cloak";
$itemlevel=25;
$itemrarity="Common";
$itemvalue=0;
$keep=1;
$trade=0;
$equiplocation="Shoulders";
$equipable=1;
$armortype="Cloak";
$armorbase=25;
$enhancement1="Invisibility +25";
$invisible=25;
include ('includes/addinv.php');

//************HTML SEARCH AND FIND SINGLE ITEM**********************
echo $search1.$itemsearched.$search2.$found1.$itemimage.$found2.$itemname.' X'.$keep.$experience.$experienceamt.$endsearch;
//***********UPDATE QUEST FLAG AND EXPERIENCE ************************
$stmt = $db->prepare('UPDATE flags SET :flagname = :flagnumber WHERE charname= :charname') ;
					$stmt->execute(array(':flagname' => $flagname, ':flagnumber' => $flagnumber,':charname' => $charname)); 
$stmt = $db->prepare('UPDATE charstats SET experience = experience + :experienceamt WHERE charname= :charname') ;
					$stmt->execute(array(':experienceamt' => $experienceamt, ':charname' => $charname));
}
 if ($pyramidbchest==1)
  {
//********************************************* HTML FOR SEARCHING AND NOTHING FOUND *****************************************
echo $search1.$itemsearched.$search2.$nothing; 
}
}
}
}
?>
</td></tr></table></td></tr></table></body></html>