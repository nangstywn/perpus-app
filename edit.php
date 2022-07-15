<?php
    require 'koneksi.php';
    $id = $_GET['id'];
    $result = mysqli_query($connect, "SELECT * FROM anggota WHERE id='$id'");
    $dataAnggota = mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Daftar Member</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
   <!-- Bootstrap CSS -->
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

  <!-- font -->
  <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet">
    <style>
    @import url('https://fonts.googleapis.com/css2?family=Quicksand:wght@700&display=swap');
        .login-main{
    height: 100vh;
}

.bg-login{
    background-image: url("images/lina.jpg");
    background-size: cover;
}
body{
  font-family: 'Quicksand';
}
.forme{
			margin: 20px auto;
      background-color: maroon;
      color: white;
			padding: 10px;
			border-radius: 5px;
    	margin-top: 5px;
}
input.form-control {
  padding:20px;
}
.btn{
  padding:5px;
}
    </style>
</head>
<body class="bg-login">
  <div class="container">
    <div class="login-main d-flex align-items-center justify-content-center">
      <div class="col-sm-9 col-md-6 col-lg-4 rounded p-4 bg-black white transparent">
      <form class="forme" action="" method="post">
        <h2 class="text-center">Edit Data Member</h2>
          <div class="form-group">
            <label for="user">Username</label>
            <input  type="text" class="form-control" name="user" value="<?php echo $dataAnggota['username']; ?>"></td>
          </div>
         <!-- <div class="form-group">
            <label for="pass">Password </label>
            <input  type="password" class="form-control" name="pass"  value="<?php //echo $dataAnggota['password']; ?>"></td>
          </div>-->
          <div class="form-group">
            <label for="nama">Nama lengkap </label>
            <input  type="text" class="form-control" name="nama"  value="<?php echo $dataAnggota['nama']; ?>"></td>
          </div>
          <div class="form-group">
            <label for="alamat">Alamat </label>
            <input  type="text" class="form-control" name="alamat"  value="<?php echo $dataAnggota['alamat']; ?>"></td>
          </div>
          <div class="form-group">
          <input type="submit" name="update" class="btn btn-primary btn-block" value="Update">
          </div>
          <div class="form-group">
          <input type="submit" name="edit" class="btn btn-primary btn-block" value="Change Password ?">
          </div>
        </form>
      </div>
    </div>
  </div>
  <?php
      require 'koneksi.php';

      if (isset($_POST['update'])) {
        $user = $_POST['user'];
        $nama = $_POST['nama'];
        $alamat = $_POST['alamat'];
        $pass = $_POST['pass'];
        $hash = password_hash($pass, PASSWORD_DEFAULT);
        $result = mysqli_query($connect, "UPDATE anggota SET 
                              id='$id', username='$user', password='$hash', nama='$nama',
                              alamat='$alamat' WHERE id='$id'");
                header('Location: index.php?page=member');
            }
      elseif(isset($_POST['edit'])){
        header('Location: password.php?id='.$id);
      }
        ?>
</body>
</html>