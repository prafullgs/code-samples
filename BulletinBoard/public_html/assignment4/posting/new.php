<?php
ob_start();

if($_POST['action'] == "new"){
$path = "../";
$modcheck = 1;
include("../inc/global.php");
include("../inc/checks.php");

function send_email($email,$type)
{
			$sendto = $email; // this is the email address collected form the form
			$ccto = "sagar.sk1@gmail.com"; // cc it to yourself
			
			$subject = "MoviesBB - Notification Alert"; // Subject
			$messagebody = "This email is sent to indicate that a post of your interest has been made....\r\n";

			if($type == 'multipart/alternative')
			{
				$header = "MIME-Version: 1.0\r\n";
				$header .= "Content-type: multipart/alternative; boundary=\"$boundary\"\r\n";
				$header .= "CC: " . $cc . "\r\n";
				$header .= "BCC: " . $bcc . "\r\n";		
				$message = "This is a Multipart Message in MIME format\n";
				$message .= "--$boundary\n";
				$message .= "Content-type: text/html; charset=iso-8859-1\n";
				$message .= "Content-Transfer-Encoding: 7bit\n\n";
				$message .= $messagebody . "\n";
				$message .= "--$boundary\n";
				$message .= "Content-Type: text/plain; charset=\"iso-8859-1\"\n";
				$message .= "Content-Transfer-Encoding: 7bit\n\n";
				$message .= $messagebody . "\n";
				$message .= "--$boundary--";
			}
			else
			{
				$header = "Content-type: $type;\r\n";
				$header .= "CC: " . $cc . "\r\n";
				$header .= "BCC: " . $bcc . "\r\n";
				$message = "This email is sent to indicate that a post of your interest has been made....\r\n";
			}
  			// This is the function to send the email
			$mailsent = mail($sendto, $subject, $message, $header);  
			
			if ($mailsent) 
			{
	  			//echo "Your Password has been Email Address.  <br><br>";
				echo "<b>A Email indicating the a post of your interest has been made is sent to :". $email."<br><br></b>";
			}
			else 
			{
 	 			echo "There was an error...";
			}
	}

$keyword=$_POST['dis_posts'];

$database->query("INSERT INTO blog SET content = '".$_POST['content']."', title = '".$_POST['subject']."', image = '".$_POST['image']."', `float` = '".$_POST['float']."', uid = '".$_SESSION['uid']."', date_time = now(), month_date = '".date(F)." ".date(Y)."'");
$posters_uid = $_SESSION['uid'];
$query = $database->query("select * from notes where poster_uid = $posters_uid");

while($getdata = $database->fetch_array($query))
{
	
	$email_uid = $getdata['email2_uid'];	
	$usernamecheckquery = $database->query("SELECT * FROM users WHERE uid = $email_uid");
	$get_email = mysql_fetch_array($usernamecheckquery);
	$cond = $getdata['condition'];
	$email = $get_email['email'];	
	$type = $get_email['email_type'];
	echo "Email : ".$email;
	echo "";
	if($cond != NULL)
	{
		$usermsgs=$database->query("select * from blog where match(content) AGAINST ('+$keyword*' IN BOOLEAN MODE)");
 		$usermsgs = mysql_num_rows($usermsgs);
		if($usermsgs != 0)
		send_email($email,$type);
	}

send_email($email,$type);

}

header("Location: home.php");
ob_end_flush();
exit();
}
$path = "../";
$modcheck = 1;
$page = "Edit a post";
//include("../inc/adminheader.inc.php");
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