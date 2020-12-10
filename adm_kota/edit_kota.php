<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit admin</title>
</head>

<body>

    <h2>Edit Kota</h2>
    <br />

    <?php

    include_once '../koneksi.php';
    $id_kota = $_GET['id_kota'];
    $data = mysqli_query($koneksi, "select * from kota where id_kota='$id_kota'");

    while ($d = mysqli_fetch_array($data)) {
    ?>
        <form method="POST" action=" ">

            <table>
                <tr>
                    <td>Nama kota</td>
                    <td><input type="hidden" name="id_kota" value="<?php echo $d['id_kota']; ?>">
                        <input type="text" name="kota" value="<?php echo $d['nama_kota']; ?>"></>
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
        $id_kota = $_POST['id_kota'];
        $kota = $_POST['kota'];
        $query = "update kota set nama_kota='$kota' where id_kota='$id_kota'";
        $hasil = mysqli_query($koneksi, $query) or die(mysqli_error($koneksi));
    ?>

        <script>
            alert("Data berhasil diupdate");
            window.location = '../admin/adm_kota.php';
        </script>
    <?php
    }
    ?>

</body>

</html>