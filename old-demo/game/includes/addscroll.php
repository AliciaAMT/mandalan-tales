<?php

//insert into database
				$stmt = $db->prepare('INSERT INTO spellbook (charname,spellname,spellimage,spelldescription,spelltype,element,spelllevel,learned,manacost,heallife,ingredients,healmana,offensive,damage) VALUES (:charname,:spellname,:spellimage,:spelldescription,:spelltype,:element,:spelllevel,:learned,:manacost,:heallife,:ingredients,:healmana,:offensive,:damage)');
				$stmt->execute(array(
				':charname' => $charname,
				':spellname' => $spellname,
				':spellimage' => $spellimage,
				':spelldescription' => $spelldescription,
				':spelltype' => $spelltype,
				':element' => $element,
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