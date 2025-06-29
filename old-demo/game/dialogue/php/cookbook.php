<?php

include ('php/getrecipes.php');
$type=strip_tags($_POST["type"]);

echo "<table class=\"page\">";

if (!$type)

{

$query=sprintf("select * from inventory where username='%s' and keep>0 and itemtype='Food' order by itemtype desc, weapontype, itemlevel desc, itemrarity desc;",mysql_real_escape_string($username));

$result=mysql_query($query);

while($row = mysql_fetch_array($result))

{

echo "<tr><td class=\"border\">

<img src=\"../images/".$row['itemimage'].".png\" /><br />".$row['itemname']."<br />Level ".$row['itemlevel']."<br />".$row['itemrarity'];



if ($row['keep']>1)

{

echo "<br />Amount: ".$row['keep'];

}



echo "</td><td class=\"border\">



<table class=\"page\"><tr><td class=\"left\">Description:</td><td class=\"left\">".$row['itemdescription'];

echo "</td></tr><tr><td class=\"left\">Item Type:</td><td class=\"left\">".$row['itemtype']."</td></tr>";

if ($row['enhancement1']!="None")
{
echo "<tr><td class=\"left\">Effect:</td><td class=\"left\">".$row['enhancement1']."</td></tr>";
}

if ($row['enhancement2']!="None")
{
echo "<tr><td class=\"left\">Effect:</td><td class=\"left\">".$row['enhancement2']."</td></tr>";
}

if ($row['itemvalue']>0)

{

echo "<tr><td class=\"left\">Value:</td><td class=\"left\">".$row['itemvalue']." Gold</td></tr>";

}

if ($row['maxwater']>0)

{

echo "<tr><td class=\"left\">Life: +10</td><td class=\"left\">Mana: +10</td></tr>";

echo "<tr><td class=\"left\">Water Units:</td><td class=\"left\">".$row['waterunits']."/".$row['maxwater']."</td></tr>";

}

if ($row['waterunits']>0)

{

echo "<tr><td class=\"center\" colspan=\"2\">
<table class=\"page\"><tr><td class=\"page\"><form name=\"drink\" action=\"drink.php?".time();

  echo "\" method=\"get\"><input class=\"invisible\" type=\"radio\" name=\"drink\" checked=\"checked\" value=\"".$row['itemnumber'];

  echo "\"><br /><input type=\"submit\" value=\"Drink Water\" class=\"small\"></form></td></tr></table>
</td></tr>";

}

if ($row['consumable']==1)
{
echo "<tr><td class=\"page\" colspan=\"2\"><table class=\"page\"><tr><td class=\"page\"><form name=\"cook\" action=\"consume.php?".time()."\" method=\"get\"><input class=\"invisible\" type=\"radio\" name=\"food\" checked=\"checked\" value=\"".$row['itemname']."\"><br /><input type=\"submit\" value=\"Consume\" class=\"small\"></form></td></tr></table></td></tr>";
}

echo "</table>";



echo "</td></tr>";

}

echo "</table>";

}

if ($type=="Ingredients")

{

$query=sprintf("select * from inventory where username='%s' and keep>0 and itemtype='Food' order by itemtype desc, weapontype, itemlevel desc, itemrarity desc;",mysql_real_escape_string($username));

$result=mysql_query($query);

while($row = mysql_fetch_array($result))

{

echo "<tr><td class=\"border\">

<img src=\"../images/".$row['itemimage'].".png\" /><br />".$row['itemname']."<br />Level ".$row['itemlevel']."<br />".$row['itemrarity'];



if ($row['keep']>1)

{

echo "<br />Amount: ".$row['keep'];

}



echo "</td><td class=\"border\">



<table class=\"page\"><tr><td class=\"left\">Description:</td><td class=\"left\">".$row['itemdescription'];

echo "</td></tr><tr><td class=\"left\">Item Type:</td><td class=\"left\">".$row['itemtype']."</td></tr>";

if ($row['enhancement1']!="None")
{
echo "<tr><td class=\"left\">Effect:</td><td class=\"left\">".$row['enhancement1']."</td></tr>";
}

if ($row['enhancement2']!="None")
{
echo "<tr><td class=\"left\">Effect:</td><td class=\"left\">".$row['enhancement2']."</td></tr>";
}

if ($row['itemvalue']>0)

{

echo "<tr><td class=\"left\">Value:</td><td class=\"left\">".$row['itemvalue']." Gold</td></tr>";

}

if ($row['maxwater']>0)

{

echo "<tr><td class=\"left\">Life: +10</td><td class=\"left\">Mana: +10</td></tr>";

echo "<tr><td class=\"left\">Water Units:</td><td class=\"left\">".$row['waterunits']."/".$row['maxwater']."</td></tr>";

}

if ($row['waterunits']>0)

{

echo "<tr><td class=\"center\" colspan=\"2\">
<table class=\"page\"><tr><td class=\"page\"><form name=\"drink\" action=\"drink.php?".time();

  echo "\" method=\"get\"><input class=\"invisible\" type=\"radio\" name=\"drink\" checked=\"checked\" value=\"".$row['itemnumber'];

  echo "\"><br /><input type=\"submit\" value=\"Drink Water\" class=\"small\"></form></td></tr></table>
</td></tr>";

}

if ($row['consumable']==1)
{
echo "<tr><td class=\"page\" colspan=\"2\"><table class=\"page\"><tr><td class=\"page\"><form name=\"cook\" action=\"consume.php?".time()."\" method=\"get\"><input class=\"invisible\" type=\"radio\" name=\"food\" checked=\"checked\" value=\"".$row['itemname']."\"><br /><input type=\"submit\" value=\"Consume\" class=\"small\"></form></td></tr></table></td></tr>";
}

echo "</table>";



echo "</td></tr>";

}

echo "</table>";

}


if ($type=="Recipes")

{


echo "<tr><td class=\"border\">
<table class=\"page\"><tr><td class=\"center\" colspan=\"2\"><h2>Fried Meat</h2><br /><img src=\"../images/friedmeat.png\" /></td></tr><tr><td class=\"left\" colspan=\"2\">This classic dish is one of the simplest recipes you know.</td></tr><tr><td class=\"center\">

<table class=\"page\"><tr><td class=\"page\">
<h3>Ingredients</h3></td></tr><tr><td class=\"left\">Fire<br />Skillet<br />Raw Meat<br /></td></tr></table></td><td class=\"center\">
<table class=\"page\"><tr><td class=\"page\">
<h3>Effects</h3></td></tr><tr><td class=\"center\">
<table class=\"page\"><tr><td class=\"left\">Life:</td><td class=\"left\"> +15</td></tr>
<tr><td class=\"left\">Mana:</td><td class=\"left\"> +5</td></tr></table></td></tr></td></tr></table>

<tr><td class=\"page\" colspan=\"2\"><table class=\"page\"><tr><td class=\"page\"><form name=\"cook\" action=\"cook.php?".time()."\" method=\"get\"><input class=\"invisible\" type=\"radio\" name=\"food\" checked=\"checked\" value=\"friedmeat\"><br /><input type=\"submit\" value=\"Cook\" class=\"small\"></form></td></tr></table></td></tr></table>
</td></tr>";

if ($meatsandwich>0)
{
echo "<tr><td class=\"border\">
<table class=\"page\"><tr><td class=\"center\" colspan=\"2\"><h2>Fried Meat Sandwich</h2><br /><img src=\"../images/meatsandwich.png\" /></td></tr><tr><td class=\"left\" colspan=\"2\">This classic dish is one of the simplest recipes you know, but it is more nutritous than meat or bread alone.</td></tr><tr><td class=\"center\">

<table class=\"page\"><tr><td class=\"page\">
<h3>Ingredients</h3></td></tr><tr><td class=\"left\">Fried Meat<br />Bread x2</td></tr></table></td><td class=\"center\">
<table class=\"page\"><tr><td class=\"page\">
<h3>Effects</h3></td></tr><tr><td class=\"center\">
<table class=\"page\"><tr><td class=\"left\">Life:</td><td class=\"left\"> +30</td></tr>
<tr><td class=\"left\">Mana:</td><td class=\"left\"> +20</td></tr></table></td></tr></td></tr></table>

<tr><td class=\"page\" colspan=\"2\"><table class=\"page\"><tr><td class=\"page\"><form name=\"cook\" action=\"cook.php?".time()."\" method=\"get\"><input class=\"invisible\" type=\"radio\" name=\"food\" checked=\"checked\" value=\"meatsandwich\"><br /><input type=\"submit\" value=\"Cook\" class=\"small\"></form></td></tr></table></td></tr></table>
</td></tr>";

}

if ($applesauce>0)
{
echo "<tr><td class=\"border\">
<table class=\"page\"><tr><td class=\"center\" colspan=\"2\"><h2>Applesauce</h2><br /><img src=\"../images/applesauce.png\" /></td></tr><tr><td class=\"left\" colspan=\"2\">This classic dish is one of the simplest recipes you know, but it is more nutritous than plain apples.</td></tr><tr><td class=\"center\">

<table class=\"page\"><tr><td class=\"page\">
<h3>Ingredients</h3></td></tr><tr><td class=\"left\">Apples x3<br />Cinnamon<br />Sugar</td></tr></table></td><td class=\"center\">
<table class=\"page\"><tr><td class=\"page\">
<h3>Effects</h3></td></tr><tr><td class=\"center\">
<table class=\"page\"><tr><td class=\"left\">Life:</td><td class=\"left\"> +15</td></tr>
<tr><td class=\"left\">Mana:</td><td class=\"left\"> +15</td></tr></table></td></tr></td></tr></table>

<tr><td class=\"page\" colspan=\"2\"><table class=\"page\"><tr><td class=\"page\"><form name=\"cook\" action=\"cook.php?".time()."\" method=\"get\"><input class=\"invisible\" type=\"radio\" name=\"food\" checked=\"checked\" value=\"applesauce\"><br /><input type=\"submit\" value=\"Cook\" class=\"small\"></form></td></tr></table></td></tr></table>
</td></tr>";

}
echo "</table>";

}





?>