<?php

//insert into database
				$stmt = $db->prepare('INSERT INTO spellbook (charname, spellname, spelldescription, spelltype, element, spellimage, spelllevel, learned, manacost, heallife, ingredients, healmana, offensive, damage)

 VALUES 

(:charname, :spellname, :spelldescription, :spelltype, :element, :spellimage, :spelllevel, :learned, :manacost, :heallife, :ingredients, :healmana, :offensive, :damage)') ;
				$stmt->execute(array(
':charname' => $charname, 
':spellname' => $spellname,
':spelldescription' => $spelldescription,
':spelltype' => $spelltype, 
':element' => $element,
':spellimage' => $spellimage,
':spelllevel' => $spelllevel, 
':learned' => $learned,
':manacost' => $manacost,
':heallife' => $heallife, 
':ingredients' => $ingredients,
':healmana' => $healmana,
':offensive' => $offensive,
':damage' => $damage
));
?>