<?php


echo "You learn how to cook! Go to Cooking in the main menu at the bottom of the screen. Go to 'Recipes' and click on 'Cook' on the item you wish to cook.<br />";

echo "<table class=\"page\" width=\"100%\"><tr><td class=\"center\" width=\"15%\"><form action=\"../maingraphics.php?";
echo time();

echo "\" method=\"post\"><input class=\"invisible\" type=\"radio\" name=\"type\" checked=\"checked\" value=\"2\" /><input class=\"small\" type=\"submit\" value=\"Back to Map\" /></form></td></tr></table>";


?>