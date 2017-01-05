<?php
ob_start();

include("inc/mainheader.inc.php");
//include("inc/global.php");
echo "hi1";
if(!isset($_SESSION['uid'])){
$page = "Post comment error";
include("inc/mainheader.inc.php");
echo "hi12";
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

//$postcheckquery = mysql_query("SELECT * FROM blog WHERE pid = '".$_POST['pid']."'");
//$comcheckquery =$database->query("SELECT * FROM comments where cid = '".$_POST['cid']."'");
//$postcheck = mysql_num_rows($postcheckquery);
//$comcheck = $database->num_rows($comcheckquery);

/*if($comcheck < 1){
echo "hi2";
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
*/
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

$database->query("INSERT INTO comments (cid,uid,comment,date_time,pid,child_flag,parent_id) VALUES ('','".$_SESSION['uid']."','".$_POST['comment']."',NOW(),'".$_GET['ppid']."','','".$_GET['ccid']."')");
$database->query("UPDATE comments SET child_flag=child_flag + 1 where cid = '".$_GET['ccid']."'");
header("Location: showpost.php?id=".$_GET['ppid']);
ob_end_flush();
?>
