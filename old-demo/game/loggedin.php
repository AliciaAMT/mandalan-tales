<?php
//include config
require_once( $_SERVER['DOCUMENT_ROOT'] . '/game/includes/config2.php');
if(!$user->is_logged_in()){ header('Location: login.php'); }
require( $_SERVER['DOCUMENT_ROOT'] . '/game/includes/head.php');

require( $_SERVER['DOCUMENT_ROOT'] . '/game/includes/banner.php');

$username = $_SESSION['username'];

?>
<p>Logged in as <?php echo $username; ?></p>
<a href="choosecharacterg.php">Continue</a></body></html>