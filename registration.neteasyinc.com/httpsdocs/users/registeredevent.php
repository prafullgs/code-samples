<?php
include("../settings/config.php");
session_start();
$option = $_GET["q"];
$uid = $_SESSION['uid'];
//echo $uid;
//echo "option:".$option;
$reg_list = mysql_query("SELECT e.event_name, ro.option_name FROM user_registration_mapping AS urm, events AS e, registration_options AS ro WHERE e.id = urm.event_id AND e.status = 'Active' AND ro.id = urm.registration_option_id AND urm.user_id = '$uid'");
$reg_list_rows = mysql_num_rows($reg_list);

if($option == "1")
{
					if($reg_list_rows > 0)
					{
							 while($res = mysql_fetch_assoc($reg_list))
								{
									?>
									<tr><td colspan="2"><?php echo $res['event_name'] . "-" . $res['option_name'];?></td></tr>
					<?php
									}
									
					}
}
else
{
	echo "";
	}
					?>
