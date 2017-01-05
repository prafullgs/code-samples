<?php
function sql_query($query, $exceptions = false) {
	$result = mysql_query($query);
	if ($exceptions and mysql_error()) {
		throw new Exception('Mysql error: '. mysql_error(). ': '. $query);
	}
	return $result;
}

$databasehost = "localhost";
$databasename = "eventregtest";
$databaseusername ="registration";
$databasepassword = "80234uijerfd80uoij";
$con = @mysql_connect($databasehost,$databaseusername,$databasepassword) or die(mysql_error());
@mysql_select_db($databasename) or die(mysql_error());
?>
