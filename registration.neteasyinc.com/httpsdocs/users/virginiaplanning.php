<?php ob_start(); ?>


<?php
include("../settings/config.php");
	
	session_start();
	$_SESSION['site_id']= 1;
	$site_id = $_SESSION['site_id'];
		
	if(isset($_POST['Submit'])){
/*	require_once('../settings/recaptchalib.php');
	$private_key = "6LfWCgcAAAAAADTLZ_iLu755W5RuNVBnRVn_qBGN";

	$valid = true;
				
	$resp = recaptcha_check_answer ($private_key, $_SERVER["REMOTE_ADDR"], $_POST["recaptcha_challenge_field"], $_POST["recaptcha_response_field"]);
	
			if (!$resp->is_valid)
			{
				$valid = false;
				$msgcaptcha = 'Captcha validation failed!<br/>';
				
			}
		*/		
		if( $_POST['first_name'] != "" || $_POST['last_name'] != "" || $_POST['email']!= "" || $_POST['uname'] != "" || $_POST['password'] != "")
		{				
			//if($valid)
			//{
						$s_uname =  mysql_real_escape_string($_POST['uname']);
						$s_upass = mysql_real_escape_string($_POST['password']);
						$s_squestion = mysql_real_escape_string($_POST['squestion']);
						$s_sanswer = mysql_real_escape_string($_POST['sanswer']);
						$s_title = mysql_real_escape_string($_POST['title']);
						$s_fname = mysql_real_escape_string($_POST['first_name']);
						$c_mname = mysql_real_escape_string($_POST['middle_initial']);
						$s_lname = mysql_real_escape_string($_POST['last_name']);
						$s_suffix = mysql_real_escape_string($_POST['suffix']);
						$s_badge = mysql_real_escape_string($_POST['badge_name']);
						$s_employer = mysql_real_escape_string($_POST['employer']);
						$s_aicp = mysql_real_escape_string($_POST['AICP']);
						$s_address_1 = mysql_real_escape_string($_POST['address_1']);
						$s_address_2 = mysql_real_escape_string($_POST['address_2']);
						$s_city = mysql_real_escape_string($_POST['city']);
						$s_state = mysql_real_escape_string($_POST['state']);
						$i_zip = mysql_real_escape_string($POST['zip']);
						$s_country = mysql_real_escape_string($_POST['country']);
						$i_phone = mysql_real_escape_string($_POST['phone']);
						$i_fax = mysql_real_escape_string($_POST['fax']);
						$s_email = mysql_real_escape_string($_POST['email']);
						$s_email = strtolower($s_email);
						$s_state = mysql_real_escape_string($_POST['state']);
						$s_alt_email = mysql_real_escape_string($_POST['alt_email']);
						
						try
						{
							$DateOfRequest = date("Y-m-d H:i:s"); 
							//echo "SELECT * FROM user WHERE username LIKE '$s_uname'";
							$usercheck = mysql_query("SELECT * FROM user WHERE username = '$s_uname' OR email = '$s_email'");
							$user_rows = mysql_num_rows($usercheck);
															
							if($user_rows == 0)
							{				
							mysql_query("INSERT INTO  user VALUES('','$site_id','$DateOfRequest','$s_uname','$s_upass','$s_squestion','$s_sanswer','$s_title','$s_fname','$c_mname','$s_lname','$s_suffix','$s_badge','$s_employer','$s_aicp','$s_address_1','$s_address_2','$s_city','$s_state','$i_zip','$s_country','$i_phone','$i_fax','$s_email','$s_alt_email',0)");
//echo "INSERT INTO  user VALUES('','$site_id','$DateOfRequest','$s_uname','$s_upass','$s_squestion','$s_sanswer','$s_title','$s_fname','$c_mname','$s_lname','$s_suffix','$s_badge','$s_employer','$s_aicp','$s_address_1','$s_address_2','$s_city','$s_state','$i_zip','$s_country','$i_phone','$i_fax','$s_email','$s_alt_email',0)";
							
						//	mysql_query($insert_query);								
							$user_id=mysql_query("SELECT id, username, user_password from user where username = '$s_uname'");
							$user_id = mysql_fetch_assoc($user_id);
							$user_name =$user_id['username'];
							$user_password = $user_id['user_password'];	
							$_SESSION['id'] = $user_id['id'];
							$_SESSION['username'] = $s_uname;
							//mysql_query($insert_query);
							
							//send notification
							$to = $s_email;
							//$to = "prafull.shirodkar@neteasyinc.com";
							$subject = "vapa.org event Registration Details";
							$message = "
							<html>
							<head>
							<title>vapa.org event Registration Details</title>
							</head>
							<body>
							<p>Hello! Thank you for registration</p>
							<table>
							<tr>
							<td>
							<p>Your Login details are as follows: </p>
							</td>
							</tr>
							<tr>
							<th>Username: </th>
							<td>".$user_name."</td>
							</tr>
							<tr>
							<th>Password:</th>
							<td>".$user_password."</td>
							</tr>
							<tr>
							<td><a href='https://registration.neteasyinc.com/userlogin'>Click here to login: </a></td>
							</tr>
							<tr>
							<td>Thank you,</td>
							</tr>
							<tr>
							<td>apavirginia.org</td>
							</tr>
							</table>
							</body>
							</html>
							";

							$headers = "MIME-Version: 1.0" . "\r\n";
							$headers .= "Content-type:text/html;charset=iso-8859-1" . "\r\n";
							$headers .= "From: noreply@neteasyinc.com<noreply@neteasyinc.com>\n";		
							$headers .= "Reply-To: noreply@neteasyinc.com\n";
							$headers .= "Return-Path: from_email\n";
							$headers .= "Organization: Neteasy Inc.\n";
							$headers .= "X-Priority: 3\n";
							mail($to,$subject,$message,$headers);
							//echo "Mail Sent.";
							
						header('Location: eventreg');
							
				}
				else
					{
						$msg = "User already exists";
						header('Location : virginiaplanning/'.$msg);
					}
				}
				catch(Exception $e)
					{
					  
					  echo $e->getMessage();
					  
					}		
			
	/*}
	else
	{
		echo '<p class="alertred">'.$msgcaptcha.'</p>';
	}*/
	}
	else
	{
	$msg3 = "Please enter the required fields";
	echo '<p class="alertred">'.$msg3.'</p>';
	}
	}

	

?>
<? ob_flush(); ?> 




<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="https://www.w3.org/1999/xhtml">
<head>

<title>Registration Form</title>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
<link href="https://<?php echo $hosted_url; ?>/styles/base.css" rel="stylesheet" type="text/css" media="all">



	<?php 
		//require_once('../settings/recaptchalib.php');
		//$public_key = "6LfWCgcAAAAAANI0wIcn3Tqt5mrBvBliLbn5TNwd";
	?>




				<script language="JavaScript" type="text/javascript">
				<!--
				function isValidEmail(email){
					var RegExp = /^((([A-Z]|[a-z]|[0-9]|!|#|$|%|&|'|\*|\+|\-|\/|=|\?|\^|_|`|\{|\||\}|~)+(\.([a-z]|[0-9]|!|#|$|%|&|'|\*|\+|\-|\/|=|\?|\^|_|`|\{|\||\}|~)+)*)@((((([a-z]|[0-9])([a-z]|[0-9]|\-){0,61}([a-z]|[0-9])\.))*([a-z]|[0-9])([a-z]|[0-9]|\-){0,61}([a-z]|[0-9])\.)[\w]{2,4}|(((([0-9]){1,3}\.){3}([0-9]){1,3}))|(\[((([0-9]){1,3}\.){3}([0-9]){1,3})\])))$/
					if(RegExp.test(email)){
						return true;
					}else{
						return false;
					}
				}
				function checkField(){
					var frm = document.eventregform;
					var error="";
					var invalid = " ";
				   
					if(frm.uname.value.indexOf(invalid) > -1){
						error +="Please DO NOT use spaces in the Username\n";
					}

					if(frm.uname.value =="")
					{
						error += "Please enter a Username\n";
					//	uname.focus();
					}   
					if(frm.password.value.indexOf(invalid) > -1){
	                                        error +="Please DO NOT use spaces in the Password\n";
                                        }

					if(frm.password.value =="")
					{
						error += "Please enter a Password\n";
					}   
					
					if(frm.squestion.value =="")
					{
						error += "Please enter a Security question\n";
					}   
					
					if(frm.sanswer.value =="")
					{
						error += "Please enter a Security answer\n";
					}   
					
					if(frm.first_name.value !="")
					{
						if(!isNaN(frm.first_name.value))
						{
						 error += "Please enter a valid First name\n";
						}
					}
					if(frm.last_name.value !="")
					{
						if(!isNaN(frm.last_name.value))
						{
						 error += "Please enter a valid last name\n";
						}
					}
				   
					if(frm.first_name.value =="")
					{
						error += "Please enter your First name\n";
					}
					if(frm.last_name.value =="")
					{
						error += "Please enter your Last name\n";
					}
					/*if(frm.phone.value!= "")
					{
						if(frm.phone.value.search(/\d{3}\-\d{3}\-\d{4}/) ==  -1)
						{
							error +="Please enter a phone number in the format xxx-xxx-xxxx\n";
						}
					}*/
				   
					if(!isValidEmail(frm.email.value)){
						error += 'Please enter a valid Email\n';
					}
				   
					if(error != ""){
						alert(error);
						return false;
					}else{
						frm.submit();
						return true;
					}
				}

				var RecaptchaOptions = {
					theme : 'white'
				};

				//-->
				</script>



</head>
<body>
<div id="neteasy-registration-page-wrapper">

<?php
	if( isset( $msg ) )
		{
			echo '<p class="required-input-data">'.$msg.'</p>';	
		}
		?>
       
        
    <h2>Register for Virginia Planning</h2>
	<p>Please create a User Name, Password, and Security Question that will allow you to log back into the system and change your registration at a later time. <span class="RedColorText">Do NOT use your APA login information.</span></p>
	<a href = "http://apavirginia.org/VAPA-2010ConfernceBrochure.pdf" target="blank"> Conference Brochure </a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="https://registration.neteasyinc.com/userlogin">Already registered Click here</a>
    <form id="eventregform" name ="eventregform" method="post" action="virginiaplanning"  >
    <table border="0" cellpadding="5" cellspacing="0">
	<tr>
	  <td valign="top">&nbsp;</td>
	  <td valign="top"><span class="required-input-data">* Required Fields</span></td>
	  </tr>
	<tr>
	  <th colspan="2" valign="top">Please create an account  &amp; password.</th>
	  </tr>
	<tr>
        <td align="right" valign="top" class="required-input-data">User Name <span class="small-text">(not an e-mail)</span>*:</td>
        <td valign="top"><input type="text" name="uname" value="<?php if($_POST['uname']){echo $_POST['uname'];}?>" maxlength = "20"/><span class="required-input-data">(Please DO NOT use blank spaces)</span></td>
      </tr>
	 <tr>
        <td align="right" valign="top" class="required-input-data">Password <span class="small-text">(&gt;8 characters)</span>*:</td>
        <td valign="top"><input type="password" name="password" maxlength = "20"/></td>
      </tr>  
	 <tr>
	   <th colspan="2" valign="top">Please create a unique security question for password recovery.</th>
      </tr>
	 <tr>
        <td align="right" valign="top" class="required-input-data">Security Question*:</td>
        <td valign="top"><textarea name="squestion" rows="1" cols="25"><?php if($_POST['squestion']){echo $_POST['squestion'];} else {?><?php } ?></textarea></td>
      </tr>  
	<tr>
        <td align="right" valign="top" class="required-input-data">Security Answer*:</td>
        <td valign="top"><input type="text" name="sanswer"  value="<?php if($_POST['sanswer']){echo $_POST['sanswer'];}?>"/></td>
      </tr>    
     
      <tr>
        <td align="right" valign="top">Job title:</td>
        <td valign="top"><input type="text" name="title"  value="<?php if($_POST['title']){echo $_POST['title'];}?>"/></td>

      </tr>
      <tr>
        <td align="right" valign="top"><span class="required-input-data">First Name*</span> / MI / <span class="required-input-data">Last Name*</span>:</td>
        <td valign="top"><input name="first_name" type="text" size="10" id="first_name"  value="<?php if($_POST['first_name']){echo $_POST['first_name'];}?>"/>&nbsp;
        <input name="middle_initial" type="text" size="2" id="middle_initial"  value="<?php if($_POST['middle_initial']){echo $_POST['middle_initial'];}?>"/>&nbsp;
        <input name="last_name" type="text" size="10" id="last_name"  value="<?php if($_POST['last_name']){echo $_POST['last_name'];}?>"/>&nbsp;</td>
      </tr>
      <tr>
        <td align="right" valign="top"> Suffix:</td>
        <td valign="top"><input name="suffix" type="text" size="5" id="suffix"  value="<?php if($_POST['suffix']){echo $_POST['suffix'];}?>"/></td>
      </tr>
      <tr>

        <td align="right" valign="top">Name as you wish it to appear on badge:</td>
        <td valign="top"><input name="badge_name" type="text" id="badge_name"  value="<?php if($_POST['badge_name']){echo $_POST['badge_name'];}?>"/></td>
      </tr>
      <tr>
        <td align="right" valign="top">Employer / Organization:</td>
        <td valign="top"><input name="employer" type="text" id="employer"  value="<?php if($_POST['employer']){echo $_POST['employer'];}?>"/></td>
      </tr>
      <tr>

        <td align="right" valign="top">AICP Member:</td>
        <td valign="top"><select name="AICP">
		<option value='1'<?php if($_POST['AICP']=='1') echo 'selected="selected"';?>>No</option>
		 <option value='2'<?php if($_POST['AICP']=='2') echo 'selected="selected"';?>>Yes</option>
         </select>
        </td>
      </tr>

      <tr>
        <td align="right" valign="top"><span class="required-input-data">Address Line 1</span>:</td>
        <td valign="top"><input type="text" name="address_1" value="<?php if($_POST['address_1']){echo $_POST['address_1'];}?>"/></td>
      </tr>
      <tr>
        <td align="right" valign="top">Address Line 2:</td>
        <td valign="top"><input type="text" name="address_2" value="<?php if($_POST['address_2']){echo $_POST['address_2'];}?>"/></td>
      </tr>

      <tr>
        <td align="right" valign="top"><span class="required-input-data">City</span>:</td>
        <td valign="top"><input type="text" name="city" value="<?php if($_POST['city']){echo $_POST['city'];}?>"/></td>
      </tr>
      <tr>
        <td align="right" valign="top"><span class="required-input-data">State/Zip</span>:</td>
        <td valign="top"><select name="state" id="select1" tabindex="15">
		  <!-- option selected><  ?php if($_POST['state']) { echo $_POST['state']; } else {?>Select One< ?php }?></option -->
          <option value="Alabama">Alabama</option>
          <option value="Alaska">Alaska</option>
          <option value="Arizona">Arizona</option>
          <option value="Arkansas">Arkansas</option>
          <option value="California">California</option>
          <option value="Colorado">Colorado</option>
          <option value="Connecticut">Connecticut</option>
          <option value="Delaware">Delaware</option>
          <option value="Florida">Florida</option>
          <option value="Georgia">Georgia</option>
          <option value="Hawaii">Hawaii</option>
          <option value="Idaho">Idaho</option>
          <option value="Illinois">Illinois</option>
          <option value="Indiana">Indiana</option>
          <option value="Iowa">Iowa</option>
          <option value="Kansas">Kansas</option>
          <option value="Kentucky">Kentucky</option>
          <option value="Louisiana">Louisiana</option>
          <option value="Maine">Maine</option>
          <option value="Maryland">Maryland</option>
          <option value="Massachusetts">Massachusetts</option>
          <option value="Michigan">Michigan</option>
          <option value="Minnesota">Minnesota</option>
          <option value="Mississippi">Mississippi</option>
          <option value="Missouri">Missouri</option>
          <option value="Montana">Montana</option>
          <option value="Nebraska">Nebraska</option>
          <option value="Nevada">Nevada</option>
          <option value="New Hampshire">New Hampshire</option>
          <option value="New Jersey">New Jersey</option>
          <option value="New Mexico">New Mexico</option>
          <option value="New York">New York</option>
          <option value="North Carolina">North Carolina</option>
          <option value="North Dakota">North Dakota</option>
          <option value="Ohio">Ohio</option>
          <option value="Oklahoma">Oklahoma</option>
          <option value="Oregon">Oregon</option>
          <option value="Pennsylvania">Pennsylvania</option>
          <option value="Rhode Island">Rhode Island</option>
          <option value="South Carolina">South Carolina</option>
          <option value="South Dakota">South Dakota</option>
          <option value="Tennessee">Tennessee</option>
          <option value="Texas">Texas</option>
          <option value="Utah">Utah</option>
          <option value="Vermont">Vermont</option>
          <option value="Virginia" selected>Virginia</option>
          <option value="Washington">Washington</option>
          <option value="West Virginia">West Virginia</option>
          <option value="Wisconsin">Wisconsin</option>
          <option value="Wyoming">Wyoming</option>
        </select>
        <input name="zip" type="text" size="5" /></td>
      </tr>
      <tr>
        <td align="right" valign="top">Country:</td>

        <td valign="top"><input name="country" type="text" value="US" /></td>
      </tr>
      <tr>
        <td align="right" valign="top">Phone Number:</td>
        <td valign="top"><input type="text" name="phone"  value="<?php if($_POST['phone']){echo $_POST['phone'];}?>" /></td>
      </tr>
      <tr>
        <td align="right" valign="top">Fax Number:</td>

        <td valign="top"><input type="text" name="fax"  value="<?php if($_POST['fax']){echo $_POST['fax'];}?>" /></td>
      </tr>
      <tr>
        <td align="right" valign="top"><span class="required-input-data">E-mail address*</span>:</td>
        <td valign="top"><input type="text" name="email"   value="<?php if($_POST['email']){echo $_POST['email'];}?>"/></td>
      </tr>
      <tr>
        <td align="right" valign="top">Alternate E-mail address:</td>
        <td valign="top"><input type="text" name="alt_email"  value="<?php if($_POST['alt_email']){echo $_POST['alt_email'];}?>"/></td>
      </tr>
	  <!--tr>
          <td colspan="2" align="center" scope="row"><?php //echo recaptcha_get_html($public_key); ?></td>
      </tr-->
	    <tr>
         <td align="right" scope="row"><input type="reset" name="Reset" id="button" value="Reset" /></td>
        <td valign="top"><input type="submit" name="Submit" value="Submit" onClick="return checkField();"/></td>
      </tr>
    </table>
</form>
    </div>
    
    
  </body>
</html>
