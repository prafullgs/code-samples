<?php ob_start(); ?>
<?php
session_start();
$_SESSION['admin'] = $_POST['login'];

if(isset($_POST['commit'])){
	
	if($_POST['login'] == "admin" && $_POST['password'] == "neteasyinc")
	{
		
		
		session_unregister("admin	");
		session_register("admin");
		$_SESSION['admin'] = $_POST['login'];
		header('Location: list.php');
	}
	else
	{
		header('Location: index.php?message=1');
	}
}
?>
<? ob_flush(); ?> 
<html>
<head>
<title> login </title>
</head>
</html>
