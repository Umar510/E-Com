<?php
require 'config.php';
session_start() ;
$_SESSION = [];
session_unset();
session_destroy();
header("Location: login.php");
?>

<!-- require 'config.php';
session_start();

// Check if a session is available before attempting to destroy it
if (isset($_SESSION['Did']) || isset($_SESSION['id'])) {
    $_SESSION = [];
    session_unset();
    session_destroy();
    header("Location: login.php"); // Redirect to login page after destroying session
} else {
    // Handle the case when there is no session
    header("Location: login.php");
    echo "<script>alert('Login Required!')</script>";
}
 -->
