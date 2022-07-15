<?php
session_start();
$err = '';

// jika sudah login
if (isset($_SESSION['login-member']))
    header('Location: ../index.php');

// jika klik tombol login
if (isset($_POST['login-member'])) {
    $username = $_POST['username']; //nanang
    $password = $_POST['password']; //admin
    if ($username == '' or $password == '') {
        $err .= "Silahkan masukkan username dan password";
    } elseif (isset($_POST['login-member']) && isset($_POST['username']) && isset($_POST['password'])) {
        $username = $_POST['username']; //nanang
        $password = $_POST['password']; //admin
        require_once "../koneksi.php";

        $query = "SELECT * FROM anggota WHERE username ='$username'";
        $result = mysqli_query($connect, $query);

        // Cek apakah username terdaftar
        if ($result->num_rows == 0) {
            echo "Username atau Password salah";
        } else {

            $row = mysqli_fetch_assoc($result);

            // cek apakah password input sama dengan password di database
            // karena menggunakan enkripsi, maka perlu menggunakan fungsi password_verify
            // untuk memvalidasi
            if (!password_verify($password, $row['password'])) {
                // die("Username atau Password salah");
                $err .= "Username atau Password salah";
            } else {
                $_SESSION['login_member'] = true;
                $_SESSION['id_anggota']   = (int) $row['id'];
                $_SESSION['username']     = $row['username'];
                $_SESSION['nama']         = $row['nama'];
                $_SESSION['alamat']       = $row['alamat'];

                header("location: ../index.php");
            }
        }
    }
} elseif (isset($_POST['regis-member'])) {
    header("location: ../member/regis.php");
}

?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Login Member</title>
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

    .form-group a {
        text-decoration: none;
        color: white;
        font-size: 14px;
        align: center;
    }
    </style>
</head>

<body class="bg-login">
    <div class="container">
        <div class="login-main d-flex align-items-center justify-content-center">
            <div class="col-sm-9 col-md-6 col-lg-4 rounded p-4 bg-black white transparent">
                <form class="forme" action="" method="post">
                    <h2 class="text-center">Login Member</h2>
                    <?php
                    if ($err) {
                        echo "<li>" . $err . "</li>";
                    }
                    ?><br>
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" class="form-control" name="username" placeholder="Username">
                    </div>
                    <div class="form-group">
                        <label for="password">Password </label>
                        <input type="password" class="form-control" name="password" placeholder="Password">
                    </div>
                    <div class="form-group">
                        <input type="submit" name="login-member" class="btn btn-primary btn-block" value="Login">
                        <br><a href="">Don't Have an Account ? </a>
                        <input type="submit" name="regis-member" class="btn btn-primary btn-block" value="Register">
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>