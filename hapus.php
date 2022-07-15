<?php
    require 'koneksi.php';

    $id = $_GET['id'];
    $result = mysqli_query($connect, "DELETE FROM anggota WHERE id='$id'");
    
    header('Location: index.php?page=member');
?>