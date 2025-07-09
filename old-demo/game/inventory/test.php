<?php
$itype=0;
if (isset($_POST['itype'])) {
$itype=strip_tags($_POST['itype']);	
}
?>
<?php
include ('../includes/getstats.php');
include ('../includes/getweapontype.php');
include ('../includes/getskills.php');
include ('../includes/getdamage.php');
include ('../includes/getdefense.php');
//***************getflags*****************************
include ('../includes/getflags.php');
//******************get charstats************************
include ('../includes/getcharstats.php');
?>
<!DOCTYPE html>
<html lang="en">
<form action="test.php?<?php echo time(); ?>" method="post"><input class="invisible" type="radio" name="itype" checked="checked" value="Weapon" /><input class="small" type="submit" value="Weapons" /></form>
<?php
if ($itype==0) {
echo $itype;
}
else {
echo $itype;
}
?>