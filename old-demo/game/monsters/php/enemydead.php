<?php
$counter=$counter."<span class=\"red\">";
$counter=$counter.$enemyname;
$counter=$counter." is dead!</span><br /><table class=\"page\"><tr><td class=\"page\"><a class=\"small\" href=\"loot.php?".time()."\">Loot Body</a></td></tr></table></br>";
$report=$counter.$report;
$outcome = 'Enemy Died';
//**************add endturn and exit
$stmt = $db->prepare("UPDATE enemy SET event = CONCAT(:report, IFNULL(event,'')) WHERE charname = :charname");
				$stmt->execute(array(':report' => $report, ':charname' => $charname));		
//************add enemy flag for looting the body in case of errors
//use fight flag for looting
//************OR redirect with copy of fightlog to loot body!
//at loot page remove flag and update fightlog table with event
header('Location: loot.php');
die('This site works best with redirections turned on, but you may continue with them turned off. <a href="loot.php">Continue</a>');
?>