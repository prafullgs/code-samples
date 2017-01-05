<?
ob_start();
$path = "../";
$bypassclose = 1;
include("../inc/mainheader.inc.php");
if(isset($_SESSION['uid'])){
header("Location: index2.php");
ob_end_flush();
}
?>
<table cellpadding="8" cellspacing="0" width="99%" align="center" class="postbox">
<tr>
<td width="100%" class="postcontent">
<div align="center">
<form action="../login.php" method="POST">
<input type="hidden" name="postpanel" value="1">
<table>
<tr><td>
<input type="text" name="username">
</td>
<td><input type="password" name="password"></td>
</tr>
<tr><td>Username</td><td>Password</td></tr>
</table>
<input type="submit" value="Login">
</form>
</div>
</td></tr></table>
<?
include("../inc/footer.inc.php");
ob_end_flush();
?>
