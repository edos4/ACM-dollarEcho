<?php
	error_reporting(0);
	require_once('../preheader.php'); // <-- this include file MUST go first before any HTML/output
	include ('../ajaxCRUD.class.php'); // <-- this include file MUST go first before any HTML/output
?>

<?php 
error_reporting(0);
session_start(); 

if($_SESSION['log'] != 'admin'){
  header("location:../home.php");
}

if(!isset($_SESSION['log'])){
  header("location:../");
}

else{
    $user=$_SESSION['log'];
    include('../dbset.php');
    $sql="SELECT * FROM users WHERE username='$user'";
    $result=mysql_query($sql);
    
    while($rows=mysql_fetch_array($result)){
        $id=$rows['id'];
    }
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link href="../styles/style.css" rel="stylesheet" type="text/css">
        <title>Admin Page</title>
            <script type="text/javascript">
        
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
                body{
                    background-color: #0182AC;
                }
            </style>
            
        <script src="js/bootstrap.js"></script>
        <script src="js/bootstrap-button.js"></script>
        <style type="text/css" title="currentStyle">
            @import "media/css/demo_page.css";
            @import "media/css/demo_table_jui.css"; 
            @import "media/css/ColReorder.css";
        </style>
        
        <script type="text/javascript" charset="utf-8" src="media/js/jquery.dataTables.js"></script>
        <script type="text/javascript" charset="utf-8" src="media/js/ColReorder.js"></script>
        <script type="text/javascript" charset="utf-8">
            $(document).ready( function () {
                var oTable = $('#example').dataTable( {
                    "sDom": 'R<"H"lfr>t<"F"ip>',
                    "bJQueryUI": true,
                    "sPaginationType": "full_numbers"
                } );
            } );
        </script>
	</head>
    <div class="headera">
        <table border="0">
            <tr>
                <td>
                    <div id="logo"><img src="../images/bg.jpg" height="100%"/></div>
                </td>
                <td>
                    <?php
                        echo "<div id='infoa'>Welcome, ".$_SESSION['log']."!<br><a href='../scoreboard.php' style='text-decoration: underline;''>Scoreboard</a><br><a style='text-decoration: underline;' href='../logout.php'>Sign Out</a></div>";
                    ?>
                </td>
            </tr>
        </table>
    </div>
        <hr width="80%" />
            <center><button onclick="userFunc()">Users</button></center>
        <hr width="80%" />
        <div id="usersdiv">
<?
    $tblUsers = new ajaxCRUD("Users", "users", "id", "../");
    $tblUsers->omitPrimaryKey();
    $tblUsers->displayAs("username", "Username");
    $tblUsers->displayAs("fname", "Full Name");
    $tblUsers->displayAs("password", "Password");

    $tblUsers->omitAddField("id");
    $tblUsers->omitField("password");

    $tblUsers->setLimit(10);
    $tblUsers->addAjaxFilterBoxAllFields();
	$tblUsers->showTable();

	echo "</div><hr width=\"80%\" /><center><button onclick=\"problemsFunc()\">Problems</button></center><hr width=\"80%\" /><div id=\"problemsdiv\">\n";
?>
<div class="span9">
                        <div class="img-polaroid">
                            <table cellpadding="0" cellspacing="0" border="0" class="display" id="example">
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th>Student Number</th>
                                        <th>Name</th>
                                        <th>Dept./Inst</th>
                                        <th>Account Type</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                $query_patient = mysql_query("SELECT * from questions");
                                while ($row = mysql_fetch_array($query_patient)) {
                                ?>
                                    <tr>
                                        <?php echo "<td align='center'><a href = 'staff_chief_complaint.php?id=$row[id]'><img src='img/medical-icon/add-record.png' class='img-icon-medical' title='Add Record for Chief Complaint'></a></td>";?>
                                        <td align="center"><?php echo $row['question'];?></td>
                                        <td align='center'><?php echo $row['testcases'];?></td>
                                        <td align="center"><?php echo $row['title'];?></td>
                                        <td align="center"><?php echo $row['correctAnswer'];?></td>
                                        
                                    </tr>
                                <?php
                                }
                                ?>
                                </tbody>
                            </table>
                            <br>
                        </div>
                    </div>
<?php
    echo "</div><hr width=\"80%\" /><center><button onclick=\"settingsFunc()\">Settings</button></center><hr width=\"80%\" /><div id=\"settingsdiv\">\n";

    $tblSettings = new ajaxCRUD("Settings", "settings", "id");
    $tblSettings->omitPrimaryKey();
    $tblSettings->displayAs("content", "Content");
    $tblSettings->displayAs("title", "Title");
    $tblSettings->addAjaxFilterBoxAllFields();
    $tblSettings->setTextareaHeight('content', 150);

    $tblSettings->setLimit(10);

    $tblSettings->showTable();


	function makeBold($val){
		return "<b>$val</b>";
	}

	function makeBlue($val){
		return "<span style='color: blue;'>$val</span>";
	}

?>
</div>