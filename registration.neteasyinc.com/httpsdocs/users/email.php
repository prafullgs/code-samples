<?php
include("../settings/config.php");

							$qry = mysql_query("SELECT id, username, user_password, first_name, last_name, email from user where site_id = 1");
							$i = 0;
							while($data = mysql_fetch_assoc($qry))
							{
							$f_name = $data['first_name'];
							$l_name = $data['last_name'];
							$s_uname = $data['username'];
							$s_upass = $data['user_password'];
							$s_email = $data['email'];
							$to = $s_email;
							$to1 = "prafull.shirodkar@neteasyinc.com";
							$subject = "vapa.org Event Registration Details";
							$message = "
							<html>
							<head>
							<title>vapa.org login Registration Details</title>
							</head>
							<body>
							<p>Greetings " .$f_name." ".$l_name.", </p>
							<table>
							<tr>
							<td colspan='2'>
							<p>This is in reference to your account with Virginia Planning registration form. Due to a technical error,</p>
							<p> some usernames where created with a space in them, and needed to be changed.</p>
							<p> If this does not apply to you, please disregard this message.</p>
							</td>
							</tr>
							<tr>
							<th>As a reminder, your Username is : </th>
							<td>".$s_uname."</td>
							</tr>
							<tr>
							<td></td>
							</tr>
							<tr>
							<td><a href='https://registration.neteasyinc.com/userlogin'>Click here to login: </a></td>
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
							$headers .= "From: noreply@neteasyinc.com<noreply@neteasyinc.com>\n";		
							$headers .= "Reply-To: noreply@neteasyinc.com\n";
							$headers .= "Return-Path: from_email\n";
							$headers .= "Organization: Neteasy Inc.\n";
							$headers .= "X-Priority: 3\n";
						//	$i = 0;
						//	mail($to,$subject,$message,$headers);
						//	mail($to1,$subject,$message,$headers);

							$i++;
							echo "email sent for".$s_uname." ".$s_upass." ".$i; 
							}
?>
