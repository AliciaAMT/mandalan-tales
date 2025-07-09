<?php

$querys = sprintf("insert into enemy values ( 
'%s',
'None', 0, 'Select an Option', 'None', 'None', 'None', 0, 'Good', 0, 0, 
0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 
0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 
0, 0, 0

);", 

mysqli_real_escape_string($db, $name)

);

mysqli_query($db, $querys);

?>