<?php


$mysql_host = "localhost";
$mysql_database = "code.wars";
$mysql_user = "root";
$mysql_password = "";

$hostdb="localhost";
$db="feueac_codewars";
$userdb="root";
$pwdb="";

$connect=mysql_connect($hostdb,$userdb,$pwdb) or die("couldnt connect");
mysql_select_db($db)or die("cannot select DB");
?>
