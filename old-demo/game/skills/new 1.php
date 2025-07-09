<div class="border1">
<table class="page">
<tr><td class="page" colspan="2">
<h2>Critical Hit</h2>
</td></tr><tr>
<td class="left" colspan="2">
This skill provides the exotic weapons master knowledge for an increased chance for a critical hit and increased critical hit damage.
</td></tr><tr><td class="left">
Skill Points Spent: <?php echo $sxcritical; ?>
</td><td class="page">
<form action="skills.php?<?php echo time(); ?>" method="post"><input class="invisible" type="radio" name="type" checked="checked" value="sxcritical" /><input class="small" type="submit" value="Spend Point" /></form>
</td></tr>
</table>
</td></tr><tr><td class="border">
<table class="page">
<tr><td class="page" colspan="2">
<h2>Blocking Weapons</h2>
</td></tr><tr><td class="left" colspan="2">
You learn to use your exotic weapons to block your opponents attacks. The effect is doubled when dual wielding exotic weapons.
</td></tr><tr><td class="left">
Skill Points Spent: <?php echo $$sxblocking;; ?>
</td><td class="page">
<form action="skills.php?<?php echo time(); ?>" method="post"><input class="invisible" type="radio" name="type" checked="checked" value="$sxblocking;" /><input class="small" type="submit" value="Spend Point" /></form>
</td></tr></table>
</td></tr><tr><td class="border">
<table class="page">
<tr><td class="page" colspan="2">
<h2>Intimidate</h2>
</td></tr><tr><td class="left" colspan="2">
You learn to flourish your weapons in order to intimidate the enemy with your skill.
</td></tr><tr><td class="left">
Skill Points Spent: <?php echo $sxintimidate; ?>
</td><td class="page">
<form action="skills.php?<?php echo time(); ?>" method="post"><input class="invisible" type="radio" name="type" checked="checked" value="sxintimidate" /><input class="small" type="submit" value="Spend Point" /></form>
</td></tr></table>
</td></tr><tr><td class="border">
<table class="page">
<tr><td class="page" colspan="2">
<h2>Bleeding</h2>
</td></tr><tr><td class="left" colspan="2">
You learn how to attack your enemy in a way that causes him to bleed for several turns.
</td></tr><tr><td class="left">
Skill Points Spent: <?php echo $sxbleed; ?>
</td><td class="page">
<form action="skills.php?<?php echo time(); ?>" method="post"><input class="invisible" type="radio" name="type" checked="checked" value="sxbleed" /><input class="small" type="submit" value="Spend Point" /></form>
</td></tr>
</table>
</div>