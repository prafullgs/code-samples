<?php
$page = "ForgotPassword";
include("inc/mainheader.inc.php");
if(isset($_POST['username']))
{

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



	function send_email($email,$type,$pwd)
	{
		if(check_email_address($email))
		{

			

			$sendto = $email; // this is the email address collected form the form
			$ccto = "sagar.sk1@gmail.com"; // cc it to yourself
			
			$subject = "MoviesBB - Password Notification"; // Subject
			$messagebody = "This email contains your password. This is your password....\r\n".$pwd;

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
				$message = "This email contains your password. This is your password....\r\n".$pwd;

			}


			// This is the function to send the email
			$mailsent = mail($sendto, $subject, $message, $header);  
			
			if ($mailsent) 
			{
	  			//echo "Your Password has been Email Address.  <br><br>";
				echo "<b>Your Password has been sent to :". $email."<br><br></b>";
			}
			else 
			{
 	 			echo "There was an error...";
			}
		}

	}



	if($_POST['username'] == "")
	{
?>
		
		<table cellpadding="8" cellspacing="0" width="99%" align="center" class="postbox">
		<tr>
		<td width="100%" class="postcontent">
		<!-- <b>You did not enter on the fields on the last page. Please go <a href="javascript:history.go(-1)">back</a> and try again.</b> -->
		<b>You did not enter one of the fields on the last page. Please try again.</b>

		</td>
		</tr>
		</table>

<?php
	}
	
	
	$usernamecheckquery = $database->query("SELECT * FROM users WHERE username = '".$_POST['username']."'");
	$usernamecheck = $database->num_rows($usernamecheckquery);
	$get_email = mysql_fetch_array($usernamecheckquery);
	$email = $get_email['email'];
	
	$type = $get_email['email_type'];
	$pwd = $get_email['password'];
	
	if($usernamecheck > 0)
	{
		send_email($email,$type,$pwd);
	}
	else
	{
?>
		<table cellpadding="8" cellspacing="0" width="99%" align="center" class="postbox">
		<tr>
		<td width="100%" class="postcontent">
		<b>That username you entered does not match the registered username, please try again.</b>
		</td>
		</tr>
		</table>
<?php
	}

       
}
	?>
	



<table cellpadding="8" cellspacing="0" width="99%" align="center" class="postbox">
<tr>
<td width="100%" class="postcontent">
Please enter your Username.<BR>
An email will be sent to your address<BR><BR>
<form action="forgotpassword.php" method="post">
Username : <input type="text" name="username"><BR>

<BR><BR>
    <br/>
    <input type="submit" value="submit" />
    </form>
 
<!-- <input type="submit" value="Register!">
</form> -->
</td>
</tr>
</table>

<?
include("inc/footer.inc.php");
?>
