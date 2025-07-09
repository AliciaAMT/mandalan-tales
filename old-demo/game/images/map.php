<?php

include ('php/getflags.php');

$query = sprintf("select * from stats where username='%s';",mysql_real_escape_string($username));
$result=mysql_query($query);
while($row = mysql_fetch_array($result))
  {
  if ($row['mapdimensions']==33)
  {
  if ($row['mapdimensions']==33 and $row['xaxis']==2 and $row['yaxis']==2)
  {
  echo "<img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><a href=\"movenorth.php?".time();
  echo "\"><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\" border=\"0\"></a><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><br /><a href=\"movewest.php?".time();
  echo "\"><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\"  border=\"0\"></a><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis'];
  echo ".png\" class=\"map\"><a href=\"moveeast.php?".time();
  echo "\"><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\" border=\"0\"></a><br /><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\"><a href=\"movesouth.php?".time();
  echo "\"><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\" border=\"0\"></a><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\">";
	}


if ($row['mapdimensions']==33 and $row['xaxis']==2 and $row['yaxis']==3)
  {
  echo "<img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']+1;
  echo ".png\"  class=\"map\"><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\" border=\"0\"><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><br /><a href=\"movewest.php?".time();
  echo "\"><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\"  border=\"0\"></a><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis'];
  echo ".png\" class=\"map\"><a href=\"moveeast.php?".time();
  echo "\"><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\" border=\"0\"></a><br /><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\"><a href=\"movesouth.php?".time();
  echo "\"><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\" border=\"0\"></a><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\">";
	}


if ($row['mapdimensions']==33 and $row['xaxis']==1 and $row['yaxis']==2)
  {
  echo "<img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']+1;
  echo ".png\"  class=\"map\"><a href=\"movenorth.php?".time();
  echo "\"><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\" border=\"0\"></a><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><br /><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\"  border=\"0\"><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis'];
  echo ".png\" class=\"map\"><a href=\"moveeast.php?".time();
  echo "\"><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\" border=\"0\"></a><br /><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\"><a href=\"movesouth.php?".time();
  echo "\"><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\" border=\"0\"></a><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\">";
	}

if ($row['mapdimensions']==33 and $row['xaxis']==3 and $row['yaxis']==2)
  {
  echo "<img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><a href=\"movenorth.php?".time();
  echo "\"><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\" border=\"0\"></a><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><br /><a href=\"movewest.php?".time();
  echo "\"><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\"  border=\"0\"></a><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis'];
  echo ".png\" class=\"map\"><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\" border=\"0\"><br /><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\"><a href=\"movesouth.php?".time();
  echo "\"><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\" border=\"0\"></a><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\">";
	}

if ($row['mapdimensions']==33 and $row['xaxis']==2 and $row['yaxis']==1)
  {
  echo "<img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><a href=\"movenorth.php?".time();
  echo "\"><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\" border=\"0\"></a><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><br /><a href=\"movewest.php?".time();
  echo "\"><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\"  border=\"0\"></a><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis'];
  echo ".png\" class=\"map\"><a href=\"moveeast.php?".time();
  echo "\"><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\" border=\"0\"></a><br /><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\"><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\" border=\"0\"><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']-1;
  echo ".png?".time();
  echo "\" class=\"map\">";
	}

if ($row['mapdimensions']==33 and $row['xaxis']==1 and $row['yaxis']==3)
  {
  echo "<img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']+1;
  echo ".png\"  class=\"map\"><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\" border=\"0\"><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><br /><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\"  border=\"0\"><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis'];
  echo ".png\" class=\"map\"><a href=\"moveeast.php?".time();
  echo "\"><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\" border=\"0\"></a><br /><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\"><a href=\"movesouth.php?".time();
  echo "\"><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\" border=\"0\"></a><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\">";
	}

if ($row['mapdimensions']==33 and $row['xaxis']==3 and $row['yaxis']==3)
  {
  echo "<img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']+1;
  echo ".png\"  class=\"map\"><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\" border=\"0\"></a><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><br /><a href=\"movewest.php?".time();
  echo "\"><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\"  border=\"0\"></a><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis'];
  echo ".png\" class=\"map\"><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\" border=\"0\"><br /><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\"><a href=\"movesouth.php?".time();
  echo "\"><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\" border=\"0\"></a><img src=\"images/";
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
  echo "<img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']+1;
  echo ".png\"  class=\"map\"><a href=\"monsters/rat.php?".time();
  echo "\"><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\" border=\"0\"></a><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><br /><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\"  border=\"0\"><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis'];
  echo ".png\" class=\"map\"><a href=\"monsters/rat.php?".time();
  echo "\"><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\" border=\"0\"></a><br /><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\"><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\" border=\"0\"><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\">";
  }
  else
  {
  echo "<img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']+1;
  echo ".png\"  class=\"map\"><a href=\"movenorth.php?".time();
  echo "\"><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\" border=\"0\"></a><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><br /><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\"  border=\"0\"><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis'];
  echo ".png\" class=\"map\"><a href=\"moveeast.php?".time();
  echo "\"><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\" border=\"0\"></a><br /><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\"><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\" border=\"0\"><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\">";
  }
  
  }
  else
  {
  echo "<img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']+1;
  echo ".png\"  class=\"map\"><a href=\"movenorth.php?".time();
  echo "\"><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\" border=\"0\"></a><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><br /><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\"  border=\"0\"><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis'];
  echo ".png\" class=\"map\"><a href=\"moveeast.php?".time();
  echo "\"><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\" border=\"0\"></a><br /><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\"><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\" border=\"0\"><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\">";
  }
	}

if ($row['mapdimensions']==33 and $row['xaxis']==3 and $row['yaxis']==1)
  {
  echo "<img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><a href=\"movenorth.php?".time();
  echo "\"><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\" border=\"0\"></a><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><br /><a href=\"movewest.php?".time();
  echo "\"><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\"  border=\"0\"></a><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis'];
  echo ".png\" class=\"map\"><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\" border=\"0\"><br /><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\"><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\" border=\"0\"><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\">";
	}


}

if ($row['mapdimensions']==00)
{
if ($row['mapdimensions']==00 and $row['map']=="cellar" and $row['xaxis']==2 and $row['yaxis']==1)
  {
  
  $rand=mt_rand(1,100);
  
  if ($rand>80)
  {
  echo "<img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><a href=\"monsters/spider.php?".time();
  echo "\"><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\" border=\"0\"></a><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><br /><a href=\"monsters/spider.php?".time();
  echo "\"><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\"  border=\"0\"></a><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis'];
  echo ".png\" class=\"map\"><a href=\"monsters/spider.php?".time();
  echo "\"><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\" border=\"0\"></a><br /><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\"><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\" border=\"0\"><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\">";
  }
  else 
  {
  echo "<img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><a href=\"movenorth.php?".time();
  echo "\"><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\" border=\"0\"></a><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><br /><a href=\"movewest.php?".time();
  echo "\"><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\"  border=\"0\"></a><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis'];
  echo ".png\" class=\"map\"><a href=\"moveeast.php?".time();
  echo "\"><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\" border=\"0\"></a><br /><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\"><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\" border=\"0\"><img src=\"images/";
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
  
  echo "<img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\">";
  echo "<a href=\"monsters/rat.php?".time()."\"><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\" border=\"0\"></a>";
  echo "<img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><br /><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\"  border=\"0\"><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis'];
  echo ".png\" class=\"map\"><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\" border=\"0\"><br /><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\"><a href=\"monsters/rat.php?".time()."\"><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\" border=\"0\"></a><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\">";
	}

  
  //********

  else
  {
  echo "<img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><a href=\"movenorth.php?".time();
  echo "\"><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\" border=\"0\"></a><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><br /><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\"  border=\"0\"><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis'];
  echo ".png\" class=\"map\"><a href=\"moveeast.php?".time();
  echo "\"><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\" border=\"0\"></a><br /><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\"><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\" border=\"0\"><img src=\"images/";
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
  echo "<img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><a href=\"monsters/rat.php?".time();
  echo "\"><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\" border=\"0\"></a><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><br /><a href=\"monsters/rat.php?".time();
  echo "\"><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\" border=\"0\"></a><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis'];
  echo ".png\" class=\"map\"><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\" border=\"0\"><br /><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\"><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\" border=\"0\"><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\">";
  }
  else 
  {
  echo "<img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><a href=\"movenorth.php?".time();
  echo "\"><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\" border=\"0\"></a><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><br /><a href=\"movewest.php?".time();
  echo "\"><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\"  border=\"0\"></a><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis'];
  echo ".png\" class=\"map\"><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\" border=\"0\"><br /><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\"><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\" border=\"0\"><img src=\"images/";
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
  echo "<img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><a href=\"monsters/spider.php?".time();
  echo "\"><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\" border=\"0\"></a><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><br /><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\" border=\"0\"><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis'];
  echo ".png\" class=\"map\"><a href=\"monsters/spider.php?".time();
  echo "\"><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\" border=\"0\"></a><br /><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\"><a href=\"monsters/spider.php?".time();
  echo "\"><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\" border=\"0\"></a><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\">";
  }
  else
  {
  echo "<img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><a href=\"movenorth.php?".time();
  echo "\"><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\" border=\"0\"></a><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><br /><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\"  border=\"0\"><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis'];
  echo ".png\" class=\"map\"><a href=\"moveeast.php?".time();
  echo "\"><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\" border=\"0\"></a><br /><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\"><a href=\"movesouth.php?".time();
  echo "\"><img src=\"images/";
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


if ($row['mapdimensions']==00 and $row['map']=="cellar" and $row['xaxis']==2 and $row['yaxis']==2)
  {

  echo "<img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><a href=\"movenorth.php?".time();
  echo "\"><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\" border=\"0\"></a><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><br /><a href=\"movewest.php?".time();
  echo "\"><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\"  border=\"0\"></a><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis'];
  echo ".png\" class=\"map\"><a href=\"moveeast.php?".time();
  echo "\"><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\" border=\"0\"></a><br /><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\"><a href=\"movesouth.php?".time();
  echo "\"><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\" border=\"0\"></a><img src=\"images/";
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
  echo "<img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><a href=\"monsters/spider.php?".time();
  echo "\"><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\" border=\"0\"></a><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><br /><a href=\"monsters/spider.php?".time();
  echo "\"><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\"  border=\"0\"></a><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis'];
  echo ".png\" class=\"map\"><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\" border=\"0\"><br /><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\"><a href=\"monsters/spider.php?".time();
  echo "\"><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\" border=\"0\"></a><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\">";
  }
  else
  {
  echo "<img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><a href=\"movenorth.php?".time();
  echo "\"><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\" border=\"0\"></a><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><br /><a href=\"movewest.php?".time();
  echo "\"><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\"  border=\"0\"></a><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis'];
  echo ".png\" class=\"map\"><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\" border=\"0\"><br /><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\"><a href=\"movesouth.php?".time();
  echo "\"><img src=\"images/";
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


if ($row['mapdimensions']==00 and $row['map']=="cellar" and $row['xaxis']==1 and $row['yaxis']==3)
  {
  $rand=mt_rand(1,100);
  if ($rand>80)
  {
  echo "<img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><a href=\"monsters/rat.php?".time();
  echo "\"><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\" border=\"0\"></a><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><br /><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\"  border=\"0\"><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis'];
  echo ".png\" class=\"map\"><a href=\"monsters/rat.php?".time();
  echo "\"><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\" border=\"0\"></a><br /><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\"><a href=\"monsters/rat.php?".time();
  echo "\"><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\" border=\"0\"></a><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\">";
  }
  else
  {
  echo "<img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><a href=\"movenorth.php?".time();
  echo "\"><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\" border=\"0\"></a><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><br /><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\"  border=\"0\"><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis'];
  echo ".png\" class=\"map\"><a href=\"moveeast.php?".time();
  echo "\"><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\" border=\"0\"></a><br /><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\"><a href=\"movesouth.php?".time();
  echo "\"><img src=\"images/";
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


if ($row['mapdimensions']==00 and $row['map']=="cellar" and $row['xaxis']==2 and $row['yaxis']==3)
  {
$rand=mt_rand(1,100);
  if ($rand>80)
  {
  echo "<img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><a href=\"monsters/rat.php?".time();
  echo "\"><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\" border=\"0\"></a><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><br /><a href=\"monsters/rat.php?".time();
  echo "\"><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\"  border=\"0\"></a><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis'];
  echo ".png\" class=\"map\"><a href=\"monsters/rat.php?".time();
  echo "\"><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\" border=\"0\"></a><br /><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\"><a href=\"monsters/rat.php?".time();
  echo "\"><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\" border=\"0\"></a><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\">";
  }
  
  else
  {
  echo "<img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><a href=\"movenorth.php?".time();
  echo "\"><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\" border=\"0\"></a><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><br /><a href=\"movewest.php?".time();
  echo "\"><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\"  border=\"0\"></a><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis'];
  echo ".png\" class=\"map\"><a href=\"moveeast.php?".time();
  echo "\"><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\" border=\"0\"></a><br /><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\"><a href=\"movesouth.php?".time();
  echo "\"><img src=\"images/";
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

if ($row['mapdimensions']==00 and $row['map']=="cellar" and $row['xaxis']==3 and $row['yaxis']==3)
  {
  $rand=mt_rand(1,100);
  if ($rand>80)
  {
  
  echo "<img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><a href=\"monsters/rat.php?".time();
  echo "\"><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\" border=\"0\"></a><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><br /><a href=\"monsters/rat.php?".time();
  echo "\"><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\"  border=\"0\"></a><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis'];
  echo ".png\" class=\"map\"><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\" border=\"0\"><br /><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\"><a href=\"monsters/rat.php?".time();
  echo "\"><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\" border=\"0\"></a><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\">";
  }
  else
  {
  echo "<img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><a href=\"movenorth.php?".time();
  echo "\"><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\" border=\"0\"></a><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><br /><a href=\"movewest.php?".time();
  echo "\"><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\"  border=\"0\"></a><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis'];
  echo ".png\" class=\"map\"><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\" border=\"0\"><br /><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\"><a href=\"movesouth.php?".time();
  echo "\"><img src=\"images/";
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






if ($row['mapdimensions']==00 and $row['map']=="cellar" and $row['xaxis']==1 and $row['yaxis']==4)
  {
  $rand=mt_rand(1,100);
  if ($rand>80)
  {
  
  echo "<img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\" border=\"0\"><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><br /><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\"  border=\"0\"><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis'];
  echo ".png\" class=\"map\"><a href=\"monsters/spider.php?".time();
  echo "\"><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\" border=\"0\"></a><br /><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\"><a href=\"monsters/spider.php?".time();
  echo "\"><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\" border=\"0\"></a><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\">";
  }
  else
  {
  
  echo "<img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\" border=\"0\"><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><br /><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\"  border=\"0\"><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis'];
  echo ".png\" class=\"map\"><a href=\"moveeast.php?".time();
  echo "\"><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\" border=\"0\"></a><br /><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\"><a href=\"movesouth.php?".time();
  echo "\"><img src=\"images/";
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

if ($row['mapdimensions']==00 and $row['map']=="cellar" and $row['xaxis']==2 and $row['yaxis']==4)
  {
  echo "<img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><a href=\"movenorth.php?".time();
  echo "\"><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\" border=\"0\"></a><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><br /><a href=\"movewest.php?".time();
  echo "\"><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\"  border=\"0\"></a><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis'];
  echo ".png\" class=\"map\"><a href=\"moveeast.php?".time();
  echo "\"><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\" border=\"0\"></a><br /><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\"><a href=\"movesouth.php?".time();
  echo "\"><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\" border=\"0\"></a><img src=\"images/";
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
  
  echo "<img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\" border=\"0\"><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><br /><a href=\"monsters/spider.php?".time();
  echo "\"><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\"  border=\"0\"></a><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis'];
  echo ".png\" class=\"map\"><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\" border=\"0\"><br /><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\"><a href=\"monsters/spider.php?".time();
  echo "\"><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\" border=\"0\"></a><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\">";
  }
  else
  {
  echo "<img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\" border=\"0\"><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><br /><a href=\"movewest.php?".time();
  echo "\"><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\"  border=\"0\"></a><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis'];
  echo ".png\" class=\"map\"><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\" border=\"0\"><br /><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\"><a href=\"movesouth.php?".time();
  echo "\"><img src=\"images/";
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


if ($row['mapdimensions']==00 and $row['map']=="cellar" and $row['xaxis']==2 and $row['yaxis']==5)
  {
  echo "<img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\">";

if ($cellarspider==0)
{
echo "<a href=\"monsters/cellarspider.php?".time()."\"><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\" border=\"0\"></a>";
}

else
{
echo "<a href=\"movenorth.php?".time();
  echo "\"><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\" border=\"0\"></a>";
}

echo "<img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><br /><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\"  border=\"0\"><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis'];
  echo ".png\" class=\"map\"><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\" border=\"0\"><br /><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\"><a href=\"movesouth.php?".time();
  echo "\"><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\" border=\"0\"></a><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\">";
	}

if ($row['mapdimensions']==00 and $row['map']=="cellar" and $row['xaxis']==2 and $row['yaxis']==6)
  {
  echo "<img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\" border=\"0\"><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><br /><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\"  border=\"0\"><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis'];
  echo ".png\" class=\"map\"><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\" border=\"0\"><br /><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\"><a href=\"movesouth.php?".time();
  echo "\"><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\" border=\"0\"></a><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\">";
	}

//******************************************************************************************************************************************************************************

if ($row['mapdimensions']==00 and $row['map']=="cave" and $row['xaxis']==1 and $row['yaxis']==3)
  {
  
  $rand=mt_rand(1,100);
  
  if ($rand>70)
  {
  echo "<img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\" border=\"0\"><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><br /><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\"  border=\"0\"><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis'];
  echo ".png\" class=\"map\"><a href=\"monsters/goblin.php?".time();
  echo "\"><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\" border=\"0\"></a><br /><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\"><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\" border=\"0\"><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\">";
  }
  else 
  {
  echo "<img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\" border=\"0\"><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><br /><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\"  border=\"0\"><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis'];
  echo ".png\" class=\"map\"><a href=\"moveeast.php?".time();
  echo "\"><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\" border=\"0\"></a><br /><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\"><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\" border=\"0\"><img src=\"images/";
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
  echo "<img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\" border=\"0\"><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><a href=\"monsters/goblin.php?".time();
  echo "\"><br /><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\"  border=\"0\"></a><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis'];
  echo ".png\" class=\"map\"><a href=\"monsters/goblin.php?".time();
  echo "\"><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\" border=\"0\"></a><br /><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\"><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\" border=\"0\"><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\">";
  }
  else 
  {
  echo "<img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\" border=\"0\"><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><a href=\"movewest.php?".time();
  echo "\"><br /><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\"  border=\"0\"></a><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis'];
  echo ".png\" class=\"map\"><a href=\"moveeast.php?".time();
  echo "\"><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\" border=\"0\"></a><br /><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\"><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\" border=\"0\"><img src=\"images/";
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
  echo "<img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><a href=\"monsters/goblin.php?".time();
  echo "\"><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\" border=\"0\"></a><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><br /><a href=\"monsters/goblin.php?".time();
  echo "\"><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\"  border=\"0\"></a><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis'];
  echo ".png\" class=\"map\"><a href=\"monsters/goblin.php?".time();
  echo "\"><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\" border=\"0\"></a><br /><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\"><a href=\"monsters/goblin.php?".time();
  echo "\"><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\" border=\"0\"></a><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\">";
  }
  
  else
  {
  echo "<img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><a href=\"movenorth.php?".time();
  echo "\"><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\" border=\"0\"></a><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><br /><a href=\"movewest.php?".time();
  echo "\"><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\"  border=\"0\"></a><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis'];
  echo ".png\" class=\"map\"><a href=\"moveeast.php?".time();
  echo "\"><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\" border=\"0\"></a><br /><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\"><a href=\"movesouth.php?".time();
  echo "\"><img src=\"images/";
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
	
if ($row['mapdimensions']==00 and $row['map']=="cave" and $row['xaxis']==4 and $row['yaxis']==3)
  {
  
  $rand=mt_rand(1,100);
  
  if ($rand>70)
  {
  echo "<img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\" border=\"0\"><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><a href=\"monsters/goblin.php?".time();
  echo "\"><br /><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\"  border=\"0\"></a><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis'];
  echo ".png\" class=\"map\"><a href=\"monsters/goblin.php?".time();
  echo "\"><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\" border=\"0\"></a><br /><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\"><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\" border=\"0\"><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\">";
  }
  else 
  {
  echo "<img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\" border=\"0\"><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><a href=\"movewest.php?".time();
  echo "\"><br /><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\"  border=\"0\"></a><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis'];
  echo ".png\" class=\"map\"><a href=\"moveeast.php?".time();
  echo "\"><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\" border=\"0\"></a><br /><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\"><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\" border=\"0\"><img src=\"images/";
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
  echo "<img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><a href=\"monsters/goblin.php?".time();
  echo "\"><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\" border=\"0\"></a><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><br /><a href=\"monsters/goblin.php?".time();
  echo "\"><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\"  border=\"0\"></a><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis'];
  echo ".png\" class=\"map\"><a href=\"monsters/goblin.php?".time();
  echo "\"><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\" border=\"0\"></a><br /><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\"><a href=\"monsters/goblin.php?".time();
  echo "\"><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\" border=\"0\"></a><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\">";
  }
  
  else
  {
  echo "<img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><a href=\"movenorth.php?".time();
  echo "\"><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\" border=\"0\"></a><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><br /><a href=\"movewest.php?".time();
  echo "\"><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\"  border=\"0\"></a><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis'];
  echo ".png\" class=\"map\"><a href=\"moveeast.php?".time();
  echo "\"><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\" border=\"0\"></a><br /><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\"><a href=\"movesouth.php?".time();
  echo "\"><img src=\"images/";
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

if ($row['mapdimensions']==00 and $row['map']=="cave" and $row['xaxis']==6 and $row['yaxis']==3)
   {
  $rand=mt_rand(1,100);
  
  if ($rand>70)
  {
  echo "<img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\" border=\"0\"><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><a href=\"monsters/goblin.php?".time();
  echo "\"><br /><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\"  border=\"0\"></a><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis'];
  echo ".png\" class=\"map\"><a href=\"monsters/goblin.php?".time();
  echo "\"><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\" border=\"0\"></a><br /><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\"><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\" border=\"0\"><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\">";
  }
  else 
  {
  echo "<img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\" border=\"0\"><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><a href=\"movewest.php?".time();
  echo "\"><br /><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\"  border=\"0\"></a><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis'];
  echo ".png\" class=\"map\"><a href=\"moveeast.php?".time();
  echo "\"><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\" border=\"0\"></a><br /><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\"><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\" border=\"0\"><img src=\"images/";
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
  echo "<img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\" border=\"0\"><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><a href=\"monsters/goblin.php?".time();
  echo "\"><br /><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\"  border=\"0\"></a><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis'];
  echo ".png\" class=\"map\"><a href=\"monsters/goblin.php?".time();
  echo "\"><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\" border=\"0\"></a><br /><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\"><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\" border=\"0\"><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\">";
  }
  else 
  {
  echo "<img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\" border=\"0\"><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><a href=\"movewest.php?".time();
  echo "\"><br /><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\"  border=\"0\"></a><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis'];
  echo ".png\" class=\"map\"><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\" border=\"0\"><br /><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\"><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\" border=\"0\"><img src=\"images/";
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
  echo "<img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><a href=\"monsters/goblin.php?".time();
  echo "\"><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\" border=\"0\"></a><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><br /><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\"  border=\"0\"><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis'];
  echo ".png\" class=\"map\"><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\" border=\"0\"><br /><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\"><a href=\"monsters/goblin.php?".time();
  echo "\"><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\" border=\"0\"></a><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\">";
  }
  
  else
  {
  echo "<img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><a href=\"movenorth.php?".time();
  echo "\"><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\" border=\"0\"></a><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><br /><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\"  border=\"0\"><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis'];
  echo ".png\" class=\"map\"><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\" border=\"0\"><br /><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\"><a href=\"movesouth.php?".time();
  echo "\"><img src=\"images/";
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

if ($row['mapdimensions']==00 and $row['map']=="cave" and $row['xaxis']==3 and $row['yaxis']==4)
  {
  
  $rand=mt_rand(1,100);
  if ($rand>70)
  {
  echo "<img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><a href=\"monsters/goblin.php?".time();
  echo "\"><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\" border=\"0\"></a><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><br /><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\"  border=\"0\"><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis'];
  echo ".png\" class=\"map\"><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\" border=\"0\"><br /><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\"><a href=\"monsters/goblin.php?".time();
  echo "\"><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\" border=\"0\"></a><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\">";
  }
  
  else
  {
  echo "<img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><a href=\"movenorth.php?".time();
  echo "\"><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\" border=\"0\"></a><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><br /><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\"  border=\"0\"><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis'];
  echo ".png\" class=\"map\"><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\" border=\"0\"><br /><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\"><a href=\"movesouth.php?".time();
  echo "\"><img src=\"images/";
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

if ($row['mapdimensions']==00 and $row['map']=="cave" and $row['xaxis']==5 and $row['yaxis']==2)
  {
  
  $rand=mt_rand(1,100);
  if ($rand>70)
  {
  echo "<img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><a href=\"monsters/goblin.php?".time();
  echo "\"><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\" border=\"0\"></a><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><br /><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\"  border=\"0\"><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis'];
  echo ".png\" class=\"map\"><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\" border=\"0\"><br /><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\"><a href=\"monsters/goblin.php?".time();
  echo "\"><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\" border=\"0\"></a><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\">";
  }
  
  else
  {
  echo "<img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><a href=\"movenorth.php?".time();
  echo "\"><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\" border=\"0\"></a><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><br /><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\"  border=\"0\"><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis'];
  echo ".png\" class=\"map\"><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\" border=\"0\"><br /><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\"><a href=\"movesouth.php?".time();
  echo "\"><img src=\"images/";
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

if ($row['mapdimensions']==00 and $row['map']=="cave" and $row['xaxis']==5 and $row['yaxis']==4)
  {
  
  $rand=mt_rand(1,100);
  if ($rand>70)
  {
  echo "<img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><a href=\"monsters/goblin.php?".time();
  echo "\"><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\" border=\"0\"></a><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><br /><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\"  border=\"0\"><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis'];
  echo ".png\" class=\"map\"><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\" border=\"0\"><br /><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\"><a href=\"monsters/goblin.php?".time();
  echo "\"><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\" border=\"0\"></a><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\">";
  }
  
  else
  {
  echo "<img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><a href=\"movenorth.php?".time();
  echo "\"><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\" border=\"0\"></a><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><br /><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\"  border=\"0\"><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis'];
  echo ".png\" class=\"map\"><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\" border=\"0\"><br /><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\"><a href=\"movesouth.php?".time();
  echo "\"><img src=\"images/";
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

if ($row['mapdimensions']==00 and $row['map']=="cave" and $row['xaxis']==5 and $row['yaxis']==5)
  {
  
  $rand=mt_rand(1,100);
  if ($rand>70)
  {
  echo "<img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\" border=\"0\"><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><br /><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\"  border=\"0\"><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis'];
  echo ".png\" class=\"map\"><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\" border=\"0\"><br /><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\"><a href=\"monsters/goblin.php?".time();
  echo "\"><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\" border=\"0\"></a><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\">";
  }
  
  else
  {
  echo "<img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\" border=\"0\"><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><br /><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\"  border=\"0\"><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis'];
  echo ".png\" class=\"map\"><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\" border=\"0\"><br /><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\"><a href=\"movesouth.php?".time();
  echo "\"><img src=\"images/";
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

if ($row['mapdimensions']==00 and $row['map']=="cave" and $row['xaxis']==3 and $row['yaxis']==5)
  {
  
  $rand=mt_rand(1,100);
  if ($rand>70)
  {
  echo "<img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\" border=\"0\"><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><br /><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\"  border=\"0\"><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis'];
  echo ".png\" class=\"map\"><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\" border=\"0\"><br /><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\"><a href=\"monsters/goblin.php?".time();
  echo "\"><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\" border=\"0\"></a><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\">";
  }
  
  else
  {
  echo "<img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\" border=\"0\"><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><br /><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\"  border=\"0\"><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis'];
  echo ".png\" class=\"map\"><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\" border=\"0\"><br /><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\"><a href=\"movesouth.php?".time();
  echo "\"><img src=\"images/";
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
	
if ($row['mapdimensions']==00 and $row['map']=="cave" and $row['xaxis']==5 and $row['yaxis']==1)
  {
  
  $rand=mt_rand(1,100);
  if ($rand>70)
  {
  echo "<img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><a href=\"monsters/goblin.php?".time();
  echo "\"><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\" border=\"0\"></a><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><br /><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\"  border=\"0\"><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis'];
  echo ".png\" class=\"map\"><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\" border=\"0\"><br /><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\"><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\" border=\"0\"><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\">";
  }
  
  else
  {
  echo "<img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><a href=\"movenorth.php?".time();
  echo "\"><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\" border=\"0\"></a><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><br /><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\"  border=\"0\"><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis'];
  echo ".png\" class=\"map\"><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\" border=\"0\"><br /><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\"><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\" border=\"0\"><img src=\"images/";
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
  echo "<img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><a href=\"monsters/goblin.php?".time();
  echo "\"><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\" border=\"0\"></a><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><br /><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\"  border=\"0\"><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis'];
  echo ".png\" class=\"map\"><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\" border=\"0\"><br /><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\"><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\" border=\"0\"><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\">";
  }
  
  else
  {
  echo "<img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><a href=\"movenorth.php?".time();
  echo "\"><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\" border=\"0\"></a><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><br /><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\"  border=\"0\"><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis'];
  echo ".png\" class=\"map\"><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\" border=\"0\"><br /><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\"><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\" border=\"0\"><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\">";
  }
  	}

	
}


if ($row['mapdimensions']==44)
{

if ($row['mapdimensions']==44 and $row['xaxis']==2 and $row['yaxis']==2)
  {
  echo "<img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><a href=\"movenorth.php?".time();
  echo "\"><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\" border=\"0\"></a><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><br /><a href=\"movewest.php?".time();
  echo "\"><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\"  border=\"0\"></a><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis'];
  echo ".png\" class=\"map\"><a href=\"moveeast.php?".time();
  echo "\"><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\" border=\"0\"></a><br /><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\"><a href=\"movesouth.php?".time();
  echo "\"><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\" border=\"0\"></a><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\">";
	}
if ($row['mapdimensions']==44 and $row['xaxis']==3 and $row['yaxis']==2)
  {
  echo "<img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><a href=\"movenorth.php?".time();
  echo "\"><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\" border=\"0\"></a><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><br /><a href=\"movewest.php?".time();
  echo "\"><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\"  border=\"0\"></a><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis'];
  echo ".png\" class=\"map\"><a href=\"moveeast.php?".time();
  echo "\"><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\" border=\"0\"></a><br /><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\"><a href=\"movesouth.php?".time();
  echo "\"><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\" border=\"0\"></a><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\">";
	}


if ($row['mapdimensions']==44 and $row['xaxis']==2 and $row['yaxis']==3)
  {
  echo "<img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><a href=\"movenorth.php?".time();
  echo "\"><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\" border=\"0\"></a><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><br /><a href=\"movewest.php?".time();
  echo "\"><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\"  border=\"0\"></a><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis'];
  echo ".png\" class=\"map\"><a href=\"moveeast.php?".time();
  echo "\"><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\" border=\"0\"></a><br /><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\"><a href=\"movesouth.php?".time();
  echo "\"><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\" border=\"0\"></a><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\">";
	}


if ($row['mapdimensions']==44 and $row['xaxis']==3 and $row['yaxis']==3)
  {
  echo "<img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><a href=\"movenorth.php?".time();
  echo "\"><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\" border=\"0\"></a><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><br /><a href=\"movewest.php?".time();
  echo "\"><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\"  border=\"0\"></a><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis'];
  echo ".png\" class=\"map\"><a href=\"moveeast.php?".time();
  echo "\"><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\" border=\"0\"></a><br /><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\"><a href=\"movesouth.php?".time();
  echo "\"><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\" border=\"0\"></a><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\">";
	}


//***middle end***
if ($row['mapdimensions']==44 and $row['xaxis']==2 and $row['yaxis']==4)
  {
  echo "<img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']+1;
  echo ".png\"  class=\"map\"><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\" border=\"0\"><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><br /><a href=\"movewest.php?".time();
  echo "\"><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\"  border=\"0\"></a><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis'];
  echo ".png\" class=\"map\"><a href=\"moveeast.php?".time();
  echo "\"><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\" border=\"0\"></a><br /><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\"><a href=\"movesouth.php?".time();
  echo "\"><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\" border=\"0\"></a><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\">";
	}


if ($row['mapdimensions']==44 and $row['xaxis']==3 and $row['yaxis']==4)
  {
  echo "<img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']+1;
  echo ".png\"  class=\"map\"><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\" border=\"0\"><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><br /><a href=\"movewest.php?".time();
  echo "\"><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\"  border=\"0\"></a><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis'];
  echo ".png\" class=\"map\"><a href=\"moveeast.php?".time();
  echo "\"><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\" border=\"0\"></a><br /><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\"><a href=\"movesouth.php?".time();
  echo "\"><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\" border=\"0\"></a><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\">";
	}




//***top end***

if ($row['mapdimensions']==44 and $row['xaxis']==1 and $row['yaxis']==2)
  {
  echo "<img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']+1;
  echo ".png\"  class=\"map\"><a href=\"movenorth.php?".time();
  echo "\"><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\" border=\"0\"></a><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><br /><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\"  border=\"0\"><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis'];
  echo ".png\" class=\"map\"><a href=\"moveeast.php?".time();
  echo "\"><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\" border=\"0\"></a><br /><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\"><a href=\"movesouth.php?".time();
  echo "\"><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\" border=\"0\"></a><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\">";
	}
if ($row['mapdimensions']==44 and $row['xaxis']==1 and $row['yaxis']==3)
  {
  echo "<img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']+1;
  echo ".png\"  class=\"map\"><a href=\"movenorth.php?".time();
  echo "\"><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\" border=\"0\"></a><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><br /><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\"  border=\"0\"><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis'];
  echo ".png\" class=\"map\"><a href=\"moveeast.php?".time();
  echo "\"><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\" border=\"0\"></a><br /><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\"><a href=\"movesouth.php?".time();
  echo "\"><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\" border=\"0\"></a><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\">";
	}

//***end side***
if ($row['mapdimensions']==44 and $row['xaxis']==4 and $row['yaxis']==2)
  {
  echo "<img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><a href=\"movenorth.php?".time();
  echo "\"><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\" border=\"0\"></a><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><br /><a href=\"movewest.php?".time();
  echo "\"><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\"  border=\"0\"></a><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis'];
  echo ".png\" class=\"map\"><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\" border=\"0\"><br /><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\"><a href=\"movesouth.php?".time();
  echo "\"><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\" border=\"0\"></a><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\">";
	}




if ($row['mapdimensions']==44 and $row['xaxis']==4 and $row['yaxis']==3)
  {
  echo "<img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><a href=\"movenorth.php?".time();
  echo "\"><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\" border=\"0\"></a><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><br /><a href=\"movewest.php?".time();
  echo "\"><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\"  border=\"0\"></a><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis'];
  echo ".png\" class=\"map\"><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\" border=\"0\"><br /><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\"><a href=\"movesouth.php?".time();
  echo "\"><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\" border=\"0\"></a><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\">";
	}





//***end side ***
if ($row['mapdimensions']==44 and $row['xaxis']==2 and $row['yaxis']==1)
  {
  echo "<img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><a href=\"movenorth.php?".time();
  echo "\"><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\" border=\"0\"></a><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><br /><a href=\"movewest.php?".time();
  echo "\"><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\"  border=\"0\"></a><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis'];
  echo ".png\" class=\"map\"><a href=\"moveeast.php?".time();
  echo "\"><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\" border=\"0\"></a><br /><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\"><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\" border=\"0\"><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']-1;
  echo ".png?".time();
  echo "\" class=\"map\">";
	}




if ($row['mapdimensions']==44 and $row['xaxis']==3 and $row['yaxis']==1)
  {
  echo "<img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><a href=\"movenorth.php?".time();
  echo "\"><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\" border=\"0\"></a><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><br /><a href=\"movewest.php?".time();
  echo "\"><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\"  border=\"0\"></a><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis'];
  echo ".png\" class=\"map\"><a href=\"moveeast.php?".time();
  echo "\"><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\" border=\"0\"></a><br /><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\"><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\" border=\"0\"><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']-1;
  echo ".png?".time();
  echo "\" class=\"map\">";
	}





//***end bottom****
if ($row['mapdimensions']==44 and $row['xaxis']==1 and $row['yaxis']==4)
  {
  echo "<img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']+1;
  echo ".png\"  class=\"map\"><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\" border=\"0\"><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><br /><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\"  border=\"0\"><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis'];
  echo ".png\" class=\"map\"><a href=\"moveeast.php?".time();
  echo "\"><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\" border=\"0\"></a><br /><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\"><a href=\"movesouth.php?".time();
  echo "\"><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\" border=\"0\"></a><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\">";
	}

if ($row['mapdimensions']==44 and $row['xaxis']==4 and $row['yaxis']==4)
  {
  echo "<img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']+1;
  echo ".png\"  class=\"map\"><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\" border=\"0\"></a><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><br /><a href=\"movewest.php?".time();
  echo "\"><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\"  border=\"0\"></a><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis'];
  echo ".png\" class=\"map\"><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\" border=\"0\"><br /><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\"><a href=\"movesouth.php?".time();
  echo "\"><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\" border=\"0\"></a><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\">";
	}

if ($row['mapdimensions']==44 and $row['xaxis']==1 and $row['yaxis']==1)
  {
  echo "<img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']+1;
  echo ".png\"  class=\"map\"><a href=\"movenorth.php?".time();
  echo "\"><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\" border=\"0\"></a><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><br /><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\"  border=\"0\"><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis'];
  echo ".png\" class=\"map\"><a href=\"moveeast.php?".time();
  echo "\"><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\" border=\"0\"></a><br /><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\"><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\" border=\"0\"><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\">";
	}

if ($row['mapdimensions']==44 and $row['xaxis']==4 and $row['yaxis']==1)
  {
  echo "<img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><a href=\"movenorth.php?".time();
  echo "\"><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\" border=\"0\"></a><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><br /><a href=\"movewest.php?".time();
  echo "\"><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\"  border=\"0\"></a><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis'];
  echo ".png\" class=\"map\"><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\" border=\"0\"><br /><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\"><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\" border=\"0\"><img src=\"images/";
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
  echo "<img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><a href=\"movenorth.php?".time();
  echo "\"><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\" border=\"0\"></a><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><br /><a href=\"movewest.php?".time();
  echo "\"><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\"  border=\"0\"></a><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis'];
  echo ".png\" class=\"map\"><a href=\"moveeast.php?".time();
  echo "\"><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\" border=\"0\"></a><br /><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\"><a href=\"movesouth.php?".time();
  echo "\"><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\" border=\"0\"></a><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\">";
	}

if ($row['mapdimensions']==77 and $row['xaxis']==1 and $row['yaxis']==1)
  {
  echo "<img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><a href=\"movenorth.php?".time();
  echo "\"><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\" border=\"0\"></a><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><br /><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\" border=\"0\"></a><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis'];
  echo ".png\" class=\"map\"><a href=\"moveeast.php?".time();
  echo "\"><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\" border=\"0\"></a><br /><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\"><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\" border=\"0\"></a><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\">";
	}

if ($row['mapdimensions']==77 and $row['xaxis']==2 and $row['yaxis']==1)
  {
  echo "<img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><a href=\"movenorth.php?".time();
  echo "\"><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\" border=\"0\"></a><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><br /><a href=\"movewest.php?".time();
  echo "\"><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\"  border=\"0\"></a><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis'];
  echo ".png\" class=\"map\"><a href=\"moveeast.php?".time();
  echo "\"><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\" border=\"0\"></a><br /><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\"><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\" border=\"0\"></a><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\">";
	}

if ($row['mapdimensions']==77 and $row['xaxis']==3 and $row['yaxis']==1)
  {
  echo "<img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><a href=\"movenorth.php?".time();
  echo "\"><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\" border=\"0\"></a><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><br /><a href=\"movewest.php?".time();
  echo "\"><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\"  border=\"0\"></a><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis'];
  echo ".png\" class=\"map\"><a href=\"moveeast.php?".time();
  echo "\"><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\" border=\"0\"></a><br /><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\"><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\" border=\"0\"></a><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\">";
	}

if ($row['mapdimensions']==77 and $row['xaxis']==4 and $row['yaxis']==1)
  {
  echo "<img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><a href=\"movenorth.php?".time();
  echo "\"><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\" border=\"0\"></a><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><br /><a href=\"movewest.php?".time();
  echo "\"><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\"  border=\"0\"></a><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis'];
  echo ".png\" class=\"map\"><a href=\"moveeast.php?".time();
  echo "\"><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\" border=\"0\"></a><br /><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\"><a href=\"movesouth.php?".time();
  echo "\"><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\" border=\"0\"></a><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\">";
	}

if ($row['mapdimensions']==77 and $row['xaxis']==5 and $row['yaxis']==1)
  {
  echo "<img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><a href=\"movenorth.php?".time();
  echo "\"><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\" border=\"0\"></a><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><br /><a href=\"movewest.php?".time();
  echo "\"><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\"  border=\"0\"></a><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis'];
  echo ".png\" class=\"map\"><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\" border=\"0\"></a><br /><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\"><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\" border=\"0\"></a><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\">";
	}

if ($row['mapdimensions']==77 and $row['xaxis']==1 and $row['yaxis']==2)
  {
  echo "<img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><a href=\"movenorth.php?".time();
  echo "\"><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\" border=\"0\"></a><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><br /><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\"  border=\"0\"></a><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis'];
  echo ".png\" class=\"map\"><a href=\"moveeast.php?".time();
  echo "\"><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\" border=\"0\"></a><br /><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\"><a href=\"movesouth.php?".time();
  echo "\"><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\" border=\"0\"></a><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\">";
	}

if ($row['mapdimensions']==77 and $row['xaxis']==3 and $row['yaxis']==2)
  {
  echo "<img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><a href=\"movenorth.php?".time();
  echo "\"><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\" border=\"0\"></a><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><br /><a href=\"movewest.php?".time();
  echo "\"><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\"  border=\"0\"></a><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis'];
  echo ".png\" class=\"map\"><a href=\"moveeast.php?".time();
  echo "\"><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\" border=\"0\"></a><br /><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\"><a href=\"movesouth.php?".time();
  echo "\"><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\" border=\"0\"></a><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\">";
	}

if ($row['mapdimensions']==77 and $row['xaxis']==4 and $row['yaxis']==2)
  {
  echo "<img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><a href=\"movenorth.php?".time();
  echo "\"><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\" border=\"0\"></a><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><br /><a href=\"movewest.php?".time();
  echo "\"><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\"  border=\"0\"></a><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis'];
  echo ".png\" class=\"map\"><a href=\"moveeast.php?".time();
  echo "\"><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\" border=\"0\"></a><br /><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\"><a href=\"movesouth.php?".time();
  echo "\"><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\" border=\"0\"></a><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\">";
	}

if ($row['mapdimensions']==77 and $row['xaxis']==5 and $row['yaxis']==2)
  {
  echo "<img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><a href=\"movenorth.php?".time();
  echo "\"><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\" border=\"0\"></a><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><br /><a href=\"movewest.php?".time();
  echo "\"><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\"  border=\"0\"></a><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis'];
  echo ".png\" class=\"map\"><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\" border=\"0\"></a><br /><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\"><a href=\"movesouth.php?".time();
  echo "\"><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\" border=\"0\"></a><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\">";
	}

if ($row['mapdimensions']==77 and $row['xaxis']==1 and $row['yaxis']==3)
  {
  echo "<img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><a href=\"movenorth.php?".time();
  echo "\"><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\" border=\"0\"></a><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><br /><a href=\"movewest.php?".time();
  echo "\"><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\"  border=\"0\"></a><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis'];
  echo ".png\" class=\"map\"><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\" border=\"0\"></a><br /><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\"><a href=\"movesouth.php?".time();
  echo "\"><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\" border=\"0\"></a><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\">";
	}

if ($row['mapdimensions']==77 and $row['xaxis']==2 and $row['yaxis']==3)
  {
  echo "<img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><a href=\"movenorth.php?".time();
  echo "\"><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\" border=\"0\"></a><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><br /><a href=\"movewest.php?".time();
  echo "\"><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\"  border=\"0\"></a><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis'];
  echo ".png\" class=\"map\"><a href=\"moveeast.php?".time();
  echo "\"><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\" border=\"0\"></a><br /><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\"><a href=\"movesouth.php?".time();
  echo "\"><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\" border=\"0\"></a><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\">";
	}
if ($row['mapdimensions']==77 and $row['xaxis']==3 and $row['yaxis']==3)
  {
  echo "<img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><a href=\"movenorth.php?".time();
  echo "\"><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\" border=\"0\"></a><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><br /><a href=\"movewest.php?".time();
  echo "\"><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\"  border=\"0\"></a><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis'];
  echo ".png\" class=\"map\"><a href=\"moveeast.php?".time();
  echo "\"><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\" border=\"0\"></a><br /><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\"><a href=\"movesouth.php?".time();
  echo "\"><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\" border=\"0\"></a><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\">";
	}

if ($row['mapdimensions']==77 and $row['xaxis']==4 and $row['yaxis']==3)
  {
  echo "<img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><a href=\"movenorth.php?".time();
  echo "\"><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\" border=\"0\"></a><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><br /><a href=\"movewest.php?".time();
  echo "\"><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\"  border=\"0\"></a><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis'];
  echo ".png\" class=\"map\"><a href=\"moveeast.php?".time();
  echo "\"><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\" border=\"0\"></a><br /><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\"><a href=\"movesouth.php?".time();
  echo "\"><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\" border=\"0\"></a><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\">";
	}

if ($row['mapdimensions']==77 and $row['xaxis']==5 and $row['yaxis']==3)
  {
  echo "<img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><a href=\"movenorth.php?".time();
  echo "\"><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\" border=\"0\"></a><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><br /><a href=\"movewest.php?".time();
  echo "\"><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\"  border=\"0\"></a><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis'];
  echo ".png\" class=\"map\"><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\" border=\"0\"></a><br /><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\"><a href=\"movesouth.php?".time();
  echo "\"><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\" border=\"0\"></a><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\">";
	}

if ($row['mapdimensions']==77 and $row['xaxis']==1 and $row['yaxis']==4)
  {
  echo "<img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><a href=\"movenorth.php?".time();
  echo "\"><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\" border=\"0\"></a><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><br /><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\" border=\"0\"></a><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis'];
  echo ".png\" class=\"map\"><a href=\"moveeast.php?".time();
  echo "\"><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\" border=\"0\"></a><br /><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\"><a href=\"movesouth.php?".time();
  echo "\"><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\" border=\"0\"></a><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\">";
	}
if ($row['mapdimensions']==77 and $row['xaxis']==2 and $row['yaxis']==4)
  {
  echo "<img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><a href=\"movenorth.php?".time();
  echo "\"><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\" border=\"0\"></a><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><br /><a href=\"movewest.php?".time();
  echo "\"><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\"  border=\"0\"></a><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis'];
  echo ".png\" class=\"map\"><a href=\"moveeast.php?".time();
  echo "\"><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\" border=\"0\"></a><br /><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\"><a href=\"movesouth.php?".time();
  echo "\"><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\" border=\"0\"></a><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\">";
	}

if ($row['mapdimensions']==77 and $row['xaxis']==3 and $row['yaxis']==4)
  {
  echo "<img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><a href=\"movenorth.php?".time();
  echo "\"><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\" border=\"0\"></a><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><br /><a href=\"movewest.php?".time();
  echo "\"><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\"  border=\"0\"></a><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis'];
  echo ".png\" class=\"map\"><a href=\"moveeast.php?".time();
  echo "\"><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\" border=\"0\"></a><br /><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\"><a href=\"movesouth.php?".time();
  echo "\"><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\" border=\"0\"></a><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\">";
	}

if ($row['mapdimensions']==77 and $row['xaxis']==4 and $row['yaxis']==4)
  {
  echo "<img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><a href=\"movenorth.php?".time();
  echo "\"><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\" border=\"0\"></a><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><br /><a href=\"movewest.php?".time();
  echo "\"><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\"  border=\"0\"></a><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis'];
  echo ".png\" class=\"map\"><a href=\"moveeast.php?".time();
  echo "\"><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\" border=\"0\"></a><br /><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\"><a href=\"movesouth.php?".time();
  echo "\"><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\" border=\"0\"></a><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\">";
	}

if ($row['mapdimensions']==77 and $row['xaxis']==5 and $row['yaxis']==4)
  {
  echo "<img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><a href=\"movenorth.php?".time();
  echo "\"><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\" border=\"0\"></a><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><br /><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\"  border=\"0\"></a><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis'];
  echo ".png\" class=\"map\"><a href=\"moveeast.php?".time();
  echo "\"><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\" border=\"0\"></a><br /><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\"><a href=\"movesouth.php?".time();
  echo "\"><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\" border=\"0\"></a><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\">";
	}

if ($row['mapdimensions']==77 and $row['xaxis']==1 and $row['yaxis']==5)
  {
  echo "<img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\" border=\"0\"></a><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><br /><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\"  border=\"0\"></a><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis'];
  echo ".png\" class=\"map\"><a href=\"moveeast.php?".time();
  echo "\"><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\" border=\"0\"></a><br /><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\"><a href=\"movesouth.php?".time();
  echo "\"><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\" border=\"0\"></a><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\">";
	}
if ($row['mapdimensions']==77 and $row['xaxis']==2 and $row['yaxis']==5)
  {
  echo "<img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\" border=\"0\"></a><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><br /><a href=\"movewest.php?".time();
  echo "\"><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\"  border=\"0\"></a><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis'];
  echo ".png\" class=\"map\"><a href=\"moveeast.php?".time();
  echo "\"><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\" border=\"0\"></a><br /><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\"><a href=\"movesouth.php?".time();
  echo "\"><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\" border=\"0\"></a><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\">";
	}

if ($row['mapdimensions']==77 and $row['xaxis']==3 and $row['yaxis']==5)
  {
  echo "<img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\" border=\"0\"></a><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><br /><a href=\"movewest.php?".time();
  echo "\"><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\"  border=\"0\"></a><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis'];
  echo ".png\" class=\"map\"><a href=\"moveeast.php?".time();
  echo "\"><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\" border=\"0\"></a><br /><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\"><a href=\"movesouth.php?".time();
  echo "\"><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\" border=\"0\"></a><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\">";
	}
if ($row['mapdimensions']==77 and $row['xaxis']==4 and $row['yaxis']==5)
  {
  echo "<img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\" border=\"0\"></a><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><br /><a href=\"movewest.php?".time();
  echo "\"><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\"  border=\"0\"></a><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis'];
  echo ".png\" class=\"map\"><a href=\"moveeast.php?".time();
  echo "\"><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\" border=\"0\"></a><br /><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\"><a href=\"movesouth.php?".time();
  echo "\"><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\" border=\"0\"></a><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\">";
	}

if ($row['mapdimensions']==77 and $row['xaxis']==5 and $row['yaxis']==5)
  {
  echo "<img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\" border=\"0\"></a><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis']+1;
  echo ".png\" class=\"map\"><br /><a href=\"movewest.php?".time();
  echo "\"><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\"  border=\"0\"></a><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis'];
  echo $row['yaxis'];
  echo ".png\" class=\"map\"><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']+1;
  echo $row['yaxis'];
  echo ".png\" class=\"map\" border=\"0\"></a><br /><img src=\"images/";
  echo $row['map'];
  echo $row['xaxis']-1;
  echo $row['yaxis']-1;
  echo ".png\" class=\"map\"><a href=\"movesouth.php?".time();
  echo "\"><img src=\"images/";
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

} 
?>
