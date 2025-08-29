<?php
include '../config/db.php';

function login($username, $password) {
    global $conn;

    $sql = "SELECT * FROM users WHERE username = :username LIMIT 1";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':username', $username);
    $stmt->execute();

    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user && password_verify($password, $user['password'])) {
        return $user; // login sukses
    }
    return false; // gagal login
}
