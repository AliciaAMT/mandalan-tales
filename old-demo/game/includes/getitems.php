<?php
$stmt = $db->prepare("SELECT itemname, keep FROM inventory WHERE charname=:charname;");
				$stmt->execute(array(':charname' => $charname));
while($row = $stmt->fetch())
{

if ($row['itemname']=="Iron Skillet")
{
$skillet=$row['keep'];
}

if ($row['itemname']=="Raw Meat")
{
$rawmeat=$row['keep'];
}

if ($row['itemname']=="Fried Meat")
{
$friedmeat=$row['keep'];
}

if ($row['itemname']=="Oil")
{
$Oil=$row['keep'];
}

if ($row['itemname']=="Bread")
{
$Bread=$row['keep'];
}

if ($row['itemname']=="Cinnamon")
{
$Cinnamon=$row['keep'];
}

if ($row['itemname']=="Salt")
{
$Salt=$row['keep'];
}

if ($row['itemname']=="Firewood")
{
$firewood=$row['keep'];
}

if ($row['itemname']=="Melon")
{
$melon=$row['keep'];
}

if ($row['itemname']=="Lettuce")
{
$lettuce=$row['keep'];
}

if ($row['itemname']=="Apple")
{
$apple=$row['keep'];
}

if ($row['itemname']=="Egg")
{
$egg=$row['keep'];
}

if ($row['itemname']=="Dry Rice")
{
$rice=$row['keep'];
}

if ($row['itemname']=="Vegetable")
{
$vegetables=$row['keep'];
}

if ($row['itemname']=="Bottle")
{
$bottle=$row['keep'];
}

if ($row['itemname']=="Wine")
{
$wine=$row['keep'];
}

if ($row['itemname']=="Spider Silk")
{
$spidersilk=$row['keep'];
}

if ($row['itemname']=="Life Potion 1")
{
$lifepotion1=$row['keep'];
}

if ($row['itemname']=="Dreaded Disease 1")
{
$ddisease1=$row['keep'];
}
if ($row['itemname']=="Milk")
{
$milk=$row['keep'];
}

if ($row['itemname']=="Cheese")
{
$cheese=$row['keep'];
}

if ($row['itemname']=="Oats")
{
$oats=$row['keep'];
}

if ($row['itemname']=="Aloe")
{
$aloe=$row['keep'];
}

if ($row['itemname']=="Ceasar Salad")
{
$ceasarsalad=$row['keep'];
}

if ($row['itemname']=="Sugar")
{
$sugar=$row['keep'];
}

if ($row['itemname']=="Bat Wings")
{
$batwings=$row['keep'];
}
if ($row['itemname']=="Vinegar")
{
$vinegar=$row['keep'];
}

if ($row['itemname']=="Wine")
{
$wine=$row['keep'];
}

if ($row['itemname']=="Fried Eggs")
{
$friedeggs=$row['keep'];
}

}

?>