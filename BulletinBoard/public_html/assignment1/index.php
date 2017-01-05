<?
$showside = "1";
$page = "Home";
include("inc/mainheader.inc.php"); 
$query = $database->query("SELECT * FROM `blog` ORDER BY `date_time` DESC LIMIT ".$settings['display_posts']);
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
while ($post = $database->fetch_array($query)){
include("inc/posttemp.php");
}
include("inc/footer.inc.php");
?>