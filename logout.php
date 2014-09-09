<? ob_start(); ?>
<html>
<head>
<title>ONLINE EXAM</title>
</head>
<body>
	<center>
<?
session_start ();
session_destroy ();
mysql_close ( "register" );

header ( "location:index.php" );
?>
</center>
</body>
</html>
<? ob_flush(); ?>