<?php 
error_reporting(0);
	include('dbset.php');
?>

<html>
<head>
	<link href="styles/style.css" rel="stylesheet" type="text/css">
	<script type="text/javascript" language="javascript" src="datatables/media/js/jquery.js"></script>
	<script type="text/javascript" language="javascript" src="datatables/media/js/jquery.dataTables.js"></script>
	<link rel="stylesheet" type="text/css" href="styles/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="styles/bootstrap2.css">
	<title>$echo Scoreboard</title>

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
				<div id="logo"><img src="images/bg.jpg" height="100%"/></div>
			</td>
			<td>
				<a href="home.php" style="color: #0182AC;">Home</a>
			</td>
		</tr>
	</table>
</div>

<br>
	<div id="white">
	<center><h1 id="wh1">Scoreboard</h1></center>
	<?php
		function getUsername($id){
		    $sql="SELECT * FROM users WHERE id=$id";
		    $userresult=mysql_query($sql);
			while($rows=mysql_fetch_array($userresult)){
				$name=$rows['fname'];
			}
			return $name;
		}

		function getScoreboard($id){
			$sql="select count(distinct(problem_id)) as successes, user_id as userId from submissions where user_id= $id and status='Success'";
			$result = mysql_query($sql);
			return $rows=mysql_fetch_array($result);
		}

		function getAverageRuntime($id){
			$sql="select SUM(runtime) as rawSum, count(runtime) as runCount from submissions where user_id= $id and status='Success'";
			$result = mysql_query($sql);
			return $rows=mysql_fetch_array($result);
		}

		$sql="SELECT * FROM users where username != 'Admin'";
		$result=mysql_query($sql);
		?>
		<div id="cnt">
		<table id='tbl' class="display">
			<thead>
				<tr>
					<th>User</th>
					<th>Solved</th>
					<th>Average Runtime</th>
				</tr>
			</thead>
			<tbody>
		<?php
		while($rows=mysql_fetch_array($result)){
			$usr=getUsername($rows['id']);
			$result2=getScoreboard($rows['id']);
			$uid=$result2['userId'];
			$rt=$result2['successes'];
			$rawrun=getAverageRuntime($rows['id']);
			$runSum=$rawrun['rawSum'];
			$runCount=$rawrun['runCount'];
			if($runCount!=0)
				$aveRun=($runSum/$runCount)."s";
			if($runCount==0 && $runSum==0)
				$aveRun="N/A";
			else if($runCount==0)
				$aveRun=5;
			echo "<tr><td><a href=\"profile.php?id=".$rows['id']."\">".$usr."</a></td><td>".$rt."</td><td>".$aveRun."</td></tr>\n"; 
		}
		?>
			</tbody>
		</table>
		</div>
		<?php
		$id=$rows['id'];
	?>
	</div>

</body>
</html>
