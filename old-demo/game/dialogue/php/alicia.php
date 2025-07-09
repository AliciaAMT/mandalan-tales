<?php

$response=strip_tags($_POST["type"]);
$query=sprintf("select * from flags where username='%s';", mysql_real_escape_string($username));
$result=mysql_query($query);
while($row = mysql_fetch_array($result))
  {
  if (!$response)
  {
  if ($row['guild']==1)

  {
  include ('php/npcicon.php');
  echo "alicia";
  include ('php/npcname.php');
  echo "Alicia";
  include ('php/npcdialogue.php');
  echo "Hello young adventurer! To be worthy of this guild and our markings you must first perform some tasks that will both prove your worth and make you worthy at the same time. You first task is to collect 20 batwings and bring them to me. I need to make some vampiric potion. Do this and you shall be rewarded.";
  include ('php/usericon.php');
  echo "<table class=\"page\" width=\"100%\"><tr><td class=\"center\" width=\"15%\"><form action=\"../maingraphics.php?";
echo time();

echo "\" method=\"post\"><input class=\"invisible\" type=\"radio\" name=\"type\" checked=\"checked\" value=\"2\" /><input class=\"small\" type=\"submit\" value=\"Say\" /></form></td><td class=\"left\">Ok, thank you.</td></tr></table>";
$query=sprintf("update flags set guild=2 where username='%s';", mysql_real_escape_string($username));

  mysql_query ($query);

  include ('php/tableend.php');
  }

  if ($row['guild']==2)

  {
  include ('php/npcicon.php');
  echo "alicia";
  include ('php/npcname.php');
  echo "Alicia";
  include ('php/npcdialogue.php');
  echo "So do you have the batwings for me yet?";
  include ('php/usericon.php');
  include ('php/getbatwings.php');
  if ($batwings<20)
  {
  echo "<table class=\"page\" width=\"100%\"><tr><td class=\"center\" width=\"15%\"><form action=\"../maingraphics.php?";
echo time();

echo "\" method=\"post\"><input class=\"invisible\" type=\"radio\" name=\"type\" checked=\"checked\" value=\"2\" /><input class=\"small\" type=\"submit\" value=\"Say\" /></form></td><td class=\"left\">Not yet.</td></tr></table>";
}


if ($batwings>19)
{
  echo "<table class=\"page\" width=\"100%\"><tr><td class=\"center\" width=\"15%\"><form action=\"alicia.php?";
echo time();
echo "\" method=\"post\"><input class=\"invisible\" type=\"radio\" name=\"type\" checked=\"checked\" value=\"2\" /><input class=\"small\" type=\"submit\" value=\"Say\" /></form></td><td class=\"left\">Yes, here they are.</td></tr></table>";

$query=sprintf("update flags set guild=3 where username='%s';", mysql_real_escape_string($username));
mysql_query ($query);

$query=sprintf("update inventory set keep=keep-20 where username='%s' and itemname='Bat Wings';", mysql_real_escape_string($username));
mysql_query ($query);
}
  include ('php/tableend.php');
  }

  
  if ($row['guild']==3)

  {
  include ('php/npcicon.php');
  echo "alicia";
  include ('php/npcname.php');
  echo "Alicia";
  include ('php/npcdialogue.php');
  echo "So do you have the spider silks for me yet?";
  include ('php/usericon.php');
  include ('php/getspidersilk.php');
  if ($spidersilk<20)
  {
  echo "<table class=\"page\" width=\"100%\"><tr><td class=\"center\" width=\"15%\"><form action=\"../maingraphics.php?";
echo time();

echo "\" method=\"post\"><input class=\"invisible\" type=\"radio\" name=\"type\" checked=\"checked\" value=\"3\" /><input class=\"small\" type=\"submit\" value=\"Say\" /></form></td><td class=\"left\">Not yet.</td></tr></table>";
}


if ($spidersilk>0)
{
  echo "<table class=\"page\" width=\"100%\"><tr><td class=\"center\" width=\"15%\"><form action=\"alicia.php?";
echo time();
echo "\" method=\"post\"><input class=\"invisible\" type=\"radio\" name=\"type\" checked=\"checked\" value=\"3\" /><input class=\"small\" type=\"submit\" value=\"Say\" /></form></td><td class=\"left\">Yes, here it is.</td></tr></table>";

$query=sprintf("update flags set guild=4 where username='%s';", mysql_real_escape_string($username));
mysql_query ($query);

$query=sprintf("update inventory set keep=keep-20 where username='%s' and itemname='Spider Silk';", mysql_real_escape_string($username));
mysql_query ($query);
}
  include ('php/tableend.php');
  }

  
}



  if ($response==2)
  {
  include ('php/npcicon.php');
  echo "alicia";
  include ('php/npcname.php');
  echo "Alicia";
  include ('php/npcdialogue.php');
  echo "Very well, your next quest will be to retrieve 20 spider silks. I need a holding potion. Here is your reward: <br /><img src=\"../images/vampiricpot.png\" /><br />Vampiric Potion x3";
  include ('php/usericon.php');
  echo "<table class=\"page\" width=\"100%\"><tr><td class=\"center\" width=\"15%\"><form action=\"../maingraphics.php?";
echo time();

echo "\" method=\"post\"><input class=\"invisible\" type=\"radio\" name=\"type\" checked=\"checked\" value=\"2\" /><input class=\"small\" type=\"submit\" value=\"Say\" /></form></td><td class=\"left\">Ok, thank you.</td></tr></table>";

include ('php/addvampiricpot.php');

  $query=sprintf("update stats set experience=experience+100 where username='%s';", mysql_real_escape_string($username));
  mysql_query ($query);

  include ('php/tableend.php');
  }
   if ($response==3)
  {
  include ('php/npcicon.php');
  echo "alicia";
  include ('php/npcname.php');
  echo "Alicia";
  include ('php/npcdialogue.php');
  echo "Very well, your next quest will be to retrieve 20 rat tails. I need Dreaded Disease Potions. Here is your reward: <br /><img src=\"../images/holdingpot.png\" /><br />Holding Potion x3";
  include ('php/usericon.php');
  echo "<table class=\"page\" width=\"100%\"><tr><td class=\"center\" width=\"15%\"><form action=\"../maingraphics.php?";
echo time();

echo "\" method=\"post\"><input class=\"invisible\" type=\"radio\" name=\"type\" checked=\"checked\" value=\"2\" /><input class=\"small\" type=\"submit\" value=\"Say\" /></form></td><td class=\"left\">Ok, thank you.</td></tr></table>";

include ('php/addholdingpot.php');

  $query=sprintf("update stats set experience=experience+100 where username='%s';", mysql_real_escape_string($username));
  mysql_query ($query);

  include ('php/tableend.php');
  }
  
}



?>