<?php ob_start(); ?>
<?php
include("../settings/config.php");
session_start();
if(isset($_POST['Submit']))
{
	$login = $_POST['userlogin-field'];
	$pass = $_POST['user-login-password'];
	$userid = mysql_query("SELECT id, site_id, username, first_name, last_name, status FROM user WHERE username = '$login' AND user_password = '$pass'");	
	//echo "SELECT id, username, status FROM user WHERE username = '$login' AND user_password = '$pass'";
	$id = mysql_fetch_assoc($userid);
	if($id)
	{
		
			$_SESSION['id'] = $id['id'];
			$_SESSION['username'] = $id['username'];
			$_SESSION['status'] = $id['status'];
			$site_id = $id['site_id'];
			
			
			
			if($id['status'] == 0) // user login
			{
				$_SESSION['id'] = $id['id'];
				$_SESSION['username'] = $id['username'];
				echo "user login";
				header('Location: eventreg');
				
			}
			else if($id['status'] == 1) // moderator login
			{
				echo "mod login";
				$_SESSION['fname'] = $id['first_name'];
				$_SESSION['lname'] = $id['last_name'];
				$_SESSION['id'] = $id['id'];
				$_SESSION['mod'] = $_SESSION['status'] ;
				$_SESSION['site_id'] = $site_id;
			header('Location: admin/main');
			}
			else // admin login
			{
				echo "admin login";
				$_SESSION['fname'] = $id['first_name'];
				$_SESSION['lname'] = $id['last_name'];
				$_SESSION['id'] = $id['id'];
				$_SESSION['site_id'] = $site_id;
				$_SESSION['admin'] = $_SESSION['status'];
				
				header('Location: admin/main');
			}
			
	}
		echo "Login incorrect";
}
?>
<? ob_flush(); ?> 

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	
	<title>Login Page</title>
	<link rel="stylesheet" type="text/css" href="styles/base.css" />
    
<style type="text/css">
<!--
body {
	background-image: url(img/login-page-bg.jpg);
	background-repeat: no-repeat;
	background-position: center top;
	background-color:#c4c4c4;
}
-->
</style>
</head>

<body>


<div id="user-interface-login">

<form id="user-interface-login-form" action="userlogin" method="post">

        <table border="0" cellspacing="0" cellpadding="5">
          <tr>
            <th colspan="3"><legend>Event Registration Login</legend></th>
          </tr>
          <tr>
            <td align="right" valign="top">User ID:</td>
            <td>&nbsp;</td>
            <td align="left" valign="top"><input name="userlogin-field" type="text" id="userlogin-field" size="20"/></td>
          </tr>
          <tr>
            <td align="right" valign="top">Password:</td>
            <td>&nbsp;</td>
            <td align="left" valign="top"><input name="user-login-password" type="password" id="user-login-password" size="20"/></td>
          </tr>
          <tr>
            <td align="right" valign="top"><label>
              <input type="reset" name="Reset" id="userLoginResetButton" value="Reset" />
            </label></td>
            <td>&nbsp;</td>
            <td align="left" valign="top"><label>
              <input type="submit" name="Submit" id="userLoginSubmitButton" value="Submit" />
            </label></td>
          </tr>
          <tr>
            <td align="right" valign="top"><a href = "index" title="create an account">Register a New User</a></td>
            <td>&nbsp;</td>
            <td align="left" valign="top"><a href="recover_login" title="to recover your password or user id">Forget your password or User ID?</a></td>
          </tr>
        </table>
	</form>
</div>


</body>

</html>
<?php

?>
