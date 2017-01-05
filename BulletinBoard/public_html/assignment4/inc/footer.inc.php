<?
?>
</td>
		<?
		if($showside == "1"){
		?>
		<td width="25%" valign="top">
		<?
		if($page == "Latest Updates" || $page == "Showing Individual Post"){
		?>
		<!--Begin About-->
				<table cellpadding="8" cellspacing="0" border="0" width="99%" align="center" class="sidebox">
				<tr>
				<td width="100%" class="sideboxheader">
					About
				</td>
				</tr>
				<tr>
				<td class="sideboxcontent">
				<?
				if($page == "Latest Updates"){
				
				echo $settings['description'];
				
				} elseif($page == "Showing Individual Post") {
				$rs = $database->query("select pid from blog where pid = '".$post['pid']."'");
				$garbage = $database->fetch_array($rs);
				if( $garbage == null)
				{

                                echo "INVALID POST ID";
				
				}
					
				else
				{
			        $result=$database->query ("SELECT UNIX_TIMESTAMP(date_time) as epoch_time FROM blog WHERE pid = '".$post['pid']."'");
				$datedate = $database->fetch_array($result);
				$post['date_time'] = $datedate[0];
				$post['date_time'] = strtotime($settings['timeoffset']." hours",$post['date_time']);
				$post['date_time1'] = date("l, jS F Y",$post['date_time']);
				$post['date_time2'] = date("H:i:s",$post['date_time']);
				}
				?>
				This post was written on <? echo $post['date_time1']." at ".$post['date_time2']; ?>.<BR><BR>
				<?
				$commentquery = $database->query("SELECT * FROM comments WHERE pid = '".$_GET['id']."'");
				$comments = $database->num_rows($commentquery);
				echo $comments; ?> Comment(s)<BR>
				<?
				$commentquery = $database->query("SELECT * FROM comments WHERE pid = '".$_GET['id']."' && uid = '".$post['uid']."'");
				$comments = $database->num_rows($commentquery);
				echo $comments; ?> Comment(s) by Author<BR>
				<?
				}
				?>
				</td>
				</tr>
			</table>
		<!--End About-->
		<?
		}
		?>
		<BR>
		<?
		if($page == "Latest Updates"){
		?>
		<!--Begin Recent-->
				<table cellpadding="8" cellspacing="0" border="0" width="99%" align="center" class="sidebox">
				<tr>
				<td width="100%" class="sideboxheader">
					Latest Updates
				</td>
				</tr>
				<tr>
				<td class="sideboxcontent">
				<?
				$sql = "SELECT * FROM blog ORDER BY date_time DESC LIMIT 10";
				$query = mysql_query($sql);
				if($database->num_rows($query) < 1){
				  echo "<b>No posts</b>";
				  }
				while($post = mysql_fetch_array($query)){
				?>
				<a href="<? echo $path."showpost.php?id=".$post['pid']; ?>"><? echo $post['title']; ?></a><BR>
				<?
				}
				?>
				</td>
				</tr>
			</table>
		<!--End Recent-->
		<?
		}
		?>
		</td>
		<?
		}
		?>
	</tr>
</table>

</BODY>
</HTML>
