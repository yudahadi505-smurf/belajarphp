<?php

session_start();
if(isset($_SESSION['login'])){
    header("Location: index.php");
    exit;
}
require 'functions.php';
 if (isset($_POST['register'])){
    if (register ($_POST)>0){
        echo "<script>
                alert('user baru berhasil ditambahkan!');
                document.location.href = 'login.php';
              </script>";
    } else {
        echo "<script>
                alert('user gagal ditambahkan!');
                document.location.href = 'registrasi.php';
              </script>";      
    }
 }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrasi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-dark d-flex align-items-center justify-content-center vh-100">

<div class="card shadow-lg border-0 rounded-4" style="width: 420px;">
    <div class="card-body p-4">
        <h3 class="text-center fw-bold mb-4">Registrasi Akun</h3>

        <form action="" method="post">
            <div class="mb-3">
                <label for="username" class="form-label fw-semibold">Username</label>
                <input type="text" name="username" id="username"
                       class="form-control" required autofocus>
            </div>

            <div class="mb-3">
                <label for="email" class="form-label fw-semibold">Email</label>
                <input type="email" name="email" id="email"
                       class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="password" class="form-label fw-semibold">Password</label>
                <input type="password" name="password" id="password"
                       class="form-control" required>
            </div>

            <div class="mb-4">
                <label for="password2" class="form-label fw-semibold">Konfirmasi Password</label>
                <input type="password" name="password2" id="password2"
                       class="form-control" required>
            </div>

            <button type="submit" name="register"
                    class="btn btn-primary w-100 fw-semibold">
                Register
            </button>

            <p class="text-center mt-3 mb-0">
                Sudah punya akun?
                <a href="login.php" class="text-decoration-none fw-semibold">
                    Login disini
                </a>
            </p>
        </form>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
