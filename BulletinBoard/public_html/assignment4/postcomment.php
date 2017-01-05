<?
ob_start();

include("inc/global.php");

if(!isset($_SESSION['uid'])){
$page = "Post comment error";
include("inc/mainheader.inc.php");
?>
<table cellpadding="8" cellspacing="0" width="99%" align="center" class="postbox">
<tr>
<td width="100%" class="postcontent">
<b>You are not currently logged in, please login and try again.</b>
</td>
</tr></table>
<?
include("inc/footer.inc.php");
ob_end_flush();
exit();
}

$postcheckquery = $database->query("SELECT * FROM blog WHERE pid = '".$_POST['pid']."'");
$postcheck = $database->num_rows($postcheckquery);


$freeze = mysql_fetch_assoc($postcheckquery);
$freeze = $freeze['freeze'];


if($postcheck < 1)
{
$page = "Post comment error";
include("inc/mainheader.inc.php");

?>
<table cellpadding="8" cellspacing="0" width="99%" align="center" class="postbox">
<tr>
<td width="100%" class="postcontent">
<b>Error! Please go <a href="javascript:history.go(-1)">back</a> and try again...</b>
</td>
</tr></table>

<?



include("inc/footer.inc.php");
ob_end_flush();
exit();
}


if($freeze ==1)
{
?>
<table cellpadding="8" cellspacing="0" width="99%" align="center" class="postbox">
<tr>
<td width="100%" class="postcontent">
<b>This Blog is suspended. <a href="javascript:history.go(-1)">Back</a> </b>
</td>
</tr></table>

<?

include("inc/footer.inc.php");
ob_end_flush();
exit();
}


if($_POST['comment'] == "")
{
//$page = "Post comment error";
//include("inc/mainheader.inc.php");
?>
<table cellpadding="8" cellspacing="0" width="99%" align="center" class="postbox">
<tr>
<td width="100%" class="postcontent">
<b>You did not type anything in the comment box! Please go <a href="javascript:history.go(-1)">back</a> and try again...</b>
</td>
</tr></table>
<?
//include("inc/footer.inc.php");
ob_end_flush();
exit();
}
//Checks complete!!!
else
{

$comment = $_POST['comment'];
$comment = htmlentities($comment);


$database->query("INSERT INTO comments (cid,uid,comment,date_time,pid,child_flag,parent_id,edit_uid,edit_date) VALUES ('','".$_SESSION['uid']."','".$comment."',NOW(),'".$_POST['pid']."','','','','')");

$cmntid = $database->query("SELECT max(cid) as cid from comments");
$cmntid1 = mysql_fetch_assoc($cmntid);

$comment_id = $cmntid1['cid'];
echo "comment:" .$comment_id;
				$set_sql = $database->query("select * from d_settings");
					$set_b = mysql_fetch_array($set_sql);
					//$rows_per_page = $set_b[1];
/*					$no_pics = $set_b[2];
$imgTmpName = array();
for($i=0;$i<$no_pics;$i++)
{
$imgTmpName[] = $_FILES['$name']['name'];
echo "loop1 entrered";
}
echo "image:".$imgTmpName[1];
*/
$imgTmpName1 = $_FILES['postpic1']['name'];
$imgTmpName2 = $_FILES['postpic2']['name'];
$imgTmpName3 = $_FILES['postpic3']['name'];
$imgTmpName4 = $_FILES['postpic4']['name'];

//echo "filename" .$imgTmpName1;
//echo "filename" .$_FILES['postpic1']['name'];

//$imgDir = "/home/skulkarn/public_html/commentimgs/";
$imgName = array();
for($i=0;$i<$no_pics;$i++)
{
$imgName[$i] = $comment_id . $imgTmpName[$i];
echo "loop2 entrered";
}

	
	$imgName1 = $comment_id . $imgTmpName1;
	$imgName2 = $comment_id . $imgTmpName2;
	$imgName3 = $comment_id . $imgTmpName3;
	$imgName4 = $comment_id . $imgTmpName4;

	$tmpName1 = $_FILES['postpic1']['tmp_name'];
	$tmpName2 = $_FILES['postpic2']['tmp_name'];
	$tmpName3 = $_FILES['postpic3']['tmp_name'];
	$tmpName4 = $_FILES['postpic4']['tmp_name'];

/*

for($i=0;$i<$no_pic;$i++)
{
if($imgTmpName[$i] != "")
        {
                insertPic($imgName[$i], $tmpName[$i]);
			echo "selected\n";
			 $database->query("insert into commentpics (pid,cid,imgname) values ('".$_POST['pid']."','".$comment_id."','".$imgName[$i]."')");
				echo "inserted";

        }
}
*/
	if($imgTmpName1 != "")
        {
                insertPic($imgName1, $tmpName1);
			$database->query("insert into commentpics  (pid,cid,imgname) values('".$_POST['pid']."','".$comment_id."','".$imgName1."')");

        }


	if($imgTmpName2 != "")
        {
                insertPic($imgName2, $tmpName2);
			$database->query("insert into commentpics  (pid,cid,imgname) values('".$_POST['pid']."','".$comment_id."','".$imgName2."')");

        }

	if($imgTmpName3 != "")
        {
                insertPic($imgName3, $tmpName3);
			$database->query("insert into commentpics  (pid,cid,imgname) values ('".$_POST['pid']."','".$comment_id."','".$imgName3."')");

        }
if($imgTmpName4 != "")
        {
                insertPic($imgName4, $tmpName4);
			echo "selected\n";
			 $database->query("insert into commentpics (pid,cid,imgname) values ('".$_POST['pid']."','".$comment_id."','".$imgName4."')");
				echo "inserted";

        }

	//end file stuff...


}

//define a maxim size for the uploaded images in Kb
 define ("MAX_SIZE","32000"); 

//This function reads the extension of the file. It is used to determine if the file  is an image by checking the extension.
 function getExtension($str) {
         $i = strrpos($str,".");
         if (!$i) { return ""; }
         $l = strlen($str) - $i;
         $ext = substr($str,$i+1,$l);
         return $ext;
 }

function insertPic($imgName1, $tmpName1)
{

//This variable is used as a flag. The value is initialized with 0 (meaning no error  found)  
//and it will be changed to 1 if an errro occures.  
//If the error occures the file will not be uploaded.
 $errors=0;
 	//reads the name of the file the user submitted for uploading
 	$image= $imgName1;
 	//if it is not empty
 	if ($image) 
 	{
 	//get the original name of the file from the clients machine
 		$filename = stripslashes($image);
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
		 $size=filesize($tmpName1);

		//compare the size with the maxim size we defined and print error if bigger
		if ($size > MAX_SIZE*1024)
		{
			echo '<h1>You have exceeded the size limit!</h1>';
			$errors=1;
		}
		
		if($image!='')
                          { 
                          
                           $imgfile = $tmpName1;
                          // $src = imagecreatefromjpeg($imgfile);
                           list($width,$height)=getimagesize($imgfile);
                           $newwidth=100;
				//$newwidth = $wdth;

                            $newheight=($height/$width)* 100;
                            $dest = "commentimgs/";
				$filenames = "s" . $imgName1;
				$filenamet = "t" . $imgName1;
				
				$destp = $dest . $imgName1;
			      $dest1 = $dest . $filenames;
				//$dest2 = $dest . $filenamet;
				//echo "dest:" .$dest;
			    //$dest1 = $uname.".".$extension;
                         
				$filenamesrc = $dest1;
				$filenametemp = $dest2;
				$filename = $destp;
                         if(($extension=='jpg')||($extension=='jpeg'))
				{
				$src = ImageCreateFromJpeg($imgfile);
			       $tmp= ImageCreateTrueColor($newwidth,$newheight);	
				ImageCopyResized($tmp,$src,0,0,0,0, $newwidth,$newheight,$width,$height);
				imagejpeg($src,$filename);
                         	//imagejpeg($tmp,$filename);
				}
                         if($extension=='gif')
				{
				$src = ImageCreateFromJpeg($imgfile);
				$tmp= ImageCreateTrueColor($newwidth,$newheight);
				ImageCopyResized($tmp,$src,0,0,0,0, $newwidth,$newheight,$width,$height);
	                      imageGif($src,$filename);
   				// imageGif($tmp,$filename);
				}
                         if($extension=='png')
                         imagepng($tmp,$filename);
                         imagedestroy($src);
                         imagedestroy($tmp); 
				
                    }
				
		}
}
}


header("Location: showpost.php?id=".$_POST['pid']);
ob_end_flush();

?>
