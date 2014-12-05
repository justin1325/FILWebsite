<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>

	<head>
		<title>Frugal Innovation Lab Projects</title>
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
				
	<h1 style = "text-align: center"> Projects </h1>
<div style="margin-top:10px">
<?php
require("mysqli_connect.php");
$resp = mysqli_query($mysqli, "SELECT * FROM `projects` ORDER BY `id` ASC");
$count=0;
$categories = array();
while($row = mysqli_fetch_array($resp)){
	$cat = $row['category'];
	if(!isset($categories[$cat])){
		$categories[$cat]=array();
	}
	$categories[$cat][]=$row;
	$count++;
}

//generate graph
$totalWidth=100;
$colors = array("red", "yellow", "lime", "green", "aqua", "fuchsia");
$c=0;
echo "<h3>Project breakdown: </h3>";
foreach($categories as $cat=>$projects){
	$catCount = count($projects);
	$width = ($catCount/$count)*$totalWidth;
	if($width==0){
		continue;
	}
	$color=$colors[$c%count($colors)];
	$c++;
	echo "<div style='background:$color; width:{$width}%;float:left; overflow:hidden'>$cat: $catCount</div>";
}
echo "<br><br>";

foreach($categories as $cat=>$projects){
	echo "<h3>$cat</h3>";
	echo "<table>";
	foreach($projects as $project){
		$desc = str_replace("\n", "<br>", $project['desc']);
		echo "<tr><td><b>".$project['title']."</b></td><td>".$desc."</td></tr>";
	}
	echo "</table>";
}
?>
</div>
	</body>
</html>