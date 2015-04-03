<?php
error_reporting ( 0 );
include('../preheader.php'); // <-- this include file MUST go first before any HTML/output
include('../ajaxCRUD.class.php'); // <-- this include file MUST go first before any HTML/output
?>

<?php
error_reporting ( 0 );
session_start ();

if ($_SESSION ['log'] != 'admin') {
	header ( "location:../home.php" );
}

if (! isset ( $_SESSION ['log'] )) {
	header ( "location:../" );
} 

else {
	$user = $_SESSION ['log'];
	include ('../dbset.php');
	$sql = "SELECT * FROM users WHERE username='$user'";
	$result = mysql_query ( $sql );
	
	while ( $rows = mysql_fetch_array ( $result ) ) {
		$id = $rows ['id'];
	}
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="../styles/style.css" rel="stylesheet" type="text/css">
<script src="jquery.min.js"></script>
	<title>Admin Page</title> <script type="text/javascript">
        
                function userFunc(){
                    $("#usersdiv").slideToggle();
                }

                function problemsFunc(){
                    $("#problemsdiv").slideToggle();
                }

                function settingsFunc(){
                    $("#settingsdiv").slideToggle();
                }

            </script>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
		<style type="text/css">
body {
	background-color: #0182AC;
}
</style>

		<script src="js/bootstrap.js"></script>
		<style type="text/css" title="currentStyle">
@import "media/css/demo_page.css";

@import "media/css/demo_table_jui.css";

</style>


</head>
<div class="headera">
	<table border="0">
		<tr>
			<td>
				<div id="logo">
					<img src="../images/bg.jpg" height="100%" />
				</div>
			</td>
			<td>
                    <?php
						echo "<div id='infoa'>Welcome, " . $_SESSION ['log'] . "!<br><a href='../scoreboard.php' style='text-decoration: underline;''>Scoreboard</a><br><a style='text-decoration: underline;' href='../logout.php'>Sign Out</a></div>";
						?>
                </td>
		</tr>
	</table>
</div>
<hr width="80%" />
<center>
<button onclick="userFunc()">Users</button>
</center>
<hr width="80%" />
<div id="usersdiv">
<?
$tblUsers = new ajaxCRUD ( "Users", "users", "id", "../" );
$tblUsers->omitPrimaryKey ();
$tblUsers->displayAs ( "username", "Username" );
$tblUsers->displayAs ( "fname", "Full Name" );
$tblUsers->displayAs ( "password", "Password" );

$tblUsers->omitAddField ( "id" );
$tblUsers->omitField ( "password" );

$tblUsers->setLimit ( 10 );
$tblUsers->addAjaxFilterBoxAllFields ();
$tblUsers->showTable ();

echo "</div><hr width=\"80%\" /><center><button onclick=\"problemsFunc()\">Problems</button></center><hr width=\"80%\" /><div id=\"problemsdiv\">\n";

$tblSettings = new ajaxCRUD ( "Questions", "questions", "id" );
$tblSettings->omitPrimaryKey ();
$tblSettings->displayAs ( "content", "Content" );
$tblSettings->displayAs ( "title", "Title" );
$tblSettings->addAjaxFilterBoxAllFields ();
$tblSettings->setTextareaHeight ( 'content', 150 );

$tblSettings->setLimit ( 10 );

$tblSettings->showTable ();
?>



<?php
echo "</div>
<hr width=\"80%\" />
	<center>
		<button onclick=\"settingsFunc()\">Settings</button></center><hr width=\"80%\" /><div id=\"settingsdiv\">\n";

$tblSettings = new ajaxCRUD ( "Settings", "settings", "id" );
$tblSettings->omitPrimaryKey ();
$tblSettings->displayAs ( "content", "Content" );
$tblSettings->displayAs ( "title", "Title" );
$tblSettings->addAjaxFilterBoxAllFields ();
$tblSettings->setTextareaHeight ( 'content', 150 );

$tblSettings->setLimit ( 10 );

$tblSettings->showTable ();
function makeBold($val) {
	return "<b>$val</b>";
}
function makeBlue($val) {
	return "<span style='color: blue;'>$val</span>";
}

?>
</div>