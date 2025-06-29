<?php
//thehiddenkey formerly quest 2


$stmt = $db->prepare("SELECT * FROM flags WHERE charname=:charname;");
				$stmt->execute(array(':charname' => $charname));
				
while($row = $stmt->fetch())
  {
  
  $bedroomrug=$row['bedroomrug'];
  $thehiddenkey=$row['thehiddenkey'];
  $bedroomwardrobe=$row['bedroomwardrobe'];
  $bedroomdesk=$row['bedroomdesk'];
  $bedroomcoatrack=$row['bedroomcoatrack'];
  $bedroomshelf=$row['bedroomshelf'];
  $bedroomchest=$row['bedroomchest'];
  $bedroombed=$row['bedroombed'];
  $homeshelf=$row['homeshelf'];
  $homerug=$row['homerug'];
  $hometable=$row['hometable'];
  $homechest=$row['homechest'];
  $homeshelf2=$row['homeshelf2'];
  $homerack=$row['homerack'];
  $homepantry=$row['homepantry'];
  $homedrawer=$row['homedrawer'];
  $homefireplace=$row['homefireplace'];
  $cellarspider=$row['cellarspider'];
  $shepfeed=$row['shepfeed'];
  $sheppet=$row['sheppet'];
  $yardgarden=$row['yardgarden'];
  $yardmelon=$row['yardmelon'];
  $yardtrees=$row['yardtrees'];
  $yardcoop=$row['yardcoop'];
  $cellarrice=$row['cellarrice'];
  $cellarveggie=$row['cellarveggie'];
  $cellaritem=$row['cellaritem'];
  $cellarpurse=$row['cellarpurse'];
  $cellarpotion=$row['cellarpotion'];
  $cellaritem=$row['cellaritem'];
  $cellarbottle=$row['cellarbottle'];
  $cellarchest=$row['cellarchest'];
  $cellarshelf=$row['cellarshelf'];
  $quest1=$row['quest1'];
  $barnwood=$row['barnwood'];
  $barnhay=$row['barnhay'];
  $barncow=$row['barncow'];
  $ishforesttreea=$row['ishforesttreea'];
  $ishforesttreeb=$row['ishforesttreeb'];
  $ishforesttreec=$row['ishforesttreec'];
  $ishforestpyramid=$row['ishforestpyramid'];
  $quest1=$row['quest1'];
  $cavea=$row['cavea'];
  $caveb=$row['caveb'];
  $cavec=$row['cavec'];
  $caved=$row['caved'];
  $cavee=$row['cavee'];
  $giantscorpion=$row['giantscorpion'];
  $pyramidachest1=$row['pyramidachest1'];
  $pyramidachest2=$row['pyramidachest2'];
  $giantbat=$row['giantbat'];
  $giantsnake=$row['giantsnake'];
  $pyramidachest3=$row['pyramidachest3'];
  $pyramidachest4=$row['pyramidachest4'];
  $anubis=$row['anubis'];
  $guild=$row['guild'];
  $newcharacter=$row['newcharacter'];
  $quest4=$row['quest4'];
  $firelit=$row['firelit'];
  }
?>