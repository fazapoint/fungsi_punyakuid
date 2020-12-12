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

    <a href="../adm_kategori_info/tambah_kategori_info.php">+ TAMBAH KATEGORI</a>
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
        $data = mysqli_query($koneksi, "select * from kategori_info");

        while ($d = mysqli_fetch_array($data)) {
        ?>
            <tr>
                <td><?php echo $no++; ?></td>
                <td><?php echo $d['ktg_info']; ?></td>
                <td>
                    <a href="../adm_kategori_info/edit_kategori_info.php?id_ktg_info= <?php echo $d['id_ktg_info']; ?>">EDIT</a>
                    <a href="../adm_kategori_info/hapus_kategori_info.php?id_ktg_info= <?php echo $d['id_ktg_info']; ?>">HAPUS</a>
                </td>
            </tr>
        <?php
        }
        ?>

    </table>

</body>

</html>