<?php
$display1 = '<br /><a href="';
$path = 'portal';
$display2 = '.php?'.time().'"><img style="width: ';
$imgwidth = 'auto';
$display3 = '; height: ';
$imgheight = 'auto';
$display4 = ';" src="images/';
$itemimage = 'default';
$display5 = '.png" border="0" /><br />';
$itemname = 'None';
$display6 = '</a>';


$stmt = $db->prepare("SELECT * FROM charstats WHERE charname=:charname;");
				$stmt->execute(array(':charname' => $charname));
while($row = $stmt->fetch())
  {
if ($row['map']=="homeup" and $row['xaxis']==1 and $row['yaxis']==1)
  {
	$itemimage = 'stairsdown';
	$itemname = 'Stairs Down';
	$strtogether = $display1.$path.$display2.$imgwidth.$display3.$imgheight.$display4.$itemimage.$display5.$itemname.$display6;
	echo $strtogether;
  }
if ($row['map']=="home" and $row['xaxis']==1 and $row['yaxis']==1)
  {
	$itemimage = 'stairsdown';
	$itemname = 'Stairs Up';
	$strtogether = $display1.$path.$display2.$imgwidth.$display3.$imgheight.$display4.$itemimage.$display5.$itemname.$display6;
	echo $strtogether;
  }
if ($row['map']=="home" and $row['xaxis']==3 and $row['yaxis']==3)
  {
	$itemimage = 'door';
	$itemname = 'Front Door';
	$strtogether = $display1.$path.$display2.$imgwidth.$display3.$imgheight.$display4.$itemimage.$display5.$itemname.$display6;
	echo $strtogether;
  }
if ($row['map']=="home" and $row['xaxis']==2 and $row['yaxis']==1)
  {
	$itemimage = 'door';
	$itemname = 'Back Door';
	$strtogether = $display1.$path.$display2.$imgwidth.$display3.$imgheight.$display4.$itemimage.$display5.$itemname.$display6;
	echo $strtogether;
  }
if ($row['map']=="yard" and $row['xaxis']==2 and $row['yaxis']==3)
  {
	$itemimage = 'door';
	$itemname = 'Back Door';
	$strtogether = $display1.$path.$display2.$imgwidth.$display3.$imgheight.$display4.$itemimage.$display5.$itemname.$display6;
	echo $strtogether;
  }
if ($row['map']=="yard" and $row['xaxis']==1 and $row['yaxis']==3)
  {
	$itemimage = 'cellar';
	$itemname = 'Cellar Door';
	echo $strtogether;
	$strtogether = $display1.$path.$display2.$imgwidth.$display3.$imgheight.$display4.$itemimage.$display5.$itemname.$display6;
  }
if ($row['map']=="yard" and $row['xaxis']==1 and $row['yaxis']==1)
  {
	$itemimage = 'barn';
	$itemname = 'Barn Door';
	echo $strtogether;
	$strtogether = $display1.$path.$display2.$imgwidth.$display3.$imgheight.$display4.$itemimage.$display5.$itemname.$display6;
  }
if ($row['map']=="cellar" and $row['xaxis']==2 and $row['yaxis']==1)
  {
  echo "<br /><a href=\"portal.php\"><img src=\"images/ladder.png\" border=\"0\" /><br />Ladder Out of Cellar</a><br />";
  }
if ($row['map']=="ishforest" and $row['xaxis']==2 and $row['yaxis']==1)
  {
  echo "<br /><a href=\"portal.php\"><img src=\"images/door.png\" border=\"0\" /><br />Father's House</a><br />";
  }
if ($row['map']=="barn" and $row['xaxis']==2 and $row['yaxis']==1)
  {
  echo "<br /><a href=\"portal.php\"><img src=\"images/barndoor.png\" border=\"0\" /><br />Barn Door</a><br />";
  }  
  
  if ($row['map']=="barn" and $row['xaxis']==3 and $row['yaxis']==1)
  {
  echo "<br /><a href=\"portal.php\"><img src=\"images/cellar.png\" border=\"0\" /><br />Cellar Door</a><br />";
  } 
//****************************************end new**********************************************
  if ($row['map']=="ishforest" and $row['xaxis']==4 and $row['yaxis']==4)
  {
  echo "<br /><a href=\"portal.php\"><img src=\"images/ishforest54.png\" border=\"0\" /><br />Gate to Ishandar</a><br />";
  }
  
  if ($row['map']=="ishandar" and $row['xaxis']==1 and $row['yaxis']==2)
  {
  echo "<br /><a href=\"portal.php\"><img src=\"images/ishandar02.png\" border=\"0\" /><br />Gate to Ishandar Forest</a><br />";
  }
  
   if ($row['map']=="ishforest" and $row['xaxis']==4 and $row['yaxis']==2)
  {
  echo "<br /><a href=\"portal.php\"><img src=\"images/door.png\" border=\"0\" /><br />Lady Marah's House</a><br />";
  }
  
   if ($row['map']=="marah" and $row['xaxis']==1 and $row['yaxis']==2)
  {
  echo "<br /><a href=\"portal.php\"><img src=\"images/door.png\" border=\"0\" /><br />Front Door</a><br />";
  }
  
  if ($row['map']=="ishforest" and $row['xaxis']==4 and $row['yaxis']==1)
  {
  echo "<br /><a href=\"portal.php\"><img src=\"images/ishforest51.png\" border=\"0\" /><br />Cave Entrance</a><br />";
  }
  
  if ($row['map']=="cave" and $row['xaxis']==1 and $row['yaxis']==3)
  {
  echo "<br /><a href=\"portal.php\"><img src=\"images/cave03.png\" border=\"0\" /><br />Cave Exit</a><br />";
  }
  
  if ($row['map']=="ishandar" and $row['xaxis']==2 and $row['yaxis']==1)
  {
  echo "<br /><a href=\"inn.php\"><img src=\"images/roof.png\" border=\"0\" /><br />Inn</a><br />";
  }
  if ($row['map']=="pyramid" and $row['xaxis']==2 and $row['yaxis']==1)
  {
  echo "<br /><a href=\"portal.php\"><img src=\"images/pyramid20.png\" border=\"0\" /><br />Pyramid Exit</a><br />";
  }
  if ($row['map']=="pyramid" and $row['xaxis']==2 and $row['yaxis']==3)
  {
  echo "<br /><a href=\"portal.php\"><img src=\"images/pyramid20.png\" border=\"0\" /><br />Level 2</a><br />";
  }
  if ($row['map']=="pyramida" and $row['xaxis']==6 and $row['yaxis']==1)
  {
  echo "<br /><a href=\"portal.php\"><img src=\"images/pyramid20.png\" border=\"0\" /><br />Level 1</a><br />";
  }
  if ($row['map']=="pyramida" and $row['xaxis']==6 and $row['yaxis']==12)
  {
  echo "<br /><a href=\"portal.php\"><img src=\"images/pyramid20.png\" border=\"0\" /><br />Level 2</a><br />";
  }
  
  if ($row['map']=="pyramidb" and $row['xaxis']==2 and $row['yaxis']==1)
  {
  echo "<br /><a href=\"portal.php\"><img src=\"images/pyramid20.png\" border=\"0\" /><br />Level 1</a><br />";
  }
  
  if ($row['map']=="ishandar" and $row['xaxis']==1 and $row['yaxis']==1)
  {
  echo "<br /><a href=\"ishpeasant.php\"><img src=\"images/roof.png\" border=\"0\" /><br />Peasant's Home</a><br />";
  }
  
  if ($row['map']=="ishandar" and $row['xaxis']==1 and $row['yaxis']==3)
  {
  echo "<br /><a href=\"enchantress.php\"><img src=\"images/roof.png\" border=\"0\" /><br />Enchantress's Emporium</a><br />";
  }
  
  if ($row['map']=="ishandar" and $row['xaxis']==2 and $row['yaxis']==3)
  {
  echo "<br /><a href=\"alchemist.php\"><img src=\"images/roof.png\" border=\"0\" /><br />Alchemist's Laboratory</a><br />";
  }
  
  if ($row['map']=="ishandar" and $row['xaxis']==4 and $row['yaxis']==1)
  {
  echo "<br /><a href=\"guild.php\"><img src=\"images/roof.png\" border=\"0\" /><br />Guild</a><br />";
  }
  if ($row['map']=="ishandar" and $row['xaxis']==5 and $row['yaxis']==1)
  {
  echo "<br /><a href=\"blacksmith.php\"><img src=\"images/roof.png\" border=\"0\" /><br />Blacksmith</a><br />";
  }
  if ($row['map']=="ishandar" and $row['xaxis']==4 and $row['yaxis']==3)
  {
  echo "<br /><a href=\"genstore.php\"><img src=\"images/roof.png\" border=\"0\" /><br />General Store</a><br />";
  }
  if ($row['map']=="ishandar" and $row['xaxis']==5 and $row['yaxis']==3)
  {
  echo "<br /><a href=\"magicshop.php\"><img src=\"images/roof.png\" border=\"0\" /><br />Magic Shoppe</a><br />";
  }
  if ($row['map']=="ishandar" and $row['xaxis']==3 and $row['yaxis']==5)
  {
  echo "<br /><a href=\"frontdoor.php\"><img src=\"images/door.png\" border=\"0\" /><br />Front Door of House of Elders</a><br /><br /><a href=\"backdoor.php\"><img src=\"images/door4.png\" border=\"0\" /><br />Back Door of House of Elders</a><br />";
  }
  if ($row['map']=="hoe" and $row['xaxis']==2 and $row['yaxis']==3)
  {
  echo "<br /><a href=\"portal.php\"><img src=\"images/backdoor.png\" border=\"0\" /><br />Back Door</a><br />";
  }
  
  
  }

  ?>