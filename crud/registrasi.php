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
    <title>Halaman Registrasi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" />
    <style>
        label {
            display: block;
            margin-top: 8px;
        }
    </style>
</head>
<body>
    

    <h1>Halaman Registrasi</h1>
    <div class="con">
        <div class="row">
            <div class="col mb-1">
                <form action="" method="post" class="mt-3 form-control card p-4 w-50 shadow-lg center">
       
        
            <label for="username">Username </label>
            <input type="text" name="username" id="username" required>
     
            <label for="email">Email </label>
            <input type="text" name="email" id="email" required>
        
            <label for="password">Password :</label>
            <input type="password" name="password" id="password" required>
        
            <label for="password2">Konfirmasi Password </label>
            <input type="password" name="password2" id="password2" required>
        
            <button type="submit" name="register" class="btn btn-primary">Register</button>
            <p>Sudah punya akun? <a href="login.php">Login disini!</a></p>
</form>
            </div>
        </div>
    </div>
    
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
</body>
</html>