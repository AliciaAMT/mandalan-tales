<?php
$rand=mt_rand(1,100);
if ($rand<$brevivingjolt)
{
$stmt = $db->prepare("UPDATE charstats SET life=level WHERE charname= :charname");
				$stmt->execute(array(':charname' => $charname));
$report="<span class=\"green\">You have died! However, unexpectedly a great thunderbolt is summoned from the heavens and it jolts you back to life!</span><br />";
//******************append string to mysql**********
$stmt = $db->prepare("UPDATE enemy SET event = CONCAT(IFNULL(event,''), :report) WHERE charname= :charname");
				$stmt->execute(array(':report' => $report, ':charname' => $charname));
//********redirect to continue fight*********
header('Location: nomove.php');
die('This site works best with redirections turned on, but you may continue with them turned off. <a href="nomove.php">Continue</a>');
}
else
{
	$exploss=round($row['experience']*.10);
	$stmt = $db->prepare("UPDATE charstats SET cond='Good', life=maxlife, mana=maxmana, map=savemap, mapdimensions=savemapdimensions, yaxis=saveyaxis, xaxis=savexaxis, deaths=deaths+1, experience=experience-:exploss WHERE charname= :charname");
				$stmt->execute(array(':exploss' => $exploss, ':charname' => $charname));
	$stmt = $db->prepare("UPDATE enemy SET fight=0 WHERE charname= :charname");
				$stmt->execute(array(':charname' => $charname));
	$report=$report."<span class=\"green\">You have died!</span><br />";
	//******************append string to mysql**********
$stmt = $db->prepare("UPDATE enemy SET event = CONCAT(IFNULL(event,''), :report) WHERE charname= :charname");
				$stmt->execute(array(':report' => $report, ':charname' => $charname));
	//******************add finished battle to fightlog***************
	// get full report and add to fightlog database
	$stmt = $db->prepare("SELECT * FROM enemy WHERE charname=:charname");
				$stmt->execute(array(':charname' => $charname));
while($row = $stmt->fetch())
{
	$logcontent = $row['event'];
}
	$outcome = 'Death';
	$stmt = $db->prepare('INSERT INTO fightlogs (
charname,
enemyname,
enemylevel,
logcontent,
outcome
)
 VALUES 
(
:charname,
:enemyname,
:enemylevel,
:logcontent,
:outcome
)');
				$stmt->execute(array(

':charname' => $charname,
':enemyname' => $enemyname,
':enemylevel' => $enemylevel,
':logcontent' => $logcontent,
':outcome' => $outcome
));
//update death count
$stmt = $db->prepare("UPDATE charstats SET deaths = deaths + 1 WHERE charname = :charname");
	$stmt->execute(array(':charname' => $charname));

  //***********revive*****************
header('Location: ../revive.php');
die('This site works best with redirections turned on, but you may continue with them turned off. <a href="../revive.php">Continue</a>');
}
?>