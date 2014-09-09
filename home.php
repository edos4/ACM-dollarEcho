<?php
error_reporting ( 0 );
session_start ();

if ($_SESSION ['log'] == 'admin') {
	header ( "location:admin" );
}

if (! isset ( $_SESSION ['log'] )) {
	header ( "location:index.php" );
} 

else {
	$user = $_SESSION ['log'];
	include ('dbset.php');
	$sql = "SELECT * FROM users WHERE username='$user'";
	$result = mysql_query ( $sql );
	
	while ( $rows = mysql_fetch_array ( $result ) ) {
		$id = $rows ['id'];
	}
}
?>

<html>
<head>
<link href="styles/style.css" rel="stylesheet" type="text/css">
<link href="styles/ov.css" rel="stylesheet" type="text/css">
<script type="text/javascript" language="javascript"
	src="datatables/media/js/jquery.js"></script>
<script type="text/javascript" language="javascript"
	src="datatables/media/js/jquery.dataTables.js"></script>
<link rel="stylesheet" type="text/css" href="styles/bootstrap.css">
<link rel="stylesheet" type="text/css" href="styles/bootstrap2.css">
<title>$echo : Home</title>

<style type="text/css" title="currentStyle">
@import "datatables/media/css/demo_table.css";
</style>

<script type="text/javascript">
		
	$(document).ready( function () {
	    $('#tbl').dataTable({
		    "aaSorting": [[2,'desc']]
		});
	} );

	</script>
</head>

<body>
	<br>
	<div class="headera">
		<table border="0">
			<tr>
				<td>
					<div id="logo">
						<img src="images/bg.jpg" height="100%" />
					</div>
				</td>
				<td>
				<?php
				echo "<div id='info'>Welcome, " . $_SESSION ['log'] . "!<br><a href='scoreboard.php' style='text-decoration: underline;''>Scoreboard</a><br><a style='text-decoration: underline;' href='logout.php'>Sign Out</a></div>";
				?>
			</td>
			</tr>
		</table>
	</div>

	<br>
	<div id="white">
	<?php
	function getSuccess($id, $suid) {
		$sql = "select * from submissions where (problem_id=$id and status='Success' and user_id=$suid)";
		$result = mysql_query ( $sql );
		return mysql_num_rows ( $result );
	}
	function getAttempts($id, $suid) {
		$sql = "select * from submissions where problem_id=$id and user_id=$suid";
		$result = mysql_query ( $sql );
		return mysql_num_rows ( $result );
	}
	
	$db_name = "exam"; // Database name
	$tbl_name = "users"; // Table name
	if (! isset ( $_SESSION ['log'] )) {
		header ( "location:index.php" );
	}
	$user = $_SESSION ['log'];
	include ('dbset.php');
	mysql_select_db ( $db ) or die ( "cannot select DB" );
	$sql = "SELECT * FROM questions";
	$result = mysql_query ( $sql );
	$count = 0;
	?>
		<div id="cnt">
			<table id='tbl' class="display">
				<thead>
					<tr>
						<th>Problem</th>
						<th>Attempts</th>
						<th>Success</th>
					</tr>
				</thead>
				<tbody>
		<?php
		$suid = $_SESSION ['id'];
		while ( $rows = mysql_fetch_array ( $result ) ) {
			echo "<tr><td><a href=\"problems/index.php?id=" . $rows ['id'] . "\">" . $rows ['title'] . "</a></td><td>" . getAttempts ( $rows ['id'], $suid ) . "</td><td>" . getSuccess ( $rows ['id'], $suid ) . "</td></tr>\n";
		}
		?>
			</tbody>
			</table>
		</div>
		<?php
		$id = $rows ['id'];
		?>
	</div>

</body>
</html>
