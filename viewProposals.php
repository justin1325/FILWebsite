<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>

	<head>
		<title>Frugal Innovation Lab View Proposals</title>
		<style type='text/css'>
		tr:nth-child(even) {background: #CCC}
	tr:nth-child(odd) {background: #EEE}
		body{
		font-family:Gill Sans, sans-serif;
		}
		</style>
	</head>
	<body>
<div style="position:absolute; top:0; left:0; height:100px; width:100%; background:green; color: white;">
<h1 style="display:inline">Frugal Innovation Lab</h1><br />
<h3 style="margin-left:50px; display:inline">View Proposals</h3>
</div>
<div style="margin-top:120px">
<table cellspacing="5px" >
<?php
require("mysqli_connect.php");

$resp = mysqli_query($mysqli, "SELECT * FROM `proposals` ORDER BY `id` DESC"); //NEWEST POSTS FIRST
$count = 0;
while($row = mysqli_fetch_array($resp)){
echo "<tr><td style='background:green; color:white'><b>".$row['name']."</b><br />Posted on ".$row['date']."<br />email: <a href='mailto:".$row['email']."'>".$row['email']."</a>";
echo "</td><td>".str_replace("\n", "<br />", $row['body'])."</td></tr>";
$count++;
}

if(!$count){
echo "No proposals have been submitted yet";
}
?>

</table>
</div>
	</body>
</html>