<?php
include("../settings/database.php");

$q=$_GET["q"];
//$q= "1-398";
$data = explode("-", $q);
$q = $data[0];
//echo $q;
$id = $data[1];
$DateOfRequest = date("Y-m-d H:i:s"); 
	switch ($q)
	{
	case '1':	$status  = "Paid";
					//echo "UPDATE user_registration_mapping SET payment_status='$status' , updated_date='$DateOfRequest' WHERE id = '$id'";
					$sql= mysql_query("UPDATE user_registration_mapping SET payment_status='$status', updated_date='$DateOfRequest' WHERE id = '$id'");
					$result = mysql_query($sql);
	break;
	case '2':	$status  = "Attended";
					//echo "UPDATE user_registration_mapping SET payment_status='$status' , updated_date='$DateOfRequest' WHERE id = '$id'";
					$sql= mysql_query("UPDATE user_registration_mapping SET status='$status', updated_date='$DateOfRequest' WHERE id = '$id'");
					$result = mysql_query($sql);
	break;
	case '3':	$status  = "Cancelled";
					//echo "UPDATE user_registration_mapping SET payment_status='$status' , updated_date='$DateOfRequest' WHERE id = '$id'";
					$sql= mysql_query("UPDATE user_registration_mapping SET status='$status', updated_date='$DateOfRequest' WHERE id = '$id'");
					$result = mysql_query($sql);
	break;
	}
 ?>
 

