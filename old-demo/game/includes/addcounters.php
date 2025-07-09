<?php

$querys = sprintf("insert into counters values ( 
'%s',
0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 
0, 0, 0, 0, 0, 0, 0, 0

);", 

mysqli_real_escape_string($db, $name)

);

mysqli_query($db, $querys);

?>