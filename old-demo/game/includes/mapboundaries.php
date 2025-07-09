<?php

$stmt = $db->prepare("SELECT map, mapdimensions, xaxis, yaxis FROM charstats WHERE charname=:charname");
				$stmt->execute(array(':charname' => $charname));
while($row = $stmt->fetch())
  {
  if ($row['mapdimensions']==33)
  {
    if ($row['mapdimensions']==33 and $row['xaxis']>3)
	{
	$stmt = $db->prepare('UPDATE charstats SET xaxis = 3 WHERE charname= :charname') ;
					$stmt->execute(array(':charname' => $charname)); 
//*****************************************
$loc = 'Location: maingraphics.php?'.time();
header($loc);
	}

if ($row['mapdimensions']==33 and $row['yaxis']>3)
{
$stmt = $db->prepare('UPDATE charstats SET yaxis = 3 WHERE charname= :charname') ;
					$stmt->execute(array(':charname' => $charname)); 
					//*****************************************
$loc = 'Location: maingraphics.php?'.time();
header($loc);
}

if ($row['mapdimensions']==33 and $row['xaxis']<1)
{
$stmt = $db->prepare('UPDATE charstats SET xaxis = 1 WHERE charname= :charname') ;
					$stmt->execute(array(':charname' => $charname)); 
//*****************************************
$loc = 'Location: maingraphics.php?'.time();
header($loc);
}

if ($row['mapdimensions']==33 and $row['yaxis']<1)
{
$stmt = $db->prepare('UPDATE charstats SET yaxis = 1 WHERE charname= :charname') ;
					$stmt->execute(array(':charname' => $charname));
//*****************************************
$loc = 'Location: maingraphics.php?'.time();
header($loc);
}
}
if ($row['map']=="cellar")
{
	if ($row['map']=="cellar" and $row['yaxis']<1)
	{
		$stmt = $db->prepare('UPDATE charstats SET yaxis = 1 WHERE charname= :charname') ;
					$stmt->execute(array(':charname' => $charname));
//*****************************************
$loc = 'Location: maingraphics.php?'.time();
header($loc);					
	}
if ($row['map']=="cellar" and $row['yaxis']>6)
{
	$stmt = $db->prepare('UPDATE charstats SET yaxis = 6 WHERE charname= :charname') ;
					$stmt->execute(array(':charname' => $charname));
//*****************************************
$loc = 'Location: maingraphics.php?'.time();
header($loc);
					}

if ($row['map']=="cellar" and $row['yaxis']==1 and $row['xaxis']<1)
{
	$stmt = $db->prepare('UPDATE charstats SET xaxis = 1 WHERE charname= :charname') ;
					$stmt->execute(array(':charname' => $charname));
//*****************************************
$loc = 'Location: maingraphics.php?'.time();
header($loc);
					}

if ($row['map']=="cellar" and $row['yaxis']==1 and $row['xaxis']>3)
{
	$stmt = $db->prepare('UPDATE charstats SET xaxis = 3 WHERE charname= :charname') ;
					$stmt->execute(array(':charname' => $charname));
//*****************************************
$loc = 'Location: maingraphics.php?'.time();
header($loc);
					}

if ($row['map']=="cellar" and $row['yaxis']==2 and $row['xaxis']<1)
{
	$stmt = $db->prepare('UPDATE charstats SET xaxis = 1 WHERE charname= :charname') ;
					$stmt->execute(array(':charname' => $charname));

					//*****************************************
$loc = 'Location: maingraphics.php?'.time();
header($loc);
}

if ($row['map']=="cellar" and $row['yaxis']==2 and $row['xaxis']>3)
{
	$stmt = $db->prepare('UPDATE charstats SET xaxis = 3 WHERE charname= :charname') ;
					$stmt->execute(array(':charname' => $charname));
//*****************************************
$loc = 'Location: maingraphics.php?'.time();
header($loc);
					}

if ($row['map']=="cellar" and $row['yaxis']==3 and $row['xaxis']<1)
{
	$stmt = $db->prepare('UPDATE charstats SET xaxis = 1 WHERE charname= :charname') ;
					$stmt->execute(array(':charname' => $charname));
//*****************************************
$loc = 'Location: maingraphics.php?'.time();
header($loc);
					}

if ($row['map']=="cellar" and $row['yaxis']==3 and $row['xaxis']>3)
{
	$stmt = $db->prepare('UPDATE charstats SET xaxis = 3 WHERE charname= :charname') ;
					$stmt->execute(array(':charname' => $charname));

					//*****************************************
$loc = 'Location: maingraphics.php?'.time();
header($loc);
}

if ($row['map']=="cellar" and $row['yaxis']==4 and $row['xaxis']<1)
{
	$stmt = $db->prepare('UPDATE charstats SET xaxis = 1 WHERE charname= :charname') ;
					$stmt->execute(array(':charname' => $charname));
//*****************************************
$loc = 'Location: maingraphics.php?'.time();
header($loc);
}

if ($row['map']=="cellar" and $row['yaxis']==4 and $row['xaxis']>3)
{
	$stmt = $db->prepare('UPDATE charstats SET xaxis = 3 WHERE charname= :charname') ;
					$stmt->execute(array(':charname' => $charname));
//*****************************************
$loc = 'Location: maingraphics.php?'.time();
header($loc);
}

if ($row['map']=="cellar" and $row['yaxis']==5 and $row['xaxis']<2)
{
	$stmt = $db->prepare('UPDATE charstats SET xaxis = 2 WHERE charname= :charname') ;
					$stmt->execute(array(':charname' => $charname));
//*****************************************
$loc = 'Location: maingraphics.php?'.time();
header($loc);
}

if ($row['map']=="cellar" and $row['yaxis']==5 and $row['xaxis']>2)
{
	$stmt = $db->prepare('UPDATE charstats SET xaxis = 2 WHERE charname= :charname') ;
					$stmt->execute(array(':charname' => $charname));
//*****************************************
$loc = 'Location: maingraphics.php?'.time();
header($loc);
}

if ($row['map']=="cellar" and $row['yaxis']==6 and $row['xaxis']<2)
{
	$stmt = $db->prepare('UPDATE charstats SET xaxis = 2 WHERE charname= :charname') ;
					$stmt->execute(array(':charname' => $charname));
//*****************************************
$loc = 'Location: maingraphics.php?'.time();
header($loc);
}

if ($row['map']=="cellar" and $row['yaxis']==6 and $row['xaxis']>2)
{
	$stmt = $db->prepare('UPDATE charstats SET xaxis = 2 WHERE charname= :charname') ;
					$stmt->execute(array(':charname' => $charname));
//*****************************************
$loc = 'Location: maingraphics.php?'.time();
header($loc);
}
}
if ($row['mapdimensions']==44)
  {
  
  if ($row['xaxis']>4)
{
	$stmt = $db->prepare('UPDATE charstats SET xaxis = 4 WHERE charname= :charname') ;
					$stmt->execute(array(':charname' => $charname));
//*****************************************
$loc = 'Location: maingraphics.php?'.time();
header($loc);
}

if ($row['yaxis']>4)
{
$stmt = $db->prepare('UPDATE charstats SET yaxis = 4 WHERE charname= :charname') ;
					$stmt->execute(array(':charname' => $charname));
//*****************************************
$loc = 'Location: maingraphics.php?'.time();
header($loc);
}

if ($row['xaxis']<1)
{
$stmt = $db->prepare('UPDATE charstats SET xaxis = 1 WHERE charname= :charname') ;
					$stmt->execute(array(':charname' => $charname));
//*****************************************
$loc = 'Location: maingraphics.php?'.time();
header($loc);
}

if ($row['yaxis']<1)
{
$stmt = $db->prepare('UPDATE charstats SET yaxis = 1 WHERE charname= :charname') ;
					$stmt->execute(array(':charname' => $charname));
//*****************************************
$loc = 'Location: maingraphics.php?'.time();
header($loc);
}
}

  }
?>