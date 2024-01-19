<?php
$host = "localhost";
$user = "root";
$pass = "";
$db = "thrifiting";

$koneksi = mysqli_connect($host, $user, $pass, $db);
if (!$koneksi) {
    die("Tidak bisa terkoneksi ke database");
}
include 'koneksi.php';
session_start();
if(!isset($_SESSION['username'])){
    header('location:admin.php');
}
$mysql_adm=mysqli_query($koneksi, "SELECT * FROM admin WHERE username='$_SESSION[username]'");
$data_adm=mysqli_fetch_array($mysql_adm);

$id_pembeli="";
$nama="";
$username="";
$password="";
$alamat="";
$error="";
$sukses="";

if(isset($_GET['op'])){
     $op=$_GET['op'];
}else{
    $op="";
}

if($op =='delete'){
    $id_pembeli=$_GET['id'];
    $sql1="delete from pembeli where id_pembeli='$id_pembeli'";
    $q1=mysqli_query($koneksi,$sql1);
    if($q1){
        $sukses="berhasil hapus data";
    }else{
        $error="gagal hapus data";
    }
}

if($op=='edit'){
    $id_pembeli=$_GET['id'];
    $sql1="select * from pembeli where id_pembeli = '$id_pembeli'";
    $q1=mysqli_query($koneksi,$sql1);
    $r1=mysqli_fetch_array($q1);
    $id_pembeli=$r1['id_pembeli'];
    $nama=$r1['nama'];
    $username=$r1['username'];
    $password=$r1['password'];
    $alamat=$r1['alamat'];

    if($username==''){
        $error="data tidak ditemukan";
    }
}

if(isset($_POST['simpan'])){
    $id_pembeli=$_POST['id_pembeli'];
    $nama=$_POST['nama'];
    $username=$_POST['username'];
    $password=$_POST['password'];
    $alamat=$_POST['alamat'];

    if($id_pembeli && $nama && $username && $password && $alamat){

        if($op=='edit'){
            $sql1="update pembeli set id_pembeli='$id_pembeli' nama='$nama',username='$username',password='$password',alamat='$alamat' where id_pembeli='$id_pembeli' ";
            $q1=mysqli_query($koneksi,$sql1);
            if($q1){
                $sukses="data berhasil diupdate";
            }else{
                $error="data gagal diupdate";
            }
        }else{
            $sql1="insert into pembeli(id_pembeli,nama,username,password,alamat) values ('$id_pembeli','$nama','$username','$password','$alamat')";
        $q1=mysqli_query($koneksi,$sql1);
        if($q1){
            $sukses="berhasil memasukan data baru";
        }else{
            $error="gagal memasukan data";
        }
        }
    }else{
        $error="silakan masukan datanya";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data pembeli</title>
    <!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
  </head>
  <body>
    <h1>Hello, world!</h1>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
  </body>
</html>
    <style>
        body{
            background-image: url('');
        }

        .mx-auto {
            width: 800px
        }

        .card {
            margin-top: 10px;

        }
    </style>
</head>

<body>
<nav class="navbar bg-body-tertiary fixed-top">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">halaman admin</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
      <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Offcanvas</h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
      </div>
      <div class="offcanvas-body">
        <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="home.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="halamantransaksi.php">halaman transaksi</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="halamanbarang.php">halaman barang</a>
          </li>
        <form class="d-flex mt-3" role="search">
          <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-success" type="submit">Search</button>
        </form>
      </div>
    </div>
  </div>
</nav>
    <div class="mx-auto">
        <div class="card">
            <div class="card-header">
                Create / edit data
            </div>
            <div class="card-body">
                <?php
                if($error){
                ?>
                    <div class="alert alert-danger" role="alert">
                        <?php echo $error ?>
                    </div>                
                <?php
                }
                ?>
            <div class="card-body">
                <?php
                if($sukses){
                ?>
                    <div class="alert alert-success" role="alert">
                        <?php echo $sukses ?>
                    </div>                
                <?php
                 header("refresh:5;url=halamanpembeli.php");
                }
                ?>

            <div class="card">
                <div class="card-header text-white bg-secondary">
                    data pembeli
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">id_pembeli</th>
                                <th scope="col">nama</th>
                                <th scope="col">username</th>
                                <th scope="col">password</th>
                                <th scope="col">alamat</th>

                            </tr>
                            <tbody>
                                <?php
                                 $sql2="select * from pembeli";
                                 $q2=mysqli_query($koneksi,$sql2);
                                 $urut=1;
                                 while($r2=mysqli_fetch_array($q2)){
                                    $id_pembeli=$r2['id_pembeli'];
                                    $nama=$r2['nama'];
                                    $username=$r2['username'];
                                    $password=$r2['password'];
                                    $alamat=$r2['alamat'];

                                    ?>
                                    <tr>
                                        <th scope="row"><?php echo $urut++ ?></th>
                                        <td scope="row"><?php echo $id_pembeli ?></td>
                                        <td scope="row"><?php echo $nama ?></td>
                                        <td scope="row"><?php echo $username ?></td>
                                        <td scope="row"><?php echo $password ?></td>
                                        <td scope="row"><?php echo $alamat ?></td>
                                        <td scope="row">
                                        <a href="halamanpembeli.php?op=delete&id=<?php echo $id_pembeli ?>"onclick="return confirm('yakin ingin delete?')"><button type="button" class="btn btn-warning">Delete</button></a>

                                        </td>
                                    </tr>
                                    <?php
                                 }
                                ?>
                            </tbody>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
</body>

</html>