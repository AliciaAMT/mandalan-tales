<html>
<body>
<?php
$defense = intdiv(34, 6);
$defense=$defense+2;
$randdef=mt_rand(0,50);
$defense=$defense*$randdef*.01;
$defense=round($defense);



echo $defense;
?>
</body></html>