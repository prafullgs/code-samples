<?php
include("../settings/config.php");
session_start();
$uid = $_SESSION['uid'];
$q=$_GET["q"];
/*
$sql="SELECT ro.option_name, ro.id, rp.price FROM user_roles AS ur, regprice AS rp, registration_options AS ro  WHERE ur.id = '".$q."' AND ur.id = rp.usertype_id AND rp.option_id = ro.id";

$result = mysql_query($sql);*/
 ?>
 <table border='1' cellpadding='5'>
<?php
$DateOfRequest = date("Y-m-d"); 
	//echo $DateOfRequest;
	
	$dte = explode("-", $DateOfRequest);
	$yr = intval($dte[0]);
	//echo "yr : ".$yr;
	$mon = intval($dte[1]);
	//echo "mon : ".$mon;
	$day = intval($dte[2]);
	//echo "day : ".$day;
	$flag = 0;
	if(intval($mon) > 3 && intval($day) > 11)
	{
		$flag= 1;
		}
		else
		{
			$flag= 0;
			}
	
		$sql="SELECT ur.type, ro.option_name, ro.id,  rp.price ,rp.after_april_11 FROM user_roles AS ur, regprice AS rp, registration_options AS ro  WHERE ur.id = '".$q."' AND ur.id = rp.usertype_id AND rp.option_id = ro.id";

$result = mysql_query($sql);
?>


<?php

while($row = mysql_fetch_array($result))
  {
	  $op_id = $row['id'];
		if($flag == 1)
	{  
	 $price = $row['after_april_11'];  
	}
	else
	{
		 $price = $row['price'];  
	}
 ?>
<tr>
<td><input type="radio" name="group1" value="<?php echo  $uid."-".$op_id."-".$price; ?>" <?php// if($op_id != '36'){ echo CHECKED ;}?> onclick="paymethod(<?php echo $op_id;?>);"></td>
<td><input type ="hidden" name="opname" value="<?php echo  $row['option_name']; ?>" /><?php echo  $row['option_name']; ?></td>
<td>$<input type ="hidden" name="opprice" value="<?php echo  $price; ?>" /><?php echo $price; ?></td>
</tr>
<?php
  }
?>  
</table>

