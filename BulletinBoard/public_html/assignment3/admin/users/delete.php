<?php
ob_start();

if(isset($_REQUEST['uid'])){
$path = "../../";
$admincheck = 1;
$page = "Delete a User";
include("../../inc/adminheader.inc.php");
if($_REQUEST['uid'] == $_SESSION['uid']){
echo "<b><font color=\"red\">You cannot delete your own user account. To delete this user account you must log in with another admin account.</font></b>";
} else {
?>
Are you sure you wish to delete this user???<BR><BR>
When you delete the use you are also deleting all the posts made in the blog by them and also all comments written by them
<a href="delete.php?action=delete&id=<? echo $_REQUEST['uid']; ?>"><b>Yes</b></a>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<a href="index.php">No</a>
<?
}
include("../../inc/footer.inc.php");
} elseif(isset($_REQUEST['id']) && $_REQUEST['action'] == "delete"){
$path = "../../";
$admincheck = 1;
include("../../inc/global.php");
include("../../inc/checks.php");


function check_email_address($email)
	{

   		 // First, we check that there's one @ symbol, and that the lengths are right
  		 if (!ereg("^[^@]{1,64}@[^@]{1,255}$", $email)) 
		 {
  		 	// Email invalid because wrong number of characters in one section, or wrong number of @ symbols.
  		 	 return false;
 		 }

  		 // Split it into sections to make life easier
  		 $email_array = explode("@", $email);
 		 $local_array = explode(".", $email_array[0]);

 		 for ($i = 0; $i < sizeof($local_array); $i++)
		 {
  		 	if (!ereg("^(([A-Za-z0-9!#$%&'*+/=?^_`{|}~-][A-Za-z0-9!#$%&'*+/=?^_`{|}~\.-]{0,63})|(\"[^(\\|\")]{0,62}\"))$", $local_array[$i]))
			 {
 		  		return false;
  			 }
		 }

		 if (!ereg("^\[?[0-9\.]+\]?$", $email_array[1])) 
		 { 
			// Check if domain is IP. If not, it should be valid domain name
 		  	$domain_array = explode(".", $email_array[1]);
 		  	if (sizeof($domain_array) < 2) 
			{
 		  		return false; // Not enough parts to domain
			}

 			for ($i = 0; $i < sizeof($domain_array); $i++) 
		 	{
		 		if (!ereg("^(([A-Za-z0-9][A-Za-z0-9-]{0,61}[A-Za-z0-9])|([A-Za-z0-9]+))$", $domain_array[$i]))
		 		{
  					return false;
 				}
		 	}
		 }
		 return true;
	}



	function send_email($email,$type)
	{
		if(check_email_address($email))
		{

			

			$sendto = $email; // this is the email address collected form the form
			$ccto = "sagar.sk1@gmail.com"; // cc it to yourself
			
			$subject = "MoviesBB - Account Deletion"; // Subject
			$messagebody = "This email is sent to indicate that your account has been deleted....\r\n";

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
				$message = "This email is sent to indicate that your account has been deleted....\r\n";

			}


			// This is the function to send the email
			$mailsent = mail($sendto, $subject, $message, $header);  
			
			if ($mailsent) 
			{
	  			//echo "Your Password has been Email Address.  <br><br>";
				echo "<b>A Email indicating the account deletion has been sent to :". $email."<br><br></b>";
			}
			else 
			{
 	 			echo "There was an error...";
			}
		}

	}



$namecheckquery = $database->query("SELECT * FROM users WHERE uid = '".$_SESSION['uid']."'");
$namecheck = $database->num_rows($namecheckquery);
$get_role = mysql_fetch_array($namecheckquery);

$mod_role = $get_role['mod'];
$admin_role = $get_role['admin'];



$usernamecheckquery = $database->query("SELECT * FROM users WHERE uid = '".$_REQUEST['id']."'");
$usernamecheck = $database->num_rows($usernamecheckquery);
$get_email = mysql_fetch_array($usernamecheckquery);

$email = $get_email['email'];	
$type = $get_email['email_type'];


if($admin_role == 1)
{
	send_email($email,$type);
	$database->query("DELETE FROM users WHERE uid = '".$_REQUEST['id']."'");
	$database->query("DELETE FROM blog WHERE uid = '".$_REQUEST['id']."'");
	$database->query("DELETE FROM comments WHERE uid = '".$_REQUEST['id']."'");
	
header("Location: index.php");


}
else
{
	echo "<b>Only admins can delete users</b>";
	echo("<SCRIPT LANGUAGE='JavaScript'>
	window.alert('Only admins can delete users')
	</SCRIPT>"); 
	echo"<BR><BR>";
	echo "<a href = 'index.php' > SHOW USERS </a>";

}
}
ob_end_flush();


?>