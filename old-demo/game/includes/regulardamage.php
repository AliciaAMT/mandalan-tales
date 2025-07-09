<?php
$strongbonus=$strength;
$strongbonus=$strongbonus*.01;
$damage=$damage+$strongbonus;
$amount=mt_rand(1,100);
$amount=$amount*.01;
$damage=round($damage*$amount);
$levelbonus=$level;
$damage=$damage+$levelbonus;
//**********deflect/armor*******
$deflect=$enemyarmor;
$rand=mt_rand(1,100);
$rand=$rand*.01;
$deflect=$deflect*$rand;
$deflect=round($deflect);
if ($deflect>$damage)
{
$deflect=$damage;
}
//$report="<span class=\"green\">You attack and hit for <b>";
//$report=$report.$damage;
//$report=$report." </b>Damage! <b>";
//$report=$report.$deflect;
//$report=$report." </b>Damage is Deflected!</b></span><br />";
//$damage=$damage-$deflect;
?>