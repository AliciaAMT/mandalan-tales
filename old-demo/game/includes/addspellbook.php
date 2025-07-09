<?php

$charname=strip_tags($_POST["name"]);
$portrait=strip_tags($_POST["portrait"]);
$race=strip_tags($_POST["race"]);
$mclass=strip_tags($_POST["class"]);
$gender=strip_tags($_POST["gender"]);

if ($mclass=="Shaman")
{
	
	$spellname = "Holy Water";
	$spelldescription = "By chanting a ritual blessing you can transform regular boiling water into Holy Water, a key base for many other Potions.";
	$spelltype = "Potion";
	$element = "Blessing";
	$spellimage = "holywater";
	$spelllevel = 1;
	$learned = 1;
	$manacost = 0;
	$heallife = 75;
	$ingredients = "Water<br />Bottle<br />Fire";
	$healmana = 75;
	$offensive = 0;
	$damage = 0;
	
//insert into database
		require( $_SERVER['DOCUMENT_ROOT'] . '/game/includes/addspell.php');		


	$spellname = "Soothing Aloe";
	$spelldescription = "You summon the healing power of aloe to alleviate your minor wounds.";
	$spelltype = "Elemental";
	$element = "Earth";
	$spellimage = "aloe";
	$spelllevel = 1;
	$learned = 1;
	$manacost = 5;
	$heallife = 10;
	$ingredients = "none";
	$healmana = 0;
	$offensive = 0;
	$damage = 0;
	
//insert into database
		require( $_SERVER['DOCUMENT_ROOT'] . '/game/includes/addspell.php');	

}



else
{
	
	
	$spellname = "Soothing Aloe";
	$spelldescription = "You summon the healing power of aloe to alleviate your minor wounds.";
	$spelltype = "Elemental";
	$element = "Earth";
	$spellimage = "aloe";
	$spelllevel = 1;
	$learned = 0;
	$manacost = 5;
	$heallife = 10;
	$ingredients = "none";
	$healmana = 0;
	$offensive = 0;
	$damage = 0;
	
//insert into database
		require( $_SERVER['DOCUMENT_ROOT'] . '/game/includes/addspell.php');	

		$spellname = "Holy Water";
	$spelldescription = "By chanting a ritual blessing you can transform regular boiling water into Holy Water, a key base for many other Potions.";
	$spelltype = "Potion";
	$element = "Blessing";
	$spellimage = "holywater";
	$spelllevel = 1;
	$learned = 0;
	$manacost = 0;
	$heallife = 75;
	$ingredients = "Water<br />Bottle<br />Fire";
	$healmana = 75;
	$offensive = 0;
	$damage = 0;
	
//insert into database
		require( $_SERVER['DOCUMENT_ROOT'] . '/game/includes/addspell.php');		



if ($mclass=="Mystic")
{
	$spellname = "Fireball";
	$spelldescription = "Launch an explosive ball of fire at your enemy.";
	$spelltype = "Elemental";
	$element = "Fire";
	$spellimage = "fireball";
	$spelllevel = 1;
	$learned = 1;
	$manacost = 10;
	$heallife = 0;
	$ingredients = "None";
	$healmana = 0;
	$offensive = 1;
	$damage = 15;
//insert into database
		require( $_SERVER['DOCUMENT_ROOT'] . '/game/includes/addspell.php');
		
$spellname = "Sparking Embers";
	$spelldescription = "This enchantment causes weapons to emit sparks of fire upon striking a target, causing extra damage. Enchanted armor has a chance to emit sparks upon being struck by the enemy.";
	$spelltype = "Enchantment";
	$element = "Fire";
	$spellimage = "fire";
	$spelllevel = 1;
	$learned = 1;
	$manacost = 5;
	$heallife = 0;
	$ingredients = "None";
	$healmana = 0;
	$offensive = 0;
	$damage = 0;
//insert into database
		require( $_SERVER['DOCUMENT_ROOT'] . '/game/includes/addspell.php');

$spellname = "Burning Steam";
	$spelldescription = "You shoot pillars of burning steam from your hands toward your enemies.";
	$spelltype = "Elemental";
	$element = "Water";
	$spellimage = "steam";
	$spelllevel = 1;
	$learned = 1;
	$manacost = 5;
	$heallife = 0;
	$ingredients = "None";
	$healmana = 0;
	$offensive = 1;
	$damage = 6;
//insert into database
		require( $_SERVER['DOCUMENT_ROOT'] . '/game/includes/addspell.php');
}
else
{
$spellname = "Sparking Embers";
	$spelldescription = "This enchantment causes weapons to emit sparks of fire upon striking a target, causing extra damage. Enchanted armor has a chance to emit sparks upon being struck by the enemy.";
	$spelltype = "Enchantment";
	$element = "Fire";
	$spellimage = "fire";
	$spelllevel = 1;
	$learned = 0;
	$manacost = 5;
	$heallife = 0;
	$ingredients = "None";
	$healmana = 0;
	$offensive = 0;
	$damage = 0;
//insert into database
		require( $_SERVER['DOCUMENT_ROOT'] . '/game/includes/addspell.php');
$spellname = "Burning Steam";
	$spelldescription = "You shoot pillars of burning steam from your hands toward your enemies.";
	$spelltype = "Elemental";
	$element = "Water";
	$spellimage = "steam";
	$spelllevel = 1;
	$learned = 0;
	$manacost = 5;
	$heallife = 0;
	$ingredients = "None";
	$healmana = 0;
	$offensive = 1;
	$damage = 6;
//insert into database
		require( $_SERVER['DOCUMENT_ROOT'] . '/game/includes/addspell.php');
}
if ($mclass=="Rogue")
{
	$spellname = "Fireball";
	$spelldescription = "Launch an explosive ball of fire at your enemy.";
	$spelltype = "Elemental";
	$element = "Fire";
	$spellimage = "fireball";
	$spelllevel = 1;
	$learned = 0;
	$manacost = 10;
	$heallife = 0;
	$ingredients = "None";
	$healmana = 0;
	$offensive = 1;
	$damage = 15;
//insert into database
		require( $_SERVER['DOCUMENT_ROOT'] . '/game/includes/addspell.php');
}
else
{

	
$spellname = "Fireball";
	$spelldescription = "Launch an explosive ball of fire at your enemy.";
	$spelltype = "Elemental";
	$element = "Fire";
	$spellimage = "fireball";
	$spelllevel = 1;
	$learned = 0;
	$manacost = 10;
	$heallife = 0;
	$ingredients = "None";
	$healmana = 0;
	$offensive = 1;
	$damage = 15;
//insert into database
		require( $_SERVER['DOCUMENT_ROOT'] . '/game/includes/addspell.php');




}

	$spellname = "First Aid";
	$spelldescription = "By summoning your inner light you heal minor wounds. While healing is minimal, casting cost is very cheap.";
	$spelltype = "Elemental";
	$element = "Light";
	$spellimage = "redcross";
	$spelllevel = 1;
	$learned = 0;
	$manacost = 10;
	$heallife = 15;
	$ingredients = "None";
	$healmana = 0;
	$offensive = 0;
	$damage = 0;
//insert into database
		require( $_SERVER['DOCUMENT_ROOT'] . '/game/includes/addspell.php');
}
	
 ?>