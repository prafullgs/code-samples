<?php
include("../inc/mainheader.inc.php");

// ---------- img upload
       //header('Location:http://mln-web.cs.odu.edu/~skulkarn/assignment3/users/index.php');
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
	echo $image;
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


mysql_query("UPDATE users SET imgsrc = '".$dest."' WHERE uid = '".$_SESSION['uid']."'");

//-----------

?>
