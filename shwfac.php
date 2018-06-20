<?php
session_start();
require_once("config.php");

if(isset($_POST['sno']))
{
$sno=trim(strip_tags(htmlspecialchars($_POST['sno'])));
$que=mysql_query("SELECT * FROM areas WHERE sno='".mysql_real_escape_string($sno)."'");
if(mysql_num_rows($que)>=1)
{
$r=mysql_fetch_array($que);

$w=mysql_query("SELECT * FROM areas WHERE area='".$r['area']."'");
echo "<br>";
while($e=mysql_fetch_array($w))
{
echo "<p style='font-size:12px;'>".$e['facname']."</p><br>";
}
}
else
{
echo "There is no such Area";	
}
}
?>
