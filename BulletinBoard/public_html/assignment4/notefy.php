<?php
ob_start();

$admincheck = 1;
$page = "Notification";
include("inc/mainheader.inc.php");
include("inc/logincheck.inc.php");

if($_POST['action'] == "save")
{

    if($_POST['dis_posts'] == "")
    {
    	echo "<b>You did not type in the requires criteria. Please go <a href=\"javascript:history.go(-1)\">back</a> and try again</b>";
    	ob_end_flush();
    	exit();
    }

    if(isset($_REQUEST['msg']))
    {
        echo "<font color=\"#FF0000\">";
        echo $_REQUEST['msg'];
        echo "<BR></font>";
    }
    
    $dp = $_SESSION['uid'];
    $mp = $_POST['dis_comments'];
    $cp = $_POST['dis_posts'];


    $sel_uid=$_POST['dis_comments'];
    $q1 = $database->query("select * from users where username='$sel_uid'");
    $q2 = mysql_fetch_array($q1);
    $uid = $q2[uid];

   $database->query("INSERT INTO `notes` ( `email2_uid` , `poster_uid` ,`condition`)VALUES ('$dp', '$uid', '$cp')");
    
}
?>

<h3>Please choose the Notification Criteria :</h3><BR><BR>

<form action="notefy.php" method="post">
<input type="hidden" name="action" value="save">


<table align="center">



<tr>
    <td>
        Notify me for the Keywords :  
    </td>
    <td>
        <input type="text" name="dis_posts" ><br><br>
    </td>
</tr>
<tr>
    <td>
        All post by : 
    </td>
    <td>
       <?php
		$users=$database->query("select * from users");
		echo "<select name='dis_comments' size='1'>";
		echo "<option>Select</option>";
		while($users2=mysql_fetch_array($users))
		{ 
	   		echo "<option>$users2[username]</option>";
		}

	?>

    </td>
</tr>



<tr>
    <td colspan="2">
    <div align="right">
    <br><input type="submit"  value="Save">
    
    </div>
    </td>
</tr>






</table>


</form>
<?
  
include("inc/footer.inc.php");
ob_end_flush();
?>