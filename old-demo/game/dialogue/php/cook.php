<?php

$skillet=0;
$rawmeat=0;

include ('../php/getfire.php');
include ('php/getingredients.php');

$food=strip_tags($_GET["food"]);

if ($food=="friedmeat")
{

if ($fire=="n")
{
die ("<table class=\"page\"><tr><td class=\"page\">You do not have a fire required to cook for this recipe.</td></tr>
<tr><td class=\"page\">
<table class=\"page\"><tr><td class=\"page\"><form name=\"keep\" action=\"cookbook.php?".time()."\" method=\"get\"><input type=\"submit\" value=\"Back\" class=\"small\"></form></td></tr>
</td></tr></table></td></tr></table></body></html>");
}

if ($skillet>0 and $rawmeat>0)
{

$query=sprintf("update inventory set keep=keep-1 where username='%s' and itemname='Raw Meat';", mysql_real_escape_string($username));
mysql_query ($query);

include ('php/addfriedmeat.php');

echo "<table class=\"page\"><tr><td class=\"page\"><h2>Fried Meat</h2><br /><img src=\"../images/friedmeat.png\" /><br />You successfully cook Fried Meat!</td></tr>
<tr><td class=\"page\">
<table class=\"page\"><tr><td class=\"page\"><form name=\"keep\" action=\"cookbook.php?".time()."\" method=\"get\"><input type=\"submit\" value=\"Back\" class=\"small\"></form></td></tr>
</td></tr></table>";
}
else
{
echo "<table class=\"page\"><tr><td class=\"page\">You do not have all of the ingredients to cook this dish.</td></tr>
<tr><td class=\"page\">
<table class=\"page\"><tr><td class=\"page\"><form name=\"keep\" action=\"cookbook.php?".time()."\" method=\"get\"><input type=\"submit\" value=\"Back\" class=\"small\"></form></td></tr>
</td></tr></table>";
}
}

if ($food=="meatsandwich")
{


if ($friedmeat>0 and $bread>1)
{

$query=sprintf("update inventory set keep=keep-1 where username='%s' and itemname='Fried Meat';", mysql_real_escape_string($username));
mysql_query ($query);

include ('php/addmeatsand.php');

echo "<table class=\"page\"><tr><td class=\"page\"><h2>Fried Meat Sandwich</h2><br /><img src=\"../images/meatsandwich.png\" /><br />You successfully cook a Fried Meat Sandwich!</td></tr>
<tr><td class=\"page\">
<table class=\"page\"><tr><td class=\"page\"><form name=\"keep\" action=\"cookbook.php?".time()."\" method=\"get\"><input type=\"submit\" value=\"Back\" class=\"small\"></form></td></tr>
</td></tr></table>";
}
else
{
echo "<table class=\"page\"><tr><td class=\"page\">You do not have all of the ingredients to cook this dish.</td></tr>
<tr><td class=\"page\">
<table class=\"page\"><tr><td class=\"page\"><form name=\"keep\" action=\"cookbook.php?".time()."\" method=\"get\"><input type=\"submit\" value=\"Back\" class=\"small\"></form></td></tr>
</td></tr></table>";
}
}
if ($food=="applesauce")
{


if ($cinnamon>0 and $sugar>0 and $apples>2)
{

$query=sprintf("update inventory set keep=keep-1 where username='%s' and itemname='Cinnamon';", mysql_real_escape_string($username));
mysql_query ($query);

$query=sprintf("update inventory set keep=keep-1 where username='%s' and itemname='Sugar';", mysql_real_escape_string($username));
mysql_query ($query);

$query=sprintf("update inventory set keep=keep-3 where username='%s' and itemname='Apple';", mysql_real_escape_string($username));
mysql_query ($query);

include ('php/addapplesauce.php');

echo "<table class=\"page\"><tr><td class=\"page\"><h2>Applesauce</h2><br /><img src=\"../images/applesauce.png\" /><br />You successfully cook Applesauce!</td></tr>
<tr><td class=\"page\">
<table class=\"page\"><tr><td class=\"page\"><form name=\"keep\" action=\"cookbook.php?".time()."\" method=\"get\"><input type=\"submit\" value=\"Back\" class=\"small\"></form></td></tr>
</td></tr></table>";
}
else
{
echo "<table class=\"page\"><tr><td class=\"page\">You do not have all of the ingredients to cook this dish.</td></tr>
<tr><td class=\"page\">
<table class=\"page\"><tr><td class=\"page\"><form name=\"keep\" action=\"cookbook.php?".time()."\" method=\"get\"><input type=\"submit\" value=\"Back\" class=\"small\"></form></td></tr>
</td></tr></table>";
}

}

?>