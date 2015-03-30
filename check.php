<?
include ('dbset.php');
error_reporting ( 0 );
$user = $_POST ['user'];
$pass = $_POST ['pass'];
$pass = md5 ( $pass );


if ($user && $pass) {
	$query = mysql_query ( "SELECT * FROM users WHERE Username='$user'" );
	$numrows = mysql_num_rows ( $query );
	if ($numrows != 0) {
		while ( $row = mysql_fetch_assoc ( $query ) ) {
			$dbusername = $row ['username'];
			$dbpassword = $row ['password'];
		}
		if ($user == $dbusername && $pass == $dbpassword) {
			session_start ();
			$query = mysql_query ( "SELECT * FROM users WHERE Username='$user'" );
			while ( $row = mysql_fetch_assoc ( $query ) ) {
				$_SESSION ['log'] = $row ['username'];
				$_SESSION ['id'] = $row ['id'];
				$_SESSION ['fname'] = $row ['fname'];
			}
			header ( "location:home.php" );
		} 

		else {
			header ( "location:index.php?attempt=1" );
		}
	} else
		header ( "location:index.php?attempt=1" );
} 

else
	header ( "location:index.php?attempt=1" );
mysql_close ( "register" );

?>
