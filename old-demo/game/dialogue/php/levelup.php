<?php
$stmt = $db->prepare("SELECT experience, level FROM charstats WHERE charname=:charname;");
				$stmt->execute(array(':charname' => $charname));
while($row = $stmt->fetch())
  {

if ($row['experience']<100 and $row['level']==1)

{
echo "I'm sorry, you need more experience to level up. But I'm sure you will be ready in no time. Check back with me when your experience reaches 100.";

}


if ($row['experience']>99 and $row['level']==1)

{

$stmt = $db->prepare('UPDATE charstats SET level = 2 WHERE charname = :charname') ;
					$stmt->execute(array(':charname' => $charname));

$stmt = $db->prepare('UPDATE charstats SET strength = strength + 2 WHERE charname = :charname') ;
					$stmt->execute(array(':charname' => $charname));

$stmt = $db->prepare('UPDATE charstats SET agility=agility+2 WHERE charname = :charname') ;
					$stmt->execute(array(':charname' => $charname));
$stmt = $db->prepare('UPDATE charstats SET speed = speed + 2 WHERE charname = :charname') ;
					$stmt->execute(array(':charname' => $charname));

$stmt = $db->prepare('UPDATE charstats SET skillpoints = skillpoints + 3 WHERE charname = :charname') ;
					$stmt->execute(array(':charname' => $charname));

$stmt = $db->prepare('UPDATE charstats SET maxlife = maxlife + 3 WHERE charname = :charname') ;
					$stmt->execute(array(':charname' => $charname));

$stmt = $db->prepare('UPDATE charstats SET life = life + 3 WHERE charname = :charname') ;
					$stmt->execute(array(':charname' => $charname));

$stmt = $db->prepare('UPDATE charstats SET maxmana = maxmana + 3 WHERE charname = :charname') ;
					$stmt->execute(array(':charname' => $charname));

$stmt = $db->prepare('UPDATE charstats SET mana = mana + 3 WHERE charname = :charname') ;
					$stmt->execute(array(':charname' => $charname));

echo "Yes, my child, I think you are ready to learn more. You are now level 2. Congratulations! You have gained 2 strength, 2 agility, and 2 speed. Don't forget to use your 3 new skill points either!";

}


if ($row['experience']<250 and $row['level']==2)

{
echo "I'm sorry, you need more experience to level up. But I'm sure you will be ready in no time. Check back with me when your experience reaches 250.";

}


if ($row['experience']>249 and $row['level']==2)

{

$query=sprintf("update stats set level=3 where username='%s';", mysql_real_escape_string($username));
mysql_query($query);

$query=sprintf("update stats set accuracy=accuracy+2 where username='%s';", mysql_real_escape_string($username));
mysql_query($query);

$query=sprintf("update stats set wisdom=wisdom+2 where username='%s';", mysql_real_escape_string($username));
mysql_query($query);

$query=sprintf("update stats set luck=luck+2 where username='%s';", mysql_real_escape_string($username));
mysql_query($query);

$query=sprintf("update stats set skillpoints=skillpoints+3 where username='%s';", mysql_real_escape_string($username));
mysql_query($query);

$query=sprintf("update stats set maxlife=maxlife+3 where username='%s';", mysql_real_escape_string($username));
mysql_query($query);

$query=sprintf("update stats set life=life+3 where username='%s';", mysql_real_escape_string($username));
mysql_query($query);

$query=sprintf("update stats set maxmana=maxmana+3 where username='%s';", mysql_real_escape_string($username));
mysql_query($query);

$query=sprintf("update stats set mana=mana+3 where username='%s';", mysql_real_escape_string($username));
mysql_query($query);

echo "Yes, my child, I think you are ready to learn more. You are now level 3. Congratulations! You have gained 2 accuracy, 2 wisdom, and 2 luck. Don't forget to use your 3 new skill points either!";

}

if ($row['experience']<500 and $row['level']==3)

{
echo "I'm sorry, you need more experience to level up. But I'm sure you will be ready in no time. Check back with me when your experience reaches 500.";

}


if ($row['experience']>499 and $row['level']==3)

{

$query=sprintf("update stats set level=4 where username='%s';", mysql_real_escape_string($username));
mysql_query($query);

$query=sprintf("update stats set skillpoints=skillpoints+3 where username='%s';", mysql_real_escape_string($username));
mysql_query($query);

$query=sprintf("update stats set maxlife=maxlife+3 where username='%s';", mysql_real_escape_string($username));
mysql_query($query);

$query=sprintf("update stats set life=life+3 where username='%s';", mysql_real_escape_string($username));
mysql_query($query);

$query=sprintf("update stats set maxmana=maxmana+3 where username='%s';", mysql_real_escape_string($username));
mysql_query($query);

$query=sprintf("update stats set mana=mana+3 where username='%s';", mysql_real_escape_string($username));
mysql_query($query);

echo "Yes, my child, I think you are ready to learn more. You are now level 4. Congratulations! You have gained 3 skillpoints.";

}

if ($row['experience']<1000 and $row['level']==4)

{
echo "I'm sorry, you need more experience to level up. But I'm sure you will be ready in no time. Check back with me when your experience reaches 1000.";

}


if ($row['experience']>999 and $row['level']==4)

{

$query=sprintf("update stats set level=5 where username='%s';", mysql_real_escape_string($username));
mysql_query($query);




$query=sprintf("update stats set strength=strength+1 where username='%s';", mysql_real_escape_string($username));
mysql_query($query);

$query=sprintf("update stats set agility=agility+1 where username='%s';", mysql_real_escape_string($username));
mysql_query($query);

$query=sprintf("update stats set speed=speed+1 where username='%s';", mysql_real_escape_string($username));
mysql_query($query);

$query=sprintf("update stats set accuracy=accuracy+1 where username='%s';", mysql_real_escape_string($username));
mysql_query($query);

$query=sprintf("update stats set wisdom=wisdom+1 where username='%s';", mysql_real_escape_string($username));
mysql_query($query);

$query=sprintf("update stats set luck=luck+1 where username='%s';", mysql_real_escape_string($username));
mysql_query($query);


$query=sprintf("update stats set skillpoints=skillpoints+3 where username='%s';", mysql_real_escape_string($username));
mysql_query($query);

$query=sprintf("update stats set maxlife=maxlife+3 where username='%s';", mysql_real_escape_string($username));
mysql_query($query);

$query=sprintf("update stats set life=life+3 where username='%s';", mysql_real_escape_string($username));
mysql_query($query);

$query=sprintf("update stats set maxmana=maxmana+3 where username='%s';", mysql_real_escape_string($username));
mysql_query($query);

$query=sprintf("update stats set mana=mana+3 where username='%s';", mysql_real_escape_string($username));
mysql_query($query);

echo "Yes, my child, I think you are ready to learn more. You are now level 5. Congratulations! You have gained 1 to all stats and 3 skillpoints.";

}

if ($row['experience']<2000 and $row['level']==5)

{
echo "I'm sorry, you need more experience to level up. But I'm sure you will be ready in no time. Check back with me when your experience reaches 2000.";

}


if ($row['experience']>1999 and $row['level']==5)

{

$query=sprintf("update stats set level=6 where username='%s';", mysql_real_escape_string($username));
mysql_query($query);


$query=sprintf("update stats set strength=strength+1 where username='%s';", mysql_real_escape_string($username));
mysql_query($query);

$query=sprintf("update stats set agility=agility+1 where username='%s';", mysql_real_escape_string($username));
mysql_query($query);

$query=sprintf("update stats set speed=speed+1 where username='%s';", mysql_real_escape_string($username));
mysql_query($query);

$query=sprintf("update stats set accuracy=accuracy+1 where username='%s';", mysql_real_escape_string($username));
mysql_query($query);

$query=sprintf("update stats set wisdom=wisdom+1 where username='%s';", mysql_real_escape_string($username));
mysql_query($query);

$query=sprintf("update stats set luck=luck+1 where username='%s';", mysql_real_escape_string($username));
mysql_query($query);


$query=sprintf("update stats set skillpoints=skillpoints+3 where username='%s';", mysql_real_escape_string($username));
mysql_query($query);

$query=sprintf("update stats set maxlife=maxlife+3 where username='%s';", mysql_real_escape_string($username));
mysql_query($query);

$query=sprintf("update stats set life=life+3 where username='%s';", mysql_real_escape_string($username));
mysql_query($query);

$query=sprintf("update stats set maxmana=maxmana+3 where username='%s';", mysql_real_escape_string($username));
mysql_query($query);

$query=sprintf("update stats set mana=mana+3 where username='%s';", mysql_real_escape_string($username));
mysql_query($query);

echo "Yes, my child, I think you are ready to learn more. You are now level 6. Congratulations!";

}

if ($row['experience']<4000 and $row['level']==6)

{
echo "I'm sorry, you need more experience to level up. But I'm sure you will be ready in no time. Check back with me when your experience reaches 4000.";

}


if ($row['experience']>3999 and $row['level']==6)

{

$query=sprintf("update stats set level=7 where username='%s';", mysql_real_escape_string($username));
mysql_query($query);

$query=sprintf("update stats set strength=strength+1 where username='%s';", mysql_real_escape_string($username));
mysql_query($query);

$query=sprintf("update stats set agility=agility+1 where username='%s';", mysql_real_escape_string($username));
mysql_query($query);

$query=sprintf("update stats set speed=speed+1 where username='%s';", mysql_real_escape_string($username));
mysql_query($query);

$query=sprintf("update stats set accuracy=accuracy+1 where username='%s';", mysql_real_escape_string($username));
mysql_query($query);

$query=sprintf("update stats set wisdom=wisdom+1 where username='%s';", mysql_real_escape_string($username));
mysql_query($query);

$query=sprintf("update stats set luck=luck+1 where username='%s';", mysql_real_escape_string($username));
mysql_query($query);


$query=sprintf("update stats set skillpoints=skillpoints+3 where username='%s';", mysql_real_escape_string($username));
mysql_query($query);

$query=sprintf("update stats set maxlife=maxlife+3 where username='%s';", mysql_real_escape_string($username));
mysql_query($query);

$query=sprintf("update stats set life=life+3 where username='%s';", mysql_real_escape_string($username));
mysql_query($query);

$query=sprintf("update stats set maxmana=maxmana+3 where username='%s';", mysql_real_escape_string($username));
mysql_query($query);

$query=sprintf("update stats set mana=mana+3 where username='%s';", mysql_real_escape_string($username));
mysql_query($query);

echo "Yes, my child, I think you are ready to learn more. You are now level 7. Congratulations!";

}

if ($row['experience']<8000 and $row['level']==7)

{
echo "I'm sorry, you need more experience to level up. But I'm sure you will be ready in no time. Check back with me when your experience reaches 8000.";

}


if ($row['experience']>7999 and $row['level']==7)

{

$query=sprintf("update stats set level=8 where username='%s';", mysql_real_escape_string($username));
mysql_query($query);


$query=sprintf("update stats set strength=strength+1 where username='%s';", mysql_real_escape_string($username));
mysql_query($query);

$query=sprintf("update stats set agility=agility+1 where username='%s';", mysql_real_escape_string($username));
mysql_query($query);

$query=sprintf("update stats set speed=speed+1 where username='%s';", mysql_real_escape_string($username));
mysql_query($query);

$query=sprintf("update stats set accuracy=accuracy+1 where username='%s';", mysql_real_escape_string($username));
mysql_query($query);

$query=sprintf("update stats set wisdom=wisdom+1 where username='%s';", mysql_real_escape_string($username));
mysql_query($query);

$query=sprintf("update stats set luck=luck+1 where username='%s';", mysql_real_escape_string($username));
mysql_query($query);


$query=sprintf("update stats set skillpoints=skillpoints+3 where username='%s';", mysql_real_escape_string($username));
mysql_query($query);

$query=sprintf("update stats set maxlife=maxlife+3 where username='%s';", mysql_real_escape_string($username));
mysql_query($query);

$query=sprintf("update stats set life=life+3 where username='%s';", mysql_real_escape_string($username));
mysql_query($query);

$query=sprintf("update stats set maxmana=maxmana+3 where username='%s';", mysql_real_escape_string($username));
mysql_query($query);

$query=sprintf("update stats set mana=mana+3 where username='%s';", mysql_real_escape_string($username));
mysql_query($query);

echo "Yes, my child, I think you are ready to learn more. You are now level 8. Congratulations!";

}

if ($row['experience']<15000 and $row['level']==8)

{
echo "I'm sorry, you need more experience to level up. But I'm sure you will be ready in no time. Check back with me when your experience reaches 15000.";

}


if ($row['experience']>14999 and $row['level']==8)

{

$query=sprintf("update stats set level=9 where username='%s';", mysql_real_escape_string($username));
mysql_query($query);

$query=sprintf("update stats set strength=strength+1 where username='%s';", mysql_real_escape_string($username));
mysql_query($query);

$query=sprintf("update stats set agility=agility+1 where username='%s';", mysql_real_escape_string($username));
mysql_query($query);

$query=sprintf("update stats set speed=speed+1 where username='%s';", mysql_real_escape_string($username));
mysql_query($query);

$query=sprintf("update stats set accuracy=accuracy+1 where username='%s';", mysql_real_escape_string($username));
mysql_query($query);

$query=sprintf("update stats set wisdom=wisdom+1 where username='%s';", mysql_real_escape_string($username));
mysql_query($query);

$query=sprintf("update stats set luck=luck+1 where username='%s';", mysql_real_escape_string($username));
mysql_query($query);


$query=sprintf("update stats set skillpoints=skillpoints+3 where username='%s';", mysql_real_escape_string($username));
mysql_query($query);

$query=sprintf("update stats set maxlife=maxlife+3 where username='%s';", mysql_real_escape_string($username));
mysql_query($query);

$query=sprintf("update stats set life=life+3 where username='%s';", mysql_real_escape_string($username));
mysql_query($query);

$query=sprintf("update stats set maxmana=maxmana+3 where username='%s';", mysql_real_escape_string($username));
mysql_query($query);

$query=sprintf("update stats set mana=mana+3 where username='%s';", mysql_real_escape_string($username));
mysql_query($query);

echo "Yes, my child, I think you are ready to learn more. You are now level 9. Congratulations!";

}

if ($row['experience']<20000 and $row['level']==9)

{
echo "I'm sorry, you need more experience to level up. But I'm sure you will be ready in no time. Check back with me when your experience reaches 20000.";

}


if ($row['experience']>19999 and $row['level']==9)

{

$query=sprintf("update stats set level=10 where username='%s';", mysql_real_escape_string($username));
mysql_query($query);

$query=sprintf("update stats set strength=strength+1 where username='%s';", mysql_real_escape_string($username));
mysql_query($query);

$query=sprintf("update stats set agility=agility+1 where username='%s';", mysql_real_escape_string($username));
mysql_query($query);

$query=sprintf("update stats set speed=speed+1 where username='%s';", mysql_real_escape_string($username));
mysql_query($query);

$query=sprintf("update stats set accuracy=accuracy+1 where username='%s';", mysql_real_escape_string($username));
mysql_query($query);

$query=sprintf("update stats set wisdom=wisdom+1 where username='%s';", mysql_real_escape_string($username));
mysql_query($query);

$query=sprintf("update stats set luck=luck+1 where username='%s';", mysql_real_escape_string($username));
mysql_query($query);


$query=sprintf("update stats set skillpoints=skillpoints+3 where username='%s';", mysql_real_escape_string($username));
mysql_query($query);

$query=sprintf("update stats set maxlife=maxlife+3 where username='%s';", mysql_real_escape_string($username));
mysql_query($query);

$query=sprintf("update stats set life=life+3 where username='%s';", mysql_real_escape_string($username));
mysql_query($query);

$query=sprintf("update stats set maxmana=maxmana+3 where username='%s';", mysql_real_escape_string($username));
mysql_query($query);

$query=sprintf("update stats set mana=mana+3 where username='%s';", mysql_real_escape_string($username));
mysql_query($query);

echo "Yes, my child, I think you are ready to learn more. You are now level 10. Congratulations!";

}

if ($row['level']==10)

{
echo "I'm sorry, you need to seek out Solias. I can teach you no further.";
}


}
?>