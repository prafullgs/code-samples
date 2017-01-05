<?php ob_start(); ?>
<?php
include("../settings/database.php");
if(isset($_POST['Submit']))
{
	$siterec = mysql_query("SELECT id from sites WHERE name LIKE 'VA Planning'");
	$siteid = mysql_fetch_assoc($siterec);
	$site_id = $siteid['id'];
	if($_POST['event_name'] != "" && $_POST['email'] != "" && $_POST['status'] != "")
	{
		$eventname = mysql_real_escape_string($_POST['event_name']);
		$timestamp = date("y/m/d : H:i:s", time());
		$loc = mysql_real_escape_string($_POST['loc']);
		$loc_desc = mysql_real_escape_string($_POST['loc_desc']);
		$address1 = mysql_real_escape_string($_POST['address1']);
		$address2 = mysql_real_escape_string($_POST['address2']);
		$city = mysql_real_escape_string($_POST['city']);
		$state = mysql_real_escape_string($_POST['state']);
		$zip = mysql_real_escape_string($_POST['zip']);
		$country = mysql_real_escape_string($_POST['country']);
		$phone = mysql_real_escape_string($_POST['phone']);
		$fax = mysql_real_escape_string($_POST['fax']);
		$url = mysql_real_escape_string($_POST['url']);
		$email = mysql_real_escape_string($_POST['email']);
		$lodge_info = mysql_real_escape_string($_POST['lodge_info']);
		$startdate = mysql_real_escape_string($_POST['startdate']);
		$check_payable = mysql_real_escape_string($_POST['check_payable']);
		//$startdate = strtotime($startdate);
		echo $startdate;
		$enddate = $_POST['enddate']);
		//$enddate = strtotime($enddate);
		echo "<br>". $enddate;
		$eventdesc = mysql_real_escape_string($_POST['event_desc']);
		$status = mysql_real_escape_string($_POST['status']);
		
		
		mysql_query("INSERT INTO events VALUES('','$site_id','$eventname','$timestamp','$loc','$loc_desc','$address1','$address2','$city','$state','$zip','$country','$phone','$fax','$url','$email','$lodge_info','$startdate','$enddate','$eventdesc','$status','$check_payable')");
					
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
	
	<title>Add event Page</title>
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
    <h1>Enter event details </h1>
    <form id="addevent" name ="addevent" method="POST" action="addevent.php"  >
    <table border="0" cellpadding="5">
    <tr>
        <td align="right" valign="top"><span class="required">* Required Fields</span></td>
        <td valign="top">&nbsp;</td>
    </tr>
    <tr>
		<td align="right" valign="top"><span class="required">Event Name*:</span> </td>
		<td width="56%" valign="top"><input name="event_name" type="text" size="44" id="event_name" />
    </tr>
	
	 <tr>
		<td align="right" valign="top"><span class="required">Start Date:</span> </td>
		<td width="56%" valign="top"><input name="startdate" type="text" size="20" id="startdate" />
    </tr>
	
	 <tr>
		<td align="right" valign="top"><span class="required">End Date:</span> </td>
		<td width="56%" valign="top"><input name="enddate" type="text" size="20" id="enddate" />
    </tr>
	
	<tr>
        <td align="right" valign="top">Event Description:</td>
        <td width="56%" valign="top"><textarea name="event_desc" rows="1" cols="50" id="event_desc" >
		</textarea>
    </tr>
		
    <tr>
        <td width="44%" align="right" valign="top"><span class="required">Location :</span> </td>
        <td width="56%" valign="top"><input name="loc"  type="text" size="22" id="loc" />
        </td>
    </tr>
	<tr>
        <td align="right" valign="top">Location Description:</td>
        <td width="56%" valign="top"><textarea name="loc_desc" rows="1" cols="25" id="loc_desc" >
		</textarea>
    </tr>
	<tr>
        <td align="right" valign="top"> Address 1:</td>
        <td valign="top"><input name="address1" type="text" size="22" id="address1" /></td>
    </tr>
	
    <tr>
        <td align="right" valign="top"> Address 2:</td>
        <td valign="top"><input name="address2" type="text" size="22" id="address2" /></td>
     </tr>
	 
    <tr>
        <td align="right" valign="top"> City :</td>
        <td valign="top"><input name="city" type="text" size="22" id="city" /></td>
    </tr>
	
    <tr>
        <td align="right" valign="top"> State :</td>
        <td valign="top"><input name="state" type="text" size="22" id="state" /></td>
      </tr>
      
	<tr>
        <td align="right" valign="top"> Zip :</td>
        <td valign="top"><input name="zip" type="text" size="22" id="zip" /></td>
      </tr>
	  
      <tr>
	    <td align="right" valign="top">Country:</td>
        <td valign="top"><input name="country" type="text" size="22" id="country" /></td>
      </tr>
	  
      <tr>
        <td align="right" valign="top">Phone:</td>
        <td valign="top"><input name="phone" type="text" size="22" id="phone" /></td>
      </tr>
	  
     <tr>
        <td align="right" valign="top">Fax :</td>
       <td valign="top"><input type="text" name="fax"  size="22"/></td>
      </tr>
	
	<tr>
        <td align="right" valign="top">URL :</td>
       <td valign="top"><input type="text" name="url" size="22" /></td>
      </tr>
	  
      <tr>
        <td align="right" valign="top"><span class="required">Email address*</span>:</td>
        <td valign="top"><input type="text" name="email"  size="22"/></td>
      </tr>
     
	<tr>
        <td align="right" valign="top">Lodging Information:</td>
        <td width="56%" valign="top"><textarea name="lodge_info" rows="1" cols="50" id="lodge_info" >
		</textarea>
    </tr> 
	
	<tr>
        <td align="right" valign="top">Make checks payable to:</td>
       <td valign="top"><input type="text" name="check_payable"  size="50"/></td>
	</tr> 
	
	<tr>
        <td align="right" valign="top">Status Information:</td>
        <td width="56%" valign="top"><select name="status">
			<option value="">Select status</option>
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