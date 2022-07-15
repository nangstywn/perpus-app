<?php
$query = "SELECT * FROM buku";
$result = mysqli_query($connect, $query);
?>
<div class="card">
    <h1>Daftar Buku Perpustakaan</h1>
    <p>Silahkan pilih buku untuk dipinjam.</p>
    <table border="1" cellspacing="0">
        <thead>
            <tr>
                <th>No</th>
                <th>Judul</th>
                <th>Pengarang</th>
                <th>Tahun</th>
                <th>Penerbit</th>
                <th>Kategori</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $i = 1;
            while ($row = mysqli_fetch_assoc($result)) { ?>
            <tr>
                <td><?= $i++; ?></td>
                <td> <?= $row['judul']; ?></td>
                <td><?= $row['pengarang']; ?></td>
                <td><?= $row['tahun']; ?></td>
                <td><?= $row['penerbit']; ?></td>
                <td><?= $row['kategori'] != NULL ? $row['kategori'] : 'Tidak ada'; ?></td>
                <td><a class="btn" href="index.php?page=detailPetugas&&id=<?php echo $row['id']; ?>">Pinjam</a>
                </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</div>