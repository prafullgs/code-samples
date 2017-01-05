<?

$showside = "0";
$page = "User CP";
$path = "../";
include("../inc/mainheader.inc.php");
//Login check
include("../inc/logincheck.inc.php");
if($_GET['action'] == "updated"){
?>
<table cellpadding="8" cellspacing="0" width="99%" align="center" class="postbox">
				<tr>
				<td class="postcontent">
				<b>Settings Updated</b>
				</td></tr></table>
				<BR><BR>
				<?
				}
				?>
<table cellpadding="8" cellspacing="0" width="99%" align="center" class="postbox">
				<tr>
				<td width="100%" class="postheader">
				Password change
				</td>
				</tr>
				<tr>
				<td class="postcontent">
				
				
<form action="update.php" method="post">
<input type="hidden" name="update" value="password">
<table>
<tr>
<td>
New Password
</td>
<td>
<input type="password" name="new_password">
</td>
</tr>
<tr>
<td>
Confirm New Password
</td>
<td>
<input type="password" name="cnew_password">
</td>
</tr>
<tr>
<td colspan="2">
<div align="center">
<input type="submit" value="Update">
</div>
</td>
</tr>
</table>
</form>



</td></tr></table><BR>
<table cellpadding="8" cellspacing="0" width="99%" align="center" class="postbox">
				<tr>
				<td width="100%" class="postheader">
				Settings
				</td>
				</tr>
				<tr>
				<td class="postcontent">
				
<?php
$query = $database->query("SELECT * FROM users WHERE uid = '".$_SESSION['uid']."'");
$user = $database->fetch_array($query);
?>
<form action="update.php" method="post">
<input type="hidden" name="update" value="settings">
<table>
<tr>
<td>
Email
</td>
<td>
<input type="text" name="email" value="<? echo $user['email']; ?>">
</td>
</tr>

<tr>
<td colspan="2">
<div align="center">
<input type="submit" value="Update">
</div>
</td>
</tr>
</table>
</form>
				
				
				
				</td></tr></table>
<?
include("../inc/footer.inc.php");
?>