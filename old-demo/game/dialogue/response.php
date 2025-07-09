<?php
//include config
require_once( $_SERVER['DOCUMENT_ROOT'] . '/game/includes/config2.php');
//if not logged in redirect to login page
if(!$user->is_logged_in()){ header('Location: ../login.php'); die('This site works best with redirections turned on, but you may continue with them turned off. <a href="../login.php">Continue</a>');}
$username = $_SESSION['username'];
$charname= $_SESSION['charname'];
?>
<?php
include ('../includes/getstats.php');
include ('../includes/getweapontype.php');
include ('../includes/getskills.php');
include ('../includes/getdamage.php');
include ('../includes/getdefense.php');
//***************getflags*****************************
include ('../includes/getflags.php');
//******************get charstats************************
include ('../includes/getcharstats.php');
//********catch resubmit**********
if(isset($_POST['type']))
{
$npcdialogue = 'Silent';
$begin = '<table class="page" width="100%">
<tr><td class="center" width="15%">';
$rforma = '<form action="response.php?'.time().'" method="post">
<input class="invisible" type="radio" name="type" checked="checked" value="';
$rformb = '" /><input class="small" type="submit" value="Say" />
</form>';
$col = '</td><td class="left">';
$rcontent1 = 'What advice can you offer me?';
$row = '</td></tr><tr><td class="center" width="15%">';
$leave = '<a class="small" href="../maingraphics.php?'.time().'">Say</a>';
$col = '</td><td class="left">';
$rcontent2 = 'Maybe Later';
$row = '</td></tr><tr><td class="center" width="15%">';
$rforma = '<form action="response.php?<?php echo time(); ?>" method="post">
<input class="invisible" type="radio" name="type" checked="checked" value="';
$rformvalue2 = '4';
$rformb = '" /><input class="small" type="submit" value="Say" />
</form>';
$col = '</td><td class="left">';
$rcontent3 = 'I would like to learn more and level up.';
$end = '</td></tr>
</table>';
$expgained1 = '<h3>Experience Gained: ';
$headclose = '</h3>';
$questup = '<h3>Quest Updated: ';
$itemgained = '<h3>Item Gained: </h3>';
$itemimg1a = '<img src="../images/';
$itemimg1c = '.png" /><br />';
$ok = '<a class="small" href="../maingraphics.php?'.time().'">Ok</a>';
$response=strip_tags($_POST['type']);
if ($response==1) {
  $npcdialogue = 'I know this must seem strange and scary for you, but this is an opportunity that you cannot pass up. Think about it a while and let me know when you change your mind.';
  $rcontent1 = 'Ok.';
  $chardialogue = $begin.$leave.$col.$rcontent1.$end;
  $stmt = $db->prepare('UPDATE flags SET quest1 = 1 WHERE charname = :charname') ;
					$stmt->execute(array(':charname' => $charname));
  }
if ($response==2) {
	
  $npcdialogue = 'I will miss you, but this is an opportunity that you cannot pass up. Here is the letter from Solias. This will gain you entrance to the House of Elders, where Solias resides and where you are to meet him. The House of Elders is North from here. And don\'t forget to get some supplies before you leave. The roads are getting more treacherous every day.';
  $expamt = '5';
  $quest = 'The Apprentice';
  $itemimg1b = 'letter';
  $itemname1 = 'Letter From Solias';
  
  $chardialogue = $begin.$expgained1.$expamt.$headclose.$row.$questup.$quest.$headclose.$row.$itemgained.$row.$itemimg1a.$itemimg1b.$itemimg1c.$itemname.$end.$begin.$ok.$end;
 $stmt = $db->prepare('UPDATE flags SET quest1 = 2 WHERE charname = :charname') ;
					$stmt->execute(array(':charname' => $charname));
 $stmt = $db->prepare('UPDATE charstats SET experience = experience + 5 WHERE charname = :charname') ;
					$stmt->execute(array(':charname' => $charname));
include ('../includes/zeroinv.php');
$itemname="Solias's Letter"; 
$itemdescription="This letter is your invitation to the House of Elder's. The guards should let you enter when you show them this letter.";
$itemtype="Other"; 
$itemimage="letter"; 
$itemlevel=1; 
$itemrarity="Relic";
$itemvalue=0; 
$keep=1;
$othertype="Quest";
//insert into database
include ('../includes/addinv.php');
  

}
if ($response==3) {
$getadvice=rand(1,6);
if ($getadvice==1)
{
$getadvice = 'Remember to stock up on plenty of food for the journey.';
}
if ($getadvice==2)
{
$getadvice = "Could you check on the dog? I think I forgot to feed poor old Shep.";
}
if ($getadvice==3)
{
$getadvice = "Make sure you arm yourself before you leave. The trail is full of dangerous animals and goblin bandits. These are dangerous times.";
}
if ($getadvice==4)
{
$getadvice = "Old lady Marah who lives just down the road has some nice recipes I would like to have from her.";
}
if ($getadvice==5)
{
$getadvice = "Remember if you are ever in trouble you are welcome back home anytime!";
}
if ($getadvice==6)
{
$getadvice = "I saw a rat near the kitchen table this morning, but it got away before I could get rid of it. It will probably come back when we aren't looking.";
}
  $npcdialogue = $getadvice;
  $rformvalue1 = '3';
  $rcontent1 = 'Do you have any other advice to offer me?';
  $rcontent2 = 'Thank you, Father.';
  $chardialogue = $begin.$rforma.$rformvalue1.$rformb.$col.$rcontent1.$row.$leave.$col.$rcontent2.$end;
}
if ($response==4) {
if ($experience<100 and $level==1) {
$npcdialogue = "I'm sorry, you need more experience to level up. But I'm sure you will be ready in no time. Check back with me when your experience reaches 100.";
}
if ($experience>99 and $level==1) {
include ('../includes/levelup.php');
include ('../includes/levelup1.php');
$npcdialogue = "Yes, my child, I think you are ready to learn more. You are now level 2. Congratulations! You have gained 2 strength, 2 agility, and 2 speed. Don't forget to use your 3 new skill points either!";
}
if ($experience<250 and $level==2) {
$npcdialogue = "I'm sorry, you need more experience to level up. But I'm sure you will be ready in no time. Check back with me when your experience reaches 250.";
}
if ($experience>249 and $level==2) {
include ('../includes/levelup.php');
include ('../includes/levelup2.php');
$npcdialogue =  "Yes, my child, I think you are ready to learn more. You are now level 3. Congratulations! You have gained 2 accuracy, 2 wisdom, and 2 luck. Don't forget to use your 3 new skill points either!";
}
if ($experience<500 and $level==3) {
$npcdialogue = "I'm sorry, you need more experience to level up. But I'm sure you will be ready in no time. Check back with me when your experience reaches 500.";
}
if ($experience>499 and $level==3) {
include ('../includes/levelup.php');
$npcdialogue = "Yes, my child, I think you are ready to learn more. You are now level 4. Congratulations! You have gained 3 skillpoints.";
}
if ($experience<1000 and $level==4) {
$npcdialogue =  "I'm sorry, you need more experience to level up. But I'm sure you will be ready in no time. Check back with me when your experience reaches 1000.";
}
if ($experience>999 and $level==4) {
include ('../includes/levelup.php');
include ('../includes/levelup3.php');
$npcdialogue = "Yes, my child, I think you are ready to learn more. You are now level 5. Congratulations! You have gained 1 to all stats and 3 skillpoints.";
}
if ($experience<2000 and $level==5) {
$npcdialogue = "I'm sorry, you need more experience to level up. But I'm sure you will be ready in no time. Check back with me when your experience reaches 2000.";
}
if ($experience>1999 and $level==5) {
include ('../includes/levelup.php');
include ('../includes/levelup3.php');
$npcdialogue = "Yes, my child, I think you are ready to learn more. You are now level 6. Congratulations!";
}
if ($experience<4000 and $level==6) {
$npcdialogue = "I'm sorry, you need more experience to level up. But I'm sure you will be ready in no time. Check back with me when your experience reaches 4000.";
}
if ($experience>3999 and $level==6) {
include ('../includes/levelup.php');
include ('../includes/levelup3.php');
$npcdialogue = "Yes, my child, I think you are ready to learn more. You are now level 7. Congratulations!";
}
if ($experience<8000 and $level==7) {
$npcdialogue = "I'm sorry, you need more experience to level up. But I'm sure you will be ready in no time. Check back with me when your experience reaches 8000.";
}
if ($experience>7999 and $level==7) {
include ('../includes/levelup.php');
include ('../includes/levelup3.php');
$npcdialogue = "Yes, my child, I think you are ready to learn more. You are now level 8. Congratulations!";
}
if ($experience<15000 and $level==8) {
$npcdialogue = "I'm sorry, you need more experience to level up. But I'm sure you will be ready in no time. Check back with me when your experience reaches 15000.";
}
if ($experience>14999 and $level==8) {
include ('../includes/levelup.php');
include ('../includes/levelup3.php');
$npcdialogue = "Yes, my child, I think you are ready to learn more. You are now level 9. Congratulations!";
}
if ($experience<20000 and $level==9) {
$npcdialogue = "I'm sorry, you need more experience to level up. But I'm sure you will be ready in no time. Check back with me when your experience reaches 20000.";
}
if ($experience>19999 and $level==9) {
include ('../includes/levelup.php');
include ('../includes/levelup3.php');
$npcdialogue = "Yes, my child, I think you are ready to learn more. You are now level 10. Congratulations!";
}
if ($level==10) {
$npcdialogue = "I'm sorry, you need to seek out Solias. I can teach you no further.";
}
  $rcontent1 = 'Thank you, Father.';
  $chardialogue = $begin.$leave.$col.$rcontent1.$end;
}
}
else {
	//*********catch refresh*************
header('Location: ../maingraphics.php'); die('This site works best with redirections turned on, but you may continue with them turned off. <a href="../maingraphics.php">Continue</a>');
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
<link href="../main.css?<?php echo time(); ?>" rel="stylesheet"></link>
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
<br />
<br />
<div class="container">
<div class="row">
<div class="col-sm-3">
<img src="../images/male1.png" /><br />Father
</div>
<div class="col-sm-9">
<?php echo $npcdialogue; ?>
</div>
</div>
<hr />
<div class="row">
<div class="col-sm-3">
<img src="../images/
<?php echo $portrait; ?>
.png" border="0" /><br /><?php echo $charname; ?>
</div>
<div class="col-sm-9">
<?php echo $chardialogue; ?>
</div>
</div>
</div>
</body>
</html>