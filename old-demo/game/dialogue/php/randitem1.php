<?php

//************NOT FINISHED!!!********************************

include ('php/getmagicfind.php');
include ('php/getlevel.php');

$itemnumber=time();
$itemnumber=$itemnumber;
$itemname="none";
$itemdescription="none.";
$itemtype="none";
$itemimage="none";
$itemlevel=0;
$itemrarity="None";
$itemvalue=0;
$keep=1;
$trade=0;
$equiplocation="none";
$equip=0;
$equiplh=0;
$equiprh=0;
$waterunits=0;
$maxwater=0;
$locklevel=0;
$keylock=0;
$readable=0;
$consumable=0;
$equipable=1;
$combatuse=0;
$singleuse=0;
$weapontype="none";
$armortype="none";
$acctype="none";
$othertype="none";
$weaponbase=0;
$armorbase=0;
$accbase=0;
$enhancement1="None";
$enhancement2="None";
$enhancement3="None";
$enchantment1="None";
$enchantment2="None";
$enchantment3="None";
$transmute1="None";
$transmute2="None";
$transmute3="None";
$adjustable=0;
$legendary=0;
$relic=0;
$setitem=0;
$damage=0;
$defense=0;
$penalty=0;
$lightsource=0;
$thieving=0;
$slow=0;
$curse=0;
$debility=0;
$weaken=0;
$acid=0;
$acidcount=0;
$sleep=0;
$sleepcount=0;
$disease=0;
$blindness=0;
$expbonus=0;
$invisible=0;
$fire=0;
$fireresist=0;
$ice=0;
$iceresist=0;
$lightning=0;
$lightningresist=0;
$earth=0;
$earthresist=0;
$dark=0;
$darkresist=0;
$light=0;
$lightresist=0;
$knockback=0;
$criticalhit=0;
$backstab=0;
$doublestrike=0;
$triplestrike=0;
$catapult=0;
$bleed=0;
$bleedcount=0;
$physdamage=0;
$reflectphys=0;
$reflectfire=0;
$reflectice=0;
$reflectair=0;
$reflectearth=0;
$reflectlight=0;
$reflectdark=0;
$vampiric=0;
$vampamount=0;
$manadrain=0;
$drainamount=0;
$duality=0;
$lightness=0;
$longarm=0;
$throwing=0;
$ultimateresist=0;
$ultimatedamage=0;
$strength=0;
$speed=0;
$accuraccy=0;
$agilty=0;
$wisdom=0;
$life=0;
$mana=0;
$ultimateboost=0;
$liferegen=0;
$manaregen=0;
$blocking=0;
$petrify=0;
$paralyze=0;
$stun=0;
$fear=0;
$insanity=0;
$lightfoot=0;
$revivingjolt=0;
$refillinglight=0;
$despair=0;
$tremors=0;
$inferno=0;
$infernocount=0;
$freezing=0;
$freezecount=0;
$magicfind=0;
$greed=0;
$luck=0;
$lockpicking=0;
$firestarter=0;
$heroicboost=0;
$heroiccount=0;
$silence=0;
$antique=0;
$webs=0;
$entanglement=0;
$waterbreathe=0;
$lasso=0;
$adrenalinerush=0;
$adrenalinecount=0;
$distraction=0;
$immobilizeresist=0;
$mindresist=0;
$criticalresist=0;
$horrifying=0;
$ultimaterevive=0;
$swarming=0;
$revivingjolt=0;
$dryice=0;
$coldblood=0;
$raginginferno=0;
$smoke=0;
$levelling=0;
$piercing=0;
$sharpened=0;
$keen=0;
$devastating=0;
$crushing=0;
$special=0;
$itemrange=0;
$itemspeed=0;

$rand=mt_rand(1,10);
$itemlevel=$level+$rand;

$rand=mt_rand(1,100);
$rand=$rand-$magicfind;

if ($rand<5)
{
//legendary or set items???&&&&&&&&&&&&&&&&&&&&&&&&&&&

$itemname="Belt of the Warrior";
$itemdescription="Stories revolve around this legendary belt. It is said it has special powers that enhance a persons's life force as well as their mind.";
$itemtype="Accessory";
$itemimage="beltowar";

//calculate level of item according to level of player
$itemrarity="Legendary";

//create value calculation
$itemvalue=$itemlevel*150;

$equiplocation="Waist";
$weapontype="none";
$armortype="none";
$acctype="Belt";
$othertype="none";
$weaponbase=0;
$armorbase=0;
$accbase=$itemlevel*2;
$enhancement1="Adds to Life Force.";
$enhancement2="Adds to Mind's Force.";
$enhancement3="None";
$enchantment1="None";
$enchantment2="None";
$enchantment3="None";
$transmute1="None";
$transmute2="None";
$transmute3="None";
$adjustable=0;
$legendary=1;
$relic=0;
$setitem=0;
$duality=0;
$bonus=$itemlevel*.5;
$bonus=round($bonus);
$life=$itemlevel+$bonus;
$mana=$itemlevel;


}

else
{
//************************
if ($rand<15)
{
//ultra-rare item??
$itemrarity="Rare";

$itemtype=mt_rand(1,3);

if ($itemtype==1)
{
$itemtype="Weapon";
$equiplocation="Weapon";
$weapontype=mt_rand(1,6);

if ($weapontype==1)
{
$weapontype="Blade";

$rand=mt_rand(2,10);


  if ($rand==2)
  {
$itemimage="rustedknife";
  
  $weaponbase=2;
  $duality=1;
  $itemrange="Close";
  $itemspeed="Fast";
  $itemvalue=1*$itemlevel*5;
  $itemimage="rustedknife";
  $itemname="Rusted Knife";
  $itemdescription="This Rusted Kitchen Knife ";

include ('php/enhance.php');

  }

  if ($rand==3)
  {
  
  $itemimage="dirk";
  $itemname="Dirk";
  $weaponbase=3;
  $duality=1;
  $itemrange="Close";
  $itemspeed="Fast";
  $itemvalue=2*$itemlevel*5;
  $itemdescription="This Dirk ";
  
  include ('php/enhance.php');

  }
    
  if ($rand==4)
  {
  $itemimage="dagger";
  $itemname="Dagger";
  $weaponbase=4;
  $duality=1;
  $itemrange="Close";
  $itemspeed="Fast";
  $itemdescription="This Dagger ";
  $itemvalue=3*$itemlevel*5;
  
  include ('php/enhance.php');

  }
  
  if ($rand==5)
  {
  $itemimage="shortsword";
  $itemname="Short Sword";
  $weaponbase=5;
  $duality=1;
  $itemrange="Close";
  $itemspeed="Fast";
  $itemdescription="This short sword ";
  $itemvalue=4*$itemlevel*5;
  
  include ('php/enhance.php');
  
  }
  
  if ($rand==6)
  {
  $itemimage="cutlass";
  $itemname="Cutlass";
  $weaponbase=6;
  $duality=1;
  $itemrange="Close";
  $itemspeed="Normal";
  $itemdescription="This cutlass ";
  $itemvalue=5*$itemlevel*5;
  
  include ('php/enhance.php');
  
  }
  
  if ($rand==7)
  {
  $itemimage="sword";
  $itemname="Sword";
  $weaponbase=7;
  $duality=1;
  $itemrange="Close";
  $itemspeed="Normal";
  $itemdescription="This sword ";
  $itemvalue=6*$itemlevel*5;
  
  include ('php/enhance.php');
  
  }
  
  if ($rand==8)
  {
  $itemimage="rapier";
  $itemname="Rapier";
  $weaponbase=8;
  $duality=1;
  $itemrange="Close";
  $itemspeed="Fast";
  $itemdescription="This rapier ";
  $itemvalue=7*$itemlevel*5;
  
  include ('php/enhance.php');
  
  }
  
  if ($rand==9)
  {
  $itemimage="longsword";
  $itemname="Long Sword";
  $weaponbase=9;
  $duality=0;
  $itemrange="Close";
  $itemspeed="Slow";
  $itemdescription="This long sword ";
  $itemvalue=8*$itemlevel*5;
  
  include ('php/enhance.php');
  
  }
  
  if ($rand==10)
  {
  $itemimage="greatsword";
  $itemname="Great Sword";
  $weaponbase=10;
  $duality=0;
  $itemrange="Close";
  $itemspeed="Slow";
  $itemdescription="This great sword ";
  $itemvalue=9*$itemlevel*5;
  
  include ('php/enhance.php');
  
  }

}

if ($weapontype==2)
{
$weapontype="Staff/Wand";

$weaponbase=mt_rand(2,10);

if ($weaponbase==2)
  {
  $itemimage="branch";
  $itemname="Branch";
  $weaponbase=2;
  $duality=1;
  $itemrange="Close";
  $itemspeed="Fast";
  $itemdescription="This branch ";
  $itemvalue=1*$itemlevel*5;
  include ('php/enhance.php');
  
  }
  
  if ($weaponbase==3)
  {
  $itemimage="bamboocane";
  $itemname="Bamboo Cane";
  $weaponbase=3;
  $duality=1;
  $itemrange="Close";
  $itemspeed="Fast";
  $itemdescription="This bamboo cane ";
  $itemvalue=2*$itemlevel*5;
  include ('php/enhance.php');
  }
  if ($weaponbase==4)
  {
  $itemimage="walkingstick";
  $itemname="Walking Stick";
  $weaponbase=4;
  $duality=1;
  $itemrange="Close";
  $itemspeed="Normal";
  $itemdescription="This walking stick ";
  $itemvalue=3*$itemlevel*5;
  include ('php/enhance.php');
  }
  if ($weaponbase==5)
  {
  $itemimage="baton";
  $itemname="Baton";
  $weaponbase=5;
  $duality=1;
  $itemrange="Close";
  $itemspeed="Fast";
  $itemdescription="This baton ";
  $itemvalue=4*$itemlevel*5;
  include ('php/enhance.php');
  }
  
  if ($weaponbase==6)
  {
  $itemimage="staff";
  $itemname="Staff";
  $weaponbase=6;
  $duality=0;
  $itemrange="Close";
  $itemspeed="Normal";
  $itemdescription="This staff ";
  $itemvalue=5*$itemlevel*5;
  include ('php/enhance.php');
  }
  
  if ($weaponbase==7)
  {
  $itemimage="rod";
  $itemname="Rod";
  $weaponbase=7;
  $duality=1;
  $itemrange="Close";
  $itemspeed="Fast";
  $itemdescription="This rod ";
  $itemvalue=6*$itemlevel*5;
  include ('php/enhance.php');
  }
  
  if ($weaponbase==8)
  {
  $itemimage="pole";
  $itemname="Pole";
  $weaponbase=8;
  $duality=0;
  $itemrange="Close";
  $itemspeed="Slow";
  $itemdescription="This pole ";
  $itemvalue=7*$itemlevel*5;
  include ('php/enhance.php');
  }
  
  if ($weaponbase==9)
  {
  $itemimage="wand";
  $itemname="Wand";
  $weaponbase=9;
  $duality=1;
  $itemrange="Close";
  $itemspeed="Normal";
  $itemdescription="This wand ";
  $itemvalue=8*$itemlevel*5;
  include ('php/enhance.php');
  }
  
  if ($weaponbase==10)
  {
  $itemimage="scepter";
  $itemname="Scepter";
  $weaponbase=10;
  $duality=1;
  $itemrange="Close";
  $itemspeed="Normal";
  $itemdescription="This scepter ";
  $itemvalue=9*$itemlevel*5;
  include ('php/enhance.php');
  }
}

if ($weapontype==3)
{
$weapontype="Missile";
$weaponbase=mt_rand(2,10);

  if ($weaponbase==2)
  {
  $itemimage="blowdart";
  $itemname="Blowdart";
  $weaponbase=2;
  $duality=0;
  $itemrange="Long";
  $itemspeed="Fast";
  $itemdescription="This blowdart ";
  $itemvalue=1*$itemlevel*5;
  include ('php/enhance.php');
  }
  
  if ($weaponbase==3)
  {
  $itemimage="dart";
  $itemname="Dart";
  $weaponbase=3;
  $duality=1;
  $itemrange="Long";
  $itemspeed="Fast";
  $itemdescription="This dart ";
  $itemvalue=2*$itemlevel*5;
  include ('php/enhance.php');
  }
  if ($weaponbase==4)
  {
  $itemimage="sling";
  $itemname="Sling";
  $weaponbase=4;
  $duality=0;
  $itemrange="Long";
  $itemspeed="Normal";
  $itemdescription="This sling ";
  $itemvalue=3*$itemlevel*5;
  include ('php/enhance.php');
  
  }
  if ($weaponbase==5)
  {
  $itemimage="throwingknife";
  $itemname="Throwing Knife";
  $weaponbase=5;
  $duality=1;
  $itemrange="Long";
  $itemspeed="Normal";
  $itemdescription="This throwing knife ";
  $itemvalue=4*$itemlevel*5;
  include ('php/enhance.php');
  }
  
  if ($weaponbase==6)
  {
  $itemimage="shuriken";
  $itemname="Shuriken";
  $weaponbase=6;
  $duality=1;
  $itemrange="Long";
  $itemspeed="Fast";
  $itemdescription="This shuriken ";
  $itemvalue=5*$itemlevel*5;
  include ('php/enhance.php');
  }
  
  if ($weaponbase==7)
  {
  $itemimage="javelin";
  $itemname="Javelin";
  $weaponbase=7;
  $duality=0;
  $itemrange="Long";
  $itemspeed="Normal";
  $itemdescription="This javelin ";
  $itemvalue=6*$itemlevel*5;
  include ('php/enhance.php');
  }
  
  if ($weaponbase==8)
  {
  $itemimage="bow";
  $itemname="Bow";
  $weaponbase=8;
  $duality=0;
  $itemrange="Long";
  $itemspeed="Normal";
  $itemdescription="This bow ";
  $itemvalue=7*$itemlevel*5;
  include ('php/enhance.php');
  }
  
  if ($weaponbase==9)
  {
  $itemimage="crossbow";
  $itemname="Crossbow";
  $weaponbase=9;
  $duality=0;
  $itemrange="Long";
  $itemspeed="Slow";
  $itemdescription="This crossbow ";
  $itemvalue=8*$itemlevel*5;
  include ('php/enhance.php');
  }
  
  if ($weaponbase==10)
  {
  $itemimage="siegebow";
  $itemname="Siegebow";
  $weaponbase=10;
  $duality=0;
  $itemrange="Long";
  $itemspeed="Slow";
  $itemdescription="This siegebow ";
  $itemvalue=9*$itemlevel*5;
  include ('php/enhance.php');
  }

}

if ($weapontype==4)
{
$weapontype="Blunt";

$weaponbase=mt_rand(2,10);

if ($weaponbase==2)
  {
  $itemimage="club";
  $itemname="Club";
  $weaponbase=2;
  $duality=1;
  $itemrange="Close";
  $itemspeed="Fast";
  $itemdescription="This club ";
  $itemvalue=1*$itemlevel*5;
  include ('php/enhance.php');
  }
  
  if ($weaponbase==3)
  {
  $itemimage="hammer";
  $itemname="Hammer";
  $weaponbase=3;
  $duality=1;
  $itemrange="Close";
  $itemspeed="Fast";
  $itemdescription="This hammer ";
  $itemvalue=2*$itemlevel*5;
  include ('php/enhance.php');
  }
  if ($weaponbase==4)
  {
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
  include ('php/enhance.php');
  }
  if ($weaponbase==5)
  {
  $itemimage="flangedmace";
  $itemname="Flanged Mace";
  $weaponbase=5;
  $duality=1;
  $itemrange="Close";
  $itemspeed="Fast";
  $itemdescription="This flanged mace ";
  $itemvalue=4*$itemlevel*5;
  include ('php/enhance.php');
  }
  
  if ($weaponbase==6)
  {
  $itemimage="spikedmace";
  $itemname="Spiked Mace";
  $weaponbase=6;
  $duality=1;
  $itemrange="Close";
  $itemspeed="Fast";
  $itemdescription="This mace ";
  $itemvalue=5*$itemlevel*5;
  include ('php/enhance.php');
  }
  
  if ($weaponbase==7)
  {
  $itemimage="flail";
  $itemname="Flail";
  $weaponbase=7;
  $duality=1;
  $itemrange="Close";
  $itemspeed="Fast";
  $itemdescription="This flail ";
  $itemvalue=6*$itemlevel*5;
  include ('php/enhance.php');
  }
  
  if ($weaponbase==8)
  {
  $itemimage="dmorningstar";
  $itemname="Double Morningstar";
  $weaponbase=8;
  $duality=0;
  $itemrange="Close";
  $itemspeed="Normal";
  $itemdescription="This double morningstar ";
  $itemvalue=7*$itemlevel*5;
  include ('php/enhance.php');
  }
  
  if ($weaponbase==9)
  {
  $itemimage="tmorningstar";
  $itemname="Triple Morningstar";
  $weaponbase=9;
  $duality=0;
  $itemrange="Close";
  $itemspeed="Slow";
  $itemdescription="This triple morningstar ";
  $itemvalue=8*$itemlevel*5;
  }
  
  if ($weaponbase==10)
  {
  $itemimage="sledgehammer";
  $itemname="Sledge Hammer";
  $weaponbase=10;
  $duality=0;
  $itemrange="Close";
  $itemspeed="Slow";
  $itemdescription="This sledge hammer ";
  $itemvalue=9*$itemlevel*5;
  include ('php/enhance.php');
  }

}

if ($weapontype==5)
{
$weapontype="Pole-Arm";

$weaponbase=mt_rand(2,10);

if ($weaponbase==2)
  {
  $itemimage="pitchfork";
  $itemname="Pitchfork";
  $weaponbase=2;
  $duality=0;
  $itemrange="Close";
  $itemspeed="Slow";
  $itemdescription="This pitchfork ";
  $itemvalue=1*$itemlevel*5;
  include ('php/enhance.php');
  }
  
  if ($weaponbase==3)
  {
  $itemimage="hatchet";
  $itemname="Hatchet";
  $weaponbase=3;
  $duality=1;
  $itemrange="Close";
  $itemspeed="Fast";
  $itemdescription="This hatchet ";
  $itemvalue=2*$itemlevel*5;
  }
  if ($weaponbase==4)
  {
  $itemimage="ax";
  $itemname="Ax";
  $weaponbase=4;
  $duality=0;
  $itemrange="Close";
  $itemspeed="Normal";
  $itemdescription="This ax ";
  $itemvalue=3*$itemlevel*5;
  include ('php/enhance.php');
  }
  if ($weaponbase==5)
  {
  $itemimage="spear";
  $itemname="Spear";
  $weaponbase=5;
  $duality=1;
  $itemrange="Close";
  $itemspeed="Normal";
  $itemdescription="This spear ";
  $itemvalue=4*$itemlevel*5;
  include ('php/enhance.php');
  }
  
  if ($weaponbase==6)
  {
  $itemimage="lance";
  $itemname="Lance";
  $weaponbase=6;
  $duality=0;
  $itemrange="Medium";
  $itemspeed="Slow";
  $itemdescription="This lance ";
  $itemvalue=5*$itemlevel*5;
  include ('php/enhance.php');
  }
  
  if ($weaponbase==7)
  {
  $itemimage="scythe";
  $itemname="Scythe";
  $weaponbase=7;
  $duality=0;
  $itemrange="Medium";
  $itemspeed="Slow";
  $itemdescription="This scythe ";
  $itemvalue=6*$itemlevel*5;
  include ('php/enhance.php');
  }
  
  if ($weaponbase==8)
  {
  $itemimage="halbred";
  $itemname="Halbred";
  $weaponbase=8;
  $duality=0;
  $itemrange="Medium";
  $itemspeed="Normal";
  $itemdescription="This halbred ";
  $itemvalue=7*$itemlevel*5;
  include ('php/enhance.php');
  }
  
  if ($weaponbase==9)
  {
  $itemimage="trident";
  $itemname="Trident";
  $weaponbase=9;
  $duality=0;
  $itemrange="Medium";
  $itemspeed="Normal";
  $itemdescription="This trident ";
  $itemvalue=8*$itemlevel*5;
  include ('php/enhance.php');
  }
  
  if ($weaponbase==10)
  {
  $itemimage="poleaxe";
  $itemname="Pole-Axe";
  $weaponbase=10;
  $duality=0;
  $itemrange="Medium";
  $itemspeed="Slow";
  $itemdescription="This pole-axe ";
  $itemvalue=9*$itemlevel*5;
  include ('php/enhance.php');
  }

}

if ($weapontype==6)
{
$weapontype="Exotic";

$weaponbase=mt_rand(2,10);

 if ($weaponbase==2)
  {
  $itemimage="brassknuckles";
  $itemname="Brass Knuckles";
  $weaponbase=2;
  $duality=1;
  $itemrange="Close";
  $itemspeed="Fast";
  $itemdescription="This brass knuckles ";
  $itemvalue=1*$itemlevel;
  include ('php/enhance.php');
  }
  
  if ($weaponbase==3)
  {
  $itemimage="whip";
  $itemname="Whip";
  $weaponbase=3;
  $duality=1;
  $itemrange="Medium";
  $itemspeed="Fast";
  $itemdescription="This whip ";
  $itemvalue=2*$itemlevel;
  include ('php/enhance.php');
  }
  if ($weaponbase==4)
  {
  $itemimage="cattail";
  $itemname="Flagrum";
  $weaponbase=4;
  $duality=1;
  $itemrange="Close";
  $itemspeed="Fast";
  $itemdescription="This flagrum ";
  $itemvalue=3*$itemlevel;
  include ('php/enhance.php');  
  }
  if ($weaponbase==5)
  {
  $itemimage="claw";
  $itemname="Pantera Claw";
  $weaponbase=5;
  $duality=1;
  $itemrange="Close";
  $itemspeed="Fast";
  $itemdescription="This claw ";
  $itemvalue=4*$itemlevel;
  include ('php/enhance.php');
  }
  
  if ($weaponbase==6)
  {
  $itemimage="machete";
  $itemname="Machete";
  $weaponbase=6;
  $duality=1;
  $itemrange="Close";
  $itemspeed="Fast";
  $itemdescription="This machete ";
  $itemvalue=5*$itemlevel;
  include ('php/enhance.php');
  }
  
  if ($weaponbase==7)
  {
  $itemimage="nunchukas";
  $itemname="Nunchukas";
  $weaponbase=7;
  $duality=1;
  $itemrange="Close";
  $itemspeed="Fast";
  $itemdescription="This nunchukas ";
  $itemvalue=6*$itemlevel;
  include ('php/enhance.php');
  }
  
  if ($weaponbase==8)
  {
  $itemimage="spikedfist";
  $itemname="Spiked Fist";
  $weaponbase=8;
  $duality=1;
  $itemrange="Close";
  $itemspeed="Fast";
  $itemdescription="This spiked fist ";
  $itemvalue=7*$itemlevel;
  include ('php/enhance.php');
  }
  
  if ($weaponbase==9)
  {
  $itemimage="katana";
  $itemname="Katana";
  $weaponbase=9;
  $duality=1;
  $itemrange="Close";
  $itemspeed="Fast";
  $itemdescription="This katana ";
  $itemvalue=8*$itemlevel;
  include ('php/enhance.php');
  }
  
  if ($weaponbase==10)
  {
  $itemimage="boomstick";
  $itemname="Boom-Stick!";
  $weaponbase=10;
  $duality=1;
  $itemrange="Long";
  $itemspeed="Fast";
  $itemdescription="This BOOM-STICK ";
  $itemvalue=9*$itemlevel;
  include ('php/enhance.php');
  }
$itemvalue=$itemvalue*5;
}

}

if ($itemtype==2)
{
$itemtype="Armor";

$rand=mt_rand(1,6);
$material=mt_rand(1,6);
$itemvalue=$itemvalue*5;

if ($rand==1)
{
$equiplocation="Head";
$armortype="Helm";

if ($material==1)
{
$itemname="Cloth Hat";
$itemimage="clothhat";
$armorbase=2;
$itemdescription="This cloth hat ";
$itemvalue=1*$itemlevel;
include ('php/enhance.php');
}

if ($material==2)
{
$itemname="Canvas Hat";
$itemimage="canvashat";
$armorbase=3;
$itemdescription="This canvas hat ";
$itemvalue=2*$itemlevel;
include ('php/enhance.php');
}

if ($material==3)
{
$itemname="Leather Helm";
$itemimage="leatherhelm";
$armorbase=4;
$itemdescription="This leather helm ";
$itemvalue=3*$itemlevel;
include ('php/enhance.php');
}

if ($material==4)
{
$itemname="Viking Helmet";
$itemimage="vikinghelmet";
$armorbase=4;
$itemdescription="This Viking helm ";
$itemvalue=3*$itemlevel;
include ('php/enhance.php');
}

if ($material==5)
{
$itemname="Chain Helm";
$itemimage="chainhelm";
$armorbase=5;
$itemdescription="This chain helm ";
$itemvalue=4*$itemlevel;
include ('php/enhance.php');
}

if ($material==6)
{
$itemname="Plate Helm";
$itemimage="platehelm";
$armorbase=6;
$itemdescription="This plate helm ";
$itemvalue=5*$itemlevel;
include ('php/enhance.php');
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
$itemvalue=1*$itemlevel;
include ('php/enhance.php');
}

if ($material==2)
{
$itemname="Canvas Shirt";
$itemimage="canvasshirt";
$armorbase=3;
$itemdescription="This canvas shirt ";
$itemvalue=2*$itemlevel;
include ('php/enhance.php');
}

if ($material==3)
{
$itemname="Leather Chest Armor";
$itemimage="leatherchest";
$armorbase=4;
$itemdescription="This leather armor ";
$itemvalue=3*$itemlevel;
include ('php/enhance.php');
}

if ($material==4)
{
$itemname="Splint Chest Armor";
$itemimage="splintchest";
$armorbase=4;
$itemdescription="This splint armor ";
$itemvalue=3*$itemlevel;
include ('php/enhance.php');
}

if ($material==5)
{
$itemname="Chain Mail Chest Armor";
$itemimage="chainarmor";
$armorbase=5;
$itemdescription="This chain armor ";
$itemvalue=4*$itemlevel;
include ('php/enhance.php');
}

if ($material==6)
{
$itemname="Plate Armor";
$itemimage="platearmor";
$armorbase=6;
$itemdescription="This plate armor ";
$itemvalue=5*$itemlevel;
include ('php/enhance.php');
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
$itemvalue=1*$itemlevel;
include ('php/enhance.php');
}

if ($material==2)
{
$itemname="Canvas Pants";
$itemimage="canvaspants";
$armorbase=3;
$itemdescription="This canvas pair of pants ";
$itemvalue=2*$itemlevel;
include ('php/enhance.php');
}

if ($material==3)
{
$itemname="Leather Pants";
$itemimage="leatherpants";
$armorbase=4;
$itemdescription="This leather pair of pants ";
$itemvalue=3*$itemlevel;
include ('php/enhance.php');
}

if ($material==4)
{
$itemname="Splint Leg Armor";
$itemimage="splintlegs";
$armorbase=4;
$itemdescription="This splint leg armor ";
$itemvalue=3*$itemlevel;
include ('php/enhance.php');
}

if ($material==5)
{
$itemname="Chain Leg Armor";
$itemimage="chainlegs";
$armorbase=5;
$itemdescription="This chain leg armor ";
$itemvalue=4*$itemlevel;
include ('php/enhance.php');
}

if ($material==6)
{
$itemname="Plate Leg Armor";
$itemimage="platelegs";
$armorbase=6;
$itemdescription="This plate leg armor ";
$itemvalue=5*$itemlevel;
include ('php/enhance.php');
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
$itemvalue=1*$itemlevel;
include ('php/enhance.php');
}

if ($material==2)
{
$itemname="Canvas Gloves";
$itemimage="canvasgloves";
$armorbase=3;
$itemdescription="This pair of canvas gloves ";
$itemvalue=2*$itemlevel;
include ('php/enhance.php');
}

if ($material==3)
{
$itemname="Leather Gloves";
$itemimage="leathergloves";
$armorbase=4;
$itemdescription="This pair of leather gloves ";
$itemvalue=3*$itemlevel;
include ('php/enhance.php');
}

if ($material==4)
{
$itemname="Splint Gloves";
$itemimage="splintgloves";
$armorbase=4;
$itemdescription="This pair of splint gloves ";
$itemvalue=3*$itemlevel;
include ('php/enhance.php');
}

if ($material==5)
{
$itemname="Chain Gloves";
$itemimage="chaingloves";
$armorbase=5;
$itemdescription="This pair of chain gloves ";
$itemvalue=4*$itemlevel;
include ('php/enhance.php');
}

if ($material==6)
{
$itemname="Plate Gloves";
$itemimage="plategloves";
$armorbase=6;
$itemdescription="This pair of plate gloves ";
$itemvalue=5*$itemlevel;
include ('php/enhance.php');
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
$itemvalue=1*$itemlevel;
include ('php/enhance.php');
}

if ($material==2)
{
$itemname="Canvas Cloak";
$itemimage="canvascloak";
$armorbase=3;
$itemdescription="This canvas cloak ";
$itemvalue=2*$itemlevel;
include ('php/enhance.php');
}

if ($material==3)
{
$itemname="Leather Pauldron";
$itemimage="leathershoulders";
$armorbase=4;
$itemdescription="This pair of leather shoulders ";
$itemvalue=3*$itemlevel;
include ('php/enhance.php');
}

if ($material==4)
{
$itemname="Splint Shoulders";
$itemimage="splintshoulders";
$armorbase=4;
$itemdescription="This pair of splint shoulders ";
$itemvalue=3*$itemlevel;
include ('php/enhance.php');
}

if ($material==5)
{
$itemname="Chain Shoulders";
$itemimage="chainshoulders";
$armorbase=5;
$itemdescription="This pair of chain shoulders ";
$itemvalue=4*$itemlevel;
include ('php/enhance.php');
}

if ($material==6)
{
$itemname="Plate Shoulders";
$itemimage="plateshoulders";
$armorbase=6;
$itemdescription="This pair of plate shoulders ";
$itemvalue=5*$itemlevel;
include ('php/enhance.php');
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
$itemvalue=1*$itemlevel;
include ('php/enhance.php');
}

if ($material==2)
{
$itemname="Canvas Shoes";
$itemimage="canvasshoes";
$armorbase=3;
$itemdescription="This canvas pair of shoes ";
$itemvalue=2*$itemlevel;
include ('php/enhance.php');
}

if ($material==3)
{
$itemname="Leather Boots";
$itemimage="leatherboots";
$armorbase=4;
$itemdescription="This pair of leather boots ";
$itemvalue=3*$itemlevel;
include ('php/enhance.php');
}

if ($material==4)
{
$itemname="Splint Boots";
$itemimage="splintboots";
$armorbase=4;
$itemdescription="This pair of splint boots ";
$itemvalue=3*$itemlevel;
include ('php/enhance.php');
}

if ($material==5)
{
$itemname="Chain Boots";
$itemimage="chainboots";
$armorbase=5;
$itemdescription="This pair of chain boots ";
$itemvalue=4*$itemlevel;
include ('php/enhance.php');
}

if ($material==6)
{
$itemname="Plate Boots";
$itemimage="plateboots";
$armorbase=6;
$itemdescription="This pair of plate boots ";
$itemvalue=5*$itemlevel;
include ('php/enhance.php');
}
}

}

if ($itemtype==3)
{
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
include ('php/enhance.php');
}
if ($material==2)
{
$itemname="Copper Ring";
$itemimage="copperring";
$armorbase=3;
$itemdescription="This copper ring ";
$itemvalue=2*$itemlevel;
include ('php/enhance.php');
}

if ($material==3)
{
$itemname="Brass Ring";
$itemimage="brassring";
$armorbase=4;
$itemdescription="This brass ring ";
$itemvalue=3*$itemlevel;
include ('php/enhance.php');
}

if ($material==4)
{
$itemname="Silver Ring";
$itemimage="silverring";
$armorbase=5;
$itemdescription="This silver ring ";
$itemvalue=4*$itemlevel;
include ('php/enhance.php');
}

if ($material==5)
{
$itemname="Gold Ring";
$itemimage="goldring";
$armorbase=6;
$itemdescription="This gold ring ";
$itemvalue=5*$itemlevel;
include ('php/enhance.php');
}

if ($material==6)
{
$itemname="Platinum Ring";
$itemimage="platinumring";
$armorbase=7;
$itemdescription="This platinum ring ";
$itemvalue=6*$itemlevel;
include ('php/enhance.php');
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
include ('php/enhance.php');
}
if ($material==2)
{
$itemname="Onyx Amulet";
$itemimage="onyxamy";
$armorbase=3;
$itemdescription="This onyx amulet ";
$itemvalue=2*$itemlevel;
include ('php/enhance.php');
}

if ($material==3)
{
$itemname="Sapphire Amulet";
$itemimage="sapphireamy";
$armorbase=4;
$itemdescription="This sapphire amulet ";
$itemvalue=3*$itemlevel;
include ('php/enhance.php');
}

if ($material==4)
{
$itemname="Emerald Amulet";
$itemimage="emeraldamy";
$armorbase=5;
$itemdescription="This emerald amulet ";
$itemvalue=4*$itemlevel;
include ('php/enhance.php');
}

if ($material==5)
{
$itemname="Ruby Amulet";
$itemimage="rubyamy";
$armorbase=6;
$itemdescription="This ruby amulet ";
$itemvalue=5*$itemlevel;
include ('php/enhance.php');
}

if ($material==6)
{
$itemname="Diamond Amulet";
$itemimage="diamondamy";
$armorbase=7;
$itemdescription="This diamond amulet ";
$itemvalue=6*$itemlevel;
include ('php/enhance.php');
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
include ('php/enhance.php');
}
if ($material==2)
{
$itemname="Onyx Earrings";
$itemimage="onyxear";
$armorbase=3;
$itemdescription="This pair of onyx earrings ";
$itemvalue=2*$itemlevel;
include ('php/enhance.php');
}

if ($material==3)
{
$itemname="Sapphire Earrings";
$itemimage="sapphireear";
$armorbase=4;
$itemdescription="This pair of sapphire earrings ";
$itemvalue=3*$itemlevel;
include ('php/enhance.php');
}

if ($material==4)
{
$itemname="Emerald Earrings";
$itemimage="emeraldear";
$armorbase=5;
$itemdescription="This pair of emerald earrings ";
$itemvalue=4*$itemlevel;
include ('php/enhance.php');
}

if ($material==5)
{
$itemname="Ruby Earrings";
$itemimage="rubyear";
$armorbase=6;
$itemdescription="This pair of ruby earrings ";
$itemvalue=5*$itemlevel;
include ('php/enhance.php');
}

if ($material==6)
{
$itemname="Diamond Earrings";
$itemimage="diamondear";
$armorbase=7;
$itemdescription="This pair of diamond earrings ";
$itemvalue=6*$itemlevel;
include ('php/enhance.php');
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
include ('php/enhance.php');
}
if ($material==2)
{
$itemname="Silk Braided Bracelet";
$itemimage="silkbracelet";
$armorbase=3;
$itemdescription="This silk braided bracelet ";
$itemvalue=2*$itemlevel;
include ('php/enhance.php');
}

if ($material==3)
{
$itemname="Leather Bracers";
$itemimage="leatherbracers";
$armorbase=4;
$itemdescription="This pair of leather bracers ";
$itemvalue=3*$itemlevel;
include ('php/enhance.php');
}

if ($material==4)
{
$itemname="Splint Bracers";
$itemimage="splintbracers";
$armorbase=5;
$itemdescription="This pair of splint bracers ";
$itemvalue=4*$itemlevel;
include ('php/enhance.php');
}

if ($material==5)
{
$itemname="Chain Bracers";
$itemimage="chainbracers";
$armorbase=6;
$itemdescription="This pair of chain bracers ";
$itemvalue=5*$itemlevel;
include ('php/enhance.php');
}

if ($material==6)
{
$itemname="Plate Bracers";
$itemimage="platebracers";
$armorbase=7;
$itemdescription="This pair of plate bracers ";
$itemvalue=6*$itemlevel;
include ('php/enhance.php');
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
include ('php/enhance.php');
}
if ($material==2)
{
$itemname="Canvas Headband";
$itemimage="canvashead";
$armorbase=3;
$itemdescription="This canvas headband ";
$itemvalue=2*$itemlevel;
include ('php/enhance.php');
}

if ($material==3)
{
$itemname="Felt Headband";
$itemimage="felthead";
$armorbase=4;
$itemdescription="This felt headband ";
$itemvalue=3*$itemlevel;
include ('php/enhance.php');
}

if ($material==4)
{
$itemname="Silk Headband";
$itemimage="silkhead";
$armorbase=5;
$itemdescription="This silk headband ";
$itemvalue=4*$itemlevel;
include ('php/enhance.php');
}

if ($material==5)
{
$itemname="Velvet Headband";
$itemimage="velevethead";
$armorbase=6;
$itemdescription="This velvet headband ";
$itemvalue=5*$itemlevel;
include ('php/enhance.php');
}

if ($material==6)
{
$itemname="Leather Headband";
$itemimage="leatherhead";
$armorbase=7;
$itemdescription="This leather headband ";
$itemvalue=6*$itemlevel;
include ('php/enhance.php');
}
}


}


$itemvalue=$itemvalue*2;
include ('php/enhance2.php');
include ('php/enhance3.php');
}


//********************************

else
{
if ($rand<25)
{
//rare item ?????*****************************************************
$itemrarity="Rare";

$itemtype=mt_rand(1,3);

if ($itemtype==1)
{
$itemtype="Weapon";

$weapontype=mt_rand(1,6);

if ($weapontype==1)
{
$weapontype="Blade";

$rand=mt_rand(2,10);


  if ($rand==2)
  {
$itemimage="rustedknife";
  
  $weaponbase=2;
  $duality=1;
  $itemrange="Close";
  $itemspeed="Fast";
  $itemvalue=1*$itemlevel*5;
  $itemimage="rustedknife";
  $itemname="Rusted Knife";
  $itemdescription="This Rusted Kitchen Knife ";

include ('php/enhance.php');

  }

  if ($rand==3)
  {
  
  $itemimage="dirk";
  $itemname="Dirk";
  $weaponbase=3;
  $duality=1;
  $itemrange="Close";
  $itemspeed="Fast";
  $itemvalue=2*$itemlevel*5;
  $itemdescription="This Dirk ";
  
  include ('php/enhance.php');

  }
    
  if ($rand==4)
  {
  $itemimage="dagger";
  $itemname="Dagger";
  $weaponbase=4;
  $duality=1;
  $itemrange="Close";
  $itemspeed="Fast";
  $itemdescription="This Dagger ";
  $itemvalue=3*$itemlevel*5;
  
  include ('php/enhance.php');

  }
  
  if ($rand==5)
  {
  $itemimage="shortsword";
  $itemname="Short Sword";
  $weaponbase=5;
  $duality=1;
  $itemrange="Close";
  $itemspeed="Fast";
  $itemdescription="This short sword ";
  $itemvalue=4*$itemlevel*5;
  
  include ('php/enhance.php');
  
  }
  
  if ($rand==6)
  {
  $itemimage="cutlass";
  $itemname="Cutlass";
  $weaponbase=6;
  $duality=1;
  $itemrange="Close";
  $itemspeed="Normal";
  $itemdescription="This cutlass ";
  $itemvalue=5*$itemlevel*5;
  
  include ('php/enhance.php');
  
  }
  
  if ($rand==7)
  {
  $itemimage="sword";
  $itemname="Sword";
  $weaponbase=7;
  $duality=1;
  $itemrange="Close";
  $itemspeed="Normal";
  $itemdescription="This sword ";
  $itemvalue=6*$itemlevel*5;
  
  include ('php/enhance.php');
  
  }
  
  if ($rand==8)
  {
  $itemimage="rapier";
  $itemname="Rapier";
  $weaponbase=8;
  $duality=1;
  $itemrange="Close";
  $itemspeed="Fast";
  $itemdescription="This rapier ";
  $itemvalue=7*$itemlevel*5;
  
  include ('php/enhance.php');
  
  }
  
  if ($rand==9)
  {
  $itemimage="longsword";
  $itemname="Long Sword";
  $weaponbase=9;
  $duality=0;
  $itemrange="Close";
  $itemspeed="Slow";
  $itemdescription="This long sword ";
  $itemvalue=8*$itemlevel*5;
  
  include ('php/enhance.php');
  
  }
  
  if ($rand==10)
  {
  $itemimage="greatsword";
  $itemname="Great Sword";
  $weaponbase=10;
  $duality=0;
  $itemrange="Close";
  $itemspeed="Slow";
  $itemdescription="This great sword ";
  $itemvalue=9*$itemlevel*5;
  
  include ('php/enhance.php');
  
  }

}

if ($weapontype==2)
{
$weapontype="Staff/Wand";

$weaponbase=mt_rand(2,10);

if ($weaponbase==2)
  {
  $itemimage="branch";
  $itemname="Branch";
  $weaponbase=2;
  $duality=1;
  $itemrange="Close";
  $itemspeed="Fast";
  $itemdescription="This branch ";
  $itemvalue=1*$itemlevel*5;
  include ('php/enhance.php');
  
  }
  
  if ($weaponbase==3)
  {
  $itemimage="bamboocane";
  $itemname="Bamboo Cane";
  $weaponbase=3;
  $duality=1;
  $itemrange="Close";
  $itemspeed="Fast";
  $itemdescription="This bamboo cane ";
  $itemvalue=2*$itemlevel*5;
  include ('php/enhance.php');
  }
  if ($weaponbase==4)
  {
  $itemimage="walkingstick";
  $itemname="Walking Stick";
  $weaponbase=4;
  $duality=1;
  $itemrange="Close";
  $itemspeed="Normal";
  $itemdescription="This walking stick ";
  $itemvalue=3*$itemlevel*5;
  include ('php/enhance.php');
  }
  if ($weaponbase==5)
  {
  $itemimage="baton";
  $itemname="Baton";
  $weaponbase=5;
  $duality=1;
  $itemrange="Close";
  $itemspeed="Fast";
  $itemdescription="This baton ";
  $itemvalue=4*$itemlevel*5;
  include ('php/enhance.php');
  }
  
  if ($weaponbase==6)
  {
  $itemimage="staff";
  $itemname="Staff";
  $weaponbase=6;
  $duality=0;
  $itemrange="Close";
  $itemspeed="Normal";
  $itemdescription="This staff ";
  $itemvalue=5*$itemlevel*5;
  include ('php/enhance.php');
  }
  
  if ($weaponbase==7)
  {
  $itemimage="rod";
  $itemname="Rod";
  $weaponbase=7;
  $duality=1;
  $itemrange="Close";
  $itemspeed="Fast";
  $itemdescription="This rod ";
  $itemvalue=6*$itemlevel*5;
  include ('php/enhance.php');
  }
  
  if ($weaponbase==8)
  {
  $itemimage="pole";
  $itemname="Pole";
  $weaponbase=8;
  $duality=0;
  $itemrange="Close";
  $itemspeed="Slow";
  $itemdescription="This pole ";
  $itemvalue=7*$itemlevel*5;
  include ('php/enhance.php');
  }
  
  if ($weaponbase==9)
  {
  $itemimage="wand";
  $itemname="Wand";
  $weaponbase=9;
  $duality=1;
  $itemrange="Close";
  $itemspeed="Normal";
  $itemdescription="This wand ";
  $itemvalue=8*$itemlevel*5;
  include ('php/enhance.php');
  }
  
  if ($weaponbase==10)
  {
  $itemimage="cepter";
  $itemname="Cepter";
  $weaponbase=10;
  $duality=1;
  $itemrange="Close";
  $itemspeed="Normal";
  $itemdescription="This cepter ";
  $itemvalue=9*$itemlevel*5;
  include ('php/enhance.php');
  }
}

if ($weapontype==3)
{
$weapontype="Missile";
$weaponbase=mt_rand(2,10);

  if ($weaponbase==2)
  {
  $itemimage="blowdart";
  $itemname="Blowdart";
  $weaponbase=2;
  $duality=0;
  $itemrange="Long";
  $itemspeed="Fast";
  $itemdescription="This blowdart ";
  $itemvalue=1*$itemlevel*5;
  include ('php/enhance.php');
  }
  
  if ($weaponbase==3)
  {
  $itemimage="dart";
  $itemname="Dart";
  $weaponbase=3;
  $duality=1;
  $itemrange="Long";
  $itemspeed="Fast";
  $itemdescription="This dart ";
  $itemvalue=2*$itemlevel*5;
  include ('php/enhance.php');
  }
  if ($weaponbase==4)
  {
  $itemimage="sling";
  $itemname="Sling";
  $weaponbase=4;
  $duality=0;
  $itemrange="Long";
  $itemspeed="Normal";
  $itemdescription="This sling ";
  $itemvalue=3*$itemlevel*5;
  include ('php/enhance.php');
  
  }
  if ($weaponbase==5)
  {
  $itemimage="throwingknife";
  $itemname="Throwing Knife";
  $weaponbase=5;
  $duality=1;
  $itemrange="Long";
  $itemspeed="Normal";
  $itemdescription="This throwing knife ";
  $itemvalue=4*$itemlevel*5;
  include ('php/enhance.php');
  }
  
  if ($weaponbase==6)
  {
  $itemimage="shuriken";
  $itemname="Shuriken";
  $weaponbase=6;
  $duality=1;
  $itemrange="Long";
  $itemspeed="Fast";
  $itemdescription="This shuriken ";
  $itemvalue=5*$itemlevel*5;
  include ('php/enhance.php');
  }
  
  if ($weaponbase==7)
  {
  $itemimage="javelin";
  $itemname="Javelin";
  $weaponbase=7;
  $duality=0;
  $itemrange="Long";
  $itemspeed="Normal";
  $itemdescription="This javelin ";
  $itemvalue=6*$itemlevel*5;
  include ('php/enhance.php');
  }
  
  if ($weaponbase==8)
  {
  $itemimage="bow";
  $itemname="Bow";
  $weaponbase=8;
  $duality=0;
  $itemrange="Long";
  $itemspeed="Normal";
  $itemdescription="This bow ";
  $itemvalue=7*$itemlevel*5;
  include ('php/enhance.php');
  }
  
  if ($weaponbase==9)
  {
  $itemimage="crossbow";
  $itemname="Crossbow";
  $weaponbase=9;
  $duality=0;
  $itemrange="Long";
  $itemspeed="Slow";
  $itemdescription="This crossbow ";
  $itemvalue=8*$itemlevel*5;
  include ('php/enhance.php');
  }
  
  if ($weaponbase==10)
  {
  $itemimage="siegebow";
  $itemname="Siegebow";
  $weaponbase=10;
  $duality=0;
  $itemrange="Long";
  $itemspeed="Slow";
  $itemdescription="This siegebow ";
  $itemvalue=9*$itemlevel*5;
  include ('php/enhance.php');
  }

}

if ($weapontype==4)
{
$weapontype="Blunt";

$weaponbase=mt_rand(2,10);

if ($weaponbase==2)
  {
  $itemimage="club";
  $itemname="Club";
  $weaponbase=2;
  $duality=1;
  $itemrange="Close";
  $itemspeed="Fast";
  $itemdescription="This club ";
  $itemvalue=1*$itemlevel*5;
  include ('php/enhance.php');
  }
  
  if ($weaponbase==3)
  {
  $itemimage="hammer";
  $itemname="Hammer";
  $weaponbase=3;
  $duality=1;
  $itemrange="Close";
  $itemspeed="Fast";
  $itemdescription="This hammer ";
  $itemvalue=2*$itemlevel*5;
  include ('php/enhance.php');
  }
  if ($weaponbase==4)
  {
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
  include ('php/enhance.php');
  }
  if ($weaponbase==5)
  {
  $itemimage="flangedmace";
  $itemname="Flanged Mace";
  $weaponbase=5;
  $duality=1;
  $itemrange="Close";
  $itemspeed="Fast";
  $itemdescription="This flanged mace ";
  $itemvalue=4*$itemlevel*5;
  include ('php/enhance.php');
  }
  
  if ($weaponbase==6)
  {
  $itemimage="spikedmace";
  $itemname="Spiked Mace";
  $weaponbase=6;
  $duality=1;
  $itemrange="Close";
  $itemspeed="Fast";
  $itemdescription="This mace ";
  $itemvalue=5*$itemlevel*5;
  include ('php/enhance.php');
  }
  
  if ($weaponbase==7)
  {
  $itemimage="flail";
  $itemname="Flail";
  $weaponbase=7;
  $duality=1;
  $itemrange="Close";
  $itemspeed="Fast";
  $itemdescription="This flail ";
  $itemvalue=6*$itemlevel*5;
  include ('php/enhance.php');
  }
  
  if ($weaponbase==8)
  {
  $itemimage="dmorningstar";
  $itemname="Double Morningstar";
  $weaponbase=8;
  $duality=0;
  $itemrange="Close";
  $itemspeed="Normal";
  $itemdescription="This double morningstar ";
  $itemvalue=7*$itemlevel*5;
  include ('php/enhance.php');
  }
  
  if ($weaponbase==9)
  {
  $itemimage="tmorningstar";
  $itemname="Triple Morningstar";
  $weaponbase=9;
  $duality=0;
  $itemrange="Close";
  $itemspeed="Slow";
  $itemdescription="This triple morningstar ";
  $itemvalue=8*$itemlevel*5;
  }
  
  if ($weaponbase==10)
  {
  $itemimage="sledgehammer";
  $itemname="Sledge Hammer";
  $weaponbase=10;
  $duality=0;
  $itemrange="Close";
  $itemspeed="Slow";
  $itemdescription="This sledge hammer ";
  $itemvalue=9*$itemlevel*5;
  include ('php/enhance.php');
  }

}

if ($weapontype==5)
{
$weapontype="Pole-Arm";

$weaponbase=mt_rand(2,10);

if ($weaponbase==2)
  {
  $itemimage="pitchfork";
  $itemname="Pitchfork";
  $weaponbase=2;
  $duality=0;
  $itemrange="Close";
  $itemspeed="Slow";
  $itemdescription="This pitchfork ";
  $itemvalue=1*$itemlevel*5;
  include ('php/enhance.php');
  }
  
  if ($weaponbase==3)
  {
  $itemimage="hatchet";
  $itemname="Hatchet";
  $weaponbase=3;
  $duality=1;
  $itemrange="Close";
  $itemspeed="Fast";
  $itemdescription="This hatchet ";
  $itemvalue=2*$itemlevel*5;
  }
  if ($weaponbase==4)
  {
  $itemimage="ax";
  $itemname="Ax";
  $weaponbase=4;
  $duality=0;
  $itemrange="Close";
  $itemspeed="Normal";
  $itemdescription="This ax ";
  $itemvalue=3*$itemlevel*5;
  include ('php/enhance.php');
  }
  if ($weaponbase==5)
  {
  $itemimage="spear";
  $itemname="Spear";
  $weaponbase=5;
  $duality=1;
  $itemrange="Close";
  $itemspeed="Normal";
  $itemdescription="This spear ";
  $itemvalue=4*$itemlevel*5;
  include ('php/enhance.php');
  }
  
  if ($weaponbase==6)
  {
  $itemimage="lance";
  $itemname="Lance";
  $weaponbase=6;
  $duality=0;
  $itemrange="Medium";
  $itemspeed="Slow";
  $itemdescription="This lance ";
  $itemvalue=5*$itemlevel*5;
  include ('php/enhance.php');
  }
  
  if ($weaponbase==7)
  {
  $itemimage="scythe";
  $itemname="Scythe";
  $weaponbase=7;
  $duality=0;
  $itemrange="Medium";
  $itemspeed="Slow";
  $itemdescription="This scythe ";
  $itemvalue=6*$itemlevel*5;
  include ('php/enhance.php');
  }
  
  if ($weaponbase==8)
  {
  $itemimage="halbred";
  $itemname="Halbred";
  $weaponbase=8;
  $duality=0;
  $itemrange="Medium";
  $itemspeed="Normal";
  $itemdescription="This halbred ";
  $itemvalue=7*$itemlevel*5;
  include ('php/enhance.php');
  }
  
  if ($weaponbase==9)
  {
  $itemimage="trident";
  $itemname="Trident";
  $weaponbase=9;
  $duality=0;
  $itemrange="Medium";
  $itemspeed="Normal";
  $itemdescription="This trident ";
  $itemvalue=8*$itemlevel*5;
  include ('php/enhance.php');
  }
  
  if ($weaponbase==10)
  {
  $itemimage="poleaxe";
  $itemname="Pole-Axe";
  $weaponbase=10;
  $duality=0;
  $itemrange="Medium";
  $itemspeed="Slow";
  $itemdescription="This pole-axe ";
  $itemvalue=9*$itemlevel*5;
  include ('php/enhance.php');
  }

}

if ($weapontype==6)
{
$weapontype="Exotic";

$weaponbase=mt_rand(2,10);

 if ($weaponbase==2)
  {
  $itemimage="brassknuckles";
  $itemname="Brass Knuckles";
  $weaponbase=2;
  $duality=1;
  $itemrange="Close";
  $itemspeed="Fast";
  $itemdescription="This brass knuckles ";
  $itemvalue=1*$itemlevel;
  include ('php/enhance.php');
  }
  
  if ($weaponbase==3)
  {
  $itemimage="whip";
  $itemname="Whip";
  $weaponbase=3;
  $duality=1;
  $itemrange="Medium";
  $itemspeed="Fast";
  $itemdescription="This whip ";
  $itemvalue=2*$itemlevel;
  include ('php/enhance.php');
  }
  if ($weaponbase==4)
  {
  $itemimage="cattail";
  $itemname="Cat-tail";
  $weaponbase=4;
  $duality=1;
  $itemrange="Close";
  $itemspeed="Fast";
  $itemdescription="This cat-tail ";
  $itemvalue=3*$itemlevel;
  include ('php/enhance.php');  
  }
  if ($weaponbase==5)
  {
  $itemimage="claw";
  $itemname="Claw";
  $weaponbase=5;
  $duality=1;
  $itemrange="Close";
  $itemspeed="Fast";
  $itemdescription="This claw ";
  $itemvalue=4*$itemlevel;
  include ('php/enhance.php');
  }
  
  if ($weaponbase==6)
  {
  $itemimage="machete";
  $itemname="Machete";
  $weaponbase=6;
  $duality=1;
  $itemrange="Close";
  $itemspeed="Fast";
  $itemdescription="This machete ";
  $itemvalue=5*$itemlevel;
  include ('php/enhance.php');
  }
  
  if ($weaponbase==7)
  {
  $itemimage="nunchukas";
  $itemname="Nunchukas";
  $weaponbase=7;
  $duality=1;
  $itemrange="Close";
  $itemspeed="Fast";
  $itemdescription="This nunchukas ";
  $itemvalue=6*$itemlevel;
  include ('php/enhance.php');
  }
  
  if ($weaponbase==8)
  {
  $itemimage="spikedfist";
  $itemname="Spiked Fist";
  $weaponbase=8;
  $duality=1;
  $itemrange="Close";
  $itemspeed="Fast";
  $itemdescription="This spiked fist ";
  $itemvalue=7*$itemlevel;
  include ('php/enhance.php');
  }
  
  if ($weaponbase==9)
  {
  $itemimage="katana";
  $itemname="Katana";
  $weaponbase=9;
  $duality=1;
  $itemrange="Close";
  $itemspeed="Fast";
  $itemdescription="This katana ";
  $itemvalue=8*$itemlevel;
  include ('php/enhance.php');
  }
  
  if ($weaponbase==10)
  {
  $itemimage="boomstick";
  $itemname="Boom-Stick!";
  $weaponbase=10;
  $duality=1;
  $itemrange="Long";
  $itemspeed="Fast";
  $itemdescription="This BOOM-STICK ";
  $itemvalue=9*$itemlevel;
  include ('php/enhance.php');
  }
$itemvalue=$itemvalue*5;
}

}

if ($itemtype==2)
{
$itemtype="Armor";

$rand=mt_rand(1,6);
$material=mt_rand(1,6);
$itemvalue=$itemvalue*5;

if ($rand==1)
{
$equiplocation="Head";
$armortype="Helm";

if ($material==1)
{
$itemname="Cloth Hat";
$itemimage="clothhat";
$armorbase=2;
$itemdescription="This cloth hat ";
$itemvalue=1*$itemlevel;
include ('php/enhance.php');
}

if ($material==2)
{
$itemname="Canvas Hat";
$itemimage="canvashat";
$armorbase=3;
$itemdescription="This canvas hat ";
$itemvalue=2*$itemlevel;
include ('php/enhance.php');
}

if ($material==3)
{
$itemname="Leather Helm";
$itemimage="leatherhelm";
$armorbase=4;
$itemdescription="This leather helm ";
$itemvalue=3*$itemlevel;
include ('php/enhance.php');
}

if ($material==4)
{
$itemname="Splint Helm";
$itemimage="splinthelm";
$armorbase=4;
$itemdescription="This splint helm ";
$itemvalue=3*$itemlevel;
include ('php/enhance.php');
}

if ($material==5)
{
$itemname="Chain Helm";
$itemimage="chainhelm";
$armorbase=5;
$itemdescription="This chain helm ";
$itemvalue=4*$itemlevel;
include ('php/enhance.php');
}

if ($material==6)
{
$itemname="Plate Helm";
$itemimage="platehelm";
$armorbase=6;
$itemdescription="This plate helm ";
$itemvalue=5*$itemlevel;
include ('php/enhance.php');
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
$itemvalue=1*$itemlevel;
include ('php/enhance.php');
}

if ($material==2)
{
$itemname="Canvas Shirt";
$itemimage="canvasshirt";
$armorbase=3;
$itemdescription="This canvas shirt ";
$itemvalue=2*$itemlevel;
include ('php/enhance.php');
}

if ($material==3)
{
$itemname="Leather Chest Armor";
$itemimage="leatherchest";
$armorbase=4;
$itemdescription="This leather armor ";
$itemvalue=3*$itemlevel;
include ('php/enhance.php');
}

if ($material==4)
{
$itemname="Splint Chest Armor";
$itemimage="splintchest";
$armorbase=4;
$itemdescription="This splint armor ";
$itemvalue=3*$itemlevel;
include ('php/enhance.php');
}

if ($material==5)
{
$itemname="Chain Mail Chest Armor";
$itemimage="chainarmor";
$armorbase=5;
$itemdescription="This chain armor ";
$itemvalue=4*$itemlevel;
include ('php/enhance.php');
}

if ($material==6)
{
$itemname="Plate Armor";
$itemimage="platearmor";
$armorbase=6;
$itemdescription="This plate armor ";
$itemvalue=5*$itemlevel;
include ('php/enhance.php');
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
$itemvalue=1*$itemlevel;
include ('php/enhance.php');
}

if ($material==2)
{
$itemname="Canvas Pants";
$itemimage="canvaspants";
$armorbase=3;
$itemdescription="This canvas pair of pants ";
$itemvalue=2*$itemlevel;
include ('php/enhance.php');
}

if ($material==3)
{
$itemname="Leather Pants";
$itemimage="leatherpants";
$armorbase=4;
$itemdescription="This leather pair of pants ";
$itemvalue=3*$itemlevel;
include ('php/enhance.php');
}

if ($material==4)
{
$itemname="Splint Leg Armor";
$itemimage="splintlegs";
$armorbase=4;
$itemdescription="This splint leg armor ";
$itemvalue=3*$itemlevel;
include ('php/enhance.php');
}

if ($material==5)
{
$itemname="Chain Leg Armor";
$itemimage="chainlegs";
$armorbase=5;
$itemdescription="This chain leg armor ";
$itemvalue=4*$itemlevel;
include ('php/enhance.php');
}

if ($material==6)
{
$itemname="Plate Leg Armor";
$itemimage="platelegs";
$armorbase=6;
$itemdescription="This plate leg armor ";
$itemvalue=5*$itemlevel;
include ('php/enhance.php');
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
$itemvalue=1*$itemlevel;
include ('php/enhance.php');
}

if ($material==2)
{
$itemname="Canvas Gloves";
$itemimage="canvasgloves";
$armorbase=3;
$itemdescription="This pair of canvas gloves ";
$itemvalue=2*$itemlevel;
include ('php/enhance.php');
}

if ($material==3)
{
$itemname="Leather Gloves";
$itemimage="leathergloves";
$armorbase=4;
$itemdescription="This pair of leather gloves ";
$itemvalue=3*$itemlevel;
include ('php/enhance.php');
}

if ($material==4)
{
$itemname="Splint Gloves";
$itemimage="splintgloves";
$armorbase=4;
$itemdescription="This pair of splint gloves ";
$itemvalue=3*$itemlevel;
include ('php/enhance.php');
}

if ($material==5)
{
$itemname="Chain Gloves";
$itemimage="chaingloves";
$armorbase=5;
$itemdescription="This pair of chain gloves ";
$itemvalue=4*$itemlevel;
include ('php/enhance.php');
}

if ($material==6)
{
$itemname="Plate Gloves";
$itemimage="plategloves";
$armorbase=6;
$itemdescription="This pair of plate gloves ";
$itemvalue=5*$itemlevel;
include ('php/enhance.php');
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
$itemvalue=1*$itemlevel;
include ('php/enhance.php');
}

if ($material==2)
{
$itemname="Canvas Cloak";
$itemimage="canvascloak";
$armorbase=3;
$itemdescription="This canvas cloak ";
$itemvalue=2*$itemlevel;
include ('php/enhance.php');
}

if ($material==3)
{
$itemname="Leather Shoulders";
$itemimage="leathershoulders";
$armorbase=4;
$itemdescription="This pair of leather shoulders ";
$itemvalue=3*$itemlevel;
include ('php/enhance.php');
}

if ($material==4)
{
$itemname="Splint Shoulders";
$itemimage="splintshoulders";
$armorbase=4;
$itemdescription="This pair of splint shoulders ";
$itemvalue=3*$itemlevel;
include ('php/enhance.php');
}

if ($material==5)
{
$itemname="Chain Shoulders";
$itemimage="chainshoulders";
$armorbase=5;
$itemdescription="This pair of chain shoulders ";
$itemvalue=4*$itemlevel;
include ('php/enhance.php');
}

if ($material==6)
{
$itemname="Plate Shoulders";
$itemimage="plateshoulders";
$armorbase=6;
$itemdescription="This pair of plate shoulders ";
$itemvalue=5*$itemlevel;
include ('php/enhance.php');
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
$itemvalue=1*$itemlevel;
include ('php/enhance.php');
}

if ($material==2)
{
$itemname="Canvas Shoes";
$itemimage="canvasshoes";
$armorbase=3;
$itemdescription="This canvas pair of shoes ";
$itemvalue=2*$itemlevel;
include ('php/enhance.php');
}

if ($material==3)
{
$itemname="Leather Boots";
$itemimage="leatherboots";
$armorbase=4;
$itemdescription="This pair of leather boots ";
$itemvalue=3*$itemlevel;
include ('php/enhance.php');
}

if ($material==4)
{
$itemname="Splint Boots";
$itemimage="splintboots";
$armorbase=4;
$itemdescription="This pair of splint boots ";
$itemvalue=3*$itemlevel;
include ('php/enhance.php');
}

if ($material==5)
{
$itemname="Chain Boots";
$itemimage="chainboots";
$armorbase=5;
$itemdescription="This pair of chain boots ";
$itemvalue=4*$itemlevel;
include ('php/enhance.php');
}

if ($material==6)
{
$itemname="Plate Boots";
$itemimage="plateboots";
$armorbase=6;
$itemdescription="This pair of plate boots ";
$itemvalue=5*$itemlevel;
include ('php/enhance.php');
}
}

}

if ($itemtype==3)
{
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
include ('php/enhance.php');
}
if ($material==2)
{
$itemname="Copper Ring";
$itemimage="copperring";
$armorbase=3;
$itemdescription="This copper ring ";
$itemvalue=2*$itemlevel;
include ('php/enhance.php');
}

if ($material==3)
{
$itemname="Brass Ring";
$itemimage="brassring";
$armorbase=4;
$itemdescription="This brass ring ";
$itemvalue=3*$itemlevel;
include ('php/enhance.php');
}

if ($material==4)
{
$itemname="Silver Ring";
$itemimage="silverring";
$armorbase=5;
$itemdescription="This silver ring ";
$itemvalue=4*$itemlevel;
include ('php/enhance.php');
}

if ($material==5)
{
$itemname="Gold Ring";
$itemimage="goldring";
$armorbase=6;
$itemdescription="This gold ring ";
$itemvalue=5*$itemlevel;
include ('php/enhance.php');
}

if ($material==6)
{
$itemname="Platinum Ring";
$itemimage="platinumring";
$armorbase=7;
$itemdescription="This platinum ring ";
$itemvalue=6*$itemlevel;
include ('php/enhance.php');
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
include ('php/enhance.php');
}
if ($material==2)
{
$itemname="Onyx Amulet";
$itemimage="onyxamy";
$armorbase=3;
$itemdescription="This onyx amulet ";
$itemvalue=2*$itemlevel;
include ('php/enhance.php');
}

if ($material==3)
{
$itemname="Sapphire Amulet";
$itemimage="sapphireamy";
$armorbase=4;
$itemdescription="This sapphire amulet ";
$itemvalue=3*$itemlevel;
include ('php/enhance.php');
}

if ($material==4)
{
$itemname="Emerald Amulet";
$itemimage="emeraldamy";
$armorbase=5;
$itemdescription="This emerald amulet ";
$itemvalue=4*$itemlevel;
include ('php/enhance.php');
}

if ($material==5)
{
$itemname="Ruby Amulet";
$itemimage="rubyamy";
$armorbase=6;
$itemdescription="This ruby amulet ";
$itemvalue=5*$itemlevel;
include ('php/enhance.php');
}

if ($material==6)
{
$itemname="Diamond Amulet";
$itemimage="diamondamy";
$armorbase=7;
$itemdescription="This diamond amulet ";
$itemvalue=6*$itemlevel;
include ('php/enhance.php');
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
include ('php/enhance.php');
}
if ($material==2)
{
$itemname="Onyx Earrings";
$itemimage="onyxear";
$armorbase=3;
$itemdescription="This pair of onyx earrings ";
$itemvalue=2*$itemlevel;
include ('php/enhance.php');
}

if ($material==3)
{
$itemname="Sapphire Earrings";
$itemimage="sapphireear";
$armorbase=4;
$itemdescription="This pair of sapphire earrings ";
$itemvalue=3*$itemlevel;
include ('php/enhance.php');
}

if ($material==4)
{
$itemname="Emerald Earrings";
$itemimage="emeraldear";
$armorbase=5;
$itemdescription="This pair of emerald earrings ";
$itemvalue=4*$itemlevel;
include ('php/enhance.php');
}

if ($material==5)
{
$itemname="Ruby Earrings";
$itemimage="rubyear";
$armorbase=6;
$itemdescription="This pair of ruby earrings ";
$itemvalue=5*$itemlevel;
include ('php/enhance.php');
}

if ($material==6)
{
$itemname="Diamond Earrings";
$itemimage="diamondear";
$armorbase=7;
$itemdescription="This pair of diamond earrings ";
$itemvalue=6*$itemlevel;
include ('php/enhance.php');
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
include ('php/enhance.php');
}
if ($material==2)
{
$itemname="Sild Braided Bracelet";
$itemimage="silkbracelet";
$armorbase=3;
$itemdescription="This silk braided bracelet ";
$itemvalue=2*$itemlevel;
include ('php/enhance.php');
}

if ($material==3)
{
$itemname="Leather Bracers";
$itemimage="leatherbracers";
$armorbase=4;
$itemdescription="This pair of leather bracers ";
$itemvalue=3*$itemlevel;
include ('php/enhance.php');
}

if ($material==4)
{
$itemname="Splint Bracers";
$itemimage="splintbracers";
$armorbase=5;
$itemdescription="This pair of splint bracers ";
$itemvalue=4*$itemlevel;
include ('php/enhance.php');
}

if ($material==5)
{
$itemname="Chain Bracers";
$itemimage="chainbracers";
$armorbase=6;
$itemdescription="This pair of chain bracers ";
$itemvalue=5*$itemlevel;
include ('php/enhance.php');
}

if ($material==6)
{
$itemname="Plate Bracers";
$itemimage="platebracers";
$armorbase=7;
$itemdescription="This pair of plate bracers ";
$itemvalue=6*$itemlevel;
include ('php/enhance.php');
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
include ('php/enhance.php');
}
if ($material==2)
{
$itemname="Canvas Headband";
$itemimage="canvashead";
$armorbase=3;
$itemdescription="This canvas headband ";
$itemvalue=2*$itemlevel;
include ('php/enhance.php');
}

if ($material==3)
{
$itemname="Felt Headband";
$itemimage="felthead";
$armorbase=4;
$itemdescription="This felt headband ";
$itemvalue=3*$itemlevel;
include ('php/enhance.php');
}

if ($material==4)
{
$itemname="Silk Headband";
$itemimage="silkhead";
$armorbase=5;
$itemdescription="This silk headband ";
$itemvalue=4*$itemlevel;
include ('php/enhance.php');
}

if ($material==5)
{
$itemname="Velvet Headband";
$itemimage="velevethead";
$armorbase=6;
$itemdescription="This velvet headband ";
$itemvalue=5*$itemlevel;
include ('php/enhance.php');
}

if ($material==6)
{
$itemname="Leather Headband";
$itemimage="leatherhead";
$armorbase=7;
$itemdescription="This leather headband ";
$itemvalue=6*$itemlevel;
include ('php/enhance.php');
}
}


}


$itemvalue=$itemvalue*2;
include ('php/enhance2.php');
}

//*****************************************************************

else
{
if ($rand<50)
{
//uncommon
$itemrarity="Uncommon";

$itemtype=mt_rand(1,3);

if ($itemtype==1)
{
$itemtype="Weapon";

$weapontype=mt_rand(1,6);

if ($weapontype==1)
{
$weapontype="Blade";

$rand=mt_rand(2,10);
 
  if ($rand==2)
  {
$itemimage="rustedknife";
  
  $weaponbase=2;
  $duality=1;
  $itemrange="Close";
  $itemspeed="Fast";
  $itemvalue=1*$itemlevel*5;
  $itemimage="rustedknife";
  $itemname="Rusted Knife";
  $itemdescription="This Rusted Kitchen Knife ";

include ('php/enhance.php');

  }

  if ($rand==3)
  {
  
  $itemimage="dirk";
  $itemname="Dirk";
  $weaponbase=3;
  $duality=1;
  $itemrange="Close";
  $itemspeed="Fast";
  $itemvalue=2*$itemlevel*5;
  $itemdescription="This Dirk ";
  
  include ('php/enhance.php');

  }
    
  if ($rand==4)
  {
  $itemimage="dagger";
  $itemname="Dagger";
  $weaponbase=4;
  $duality=1;
  $itemrange="Close";
  $itemspeed="Fast";
  $itemdescription="This Dagger ";
  $itemvalue=3*$itemlevel*5;
  
  include ('php/enhance.php');

  }
  
  if ($rand==5)
  {
  $itemimage="shortsword";
  $itemname="Short Sword";
  $weaponbase=5;
  $duality=1;
  $itemrange="Close";
  $itemspeed="Fast";
  $itemdescription="This short sword ";
  $itemvalue=4*$itemlevel*5;
  
  include ('php/enhance.php');
  
  }
  
  if ($rand==6)
  {
  $itemimage="cutlass";
  $itemname="Cutlass";
  $weaponbase=6;
  $duality=1;
  $itemrange="Close";
  $itemspeed="Normal";
  $itemdescription="This cutlass ";
  $itemvalue=5*$itemlevel*5;
  
  include ('php/enhance.php');
  
  }
  
  if ($rand==7)
  {
  $itemimage="sword";
  $itemname="Sword";
  $weaponbase=7;
  $duality=1;
  $itemrange="Close";
  $itemspeed="Normal";
  $itemdescription="This sword ";
  $itemvalue=6*$itemlevel*5;
  
  include ('php/enhance.php');
  
  }
  
  if ($rand==8)
  {
  $itemimage="rapier";
  $itemname="Rapier";
  $weaponbase=8;
  $duality=1;
  $itemrange="Close";
  $itemspeed="Fast";
  $itemdescription="This rapier ";
  $itemvalue=7*$itemlevel*5;
  
  include ('php/enhance.php');
  
  }
  
  if ($rand==9)
  {
  $itemimage="longsword";
  $itemname="Long Sword";
  $weaponbase=9;
  $duality=0;
  $itemrange="Close";
  $itemspeed="Slow";
  $itemdescription="This long sword ";
  $itemvalue=8*$itemlevel*5;
  
  include ('php/enhance.php');
  
  }
  
  if ($rand==10)
  {
  $itemimage="greatsword";
  $itemname="Great Sword";
  $weaponbase=10;
  $duality=0;
  $itemrange="Close";
  $itemspeed="Slow";
  $itemdescription="This great sword ";
  $itemvalue=9*$itemlevel*5;
  
  include ('php/enhance.php');
  
  }

}

if ($weapontype==2)
{
$weapontype="Staff/Wand";

$weaponbase=mt_rand(2,10);

if ($weaponbase==2)
  {
  $itemimage="branch";
  $itemname="Branch";
  $weaponbase=2;
  $duality=1;
  $itemrange="Close";
  $itemspeed="Fast";
  $itemdescription="This branch ";
  $itemvalue=1*$itemlevel*5;
  include ('php/enhance.php');
  
  }
  
  if ($weaponbase==3)
  {
  $itemimage="bamboocane";
  $itemname="Bamboo Cane";
  $weaponbase=3;
  $duality=1;
  $itemrange="Close";
  $itemspeed="Fast";
  $itemdescription="This bamboo cane ";
  $itemvalue=2*$itemlevel*5;
  include ('php/enhance.php');
  }
  if ($weaponbase==4)
  {
  $itemimage="walkingstick";
  $itemname="Walking Stick";
  $weaponbase=4;
  $duality=1;
  $itemrange="Close";
  $itemspeed="Normal";
  $itemdescription="This walking stick ";
  $itemvalue=3*$itemlevel*5;
  include ('php/enhance.php');
  }
  if ($weaponbase==5)
  {
  $itemimage="baton";
  $itemname="Baton";
  $weaponbase=5;
  $duality=1;
  $itemrange="Close";
  $itemspeed="Fast";
  $itemdescription="This baton ";
  $itemvalue=4*$itemlevel*5;
  include ('php/enhance.php');
  }
  
  if ($weaponbase==6)
  {
  $itemimage="staff";
  $itemname="Staff";
  $weaponbase=6;
  $duality=0;
  $itemrange="Close";
  $itemspeed="Normal";
  $itemdescription="This staff ";
  $itemvalue=5*$itemlevel*5;
  include ('php/enhance.php');
  }
  
  if ($weaponbase==7)
  {
  $itemimage="rod";
  $itemname="Rod";
  $weaponbase=7;
  $duality=1;
  $itemrange="Close";
  $itemspeed="Fast";
  $itemdescription="This rod ";
  $itemvalue=6*$itemlevel*5;
  include ('php/enhance.php');
  }
  
  if ($weaponbase==8)
  {
  $itemimage="pole";
  $itemname="Pole";
  $weaponbase=8;
  $duality=0;
  $itemrange="Close";
  $itemspeed="Slow";
  $itemdescription="This pole ";
  $itemvalue=7*$itemlevel*5;
  include ('php/enhance.php');
  }
  
  if ($weaponbase==9)
  {
  $itemimage="wand";
  $itemname="Wand";
  $weaponbase=9;
  $duality=1;
  $itemrange="Close";
  $itemspeed="Normal";
  $itemdescription="This wand ";
  $itemvalue=8*$itemlevel*5;
  include ('php/enhance.php');
  }
  
  if ($weaponbase==10)
  {
  $itemimage="cepter";
  $itemname="Cepter";
  $weaponbase=10;
  $duality=1;
  $itemrange="Close";
  $itemspeed="Normal";
  $itemdescription="This cepter ";
  $itemvalue=9*$itemlevel*5;
  include ('php/enhance.php');
  }
}

if ($weapontype==3)
{
$weapontype="Missile";
$weaponbase=mt_rand(2,10);

  if ($weaponbase==2)
  {
  $itemimage="blowdart";
  $itemname="Blowdart";
  $weaponbase=2;
  $duality=0;
  $itemrange="Long";
  $itemspeed="Fast";
  $itemdescription="This blowdart ";
  $itemvalue=1*$itemlevel*5;
  include ('php/enhance.php');
  }
  
  if ($weaponbase==3)
  {
  $itemimage="dart";
  $itemname="Dart";
  $weaponbase=3;
  $duality=1;
  $itemrange="Long";
  $itemspeed="Fast";
  $itemdescription="This dart ";
  $itemvalue=2*$itemlevel*5;
  include ('php/enhance.php');
  }
  if ($weaponbase==4)
  {
  $itemimage="sling";
  $itemname="Sling";
  $weaponbase=4;
  $duality=0;
  $itemrange="Long";
  $itemspeed="Normal";
  $itemdescription="This sling ";
  $itemvalue=3*$itemlevel*5;
  include ('php/enhance.php');
  
  }
  if ($weaponbase==5)
  {
  $itemimage="throwingknife";
  $itemname="Throwing Knife";
  $weaponbase=5;
  $duality=1;
  $itemrange="Long";
  $itemspeed="Normal";
  $itemdescription="This throwing knife ";
  $itemvalue=4*$itemlevel*5;
  include ('php/enhance.php');
  }
  
  if ($weaponbase==6)
  {
  $itemimage="shuriken";
  $itemname="Shuriken";
  $weaponbase=6;
  $duality=1;
  $itemrange="Long";
  $itemspeed="Fast";
  $itemdescription="This shuriken ";
  $itemvalue=5*$itemlevel*5;
  include ('php/enhance.php');
  }
  
  if ($weaponbase==7)
  {
  $itemimage="javelin";
  $itemname="Javelin";
  $weaponbase=7;
  $duality=0;
  $itemrange="Long";
  $itemspeed="Normal";
  $itemdescription="This javelin ";
  $itemvalue=6*$itemlevel*5;
  include ('php/enhance.php');
  }
  
  if ($weaponbase==8)
  {
  $itemimage="bow";
  $itemname="Bow";
  $weaponbase=8;
  $duality=0;
  $itemrange="Long";
  $itemspeed="Normal";
  $itemdescription="This bow ";
  $itemvalue=7*$itemlevel*5;
  include ('php/enhance.php');
  }
  
  if ($weaponbase==9)
  {
  $itemimage="crossbow";
  $itemname="Crossbow";
  $weaponbase=9;
  $duality=0;
  $itemrange="Long";
  $itemspeed="Slow";
  $itemdescription="This crossbow ";
  $itemvalue=8*$itemlevel*5;
  include ('php/enhance.php');
  }
  
  if ($weaponbase==10)
  {
  $itemimage="siegebow";
  $itemname="Siegebow";
  $weaponbase=10;
  $duality=0;
  $itemrange="Long";
  $itemspeed="Slow";
  $itemdescription="This siegebow ";
  $itemvalue=9*$itemlevel*5;
  include ('php/enhance.php');
  }

}

if ($weapontype==4)
{
$weapontype="Blunt";

$weaponbase=mt_rand(2,10);

if ($weaponbase==2)
  {
  $itemimage="club";
  $itemname="Club";
  $weaponbase=2;
  $duality=1;
  $itemrange="Close";
  $itemspeed="Fast";
  $itemdescription="This club ";
  $itemvalue=1*$itemlevel*5;
  include ('php/enhance.php');
  }
  
  if ($weaponbase==3)
  {
  $itemimage="hammer";
  $itemname="Hammer";
  $weaponbase=3;
  $duality=1;
  $itemrange="Close";
  $itemspeed="Fast";
  $itemdescription="This hammer ";
  $itemvalue=2*$itemlevel*5;
  include ('php/enhance.php');
  }
  if ($weaponbase==4)
  {
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
  include ('php/enhance.php');
  }
  if ($weaponbase==5)
  {
  $itemimage="flangedmace";
  $itemname="Flanged Mace";
  $weaponbase=5;
  $duality=1;
  $itemrange="Close";
  $itemspeed="Fast";
  $itemdescription="This flanged mace ";
  $itemvalue=4*$itemlevel*5;
  include ('php/enhance.php');
  }
  
  if ($weaponbase==6)
  {
  $itemimage="spikedmace";
  $itemname="Spiked Mace";
  $weaponbase=6;
  $duality=1;
  $itemrange="Close";
  $itemspeed="Fast";
  $itemdescription="This mace ";
  $itemvalue=5*$itemlevel*5;
  include ('php/enhance.php');
  }
  
  if ($weaponbase==7)
  {
  $itemimage="flail";
  $itemname="Flail";
  $weaponbase=7;
  $duality=1;
  $itemrange="Close";
  $itemspeed="Fast";
  $itemdescription="This flail ";
  $itemvalue=6*$itemlevel*5;
  include ('php/enhance.php');
  }
  
  if ($weaponbase==8)
  {
  $itemimage="dmorningstar";
  $itemname="Double Morningstar";
  $weaponbase=8;
  $duality=0;
  $itemrange="Close";
  $itemspeed="Normal";
  $itemdescription="This double morningstar ";
  $itemvalue=7*$itemlevel*5;
  include ('php/enhance.php');
  }
  
  if ($weaponbase==9)
  {
  $itemimage="tmorningstar";
  $itemname="Triple Morningstar";
  $weaponbase=9;
  $duality=0;
  $itemrange="Close";
  $itemspeed="Slow";
  $itemdescription="This triple morningstar ";
  $itemvalue=8*$itemlevel*5;
  }
  
  if ($weaponbase==10)
  {
  $itemimage="sledgehammer";
  $itemname="Sledge Hammer";
  $weaponbase=10;
  $duality=0;
  $itemrange="Close";
  $itemspeed="Slow";
  $itemdescription="This sledge hammer ";
  $itemvalue=9*$itemlevel*5;
  include ('php/enhance.php');
  }

}

if ($weapontype==5)
{
$weapontype="Pole-Arm";

$weaponbase=mt_rand(2,10);

if ($weaponbase==2)
  {
  $itemimage="pitchfork";
  $itemname="Pitchfork";
  $weaponbase=2;
  $duality=0;
  $itemrange="Close";
  $itemspeed="Slow";
  $itemdescription="This pitchfork ";
  $itemvalue=1*$itemlevel*5;
  include ('php/enhance.php');
  }
  
  if ($weaponbase==3)
  {
  $itemimage="hatchet";
  $itemname="Hatchet";
  $weaponbase=3;
  $duality=1;
  $itemrange="Close";
  $itemspeed="Fast";
  $itemdescription="This hatchet ";
  $itemvalue=2*$itemlevel*5;
  }
  if ($weaponbase==4)
  {
  $itemimage="ax";
  $itemname="Ax";
  $weaponbase=4;
  $duality=0;
  $itemrange="Close";
  $itemspeed="Normal";
  $itemdescription="This ax ";
  $itemvalue=3*$itemlevel*5;
  include ('php/enhance.php');
  }
  if ($weaponbase==5)
  {
  $itemimage="spear";
  $itemname="Spear";
  $weaponbase=5;
  $duality=1;
  $itemrange="Close";
  $itemspeed="Normal";
  $itemdescription="This spear ";
  $itemvalue=4*$itemlevel*5;
  include ('php/enhance.php');
  }
  
  if ($weaponbase==6)
  {
  $itemimage="lance";
  $itemname="Lance";
  $weaponbase=6;
  $duality=0;
  $itemrange="Medium";
  $itemspeed="Slow";
  $itemdescription="This lance ";
  $itemvalue=5*$itemlevel*5;
  include ('php/enhance.php');
  }
  
  if ($weaponbase==7)
  {
  $itemimage="scythe";
  $itemname="Scythe";
  $weaponbase=7;
  $duality=0;
  $itemrange="Medium";
  $itemspeed="Slow";
  $itemdescription="This scythe ";
  $itemvalue=6*$itemlevel*5;
  include ('php/enhance.php');
  }
  
  if ($weaponbase==8)
  {
  $itemimage="halbred";
  $itemname="Halbred";
  $weaponbase=8;
  $duality=0;
  $itemrange="Medium";
  $itemspeed="Normal";
  $itemdescription="This halbred ";
  $itemvalue=7*$itemlevel*5;
  include ('php/enhance.php');
  }
  
  if ($weaponbase==9)
  {
  $itemimage="trident";
  $itemname="Trident";
  $weaponbase=9;
  $duality=0;
  $itemrange="Medium";
  $itemspeed="Normal";
  $itemdescription="This trident ";
  $itemvalue=8*$itemlevel*5;
  include ('php/enhance.php');
  }
  
  if ($weaponbase==10)
  {
  $itemimage="poleaxe";
  $itemname="Pole-Axe";
  $weaponbase=10;
  $duality=0;
  $itemrange="Medium";
  $itemspeed="Slow";
  $itemdescription="This pole-axe ";
  $itemvalue=9*$itemlevel*5;
  include ('php/enhance.php');
  }

}

if ($weapontype==6)
{
$weapontype="Exotic";

$weaponbase=mt_rand(2,10);

 if ($weaponbase==2)
  {
  $itemimage="brassknuckles";
  $itemname="Brass Knuckles";
  $weaponbase=2;
  $duality=1;
  $itemrange="Close";
  $itemspeed="Fast";
  $itemdescription="This brass knuckles ";
  $itemvalue=1*$itemlevel;
  include ('php/enhance.php');
  }
  
  if ($weaponbase==3)
  {
  $itemimage="whip";
  $itemname="Whip";
  $weaponbase=3;
  $duality=1;
  $itemrange="Medium";
  $itemspeed="Fast";
  $itemdescription="This whip ";
  $itemvalue=2*$itemlevel;
  include ('php/enhance.php');
  }
  if ($weaponbase==4)
  {
  $itemimage="cattail";
  $itemname="Cat-tail";
  $weaponbase=4;
  $duality=1;
  $itemrange="Close";
  $itemspeed="Fast";
  $itemdescription="This cat-tail ";
  $itemvalue=3*$itemlevel;
  include ('php/enhance.php');  
  }
  if ($weaponbase==5)
  {
  $itemimage="claw";
  $itemname="Claw";
  $weaponbase=5;
  $duality=1;
  $itemrange="Close";
  $itemspeed="Fast";
  $itemdescription="This claw ";
  $itemvalue=4*$itemlevel;
  include ('php/enhance.php');
  }
  
  if ($weaponbase==6)
  {
  $itemimage="machete";
  $itemname="Machete";
  $weaponbase=6;
  $duality=1;
  $itemrange="Close";
  $itemspeed="Fast";
  $itemdescription="This machete ";
  $itemvalue=5*$itemlevel;
  include ('php/enhance.php');
  }
  
  if ($weaponbase==7)
  {
  $itemimage="nunchukas";
  $itemname="Nunchukas";
  $weaponbase=7;
  $duality=1;
  $itemrange="Close";
  $itemspeed="Fast";
  $itemdescription="This nunchukas ";
  $itemvalue=6*$itemlevel;
  include ('php/enhance.php');
  }
  
  if ($weaponbase==8)
  {
  $itemimage="spikedfist";
  $itemname="Spiked Fist";
  $weaponbase=8;
  $duality=1;
  $itemrange="Close";
  $itemspeed="Fast";
  $itemdescription="This spiked fist ";
  $itemvalue=7*$itemlevel;
  include ('php/enhance.php');
  }
  
  if ($weaponbase==9)
  {
  $itemimage="katana";
  $itemname="Katana";
  $weaponbase=9;
  $duality=1;
  $itemrange="Close";
  $itemspeed="Fast";
  $itemdescription="This katana ";
  $itemvalue=8*$itemlevel;
  include ('php/enhance.php');
  }
  
  if ($weaponbase==10)
  {
  $itemimage="boomstick";
  $itemname="Boom-Stick!";
  $weaponbase=10;
  $duality=1;
  $itemrange="Long";
  $itemspeed="Fast";
  $itemdescription="This BOOM-STICK ";
  $itemvalue=9*$itemlevel;
  include ('php/enhance.php');
  }
$itemvalue=$itemvalue*5;
}

}

if ($itemtype==2)
{
$itemtype="Armor";

$rand=mt_rand(1,6);
$material=mt_rand(1,6);
$itemvalue=$itemvalue*5;

if ($rand==1)
{
$equiplocation="Head";
$armortype="Helm";

if ($material==1)
{
$itemname="Cloth Hat";
$itemimage="clothhat";
$armorbase=2;
$itemdescription="This cloth hat ";
$itemvalue=1*$itemlevel;
include ('php/enhance.php');
}

if ($material==2)
{
$itemname="Canvas Hat";
$itemimage="canvashat";
$armorbase=3;
$itemdescription="This canvas hat ";
$itemvalue=2*$itemlevel;
include ('php/enhance.php');
}

if ($material==3)
{
$itemname="Leather Helm";
$itemimage="leatherhelm";
$armorbase=4;
$itemdescription="This leather helm ";
$itemvalue=3*$itemlevel;
include ('php/enhance.php');
}

if ($material==4)
{
$itemname="Splint Helm";
$itemimage="splinthelm";
$armorbase=4;
$itemdescription="This splint helm ";
$itemvalue=3*$itemlevel;
include ('php/enhance.php');
}

if ($material==5)
{
$itemname="Chain Helm";
$itemimage="chainhelm";
$armorbase=5;
$itemdescription="This chain helm ";
$itemvalue=4*$itemlevel;
include ('php/enhance.php');
}

if ($material==6)
{
$itemname="Plate Helm";
$itemimage="platehelm";
$armorbase=6;
$itemdescription="This plate helm ";
$itemvalue=5*$itemlevel;
include ('php/enhance.php');
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
$itemvalue=1*$itemlevel;
include ('php/enhance.php');
}

if ($material==2)
{
$itemname="Canvas Shirt";
$itemimage="canvasshirt";
$armorbase=3;
$itemdescription="This canvas shirt ";
$itemvalue=2*$itemlevel;
include ('php/enhance.php');
}

if ($material==3)
{
$itemname="Leather Chest Armor";
$itemimage="leatherchest";
$armorbase=4;
$itemdescription="This leather armor ";
$itemvalue=3*$itemlevel;
include ('php/enhance.php');
}

if ($material==4)
{
$itemname="Splint Chest Armor";
$itemimage="splintchest";
$armorbase=4;
$itemdescription="This splint armor ";
$itemvalue=3*$itemlevel;
include ('php/enhance.php');
}

if ($material==5)
{
$itemname="Chain Mail Chest Armor";
$itemimage="chainarmor";
$armorbase=5;
$itemdescription="This chain armor ";
$itemvalue=4*$itemlevel;
include ('php/enhance.php');
}

if ($material==6)
{
$itemname="Plate Armor";
$itemimage="platearmor";
$armorbase=6;
$itemdescription="This plate armor ";
$itemvalue=5*$itemlevel;
include ('php/enhance.php');
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
$itemvalue=1*$itemlevel;
include ('php/enhance.php');
}

if ($material==2)
{
$itemname="Canvas Pants";
$itemimage="canvaspants";
$armorbase=3;
$itemdescription="This canvas pair of pants ";
$itemvalue=2*$itemlevel;
include ('php/enhance.php');
}

if ($material==3)
{
$itemname="Leather Pants";
$itemimage="leatherpants";
$armorbase=4;
$itemdescription="This leather pair of pants ";
$itemvalue=3*$itemlevel;
include ('php/enhance.php');
}

if ($material==4)
{
$itemname="Splint Leg Armor";
$itemimage="splintlegs";
$armorbase=4;
$itemdescription="This splint leg armor ";
$itemvalue=3*$itemlevel;
include ('php/enhance.php');
}

if ($material==5)
{
$itemname="Chain Leg Armor";
$itemimage="chainlegs";
$armorbase=5;
$itemdescription="This chain leg armor ";
$itemvalue=4*$itemlevel;
include ('php/enhance.php');
}

if ($material==6)
{
$itemname="Plate Leg Armor";
$itemimage="platelegs";
$armorbase=6;
$itemdescription="This plate leg armor ";
$itemvalue=5*$itemlevel;
include ('php/enhance.php');
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
$itemvalue=1*$itemlevel;
include ('php/enhance.php');
}

if ($material==2)
{
$itemname="Canvas Gloves";
$itemimage="canvasgloves";
$armorbase=3;
$itemdescription="This pair of canvas gloves ";
$itemvalue=2*$itemlevel;
include ('php/enhance.php');
}

if ($material==3)
{
$itemname="Leather Gloves";
$itemimage="leathergloves";
$armorbase=4;
$itemdescription="This pair of leather gloves ";
$itemvalue=3*$itemlevel;
include ('php/enhance.php');
}

if ($material==4)
{
$itemname="Splint Gloves";
$itemimage="splintgloves";
$armorbase=4;
$itemdescription="This pair of splint gloves ";
$itemvalue=3*$itemlevel;
include ('php/enhance.php');
}

if ($material==5)
{
$itemname="Chain Gloves";
$itemimage="chaingloves";
$armorbase=5;
$itemdescription="This pair of chain gloves ";
$itemvalue=4*$itemlevel;
include ('php/enhance.php');
}

if ($material==6)
{
$itemname="Plate Gloves";
$itemimage="plategloves";
$armorbase=6;
$itemdescription="This pair of plate gloves ";
$itemvalue=5*$itemlevel;
include ('php/enhance.php');
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
$itemvalue=1*$itemlevel;
include ('php/enhance.php');
}

if ($material==2)
{
$itemname="Canvas Cloak";
$itemimage="canvascloak";
$armorbase=3;
$itemdescription="This canvas cloak ";
$itemvalue=2*$itemlevel;
include ('php/enhance.php');
}

if ($material==3)
{
$itemname="Leather Shoulders";
$itemimage="leathershoulders";
$armorbase=4;
$itemdescription="This pair of leather shoulders ";
$itemvalue=3*$itemlevel;
include ('php/enhance.php');
}

if ($material==4)
{
$itemname="Splint Shoulders";
$itemimage="splintshoulders";
$armorbase=4;
$itemdescription="This pair of splint shoulders ";
$itemvalue=3*$itemlevel;
include ('php/enhance.php');
}

if ($material==5)
{
$itemname="Chain Shoulders";
$itemimage="chainshoulders";
$armorbase=5;
$itemdescription="This pair of chain shoulders ";
$itemvalue=4*$itemlevel;
include ('php/enhance.php');
}

if ($material==6)
{
$itemname="Plate Shoulders";
$itemimage="plateshoulders";
$armorbase=6;
$itemdescription="This pair of plate shoulders ";
$itemvalue=5*$itemlevel;
include ('php/enhance.php');
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
$itemvalue=1*$itemlevel;
include ('php/enhance.php');
}

if ($material==2)
{
$itemname="Canvas Shoes";
$itemimage="canvasshoes";
$armorbase=3;
$itemdescription="This canvas pair of shoes ";
$itemvalue=2*$itemlevel;
include ('php/enhance.php');
}

if ($material==3)
{
$itemname="Leather Boots";
$itemimage="leatherboots";
$armorbase=4;
$itemdescription="This pair of leather boots ";
$itemvalue=3*$itemlevel;
include ('php/enhance.php');
}

if ($material==4)
{
$itemname="Splint Boots";
$itemimage="splintboots";
$armorbase=4;
$itemdescription="This pair of splint boots ";
$itemvalue=3*$itemlevel;
include ('php/enhance.php');
}

if ($material==5)
{
$itemname="Chain Boots";
$itemimage="chainboots";
$armorbase=5;
$itemdescription="This pair of chain boots ";
$itemvalue=4*$itemlevel;
include ('php/enhance.php');
}

if ($material==6)
{
$itemname="Plate Boots";
$itemimage="plateboots";
$armorbase=6;
$itemdescription="This pair of plate boots ";
$itemvalue=5*$itemlevel;
include ('php/enhance.php');
}
}

}

if ($itemtype==3)
{
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
include ('php/enhance.php');
}
if ($material==2)
{
$itemname="Copper Ring";
$itemimage="copperring";
$armorbase=3;
$itemdescription="This copper ring ";
$itemvalue=2*$itemlevel;
include ('php/enhance.php');
}

if ($material==3)
{
$itemname="Brass Ring";
$itemimage="brassring";
$armorbase=4;
$itemdescription="This brass ring ";
$itemvalue=3*$itemlevel;
include ('php/enhance.php');
}

if ($material==4)
{
$itemname="Silver Ring";
$itemimage="silverring";
$armorbase=5;
$itemdescription="This silver ring ";
$itemvalue=4*$itemlevel;
include ('php/enhance.php');
}

if ($material==5)
{
$itemname="Gold Ring";
$itemimage="goldring";
$armorbase=6;
$itemdescription="This gold ring ";
$itemvalue=5*$itemlevel;
include ('php/enhance.php');
}

if ($material==6)
{
$itemname="Platinum Ring";
$itemimage="platinumring";
$armorbase=7;
$itemdescription="This platinum ring ";
$itemvalue=6*$itemlevel;
include ('php/enhance.php');
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
include ('php/enhance.php');
}
if ($material==2)
{
$itemname="Onyx Amulet";
$itemimage="onyxamy";
$armorbase=3;
$itemdescription="This onyx amulet ";
$itemvalue=2*$itemlevel;
include ('php/enhance.php');
}

if ($material==3)
{
$itemname="Sapphire Amulet";
$itemimage="sapphireamy";
$armorbase=4;
$itemdescription="This sapphire amulet ";
$itemvalue=3*$itemlevel;
include ('php/enhance.php');
}

if ($material==4)
{
$itemname="Emerald Amulet";
$itemimage="emeraldamy";
$armorbase=5;
$itemdescription="This emerald amulet ";
$itemvalue=4*$itemlevel;
include ('php/enhance.php');
}

if ($material==5)
{
$itemname="Ruby Amulet";
$itemimage="rubyamy";
$armorbase=6;
$itemdescription="This ruby amulet ";
$itemvalue=5*$itemlevel;
include ('php/enhance.php');
}

if ($material==6)
{
$itemname="Diamond Amulet";
$itemimage="diamondamy";
$armorbase=7;
$itemdescription="This diamond amulet ";
$itemvalue=6*$itemlevel;
include ('php/enhance.php');
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
include ('php/enhance.php');
}
if ($material==2)
{
$itemname="Onyx Earrings";
$itemimage="onyxear";
$armorbase=3;
$itemdescription="This pair of onyx earrings ";
$itemvalue=2*$itemlevel;
include ('php/enhance.php');
}

if ($material==3)
{
$itemname="Sapphire Earrings";
$itemimage="sapphireear";
$armorbase=4;
$itemdescription="This pair of sapphire earrings ";
$itemvalue=3*$itemlevel;
include ('php/enhance.php');
}

if ($material==4)
{
$itemname="Emerald Earrings";
$itemimage="emeraldear";
$armorbase=5;
$itemdescription="This pair of emerald earrings ";
$itemvalue=4*$itemlevel;
include ('php/enhance.php');
}

if ($material==5)
{
$itemname="Ruby Earrings";
$itemimage="rubyear";
$armorbase=6;
$itemdescription="This pair of ruby earrings ";
$itemvalue=5*$itemlevel;
include ('php/enhance.php');
}

if ($material==6)
{
$itemname="Diamond Earrings";
$itemimage="diamondear";
$armorbase=7;
$itemdescription="This pair of diamond earrings ";
$itemvalue=6*$itemlevel;
include ('php/enhance.php');
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
include ('php/enhance.php');
}
if ($material==2)
{
$itemname="Sild Braided Bracelet";
$itemimage="silkbracelet";
$armorbase=3;
$itemdescription="This silk braided bracelet ";
$itemvalue=2*$itemlevel;
include ('php/enhance.php');
}

if ($material==3)
{
$itemname="Leather Bracers";
$itemimage="leatherbracers";
$armorbase=4;
$itemdescription="This pair of leather bracers ";
$itemvalue=3*$itemlevel;
include ('php/enhance.php');
}

if ($material==4)
{
$itemname="Splint Bracers";
$itemimage="splintbracers";
$armorbase=5;
$itemdescription="This pair of splint bracers ";
$itemvalue=4*$itemlevel;
include ('php/enhance.php');
}

if ($material==5)
{
$itemname="Chain Bracers";
$itemimage="chainbracers";
$armorbase=6;
$itemdescription="This pair of chain bracers ";
$itemvalue=5*$itemlevel;
include ('php/enhance.php');
}

if ($material==6)
{
$itemname="Plate Bracers";
$itemimage="platebracers";
$armorbase=7;
$itemdescription="This pair of plate bracers ";
$itemvalue=6*$itemlevel;
include ('php/enhance.php');
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
include ('php/enhance.php');
}
if ($material==2)
{
$itemname="Canvas Headband";
$itemimage="canvashead";
$armorbase=3;
$itemdescription="This canvas headband ";
$itemvalue=2*$itemlevel;
include ('php/enhance.php');
}

if ($material==3)
{
$itemname="Felt Headband";
$itemimage="felthead";
$armorbase=4;
$itemdescription="This felt headband ";
$itemvalue=3*$itemlevel;
include ('php/enhance.php');
}

if ($material==4)
{
$itemname="Silk Headband";
$itemimage="silkhead";
$armorbase=5;
$itemdescription="This silk headband ";
$itemvalue=4*$itemlevel;
include ('php/enhance.php');
}

if ($material==5)
{
$itemname="Velvet Headband";
$itemimage="velevethead";
$armorbase=6;
$itemdescription="This velvet headband ";
$itemvalue=5*$itemlevel;
include ('php/enhance.php');
}

if ($material==6)
{
$itemname="Leather Headband";
$itemimage="leatherhead";
$armorbase=7;
$itemdescription="This leather headband ";
$itemvalue=6*$itemlevel;
include ('php/enhance.php');
}
}


}


}


else
{


//************************
if ($rand<101)
{
//common item

$itemtype=mt_rand(1,3);

if ($itemtype==1)
{
$itemtype="Weapon";

$weapontype=mt_rand(1,6);

if ($weapontype==1)
{
$weapontype="Blade";

$rand=mt_rand(2,10);
if ($rand==2)
{
$itemimage="rustedknife";
  $itemname="Rusted Knife";
  $weaponbase=2;
  $duality=1;
  $itemrange="Close";
  $itemspeed="Fast";
  $itemdescription="This is an ordinary, rusted kitchen knife.";
  $itemvalue=1*$itemlevel;
}

if ($rand==3)
  {
  $itemimage="dirk";
  $itemname="Dirk";
  $weaponbase=3;
  $duality=1;
  $itemrange="Close";
  $itemspeed="Fast";
  $itemdescription="This is an ordinary dirk.";
  $itemvalue=2*$itemlevel;
  }
  if ($rand==4)
  {
  $itemimage="dagger";
  $itemname="Dagger";
  $weaponbase=4;
  $duality=1;
  $itemrange="Close";
  $itemspeed="Fast";
  $itemdescription="This is an ordinary dagger.";
  $itemvalue=3*$itemlevel;
  }
  if ($rand==5)
  {
  $itemimage="shortsword";
  $itemname="Short Sword";
  $weaponbase=5;
  $duality=1;
  $itemrange="Close";
  $itemspeed="Fast";
  $itemdescription="This is an ordinary short sword.";
  $itemvalue=4*$itemlevel;
  }
  
  if ($rand==6)
  {
  $itemimage="cutlass";
  $itemname="Cutlass";
  $weaponbase=6;
  $duality=1;
  $itemrange="Close";
  $itemspeed="Normal";
  $itemdescription="This is an ordinary cutlass.";
  $itemvalue=5*$itemlevel;
  }
  
  if ($rand==7)
  {
  $itemimage="sword";
  $itemname="Sword";
  $weaponbase=7;
  $duality=1;
  $itemrange="Close";
  $itemspeed="Normal";
  $itemdescription="This is an ordinary sword.";
  $itemvalue=6*$itemlevel;
  }
  
  if ($rand==8)
  {
  $itemimage="rapier";
  $itemname="Rapier";
  $weaponbase=8;
  $duality=1;
  $itemrange="Close";
  $itemspeed="Fast";
  $itemdescription="This is an ordinary rapier.";
  $itemvalue=7*$itemlevel;
  }
  
  if ($rand==9)
  {
  $itemimage="longsword";
  $itemname="Long Sword";
  $weaponbase=9;
  $duality=0;
  $itemrange="Close";
  $itemspeed="Slow";
  $itemdescription="This is an ordinary long sword.";
  $itemvalue=8*$itemlevel;
  }
  
  if ($rand==10)
  {
  $itemimage="greatsword";
  $itemname="Great Sword";
  $weaponbase=10;
  $duality=0;
  $itemrange="Close";
  $itemspeed="Slow";
  $itemdescription="This is an ordinary great sword.";
  $itemvalue=9*$itemlevel;
  }

}

if ($weapontype==2)
{
$weapontype="Staff/Wand";

$weaponbase=mt_rand(2,10);

if ($weaponbase==2)
  {
  $itemimage="branch";
  $itemname="Branch";
  $weaponbase=2;
  $duality=1;
  $itemrange="Close";
  $itemspeed="Fast";
  $itemdescription="This is an ordinary branch.";
  $itemvalue=1*$itemlevel;
  }
  
  if ($weaponbase==3)
  {
  $itemimage="bamboocane";
  $itemname="Bamboo Cane";
  $weaponbase=3;
  $duality=1;
  $itemrange="Close";
  $itemspeed="Fast";
  $itemdescription="This is an ordinary bamboo cane.";
  $itemvalue=2*$itemlevel;
  }
  if ($weaponbase==4)
  {
  $itemimage="walkingstick";
  $itemname="Walking Stick";
  $weaponbase=4;
  $duality=1;
  $itemrange="Close";
  $itemspeed="Normal";
  $itemdescription="This is an ordinary walking stick.";
  $itemvalue=3*$itemlevel;
  }
  if ($weaponbase==5)
  {
  $itemimage="baton";
  $itemname="Baton";
  $weaponbase=5;
  $duality=1;
  $itemrange="Close";
  $itemspeed="Fast";
  $itemdescription="This is an ordinary baton.";
  $itemvalue=4*$itemlevel;
  }
  
  if ($weaponbase==6)
  {
  $itemimage="staff";
  $itemname="Staff";
  $weaponbase=6;
  $duality=0;
  $itemrange="Close";
  $itemspeed="Normal";
  $itemdescription="This is an ordinary staff.";
  $itemvalue=5*$itemlevel;
  }
  
  if ($weaponbase==7)
  {
  $itemimage="rod";
  $itemname="Rod";
  $weaponbase=7;
  $duality=1;
  $itemrange="Close";
  $itemspeed="Fast";
  $itemdescription="This is an ordinary rod.";
  $itemvalue=6*$itemlevel;
  }
  
  if ($weaponbase==8)
  {
  $itemimage="pole";
  $itemname="Pole";
  $weaponbase=8;
  $duality=0;
  $itemrange="Close";
  $itemspeed="Slow";
  $itemdescription="This is an ordinary pole.";
  $itemvalue=7*$itemlevel;
  }
  
  if ($weaponbase==9)
  {
  $itemimage="wand";
  $itemname="Wand";
  $weaponbase=9;
  $duality=1;
  $itemrange="Close";
  $itemspeed="Normal";
  $itemdescription="This is an ordinary wand.";
  $itemvalue=8*$itemlevel;
  }
  
  if ($weaponbase==10)
  {
  $itemimage="cepter";
  $itemname="Cepter";
  $weaponbase=10;
  $duality=1;
  $itemrange="Close";
  $itemspeed="Normal";
  $itemdescription="This is an ordinary cepter.";
  $itemvalue=9*$itemlevel;
  }
}

if ($weapontype==3)
{
$weapontype="Missile";
$weaponbase=mt_rand(2,10);

if ($weaponbase==2)
  {
  $itemimage="blowdart";
  $itemname="Blowdart";
  $weaponbase=2;
  $duality=0;
  $itemrange="Long";
  $itemspeed="Fast";
  $itemdescription="This is an ordinary blowdart.";
  $itemvalue=1*$itemlevel;
  }
  
  if ($weaponbase==3)
  {
  $itemimage="dart";
  $itemname="Dart";
  $weaponbase=3;
  $duality=1;
  $itemrange="Long";
  $itemspeed="Fast";
  $itemdescription="This is an ordinary dart.";
  $itemvalue=2*$itemlevel;
  }
  if ($weaponbase==4)
  {
  $itemimage="sling";
  $itemname="Sling";
  $weaponbase=4;
  $duality=0;
  $itemrange="Long";
  $itemspeed="Normal";
  $itemdescription="This is an ordinary sling.";
  $itemvalue=3*$itemlevel;
  }
  if ($weaponbase==5)
  {
  $itemimage="throwingknife";
  $itemname="Throwing Knife";
  $weaponbase=5;
  $duality=1;
  $itemrange="Long";
  $itemspeed="Normal";
  $itemdescription="This is an ordinary throwing knife.";
  $itemvalue=4*$itemlevel;
  }
  
  if ($weaponbase==6)
  {
  $itemimage="shuriken";
  $itemname="Shuriken";
  $weaponbase=6;
  $duality=1;
  $itemrange="Long";
  $itemspeed="Fast";
  $itemdescription="This is an ordinary shuriken.";
  $itemvalue=5*$itemlevel;
  }
  
  if ($weaponbase==7)
  {
  $itemimage="javelin";
  $itemname="Javelin";
  $weaponbase=7;
  $duality=0;
  $itemrange="Long";
  $itemspeed="Normal";
  $itemdescription="This is an ordinary javelin.";
  $itemvalue=6*$itemlevel;
  }
  
  if ($weaponbase==8)
  {
  $itemimage="bow";
  $itemname="Bow";
  $weaponbase=8;
  $duality=0;
  $itemrange="Long";
  $itemspeed="Normal";
  $itemdescription="This is an ordinary bow.";
  $itemvalue=7*$itemlevel;
  }
  
  if ($weaponbase==9)
  {
  $itemimage="crossbow";
  $itemname="Crossbow";
  $weaponbase=9;
  $duality=0;
  $itemrange="Long";
  $itemspeed="Slow";
  $itemdescription="This is an ordinary crossbow.";
  $itemvalue=8*$itemlevel;
  }
  
  if ($weaponbase==10)
  {
  $itemimage="siegebow";
  $itemname="Siegebow";
  $weaponbase=10;
  $duality=0;
  $itemrange="Long";
  $itemspeed="Slow";
  $itemdescription="This is an ordinary siegebow.";
  $itemvalue=9*$itemlevel;
  }

}

if ($weapontype==4)
{
$weapontype="Blunt";

$weaponbase=mt_rand(2,10);

if ($weaponbase==2)
  {
  $itemimage="club";
  $itemname="Club";
  $weaponbase=2;
  $duality=1;
  $itemrange="Close";
  $itemspeed="Fast";
  $itemdescription="This is an ordinary club.";
  $itemvalue=1*$itemlevel;
  }
  
  if ($weaponbase==3)
  {
  $itemimage="hammer";
  $itemname="Hammer";
  $weaponbase=3;
  $duality=1;
  $itemrange="Close";
  $itemspeed="Fast";
  $itemdescription="This is an ordinary hammer.";
  $itemvalue=2*$itemlevel;
  }
  if ($weaponbase==4)
  {
  $itemimage="shield";
  $itemname="Shield";
  $weaponbase=4;
  $duality=1;
  $itemrange="Close";
  $itemspeed="Normal";
  $itemdescription="This is an ordinary shield.";
  $itemvalue=3*$itemlevel;
  $defense=1*$itemlevel;
  $blocking=1*$itemlevel;
  }
  if ($weaponbase==5)
  {
  $itemimage="flangedmace";
  $itemname="Flanged Mace";
  $weaponbase=5;
  $duality=1;
  $itemrange="Close";
  $itemspeed="Fast";
  $itemdescription="This is an ordinary flanged mace.";
  $itemvalue=4*$itemlevel;
  }
  
  if ($weaponbase==6)
  {
  $itemimage="spikedmace";
  $itemname="Spiked Mace";
  $weaponbase=6;
  $duality=1;
  $itemrange="Close";
  $itemspeed="Fast";
  $itemdescription="This is an ordinary spiked mace.";
  $itemvalue=5*$itemlevel;
  }
  
  if ($weaponbase==7)
  {
  $itemimage="flail";
  $itemname="Flail";
  $weaponbase=7;
  $duality=1;
  $itemrange="Close";
  $itemspeed="Fast";
  $itemdescription="This is an ordinary flail.";
  $itemvalue=6*$itemlevel;
  }
  
  if ($weaponbase==8)
  {
  $itemimage="dmorningstar";
  $itemname="Double Morningstar";
  $weaponbase=8;
  $duality=0;
  $itemrange="Close";
  $itemspeed="Normal";
  $itemdescription="This is an ordinary double morningstar.";
  $itemvalue=7*$itemlevel;
  }
  
  if ($weaponbase==9)
  {
  $itemimage="tmorningstar";
  $itemname="Triple Morningstar";
  $weaponbase=9;
  $duality=0;
  $itemrange="Close";
  $itemspeed="Slow";
  $itemdescription="This is an ordinary triple morningstar.";
  $itemvalue=8*$itemlevel;
  }
  
  if ($weaponbase==10)
  {
  $itemimage="sledgehammer";
  $itemname="Sledge Hammer";
  $weaponbase=10;
  $duality=0;
  $itemrange="Close";
  $itemspeed="Slow";
  $itemdescription="This is an ordinary sledge hammer.";
  $itemvalue=9*$itemlevel;
  }

}

if ($weapontype==5)
{
$weapontype="Pole-Arm";

$weaponbase=mt_rand(2,10);

if ($weaponbase==2)
  {
  $itemimage="pitchfork";
  $itemname="Pitchfork";
  $weaponbase=2;
  $duality=0;
  $itemrange="Close";
  $itemspeed="Slow";
  $itemdescription="This is an ordinary pitchfork.";
  $itemvalue=1*$itemlevel;
  }
  
  if ($weaponbase==3)
  {
  $itemimage="hatchet";
  $itemname="Hatchet";
  $weaponbase=3;
  $duality=1;
  $itemrange="Close";
  $itemspeed="Fast";
  $itemdescription="This is an ordinary hatchet.";
  $itemvalue=2*$itemlevel;
  }
  if ($weaponbase==4)
  {
  $itemimage="ax";
  $itemname="Ax";
  $weaponbase=4;
  $duality=0;
  $itemrange="Close";
  $itemspeed="Normal";
  $itemdescription="This is an ordinary ax.";
  $itemvalue=3*$itemlevel;
  
  }
  if ($weaponbase==5)
  {
  $itemimage="spear";
  $itemname="Spear";
  $weaponbase=5;
  $duality=1;
  $itemrange="Close";
  $itemspeed="Normal";
  $itemdescription="This is an ordinary spear.";
  $itemvalue=4*$itemlevel;
  }
  
  if ($weaponbase==6)
  {
  $itemimage="lance";
  $itemname="Lance";
  $weaponbase=6;
  $duality=0;
  $itemrange="Medium";
  $itemspeed="Slow";
  $itemdescription="This is an ordinary lance.";
  $itemvalue=5*$itemlevel;
  }
  
  if ($weaponbase==7)
  {
  $itemimage="scythe";
  $itemname="Scythe";
  $weaponbase=7;
  $duality=0;
  $itemrange="Medium";
  $itemspeed="Slow";
  $itemdescription="This is an ordinary scythe.";
  $itemvalue=6*$itemlevel;
  }
  
  if ($weaponbase==8)
  {
  $itemimage="halbred";
  $itemname="Halbred";
  $weaponbase=8;
  $duality=0;
  $itemrange="Medium";
  $itemspeed="Normal";
  $itemdescription="This is an ordinary halbred.";
  $itemvalue=7*$itemlevel;
  }
  
  if ($weaponbase==9)
  {
  $itemimage="trident";
  $itemname="Trident";
  $weaponbase=9;
  $duality=0;
  $itemrange="Medium";
  $itemspeed="Normal";
  $itemdescription="This is an ordinary trident.";
  $itemvalue=8*$itemlevel;
  }
  
  if ($weaponbase==10)
  {
  $itemimage="poleaxe";
  $itemname="Pole-Axe";
  $weaponbase=10;
  $duality=0;
  $itemrange="Medium";
  $itemspeed="Slow";
  $itemdescription="This is an ordinary pole-axe.";
  $itemvalue=9*$itemlevel;
  }

}

if ($weapontype==6)
{
$weapontype="Exotic";

$weaponbase=mt_rand(2,10);

 if ($weaponbase==2)
  {
  $itemimage="brassknuckles";
  $itemname="Brass Knuckles";
  $weaponbase=2;
  $duality=1;
  $itemrange="Close";
  $itemspeed="Fast";
  $itemdescription="This is an ordinary brass knuckles.";
  $itemvalue=1*$itemlevel;
  }
  
  if ($weaponbase==3)
  {
  $itemimage="whip";
  $itemname="Whip";
  $weaponbase=3;
  $duality=1;
  $itemrange="Medium";
  $itemspeed="Fast";
  $itemdescription="This is an ordinary whip.";
  $itemvalue=2*$itemlevel;
  }
  if ($weaponbase==4)
  {
  $itemimage="cattail";
  $itemname="Cat-tail";
  $weaponbase=4;
  $duality=1;
  $itemrange="Close";
  $itemspeed="Fast";
  $itemdescription="This is an ordinary cat-tail.";
  $itemvalue=3*$itemlevel;
  
  }
  if ($weaponbase==5)
  {
  $itemimage="claw";
  $itemname="Claw";
  $weaponbase=5;
  $duality=1;
  $itemrange="Close";
  $itemspeed="Fast";
  $itemdescription="This is an ordinary claw.";
  $itemvalue=4*$itemlevel;
  }
  
  if ($weaponbase==6)
  {
  $itemimage="machete";
  $itemname="Machete";
  $weaponbase=6;
  $duality=1;
  $itemrange="Close";
  $itemspeed="Fast";
  $itemdescription="This is an ordinary machete.";
  $itemvalue=5*$itemlevel;
  }
  
  if ($weaponbase==7)
  {
  $itemimage="nunchukas";
  $itemname="Nunchukas";
  $weaponbase=7;
  $duality=1;
  $itemrange="Close";
  $itemspeed="Fast";
  $itemdescription="This is an ordinary nunchukas.";
  $itemvalue=6*$itemlevel;
  }
  
  if ($weaponbase==8)
  {
  $itemimage="spikedfist";
  $itemname="Spiked Fist";
  $weaponbase=8;
  $duality=1;
  $itemrange="Close";
  $itemspeed="Fast";
  $itemdescription="This is an ordinary spiked fist.";
  $itemvalue=7*$itemlevel;
  }
  
  if ($weaponbase==9)
  {
  $itemimage="katana";
  $itemname="Katana";
  $weaponbase=9;
  $duality=1;
  $itemrange="Close";
  $itemspeed="Fast";
  $itemdescription="This is an ordinary katana.";
  $itemvalue=8*$itemlevel;
  }
  
  if ($weaponbase==10)
  {
  $itemimage="boomstick";
  $itemname="Boom-Stick!";
  $weaponbase=10;
  $duality=1;
  $itemrange="Long";
  $itemspeed="Fast";
  $itemdescription="This is a BOOM-STICK!";
  $itemvalue=9*$itemlevel;
  }

}

}

if ($itemtype==2)
{
$itemtype="Armor";

$rand=mt_rand(1,6);
$material=mt_rand(1,6);

if ($rand==1)
{
$equiplocation="Head";
$armortype="Helm";

if ($material==1)
{
$itemname="Cloth Hat";
$itemimage="clothhat";
$armorbase=2;
$itemdescription="This is an ordinary cloth hat.";
$itemvalue=1*$itemlevel;
}

if ($material==2)
{
$itemname="Canvas Hat";
$itemimage="canvashat";
$armorbase=3;
$itemdescription="This is an ordinary canvas hat.";
$itemvalue=2*$itemlevel;
}

if ($material==3)
{
$itemname="Leather Helm";
$itemimage="leatherhelm";
$armorbase=4;
$itemdescription="This is an ordinary leather helm.";
$itemvalue=3*$itemlevel;
}

if ($material==4)
{
$itemname="Splint Helm";
$itemimage="splinthelm";
$armorbase=4;
$itemdescription="This is an ordinary splint helm.";
$itemvalue=3*$itemlevel;
}

if ($material==5)
{
$itemname="Chain Helm";
$itemimage="chainhelm";
$armorbase=5;
$itemdescription="This is an ordinary chain helm.";
$itemvalue=4*$itemlevel;
}

if ($material==6)
{
$itemname="Plate Helm";
$itemimage="platehelm";
$armorbase=6;
$itemdescription="This is an ordinary plate helm.";
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
$itemdescription="This is an ordinary cloth shirt.";
$itemvalue=1*$itemlevel;
}

if ($material==2)
{
$itemname="Canvas Shirt";
$itemimage="canvasshirt";
$armorbase=3;
$itemdescription="This is an ordinary canvas shirt.";
$itemvalue=2*$itemlevel;
}

if ($material==3)
{
$itemname="Leather Chest Armor";
$itemimage="leatherchest";
$armorbase=4;
$itemdescription="This is an ordinary leather armor.";
$itemvalue=3*$itemlevel;
}

if ($material==4)
{
$itemname="Splint Chest Armor";
$itemimage="splintchest";
$armorbase=4;
$itemdescription="This is an ordinary splint armor.";
$itemvalue=3*$itemlevel;
}

if ($material==5)
{
$itemname="Chain Mail Chest Armor";
$itemimage="chainarmor";
$armorbase=5;
$itemdescription="This is an ordinary chain armor.";
$itemvalue=4*$itemlevel;
}

if ($material==6)
{
$itemname="Plate Armor";
$itemimage="platearmor";
$armorbase=6;
$itemdescription="This is an ordinary plate armor.";
$itemvalue=5*$itemlevel;
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
$itemdescription="This is an ordinary pair of cloth pants.";
$itemvalue=1*$itemlevel;
}

if ($material==2)
{
$itemname="Canvas Pants";
$itemimage="canvaspants";
$armorbase=3;
$itemdescription="This is an ordinary canvas pair of pants.";
$itemvalue=2*$itemlevel;
}

if ($material==3)
{
$itemname="Leather Pants";
$itemimage="leatherpants";
$armorbase=4;
$itemdescription="This is an ordinary leather pair of pants.";
$itemvalue=3*$itemlevel;
}

if ($material==4)
{
$itemname="Splint Leg Armor";
$itemimage="splintlegs";
$armorbase=4;
$itemdescription="This is an ordinary splint leg armor.";
$itemvalue=3*$itemlevel;
}

if ($material==5)
{
$itemname="Chain Leg Armor";
$itemimage="chainlegs";
$armorbase=5;
$itemdescription="This is an ordinary chain leg armor.";
$itemvalue=4*$itemlevel;
}

if ($material==6)
{
$itemname="Plate Leg Armor";
$itemimage="platelegs";
$armorbase=6;
$itemdescription="This is an ordinary plate leg armor.";
$itemvalue=5*$itemlevel;
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
$itemdescription="These are ordinary cloth gloves.";
$itemvalue=1*$itemlevel;
}

if ($material==2)
{
$itemname="Canvas Gloves";
$itemimage="canvasgloves";
$armorbase=3;
$itemdescription="These are ordinary canvas gloves.";
$itemvalue=2*$itemlevel;
}

if ($material==3)
{
$itemname="Leather Gloves";
$itemimage="leathergloves";
$armorbase=4;
$itemdescription="These are ordinary leather gloves.";
$itemvalue=3*$itemlevel;
}

if ($material==4)
{
$itemname="Splint Gloves";
$itemimage="splintgloves";
$armorbase=4;
$itemdescription="These are ordinary splint gloves.";
$itemvalue=3*$itemlevel;
}

if ($material==5)
{
$itemname="Chain Gloves";
$itemimage="chaingloves";
$armorbase=5;
$itemdescription="These are ordinary chain gloves.";
$itemvalue=4*$itemlevel;
}

if ($material==6)
{
$itemname="Plate Gloves";
$itemimage="plategloves";
$armorbase=6;
$itemdescription="These are ordinary plate gloves.";
$itemvalue=5*$itemlevel;
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
$itemdescription="This is an ordinary cloth cloak.";
$itemvalue=1*$itemlevel;
}

if ($material==2)
{
$itemname="Canvas Cloak";
$itemimage="canvascloak";
$armorbase=3;
$itemdescription="This is an ordinary canvas cloak.";
$itemvalue=2*$itemlevel;
}

if ($material==3)
{
$itemname="Leather Shoulders";
$itemimage="leathershoulders";
$armorbase=4;
$itemdescription="These are ordinary leather shoulders.";
$itemvalue=3*$itemlevel;
}

if ($material==4)
{
$itemname="Splint Shoulders";
$itemimage="splintshoulders";
$armorbase=4;
$itemdescription="These are ordinary splint shoulders.";
$itemvalue=3*$itemlevel;
}

if ($material==5)
{
$itemname="Chain Shoulders";
$itemimage="chainshoulders";
$armorbase=5;
$itemdescription="These are ordinary chain shoulders.";
$itemvalue=4*$itemlevel;
}

if ($material==6)
{
$itemname="Plate Shoulders";
$itemimage="plateshoulders";
$armorbase=6;
$itemdescription="These are ordinary plate shoulders.";
$itemvalue=5*$itemlevel;
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
$itemdescription="This is an ordinary cloth pair of shoes.";
$itemvalue=1*$itemlevel;
}

if ($material==2)
{
$itemname="Canvas Shoes";
$itemimage="canvasshoes";
$armorbase=3;
$itemdescription="This is an ordinary canvas pair of shoes.";
$itemvalue=2*$itemlevel;
}

if ($material==3)
{
$itemname="Leather Boots";
$itemimage="leatherboots";
$armorbase=4;
$itemdescription="These are ordinary leather boots.";
$itemvalue=3*$itemlevel;
}

if ($material==4)
{
$itemname="Splint Boots";
$itemimage="splintboots";
$armorbase=4;
$itemdescription="These are ordinary splint boots.";
$itemvalue=3*$itemlevel;
}

if ($material==5)
{
$itemname="Chain Boots";
$itemimage="chainboots";
$armorbase=5;
$itemdescription="These are ordinary chain boots.";
$itemvalue=4*$itemlevel;
}

if ($material==6)
{
$itemname="Plate Boots";
$itemimage="plateboots";
$armorbase=6;
$itemdescription="These are ordinary plate boots.";
$itemvalue=5*$itemlevel;
}
}

}

if ($itemtype==3)
{
$itemtype="Accessory";

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
$itemdescription="This is an ordinary bone ring.";
$itemvalue=1*$itemlevel;
}
if ($material==2)
{
$itemname="Copper Ring";
$itemimage="copperring";
$armorbase=3;
$itemdescription="This is an ordinary copper ring.";
$itemvalue=2*$itemlevel;
}

if ($material==3)
{
$itemname="Brass Ring";
$itemimage="brassring";
$armorbase=4;
$itemdescription="This is an ordinary brass ring.";
$itemvalue=3*$itemlevel;
}

if ($material==4)
{
$itemname="Silver Ring";
$itemimage="silverring";
$armorbase=5;
$itemdescription="This is an ordinary silver ring.";
$itemvalue=4*$itemlevel;
}

if ($material==5)
{
$itemname="Gold Ring";
$itemimage="goldring";
$armorbase=6;
$itemdescription="This is an ordinary gold ring.";
$itemvalue=5*$itemlevel;
}

if ($material==6)
{
$itemname="Platinum Ring";
$itemimage="platinumring";
$armorbase=7;
$itemdescription="This is an ordinary platinum ring.";
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
$itemdescription="This is an ordinary pearl amulet.";
$itemvalue=1*$itemlevel;
}
if ($material==2)
{
$itemname="Onyx Amulet";
$itemimage="onyxamy";
$armorbase=3;
$itemdescription="This is an ordinary onyx amulet.";
$itemvalue=2*$itemlevel;
}

if ($material==3)
{
$itemname="Sapphire Amulet";
$itemimage="sapphireamy";
$armorbase=4;
$itemdescription="This is an ordinary sapphire amulet.";
$itemvalue=3*$itemlevel;
}

if ($material==4)
{
$itemname="Emerald Amulet";
$itemimage="emeraldamy";
$armorbase=5;
$itemdescription="This is an ordinary emerald amulet.";
$itemvalue=4*$itemlevel;
}

if ($material==5)
{
$itemname="Ruby Amulet";
$itemimage="rubyamy";
$armorbase=6;
$itemdescription="This is an ordinary ruby amulet.";
$itemvalue=5*$itemlevel;
}

if ($material==6)
{
$itemname="Diamond Amulet";
$itemimage="diamondamy";
$armorbase=7;
$itemdescription="This is an ordinary diamond amulet.";
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
$itemdescription="This is an ordinary pair of pearl earrings.";
$itemvalue=1*$itemlevel;
}
if ($material==2)
{
$itemname="Onyx Earrings";
$itemimage="onyxear";
$armorbase=3;
$itemdescription="This is an ordinary pair of onyx earrings.";
$itemvalue=2*$itemlevel;
}

if ($material==3)
{
$itemname="Sapphire Earrings";
$itemimage="sapphireear";
$armorbase=4;
$itemdescription="This is an ordinary pair of sapphire earrings.";
$itemvalue=3*$itemlevel;
}

if ($material==4)
{
$itemname="Emerald Earrings";
$itemimage="emeraldear";
$armorbase=5;
$itemdescription="This is an ordinary pair of emerald earrings.";
$itemvalue=4*$itemlevel;
}

if ($material==5)
{
$itemname="Ruby Earrings";
$itemimage="rubyear";
$armorbase=6;
$itemdescription="This is an ordinary pair of ruby earrings.";
$itemvalue=5*$itemlevel;
}

if ($material==6)
{
$itemname="Diamond Earrings";
$itemimage="diamondear";
$armorbase=7;
$itemdescription="This is an ordinary pair of diamond earrings.";
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
$itemdescription="This is an ordinary tweed bracelet.";
$itemvalue=1*$itemlevel;
}
if ($material==2)
{
$itemname="Silk Braided Bracelet";
$itemimage="silkbracelet";
$armorbase=3;
$itemdescription="This is an ordinary silk braided bracelet.";
$itemvalue=2*$itemlevel;
}

if ($material==3)
{
$itemname="Leather Bracers";
$itemimage="leatherbracers";
$armorbase=4;
$itemdescription="This is an ordinary pair of leather bracers.";
$itemvalue=3*$itemlevel;
}

if ($material==4)
{
$itemname="Splint Bracers";
$itemimage="splintbracers";
$armorbase=5;
$itemdescription="This is an ordinary pair of splint bracers.";
$itemvalue=4*$itemlevel;
}

if ($material==5)
{
$itemname="Chain Bracers";
$itemimage="chainbracers";
$armorbase=6;
$itemdescription="This is an ordinary pair of chain bracers.";
$itemvalue=5*$itemlevel;
}

if ($material==6)
{
$itemname="Plate Bracers";
$itemimage="platebracers";
$armorbase=7;
$itemdescription="This is an ordinary pair of plate bracers.";
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
$itemdescription="This is an ordinary tweed headband.";
$itemvalue=1*$itemlevel;
}
if ($material==2)
{
$itemname="Canvas Headband";
$itemimage="canvashead";
$armorbase=3;
$itemdescription="This is an ordinary canvas headband.";
$itemvalue=2*$itemlevel;
}

if ($material==3)
{
$itemname="Felt Headband";
$itemimage="felthead";
$armorbase=4;
$itemdescription="This is an ordinary felt headband.";
$itemvalue=3*$itemlevel;
}

if ($material==4)
{
$itemname="Silk Headband";
$itemimage="silkhead";
$armorbase=5;
$itemdescription="This is an ordinary silk headband.";
$itemvalue=4*$itemlevel;
}

if ($material==5)
{
$itemname="Velvet Headband";
$itemimage="velevethead";
$armorbase=6;
$itemdescription="This is an ordinary velvet headband.";
$itemvalue=5*$itemlevel;
}

if ($material==6)
{
$itemname="Leather Headband";
$itemimage="leatherhead";
$armorbase=7;
$itemdescription="This is an ordinary leather headband.";
$itemvalue=6*$itemlevel;
}
}
}
}
}
}
}
}

$query = sprintf("insert into inventory values(
'%s',
'%s',
'%s',
'%s',
'%s',
'%s',
'%s',
'%s',
'%s',
'%s',
'%s',
'%s',
'%s',
'%s',
'%s',
'%s',
'%s',
'%s',
'%s',
'%s',
'%s',
'%s',
'%s',
'%s',
'%s',
'%s',
'%s',
'%s',
'%s',
'%s',
'%s',
'%s',
'%s',
'%s',
'%s',
'%s',
'%s',
'%s',
'%s',
'%s',
'%s',
'%s',
'%s',
'%s',
'%s',
'%s',
'%s',
'%s',
'%s',
'%s',
'%s',
'%s',
'%s',
'%s',
'%s',
'%s',
'%s',
'%s',
'%s',
'%s',
'%s',
'%s',
'%s',
'%s',
'%s',
'%s',
'%s',
'%s',
'%s',
'%s',
'%s',
'%s',
'%s',
'%s',
'%s',
'%s',
'%s',
'%s',
'%s',
'%s',
'%s',
'%s',
'%s',
'%s',
'%s',
'%s',
'%s',
'%s',
'%s',
'%s',
'%s',
'%s',
'%s',
'%s',
'%s',
'%s',
'%s',
'%s',
'%s',
'%s',
'%s',
'%s',
'%s',
'%s',
'%s',
'%s',
'%s',
'%s',
'%s',
'%s',
'%s',
'%s',
'%s',
'%s',
'%s',
'%s',
'%s',
'%s',
'%s',
'%s',
'%s',
'%s',
'%s',
'%s',
'%s',
'%s',
'%s',
'%s',
'%s',
'%s',
'%s',
'%s',
'%s',
'%s',
'%s',
'%s',
'%s',
'%s',
'%s',
'%s',
'%s',
'%s',
'%s',
'%s',
'%s',
'%s',
'%s',
'%s',
'%s',
'%s',
'%s',
'%s',
'%s',
'%s',
'%s',
'%s',
'%s',
'%s',
'%s'
);",
mysql_real_escape_string($username),
mysql_real_escape_string($itemnumber),
mysql_real_escape_string($itemname),
mysql_real_escape_string($itemdescription),
mysql_real_escape_string($itemtype),
mysql_real_escape_string($itemimage),
mysql_real_escape_string($itemlevel),
mysql_real_escape_string($itemrarity),
mysql_real_escape_string($itemvalue),
mysql_real_escape_string($keep),
mysql_real_escape_string($trade),
mysql_real_escape_string($equiplocation),
mysql_real_escape_string($equip),
mysql_real_escape_string($equiplh),
mysql_real_escape_string($equiprh),
mysql_real_escape_string($waterunits),
mysql_real_escape_string($maxwater),
mysql_real_escape_string($locklevel),
mysql_real_escape_string($keylock),
mysql_real_escape_string($readable),
mysql_real_escape_string($consumable),
mysql_real_escape_string($equipable),
mysql_real_escape_string($combatuse),
mysql_real_escape_string($singleuse),
mysql_real_escape_string($weapontype),
mysql_real_escape_string($armortype),
mysql_real_escape_string($acctype),
mysql_real_escape_string($othertype),
mysql_real_escape_string($weaponbase),
mysql_real_escape_string($armorbase),
mysql_real_escape_string($accbase),
mysql_real_escape_string($enhancement1),
mysql_real_escape_string($enhancement2),
mysql_real_escape_string($enhancement3),
mysql_real_escape_string($enchantment1),
mysql_real_escape_string($enchantment2),
mysql_real_escape_string($enchantment3),
mysql_real_escape_string($transmute1),
mysql_real_escape_string($transmute2),
mysql_real_escape_string($transmute3),
mysql_real_escape_string($adjustable),
mysql_real_escape_string($legendary),
mysql_real_escape_string($relic),
mysql_real_escape_string($setitem),
mysql_real_escape_string($damage),
mysql_real_escape_string($defense),
mysql_real_escape_string($penalty),
mysql_real_escape_string($lightsource),
mysql_real_escape_string($thieving),
mysql_real_escape_string($slow),
mysql_real_escape_string($curse),
mysql_real_escape_string($debility),
mysql_real_escape_string($weaken),
mysql_real_escape_string($acid),
mysql_real_escape_string($acidcount),
mysql_real_escape_string($sleep),
mysql_real_escape_string($sleepcount),
mysql_real_escape_string($disease),
mysql_real_escape_string($blindness),
mysql_real_escape_string($expbonus),
mysql_real_escape_string($invisible),
mysql_real_escape_string($fire),
mysql_real_escape_string($fireresist),
mysql_real_escape_string($ice),
mysql_real_escape_string($iceresist),
mysql_real_escape_string($lightning),
mysql_real_escape_string($lightningresist),
mysql_real_escape_string($earth),
mysql_real_escape_string($earthresist),
mysql_real_escape_string($dark),
mysql_real_escape_string($darkresist),
mysql_real_escape_string($light),
mysql_real_escape_string($lightresist),
mysql_real_escape_string($knockback),
mysql_real_escape_string($criticalhit),
mysql_real_escape_string($backstab),
mysql_real_escape_string($doublestrike),
mysql_real_escape_string($triplestrike),
mysql_real_escape_string($catapult),
mysql_real_escape_string($bleed),
mysql_real_escape_string($bleedcount),
mysql_real_escape_string($physdamage),
mysql_real_escape_string($reflectphys),
mysql_real_escape_string($reflectfire),
mysql_real_escape_string($reflectice),
mysql_real_escape_string($reflectair),
mysql_real_escape_string($reflectearth),
mysql_real_escape_string($reflectlight),
mysql_real_escape_string($reflectdark),
mysql_real_escape_string($vampiric),
mysql_real_escape_string($vampamount),
mysql_real_escape_string($manadrain),
mysql_real_escape_string($drainamount),
mysql_real_escape_string($duality),
mysql_real_escape_string($lightness),
mysql_real_escape_string($longarm),
mysql_real_escape_string($throwing),
mysql_real_escape_string($ultimateresist),
mysql_real_escape_string($ultimatedamage),
mysql_real_escape_string($strength),
mysql_real_escape_string($speed),
mysql_real_escape_string($accuraccy),
mysql_real_escape_string($agilty),
mysql_real_escape_string($wisdom),
mysql_real_escape_string($life),
mysql_real_escape_string($mana),
mysql_real_escape_string($ultimateboost),
mysql_real_escape_string($liferegen),
mysql_real_escape_string($manaregen),
mysql_real_escape_string($blocking),
mysql_real_escape_string($petrify),
mysql_real_escape_string($paralyze),
mysql_real_escape_string($stun),
mysql_real_escape_string($fear),
mysql_real_escape_string($insanity),
mysql_real_escape_string($lightfoot),
mysql_real_escape_string($revivingjolt),
mysql_real_escape_string($refillinglight),
mysql_real_escape_string($despair),
mysql_real_escape_string($tremors),
mysql_real_escape_string($inferno),
mysql_real_escape_string($infernocount),
mysql_real_escape_string($freezing),
mysql_real_escape_string($freezecount),
mysql_real_escape_string($magicfind),
mysql_real_escape_string($greed),
mysql_real_escape_string($luck),
mysql_real_escape_string($lockpicking),
mysql_real_escape_string($firestarter),
mysql_real_escape_string($heroicboost),
mysql_real_escape_string($heroiccount),
mysql_real_escape_string($silence),
mysql_real_escape_string($antique),
mysql_real_escape_string($webs),
mysql_real_escape_string($entanglement),
mysql_real_escape_string($waterbreathe),
mysql_real_escape_string($lasso),
mysql_real_escape_string($adrenalinerush),
mysql_real_escape_string($adrenalinecount),
mysql_real_escape_string($distraction),
mysql_real_escape_string($immobilizeresist),
mysql_real_escape_string($mindresist),
mysql_real_escape_string($criticalresist),
mysql_real_escape_string($horrifying),
mysql_real_escape_string($ultimaterevive),
mysql_real_escape_string($swarming),
mysql_real_escape_string($revivingjolt),
mysql_real_escape_string($dryice),
mysql_real_escape_string($coldblood),
mysql_real_escape_string($raginginferno),
mysql_real_escape_string($smoke),
mysql_real_escape_string($levelling),
mysql_real_escape_string($piercing),
mysql_real_escape_string($sharpened),
mysql_real_escape_string($keen),
mysql_real_escape_string($devastating),
mysql_real_escape_string($crushing),
mysql_real_escape_string($itemrange),
mysql_real_escape_string($itemspeed)
);
mysql_query($query);

?>