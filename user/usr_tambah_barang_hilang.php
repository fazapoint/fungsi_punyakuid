<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD PHP</title>
</head>

<body>
    <?php
    include_once '../koneksi.php';
    session_start();
    ?>

    <h2>BARANG</h2>
    <h4>halo <?php echo $_SESSION['id_user']; ?></h4>
    <br />
    <br />
    <h3>TAMBAH BARANG HILANG</h3>
    <form method="post" action="">
        <table>
            <tr>
                <td>Kategori</td>
                <td>
                    <input type="hidden" name="id_user" value="<?php echo $_SESSION['id_user']; ?>">
                    <select name="kategori" id="kategori">
                        <?php
                        $query_kategori = "select * from kategori_barang";
                        $sql_kategori = mysqli_query($koneksi, $query_kategori);
                        while ($data_kategori = mysqli_fetch_array($sql_kategori)) {
                            echo "<option value='" . $data_kategori['id_ktg_barang'] . "'>" . $data_kategori['ktg_barang'] . "</option>";
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
                            echo "<option value='" . $data_kota['id_kota'] . "'>" . $data_kota['nama_kota'] . "</option>";
                        }
                        ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Nama Barang</td>
                <td><input type="text" name="nama_bh"></td>
            </tr>
            <tr>
                <td>Merk</td>
                <td><input type="text" name="merk_bh"></td>
            </tr>
            <tr>
                <td>Tanggal Hilang</td>
                <td><input type="date" name="tgl_bh"></td>
            </tr>
            <tr>
                <td>Lokasi Hilang</td>
                <td><input type="text" name="lokasi_bh"></td>
            </tr>
            <tr>
                <td>Penyebab</td>
                <td><input type="text" name="penyebab_bh"></td>
            </tr>
            <tr>
                <td>Nama Pencari</td>
                <td><input type="text" name="pencari_bh"></td>
            </tr>
            <tr>
                <td>Alamat Pencari</td>
                <td><input type="text" name="alamat"></td>
            </tr>
            <tr>
                <td>Nomor hp</td>
                <td><input type="text" name="nomor_hp"></td>
            </tr>
            <td></td>
            <td><input type="submit" name="submit" value="SIMPAN"></td>
            </tr>
        </table>
    </form>



    <?php
    include_once '../koneksi.php';



    if (isset($_POST['submit'])) {
        $kategori = $_POST['kategori'];
        $id_user = $_POST['id_user'];
        $kota = $_POST['kota'];
        $nama_bh = $_POST['nama_bh'];
        $merk_bh = $_POST['merk_bh'];
        $tgl_bh = $_POST['tgl_bh'];
        $lokasi_bh = $_POST['lokasi_bh'];
        $penyebab_bh = $_POST['penyebab_bh'];
        $pencari_bh = $_POST['pencari_bh'];
        $alamat = $_POST['alamat'];
        $nomor_hp = $_POST['nomor_hp'];
        $query = "insert into barang_hilang values('','$kategori','$id_user','$kota','1','0','$nama_bh','$merk_bh','$tgl_bh','$lokasi_bh','$penyebab_bh','$pencari_bh','$alamat','$nomor_hp','')";
        $hasil = mysqli_query($koneksi, $query) or die(mysqli_error($koneksi));
    ?>

        <script>
            alert("Data berhasil ditambahkan");
            window.location = 'usr_barang_hilang_tunda.php';
        </script>
    <?php
    }
    ?>



</body>

</html>