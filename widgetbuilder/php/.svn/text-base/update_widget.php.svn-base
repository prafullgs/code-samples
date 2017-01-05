<?php

/**
 * @author:  Sirish Ayyagari and Prafull Shirodkar
 * @copyright 2011
 */

session_start();

function check_inject()
{
   $badchars = array(";", "'", "\"", "*", "DROP", "SELECT", "UPDATE", "DELETE", "UNION", "BENCHMARK", "-");
    foreach($_POST as $value)
    {
      if(in_array($value, $badchars))
      {
        die("SQL Injection Detected\n<br />\nIP: ".$_SERVER['REMOTE_ADDR']);
		}
      else
      {
        $check = preg_split("//", $value, -1, PREG_SPLIT_OFFSET_CAPTURE);
        foreach($check as $char)
        {
          if(in_array($char, $badchars))
          {
            die("SQL Injection Detected\n<br />\nIP: ".$_SERVER['REMOTE_ADDR']);
			}
		}
	  }
	}
}

check_inject();

require '../includes/db_details.php';

$table = "widget";
$link = mysql_connect($host,$user,$pass) or die("Cannot connect to msyql");
$db_selected = mysql_select_db($database,$link) or die("Cannot select db");

$data =array();
foreach($_POST as $key=>$items)
{
    $_POST[$key]=addslashes($_POST[$key]);
}

if(isset($_POST[$key]))
{
foreach($_POST as $key=>$items)
{
    $data[$key] .= urldecode($items);
}
}
$timestamp = time();
$widget_id = md5($timestamp);

$serialized_data = serialize($data);
$today = date("F j, Y, g:i a");
$sql = "INSERT INTO ".$table." VALUES ('".$widget_id."','".$serialized_data."','".$today."')";

if($_POST['token'] == $_SESSION['token'])
{
	mysql_query($sql);
    echo $widget_id;
}
else
{
    $msg = "Error".$_SESSION['token'];
    echo  $msg;
	
}


?>