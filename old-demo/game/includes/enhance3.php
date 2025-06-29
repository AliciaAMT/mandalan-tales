<?php

$enhance=mt_rand(1,64);

if ($enhance==1)
{

$itemdescription=$itemdescription."This item also delivers extra damage.";
$enhancement3="Damage +".$itemlevel;
$damage=$damage+$itemlevel;
}

if ($enhance==2)
{
$itemdescription=$itemdescription."This item also provides extra defense as you block.";
$enhancement3="Defense +".$itemlevel;
$defense=$defense+$itemlevel;
}
//******************************************************Start Here**************
if ($enhance==3)
{

$itemdescription=$itemdescription."This item also has a subtle glow.";
$enhancement3="Lightsource";
$lightsource=$lightsource+1;
}

if ($enhance==4)
{

$itemdescription=$itemdescription."This item also has been enchanted to make one lucky at picking locks.";
$enhancement3="Lockpicking +".$itemlevel;
$thieving=$thieving+$itemlevel;
}

if ($enhance==5)
{

$itemdescription=$itemdescription."This item also has been enchanted to make the enemy slower.";
$enhancement3="Slow +".$itemlevel;
$slow=$slow+$itemlevel;
}

if ($enhance==6)
{

$itemdescription=$itemdescription."This item also has been enchanted to curse the enemy.";
$enhancement3="Curse +".$itemlevel;
$curse=$curse+$itemlevel;
}

if ($enhance==7)
{

$itemdescription=$itemdescription."This item also has been enchanted to debilitize the enemy with pain.";
$enhancement3="Debility +".$itemlevel;
$debility=$debility+$itemlevel;
}

if ($enhance==8)
{

$itemdescription=$itemdescription."This item also has been enchanted to weaken the enemy.";
$enhancement3="Weakness +".$itemlevel;
$weaken=$weaken+$itemlevel;
}

if ($enhance==9)
{

$itemdescription=$itemdescription."This item also has been coated with acid to burn the enemy.";
$enhancement3="Acid Damage: ".$itemlevel."<br />Acid Count: 3 rounds";
$acid=$acid+$itemlevel;
$acidcount=$acidcount+3;
}

if ($enhance==10)
{

$itemdescription=$itemname."This item also has been enchanted to cause the enemy to sleep.";
$enhancement3="Sleep: ".$itemlevel."<br />Sleep Count: 4 rounds";
$sleep=$sleep+$itemlevel;
$sleepcount=$sleepcount+4;
}

if ($enhance==11)
{

$itemdescription=$itemdescription."This item also has been enchanted to cause the enemy to become diseased.";
$enhancement3="Disease +".$itemlevel;
$disease=$disease+$itemlevel;
}

if ($enhance==12)
{

$itemdescription=$itemdescription."This item also has been enchanted to cause the enemy to become blind.";
$enhancement3="Blindness +".$itemlevel;
$blindness=$blindness+$itemlevel;
}

if ($enhance==13)
{

$itemdescription=$itemdescription."This item also has been enchanted to give you extra experience in battles.";
$enhancement3="Experience +".$itemlevel;
$experience=$experience+$itemlevel;
}

if ($enhance==14)
{

$itemdescription=$itemdescription."This item also has been enchanted to make you invisible.";
$enhancement3="Invisibility +".$itemlevel;
$invisible=$invisible+$itemlevel;
}

if ($enhance==15)
{

$itemdescription=$itemdescription."This item also has been enchanted to cause extra fire damage.";
$enhancement3="Fire +".$itemlevel;
$fire=$fire+$itemlevel;
}

if ($enhance==16)
{

$itemdescription=$itemdescription."This item also has been enchanted to give you extra fire resistance.";
$enhancement3="Fire Resistance +".round($itemlevel/2);
$fireresist=$fireresist+round($itemlevel/2);
}

if ($enhance==17)
{

$itemdescription=$itemdescription."This item also has been enchanted to give you extra water damage.";
$enhancement3="Water +".$itemlevel;
$ice=$ice+$itemlevel;
}

if ($enhance==18)
{

$itemdescription=$itemdescription."This item also has been enchanted to give you extra water resistance.";
$enhancement3="Water Resistance +".round($itemlevel/2);
$iceresist=$iceresist+round($itemlevel/2);
}

if ($enhance==19)
{

$itemdescription=$itemdescription."This item also has been enchanted to give you extra Air Damage.";
$enhancement3="Air +".$itemlevel;
$lightning=$lightning+$itemlevel;
}

if ($enhance==20)
{

$itemdescription=$itemdescription."This item also has been enchanted to give you extra air resistance.";
$enhancement3="Air Resistance +".round($itemlevel/2);
$lightningresist=$lightningresist+round($itemlevel/2);
}

if ($enhance==21)
{

$itemdescription=$itemdescription."This item also has been enchanted to give you extra Earth Damage.";
$enhancement3="Earth +".$itemlevel;
$earth=$earth+$itemlevel;
}

if ($enhance==22)
{

$itemdescription=$itendescription."This item also has been enchanted to give you extra earth resistance.";
$enhancement3="Earth Resistance +".round($itemlevel/2);
$earthresist=$earthresist+round($itemlevel/2);
}

if ($enhance==23)
{

$itemdescription=$itemdescription."This item also has been enchanted to give you extra Dark Damage.";
$enhancement3="Dark +".$itemlevel;
$dark=$dark+$itemlevel;
}

if ($enhance==24)
{
$itemdescription=$itemdescription."This item also has been enchanted to give you extra dark resistance.";
$enhancement3="Dark Resistance +".round($itemlevel/2);
$darkresist=$darkresist+round($itemlevel/2);
}

if ($enhance==25)
{

$itemdescription=$itemdescription."This item also has been enchanted to give you extra Light Damage.";
$enhancement3="Light +".$itemlevel;
$light=$light+$itemlevel;
}

if ($enhance==26)
{

$itemdescription=$itemdescription."This item also has been enchanted to give you extra light resistance.";
$enhancement3="Light Resistance +".round($itemlevel/2);
$lightresist=$lightresist+round($itemlevel/2);
}

if ($enhance==27)
{

$itemdescription=$itemdescription."This item also has been enchanted to give you extra Knockback Damage.";
$enhancement3="Knockback +".$itemlevel;
$knockback=$knockback+$itemlevel;
}

if ($enhance==28)
{

$itemdescription=$itemdescription."This item also has been enchanted to give you Critical Hit Chance.";
$enhancement3="Critical Hit +".round($itemlevel/2);
$criticalhit=$criticalhit+round($itemlevel/2);
}

if ($enhance==29)
{

$itemdescription=$itemdescription."This item also has been enchanted to give you better chances at backstabbing your enemy.";
$enhancement3="Backstabbing +".$itemlevel;
$backstab=$backstab+$itemlevel;
}

if ($enhance==30)
{

$itemdescription=$itemdescription."This item also has been enchanted to give you a chance to catapult your enemy into the air.";
$enhancement3="Catapult +".$itemlevel;
$catapult=$catapult+$itemlevel;
}

if ($enhance==31)
{

$itemdescription=$itemdescription."This item also had been enchanted to cause the enemy to bleed.";
$enhancement3="Bleeding Damage: ".$itemlevel."<br />Bleed Count: 3 rounds";
$bleed=$bleed+$itemlevel;
$bleedcount=$bleedcount+3;
}

if ($enhance==32)
{

$itemdescription=$itemdescription."This item also has been enchanted to allow you to reflect your enemy's attacks.";
$enhancement3="Physical Reflection +".$itemlevel;
$reflectphys=$reflectphys+$itemlevel;
}

if ($enhance==33)
{

$itemdescription=$itemdescription."This item also has been enchanted to allow you to reflect your enemy's attacks.";
$enhancement3="Fire Reflection +".$itemlevel;
$reflectfire=$reflectfire+$itemlevel;
}

if ($enhance==34)
{

$itemdescription=$itemdescription."This item also has been enchanted to allow you to reflect your enemy's attacks.";
$enhancement3="Water Reflection +".$itemlevel;
$reflectice=$reflectice+$itemlevel;
}

if ($enhance==35)
{

$itemdescription=$itemdescription."This item also has been enchanted to allow you to reflect your enemy's attacks.";
$enhancement3="Air Reflection +".$itemlevel;
$reflectair=$reflectair+$itemlevel;
}

if ($enhance==36)
{

$itemdescription=$itemdescription."This item also has been enchanted to allow you to reflect your enemy's attacks.";
$enhancement3="Earth Reflection +".$itemlevel;
$reflectearth=$reflectearth+$itemlevel;
}

if ($enhance==37)
{

$itemdescription=$itemdescription."This item also has been enchanted to allow you to reflect your enemy's attacks.";
$enhancement3="Light Reflection +".$itemlevel;
$reflectlight=$reflectlight+$itemlevel;
}

if ($enhance==38)
{

$itemdescription=$itemdescription."This item also has been enchanted to allow you to reflect your enemy's attacks.";
$enhancement3="Dark Reflection +".$itemlevel;
$reflectdark=$reflectdark+$itemlevel;
}

if ($enhance==39)
{

$itemdescription=$itemdescription."This item also has been enchanted to allow you to drain your enemy's life and add it to your own.";
$enhancement3="Life Drain +".$itemlevel;
$vampiric=$vampiric+$itemlevel;
}

if ($enhance==40)
{

$itemdescription=$itemdescription."This item also has been enchanted to allow you to drain your enemy's mana and add it to your own.";
$enhancement3="Mana Drain +".$itemlevel;
$manadrain=$manadrain+$itemlevel;
}

if ($enhance==41)
{

$itemdescription=$itemdescription."This item also has been enchanted to boost your strength.";
$enhancement3="Strength +".round($itemlevel/2);
$strength=$strength+round($itemlevel/2);
}

if ($enhance==42)
{

$itemdescription=$itemdescription."This item also has been enchanted to boost your speed.";
$enhancement3="Speed +".round($itemlevel/2);
$speed=$speed+$itemlevel/2;
}

if ($enhance==43)
{

$itemdescription=$itemdescription."This item also has been enchanted to boost your Accuracy.";
$enhancement3="Accuracy +".round($itemlevel/2);
$accuracy=$accuracy+round($itemlevel/2);
}

if ($enhance==44)
{

$itemdescription=$itemdescription."This item also has been enchanted to boost your Agility.";
$enhancement3="Agility +".round($itemlevel/2);
$agility=$agility+round($itemlevel/2);
}

if ($enhance==45)
{

$itemdescription=$itemdescription."This item also has been enchanted to boost your Wisdom.";
$enhancement3="Wisdom +".round($itemlevel/2);
$wisdom=$wisdom+round($itemlevel/2);
}

if ($enhance==45)
{

$itemdescription=$itemdescription."This item also has been enchanted to boost your life.";
$enhancement3="Life +".round($itemlevel/2);
$life=$life+round($itemlevel/2);
}

if ($enhance==46)
{

$itemdescription=$itemdescription."This item also has been enchanted to boost your mana.";
$enhancement3="Mana +".round($itemlevel/2);
$mana=$mana+round($itemlevel/2);
}

if ($enhance==47)
{

$itemdescription=$itemdescription."This item also has been enchanted to regenerate your life.";
$enhancement3="Life Regenerate +".round($itemlevel/4);
$liferegen=$liferegen+round($itemlevel/4);
}

if ($enhance==48)
{

$itemdescription=$itemdescription."This item also has been enchanted to regenerate your mana.";
$enhancement3="mana Regenerate +".round($itemlevel/4);
$manaregen=$manaregen+round($itemlevel/4);
}

if ($enhance==49)
{

$itemdescription=$itemdescription."This item also has been enchanted to give you better blocking skills.";
$enhancement3="Blocking +".$itemlevel;
$blocking=$blocking+$itemlevel;
}

if ($enhance==50)
{

$itemdescription=$itemdescription."This item also has been enchanted to give you a chance to petrify your enemy.";
$enhancement3="Petrification +".$itemlevel;
$petrify=$petrify+$itemlevel;
}

if ($enhance==51)
{

$itemdescription=$itemdescription."This item also has been enchanted to give you a chance to paralyze your enemy.";
$enhancement3="Paralyze +".$itemlevel;
$paralyze=$paralyze+$itemlevel;
}

if ($enhance==52)
{

$itemdescription=$itemdescription."This item also has been enchanted to give you a chance to stun your enemy.";
$enhancement3="Stun +".$itemlevel;
$stun=$stun+$itemlevel;
}

if ($enhance==53)
{

$itemdescription=$itemdescription."This item also has been enchanted to give you a chance to make your enemy fear you.";
$enhancement3="Fear +".$itemlevel;
$fear=$fear+$itemlevel;
}

if ($enhance==54)
{

$itemdescription=$itemdescription."This item also has been enchanted to give you a chance to cause your enemy to become insane.";
$enhancement3="Insanity +".$itemlevel;
$insanity=$insanity+$itemlevel;
}

if ($enhance==55)
{

$itemdescription=$itemdescription."This item also has been enchanted to give you a better chance to flee.";
$enhancement3="Flee +".$itemlevel;
$lightfoot=$lightfoot+$itemlevel;
}

if ($enhance==56)
{

$itemdescription=$itemdescription."This item also has been enchanted to give you a chance to revive upon death with a last jolt of energy.";
$enhancement3="Reviving Jolt +".$itemlevel;
$revivingjolt=$revivingjolt+$itemlevel;
}

if ($enhance==57)
{

$itemdescription=$itemdescription."This item also has been enchanted to give you a chance to refill your life and mana through the power of Light.";
$enhancement3="Refilling Light +".$itemlevel;
$refillinglight=$refillinglight+$itemlevel;
}

if ($enhance==58)
{

$itemdescription=$itemdescription."This item also has been enchanted to give you a chance to cause your enemy to despair and give up to die.";
$enhancement3="Despair +".$itemlevel;
$despair=$despair+$itemlevel;
}

if ($enhance==59)
{

$itemdescription=$itemdescription."This item also has been enchanted to cause the earth to tremble, damaging your enemy.";
$enhancement3="Tremors +".$itemlevel;
$tremors=$tremors+$itemlevel;
}

if ($enhance==60)
{

$itemdescription=$itemdescription."This item also has been enchanted to give you a chance to incinerate your enemy in an inferno.";
$enhancement3="Inferno Damage: ".$itemlevel."<br />Inferno Count: 3";
$inferno=$inferno+$itemlevel;
$infernocount=$infernocount+3;
}

if ($enhance==61)
{

$itemdescription=$itemdescription."This item also has been enchanted to give you a chance to freeze your enemy.";
$enhancement3="Freeze Damage: ".$itemlevel."<br />Freeze Count: 3";
$freezing=$freezing+$itemlevel;
$freezecount=$freezecount+3;
}

if ($enhance==62)
{

$itemdescription=$itemdescription."This item also has been enchanted to add to your luck for finding special and magical items.";
$enhancement3="Magicfind +".$itemlevel;
$magicfind=$magicfind+$itemlevel;
}

if ($enhance==63)
{

$itemdescription=$itemdescription."This item also has been enchanted to help you find more money.";
$enhancement3="Greed +".$itemlevel;
$greed=$greed+$itemlevel;
}

if ($enhance==64)
{

$itemdescription=$itemdescription."This item also has been enchanted to make you lucky.";
$enhancement3="Luck +".$itemlevel;
$luck=$luck+$itemlevel;
}
 ?>