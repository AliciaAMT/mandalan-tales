Installation:

1. Upload all files to the server.

2. If necessary, change permissions for the file "ajax-chat/php/data.txt" so that
   it can be modified by php script. Setting permissions to 0666 should be enough.

3. Open sample.php in your browser and test the chat.


Installation (more):

4. To edit configuration, open "ajax-chat/php/init.php" file and find "Config" section.
   Use $chat_admin variable to set admin accounts.
   Use $chat_histlen variable to set the number of messages to be kept.
   Use $chat_t_logout and $chat_t_refresh variables to set logout and refresh timeouts.
   Use chat_chk function to implement custom user authentication.

5. To enable or disable system messages (such as user enter/leave notifications),
   open "ajax-chat/js/ajax-chat.js" file and set chat_smsg variable to true or false.

6. To place ajax chat on a webpage, add the code:
     <link rel="stylesheet" type="text/css" href="relative_path/ajax-chat/style/style.css" />
   to the <head> section, the code:
     <?php
     $chat_list = array('Main Room', 'Room 1', 'Room 2');
     $chat_logs = array('add' => false, 'get' => false, 'log' => false);
     $chat_show = array('login' => true, 'guest' => true);
     $chat_path = 'relative_path/ajax-chat/';
     include_once 'relative_path/ajax-chat/ajax-chat.php';
     ?>
   to the <body> section, and use onload event:
     <body onload="chat_api_onload('Main Room', true);">
   to initialize chat.
   Check "ajax-chat/sample.php" and "ajax-chat/sample_autologin.php" to for the sample.
   Variables overview:
     $chat_list - the list of rooms.
     $chat_logs - controls log output (for testing).
     $chat_show - show/hide login and guest login options.
     $chat_path - relative path to the script location.

7. To add or replace smileys, simply add them to "ajax-chat/smileys" folder.


Admin commands:

1. /kick user_name days_number - kick user
2. /mute user_name days_number - mute user
3. /list kick - list kicked users
4. /list mute - list  muted users
5. To cancel kick or mute command, just use zero days_number (for example "/kick bully 0")


Issues:

1. Due to unresolved bug in FireFox (https://bugzilla.mozilla.org/show_bug.cgi?id=167801),
   I have to use "fixed" position instead of "absolute" position for login box in FireFox.
   This has two consequences (for FireFox only):
   (a) Login box can't be dragged like other auxiliary boxes;
   (b) If you scroll browser window, login box will stay on the same place.


If you have any question, feel free to contact me.
Thank you for using my script.

Ilya S. Lyubinskiy
http://www.php-development.ru/