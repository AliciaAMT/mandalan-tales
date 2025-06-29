<?php

$query=sprintf("select experience, level from stats where username='%s';", mysql_real_escape_string($username));
$result=mysql_query($query);
while($row = mysql_fetch_array($result))
  {

if ($row['experience']<100 and $row['level']==1)

{
echo "I'm sorry, you need more experience to level up. But I'm sure you will be ready in no time. Check back with me when your experience reaches 100.";

}


if ($row['experience']>100 and $row['level']==1)

{

$query=sprintf("update stats set level=2 where username='%s';", mysql_real_escape_string($username));
mysql_query($query);

echo "Yes, my child, I think you are ready to learn more. You are now level 2. Congratulations!";

}



if ($row['experience']<100 and $row['level']==1)

{
echo "I'm sorry, you need more experience to level up. But I'm sure you will be ready in no time. Check back with me when your experience reaches 100.";

}


if ($row['experience']>100 and $row['level']==1)

{

$query=sprintf("update stats set level=2 where username='%s';", mysql_real_escape_string($username));
mysql_query($query);

echo "Yes, my child, I think you are ready to learn more. You are now level 2. Congratulations!";

}


if ($row['experience']<250 and $row['level']==2)

{
echo "I'm sorry, you need more experience to level up. But I'm sure you will be ready in no time. Check back with me when your experience reaches 250.";

}


if ($row['experience']>250 and $row['level']==2)

{

$query=sprintf("update stats set level=3 where username='%s';", mysql_real_escape_string($username));
mysql_query($query);

echo "Yes, my child, I think you are ready to learn more. You are now level 3. Congratulations!";

}

if ($row['experience']<500 and $row['level']==3)

{
echo "I'm sorry, you need more experience to level up. But I'm sure you will be ready in no time. Check back with me when your experience reaches 500.";

}


if ($row['experience']>500 and $row['level']==3)

{

$query=sprintf("update stats set level=4 where username='%s';", mysql_real_escape_string($username));
mysql_query($query);

echo "Yes, my child, I think you are ready to learn more. You are now level 4. Congratulations!";

}

if ($row['experience']<1000 and $row['level']==4)

{
echo "I'm sorry, you need more experience to level up. But I'm sure you will be ready in no time. Check back with me when your experience reaches 1000.";

}


if ($row['experience']>1000 and $row['level']==4)

{

$query=sprintf("update stats set level=5 where username='%s';", mysql_real_escape_string($username));
mysql_query($query);

echo "Yes, my child, I think you are ready to learn more. You are now level 5. Congratulations!";

}

if ($row['experience']<1500 and $row['level']==5)

{
echo "I'm sorry, you need more experience to level up. But I'm sure you will be ready in no time. Check back with me when your experience reaches 1500.";

}


if ($row['experience']>1500 and $row['level']==5)

{

$query=sprintf("update stats set level=6 where username='%s';", mysql_real_escape_string($username));
mysql_query($query);

echo "Yes, my child, I think you are ready to learn more. You are now level 6. Congratulations!";

}

if ($row['experience']<2000 and $row['level']==6)

{
echo "I'm sorry, you need more experience to level up. But I'm sure you will be ready in no time. Check back with me when your experience reaches 2000.";

}


if ($row['experience']>2000 and $row['level']==6)

{

$query=sprintf("update stats set level=7 where username='%s';", mysql_real_escape_string($username));
mysql_query($query);

echo "Yes, my child, I think you are ready to learn more. You are now level 7. Congratulations!";

}

if ($row['experience']<3000 and $row['level']==7)

{
echo "I'm sorry, you need more experience to level up. But I'm sure you will be ready in no time. Check back with me when your experience reaches 3000.";

}


if ($row['experience']>3000 and $row['level']==7)

{

$query=sprintf("update stats set level=8 where username='%s';", mysql_real_escape_string($username));
mysql_query($query);

echo "Yes, my child, I think you are ready to learn more. You are now level 8. Congratulations!";

}

if ($row['experience']<4000 and $row['level']==8)

{
echo "I'm sorry, you need more experience to level up. But I'm sure you will be ready in no time. Check back with me when your experience reaches 4000.";

}


if ($row['experience']>4000 and $row['level']==8)

{

$query=sprintf("update stats set level=9 where username='%s';", mysql_real_escape_string($username));
mysql_query($query);

echo "Yes, my child, I think you are ready to learn more. You are now level 9. Congratulations!";

}

if ($row['experience']<5000 and $row['level']==9)

{
echo "I'm sorry, you need more experience to level up. But I'm sure you will be ready in no time. Check back with me when your experience reaches 5000.";

}


if ($row['experience']>5000 and $row['level']==9)

{

$query=sprintf("update stats set level=10 where username='%s';", mysql_real_escape_string($username));
mysql_query($query);

echo "Yes, my child, I think you are ready to learn more. You are now level 10. Congratulations!";

}

if ($row['level']==10)

{
echo "I'm sorry, you need to seek out Solias. I can teach you no further.";
}


}
?>