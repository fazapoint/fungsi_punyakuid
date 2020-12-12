<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>CRUD PHP</title>
</head>

<body>
	<?php
	include_once '../koneksi.php';
	session_start();
	?>

	<h2>info</h2>
	<h4>halo <?php echo $_SESSION['id_user']; ?></h4>
	<br />
	<br />
	<h3>TAMBAH DATA info</h3>
	<form method="post" action="">
		<table>
			<tr>
				<td>Kategori</td>
				<td>
					<input type="hidden" name="id_user" value="<?php echo $_SESSION['id_user']; ?>">
					<select name="kategori" id="kategori">
						<?php
						$query_kategori = "select * from kategori_info";
						$sql_kategori = mysqli_query($koneksi, $query_kategori);
						while ($data_kategori = mysqli_fetch_array($sql_kategori)) {
							echo "<option value='" . $data_kategori['id_ktg_info'] . "' $select>" . $data_kategori['ktg_info'] . "</option>";
						}
						?>


					</select>
				</td>
			</tr>
			<tr>
				<td>Judul</td>
				<td><input type="text" name="judul"></td>
			</tr>
			<tr>
				<td>Isi</td>
				<td><input type="text" name="isi"></td>
			</tr>
			<tr>
				<td>Tanggal</td>
				<td><input type="date" name="tgl"></td>
			</tr>
			<td></td>
			<td><input type="submit" name="submit" value="SIMPAN"></td>
			</tr>
		</table>
	</form>



	<?php
	include_once '../koneksi.php';



	if (isset($_POST['submit'])) {
		$kategori = $_POST['kategori'];
		$id_user = $_POST['id_user'];
		$judul = $_POST['judul'];
		$isi = $_POST['isi'];
		$tgl = $_POST['tgl'];
		$query = "insert into info values('','$kategori','$id_user','$judul','$isi','$tgl')";
		$hasil = mysqli_query($koneksi, $query) or die(mysqli_error($koneksi));
	?>

		<script>
			alert("Data berhasil ditambahkan");
			window.location = '../admin/adm_info.php';
		</script>
	<?php
	}
	?>



</body>

</html>