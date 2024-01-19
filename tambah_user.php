<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah data pengguna</title>
</head>

<body>
    <a href="tambah.php">kembali ke home</a><br></br>

    <form action="tambah_user.php" method="" name="">
        <table width="25%" border="0">
            <tr>
                <td>nama pengguna</td>
                <td><input type="text" name="nama_pengguna"></td>
            </tr>
            <tr>
                <td>username</td>
                <td><input type="text" name="username"></td>
            </tr>
            <tr>
                <td>password</td>
                <td><input type="text" name="password"></td>
            </tr>
            <tr>
                <td><input type="submit" name="submit" value="tambah"></td>
            </tr>
        </table>
    </form>
    <?php
    include 'koneksi.php';
    if (isset($_POST['submit'])) {
        $nama_pengguna = $_POST['nama_pengguna'];
        $usename = $_POST['username'];
        $password = $_POST['password'];

        $result = mysqli_query($koneksi, "INSERT INTO
            pengguna(nama_pengguna,username,password)
            VALUES('$nama_pengguna','$username','$password')");
    }
    ?>
</body>

</html>