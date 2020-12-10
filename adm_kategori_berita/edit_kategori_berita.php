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
    $id_ktg_berita = $_GET['id_ktg_berita'];
    $data = mysqli_query($koneksi, "select * from kategori_berita where id_ktg_berita='$id_ktg_berita'");

    while ($d = mysqli_fetch_array($data)) {
    ?>
        <form method="POST" action=" ">

            <table>
                <tr>
                    <td>Nama Kategori</td>
                    <td><input type="hidden" name="id_ktg_berita" value="<?php echo $d['id_ktg_berita']; ?>">
                        <input type="text" name="ktg_berita" value="<?php echo $d['ktg_berita']; ?>"></>
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
        $id_ktg_berita = $_POST['id_ktg_berita'];
        $ktg_berita = $_POST['ktg_berita'];
        $query = "update kategori_berita set ktg_berita='$ktg_berita' where id_ktg_berita='$id_ktg_berita'";
        $hasil = mysqli_query($koneksi, $query) or die(mysqli_error($koneksi));
    ?>

        <script>
            alert("Data berhasil diupdate");
            window.location = '../admin/adm_kategori_berita.php';
        </script>
    <?php
    }
    ?>

</body>

</html>