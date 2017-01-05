<?

$showside = "1";
$page = "Showing Individual Post";
include("inc/mainheader.inc.php");
$sql = "SELECT * FROM blog WHERE pid = '".$_GET['id']."';";
$query = mysql_query($sql);

$post = mysql_fetch_array($query);
$includecomments = "1";
include("inc/posttemp.php");
?>
<?
include("inc/footer.inc.php");
?>