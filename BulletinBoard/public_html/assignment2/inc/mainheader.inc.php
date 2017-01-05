<?php
include($path."inc/global.php");
?>
<HTML>
<HEAD>
<LINK REL="alternate" TITLE="<? echo $settings['blogname']; ?> TYPE="application/rss+xml">
<?
echo "
<style>
body{
background-color: #CCCC99 ;
font-family: Arial;
font-size: 12;
}
td{ 
font-family:Arial;
font-size:12;
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
.headerbox{
border:2px solid #0099CC; 
background-color:#FFFFFF; 
font-size:12px;
}
.logo{
border:12px;
}
.maindate{
color:#006699;
}
.pagetitle{
font-size:14px;
font-weight:lighter;
color:#00486a;
}
.navbar{
border:2px solid #0099CC ;
background-color:#FFFFFF;
font-size:12px;
text-align:right;
}
.postbox{
border:2px solid #0099CC;
}
.postheader{
background-color:#FFFFFF;
color:#003366;
font-size:12px;
font-weight:bold;
text-align:center;
border-bottom:2px solid #0099CC; 
}
.postcontent{
background-color:#FFFFFF; 
font-size:12px;
}
.postinfo{
color:#00c4fd; 
font-size:9px; 
text-align:right; 
font-weight:bold; 
float:right;
}
.sidebox{
border:2px solid #0099CC;
}
.sideboxheader{
background-color:#ffffff; 
color:#003366; 
font-size:14px; 
font-weight:bold; 
text-align:right; 
border-bottom:2px solid #0099CC; 
}
.sideboxcontent{
background-color:#FFFFFF;
font-size:11.5px;
}
</style>
";
?>
<title>
<?
echo $settings['blogname'];
if(isset($page)){
echo " -- ".$page;
}
?>
</title>
</HEAD>
<body>
<table width="98%" cellpadding="8" cellspacing="0" align="center">
<tr>
<td width="100%" class="headerbox">
<div align="right"><a href="<? echo $path; ?>index.php"><img src="styles/default.gif" class="logo"></a></div><BR>
<div style="float:right;" class="maindate">
<?
echo date($settings['maindateformat']);
?>
</div>
<div class="pagetitle">
<? echo $settings['blogname'];
if(isset($page)){
echo " -- ".$page;
}
?>
</div>
</td>
</tr>
</table>
<BR>
<table width="98%" cellpadding="8" cellspacing="0" align="center">
<tr>
<td width="100%" class="navbar">
<?
if(isset($_SESSION['uid'])){

echo "<b>Hi </b></font>";
echo $_SESSION['username'];
}
if(!isset($_SESSION['uid'])){
echo "| <a href=\"".$path."login.php\">Login</a> | <a href=\"".$path."register.php\">Register</a> | ";
}
?>

<a href="<? echo $path; ?>index.php">| Home</a>
<?
if(isset($_SESSION['uid'])){
echo " | <a href=\"".$path."users/index.php\">Settings</a>";
if($_SESSION['admin'] == 1) {
echo " | <a href=\"".$path."admin/index.php\">Admin Options</a>";
} 
if($_SESSION['mod'] == 1) {
echo " | <a href=\"".$path."posting/index.php\">New Thread</a>";
}
}
?>
| <a href="<? echo $settings['contactlink']; ?>">Contact Us</a>
 <?
 if(isset($_SESSION['uid'])){
	echo " | <a href=\"".$path."logout.php\">Logout</a>";
 }
 ?>
</td>
</tr>
</table>
<BR>
<table cellpadding="0" cellspacing="0" width="98%" align="center">
	<tr>
		<td width="75%" style="padding-right:5px;" valign="top"> 