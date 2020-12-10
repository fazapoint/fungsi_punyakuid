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
    $id_ktg_barang = $_GET['id_ktg_barang'];
    $data = mysqli_query($koneksi, "select * from kategori_barang where id_ktg_barang='$id_ktg_barang'");

    while ($d = mysqli_fetch_array($data)) {
    ?>
        <form method="POST" action=" ">

            <table>
                <tr>
                    <td>Nama Kategori</td>
                    <td><input type="hidden" name="id_ktg_barang" value="<?php echo $d['id_ktg_barang']; ?>">
                        <input type="text" name="ktg_barang" value="<?php echo $d['ktg_barang']; ?>"></>
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
        $id_ktg_barang = $_POST['id_ktg_barang'];
        $ktg_barang = $_POST['ktg_barang'];
        $query = "update kategori_barang set ktg_barang='$ktg_barang' where id_ktg_barang='$id_ktg_barang'";
        $hasil = mysqli_query($koneksi, $query) or die(mysqli_error($koneksi));
    ?>

        <script>
            alert("Data berhasil diupdate");
            window.location = '../admin/adm_kategori_barang.php';
        </script>
    <?php
    }
    ?>

</body>

</html>