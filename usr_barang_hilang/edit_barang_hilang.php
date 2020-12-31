<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Post</title>
</head>

<body>

    <h2>Edit Post</h2>
    <br />

    <?php
    session_start();
    include_once '../koneksi.php';
    $id_bh = $_GET['id_bh'];
    $data = mysqli_query($koneksi, "select * from barang_hilang where id_bh='$id_bh'");


    while ($d = mysqli_fetch_array($data)) {
    ?>
        <form method="POST" action="" enctype="multipart/form-data">
            <table>
                <?php
                if ($d['pesan_bh'] != "") {
                ?>
                    <tr>
                        <td>Pesan</td>
                        <td><?php echo $d['pesan_bh']; ?></td>
                    </tr>
                <?php
                }
                ?>
                <tr>
                    <td>Kategori</td>
                    <td>
                        <input type="text" name="id_bh" value="<?php echo $d['id_bh']; ?>">
                        <input type="text" name="id_user" value="<?php echo $_SESSION['id_user']; ?>">
                        <select name="kategori" id="kategori">
                            <?php
                            $query_kategori = "select * from kategori_barang";
                            $sql_kategori = mysqli_query($koneksi, $query_kategori);

                            while ($data_kategori = mysqli_fetch_array($sql_kategori)) {
                                $nama_kategori = $data_kategori['ktg_barang'];
                                $id_ktg_barang = $data_kategori['id_ktg_barang'];
                                //pengecekan untuk edit data data mana yang sebelumnya dipilih
                                if ($d['id_ktg_barang'] == $data_kategori['id_ktg_barang']) {
                                    echo "<option value='" . $id_ktg_barang . "' selected>" . $nama_kategori . "</option>";
                                } else {
                                    echo "<option value='" . $id_ktg_barang . "'>" . $nama_kategori . "</option>";
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
                    <td>Nama Barang</td>
                    <td><input type="text" name="nama_bh" value="<?php echo $d['nama_bh']; ?>"></td>
                </tr>
                <tr>
                <tr>
                    <td>Merk</td>
                    <td><input type="text" name="merk_bh" value="<?php echo $d['merk_bh']; ?>"></td>
                </tr>
                <tr>
                    <td>Tanggal Hilang</td>
                    <td><input type="date" name="tgl_bh" value="<?php echo $d['tgl_bh']; ?>"></td>
                </tr>
                <tr>
                    <td>Lokasi Hilang</td>
                    <td><input type="text" name="lokasi_bh" value="<?php echo $d['lokasi_bh']; ?>"></td>
                </tr>
                <tr>
                    <td>Penyebab</td>
                    <td><input type="text" name="penyebab_bh" value="<?php echo $d['penyebab_bh']; ?>"></td>
                </tr>
                <tr>
                    <td>Nama Pencari</td>
                    <td><input type="text" name="pencari_bh" value="<?php echo $d['pencari_bh']; ?>"></td>
                </tr>
                <tr>
                    <td>Alamat Pencari</td>
                    <td><input type="text" name="alamat" value="<?php echo $d['alamat']; ?>"></td>
                </tr>
                <tr>
                    <td>Nomor hp</td>
                    <td><input type="text" name="nomor_hp" value="<?php echo $d['nomor_hp']; ?>"></td>
                </tr>
                <tr>
                    <td></td>
                    <td>
                        <img src="../img/barang_hilang/<?php echo $d['gambar_bh']; ?>" id="uploadPreview" style="width: 150px; height: 150px;"><br>
                        <input id="uploadImage" type="file" accept=".jpg, .png" name="gambar_bh" onchange="PreviewImage();" />
                        <input type="hidden" name="gambar_lama" value="<?php echo $d['gambar_bh']; ?>">
                    </td>
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
        $id_bh = $_POST['id_bh'];
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
        $gambar_bh = $_FILES['gambar_bh']['name'];
        $gambar_lama = $_POST['gambar_lama'];

        if ($gambar_bh != "") {
            $ekstensi_boleh = array('png', 'jpg', 'jpeg');
            $x = explode('.', $gambar_bh);
            $ekstensi = strtolower(end($x));
            $file_tmp = $_FILES['gambar_bh']['tmp_name'];
            $ukuran = $_FILES['gambar_bh']['size'];
            $maxsize = 1044070;
            $angka_acak = rand(1, 999);
            $nama_baru = $angka_acak . '-' . $gambar_bh;

            if (in_array($ekstensi, $ekstensi_boleh) === false) {
                header("location:tambah_admin.php?pesan=ekstensi");
            } elseif ($ukuran >= $maxsize || $ukuran == 0) {
                header("location:tambah_admin.php?pesan=ukuran");
            } else {
                unlink("../img/barang_hilang/" . $gambar_lama);
                move_uploaded_file($file_tmp, '../img/barang_hilang/' . $nama_baru);
                $query = "update barang_hilang set 
                id_ktg_barang='$kategori', 
                id_user='$id_user',
                id_kota='$kota',
                admin_acc='',
                nama_bh='$nama_bh',
                merk_bh='$merk_bh',
                tgl_bh='$tgl_bh',
                lokasi_bh='$lokasi_bh',
                penyebab_bh='$penyebab_bh',
                pencari_bh='$pencari_bh',
                alamat='$alamat',
                nomor_hp='$nomor_hp',
                id_status='1',
                gambar_bh='$nama_baru',
                pesan_bh=''
                where id_bh='$id_bh'";
                $hasil = mysqli_query($koneksi, $query) or die(mysqli_error($koneksi));
                echo "<script>alert('Data berhasil disimpan');window.location='../user/usr_barang_hilang.php';</script>";
            }
        } else {
            $query = "update barang_hilang set 
            id_ktg_barang='$kategori', 
            id_user='$id_user',
            id_kota='$kota',
            admin_acc='',
            nama_bh='$nama_bh',
            merk_bh='$merk_bh',
            tgl_bh='$tgl_bh',
            lokasi_bh='$lokasi_bh',
            penyebab_bh='$penyebab_bh',
            pencari_bh='$pencari_bh',
            alamat='$alamat',
            nomor_hp='$nomor_hp',
            id_status='1',
            pesan_bh=''
            where id_bh='$id_bh'";
            $hasil = mysqli_query($koneksi, $query) or die(mysqli_error($koneksi));
            echo "<script>alert('Data berhasil diupdate');window.location='../user/usr_barang_hilang.php';</script>";
        }
    }
    ?>

    <script type="text/javascript">
        function PreviewImage() {
            var oFReader = new FileReader();
            oFReader.readAsDataURL(document.getElementById("uploadImage").files[0]);
            oFReader.onload = function(oFREvent) {
                document.getElementById("uploadPreview").src = oFREvent.target.result;
            };
        };
    </script>
</body>

</html>