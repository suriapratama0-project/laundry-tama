<?php
session_start();

if (!isset($_SESSION['username'])) {
    // Gagal login, redirect ke login page
    header("Location: login.php");
    exit();
}
?>
