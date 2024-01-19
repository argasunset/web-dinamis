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

$id_transaksi="";
$id_pembeli="";
$nama="";
$alamat="";
$tgl_transaksi="";
$total="";
$error="";
$sukses="";

if(isset($_GET['op'])){
     $op=$_GET['op'];
}else{
    $op="";
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Transaksi</title>
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
    <a class="navbar-brand" href="#">Halaman Admin</a>
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
          <a class="nav-link" href="halamanbarang.php">Halaman Barang</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="halamanpembeli.php">Halaman pembeli</a>
          </li>
        <form class="d-flex mt-3" role="search">
          <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-success" type="submit">Search</button>
        </form>
      </div>
    </div>
  </div>
</nav>
            <div class="card">
                <div class="card-header text-white bg-secondary">
                    data transaksi
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">alamat</th>
                                <th scope="col">id pembeli</th>
                                <th scope="col">nama</th>
                                <th scope="col">tanggal transaksi</th>
                                <th scope="col">total</th>
    
                            </tr>
                            <tbody>
                                <?php
                                 $sql2="select * from dibeli order by id_transaksi desc";
                                 $q2=mysqli_query($koneksi,$sql2);
                                 $urut=1;
                                 while($r2=mysqli_fetch_array($q2)){
                                    $alamat=$r2['alamat'];
                                    $id_pembeli=$r2['id_pembeli'];
                                    $tgl_transaksi=$r2['tgl_transaksi'];
                                    $total=$r2['total'];
                                $sql3="select * from pembeli where id_pembeli='$id_pembeli'";
                                     $q3= mysqli_query($koneksi,$sql3);
                                     while ($r3 = mysqli_fetch_array($q3)) {
                                      $nama=$r3["nama"];
                                     }
                                    ?>
                                    <tr>
                                        <th scope="row"><?php echo $urut++ ?></th>
                                        <td scope="row"><?php echo $alamat ?></td>
                                        <td scope="row"><?php echo $id_pembeli ?></td>
                                        <td scope="row"><?php echo $nama ?></td>
                                        <td scope="row"><?php echo $tgl_transaksi ?></td>
                                        <td scope="row"><?php echo $total ?></td>
                                        <td scope="row">
                                       

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