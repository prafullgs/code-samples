<?php
ob_start();

$showside = "0";
$page = "Update User Account";
$path = "../";
include("../inc/mainheader.inc.php");
//Login check
include("../inc/logincheck.inc.php");
if(!isset($_POST['update'])){
  echo "<b>You followed an invalid link. Please go <a href=\"javascript:history.go(-1)\">back</a> and try again</b>";
  include("../inc/footer.inc.php");
  ob_end_flush();
  exit();
}

if($_POST['update'] == "password"){
  //Check
  if($_POST['new_password'] == ""){
    echo "<b>You did not type in a new password. Please go <a href=\"javascript:history.go(-1)\">back</a> and try again</b>";
    include("../inc/footer.inc.php");
  ob_end_flush();
    exit();
    }
  
  if($_POST['new_password'] != $_POST['cnew_password']){
    echo "<b>The password you entered on the last page do not match. Please go <a href=\"javascript:history.go(-1)\">back</a> and try again</b>";
    include("../inc/footer.inc.php");
  ob_end_flush();
  exit();
  }

$database->query("UPDATE users SET password = '".md5($_POST['new_password'])."' WHERE uid = '".$_SESSION['uid']."'");
header("Location: index.php?action=updated");
  ob_end_flush();
  exit();
}




if($_POST['update'] == "settings"){
  //Check
  if($_POST['email'] == ""){
    echo "<b>You did not type in your email address. Please go <a href=\"javascript:history.go(-1)\">back</a> and try again</b>";
    include("../inc/footer.inc.php");
  ob_end_flush();
    exit();
    }

$database->query("UPDATE users SET email = '".$_POST['email']."' WHERE uid = '".$_SESSION['uid']."'");
header("Location: index.php?action=updated");
  ob_end_flush();
  exit();
  }


include("../inc/footer.inc.php");
?>