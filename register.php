<!DOCTYPE html>
<?php
error_reporting ( 0 );
session_start ();
if (isset ( $_SESSION ['log'] ))
	header ( "location: home.php" );
function sanitize($value) {
	$value = trim ( $value );
	
	// Stripslashes
	if (get_magic_quotes_gpc ()) {
		$value = stripslashes ( $value );
	}
	
	// Convert all &lt;, &gt; etc. to normal html and then strip these
	$value = strtr ( $value, array_flip ( get_html_translation_table ( HTML_ENTITIES ) ) );
	
	// Strip HTML Tags
	// $value = strip_tags($value);
	
	// Quote the value
	$value = mysql_real_escape_string ( $value );
	$value = htmlspecialchars ( $value );
	return $value;
}
?>

<?php
error_reporting ( E_ALL & ~ E_NOTICE );

// connect to mysql
include ('dbset.php');

$fname = sanitize ( $_POST ['fname'] );
$_POST ['fname'] = sanitize ( $_POST ['fname'] );
$uname = sanitize ( $_POST ['user'] );
$_POST ['user'] = sanitize ( $_POST ['user'] );
$pass = sanitize ( $_POST ['pass'] );
$_POST ['pass'] = sanitize ( $_POST ['pass'] );
$pass2 = sanitize ( $_POST ['pass2'] );
$_POST ['pass2'] = sanitize ( $_POST ['pass2'] );

error_reporting ( E_ALL & ~ E_NOTICE );
function usernameExists($username) {
	$getUser = mysql_query ( "select * from users where username = '$username'" );
	$count = mysql_num_rows ( $getUser );
	return $count;
}

if ($_SERVER ['REQUEST_METHOD'] == 'POST') {
	if (isset ( $_POST ['sub'] )) {
		require_once ('recaptchalib.php');
		$privatekey = "6LezY-oSAAAAAF0kUPNtz95ccQgGUaqO_zyMIQ7S";
		$resp = recaptcha_check_answer ( $privatekey, $_SERVER ["REMOTE_ADDR"], $_POST ["recaptcha_challenge_field"], $_POST ["recaptcha_response_field"] );
		$errors = array ();
		
		if (! $resp->is_valid) {
			$errors ['cap'] = "<font color='red'>";
		}
		if (0 == preg_match ( "/\S+/", $fname )) {
			$errors ['fname'] = "<font color='red'>";
		}
		
		if (0 == preg_match ( "/\S+/", $uname )) {
			$errors ['user'] = "<font color='red'>";
		}
		
		if (usernameExists ( $uname ) > 0) {
			$errors ['dup'] = "<font color='red'>";
		}
		
		if (0 == preg_match ( "/\S+/", $pass )) {
			$errors ['pass'] = "<font color='red'>";
		}
		
		if (0 !== strcmp ( $_POST ['pass'], $pass2 )) {
			$errors ['pass2'] = "<font color='red'>";
		}
		
		if (0 == count ( $errors )) {
			$pass = md5 ( $pass );
			$insertval = "INSERT INTO users(username, password, fname)VALUES('$uname','$pass','$fname')";
			$tama = mysql_query ( $insertval ) or die ( mysql_error () );
			echo "<script type='text/javascript'>alert('Successfully registered.')</script>";
			echo "<script type='text/javascript'>window.location='index.php';</script>";
		}
	}
}
error_reporting ( E_ALL & ~ E_NOTICE );
function form_row_class($name) {
	global $errors;
	return $errors [$name] ? "form_error_row" : "";
}
function error_for($name) {
	global $errors;
	if ($errors [$name]) {
		return "<div class='form_error'>" . $errors [$name];
	}
}
function h($string) {
	return htmlspecialchars ( $string );
}
?>

<head>
<meta name="google-site-verification"
	content="NggZZfG2z2T_Nnbef1awtXy56Rrip0S-v2N9FKrHz3Y" />
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<link href='http://fonts.googleapis.com/css?family=Press+Start+2P'
	rel='stylesheet' type='text/css'>
<link href="styles/ov.css" rel="stylesheet" type="text/css">
<script src="jquery.js"></script>
<title>$echo : Register</title>
<!-- Add fancyBox -->
<link rel="stylesheet"
	href="fancybox/source/jquery.fancybox.css?v=2.1.5" type="text/css"
	media="screen" />
<script type="text/javascript"
	src="fancybox/source/jquery.fancybox.pack.js?v=2.1.5"></script>


</head>
<body bgcolor="#0182AC">
	<div id="spinner"></div>
	<script type="text/javascript">// <![CDATA[
         $(window).load(function() { $("#spinner").fadeOut("slow"); })
         // ]]>
      </script>
	<script type="text/javascript">
		var wf_pbb_object = [
			{bc:"rgb(1, 130, 172)"},
			{img:"images/d1.png", mm:true, ms:false, mms:1, mss:1, mmd:1, mso:"v", msd:0.5, im:"image", pr:"both", mma:"both", ofs:{x:0, y:0}, zi:1, sr:false, sb:false, isr:false, isb:false},
			{img:"images/d2.png", mm:true, ms:false, mms:2, mss:2, mmd:1, mso:"v", msd:0.5, im:"image", pr:"both", mma:"both", ofs:{x:0, y:0}, zi:2, sr:false, sb:false, isr:false, isb:false},
			{img:"images/d3.png", mm:false, ms:false, mms:3, mss:1, mmd:1, mso:"v", msd:0.5, im:"image", pr:"both", mma:"both", ofs:{x:0, y:0}, zi:3, sr:false, sb:false, isr:false, isb:false}
		];
	</script>
	<script type="text/javascript" src="parallax.js"></script>

	<div class="overlayi"></div>

	<div class="modalir">
		<center>
			<h1 style="font-family: 'Press Start 2P', cursive;">$echo</h1>
		</center>
		<img src="logo.png" id="logo" id="logo" />
		<form method='post' action="register.php" id="rlif">
		<?php echo error_for('fname')?$v="<font color='red'>Enter Full Name</font>":$v="Full Name"; ?><input
				type='text' name='fname' size=16 style="border: 1px solid #000000;"
				placeholder="Full Name"
				value="<?php echo isset($_POST['fname'])?$_POST['fname']:""; ?>"><br>
		<?php echo error_for('user')?$v="<font color='red'>Enter Username</font>":error_for('dup')?$e="<font color='red'>Username exists</font>":$e="Username";?><input
				type='text' name='user' size=16 style="border: 1px solid #000000;"
				placeholder="Username"
				value="<?php echo isset($_POST['user'])?$_POST['user']:""; ?>"><br>
		<?php echo error_for('pass')?$v="<font color='red'>Enter Password</font>":$v="Password";?><input
				type='password' name='pass' size=16
				style="border: 1px solid #000000;" placeholder="Password"
				value="<?php echo isset($_POST['pass'])?$_POST['pass']:""; ?>"><br>
		<?php echo error_for('pass2')?$v="<font color='red'>Passwords not equal</font>":$v="Verify Password";?></font><input
				type='password' name='pass2' size=16
				style="border: 1px solid #000000;" placeholder="Verify Password"
				value="<?php echo isset($_POST['pass2'])?$_POST['pass2']:""; ?>"><br>
		  
        <?php
								require_once ('recaptchalib.php');
								$publickey = "6LezY-oSAAAAAD8oQmyTscajX_YTrmzpmQ7tX-yS";
								?>		  
        <?php echo error_for('cap')?$v="<font color='red'>Incorrect reCaptcha</font>":$v="";?></font><?php echo recaptcha_get_html($publickey);?>
		  
		<input type='submit' name='sub' value='Register' id='go'>
		</form>
		<div id="navi">
			<a class="fancy" href="#about" style="text-decoration: underline;">about</a>
			| <a href="scoreboard.php">scoreboard</a> | <a href="#contributors"
				style="text-decoration: underline;" class="fancy">contributors</a> |
			<a href="home.php">home</a>
		</div>
	</div>

	<div id="contributors" style="display: none; width: 500px;">
		<p>
			Richard Paraggua: Ideas on efficient coding, layout, and more
			importantly on the security part which made me really paranoid :),
			basically made me restructure and improve my programming. Thanks
			Chard! :) <br>
			<br>Camille Jade Alcantara: For pointing out that the submit button
			has issues (fixed), and for giving me the reason to improve in
			writing the problems.<br>
			<br>Marlon Perillo: For the idea that there should be a unique
			database entry on submissions having the same problem, runtime, and
			language <br>
			<br>ACM: Inspiration.<br>
			<br>Inspirasyon: "$echo" hahahahaha!<br>
			<br>My arms: For always being there by my side.<br>My feet: For
			always supporting me.<br>
			<br>Ikaw? Tutulong ka(code, design ,ideas, etc)? PM <a
				href="http://facebook.com/edos4">fb.com/edos4</a>
		</p>
	</div>

	<div id="about" style="display: none; width: 500px;">
		<p>
			This system is the Training System for the FEU-EAC EAGER iTam
			(Programming Team). This can also serve as an online Programming
			Contest Management System.<br>
			<br>Why '$echo'? It's a mystery. :)
		</p>
	</div>

	<script type="text/javascript">
$(document).ready(function(){
						   
 $(window).resize(function(){

  $('.modalir').css({
   position:'absolute',
   left: ($(window).width() 
     - $('.modalir').outerWidth())/2,
   top: ($(window).height() 
     - $('.modalir').outerHeight())/2
  });

    $(".fancy").fancybox({
		maxWidth	: 800,
		maxHeight	: 600,
		fitToView	: false,
		width		: '70%',
		height		: '70%',
		autoSize	: true,
		closeClick	: false,
		openEffect	: 'elastic',
		closeEffect	: 'elastic'
	});
	
	$('#navi').css({
   	   position:'absolute',
   	   bottom: '0px',
	  });	
	});
 
 // To initially run the function:
 $(window).resize();

});


</script>
</body>