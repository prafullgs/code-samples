<?php ob_start(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	
	<title>User List</title>
	<!--<link rel="shortcut icon" href="/favicon.ico">-->
	<link rel="stylesheet" type="text/css" href="style1.css" />
	<script type="text/javascript" src="setstatus.js"></script>
	
	
</head>
<body>
<?php
$event_id = $_GET['id'];
$e_id = $_GET['id'];
include("../settings/database.php");
session_start();
$inactive = 300;


// check to see if $_SESSION['<strong class="highlight">timeout</strong>'] is set
if(isset($_SESSION['timeout']) ) {
	$session_life = time() - $_SESSION['timeout'];
	if($session_life > $inactive)
        { session_destroy(); header("Location: ../users/logout"); }
}
$_SESSION['timeout'] = time();

if(isset($_SESSION['admin']) || isset($_SESSION['mod']) )
{
$event_id = $_GET['id'];
//echo $event_id;

$event_name = mysql_query("SELECT event_name FROM events WHERE id='$event_id'");
$event_name = mysql_fetch_assoc($event_name);

/*
$users = mysql_query("SELECT u.id uid, urm.id, urm.status, urm.payment_status, urm.registered_date, urm.updated_date, urm.payment_method, u.first_name, u.last_name, u.email, u.badge_name, ro.option_name FROM user AS u, user_registration_mapping AS urm, registration_options  AS ro WHERE urm.user_id = u.id AND urm.registration_option_id = ro.id  AND  urm.event_id = '$event_id'");
*/

$users = mysql_query("SELECT distinct u.id, u.first_name, u.middle_initial, u.last_name, u.aicp, u.badge_name, u.title, u.employer, u.email, urm.registered_date, urm.updated_date, q.quantity, q.Price, q.Cost, urm.payment_method, urm.payment_status,urm.status, ro.option_name FROM   user AS u, registration_options AS ro, quantities AS q INNER JOIN user_registration_mapping AS urm WHERE q.user_id = urm.user_id AND q.event_id = urm.event_id AND q.option_id = urm.registration_option_id AND ro.id= urm.registration_option_id AND u.id = q.user_id AND urm.event_id = '$event_id' order by q.user_id asc");


if(mysql_num_rows($users) == 0)
{
	$_SESSION['msg']= "set";
	header('Location: list');
}

if(isset($_SESSION['msg']))
{
	echo "No users registered for this account";
	unset($_SESSION['msg']);
	}
?>



<center>
<h1><?php echo $event_name['event_name']; ?></h1>
<table>
<tr>
<td><div align="right">
|<a href="status_report.php?site_id=1&e_id=<?php echo $event_id; ?>">Generate Excel report</a>|<a href="showusers">Back</a>|<a href="../logout">Logout</a></div>
</td></tr>
<tr>
<td>
<table border = "1">
<tr>
<td>User_Id</td>
<th>First Name</th>
<th>MI</th>
<th>Last Name</th>
<th>AICP</th>
<th>Badge Name</th>
<th>Title</th>
<th>Employer</th>
<th>Email</th>
<th>Registered For</th>
<th>Registered Date</th>
<th>Updated Date</th>
<th>Qty</th>
<th>Price</th>
<th>Total</th>
<th>Method</th>
<th>Payment</th>
<th>Status</th>

</tr>

<?php
$i = 0;
while($reg_list = mysql_fetch_assoc($users))
{
	
	$i +=1;
	?>
	<tr>
	<td><?php echo $reg_list['id']; ?></td>
	<td><?php echo $reg_list['first_name']; ?></td>
	<td><?php echo $reg_list['middle_initial']; ?></td>
	<td><?php echo $reg_list['last_name']; ?></td>
	<td><?php echo $reg_list['aicp']; ?></td>
	<td><?php echo $reg_list['badge_name']; ?></td>
	<td><?php echo $reg_list['title']; ?></td>
	<td><?php echo $reg_list['employer']; ?></td>
	<td><?php echo $reg_list['email']; ?></td>
	<td><?php echo $reg_list['option_name']; ?></td>
	<td><?php echo  $reg_list['registered_date']; ?></td>
	<td><?php if($reg_list['updated_date']) {echo  $reg_list['updated_date'];} ?></td>
	<td><?php echo  $reg_list['quantity']; ?></td>
	<td><?php echo  $reg_list['Price']; ?></td>
	<td><?php echo  $reg_list['Cost']; ?></td>
	<td><?php echo  $reg_list['payment_method']; ?></td>
	<td>
	<select name="status" onchange="setstatus(this.value);">
	<option value=""><?php echo  $reg_list['payment_status']; ?></option>
	<option value="<?php echo "1-".$reg_list['id']; ?>">Paid</option>
	</select>
	</td>
	<td><select name="status" onchange="setstatus(this.value);">
	<option value=""><?php echo  $reg_list['status']; ?></option>
	<option value="<?php echo "2-".$reg_list['id']; ?>">Attended</option>
	<option value="<?php echo "3-".$reg_list['id']; ?>">Cancelled</option>
	</select></td>
	</tr>
	<?php
}


?>

</table>
</td></tr>
</table>


</center>

</body>
</html>
<?php
}
else
{
	header('Location: ../logout');
}
?>
<? ob_flush(); ?> 
