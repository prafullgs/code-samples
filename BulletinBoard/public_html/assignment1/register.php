<?php
$page = "Register";
include("inc/mainheader.inc.php");
if(isset($_POST['username'])){
	if($_POST['email'] == "" || $_POST['password'] == "" || $_POST['username'] == ""){
		?>
		
<table cellpadding="8" cellspacing="0" width="99%" align="center" class="postbox">
<tr>
<td width="100%" class="postcontent">
<b>You did not enter one of the fields on the last page. Please go <a href="javascript:history.go(-1)">back</a> and try again.</b>
</td>
</tr>
</table>
		<?
	}
	
	if($_POST['password'] != $_POST['cpassword']){
	?>
<table cellpadding="8" cellspacing="0" width="99%" align="center" class="postbox">
<tr>
<td width="100%" class="postcontent">
<b>The password you entered on the previous page did not match, please go <a href="javascript:history.go(-1)">back</a> and try again.</b>
</td>
</tr>
</table>
	<?
	}
	
	
	$usernamecheckquery = $database->query("SELECT * FROM users WHERE username = '".$_POST['username']."'");
	$usernamecheck = $database->num_rows($usernamecheckquery);
	if($usernamecheck > 0){
	?>
<table cellpadding="8" cellspacing="0" width="99%" align="center" class="postbox">
<tr>
<td width="100%" class="postcontent">
<b>That username has already been taken, please go <a href="javascript:history.go(-1)">back</a> and try again.</b>
</td>
</tr>
</table>
	<?
	}
	
	//Checks complete!!!
	if( $_POST['email'] != "" || $_POST['password'] != "" || $_POST['username'] != ""){
	$sql = "INSERT INTO users (`uid`,`username`,`password`,`admin`,`mod`,`email`,`newsletter`) VALUES ('','".$_POST['username']."','".md5($_POST['password'])."',0,0,'".$_POST['email']."','".$_POST['newsletter']."')";
	$query = $database->query($sql);
?>
<table cellpadding="8" cellspacing="0" width="99%" align="center" class="postbox">
<tr>
<td width="100%" class="postcontent">
Thanks for signing up. You should now be able to sign in with the username and password you just entered.
</td></tr></table>
<?
	include("inc/footer.inc.php");
	exit();
}
}
?>
<table cellpadding="8" cellspacing="0" width="99%" align="center" class="postbox">
<tr>
<td width="100%" class="postcontent">
By registering you will have the ability to make comments on posts.<BR>
If you wish to register please fill out the form below:<BR><BR>
<form action="register.php" method="post">
Username : <input type="text" name="username"><BR>
Password : <input type="password" name="password"><BR>
Confirm Password : <input type="password" name="cpassword"><BR>
Email address : <input type="text" name="email"><BR>
<BR><BR>
<input type="submit" value="Register!">
</form>
</td>
</tr>
</table>
<?
include("inc/footer.inc.php");
?>
