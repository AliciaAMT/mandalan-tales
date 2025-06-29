<?php

include ('includes/getlevel.php');
include ('includes/zeroinv.php');
$itemlevel=1;
$keep=1;
$rand=mt_rand(1,2);

if ($rand==1)
{

$itemname="Money Purse";
$itemdescription="These purses are commonly used to hold money.";
$itemtype="Other";
$othertype="Container";
$itemimage="purse";
$rand=mt_rand(1,10);
$level=$level+$rand;
$itemlevel=$level;
$itemrarity="Common";
$keep=1;

}
 
if ($rand==2)
{
$itemname="Money Purse";
$itemdescription="These purses are commonly used to hold money.";
$itemtype="Other";
$othertype="Container";
$itemimage="purse";
$rand=mt_rand(1,10);
$level=$level+$rand;
$itemlevel=$level;
$itemrarity="Common";
$itemvalue=0;
$keep=1;
}
include ('includes/addinv.php');

?>