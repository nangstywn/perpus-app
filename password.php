<?php session_start();
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

    .login-main {
        height: 100vh;
    }

    .bg-login {
        background-image: url("images/lina.jpg");
        background-size: cover;
    }

    body {
        font-family: 'Quicksand';
    }

    .forme {
        margin: 20px auto;
        background-color: maroon;
        color: white;
        padding: 10px;
        border-radius: 5px;
        margin-top: 5px;
    }

    input.form-control {
        padding: 20px;
    }

    .btn {
        padding: 5px;
    }
    </style>
</head>

<body class="bg-login">
    <div class="container">
        <div class="login-main d-flex align-items-center justify-content-center">
            <div class="col-sm-9 col-md-6 col-lg-4 rounded p-4 bg-black white transparent">
                <form class="forme" action="" method="post">
                    <h2 class="text-center">Edit Password</h2>
                    <div class="form-group">
                        <div class="form-group">
                            <label for="pass">Username </label>
                            <input type="text" class="form-control" name="username"
                                value="<?php echo $_SESSION['username'] ?>" readonly></td>
                        </div>
                        <div class="form-group">
                            <label for="pass">Old Password </label>
                            <input type="password" class="form-control" name="lama" placeholder="Old Password">
                        </div>
                        <div class="form-group">
                            <label for="pass">New Password </label>
                            <input type="password" class="form-control" name="pass" placeholder="New Password">
                        </div>
                        <div class="form-group">
                            <label for="nama">Confirm New Password </label>
                            <input type="password" class="form-control" name="confirm"
                                placeholder="Confirm New Password">
                        </div>
                        <div class="form-group">
                            <input type="submit" name="edit" class="btn btn-primary btn-block"
                                value="Change Password ?">
                        </div>

                </form>
            </div>
        </div>
    </div>
    <?php
    include "koneksi.php";
     if (isset($_POST['edit'])) {
      $username        = $_POST['username'];
      $password_lama    = $_POST['lama'];
      $password_baru    = $_POST['pass'];
      $konf_password    = $_POST['confirm'];
      $sql = mysqli_query($connect, "SELECT * FROM anggota WHERE username='$username'");
      $hasil = mysqli_num_rows ($sql);

      if (empty($_POST['pass']) || empty($_POST['confirm'])) {
        echo "<h3><font color=red>Ganti Password Gagal! Data Tidak Boleh Kosong.</font></h3>";    
      }
      else if (($_POST['pass']) != ($_POST['confirm'])) {
        echo "
        <script type='text/javascript'>
        alert('Ganti Password Gagal! Password dan Confirm Password Harus Sama.');
        </script>";
      }
      else if(password_verify($password_lama, $sql->fetch_assoc()['password'])){
            $pass = password_hash($password_baru, PASSWORD_DEFAULT);
            $sql = mysqli_query ($connect, "UPDATE anggota SET password='$pass' WHERE username='$username'");
            ?>
    <script language="JavaScript">
    alert('Password Berhasil Diupdate');
    document.location = 'index.php';
    </script>
    <?php
      }
      else {
      ?>
    <script language="JavaScript">
    alert('Password lama tidak sesuai!, silahkan ulang kembali!');
    </script>
    <?php
      }
      }
    ?>
</body>

</html>