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


    <a href="../adm_berita/tambah_berita.php">+ TAMBAH BERITA</a>
    <br />
    <br />

    <table border="1">
        <tr>
            <th>NO</th>
            <th>admin</th>
            <th>kategori</th>
            <th>kota</th>
            <th>judul</th>
            <th>tanggal</th>
            <th>Opsi</th>
        </tr>

        <?php
        include_once '../koneksi.php';
        $no = 1;
        $data = mysqli_query(
            $koneksi,
            "select * from berita
		inner join user on berita.id_user = user.id_user
        inner join kategori_berita on berita.id_ktg_berita = kategori_berita.id_ktg_berita
        inner join kota on berita.id_kota = kota.id_kota"
        );

        while ($d = mysqli_fetch_array($data)) {
        ?>

            <tr>
                <td><?php echo $no++; ?></td>
                <td><?php echo $d['nama']; ?></td>
                <td><?php echo $d['ktg_berita']; ?></td>
                <td><?php echo $d['nama_kota']; ?></td>
                <td><?php echo $d['judul_berita']; ?></td>
                <td><?php echo date('d-m-Y', strtotime($d['tgl_berita']));  ?></td>
                <td>
                    <a href="../adm_berita/edit_berita.php?id_berita= <?php echo $d['id_berita']; ?>">EDIT</a>
                    <a href="../adm_berita/hapus_berita.php?id_berita= <?php echo $d['id_berita']; ?>">HAPUS</a>
                </td>
            </tr>
        <?php
        }
        ?>

    </table>

</body>

</html>