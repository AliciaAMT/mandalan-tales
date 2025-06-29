<?php
include ('includes/getflags.php');
$display1 = '<br /><a href="';
$path = 'dialogue/father';
$display2 = '.php?'.time().'"><img style="width: ';
$imgwidth = 'auto';
$display3 = '; height: ';
$imgheight = 'auto';
$display4 = ';" src="images/';
$npcimage = 'default';
$display5 = '.png" border="0" /><br />';
$npcname = 'None';
$display6 = '</a>';

$stmt = $db->prepare("SELECT map, xaxis, yaxis, level FROM charstats WHERE charname=:charname;");
				$stmt->execute(array(':charname' => $charname));
while($row = $stmt->fetch())
  {
    
if ($row['map']=="homeup" and $row['xaxis']==2 and $row['yaxis']==2)
  {
	$npcimage = 'male1';
	$npcname = 'Father';
	$path = 'dialogue/father';
	$strtogether = $display1.$path.$display2.$imgwidth.$display3.$imgheight.$display4.$npcimage.$display5.$npcname.$display6;
	echo $strtogether;
  }
if ($row['map']=="home" and $row['xaxis']==2 and $row['yaxis']==2)
  {
$rand=rand(1,100);
if ($rand<100)
{
	$npcimage = 'rat';
	$npcname = 'Rat<br />Level 1';
	$path = 'monsters/rat';
	$strtogether = $display1.$path.$display2.$imgwidth.$display3.$imgheight.$display4.$npcimage.$display5.$npcname.$display6;
	echo $strtogether;
}
  }
if ($row['map']=="yard" and $row['xaxis']==3 and $row['yaxis']==3)
  {
  echo "<a href=\"oldshep.php?";
  echo time();
  echo "\"><img src=\"images/shep.png\" border=\"0\" /><br />Old Shep</a><br />";
  }
if ($row['map']=="cellar")
{

if ($row['map']=="cellar" and $row['xaxis']==2 and $row['yaxis']==5)
  {
if ($cellarspider==0)
{
  echo "<a href=\"monsters/cellarspider.php?";
  echo time();
  echo "\"><img src=\"images/cellarspider.png\" border=\"0\" /><br />Cellar Spider<br />Level 2</a><br />";
}
  }



if ($row['map']=="cellar" and $row['xaxis']==1 and $row['yaxis']==1)
  {
  
  $rand=mt_rand(1,100);
  
if ($rand>70)
{
  echo "<a href=\"monsters/rat.php?";
  echo time();
  echo "\"><img src=\"images/rat.png\" border=\"0\" /><br />Rat<br />Level 1</a><br />";
}
  }
  
if ($row['map']=="cellar" and $row['xaxis']==3 and $row['yaxis']==1)
  {
  
  $rand=mt_rand(1,100);
  
if ($rand>70)
{
  echo "<a href=\"monsters/rat.php?";
  echo time();
  echo "\"><img src=\"images/rat.png\" border=\"0\" /><br />Rat<br />Level 1</a><br />";
}
  }
  
if ($row['map']=="cellar" and $row['xaxis']==1 and $row['yaxis']==2)
  {
  
  $rand=mt_rand(1,100);
  
if ($rand>70)
{
  echo "<a href=\"monsters/spider.php?";
  echo time();
  echo "\"><img src=\"images/spider.png\" border=\"0\" /><br />Spider<br />Level ?</a><br />";
}
  }
if ($row['map']=="cellar" and $row['xaxis']==3 and $row['yaxis']==2)
  {
  
  $rand=mt_rand(1,100);
  
if ($rand>70)
{
  echo "<a href=\"monsters/spider.php?";
  echo time();
  echo "\"><img src=\"images/spider.png\" border=\"0\" /><br />Spider<br />Level ?</a><br />";
}
  }

if ($row['map']=="cellar" and $row['xaxis']==1 and $row['yaxis']==2)
  {
  
  $rand=mt_rand(1,100);
  
if ($rand>70)
{
  echo "<a href=\"monsters/spider.php?";
  echo time();
  echo "\"><img src=\"images/spider.png\" border=\"0\" /><br />Spider<br />Level ?</a><br />";
}
  }
  
if ($row['map']=="cellar" and $row['xaxis']==1 and $row['yaxis']==3)
  {
  
  $rand=mt_rand(1,100);
  
if ($rand>70)
{
  echo "<a href=\"monsters/ratl.php?";
  echo time();
  echo "\"><img src=\"images/rat.png\" border=\"0\" /><br />Rat<br />Level ?</a><br />";
}
  }
if ($row['map']=="cellar" and $row['xaxis']==3 and $row['yaxis']==3)
  {
  
  $rand=mt_rand(1,100);
  
if ($rand>70)
{
  echo "<a href=\"monsters/ratl.php?";
  echo time();
  echo "\"><img src=\"images/rat.png\" border=\"0\" /><br />Rat<br />Level ?</a><br />";
}
  }
  
if ($row['map']=="cellar" and $row['xaxis']==1 and $row['yaxis']==4)
  {
  
  $rand=mt_rand(1,100);
  
if ($rand>70)
{
  echo "<a href=\"monsters/spiderl.php?";
  echo time();
  echo "\"><img src=\"images/spider.png\" border=\"0\" /><br />Spider<br />Level ?</a><br />";
}
  }  
if ($row['map']=="cellar" and $row['xaxis']==3 and $row['yaxis']==4)
  {
  
  $rand=mt_rand(1,100);
  
if ($rand>70)
{
  echo "<a href=\"monsters/spiderl.php?";
  echo time();
  echo "\"><img src=\"images/spider.png\" border=\"0\" /><br />Spider<br />Level ?</a><br />";
}
  }  

if ($row['map']=="cellar" and $row['xaxis']==2 and $row['yaxis']==4)
  {
  
  $rand=mt_rand(1,100);
  
if ($rand>70)
{
  echo "<a href=\"monsters/spiderl.php?";
  echo time();
  echo "\"><img src=\"images/spider.png\" border=\"0\" /><br />Spider<br />Level ?</a><br />";
}
  }  

}
if ($row['map']=="barn")
{

  $rand=mt_rand(1,100);
  
if ($rand>70)
{
  echo "<a href=\"monsters/spiderl.php?";
  echo time();
  echo "\"><img src=\"images/spider.png\" border=\"0\" /><br />Spider<br />Level ?</a><br />";
}

if ($rand>50 and $rand<70)
{
 echo "<a href=\"monsters/ratl.php?";
  echo time();
  echo "\"><img src=\"images/rat.png\" border=\"0\" /><br />Rat<br />Level ?</a><br />";
}
  

}
if ($row['map']=="ishforest")
{

$rand=mt_rand(1,100);
  
if ($rand>70)
{
  echo "<a href=\"monsters/spiderl.php?";
  echo time();
  echo "\"><img src=\"images/spider.png\" border=\"0\" /><br />Spider<br />Level ?</a><br />";
}

if ($rand>50 and $rand<70)
{
 echo "<a href=\"monsters/ratl.php?";
  echo time();
  echo "\"><img src=\"images/rat.png\" border=\"0\" /><br />Rat<br />Level ?</a><br />";
}
  


}
if ($row['map']=="marah" and $row['xaxis']==3 and $row['yaxis']==2)
  {
  echo "<a href=\"dialogue/marah.php?";
  echo time();
  echo "\"><img src=\"images/marah.png\" border=\"0\" /><br />Marah</a><br />";
  }
if ($row['map']=="cave")
{

$rand=mt_rand(1,100);
if ($rand>50)
{
  echo "<a href=\"monsters/goblin.php?";
  echo time();
  echo "\"><img src=\"images/goblin.png\" border=\"0\" /><br />Goblin<br />Level ?</a><br />";
}

  }
if ($row['map']=="pyramida")
{

$rand=mt_rand(1,100);
  
if ($rand>80)
{
  echo "<a href=\"monsters/scorpion.php?";
  echo time();
  echo "\"><img src=\"images/scorpion.png\" border=\"0\" /><br />Scorpion<br />Level ?</a><br />";
}

if ($rand>60 and $rand<80)
{
 echo "<a href=\"monsters/bat.php?";
  echo time();
  echo "\"><img src=\"images/bat.png\" border=\"0\" /><br />Bat<br />Level ?</a><br />";
}

if ($rand>50 and $rand<60)
{
 echo "<a href=\"monsters/snake.php?";
  echo time();
  echo "\"><img src=\"images/snake.png\" border=\"0\" /><br />Snake<br />Level ?</a><br />";
}
 
}
}
?>