<?php
// Start the session
session_start();

// Unset all session variables
session_unset();

// Destroy the session
session_destroy();

// Delete the user details cookie
setcookie("user_details", "", time() - 3600, "/");

// Redirect the user to the login page or any other desired page
header('Location: index.php');
exit();
?>