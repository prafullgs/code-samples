<?
ob_start();
header("Content-Type: text/xml\n");
$_SERVER['PHP_SELF'] = str_replace("/rss.php","",$_SERVER['PHP_SELF']);
echo "<?xml version=\"1.0\"?>\n";
include("inc/global.php");
$sql = "SELECT * FROM blog ORDER BY date_time DESC LIMIT 1;"; //.$settings['numberrss'];
$query = $database->query($sql);
echo "	<rss version=\"2.0\">
	<channel>
		 <title>".$settings['blogname']."</title>
		<description>".$settings['blogname']." -- Latest Updates</description> 
		<generator>Movies BB -- http://mln-web.cs.odu.edu/~skulkarn/assignment4</generator>
		<link>http://".$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF']."</link>";
while ($post = mysql_fetch_array($query)){
echo "<item><title>".$post['title']."</title>";
$sql1 = "SELECT * FROM users WHERE uid = '".$post['uid']."' LIMIT 1;";
$query1 = $database->query($sql1);
$user = $database->fetch_array($query1);
echo "<author>".$user['email']." (".$user['username'].")</author> <description> <![CDATA[".$post['content']."]]></description>\n";
echo "<link>http://".$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF']."/showpost.php?id=".$post['pid']."</link> </item>";
}

echo "</channel> </rss>";
ob_end_flush();
?>