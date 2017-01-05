<?php

ob_start();
//$showside = "1";
$page = "Post Reply";
include("inc/mainheader.inc.php"); 
$comid = $_GET['cid'];
$ppid = $_GET['id'];

//include("inc/global.php");

echo "<tr><td><table cellpadding=\"8\" cellspacing=\"0\" width=\"75%\" align=\"justify\" class=\"postbox\"><tr><td width=\"100%\" class=\"postcontent\">";
				
				if(isset($_SESSION['uid'])){
				
				echo "<div align=\"center\"><form action=\"replycomment.php?ccid=$comid&ppid=$ppid\" method=\"post\"><input type=\"hidden\" name=\"cid\" value=\"".$comment['cid']."\"><textarea rows=\"5\" cols=\"30\" name=\"comment\"></textarea><BR><input type=\"submit\" value=\"Post Comment\"></form></div>";
				
				} else {
				echo "<b>You cannot make any comments on this post as you are not logged in. Please login to take advantage of making comments</b>";
				}
				
			echo "</td>			</tr>			</table>			</td></tr>			</table>";
			
include("inc/footer.inc.php");

?>			
