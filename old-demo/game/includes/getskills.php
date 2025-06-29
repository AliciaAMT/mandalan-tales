<?php
//***********getskills************************
$scritical=0;
$sblock=0;
$sbackstab=0;
$sbleed=0;
$scatapult=0;
$selemental=0;
$saccuracy=0;
$spoison=0;
$sflame=0;
$sstun=0;

$scrush=0;
$slongarm=0;
$ssweepcombo=0;
$sintimidate=0;
$sfcritical=0;
$sfireresist=0;
$ssmoke=0;
$sinferno=0;
$swcritical=0;
$swresist=0;

$scoldblood=0;
$sdryice=0;
$sacritical=0;
$saresist=0;
$srevivingjolt=0;
$secritical=0;
$seresist=0;
$stremors=0;
$sswarm=0;
$sdcritical=0;
$sdresist=0;
$svampiricdrain=0;
$seyeofdispair=0;
$slcritical=0;
$sultimateresist=0;
$sregenerate=0;
$sultimaterevive=0;
$stmt = $db->prepare("SELECT * FROM skills WHERE charname=:charname");
				$stmt->execute(array(':charname' => $charname));
while($row = $stmt->fetch())
  {
  if ($lhweapontype=="Blade")
{
$scritical=$scritical+$row['sbcritical'];
$sblock=$sblock+$row['sbblocking'];
$sbackstab=$sbackstab+$row['sbbackstab'];
$sbleed=$sbleed+$row['sbbleed'];
}
if ($rhweapontype=="Blade")
{
$scritical=$scritical+$row['sbcritical'];
$sblock=$sblock+$row['sbblocking'];
$sbackstab=$sbackstab+$row['sbbackstab'];
$sbleed=$sbleed+$row['sbbleed'];
}

if ($dualweapontype=="Blade")
{
$scritical=$scritical+$row['sbcritical'];
$sblock=$sblock+$row['sbblocking'];
$sbackstab=$sbackstab+$row['sbbackstab'];
$sbleed=$sbleed+$row['sbbleed'];
}

if ($lhweapontype=="Staff")
{
$scritical=$scritical+$row['sscritical'];
$sblock=$sblock+$row['ssblocking'];
$scatapult=$scatapult+$row['sscatapult'];
$selemental=$selemental+$row['sselemental'];
}
if ($rhweapontype=="Staff")
{
$scritical=$scritical+$row['sscritical'];
$sblock=$sblock+$row['ssblocking'];
$scatapult=$scatapult+$row['sscatapult'];
$selemental=$selemental+$row['sselemental'];
}
if ($dualweapontype=="Staff")
{
$scritical=$scritical+$row['sscritical'];
$sblock=$sblock+$row['ssblocking'];
$scatapult=$scatapult+$row['sscatapult'];
$selemental=$selemental+$row['sselemental'];
}

if ($rhweapontype=="Missle")
{
$scritical=$scritical+$row['smcritical'];
$saccuracy=$saccuracy+$row['smeagle'];
$spoison=$spoison+$row['smpoison'];
$sfire=$sfire+$row['smfire'];
}

if ($lhweapontype=="Missle")
{
$scritical=$scritical+$row['smcritical'];
$saccuracy=$saccuracy+$row['smeagle'];
$spoison=$spoison+$row['smpoison'];
$sfire=$sfire+$row['smfire'];
}

if ($dualweapontype=="Missle")
{
$scritical=$scritical+$row['smcritical'];
$saccuracy=$saccuracy+$row['smeagle'];
$spoison=$spoison+$row['smpoison'];
$sfire=$sfire+$row['smfire'];
}

if ($rhweapontype=="Blunt")
{
$scritical=$scritical+$row['sccritical'];
$sblock=$sblock+$row['scblocking'];
$sstun=$sstun+$row['scstun'];
$scrush=$scrush+$row['sccrush'];
}

if ($lhweapontype=="Blunt")
{
$scritical=$scritical+$row['sccritical'];
$sblock=$sblock+$row['scblocking'];
$sstun=$sstun+$row['scstun'];
$scrush=$scrush+$row['sccrush'];
}

if ($dualweapontype=="Blunt")
{
$scritical=$scritical+$row['sccritical'];
$sblock=$sblock+$row['scblocking'];
$sstun=$sstun+$row['scstun'];
$scrush=$scrush+$row['sccrush'];
}

if ($rhweapontype=="Polearm")
{
$scritical=$scritical+$row['spcritical'];
$slongarm=$slongarm+$row['splongarm'];
$scatapult=$scatapult+$row['spcatapult'];
$ssweepcombo=$ssweepcombo+$row['spsweep'];
}

if ($lhweapontype=="Polearm")
{
$scritical=$scritical+$row['spcritical'];
$slongarm=$slongarm+$row['splongarm'];
$scatapult=$scatapult+$row['spcatapult'];
$ssweepcombo=$ssweepcombo+$row['spsweep'];
}

if ($dualweapontype=="Polearm")
{
$scritical=$scritical+$row['spcritical'];
$slongarm=$slongarm+$row['splongarm'];
$scatapult=$scatapult+$row['spcatapult'];
$ssweepcombo=$ssweepcombo+$row['spsweep'];
}

if ($rhweapontype=="Exotic")
{
$scritical=$scritical+$row['sxcritical'];
$sblock=$sblock+$row['sxblocking'];
$sintimidate=$sintimidate+$row['sxintimidate'];
$sbleed=$sbleed+$row['sxbleed'];
}

if ($lhweapontype=="Exotic")
{
$scritical=$scritical+$row['sxcritical'];
$sblock=$sblock+$row['sxblocking'];
$sintimidate=$sintimidate+$row['sxintimidate'];
$sbleed=$sbleed+$row['sxbleed'];
}

if ($dualweapontype=="Exotic")
{
$scritical=$scritical+$row['sxcritical'];
$sblock=$sblock+$row['sxblocking'];
$sintimidate=$sintimidate+$row['sxintimidate'];
$sbleed=$sbleed+$row['sxbleed'];
}

$sfcritical=$sfcritical+$row['sfcritical'];
$sfireresist=$sfireresist+$row['sfresist'];
$ssmoke=$ssmoke+$row['sfsmoke'];
$sinferno=$sinferno+$row['sfinferno'];

$swcritical=$swcritical+$row['sicritical'];
$swresist=$swresist+$row['siresist'];
$scoldblood=$scoldblood+$row['sicoldblood'];
$sdryice=$sdryice+$row['sidryice'];

$sacritical=$sacritical+$row['slcritical'];
$saresist=$saresist+$row['slresist'];
$sstun=$sstun+$row['slstun'];
$srevivingjolt=$srevivingjolt+$row['slrevive'];

$secritical=$secritical+$row['secritical'];
$seresist=$seresist+$row['seresist'];
$stremors=$stremors+$row['setremor'];
$sswarm=$sswarm+$row['seswarm'];

$sdcritical=$sdcritical+$row['sdcritical'];
$sdresist=$sdresist+$row['sdresist'];
$svampiricdrain=$svampiricdrain+$row['sdvampire'];
$seyeofdispair=$seyeofdispair+$row['sdeye'];

$slcritical=$slcritical+$row['stcritical'];
$sultimateresist=$sultimateresist+$row['stresist'];
$sregeneraate=$sregenerate+$row['stregenerate'];
$sultimaterevive=$sultimaterevive+$row['strevive'];

  }
  ?>