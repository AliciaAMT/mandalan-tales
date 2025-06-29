<?php

$enhance=mt_rand(1,64);

if ($enhance==1)
{
$itemname=$itemname." of Damage";
$itemdescription=$itemdescription."delivers extra damage.";
$enhancement1="Damage +".$itemlevel;
$damage=$itemlevel;
}

if ($enhance==2)
{
$itemname=$itemname." of Defense";
$itemdescription=$itemdescription."provides extra defense as you block.";
$enhancement1="Defense +".$itemlevel;
$defense=$itemlevel;
}

if ($enhance==3)
{
$itemname="Glowing ".$itemname;
$itemdescription=$itemdescription."has a subtle glow.";
$enhancement1="Lightsource";
$lightsource=1;
}

if ($enhance==4)
{
$itemname=$itemname." of Thieving";
$itemdescription=$itemdescription."has been enchanted to make one lucky at picking locks.";
$enhancement1="Lockpicking +".$itemlevel;
$thieving=$itemlevel;
}

if ($enhance==5)
{
$itemname=$itemname." of Slowness";
$itemdescription=$itemdescription."has been enchanted to make the enemy slower.";
$enhancement1="Slow +".$itemlevel;
$slow=$itemlevel;
}

if ($enhance==6)
{
$itemname="Cursed ".$itemname;
$itemdescription=$itemdescription."has been enchanted to curse the enemy.";
$enhancement1="Curse +".$itemlevel;
$curse=$itemlevel;
}

if ($enhance==7)
{
$itemname=$itemname." of Debility";
$itemdescription=$itemdescription."has been enchanted to debilitize the enemy with pain.";
$enhancement1="Debility +".$itemlevel;
$debility=$itemlevel;
}

if ($enhance==8)
{
$itemname=$itemname." of Weakness";
$itemdescription=$itemdescription."has been enchanted to weaken the enemy.";
$enhancement1="Weakness +".$itemlevel;
$weaken=$itemlevel;
}

if ($enhance==9)
{
$itemname=$itemname." of Acid";
$itemdescription=$itemdescription."has been coated with acid to burn the enemy.";
$enhancement1="Acid Damage: ".$itemlevel."<br />Acid Count: 3 rounds";
$acid=$itemlevel;
$acidcount=3;
}

if ($enhance==10)
{
$itemname=$itemname." of Dreams";
$itemdescription=$itemname."has been enchanted to cause the enemy to sleep.";
$enhancement1="Sleep: ".$itemlevel."<br />Sleep Count: 4 rounds";
$sleep=$itemlevel;
$sleepcount=4;
}

if ($enhance==11)
{
$itemname=$itemname." of Disease";
$itemdescription=$itemdescription."has been enchanted to cause the enemy to become diseased.";
$enhancement1="Disease +".$itemlevel;
$disease=$itemlevel;
}

if ($enhance==12)
{
$itemname=$itemname." of Blindness";
$itemdescription=$itemdescription."has been enchanted to cause the enemy to become blind.";
$enhancement1="Blindness +".$itemlevel;
$blindness=$itemlevel;
}

if ($enhance==13)
{
$itemname=$itemname." of Experience";
$itemdescription=$itemdescription."has been enchanted to give you extra experience in battles.";
$enhancement1="Experience +".$itemlevel;
$experience=$itemlevel;
}

if ($enhance==14)
{
$itemname=$itemname." of Invisibility";
$itemdescription=$itemdescription."has been enchanted to make you invisible.";
$enhancement1="Invisibility +".$itemlevel;
$invisible=$itemlevel;
}

if ($enhance==15)
{
$itemname=$itemname." of Fire";
$itemdescription=$itemdescription."has been enchanted to cause extra fire damage.";
$enhancement1="Fire +".$itemlevel;
$fire=$itemlevel;
}

if ($enhance==16)
{
$itemname=$itemname." of Fire Resistance";
$itemdescription=$itemdescription."has been enchanted to give you extra fire resistance.";
$enhancement1="Fire Resistance +".round($itemlevel/2);
$fireresist=round($itemlevel/2);
}

if ($enhance==17)
{
$itemname=$itemname." of Water";
$itemdescription=$itemdescription." has been enchanted to give you extra water damage.";
$enhancement1="Water +".$itemlevel;
$ice=$itemlevel;
}

if ($enhance==18)
{
$itemname=$itemname." of Water Resistance";
$itemdescription=$itemdescription."has been enchanted to give you extra water resistance.";
$enhancement1="Water Resistance +".round($itemlevel/2);
$iceresist=round($itemlevel/2);
}

if ($enhance==19)
{
$itemname=$itemname." of Air";
$itemdescription=$itemdescription."has been enchanted to give you extra Air Damage.";
$enhancement1="Air +".$itemlevel;
$lightning=$itemlevel;
}

if ($enhance==20)
{
$itemname=$itemname." of Air Resistance";
$itemdescription=$itemdescription."has been enchanted to give you extra air resistance.";
$enhancement1="Air Resistance +".round($itemlevel/2);
$lightningresist=round($itemlevel/2);
}

if ($enhance==21)
{
$itemname=$itemname." of Earth";
$itemdescription=$itemdescription."has been enchanted to give you extra Earth Damage.";
$enhancement1="Earth +".$itemlevel;
$earth=$itemlevel;
}

if ($enhance==22)
{
$itemname=$itemname." of Earth Resistance";
$itemdescription=$itendescription."has been enchanted to give you extra earth resistance.";
$enhancement1="Earth Resistance +".round($itemlevel/2);
$earthresist=round($itemlevel/2);
}

if ($enhance==23)
{
$itemname=$itemname." of Dark";
$itemdescription=$itemdescription."has been enchanted to give you extra Dark Damage.";
$enhancement1="Dark +".$itemlevel;
$dark=$itemlevel;
}

if ($enhance==24)
{
$itemname=$itemname." of Dark Resistance";
$itemdescription=$itemdescription."has been enchanted to give you extra dark resistance.";
$enhancement1="Dark Resistance +".round($itemlevel/2);
$darkresist=round($itemlevel/2);
}

if ($enhance==25)
{
$itemname=$itemname." of Light";
$itemdescription=$itemdescription."has been enchanted to give you extra Light Damage.";
$enhancement1="Light +".$itemlevel;
$light=$itemlevel;
}

if ($enhance==26)
{
$itemname=$itemname." of Light Resistance";
$itemdescription=$itemdescription."has been enchanted to give you extra light resistance.";
$enhancement1="Light Resistance +".round($itemlevel/2);
$lightresist=round($itemlevel/2);
}

if ($enhance==27)
{
$itemname=$itemname." of Knockback";
$itemdescription=$itemdescription."has been enchanted to give you extra Knockback Damage.";
$enhancement1="Knockback +".$itemlevel;
$knockback=$itemlevel;
}

if ($enhance==28)
{
$itemname=$itemname." of Critical Hit";
$itemdescription=$itemdescription."has been enchanted to give you Critical Hit Chance.";
$enhancement1="Critical Hit +".round($itemlevel/2);
$criticalhit=round($itemlevel/2);
}

if ($enhance==29)
{
$itemname=$itemname." of Backstabbing";
$itemdescription=$itemdescription."has been enchanted to give you better chances at backstabbing your enemy.";
$enhancement1="Backstabbing +".$itemlevel;
$backstab=$itemlevel;
}

if ($enhance==30)
{
$itemname=$itemname." of Catapulting";
$itemdescription=$itemdescription."has been enchanted to give you a chance to catapult your enemy into the air.";
$enhancement1="Catapult +".$itemlevel;
$catapult=$itemlevel;
}

if ($enhance==31)
{
$itemname=$itemname." of Bleeding";
$itemdescription=$itemdescription."had been enchanted to cause the enemy to bleed.";
$enhancement1="Bleeding Damage: ".$itemlevel."<br />Bleed Count: 3 rounds";
$bleed=$itemlevel;
$bleedcount=3;
}

if ($enhance==32)
{
$itemname=$itemname." of Reflecting";
$itemdescription=$itemdescription."has been enchanted to allow you to reflect your enemy's attacks.";
$enhancement1="Physical Reflection +".$itemlevel;
$reflectphys=$itemlevel;
}

if ($enhance==33)
{
$itemname=$itemname." of Reflecting";
$itemdescription=$itemdescription."has been enchanted to allow you to reflect your enemy's attacks.";
$enhancement1="Fire Reflection +".$itemlevel;
$reflectfire=$itemlevel;
}

if ($enhance==34)
{
$itemname=$itemname." of Reflecting";
$itemdescription=$itemdescription."has been enchanted to allow you to reflect your enemy's attacks.";
$enhancement1="Water Reflection +".$itemlevel;
$reflectice=$itemlevel;
}

if ($enhance==35)
{
$itemname=$itemname." of Reflecting";
$itemdescription=$itemdescription."has been enchanted to allow you to reflect your enemy's attacks.";
$enhancement1="Air Reflection +".$itemlevel;
$reflectair=$itemlevel;
}

if ($enhance==36)
{
$itemname=$itemname." of Reflecting";
$itemdescription=$itemdescription."has been enchanted to allow you to reflect your enemy's attacks.";
$enhancement1="Earth Reflection +".$itemlevel;
$reflectearth=$itemlevel;
}

if ($enhance==37)
{
$itemname=$itemname." of Reflecting";
$itemdescription=$itemdescription."has been enchanted to allow you to reflect your enemy's attacks.";
$enhancement1="Light Reflection +".$itemlevel;
$reflectlight=$itemlevel;
}

if ($enhance==38)
{
$itemname=$itemname." of Reflecting";
$itemdescription=$itemdescription."has been enchanted to allow you to reflect your enemy's attacks.";
$enhancement1="Dark Reflection +".$itemlevel;
$reflectdark=$itemlevel;
}

if ($enhance==39)
{
$itemname="Vampiric ".$itemname;
$itemdescription=$itemdescription."has been enchanted to allow you to drain your enemy's life and add it to your own.";
$enhancement1="Life Drain +".$itemlevel;
$vampiric=$itemlevel;
}

if ($enhance==40)
{
$itemname=$itemname." of Mana Drain";
$itemdescription=$itemdescription."has been enchanted to allow you to drain your enemy's mana and add it to your own.";
$enhancement1="Mana Drain +".$itemlevel;
$manadrain=$itemlevel;
}

if ($enhance==41)
{
$itemname=$itemname." of Strength";
$itemdescription=$itemdescription."has been enchanted to boost your strength.";
$enhancement1="Strength +".round($itemlevel/2);
$strength=round($itemlevel/2);
}

if ($enhance==42)
{
$itemname=$itemname." of Speed";
$itemdescription=$itemdescription."has been enchanted to boost your speed.";
$enhancement1="Speed +".round($itemlevel/2);
$speed=round($itemlevel/2);
}

if ($enhance==43)
{
$itemname=$itemname." of Accuracy";
$itemdescription=$itemdescription."has been enchanted to boost your Accuracy.";
$enhancement1="Accuracy +".round($itemlevel/2);
$accuracy=round($itemlevel/2);
}

if ($enhance==44)
{
$itemname=$itemname." of Agility";
$itemdescription=$itemdescription."has been enchanted to boost your Agility.";
$enhancement1="Agility +".round($itemlevel/2);
$agility=round($itemlevel/2);
}

if ($enhance==45)
{
$itemname=$itemname." of Wisdom";
$itemdescription=$itemdescription."has been enchanted to boost your Wisdom.";
$enhancement1="Wisdom +".round($itemlevel/2);
$wisdom=round($itemlevel/2);
}

if ($enhance==45)
{
$itemname=$itemname." of Life";
$itemdescription=$itemdescription."has been enchanted to boost your life.";
$enhancement1="Life +".round($itemlevel/2);
$life=round($itemlevel/2);
}

if ($enhance==46)
{
$itemname=$itemname." of Mana";
$itemdescription=$itemdescription."has been enchanted to boost your mana.";
$enhancement1="Mana +".round($itemlevel/2);
$mana=round($itemlevel/2);
}

if ($enhance==47)
{
$itemname=$itemname." of Life Renewal";
$itemdescription=$itemdescription."has been enchanted to regenerate your life.";
$enhancement1="Life Regenerate +".round($itemlevel/4);
$liferegen=round($itemlevel/4);
}

if ($enhance==48)
{
$itemname=$itemname." of Mana Renewal";
$itemdescription=$itemdescription."has been enchanted to regenerate your mana.";
$enhancement1="mana Regenerate +".round($itemlevel/4);
$manaregen=round($itemlevel/4);
}

if ($enhance==49)
{
$itemname=$itemname." of Blocking";
$itemdescription=$itemdescription."has been enchanted to give you better blocking skills.";
$enhancement1="Blocking +".$itemlevel;
$blocking=$itemlevel;
}

if ($enhance==50)
{
$itemname=$itemname." of Petrification";
$itemdescription=$itemdescription."has been enchanted to give you a chance to petrify your enemy.";
$enhancement1="Petrification +".$itemlevel;
$petrify=$itemlevel;
}

if ($enhance==51)
{
$itemname=$itemname." of Paralysis";
$itemdescription=$itemdescription."has been enchanted to give you a chance to paralyze your enemy.";
$enhancement1="Paralyze +".$itemlevel;
$paralyze=$itemlevel;
}

if ($enhance==52)
{
$itemname=$itemname." of Stunning";
$itemdescription=$itemdescription."has been enchanted to give you a chance to stun your enemy.";
$enhancement1="Stun +".$itemlevel;
$stun=$itemlevel;
}

if ($enhance==53)
{
$itemname=$itemname." of Fear";
$itemdescription=$itemdescription."has been enchanted to give you a chance to make your enemy fear you.";
$enhancement1="Fear +".$itemlevel;
$fear=$itemlevel;
}

if ($enhance==54)
{
$itemname=$itemname." of Insanity";
$itemdescription=$itemdescription."has been enchanted to give you a chance to cause your enemy to become insane.";
$enhancement1="Insanity +".$itemlevel;
$insanity=$itemlevel;
}

if ($enhance==55)
{
$itemname=$itemname." of Lightfeet";
$itemdescription=$itemdescription."has been enchanted to give you a better chance to flee.";
$enhancement1="Flee +".$itemlevel;
$lightfoot=$itemlevel;
}

if ($enhance==56)
{
$itemname=$itemname." of Reviving Jolt";
$itemdescription=$itemdescription."has been enchanted to give you a chance to revive upon death with a last jolt of energy.";
$enhancement1="Reviving Jolt +".$itemlevel;
$revivingjolt=$itemlevel;
}

if ($enhance==57)
{
$itemname=$itemname." of Refilling Light";
$itemdescription=$itemdescription."has been enchanted to give you a chance to refill your life and mana through the power of Light.";
$enhancement1="Refilling Light +".$itemlevel;
$refillinglight=$itemlevel;
}

if ($enhance==58)
{
$itemname=$itemname." of Despair";
$itemdescription=$itemdescription."has been enchanted to give you a chance to cause your enemy to despair and give up to die.";
$enhancement1="Despair +".$itemlevel;
$despair=$itemlevel;
}

if ($enhance==59)
{
$itemname=$itemname." of Tremors";
$itemdescription=$itemdescription."has been enchanted to cause the earth to tremble, damaging your enemy.";
$enhancement1="Tremors +".$itemlevel;
$tremors=$itemlevel;
}

if ($enhance==60)
{
$itemname=$itemname." of Inferno";
$itemdescription=$itemdescription."has been enchanted to give you a chance to incinerate your enemy in an inferno.";
$enhancement1="Inferno Damage: ".$itemlevel."<br />Inferno Count: 3";
$inferno=$itemlevel;
$infernocount=3;
}

if ($enhance==61)
{
$itemname=$itemname." of Freezing";
$itemdescription=$itemdescription."has been enchanted to give you a chance to freeze your enemy.";
$enhancement1="Freeze Damage: ".$itemlevel."<br />Freeze Count: 3";
$freezing=$itemlevel;
$freezecount=3;
}

if ($enhance==62)
{
$itemname=$itemname." of Magicfind";
$itemdescription=$itemdescription."has been enchanted to add to your luck for finding special and magical items.";
$enhancement1="Magicfind +".$itemlevel;
$magicfind=$itemlevel;
}

if ($enhance==63)
{
$itemname=$itemname." of Greed";
$itemdescription=$itemdescription."has been enchanted to help you find more money.";
$enhancement1="Greed +".$itemlevel;
$greed=$itemlevel;
}

if ($enhance==64)
{
$itemname=$itemname." of Luck";
$itemdescription=$itemdescription."has been enchanted to make you lucky.";
$enhancement1="Luck +".$itemlevel;
$luck=$itemlevel;
}
 ?>