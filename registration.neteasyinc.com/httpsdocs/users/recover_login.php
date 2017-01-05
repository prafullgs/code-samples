<?php
include("../settings/config.php");
if($_GET['msg'])
{
$msg = $_GET['msg'];
switch ($msg)
{
	case "successuser":
							$msg = "<p class=\"RedColorText\">An email has been sent to the email address registered with this account</p>";
			break;
	case "unsuccessuser":
							$msg = "<p class=\"RedColorText\">Sorry, Username does not exist</p>";
			break;
	case "successemail":
							$msg = "<p class=\"RedColorText\">Username has been sent to the email address.</p>";
			break;
	case "unsuccessemail":
							$msg = "<p class=\"RedColorText\">Sorry, Email address not registered</p>";
			break;
}
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Registration Account Recovery Form</title>
<script language="JavaScript" type="text/javascript">
				<!--
function checkField(){
	var frm = document.recoverform;
	var error="";
	if(frm.registration_user_emailaddress.value !="" && frm.registration_user_id.value !="")
	{
		error +="Please enter any one field";
	}
	
	if(frm.registration_user_emailaddress.value =="" && frm.registration_user_id.value =="")
	{
		error +="Please enter any one field";
	}
	
	if(error != ""){
						alert(error);
						return false;
					}else{
						return true;
					}
	
	}
//-->
</script>
<link href="https://<?php echo $hosted_url; ?>/styles/base.css" rel="stylesheet" type="text/css" media="all" />
</head>

<body>
<div id="neteasy-registration-page-wrapper">

<div id="registration-account-recovery-form">
  <h1>Account Recovery Process </h1>
    	<form action="recover" method="post" enctype="application/x-www-form-urlencoded" name = "recoverform">
        <h3>Reset your Password</h3>
        <p>If you forgot your password, enter the User ID to reset it. </p>        
    	<div id="registration-account-user-id-label">User ID:</div>
        <div id="registration-account-userid-recovery-form-input"><input name="registration_user_id" type="text" value="" /></div>
        
        
        <div class="clear">
          <h3>Retrieve User ID</h3>
          <p>If you forgot the User ID, enter your e-mail address to recover it. </p>
        </div>
    	<div id="registration-account-user-email-label">E-mail Address:</div>
        <div id="registration-account-user-email-recovery-form-input"><input name="registration_user_emailaddress" type="text" value="" /></div>
        <p><input type="reset" value="Reset" name="reset" /> &nbsp; <input type = "submit" value="Submit" name = "submit" onClick="return checkField();" /></p>
        </form>
        <div id="msg"> <?php echo $msg?></div>
</div>        
</div>


</body>
</html>
