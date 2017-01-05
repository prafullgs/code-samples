<?php ob_start(); ?>

<?php
include("../settings/config.php");
session_start();

$msg = "";
$user_id= $_POST['registration_user_id'];
echo $user_id;
$email_id = $_POST['registration_user_emailaddress'];

if($_POST['registration_user_id'])
{
	
	$qry = mysql_query("SELECT id, email FROM user WHERE username = '$user_id'");
	$result = mysql_fetch_assoc($qry);
	$id = $result['id'];
	$email_id = $result['email'];
	if($id)
	{
							$_SESSION['id'] = $id;
							$to = 		$email_id;
							//$to = "prafull.shirodkar@neteasyinc.com";
							$subject = "apavirginia.org account details";
							$message = "
							<html>
							<head>
							<title>apavirginia.org Account Details</title>
							</head>
							<body>
							<p>Hello ".$user_id.",</p>
							<table>
							<tr>
							<th>Click on the link to reset your password: </th>
							<td><a href='http://".$hosted_url."/resetpassword>Reset Password</a></td>
							</tr>
							<tr>
							<td></td>
							</tr>
							<tr>
							<td>Thank you,</td>
							</tr>
							<tr>
							<td>apavirginia.org</td>
							</tr>
							<tr>
							<td>Disclaimer: This is a auto generated email. Please do not reply.</td>
							</tr>
							</table>
							</body>
							</html>
							";
							
							$headers = "MIME-Version: 1.0" . "\r\n";
							$headers .= "Content-type:text/html;charset=iso-8859-1" . "\r\n";

							// More headers
							$headers .= ' From :noreply@apavirginia.org<noreply@apavirginia.org>'. "\r\n";
							mail($to,$subject,$message,$headers);
							$msg= "successuser";
							header('Location: recover_login/'.$msg);
	}
	else
	{
			$msg="unsuccessuser";
			header('Location: recover_login/'.$msg);
	}
	
}

if($_POST['registration_user_emailaddress'])
{
	$qry = mysql_query("SELECT username FROM user WHERE email = '$email_id'");
	$result = mysql_fetch_assoc($qry);
	$uname = $result['username'];
	
	if($uname)
	{
							$to = $email_id;
							//$to = "prafull.shirodkar@neteasyinc.com";
							$subject = "apavirginia.org account details";
							$message = "
							<html>
							<head>
							<title>apavirginia.org Account Details</title>
							</head>
							<body>
							<p>Hello! </p>
							<table>
							<tr>
							<th>Your username is: </th>
							<td>".$uname."</td>
							</tr>
							<tr>
							<td></td>
							</tr>
							<tr>
							<td>Thank you,</td>
							</tr>
							<tr>
							<td>apavirginia.org</td>
							</tr>
							</table>
							</body>
							</html>
							";
							
							$headers = "MIME-Version: 1.0" . "\r\n";
							$headers .= "Content-type:text/html;charset=iso-8859-1" . "\r\n";

							// More headers
							$headers .= ' From :noreply@apavirginia.org<noreply@apavirginia.org>'. "\r\n";
							mail($to,$subject,$message,$headers);
							
							$msg= "successemail";
							header('Location: recover_login/'.$msg);
	}
	else
	{
			
			$msg="unsuccessemail";
			header('Location: recover_login/'.$msg);
	}
	
}
?>
<? ob_flush(); ?> 
