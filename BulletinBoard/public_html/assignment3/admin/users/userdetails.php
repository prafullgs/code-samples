<?php
ob_start();

if($_POST['action'] == "new"){
$path = "../";
$modcheck = 1;
include("../inc/global.php");
include("../inc/checks.php");
$database->query("INSERT INTO blog SET content = '".$_POST['content']."', title = '".$_POST['subject']."', image = '".$_POST['image']."', `float` = '".$_POST['float']."', uid = '".$_SESSION['uid']."', date_time = now(), month_date = '".date(F)." ".date(Y)."'");
header("Location: home.php");
ob_end_flush();
exit();
}
$path = "../";
$modcheck = 1;
$page = "Edit a post";
include("../inc/adminheader.inc.php");
?>
<table>
<tr>
<td>


<script src="editor.js" language="javascript" type="text/javascript"></script>
<form action="new.php" method="post" name="editform">
<input type="hidden" name="action" value="new">
Subject : <input type="text" name="subject" size="50"><BR>
<input type="button" accesskey="b" value=" BOLD  " name="bold" onclick="javascript:tag('b', '[b]', ' BOLD*', '[/b]', ' BOLD  ', 'bold');" style="font-family:Verdana; font-size:10px; font-weight:bold; margin:2px;">
<input type="button" accesskey="i" value=" ITALICS  " name="italics" onclick="javascript:tag('c', '[i]', ' ITALICS*', '[/i]', ' ITALICS  ', 'italics');" style="font-family:Verdana; font-size:10px; margin:2px;">
<input type="button" accesskey="u" value=" UNDERLINE  " name="underline" onclick="javascript:tag('f', '[u]', ' UNDERLINE*', '[/u]', ' UNDERLINE  ', 'underline');" style="font-family:Verdana; font-size:10px; margin:2px;">
<input type="button" accesskey="i" value=" CENTER  " name="center" onclick="javascript:tag('g', '[center]', ' CENTER*', '[/center]', ' CENTER  ', 'center');" style="font-family:Verdana; font-size:10px; margin:2px;">
<input type="button" accesskey="l" value=" http://  " name="http" onclick="javascript:tag('d', '[url]', ' http://*', '[/url]', ' http://  ', 'http');" style="font-family:Verdana; font-size:10px; margin:2px;">
<input type="button" value=" IMG  " name="img" onclick="javascript:tag('e', '[img]', ' IMG*', '[/img]', ' IMG  ', 'img');" style="font-family:Verdana; font-size:10px; margin:2px;">
<BR>
<textarea rows="15" cols="45" name="content"></textarea>
</td>
</tr></table>
<input type="submit" value="Post">
</form>
<?
include("../inc/footer.inc.php");
ob_end_flush();
?>