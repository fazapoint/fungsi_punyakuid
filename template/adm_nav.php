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
		header("location:../login.php?pesan=bukan_admin");
	}

	if ($_SESSION['status'] != "login") {
		header("location:../login.php?pesan=belum_login");
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
			<!-- INI MENU ADMIN USER -->
			<th><a href="../admin/adm_admin_profil.php">Profil</a></th>
			<th><a href="../admin/adm_admin.php">Admin</a></th>
			<th><a href="../admin/adm_user.php">User</a></th>
			<!-- INI MENU ADMIN Info -->
			<th><a href="../admin/adm_info.php">info</a></th>
			<!-- INI MENU ADMIN KATEGORI -->
			<th><a href="../admin/adm_kategori_info.php">Kategori info</a></th>
			<th><a href="../admin/adm_kategori_barang.php">Kategori barang</a></th>
			<th><a href="../admin/adm_kota.php">Kota</a></th>
			<!-- INI MENU ADMIN BARANG HILANG -->
			<th><a href="../admin/adm_barang_hilang_tunda.php">Barang Hilang Tunda</a></th>
			<th><a href="../admin/adm_barang_hilang_tolak.php">Barang Hilang Tolak</a></th>
			<th><a href="../admin/adm_barang_hilang_terbit.php">Barang Hilang Terbit</a></th>
			<th><a href="../admin/adm_barang_hilang_selesai.php">Barang Hilang Selesai</a></th>
		</tr>
	</table>


	<br>
	<br>




</body>

</html>