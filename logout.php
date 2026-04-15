<?php
session_start();

// Destroy session
$_SESSION = [];
session_destroy();

// Redirect to home page
header("Location: index.php");
exit();
?>