<?php 
$stmt = $db->prepare("SELECT newcharacter FROM flags WHERE charname=:charname;");
				$stmt->execute(array(':charname' => $charname));
while($row = $stmt->fetch())
	{
	if ($row['newcharacter']==0)
	{
	
$stmt2 = $db->prepare('UPDATE flags SET newcharacter = 1 WHERE charname = :charname') ;
					$stmt2->execute(array(':charname' => $charname));

die ("<br /><table class=\"page\"><tr><td class=\"border\">
	<table class=\"page\"><tr><td class=\"page\"><h2>Welcome to Mandala</h2>
	</td></tr><tr><td class=\"left\">
	<h3>Tips:</h3>
	1. Explore everything. Almost anything in the ‘Tile Actions’ table is important.<br />
	2. Talk to everyone and keep talking! They might have more to say than the first conversation.<br />
	3. Remember the map is like a compass: you are always located in the center and you can move north, south, east, or west.<br />
	4. Don’t forget to check your inventory when you find an item you want to equip and equip it!<br />
	5. Don’t go into battle without a weapon.<br />
	6. Place items you don’t want in your ’Trade Pocket’ so your inventory does not get too cluttered.<br />
	7. Use your skill points; they are very valuable in battle.<br />
	8. Cooking can be worthwhile if you don’t have healing spells and sometimes even if you do!<br />
	9. Sleeping heals Plague and Disease, and it also becomes your starting point in case you die and have to come back. In other words, if you are far away from home and find a bed or rest area, rest there to save your progress.<br />
	10. Water allows you to heal in battle, rest by a fire, cook certain foods, and it fully heals your health and mana when you drink from the water source. Water containers are valuable and you should fill them at any chance you get. <br />
	11. When exploring outside, it is worth checking the same square more than once… you never know what might randomly appear.<br />
	12. Some plants can be harvested more than once, and they replenish after you have leveled up several times.<br />
	13. If you cannot see the entire screen well without scrolling, try F11 or Ctrl - or + to adjust the size of the screen.<br />
	14. Premium membership allows you to explore new areas, complete extra quests, use better items, and level up past level 25.</td></tr><tr><td class=\"page\">
	
<table class=\"page\"><tr><td class=\"page\"><a class=\"small\" href=\"maingraphics.php?".time()."\">Continue</a></td></tr></table></td></tr></table></body></html>");

	}
	
	if ($row['newcharacter']==1 and $quest1==0)
	{
	echo "<table=\"page\"><tr><td class=\"left\">	
	Tutorial Message: Talk to the man by clicking on 'Father' in the ‘Tile Actions’ table. Accept his quest.
	</td></tr></table>";
	
	}
	
	if ($quest1==1 and $row['newcharacter']==1)
	{
	echo "<table=\"page\"><tr><td class=\"left\">	
	Tutorial Message: You didn't accept his quest! Try talking to 'Father' again, and this time accept the quest!
	</td></tr></table>";
	}
	
	if ($quest1==2 and $row['newcharacter']==1)
	{
	
$stmt2 = $db->prepare('UPDATE flags SET newcharacter = 2 WHERE charname = :charname') ;
					$stmt2->execute(array(':charname' => $charname));

	echo "<table=\"page\"><tr><td class=\"left\">	
	Tutorial Message: Good Job! Talk to your father again to get more information. Remember to go back to your father to level up when the time comes (100 experience). Now look under the rug...

	</td></tr></table>";
	}
	
	if ($quest1>1 and $row['newcharacter']==2 and $bedroomrug==0)
	{
	echo "<table=\"page\"><tr><td class=\"left\">	
	Tutorial Message: Good Job! Remember to go back to your father to level up when the time comes (100 experience). Now look under the rug...

	</td></tr></table>";
	}
	
	if ($row['newcharacter']==2 and $bedroomrug==1 and $bedroombed==0)
	{
	echo "<table=\"page\"><tr><td class=\"left\">	
	Tutorial Message: Good Job! Now go to your bed and search it. Move by clicking the tiles on the map, North, South, East, or West. You may not move diagonally.

	</td></tr></table>";
	}
	
	if ($row['newcharacter']==2 and $bedroombed==1 and $thehiddenkey==3)
	{
	echo "<table=\"page\"><tr><td class=\"left\">	
	Tutorial Message: You now have the box and the key that goes with it. Go to your inventory to open it. Don’t forget to equip the item you find inside!";

	}
	
	if ($row['newcharacter']==2 and $bedroombed==1 and $thehiddenkey==4)
	{
	echo "<table=\"page\"><tr><td class=\"left\">	
	Tutorial Message: Wonderful! You have completed the tutorial. Don’t forget to explore the rest of the room before you go downstairs. Have fun!";

$stmt2 = $db->prepare('UPDATE flags SET newcharacter = 3 WHERE charname = :charname') ;
					$stmt2->execute(array(':charname' => $charname));

	}
	
	}
?>