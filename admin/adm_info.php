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


    <a href="../adm_info/tambah_info.php">+ TAMBAH info</a>
    <br />
    <br />

    <table border="1">
        <tr>
            <th>NO</th>
            <th>admin</th>
            <th>kategori</th>
            <th>judul</th>
            <th>tanggal</th>
            <th>Opsi</th>
        </tr>

        <?php
        include_once '../koneksi.php';
        $no = 1;
        $data = mysqli_query(
            $koneksi,
            "select * from info
		inner join user on info.id_user = user.id_user
        inner join kategori_info on info.id_ktg_info = kategori_info.id_ktg_info"
        );

        while ($d = mysqli_fetch_array($data)) {
        ?>

            <tr>
                <td><?php echo $no++; ?></td>
                <td><?php echo $d['nama']; ?></td>
                <td><?php echo $d['ktg_info']; ?></td>
                <td><?php echo $d['judul_info']; ?></td>
                <td><?php echo date('d-m-Y', strtotime($d['tgl_info']));  ?></td>
                <td>
                    <a href="../adm_info/edit_info.php?id_info= <?php echo $d['id_info']; ?>">EDIT</a>
                    <a href="../adm_info/hapus_info.php?id_info= <?php echo $d['id_info']; ?>">HAPUS</a>
                </td>
            </tr>
        <?php
        }
        ?>

    </table>

</body>

</html>