<?php
include "koneksi.php";
session_start();
 if(isset($_POST['login'])){
    $username = $_POST['username'];
    $password = $_POST['password'];
    $query = mysqli_query($koneksi,"select * from pembeli where username='$username' and password='$password'");
    if ($data = mysqli_fetch_array($query)){
        $_SESSION['username']=$data['username'];
        header("location: index.php");
    }else{
        header("location: login.php");
    }
 }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>website with login & registration | codehal</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    

    <div class="wrepper">
    </span>
    <form action="login.php" method="post">
        <div class="form-box login">
            <h2>SIGN IN</h2>
            <form action="#">
                <div class="input-box">
                    <span class="icon"><ion-icon name="mail-outline"></ion-icon></span>
                    <input type="username" name="username" required>
                    <label>username</label>
                </div>
                <div class="input-box">
                    <span class="icon"><ion-icon name="lock-closed-outline"></ion-icon></span>
                    <input type="password" name="password" required>
                    <label>password</label>
                </div>
                <div class="remember-forgot">
                    <label><input type="checkbox">remember me</label>
                    <a href="#">Forgot Password?</a>
                </div>
                <input type="submit" class="btn" name="login" value="login">
                <div class="login-register">
                    <p>don't have an account? <a href="register.php" class="register-link">SIGN UP</a></p>
                </div>
            </form>
        </div>
    </div>


    <script src="script.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>
</html>