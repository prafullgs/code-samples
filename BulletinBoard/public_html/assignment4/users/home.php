<?php

//ob_start();

$path = "../";

$bypassclose = 1;

$admincheck = 1;
$page = "User Details";
include("../inc/mainheader.inc.php");

if(isset($_SESSION['uid'])){
//header("Location: index.php");
ob_end_flush();

}

?>
<b>Stats</b><BR>
<table width="90%" class="tblborder" align="center">
<?

$query = $database->query("SELECT * FROM users");
$color1 = 0;

echo "<tr align=\"center\" width=\"100%\">\n";
echo "<td valign=\"top\" class=\"dark\"><b>User Name</b></td><td valign=\"top\" class=\"light\"><b>Date of Joining</b></td>\n";
	echo "<td valign=\"top\" class=\"dark\"><b>User Ranking</b></td><td valign=\"top\" class=\"light\"><b>Number of Posts</b></td>\n";
	echo "<td valign=\"top\" class=\"dark\"><b>Last Post At</b></td><td valign=\"top\" class=\"light\"><b>Number of Comments</b></td>\n";
	echo "<td valign=\"top\" class=\"dark\"><b>Last Comment At</b></td>\n";
	echo "</tr>\n";

	
$date2 = time();

while($userlist = $database->fetch_array($query))
{
	
	$user = $userlist['uid'];
	$userName = $userlist['username'];
	$joinDate = $userlist['date_join'];
	
	$numberPosts = mysql_query("select count(*) as num from blog where uid = $user");
	$numberPosts = mysql_fetch_array($numberPosts);
	$postCount = $numberPosts['num'];
	
	$numberComments = mysql_query("select COUNT(*)as comnt from comments where uid = $user");
	$numberComments = mysql_fetch_array($numberComments);
	$commentCount = $numberComments['comnt'];
	
	$lastComment = mysql_query("select date_time as cmntTime from comments  where uid = $user");
	$lastComment = mysql_fetch_array($lastComment);
	$comment = $lastComment['cmntTime'];

	$lastPost = mysql_query("select date_time as postTime from blog  where uid = $user");
	$lastPost = mysql_fetch_array($lastPost);
	$post = $lastPost['postTime'];
	
	$date1 = $joinDate;
	$dateArr = explode("-",$date1);
	$date1Int = mktime(0,0,0,$dateArr[1],$dateArr[2],$dateArr[0]) ;
	
	//Date2 = todays date AND date1 = join date
	$date_calc = $date2-$date1Int;
	

	$ranking = "No Rank Assigned";
	
	$tempRank = $postCount + $commentCount;
	if($tempRank <= 5)
		$ranking = "New Bie";
	else if($tempRank >5 && $tempRank <= 15)
		$ranking = "User";
	else 
		$ranking = "Expert";
	


	echo "<tr align=\"center\" width=\"100%\">\n";
	echo "<td valign=\"top\" class=\"dark\"><b>".$userName."</b></td><td valign=\"top\" class=\"light\"><b>".$joinDate."</b></td>\n";
	echo "<td valign=\"top\" class=\"dark\"><b>".$ranking."</b></td><td valign=\"top\" class=\"light\"><b>".$postCount."</b></td>\n";
	echo "<td valign=\"top\" class=\"dark\"><b>".$post."</b></td><td valign=\"top\" class=\"light\"><b>".$commentCount."</b></td>\n";
	echo "<td valign=\"top\" class=\"dark\"><b>".$comment."</b></td>\n";
	echo "</tr>\n";


	
	
}


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