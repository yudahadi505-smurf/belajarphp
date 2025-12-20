<?php
session_start();
if(isset($_SESSION['login'])){
    header("Location: index.php");
    exit;
}
require'functions.php';
if(isset($_POST['login'])){
    $username = $_POST['username'];
    $password = $_POST['password'];

    $result = mysqli_query ($conn, "SELECT * FROM user WHERE username = '$username'");
    
    if (mysqli_num_rows($result) === 1){
        $row = mysqli_fetch_assoc($result);
        if(password_verify($password, $row['password'])){
            $_SESSION['login'] = true;
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" />
</head>
<body>

<h1>Halaman Login</h1>
<?php if (isset($eror)) : ?>
    <p style="color:red; font-style:italic;">username / password salah!</p>
    <?php endif; ?>
    <form action="" method="post">
        
                <label for="username">Username :</label>
                <input type="text" name="username" id="username" required>
           
                <label for="password">Password :</label>
                <input type="password" name="password" id="password" required>
        
                <button type="submit" name="login">Login</button>
                <p>Belum punya akun? <a href="registrasi.php">Register disini!</a></p>
    </form>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
</body>
</html>