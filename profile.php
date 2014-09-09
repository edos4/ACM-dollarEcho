<?php
error_reporting ( 0 );
include ('dbset.php');
$profile = $_GET ['id'];
$sql = "SELECT * FROM users WHERE id='$profile'";
$result = mysql_query ( $sql );
while ( $rows = mysql_fetch_array ( $result ) ) {
	$name = $rows ['fname'];
}
?>

<html>
<head>
<link href="styles/style.css" rel="stylesheet" type="text/css">
<script type="text/javascript" language="javascript"
	src="datatables/media/js/jquery.js"></script>
<script type="text/javascript" language="javascript"
	src="datatables/media/js/jquery.dataTables.js"></script>
<link rel="stylesheet" type="text/css" href="styles/bootstrap.css">
<link rel="stylesheet" type="text/css" href="styles/bootstrap2.css">
<title>$echo : <?php echo $name;?></title>

<style type="text/css" title="currentStyle">
@import "datatables/media/css/demo_table.css";
</style>

<script type="text/javascript">
		
	$(document).ready( function () {
	    $('#tbl').dataTable({
		    "aaSorting": [[1,'desc'], [2,'asc']]
		});
	} );

	</script>
</head>

<body>
	<br>
	<div class="header">
		<table border="0">
			<tr>
				<td>
					<div id="logo">
						<img src="images/bg.jpg" height="100%" />
					</div>
				</td>
				<td><a href="home.php" style="color: #0182AC;">Home</a></td>
			</tr>
		</table>
	</div>

	<br>
	<div id="white">
		<center>
			<h1 id="wh1"><?echo $name;?></h1>
		</center>
	
	<?php
	function getProblemName($id) {
		$sql = "SELECT * FROM questions WHERE id=$id";
		$userresult = mysql_query ( $sql );
		while ( $rows = mysql_fetch_array ( $userresult ) ) {
			$title = $rows ['title'];
		}
		return $title;
	}
	function getScoreboard($id) {
		$sql = "select count(*) as successes, user_id as userId from submissions where user_id= $id and status='Success'";
		$result = mysql_query ( $sql );
		return $rows = mysql_fetch_array ( $result );
	}
	function getAverageRuntime($id) {
		$sql = "select SUM(runtime) as rawSum, count(runtime) as runCount from submissions where user_id= $id and status='Success'";
		$result = mysql_query ( $sql );
		return $rows = mysql_fetch_array ( $result );
	}
	
	$sql = "SELECT * FROM submissions where user_id = '$profile' and status='Success'";
	$result = mysql_query ( $sql );
	?>
		<div id="cnt">
			<a href="scoreboard.php" style="color: white;">Back</a>
			<table id='tbl' class="display">
				<thead>
					<tr>
						<th>Problem</th>
						<th>Runtime</th>
						<th>Language</th>
					</tr>
				</thead>
				<tbody>
		<?php
		while ( $rows = mysql_fetch_array ( $result ) ) {
			echo "<tr><td><a href=\"problems/index.php?id=" . $rows ['problem_id'] . "\">" . getProblemName ( $rows ['problem_id'] ) . "</a></td><td>" . $rows ['runtime'] . "</td><td>" . $rows ['language'] . "</td></tr>\n";
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
