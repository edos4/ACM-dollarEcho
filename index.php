<!DOCTYPE html>
<!--
	31: Number of hours on this project. Incrementing EVERY time. :)
-->

<!--sabi mo mag-edit ako :) -->
<?php
error_reporting ( 0 );
session_start ();
if (isset ( $_SESSION ['log'] ))
	header ( "location: home.php" );
include ('dbset.php');

$aboutQ = mysql_query ( "select content from settings where title='about'" ) or die ( mysql_error () );
while ( $row1 = mysql_fetch_array ( $aboutQ ) ) {
	$about = $row1 ["content"];
}

$contributorsQ = mysql_query ( "select content from settings where title='contributors'" ) or die ( mysql_error () );
while ( $row2 = mysql_fetch_array ( $contributorsQ ) ) {
	$contributors = $row2 ["content"];
}
?>

<head>
<meta name="google-site-verification"
	content="NggZZfG2z2T_Nnbef1awtXy56Rrip0S-v2N9FKrHz3Y" />
<meta name="google-translate-customization"
	content="13ca9a17f0b0708a-7f8f5e1b093db001-g1a9f59033d6db468-e"></meta>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>$echo</title>
<link href='http://fonts.googleapis.com/css?family=Press+Start+2P'
	rel='stylesheet' type='text/css'>
<link href="styles/ov.css" rel="stylesheet" type="text/css">
<script src="jquery.js"></script>

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

	<div class="modali">
		<center>
			<h1 style="font-family: 'Press Start 2P', cursive;">$echo</h1>
		</center>
		<img src="logo.png" id="logo" id="logo" />
		<form method='post' action="check.php" id="lif">
			Username<input type='text' name='user' size=13
				style="border: 1px solid #000000;" placeholder="Username"><br>
			Password<input type='password' name='pass' size=13
				style="border: 1px solid #000000;" placeholder="Password"><br> <input
				type='submit' name='sub' value='Login' id='go'>
		</form>
		<div id="navi">
			<a class="fancy" href="#about" style="text-decoration: underline;">about</a>
			| <a href="scoreboard.php">scoreboard</a> | <a href="#contributors"
				style="text-decoration: underline;" class="fancy">contributors</a> |
			<a href="register.php">register</a>
		</div>
	</div>

	<div id="contributors" style="display: none; width: 500px;">
		<p>
			<?php echo $contributors; ?>
		</p>
	</div>

	<div id="about" style="display: none; width: 500px;">
		<p>
			<?php echo $about; ?>
		</p>
	</div>

	<script type="text/javascript">
$(document).ready(function(){
						   
 $(window).resize(function(){

  $('.modali').css({
   position:'absolute',
   left: ($(window).width() 
     - $('.modali').outerWidth())/2,
   top: ($(window).height() 
     - $('.modali').outerHeight())/2
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