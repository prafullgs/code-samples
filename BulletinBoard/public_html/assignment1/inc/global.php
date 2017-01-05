<?php
session_start();
header("Cache-control: private");

require $path."inc/config.inc.php";
require $path."inc/mysql.php";
require $path."inc/functions.php";

$database = new database;

$database->connect($config['hostname'], $config['username'], $config['password']);
$database->select($config['database']);


$settings[adminemail] = "prafullgs@yahoo.com";
$settings[blogname] = "All about movies";
$settings['description'] = "Discussion Forum for Movies";
$settings[websitename] = "Movies BB";
$settings[websiteurl] = "www.cs.odu.edu/~pshirodk";
$settings[contactlink] = "mailto:prafullgs@yahoo.com";
$settings[dateformat] = "d-m-Y";
$settings[timeformat] = "h:i A";
$settings[maindateformat] = "l jS F Y";
$settings[timeoffset] = "0";
$settings[numberrss] = "10";
$settings[showeditedby] = "1";
$settings[display_posts] = "6";


/*require $path."inc/settings.inc";
$query = $database->query("SELECT * FROM theme WHERE using_now = '1' LIMIT 1");
$theme = $database->fetch_array($query);*/
?>