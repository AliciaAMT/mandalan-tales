<?php
$itemtype=mt_rand(1,3);
if ($itemtype==1) {
$itemtype="Weapon";
$weapontype=mt_rand(1,6);
if ($weapontype==1) {
$weapontype="Blade";
$rand=mt_rand(2,10);
  if ($rand==2) {
  $itemimage="rustedknife";
  $weaponbase=2;
  $duality=1;
  $itemrange=0;
  $itemspeed=10 n;
  $itemvalue=1*$itemlevel*5;
  $itemimage="rustedknife";
  $itemname="Rusted Knife";
  $itemdescription="This kitchen knife is quite rusty. It won't do much damage, but it is a weapon none the less.";
  $damage = $weaponbase * $itemlevel;
  }
  if ($rand==3) {
  $itemimage="dirk";
  $itemname="Dirk";
  $weaponbase=3;
  $duality=1;
  $itemrange=0;
  $itemspeed=15;
  $itemvalue=2*$itemlevel*5;
  $itemdescription="This Dirk looks dangerous!";
  $damage = $weaponbase * $itemlevel;
  }
  if ($rand==4) {
  $itemimage="dagger";
  $itemname="Dagger";
  $weaponbase=4;
  $duality=1;
  $itemrange=0;
  $itemspeed=20;
  $itemdescription="This Dagger looks dangerous!";
  $itemvalue=3*$itemlevel*5;
  $damage = $weaponbase * $itemlevel;
  }
  if ($rand==5) {
  $itemimage="shortsword";
  $itemname="Short Sword";
  $weaponbase=5;
  $duality=1;
  $itemrange=0;
  $itemspeed=5;
  $itemdescription="This short sword looks dangerous!";
  $itemvalue=4*$itemlevel*5;
  $damage = $weaponbase * $itemlevel;
  }
  if ($rand==6) {
  $itemimage="cutlass";
  $itemname="Cutlass";
  $weaponbase=6;
  $duality=1;
  $itemrange=0;
  $itemspeed=5;
  $itemdescription="This cutlass looks dangerous";
  $itemvalue=5*$itemlevel*5;
  $damage = $weaponbase * $itemlevel;
  }
  if ($rand==7) {
  $itemimage="sword";
  $itemname="Sword";
  $weaponbase=7;
  $duality=1;
  $itemrange=0;
  $itemspeed=5;
  $itemdescription="This sword looks dangerous!";
  $itemvalue=6*$itemlevel*5;
  $damage = $weaponbase * $itemlevel;
  }
  if ($rand==8) {
  $itemimage="rapier";
  $itemname="Rapier";
  $weaponbase=8;
  $duality=1;
  $itemrange=0;
  $itemspeed=10;
  $itemdescription="This rapier looks dangerous!";
  $itemvalue=7*$itemlevel*5;
  $damage = $weaponbase * $itemlevel;
  }
  if ($rand==9) {
  $itemimage="longsword";
  $itemname="Long Sword";
  $weaponbase=9;
  $duality=0;
  $itemrange=0;
  $itemspeed=0;
  $itemdescription="This long sword looks dangerous!";
  $itemvalue=8*$itemlevel*5;
  $damage = $weaponbase * $itemlevel;
  }
  if ($rand==10) {
  $itemimage="greatsword";
  $itemname="Great Sword";
  $weaponbase=10;
  $duality=0;
  $itemrange=0;
  $itemspeed=0;
  $itemdescription="This great sword looks dangerous!";
  $itemvalue=9*$itemlevel*5;
  $damage = $weaponbase * $itemlevel;
  }
}
if ($weapontype==2) {
$weapontype="Staff/Wand";
$weaponbase=mt_rand(2,10);
if ($weaponbase==2) {
  $itemimage="branch";
  $itemname="Branch";
  $weaponbase=2;
  $duality=1;
  $itemrange="Close";
  $itemspeed="Fast";
  $itemdescription="This branch ";
  $itemvalue=1*$itemlevel*5;
  }
  if ($weaponbase==3) {
  $itemimage="bamboocane";
  $itemname="Bamboo Cane";
  $weaponbase=3;
  $duality=1;
  $itemrange="Close";
  $itemspeed="Fast";
  $itemdescription="This bamboo cane ";
  $itemvalue=2*$itemlevel*5;
  }
  if ($weaponbase==4) {
  $itemimage="walkingstick";
  $itemname="Walking Stick";
  $weaponbase=4;
  $duality=1;
  $itemrange="Close";
  $itemspeed="Normal";
  $itemdescription="This walking stick ";
  $itemvalue=3*$itemlevel*5;
  }
  if ($weaponbase==5) {
  $itemimage="baton";
  $itemname="Baton";
  $weaponbase=5;
  $duality=1;
  $itemrange="Close";
  $itemspeed="Fast";
  $itemdescription="This baton ";
  $itemvalue=4*$itemlevel*5;
  }
  if ($weaponbase==6) {
  $itemimage="staff";
  $itemname="Staff";
  $weaponbase=6;
  $duality=0;
  $itemrange="Close";
  $itemspeed="Normal";
  $itemdescription="This staff ";
  $itemvalue=5*$itemlevel*5;
  }
  if ($weaponbase==7) {
  $itemimage="rod";
  $itemname="Rod";
  $weaponbase=7;
  $duality=1;
  $itemrange="Close";
  $itemspeed="Fast";
  $itemdescription="This rod ";
  $itemvalue=6*$itemlevel*5;
  }
  if ($weaponbase==8) {
  $itemimage="pole";
  $itemname="Pole";
  $weaponbase=8;
  $duality=0;
  $itemrange="Close";
  $itemspeed="Slow";
  $itemdescription="This pole ";
  $itemvalue=7*$itemlevel*5;
  }
  if ($weaponbase==9) {
  $itemimage="wand";
  $itemname="Wand";
  $weaponbase=9;
  $duality=1;
  $itemrange="Close";
  $itemspeed="Normal";
  $itemdescription="This wand ";
  $itemvalue=8*$itemlevel*5;
  }
  if ($weaponbase==10) {
  $itemimage="cepter";
  $itemname="Cepter";
  $weaponbase=10;
  $duality=1;
  $itemrange="Close";
  $itemspeed="Normal";
  $itemdescription="This cepter ";
  $itemvalue=9*$itemlevel*5;
  }
}
if ($weapontype==3) {
$weapontype="Missile";
$weaponbase=mt_rand(2,10);
  if ($weaponbase==2) {
  $itemimage="blowdart";
  $itemname="Blowdart";
  $weaponbase=2;
  $duality=0;
  $itemrange="Long";
  $itemspeed="Fast";
  $itemdescription="This blowdart ";
  $itemvalue=1*$itemlevel*5;
  }
  if ($weaponbase==3) {
  $itemimage="dart";
  $itemname="Dart";
  $weaponbase=3;
  $duality=1;
  $itemrange="Long";
  $itemspeed="Fast";
  $itemdescription="This dart ";
  $itemvalue=2*$itemlevel*5;
  }
  if ($weaponbase==4) {
  $itemimage="sling";
  $itemname="Sling";
  $weaponbase=4;
  $duality=0;
  $itemrange="Long";
  $itemspeed="Normal";
  $itemdescription="This sling ";
  $itemvalue=3*$itemlevel*5;
  }
  if ($weaponbase==5) {
  $itemimage="throwingknife";
  $itemname="Throwing Knife";
  $weaponbase=5;
  $duality=1;
  $itemrange="Long";
  $itemspeed="Normal";
  $itemdescription="This throwing knife ";
  $itemvalue=4*$itemlevel*5;
  }
  if ($weaponbase==6) {
  $itemimage="shuriken";
  $itemname="Shuriken";
  $weaponbase=6;
  $duality=1;
  $itemrange="Long";
  $itemspeed="Fast";
  $itemdescription="This shuriken ";
  $itemvalue=5*$itemlevel*5;
  }
  if ($weaponbase==7) {
  $itemimage="javelin";
  $itemname="Javelin";
  $weaponbase=7;
  $duality=0;
  $itemrange="Long";
  $itemspeed="Normal";
  $itemdescription="This javelin ";
  $itemvalue=6*$itemlevel*5;
  }
  if ($weaponbase==8) {
  $itemimage="bow";
  $itemname="Bow";
  $weaponbase=8;
  $duality=0;
  $itemrange="Long";
  $itemspeed="Normal";
  $itemdescription="This bow ";
  $itemvalue=7*$itemlevel*5;
  }
  if ($weaponbase==9) {
  $itemimage="crossbow";
  $itemname="Crossbow";
  $weaponbase=9;
  $duality=0;
  $itemrange="Long";
  $itemspeed="Slow";
  $itemdescription="This crossbow ";
  $itemvalue=8*$itemlevel*5;
  }
  if ($weaponbase==10) {
  $itemimage="siegebow";
  $itemname="Siegebow";
  $weaponbase=10;
  $duality=0;
  $itemrange="Long";
  $itemspeed="Slow";
  $itemdescription="This siegebow ";
  $itemvalue=9*$itemlevel*5;
  }
}
if ($weapontype==4) {
$weapontype="Blunt";
$weaponbase=mt_rand(2,10);
  if ($weaponbase==2) {
  $itemimage="club";
  $itemname="Club";
  $weaponbase=2;
  $duality=1;
  $itemrange="Close";
  $itemspeed="Fast";
  $itemdescription="This club ";
  $itemvalue=1*$itemlevel*5;
  }
  if ($weaponbase==3) {
  $itemimage="hammer";
  $itemname="Hammer";
  $weaponbase=3;
  $duality=1;
  $itemrange="Close";
  $itemspeed="Fast";
  $itemdescription="This hammer ";
  $itemvalue=2*$itemlevel*5;
  }
  if ($weaponbase==4) {
  $itemimage="shield";
  $itemname="Shield";
  $weaponbase=4;
  $duality=1;
  $itemrange="Close";
  $itemspeed="Normal";
  $itemdescription="This shield ";
  $itemvalue=3*$itemlevel*5;
  $defense=1*$itemlevel;
  $blocking=1*$itemlevel;
  }
  if ($weaponbase==5) {
  $itemimage="flangedmace";
  $itemname="Flanged Mace";
  $weaponbase=5;
  $duality=1;
  $itemrange="Close";
  $itemspeed="Fast";
  $itemdescription="This flanged mace ";
  $itemvalue=4*$itemlevel*5;
  }
  if ($weaponbase==6) {
  $itemimage="spikedmace";
  $itemname="Spiked Mace";
  $weaponbase=6;
  $duality=1;
  $itemrange="Close";
  $itemspeed="Fast";
  $itemdescription="This mace ";
  $itemvalue=5*$itemlevel*5;
  }
  if ($weaponbase==7) {
  $itemimage="flail";
  $itemname="Flail";
  $weaponbase=7;
  $duality=1;
  $itemrange="Close";
  $itemspeed="Fast";
  $itemdescription="This flail ";
  $itemvalue=6*$itemlevel*5;
  }
  if ($weaponbase==8) {
  $itemimage="dmorningstar";
  $itemname="Double Morningstar";
  $weaponbase=8;
  $duality=0;
  $itemrange="Close";
  $itemspeed="Normal";
  $itemdescription="This double morningstar ";
  $itemvalue=7*$itemlevel*5;
  }
  if ($weaponbase==9) {
  $itemimage="tmorningstar";
  $itemname="Triple Morningstar";
  $weaponbase=9;
  $duality=0;
  $itemrange="Close";
  $itemspeed="Slow";
  $itemdescription="This triple morningstar ";
  $itemvalue=8*$itemlevel*5;
  }
  if ($weaponbase==10) {
  $itemimage="sledgehammer";
  $itemname="Sledge Hammer";
  $weaponbase=10;
  $duality=0;
  $itemrange="Close";
  $itemspeed="Slow";
  $itemdescription="This sledge hammer ";
  $itemvalue=9*$itemlevel*5;
  }
}
if ($weapontype==5) {
$weapontype="Pole-Arm";
$weaponbase=mt_rand(2,10);
if ($weaponbase==2) {
  $itemimage="pitchfork";
  $itemname="Pitchfork";
  $weaponbase=2;
  $duality=0;
  $itemrange="Close";
  $itemspeed="Slow";
  $itemdescription="This pitchfork ";
  $itemvalue=1*$itemlevel*5;
  }
  if ($weaponbase==3) {
  $itemimage="hatchet";
  $itemname="Hatchet";
  $weaponbase=3;
  $duality=1;
  $itemrange="Close";
  $itemspeed="Fast";
  $itemdescription="This hatchet ";
  $itemvalue=2*$itemlevel*5;
  }
  if ($weaponbase==4) {
  $itemimage="ax";
  $itemname="Ax";
  $weaponbase=4;
  $duality=0;
  $itemrange="Close";
  $itemspeed="Normal";
  $itemdescription="This ax ";
  $itemvalue=3*$itemlevel*5;
  }
  if ($weaponbase==5) {
  $itemimage="spear";
  $itemname="Spear";
  $weaponbase=5;
  $duality=1;
  $itemrange="Close";
  $itemspeed="Normal";
  $itemdescription="This spear ";
  $itemvalue=4*$itemlevel*5;
  }
  if ($weaponbase==6) {
  $itemimage="lance";
  $itemname="Lance";
  $weaponbase=6;
  $duality=0;
  $itemrange="Medium";
  $itemspeed="Slow";
  $itemdescription="This lance ";
  $itemvalue=5*$itemlevel*5;
  }
  if ($weaponbase==7) {
  $itemimage="scythe";
  $itemname="Scythe";
  $weaponbase=7;
  $duality=0;
  $itemrange="Medium";
  $itemspeed="Slow";
  $itemdescription="This scythe ";
  $itemvalue=6*$itemlevel*5;
  }
  if ($weaponbase==8) {
  $itemimage="halbred";
  $itemname="Halbred";
  $weaponbase=8;
  $duality=0;
  $itemrange="Medium";
  $itemspeed="Normal";
  $itemdescription="This halbred ";
  $itemvalue=7*$itemlevel*5;
  }
  if ($weaponbase==9) {
  $itemimage="trident";
  $itemname="Trident";
  $weaponbase=9;
  $duality=0;
  $itemrange="Medium";
  $itemspeed="Normal";
  $itemdescription="This trident ";
  $itemvalue=8*$itemlevel*5;
  }
  if ($weaponbase==10) {
  $itemimage="poleaxe";
  $itemname="Pole-Axe";
  $weaponbase=10;
  $duality=0;
  $itemrange="Medium";
  $itemspeed="Slow";
  $itemdescription="This pole-axe ";
  $itemvalue=9*$itemlevel*5;
  }
}
if ($weapontype==6) {
$weapontype="Exotic";
$weaponbase=mt_rand(2,10);
 if ($weaponbase==2) {
  $itemimage="brassknuckles";
  $itemname="Brass Knuckles";
  $weaponbase=2;
  $duality=1;
  $itemrange="Close";
  $itemspeed="Fast";
  $itemdescription="This brass knuckles ";
  $itemvalue=1*$itemlevel;
  }
  if ($weaponbase==3) {
  $itemimage="whip";
  $itemname="Whip";
  $weaponbase=3;
  $duality=1;
  $itemrange="Medium";
  $itemspeed="Fast";
  $itemdescription="This whip ";
  $itemvalue=2*$itemlevel;
  }
  if ($weaponbase==4) {
  $itemimage="cattail";
  $itemname="Cat-tail";
  $weaponbase=4;
  $duality=1;
  $itemrange="Close";
  $itemspeed="Fast";
  $itemdescription="This cat-tail ";
  $itemvalue=3*$itemlevel; 
  }
  if ($weaponbase==5) {
  $itemimage="claw";
  $itemname="Claw";
  $weaponbase=5;
  $duality=1;
  $itemrange="Close";
  $itemspeed="Fast";
  $itemdescription="This claw ";
  $itemvalue=4*$itemlevel;
  }
  if ($weaponbase==6) {
  $itemimage="machete";
  $itemname="Machete";
  $weaponbase=6;
  $duality=1;
  $itemrange="Close";
  $itemspeed="Fast";
  $itemdescription="This machete ";
  $itemvalue=5*$itemlevel;
  }
  if ($weaponbase==7) {
  $itemimage="nunchukas";
  $itemname="Nunchukas";
  $weaponbase=7;
  $duality=1;
  $itemrange="Close";
  $itemspeed="Fast";
  $itemdescription="This nunchukas ";
  $itemvalue=6*$itemlevel;
  }
  if ($weaponbase==8) {
  $itemimage="spikedfist";
  $itemname="Spiked Fist";
  $weaponbase=8;
  $duality=1;
  $itemrange="Close";
  $itemspeed="Fast";
  $itemdescription="This spiked fist ";
  $itemvalue=7*$itemlevel;
  }
  if ($weaponbase==9) {
  $itemimage="katana";
  $itemname="Katana";
  $weaponbase=9;
  $duality=1;
  $itemrange="Close";
  $itemspeed="Fast";
  $itemdescription="This katana ";
  $itemvalue=8*$itemlevel;
  }
  if ($weaponbase==10) {
  $itemimage="boomstick";
  $itemname="Boom-Stick!";
  $weaponbase=10;
  $duality=1;
  $itemrange="Long";
  $itemspeed="Fast";
  $itemdescription="This BOOM-STICK ";
  $itemvalue=9*$itemlevel;
  }
$itemvalue=$itemvalue*5;
}
}
if ($itemtype==2) {
$itemtype="Armor";
$rand=mt_rand(1,6);
$material=mt_rand(1,6);
$itemvalue=$itemvalue*5;
if ($rand==1) {
$equiplocation="Head";
$armortype="Helm";
if ($material==1) {
$itemname="Cloth Hat";
$itemimage="clothhat";
$armorbase=2;
$itemdescription="This cloth hat ";
$itemvalue=1*$itemlevel;
}
if ($material==2) {
$itemname="Canvas Hat";
$itemimage="canvashat";
$armorbase=3;
$itemdescription="This canvas hat ";
$itemvalue=2*$itemlevel;
}

if ($material==3)
{
$itemname="Leather Helm";
$itemimage="leatherhelm";
$armorbase=4;
$itemdescription="This leather helm ";
$itemvalue=3*$itemlevel;
}

if ($material==4)
{
$itemname="Splint Helm";
$itemimage="splinthelm";
$armorbase=4;
$itemdescription="This splint helm ";
$itemvalue=3*$itemlevel;
}

if ($material==5)
{
$itemname="Chain Helm";
$itemimage="chainhelm";
$armorbase=5;
$itemdescription="This chain helm ";
$itemvalue=4*$itemlevel;
}

if ($material==6)
{
$itemname="Plate Helm";
$itemimage="platehelm";
$armorbase=6;
$itemdescription="This plate helm ";
$itemvalue=5*$itemlevel;
}
}

if ($rand==2)
{
$equiplocation="Chest";
$armortype="Chest/Shirt";

if ($material==1)
{
$itemname="Cloth Shirt";
$itemimage="clothshirt";
$armorbase=2;
$itemdescription="This cloth shirt ";
$itemvalue=1*$itemlevel*5;
$defense=$armorbase*$itemlevel;
}

if ($material==2)
{
$itemname="Canvas Shirt";
$itemimage="canvasshirt";
$armorbase=3;
$itemdescription="This canvas shirt ";
$itemvalue=2*$itemlevel*5;
$defense=$armorbase*$itemlevel;
}

if ($material==3)
{
$itemname="Leather Chest Armor";
$itemimage="leatherchest";
$armorbase=4;
$itemdescription="This leather armor ";
$itemvalue=3*$itemlevel*5;
$defense=$armorbase*$itemlevel;
}

if ($material==4)
{
$itemname="Splint Chest Armor";
$itemimage="splintchest";
$armorbase=4;
$itemdescription="This splint armor ";
$itemvalue=3*$itemlevel*5;
$defense=$armorbase*$itemlevel;
}

if ($material==5)
{
$itemname="Chain Mail Chest Armor";
$itemimage="chainarmor";
$armorbase=5;
$itemdescription="This chain armor ";
$itemvalue=4*$itemlevel*5;
$defense=$armorbase*$itemlevel;
}

if ($material==6)
{
$itemname="Plate Armor";
$itemimage="platearmor";
$armorbase=6;
$itemdescription="This plate armor ";
$itemvalue=5*$itemlevel*5;
$defense=$armorbase*$itemlevel;
}
}

if ($rand==3)
{
$equiplocation="Legs";
$armortype="Legs";

if ($material==1)
{
$itemname="Cloth Pants";
$itemimage="clothpants";
$armorbase=2;
$itemdescription="This pair of cloth pants ";
$itemvalue=1*$itemlevel*5;
$defense=$armorbase*$itemlevel;
}

if ($material==2)
{
$itemname="Canvas Pants";
$itemimage="canvaspants";
$armorbase=3;
$itemdescription="This canvas pair of pants ";
$itemvalue=2*$itemlevel*5;
$defense=$armorbase*$itemlevel;
}

if ($material==3)
{
$itemname="Leather Pants";
$itemimage="leatherpants";
$armorbase=4;
$itemdescription="This leather pair of pants ";
$itemvalue=3*$itemlevel*5;
$defense=$armorbase*$itemlevel;
}

if ($material==4)
{
$itemname="Splint Leg Armor";
$itemimage="splintlegs";
$armorbase=4;
$itemdescription="This splint leg armor ";
$itemvalue=3*$itemlevel*5;
$defense=$armorbase*$itemlevel;
}

if ($material==5)
{
$itemname="Chain Leg Armor";
$itemimage="chainlegs";
$armorbase=5;
$itemdescription="This chain leg armor ";
$itemvalue=4*$itemlevel*5;
$defense=$armorbase*$itemlevel;
}

if ($material==6)
{
$itemname="Plate Leg Armor";
$itemimage="platelegs";
$armorbase=6;
$itemdescription="This plate leg armor ";
$itemvalue=5*$itemlevel*5;
$defense=$armorbase*$itemlevel;
}
}

if ($rand==4)
{
$equiplocation="Hands";
$armortype="Gloves";

if ($material==1)
{
$itemname="Cloth Gloves";
$itemimage="clothgloves";
$armorbase=2;
$itemdescription="This pair of cloth gloves ";
$itemvalue=1*$itemlevel*5;
$defense=$armorbase*$itemlevel;
}

if ($material==2)
{
$itemname="Canvas Gloves";
$itemimage="canvasgloves";
$armorbase=3;
$itemdescription="This pair of canvas gloves ";
$itemvalue=2*$itemlevel*5;
$defense=$armorbase*$itemlevel;
}

if ($material==3)
{
$itemname="Leather Gloves";
$itemimage="leathergloves";
$armorbase=4;
$itemdescription="This pair of leather gloves ";
$itemvalue=3*$itemlevel*5;
$defense=$armorbase*$itemlevel;
}

if ($material==4)
{
$itemname="Splint Gloves";
$itemimage="splintgloves";
$armorbase=4;
$itemdescription="This pair of splint gloves ";
$itemvalue=3*$itemlevel*5;
$defense=$armorbase*$itemlevel;
}

if ($material==5)
{
$itemname="Chain Gloves";
$itemimage="chaingloves";
$armorbase=5;
$itemdescription="This pair of chain gloves ";
$itemvalue=4*$itemlevel*5;
$defense=$armorbase*$itemlevel;
}

if ($material==6)
{
$itemname="Plate Gloves";
$itemimage="plategloves";
$armorbase=6;
$itemdescription="This pair of plate gloves ";
$itemvalue=5*$itemlevel*5;
$defense=$armorbase*$itemlevel;
}
}

if ($rand==5)
{
$equiplocation="Shoulders";
$armortype="Cloak/Shoulder Pads";

if ($material==1)
{
$itemname="Cloth Cloak";
$itemimage="clothcloak";
$armorbase=2;
$itemdescription="This cloth cloak ";
$itemvalue=1*$itemlevel*5;
$defense=$armorbase*$itemlevel;
}

if ($material==2)
{
$itemname="Canvas Cloak";
$itemimage="canvascloak";
$armorbase=3;
$itemdescription="This canvas cloak ";
$itemvalue=2*$itemlevel*5;
$defense=$armorbase*$itemlevel;
}

if ($material==3)
{
$itemname="Leather Shoulders";
$itemimage="leathershoulders";
$armorbase=4;
$itemdescription="This pair of leather shoulders ";
$itemvalue=3*$itemlevel*5;
$defense=$armorbase*$itemlevel;
}

if ($material==4)
{
$itemname="Splint Shoulders";
$itemimage="splintshoulders";
$armorbase=4;
$itemdescription="This pair of splint shoulders ";
$itemvalue=3*$itemlevel*5;
$defense=$armorbase*$itemlevel;
}

if ($material==5)
{
$itemname="Chain Shoulders";
$itemimage="chainshoulders";
$armorbase=5;
$itemdescription="This pair of chain shoulders ";
$itemvalue=4*$itemlevel*5;
$defense=$armorbase*$itemlevel;
}

if ($material==6)
{
$itemname="Plate Shoulders";
$itemimage="plateshoulders";
$armorbase=6;
$itemdescription="This pair of plate shoulders ";
$itemvalue=5*$itemlevel*5;
$defense=$armorbase*$itemlevel;
}
}

if ($rand==6)
{
$equiplocation="Feet";
$armortype="Shoes";

if ($material==1)
{
$itemname="Cloth Shoes";
$itemimage="clothshoes";
$armorbase=2;
$itemdescription="This cloth pair of shoes ";
$itemvalue=1*$itemlevel*5;
$defense=$armorbase*$itemlevel;
}

if ($material==2)
{
$itemname="Canvas Shoes";
$itemimage="canvasshoes";
$armorbase=3;
$itemdescription="This canvas pair of shoes ";
$itemvalue=2*$itemlevel*5;
$defense=$armorbase*$itemlevel;
}

if ($material==3)
{
$itemname="Leather Boots";
$itemimage="leatherboots";
$armorbase=4;
$itemdescription="This pair of leather boots ";
$itemvalue=3*$itemlevel*5;
$defense=$armorbase*$itemlevel;
}

if ($material==4)
{
$itemname="Splint Boots";
$itemimage="splintboots";
$armorbase=4;
$itemdescription="This pair of splint boots ";
$itemvalue=3*$itemlevel*5;
$defense=$armorbase*$itemlevel;
}

if ($material==5)
{
$itemname="Chain Boots";
$itemimage="chainboots";
$armorbase=5;
$itemdescription="This pair of chain boots ";
$itemvalue=4*$itemlevel*5;
$defense=$armorbase*$itemlevel;
}

if ($material==6)
{
$itemname="Plate Boots";
$itemimage="plateboots";
$armorbase=6;
$itemdescription="This pair of plate boots ";
$itemvalue=5*$itemlevel*5;
$defense=$armorbase*$itemlevel;
}
}

}
if ($itemtype==3) {
$itemtype="Accessory";

$itemvalue=$itemvalue*5;

$accessorytype=mt_rand(1,5);

if ($accessorytype==1)
{
$acctype="Ring";
$material=mt_rand(1,6);
$equiplocation="Finger";

if ($material==1)
{
$itemname="Bone Ring";
$itemimage="bonering";
$armorbase=2;
$itemdescription="This bone ring ";
$itemvalue=1*$itemlevel;
}
if ($material==2)
{
$itemname="Copper Ring";
$itemimage="copperring";
$armorbase=3;
$itemdescription="This copper ring ";
$itemvalue=2*$itemlevel;
}

if ($material==3)
{
$itemname="Brass Ring";
$itemimage="brassring";
$armorbase=4;
$itemdescription="This brass ring ";
$itemvalue=3*$itemlevel;
}

if ($material==4)
{
$itemname="Silver Ring";
$itemimage="silverring";
$armorbase=5;
$itemdescription="This silver ring ";
$itemvalue=4*$itemlevel;
}

if ($material==5)
{
$itemname="Gold Ring";
$itemimage="goldring";
$armorbase=6;
$itemdescription="This gold ring ";
$itemvalue=5*$itemlevel;
}

if ($material==6)
{
$itemname="Platinum Ring";
$itemimage="platinumring";
$armorbase=7;
$itemdescription="This platinum ring ";
$itemvalue=6*$itemlevel;
}
}
if ($accessorytype==2)
{
$acctype="Amulet";
$material=mt_rand(1,6);
$equiplocation="Neck";

if ($material==1)
{
$itemname="Pearl Amulet";
$itemimage="pearlamy";
$armorbase=2;
$itemdescription="This pearl amulet ";
$itemvalue=1*$itemlevel;
}
if ($material==2)
{
$itemname="Onyx Amulet";
$itemimage="onyxamy";
$armorbase=3;
$itemdescription="This onyx amulet ";
$itemvalue=2*$itemlevel;
}

if ($material==3)
{
$itemname="Sapphire Amulet";
$itemimage="sapphireamy";
$armorbase=4;
$itemdescription="This sapphire amulet ";
$itemvalue=3*$itemlevel;
}

if ($material==4)
{
$itemname="Emerald Amulet";
$itemimage="emeraldamy";
$armorbase=5;
$itemdescription="This emerald amulet ";
$itemvalue=4*$itemlevel;
}

if ($material==5)
{
$itemname="Ruby Amulet";
$itemimage="rubyamy";
$armorbase=6;
$itemdescription="This ruby amulet ";
$itemvalue=5*$itemlevel;
}

if ($material==6)
{
$itemname="Diamond Amulet";
$itemimage="diamondamy";
$armorbase=7;
$itemdescription="This diamond amulet ";
$itemvalue=6*$itemlevel;
}
}

if ($accessorytype==3)
{
$acctype="Earrings";
$material=mt_rand(1,6);
$equiplocation="Ears";

if ($material==1)
{
$itemname="Pearl Earrings";
$itemimage="pearlear";
$armorbase=2;
$itemdescription="This pair of pearl earrings ";
$itemvalue=1*$itemlevel;
}
if ($material==2)
{
$itemname="Onyx Earrings";
$itemimage="onyxear";
$armorbase=3;
$itemdescription="This pair of onyx earrings ";
$itemvalue=2*$itemlevel;
}

if ($material==3)
{
$itemname="Sapphire Earrings";
$itemimage="sapphireear";
$armorbase=4;
$itemdescription="This pair of sapphire earrings ";
$itemvalue=3*$itemlevel;
}

if ($material==4)
{
$itemname="Emerald Earrings";
$itemimage="emeraldear";
$armorbase=5;
$itemdescription="This pair of emerald earrings ";
$itemvalue=4*$itemlevel;
}

if ($material==5)
{
$itemname="Ruby Earrings";
$itemimage="rubyear";
$armorbase=6;
$itemdescription="This pair of ruby earrings ";
$itemvalue=5*$itemlevel;
}

if ($material==6)
{
$itemname="Diamond Earrings";
$itemimage="diamondear";
$armorbase=7;
$itemdescription="This pair of diamond earrings ";
$itemvalue=6*$itemlevel;
}
}

if ($accessorytype==4)
{
$acctype="Bracelet/Bracers";
$material=mt_rand(1,6);
$equiplocation="Wrists";

if ($material==1)
{
$itemname="Tweed Braided Bracelet";
$itemimage="tweedbracelet";
$armorbase=2;
$itemdescription="This tweed bracelet ";
$itemvalue=1*$itemlevel;
}
if ($material==2)
{
$itemname="Sild Braided Bracelet";
$itemimage="silkbracelet";
$armorbase=3;
$itemdescription="This silk braided bracelet ";
$itemvalue=2*$itemlevel;
}

if ($material==3)
{
$itemname="Leather Bracers";
$itemimage="leatherbracers";
$armorbase=4;
$itemdescription="This pair of leather bracers ";
$itemvalue=3*$itemlevel;
}

if ($material==4)
{
$itemname="Splint Bracers";
$itemimage="splintbracers";
$armorbase=5;
$itemdescription="This pair of splint bracers ";
$itemvalue=4*$itemlevel;
}

if ($material==5)
{
$itemname="Chain Bracers";
$itemimage="chainbracers";
$armorbase=6;
$itemdescription="This pair of chain bracers ";
$itemvalue=5*$itemlevel;
}

if ($material==6)
{
$itemname="Plate Bracers";
$itemimage="platebracers";
$armorbase=7;
$itemdescription="This pair of plate bracers ";
$itemvalue=6*$itemlevel;
}
}

if ($accessorytype==5)
{
$acctype="Headband";
$material=mt_rand(1,6);
$equiplocation="Forehead";

if ($material==1)
{
$itemname="Tweed Headband";
$itemimage="tweedhead";
$armorbase=2;
$itemdescription="This tweed headband ";
$itemvalue=1*$itemlevel;
}
if ($material==2)
{
$itemname="Canvas Headband";
$itemimage="canvashead";
$armorbase=3;
$itemdescription="This canvas headband ";
$itemvalue=2*$itemlevel;
}

if ($material==3)
{
$itemname="Felt Headband";
$itemimage="felthead";
$armorbase=4;
$itemdescription="This felt headband ";
$itemvalue=3*$itemlevel;
}

if ($material==4)
{
$itemname="Silk Headband";
$itemimage="silkhead";
$armorbase=5;
$itemdescription="This silk headband ";
$itemvalue=4*$itemlevel;
}

if ($material==5)
{
$itemname="Velvet Headband";
$itemimage="velevethead";
$armorbase=6;
$itemdescription="This velvet headband ";
$itemvalue=5*$itemlevel;
}

if ($material==6)
{
$itemname="Leather Headband";
$itemimage="leatherhead";
$armorbase=7;
$itemdescription="This leather headband ";
$itemvalue=6*$itemlevel;
}
}
}
?>