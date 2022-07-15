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
        <h2 class="text-center">Daftar Member</h2>
          <div class="form-group">
            <label for="user">Username</label>
            <input  type="text" class="form-control" name="user" placeholder="Username">
          </div>
          <div class="form-group">
            <label for="pass">Password </label>
            <input  type="password" class="form-control" name="pass" placeholder="Password">
          </div>
          <div class="form-group">
            <label for="nama">Nama lengkap </label>
            <input  type="text" class="form-control" name="nama" placeholder="Nama Lengkap">
          </div>
          <div class="form-group">
            <label for="alamat">Alamat </label>
            <input  type="text" class="form-control" name="alamat" placeholder="Alamat">
          </div>
          <div class="form-group">
          <input type="submit" name="submit" class="btn btn-primary btn-block" value="Register">
          </div>
        </form>
      </div>
    </div>
  </div>
  <?php
      require '../koneksi.php';

      if (isset($_POST['submit'])) {
        $user = $_POST['user'];
        $pass = $_POST['pass'];
        $hash = password_hash($pass, PASSWORD_DEFAULT);
        $nama = $_POST['nama'];
        $alamat = $_POST['alamat'];

        $sql = "INSERT INTO anggota (username, password, nama, alamat) VALUES('$user', '$hash', '$nama', '$alamat')";
        $hasil = mysqli_query($connect, $sql);
        header("Location: ../index.php?page=member");
      }
     ?>
</body>
</html>
