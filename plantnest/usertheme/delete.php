<?php
include "../config.php";
session_start();

if (!$conn) {
    die("Database connection failed: " . mysqli_connect_error());
}

// Check if the user is logged in
if (isset($_SESSION["user_name"])) {
    $userName = $_SESSION["user_name"];

    // Delete the user account
    $sql = "DELETE FROM `user` WHERE `usr_name` = '$userName'";

    if (mysqli_query($conn, $sql)) {
        // Account deleted successfully, destroy the session and redirect to a login page
        session_unset();
        session_destroy();
        header("Location: login.php"); // Redirect to the login page
        exit;
    } else {
        echo '<script>alert("Error deleting account: ' . mysqli_error($conn) . '");</script>';
    }
} else {
    // User is not logged in, redirect to login page
    header("Location: login.php");
    exit;
}

mysqli_close($conn);
?>
