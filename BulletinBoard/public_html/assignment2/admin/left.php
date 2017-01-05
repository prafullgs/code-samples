<?php
$path = "../";
include("../inc/global.php");
$admincheck = 1;
include("../inc/checks.php");
?>
<html>
<head>
<style>
body{
font-family:Arial;
font-size:8pt;
}
a{
text-decoration:none;
color:#00a5d5;
}
a:visited{
color:#00a5d5;
}
a:hover{
text-decoration:underline;
color:#00a5d5;
}

.postbox{
border:2px solid #0099CC;
}
.postheader{
color:#003366;
font-size:12px;
font-weight:bold;
text-align:center;
border-bottom:2px solid ; 
}
.postcontent{
background-color:#FFFFFF; 
font-size:12px;
}
</style>
<title>Left.php</title>
<base target="mainframe">
</head>
<body >
<div align="center">

<!--Start Main Panel-->
<table width="98%" class="postbox" cellpadding="8" cellspacing="0">
<tr><td class="postheader" width="100%">

<b>Main Panels</b>
</td></tr>
<tr><td class="postcontent">
<a href="home.php">Admin CP Home</a><BR>
<a href="credits.php">Credits</a>
</td></tr>
</table>
<!--End Main Panel-->
<BR>
<!--Start User Panel-->
<table width="98%" class="postbox" cellpadding="8" cellspacing="0">
<tr><td class="postheader" width="100%">
<b>User Panels</b>
</td></tr>
<tr><td class="postcontent">
<a href="users/index.php">Show Users</a><BR>
<a href="users/add.php">Add User</a>
</td></tr>
</table>
<!--End User Panel-->
<br>
<!--Start Setting Panel-->
<table width="98%" class="postbox" cellpadding="8" cellspacing="0">
<tr><td class="postheader" width="100%">
<b>Settings</b>
</td></tr>
<tr><td class="postcontent">
<!--<a href="settings/general.php">General Settings</a><BR>
<a href="settings/date.php">Date / Time Settings</a><BR>-->
<a href="settings/display.php">Display Settings</a>
</td></tr>
</table>
<!--End Setting Panel-->
<BR>
</div>
</body>
</html>