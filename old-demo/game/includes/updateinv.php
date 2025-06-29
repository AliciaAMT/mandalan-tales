<?php

//**********************UPDATE INVENTORY****************************************************
$stmt = $db->prepare('UPDATE inventory SET keep = keep + :keep WHERE charname= :charname AND itemname = :itemname');
					$stmt->execute(array(
					':keep' => $keep,
					':charname' => $charname,
					':itemname' => $itemname
					));
					?>