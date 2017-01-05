<?php ob_start(); ?>
<?php
include("../settings/config.php");
$generate = $_GET['gen'];
$site_id = $_GET['site_id'];
$eid = $_GET['e_id'];
$no_of_users= 0;
$cdate = date("Y-m-d"); // get current date
$e_data = "SELECT event_name FROM events WHERE id =".$eid;
$e_res = mysql_query($e_data);
$event_name = mysql_fetch_assoc($e_res);
$event_name = str_replace (" ", "", $event_name['event_name']);

if($eid != "")
{
$query_string = "SELECT distinct u.id UserId, u.first_name FirstName, u.middle_initial MI, u.last_name LastName, u.aicp AICP, u.badge_name BadgeName, u.title Title, u.employer Employer, u.email Email, ro.option_name RegisteredFor, urm.registered_date RegisteredDate, urm.updated_date UpdatedDate, q.quantity Qty, q.Price Price, q.Cost Total, urm.payment_method PaymentMethod, urm.payment_status PaymentStatus,urm.status Status FROM   user AS u, registration_options AS ro, quantities AS q INNER JOIN user_registration_mapping AS urm WHERE q.user_id = urm.user_id AND q.event_id = urm.event_id AND q.option_id = urm.registration_option_id AND ro.id= urm.registration_option_id AND u.id = q.user_id AND urm.event_id = '".$eid."' order by q.user_id asc";

}
else
{
$query_string = "SELECT id, first_name, last_name, badge_name, city, state, phone, email, status FROM user WHERE site_id = '$site_id' order by id asc";

}

// connect to mysql server

// query from table
$result = mysql_query($query_string);

$count = mysql_num_fields($result);

// fetch table header
$header = '';
for ($i = 0; $i < $count; $i++){
	$header .= mysql_field_name($result, $i)."\t";
}

// fetch data each row, store on tabular row data
while($row = mysql_fetch_row($result)){
	$line = '';
	foreach($row as $value){
		if(!isset($value) || $value == ""){
			$value = "\t";
		}else{
			# important to escape any quotes to preserve them in the data.
			$value = str_replace('"', '""', $value);
			# needed to encapsulate data in quotes because some data might be multi line.
			# the good news is that numbers remain numbers in Excel even though quoted.
			$value = '"' . $value . '"' . "\t";
		}

		$line .= $value;
	}
	$data .= trim($line)."\n";
}

# this line is needed because returns embedded in the data have "\r"
# and this looks like a "box character" in Excel
$data = str_replace("\r", "", $data);

# Nice to let someone know that the search came up empty.
# Otherwise only the column name headers will be output to Excel.
if ($data == "") {
	$data = "\nno matching records found\n";
}


$export_filename = $event_name."-".$cdate."-".$eid.".csv";
// create table header showing to download a xls (excel) file
header("Content-type: application/octet-stream");
header("Content-Disposition: attachment; filename=$export_filename");
header("Cache-Control: public");
header("Content-length: ".strlen($data)); // tells file size
header("Pragma: no-cache");
header("Expires: 0");

// output data
echo $header."\n".$data;

//header('Location: main');

//exit();
?>
<?php ob_end_flush(); ?>
