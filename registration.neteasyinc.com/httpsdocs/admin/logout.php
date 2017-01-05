<?php
// Initialize the session.
// If you are using session_name("something"), don't forget it now!
session_start();
unset($_SESSION['admin']);

session_destroy();
header('Location: index.php');

?>
