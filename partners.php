<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>

	<head>
		<title>FIL Partners</title>
		<link rel="stylesheet" type="text/css" href="headnav.css">
		<style type='text/css'>
		body{
		 font-family: Gill Sans, sans-serif;
		}
		table{
		color:white;

		}
		td{
			width:200px;
			text-align:center;
		}
		.partner{
		width:150px;
		margin-left:50px;
		margin-bottom:50px;
		}
		</style>
		
	</head>
<body>
<?php require("header.php")?>
<div style=" margin-left:150px;">
<h3>We are proud to thank our following partners</h3>
<?php
$dir = scandir("images/partners");
foreach($dir as $key=>$img){
if(substr($img, 0,1)==".")
	continue;

	echo "<img class='partner' src='images/partners/$img'>";

}
?>
</div>
</body>
</html>