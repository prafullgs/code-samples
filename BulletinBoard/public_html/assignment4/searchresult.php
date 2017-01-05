<?php

ob_start();
$page = "Search";
include("inc/mainheader.inc.php");

if(isset($_POST['search']))
{ 

	$flag = 0;
  	$j = 0;
	$keyword=$_POST['wordsearch'];


  if($_POST['userdroplist'] != NULL)
  {
	  
	   $q1 = $database->query("select * from users where username='$seluser'"); 
		$q2 = mysql_fetch_array($q1);
			$uid = $q2[uid];
          $query = $databse->query("SELECT  * from comments WHERE MATCH(comment) AGAINST('".addslashes($_POST['wordsearch'])."' IN BOOLEAN MODE) AND uid = '$uid'");
          
	  if(!isset($_POST['All']))
	  {
		  if(sizeof($_SESSION['forums'])>0)
		  {

              for($i=0; $i<sizeof($_SESSION['forums']); $i++)
			  {
                  if(isset($_POST[$_SESSION['forums'][$i]]))
				  {
					   if($flag==0)
					   {
             			  $query = $query.' AND (';					   
						  $flag = 1;
					   }
				       if( $j != 0 )
					   $query=$query." or ";

				       $query = $query." SubCategory_ID=".$_SESSION['forums'][$i]." ";	

					    if($j == 0)
						   $j=1;
				  }

			  }
              if($j == 1)
    			  $query = $query.")";
		  }
	  
	  }
        if($_POST['query'] == "")
         $query = "SELECT  Response_ID,SubCategory_ID,ToThread_ID,SUBSTRING(Subject,1,40) Subject,SUBSTRING(Description,1,160) Description FROM(
                       SELECT  Response_ID,SubCategory_ID,ToThread_ID,Subject,Description,UserName  FROM
                       A4_Users, A4_Responses_MYISAM WHERE A4_Users.User_ID = A4_Responses_MYISAM.User_ID ) AS posts WHERE  UserName = '".$_POST["user"]."'";
 
	 
  }
  else
  {
      $query = "SELECT  Response_ID,SubCategory_ID,ToThread_ID,SUBSTRING(Subject,1,40) Subject,SUBSTRING(Description,1,160) Description FROM(
                       SELECT  Response_ID,SubCategory_ID,ToThread_ID,Subject,Description,UserName  FROM
                       A4_Users, A4_Responses_MYISAM WHERE A4_Users.User_ID = A4_Responses_MYISAM.User_ID ) AS posts WHERE 
                       MATCH(posts.Subject,posts.Description) AGAINST('".addslashes($_POST['query'])."' IN BOOLEAN MODE) ";

     if(!isset($_POST['all']))
	  {
		  if(sizeof($_SESSION['forums'])>0)
		  {
           print_r($_SESSION['forums']);
              for($i=0; $i<sizeof($_SESSION['forums']); $i++)
			  {
                  if(isset($_POST[$_SESSION['forums'][$i]]))
				  {
					   if($flag==0)
					   {
             			  $query = $query.' AND ( ';					   
						  $flag = 1;
					   }
				      
					   if( $j != 0 )
					   $query=$query." or ";
                      
				       $query = $query." SubCategory_ID=".$_SESSION['forums'][$i]." ";	
                      
					   if($j == 0)
						   $j=1;
					   
				  }

			  }
              if($j == 1)
			      $query = $query." ) ";
		  }
	  
	  }
  }

 
  $results = mysql_query($query) or die('search query failed'.mysql_error()); 

  if(mysql_numrows($results) > 0)
  {
				
				 while($comment = mysql_fetch_assoc($userposts))
				{
					$cmnt = strip_tags($comment['comment']);
					$cmnt = nl2br($cmnt);
					echo "<table cellpadding=\"8\" cellspacing=\"0\" width=\"75%\" align=\"justify\" class=\"postbox\"><tr><td width=\"100%\" class=\"postcontent\">".$cmnt."<BR><div class=\"postinfo\">";
					$commentauthorquery = $database->query("SELECT * FROM users WHERE uid = '".$comment['uid']."'");
					$commentauthor = $database->fetch_array($commentauthorquery);
					echo "Comment Written by ".$commentauthor['username']."<BR>";
					$result=$database->query ("SELECT UNIX_TIMESTAMP(date_time) as epoch_time FROM comments WHERE cid = '".$comment['cid']."'");
					$datedate = $database->fetch_array($result);
					$comment['date_time'] = $datedate[0];
					$comment['date_time'] = strtotime($settings['timeoffset']." hours",$comment['date_time']);
					$comment['date_time'] = date($settings['dateformat']." ".$settings['timeformat'],$comment['date_time']);
					echo $comment['date_time'];
					echo "<BR><a href=\"postreply.php?id=".$post['pid']."&cid=".$comment['cid']."\">";
					echo "Post Reply </a>";
					echo "<b> Go <a href=\"javascript:history.go(-1)\">back</a></b>";
					echo "</div></td></tr></table></td></tr>";
				}
			}
	}
	else 
			
	{
	?>
	<table cellpadding="8" cellspacing="0" width="99%" align="center" class="postbox" bgcolor = "white">
	<tr><td>
	
	<form action="searchresult.php" method="post" style="font-weight:bold;">
	<br>
	<table align="center" border="0">
	<tr align="center">
	<td>Search by this exact wording or phrase:</td>
	<td><input type="text" name="wordsearch" maxlength="60"></td>
	<td><b>OR </b>  Search for all post by User</td>
	<td>
	<?php
	$users=$database->query("select * from users");
	echo "<select name='userdroplist' size='1'>";
	echo "<option>Select</option>";
	while($users2=mysql_fetch_array($users))
	{ 
	   echo "<option>$users2[username]</option>";
	}
	?>
	</td>
	</tr>
	<tr>
	<!-- <td colspan="2">Select Post :<select name="userkeydroplist" size="1">-->
	<?php
	//echo "<option>All Posts</option>";
	$titles=$database->query("select * from blog");
	while($titles2=mysql_fetch_array($titles))
	{ 
		echo "<input type = \"checkbox\" name = '.$titles2[title].'>" .$titles2[title];
		echo "<br>";
	}
		echo "<input type = \"checkbox\" name = \"All\" value = \"All\" checked = \"true\" /> All ";
	?>

	
	</select>
	</td>
  
	</table>
       
	<br>
	<h1 align="center"><input type="submit" name="search" value="Search"></h1> 
	</form>
      
      </td></tr>
      </table>

<?php
}
include("inc/footer.inc.php");

?>