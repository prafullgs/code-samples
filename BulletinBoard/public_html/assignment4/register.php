<?php
$page = "Register";
include("inc/mainheader.inc.php");
if(isset($_POST['username'])){
	if($_POST['email'] == "" || $_POST['username'] == ""){
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
	
	//-----------------
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
		{ // Check if domain is IP. If not, it should be valid domain name
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

	$email_type = trim($_POST['emailtype']);					
	$pass_key = rand();	
	$cc = "pshirodk@cs.odu.edu";
	$bcc = "skulkarn@cs.odu.edu";
       $uname = trim($_POST['username']);
	
	// ---------------------------------	
//define a maxim size for the uploaded images in Kb
 define ("MAX_SIZE","1000"); 

//This function reads the extension of the file. It is used to determine if the file  is an image by checking the extension.
 function getExtension($str) {
         $i = strrpos($str,".");
         if (!$i) { return ""; }
         $l = strlen($str) - $i;
         $ext = substr($str,$i+1,$l);
         return $ext;
 }

//This variable is used as a flag. The value is initialized with 0 (meaning no error  found)  
//and it will be changed to 1 if an errro occures.  
//If the error occures the file will not be uploaded.
 $errors=0;
 	//reads the name of the file the user submitted for uploading
 	$image=$_FILES['imgfile']['name'];
 	//if it is not empty
 	if ($image) 
 	{
 	//get the original name of the file from the clients machine
 		$filename = stripslashes($_FILES['imgfile']['name']);
 	//get the extension of the file in a lower case format
  		$extension = getExtension($filename);
 		$extension = strtolower($extension);
 	//if it is not a known extension, we will suppose it is an error and will not  upload the file,  
	//otherwise we will do more tests
 	if (($extension != "jpg") && ($extension != "jpeg") && ($extension != "png") && ($extension != "gif")) 
 		{
		//print error message
 			echo '<h1>Unknown extension!</h1>';
 			$errors=1;
 		}
 		else
 		{
		//get the size of the image in bytes
 		//$_FILES['image']['tmp_name'] is the temporary filename of the file
 		//in which the uploaded file was stored on the server
		 $size=filesize($_FILES['imgfile']['tmp_name']);

		//compare the size with the maxim size we defined and print error if bigger
		if ($size > MAX_SIZE*1024)
		{
			echo '<h1>You have exceeded the size limit!</h1>';
			$errors=1;
		}
		
		if($_FILES['imgfile']['name']!='')
                          { 
                          
                           $wdth=70;
                           $ht=70;
                           $imgfile = $_FILES['imgfile']['tmp_name'];
                           $src = imagecreatefromjpeg($imgfile);
                           list($width,$height)=getimagesize($imgfile);
                           $newwidth=300;
                           $newheight=($height/$width)*300;
                           $xratio =$wdth/$width;
                           $yratio = $ht/$height;
                          if( ($width <= $wdth) && ($height <= $ht) )
                          {
                               $tn_width = $width;
                               $tn_height = $height;
                          }
                         elseif (($xratio * $height) < $ht)
                         {
                               $tn_height = ceil($xratio * $height);
                               $tn_width = $wdth;
                         }
                         else
                         {
                               $tn_width = ceil($yratio * $width);
                               $tn_height = $ht;
                         }

                         $tmp=imagecreatetruecolor($tn_width,$tn_height);
                         imagecopyresampled($tmp,$src,0,0,0,0, $tn_width,$tn_height,$width,$height);
                         $dest = "images/";
			    $dest = $dest .$uname.".".$extension;
			    //$dest1 = $uname.".".$extension;
                         $filename = $dest ;
                         if(($extension=='jpg')||($extension=='jpeg'))
                         imagejpeg($tmp,$filename,100);
                         if($extension=='gif')
                         imagegif($tmp,$filename,100);
                         if($extension=='png')
                         imagepng($tmp,$filename,100);
                         imagedestroy($src);
                         imagedestroy($tmp); 
				
                    }
				
		}
}



	
	//-----------------
	
	
	if($email_type=='')
	{
		echo "<b>You have not selected E-mail type Please go <a href='javascript:history.go(-1)'>back</a> and select email type</b>";
		include("inc/footer.inc.php");
		exit();
		
	}
	
		

	require_once('recaptchalib.php');
	$privatekey = "6LdU6QMAAAAAAMtHiIi8U8XDnlTRp30yQQvXeCfB";

	# the response from reCAPTCHA
	$resp = null;
	# the error code from reCAPTCHA, if any
	$error = null;

	# was there a reCAPTCHA response?
	if ($_POST["recaptcha_response_field"]) {
       $resp = recaptcha_check_answer ($privatekey,
                                        $_SERVER["REMOTE_ADDR"],
                                        $_POST["recaptcha_challenge_field"],
                                        $_POST["recaptcha_response_field"]);
							}

       
	if(check_email_address($_POST['email']))
	{
	if ($resp->is_valid) {
	$sendto = $_POST['email']; // this is the email address collected form the form
	$subject = "Email confirmation"; // Subject
	$messagebody = "This email is to confirm your registration. Your username.\r\n".$uname."and password is".$pass_key;
	//$header = "From: auto-confirm@MBB.com\r\n";
	if($email_type == 'multipart/alternative')
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
		$header = "Content-type: $email_type;\r\n";
		$header .= "CC: " . $cc . "\r\n";
		$header .= "BCC: " . $bcc . "\r\n";
		$message = "This email is to confirm your registration. Your username.\r\n".$uname."and password is".$pass_key;

	}
	// This is the function to send the email
	$mailsent = mail($sendto, $subject, $message, $header);  	
	 	if ($mailsent) 
		{
	 	 echo "Congrats! The following message has been sent: <br><br>";
	 	 echo "<b>To:</b> $sendto<br>";
	 	 echo "<b>From:</b> auto-confirm@MBB.com<br>";
		  echo "<b>Subject:</b> $subject<br>";
		 # echo "<b>Message:</b><br>";
		 # echo $message;
		} else 
			{
 			 echo "There was an error...";
			}

		$sql = "INSERT INTO users (`uid`,`username`,`password`,`admin`,`mod`,`email`,`newsletter`,`date_join`,`freeze`,`email_type`,`imgsrc`) VALUES ('','".$_POST['username']."','".$pass_key."',0,0,'".$_POST['email']."','".$_POST['newsletter']."','".date("Y-m-d")."',0,'".$_POST['emailtype']."','".$dest."')";
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
else {
                # set the error code so that we can display it
                $error = $resp->error;
     }

}else
    	{
		echo $_POST['email'] . ' :The email entered is not a valid email address. ' ;
	}
}
?>
<table cellpadding="8" cellspacing="0" width="99%" align="center" class="postbox">
<tr>
<td width="100%" class="postcontent">
By registering you will have the ability to make comments on posts.<BR>
If you wish to register please fill out the form below:<BR><BR>
<form action="register.php" method="post" enctype="multipart/form-data">
Enter Username : <input type="text" name="username"><BR><BR>
<!-- Password : <input type="password" name="password"><BR>
Confirm Password : <input type="password" name="cpassword"><BR> -->
E-mail  address : <input type="text" name="email"><BR><br>
Select E-mail type : </br>
<input type="radio" name="emailtype" value="text/plain">text/plain <br />
<input type="radio" name="emailtype" value="text/html">text/html <br />
<input type="radio" name="emailtype" value="multipart/alternative">Multipart <br /><br />
Upload Avatars: <br />
<input name="imgfile" type="file" /> <br />(Allowed image types : PNG,JPG/JPEG and GIF)<br />
<?php
require_once('recaptchalib.php');

// Get a key from http://recaptcha.net/api/getkey
$publickey = "6LdU6QMAAAAAAIn4bcvRRM-5TEJtOrDc3uKp4wvO";
echo recaptcha_get_html($publickey, $error);
?>

    <br/>
   <center> <input type="submit" value="submit" /></center>
    </form>
 
<!-- <input type="submit" value="Register!">
</form> -->
</td>
</tr>
</table>
<?
include("inc/footer.inc.php");
?>
