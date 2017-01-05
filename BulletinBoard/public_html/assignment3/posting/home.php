<?php

$path = "../";
$modcheck = 1;
$page = "Posting CP Home";
include("../inc/adminheader.inc.php");
?>
<style>
.tblborder2 td{
border:1px solid #000000;
}
</style>
<a href="new.php">New Post</a><BR>
<table class="tblborder2" align="center" width="80%">
<tr bgcolor="#EFEFEF">
<td><b>ID</b></td>
<td><b>Title</b></td>
<td><b>Author</b></td>
<td colspan="3">&nbsp;</td>
</tr>
<?
$color1 = 0;
$query = $database->query("SELECT * FROM blog ORDER BY date_time DESC");
while($post = $database->fetch_array($query)){
if($color1 == 1){
echo "<tr class=\"dark\">";
} else {
echo "<tr class=\"light\">";
}

echo "<td width='2%'> " .$post['pid'].  "</font> </td>";
if($post['freeze'] == 1 ) 
{
	echo "<td width='70%'> <b> <font color='#FF0000'> " .$post['title']. " <b> </font></td>";
}
else
{
	echo "<td width='70%'> <b> " .$post['title']. " <b> </font></td>";
}


$query2 = $database->query("SELECT username FROM users WHERE uid = '".$post['uid']."'");
$user = $database->fetch_array($query2);

echo "<td>".$user['username']."</td>";
if($_SESSION['admin'] == 0){
if($post['uid'] == $_SESSION['uid']){
if($post['freeze'] == 0 ) 
{
echo "<td><a href=\"edit.php?id=".$post['pid']."\">Edit</a></td>";
echo "<td><a href=\"delete.php?id=".$post['pid']."\">Delete</a></td>";
echo "<td><a href=\"comments.php?id=".$post['pid']."\">Comments</a></td>";
}
} 
else
{
echo "<td>&nbsp;</td><td>&nbsp;</td>";
}
} 
else 
{
	echo "<td><a href=\"edit.php?id=".$post['pid']."\">Edit</a></td>";
	echo "<td><a href=\"delete.php?id=".$post['pid']."\">Delete</a></td>";
	echo "<td><a href=\"comments.php?id=".$post['pid']."\">Comments</a></td>";
	
}
echo "</tr>";
if($color1 == 1){
$color1 = 0;
} else {
$color1 = 1;
}
}
?>
</table>
<?
include("../inc/footer.inc.php");
?>