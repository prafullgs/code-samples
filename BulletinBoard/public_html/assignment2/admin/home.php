<?php
$path = "../";
$admincheck = 1;
$page = "Admin CP Home";
include("../inc/adminheader.inc.php");
?>
<b>Stats</b><BR>
<table width="90%" class="tblborder" align="center">
<?
//Start info table
$phpversion = phpversion();
$dbversion = mysql_get_server_info();
//$blogversion = $settings['version'];
$query = $database->query("SELECT * FROM blog");
$postcount = $database->num_rows($query);
//$query = $database->query("SELECT * FROM theme");
//$themecount = $database->num_rows($query);
$query = $database->query("SELECT * FROM users");
$usercount = $database->num_rows($query);
$query = $database->query("SELECT * FROM `users` WHERE `admin` = '1'");
$adminusercount = $database->num_rows($query);
//$query = $database->query("SELECT * FROM `users` WHERE `mod` = '1' AND `admin` <> '1'");
//$modusercount = $database->num_rows($query);
//$query = $database->query("SELECT * FROM `users` WHERE `mod` <> '1' AND `admin` <> '1'");
$normalusercount = $database->num_rows($query);
$query = $database->query("SELECT * FROM comments");
$commentscount = $database->num_rows($query);
	echo "<tr align=\"right\" width=\"100%\">\n";
	echo "<td valign=\"top\" class=\"dark\"><b>PHP Version</b></td><td valign=\"top\" class=\"light\">".$phpversion."</td>\n";
	echo "<td valign=\"top\" class=\"dark\"><b>MySQL Version</b></td><td valign=\"top\" class=\"light\">".$dbversion."</td>\n";
	echo "</tr>\n";
	echo "<tr align=\"right\" width=\"100%\">\n";
	echo "<td valign=\"top\" class=\"dark\"><b>Number of Admins</b></td><td valign=\"top\" class=\"light\">".$adminusercount."</td>\n";
	echo "<td valign=\"top\" class=\"dark\"><b>Number of Posts</b></td><td valign=\"top\" class=\"light\">".$postcount."</td>\n";
	echo "</tr>\n";
	echo "<tr align=\"right\" width=\"100%\">\n";
	echo "<td valign=\"top\" class=\"dark\"><b>Number of Users</b></td><td valign=\"top\" class=\"light\">".$usercount."</td>\n";
	echo "<td valign=\"top\" class=\"dark\"><b>Number of Comments</b></td><td valign=\"top\" class=\"light\">".$commentscount."</td>\n";
	echo "</tr>\n";
//Finish info table
?>
</table>
<BR>
<?
include("../inc/footer.inc.php");
?>