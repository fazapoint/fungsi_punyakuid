<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit amdin</title>
</head>

<body>

    <h2>Edit user</h2>
    <br />

    <?php

    include '../koneksi.php';
    $id_user = $_GET['id_user'];
    $data = mysqli_query($koneksi, "select * from user where id_user='$id_user'");

    while ($d = mysqli_fetch_array($data)) {
    ?>
        <form method="POST" action=" ">

            <table>
                <tr>
                    <td>Nama</td>
                    <td><input type="hidden" name="id_user" value="<?php echo $d['id_user']; ?>">
                        <input type="text" name="nama" value="<?php echo $d['nama']; ?>"></>
                </tr>
                <tr>
                    <td>username</td>
                    <td><input type="text" name="username" value="<?php echo $d['username']; ?>"></td>
                </tr>
                <tr>
                    <td>password</td>
                    <td><input type="password" name="password" value="<?php echo $d['password']; ?>"></td>
                </tr>
                <tr>
                    <td></td>
                    <td><input type="submit" name="submit" value="SIMPAN"></td>
                </tr>


            </table>

        </form>
    <?php
    }
    ?>




    <?php
    include_once '../koneksi.php';

    if (isset($_POST['submit'])) {
        $id_user = $_POST['id_user'];
        $nama = $_POST['nama'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $query = "update user set nama='$nama', username='$username', password='$password', level='user' where id_user='$id_user'";
        $hasil = mysqli_query($koneksi, $query) or die(mysqli_error($koneksi));
    ?>

        <script>
            alert("Data berhasil diupdate");
            window.location = '../admin/adm_user.php';
        </script>
    <?php
    }
    ?>

</body>

</html>