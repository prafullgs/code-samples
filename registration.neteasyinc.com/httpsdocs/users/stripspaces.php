<?php 
include("../settings/config.php");

$qry = mysql_query("SELECT id, username FROM user");

while($res = mysql_fetch_assoc($qry))
{
	$uname = $res['username'];
	$id = $res['id'];
	echo $uname. "\n";
	$name = str_replace (" ", "", $uname);
	echo $name. "\n";
	mysql_query("UPDATE user SET username='$name' WHERE id = '$id'");
}


?>
