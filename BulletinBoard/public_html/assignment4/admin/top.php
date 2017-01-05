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
font-family:Arial, Helvetica, sans-serif;
}
a:visited{
color:#0000FF;
}
.headerbox{
border:2px solid #0099CC; 
background-color:#FFFFFF; 
font-size:12px;
}
</style>
<base target="mainframe">
<title>Top.php</title>
</head>
<body >
<table width="98%" align="center">
<tr><td class="headerbox">
<div align="left" style="padding:10px;">
| <a href="home.php">Admin CP Home</a> | <a href="logout.php" target="_parent">Logout <? echo $_SESSION['username']; ?></a>
</div>
<a href="../index.php" target="_parent"><img src="logo.gif" style="float:right" width = "80%"></a>

</td></tr>
</table>
</body>
</html>