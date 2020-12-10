<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD PHP</title>
</head>

<body>

    <?php
    include '../template/adm_nav.php';
    ?>

    <a href="../adm_kategori_barang/tambah_kategori_barang.php">+ TAMBAH KATEGORI</a>
    <br />
    <br />

    <table border="1">
        <tr>
            <th>NO</th>
            <th>nama kategori</th>
            <th>Opsi</th>
        </tr>

        <?php
        include_once '../koneksi.php';
        $no = 1;
        $data = mysqli_query($koneksi, "select * from kategori_barang");

        while ($d = mysqli_fetch_array($data)) {
        ?>
            <tr>
                <td><?php echo $no++; ?></td>
                <td><?php echo $d['ktg_barang']; ?></td>
                <td>
                    <a href="../adm_kategori_barang/edit_kategori_barang.php?id_ktg_barang= <?php echo $d['id_ktg_barang']; ?>">EDIT</a>
                    <a href="../adm_kategori_barang/hapus_kategori_barang.php?id_ktg_barang= <?php echo $d['id_ktg_barang']; ?>">HAPUS</a>
                </td>
            </tr>
        <?php
        }
        ?>

    </table>

</body>

</html>