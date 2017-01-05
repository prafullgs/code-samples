<?php
include($path."inc/global.php");
include($path."inc/checks.php");
?>
<HTML>
<HEAD>
<?
echo "
<style>";

echo "
.dark{
background-color: #dedede;
font-size: 15px;
font-family: Tahoma, Verdana, Arial, Helvetica, Sans-Serif;
}
.light{
background-color: #e6e6e6;
font-size: 15px;
font-family: Tahoma, Verdana, Arial, Helvetica, Sans-Serif;
}
body{
font-family:Arial;
font-size:8pt;
}
td{
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
.headerbox{

background-color:#FFFFFF; 
font-size:12px;
}
.logo{
border:0px;
}
.maindate{
color:#006699;
}
.pagetitle{
font-size:14px;
font-weight:lighter;
}
.navbar{
border:2px ;
background-color:#FFFFFF;
font-size:12px;
text-align:right;
}
.postbox{
border:2px solid #0099CC;
}
.postheader{
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
<table cellpadding="8" cellspacing="0" border="0" width="98%" class="postbox" align="center"><tr>
<td colspan="4" class="postheader" align="center">
<b>
<? echo $settings['blogname'];
if(isset($page)){
echo " -- ".$page;
}
?></b></td>
</tr>
<tr>
<div align="center">
<td class="postcontent">
<BR>