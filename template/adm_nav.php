<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Halaman Admin</title>
</head>

<body>
	<h2>Halaman Admin</h2>


	<!-- cek apakah sudah login -->
	<?php
	session_start();

	// cek apakah yang mengakses halaman ini sudah login
	if ($_SESSION['level'] != "admin") {
		header("location:../index.php?pesan=bukan_admin");
	}

	if ($_SESSION['status'] != "login") {
		header("location:../index.php?pesan=belum_login");
	}

	?>


	<h4>Selamat datang, <?php echo $_SESSION['username']; ?>! anda telah login sebagai <?php echo $_SESSION['level']; ?></h4>
	<h4>nomor id anda adalah <?php echo $_SESSION['id_user']; ?></h4>

	<a href="../logout.php">LOGOUT</a>

	<br>
	<br>
	<br>

	<table border='1'>
		<tr>
			<th><a href="../admin/dashboard_admin.php">Dashboard</a></th>
			<th><a href="../admin/adm_admin.php">Admin</a></th>
			<th><a href="../admin/adm_user.php">User</a></th>
			<th><a href="../admin/adm_berita.php">Berita</a></th>
			<th><a href="../admin/adm_kategori_berita.php">Kategori berita</a></th>
			<th><a href="../admin/adm_kategori_barang.php">Kategori barang</a></th>
			<th><a href="../admin/adm_kota.php">Kota</a></th>
			<th><a href="../admin/adm_barang_hilang.php">Barang Hilang</a></th>
		</tr>
	</table>


	<br>
	<br>




</body>

</html>