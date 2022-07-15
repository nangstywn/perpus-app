  <?php
  $query = "SELECT * FROM petugas";
  $result = mysqli_query($connect, $query);
  ?>
  <div class="card">
      <h1 align="left">Daftar Petugas Perpustakaan</h1>
      <table border="1" cellspacing="0" cellpadding="4">

          <head>
              <tr>
                  <th>No</th>
                  <th>Nama</th>
                  <th>Jabatan</th>
              </tr>
          </head>
          <tbody>
              <?php
        $num = 1;
        while ($row = mysqli_fetch_assoc($result)) { ?>
              <tr>
                  <td><?php echo $num++; ?></td>
                  <td><?= $row['nama_petugas']; ?></td>
                  <td><?= $row['jabatan']; ?></td>
              </tr>
              <?php } ?>
          </tbody>
      </table>
  </div>