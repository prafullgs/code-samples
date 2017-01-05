<?
if(isset($_COOKIE['cookname']) && isset($_COOKIE['cookpass']))
                     {
                        setcookie("cookname", "", time()-60*60*24*10, "/");
                        setcookie("cookpass", "", time()-60*60*24*10, "/");
                     }

session_start();
session_destroy();
header("Location: ".$_SERVER['HTTP_REFERER']);
?>