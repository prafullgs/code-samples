<?php
ob_start();

$showside = "0";
$page = "Update User Account";
$path = "../";
include("../inc/mainheader.inc.php");
//Login check
include("../inc/logincheck.inc.php");
if(!isset($_POST['update'])){
  echo "<b>You followed an invalid link. Please go <a href=\"javascript:history.go(-1)\">back</a> and try again</b>";
  include("../inc/footer.inc.php");
  ob_end_flush();
  exit();
}

if($_POST['update'] == "password"){
  //Check
  if($_POST['new_password'] == ""){
    echo "<b>You did not type in a new password. Please go <a href=\"javascript:history.go(-1)\">back</a> and try again</b>";
    include("../inc/footer.inc.php");
  ob_end_flush();
    exit();
    }
  
  if($_POST['new_password'] != $_POST['cnew_password']){
    echo "<b>The password you entered on the last page do not match. Please go <a href=\"javascript:history.go(-1)\">back</a> and try again</b>";
    include("../inc/footer.inc.php");
  ob_end_flush();
  exit();
  }

$database->query("UPDATE users SET password = '".$_POST['new_password']."' WHERE uid = '".$_SESSION['uid']."'");
header("Location: index.php?action=updated");
  ob_end_flush();
  exit();
}



//-----------------

if($_POST['update'] == "settings"){

$usernamecheckquery = $database->query("SELECT * FROM users WHERE uid = '".$_SESSION['uid']."'");
$query = mysql_fetch_array($usernamecheckquery);

$uname = $query['username'];
echo "username:".$uname;

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

     	$image= $_FILES['imgfile']['name'];
	echo "image". $image;
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
			   $dest1 ="images/" .$uname.".".$extension;
				echo "dest1:".$dest1;
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




// ----------------
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


//-------------

  //Check
  if($_POST['email'] == "" || !check_email_address($_POST['email'])){
    echo "<b>You did not type in your email address correctly. Please go <a href=\"javascript:history.go(-1)\">back</a> and try again</b>";
    include("../inc/footer.inc.php");
  ob_end_flush();
    exit();
    }
if($_POST['emailtype'] == ""){
    echo "<b>You did specify e-mail type Please go <a href=\"javascript:history.go(-1)\">back</a> and try again</b>";
    include("../inc/footer.inc.php");
  ob_end_flush();
    exit();
    }

//echo "dest1:".$dest1;
$database->query("UPDATE users SET email = '".$_POST['email']."', email_type = '".$_POST['emailtype']."' WHERE uid = '".$_SESSION['uid']."'");
header("Location: index.php?action=updated");
  ob_end_flush();
  exit();
  }



include("../inc/footer.inc.php");
?>