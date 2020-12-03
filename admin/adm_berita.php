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
			<th>id berita</th>
            <th>id kategori</th>
            <th>id admin</th>
			<th>judul</th>
			<th>tanggal</th>
            <th>Opsi</th>
        </tr>

        <?php
        include_once '../koneksi.php';
        $no = 1;
        $data = mysqli_query($koneksi, 
		"select * from berita
		inner join admin on berita.id_admin = admin.id_admin
		inner join kategori on berita.id_kategori = kategori.id_kategori");

        while ($d = mysqli_fetch_array($data)) {
        ?>
            <tr>
                <td><?php echo $no++; ?></td>
                <td><?php echo $d['id_berita']; ?></td>
                <td><?php echo $d['id_kategori']; ?></td>
				<td><?php echo $d['nama_kategori']; ?></td>
                <td><?php echo $d['id_admin']; ?></td>
				<td><?php echo $d['username']; ?></td>
				<td><?php echo $d['judul_berita']; ?></td>
				<td><?php echo $d['tgl_berita']; ?></td>
                <td>
                    <a href="edit.php?id_amdin= <?php echo $d['id_admin']; ?>">EDIT</a>
                    <a href="hapus.php?id_admin= <?php echo $d['id_admin']; ?>">HAPUS</a>
                </td>
            </tr>
        <?php
        }
        ?>

    </table>

</body>

</html>