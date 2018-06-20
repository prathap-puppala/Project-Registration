<?php
session_start();
require_once("config.php");
if(isset($_SESSION['userid']))
{
if(isset($_POST['sno']))
{
$sno=trim(strip_tags(htmlspecialchars($_POST['sno'])));
$que=mysql_query("SELECT * FROM areas WHERE sno='".mysql_real_escape_string($sno)."'");
if(mysql_num_rows($que)>=1)
{
if(mysql_num_rows(mysql_query("SELECT * FROM submits WHERE stuid='".$_SESSION['stuid']."'"))>=1)
{
echo "Already Submitted";
}
else
{
$v=mysql_fetch_array($que);
$ip=$_SERVER['REMOTE_ADDR']?:($_SERVER['HTTP_X_FORWARDED_FOR']?:$_SERVER['HTTP_CLIENT_IP']);

if(mysql_query("INSERT INTO submits(stuid,area,ip) VALUES('".$_SESSION['userid']."','".$v['area']."','$ip')"))
{
echo "success";
}
}
}
else
{
echo "There is no such Area";	
}
}
}
?>
