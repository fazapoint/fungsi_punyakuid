<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <?php
    include '../koneksi.php';
    include '../template/adm_nav.php';

    $id_user = $_SESSION['id_user'];



    //ambil data dari tabel
    $d = mysqli_fetch_array(mysqli_query($koneksi, "select * from user where id_user = '$id_user'"));
    ?>

    <img src="../img/user/<?php echo $d['gambar_user']; ?>" id="uploadPreview" style="width: 150px; height: 150px;"><br>
    <h3><?php echo $d['nama']; ?></h3>
    <h3><?php echo $d['email']; ?></h3>
    <a href="../adm_admin/edit_admin.php?id_user= <?php echo $d['id_user']; ?>">EDIT</a>
</body>

</html>