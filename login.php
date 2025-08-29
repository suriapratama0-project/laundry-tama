<?php
session_start();

if (isset($_SESSION['username'])) {
  // Gagal login, redirect ke login page
  header("Location: index.php");
  exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Login - Laundry Tama</title>

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

  <!-- Font Awesome (for icons) -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">

  <style>
    body {
      background-color: #f8f9fa;
    }

    .divider:after,
    .divider:before {
      content: "";
      flex: 1;
      height: 1px;
      background: #8080809a;
    }
  </style>
</head>

<body>
  <section class="vh-100">
    <div class="container py-5 h-100">
      <div class="row d-flex align-items-center justify-content-center h-100">
        <div class="col-md-8 col-lg-7 col-xl-6">
          <img src="assets/images/laundry-header.png" class="shadow rounded img-fluid" alt="Login Illustration">
        </div>

        <div class="col-md-7 col-lg-5 col-xl-5 offset-xl-1">
          <h4 style="margin-top: 40px;" class="mb-4">Login ke Laundry Tama</h4>
          <br>
          <!-- ALERT ERROR -->
          <?php if (isset($_GET['error'])): ?>
            <div class="alert alert-danger">
              <?= htmlspecialchars($_GET['error']) ?>
            </div>
          <?php endif; ?>

          <form action="proses/proses_login.php" method="POST">
            <!-- username input -->
            <div class="form-outline mb-4">
              <label class="form-label" for="username">Username</label>
              <input type="text" name="username" id="username" class="form-control form-control-lg" required />
            </div>

            <!-- Password input -->
            <div class="form-outline mb-4">
              <label class="form-label" for="password">Kata Sandi</label>
              <input type="password" name="password" id="password" class="form-control form-control-lg" required />
            </div>

            <div class="d-flex justify-content-between align-items-center mb-4">
              <div class="form-check">
                <input class="form-check-input" type="checkbox" id="remember" disabled />
                <label class="form-check-label" for="remember">Ingat saya</label>
              </div>
              <a href="#" class="btn btn-link disabled" tabindex="-1" aria-disabled="true">Lupa password?</a>
            </div>

            <!-- Submit button -->
            <button type="submit" class="btn btn-primary btn-lg w-100">Masuk</button>

            <!-- Tombol Register -->
            <a href="register.php" class="btn btn-outline-secondary btn-lg w-100 mt-3">Daftar Akun Baru</a>

            <div class="divider d-flex align-items-center my-4">
              <p class="text-center fw-bold mx-3 mb-0 text-muted">ATAU</p>
            </div>

            <a class="btn btn-light btn-lg btn-block mb-2 w-100 disabled"
              style="background-color: white; color: #444; border: 1px solid #ddd;"
              tabindex="-1" aria-disabled="true">
              <i class="fab fa-google me-2" style="color:#db4437;"></i> Lanjut dengan Google
            </a>
          </form>
        </div>
      </div>
    </div>
  </section>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>