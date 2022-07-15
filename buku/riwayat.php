  <?php
    $query = "SELECT p.id, a.nama, b.judul, t.nama_petugas, tanggal FROM pinjam p JOIN anggota a ON a.id=p.id_anggota
            JOIN buku b ON b.id=p.id_buku JOIN petugas t ON t.id=p.id_petugas";
    $result = mysqli_query($connect, $query);
    ?>
  <div class="card">
      <h1 align="left">Daftar Peminjaman</h1>
      <table border="1" cellspacing="0" cellpadding="4">
          <thead>
              <tr>
                  <th>Id Peminjaman</th>
                  <th>Anggota</th>
                  <th>Buku</th>
                  <th>Petugas</th>
                  <th>Tanggal Peminjaman</th>
              </tr>
          </thead>
          <tbody>
              <?php while ($row = mysqli_fetch_assoc($result)) { ?>
              <tr>
                  <td><?= $row['id']; ?></td>
                  <td><?= $row['nama']; ?></td>
                  <td><?= $row['judul']; ?></td>
                  <td><?= $row['nama_petugas']; ?></td>
                  <td><?= $row['tanggal']; ?></td>
              </tr>
              <?php } ?>
          </tbody>
      </table>
  </div>