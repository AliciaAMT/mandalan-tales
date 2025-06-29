<?php

if (isset($_POST['mode']))
{
$mode = $_POST['mode'];
if ($mode = 1)
{ 
//*****************************************
$loc = 'Location: mandala.php?'.time();
header($loc);
} 
if ($mode = 2)
{ 
//*****************************************
$loc = 'Location: mandalatext.php?'.time();
header($loc);
} 
else {
			$message = $submit;
		}

	}//end if submit

	if(isset($message)){ echo $message; }
	
	?>