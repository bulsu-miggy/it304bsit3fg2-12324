<?php
session_start();

// Check if the session variable is NOT set
if (!isset($_SESSION['email']) || ($_SESSION['isAdmin'] == 1)) {
    // Redirect to the home page or any desired page
    header("Location: index.php"); // Replace 'index.php' with your home page URL
    exit(); // Ensure that no further code is executed after redirection
}
?>