<?

if(!isset($_SESSION['uid'])){
  ?>
  <table cellpadding="8" cellspacing="0" width="99%" align="center" class="postbox">
<tr>
<td width="100%" class="postcontent">
  <?
    echo "<b>You must be logged in to access this page.</b>";
    ?>
    </td></tr></table>
    <?
	include($path."inc/footer.inc.php");
	exit();
  }
?>