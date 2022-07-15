<?php
//session_start();
if (!isset($_SESSION['login_member']))
  header("Location: login/login.php");

if (!isset($_GET['id']))
  header("Location: index.php");

if (isset($_GET['confirm'])) {
  if ($_GET['confirm'] == 'yes') {
    if (!isset($_SESSION['login_member']))
      header("Location: login/login.php");
    $idAnggota = $_SESSION['id_anggota'];
    $idPtg = $_GET['idP'];
    $idBuku = $_GET['idB'];
    $query = "insert into pinjam(id_anggota, id_buku, id_petugas) values ($idAnggota, $idBuku,$idPtg)";
    $result = mysqli_query($connect, $query);
    header("Location: ./index.php?page=riwayat");
  }
} else {

  $idPtg = $_GET['id'];
  $idBuku = $_GET['idBuku'];
  $query  = "SELECT * FROM petugas where id=$idPtg"; //WHERE id = ". $_GET['id'];
  $hasil = mysqli_query($connect, $query);

  $query  = "SELECT * FROM buku where id=$idBuku"; //WHERE id = ". $_GET['id'];
  $hasill = mysqli_query($connect, $query);

  // Jika tidak ada data
  if ($hasill && $hasil->num_rows == 0)
    header("Location: index.php");

  $dt = mysqli_fetch_assoc($hasil);
  $data = mysqli_fetch_assoc($hasill);
}

?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Konfirmasi Pinjam | Perpustakaan</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../style.css">
    <style>
    .card {
        line-height: 29px;
    }
    </style>
</head>

<body align="left">
    <div class="card">
        <h1>Konfirmasi Pinjam Buku</h1>
        <p>Pastikan data dibawah ini benar sebelum Anda meminjam</p>
        <table border="1" cellpadding="5">
            <tr>
                <th>Judul buku</th>
                <td><?= $data['judul']; ?></td>
            </tr>
            <tr>
                <th>Pengarang</th>
                <td><?= $data['pengarang']; ?></td>
            </tr>
            <tr>
                <th>Tahun terbit</th>
                <td><?= $data['tahun']; ?></td>
            </tr>
            <tr>
                <th>Penerbit</th>
                <td><?= $data['penerbit']; ?></td>
            </tr>
            <tr>
                <th>Kategori</th>
                <td><?= $data['kategori'] != NULL ? $data['kategori'] : 'Tidak ada' ?></td>
            </tr>
            <tr>
                <th>Petugas</th>
                <td><?= $dt['nama_petugas']; ?></td>
            </tr>
        </table>
        <div class="aksi">
            <a class="btn"
                href="<?= './index.php?page=pinjamBuku&&id=' . $data['id'] . '&confirm=yes&&idB=' . $idBuku . '&&idP=' . $idPtg; ?>">Lanjutkan</a>
            <a class="btn" href="javascript:window.history.back();">Batalkan</a>
        </div>
    </div>
</body>

</html>