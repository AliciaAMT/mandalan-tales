<?php
$stmt = $db->prepare("SELECT level FROM charstats WHERE charname=:charname;");
				$stmt->execute(array(':charname' => $charname));
				
while($row = $stmt->fetch())
{
$level=$row['level'];
}
?>