<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD PHP</title>
</head>

<body>

    <?php
    session_start();
    include '../template/user_nav.php';
    $id_user = $_SESSION['id_user'];
    ?>

    <a href="../adm_barang_hilang/tambah_barang_hilang.php">+ TAMBAH BARANG</a>
    <br />
    <br />



    <?php
    include_once '../koneksi.php';
    $no = 1;
    $data = mysqli_query(
        $koneksi,
        "select * from barang_hilang
        inner join kategori_barang on barang_hilang.id_ktg_barang = kategori_barang.id_ktg_barang
        inner join kota on barang_hilang.id_kota = kota.id_kota
        where id_user='$id_user'"
    );

    while ($d = mysqli_fetch_array($data)) {
    ?>
        <table border="1">
            <tr>
                <td>Kategori</td>
                <td><?php echo $d['ktg_barang']; ?></td>
            </tr>
            <tr>
                <td>Kota</td>
                <td><?php echo $d['nama_kota']; ?></td>
            </tr>
            <tr>
                <td>Nama Barang</td>
                <td><?php echo $d['nama_bh']; ?></td>
            </tr>
            <tr>
                <td>Merk</td>
                <td><?php echo $d['merk_bh']; ?></td>
            </tr>
            <tr>
                <td>Tanggal Hilang</td>
                <td><?php echo $d['tgl_bh']; ?></td>
            </tr>
            <tr>
                <td>Lokasi Hilang</td>
                <td><?php echo $d['lokasi_bh']; ?></td>
            </tr>
            <tr>
                <td>Penyebab</td>
                <td><?php echo $d['penyebab_bh']; ?></td>
            </tr>
            <tr>
                <td>Nama Pencari</td>
                <td><?php echo $d['pencari_bh']; ?></td>
            </tr>
            <tr>
                <td>Alamat Pencari</td>
                <td><?php echo $d['alamat']; ?></td>
            </tr>
            <tr>
                <td>Nomor HP Pencari</td>
                <td><?php echo $d['nomor_hp']; ?></td>
            </tr>
            <tr>
                <td>
                    <a href="../adm_barang_hilang/edit_barang_hilang.php?id_bh= <?php echo $d['id_bh']; ?>">EDIT</a>
                    <a href="../adm_barang_hilang/hapus_barang_hilang.php?id_barang_hilang= <?php echo $d['id_barang_hilang']; ?>">HAPUS</a>
                </td>
            </tr>
        </table>
        <br>
    <?php
    }
    ?>

    </table>

</body>

</html>