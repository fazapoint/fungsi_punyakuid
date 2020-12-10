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

    <a href="../adm_kategori_berita/tambah_kategori_berita.php">+ TAMBAH KATEGORI</a>
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
        $data = mysqli_query($koneksi, "select * from kategori_berita");

        while ($d = mysqli_fetch_array($data)) {
        ?>
            <tr>
                <td><?php echo $no++; ?></td>
                <td><?php echo $d['ktg_berita']; ?></td>
                <td>
                    <a href="../adm_kategori_berita/edit_kategori_berita.php?id_ktg_berita= <?php echo $d['id_ktg_berita']; ?>">EDIT</a>
                    <a href="../adm_kategori_berita/hapus_kategori_berita.php?id_ktg_berita= <?php echo $d['id_ktg_berita']; ?>">HAPUS</a>
                </td>
            </tr>
        <?php
        }
        ?>

    </table>

</body>

</html>