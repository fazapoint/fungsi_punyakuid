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
	
    <a href="../adm_admin/tambah_admin.php">+ TAMBAH AMDIN</a>
    <br />
    <br />

    <table border="1">
        <tr>
			<th>NO</th>
			<th>id admin</th>
            <th>username</th>
            <th>password</th>
            <th>Opsi</th>
        </tr>

        <?php
        include_once '../koneksi.php';
        $no = 1;
        $data = mysqli_query($koneksi, "select * from admin");

        while ($d = mysqli_fetch_array($data)) {
        ?>
            <tr>
                <td><?php echo $no++; ?></td>
                <td><?php echo $d['id_admin']; ?></td>
                <td><?php echo $d['username']; ?></td>
                <td><?php echo $d['password']; ?></td>
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