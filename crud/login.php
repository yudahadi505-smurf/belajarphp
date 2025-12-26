<?php
session_start();
require'functions.php';

if (isset($_COOKIE['id'])&& isset($_COOKIE['key'])){
    $id = $_COOKIE['id'];
    $key =  $_COOKIE['key'];

    $result = mysqli_query($conn, "SELECT username FROM user WHERE id = $id");
    $row = mysqli_fetch_assoc($result);
    if($key === hash('sha256', $row['username'])){
        $_SESSION['login'] = true;
    }
}

if(isset($_SESSION['login'])){
    header("Location: index.php");
    exit;
}

if(isset($_POST['login'])){
    $username = $_POST['username'];
    $password = $_POST['password'];

    $result = mysqli_query ($conn, "SELECT * FROM user WHERE username = '$username'");
    
    if (mysqli_num_rows($result) === 1){
        $row = mysqli_fetch_assoc($result);
        if(password_verify($password, $row['password'])){
            $_SESSION['login'] = true;
            if (isset($_POST['remember'])) {
                setcookie('id', $row['id'], time()+360);
                setcookie('key', hash('sha256', $row['username']),time()+360);
            }
            header("Location:index.php");
            exit;
        }
    }
    $eror = true;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-dark d-flex align-items-center justify-content-center vh-100">

<div class="card shadow-lg border-0 rounded-4" style="width: 400px;">
    <div class="card-body p-4">
        <h3 class="text-center fw-bold mb-4">Login</h3>

        <?php if (isset($eror)) : ?>
            <div class="alert alert-danger text-center py-2">
                Username atau password salah!
            </div>
        <?php endif; ?>

        <form action="" method="post">
            <div class="mb-3">
                <label for="username" class="form-label fw-semibold">Username</label>
                <input type="text" name="username" id="username"
                       class="form-control" required autofocus>
            </div>

            <div class="mb-3">
                <label for="password" class="form-label fw-semibold">Password</label>
                <input type="password" name="password" id="password"
                       class="form-control" required>
            </div>

            <div class="form-check mb-3">
                <input class="form-check-input" type="checkbox" name="remember" id="remember">
                <label class="form-check-label" for="remember">
                    Remember me
                </label>
            </div>

            <button type="submit" name="login"
                    class="btn btn-primary w-100 fw-semibold">
                Login
            </button>

            <p class="text-center mt-3 mb-0">
                Belum punya akun?
                <a href="registrasi.php" class="text-decoration-none fw-semibold">
                    Register disini
                </a>
            </p>
        </form>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
