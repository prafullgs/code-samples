<?
echo "<!--Begin Post--><table cellpadding=\"8\" cellspacing=\"0\" width=\"99%\" align=\"center\" class=\"postbox\"><tr><td width=\"100%\" class=\"postheader\">".$post['title']."</td></tr><tr><td class=\"postcontent\">";
if($post['image'] && $post['image'] != "null"){
$sql2 = "SELECT * FROM images WHERE gid = '".$post['image']."';";
$query2 = $database->query($sql2);
$image = $database->fetch_array($query2);
echo "<img src=\"images/".$image['filename']."\" style=\"float:".$post['float']."; padding-left:10px;\" alt=\"".$image['alt']."\">";
}
$post['content'] = parse($post['content']);
echo $post['content'];
if($settings['showeditedby'] == "1"){
if($post['edit_uid'] > 0){
$sql9 = "SELECT * FROM `users` WHERE `uid` = '".$post['edit_uid']."'";
$query9 = $database->query($sql9);
$user = $database->fetch_array($query9);
$result=$database->query ("SELECT UNIX_TIMESTAMP(edit_date) as epoch_time FROM blog WHERE pid = '".$post['pid']."'");
$datedate = $database->fetch_array($result);
$datedate = $datedate[0];
$datedate = strtotime($settings['timeoffset']." hours",$datedate);
$datedate = date($settings['dateformat']." ".$settings['timeformat'],$datedate);
echo "<div style=\"font-size:9px; color:#333333;\" align=\"right\"><i>Edited by ".$user['username']." at ".$datedate."</i></div>";
				}
		}
			echo "<BR><div  align='justify' class=\"postinfo\">";
				$findauthorquery = $database->query("SELECT * FROM users WHERE uid = '".$post['uid']."'");
				$author = $database->fetch_array($findauthorquery);
				$result=$database->query ("SELECT UNIX_TIMESTAMP(date_time) as epoch_time FROM blog WHERE pid = '".$post['pid']."'");
				$datedate = $database->fetch_array($result);
				$post['date_time'] = $datedate[0];
				$post['date_time'] = strtotime($settings['timeoffset']." hours",$post['date_time']);
				$post['date_time'] = date($settings['dateformat']." ".$settings['timeformat'],$post['date_time']);
				$comments = $database->num_rows($database->query("SELECT * FROM comments WHERE pid = '".$post['pid']."'"));
				echo "Written by ".$author['username']." (<a href=\"showpost.php?id=".$post['pid']."\">MoviesBB</a>)<BR><a href=\"showpost.php?id=".$post['pid']."\">".$comments." Comment(s)</a><BR>".$post['date_time']."</div></td></tr></table><BR>";
			if($includecomments == "1"){
			$querycomments = $database->query("SELECT * FROM comments WHERE pid = '".$post['pid']."' ORDER BY date_time ASC");
			
			echo "<table width=\"100%\">";
			
			while($comment = $database->fetch_array($querycomments)){
			$cmnt = strip_tags($comment['comment']);
			$cmnt = nl2br($cmnt);
			echo "<tr><td><table cellpadding=\"8\" cellspacing=\"0\" width=\"75%\" align=\"justify\" class=\"postbox\"><tr><td width=\"100%\" class=\"postcontent\">".$cmnt."<BR><div class=\"postinfo\">";
				
				$commentauthorquery = $database->query("SELECT * FROM users WHERE uid = '".$comment['uid']."'");
				$commentauthor = $database->fetch_array($commentauthorquery);
				
				echo "Comment Written by ".$commentauthor['username']."<BR>";
				//echo "Comment Editted at ".$commentauthor['edit_date']."<BR>";
				
				$result=$database->query ("SELECT UNIX_TIMESTAMP(date_time) as epoch_time FROM comments WHERE cid = '".$comment['cid']."'");
				$datedate = $database->fetch_array($result);
				$comment['date_time'] = $datedate[0];
				$comment['date_time'] = strtotime($settings['timeoffset']." hours",$comment['date_time']);
				$comment['date_time'] = date($settings['dateformat']." ".$settings['timeformat'],$comment['date_time']);
				echo $$commentauthor['date_time'];
				
				

				echo "</div></td></tr></table></td></tr>";
			
			}
			
			echo "<tr><td><table cellpadding=\"8\" cellspacing=\"0\" width=\"75%\" align=\"justify\" class=\"postbox\"><tr><td width=\"100%\" class=\"postcontent\">";
				
				if(isset($_SESSION['uid'])){
				
				echo "<div align=\"center\"><form action=\"postcomment.php\" method=\"post\"><input type=\"hidden\" name=\"pid\" value=\"".$post['pid']."\"><textarea rows=\"5\" cols=\"30\" name=\"comment\"></textarea><BR><input type=\"submit\" value=\"Post Comment\"></form></div>";
				
				} else {
				echo "<b>You cannot make any comments on this post as you are not logged in. Please login to take advantage of making comments</b>";
				}
				
			echo "</td>			</tr>			</table>			</td></tr>			</table>";
			
			}
			
		echo "<!-- End Post-->
		<BR>";
		?>
