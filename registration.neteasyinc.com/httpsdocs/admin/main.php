<?php 
session_start();
include("../settings/config.php");


$site_id = $_SESSION['site_id'];
$_SESSION['site_id'] = $site_id;
$mod = $_SESSION['mod'];
$_SESSION['mod'] = $mod;
$admin = $_SESSION['admin'];
$_SESSION['admin'] = $admin;
$fname = $_SESSION['fname'];
$lname = $_SESSION['lname'];
$id = $_SESSION['id'];
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!-- TemplateBeginEditable name="doctitle" -->
<title>Registered users</title>
<!-- TemplateEndEditable -->
<!-- TemplateBeginEditable name="head" -->
<!-- TemplateEndEditable -->
<style type="text/css">
<!--
.table {
	color: #FFF;
}
-->
</style>
<link rel="stylesheet" type="text/css" href="style1.css" />
</head>

<body>
<?php echo "Welcome ".$fname." ".$lname; if($admin){ echo " (Administrator) ";}if($mod){echo "(Moderator)";}?>|<a href="list" title="View List of Events">Events</a>|<a href="../eventreg" title="Go to Event registration">Register</a>|<a href="status_report.php?gen=1&site_id=<?php echo $site_id; ?>">Generate Excel report</a>|<a href="../logout" title="Log off the system">Logout</a></p>
<?php 
$no_of_users= 0;
$qry = mysql_query("SELECT id, first_name, last_name, badge_name, city, state, phone, email, status FROM user WHERE site_id = '$site_id' order by id asc");
?><center><h2>Users registered </h2>
<table border="1" align="center" bgcolor="#CCCCCC">
<tr>
<th>User Id</th>
<th>Name</th>
<th>Badge name</th>
<th>Address</th>
<th>Phone</th>
<th>Email</th>
<th>User Role</th>
</tr>
<?php

while($res = mysql_fetch_assoc($qry))
{
	$no_of_users=$no_of_users + 1;
	$role = $res['status'];
	if($role == 0)
	{
		$stat = "User";
		}
		if($role == 1)
	{
		$stat = "Moderator";
		}
		if($role == 2)
	{
		$stat = "Admin";
		}
	?>
	<tr>
	<td><?php echo $res['id']; ?></td>
	<td><?php echo $res['first_name']." ".$res['last_name'];?></td>
	<td><?php echo $res['badge_name'];?></td>
	<td><?php echo $res['city']. " ".$res['state'];?></td>
	<td><?php echo $res['phone']; ?></td>
	<td><?php echo $res['email']; ?></td>
	<td><?php echo $stat; ?></td>
	</tr>
	<?php
	}
	?>
	</table>
	<?php
echo "Total number of registered users : ".$no_of_users;
?>
</center>
