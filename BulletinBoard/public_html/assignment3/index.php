<?
$showside = "1";
$page = "Home";
include("inc/mainheader.inc.php"); 

//$query = $database->query("SELECT * FROM `blog` ORDER BY `date_time` DESC LIMIT ".$settings['display_posts']);
// pagination ****************************************************************************************************
if (isset($_GET['pageno'])) {
   $pageno = $_GET['pageno'];
} else {
   $pageno = 1;
} // if

//$query = "SELECT count(*) FROM table WHERE ...";
//$result = mysql_query($query);//, $db) or trigger_error("SQL", E_USER_ERROR);
$query = $database->query("SELECT * FROM `blog` ORDER BY `date_time` ");
//$query_data = mysql_num_rows($query);
$numrows = mysql_num_rows($query);
$set_sql = $database->query("select * from d_settings");
$set_b = mysql_fetch_array($set_sql);
$rows_per_page = $set_b[0];


$lastpage      = ceil($numrows/$rows_per_page);
//$lastpage = 3;

$pageno = (int)$pageno;
if ($pageno > $lastpage) {
   $pageno = $lastpage;
} // if
if ($pageno < 1) {
   $pageno = 1;
} // if

//$limit = 3;
$limit = 'LIMIT ' .($pageno - 1) * $rows_per_page .',' .$rows_per_page;

//$query_p = "SELECT * FROM table $limit";
$query_p = $database->query("SELECT * FROM `blog` ORDER BY `date_time` DESC $limit"); //DESC LIMIT ".$settings['display_posts']);
$result_p = mysql_query($query_p);// or trigger_error("SQL", E_USER_ERROR);
//... process contents of $result ...
while ($post = $database->fetch_array($query_p)){
include("inc/posttemp.php");
}

if ($pageno == 1) {
   echo " FIRST PREV ";
} else {
   echo " <a href='{$_SERVER['PHP_SELF']}?pageno=1'>FIRST</a> ";
   $prevpage = $pageno-1;
   echo " <a href='{$_SERVER['PHP_SELF']}?pageno=$prevpage'>PREV</a> ";
} // if

echo " ( Page $pageno of $lastpage ) ";

if ($pageno == $lastpage) {
   echo " NEXT LAST ";
} else {
   $nextpage = $pageno+1;
   echo " <a href='{$_SERVER['PHP_SELF']}?pageno=$nextpage'>NEXT</a> ";
   echo " <a href='{$_SERVER['PHP_SELF']}?pageno=$lastpage'>LAST</a> ";
} // if



// **************************************************************************************
if($database->num_rows($query) < 1 ){
  ?>
  <table cellpadding="8" cellspacing="0" width="99%" align="center" class="postbox"><tr><td class="postcontent">
  <b>There are currently no posts in your blog. To make posts follow this simple guide:</b><BR>
  <ol>
  <li>Login using the link above</li>
  <li>Once you are logged in follow the link to the Posting CP</li>
  <li>Click the New Post link. This should load up a page where you can type out a post</li>
  <li>Compose your post</li>
  <li>Click the "Post" button</li>
  <li>Click the "View Your Blog" link</li>
  <li>And there you have it. Your first post!!!</li>
  </ol>
  </td></tr></table>
  <?
  }
  
//while ($post = $database->fetch_array($query)){
//include("inc/posttemp.php");
//}
include("inc/footer.inc.php");
?>