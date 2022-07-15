<?php

$query = "SELECT * FROM petugas";
$result = mysqli_query($connect, $query);
$idBuku = $_GET['id'];
?>
<div class="card">
    <h1>Daftar Petugas Perpustakaan</h1>
    <p>Silahkan pilih petugas untuk melayani anda.</p>
    <table border="1" cellspacing="0" cellpadding="4">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Jabatan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
      $num = 1;
      while ($row = mysqli_fetch_assoc($result)) { ?>
            <tr>
                <td><?php echo $num++; ?></td>
                <td><?= $row['nama_petugas']; ?></td>
                <td><?= $row['jabatan']; ?></td>
                <td><a class="btn"
                        href="index.php?page=pinjamBuku&&id=<?php echo $row['id']; ?>&&idBuku=<?php echo $idBuku; ?>">Pilih
                    </a></td>
            </tr>
            <?php } ?>
        </tbody>
    </table>

</div>