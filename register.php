<?php
include "koneksi.php";

if (isset($_POST['submit'])) {
    $nama = $_POST['nama'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $alamat = $_POST['alamat'];

    $result = mysqli_query($koneksi, "INSERT INTO pembeli(nama,username,password,alamat)
    VALUES ('$nama','$username','$password','$alamat')");
    header("location:index.php");
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

        <div class="singin">
            <h2>SIGN UP</h2>
            <form action="" method="post">
                <div class="input-box">
                    <span class="icon"><ion-icon name="mail-outline"></ion-icon></span>
                    <input type="nama" name="nama" required>
                    <label>nama</label>
                </div>
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
                <div class="input-box">
                    <span class="icon"><ion-icon name="mail-outline"></ion-icon></span>
                    <input type="name" name="alamat" required>
                    <label>alamat</label>
                </div>
                <div class="remember-forgot">
                    <label><input type="checkbox">remember me</label>
                    <a href="#">Forgot Password?</a>
                </div>
                <input type="submit" class="btn" name="submit" value="register">
                <div class="login-register">
                    <p>do you already have an account? <a href="login.php" class="register-link">SIGN IN</a></p>
                </div>
            </form>
        </div>
    </div>


    <script src="script.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap');

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'poppins', sans-serif;
        }

        body {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background: url(zee.jpg) no-repeat;
            background-size: cover;
            background-position: center;
        }

        header {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            padding: 20px 100px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            z-index: 99;
        }

        .logo {
            font-size: 2em;
            color: #000000;
            user-select: none;
            font-weight: bold;
        }

        .navigation a {
            position: relative;
            font-size: 1.1em;
            color: #000000;
            text-decoration: none;
            font-weight: 500;
            margin-left: 40px;
        }

        .navigation a::after {
            content: '';
            position: absolute;
            left: 0;
            bottom: -6px;
            width: 100%;
            height: 3px;
            background: #000000;
            border-radius: 5px;
            transform-origin: right;
            transform: scaleX(0);
            transition: .5s;
        }

        .navigation a:hover::after {
            transform-origin: left;
            transform: scaleX(1);
        }

        .navigation .btnlogin-popup {
            width: 130px;
            height: 50px;
            background: transparent;
            border: 2px solid #000000;
            outline: none;
            border-radius: 6px;
            cursor: pointer;
            font-size: 1.1em;
            color: #020000;
            font-weight: 500;
            margin-left: 40px;
            transition: .5s;
        }

        .navigation .btnlogin-popup:hover {
            background: #ff00d9;
            color: #030303;
        }

        .wrepper {
            position: relative;
            width: 400px;
            height: 440px;
            background: transparent;
            border: 2px solid rgba(255, 255, 255, 5);
            border-radius: 20px;
            backdrop-filter: blur(20px);
            box-shadow: 0 0 30px rgba(0, 0, 0, 5);
            display: flex;
            justify-content: center;
            align-items: center;
            overflow: hidden;
        }

        .wrepper .form-box {
            width: 100%;
            padding: 40px;
        }

        .form-box h2 {
            font-size: 2em;
            color: #162938;
            text-align: center;
        }

        .input-box {
            position: relative;
            width: 100%;
            height: 50px;
            border-bottom: 2px solid #162938;
            margin: 30px 0;
        }

        .input-box label {
            position: absolute;
            top: 50%;
            left: 10px;
            transform: translateY(-50%);
            font-size: 1em;
            color: #131414;
            font-weight: 500;
            pointer-events: none;
            transition: .5s;
        }

        .input-box input:focus~label,
        .input-box input:valid~label {
            top: -5px;
        }


        .input-box input {
            width: 100%;
            height: 100%;
            background: transparent;
            border: none;
            outline: none;
            font-size: 1em;
            color: #000000;
            font-weight: 600;
            padding: 0 35px 0 5px;
        }

        .input-box .icon {
            position: absolute;
            right: 8px;
            font-size: 1.2em;
            color: #162938;
            line-height: 57px;
        }

        .remember-forgot {
            font-size: .9em;
            color: #162938;
            font-weight: 500;
            margin: -15px 0 15px;
            display: flex;
            justify-content: space-between;
        }

        .remember-forgot label input {
            accent-color: #162938;
            margin-right: 3px;
        }

        .remember-forgot a {
            color: #162938;
            text-decoration: none;
        }

        .remember-forgot a:hover {
            text-decoration: underline;
        }

        .btn {
            width: 100%;
            height: 45px;
            background: #f89cab;
            border: none;
            outline: none;
            border-radius: 6px;
            cursor: pointer;
            font-size: 1em;
            color: #fff;
            font-weight: 500;
        }

        .login-register {
            font-size: .9em;
            color: #162938;
            text-align: center;
            font-weight: 500;
            margin: 25px 0 10px;
        }

        .login-register p a {
            color: #162938;
            text-decoration: none;
            font-weight: 600;
        }

        .login-register p a:hover {
            text-decoration: underline;
        }
    </style>
</body>

</html>