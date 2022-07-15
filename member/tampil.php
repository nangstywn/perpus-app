<?php
require './koneksi.php';
$result = mysqli_query($connect, "SELECT id, username, nama, alamat FROM anggota");
?>
<div class="card">
    <h1 align="left">Daftar Anggota Perpustakaan</h1>
    <table border="1" cellspacing="0">
        <tr>
            <th>No</th>
            <th>Username</th>
            <th>Nama Lengkap</th>
            <th>Alamat</th>
            <th>Aksi</th>
        </tr>
        <?php
    $no = 1;
    while ($data = mysqli_fetch_array($result)) {
    ?>
        <tr>
            <td><?php echo $no++; ?></td>
            <td><?php echo $data['username'] ?></td>
            <td><?php echo $data['nama'] ?></td>
            <td><?php echo $data['alamat'] ?></td>
            <td>
                <a href="./edit.php?id=<?php echo $data['id'] ?>">Edit</a>
                <a href="./hapus.php?id=<?php echo $data['id'] ?>">Hapus</a>
            </td>
        </tr>
        <?php
    }
    ?>
    </table><br>
    <div class="aksi">
        <a class="tambah " href="member/regis.php">Tambah Member</a>
        <a class="login" href="login/login.php">Login Member</a>
    </div>
</div>