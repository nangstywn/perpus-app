<?php
session_start();
if (!isset($_SESSION["login_member"]))
  header("Location: login/login.php");
require_once "koneksi.php";

?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Perpustakaan</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
    .tab {
        color: white;
        text-align: right;
        margin: 25px 25px 0;
        width: 50%;
        float: right;
    }

    .tab a {
        color: white;
        text-decoration: none;
        margin-left: 5px;
        border: 1px solid white;
        padding: 5px 25px;
        margin: 5px 25px;
    }

    .tab a:hover {
        color: black;
        background-color: white;
        transition: 0.6s;
    }

    .tab i {
        margin-right: 16px
    }
    </style>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src='https://kit.fontawesome.com/a076d05399.js'></script>
</head>

<body>
    <div class="pala">
        <img src="perpus2.png" alt="perpus" height="100" width="100">
        <div class="tab">
            <i class="fas fa-user-friends"></i><?php echo $_SESSION['nama'] ?>
            <a href="login/logout.php">Logout</a>
        </div>
        <h1>Perpustakaan Online</h1>
        <p>Perpustakaan Online, Memudahkan Anda Eksplorasi Dunia.</p>

    </div>
    <div class="container">
        <div class="right-content">
            <?php
      if (isset($_GET['page'])) {
        $url = $_GET['page'];
        switch ($url) {
          case 'buku':
            include 'buku/index.php';
            break;
          case 'detailBuku':
            include 'buku/detail.php';
            break;
          case 'pinjamBuku':
            include 'buku/pinjam.php';
            break;
          case 'rak':
            include 'buku/rak.php';
            break;
          case 'detailPetugas':
            include 'petugas/index.php';
            break;
          case 'petugas':
            include 'petugas/tugas.php';
            break;
          case 'riwayat':
            include 'buku/riwayat.php';
            break;
          case 'member':
            include 'member/tampil.php';
            break;
          case 'login':
            include 'login/login.php';
            break;
          default:
            # code...
            break;
        }
      } else {
        include 'perpustakaan.php';
      }
      ?>
        </div>
        <div class="left-content">
            <ul>
                <li><a href="index.php"><i class="fas fa-house-user"></i>Dashboard</a></li>
                <li><a href="index.php?page=buku"><i class="fas fa-book-open"></i>Daftar Buku</a></li>
                <li><a href="index.php?page=rak"><i class="fas fa-th"></i>Rak Buku</a></li>
                <li><a href="index.php?page=petugas"><i class="fas fa-user"></i>Petugas</a></li>
                <li><a href="index.php?page=member"><i class="fas fa-user-friends"></i>Anggota</a></li>
                <li><a href="index.php?page=riwayat"><i class="fa fa-bar-chart"></i>Riwayat</a></li>
            </ul>
        </div>
    </div>
</body>

</html>