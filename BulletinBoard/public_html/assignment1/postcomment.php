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
if($postcheck < 1){
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

$database->query("INSERT INTO comments (cid,uid,comment,date_time,pid,child_flag,parent_id) VALUES ('','".$_SESSION['uid']."','".$_POST['comment']."',NOW(),'".$_POST['pid']."','','')");
header("Location: showpost.php?id=".$_POST['pid']);
ob_end_flush();
?>
