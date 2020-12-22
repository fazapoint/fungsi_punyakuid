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

	$data_tunda = mysqli_query($koneksi, "select id_bh from barang_hilang where id_status='1'");
	$jml_tunda = mysqli_num_rows($data_tunda);

	$data_terbit = mysqli_query($koneksi, "select id_bh from barang_hilang where id_status='3'");
	$jml_terbit = mysqli_num_rows($data_terbit);

	$data_tolak = mysqli_query($koneksi, "select id_bh from barang_hilang where id_status='2'");
	$jml_tolak = mysqli_num_rows($data_tolak);

	$data_selesai = mysqli_query($koneksi, "select id_bh from barang_hilang where id_status='4'");
	$jml_selesai = mysqli_num_rows($data_selesai);

	$data_info = mysqli_query($koneksi, "select id_info from info");
	$jml_info = mysqli_num_rows($data_info);

	?>



	<h4>ADMIN <?php echo $jml_admin ?> </h4>
	<h4>USER <?php echo $jml_user ?> </h4>
	<h4>POST TERTUNDA <?php echo $jml_tunda ?></h4>
	<h4>POST DITOLAK <?php echo $jml_tolak ?></h4>
	<h4>POST TERBIT <?php echo $jml_terbit ?></h4>
	<h4>POST TERSELESAIKAN <?php echo $jml_selesai ?></h4>
	<h4>INFO <?php echo $jml_info ?></h4>





</body>

</html>