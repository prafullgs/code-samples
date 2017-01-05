<?php

ob_start();
$page = "Search";
include("inc/mainheader.inc.php");

if(isset($_POST['search']))
{ 
$keyword=$_POST['wordsearch'];
if($keyword == NULL)
 { 
		$seluser=$_POST['userdroplist'];

		if($seluser=="Select")
		    { 
		      echo "Enter tags to search";
		    }
		else
		    {
		      	$selpost=$_POST['userkeydroplist'];
			$q1 = $database->query("select * from users where username='$seluser'");
			$q2 = mysql_fetch_array($q1);
			$uid = $q2[uid];
			if($selpost == "All Posts")
			{
				$userposts = $database->query("select * from comments where uid = '$uid'");
				echo "Resulting comments posted by : <b>$seluser</b> in the selected post : <b>$selpost</b>";
				// ---------------------
				
				 while($comment = mysql_fetch_assoc($userposts))
				{
					$cmnt = strip_tags($comment['comment']);
					$cmnt = nl2br($cmnt);
					echo "<br/><table cellpadding=\"8\" cellspacing=\"0\" width=\"75%\" align=\"justify\" class=\"postbox\"><tr><td width=\"100%\" class=\"postcontent\">".$cmnt."<BR><div class=\"postinfo\">";
					$commentauthorquery = $database->query("SELECT * FROM users WHERE uid = '".$comment['uid']."'");
					$commentauthor = $database->fetch_array($commentauthorquery);
					$image = $commentauthor['imgsrc']; 
					$user = $commentauthor['uid']; 
				
					if($image=='')
					{
					echo  " <img src= 'images/default.jpg' align = 'right'>" ;
					}
					else
					{
					echo  " <img src= '$image' align = 'right'>" ;
					}

					echo "Comment Written by ".$commentauthor['username']."<BR>";
					$result=$database->query ("SELECT UNIX_TIMESTAMP(date_time) as epoch_time FROM comments WHERE cid = '".$comment['cid']."'");
					$datedate = $database->fetch_array($result);
					$comment['date_time'] = $datedate[0];
					$comment['date_time'] = strtotime($settings['timeoffset']." hours",$comment['date_time']);
					$comment['date_time'] = date($settings['dateformat']." ".$settings['timeformat'],$comment['date_time']);
					echo $comment['date_time'];
					//echo "<BR><a href=\"postreply.php?id=".$post['pid']."&cid=".$comment['cid']."\">";
					//echo "Post Reply </a>";
					echo "<b> Go <a href=\"javascript:history.go(-1)\">back</a></b>";
					echo "</div></td></tr></table></td></tr>";
				}
			}
			else 
				{  
				$getpost = $database->query("select * from blog where title = '$selpost'");
				$getpost1 = mysql_fetch_assoc($getpost);
				$pid = $getpost1[pid];
				$userposts = $database->query("select * from comments where uid = '$uid' and pid = '$pid'");
				echo "Resulting comments posted by : <b>$seluser</b> in the selected post : <b>$selpost</b>";
				while($comment = mysql_fetch_assoc($userposts))
					{
					$cmnt = strip_tags($comment['comment']);
					$cmnt = nl2br($cmnt);
					echo "<br/><table cellpadding=\"8\" cellspacing=\"0\" width=\"75%\" align=\"justify\" class=\"postbox\"><tr><td width=\"100%\" class=\"postcontent\">".$cmnt."<BR><div class=\"postinfo\">";
					$commentauthorquery = $database->query("SELECT * FROM users WHERE uid = '".$comment['uid']."'");
					$commentauthor = $database->fetch_array($commentauthorquery);
					$image = $commentauthor['imgsrc']; 
					$user = $commentauthor['uid']; 
				
						if($image=='')
						{
						echo  " <img src= 'images/default.jpg' align = 'right'>" ;
						}
						else
						{
							echo  " <img src= '$image' align = 'right'>" ;
						}

					echo "Comment Written by ".$commentauthor['username']."<BR>";
					$result=$database->query ("SELECT UNIX_TIMESTAMP(date_time) as epoch_time FROM comments WHERE cid = '".$comment['cid']."'");
					$datedate = $database->fetch_array($result);
					$comment['date_time'] = $datedate[0];
					$comment['date_time'] = strtotime($settings['timeoffset']." hours",$comment['date_time']);
					$comment['date_time'] = date($settings['dateformat']." ".$settings['timeformat'],$comment['date_time']);
					echo $comment['date_time'];
					//echo "<BR><a href=\"postreply.php?id=".$post['pid']."&cid=".$comment['cid']."\">";
					//echo "Post Reply </a>";
					echo "<b> Go <a href=\"javascript:history.go(-1)\">back</a></b>";
					echo "</div></td></tr></table></td></tr>";
					}


				}

		    }
		}
		else
		{
		$selpost = $_POST[userkeydroplist];
		if($selpost == "All Posts")
		{
		//$usermsgs=$database->query("select * from comments where  comment like '%$keyword%'");
		$usermsgs=$database->query("select * from comments where match(comment) AGAINST('+$keyword*' IN BOOLEAN MODE)");
		echo "Matched Comments  to  <b>'$keyword'</b> in <b>$selpost</b>";
		while($comment = mysql_fetch_array($usermsgs))
				{
					$cmnt = strip_tags($comment['comment']);
					$cmnt = nl2br($cmnt);
					echo "<br/><table  cellpadding=\"8\" cellspacing=\"0\" width=\"75%\" align=\"justify\" class=\"postbox\"><tr><td width=\"100%\" class=\"postcontent\">".$cmnt."<BR><div class=\"postinfo\">";
					$commentauthorquery = $database->query("SELECT * FROM users WHERE uid = '".$comment['uid']."'");
					$commentauthor = $database->fetch_array($commentauthorquery);
					$image = $commentauthor['imgsrc']; 
					$user = $commentauthor['uid']; 
					
						if($image=='')
						{
							echo  " <img src= 'images/default.jpg' align = 'right'>" ;
						}
						else
						{
						echo  " <img src= '$image' align = 'right'>" ;
						}

					echo "Comment Written by ".$commentauthor['username']."<BR>";
					$result=$database->query ("SELECT UNIX_TIMESTAMP(date_time) as epoch_time FROM comments WHERE cid = '".$comment['cid']."'");
					$datedate = $database->fetch_array($result);
					$comment['date_time'] = $datedate[0];
					$comment['date_time'] = strtotime($settings['timeoffset']." hours",$comment['date_time']);
					$comment['date_time'] = date($settings['dateformat']." ".$settings['timeformat'],$comment['date_time']);
					echo $comment['date_time'];
					//echo "<BR><a href=\"postreply.php?id=".$post['pid']."&cid=".$comment['cid']."\">";
					//echo "Post Reply </a>";
					echo "<b> Go <a href=\"javascript:history.go(-1)\">back</a></b>";
					echo "</div></td></tr></table></td></tr>";
				}
		}
		else
		{
		$getpostdetails = $database->query("select * from blog where title = '$selpost'");
		$getpostdetails1 = mysql_fetch_assoc($getpostdetails);
		$pid = $getpostdetails1[pid];
		//$usercomments = $database->query("select * from comments where pid ='$pid' and comment like '%$keyword%'");
		$usercomments = $database->query("select * from comments where pid ='$pid' and match(comment)  AGAINST ('+$keyword*' IN BOOLEAN MODE)");
		echo "Matched Comments  to  <b>'$keyword'</b> in <b>$selpost</b>";
		while($comment = mysql_fetch_array($usercomments))
				{
					$cmnt = strip_tags($comment['comment']);
					$cmnt = nl2br($cmnt);
					echo "<br/><table  cellpadding=\"8\" cellspacing=\"0\" width=\"75%\" align=\"justify\" class=\"postbox\"><tr><td width=\"100%\" class=\"postcontent\">".$cmnt."<BR><div class=\"postinfo\">";
					$commentauthorquery = $database->query("SELECT * FROM users WHERE uid = '".$comment['uid']."'");
					$commentauthor = $database->fetch_array($commentauthorquery);
					$image = $commentauthor['imgsrc']; 
						$user = $commentauthor['uid']; 
				
						if($image=='')
						{
							echo  " <img src= 'images/default.jpg' align = 'right'>" ;
						}
						else
						{
							echo  " <img src= '$image' align = 'right'>" ;
						}

					echo "Comment Written by ".$commentauthor['username']."<BR>";
					$result=$database->query ("SELECT UNIX_TIMESTAMP(date_time) as epoch_time FROM comments WHERE cid = '".$comment['cid']."'");
					$datedate = $database->fetch_array($result);
					$comment['date_time'] = $datedate[0];
					$comment['date_time'] = strtotime($settings['timeoffset']." hours",$comment['date_time']);
					$comment['date_time'] = date($settings['dateformat']." ".$settings['timeformat'],$comment['date_time']);
					echo $comment['date_time'];
					//echo "<BR><a href=\"postreply.php?id=".$post['pid']."&cid=".$comment['cid']."\">";
					//echo "Post Reply </a>";
					echo "<b> Go <a href=\"javascript:history.go(-1)\">back</a></b>";
					echo "</div></td></tr></table></td></tr>";
				}
		}
		}
	}
else
{
?>
	<table cellpadding="8" cellspacing="0" width="99%" align="center" class="postbox" bgcolor = "white">
	<tr><td>
	
	<form action="search.php" method="post" style="font-weight:bold;">
	<br>
	<table align="center" border="0">
	<tr align="center">
	<td>Search by this exact wording or phrase:</td>
	<td><input type="text" name="wordsearch" maxlength="60"></td>
	<td><b>OR </b>  Search for all post by User</td>
	<td>
	<?php
	$users=$database->query("select * from users");
	echo "<select name='userdroplist' size='1'>";
	echo "<option>Select</option>";
	while($users2=mysql_fetch_array($users))
	{ 
	   echo "<option>$users2[username]</option>";
	}
	?>
	</td>
	</tr>
	<tr>
	<td colspan="2">Select Post :<select name="userkeydroplist" size="1"> 
	<?php
	echo "<option>All Posts</option>";
	$titles=$database->query("select * from blog");
	while($titles2=mysql_fetch_array($titles))
	{ 
		echo "<option>$titles2[title]</option>";
	}
	?>	
	</select>
	</td>
  
	</table>
       
	<br>
	<h1 align="center"><input type="submit" name="search" value="Search"></h1> 
	</form>


      </td></tr>
      </table>

<?php
}
include("inc/footer.inc.php");

?>