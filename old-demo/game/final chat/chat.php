<?php include ('../php/getcookie.php'); ?>
<?php
echo "<!DOCTYPE html PUBLIC\"-//W3C//DTD XHTML 1.0 Transitional//EN\"\"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd\"><html xmlns=\"http://www.w3.org/1999/xhtml\"><head><meta name=\"Keywords\" content=\"free, mandalan, christian, anarchism, anarchist, hippy, non-violence, tolerance, peace, gnostic, god, church, unorthodox, rebel, anti, jesus, bible, mary, magdalene, catholic, fellowship\" /><meta name=\"Description\" content=\"A haven for Christians who believe in Non-Violence, Tolerance, Knowledge, and Truth and answer only to God.\" /><link rel=\"stylesheet\" type=\"text/css\" href=\"main.css\" /><link rel=\"stylesheet\" type=\"text/css\" href=\"ajax-chat/style/style.css\" /><style type=\"text/css\"> html, body { padding: 0px; margin: 0px; } </style></head>"; ?>

<body onload="chat_api_onload('Main Room', false, '<?php $username=$_COOKIE["username"]; echo $username; ?>', '<?php $password=$_COOKIE["pass"]; echo $password; ?>');">




<?php
$chat_list = array('Main Room', 'Room 1', 'Room 2');
$chat_logs = array('add' => false, 'get' => false, 'log' => false);
$chat_show = array('login' => false, 'guest' => false);
$chat_path = 'ajax-chat/';
include_once 'ajax-chat/ajax-chat.php';
?>
</body>
</html>