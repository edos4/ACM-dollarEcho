<?php
$mysql_host = "localhost";
$mysql_database = "code.wars";
$mysql_user = "root";
$mysql_password = "";

$MYSQL_HOST = "localhost";
$MYSQL_DB = "feueac_codewars";
$MYSQL_LOGIN = "root";
$MYSQL_PASS = "";

$connect = mysql_connect ( $MYSQL_HOST, $MYSQL_LOGIN, $MYSQL_PASS ) or die ( "couldnt connect" );
mysql_select_db ( $MYSQL_DB ) or die ( "cannot select DB" );
?>
