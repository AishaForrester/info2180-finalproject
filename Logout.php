<?php


session_start();  //Start the PHP session

// Destroy the session
session_destroy();

// Redirect to the login page or any other page
header('Location: Login.html');
exit();
?>

