<?php
//include config
require( $_SERVER['DOCUMENT_ROOT'] . '/game/includes/config2.php');
$user->logout();
header('Location: mandala.php'); 
die('This site works best with redirections turned on, but you may continue with them turned off. <a href="mandala.php">Continue</a>');
?>