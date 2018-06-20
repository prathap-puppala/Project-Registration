<?php

$connect=mysql_connect("localhost","root","sf1prathap") or die("Error in connecting to Server");
mysql_select_db("projectreg",$connect) or die("Error while Selecting Database");
$ip=$_SERVER['REMOTE_ADDR'];
date_default_timezone_set('Asia/Kolkata');


?>
