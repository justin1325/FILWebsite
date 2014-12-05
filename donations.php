<?php
//Definitions for PayPal
$paypalEmail = "millsapski@gmail.com"; ///your registered PayPal Email address
$storePath = "http://localhost/COEN161/deliverable2"; ///path to the store

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>

	<head>
		<title>FIL Donations Page</title>
		<link rel="stylesheet" type="text/css" href="headnav.css">
		<style type='text/css'>
		body{
		 font-family: Gill Sans, sans-serif;
		}
		</style>
		<script language='javascript'>
		var desc = {
		"13.30": "support an undergraduate student to work for one hour",
		"17.65": "support a graduate student to work for one hour",
		"39.95": "purchase a Raspberry Pi for the development of field-based enterprises",
		"78.60": "cover the average cost of admittance to a FIL related conference for a faculty/staff member.",
		"500": "provide a Senior Design team with enough money to buy materials for their prototype.",
		"898": "accommodate one student's air fare to South America to field test their prototypes.",
		"1500": "make you exceptionally awesome."


		};
		function showDesc(val){
			document.getElementById("description").innerHTML = "$"+val+" will "+desc[val];
		}
		function loaded(){
		showDesc(document.forms.donate.amount.value);
		}
		</script>
	</head>
<body onLoad="loaded()">
			<?php require("header.php")?>
	<h1 style = "text-align: center"> Donate </h1>
<?php
$amount = isset($_POST['amount']) ? $_POST['amount'] : '';
if($amount){
$name = $_POST['name'];
$val = $_POST['amount'];
$dts = @date("d-M-y H:i:s");
require("mysqli_connect.php");
mysqli_query($mysqli, "INSERT INTO `donations` (
`id` ,
`name` ,
`amount` ,
`date`
)
VALUES (
NULL ,  '$name',  '$val',  '$dts'
)");
$id = mysqli_insert_id($mysqli);
?>
<div style="width:300px; position:absolute; top:350px; left:50%; margin-left:-150px; text-align:center">
Thank you, <?php echo $name?>! Your donation has been recorded, and you will be redirected to PayPal to complete your transaction.<br /><br />

<form id="paypal_checkout" action="https://www.paypal.com/cgi-bin/webscr" method="post">
If you aren't redirected to PayPal within 5 seconds, click <input type='submit' value='here'>
	<input name="cmd" value="_cart" type="hidden">
	<input name="upload" value="1" type="hidden">
	<input name="no_note" value="0" type="hidden">

	<input name="tax" value="0" type="hidden">
	<input name="rm" value="2" type="hidden">
	<input name='item_name_1' value="FIL Donation" type='hidden'>
	<input name='quantity_1' value="1" type='hidden'>
	<input name='amount_1' value="<?php echo $val?>" type='hidden'>

	<input name="business" value="<?php echo $paypalEmail?>" type="hidden">
	<input name="currency_code" value="USD" type="hidden">
	<input name="lc" value="US" type="hidden"> <!--locale code-->
	<input name="return" value="<?php echo $storePath?>/donations.php" type="hidden">
	<input name="cbt" value="Return to Frugal Innovation Lab" type="hidden">
	<input name="cancel_return" value="<?php echo $storePath?>/donations.php" type="hidden">
	<input name="custom" value="" type="hidden">

	<input type='hidden' name='weight_unit' value="lbs"> 
	
	<input type='hidden' name='invoice' value="<?php echo $id?>">
	
</form>

<script language='javascript'>
function doPPRedirect(){
document.getElementById("paypal_checkout").submit();

}
setTimeout("doPPRedirect()", 3000);
</script>

</div>
<?php
}else{
?>

<div style="width:300px; position:absolute; top:350px; left:50%; margin-left:-150px; text-align:center">
<form method="POST" action="donations.php" name="donate" id="donate">
Please enter your name: <input type='text' name='name' /><br /><br />
Please select a donation amount<br>
<select name="amount" onChange="showDesc(this.value)" id="amount">
<option value="13.30">$13.30</option>
<option value="17.65">$17.65</option>
<option value="39.95">$39.95</option>
<option value="78.60">$78.60</option>
<option value="500">$500.00</option>
<option value="898">$898.00</option>
<option value="1500">$1,500.00</option>
</select>
<input type='submit' />
<br>
<span id="description">
</span>
</form>
</div>
<?php } ?>
</body>
</html>