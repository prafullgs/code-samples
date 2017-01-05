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
			$querycomments = $database->query("SELECT * FROM comments WHERE pid = '".$post['pid']."' ORDER BY date_time DESC");
			
			// pagination ****************************************************************************************************
if (isset($_GET['pageno'])) {
   $pageno = $_GET['pageno'];
} else {
   $pageno = 1;
} // if


$numrows = mysql_num_rows($querycomments);
//echo $numrows;
$rows_per_page = $settings['display_comments'];


$lastpage      = ceil($numrows/$rows_per_page);
//$lastpage = 3;

$pageno = (int)$pageno;
if ($pageno > $lastpage) {
   $pageno = $lastpage;
} // if
if ($pageno < 1) {
   $pageno = 1;
} // if

//$limit = 3;
$limit = 'LIMIT ' .($pageno - 1) * $rows_per_page .',' .$rows_per_page;

//$query_p = "SELECT * FROM table $limit";
$querycomments = $database->query("SELECT * FROM comments WHERE pid = '".$post['pid']."' ORDER BY date_time DESC  $limit");
$q_pid = mysql_query("SELECT pid FROM comments WHERE  pid = '".$post['pid']."' ORDER BY date_time DESC  $limit");
$pid_q = mysql_fetch_row($q_pid);
//echo $pid_q[0];
$result_p = mysql_query($querycomments);// or trigger_error("SQL", E_USER_ERROR);

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
//echo $r_p['comment'];
}
//... process contents of $result ...
// thread 

function recursive_thread($cpid,$par_id)
{


$sql3="select cid, parent_id,child_flag,comment from comments where parent_id=$cpid";
$ress=mysql_query($sql3); 
while($rrep1=mysql_fetch_row($ress))
{
echo $rrep1['comment'];
if($rrep1['child_flag'] == 0)
{
echo $rrep1['comment'];
}
/*

foreach($rrep1 as $val2)
{
?><ul><?
if($rrep1['child_flag'] == 0)
{
echo $rrep1['comment'];
}
}*/
}
}
/*$sql6="select comment from comments where parent_id=$cpid";
$result6=mysql_query($sql6);
$rre6=mysql_fetch_assoc($result6);
echo $rre6['comment'];
recursive_thread($val2);?></ul>
<?php
}
}
return($val1);
}

*/

$kuery1 = "SELECT comment FROM comments WHERE pid = '".$post['pid']."' ORDER BY date_time DESC ";
$d_cid = mysql_query($kuery1);
$d_cid_c = mysql_fetch_assoc($d_cid);

//echo $d_cid_c['comment'];

$kuery = "SELECT cid FROM comments WHERE pid = '".$post['pid']."' and parent_id = 0  ORDER BY date_time DESC ";
$kuer1 = mysql_query($kuery);
$k_cid = mysql_fetch_assoc($kuer1);
//echo $k_cid['cid'];

while($k_cid = mysql_fetch_assoc($kuer1))
{
$qt = mysql_query("SELECT * from comments where cid = '".$k_cid[0]."'");
$qt1 = mysql_fetch_row($qt);
//echo $qt1['comment'];
$pat_id = $k_cid['parent_id'];
foreach($k_cid as $val)
{
echo "<ul>";

$sql_c = "SELECT comment from comments where cid=$val";
$res_c = mysql_query($sql_c);
$res_cc = mysql_fetch_assoc($res_c);
recursive_thread($val,$pat_id);
}

}

// thread end 

// *************
/*
//chaitanya
//$sqlrep="select replyid from messagereply where postid=$char and rrid=0";
//$repid=mysql_query($sqlrep) or die(mysql_error());
while($rrep=mysql_fetch_assoc($querycomments))
{
foreach($rrep as $val1){
?><ul><?php
$sql5="select subject from messagereply where replyid=$val1";
$result3=mysql_query($sql5) or die(mysql_error());
$rre=mysql_fetch_assoc($result3);
echo $rre['subject'];
thread($val1);
?>
</ul>
<?php
}
}?>

<?php
function thread($val1)
{
$sql3="select replyid from messagereply where rrid=$val1";
$ress=mysql_query($sql3) or die(mysql_error());
while($rrep1=mysql_fetch_assoc($ress))
{
foreach($rrep1 as $val2)
{
?><ul><?
$sql6="select subject from messagereply where rrid=$val1";
$result6=mysql_query($sql6) or die(mysql_error());
$rre6=mysql_fetch_assoc($result6);
echo $rre6['subject'];
thread($val2);?></ul>
<?php
}
}
return($val1);
}
*/


// *************

			/*
			while($comment = $database->fetch_array($querycomments)){
			if($comment['child_flag'] > 0 )
			{
			echo "REPLY";
			$quecom = $database->query("SELECT * FROM comments WHERE parent_id = '".$comment['cid']."' ORDER BY date_time DESC ");
			while($comm = $database->fetch_array($quecom)){
			
				}
			}
			else if($comment['parent_id'] == 0 )
			{
			
			}
			}
			
			/*
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
			*/
/*while ($post = $database->fetch_array($querycomments)){
$includecomments = "1";
include("inc/posttemp.php");
}*/

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





// -------------------------------------------------
			
			/*echo "<table width=\"100%\">";
			
			while($comment = $database->fetch_array($querycomments)){
			$cmnt = strip_tags($comment['comment']);
			$cmnt = nl2br($cmnt);
			echo "<tr><td><table cellpadding=\"8\" cellspacing=\"0\" width=\"75%\" align=\"justify\" class=\"postbox\"><tr><td width=\"100%\" class=\"postcontent\">".$cmnt."<BR><div class=\"postinfo\">";
				
				$commentauthorquery = $database->query("SELECT * FROM users WHERE uid = '".$comment['uid']."'");
				$commentauthor = $database->fetch_array($commentauthorquery);
				

				
				
				
				echo "Comment Written by ".$commentauthor['username']."<BR>";
								
				$result=$database->query ("SELECT UNIX_TIMESTAMP(date_time) as epoch_time FROM comments WHERE cid = '".$comment['cid']."'");
				$datedate = $database->fetch_array($result);
				$comment['date_time'] = $datedate[0];
				$comment['date_time'] = strtotime($settings['timeoffset']." hours",$comment['date_time']);
				$comment['date_time'] = date($settings['dateformat']." ".$settings['timeformat'],$comment['date_time']);
				echo $comment['date_time'];
				
				echo "</div></td></tr></table></td></tr>";
			
			}*/
			
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

		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		// **********
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
			$querycomments = $database->query("SELECT * FROM comments WHERE pid = '".$post['pid']."' ORDER BY date_time DESC");
			
			// pagination ****************************************************************************************************
if (isset($_GET['pageno'])) {
   $pageno = $_GET['pageno'];
} else {
   $pageno = 1;
} // if
function recursive_thread($cpid)
{
$sql3="select * from comments where parent_id=$cpid";
$ress=mysql_query($sql3); 
while($rrep1=mysql_fetch_row($ress))
{
$cmnt = strip_tags($rrep1['comment']);
			$cmnt = nl2br($cmnt);
		    echo "<table width=\"100%\"><tr><td>";
			echo "<table cellpadding=\"8\" cellspacing=\"0\" width=\"75%\" align=\"justify\" class=\"postbox\"><tr><td width=\"100%\" class=\"postcontent\">".$cmnt."<BR><div class=\"postinfo\">";
				$commentauthorquery = $database->query("SELECT * FROM users WHERE uid = '".$rrep1['uid']."'");
				$commentauthor = $database->fetch_array($commentauthorquery);
				echo "Comment Written by ".$commentauthor['username']."<BR>";
				$result=$database->query ("SELECT UNIX_TIMESTAMP(date_time) as epoch_time FROM comments WHERE cid = '".$rrep1['cid']."'");
				$datedate = $database->fetch_array($result);
				$comment['date_time'] = $datedate[0];
				$comment['date_time'] = strtotime($settings['timeoffset']." hours",$rrep1['date_time']);
				$comment['date_time'] = date($settings['dateformat']." ".$settings['timeformat'],$rrep1['date_time']);
				echo $comment['date_time'];
				echo "<BR><a href=\"postreply.php?id=".$post['pid']."&cid=".$rrep1['cid']."\">";
				echo "Post Reply </a>";
				echo "</div></td></tr></table></td></tr>";
//echo $rrep1['comment'];
foreach($rrep1 as $val2)
{
?><ul><?
$sql6="select * from comments where parent_id=$cpid";
$result6=mysql_query($sql6);
$rre6=mysql_fetch_assoc($result6);
while($rre6=mysql_fetch_assoc($result6))
{
$cmnt = strip_tags($rre6['comment']);
			$cmnt = nl2br($cmnt);
		    echo "<table width=\"100%\"><tr><td>";
			echo "<table cellpadding=\"8\" cellspacing=\"0\" width=\"75%\" align=\"justify\" class=\"postbox\"><tr><td width=\"100%\" class=\"postcontent\">".$cmnt."<BR><div class=\"postinfo\">";
				$commentauthorquery = $database->query("SELECT * FROM users WHERE uid = '".$rre6['uid']."'");
				$commentauthor = $database->fetch_array($commentauthorquery);
				echo "Comment Written by ".$commentauthor['username']."<BR>";
				$result=$database->query ("SELECT UNIX_TIMESTAMP(date_time) as epoch_time FROM comments WHERE cid = '".$rre6['cid']."'");
				$datedate = $database->fetch_array($result);
				$comment['date_time'] = $datedate[0];
				$comment['date_time'] = strtotime($settings['timeoffset']." hours",$rre6['date_time']);
				$comment['date_time'] = date($settings['dateformat']." ".$settings['timeformat'],$rre6['date_time']);
				echo $comment['date_time'];
				echo "<BR><a href=\"postreply.php?id=".$post['pid']."&cid=".$rre6['cid']."\">";
				echo "Post Reply </a>";
				echo "</div></td></tr></table></td></tr>";
}
//echo $rre6['comment'];
recursive_thread($val2);?></ul>
<?php
}
}
return($val1);
}

$numrows = mysql_num_rows($querycomments);
//echo $numrows;
$rows_per_page = $settings['display_comments'];
//$t_view = $settings['display_view'];

$lastpage      = ceil($numrows/$rows_per_page);
//$lastpage = 3;

$pageno = (int)$pageno;
if ($pageno > $lastpage) {
   $pageno = $lastpage;
} // if
if ($pageno < 1) {
   $pageno = 1;
} // if

//$limit = 3;
$limit = 'LIMIT ' .($pageno - 1) * $rows_per_page .',' .$rows_per_page;

//$query_p = "SELECT * FROM table $limit";
$querycomments = $database->query("SELECT * FROM comments WHERE pid = '".$post['pid']."' ORDER BY date_time DESC  $limit");
$q_pid = mysql_query("SELECT pid FROM comments WHERE  pid = '".$post['pid']."' ORDER BY date_time DESC  $limit");
$pid_q = mysql_fetch_row($q_pid);
//echo $pid_q[0];
$result_p = mysql_query($querycomments);// or trigger_error("SQL", E_USER_ERROR);
$t_view = 1;
if ($t_view == 0)
{
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
//... process contents of $result ...
// thread 
}
else
{
$kuery = "SELECT cid FROM comments WHERE pid = '".$post['pid']."' and parent_id = 0 and child_flag > 0 ORDER BY date_time DESC ";
$kuer1 = mysql_query($kuery);
$k_cid = mysql_fetch_assoc($kuer1);

while($k_cid = mysql_fetch_assoc($kuer1))
{
/*$qt = mysql_query("SELECT * from comments where cid = '".$k_cid[0]."'");
$qt1 = mysql_fetch_row($qt);
$pat_id = $k_cid['parent_id'];*/
foreach($k_cid as $val)
{
echo "<ul>";
$sql_c = "SELECT * from comments where cid=$val";
$res_c = mysql_query($sql_c);
//$res_cc = mysql_fetch_assoc($res_c);
while($res_cc = mysql_fetch_assoc($res_c)){
$cmnt = strip_tags($res_cc['comment']);
			$cmnt = nl2br($cmnt);
		    echo "<table width=\"100%\"><tr><td>";
			echo "<table cellpadding=\"8\" cellspacing=\"0\" width=\"75%\" align=\"justify\" class=\"postbox\"><tr><td width=\"100%\" class=\"postcontent\">".$cmnt."<BR><div class=\"postinfo\">";
				$commentauthorquery = $database->query("SELECT * FROM users WHERE uid = '".$res_cc['uid']."'");
				$commentauthor = $database->fetch_array($commentauthorquery);
				echo "Comment Written by ".$commentauthor['username']."<BR>";
				$result=$database->query ("SELECT UNIX_TIMESTAMP(date_time) as epoch_time FROM comments WHERE cid = '".$res_cc['cid']."'");
				$datedate = $database->fetch_array($result);
				$comment['date_time'] = $datedate[0];
				$comment['date_time'] = strtotime($settings['timeoffset']." hours",$res_cc['date_time']);
				$comment['date_time'] = date($settings['dateformat']." ".$settings['timeformat'],$res_cc['date_time']);
				echo $comment['date_time'];
				echo "<BR><a href=\"postreply.php?id=".$post['pid']."&cid=".$res_cc['cid']."\">";
				echo "Post Reply </a>";
				echo "</div></td></tr></table></td></tr>";
}
//echo $res_cc['comment'];
recursive_thread($val);
}
}
}
// thread end 

// *************
/*
//chaitanya
//$sqlrep="select replyid from messagereply where postid=$char and rrid=0";
//$repid=mysql_query($sqlrep) or die(mysql_error());
while($rrep=mysql_fetch_assoc($querycomments))
{
foreach($rrep as $val1){
?><ul><?php
$sql5="select subject from messagereply where replyid=$val1";
$result3=mysql_query($sql5) or die(mysql_error());
$rre=mysql_fetch_assoc($result3);
echo $rre['subject'];
thread($val1);
?>
</ul>
<?php
}
}?>

<?php
function thread($val1)
{
$sql3="select replyid from messagereply where rrid=$val1";
$ress=mysql_query($sql3) or die(mysql_error());
while($rrep1=mysql_fetch_assoc($ress))
{
foreach($rrep1 as $val2)
{
?><ul><?
$sql6="select subject from messagereply where rrid=$val1";
$result6=mysql_query($sql6) or die(mysql_error());
$rre6=mysql_fetch_assoc($result6);
echo $rre6['subject'];
thread($val2);?></ul>
<?php
}
}
return($val1);
}
*/


// *************

						
			/*
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
			*/
/*while ($post = $database->fetch_array($querycomments)){
$includecomments = "1";
include("inc/posttemp.php");
}*/

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





// -------------------------------------------------
			
			/*echo "<table width=\"100%\">";
			
			while($comment = $database->fetch_array($querycomments)){
			$cmnt = strip_tags($comment['comment']);
			$cmnt = nl2br($cmnt);
			echo "<tr><td><table cellpadding=\"8\" cellspacing=\"0\" width=\"75%\" align=\"justify\" class=\"postbox\"><tr><td width=\"100%\" class=\"postcontent\">".$cmnt."<BR><div class=\"postinfo\">";
				
				$commentauthorquery = $database->query("SELECT * FROM users WHERE uid = '".$comment['uid']."'");
				$commentauthor = $database->fetch_array($commentauthorquery);
				echo "Comment Written by ".$commentauthor['username']."<BR>";
				$result=$database->query ("SELECT UNIX_TIMESTAMP(date_time) as epoch_time FROM comments WHERE cid = '".$comment['cid']."'");
				$datedate = $database->fetch_array($result);
				$comment['date_time'] = $datedate[0];
				$comment['date_time'] = strtotime($settings['timeoffset']." hours",$comment['date_time']);
				$comment['date_time'] = date($settings['dateformat']." ".$settings['timeformat'],$comment['date_time']);
				echo $comment['date_time'];
				
				echo "</div></td></tr></table></td></tr>";
			
			}*/
			
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

		//***************