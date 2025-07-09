<?php

if(isset($_POST['submit']))
{
$response=strip_tags($_POST["type"]);

if ($response==1)
  {
  include ('php/npcicon.php');
  echo "male1";
  include ('php/npcname.php');
  echo "Father";
  echo "</td><td class=\"borderl\">";

  echo "I know this must seem strange and scary for you, but this is an opportunity that you cannot pass up. Think about it a while and let me know when you change your mind.";
// **********  USER ICON

echo "</td></tr><tr><td class=\"border\"><img src=\"../images/";


$stmt = $db->prepare("SELECT portrait FROM charstats WHERE charname=:charname;");
				$stmt->execute(array(':charname' => $charname));
while($row = $stmt->fetch())
  {
  echo $row['portrait'];
  }

  echo ".png\" border=\"0\" /><br />Response</td><td class=\"borderl\">";

// ********** END USER ICON

  echo "<table class=\"page\" width=\"30%\"><tr><td class=\"center\"><form action=\"../maingraphics.php?";

echo time();

echo "\" method=\"post\"><input class=\"small\" type=\"submit\" value=\"Ok\" /></form></td></tr></table>";

  include ('php/tableend.php');

  $stmt = $db->prepare('UPDATE flags SET quest1 = 1 WHERE charname = :charname') ;
					$stmt->execute(array(':charname' => $charname));
  
  }

  if ($response==2)

  {
  include ('php/npcicon.php');
  echo "male1";
  include ('php/npcname.php');
  echo "Father";
  include ('php/npcdialogue.php');
  echo "I will miss you, but this is an opportunity that you cannot pass up. Here is the letter from Solias. This will gain you entrance to the House of Elders, where Solias resides and where you are to meet him. The House of Elders is North from here. And don't forget to get some supplies before you leave. The roads are getting more treacherous every day.";
// **********  USER ICON

echo "</td></tr><tr><td class=\"border\"><img src=\"../images/";


$stmt = $db->prepare("SELECT portrait FROM charstats WHERE charname=:charname;");
				$stmt->execute(array(':charname' => $charname));
while($row = $stmt->fetch())
  {
  echo $row['portrait'];
  }

  echo ".png\" border=\"0\" /><br />Response</td><td class=\"borderl\">";

// ********** END USER ICON
  echo "<table class=\"page\"><tr><td class=\"left\"><h3>Experience Gained: 5</h3></td></tr><tr><td class=\"left\"><h3>Quest Updated: The Apprentice</h3></td></tr><tr><td class=\"left\"><h3>Item Gained: </h3></td></tr><tr><td class=\"center\"><img src=\"../images/letter.png\" /><br />Letter From Solias</td></tr></table>";
  echo "<table class=\"page\" width=\"30%\"><tr><td class=\"center\"><form action=\"../maingraphics.php?";
echo time();

echo "\" method=\"post\"><input class=\"small\" type=\"submit\" value=\"Ok\" /></form></td></tr></table>";

  include ('php/tableend.php');

 $stmt = $db->prepare('UPDATE flags SET quest1 = 2 WHERE charname = :charname') ;
					$stmt->execute(array(':charname' => $charname));
 $stmt = $db->prepare('UPDATE charstats SET experience = experience + 5 WHERE charname = :charname') ;
					$stmt->execute(array(':charname' => $charname));
					
$itemnumber=time();
$itemname="Solias's Letter"; $itemdescription="This letter is your invitation to the House of Elder's. The guards should let you enter when you show them this letter.";
$itemtype="Other"; $itemimage="letter"; $itemlevel=1; $itemrarity="Relic";
$itemvalue=0; $keep=1; $trade=0; $equiplocation="None"; $equip=0;
$equiplh=0; $equiprh=0; $waterunits=0; $maxwater=0; $locklevel=0;
$keylock=0;
$readable=0;
$consumable=0;
$equipable=0;
$combatuse=0;
$singleuse=0;
$weapontype="None";
$armortype="None";
$acctype="None";
$othertype="Quest";
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

//insert into database
				$stmt = $db->prepare('INSERT INTO inventory (charname, itemname, itemdescription, itemtype, itemimage, itemlevel, itemrarity, itemvalue, keep, trade, equiplocation, equip, equiplh, equiprh, waterunits, maxwater, locklevel, keylock, readable, consumable, equipable, combatuse, singleuse, weapontype, armortype, acctype, othertype, weaponbase, armorbase, accbase, enhancement1, enhancement2, enhancement3, enchantment1,
enchantment2, enchantment3, transmute1, transmute2, transmute3, adjustable, legendary, relic, setitem, damage, defense, penalty, lightsource, thieving, slow, curse, debility, weaken, acid, acidcount, sleep, sleepcount, disease, blindness, expbonus, invisible, fire, fireresist, ice, iceresist, lightning, lightningresist, earth, earthresist, dark, darkresist, light, lightresist, bleedresist, knockback, criticalhit, backstab, doublestrike, triplestrike, catapult, bleed, bleedcount, physdamage, reflectphys, reflectfire, reflectice, reflectair, reflectearth, reflectlight, reflectdark, vampiric, vampamount, manadrain, drainamount, duality, lightness, longarm, throwing, ultimateresist, ultimatedamage, strength, speed, accuracy, agilty, wisdom, life, mana, ultimateboost, liferegen, manaregen, blocking, petrify, paralyze, stun, fear, insanity, lightfoot, revivingjolt, refillinglight, despair, tremors, inferno, infernocount, freezing, freezecount, magicfind, greed, luck, lockpicking, firestarter, heroicboost, heroiccount, silence, antique, webs, entanglement, waterbreathe, lasso, adrenalinerush, adrenalinecount, distraction, immobilizeresist, mindresist, criticalresist, horrifying, ultimaterevive, swarming, dryice, coldblood, raginginferno, smoke, levelling, piercing, sharpened, keen, devastating, crushing, itemrange, itemspeed)

 VALUES 

(:charname, :itemname, :itemdescription, :itemtype, :itemimage, :itemlevel, :itemrarity, :itemvalue, :keep, :trade, :equiplocation, :equip, :equiplh, :equiprh, :waterunits, :maxwater, :locklevel, :keylock, :readable, :consumable, :equipable, :combatuse, :singleuse, :weapontype, :armortype, :acctype, :othertype, :weaponbase, :armorbase, :accbase, :enhancement1, :enhancement2, :enhancement3, :enchantment1,
:enchantment2, :enchantment3, :transmute1, :transmute2, :transmute3, :adjustable, :legendary, :relic, :setitem, :damage, :defense, :penalty, :lightsource, :thieving, :slow, :curse, :debility, :weaken, :acid, :acidcount, :sleep, :sleepcount, :disease, :blindness, :expbonus, :invisible, :fire, :fireresist, :ice, :iceresist, :lightning, :lightningresist, :earth, :earthresist, :dark, :darkresist, :light, :lightresist, :bleedresist, :knockback, :criticalhit, :backstab, :doublestrike, :triplestrike, :catapult, :bleed, :bleedcount, :physdamage, :reflectphys, :reflectfire, :reflectice, :reflectair, :reflectearth, :reflectlight, :reflectdark, :vampiric, :vampamount, :manadrain, :drainamount, :duality, :lightness, :longarm, :throwing, :ultimateresist, :ultimatedamage, :strength, :speed, :accuracy, :agilty, :wisdom, :life, :mana, :ultimateboost, :liferegen, :manaregen, :blocking, :petrify, :paralyze, :stun, :fear, :insanity, :lightfoot, :revivingjolt, :refillinglight, :despair, :tremors, :inferno, :infernocount, :freezing, :freezecount, :magicfind, :greed, :luck, :lockpicking, :firestarter, :heroicboost, :heroiccount, :silence, :antique, :webs, :entanglement, :waterbreathe, :lasso, :adrenalinerush, :adrenalinecount, :distraction, :immobilizeresist, :mindresist, :criticalresist, :horrifying, :ultimaterevive, :swarming, :dryice, :coldblood, :raginginferno, :smoke, :levelling, :piercing, :sharpened, :keen, :devastating, :crushing, :itemrange, :itemspeed)') ;
				$stmt->execute(array(
':charname' => $charname, 
':itemname' => $itemname,
':itemdescription' => $itemdescription,
':itemtype' => $itemtype,
':itemimage' => $itemimage,
':itemlevel' => $itemlevel,
':itemrarity' => $itemrarity,
':itemvalue' => $itemvalue,
':keep' => $keep,
':trade' => $trade,
':equiplocation' => $equiplocation,
':equip' => $equip,
':equiplh' => $equiplh,
':equiprh' => $equiprh,
':waterunits' => $waterunits,
':maxwater' => $maxwater,
':locklevel' => $locklevel,
':keylock' => $keylock,
':readable' => $readable,
':consumable' => $consumable,
':equipable' => $equipable,
':combatuse' => $combatuse,
':singleuse' => $singleuse,
':weapontype' => $weapontype,
':armortype' => $armortype,
':acctype' => $acctype,
':othertype' => $othertype,
':weaponbase' => $weaponbase,
':armorbase' => $armorbase,
':accbase' => $accbase,
':enhancement1' => $enhancement1,
':enhancement2' => $enhancement2,
':enhancement3' => $enhancement3,
':enchantment1' => $enchantment1,
':enchantment2' => $enchantment2,
':enchantment3' => $enchantment3,
':transmute1' => $transmute1,
':transmute2' => $transmute2,
':transmute3' => $transmute3,
':adjustable' => $adjustable,
':legendary' => $legendary,
':relic' => $relic,
':setitem' => $setitem,
':damage' => $damage,
':defense' => $defense,
':penalty' => $penalty,
':lightsource' => $lightsource,
':thieving' => $thieving,
':slow' => $slow,
':curse' => $curse,
':debility' => $debility,
':weaken' => $weaken,
':acid' => $acid,
':acidcount' => $acidcount,
':sleep' => $sleep,
':sleepcount' => $sleepcount,
':disease' => $disease,
':blindness' => $blindness,
':expbonus' => $expbonus,
':invisible' => $invisible,
':fire' => $fire,
':fireresist' => $fireresist,
':ice' => $ice,
':iceresist' => $iceresist,
':lightning' => $lightning,
':lightningresist' => $lightningresist,
':earth' => $earth,
':earthresist' => $earthresist,
':dark' => $dark,
':darkresist' => $darkresist,
':light' => $light,
':lightresist' => $lightresist,
':bleedresist' => $bleedresist,
':knockback' => $knockback,
':criticalhit' => $criticalhit,
':backstab' => $backstab,
':doublestrike' => $doublestrike,
':triplestrike' => $triplestrike,
':catapult' => $catapult,
':bleed' => $bleed,
':bleedcount' => $bleedcount,
':physdamage' => $physdamage,
':reflectphys' => $reflectphys,
':reflectfire' => $reflectfire,
':reflectice' => $reflectice,
':reflectair' => $reflectair,
':reflectearth' => $reflectearth,
':reflectlight' => $reflectlight,
':reflectdark' => $reflectdark,
':vampiric' => $vampiric,
':vampamount' => $vampamount,
':manadrain' => $manadrain,
':drainamount' => $drainamount,
':duality' => $duality,
':lightness' => $lightness,
':longarm' => $longarm,
':throwing' => $throwing,
':ultimateresist' => $ultimateresist,
':ultimatedamage' => $ultimatedamage,
':strength' => $strength,
':speed' => $speed,
':accuracy' => $accuracy,
':agilty' => $agilty,
':wisdom' => $wisdom,
':life' => $life,
':mana' => $mana,
':ultimateboost' => $ultimateboost,
':liferegen' => $liferegen,
':manaregen' => $manaregen,
':blocking' => $blocking,
':petrify' => $petrify,
':paralyze' => $paralyze,
':stun' => $stun,
':fear' => $fear,
':insanity' => $insanity,
':lightfoot' => $lightfoot,
':revivingjolt' => $revivingjolt,
':refillinglight' => $refillinglight,
':despair' => $despair,
':tremors' => $tremors,
':inferno' => $inferno,
':infernocount' => $infernocount,
':freezing' => $freezing,
':freezecount' => $freezecount,
':magicfind' => $magicfind,
':greed' => $greed,
':luck' => $luck,
':lockpicking' => $lockpicking,
':firestarter' => $firestarter,
':heroicboost' => $heroicboost,
':heroiccount' => $heroiccount,
':silence' => $silence,
':antique' => $antique,
':webs' => $webs,
':entanglement' => $entanglement,
':waterbreathe' => $waterbreathe,
':lasso' => $lasso,
':adrenalinerush' => $adrenalinerush,
':adrenalinecount' => $adrenalinecount,
':distraction' => $distraction,
':immobilizeresist' => $immobilizeresist,
':mindresist' => $mindresist,
':criticalresist' => $criticalresist,
':horrifying' => $horrifying,
':ultimaterevive' => $ultimaterevive,
':swarming' => $swarming,
':dryice' => $dryice,
':coldblood' => $coldblood,
':raginginferno' => $raginginferno,
':smoke' => $smoke,
':levelling' => $levelling,
':piercing' => $piercing,
':sharpened' => $sharpened,
':keen' => $keen,
':devastating' => $devastating,
':crushing' => $crushing,
':itemrange' => $itemrange,
':itemspeed' => $itemspeed));

  }

  if ($response==3)

  {

  include ('php/npcicon.php');

  echo "male1";

  include ('php/npcname.php');

  echo "Father";

  include ('php/npcdialogue.php');

  include ('php/getadvice.php');

// **********  USER ICON

echo "</td></tr><tr><td class=\"border\"><img src=\"../images/";


$stmt = $db->prepare("SELECT portrait FROM charstats WHERE charname=:charname;");
				$stmt->execute(array(':charname' => $charname));
while($row = $stmt->fetch())
  {
  echo $row['portrait'];
  }

  echo ".png\" border=\"0\" /><br />Response</td><td class=\"borderl\">";

// ********** END USER ICON

  echo "<table class=\"page\" width=\"100%\"><tr><td class=\"center\" width=\"15%\"><form action=\"father.php?";
echo time();

echo "\" method=\"post\"><input class=\"invisible\" type=\"radio\" name=\"type\" checked=\"checked\" value=\"3\" /><input class=\"small\" type=\"submit\" value=\"Say\" /></form></td><td class=\"left\">Do you have any other advice to offer me?</td></tr>";

  echo "<tr><td class=\"center\" width=\"15%\"><form action=\"../maingraphics.php?";

echo time();

echo "\" method=\"post\"><input class=\"small\" type=\"submit\" value=\"Say\" /></form></td><td class=\"left\">Thank you, Father.</td></tr></table>";

  include ('php/tableend.php');

  }
if ($response==4)

  {

  include ('php/npcicon.php');

  echo "male1";

  include ('php/npcname.php');

  echo "Father";

  include ('php/npcdialogue.php');

  include ('php/levelup.php');

// **********  USER ICON

echo "</td></tr><tr><td class=\"border\"><img src=\"../images/";


$stmt = $db->prepare("SELECT portrait FROM charstats WHERE charname=:charname;");
				$stmt->execute(array(':charname' => $charname));
while($row = $stmt->fetch())
  {
  echo $row['portrait'];
  }

  echo ".png\" border=\"0\" /><br />Response</td><td class=\"borderl\">";

// ********** END USER ICON

  echo "<table class=\"page\" width=\"100%\"><tr><td class=\"center\" width=\"15%\"><form action=\"../maingraphics.php?";

echo time();

echo "\" method=\"post\"><input class=\"small\" type=\"submit\" value=\"Say\" /></form></td><td class=\"left\">Thank you, Father.</td></tr></table>";

  include ('php/tableend.php');

  }










}
else
{
$stmt = $db->prepare("SELECT * FROM flags WHERE charname=:charname;");
				$stmt->execute(array(':charname' => $charname));
while($row = $stmt->fetch())
  {
  
  if ($row['quest4']==1)

  {
  include ('php/npcicon.php');
  echo "male1";
  include ('php/npcname.php');
  echo "Father";
  include ('php/npcdialogue.php');
  echo "Ah, I see you have found the family crest. It contains very special magic. Only those with great power can unlock it's abilities. Keep it. You will need it.";

// **********  USER ICON

echo "</td></tr><tr><td class=\"border\"><img src=\"../images/";


$stmt = $db->prepare("SELECT portrait FROM charstats WHERE charname=:charname;");
				$stmt->execute(array(':charname' => $charname));
while($row = $stmt->fetch())
  {
  echo $row['portrait'];
  }

  echo ".png\" border=\"0\" /><br />Response</td><td class=\"borderl\">";

// ********** END USER ICON

  echo "<table class=\"page\" width=\"100%\"><tr><td class=\"center\" width=\"15%\"><form action=\"../maingraphics.php?";
echo time();

echo "\" method=\"post\"><input class=\"invisible\" type=\"radio\" name=\"type\" checked=\"checked\" value=\"2\" /><input class=\"small\" type=\"submit\" value=\"Say\" /></form></td><td class=\"left\">Ok, thank you.</td></tr></table>";

$stmt2 = $db->prepare('UPDATE flags SET quest4 = 2 WHERE charname = :charname') ;
					$stmt2->execute(array(':charname' => $charname));

include ('php/tableend.php');
  }

  else
  {
	  
  if ($row['shepfeed']==1)
  
  {

  include ('php/npcicon.php');

  echo "male1";

  include ('php/npcname.php');

  echo "Father";

  include ('php/npcdialogue.php');

echo "What? You fed Old Shep? Good! Now if only I could find the key to the cellar, I could send you for more supplies down there. I know there are some nice things down there, but that lock requires a special key.";  

// **********  USER ICON

echo "</td></tr><tr><td class=\"border\"><img src=\"../images/";


$stmt = $db->prepare("SELECT portrait FROM charstats WHERE charname=:charname;");
				$stmt->execute(array(':charname' => $charname));
while($row = $stmt->fetch())
  {
  echo $row['portrait'];
  }

  echo ".png\" border=\"0\" /><br />Response</td><td class=\"borderl\">";

// ********** END USER ICON

  echo "<table class=\"page\" width=\"100%\"><tr><td class=\"center\" width=\"15%\"><form action=\"../maingraphics.php?";

echo time();

echo "\" method=\"post\"><input class=\"invisible\" type=\"radio\" name=\"type\" checked=\"checked\" value=\"2\" /><input class=\"small\" type=\"submit\" value=\"Say\" /></form></td><td class=\"left\">I'll keep an eye out for the key.</td></tr>";

echo "</table>";

  include ('php/tableend.php');

  }
  
    
  if ($row['shepfeed']==2)

  {

  include ('php/npcicon.php');

echo "male1";

  include ('php/npcname.php');

  echo "Father";

  include ('php/npcdialogue.php');

echo "You found a Bone Key! Yes! This is the key to the cellar. Go down there to get some extra supplies for the road on the way to town. Be careful, No one has been down there for a while and there may be rats and spiders.";  

 // **********  USER ICON

echo "</td></tr><tr><td class=\"border\"><img src=\"../images/";


$stmt = $db->prepare("SELECT portrait FROM charstats WHERE charname=:charname;");
				$stmt->execute(array(':charname' => $charname));
while($row = $stmt->fetch())
  {
  echo $row['portrait'];
  }

  echo ".png\" border=\"0\" /><br />Response</td><td class=\"borderl\">";

// ********** END USER ICON

  echo "<table class=\"page\" width=\"100%\"><tr><td class=\"center\" width=\"15%\"><form action=\"../maingraphics.php?";

echo time();

echo "\" method=\"post\"><input class=\"invisible\" type=\"radio\" name=\"type\" checked=\"checked\" value=\"2\" /><input class=\"small\" type=\"submit\" value=\"Say\" /></form></td><td class=\"left\">Ok, I'll be carefull.</td></tr>";

echo "</table>";

  include ('php/tableend.php');
  

$stmt2 = $db->prepare('UPDATE flags SET shepfeed = 3 WHERE charname = :charname') ;
					$stmt2->execute(array(':charname' => $charname));

  }
  
  else
  {
  
  if ($row['quest1']==0)
  {
  include ('php/npcicon.php');
  echo "male1";
  include ('php/npcname.php');
  echo "Father";
  include ('php/npcdialogue.php');
  echo "My child, Happy Birthday! ";
  echo "Despite these strange events that have transpired, I have news for you that should make your Birthday very merry indeed. ";
  echo "The elders in the village have been watching you closely for a few years now. ";
  echo "It seems that you have caught the attention of Old Solias, the mystic. ";
  echo "He believes that you have a special gift, and he wants you to come live with him and be his apprentice. ";
  echo "Isn't that wonderful? You could become a powerful magician like Solias! He could also shed some light on why you seem to be changed...";



echo "</td></tr><tr><td class=\"border\"><img src=\"../images/";


$stmt = $db->prepare("SELECT portrait FROM charstats WHERE charname=:charname;");
				$stmt->execute(array(':charname' => $charname));
while($row = $stmt->fetch())
  {
  echo $row['portrait'];
  }

  echo ".png\" border=\"0\" /><br />Response</td><td class=\"borderl\">";

  echo "<table class=\"page\" width=\"100%\"><tr><td class=\"center\" width=\"15%\"><form action=\"father.php?";
echo time();
echo "\" method=\"post\"><input class=\"invisible\" type=\"radio\" name=\"type\" checked=\"checked\" value=\"2\" /><input class=\"small\" type=\"submit\" value=\"Say\" /></form></td><td class=\"left\">I will go. I seek answers.</td></tr>";
  echo "<tr><td class=\"center\" width=\"15%\"><form action=\"father.php?";

echo time();
echo "\" method=\"post\"><input class=\"invisible\" type=\"radio\" name=\"type\" checked=\"checked\" value=\"1\" /><input class=\"small\" type=\"submit\" value=\"Say\" /></form></td><td class=\"left\" width=\"85%\">I don't want to go. This place is strange to me.</td></tr></table>";

  include ('php/tableend.php');
  }
  if ($row['quest1']==2)

  {
  include ('php/npcicon.php');
  echo "male1";
  include ('php/npcname.php');
  echo "Father";
  include ('php/npcdialogue.php');
  echo "If you need any help or advice, let me know. I will miss you my child.";
// **********  USER ICON

echo "</td></tr><tr><td class=\"border\"><img src=\"../images/";


$stmt = $db->prepare("SELECT portrait FROM charstats WHERE charname=:charname;");
				$stmt->execute(array(':charname' => $charname));
while($row = $stmt->fetch())
  {
  echo $row['portrait'];
  }

  echo ".png\" border=\"0\" /><br />Response</td><td class=\"borderl\">";

// ********** END USER ICON
  echo "<table class=\"page\" width=\"100%\"><tr><td class=\"center\" width=\"15%\"><form action=\"father.php?";
echo time();

echo "\" method=\"post\"><input class=\"invisible\" type=\"radio\" name=\"type\" checked=\"checked\" value=\"3\" /><input class=\"small\" type=\"submit\" value=\"Say\" /></form></td><td class=\"left\">What advice can you offer me?</td></tr>";

  echo "<tr><td class=\"center\" width=\"15%\"><form action=\"../maingraphics.php?";

echo time();

echo "\" method=\"post\"><input class=\"small\" type=\"submit\" value=\"Say\" /></form></td><td class=\"left\">Maybe Later</td></tr>";

echo "<tr><td class=\"center\" width=\"15%\"><form action=\"father.php?";

echo time();

echo "\" method=\"post\"><input class=\"invisible\" type=\"radio\" name=\"type\" checked=\"checked\" value=\"4\" /><input class=\"small\" type=\"submit\" value=\"Say\" /></form></td><td class=\"left\">I would like to learn more and level up.</td></tr></table>";
  include ('php/tableend.php');
  }

  if ($row['quest1']==1)

  {
  include ('php/npcicon.php');
  echo "male1";
  include ('php/npcname.php');
  echo "Father";
  include ('php/npcdialogue.php');
  echo "Did you change your mind about the apprenticeship and meeting with Solias?";
// **********  USER ICON

echo "</td></tr><tr><td class=\"border\"><img src=\"../images/";


$stmt = $db->prepare("SELECT portrait FROM charstats WHERE charname=:charname;");
				$stmt->execute(array(':charname' => $charname));
while($row = $stmt->fetch())
  {
  echo $row['portrait'];
  }

  echo ".png\" border=\"0\" /><br />Response</td><td class=\"borderl\">";

// ********** END USER ICON
  echo "<table class=\"page\" width=\"100%\"><tr><td class=\"center\" width=\"15%\"><form action=\"father.php?";
echo time();

echo "\" method=\"post\"><input class=\"invisible\" type=\"radio\" name=\"type\" checked=\"checked\" value=\"2\" /><input class=\"small\" type=\"submit\" value=\"Say\" /></form></td><td class=\"left\">Yes, I will go, since that is your wish, Father.</td></tr>";
  echo "<tr><td class=\"center\" width=\"15%\"><form action=\"../maingraphics.php?";
echo time();

echo "\" method=\"post\"><input class=\"small\" type=\"submit\" value=\"Say\" /></form></td><td class=\"left\">No, I like it here.</td></tr></table>";
  include ('php/tableend.php');
  }

  
 
  

}

  }

  }
  
}
 ?>