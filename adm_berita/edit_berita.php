<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit berita</title>
</head>

<body>

    <h2>Edit berita</h2>
    <br />

    <?php
    session_start();
    include_once '../koneksi.php';
    $id_berita = $_GET['id_berita'];
    $data = mysqli_query($koneksi, "select * from berita where id_berita='$id_berita'");


    while ($d = mysqli_fetch_array($data)) {
    ?>
        <form method="POST" action="">
            <table>
                <tr>
                    <td>Kategori</td>
                    <td>
                        <input type="text" name="id_berita" value="<?php echo $d['id_berita']; ?>">
                        <input type="text" name="id_user" value="<?php echo $_SESSION['id_user']; ?>">
                        <select name="kategori" id="kategori">
                            <?php
                            $query_kategori = "select * from kategori_berita";
                            $sql_kategori = mysqli_query($koneksi, $query_kategori);

                            while ($data_kategori = mysqli_fetch_array($sql_kategori)) {
                                $nama_kategori = $data_kategori['ktg_berita'];
                                $id_ktg_berita = $data_kategori['id_ktg_berita'];
                                //pengecekan untuk edit data data mana yang sebelumnya dipilih
                                if ($d['id_ktg_berita'] == $data_kategori['id_ktg_berita']) {
                                    echo "<option value='" . $id_ktg_berita . "' selected>" . $nama_kategori . "</option>";
                                } else {
                                    echo "<option value='" . $id_ktg_berita . "'>" . $nama_kategori . "</option>";
                                }
                            ?>

                            <?php
                            }
                            ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>kota</td>
                    <td>
                        <select name="kota" id="kota">
                            <?php
                            $query_kota = "select * from kota";
                            $sql_kota = mysqli_query($koneksi, $query_kota);

                            while ($data_kota = mysqli_fetch_array($sql_kota)) {
                                $nama_kota = $data_kota['nama_kota'];
                                $id_kota = $data_kota['id_kota'];
                                //pengecekan untuk edit data data mana yang sebelumnya dipilih
                                if ($d['id_kota'] == $data_kota['id_kota']) {
                                    echo "<option value='" . $id_kota . "' selected>" . $nama_kota . "</option>";
                                } else {
                                    echo "<option value='" . $id_kota . "'>" . $nama_kota . "</option>";
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
                    <td><input type="text" name="judul" value="<?php echo $d['judul_berita']; ?>"></td>
                </tr>
                <tr>
                    <td>Isi</td>
                    <td><input type="text" name="isi" value="<?php echo $d['isi_berita']; ?>"></td>
                </tr>
                <tr>
                    <td>Tanggal</td>
                    <td><input type="date" name="tgl" value="<?php echo $d['tgl_berita']; ?>"></td>
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
        $kota = $_POST['kota'];
        $judul = $_POST['judul'];
        $isi = $_POST['isi'];
        $tgl = $_POST['tgl'];
        $query = "update berita set id_ktg_berita='$kategori', id_user='$id_user', id_kota='$kota', judul_berita='$judul', isi_berita='$isi', tgl_berita='$tgl' where id_berita='$id_berita'";
        $hasil = mysqli_query($koneksi, $query) or die(mysqli_error($koneksi));
    ?>

        <script>
            alert("Data berhasil ditambahkan");
            window.location = '../admin/adm_berita.php';
        </script>
    <?php
    }
    ?>


</body>

</html>