<?php
	if ($fight>0)
	{
	//*****************************************
$loc = 'Location: monsters/nomove.php?'.time();
header($loc);	
 die('This site works best with redirections turned on, but you may continue with them turned off. <a href="monsters/nomove.php">Continue</a>');
	}
?>