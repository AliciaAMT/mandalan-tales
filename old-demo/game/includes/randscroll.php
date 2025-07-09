<?php
include ('includes/zerospell.php');
$rand=mt_rand(1,2);
if ($rand==1)
{
$spellname = 'Fireball';
$spellimage = 'fireball';
$spelldescription = 'Launch an explosive ball of fire at your enemy.';
$spelltype = 'Scroll';
$element = 'Fire';
$spelllevel = 1;
$learned = 1;
$offensive = 1;
$damage = 10;
}

if ($rand==2)

{
$spellname="First Aid";
$spellimage="redcross";
$spelldescription = 'By summoning your inner light you heal minor wounds. While healing is minimal, casting cost is very cheap.';
$spelltype = 'Scroll';
$element = 'Light';
$spelllevel = 1;
$learned = 1;
$manacost = 0;
$heallife = 5;
$ingredients = 'None';
$healmana = 0;
$offensive = 0;
$damage = 0;
}
//add scroll to spellbook*************************
include ('includes/addspell.php');

?>