<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Membuat Login Dengan PHP dan MySQLi - WWW.MALASNGODING.COM</title>
</head>
<body>
	<h2>Halaman Admin</h2>
	
	<br/>
 
	<!-- cek apakah sudah login -->
	<?php 
	session_start();
	if($_SESSION['status']!="login"){
		header("location:../index.php?pesan=belum_login");
	}
	
	?>
	
 
	<h4>Selamat datang, <?php echo $_SESSION['username']; ?>! anda telah login.</h4>
 
	<br/>
	
	<table border='1'>
		<tr>
		<th><a href="../admin/adm_admin.php">Menu admin</a></th>
		<th><a href="../admin/adm_berita.php">Menu berita</a></th>
		<th><a href="../admin/adm_kategori.php">Menu kategori</a></th>
		<th><a href="../admin/adm_barang.php">Menu barang</a></th>
		<th><a href="../admin/adm_orang.php">Menu orang</a></th>
		</tr>
	</table>
	
	
	<br>
	<br>
 
	<a href="logout.php">LOGOUT</a>
 
 
</body>
</html>