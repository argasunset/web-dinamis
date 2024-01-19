<?php
include "koneksi.php";
session_start();
 if(isset($_POST['submit'])){
    $username = $_POST['username'];
    $password = $_POST['password'];
if($username!="" && $password!=""){
    $mysql = mysqli_query($koneksi,"SELECT * FROM admin WHERE username='$username' AND password='$password'");
    if ($data = mysqli_fetch_array($mysql)){
        $_SESSION['username']=$data['username'];
        $_SESSION['password']=$data['password'];
        header("location: halamanbarang.php");
    }else{
    ?>
        <?php header('location:admin.php');
    }
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
    <form action="" method="post">
        <div class="form-box login">
            <h2>Login Admin</h2>
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
                <input type="submit" class="btn" name="submit" value="login">
            </form>
        </div>
    </div>


    <script src="script.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>
</html>