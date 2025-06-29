<?php
$display1 = '<br /><a href="';
$path = 'object';
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
if ($row['map']=="homeup")
  {
if ($row['map']=="homeup" and $row['xaxis']==2 and $row['yaxis']==2)
  {
	$itemimage = 'rug';
	$itemname = 'Rug';
	
	$strtogether = $display1.$path.$display2.$imgwidth.$display3.$imgheight.$display4.$itemimage.$display5.$itemname.$display6;
	echo $strtogether;
  }
if ($row['map']=="homeup" and $row['xaxis']==2 and $row['yaxis']==1)
  {
	$itemimage = 'waterbarrel';
	$itemname = 'Water Barrel';
	$path = 'gwater';
	$strtogether = $display1.$path.$display2.$imgwidth.$display3.$imgheight.$display4.$itemimage.$display5.$itemname.$display6;
	echo $strtogether;
    }
if ($row['map']=="homeup" and $row['xaxis']==3 and $row['yaxis']==1)
  {
	$itemimage = 'wardrobe';
	$itemname = 'Wardrobe';
	$strtogether = $display1.$path.$display2.$imgwidth.$display3.$imgheight.$display4.$itemimage.$display5.$itemname.$display6;
	echo $strtogether;
  }
if ($row['map']=="homeup" and $row['xaxis']==3 and $row['yaxis']==2)
  {
	$itemimage = 'desk';
	$itemname = 'Desk';
	$strtogether = $display1.$path.$display2.$imgwidth.$display3.$imgheight.$display4.$itemimage.$display5.$itemname.$display6;
	echo $strtogether;
  }
if ($row['map']=="homeup" and $row['xaxis']==1 and $row['yaxis']==2)
  {
	$itemimage = 'coatrack';
	$itemname = 'Coatrack';

	$strtogether = $display1.$path.$display2.$imgwidth.$display3.$imgheight.$display4.$itemimage.$display5.$itemname.$display6;
	echo $strtogether;
  }
if ($row['map']=="homeup" and $row['xaxis']==1 and $row['yaxis']==3)
  {
	$itemimage = 'bed';
	$itemname = 'Bed';
	$path = 'bed';
	$strtogether = $display1.$path.$display2.$imgwidth.$display3.$imgheight.$display4.$itemimage.$display5.$itemname.$display6;
	echo $strtogether;
  }
if ($row['map']=="homeup" and $row['xaxis']==2 and $row['yaxis']==3)
  {
	$itemimage = 'chest';
	$itemname = 'Chest';
	
	$strtogether = $display1.$path.$display2.$imgwidth.$display3.$imgheight.$display4.$itemimage.$display5.$itemname.$display6;
	echo $strtogether;
  }
if ($row['map']=="homeup" and $row['xaxis']==3 and $row['yaxis']==3)
  {
	$itemimage = 'shelf';
	$itemname = 'Shelf';

	$strtogether = $display1.$path.$display2.$imgwidth.$display3.$imgheight.$display4.$itemimage.$display5.$itemname.$display6;
	echo $strtogether;
  }
}
if ($row['map']=="home")
{
if ($row['map']=="home" and $row['xaxis']==1 and $row['yaxis']==1)
  {
	$itemimage = 'shelf1';
	$itemname = 'Shelf';

	$strtogether = $display1.$path.$display2.$imgwidth.$display3.$imgheight.$display4.$itemimage.$display5.$itemname.$display6;
	echo $strtogether; 
  }
if ($row['map']=="home" and $row['xaxis']==2 and $row['yaxis']==1)
  {
	$itemimage = 'carpet1';
	$itemname = 'Rug';

	$strtogether = $display1.$path.$display2.$imgwidth.$display3.$imgheight.$display4.$itemimage.$display5.$itemname.$display6;
	echo $strtogether;
  }
if ($row['map']=="home" and $row['xaxis']==3 and $row['yaxis']==1)
  {
	$itemimage = 'chest1';
	$itemname = 'Chest';

	$strtogether = $display1.$path.$display2.$imgwidth.$display3.$imgheight.$display4.$itemimage.$display5.$itemname.$display6;
	echo $strtogether;
  }
if ($row['map']=="home" and $row['xaxis']==3 and $row['yaxis']==2)
  {
	$itemimage = 'fireplace';
	$itemname = 'Fireplace';
	$path = 'fireplace';

	$strtogether = $display1.$path.$display2.$imgwidth.$display3.$imgheight.$display4.$itemimage.$display5.$itemname.$display6;
	echo $strtogether;
  }
if ($row['map']=="home" and $row['xaxis']==2 and $row['yaxis']==2)
  {
	$itemimage = 'table';
	$itemname = 'Table';

	$strtogether = $display1.$path.$display2.$imgwidth.$display3.$imgheight.$display4.$itemimage.$display5.$itemname.$display6;
	echo $strtogether;
  }
if ($row['map']=="home" and $row['xaxis']==1 and $row['yaxis']==2)
  {
	$itemimage = 'shelf2';
	$itemname = 'Shelf';

	$strtogether = $display1.$path.$display2.$imgwidth.$display3.$imgheight.$display4.$itemimage.$display5.$itemname.$display6;
	echo $strtogether;
  }
if ($row['map']=="home" and $row['xaxis']==1 and $row['yaxis']==3)
  {
	$itemimage = 'wardrobe';
	$itemname = 'Pantry';

	$strtogether = $display1.$path.$display2.$imgwidth.$display3.$imgheight.$display4.$itemimage.$display5.$itemname.$display6;
	echo $strtogether;
  }
if ($row['map']=="home" and $row['xaxis']==2 and $row['yaxis']==3)
  {
	$itemimage = 'herbrack';
	$itemname = 'Herb Rack';

	$strtogether = $display1.$path.$display2.$imgwidth.$display3.$imgheight.$display4.$itemimage.$display5.$itemname.$display6;
	echo $strtogether;
  }
if ($row['map']=="home" and $row['xaxis']==3 and $row['yaxis']==3)
  {
	$itemimage = 'sidetable';
	$itemname = 'Side Table';

	$strtogether = $display1.$path.$display2.$imgwidth.$display3.$imgheight.$display4.$itemimage.$display5.$itemname.$display6;
	echo $strtogether;
  }
}
if ($row['map']=="yard")
{
 if ($row['map']=="yard" and $row['xaxis']==3 and $row['yaxis']==3)
  {
  echo "<br /><a href=\"object.php?".time();
  echo "\"><img src=\"images/doghouse.png\" border=\"0\" /><br />Dog House</a><br />";
  }

 if ($row['map']=="yard" and $row['xaxis']==2 and $row['yaxis']==2)
  {
  echo "<br /><a href=\"gwater.php?".time();
  echo "\"><img src=\"images/well.png\" border=\"0\" /><br />Well</a><br />";
  }
 
 if ($row['map']=="yard" and $row['xaxis']==1 and $row['yaxis']==2)
  {
  echo "<br /><a href=\"object.php?".time();
  echo "\"><img src=\"images/pumpkinplant.png\" border=\"0\" /><br />Melon Plants</a><br />";
  }

 if ($row['map']=="yard" and $row['xaxis']==3 and $row['yaxis']==2)
  {
  echo "<br /><a href=\"object.php?".time();
  echo "\"><img src=\"images/chicken.png\" border=\"0\" /><br />Chicken Coop</a><br />";
  }

 if ($row['map']=="yard" and $row['xaxis']==2 and $row['yaxis']==1)
  {
  echo "<br /><a href=\"object.php?".time();
  echo "\"><img src=\"images/plants.png\" border=\"0\" /><br />Garden</a><br />";
  }

 if ($row['map']=="yard" and $row['xaxis']==3 and $row['yaxis']==1)
  {
  echo "<br /><a href=\"object.php?".time();
  echo "\"><img src=\"images/fruittree.png\" border=\"0\" /><br />Fruit Tree</a><br />";
  }

}
if ($row['map']=="cellar")
{

if ($row['map']=="cellar" and $row['xaxis']==1 and $row['yaxis']==1)
  {
  echo "<br /><a href=\"object.php?".time();
  echo "\"><img src=\"images/canvasbag1.png\" border=\"0\" /><br />Canvas Bag</a><br />";
  }

if ($row['map']=="cellar" and $row['xaxis']==3 and $row['yaxis']==1)
  {
  echo "<br /><a href=\"object.php?".time();
  echo "\"><img src=\"images/canvasbag2.png\" border=\"0\" /><br />Canvas Bag</a><br />";
  }

if ($row['map']=="cellar" and $row['xaxis']==1 and $row['yaxis']==2)
  {
  echo "<br /><a href=\"object.php?".time();
  echo "\"><img src=\"images/crate.png\" border=\"0\" /><br />Wooden Crate</a><br />";
  }

if ($row['map']=="cellar" and $row['xaxis']==3 and $row['yaxis']==2)
  {
  echo "<br /><a href=\"object.php?".time();
  echo "\"><img src=\"images/crate.png\" border=\"0\" /><br />Wooden Crate</a><br />";
  }

if ($row['map']=="cellar" and $row['xaxis']==1 and $row['yaxis']==3)
  {
  echo "<br /><a href=\"object.php?".time();
  echo "\"><img src=\"images/bottlerack.png\" border=\"0\" /><br />Bottle Rack</a><br />";
  }

if ($row['map']=="cellar" and $row['xaxis']==3 and $row['yaxis']==3)
  {
  echo "<br /><a href=\"object.php?".time();
  echo "\"><img src=\"images/winerack.png\" border=\"0\" /><br />Wine Rack</a><br />";
  }

if ($row['map']=="cellar" and $row['xaxis']==1 and $row['yaxis']==4)
  {
  echo "<br /><a href=\"gwater.php?".time();
  echo "\"><img src=\"images/barrel.png\" border=\"0\" /><br />Barrel</a><br />";
  }

if ($row['map']=="cellar" and $row['xaxis']==3 and $row['yaxis']==4)
  {
  echo "<br /><a href=\"object.php?".time();
  echo "\"><img src=\"images/shelf.png\" border=\"0\" /><br />Bookcase</a><br />";
  }

if ($row['map']=="cellar" and $row['xaxis']==2 and $row['yaxis']==6)
  {
  echo "<br /><a href=\"object.php?".time();
  echo "\"><img src=\"images/chest1.png\" border=\"0\" /><br />Chest</a><br />";
  }


}
if ($row['map']=="barn")
{

if ($row['xaxis']==1 and $row['yaxis']==1)
  {
  echo "<br /><a href=\"object.php?".time();
  echo "\"><img src=\"images/woodpile.png\" border=\"0\" /><br />Wood Pile</a><br />";
  }
if ($row['xaxis']==1 and $row['yaxis']==2)
  {
  echo "<br /><a href=\"object.php?".time();
  echo "\"><img src=\"images/hay.png\" border=\"0\" /><br />Hay</a><br />";
  }
  
if ($row['xaxis']==3 and $row['yaxis']==2)
  {
  echo "<br /><a href=\"object.php?".time();
  echo "\"><img src=\"images/canvasbag2.png\" border=\"0\" /><br />Canvas Sack</a><br />";
  }
  
  if ($row['xaxis']==1 and $row['yaxis']==3)
  {
  echo "<br /><a href=\"object.php?".time();
  echo "\"><img src=\"images/cheesestation.png\" border=\"0\" /><br />Cheese Station</a><br />";
  }

if ($row['xaxis']==3 and $row['yaxis']==3)
  {
  echo "<br /><a href=\"gwater.php?".time();
  echo "\"><img src=\"images/watertrough.png\" border=\"0\" /><br />Water Trough</a><br />";
  }
  
if ($row['xaxis']==2 and $row['yaxis']==3)
  {
  echo "<br /><a href=\"object.php?".time();
  echo "\"><img src=\"images/cow.png\" border=\"0\" /><br />Cow</a><br />";
  }  
  
}
if ($row['map']=="ishforest")
{

if ($row['xaxis']==1 and $row['yaxis']==1)
  {
  echo "<br /><a href=\"object.php?".time();
  echo "\"><img src=\"images/fruittree.png\" border=\"0\" /><br />Tree</a><br />";
  }

if ($row['xaxis']==1 and $row['yaxis']==2)
  {
  echo "<br /><a href=\"object.php?".time();
  echo "\"><img src=\"images/tree.png\" border=\"0\" /><br />Tree</a><br />";
  }
  
if ($row['xaxis']==1 and $row['yaxis']==3)
  {
  echo "<br /><a href=\"object.php?".time();
  echo "\"><img src=\"images/fruittree.png\" border=\"0\" /><br />Tree</a><br />";
  }
  
if ($row['xaxis']==1 and $row['yaxis']==4)
  {
  echo "<br /><a href=\"object.php?".time();
  echo "\"><img src=\"images/pyramid.png\" border=\"0\" /><br />Pyramid</a><br />";
  }
  
  if ($row['xaxis']==3 and $row['yaxis']==3)
  {
  echo "<br /><a href=\"gwater.php?".time();
  echo "\"><img src=\"images/water.png\" border=\"0\" /><br />Pond</a><br />";
  }

  
$rand=mt_rand(1,100);
  
if ($rand>98)
{
  echo "<a href=\"aloe.php?";
  echo time();
  echo "\"><img src=\"images/aloe.png\" border=\"0\" /><br />Aloe</a><br />";
}
if ($rand<99 and $rand>93)
{
  echo "<a href=\"sugar.php?";
  echo time();
  echo "\"><img src=\"images/sugar.png\" border=\"0\" /><br />Sugar</a><br />";
}
  
  }
if ($row['map']=="cave")
{
if ($row['xaxis']==7 and $row['yaxis']==3)
  {
  echo "<br /><a href=\"object.php?".time();
  echo "\"><img src=\"images/chest.png\" border=\"0\" /><br />Chest</a><br />";
  }
  
if ($row['xaxis']==3 and $row['yaxis']==1)
  {
  echo "<br /><a href=\"object.php?".time();
  echo "\"><img src=\"images/crate.png\" border=\"0\" /><br />Crate</a><br />";
  }

if ($row['xaxis']==3 and $row['yaxis']==5)
  {
  echo "<br /><a href=\"object.php?".time();
  echo "\"><img src=\"images/crate.png\" border=\"0\" /><br />Crate</a><br />";
  }
  
 if ($row['xaxis']==5 and $row['yaxis']==1)
  {
  echo "<br /><a href=\"object.php?".time();
  echo "\"><img src=\"images/crate.png\" border=\"0\" /><br />Crate</a><br />";
  } 
  
if ($row['xaxis']==5 and $row['yaxis']==5)
  {
  echo "<br /><a href=\"object.php?".time();
  echo "\"><img src=\"images/crate.png\" border=\"0\" /><br />Crate</a><br />";
  }
  
}
if ($row['map']=="pyramida")
{
if ($row['xaxis']==2 and $row['yaxis']==3)
  {
  echo "<br /><a href=\"object.php?".time();
  echo "\"><img src=\"images/chest.png\" border=\"0\" /><br />Chest</a><br />";
  }
  
  if ($row['xaxis']==3 and $row['yaxis']==2)
  {
  echo "<br /><a href=\"gwater.php?".time();
  echo "\"><img src=\"images/barrel1.png\" border=\"0\" /><br />Water Barrel</a><br />";
  }
  
  if ($row['xaxis']==11 and $row['yaxis']==3)
  {
  echo "<br /><a href=\"object.php?".time();
  echo "\"><img src=\"images/chest.png\" border=\"0\" /><br />Chest</a><br />";
  }
  
  if ($row['xaxis']==10 and $row['yaxis']==2)
  {
  echo "<br /><a href=\"gwater.php?".time();
  echo "\"><img src=\"images/barrel1.png\" border=\"0\" /><br />Water Barrel</a><br />";
  }
  if ($row['xaxis']==5 and $row['yaxis']==12)
  {
  echo "<br /><a href=\"object.php?".time();
  echo "\"><img src=\"images/anubis1.png\" border=\"0\" /><br />Chest</a><br />";
  }
  if ($row['xaxis']==7 and $row['yaxis']==12)
  {
  echo "<br /><a href=\"object.php?".time();
  echo "\"><img src=\"images/anubis1.png\" border=\"0\" /><br />Chest</a><br />";
  }
  }
if ($row['map']=="pyramidb")
{
if ($row['xaxis']==2 and $row['yaxis']==3)
  {
  echo "<br /><a href=\"object.php?".time();
  echo "\"><img src=\"images/anubis3.png\" border=\"0\" /><br />Sarcophagus</a><br />";
  }
  
  }
}
?>