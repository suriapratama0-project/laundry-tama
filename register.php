<?php
session_start();
require_once __DIR__ . '/config/db.php';

$message = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);
    $confirm  = trim($_POST['confirm']);

    if ($password !== $confirm) {
        $message = "Password tidak sama!";
    } else {
        // cek apakah username sudah ada
        $sql = "SELECT * FROM users WHERE username = :username LIMIT 1";
        $stmt = $conn->prepare($sql);
        $stmt->execute([':username' => $username]);

        if ($stmt->fetch()) {
            $message = "Username sudah dipakai!";
        } else {
            // simpan user baru
            $hashed = password_hash($password, PASSWORD_DEFAULT);
            $sql = "INSERT INTO users (username, password) VALUES (:username, :password)";
            $stmt = $conn->prepare($sql);
            $stmt->execute([
                ':username' => $username,
                ':password' => $hashed
            ]);
            header("Location: login.php?success=Registrasi berhasil, silakan login");
            exit;
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Register - Laundry Tama</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container mt-5">
  <div class="row justify-content-center">
    <div class="col-md-5">
      <div class="card shadow-lg rounded-4">
        <div class="card-body">
          <h4 class="mb-4 text-center">Daftar Akun Baru</h4>

          <?php if ($message): ?>
            <div class="alert alert-danger"><?= htmlspecialchars($message) ?></div>
          <?php endif; ?>

          <form method="POST">
            <div class="mb-3">
              <label class="form-label">Username</label>
              <input type="text" name="username" class="form-control" required>
            </div>
            <div class="mb-3">
              <label class="form-label">Password</label>
              <input type="password" name="password" class="form-control" required>
            </div>
            <div class="mb-3">
              <label class="form-label">Konfirmasi Password</label>
              <input type="password" name="confirm" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-success w-100">Daftar</button>
            <a href="login.php" class="btn btn-link w-100 mt-2">Sudah punya akun? Login</a>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
</body>
</html>
