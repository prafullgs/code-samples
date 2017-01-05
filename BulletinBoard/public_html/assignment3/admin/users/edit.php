<?php

if(isset($_REQUEST['uid'])){
$path = "../../";
$admincheck = 1;
$page = "Edit a User";
include("../../inc/adminheader.inc.php");
$query2 = $database->query("SELECT * FROM users WHERE uid = '".$_REQUEST['uid']."'");
$user2 = $database->fetch_array($query2);
?>
<form action="edit.php" method="post">
<table>
<tr><td>Username</td><td><input type="text" name="username" value="<? echo $user2['username']; ?>"></td></tr>
<tr><td>Email Address</td><td><input type="text" name="email" value="<? echo $user2['email']; ?>"></td></tr>
<tr><td>New Password</td><td><input type="text" name="newpass"></td></tr>


<tr>
<td>
Suspend
</td>
<td>
<?
if($user2['freeze'] == 1){
?>
<input type="checkbox" name="freeze" value="1" checked>
<?
} else {
?>
<input type="checkbox" name="freeze" value="1">
<?
}
?>
</td>
</tr>


<tr>
<td>
Admin
</td>
<td>
<?
if($user2['admin'] == 1){
?>
<input type="checkbox" name="admin" value="1" checked>
<?
} else {
?>
<input type="checkbox" name="admin" value="1">
<?
}
?>
</td>
</tr>
<tr>
<td>
Mod
</td>
<td>
<?
if($user2['mod'] == 1){
?>
<input type="checkbox" name="mod" value="1" checked>
<?
} else {
?>
<input type="checkbox" name="mod" value="1">
<?
}
?>
</td>
</tr>
<tr>
<td colspan="2">
<input type="hidden" name='id' value="<? echo $_REQUEST['uid']; ?>">
<input type="hidden" name='action' value="edit">
<input type="submit" value="Save!">
</td>
</tr>
</table>
</form>
<?
include("../../inc/footer.inc.php");
} elseif(isset($_POST['id']) && $_POST['action'] == "edit"){
$path = "../../";
$admincheck = 1;
include("../../inc/global.php");
include("../../inc/checks.php");

//***************************************************

function send_email($email,$type,$decision)
	{
			

			$sendto = $email; // this is the email address collected form the form
			$ccto = "sagar.sk1@gmail.com"; // cc it to yourself
			
			$subject = "MoviesBB - User Account Suspension"; // Subject
			$messagebody = "This Email indicates that your account will be....\r\n".$decision;

			/*$header = "From: auto-confirm@MBB.com\r\n";
			$header .= "Reply-to: pshirodk@cs.odu.edu\r\n";
			$header .= "MIME-Version: 1.0\r\n";
			$header .= "Content-type: text/html; charset=iso-8859-1";*/

			if($type == 'multipart/alternative')
			{
				$header = "MIME-Version: 1.0\r\n";
				$header .= "Content-type: multipart/alternative; boundary=\"$boundary\"\r\n";
				$header .= "CC: " . $cc . "\r\n";
				$header .= "BCC: " . $bcc . "\r\n";		
				$message = "This is a Multipart Message in MIME format\n";
				$message .= "--$boundary\n";
				$message .= "Content-type: text/html; charset=iso-8859-1\n";
				$message .= "Content-Transfer-Encoding: 7bit\n\n";
				$message .= $messagebody . "\n";
				$message .= "--$boundary\n";
				$message .= "Content-Type: text/plain; charset=\"iso-8859-1\"\n";
				$message .= "Content-Transfer-Encoding: 7bit\n\n";
				$message .= $messagebody . "\n";
				$message .= "--$boundary--";


			}
			else
			{
				$header = "Content-type: $type;\r\n";
				$header .= "CC: " . $cc . "\r\n";
				$header .= "BCC: " . $bcc . "\r\n";
				$message = "This Email indicates that your account will be ....\r\n".$decision;

			}


			// This is the function to send the email
			$mailsent = mail($sendto, $subject, $message, $header);  
			
			if ($mailsent) 
			{
	  			//echo "Your Password has been Email Address.  <br><br>";
				echo "<b>The E-mail has been successfully sent to :". $email."<br><br></b>";
			}
			else 
			{
 	 			echo "There was an error...";
			}
	

	}

$usernamecheckquery = $database->query("SELECT * FROM users WHERE username = '".$_POST['username']."'");
	$usernamecheck = $database->num_rows($usernamecheckquery);
	$get_email = mysql_fetch_array($usernamecheckquery);
	$email = $get_email['email'];
	$type = $get_email['email_type'];
	$sus = $get_email['freeze'];

//echo $type;
//echo $email;




//echo $_POST['freeze'];
if($_POST['freeze']==1 && $sus == 0)
{
	echo "<b>The user will be suspended...</b> ";
	send_email($email,$type,"Suspended");
}
else if($_POST['freeze']=="" && $sus == 1)
{
	echo "<b>User will be Un-suspended...</b> ";
	send_email($email,$type,"Un-suspended");
}
//echo"************************************************";
$mod = $_POST['mod'];
if($_POST['admin'] == 1)
{
	$mod = 1;
}

if($_POST['newpass'] == ""){
$sql = "UPDATE `users` SET `username` = '".$_POST['username']."', `email` = '".$_POST['email']."', `admin` = '".$_POST['admin']."',  `freeze` = '".$_POST['freeze']."'  ,`mod` = '".$mod."' WHERE `uid` = '".$_POST['id']."'";
} else {
$sql = "UPDATE `users` SET `password` = '".$_POST['newpass']."', `username` = '".$_POST['username']."', `email` = '".$_POST['email']."', `admin` = '".$_POST['admin']."',   `freeze` = '".$_POST['freeze']."'    , `mod` = '".$mod."' WHERE `uid` = '".$_POST['id']."'";
}
$database->query($sql);
echo"<BR><BR>";
echo "<a href = 'index.php' > SHOW USERS </a>";
//redirect("index.php");
//header("Location: index.php");
}
?>