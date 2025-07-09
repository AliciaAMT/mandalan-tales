<?php
//*****************REMOVED POSSIBLE UNNEEDED GET ALL FLAGS, REPLACE IF NECESSARY*******
//**********CHANGED FROM * TO JUST MAP SELECT*********
$stmt = $db->prepare("SELECT map, xaxis, yaxis, mapdimensions FROM charstats WHERE charname=:charname;");
				$stmt->execute(array(':charname' => $charname));
while($row = $stmt->fetch())
{
if ($row['mapdimensions']==33)
{
  if ($row['mapdimensions']==33 and $row['xaxis']==2 and $row['yaxis']==2)
  {
  echo "<img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\">";
  
  if ($row['map']=="pyramidb")
  {
  if ($anubis=="0")
  {
   echo"<a href=\"monsters/anubis.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\" border=\"0\"></a>";
  }
  
  else
  {
  
  echo"<a href=\"movenorth.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\" border=\"0\"></a>";
  
  }
  }
  
  else
  { 
  
  echo"<a href=\"movenorth.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\" border=\"0\"></a>";
  }
  
  echo "<img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><br /><a href=\"movewest.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\"  border=\"0\"></a><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis'];
  echo "s.png\" class=\"map\"><a href=\"moveeast.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\" border=\"0\"></a><br /><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\"><a href=\"movesouth.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\" border=\"0\"></a><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\">";
	}


if ($row['mapdimensions']==33 and $row['xaxis']==2 and $row['yaxis']==3)
  {
  echo "<img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']+1;
  echo ".png\"  class=\"map\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\" border=\"0\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><br /><a href=\"movewest.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\"  border=\"0\"></a><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis'];
  echo "s.png\" class=\"map\"><a href=\"moveeast.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\" border=\"0\"></a><br /><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\"><a href=\"movesouth.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\" border=\"0\"></a><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\">";
	}


if ($row['mapdimensions']==33 and $row['xaxis']==1 and $row['yaxis']==2)
  {
  echo "<img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']+1;
  echo ".png\"  class=\"map\"><a href=\"movenorth.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\" border=\"0\"></a><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><br /><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\"  border=\"0\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis'];
  echo "s.png\" class=\"map\"><a href=\"moveeast.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\" border=\"0\"></a><br /><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\"><a href=\"movesouth.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\" border=\"0\"></a><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\">";
	}

if ($row['mapdimensions']==33 and $row['xaxis']==3 and $row['yaxis']==2)
  {
  echo "<img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><a href=\"movenorth.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\" border=\"0\"></a><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><br /><a href=\"movewest.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\"  border=\"0\"></a><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis'];
  echo "s.png\" class=\"map\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\" border=\"0\"><br /><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\"><a href=\"movesouth.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\" border=\"0\"></a><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\">";
	}

if ($row['mapdimensions']==33 and $row['xaxis']==2 and $row['yaxis']==1)
  {
  echo "<img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\">";
  
  if ($row['map']=="pyramidb")
  {
  
  $rand=mt_rand(1,10);
  if ($rand<7)
  {
   echo "<a href=\"monsters/giantsnake.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\" border=\"0\"></a>";
  }
  
  else
  {
  echo "<a href=\"movenorth.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\" border=\"0\"></a>";
  }
  }
  else
  {
  echo "<a href=\"movenorth.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\" border=\"0\"></a>";
  }
  
  echo "<img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><br />";
  
  if ($row['map']=="pyramidb")
  {
  $rand=mt_rand(1,10);
  if ($rand>7)
  {
  
  echo "<a href=\"montsers/giantsnake.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\"  border=\"0\"></a>";
  
  }
  else
  {
  echo "<a href=\"movewest.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\"  border=\"0\"></a>";
  }

  
  
  
  }
  else
  {
  echo "<a href=\"movewest.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\"  border=\"0\"></a>";
  }
  
  echo "<img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis'];
  echo "s.png\" class=\"map\">";
  
  if ($row['map']=="pyramidb")
  {
   
  $rand=mt_rand(1,10);
  
  if ($rand>7)
  {
  echo "<a href=\"monsters/giantsnake.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\" border=\"0\"></a>";
  }
  
  else
  {
  echo "<a href=\"moveeast.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\" border=\"0\"></a>";
  }
  }
  
  else
  
  {
  
  echo "<a href=\"moveeast.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\" border=\"0\"></a>";
  
  }
  
  
  
  echo "<br /><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\" border=\"0\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']-1;
  echo ".png?".time();
  echo "\" class=\"map\">";
	}

if ($row['mapdimensions']==33 and $row['xaxis']==1 and $row['yaxis']==3)
  {
  echo "<img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']+1;
  echo ".png\"  class=\"map\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\" border=\"0\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><br /><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\"  border=\"0\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis'];
  echo "s.png\" class=\"map\"><a href=\"moveeast.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\" border=\"0\"></a><br /><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\"><a href=\"movesouth.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\" border=\"0\"></a><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\">";
	}

if ($row['mapdimensions']==33 and $row['xaxis']==3 and $row['yaxis']==3)
  {
  echo "<img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']+1;
  echo ".png\"  class=\"map\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\" border=\"0\"></a><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><br /><a href=\"movewest.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\"  border=\"0\"></a><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis'];
  echo "s.png\" class=\"map\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\" border=\"0\"><br /><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\"><a href=\"movesouth.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\" border=\"0\"></a><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\">";
	}

if ($row['mapdimensions']==33 and $row['xaxis']==1 and $row['yaxis']==1)
  {
  if ($row['map']=="barn")
  {
  $rand=mt_rand(1,100);
  if ($rand>80)
  {
  echo "<img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']+1;
  echo ".png\"  class=\"map\"><a href=\"monsters/rat.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\" border=\"0\"></a><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><br /><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\"  border=\"0\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis'];
  echo "s.png\" class=\"map\"><a href=\"monsters/rat.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\" border=\"0\"></a><br /><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\" border=\"0\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\">";
  }
  else
  {
  echo "<img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']+1;
  echo ".png\"  class=\"map\"><a href=\"movenorth.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\" border=\"0\"></a><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><br /><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\"  border=\"0\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis'];
  echo "s.png\" class=\"map\"><a href=\"moveeast.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\" border=\"0\"></a><br /><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\" border=\"0\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\">";
  }
  
  }
  else
  {
  echo "<img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']+1;
  echo ".png\"  class=\"map\"><a href=\"movenorth.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\" border=\"0\"></a><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><br /><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\"  border=\"0\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis'];
  echo "s.png\" class=\"map\"><a href=\"moveeast.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\" border=\"0\"></a><br /><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\" border=\"0\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\">";
  }
	}

if ($row['mapdimensions']==33 and $row['xaxis']==3 and $row['yaxis']==1)
  {
  echo "<img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><a href=\"movenorth.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\" border=\"0\"></a><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><br /><a href=\"movewest.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\"  border=\"0\"></a><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis'];
  echo "s.png\" class=\"map\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\" border=\"0\"><br /><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\" border=\"0\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\">";
	}


}
if ($row['mapdimensions']==00)
{
if ($row['map']=="cellar")
{
if ($row['mapdimensions']==00 and $row['map']=="cellar" and $row['xaxis']==2 and $row['yaxis']==1)
  {
  
  $rand=mt_rand(1,100);
  
  if ($rand>80)
  {
  echo "<img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><a href=\"monsters/spiderl.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\" border=\"0\"></a><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><br /><a href=\"monsters/spiderl.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\"  border=\"0\"></a><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis'];
  echo "s.png\" class=\"map\"><a href=\"monsters/spiderl.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\" border=\"0\"></a><br /><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\" border=\"0\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\">";
  }
  else 
  {
  echo "<img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><a href=\"movenorth.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\" border=\"0\"></a><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><br /><a href=\"movewest.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\"  border=\"0\"></a><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis'];
  echo "s.png\" class=\"map\"><a href=\"moveeast.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\" border=\"0\"></a><br /><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\" border=\"0\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\">";
  }
  
  	}

if ($row['mapdimensions']==00 and $row['map']=="cellar" and $row['xaxis']==1 and $row['yaxis']==1)
  {
  $rand=mt_rand(1,100);
  
  if ($rand>80)
  {
  //********
  
  echo "<img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\">";
  echo "<a href=\"monsters/rat.php?".time()."\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\" border=\"0\"></a>";
  echo "<img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><br /><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\"  border=\"0\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis'];
  echo "s.png\" class=\"map\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\" border=\"0\"><br /><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\"><a href=\"monsters/rat.php?".time()."\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\" border=\"0\"></a><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\">";
	}

  
  //********

  else
  {
  echo "<img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><a href=\"movenorth.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\" border=\"0\"></a><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><br /><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\"  border=\"0\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis'];
  echo "s.png\" class=\"map\"><a href=\"moveeast.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\" border=\"0\"></a><br /><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\" border=\"0\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\">";
  }
	}

if ($row['mapdimensions']==00 and $row['map']=="cellar" and $row['xaxis']==3 and $row['yaxis']==1)
  {
  $rand=mt_rand(1,100);
  
  if ($rand>80)
  {
  echo "<img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><a href=\"monsters/rat.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\" border=\"0\"></a><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><br /><a href=\"monsters/rat.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\" border=\"0\"></a><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis'];
  echo "s.png\" class=\"map\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\" border=\"0\"><br /><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\" border=\"0\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\">";
  }
  else 
  {
  echo "<img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><a href=\"movenorth.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\" border=\"0\"></a><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><br /><a href=\"movewest.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\"  border=\"0\"></a><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis'];
  echo "s.png\" class=\"map\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\" border=\"0\"><br /><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\" border=\"0\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\">";
  }
	}


if ($row['mapdimensions']==00 and $row['map']=="cellar" and $row['xaxis']==1 and $row['yaxis']==2)
  {
  $rand=mt_rand(1,100);
  if ($rand>80)
  {
  echo "<img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><a href=\"monsters/spider.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\" border=\"0\"></a><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><br /><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\" border=\"0\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis'];
  echo "s.png\" class=\"map\"><a href=\"monsters/spider.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\" border=\"0\"></a><br /><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\"><a href=\"monsters/spider.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\" border=\"0\"></a><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\">";
  }
  else
  {
  echo "<img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><a href=\"movenorth.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\" border=\"0\"></a><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><br /><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\"  border=\"0\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis'];
  echo "s.png\" class=\"map\"><a href=\"moveeast.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\" border=\"0\"></a><br /><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\"><a href=\"movesouth.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\" border=\"0\"></a><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\">";
  }
	}


if ($row['mapdimensions']==00 and $row['map']=="cellar" and $row['xaxis']==2 and $row['yaxis']==2)
  {

  echo "<img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><a href=\"movenorth.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\" border=\"0\"></a><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><br /><a href=\"movewest.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\"  border=\"0\"></a><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis'];
  echo "s.png\" class=\"map\"><a href=\"moveeast.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\" border=\"0\"></a><br /><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\"><a href=\"movesouth.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\" border=\"0\"></a><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\">";
	}

if ($row['mapdimensions']==00 and $row['map']=="cellar" and $row['xaxis']==3 and $row['yaxis']==2)
  {
  $rand=mt_rand(1,100);
  if ($rand>80)
  {
  echo "<img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><a href=\"monsters/spider.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\" border=\"0\"></a><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><br /><a href=\"monsters/spider.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\"  border=\"0\"></a><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis'];
  echo "s.png\" class=\"map\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\" border=\"0\"><br /><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\"><a href=\"monsters/spider.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\" border=\"0\"></a><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\">";
  }
  else
  {
  echo "<img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><a href=\"movenorth.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\" border=\"0\"></a><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><br /><a href=\"movewest.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\" border=\"0\"></a><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis'];
  echo "s.png\" class=\"map\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\" border=\"0\"><br /><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\"><a href=\"movesouth.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\" border=\"0\"></a><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\">";
  }
	}


if ($row['mapdimensions']==00 and $row['map']=="cellar" and $row['xaxis']==1 and $row['yaxis']==3)
  {
  $rand=mt_rand(1,100);
  if ($rand>80)
  {
  echo "<img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><a href=\"monsters/rat.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\" border=\"0\"></a><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><br /><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\"  border=\"0\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis'];
  echo "s.png\" class=\"map\"><a href=\"monsters/rat.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\" border=\"0\"></a><br /><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\"><a href=\"monsters/rat.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\" border=\"0\"></a><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\">";
  }
  else
  {
  echo "<img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><a href=\"movenorth.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\" border=\"0\"></a><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><br /><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\"  border=\"0\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis'];
  echo "s.png\" class=\"map\"><a href=\"moveeast.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\" border=\"0\"></a><br /><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\"><a href=\"movesouth.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\" border=\"0\"></a><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\">";
  }
	}


if ($row['mapdimensions']==00 and $row['map']=="cellar" and $row['xaxis']==2 and $row['yaxis']==3)
  {
$rand=mt_rand(1,100);
  if ($rand>80)
  {
  echo "<img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><a href=\"monsters/rat.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\" border=\"0\"></a><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><br /><a href=\"monsters/rat.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\"  border=\"0\"></a><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis'];
  echo "s.png\" class=\"map\"><a href=\"monsters/rat.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\" border=\"0\"></a><br /><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\"><a href=\"monsters/rat.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\" border=\"0\"></a><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\">";
  }
  
  else
  {
  echo "<img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><a href=\"movenorth.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\" border=\"0\"></a><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><br /><a href=\"movewest.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\"  border=\"0\"></a><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis'];
  echo "s.png\" class=\"map\"><a href=\"moveeast.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\" border=\"0\"></a><br /><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\"><a href=\"movesouth.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\" border=\"0\"></a><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\">";
  }
	}

if ($row['mapdimensions']==00 and $row['map']=="cellar" and $row['xaxis']==3 and $row['yaxis']==3)
  {
  $rand=mt_rand(1,100);
  if ($rand>80)
  {
  
  echo "<img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><a href=\"monsters/rat.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\" border=\"0\"></a><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><br /><a href=\"monsters/rat.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\"  border=\"0\"></a><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis'];
  echo "s.png\" class=\"map\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\" border=\"0\"><br /><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\"><a href=\"monsters/rat.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\" border=\"0\"></a><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\">";
  }
  else
  {
  echo "<img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><a href=\"movenorth.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\" border=\"0\"></a><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><br /><a href=\"movewest.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\"  border=\"0\"></a><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis'];
  echo "s.png\" class=\"map\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\" border=\"0\"><br /><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\"><a href=\"movesouth.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\" border=\"0\"></a><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\">";
  }
	}

if ($row['mapdimensions']==00 and $row['map']=="cellar" and $row['xaxis']==1 and $row['yaxis']==4)
  {
  $rand=mt_rand(1,100);
  if ($rand>80)
  {
  
  echo "<img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\" border=\"0\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><br /><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\"  border=\"0\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis'];
  echo "s.png\" class=\"map\"><a href=\"monsters/spider.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\" border=\"0\"></a><br /><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\"><a href=\"monsters/spider.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\" border=\"0\"></a><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\">";
  }
  else
  {
  
  echo "<img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\" border=\"0\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><br /><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\"  border=\"0\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis'];
  echo "s.png\" class=\"map\"><a href=\"moveeast.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\" border=\"0\"></a><br /><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\"><a href=\"movesouth.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\" border=\"0\"></a><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\">";
	}
	}

if ($row['mapdimensions']==00 and $row['map']=="cellar" and $row['xaxis']==2 and $row['yaxis']==4)
  {
  echo "<img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><a href=\"movenorth.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\" border=\"0\"></a><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><br /><a href=\"movewest.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\"  border=\"0\"></a><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis'];
  echo "s.png\" class=\"map\"><a href=\"moveeast.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\" border=\"0\"></a><br /><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\"><a href=\"movesouth.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\" border=\"0\"></a><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\">";
	}

if ($row['mapdimensions']==00 and $row['map']=="cellar" and $row['xaxis']==3 and $row['yaxis']==4)
  {
  $rand=mt_rand(1,100);
  if ($rand>80)
  {
  
  echo "<img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\" border=\"0\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><br /><a href=\"monsters/spider.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\"  border=\"0\"></a><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis'];
  echo "s.png\" class=\"map\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\" border=\"0\"><br /><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\"><a href=\"monsters/spider.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\" border=\"0\"></a><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\">";
  }
  else
  {
  echo "<img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\" border=\"0\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><br /><a href=\"movewest.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\"  border=\"0\"></a><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis'];
  echo "s.png\" class=\"map\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\" border=\"0\"><br /><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\"><a href=\"movesouth.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\" border=\"0\"></a><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\">";
  }
	}


if ($row['mapdimensions']==00 and $row['map']=="cellar" and $row['xaxis']==2 and $row['yaxis']==5)
  {
  echo "<img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\">";

if ($cellarspider==0)
{
echo "<a href=\"monsters/cellarspider.php?".time()."\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\" border=\"0\"></a>";
}

else
{
echo "<a href=\"movenorth.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\" border=\"0\"></a>";
}

echo "<img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><br /><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\"  border=\"0\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis'];
  echo "s.png\" class=\"map\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\" border=\"0\"><br /><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\"><a href=\"movesouth.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\" border=\"0\"></a><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\">";
	}

if ($row['mapdimensions']==00 and $row['map']=="cellar" and $row['xaxis']==2 and $row['yaxis']==6)
  {
  echo "<img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\" border=\"0\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><br /><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\"  border=\"0\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis'];
  echo "s.png\" class=\"map\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\" border=\"0\"><br /><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\"><a href=\"movesouth.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\" border=\"0\"></a><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\">";
	}
}
 
if ($row['map']=="cave")
{
if ($row['mapdimensions']==00 and $row['map']=="cave" and $row['xaxis']==1 and $row['yaxis']==3)
  {
  
  $rand=mt_rand(1,100);
  
  if ($rand>70)
  {
  echo "<img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\" border=\"0\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><br /><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\"  border=\"0\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis'];
  echo "s.png\" class=\"map\"><a href=\"monsters/goblin.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\" border=\"0\"></a><br /><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\" border=\"0\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\">";
  }
  else 
  {
  echo "<img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\" border=\"0\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><br /><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\"  border=\"0\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis'];
  echo "s.png\" class=\"map\"><a href=\"moveeast.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\" border=\"0\"></a><br /><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\" border=\"0\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\">";
  }
  
  	}

if ($row['mapdimensions']==00 and $row['map']=="cave" and $row['xaxis']==2 and $row['yaxis']==3)
  {
  
  $rand=mt_rand(1,100);
  
  if ($rand>70)
  {
  echo "<img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\" border=\"0\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><a href=\"monsters/goblin.php?".time();
  echo "\"><br /><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\"  border=\"0\"></a><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis'];
  echo "s.png\" class=\"map\"><a href=\"monsters/goblin.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\" border=\"0\"></a><br /><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\" border=\"0\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\">";
  }
  else 
  {
  echo "<img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\" border=\"0\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><a href=\"movewest.php?".time();
  echo "\"><br /><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\"  border=\"0\"></a><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis'];
  echo "s.png\" class=\"map\"><a href=\"moveeast.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\" border=\"0\"></a><br /><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\" border=\"0\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\">";
  }
  
  	}

if ($row['mapdimensions']==00 and $row['map']=="cave" and $row['xaxis']==3 and $row['yaxis']==3)
  {
  
  $rand=mt_rand(1,100);
  if ($rand>70)
  {
  echo "<img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><a href=\"monsters/goblin.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\" border=\"0\"></a><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><br /><a href=\"monsters/goblin.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\"  border=\"0\"></a><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis'];
  echo "s.png\" class=\"map\"><a href=\"monsters/goblin.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\" border=\"0\"></a><br /><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\"><a href=\"monsters/goblin.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\" border=\"0\"></a><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\">";
  }
  
  else
  {
  echo "<img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><a href=\"movenorth.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\" border=\"0\"></a><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><br /><a href=\"movewest.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\"  border=\"0\"></a><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis'];
  echo "s.png\" class=\"map\"><a href=\"moveeast.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\" border=\"0\"></a><br /><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\"><a href=\"movesouth.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\" border=\"0\"></a><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\">";
  }
  	}
	
if ($row['mapdimensions']==00 and $row['map']=="cave" and $row['xaxis']==4 and $row['yaxis']==3)
  {
  
  $rand=mt_rand(1,100);
  
  if ($rand>70)
  {
  echo "<img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\" border=\"0\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><a href=\"monsters/goblin.php?".time();
  echo "\"><br /><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\"  border=\"0\"></a><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis'];
  echo "s.png\" class=\"map\"><a href=\"monsters/goblin.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\" border=\"0\"></a><br /><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\" border=\"0\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\">";
  }
  else 
  {
  echo "<img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\" border=\"0\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><a href=\"movewest.php?".time();
  echo "\"><br /><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\"  border=\"0\"></a><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis'];
  echo "s.png\" class=\"map\"><a href=\"moveeast.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\" border=\"0\"></a><br /><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\" border=\"0\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\">";
  }
  
  	}
	
if ($row['mapdimensions']==00 and $row['map']=="cave" and $row['xaxis']==5 and $row['yaxis']==3)
  {
  
  $rand=mt_rand(1,100);
  if ($rand>70)
  {
  echo "<img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><a href=\"monsters/goblin.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\" border=\"0\"></a><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><br /><a href=\"monsters/goblin.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\"  border=\"0\"></a><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis'];
  echo "s.png\" class=\"map\"><a href=\"monsters/goblin.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\" border=\"0\"></a><br /><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\"><a href=\"monsters/goblin.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\" border=\"0\"></a><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\">";
  }
  
  else
  {
  echo "<img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><a href=\"movenorth.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\" border=\"0\"></a><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><br /><a href=\"movewest.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\"  border=\"0\"></a><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis'];
  echo "s.png\" class=\"map\"><a href=\"moveeast.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\" border=\"0\"></a><br /><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\"><a href=\"movesouth.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\" border=\"0\"></a><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\">";
  }
  	}

if ($row['mapdimensions']==00 and $row['map']=="cave" and $row['xaxis']==6 and $row['yaxis']==3)
   {
  $rand=mt_rand(1,100);
  
  if ($rand>70)
  {
  echo "<img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\" border=\"0\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><a href=\"monsters/goblin.php?".time();
  echo "\"><br /><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\"  border=\"0\"></a><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis'];
  echo "s.png\" class=\"map\"><a href=\"monsters/goblin.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\" border=\"0\"></a><br /><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\" border=\"0\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\">";
  }
  else 
  {
  echo "<img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\" border=\"0\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><a href=\"movewest.php?".time();
  echo "\"><br /><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\"  border=\"0\"></a><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis'];
  echo "s.png\" class=\"map\"><a href=\"moveeast.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\" border=\"0\"></a><br /><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\" border=\"0\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\">";
  }
  
  	}	
if ($row['mapdimensions']==00 and $row['map']=="cave" and $row['xaxis']==7 and $row['yaxis']==3)
 {
  
  $rand=mt_rand(1,100);
  
  if ($rand>70)
  {
  echo "<img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\" border=\"0\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><a href=\"monsters/goblin.php?".time();
  echo "\"><br /><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\"  border=\"0\"></a><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis'];
  echo "s.png\" class=\"map\"><a href=\"monsters/goblin.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\" border=\"0\"></a><br /><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\" border=\"0\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\">";
  }
  else 
  {
  echo "<img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\" border=\"0\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><a href=\"movewest.php?".time();
  echo "\"><br /><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\"  border=\"0\"></a><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis'];
  echo "s.png\" class=\"map\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\" border=\"0\"><br /><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\" border=\"0\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\">";
  }
  
  	}
if ($row['mapdimensions']==00 and $row['map']=="cave" and $row['xaxis']==3 and $row['yaxis']==2)
  {
  
  $rand=mt_rand(1,100);
  if ($rand>70)
  {
  echo "<img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><a href=\"monsters/goblin.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\" border=\"0\"></a><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><br /><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\"  border=\"0\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis'];
  echo "s.png\" class=\"map\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\" border=\"0\"><br /><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\"><a href=\"monsters/goblin.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\" border=\"0\"></a><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\">";
  }
  
  else
  {
  echo "<img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><a href=\"movenorth.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\" border=\"0\"></a><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><br /><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\"  border=\"0\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis'];
  echo "s.png\" class=\"map\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\" border=\"0\"><br /><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\"><a href=\"movesouth.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\" border=\"0\"></a><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\">";
  }
  	}

if ($row['mapdimensions']==00 and $row['map']=="cave" and $row['xaxis']==3 and $row['yaxis']==4)
  {
  
  $rand=mt_rand(1,100);
  if ($rand>70)
  {
  echo "<img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><a href=\"monsters/goblin.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\" border=\"0\"></a><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><br /><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\"  border=\"0\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis'];
  echo "s.png\" class=\"map\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\" border=\"0\"><br /><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\"><a href=\"monsters/goblin.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\" border=\"0\"></a><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\">";
  }
  
  else
  {
  echo "<img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><a href=\"movenorth.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\" border=\"0\"></a><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><br /><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\"  border=\"0\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis'];
  echo "s.png\" class=\"map\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\" border=\"0\"><br /><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\"><a href=\"movesouth.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\" border=\"0\"></a><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\">";
  }
  	}

if ($row['mapdimensions']==00 and $row['map']=="cave" and $row['xaxis']==5 and $row['yaxis']==2)
  {
  
  $rand=mt_rand(1,100);
  if ($rand>70)
  {
  echo "<img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><a href=\"monsters/goblin.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\" border=\"0\"></a><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><br /><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\"  border=\"0\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis'];
  echo "s.png\" class=\"map\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\" border=\"0\"><br /><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\"><a href=\"monsters/goblin.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\" border=\"0\"></a><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\">";
  }
  
  else
  {
  echo "<img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><a href=\"movenorth.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\" border=\"0\"></a><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><br /><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\"  border=\"0\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis'];
  echo "s.png\" class=\"map\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\" border=\"0\"><br /><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\"><a href=\"movesouth.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\" border=\"0\"></a><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\">";
  }
  	}

if ($row['mapdimensions']==00 and $row['map']=="cave" and $row['xaxis']==5 and $row['yaxis']==4)
  {
  
  $rand=mt_rand(1,100);
  if ($rand>70)
  {
  echo "<img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><a href=\"monsters/goblin.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\" border=\"0\"></a><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><br /><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\"  border=\"0\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis'];
  echo "s.png\" class=\"map\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\" border=\"0\"><br /><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\"><a href=\"monsters/goblin.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\" border=\"0\"></a><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\">";
  }
  
  else
  {
  echo "<img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><a href=\"movenorth.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\" border=\"0\"></a><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><br /><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\"  border=\"0\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis'];
  echo "s.png\" class=\"map\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\" border=\"0\"><br /><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\"><a href=\"movesouth.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\" border=\"0\"></a><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\">";
  }
  	}

if ($row['mapdimensions']==00 and $row['map']=="cave" and $row['xaxis']==5 and $row['yaxis']==5)
  {
  
  $rand=mt_rand(1,100);
  if ($rand>70)
  {
  echo "<img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\" border=\"0\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><br /><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\"  border=\"0\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis'];
  echo "s.png\" class=\"map\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\" border=\"0\"><br /><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\"><a href=\"monsters/goblin.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\" border=\"0\"></a><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\">";
  }
  
  else
  {
  echo "<img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\" border=\"0\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><br /><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\"  border=\"0\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis'];
  echo "s.png\" class=\"map\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\" border=\"0\"><br /><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\"><a href=\"movesouth.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\" border=\"0\"></a><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\">";
  }
  	}

if ($row['mapdimensions']==00 and $row['map']=="cave" and $row['xaxis']==3 and $row['yaxis']==5)
  {
  
  $rand=mt_rand(1,100);
  if ($rand>70)
  {
  echo "<img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\" border=\"0\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><br /><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\"  border=\"0\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis'];
  echo "s.png\" class=\"map\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\" border=\"0\"><br /><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\"><a href=\"monsters/goblin.php?".time();
  echo "\"><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\" border=\"0\"></a><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\">";
  }
  
  else
  {
  echo "<img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\" border=\"0\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><br /><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\"  border=\"0\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis'];
  echo "s.png\" class=\"map\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\" border=\"0\"><br /><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\"><a href=\"movesouth.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\" border=\"0\"></a><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\">";
  }
  	}
	
if ($row['mapdimensions']==00 and $row['map']=="cave" and $row['xaxis']==5 and $row['yaxis']==1)
  {
  
  $rand=mt_rand(1,100);
  if ($rand>70)
  {
  echo "<img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><a href=\"monsters/goblin.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\" border=\"0\"></a><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><br /><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\"  border=\"0\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis'];
  echo "s.png\" class=\"map\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\" border=\"0\"><br /><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\" border=\"0\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\">";
  }
  
  else
  {
  echo "<img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><a href=\"movenorth.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\" border=\"0\"></a><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><br /><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\"  border=\"0\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis'];
  echo "s.png\" class=\"map\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\" border=\"0\"><br /><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\" border=\"0\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\">";
  }
  	}

	if ($row['mapdimensions']==00 and $row['map']=="cave" and $row['xaxis']==3 and $row['yaxis']==1)
  {
  
  $rand=mt_rand(1,100);
  if ($rand>70)
  {
  echo "<img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><a href=\"monsters/goblin.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\" border=\"0\"></a><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><br /><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\"  border=\"0\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis'];
  echo "s.png\" class=\"map\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\" border=\"0\"><br /><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\" border=\"0\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\">";
  }
  
  else
  {
  echo "<img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><a href=\"movenorth.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\" border=\"0\"></a><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><br /><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\"  border=\"0\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis'];
  echo "s.png\" class=\"map\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\" border=\"0\"><br /><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\" border=\"0\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\">";
  }
  }
  	}
if ($row['map']=="pyramida")
{

if ($row['xaxis']==6 and $row['yaxis']==1)
  {
  
  $rand=mt_rand(1,100);
  
  if ($rand>70)
  {
  
  echo "<img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><a href=\"monsters/ratl.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\" border=\"0\"></a><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><br /><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\"  border=\"0\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis'];
  echo "s.png\" class=\"map\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\" border=\"0\"><br /><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\" border=\"0\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\">";
  }
  else
  {
  
  echo "<img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><a href=\"movenorth.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\" border=\"0\"></a><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><br /><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\"  border=\"0\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis'];
  echo "s.png\" class=\"map\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\" border=\"0\"><br /><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\" border=\"0\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\">";
  }
	}

if ($row['xaxis']==6 and $row['yaxis']==2)
  {
  
  $rand=mt_rand(1,100);
  
  if ($rand>70)
  {
  
  echo "<img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><a href=\"monsters/spiderl.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\" border=\"0\"></a><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><br /><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\"  border=\"0\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis'];
  echo "s.png\" class=\"map\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\" border=\"0\"><br /><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\"><a href=\"monsters/spiderl.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\" border=\"0\"></a><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\">";
  }
  else
  {
  
  echo "<img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><a href=\"movenorth.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\" border=\"0\"></a><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><br /><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\"  border=\"0\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis'];
  echo "s.png\" class=\"map\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\" border=\"0\"><br /><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\"><a href=\"movesouth.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\" border=\"0\"></a><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\">";
  }
	}	
	
if ($row['xaxis']==6 and $row['yaxis']==3)
  {
  
  $rand=mt_rand(1,100);
  
  if ($rand>70)
  {
  
  echo "<img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><a href=\"monsters/spiderl.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\" border=\"0\"></a><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><br /><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\"  border=\"0\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis'];
  echo "s.png\" class=\"map\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\" border=\"0\"><br /><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\"><a href=\"monsters/spiderl.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\" border=\"0\"></a><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\">";
  }
  else
  {
  
  echo "<img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><a href=\"movenorth.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\" border=\"0\"></a><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><br /><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\"  border=\"0\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis'];
  echo "s.png\" class=\"map\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\" border=\"0\"><br /><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\"><a href=\"movesouth.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\" border=\"0\"></a><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\">";
  }
	}	
	
if ($row['xaxis']==6 and $row['yaxis']==4)
  {
  
  $rand=mt_rand(1,100);
  
  if ($rand>70)
  {
  
  echo "<img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><a href=\"monsters/spiderl.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\" border=\"0\"></a><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><br /><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\"  border=\"0\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis'];
  echo "s.png\" class=\"map\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\" border=\"0\"><br /><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\"><a href=\"monsters/spiderl.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\" border=\"0\"></a><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\">";
  }
  else
  {
  
  echo "<img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><a href=\"movenorth.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\" border=\"0\"></a><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><br /><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\"  border=\"0\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis'];
  echo "s.png\" class=\"map\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\" border=\"0\"><br /><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\"><a href=\"movesouth.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\" border=\"0\"></a><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\">";
  }
	}	
	
if ($row['xaxis']==6 and $row['yaxis']==5)
  {
  
  $rand=mt_rand(1,100);
  
  if ($rand>70)
  {
  
  echo "<img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><a href=\"monsters/ratl.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\" border=\"0\"></a><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><br /><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\"  border=\"0\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis'];
  echo "s.png\" class=\"map\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\" border=\"0\"><br /><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\"><a href=\"monsters/ratl.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\" border=\"0\"></a><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\">";
  }
  else
  {
  
  echo "<img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><a href=\"movenorth.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\" border=\"0\"></a><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><br /><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\"  border=\"0\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis'];
  echo "s.png\" class=\"map\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\" border=\"0\"><br /><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\"><a href=\"movesouth.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\" border=\"0\"></a><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\">";
  }
	}	

if ($row['xaxis']==6 and $row['yaxis']==6)
  {
  
  $rand=mt_rand(1,100);
  
  if ($rand>70)
  {
  
  echo "<img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><a href=\"monsters/spiderl.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\" border=\"0\"></a><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><br /><a href=\"monsters/spiderl.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\"  border=\"0\"></a><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis'];
  echo "s.png\" class=\"map\"><a href=\"monsters/spiderl.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\" border=\"0\"></a><br /><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\"><a href=\"monsters/spiderl.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\" border=\"0\"></a><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\">";
  }
  else
  {
  
  echo "<img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><a href=\"movenorth.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\" border=\"0\"></a><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><br /><a href=\"movewest.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\"  border=\"0\"></a><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis'];
  echo "s.png\" class=\"map\"><a href=\"moveeast.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\" border=\"0\"></a><br /><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\"><a href=\"movesouth.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\" border=\"0\"></a><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\">";
  }
	}	

if ($row['xaxis']==5 and $row['yaxis']==6)
  {
  
  $rand=mt_rand(1,100);
  
  if ($rand>70)
  {
  
  echo "<img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\" border=\"0\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><br /><a href=\"monsters/scorpion.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\"  border=\"0\"></a><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis'];
  echo "s.png\" class=\"map\"><a href=\"monsters/scorpion.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\" border=\"0\"></a><br /><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\" border=\"0\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\">";
  }
  else
  {
  
  echo "<img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\" border=\"0\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><br /><a href=\"movewest.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\"  border=\"0\"></a><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis'];
  echo "s.png\" class=\"map\"><a href=\"moveeast.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\" border=\"0\"></a><br /><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\" border=\"0\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\">";
  }
	}	

if ($row['xaxis']==4 and $row['yaxis']==6)
  {
  
  $rand=mt_rand(1,100);
  
  if ($rand>70)
  {
  
  echo "<img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\" border=\"0\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><br /><a href=\"monsters/scorpion.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\"  border=\"0\"></a><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis'];
  echo "s.png\" class=\"map\"><a href=\"monsters/scorpion.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\" border=\"0\"></a><br /><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\" border=\"0\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\">";
  }
  else
  {
  
  echo "<img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\" border=\"0\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><br /><a href=\"movewest.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\"  border=\"0\"></a><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis'];
  echo "s.png\" class=\"map\"><a href=\"moveeast.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\" border=\"0\"></a><br /><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\" border=\"0\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\">";
  }
	}	

if ($row['xaxis']==3 and $row['yaxis']==6)
  {
  
  $rand=mt_rand(1,100);
  
  if ($rand>70)
  {
  
  echo "<img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\" border=\"0\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><br /><a href=\"monsters/scorpion.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\"  border=\"0\"></a><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis'];
  echo "s.png\" class=\"map\"><a href=\"monsters/scorpion.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\" border=\"0\"></a><br /><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\" border=\"0\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\">";
  }
  else
  {
  
  echo "<img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\" border=\"0\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><br /><a href=\"movewest.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\"  border=\"0\"></a><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis'];
  echo "s.png\" class=\"map\"><a href=\"moveeast.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\" border=\"0\"></a><br /><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\" border=\"0\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\">";
  }
	}	

if ($row['xaxis']==2 and $row['yaxis']==6)
  {
  
  $rand=mt_rand(1,100);
  
  if ($rand>70)
  {
  
  echo "<img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\" border=\"0\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><br /><a href=\"monsters/scorpion.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\"  border=\"0\"></a><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis'];
  echo "s.png\" class=\"map\"><a href=\"monsters/scorpion.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\" border=\"0\"></a><br /><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\" border=\"0\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\">";
  }
  else
  {
  
  echo "<img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\" border=\"0\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><br /><a href=\"movewest.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\"  border=\"0\"></a><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis'];
  echo "s.png\" class=\"map\"><a href=\"moveeast.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\" border=\"0\"></a><br /><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\" border=\"0\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\">";
  }
	}	

if ($row['xaxis']==1 and $row['yaxis']==6)
  {
  
  $rand=mt_rand(1,100);
  
  if ($rand>70)
  {
  
  echo "<img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\" border=\"0\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><br /><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\"  border=\"0\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis'];
  echo "s.png\" class=\"map\"><a href=\"monsters/scorpion.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\" border=\"0\"></a><br /><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\"><a href=\"monsters/scorpion.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\" border=\"0\"></a><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\">";
  }
  else
  {
  
  echo "<img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\" border=\"0\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><br /><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\"  border=\"0\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis'];
  echo "s.png\" class=\"map\"><a href=\"moveeast.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\" border=\"0\"></a><br /><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\"><a href=\"movesouth.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\" border=\"0\"></a><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\">";
  }
	}	

if ($row['xaxis']==1 and $row['yaxis']==5)
  {
  
  echo "<img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><a href=\"movenorth.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\" border=\"0\"></a><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><br /><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\"  border=\"0\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis'];
  echo "s.png\" class=\"map\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\" border=\"0\"><br /><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\">";
  
  if ($giantscorpion==0)
{
echo "<a href=\"monsters/giantscorpion.php?".time()."\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\" border=\"0\"></a>";
}

else
{
echo "<a href=\"movesouth.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\" border=\"0\"></a>";
}
  
  
  echo "<img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\">";
  
	}	

if ($row['xaxis']==1 and $row['yaxis']==4)
  {
  
  $rand=mt_rand(1,100);
  
  if ($rand>70)
  {
  
  echo "<img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><a href=\"monsters/scorpion.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\" border=\"0\"></a><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><br /><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\"  border=\"0\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis'];
  echo "s.png\" class=\"map\"><a href=\"monsters/scorpion.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\" border=\"0\"></a><br /><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\"><a href=\"monsters/scorpion.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\" border=\"0\"></a><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\">";
  }
  else
  {
  
  echo "<img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><a href=\"movenorth.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\" border=\"0\"></a><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><br /><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\"  border=\"0\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis'];
  echo "s.png\" class=\"map\"><a href=\"moveeast.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\" border=\"0\"></a><br /><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\"><a href=\"movesouth.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\" border=\"0\"></a><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\">";
  }
	}	

if ($row['xaxis']==1 and $row['yaxis']==3)
  {
  
  $rand=mt_rand(1,100);
  
  if ($rand>70)
  {
  
  echo "<img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><a href=\"monsters/scorpion.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\" border=\"0\"></a><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><br /><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\"  border=\"0\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis'];
  echo "s.png\" class=\"map\"><a href=\"monsters/scorpion.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\" border=\"0\"></a><br /><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\"><a href=\"monsters/scorpion.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\" border=\"0\"></a><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\">";
  }
  else
  {
  
  echo "<img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><a href=\"movenorth.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\" border=\"0\"></a><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><br /><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\"  border=\"0\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis'];
  echo "s.png\" class=\"map\"><a href=\"moveeast.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\" border=\"0\"></a><br /><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\"><a href=\"movesouth.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\" border=\"0\"></a><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\">";
  }
	}	

if ($row['xaxis']==1 and $row['yaxis']==2)
  {
  
  $rand=mt_rand(1,100);
  
  if ($rand>70)
  {
  
  echo "<img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><a href=\"monsters/scorpion.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\" border=\"0\"></a><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><br /><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\"  border=\"0\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis'];
  echo "s.png\" class=\"map\"><a href=\"monsters/scorpion.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\" border=\"0\"></a><br /><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\" border=\"0\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\">";
  }
  else
  {
  
  echo "<img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><a href=\"movenorth.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\" border=\"0\"></a><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><br /><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\"  border=\"0\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis'];
  echo "s.png\" class=\"map\"><a href=\"moveeast.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\" border=\"0\"></a><br /><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\" border=\"0\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\">";
  }
	}	

if ($row['xaxis']==2 and $row['yaxis']==4)
  {
  
  $rand=mt_rand(1,100);
  
  if ($rand>70)
  {
  
  echo "<img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\" border=\"0\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><br /><a href=\"monsters/scorpion.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\"  border=\"0\"></a><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis'];
  echo "s.png\" class=\"map\"><a href=\"monsters/scorpion.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\" border=\"0\"></a><br /><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\"><a href=\"monsters/scorpion.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\" border=\"0\"></a><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\">";
  }
  else
  {
  
  echo "<img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\" border=\"0\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><br /><a href=\"movewest.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\"  border=\"0\"></a><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis'];
  echo "s.png\" class=\"map\"><a href=\"moveeast.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\" border=\"0\"></a><br /><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\"><a href=\"movesouth.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\" border=\"0\"></a><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\">";
  }
	}	

if ($row['xaxis']==2 and $row['yaxis']==3)
  {
  
  $rand=mt_rand(1,100);
  
  if ($rand>70)
  {
  
  echo "<img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><a href=\"monsters/scorpion.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\" border=\"0\"></a><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><br /><a href=\"monsters/scorpion.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\"  border=\"0\"></a><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis'];
  echo "s.png\" class=\"map\"><a href=\"monsters/scorpion.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\" border=\"0\"></a><br /><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\"><a href=\"monsters/scorpion.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\" border=\"0\"></a><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\">";
  }
  else
  {
  
  echo "<img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><a href=\"movenorth.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\" border=\"0\"></a><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><br /><a href=\"movewest.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\"  border=\"0\"></a><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis'];
  echo "s.png\" class=\"map\"><a href=\"moveeast.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\" border=\"0\"></a><br /><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\"><a href=\"movesouth.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\" border=\"0\"></a><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\">";
  }
	}	

if ($row['xaxis']==2 and $row['yaxis']==2)
  {
  
  $rand=mt_rand(1,100);
  
  if ($rand>70)
  {
  
  echo "<img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><a href=\"monsters/scorpion.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\" border=\"0\"></a><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><br /><a href=\"monsters/scorpion.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\"  border=\"0\"></a><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis'];
  echo "s.png\" class=\"map\"><a href=\"monsters/scorpion.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\" border=\"0\"></a><br /><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\" border=\"0\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\">";
  }
  else
  {
  
  echo "<img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><a href=\"movenorth.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\" border=\"0\"></a><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><br /><a href=\"movewest.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\"  border=\"0\"></a><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis'];
  echo "s.png\" class=\"map\"><a href=\"moveeast.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\" border=\"0\"></a><br /><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\" border=\"0\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\">";
  }
	}	

if ($row['xaxis']==3 and $row['yaxis']==4)
  {
  
  $rand=mt_rand(1,100);
  
  if ($rand>70)
  {
  
  echo "<img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\" border=\"0\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><br /><a href=\"monsters/scorpion.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\"  border=\"0\"></a><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis'];
  echo "s.png\" class=\"map\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\" border=\"0\"><br /><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\"><a href=\"monsters/scorpion.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\" border=\"0\"></a><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\">";
  }
  else
  {
  
  echo "<img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\" border=\"0\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><br /><a href=\"movewest.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\"  border=\"0\"></a><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis'];
  echo "s.png\" class=\"map\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\" border=\"0\"><br /><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\"><a href=\"movesouth.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\" border=\"0\"></a><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\">";
  }
	}	

if ($row['xaxis']==3 and $row['yaxis']==3)
  {
  
  $rand=mt_rand(1,100);
  
  if ($rand>70)
  {
  
  echo "<img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><a href=\"monsters/scorpion.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\" border=\"0\"></a><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><br /><a href=\"monsters/scorpion.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\"  border=\"0\"></a><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis'];
  echo "s.png\" class=\"map\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\" border=\"0\"><br /><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\"><a href=\"monsters/scorpion.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\" border=\"0\"></a><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\">";
  }
  else
  {
  
  echo "<img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><a href=\"movenorth.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\" border=\"0\"></a><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><br /><a href=\"movewest.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\"  border=\"0\"></a><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis'];
  echo "s.png\" class=\"map\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\" border=\"0\"><br /><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\"><a href=\"movesouth.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\" border=\"0\"></a><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\">";
  }
	}	

if ($row['xaxis']==3 and $row['yaxis']==2)
  {
  
  $rand=mt_rand(1,100);
  
  if ($rand>70)
  {
  
  echo "<img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><a href=\"monsters/scorpion.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\" border=\"0\"></a><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><br /><a href=\"monsters/scorpion.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\"  border=\"0\"></a><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis'];
  echo "s.png\" class=\"map\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\" border=\"0\"><br /><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\" border=\"0\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\">";
  }
  else
  {
  
  echo "<img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><a href=\"movenorth.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\" border=\"0\"></a><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><br /><a href=\"movewest.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\"  border=\"0\"></a><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis'];
  echo "s.png\" class=\"map\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\" border=\"0\"><br /><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\" border=\"0\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\">";
  }
	}	

if ($row['xaxis']==7 and $row['yaxis']==6)
  {
  
  $rand=mt_rand(1,100);
  
  if ($rand>70)
  {
  
  echo "<img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\" border=\"0\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><br /><a href=\"monsters/bat.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\"  border=\"0\"></a><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis'];
  echo "s.png\" class=\"map\"><a href=\"monsters/bat.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\" border=\"0\"></a><br /><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\" border=\"0\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\">";
  }
  else
  {
  
  echo "<img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\" border=\"0\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><br /><a href=\"movewest.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\"  border=\"0\"></a><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis'];
  echo "s.png\" class=\"map\"><a href=\"moveeast.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\" border=\"0\"></a><br /><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\" border=\"0\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\">";
  }
	}	
	
if ($row['xaxis']==8 and $row['yaxis']==6)
  {
  
  $rand=mt_rand(1,100);
  
  if ($rand>70)
  {
  
  echo "<img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\" border=\"0\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><br /><a href=\"monsters/bat.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\"  border=\"0\"></a><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis'];
  echo "s.png\" class=\"map\"><a href=\"monsters/bat.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\" border=\"0\"></a><br /><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\" border=\"0\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\">";
  }
  else
  {
  
  echo "<img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\" border=\"0\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><br /><a href=\"movewest.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\"  border=\"0\"></a><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis'];
  echo "s.png\" class=\"map\"><a href=\"moveeast.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\" border=\"0\"></a><br /><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\" border=\"0\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\">";
  }
	}	
	
if ($row['xaxis']==9 and $row['yaxis']==6)
  {
  
  $rand=mt_rand(1,100);
  
  if ($rand>70)
  {
  
  echo "<img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\" border=\"0\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><br /><a href=\"monsters/bat.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\"  border=\"0\"></a><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis'];
  echo "s.png\" class=\"map\"><a href=\"monsters/bat.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\" border=\"0\"></a><br /><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\" border=\"0\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\">";
  }
  else
  {
  
  echo "<img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\" border=\"0\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><br /><a href=\"movewest.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\"  border=\"0\"></a><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis'];
  echo "s.png\" class=\"map\"><a href=\"moveeast.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\" border=\"0\"></a><br /><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\" border=\"0\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\">";
  }
	}	

if ($row['xaxis']==10 and $row['yaxis']==6)
  {
  
  $rand=mt_rand(1,100);
  
  if ($rand>70)
  {
  
  echo "<img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\" border=\"0\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><br /><a href=\"monsters/bat.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\"  border=\"0\"></a><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis'];
  echo "s.png\" class=\"map\"><a href=\"monsters/bat.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\" border=\"0\"></a><br /><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\" border=\"0\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\">";
  }
  else
  {
  
  echo "<img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\" border=\"0\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><br /><a href=\"movewest.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\"  border=\"0\"></a><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis'];
  echo "s.png\" class=\"map\"><a href=\"moveeast.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\" border=\"0\"></a><br /><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\" border=\"0\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\">";
  }
	}	

if ($row['xaxis']==11 and $row['yaxis']==6)
  {
  
  $rand=mt_rand(1,100);
  
  if ($rand>70)
  {
  
  echo "<img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\" border=\"0\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><br /><a href=\"monsters/bat.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\"  border=\"0\"></a><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis'];
  echo "s.png\" class=\"map\"><a href=\"monsters/bat.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\" border=\"0\"></a><br /><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\" border=\"0\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\">";
  }
  else
  {
  
  echo "<img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\" border=\"0\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><br /><a href=\"movewest.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\"  border=\"0\"></a><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis'];
  echo "s.png\" class=\"map\"><a href=\"moveeast.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\" border=\"0\"></a><br /><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\" border=\"0\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\">";
  }
	}	
	
if ($row['xaxis']==12 and $row['yaxis']==6)
  {
  
  $rand=mt_rand(1,100);
  
  if ($rand>70)
  {
  
  echo "<img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\" border=\"0\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><br /><a href=\"monsters/bat.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\"  border=\"0\"></a><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis'];
  echo "s.png\" class=\"map\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\" border=\"0\"><br /><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\"><a href=\"monsters/bat.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\" border=\"0\"></a><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\">";
  }
  else
  {
  
  echo "<img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\" border=\"0\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><br /><a href=\"movewest.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\"  border=\"0\"></a><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis'];
  echo "s.png\" class=\"map\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\" border=\"0\"><br /><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\"><a href=\"movesouth.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\" border=\"0\"></a><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\">";
  }
	}	
		
if ($row['xaxis']==12 and $row['yaxis']==5)
  {
  
  echo "<img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><a href=\"movenorth.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\" border=\"0\"></a><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><br /><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\"  border=\"0\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis'];
  echo "s.png\" class=\"map\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\" border=\"0\"><br /><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\">";
  
  if ($giantbat==0)
{
echo "<a href=\"monsters/giantbat.php?".time()."\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\" border=\"0\"></a>";
}

else
{
echo "<a href=\"movesouth.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\" border=\"0\"></a>";
}
  
  
  echo "<img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\">";
  
	}	

if ($row['xaxis']==12 and $row['yaxis']==4)
  {
  
  $rand=mt_rand(1,100);
  
  if ($rand>70)
  {
  
  echo "<img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><a href=\"monsters/bat.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\" border=\"0\"></a><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><br /><a href=\"monsters/bat.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\"  border=\"0\"></a><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis'];
  echo "s.png\" class=\"map\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\" border=\"0\"><br /><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\"><a href=\"monsters/bat.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\" border=\"0\"></a><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\">";
  }
  else
  {
  
  echo "<img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><a href=\"movenorth.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\" border=\"0\"></a><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><br /><a href=\"movewest.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\"  border=\"0\"></a><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis'];
  echo "s.png\" class=\"map\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\" border=\"0\"><br /><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\"><a href=\"movesouth.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\" border=\"0\"></a><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\">";
  }
	}	

	if ($row['xaxis']==12 and $row['yaxis']==3)
  {
  
  $rand=mt_rand(1,100);
  
  if ($rand>70)
  {
  
  echo "<img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><a href=\"monsters/bat.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\" border=\"0\"></a><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><br /><a href=\"monsters/bat.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\"  border=\"0\"></a><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis'];
  echo "s.png\" class=\"map\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\" border=\"0\"><br /><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\"><a href=\"monsters/bat.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\" border=\"0\"></a><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\">";
  }
  else
  {
  
  echo "<img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><a href=\"movenorth.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\" border=\"0\"></a><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><br /><a href=\"movewest.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\"  border=\"0\"></a><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis'];
  echo "s.png\" class=\"map\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\" border=\"0\"><br /><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\"><a href=\"movesouth.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\" border=\"0\"></a><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\">";
  }
	}	

	if ($row['xaxis']==12 and $row['yaxis']==2)
  {
  
  $rand=mt_rand(1,100);
  
  if ($rand>70)
  {
  
  echo "<img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><a href=\"monsters/bat.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\" border=\"0\"></a><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><br /><a href=\"monsters/bat.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\"  border=\"0\"></a><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis'];
  echo "s.png\" class=\"map\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\" border=\"0\"><br /><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\" border=\"0\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\">";
  }
  else
  {
  
  echo "<img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><a href=\"movenorth.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\" border=\"0\"></a><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><br /><a href=\"movewest.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\"  border=\"0\"></a><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis'];
  echo "s.png\" class=\"map\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\" border=\"0\"><br /><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\" border=\"0\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\">";
  }
	}	

	if ($row['xaxis']==11 and $row['yaxis']==4)
  {
  
  $rand=mt_rand(1,100);
  
  if ($rand>70)
  {
  
  echo "<img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\" border=\"0\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><br /><a href=\"monsters/bat.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\"  border=\"0\"></a><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis'];
  echo "s.png\" class=\"map\"><a href=\"monsters/bat.php?".time();
  echo "\"><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\" border=\"0\"></a><br /><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\"><a href=\"monsters/bat.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\" border=\"0\"></a><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\">";
  }
  else
  {
  
  echo "<img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\" border=\"0\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><br /><a href=\"movewest.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\"  border=\"0\"></a><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis'];
  echo "s.png\" class=\"map\"><a href=\"moveeast.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\" border=\"0\"></a><br /><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\"><a href=\"movesouth.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\" border=\"0\"></a><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\">";
  }
	}	

	if ($row['xaxis']==11 and $row['yaxis']==3)
  {
  
  $rand=mt_rand(1,100);
  
  if ($rand>70)
  {
  
  echo "<img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><a href=\"monsters/bat.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\" border=\"0\"></a><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><br /><a href=\"monsters/bat.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\"  border=\"0\"></a><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis'];
  echo "s.png\" class=\"map\"><a href=\"monsters/bat.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\" border=\"0\"></a><br /><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\"><a href=\"monsters/bat.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\" border=\"0\"></a><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\">";
  }
  else
  {
  
  echo "<img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><a href=\"movenorth.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\" border=\"0\"></a><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><br /><a href=\"movewest.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\"  border=\"0\"></a><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis'];
  echo "s.png\" class=\"map\"><a href=\"moveeast.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\" border=\"0\"></a><br /><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\"><a href=\"movesouth.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\" border=\"0\"></a><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\">";
  }
	}	

	if ($row['xaxis']==11 and $row['yaxis']==2)
  {
  
  $rand=mt_rand(1,100);
  
  if ($rand>70)
  {
  
  echo "<img  style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><a href=\"monsters/bat.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\" border=\"0\"></a><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><br /><a href=\"monsters/bat.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\"  border=\"0\"></a><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis'];
  echo "s.png\" class=\"map\"><a href=\"monsters/bat.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\" border=\"0\"></a><br /><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\" border=\"0\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\">";
  }
  else
  {
  
  echo "<img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><a href=\"movenorth.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\" border=\"0\"></a><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><br /><a href=\"movewest.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\"  border=\"0\"></a><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis'];
  echo "s.png\" class=\"map\"><a href=\"moveeast.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\" border=\"0\"></a><br /><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\" border=\"0\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\">";
  }
	}	

	if ($row['xaxis']==10 and $row['yaxis']==4)
  {
  
  $rand=mt_rand(1,100);
  
  if ($rand>70)
  {
  
  echo "<img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\" border=\"0\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><br /><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\"  border=\"0\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis'];
  echo "s.png\" class=\"map\"><a href=\"monsters/bat.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\" border=\"0\"></a><br /><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\"><a href=\"monsters/bat.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\" border=\"0\"></a><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\">";
  }
  else
  {
  
  echo "<img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\" border=\"0\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><br /><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\"  border=\"0\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis'];
  echo "s.png\" class=\"map\"><a href=\"moveeast.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\" border=\"0\"></a><br /><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\"><a href=\"movesouth.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\" border=\"0\"></a><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\">";
  }
	}	

	if ($row['xaxis']==10 and $row['yaxis']==3)
  {
  
  $rand=mt_rand(1,100);
  
  if ($rand>70)
  {
  
  echo "<img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><a href=\"monsters/bat.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\" border=\"0\"></a><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><br /><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\"  border=\"0\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis'];
  echo "s.png\" class=\"map\"><a href=\"monsters/bat.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\" border=\"0\"></a><br /><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\"><a href=\"monsters/bat.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\" border=\"0\"></a><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\">";
  }
  else
  {
  
  echo "<img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><a href=\"movenorth.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\" border=\"0\"></a><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><br /><a href=\"movewest.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\"  border=\"0\"></a><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis'];
  echo "s.png\" class=\"map\"><a href=\"moveeast.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\" border=\"0\"></a><br /><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\"><a href=\"movesouth.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\" border=\"0\"></a><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\">";
  }
	}	

	if ($row['xaxis']==10 and $row['yaxis']==2)
  {
  
  $rand=mt_rand(1,100);
  
  if ($rand>70)
  {
  
  echo "<img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><a href=\"monsters/bat.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\" border=\"0\"></a><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><br /><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\"  border=\"0\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis'];
  echo "s.png\" class=\"map\"><a href=\"monsters/bat.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\" border=\"0\"></a><br /><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\" border=\"0\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\">";
  }
  else
  {
  
  echo "<img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><a href=\"movenorth.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\" border=\"0\"></a><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><br /><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\"  border=\"0\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis'];
  echo "s.png\" class=\"map\"><a href=\"moveeast.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\" border=\"0\"></a><br /><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\" border=\"0\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\">";
  }
	}	

if ($row['xaxis']==6 and $row['yaxis']==7)
  {
  
  $rand=mt_rand(1,100);
  
  if ($rand>90)
  {
  
  echo "<img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><a href=\"monsters/ratl.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\" border=\"0\"></a><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><br /><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\"  border=\"0\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis'];
  echo "s.png\" class=\"map\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\" border=\"0\"><br /><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\"><a href=\"monsters/ratl.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\" border=\"0\"></a><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\">";
  }
  
  if ($rand>70 and $rand<91)
  {
  
  echo "<img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><a href=\"monsters/bat.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\" border=\"0\"></a><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><br /><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\"  border=\"0\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis'];
  echo "s.png\" class=\"map\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\" border=\"0\"><br /><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\"><a href=\"monsters/bat.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\" border=\"0\"></a><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\">";
  }
  
  
  if ($rand<71)
  {
  
  echo "<img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><a href=\"movenorth.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\" border=\"0\"></a><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><br /><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\"  border=\"0\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis'];
  echo "s.png\" class=\"map\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\" border=\"0\"><br /><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\"><a href=\"movesouth.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\" border=\"0\"></a><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\">";
  }
	}	

if ($row['xaxis']==6 and $row['yaxis']==8)
  {
  
  $rand=mt_rand(1,100);
  
  if ($rand>90)
  {
  
  echo "<img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><a href=\"monsters/scorpion.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\" border=\"0\"></a><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><br /><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\"  border=\"0\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis'];
  echo "s.png\" class=\"map\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\" border=\"0\"><br /><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\"><a href=\"monsters/scorpion.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\" border=\"0\"></a><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\">";
  }
  
  if ($rand>70 and $rand<91)
  {
  
  echo "<img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><a href=\"monsters/bat.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\" border=\"0\"></a><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><br /><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\"  border=\"0\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis'];
  echo "s.png\" class=\"map\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\" border=\"0\"><br /><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\"><a href=\"monsters/bat.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\" border=\"0\"></a><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\">";
  }
  
  
  
if ($rand<71)
  {
  
  echo "<img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><a href=\"movenorth.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\" border=\"0\"></a><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><br /><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\"  border=\"0\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis'];
  echo "s.png\" class=\"map\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\" border=\"0\"><br /><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\"><a href=\"movesouth.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\" border=\"0\"></a><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\">";
  }
	}	

if ($row['xaxis']==6 and $row['yaxis']==9)
  {
  
  
  echo "<img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\">";
  
   if ($giantsnake==0)
{
echo "<a href=\"monsters/giantsnake.php?".time()."\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\" border=\"0\"></a>";
}

else
{
echo "<a href=\"movenorth.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\" border=\"0\"></a>";
}
  
  echo"<img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><br /><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\"  border=\"0\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis'];
  echo "s.png\" class=\"map\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\" border=\"0\"><br /><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\"><a href=\"movesouth.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\" border=\"0\"></a><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\">";
 
	}	

if ($row['xaxis']==6 and $row['yaxis']==10)
  {
  
  $rand=mt_rand(1,100);
  
  if ($rand>90)
  {
  
  echo "<img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><a href=\"monsters/snake.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\" border=\"0\"></a><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><br /><a href=\"monsters/snake.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\"  border=\"0\"></a><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis'];
  echo "s.png\" class=\"map\"><a href=\"monsters/snake.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\" border=\"0\"></a><br /><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\"><a href=\"monsters/snake.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\" border=\"0\"></a><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\">";
  }
  
  if ($rand>70 and $rand<91)
  {
  
  echo "<img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><a href=\"monsters/scorpion.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\" border=\"0\"></a><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><br /><a href=\"monsters/scorpion.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\"  border=\"0\"></a><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis'];
  echo "s.png\" class=\"map\"><a href=\"monsters/scorpion.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\" border=\"0\"></a><br /><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\"><a href=\"monsters/scorpion.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\" border=\"0\"></a><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\">";
  }
  
  if ($rand<71)
  {
  
  echo "<img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><a href=\"movenorth.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\" border=\"0\"></a><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><br /><a href=\"movewest.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\"  border=\"0\"></a><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis'];
  echo "s.png\" class=\"map\"><a href=\"moveeast.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\" border=\"0\"></a><br /><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\"><a href=\"movesouth.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\" border=\"0\"></a><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\">";
  }
	}	
	
if ($row['xaxis']==6 and $row['yaxis']==11)
  {
  
  $rand=mt_rand(1,100);
  
  if ($rand>90)
  {
  
  echo "<img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><a href=\"monsters/scorpion.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\" border=\"0\"></a><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><br /><a href=\"monsters/scorpion.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\"  border=\"0\"></a><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis'];
  echo "s.png\" class=\"map\"><a href=\"monsters/scorpion.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\" border=\"0\"></a><br /><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\"><a href=\"monsters/scorpion.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\" border=\"0\"></a><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\">";
  }
  
  if ($rand>70 and $rand<91)
  {
  
  echo "<img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><a href=\"monsters/snake.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\" border=\"0\"></a><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><br /><a href=\"monsters/snake.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\"  border=\"0\"></a><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis'];
  echo "s.png\" class=\"map\"><a href=\"monsters/snake.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\" border=\"0\"></a><br /><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\"><a href=\"monsters/snake.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\" border=\"0\"></a><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\">";
  }
  
  
  
  if ($rand<71)
  {
  
  echo "<img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><a href=\"movenorth.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\" border=\"0\"></a><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><br /><a href=\"movewest.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\"  border=\"0\"></a><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis'];
  echo "s.png\" class=\"map\"><a href=\"moveeast.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\" border=\"0\"></a><br /><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\"><a href=\"movesouth.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\" border=\"0\"></a><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\">";
  }
	}	
		
if ($row['xaxis']==6 and $row['yaxis']==12)
  {
  
  $rand=mt_rand(1,100);
  
  if ($rand>90)
  {
  
  echo "<img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\" border=\"0\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><br /><a href=\"monsters/scorpion.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\"  border=\"0\"></a><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis'];
  echo "s.png\" class=\"map\"><a href=\"monsters/scorpion.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\" border=\"0\"></a><br /><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\"><a href=\"monsters/scorpion.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\" border=\"0\"></a><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\">";
  }
  
  if ($rand>70 and $rand<91)
  {
  
  echo "<img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\" border=\"0\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><br /><a href=\"monsters/bat.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\"  border=\"0\"></a><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis'];
  echo "s.png\" class=\"map\"><a href=\"monsters/bat.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\" border=\"0\"></a><br /><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\"><a href=\"monsters/bat.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\" border=\"0\"></a><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\">";
  }
  
  if ($rand<71)
  {
  
  echo "<img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\" border=\"0\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><br /><a href=\"movewest.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\"  border=\"0\"></a><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis'];
  echo "s.png\" class=\"map\"><a href=\"moveeast.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\" border=\"0\"></a><br /><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\"><a href=\"movesouth.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\" border=\"0\"></a><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\">";
  }
	}	
		
if ($row['xaxis']==5 and $row['yaxis']==10)
  {
  
  $rand=mt_rand(1,100);
  
  if ($rand>90)
  {
  
  echo "<img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><a href=\"monsters/scorpion.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\" border=\"0\"></a><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><br /><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\"  border=\"0\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis'];
  echo "s.png\" class=\"map\"><a href=\"monsters/scorpion.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\" border=\"0\"></a><br /><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\" border=\"0\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\">";
  }
  
  if ($rand>70 and $rand<91)
  {
  
  echo "<img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><a href=\"monsters/bat.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\" border=\"0\"></a><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><br /><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\"  border=\"0\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis'];
  echo "s.png\" class=\"map\"><a href=\"monsters/bat.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\" border=\"0\"></a><br /><img style=\"width: 33%\"  src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\" border=\"0\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\">";
  }
  
  
  if ($rand<71)
  {
  
  echo "<img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><a href=\"movenorth.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\" border=\"0\"></a><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\"  border=\"0\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis'];
  echo "s.png\" class=\"map\"><a href=\"moveeast.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\" border=\"0\"></a><br /><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\" border=\"0\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\">";
  }
	}	
	
if ($row['xaxis']==5 and $row['yaxis']==11)
  {
  
  $rand=mt_rand(1,100);
  
  if ($rand>90)
  {
  
  echo "<img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><a href=\"monsters/scorpion.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\" border=\"0\"></a><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><br /><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\"  border=\"0\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis'];
  echo "s.png\" class=\"map\"><a href=\"monsters/scorpion.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\" border=\"0\"></a><br /><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\"><a href=\"monsters/scorpion.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\" border=\"0\"></a><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\">";
  }
  
  if ($rand>70 and $rand<91)
  {
  
  echo "<img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><a href=\"monsters/bat.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\" border=\"0\"></a><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><br /><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\"  border=\"0\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis'];
  echo "s.png\" class=\"map\"><a href=\"monsters/bat.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\" border=\"0\"></a><br /><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\"><a href=\"monsters/bat.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\" border=\"0\"></a><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\">";
  }
  
   if ($rand<71)
  {
  
  echo "<img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><a href=\"movenorth.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\" border=\"0\"></a><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><br /><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\"  border=\"0\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis'];
  echo "s.png\" class=\"map\"><a href=\"moveeast.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\" border=\"0\"></a><br /><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\"><a href=\"movesouth.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\" border=\"0\"></a><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\">";
  }
	}	
		
if ($row['xaxis']==5 and $row['yaxis']==12)
  {
  
  $rand=mt_rand(1,100);
  
  if ($rand>90)
  {
  
  echo "<img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\" border=\"0\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><br /><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\"  border=\"0\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis'];
  echo "s.png\" class=\"map\"><a href=\"monsters/scorpion.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\" border=\"0\"></a><br /><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\"><a href=\"monsters/scorpion.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\" border=\"0\"></a><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\">";
  }
  
  if ($rand>70 and $rand<91)
  {
  
  echo "<img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\" border=\"0\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><br /><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\"  border=\"0\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis'];
  echo "s.png\" class=\"map\"><a href=\"monsters/bat.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\" border=\"0\"></a><br /><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\"><a href=\"monsters/bat.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\" border=\"0\"></a><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\">";
  }
  
   if ($rand<71)
  {
  
  echo "<img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\" border=\"0\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><br /><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\"  border=\"0\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis'];
  echo "s.png\" class=\"map\"><a href=\"moveeast.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\" border=\"0\"></a><br /><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\"><a href=\"movesouth.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\" border=\"0\"></a><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\">";
  }
	}	
	
if ($row['xaxis']==7 and $row['yaxis']==10)
  {
  
  $rand=mt_rand(1,100);
  
  if ($rand>90)
  {
  
  echo "<img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><a href=\"monsters/scorpion.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\" border=\"0\"></a><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><br /><a href=\"monsters/scorpion.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\"  border=\"0\"></a><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis'];
  echo "s.png\" class=\"map\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\" border=\"0\"><br /><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\" border=\"0\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\">";
  }
  
  if ($rand>70 and $rand<91)
  {
  
  echo "<img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><a href=\"monsters/bat.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\" border=\"0\"></a><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><br /><a href=\"monsters/bat.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\"  border=\"0\"></a><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis'];
  echo "s.png\" class=\"map\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\" border=\"0\"><br /><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\" border=\"0\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\">";
  }
  
   if ($rand<71)
  {
  
  echo "<img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><a href=\"movenorth.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\" border=\"0\"></a><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><br /><a href=\"movewest.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\"  border=\"0\"></a><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis'];
  echo "s.png\" class=\"map\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\" border=\"0\"><br /><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\" border=\"0\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\">";
  }
	}	
	
if ($row['xaxis']==7 and $row['yaxis']==11)
  {
  
  $rand=mt_rand(1,100);
  
  if ($rand>90)
  {
  
  echo "<img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><a href=\"monsters/scorpion.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\" border=\"0\"></a><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><br /><a href=\"monsters/scorpion.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\"  border=\"0\"></a><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis'];
  echo "s.png\" class=\"map\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\" border=\"0\"><br /><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\"><a href=\"monsters/scorpion.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\" border=\"0\"></a><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\">";
  }
  
  if ($rand>70 and $rand<91)
  {
  
  echo "<img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><a href=\"monsters/bat.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\" border=\"0\"></a><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><br /><a href=\"monsters/bat.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\"  border=\"0\"></a><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis'];
  echo "s.png\" class=\"map\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\" border=\"0\"><br /><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\"><a href=\"monsters/bat.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\" border=\"0\"></a><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\">";
  }
  
   if ($rand<71)
   {
  
  echo "<img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><a href=\"movenorth.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\" border=\"0\"></a><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><br /><a href=\"movewest.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\"  border=\"0\"></a><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis'];
  echo "s.png\" class=\"map\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\" border=\"0\"><br /><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\"><a href=\"movesouth.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\" border=\"0\"></a><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\">";
  }
	}	
		
if ($row['xaxis']==7 and $row['yaxis']==12)
  {
  
  $rand=mt_rand(1,100);
  
  if ($rand>90)
  {
  
  echo "<img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\" border=\"0\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><br /><a href=\"monsters/scorpion.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\"  border=\"0\"></a><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis'];
  echo "s.png\" class=\"map\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\" border=\"0\"><br /><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\"><a href=\"monsters/scorpion.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\" border=\"0\"></a><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\">";
  }
  
  if ($rand>70 and $rand<91)
  {
  
  echo "<img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\" border=\"0\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><br /><a href=\"monsters/bat.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\"  border=\"0\"></a><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis'];
  echo "s.png\" class=\"map\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\" border=\"0\"><br /><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\"><a href=\"monsters/bat.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\" border=\"0\"></a><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\">";
  }
  
  
  if ($rand<71)
  {
  
  echo "<img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\" border=\"0\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><br /><a href=\"movewest.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\"  border=\"0\"></a><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis'];
  echo "s.png\" class=\"map\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\" border=\"0\"><br /><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\"><a href=\"movesouth.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\" border=\"0\"></a><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\">";
  }
	}	
		

	
	
	}

	}
if ($row['mapdimensions']==44)
{

if ($row['mapdimensions']==44 and $row['xaxis']==2 and $row['yaxis']==2)
  {
  echo "<img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><a href=\"movenorth.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\" border=\"0\"></a><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><br /><a href=\"movewest.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\"  border=\"0\"></a><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis'];
  echo "s.png\" class=\"map\"><a href=\"moveeast.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\" border=\"0\"></a><br /><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\"><a href=\"movesouth.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\" border=\"0\"></a><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\">";
	}
if ($row['mapdimensions']==44 and $row['xaxis']==3 and $row['yaxis']==2)
  {
  echo "<img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><a href=\"movenorth.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\" border=\"0\"></a><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><br /><a href=\"movewest.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\"  border=\"0\"></a><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis'];
  echo "s.png\" class=\"map\"><a href=\"moveeast.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\" border=\"0\"></a><br /><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\"><a href=\"movesouth.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\" border=\"0\"></a><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\">";
	}


if ($row['mapdimensions']==44 and $row['xaxis']==2 and $row['yaxis']==3)
  {
  echo "<img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><a href=\"movenorth.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\" border=\"0\"></a><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><br /><a href=\"movewest.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\"  border=\"0\"></a><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis'];
  echo "s.png\" class=\"map\"><a href=\"moveeast.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\" border=\"0\"></a><br /><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\"><a href=\"movesouth.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\" border=\"0\"></a><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\">";
	}


if ($row['mapdimensions']==44 and $row['xaxis']==3 and $row['yaxis']==3)
  {
  echo "<img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><a href=\"movenorth.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\" border=\"0\"></a><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><br /><a href=\"movewest.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\"  border=\"0\"></a><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis'];
  echo "s.png\" class=\"map\"><a href=\"moveeast.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\" border=\"0\"></a><br /><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\"><a href=\"movesouth.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\" border=\"0\"></a><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\">";
	}


//***middle end***
if ($row['mapdimensions']==44 and $row['xaxis']==2 and $row['yaxis']==4)
  {
  echo "<img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']+1;
  echo ".png\"  class=\"map\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\" border=\"0\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><br /><a href=\"movewest.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\"  border=\"0\"></a><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis'];
  echo "s.png\" class=\"map\"><a href=\"moveeast.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\" border=\"0\"></a><br /><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\"><a href=\"movesouth.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\" border=\"0\"></a><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\">";
	}


if ($row['mapdimensions']==44 and $row['xaxis']==3 and $row['yaxis']==4)
  {
  echo "<img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']+1;
  echo ".png\"  class=\"map\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\" border=\"0\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><br /><a href=\"movewest.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\"  border=\"0\"></a><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis'];
  echo "s.png\" class=\"map\"><a href=\"moveeast.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\" border=\"0\"></a><br /><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\"><a href=\"movesouth.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\" border=\"0\"></a><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\">";
	}




//***top end***

if ($row['mapdimensions']==44 and $row['xaxis']==1 and $row['yaxis']==2)
  {
  echo "<img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']+1;
  echo ".png\"  class=\"map\"><a href=\"movenorth.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\" border=\"0\"></a><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><br /><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\"  border=\"0\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis'];
  echo "s.png\" class=\"map\"><a href=\"moveeast.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\" border=\"0\"></a><br /><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\"><a href=\"movesouth.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\" border=\"0\"></a><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\">";
	}
if ($row['mapdimensions']==44 and $row['xaxis']==1 and $row['yaxis']==3)
  {
  echo "<img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']+1;
  echo ".png\"  class=\"map\"><a href=\"movenorth.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\" border=\"0\"></a><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><br /><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\"  border=\"0\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis'];
  echo "s.png\" class=\"map\"><a href=\"moveeast.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\" border=\"0\"></a><br /><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\"><a href=\"movesouth.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\" border=\"0\"></a><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\">";
	}

//***end side***
if ($row['mapdimensions']==44 and $row['xaxis']==4 and $row['yaxis']==2)
  {
  echo "<img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><a href=\"movenorth.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\" border=\"0\"></a><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><br /><a href=\"movewest.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\"  border=\"0\"></a><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis'];
  echo "s.png\" class=\"map\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\" border=\"0\"><br /><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\"><a href=\"movesouth.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\" border=\"0\"></a><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\">";
	}




if ($row['mapdimensions']==44 and $row['xaxis']==4 and $row['yaxis']==3)
  {
  echo "<img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><a href=\"movenorth.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\" border=\"0\"></a><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><br /><a href=\"movewest.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\"  border=\"0\"></a><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis'];
  echo "s.png\" class=\"map\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\" border=\"0\"><br /><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\"><a href=\"movesouth.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\" border=\"0\"></a><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\">";
	}





//***end side ***
if ($row['mapdimensions']==44 and $row['xaxis']==2 and $row['yaxis']==1)
  {
  echo "<img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><a href=\"movenorth.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\" border=\"0\"></a><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><br /><a href=\"movewest.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\"  border=\"0\"></a><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis'];
  echo "s.png\" class=\"map\"><a href=\"moveeast.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\" border=\"0\"></a><br /><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\" border=\"0\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']-1;
  echo ".png?".time();
  echo "\" class=\"map\">";
	}




if ($row['mapdimensions']==44 and $row['xaxis']==3 and $row['yaxis']==1)
  {
  echo "<img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><a href=\"movenorth.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\" border=\"0\"></a><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><br /><a href=\"movewest.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\"  border=\"0\"></a><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis'];
  echo "s.png\" class=\"map\"><a href=\"moveeast.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\" border=\"0\"></a><br /><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\" border=\"0\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']-1;
  echo ".png?".time();
  echo "\" class=\"map\">";
	}





//***end bottom****
if ($row['mapdimensions']==44 and $row['xaxis']==1 and $row['yaxis']==4)
  {
  echo "<img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']+1;
  echo ".png\"  class=\"map\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\" border=\"0\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><br /><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\"  border=\"0\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis'];
  echo "s.png\" class=\"map\"><a href=\"moveeast.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\" border=\"0\"></a><br /><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\"><a href=\"movesouth.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\" border=\"0\"></a><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\">";
	}

if ($row['mapdimensions']==44 and $row['xaxis']==4 and $row['yaxis']==4)
  {
  echo "<img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']+1;
  echo ".png\"  class=\"map\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\" border=\"0\"></a><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><br /><a href=\"movewest.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\"  border=\"0\"></a><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis'];
  echo "s.png\" class=\"map\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\" border=\"0\"><br /><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\"><a href=\"movesouth.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\" border=\"0\"></a><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\">";
	}

if ($row['mapdimensions']==44 and $row['xaxis']==1 and $row['yaxis']==1)
  {
  echo "<img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']+1;
  echo ".png\"  class=\"map\"><a href=\"movenorth.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\" border=\"0\"></a><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><br /><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\"  border=\"0\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis'];
  echo "s.png\" class=\"map\"><a href=\"moveeast.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\" border=\"0\"></a><br /><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\" border=\"0\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\">";
	}

if ($row['mapdimensions']==44 and $row['xaxis']==4 and $row['yaxis']==1)
  {
  echo "<img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><a href=\"movenorth.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\" border=\"0\"></a><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><br /><a href=\"movewest.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\"  border=\"0\"></a><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis'];
  echo "s.png\" class=\"map\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\" border=\"0\"><br /><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\" border=\"0\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\">";
	}



}
if ($row['mapdimensions']==77)
{

if ($row['mapdimensions']==77 and $row['xaxis']==2 and $row['yaxis']==2)
  {
  echo "<img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><a href=\"movenorth.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\" border=\"0\"></a><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><br /><a href=\"movewest.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\"  border=\"0\"></a><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis'];
  echo "s.png\" class=\"map\"><a href=\"moveeast.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\" border=\"0\"></a><br /><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\"><a href=\"movesouth.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\" border=\"0\"></a><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\">";
	}

if ($row['mapdimensions']==77 and $row['xaxis']==1 and $row['yaxis']==1)
  {
  echo "<img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><a href=\"movenorth.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\" border=\"0\"></a><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><br /><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\" border=\"0\"></a><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis'];
  echo "s.png\" class=\"map\"><a href=\"moveeast.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\" border=\"0\"></a><br /><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\" border=\"0\"></a><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\">";
	}

if ($row['mapdimensions']==77 and $row['xaxis']==2 and $row['yaxis']==1)
  {
  echo "<img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><a href=\"movenorth.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\" border=\"0\"></a><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><br /><a href=\"movewest.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\"  border=\"0\"></a><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis'];
  echo "s.png\" class=\"map\"><a href=\"moveeast.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\" border=\"0\"></a><br /><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\" border=\"0\"></a><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\">";
	}

if ($row['mapdimensions']==77 and $row['xaxis']==3 and $row['yaxis']==1)
  {
  echo "<img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><a href=\"movenorth.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\" border=\"0\"></a><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><br /><a href=\"movewest.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\"  border=\"0\"></a><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis'];
  echo "s.png\" class=\"map\"><a href=\"moveeast.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\" border=\"0\"></a><br /><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\" border=\"0\"></a><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\">";
	}

if ($row['mapdimensions']==77 and $row['xaxis']==4 and $row['yaxis']==1)
  {
  echo "<img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><a href=\"movenorth.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\" border=\"0\"></a><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><br /><a href=\"movewest.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\"  border=\"0\"></a><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis'];
  echo "s.png\" class=\"map\"><a href=\"moveeast.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\" border=\"0\"></a><br /><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\" border=\"0\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\">";
	}

if ($row['mapdimensions']==77 and $row['xaxis']==5 and $row['yaxis']==1)
  {
  echo "<img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><a href=\"movenorth.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\" border=\"0\"></a><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><br /><a href=\"movewest.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\"  border=\"0\"></a><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis'];
  echo "s.png\" class=\"map\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\" border=\"0\"></a><br /><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\" border=\"0\"></a><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\">";
	}

if ($row['mapdimensions']==77 and $row['xaxis']==1 and $row['yaxis']==2)
  {
  echo "<img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><a href=\"movenorth.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\" border=\"0\"></a><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><br /><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\"  border=\"0\"></a><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis'];
  echo "s.png\" class=\"map\"><a href=\"moveeast.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\" border=\"0\"></a><br /><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\"><a href=\"movesouth.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\" border=\"0\"></a><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\">";
	}

if ($row['mapdimensions']==77 and $row['xaxis']==3 and $row['yaxis']==2)
  {
  echo "<img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><a href=\"movenorth.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\" border=\"0\"></a><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><br /><a href=\"movewest.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\"  border=\"0\"></a><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis'];
  echo "s.png\" class=\"map\"><a href=\"moveeast.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\" border=\"0\"></a><br /><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\"><a href=\"movesouth.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\" border=\"0\"></a><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\">";
	}

if ($row['mapdimensions']==77 and $row['xaxis']==4 and $row['yaxis']==2)
  {
  echo "<img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><a href=\"movenorth.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\" border=\"0\"></a><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><br /><a href=\"movewest.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\"  border=\"0\"></a><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis'];
  echo "s.png\" class=\"map\"><a href=\"moveeast.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\" border=\"0\"></a><br /><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\"><a href=\"movesouth.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\" border=\"0\"></a><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\">";
	}

if ($row['mapdimensions']==77 and $row['xaxis']==5 and $row['yaxis']==2)
  {
  echo "<img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><a href=\"movenorth.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\" border=\"0\"></a><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><br /><a href=\"movewest.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\"  border=\"0\"></a><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis'];
  echo "s.png\" class=\"map\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\" border=\"0\"></a><br /><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\"><a href=\"movesouth.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\" border=\"0\"></a><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\">";
	}

if ($row['mapdimensions']==77 and $row['xaxis']==1 and $row['yaxis']==3)
  {
  echo "<img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><a href=\"movenorth.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\" border=\"0\"></a><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><br /><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\"  border=\"0\"></a><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis'];
  echo "s.png\" class=\"map\"><a href=\"moveeast.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\" border=\"0\"></a><br /><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\"><a href=\"movesouth.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\" border=\"0\"></a><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\">";
	}

if ($row['mapdimensions']==77 and $row['xaxis']==2 and $row['yaxis']==3)
  {
  echo "<img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><a href=\"movenorth.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\" border=\"0\"></a><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><br /><a href=\"movewest.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\"  border=\"0\"></a><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis'];
  echo "s.png\" class=\"map\"><a href=\"moveeast.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\" border=\"0\"></a><br /><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\"><a href=\"movesouth.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\" border=\"0\"></a><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\">";
	}
if ($row['mapdimensions']==77 and $row['xaxis']==3 and $row['yaxis']==3)
  {
  echo "<img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><a href=\"movenorth.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\" border=\"0\"></a><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><br /><a href=\"movewest.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\"  border=\"0\"></a><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis'];
  echo "s.png\" class=\"map\"><a href=\"moveeast.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\" border=\"0\"></a><br /><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\"><a href=\"movesouth.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\" border=\"0\"></a><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\">";
	}

if ($row['mapdimensions']==77 and $row['xaxis']==4 and $row['yaxis']==3)
  {
  echo "<img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><a href=\"movenorth.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\" border=\"0\"></a><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><br /><a href=\"movewest.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\"  border=\"0\"></a><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis'];
  echo "s.png\" class=\"map\"><a href=\"moveeast.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\" border=\"0\"></a><br /><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\"><a href=\"movesouth.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\" border=\"0\"></a><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\">";
	}

if ($row['mapdimensions']==77 and $row['xaxis']==5 and $row['yaxis']==3)
  {
  echo "<img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><a href=\"movenorth.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\" border=\"0\"></a><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><br /><a href=\"movewest.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\"  border=\"0\"></a><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis'];
  echo "s.png\" class=\"map\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\" border=\"0\"></a><br /><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\"><a href=\"movesouth.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\" border=\"0\"></a><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\">";
	}

if ($row['mapdimensions']==77 and $row['xaxis']==1 and $row['yaxis']==4)
  {
  echo "<img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><a href=\"movenorth.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\" border=\"0\"></a><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><br /><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\" border=\"0\"></a><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis'];
  echo "s.png\" class=\"map\"><a href=\"moveeast.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\" border=\"0\"></a><br /><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\"><a href=\"movesouth.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\" border=\"0\"></a><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\">";
	}
if ($row['mapdimensions']==77 and $row['xaxis']==2 and $row['yaxis']==4)
  {
  echo "<img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><a href=\"movenorth.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\" border=\"0\"></a><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><br /><a href=\"movewest.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\"  border=\"0\"></a><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis'];
  echo "s.png\" class=\"map\"><a href=\"moveeast.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\" border=\"0\"></a><br /><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\"><a href=\"movesouth.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\" border=\"0\"></a><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\">";
	}

if ($row['mapdimensions']==77 and $row['xaxis']==3 and $row['yaxis']==4)
  {
  echo "<img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><a href=\"movenorth.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\" border=\"0\"></a><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><br /><a href=\"movewest.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\"  border=\"0\"></a><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis'];
  echo "s.png\" class=\"map\"><a href=\"moveeast.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\" border=\"0\"></a><br /><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\"><a href=\"movesouth.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\" border=\"0\"></a><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\">";
	}

if ($row['mapdimensions']==77 and $row['xaxis']==4 and $row['yaxis']==4)
  {
  echo "<img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><a href=\"movenorth.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\" border=\"0\"></a><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><br /><a href=\"movewest.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\"  border=\"0\"></a><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis'];
  echo "s.png\" class=\"map\"><a href=\"moveeast.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\" border=\"0\"></a><br /><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\"><a href=\"movesouth.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\" border=\"0\"></a><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\">";
	}

if ($row['mapdimensions']==77 and $row['xaxis']==5 and $row['yaxis']==4)
  {
  echo "<img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><a href=\"movenorth.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\" border=\"0\"></a><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><br /><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\"  border=\"0\"></a><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis'];
  echo "s.png\" class=\"map\"><a href=\"moveeast.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\" border=\"0\"></a><br /><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\"><a href=\"movesouth.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\" border=\"0\"></a><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\">";
	}

if ($row['mapdimensions']==77 and $row['xaxis']==1 and $row['yaxis']==5)
  {
  echo "<img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\" border=\"0\"></a><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><br /><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\"  border=\"0\"></a><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis'];
  echo "s.png\" class=\"map\"><a href=\"moveeast.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\" border=\"0\"></a><br /><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\"><a href=\"movesouth.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\" border=\"0\"></a><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\">";
	}
if ($row['mapdimensions']==77 and $row['xaxis']==2 and $row['yaxis']==5)
  {
  echo "<img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\" border=\"0\"></a><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><br /><a href=\"movewest.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\"  border=\"0\"></a><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis'];
  echo "s.png\" class=\"map\"><a href=\"moveeast.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\" border=\"0\"></a><br /><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\"><a href=\"movesouth.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\" border=\"0\"></a><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\">";
	}

if ($row['mapdimensions']==77 and $row['xaxis']==3 and $row['yaxis']==5)
  {
  echo "<img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\" border=\"0\"></a><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><br /><a href=\"movewest.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\"  border=\"0\"></a><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis'];
  echo "s.png\" class=\"map\"><a href=\"moveeast.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\" border=\"0\"></a><br /><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\"><a href=\"movesouth.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\" border=\"0\"></a><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\">";
	}
if ($row['mapdimensions']==77 and $row['xaxis']==4 and $row['yaxis']==5)
  {
  echo "<img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\" border=\"0\"></a><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><br /><a href=\"movewest.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\"  border=\"0\"></a><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis'];
  echo "s.png\" class=\"map\"><a href=\"moveeast.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\" border=\"0\"></a><br /><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\"><a href=\"movesouth.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\" border=\"0\"></a><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\">";
	}

if ($row['mapdimensions']==77 and $row['xaxis']==5 and $row['yaxis']==5)
  {
  echo "<img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\" border=\"0\"></a><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><br /><a href=\"movewest.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\"  border=\"0\"></a><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis'];
  echo "s.png\" class=\"map\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\" border=\"0\"></a><br /><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\"><a href=\"movesouth.php?".time();
  echo "\"><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\" border=\"0\"></a><img style=\"width: 33%\" src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\">";
	}

}
} 
?>