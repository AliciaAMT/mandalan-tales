<?php

include_once dirname(__FILE__) . '/php/init.php';

?>

<script type="text/javascript">
var chat_path    = <?="'$chat_path'";   ?>;
var chat_timeout = <?=  $chat_t_refresh;?>;
</script>

<script type="text/javascript" src="<?=$chat_path;?>js/popup-window.js"></script>

<script type="text/javascript" src="<?=$chat_path;?>js/dropdown.js"    ></script>
<script type="text/javascript" src="<?=$chat_path;?>js/cookies.js"     ></script>
<script type="text/javascript" src="<?=$chat_path;?>js/ajax-chat.js"   ></script>

<!--[if IE]><style type="text/css"> div.chat div.input input { margin-top: -1px; margin-bottom: -1px; } </style><![endif]-->

<div class="chat">


<!-- ***** Main ************************************************************ -->

<div class="main">

<?php if ($chat_show['login']) { ?>
<a class="main" href="javascript:chat_login(true);">Login</a>
<?php } ?>
<?php if ($chat_show['guest']) { ?>
<a class="main" href="javascript:popup_show('glogin', 'glogin_drag', 'glogin_exit', 'element', 50, 50, 'chat', true);">Login&nbsp;as&nbsp;Guest</a>
<?php } ?>
<?php if (count($chat_list) >= 2) { ?>
<div class="main" id="room_parent">Rooms</div>
<?php } ?>
<a class="main" href="javascript:popup_show( 'color', 'color_drag', 'color_exit', 'element', 60, 60, 'chat', false);">Color</a>
<a class="main" href="javascript:popup_show('smiley', 'smiley_drag', 'smiley_exit', 'element', 70, 70, 'chat', false);">Smileys</a>
<a class="main" href="javascript:popup_show( 'about',  'about_drag', 'about_exit', 'element', 80, 80, 'chat', false);">Help</a>
<form class="send" action="" onsubmit="chat_msgs_add(); return false;">
  <table>
  <tr>
    <td><div class="form_input"><div class="input"><textarea id="send" rows="1" cols="45" maxlength="200" autocomplete="off"></textarea></div></div></td>
    <td><input class="submit" type="submit" value="Send" /></td>
  </tr>
  </table>
  </form>
<table class="main">
<tr>
  <td><div id="header_messages"><?=$chat_list[0];?></div><div id="messages"></div></td>
  <td>
    <div id="header_users">Users</div>
    <div id="users">
      <?php if (count($chat_list) >= 2) { ?>
      <b class="other">This room   </b><div id="users_this"></div>
      <b class="other">Other rooms </b><div id="users_othr"></div>
      <?php } ?>
      <?php if (count($chat_list) == 1) { ?>
      <b class="other">Users       </b><div id="users_this"></div><div id="users_othr"></div>
      <?php } ?>
    </div>
  </td>
</tr>



</table>

</div>

<div id="log_log" style="display: <?=$chat_logs['log'] ? "block" : "none";?>;">&nbsp;</div>
<div id="log_add" style="display: <?=$chat_logs['add'] ? "block" : "none";?>;">&nbsp;</div>
<div id="log_get" style="display: <?=$chat_logs['get'] ? "block" : "none";?>;">&nbsp;</div>



<!-- ***** About *********************************************************** -->

<div>
<div class="about"          id="about">
<div class="menu_form_head" id="about_drag">
<div class="menu_form_exit" id="about_exit">&nbsp;</div>Help
</div>
<div class="menu_form_body">

<div class="padding">
<div class="about_aux">
<h1>Tips </h1>
<p>
To start private chat with a user, click his/her username. To return to the main chat, click the "Back to Main Chat" link. Auxiliary boxes can be dragged over the browser window.
</p>
</div>
</div>

</div>
</div>
</div>


<!-- ***** Color *********************************************************** -->

<div>
<div class="color"          id="color">
<div class="menu_form_head" id="color_drag">
<div class="menu_form_exit" id="color_exit">&nbsp;</div>Colors
</div>
<div class="menu_form_body">

<table class="color_aux">
<tr>
<td>
<script type="text/javascript">
img = new Image();
img.src = <?="'{$chat_path}colors.png'";?>;
</script>
<img src="<?=$chat_path;?>colors.png" alt="" usemap="#colors" />
<map id="colors" name="colors">
<?php
$x = 0;
$y = 0;
for ($r = 0; $r < 6; $r++) for ($g = 0; $g < 6; $g++) for ($b = 0; $b < 6; $b++)
{
  $col = str_pad(dechex($r*32+48), 2, STR_PAD_LEFT) .
         str_pad(dechex($g*32+48), 2, STR_PAD_LEFT) .
         str_pad(dechex($b*32+48), 2, STR_PAD_LEFT);
  ?><area href="javascript:chat_api_color('#<?=$col;?>');" coords="<?=$x*8+2;?>,<?=$y*8+2;?>,<?=$x*8+8;?>,<?=$y*8+8;?>" alt="" /><?php
  if ($x == 17) $y++;
  if ($x != 17) $x++; else $x = 0;
}
?>
</map>
</td>
</tr>
</table>

</div>
</div>
</div>

<!-- ***** Login *********************************************************** -->

<div>
<div class="login"          id="login">
<div class="menu_form_head" id="login_drag">
<div class="menu_form_exit" id="login_exit">&nbsp;</div>Login
</div>
<div class="menu_form_body">

<div class="padding">
<form action="" onsubmit="chat_msgs_log(true); return false;">

  <div class="form_title">Username:</div>
  <div class="form_input"><div class="input"><input id="user" type="text" /></div></div>
  <table class="form_separator"><tr><td></td></tr></table>

  <div class="form_title">Password:</div>
  <div class="form_input"><div class="input"><input id="pass" type="password" /></div></div>
  <table class="form_separator"><tr><td></td></tr></table>

  <div class="form_input"><input id="submit_login" class="submit" type="submit" value="Submit" /></div>
  <table class="form_separator"><tr><td></td></tr></table>

</form>
</div>

</div>
</div>
</div>

<script type="text/javascript"> imageButtonAdd('submit_login'); </script>


<!-- ***** Login as Guest ************************************************** -->

<div>
<div class="login"          id="glogin">
<div class="menu_form_head" id="glogin_drag">
<div class="menu_form_exit" id="glogin_exit">&nbsp;</div>Login as Guest
</div>
<div class="menu_form_body">

<div class="padding">
<form action="" onsubmit="chat_msgs_log(false); return false;">

  <div class="form_title">Username:</div>
  <div class="form_input"><div class="input"><input id="guser" type="text" /></div></div>
  <table class="form_separator"><tr><td></td></tr></table>

  <div class="form_input"><input id="submit_glogin" class="submit" type="submit" value="" /></div>
  <table class="form_separator"><tr><td></td></tr></table>

</form>
</div>

</div>
</div>
</div>

<script type="text/javascript"> imageButtonAdd('submit_glogin'); </script>


<!-- ***** Rooms *********************************************************** -->

<div class="room" id="room_child" style="display: none;">
<?php foreach ($chat_list as $i => $room) { ?>
<a class="main" href="javascript:chat_api_onload('<?=$room;?>', true, chat_user, chat_pass);"><?=$room;?></a>
<?php } ?>
</div>

<script type="text/javascript">
if (document.getElementById("room_parent")) dropdown_attach("room_parent", "room_child", "hover", "y", "default");
</script>


<!-- ***** Smiley ********************************************************** -->

<div>

<div class="smiley"         id="smiley">
<div class="menu_form_head" id="smiley_drag">
<div class="menu_form_exit" id="smiley_exit">&nbsp;</div>Smileys
</div>
<div class="menu_form_body">

<div class="padding">
<table>
<tr>
<td>
<?php

$dir = dirname(__FILE__) . '/smileys/';
if ($handle = opendir($dir))
{
  while (false !== ($filename = readdir($handle)))
  {
    $pathinfo = pathinfo("$dir$filename");
    if ($pathinfo['extension'] == 'gif')
    {
      ?>
      <script type="text/javascript">
      img = new Image();
      img.src = <?="'{$chat_path}smileys/{$pathinfo['basename']}'";?>;
      </script>
      <a href="javascript:chat_api_smiley('<?=basename($filename, '.gif');?>');"><img src="<?=$chat_path;?>smileys/<?=$pathinfo['basename'];?>" alt="" /></a>
      <?php
    }
  }
  closedir($handle);
}

?>
</td>
</tr>
</table>
</div>

</div>
</div>
</div>


</div>