<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>

	<head>
		<title>Frugal Innovation Lab Forum</title>
		<link rel="stylesheet" type="text/css" href="headnav.css">
		<style type='text/css'>
		tr:nth-child(even) {background: #CCC}
	tr:nth-child(odd) {background: #EEE}
		body{
		font-family:Gill Sans, sans-serif;
		}
		</style>
	</head>
	<body>
				<?php require("header.php")?>
				
	<h1 style = "text-align: center"> Forum </h1>
<div style="margin-top:10px">
<table cellspacing="5px" >
<?php
require("mysqli_connect.php");
$body = isset($_POST['body']) ? $_POST['body'] : '';
$title = isset($_POST['title']) ? $_POST['title'] : '';
$name = isset($_POST['name']) ? $_POST['name'] : '';
if($body || $title || $name){
//submit new post
	$title = mysqli_real_escape_string($mysqli, $_POST['title']);
	$name = mysqli_real_escape_string($mysqli, $_POST['name']);
	$body = mysqli_real_escape_string($mysqli, $_POST['body']);
	$dts = @date("d-M-y H:i:s");
	if(!$title){
		echo "ERROR! Your post must have a title.";
	}else if(!$name){
		echo "ERROR! You must enter your name.";
	}else if(!$body){
		echo "ERROR! Your post must have a body.";
	}else{
		mysqli_query($mysqli, "INSERT INTO `forum` (
		`id` ,`title` ,`body` ,`poster` ,`date`
)VALUES (
NULL ,  '$title',  '$body',  '$name',  '$dts'
)");
	$body=""; //clear the users input so it is not autofilled into the form (see form below)
	$name="";
	$title="";	
	}

}

$resp = mysqli_query($mysqli, "SELECT * FROM `forum` ORDER BY `id` DESC"); //NEWEST POSTS FIRST
$count = 0;
while($row = mysqli_fetch_array($resp)){
echo "<tr><td style='background:green; color:white'><b>".$row['title']."</b><br />Posted on ".$row['date']."<br />by: ".$row['poster'];
echo "</td><td>".str_replace("\n", "<br />", $row['body'])."</td></tr>";
$count++;
}

if(!$count){
echo "There is no content here yet! Make the forum a better place by adding your own";
}
?>
<tr style="height:50px"></tr><!--spacer-->
<tr style="background: green; color:white"><td>Say something!</td><td>
<form action="forum.php" method="POST">
Your name: <input type='text' name="name" value="<?php echo @$name?>"/><br /> <!-- fill in the users input in case the query was not submitted  The '@' symbol supresses the 'variable not defined' warning being printed into the field-->
Post title: <input type='text' name="title" value="<?php echo @$title?>"/><br />
Post body:<br />
<textarea name="body" rows="5" cols="50"><?php echo @$body?></textarea><br />
<input type='submit' />
</form>
</table>
</div>
	</body>
</html>