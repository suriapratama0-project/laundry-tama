<?php
session_start();
include '../function/function_login.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    $user = login($username, $password);
    
    if ($user) {
        // simpan session hanya username & id
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['username'] = $user['username'];

        header("Location: ../index.php");
        exit();
    } else {
        header("Location: ../login.php?error=Username atau password salah!");
        exit();
    }
} else {
    header("Location: ../login.php");
    exit();
}
