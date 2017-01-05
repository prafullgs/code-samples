<?php
$req = 'cmd=_notify-validate';
include("../settings/config.php");
$id = $_GET['uid'];
$t = $_GET['t'];
$rm= $_GET['rm'];
$email = "prafull.shirodkar@neteasyinc.com"; 
$header = ""; 
$emailtext = ""; 
$date = date("D M j G:i:s T Y", time());

$em_headers  = "From: IPN-Notification<IPN-Notification>\n";		
$em_headers .= "Reply-To: noreply@neteasyinc.com\n";
$em_headers .= "Return-Path: from_email\n";
$em_headers .= "Organization: Neteasy Inc.\n";
$em_headers .= "X-Priority: 3\n";

foreach ($_POST as $key => $value) {
$emailtext .= $key . "=" .$value ."\n\n";
$value = urlencode(stripslashes($value));
$req .= "&$key=$value";

}

// post back to PayPal system to validate
$header .= "POST /cgi-bin/webscr HTTP/1.0\r\n";
$header .= "Content-Type: application/x-www-form-urlencoded\r\n";
$header .= "Content-Length: " . strlen($req) . "\r\n\r\n";
//$fp = fsockopen ('sandbox.paypal.com', 80, $errno, $errstr, 30);
$fp = fsockopen ('ssl://www.paypal.com', 443, $errno, $errstr, 30);
// assign posted variables to local variables
$u_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$payer_email  = $_POST['payer_email '];
$item_name = $_POST['item_name'];
$item_number = $_POST['item_number'];
$payment_status = $_POST['payment_status'];
$payment_amount = $_POST['mc_gross'];
$payment_currency = $_POST['mc_currency'];
$txn_id = $_POST['txn_id'];
$receiver_email = $_POST['receiver_email'];
$payer_id  = $_POST['payer_id '];
$contact_phone  = $_POST['contact_phone '];
$pending_reason  = $_POST['pending_reason '];
$reason_code   = $_POST['reason_code  '];
$txn_type = $_POST['txn_type'];
$timestamp = date("Y-m-d H:i:s");
$payment_date  = $_POST['payment_date '];
$payment_type  = $_POST['payment_type '];
$memo  = $_POST['memo '];
$address_name = $_POST['address_name'];
$address_street = $_POST['address_street'];
$address_city = $_POST['address_city'];
$address_state = $_POST['address_state'];
$address_zip = $_POST['address_zip'];
$address_country = $_POST['address_country'];
$address_street = $_POST['address_street'];
$address_city = $_POST['address_city'];
$address_state = $_POST['address_state'];

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Virginia Chapter of the American Planning Association - Thank You</title>
<meta http-equiv="pragma" content="no-cache" />
<!--// Copmany: 	Virginia Chapter of the American Planning Association -->
<!--// URL:			http://apavirginia.org/ -->
<!--// Legal:		Copyright ©  1998-2010  Virginia Chapter of the American Planning Association. All Rights Reserved.  -->
<!--// By:			Net Easy, Inc. http://neteasyinc.com -->
<link href="http://<?php echo $hosted_url; ?>/styles/base.css" rel="stylesheet" type="text/css" media="all">
<center><h2>VA Planning</h2></center><br />
</head>
<body>
<table border = "1" align = "center">
<tr>
<th colspan = "2">Payment details for<?php echo $first_name.'  '.$last_name;?> </th>
</tr>
<tr>
<td>Item name: </td>
<td><?php echo $item_name;?></td>
</tr>
<tr>
<td>Item code: </td>
<td><?php echo $item_number;?></td>
</tr>

<tr>
<td>Amount: </td>
<td><?php echo $payment_amount;?></td>
</tr>

<tr>
<td>Status: </td>
<td><?php echo $payment_status;?></td>
</tr>
<tr>
<td>Confirmation number: </td>
<td><?php echo $txn_id;?></td>
</tr>
</table>

<p align = "center">We would like to thank you for your business and look forward to your 
success as a Member of Virginia Chapter of the American Planning Association.
<a href = "eventreg">Click here to go back to APA Virginia.</a></p>

<?php
if (!$fp) {
// HTTP ERROR
} else {
fputs ($fp, $header . $req);
while (!feof($fp)) {
$res = fgets ($fp, 1024);
//echo "res :".$res;
if (strcmp ($res, "VERIFIED") == 0) {
	// check the payment_status is Completed
if($payment_status == 'Completed')
{
	$insert_qry ="INSERT INTO paypal_table VALUES ('', '$payer_id', '$payment_date', '$txn_id', '$u_name', '$last_name', '$payer_email', '$payment_type', '$memo', '".htmlentities($item_name)."', '$item_number','$payment_amount', '$payment_currency', '$address_name', '".nl2br($address_street)."', '$address_city', '$address_state', '$address_zip', '$address_country', '$payment_status','$pending_reason', '$reason_code', '$txn_type')";
	mysql_query($insert_qry);
	// Update the user_registration_mapping table if the transaction status is complete
	mysql_query("UPDATE user_registration_mapping SET payment_status = 'Paid' WHERE payment_method = 'PayPal' AND user_id = '$id' AND registered_date = '$t'");
	//echo "UPDATE user_registration_mapping SET payment_status = 'Paid' WHERE payment_method = 'PayPal' AND user_id = '$id' AND registered_date = '$t'";
		$emailtext .=" User id =".$id. " Transaction id = ".$txn_id. " Timestamp = ". $t ." Payment status = ".$payment_status;
		mail($email, "[".$date."] Neteasy Inc. paypal_ipn notification", $emailtext. "\n\n" . $req, $em_headers);

}
// check that txn_id has not been previously processed

// check that receiver_email is your Primary PayPal email

// check that payment_amount/payment_currency are correct

// process payment


}
else if (strcmp ($res, "INVALID") == 0) {
// log for manual investigation
$emailtext .="User id =". $id ." Transaction id =". $txn_id ."Timestamp = ". $t ." Payment status =". $payment_status;
mail($email, "Live-INVALID IPN", $emailtext . "\n\n" . $req, $em_headers); 

echo $payment_amount."<br />";
}
}
fclose ($fp);
}
?>
</body>
</html>
