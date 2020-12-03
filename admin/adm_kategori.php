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
	
    <a href="../adm_kategori/tambah_kategori.php">+ TAMBAH KATEGORI</a>
    <br />
    <br />

    <table border="1">
        <tr>
			<th>NO</th>
			<th>id kategori</th>
            <th>nama kategori</th>
            <th>Opsi</th>
        </tr>

        <?php
        include_once '../koneksi.php';
        $no = 1;
        $data = mysqli_query($koneksi, "select * from kategori");

        while ($d = mysqli_fetch_array($data)) {
        ?>
            <tr>
                <td><?php echo $no++; ?></td>
                <td><?php echo $d['id_kategori']; ?></td>
                <td><?php echo $d['nama_kategori']; ?></td>      
                <td>
                    <a href="edit.php?id_kategori= <?php echo $d['id_kategori']; ?>">EDIT</a>
                    <a href="hapus.php?id_kategori= <?php echo $d['id_kategori']; ?>">HAPUS</a>
                </td>
            </tr>
        <?php
        }
        ?>

    </table>

</body>

</html>