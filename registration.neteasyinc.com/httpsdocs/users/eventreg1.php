<?php ob_start(); ?>
<?php
include("../settings/config.php");
session_start();

$msg = $_SESSION['msg'];
$mod = $_SESSION['mod'];
$admin = $_SESSION['admin'];
if($_SESSION['id'] != "" || $_SESSION['username']!= "")
{
$uid = $_SESSION['id'];
$uname = $_SESSION['username'];
if($uid =="")
{
	$res = mysql_query("SELECT id, first_name, last_name, email, address_1, address_2, city, state, zip, phone FROM user WHERE username = '$uname'");
}
else
{
	$res = mysql_query("SELECT id, email, first_name, last_name, email, address_1, address_2, city, state, zip, phone FROM user WHERE id = '$uid' AND username = '$uname'");
}
$res = mysql_fetch_assoc($res);
$id = $res['id'];
$fname = $res['first_name'];
$lname = $res['last_name'];
$email = $res['email'];
$address_1 = $res['address_1'];
$address_2 = $res['address_2'];
$city = $res['city'];
$state = $res['state'];
$zip = $res['zip'];
$phone = $res['phone'];

$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=iso-8859-1" . "\r\n";
$headers .= "From: noreply@neteasyinc.com<noreply@neteasyinc.com>\n";		
$headers .= "Reply-To: noreply@neteasyinc.com\n";
$headers .= "Return-Path: from_email\n";
$headers .= "Organization: Neteasy Inc.\n";
$headers .= "X-Priority: 3\n";
$to = $email;
//$to = "prafull.shirodkar@neteasyinc.com";
$subject = "apavirginia.org Event Registration Details";



$_SESSION['uid'] = $id;
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<script type="text/javascript" src="selectevent.js"></script>
<script type="text/javascript" src="registeredevent.js"></script>

<script type="text/javascript">

function checkField(){
	var frm = document.eventreg;
	var error="";
		var c_value = "";
			/*  if(!document.eventreg.checkevent_1.checked || !document.eventreg.checkevent_2.checked || !document.eventreg.checkevent_3.checked)
			{
				alert("Please select an event");
				return false;
				
				}*/
				
	   }
	
function paymethod(id)
{
	//alert("id : "+id);
	
	if( id == '36')
	{
		//alert("id1 : "+id);
		document.eventreg.pay_option.disabled= true;
		
	}
	else
	{
		//alert("id2 : "+id);
		document.eventreg.pay_option.disabled= false;
		}
}
		
		function make_enable() {
			
			//alert("hello3");
					if(document.eventreg.check_event.checked){
							document.eventreg.reg_option.disabled = false;
						}  else 
							{
								document.eventreg.reg_option.disabled = true;
							}
							
				if(document.eventreg.checkevent_1.checked || document.eventreg.checkevent_2.checked || document.eventreg.checkevent_3.checked){
					document.eventreg.pay_option.disabled = false;
					}
					else
					{
						document.eventreg.pay_option.disabled = true;
						}
				 }
				
				
							


</script>

<link href="http://<?php echo $hosted_url; ?>/styles/base.css" rel="stylesheet" type="text/css" media="all">
</head>

<?php
	
if(isset($_POST['Submit']))
{
	/*	if($_POST['check_event'] !="" || $_POST['checkevent_1'] != "" || $_POST['checkevent_2'] != "" || $_POST['checkevent_3'] != "") 
			{	*/
			
						$check_event = $_POST['check_event'];
						$checkevent_1 = $_POST['checkevent_1'];
						$checkevent_2 = $_POST['checkevent_2'];
						$checkevent_3 = $_POST['checkevent_3'];
						$item_code="";
                                                $itemcode = "";
						$item_reg = "";
						$cost = 0;
						$s_reg_option = $_POST['reg_option'];	
						$s_pay_option = $_POST['pay_option'];
						$cnt = 0;
						$op_id ="";
						$total = 0;
						//echo $op_id;
							
						if($_POST['group1'] != "")
						{
							//echo $op_id;
							$price = 0;
							$cnt ++;
							$i_code = $_POST['group1'];
							$data = explode("-", $i_code);
							$userid = $data[0];
							$itemid = $data[1];
							$op_id .=$itemid.'-';
							$price = intval($data[2]);
							$unitprice = $price;
							$quant = 1;
							$uid = $userid;
							$DateOfRequest = date("Y-m-d H:i:s"); 
							$eventid = $_POST['check_event'];
							$opname = mysql_query("select option_name from registration_options where id = '$itemid'");
							$opname = mysql_fetch_assoc($opname);
							$option_name = $opname['option_name'];
							$event = mysql_query("SELECT event_name, check_payable_to FROM events WHERE id = '$eventid'");
							$event = mysql_fetch_assoc($event);
							$eventname = $event['event_name'];
						$res = mysql_query("SELECT * FROM quantities WHERE site_id =1 AND user_id = '$userid' AND option_id = '$itemid' AND event_id = '$eventid'");
							$rec = mysql_num_rows($res);
							if($rec == 0)
							{
							$cost = $price * $quant;
							$total += $cost;
							$item_reg .= $cnt.'. '.$eventname."-".$option_name." - ".$quant."-".$cost."<br/>";
							$itemcode .= "#".$id.$itemid.$quant.',';
							mysql_query("insert into quantities values('','1','$userid','$eventid','$itemid','$quant','$unitprice','$cost')");
							}
							else
							{	
								$item_reg .="You have already registered for this event :".$eventname."-".$option_name."-".$cost."</br>";
								$op_id = ""; 
							}
						}
							
						if($_POST['checkevent_1'] != "")
						{
							$price = 0;
							$cnt ++;
							$i_code = $_POST['checkevent_1'];
							$data = explode("-", $i_code);
							$userid = $data[0];
							$itemid = $data[1];
							$price = $data[2];
							$unitprice = $price;
							$quant = $_POST['quant_1'];
							$avail = mysql_query("SELECT available FROM tickets WHERE opid = '$itemid'");
							$avail = mysql_fetch_assoc($avail);
							$avail = intval($avail['available']);
								if($avail - $quant >= 0)
								{
								$op_id .=$itemid.'-';
								$DateOfRequest = date("Y-m-d H:i:s"); 
								$eventid = intval($_POST['event_option_1']);
								$opname = mysql_query("select option_name from registration_options where id = '$itemid'");
								$opname = mysql_fetch_assoc($opname);
								$option_name = $opname['option_name'];
								$event = mysql_query("SELECT event_name, check_payable_to FROM events WHERE id = '$eventid'");
								$event = mysql_fetch_assoc($event);
								$eventname = $event['event_name'];
								//echo $eventname;
								$cost = $price * $quant;
								$total += $cost;
								$item_reg .= $cnt.'. '.$eventname."-".$option_name." - ".$quant."-".$cost."<br/>";
								$itemcode .= "#".$id.$itemid.$quant.',';
								mysql_query("insert into quantities values('','1','$id','$eventid','$itemid','$quant','$unitprice','$cost')");
								mysql_query("UPDATE tickets SET available = available - '$quant' WHERE opid = '$itemid'");
								}
							}
							
							
						if($_POST['checkevent_2'] != "")
						{
							$price = 0;
							$cnt ++;
							$i_code = $_POST['checkevent_2'];
							$data = explode("-", $i_code);
							$userid = $data[0];
							$itemid = $data[1]; // option _id
							$price = intval($data[2]);
							$unitprice = $price;
							$quant = $_POST['quant_2'];
							$avail = mysql_query("SELECT available FROM tickets WHERE opid = '$itemid'");
							$avail = mysql_fetch_assoc($avail);
							$avail = intval($avail['available']);
								if($avail - $quant >= 0)
								{
								$op_id .=$itemid.'-';
								$DateOfRequest = date("Y-m-d H:i:s"); 
								$eventid = intval($_POST['event_option_2']);
								$opname = mysql_query("select option_name from registration_options where id = '$itemid'");
								$opname = mysql_fetch_assoc($opname);
								$option_name = $opname['option_name'];
								$event = mysql_query("SELECT event_name, check_payable_to FROM events WHERE id = '$eventid'");
								$event = mysql_fetch_assoc($event);
								$eventname = $event['event_name'];
								//echo $eventname;
								$cost = $price * $quant;
								$total += $cost;
								$item_reg .= $cnt.'. '.$eventname."-".$option_name." - ".$quant."-".$cost."<br/>";
								$itemcode .= "#".$id.$itemid.$quant.',';
								mysql_query("insert into quantities values('','1','$id','$eventid','$itemid','$quant','$unitprice','$cost')");
								mysql_query("UPDATE tickets SET available = available - '$quant' WHERE opid = '$itemid'");
								}
							}
						if($_POST['checkevent_3'] != "")
						{
							$price = 0;
							$cnt ++;
							$i_code = $_POST['checkevent_3'];
							$data = explode("-", $i_code);
							$userid = $data[0];
							$itemid = $data[1];
							$price = $data[2];
							$unitprice = $price;
							$quant = $_POST['quant_3'];
							$avail = mysql_query("SELECT available FROM tickets WHERE opid = '$itemid'");
							$avail = mysql_fetch_assoc($avail);
							$avail = intval($avail['available']);
								if($avail - $quant >= 0)
								{
								$op_id .=$itemid.'-';
								$DateOfRequest = date("Y-m-d H:i:s"); 
								$eventid = intval($_POST['event_option_3']);
								$opname = mysql_query("select option_name from registration_options where id = '$itemid'");
								$opname = mysql_fetch_assoc($opname);
								$option_name = $opname['option_name'];
								$event = mysql_query("SELECT event_name, check_payable_to FROM events WHERE id = '$eventid'");
								$event = mysql_fetch_assoc($event);
								$eventname = $event['event_name'];
								//echo $eventname;
								$cost = $price * $quant;
								$total += $cost;
								$item_reg .= $cnt.'. '.$eventname."-".$option_name." - ".$quant."-".$cost."<br/>";
								$itemcode .= "#".$id.$itemid.$quant;
								mysql_query("insert into quantities values('','1','$id','$eventid','$itemid','$quant','$unitprice','$cost')");
								mysql_query("UPDATE tickets SET available = available - '$quant' WHERE opid = '$itemid'");
								}
						}	
						
				?>
					<div id="neteasy-registration-page-wrapper">
					<h1>Event Registration</h1>
					<p><?php echo "Welcome ".$fname." ".$lname." "; ?></p>
					<p class="red_text"><a href="eventreg" title="go back to register for more events">Go Back review your current registrations</a></p>	
					<p><a href="logout" title="log off the system">(Logout)</a></p>
					<h2>Please review your information : </h2>
						<table border="0" cellpadding="5">
							<tr>
							<td align="right" valign="top">Registered for event*:</td>
							<td valign="top"><?php echo $item_reg;?></td>
							</tr><?php if($item_reg == "") { ?>
							<tr>
							<td colspan ="2">You have not registered for any event, Please go back and register for an event.</td>
							<td></td>
							</tr>
							<?php } else {?>
							<tr>
							<td align="right" valign="top">Total*:</td>
							<td valign="top">$<?php echo $total;?></td>
							</tr>  
							<?php } 										
							if($s_pay_option == '1')
								{
									$itcode = substr($itemcode, 0, -1);
									$itcode = urlencode("Registered for:".$itcode);
									$total = urlencode($total);
									//echo "itemcode :".$itemcode;
									$return= urlencode("https://".$hosted_url."/paypal_listener?uid=".$id);
									$user = urlencode("vaplanning@comcast.net");
									$message = "
							<html>
							<head>
							<title>apavirginia.org event Registration Details</title>
							</head>
							<body>
							<p>Hello ".$fname." ". $lname. "  Thank you for the registration</p>
							<table>
							<tr>
							<th>You have registered for: </th>
							<td>".$item_reg."</td>
							</tr>
							<tr>
							<th>Total:</th>
							<td>".$total."</td>
							</tr>
							<tr>
							<td></td>
							<td><a href ='https://www.paypal.com/cgi-bin/webscr?cmd=_xclick&business=".$user."&lc=US&item_name=".$itcode."&amount=".$total."&currency_code=USD&button_subtype=products&no_note=1&no_shipping=1&n=PP%2dBuyNowBF%3abtn_buynowCC_LG%2egif%3aNonHosted&return=".$return."&rm=2'>Click to pay with PayPal</a></p></td>
									</tr>
							<tr>
							<td>NOTE: </td>
							<td>IF YOU HAVE PROBLEMS WITH THE PAYPAL INTERFACE, YOU CAN RETURN TO TRY TO PAY AGAIN BUT BE CAREFUL NOT TO BE DOUBLE CHARGED</td>
							</tr>
							<tr>
							<td></td>
							<td>Thank you,</td>
							</tr>
							<tr>
							<td></td>
							<td>apavirginia.org</td>
							</tr>
							</table>
							</body>
							</html>
							";
							mail($to,$subject,$message,$headers);				
									
									//Paypal
									?>
									<tr><td>Click here to Pay : </td>
									<form  action="https://www.paypal.com/cgi-bin/webscr" method="post" >
									<input type="hidden" name="cmd" value="_xclick">
									<input type="hidden" name="business" value="vaplanning@comcast.net">
									<input type="hidden" name="item_name" value="<?php echo "Item Code :".$itemcode;?>">
									<input type="hidden" name="currency_code" value="USD">
									<input type="hidden" name="amount" value="<?php echo $total;?>">
									<input type="hidden" name="display" value="1">
									<input type="hidden" name="quantity" value="1">
									<input type="hidden" name="email" value="<?php echo $email; ?>">
									<input type="hidden" name="first_name" value="<?php echo $fname; ?>">
									<input type="hidden" name="last_name" value="<?php echo $lname; ?>">
									<input type="hidden" name="address1" value="<?php echo $address_1; ?>">
									<input type="hidden" name="address2" value="<?php echo $raddress_2; ?>">
									<input type="hidden" name="city" value="<?php echo $city; ?>">
									<input type="hidden" name="state" value="<?php echo $state; ?>">
									<input type="hidden" name="zip" value="<?php echo $zip; ?>">
									<input type="hidden" name="phone" value="<?php echo $phone; ?>">
									<?php	if($op_id != ""){ ?>
									
	<td><input type="image" src="http://www.paypal.com/en_US/i/btn/x-click-but01.gif" name="submit" title="Make payments with PayPal - it's fast, free and secure!">
									<img alt="" border="0" src="https://www.sandbox.paypal.com/en_US/i/scr/pixel.gif" width="1" height="1">
									<input type="hidden" name="return" value="https://<?php echo $hosted_url?>/paypal_listener">
									<input type="hidden" name="rm" value="2"></td>
									<?php } ?>
										</tr>  
										<tr>
									<td></td>
									<td>Thank you</td>
									</tr>
									<tr>
									<td></td>
									<td>apavirginia.org</td>
									</tr>
										</table> 
										</form>
									<?php
																	
										$op_id = substr($op_id, 0, -1);
									$data = explode("-",$op_id);
									$list =  count($data);
									$DateOfRequest =  date("Y-m-d H:i:s"); 
									if($op_id != ""){
									for($i = 0; $i < $list; $i++)
									{
										$oid = $data[$i];
										$qry = mysql_query("SELECT event_id FROM registration_options WHERE id = '$oid'");
										$res = mysql_fetch_assoc($qry);
										$eid = $res['event_id'];
										//echo "eid : ".$eid;
										mysql_query("insert into user_registration_mapping values('', '1','$eid', '$oid', '$id', '$DateOfRequest','','PayPal','Pending','Registered')");
								}
								}
							}
							if($s_pay_option == '2' || $s_pay_option == "" && $itemid != 36)
							{
								if($op_id != ""){
							$check_payable = mysql_query("SELECT check_payable_to FROM events WHERE id = '$eventid'");
							$check_payable = mysql_fetch_assoc($check_payable);
							$check_payable = $check_payable['check_payable_to'];
							$message = "
							<html>
							<head>
							<title>apavirginia.org event Registration Details</title>
							</head>
							<body>
								<p>Hello ".$fname." ". $lname. "  Thank you for the registration</p>
							<table>
							<tr>
							<th>You have registered for: </th>
							<td>".$item_reg."</td>
							</tr>
							<tr>
							<th>Total:</th>
							<td>".$total."</td>
							</tr>
							<tr>
							<td></td>
							<td>Please make the check payable to : ".$check_payable." If not paying by PayPal.</td>
							</tr>
							<tr>
							<td></td>
							<td>Please put this code (".$id.$uname.") in the memo field</td>
							</tr>
							<tr>
							<td></td>
							<td>Thank you,</td>
							</tr>
							<tr>
							<td></td>
							<td>apavirginia.org</td>
							</tr>
							</table>
							</body>
							</html>
							";
							
								mail($to,$subject,$message,$headers);				
						?>
							<td>Please make the check payable to <?php echo $check_payable?> </td>
							</tr>
							<tr>
							<td></td>
							<td>Please put this code (<?php echo $id.$uname; ?>) in the memo field</td>
							</tr>
							<?php }?>
							<tr>
							<td></td>
							<td>Thank you</td>
							</tr>
							<tr>
									<td></td>
									<td>apavirginia.org</td>
									</tr>
							<?php								
								$op_id = substr($op_id, 0, -1);
								$data = explode("-",$op_id);
								$list =  count($data);
								$DateOfRequest =  date("Y-m-d H:i:s"); 
							 if($op_id != ""){
									for($i = 0; $i < $list; $i++)
									{
										$oid = intval($data[$i]);
										$qry = mysql_query("SELECT event_id FROM registration_options WHERE id = '$oid'");
										$res = mysql_fetch_assoc($qry);
										$eid = $res['event_id'];
										mysql_query("insert into user_registration_mapping values('','1','$eid', '$oid', '$id', '$DateOfRequest','','Check','Pending','Registered')");
								}
								}
								}
								if($itemid == 36  && $s_pay_option == "")
									{
										$qry = mysql_query("SELECT event_id FROM registration_options WHERE id = '$itemid'");
										$res = mysql_fetch_assoc($qry);
										$eid = $res['event_id'];
										mysql_query("insert into user_registration_mapping values('', '1','$eid', '$itemid', '$id', '$DateOfRequest','','FreeEvent','Free','Registered')");
										$message = "
							<html>
							<head>
							<title>apavirginia.org event Registration Details</title>
							</head>
							<body>
								<p>Hello ".$fname." ". $lname. "  Thank you for the registration</p>
							<table>
							<tr>
							<th>You have registered for:</th>
							<td>".$item_reg."</td>
							</tr>
							<tr>
							<th>Total:</th>
							<td>".$total."</td>
							</tr>
							</table>
							</body>
							</html>
								";
										mail($to,$subject,$message,$headers);	
										}
	/*	}
	else
	{
		$msg =  "Please select an event";
		$_SESSION['msg'] = $msg;
		header('Location : eventreg/');
	}*/

}else
{
$res = mysql_query("SELECT e.id, e.event_name FROM events AS e WHERE e.id = 14 ");
$res1 = mysql_fetch_assoc($res);
$eventname = $res1['event_name'];
$eventid = $res1['id'];
?>

<body>
<div id="neteasy-registration-page-wrapper">
    <h1>Event Registration</h1>
	<?php if($_SESSION['msg'])// { echo "<p class='RedColorText'>".$msg."</p>";}
	unset ($_SESSION['msg']);?>
	<?php echo "Welcome ".$fname." ".$lname; ?><p align="right"><?php if($admin){?><a href="/admin/main" title="Admin Home">Home</a><?php } else if($mod){?><a href="/admin/main" title="Moderator Home">Home</a><?php } ?>|<a href="logout" title="Log off the system">Logout</a></p>
    <form id="eventreg" name ="eventreg" method="post" action="eventreg"  >
    <table border="0" cellpadding="5">
	<tr>
	<?php 
	$reg_list = mysql_query("SELECT e.event_name, ro.option_name, urm.site_id, urm.event_id, urm.registration_option_id, urm.payment_method, urm.payment_status FROM user_registration_mapping AS urm, events AS e, registration_options AS ro WHERE e.id = urm.event_id AND e.status = 'Active' AND ro.id = urm.registration_option_id AND urm.user_id = '$id'");
$reg_list_rows = mysql_num_rows($reg_list);
?><td>Currently  registered for <?php echo $reg_list_rows;?> events.</td></tr></table>
<?php if( $reg_list_rows > 0){?>
<table border="1">
			<tr>
			<td>Event</td>
			<td>Payment Type</td>
			<td>Payment Status</td>
			<td>Price</td>
			<td>Qty</td>
			<td>Cost</td>
			
			</tr>
<?php
$total = 0;
$icode = "";
	while($rec = mysql_fetch_assoc($reg_list)){
		$sid = $rec['site_id'];
		$eid = $rec['event_id'];
		$opid = $rec['registration_option_id'];
	//	echo $sid." ".$eid." ".$opid;
	//	echo $rec['event_name']." ".$rec['option_name']." ".$rec['payment_method']." ".$rec['payment_status'];
		
			$qlist = mysql_query("SELECT Price, Cost, quantity FROM quantities WHERE site_id ='$sid' AND event_id='$eid' AND option_id = '$opid' AND user_id ='$id'");
			//echo "SELECT Price, Cost, quantity FROM quantities WHERE site_id ='$sid' AND event_id='$eid' AND option_id = '$opid' AND user_id ='$id'";
			$qlist = mysql_fetch_assoc($qlist);
			$cost = $qlist['Cost'];
			$price = $qlist['Price'];
			$qty = $qlist['quantity'];
			
			?>
			<tr>
			<td><?php echo $rec['event_name']." ".$rec['option_name'];?></td>
			<td><?php echo $rec['payment_method'];?></td>
			<td><?php echo $rec['payment_status'];?></a>
			<td><?php echo $price;?></td>
			<td><?php echo $qty;?></a>
			<td><?php echo $cost;?> </a></td>
			<?php
			if($rec['payment_method'] == 'PayPal' && $rec['payment_status'] == 'Pending'){
				$total = $total + $cost;
				$icode .=  "#".$id.$opid.$qty.',';
				
				?><?php
			}
			
		?>
		
		<?php
		}
		
		$icode = substr($icode, 0, -1);
									$icode = urlencode("Registered for:".$icode);
									$total = urlencode($total);
									//echo "itemcode :".$itemcode;
									$return= urlencode("https://".$hosted_url."/paypal_listener?uid=".$id);
									$user = urlencode("vaplanning@comcast.net");
		
		?>
		</tr>
		<tr>
		<td colspan="6"><?php echo "<a href ='https://www.paypal.com/cgi-bin/webscr?cmd=_xclick&business=".$user."&lc=US&item_name=".$icode."&amount=".$total."&currency_code=USD&button_subtype=products&no_note=1&no_shipping=1&n=PP%2dBuyNowBF%3abtn_buynowCC_LG%2egif%3aNonHosted&return=".$return."&rm=2'>Click to pay with PayPal : $".$total ."</a>";
		?></td>
		</tr>
		<?php
	}
	?>
		
	<table>
	<tr>
        <td align="right" class="required-input-data">Event*:</td>
        	</tr>
		<tr>
		<td><input type="checkbox" name="check_event" id ="check_event" value ="<?php echo $eventid;?>" onclick="make_enable()"><?php echo $eventname;?></td>
					<td><select name='reg_option' onchange='showEventDetails(this.value)' id="reg_option" disabled >
					<option value='0'>Select Registration type</option>
					<option value='1'>Member</option>
					<option value='2'>Non-Member</option>
					<option value='3'>Speaker</option>
					<option value='4'>Student</option>
					</select></td></tr>
					<tr>
					<td><div id="txtHint1"></td>
					</tr>
<?php
$res = mysql_query("SELECT  t.max, t.available, e.id, e.event_name, rp.price, ro.option_name, rp.option_id FROM events AS e, regprice AS rp, registration_options AS ro, tickets AS t WHERE t.opid = ro.id AND e.site_id = '1' AND e.status LIKE 'Active' AND e.id = ro.event_id AND ro.id = rp.option_id");
			$i = 0;
			$today = date("Y-m-d");
			$expired = strtotime("2010-04-16");
			$today = strtotime($today);
			while($event = mysql_fetch_assoc($res))
			{
						//echo $event['event_name'];
						$op_id = $event['option_id'];
						$price = $event['price'];
						$max = $event['max'];
						$avail = $event['available'];
						$i++;
						if($expired > $today &&  $avail > 0) {
					?>
					<tr>
					<td><input type="checkbox" name = "<?php echo "checkevent_".$i;?>" id="<?php echo "checkevent_".$i;?>"  value="<?php echo  $uid."-".$op_id."-".$price; ?>" onclick="make_enable()"><?php echo $event['event_name'];?></td>
					<td><input type ="hidden" name="<?php echo "event_option_".$i;?>" value="<?php echo  $event['id']; ?>" /><?php echo  $event['option_name']; ?></td>
					<td>$<input type ="hidden" name="opprice" value="<?php echo  $event['price']; ?>" /><?php echo $event['price']; ?></td>
					<td>Qty <input type ="text" name="<?php echo "quant_".$i;?>"  size="1"  maxlength="2" value="1"/></td>
			<td>Max <input type ="text" name="<?php echo "max_".$i;?>"  size="3"  maxlength="4" value="<?php echo  $max; ?>" readonly/></td>
			<td>Available <input type ="text" name="<?php echo "avail_".$i;?>"  size="3"  maxlength="4" value="<?php echo  $avail; ?>" readonly/></td>
					</tr>
					<?php 
						}
					 else if( $event['id'] != 15 && $avail > 0){?>
					<tr>
					<td><input type="checkbox" name = "<?php echo "checkevent_".$i;?>" id="<?php echo "checkevent_".$i;?>"  value="<?php echo  $uid."-".$op_id."-".$price; ?>" onclick="make_enable()"><?php echo $event['event_name'];?></td>
					<td><input type ="hidden" name="<?php echo "event_option_".$i;?>" value="<?php echo  $event['id']; ?>" /><?php echo  $event['option_name']; ?></td>
					<td>$<input type ="hidden" name="opprice" value="<?php echo  $event['price']; ?>" /><?php echo $event['price']; ?></td>
					<td>Qty <input type ="text" name="<?php echo "quant_".$i;?>"  size="1"  maxlength="2" value="1"/></td>
			<td>Max <input type ="text" name="<?php echo "max_".$i;?>"  size="1"  maxlength="2" value="<?php echo  $max; ?>" readonly/></td>
			<td>Available <input type ="text" name="<?php echo "avail_".$i;?>"  size="1"  maxlength="2" value="<?php echo  $avail; ?>" readonly/></td></tr>
					<?php
					}?>
					<?php
			}
					?>       
		<tr>
        <td align="right" valign="top"  class="required-input-data">Payment Method*:</td>
        <td valign="top"><select name="pay_option" id="pay_option">
           	<option value="">Select Payment Option</option>
        	<option value="1">PayPal</option>
        	<option value="2">By Check</option>
        </select></td>
		</tr>
	<tr>
        <td align="right" valign="top"><input type="reset" name="Reset" id="Reset" value="Reset"></td>
        <td valign="top"><input type="submit" name="Submit"  onClick="checkField();" value = "Submit"/></td>
      </tr>  
	</table> 
</form>
    </div>
	</body>
	</html>
	<?php
	}
		}
	else
	{
	header('Location: userlogin');
	}
	?>
	<? ob_flush(); ?> 
