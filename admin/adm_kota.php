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

    <a href="../adm_kota/tambah_kota.php">+ TAMBAH KATEGORI</a>
    <br />
    <br />

    <table border="1">
        <tr>
            <th>NO</th>
            <th>Kota</th>
            <th>Opsi</th>
        </tr>

        <?php
        include_once '../koneksi.php';
        $no = 1;
        $data = mysqli_query($koneksi, "select * from kota");

        while ($d = mysqli_fetch_array($data)) {
        ?>
            <tr>
                <td><?php echo $no++; ?></td>
                <td><?php echo $d['nama_kota']; ?></td>
                <td>
                    <a href="../adm_kota/edit_kota.php?id_kota= <?php echo $d['id_kota']; ?>">EDIT</a>
                    <a href="../adm_kota/hapus_kota.php?id_kota= <?php echo $d['id_kota']; ?>">HAPUS</a>
                </td>
            </tr>
        <?php
        }
        ?>

    </table>

</body>

</html>