<?php ob_start(); ?>
<?php
include("../settings/database.php");
$id = $_GET['id'];

//echo "ID->".$id;
$rec = mysql_query("SELECT * FROM events WHERE id = '$id'");
$rec = mysql_fetch_assoc($rec);
$site_id = $rec['site_id'];

if(isset($_POST['Submit']))
{
	//$id = $_GET['id'];
	echo "ID=".$id;
	$site_id = $rec['site_id'];
	echo "Site ID=".$site_id;
	if($_POST['event_name'] != "" && $_POST['email'] != "" )
	{
		$eventname = $_POST['event_name'];
		$timestamp = date("y/m/d : H:i:s", time());
		$loc = $_POST['loc'];
		$loc_desc = $_POST['loc_desc'];
		$address1 = $_POST['address1'];
		$address2 = $_POST['address2'];
		$city = $_POST['city'];
		$state = $_POST['state'];
		$zip = $_POST['zip'];
		$country = $_POST['country'];
		$phone = $_POST['phone'];
		$fax = $_POST['fax'];
		$url = $_POST['url'];
		$email = $_POST['email'];
		$lodge_info = $_POST['lodge_info'];
		$startdate = $_POST['startdate'];
		echo $startdate;
		$enddate = $_POST['enddate'];
		$eventdesc = $_POST['event_desc'];
		$status = $_POST['status'];
		echo $status;
		
	try{	
	$update = sprintf("UPDATE events SET id = '%d', site_id = '%d', event_name = '%s', creation_date = '%s', location_name = '%s', location_description ='%s', location_addressline1 ='%s', location_addressline2 ='%s', location_city = '%s', location_state = '%s', location_postalcode ='%s',location_country ='%s', location_phone = '%s', location_fax = '%s', location_url = '%s', location_email = '%s', lodging_info = '%s', start_date ='%s',end_date = '%s',event_description = '%s', status = '%s' WHERE id = '%d'", $id, $site_id, $eventname, $timestamp, $loc, $loc_desc, $address1, $address2, $city, $state, $zip, $country, $phone, $fax,$url, $email, $lodge_info, $startdate, $enddate ,$eventdesc,$status, $id);
	echo "query : ".$update;
	mysql_query($update);
	/*
mysql_query("UPDATE events SET id = '$id', site_id = '$site_id', event_name = '$eventname', creation_date = '$timestamp', location_name = '$loc', location_description ='$loc_desc', location_addressline1 ='$address1', location_addressline2 ='$address2', location_city = '$city', location_state = '$state', location_postalcode ='$zip',location_country ='$country', location_phone = '$phone', location_fax = '$fax', location_url = '$url', location_email = '$email', lodging_info = '$lodge_info', start_date ='$startdate',end_date = '$enddate',event_description = '$eventdesc' WHERE id = '$id'");*/
		}
		catch(Exception $e)
				{
				  
				  echo $e->getMessage();
				  
				}		
				
		header('Location: list.php');
	}
	else
	{
		echo "Enter required fields";
	}
	
}

?>
<? ob_flush(); ?> 
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	
	<title>Edit event Page</title>
<style>
body {
font: 100% Verdana, Georgia, Lucida, Helvetica, Arial, sans-serif;
background-color: White;
color: Black;
margin: 0;
padding: 0;
}
</style>

	<link type="text/css" href="jquery/themes/base/jquery.ui.all.css" rel="stylesheet" />
	<script type="text/javascript" src="jquery/jquery-1.4.2.js"></script>
	<script type="text/javascript" src="jquery/ui/jquery.ui.core.js"></script>
	<script type="text/javascript" src="jquery/ui/jquery.ui.widget.js"></script>
	<script type="text/javascript" src="jquery/ui/jquery.ui.datepicker.js"></script>
	<script type="text/javascript">
	$(function() {
		var dates = $('#startdate, #enddate').datepicker({
			defaultDate: "+1w",
			changeMonth: true,
			numberOfMonths: 1,
			onSelect: function(selectedDate) {
				var option = this.id == "startdate" ? "minDate" : "maxDate";
				var instance = $(this).data("datepicker");
				var date = $.datepicker.parseDate(instance.settings.dateFormat || $.datepicker._defaults.dateFormat, selectedDate, instance.settings);
				dates.not(this).datepicker("option", option, date);
			}
		});
	});
	</script>
</head>
<body>

<div>
    <h1>Edit event details </h1>
    <form id="editevent" name ="editevent" method="POST" action="edit.php?id=<?php echo $id;?>"  >
    <table border="0" cellpadding="5">
    <tr>
        <td align="right" valign="top"><span class="required">* Required Fields</span></td>
        <td valign="top">&nbsp;</td>
    </tr>
    <tr>
		<td align="right" valign="top"><span class="required">Event Name*:</span> </td>
		<td width="56%" valign="top"><input name="event_name" type="text" size="44" id="event_name" value = "<?= $rec['event_name'];?>" />
		</td>
    </tr>
	
	 <tr>
		<td align="right" valign="top"><span class="required">Start Date:</span> </td>
		<td width="56%" valign="top"><input name="startdate" type="text" size="20" id="startdate" value = "<?php echo $rec['start_date'];?>" />
		</td>
    </tr>
	
	 <tr>
		<td align="right" valign="top"><span class="required">End Date:</span> </td>
		<td width="56%" valign="top"><input name="enddate" type="text" size="20" id="enddate" value = "<?php echo $rec['end_date'];?>" />
    </tr>
	
	<tr>
        <td align="right" valign="top">Event Description:</td>
        <td width="56%" valign="top"><textarea name="event_desc" rows="1" cols="50" id="event_desc"><?php echo $rec['event_description'];?>
		</textarea>
		</td>
    </tr>
		
    <tr>
        <td width="44%" align="right" valign="top"><span class="required">Location :</span> </td>
        <td width="56%" valign="top"><input name="loc"  type="text" size="22" id="loc" value = "<?php echo $rec['location_name'];?>" />
        </td>
    </tr>
	<tr>
        <td align="right" valign="top">Location Description:</td>
			<td width="56%" valign="top"><textarea name="loc_desc" rows="1" cols="25" id="loc_desc" ><?php echo $rec['location_description'];?>
			</textarea>
			</td>
    </tr>
	<tr>
        <td align="right" valign="top"> Address 1:</td>
        <td valign="top"><input name="address1" type="text" size="22" id="address1" value ="<?php echo $rec['location_addressline1'];?>"/></td>
    </tr>
	
    <tr>
        <td align="right" valign="top"> Address 2:</td>
        <td valign="top"><input name="address2" type="text" size="22" id="address2" value = "<?php echo $rec['location_addressline2'];?>"/></td>
     </tr>
	 
    <tr>
        <td align="right" valign="top"> City :</td>
        <td valign="top"><input name="city" type="text" size="22" id="city" value = "<?php echo $rec['location_city'];?>" /></td>
    </tr>
	
    <tr>
        <td align="right" valign="top"> State :</td>
        <td valign="top"><input name="state" type="text" size="22" id="state" value = "<?php echo $rec['location_state'];?>" /></td>
      </tr>
      
	<tr>
        <td align="right" valign="top"> Zip :</td>
        <td valign="top"><input name="zip" type="text" size="22" id="zip" value = "<?php echo $rec['location_postalcode'];?>" /></td>
      </tr>
	  
      <tr>
	    <td align="right" valign="top">Country:</td>
        <td valign="top"><input name="country" type="text" size="22" id="country"  value = "<?php echo $rec['location_country'];?>" /></td>
      </tr>
	  
      <tr>
        <td align="right" valign="top">Phone:</td>
        <td valign="top"><input name="phone" type="text" size="22" id="phone" value = "<?php echo $rec['location_phone'];?>" /></td>
      </tr>
	  
     <tr>
        <td align="right" valign="top">Fax :</td>
       <td valign="top"><input type="text" name="fax"  size="22" value = "<?php echo $rec['location_fax'];?>" /></td>
      </tr>
	
	<tr>
        <td align="right" valign="top">URL :</td>
       <td valign="top"><input type="text" name="url" size="22" value = "<?php echo $rec['location_url'];?>" /></td>
      </tr>
	  
      <tr>
        <td align="right" valign="top"><span class="required">Email address*</span>:</td>
        <td valign="top"><input type="text" name="email"  size="22" value = "<?php echo $rec['location_email'];?>" /></td>
      </tr>
     
	<tr>
        <td align="right" valign="top">Lodging Information:</td>
        <td width="56%" valign="top"><textarea name="lodge_info" rows="1" cols="50" id="lodge_info" ><?php echo $rec['lodging_info'];?>
		</textarea>
		</td>
    </tr> 
	<tr>
        <td align="right" valign="top">Status Information:</td>
        <td width="56%" valign="top"><select name="status">
			<option value="<?php echo $rec['status'];?>"><?php echo $rec['status'];?></option>
			<option value="Active">Active</option>
			<option value="Not Active">Not Active</option>
		</select>
    </tr> 
	
      <tr>
        <td></td>
        <td valign="top"><input type="submit" name="Submit" value="Submit"/></td>
      </tr>
    </table>
    </form>
    </div>
    
 
  </body>
</html>