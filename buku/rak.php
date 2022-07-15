<?php
$query = "SELECT * FROM rak";
$result = mysqli_query($connect, $query);
?>
<div class="card">
    <h1 align="left">Rak Buku</h1>
    <table border="1" cellspacing="0">
        <tr>
            <th>Id Rak</th>
            <th>Id Buku</th>
            <th>Nama Rak</th>
        </tr>
        <?php while ($row = mysqli_fetch_assoc($result)) { ?>
        <tr>
            <td><?= $row['id_rak']; ?></td>
            <td><?= $row['id_buku']; ?></td>
            <td><?= $row['nama_rak']; ?></td>
        </tr>
        <?php } ?>
    </table>
</div>