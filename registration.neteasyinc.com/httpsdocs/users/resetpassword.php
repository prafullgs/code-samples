<?php ob_start(); ?>
<?php
include("../settings/config.php");
session_start();

$msg = "";

$uid = $_SESSION['id'];
$_SESSION['id'] = $uid;

$qry = mysql_query("SELECT username FROM user WHERE id = '$uid'");
$result = mysql_fetch_assoc($qry);
$username = $result['username'];

if($_POST['reset-password'] != "" && $_POST['confirm-password']!="" && $_POST['registration-user-id'] == $username)
	{
			if($_POST['reset-password'] == $_POST['confirm-password'])
			{
				$upass = addslashes($_POST['reset-password']);
				mysql_query("UPDATE user SET user_password = '$upass' WHERE username = '$username'");
				echo '<script>alert("Your Password has been reset successfully");</script>';
				//header('Location: userlogin.php');
			?><center><a href="userlogin">Click here to login</a></center><?php
			}	
			else
			{
				$msg = "Your passwords were not the same, please enter the same password in each field";
				echo '<script>alert("Your passwords were not the same, please enter the same password in each field.");</script>';
				
				
			}
}


?>
<? ob_flush(); ?> 


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Registration Account Recovery Form</title>
<script type="javascript">

</script>
<link href="styles/base.css" rel="stylesheet" type="text/css" media="all" />
</head>

<body>
<div id="neteasy-registration-page-wrapper">
	<h1>Reset Password Process </h1>
<div id="registration-account-recovery-form">
    	<form action="resetpassword" method="post" enctype="application/x-www-form-urlencoded">
        <h3>Reset your Password</h3>
        <div id="registration-account-user-id-label">User ID:</div>
        <div id="registration-account-userid-recovery-form-input">
        <input name="registration-user-id" type="text" value="<?php if($username) {echo $username;}else { }?>" />
        </div>
                
        
    	<div id="reset-password-label">New Password:</div>
        <div id="rest-password-form-input">
        <input name="reset-password" type="password" value="<?php if($_POST['reset-password'] ) {echo $_POST['reset-password'] ;}else { }?>" />
        </div>
		
		<div id="reset-password-label">Confirm Password:</div>
        <div id="rest-confirm-password-form-input">
        <input name="confirm-password" type="password" value="<?php if($_POST['confirm-password']) {echo $_POST['confirm-password'];}else { }?>" />
        </div>
		<p><input type="reset" value="Reset" name="reset" /> &nbsp; <input type = "submit" value="submit" name ="submit" /></p>
        
        </form>
        
</div>        
</div>


</body>
</html>
