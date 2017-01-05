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
//if($settings['showeditedby'] == "1"){
if($post['edit_uid'] > 0){
$sql9 = "SELECT * FROM `users` WHERE `uid` = '".$post['edit_uid']."'";
$query9 = $database->query($sql9);
$user = $database->fetch_array($query9);
$result=$database->query ("SELECT edit_date  FROM blog WHERE pid = '".$post['pid']."'");
$datedate = $database->fetch_array($result);
//$datedate = $datedate[0];
//$datedate = strtotime($settings['timeoffset']." hours",$datedate);
//$datedate = date($settings['dateformat']." ".$settings['timeformat'],$datedate);
echo "<div style=\"font-size:9px; color:#333333;\" align=\"right\"><i>Edited by ".$user['username']." at ".$datedate[0]."</i></div>";
				}
	//	}
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
								$querycomments = $database->query("SELECT * FROM comments WHERE pid = '".$post['pid']."' ORDER BY date_time DESC");
							// pagination ****************************************************************************************************
						if (isset($_GET['pageno'])) {
						$pageno = $_GET['pageno'];
							} else {
							$pageno = 1;
						}
					$numrows = mysql_num_rows($querycomments);
					$q_pid = mysql_query("SELECT pid FROM comments WHERE  pid = '".$post['pid']."' ORDER BY date_time DESC  $limit");
					$pid_q = mysql_fetch_row($q_pid);


					$set_sql = $database->query("select * from d_settings");
					$set_b = mysql_fetch_array($set_sql);
					$rows_per_page = $set_b[1];
					//$rows_per_page = $settings['display_comments'];
					//$t_view = $settings['display_view'];

					$lastpage      = ceil($numrows/$rows_per_page);
					$pageno = (int)$pageno;

					if ($pageno > $lastpage) {
									   $pageno = $lastpage;
					} // if
					if ($pageno < 1) {
									   $pageno = 1;
					} // if
					$limit = 'LIMIT ' .($pageno - 1) * $rows_per_page .',' .$rows_per_page;

// thread
				
				function re_thread($val1)
				{
						$sql3="select cid from comments where parent_id=$val1";
						$ress=mysql_query($sql3) or die(mysql_error());
						while($rrep1=mysql_fetch_assoc($ress))
							{
								foreach($rrep1 as $val2)
									{
										?><ul><?
										$sql6="select * from comments where cid=$val2";
										$result6=mysql_query($sql6) or die(mysql_error());
										$rre6=mysql_fetch_assoc($result6);
										$comid = $rre6["cid"];
										$datetime = $rre6["date_time"];
										$sql7 = "select username from users where uid = '".$rre6['uid']."'";
										$result7 = mysql_query($sql7) or die(mysql_error());
										$rre7 = mysql_fetch_assoc($result7);
										$name = $rre7["username"];
										//echo "<BR><a href=\"postview.php"\"> ";
										echo "| <br>";
										echo "|__";
										echo "<a href=\"viewpost.php?cid=$comid\">";
										echo "Reply From:   ";
										echo $name;
										echo "   on    ";
										echo "".  $datetime;
										echo "</a>";
										
										re_thread($val2);
									?></ul><?						
									}
							}
								return($val1);
				}

				
				
				
				$sqlrep="select cid from comments where pid='".$post['pid']."' and parent_id=0";
				$repid=mysql_query($sqlrep) or die(mysql_error());
				while($rrep=mysql_fetch_assoc($repid))
				{
					foreach($rrep as $val1){
					?><ul><?php
					$sql5="select * from comments where cid=$val1";
					$result3=mysql_query($sql5) or die(mysql_error());
					$rre=mysql_fetch_assoc($result3);
					$comid = $rre["cid"];
					$datetime = $rre["date_time"];
					$sql7 = "select username from users where uid = '".$rre['uid']."'";
					$result7 = mysql_query($sql7) or die(mysql_error());
					$rre7 = mysql_fetch_assoc($result7);
					echo "<a href=\"viewpost.php?cid=$comid\"> ";
					echo "Reply From:   ";
					echo $rre7['username'];
					echo "   on    ";
					echo "".  $datetime;
					echo "</a>";
					re_thread($val1);
					?>
						</ul>
					<?		
											}
				}

				
				// thread end


				$querycomments = $database->query("SELECT * FROM comments WHERE pid = '".$post['pid']."' ORDER BY date_time DESC $limit");
				while($comment = mysql_fetch_assoc($querycomments)){
				$cmnt = strip_tags($comment['comment']);
				$cmnt = nl2br($cmnt);
				echo "<table width=\"100%\"><tr><td>";
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
				echo "<BR><a href=\"postreply.php?id=".$post['pid']."&cid=".$comment['cid']."\">";
				echo "Post Reply </a>";
				echo "</div></td></tr></table></td></tr>";
}						
				echo "<tr><td><table cellpadding=\"8\" cellspacing=\"0\" width=\"75%\" align=\"justify\" class=\"postbox\"><tr><td width=\"100%\" class=\"postcontent\">";	
				if(isset($_SESSION['uid'])){
				
				echo "<div align=\"center\"><form action=\"postcomment.php\" method=\"post\"><input type=\"hidden\" name=\"pid\" value=\"".$post['pid']."\"><textarea rows=\"5\" cols=\"30\" name=\"comment\"></textarea><BR><input type=\"submit\" value=\"Post Comment\"></form></div>";
				
				} else {
				echo "<b>You cannot make any comments on this post as you are not logged in. Please login to take advantage of making comments</b>";
				}
				
			echo "</td>			</tr>			</table>			</td></tr>			</table>";
			
			if ($pageno == 1) {
   echo " FIRST PREV ";
} else {
   echo " <a href='{$_SERVER['PHP_SELF']}?id=$pid_q[0]&pageno=1'>FIRST</a> ";
   $prevpage = $pageno-1;
   echo " <a href='{$_SERVER['PHP_SELF']}?id=$pid_q[0]&pageno=$prevpage'>PREV</a> ";
} // if

	echo " ( Page $pageno of $lastpage ) ";

if ($pageno >= $lastpage ) {

   echo " NEXT LAST ";
} else {

   $nextpage = $pageno+1;
   echo " <a href='{$_SERVER['PHP_SELF']}?id=$pid_q[0]&pageno=$nextpage'>NEXT</a> ";
   echo " <a href='{$_SERVER['PHP_SELF']}?id=$pid_q[0]&pageno=$lastpage'>LAST</a> ";
} // if
			
			
			}
			
		echo "<!-- End Post-->
		<BR>";
		
		?>
