<?php
ob_start();

$path = "../";
$modcheck = 1;
$page = "Comment Administration";
include("../inc/adminheader.inc.php");

if($_REQUEST['action'] == "delete"){
  $query = $database->query("SELECT * FROM comments WHERE cid = '".$_REQUEST['cid']."'");
  if($database->num_rows($query) != 1){
    echo "You followed an invalid link or someone got there before you. Please go <a href=\"javascript:history.go(-1)\">back</a> and try again.";
  include("../inc/footer.inc.php");
  ob_end_flush();
  exit();
    }
  $comment = $database->fetch_array($query);
    
    //Delete the comment
    
    $database->query("DELETE FROM comments WHERE cid = '".$_REQUEST['cid']."'");
    
    header("Location: comments.php?id=".$comment['pid']);
  ob_end_flush();
  exit();
  }

if(!isset($_REQUEST['id'])){
  echo "<b>You followed a invalid link. Please go <a href=\"javascript:history.go(-1)\">back</a> and try again.</b>";
  include("../inc/footer.inc.php");
  ob_end_flush();
  exit();
}
?>
<script language="JavaScript">
function delete_comment(cid){
  lalala = window.confirm("Are you sure you want to delete this comment?");
  if(lalala == true){
    document.location = "<? echo $_SERVER["PHP_SELF"]; ?>?action=delete&cid=" + cid;
    }
  }
</script>
<?
$color1 = 0;
$query = $database->query("SELECT * FROM comments WHERE pid = '".$_REQUEST['id']."' ORDER BY date_time DESC");
if($database->num_rows($query) < 1){
  ?>
  <table cellpadding="8" cellspacing="0" width="75%" align="center" class="postbox">
				<tr>
				<td width="100%" class="postcontent">
				<div align="center">
				<b>There are no comments assosiated with this blog post.</b>				
				</div>
				</td>
				</tr>
  </table>
  <?
  }
while($comment = $database->fetch_array($query)){
  ?>
  <table cellpadding="8" cellspacing="0" width="75%" align="center" class="postbox">
				<tr>
				<td width="100%" class="postcontent">
				<div style="float:left; border:2px solid #0099CC; margin:5px;">
				<div style="margin:5px;">
				<a href="javascript:delete_comment('<? echo $comment['cid']; ?>')">[Delete]</a> | <a href="editcomment.php?id=<? echo $comment['cid'];	?>">[Edit]</a>
				</div></div>
				<?
				echo $comment['comment'];
				?>
				<BR>
				<div class="postinfo">
				<?
				$commentauthorquery = $database->query("SELECT * FROM users WHERE uid = '".$comment['uid']."'");
				$commentauthor = $database->fetch_array($commentauthorquery);
				?>
				Comment Written by <? echo $commentauthor['username']; ?><BR>
				<?
				$result=$database->query ("SELECT UNIX_TIMESTAMP(date_time) as epoch_time FROM comments WHERE cid = '".$comment['cid']."'");
				$datedate = $database->fetch_array($result);
				$comment['date_time'] = $datedate[0];
				$comment['date_time'] = strtotime($settings['timeoffset']." hours",$comment['date_time']);
				$comment['date_time'] = date($settings['dateformat']." ".$settings['timeformat'],$comment['date_time']);
				echo $comment['date_time'];
				?>
				</div>
			</td>
			</tr>
			</table><BR>
			<?
  }


include("../inc/footer.inc.php");
  ob_end_flush();
?>