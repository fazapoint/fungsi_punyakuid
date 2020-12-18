<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit info</title>
</head>

<body>

    <h2>Edit info</h2>
    <br />

    <?php
    session_start();
    include_once '../koneksi.php';
    $id_info = $_GET['id_info'];
    $data = mysqli_query($koneksi, "select * from info where id_info='$id_info'");


    while ($d = mysqli_fetch_array($data)) {
    ?>
        <form method="POST" action="">
            <table>
                <tr>
                    <td>Kategori</td>
                    <td>
                        <input type="text" name="id_info" value="<?php echo $d['id_info']; ?>">
                        <input type="text" name="id_user" value="<?php echo $_SESSION['id_user']; ?>">
                        <select name="kategori" id="kategori">
                            <?php
                            $query_kategori = "select * from kategori_info";
                            $sql_kategori = mysqli_query($koneksi, $query_kategori);

                            while ($data_kategori = mysqli_fetch_array($sql_kategori)) {
                                $nama_kategori = $data_kategori['ktg_info'];
                                $id_ktg_info = $data_kategori['id_ktg_info'];
                                //pengecekan untuk edit data data mana yang sebelumnya dipilih
                                if ($d['id_ktg_info'] == $data_kategori['id_ktg_info']) {
                                    echo "<option value='" . $id_ktg_info . "' selected>" . $nama_kategori . "</option>";
                                } else {
                                    echo "<option value='" . $id_ktg_info . "'>" . $nama_kategori . "</option>";
                                }
                            ?>

                            <?php
                            }
                            ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>judul</td>
                    <td><input type="text" name="judul" value="<?php echo $d['judul_info']; ?>"></td>
                </tr>
                <tr>
                    <td>Isi</td>
                    <td><input type="text" name="isi" value="<?php echo $d['isi_info']; ?>"></td>
                </tr>
                <tr>
                    <td>Tanggal</td>
                    <td><input type="date" name="tgl" value="<?php echo $d['tgl_info']; ?>"></td>
                </tr>
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
        $kategori = $_POST['kategori'];
        $id_user = $_POST['id_user'];
        $judul = $_POST['judul'];
        $isi = $_POST['isi'];
        $tgl = $_POST['tgl'];
        $query = "update info set id_ktg_info='$kategori', id_user='$id_user', judul_info='$judul', isi_info='$isi', tgl_info='$tgl' where id_info='$id_info'";
        $hasil = mysqli_query($koneksi, $query) or die(mysqli_error($koneksi));
    ?>

        <script>
            alert("Data berhasil ditambahkan");
            window.location = '../admin/adm_info.php';
        </script>
    <?php
    }
    ?>


</body>

</html>