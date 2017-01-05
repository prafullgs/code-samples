<?php
ob_start();

$path = "../";
$modcheck = 1;
$page = "Edit Post";
include("../inc/adminheader.inc.php");

if(isset($_POST['cid'])){
  //Check to see if textbox is filled
  if($_POST['comment'] == ""){
    echo "<b>You did not fill in the comment box. Please go <a href=\"javascript:history.go(-1)\">back</a> and try again</b>";
    include("../inc/footer.inc.php");
    ob_end_flush();
    exit();
  }
  
$query = $database->query("SELECT * FROM comments WHERE cid = '".$_POST['cid']."'");
$comment = $database->fetch_array($query);

$database->query("UPDATE comments SET comment = '".$_POST['comment']."',edit_uid = '".$_SESSION['uid']."', edit_date = now() WHERE cid = '".$_POST['cid']."'");
//$database->query("UPDATE comments SET comment = '".$_POST['comment']."' WHERE cid = '".$_POST['cid']."'");

  header("Location: comments.php?id=".$comment['pid']);
  ob_end_flush();
  exit();
  }

if(!isset($_GET['id'])){
  echo "<b>You have followed an invalid link. Please go <a href=\"javascript:history.go(-1)\">back</a> and try again</b>";
  include("../inc/footer.inc.php");
  ob_end_flush();
  exit();
}

$query = $database->query("SELECT * FROM comments WHERE cid = '".$_GET['id']."'");
if($database->num_rows($query) < 1){
  echo "You can't edit a post that does not exsist. Please go <a href=\"javascript:history.go(-1)\">back</a> and try again.";
  include("../inc/footer.inc.php");
  ob_end_flush();
  exit();
}
$comment = $database->fetch_array($query);
?>
<form action="editcomment.php" method="post">
<input type="hidden" name="cid" value="<? echo $comment['cid']; ?>">
<textarea rows="10" cols="50" name="comment"><? echo $comment['comment']; ?></textarea>
<BR><input type="submit" value="Edit">
</form>	
	
<?php
include("../inc/footer.inc.php");
ob_end_flush();
?>