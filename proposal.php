<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>

	<head>
		<title>Frugal Innovation Lab Project Proposal</title>
		<link rel="stylesheet" type="text/css" href="headnav.css">
		<style type='text/css'>

		body{
		font-family:Gill Sans, sans-serif;
		}
		</style>
	</head>
	<body>
		<?php require("header.php")?>
<div style="margin-top:20px">
<?php
$submitted=false;
require("mysqli_connect.php");
$email = isset($_POST['email']) ? $_POST['email'] : '';
$name = isset($_POST['name']) ? $_POST['name'] : '';
$body = isset($_POST['body']) ? $_POST['body'] : '';
if($body || $email || $name){

//submit new post
	$email = mysqli_real_escape_string($mysqli, $_POST['email']);
	$name = mysqli_real_escape_string($mysqli, $_POST['name']);
	$body = mysqli_real_escape_string($mysqli, $_POST['body']);
	$dts = @date("d-M-y H:i:s");
	if(!$email){
		echo "ERROR! You must include your email!";
	}else if(!$name){
		echo "ERROR! You must enter your name.";
	}else if(!$body){
		echo "ERROR! Your post must have a body.";
	}else{
		mysqli_query($mysqli, "INSERT INTO proposals (
		id ,name, email, body ,date
)VALUES (
NULL ,  '$name',  '$email',  '$body',  '$dts'
)");
	$submitted=true;
	echo "Your proposal has been submitted successfully! Thank you!";
	}

}
if(!$submitted){
?>

<h4>Submit your project proposal below. Be sure to check your email for a response from us!</h4>
<form action="proposal.php" method="POST">
Your name: <input type='text' name='name' value="<?php echo @$name?>"/><br />
Your email address: <input type='text' name='email' value="<?php echo @$email?>"/><br />
<br />
Your project proposal:<br />
<textarea rows="15" cols="75" name='body'>
<?php echo @$body?>
</textarea>
<br />
<input type='submit' />
</form>
</div>
<div class='graph'>
<?php 
	$r = mysqli_query($mysqli, "SELECT COUNT(*) FROM proposals");
	$r = mysqli_fetch_array($r);
	$x = $r['COUNT(*)'];
	$w1 = $x*100;
	$y = (10-$x);
	$w2 = (10-$x)*50;
?>
<div style='background:green; color:white; height:50px; width:<?php echo $w1?>px; float:left'>Projects submitted: <?php echo $x?></div><div style='background:red; color:white; height:50px; width:<?php echo $w2?>px; float:left'>Project submission goal: 10 (<?php echo $y?> remaining)</div>
</div>
<?php } ?>
	</body>
</html>