<?php ob_start(); ?>
<?php 
session_start();
$mod = $_SESSION['mod'];
$admin = $_SESSION['admin'];
$siteid = $_SESSION['site_id'];
$msg = $_SESSION['msg'];
// set <strong class="highlight">timeout</strong> period in seconds
$inactive = 600;

// check to see if $_SESSION['<strong class="highlight">timeout</strong>'] is set
if(isset($_SESSION['timeout']) ) {
	$session_life = time() - $_SESSION['timeout'];
	if($session_life > $inactive)
        { session_destroy(); header("Location: ../logout"); }
}
$_SESSION['timeout'] = time();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	
	<title>Event List</title>
	
	<!--<link rel="shortcut icon" href="/favicon.ico">-->
	<link rel="stylesheet" type="text/css" href="style1.css" />
	<!--link href="http://<?php echo $hosted_url; ?>/styles/base.css" rel="stylesheet" type="text/css" media="all" -->
</head>
<body>
<?php
include("../settings/database.php");

if(isset($_SESSION['admin']) || $_SESSION['mod'])
{
	//echo $_SESSION['admin'];
$event_rec = mysql_query("SELECT id,event_name,location_city,location_phone,start_date,end_date, status from events WHERE site_id = '$siteid'");
?>
<center>
<h1>Event list </h1>

<table>
<tr>
<td><div align="right">
<a href ="main"> Home</a>|<a href="../logout">Logout</a></div>
</td></tr>
<tr>
<td>
<table border = "1" align="center">
<tr>
<td></td>
<th>Event Name</th>
<th>Location</th>
<th>Phone</th>
<th>Start date</th>
<th>End date</th>
<th></th>
<th></th>
</tr>
<?php
$i = 0;
while($event_list = mysql_fetch_assoc($event_rec))
{ 
	$i +=1;
	$event_id = $event_list['id']; 
	$startdate =$event_list['start_date'];
	$startdate = substr($startdate, 0,10);
	$enddate = $event_list['end_date'];
	$enddate = substr($enddate, 0,10);
	?>
	<tr>
	<td><?php echo $i; ?></td>
	<td><a href = "edit.php?id=<?php echo $event_id;?>"><?php echo $event_list['event_name']; ?></a></td>
	<td><?php echo $event_list['location_city']; ?></td>
	<td><?php echo $event_list['location_phone']; ?></td>
	<td><?php echo $startdate; ?></td>
	<td><?php echo $enddate; ?></td>
	<td><a href = "showusers.php?id=<?php echo $event_id;?>">Registered Users</a></td>
	</tr>
	
	<?php
	
}

?>
</table>
<!--div id ="show_msg"><?php //if($msg == 'set'){ echo "<span color = 'red'>No Users registered for this event</span>";  
 // unset ($_SESSION['msg']); }?></div-->
<h3>

<!-- a href="addevent.php?id=<?php echo $site_id;?>">Add Event</a></h3>
</center>
<form name="addevent" id="addevent" method="POST" action="addevent">
</form -->
</table>
</td>
</tr>
</table>
</body>
</html>
<?php
}
else
{
header('Location: ../userlogin');
}

?>
<? ob_flush(); ?> 
