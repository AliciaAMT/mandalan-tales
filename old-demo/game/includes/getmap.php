<?php 
$stmt = $db->prepare("SELECT mapdimensions, map, xaxis, yaxis FROM charstats WHERE charname=:charname;");
				$stmt->execute(array(':charname' => $charname));
				
while($row = $stmt->fetch())
  {
  $map=$row['map'];
$xaxis=$row['xaxis'];
$yaxis=$row['yaxis'];
$mapdimensions=$row['mapdimensions'];
}
?>