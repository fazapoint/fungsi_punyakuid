<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Membuat Login Dengan PHP dan MySQLi - WWW.MALASNGODING.COM</title>
</head>

<body>


	<!-- cek apakah sudah login -->
	<?php
	include_once '../koneksi.php';
	/*session_start();
	if($_SESSION['status']!="login"){
		header("location:../index.php?pesan=belum_login");
	}*/
	include '../template/adm_nav.php';

	$data_admin = mysqli_query($koneksi, "select id_user from user where level='admin'");
	$jml_admin = mysqli_num_rows($data_admin);

	$data_user = mysqli_query($koneksi, "select id_user from user where level='user'");
	$jml_user = mysqli_num_rows($data_user);
	?>



	<h4>ADMIN <?php echo $jml_admin ?> </h4>
	<h4>USER <?php echo $jml_user ?> </h4>
	<h4>POST TERTUNDA</h4>
	<h4>POST TERBIT</h4>
	<h4>POST TERSELESAIKAN</h4>
	<h4>BERITA</h4>





</body>

</html>