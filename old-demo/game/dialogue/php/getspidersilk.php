<?php

$query = sprintf("select keep from inventory where username='%s' and itemname='Spider Silk';",mysql_real_escape_string($username));
$result=mysql_query($query);

while($row = mysql_fetch_array($result))
  {
  $spidersilk=$row['keep'];
  }
  ?>