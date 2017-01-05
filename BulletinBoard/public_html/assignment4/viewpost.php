<?php

ob_start();
//$showside = "1";
$page = "Selected Comment";
include("inc/mainheader.inc.php"); 
$comid = $_GET['cid'];
//include("inc/global.php");
				$querycomments = $database->query("SELECT * FROM comments WHERE cid = $comid ");
				while($comment = mysql_fetch_assoc($querycomments)){
				$cmnt = strip_tags($comment['comment']);
				$cmnt = nl2br($cmnt);
				echo "<table cellpadding=\"8\" cellspacing=\"0\" width=\"75%\" align=\"justify\" class=\"postbox\"><tr><td width=\"100%\" class=\"postcontent\">".$cmnt."<BR><div class=\"postinfo\">";
				$commentauthorquery = $database->query("SELECT * FROM users WHERE uid = '".$comment['uid']."'");
				$commentauthor = $database->fetch_array($commentauthorquery);
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
			
include("inc/footer.inc.php");

?>			