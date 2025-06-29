<?php  
if ($life<1)
{
$rand=mt_rand(1,100);
if ($rand<$brevivingjolt)
{
$stmt = $db->prepare("UPDATE charstats SET life=level WHERE charname= :charname") ;
				$stmt->execute(array(':charname' => $charname));
$report="<span class=\"green\">You have died! However, unexpectedly a great thunderbolt is summoned from the heavens and it jolts you back to life!</span><br />";
$stmt = $db->prepare("UPDATE enemy SET event=:report WHERE charname= :charname") ;
				$stmt->execute(array(':report' => $report, ':charname' => $charname));
//********redirect to continue fight*********
header('Location: nomove.php');
}
else
{
$query=sprintf("update stats set cond='Good' where username='%s';", mysql_real_escape_string($username));
  mysql_query($query);
  
  $query=sprintf("update stats set life=maxlife where username='%s';", mysql_real_escape_string($username));
  mysql_query($query);
  
$query=sprintf("update stats set mana=maxmana where username='%s';", mysql_real_escape_string($username));
  mysql_query($query);


  $query=sprintf("update stats set map=savemap where username='%s';", mysql_real_escape_string($username));
  mysql_query($query);
  
  $query=sprintf("update stats set mapdimensions=savemapdimensions where username='%s';", mysql_real_escape_string($username));
  mysql_query($query);
  
  $query=sprintf("update stats set yaxis=saveyaxis where username='%s';", mysql_real_escape_string($username));
  mysql_query($query);

$query=sprintf("update stats set xaxis=savexaxis where username='%s';", mysql_real_escape_string($username));
  mysql_query($query);

$query=sprintf("update enemy set fight=0 where username='%s';", mysql_real_escape_string($username));
  mysql_query($query);
  
  $query=sprintf("update stats set deaths=deaths+1 where username='%s';", mysql_real_escape_string($username));
  mysql_query($query);
  
  $exploss=round($row['experience']*.10);
  $query=sprintf("update stats set experience=experience-'%s' where username='%s';", mysql_real_escape_string($exploss), mysql_real_escape_string($username));
  mysql_query($query);
  
  //***********revive*****************
    
die ("<br /><br /><table class=\"page\"><tr><td class=\"border\">You have died!<br  /><br /><table class=\"page\"><tr><td class=\"page\">
<table class=\"page\"><tr><td class=\"page\"><form action=\"revive.php?".time()."\" method=\"post\"><input class=\"small\" type=\"submit\" value=\"Go Towards the Light\" /></form></td></tr></table></td></tr></table></td></tr></table></body></html>");
  echo "<div class=\"full\"><table class=\"page\"><tr><td class=\"border\">You move toward the light, but you are stopped by an angel who says, \"You must return. Your work is not yet finished.\"<br /><br />You awake in bed with a slight headache and a case of dejavu. You lose ".$exploss;
  echo " experience.<br /><br /><table class=\"page\"><tr><td class=\"page\"><table class=\"page\"><tr><td class=\"page\"><form action=\"../maingraphics.php?".time()."\" method=\"post\"><input class=\"small\" type=\"submit\" value=\"Continue\" /></form></td></tr></table></td></tr></table><br /><br /></td></tr></table></div></body></html>";	
//**********redirect to revive.php****************
header('Location: ../revive.php');
}
}
?>
