<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit admin</title>
</head>

<body>

    <h2>Edit admin</h2>
    <br />

    <?php

    include_once '../koneksi.php';
    $id_ktg_info = $_GET['id_ktg_info'];
    $data = mysqli_query($koneksi, "select * from kategori_info where id_ktg_info='$id_ktg_info'");

    while ($d = mysqli_fetch_array($data)) {
    ?>
        <form method="POST" action=" ">

            <table>
                <tr>
                    <td>Nama Kategori</td>
                    <td><input type="hidden" name="id_ktg_info" value="<?php echo $d['id_ktg_info']; ?>">
                        <input type="text" name="ktg_info" value="<?php echo $d['ktg_info']; ?>"></>
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
        $id_ktg_info = $_POST['id_ktg_info'];
        $ktg_info = $_POST['ktg_info'];
        $query = "update kategori_info set ktg_info='$ktg_info' where id_ktg_info='$id_ktg_info'";
        $hasil = mysqli_query($koneksi, $query) or die(mysqli_error($koneksi));
    ?>

        <script>
            alert("Data berhasil diupdate");
            window.location = '../admin/adm_kategori_info.php';
        </script>
    <?php
    }
    ?>

</body>

</html>