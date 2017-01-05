<?
ob_start();
$page = "Login";
include("inc/mainheader.inc.php");
if(isset($_POST['username'])){
$query = $database->query("SELECT * FROM users WHERE username = '".$_POST['username']."' AND `password` = '".$_POST['password']."' LIMIT 1");
$user_check = $database->num_rows($query);

////

$userFreeze = mysql_query("select freeze as user_Freeze from users  where username = '".$_POST['username']."' ");
$userFreeze = mysql_fetch_array($userFreeze);
$freezeCheck = $userFreeze['user_Freeze'];


if ($user_check != 1 )
	$message = "Invalid Username Or Password:";
else if($freezeCheck==1)
	$message = "User Account Suspended";

if($user_check != 1  || $freezeCheck==1)
{
if($user_check != 1 )
{
	echo("<SCRIPT LANGUAGE='JavaScript'>
	window.alert('Invalid Username Or Password')
	</SCRIPT>"); 
}
else if($freezeCheck==1)
{
	echo("<SCRIPT LANGUAGE='JavaScript'>
	window.alert('User Account Suspended')
	</SCRIPT>"); 
}

?>
<table cellpadding="8" cellspacing="0" width="99%" align="center" class="postbox">
<tr>
<td width="100%" class="postcontent">

<?

echo "<b>$message</b><BR><BR>
	 

<div align=\"center\">
<form action=\"login.php\" method=\"POST\">
<table>
<tr><td>
<input type=\"text\" name=\"username\">
</td>
<td><input type=\"password\" name=\"password\"></td>
</tr>
<tr><td>Username</td><td>Password</td></tr>
</table>
<input type=\"submit\" value=\"Login\">
<A href=\"forgotpassword.php\">Forgot Password</A>
</form>
</div>";
	

?>
</td>
</tr>
</table>


<?
include("inc/footer.inc.php");
ob_end_flush();
exit();

}






$user = mysql_fetch_array($query);
session_register('uid'); 
        $_SESSION['uid'] = $user['uid'];
session_register('username'); 
        $_SESSION['username'] = $user['username'];
session_register('password');
	$_SESSION['password'] = $user['password'];
session_register('admin'); 
        $_SESSION['admin'] = $user['admin'];
session_register('mod'); 
        $_SESSION['mod'] = $user['mod'];
// remember the user for 10 days
							if(isset($_POST['remember']))
                                                       {
                                                         setcookie("cookname", $_SESSION['username'], time()+60*60*24*10, "/");
                                                         setcookie("cookpass", $_SESSION['password'], time()+60*60*24*10, "/");
                                                       }  

		if($_POST['adminpanel'] == 1){
		header("Location: admin/index.php");
		} elseif($_POST['postpanel'] == 1){
		header("Location: posting/index.php");
		} else {
header("Location: index.php");
}
						
ob_end_flush();
include("inc/footer.inc.php");
exit();
}
?>
<table cellpadding="8" cellspacing="0" width="99%" align="center" class="postbox">
<tr>
<td width="100%" class="postcontent">
<div align="center">
<form action="login.php" method="post" >
<table>
<tr>
<td><font size = "4"> Username</font></td>
<td><font size = "4">Password</font></td>
</tr>
<tr>
<td>
<input type="text" name="username">
</td>
<td>
<input type="password" name="password">
</td>
</tr>
<tr>
<td>
<input type="checkbox" name="remember" value="remember"> Remember me<br>
</td>
<td>
<A href="forgotpassword.php">Forgot Password?</A>
</td>
</tr>
<tr>
<td colspan="2">
<div align="center">
<input type="submit" value="Login!">
</div>
</td>
</tr>
</table>
</form>
</div>
</td>
</tr>
</table>
<?
include("inc/footer.inc.php");
ob_end_flush();
?>