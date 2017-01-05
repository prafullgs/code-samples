
<?php
ob_start();
$page = "Notify";
include("inc/mainheader.inc.php");

$uname=$_SESSION['username'];
$userids=mysql_query("select * from users where username='$uname'") or die(mysql_error());
$userid=$userids['id'];

?>
<html>


     

<h3 align="center">Notifications</h3>
<table>
<form action="note_success.php" method="post" >
<tr><td>
Select User



<?php
$users=mysql_query("select * from users") or die(mysql_error());
print "<select name='userdroplist' size='1'>";
print "<option>Any user</option>";
while($users2=mysql_fetch_array($users))
{
print "<option>$users2[username]</option>";
}
print "</select>";
?>
</tr></td>
<tr><td>
<br>Enter Keywords <input type="text" name="text1" maxlength="20" > <BR><BR>Select a Forum

<select name="forumlist" size="1">
<?php
print "<option>Any forum</option>";
$titles=mysql_query("select * from forum") or die(mysql_error());
while($titles2=mysql_fetch_array($titles))
{
	print "<option>$titles2[title]</option>";
}
?>
</tr></td>
</table>
</select>
<br><br>
<h1 align="center"><input type="submit" name="submit" value="submit"></h1>

</form>
</body>
	  </html>

