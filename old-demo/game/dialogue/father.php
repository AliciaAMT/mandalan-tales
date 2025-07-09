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

$npcdialogue = 'Silent';
$begin = '<table class="page" width="100%">
<tr><td class="center" width="15%">';
$rforma = '<form action="response.php?'.time().'" method="post">
<input class="invisible" type="radio" name="type" checked="checked" value="';
$rformb = '" /><input class="small" type="submit" value="Say" />
</form>';
$col = '</td><td class="left">';
$rcontent1 = 'silent';
$row = '</td></tr><tr><td class="center" width="15%">';
$leave = '<a class="small" href="../maingraphics.php?'.time().'">Say</a>';
$col = '</td><td class="left">';
$rcontent2 = 'Silent';
$row = '</td></tr><tr><td class="center" width="15%">';
$rforma = '<form action="response.php?<?php echo time(); ?>" method="post">
<input class="invisible" type="radio" name="type" checked="checked" value="';
$rformvalue2 = '4';
$rformb = '" /><input class="small" type="submit" value="Say" />
</form>';
$col = '</td><td class="left">';
$rcontent3 = 'Silent';
$end = '</td></tr>
</table>';

  if ($quest4==1)
  {
  $npcdialogue = 'Ah, I see you have found the family crest. It contains very special magic. Only those with great power can unlock it\'s abilities. Keep it. You will need it.';
  $rcontent1 = 'Ok, thank you.';
  $chardialogue = $begin.$leave.$col.$rcontent1.$end;
  $stmt2 = $db->prepare('UPDATE flags SET quest4 = 2 WHERE charname = :charname') ;
					$stmt2->execute(array(':charname' => $charname));
  }
  else
  {
  if ($shepfeed==1)
  {
  $npcdialogue = 'What? You fed Old Shep? Good! Now if only I could find the key to the cellar, I could send you for more supplies down there. I know there are some nice things down there, but that lock requires a special key.';
  $rcontent1 = 'I\'ll keep an eye out for the key.';
  $chardialogue = $begin.$leave.$col.$rcontent1.$end;
  }
  if ($shepfeed==2)
  {
  $npcdialogue = 'You found a Bone Key! Yes! This is the key to the cellar. Go down there to get some extra supplies for the road on the way to town. Be careful, No one has been down there for a while and there may be rats and spiders.';
  $rcontent1 = 'Ok, I\'ll be careful.';
  $chardialogue = $begin.$leave.$col.$rcontent1.$end;
  $stmt2 = $db->prepare('UPDATE flags SET shepfeed = 3 WHERE charname = :charname') ;
					$stmt2->execute(array(':charname' => $charname));
  }
  else
  {
  if ($quest1==0)
  {
  $npcdialogue = '<p>My child, Happy Birthday!</p><p>Despite these strange events that have transpired, I have news for you that should make your Birthday very merry indeed!</p><p>The elders in the village have been watching you closely for a few years now. It seems that you have caught the attention of Old Solias, the mystic. He believes you have a special gift, and he wants you to come live with him and be his apprentice.</p><p>Isn\'t that wonderful? You could become a powerful magician like Solias!</p><p>He could also shed some light on why you seem to be changed...</p>';
  $rformvalue1 = '2';
  $rcontent1 = 'I will go. I seek answers.';
  $rcontent2 = 'I don\'t want to go. This place is strange to me.';
  $rformvalue2 = '1';
  
  $chardialogue = $begin.$rforma.$rformvalue1.$rformb.$col.$rcontent1.$row.$rforma.$rformvalue2.$rformb.$col.$rcontent2.$end;
  }
  if ($quest1==2)
  {
  $npcdialogue = 'If you need any help or advice, let me know. I will miss you my child.';
  $rformvalue1 = '3';
  $rcontent1 = 'What advice can you offer me?';
  $rcontent2 = 'Maybe Later';
  $rformvalue2 = '4';
  $rcontent3 = 'I would like to learn more and level up.';
  $chardialogue = $begin.$rforma.$rformvalue1.$rformb.$col.$rcontent1.$row.$rforma.$rformvalue2.$rformb.$col.$rcontent3.$row.$leave.$col.$rcontent2.$end;
  }
  if ($quest1==1)
  {
  $npcdialogue = 'Did you change your mind about the apprenticeship and meeting with Solias?';
  $rformvalue1 = '2';
  $rcontent1 = 'Yes, I will go, since that is your wish, Father.';
  $rcontent2 = 'No, I like it here.';
  $chardialogue = $begin.$rforma.$rformvalue1.$rformb.$col.$rcontent1.$row.$leave.$col.$rcontent2.$end;
}
}
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