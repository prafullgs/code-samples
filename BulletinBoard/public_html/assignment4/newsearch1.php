<?
ob_start();
$page = "Search";
include("inc/mainheader.inc.php");
?>
<html>
<body>
<table align='top' border="0" cellspacing="0" cellpadding="0" width="100%">
				    <tr>
                       <td style="width:10px">
                        </td> 
                        <td style="width:95%">
                            <table style=" width:100%">
							
															
							<tr  COLOR: #ffffff" >
   
								<td colspan=2 align="center" style=" width:90%; height:20px">
									 <b>Forum Search</b>
								</td>
							</tr>
								
							<tr align="center" class="content_font" style="color:#000040">
								<td colspan=2 align="center" style="width=100%">
								<form id='search_bar' action='./advancedSearchResults.php' method='post'>
								
								<table style="width=100%">
									
									<tr style="width=100%">
										<td align="center" colspan=2 style="background-color:	#DCDCDC;width=100%; height:20px">
											<table align='center'>
												<tr align='center'>
													<td>
														Search by Key Word:
													</td>
													<td>
														<INPUT type="text" id=searchKey name=searchKey style="width:200px" value="Enter Key Word" onFocus="if(this.value == 'Enter Key Word') this.value = '';" onBlur="if(this.value == '') this.value = 'Enter Key Word';"> 
													</td>
												</tr>
											</table>
										
									</tr>
									
									 <tr>
										<td colspan=1 style="background-color:	#DCDCDC; width=50%;height:20px">
											Select any number of users:
												<div style="overflow:auto;width:250px;height:95px;padding-left:5px;background-color:#FFFFFF">
													<input type="checkbox" name="userchoice[]" checked="true" value="0" onclick="SetAllCheckBoxes('registerComp', 'userchoice[]');"> All Users<br>
													<?php
														//$connect = mysql_connect("localhost", "syarrado", "fJiWFH4H")  or
													     //die ("Hey loser, check your server connection.");

														//make sure we're using the right database
														//mysql_select_db ("syarrado");

														$query="SELECT uid as user_id FROM users order by uid;";
														$results=mysql_query($query)
																or die(mysql_error());
														while ($rows=mysql_fetch_assoc($results)) 
														{													
														
														echo "<input type='checkbox' name='userchoice[]' value='".$rows['user_id']."'> ".$rows['user_id']."</br>";	

														}
													?>												
												</div>
										</td>
										
										<td colspan=1 style="background-color:	#DCDCDC; width=50%;height:20px">
											<table>
											
											<tr>
											<td>
												Select any number of forums
												<div style="overflow:auto;width:350px;height:95px;padding-left:5px;background-color:#FFFFFF">
												<input type="checkbox" name="forumchoice[]" checked="true" value="0" onclick="SetAllCheckBoxes('registerComp', 'forumchoice[]');"> All Open Forums<br>
													<?php
														//$connect = mysql_connect("localhost", "syarrado", "fJiWFH4H")  or
													     //die ("Hey loser, check your server connection.");

														//make sure we're using the right database
														//mysql_select_db ("syarrado");

														$query="SELECT pid as forum_id,title as forum_name FROM blog;";
														$results=mysql_query($query)
																or die(mysql_error());
														while ($rows=mysql_fetch_assoc($results)) 
														{
														echo "<input type='checkbox' name='forumchoice[]' value='".$rows['forum_id']."'> ".$rows['forum_name']."</br>";	
														//echo "<option value='".$rows['']."'>".$rows['subTopicName']."</option>";	
														}
													?>												
												</div>
												
											</td>
											</tr>
											</table>
										</td></tr>
									<tr>
										<td align="center" colspan=2 style="background-color:	#DCDCDC; width=50%;height:20px">
										<INPUT TYPE=SUBMIT VALUE="Submit">
										</td>
										
									</tr>
</table>
</form>
</table>
</table>
</body>
</html>