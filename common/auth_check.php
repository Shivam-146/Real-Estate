<?php
// auth_check.php - Include at the top of admin pages

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Check if user is logged in
if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    // Redirect to login page if not authenticated
    header("Location: login.php");
    exit;
}
?>
