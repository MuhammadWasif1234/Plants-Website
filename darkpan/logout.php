<?php
session_start();

// Unset all of the session variables
$_SESSION = array();

// Destroy the session
session_destroy();

header("Location: signin.php");
exit(); // Make sure to exit after redirection

?>