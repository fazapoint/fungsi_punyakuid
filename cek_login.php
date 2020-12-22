<?php
// mengaktifkan session php
session_start();

// menghubungkan dengan koneksi
include 'koneksi.php';

// menangkap data yang dikirim dari form
$username = mysqli_real_escape_string($koneksi, $_POST['username']);
$password = mysqli_real_escape_string($koneksi, $_POST['password']);

// menyeleksi data admin dengan username dan password yang sesuai
$login = mysqli_query($koneksi, "select * from user where username='$username' or email='$username'");

// menghitung jumlah data yang ditemukan
$cek = mysqli_num_rows($login);

if ($cek > 0) {
	$data = mysqli_fetch_assoc($login);
	if (password_verify($password, $data['password'])) {
		if ($data['level'] == "admin") {
			$_SESSION['id_user'] = $data['id_user'];
			$_SESSION['username'] = $username;
			$_SESSION['level'] = "admin";
			$_SESSION['status'] = "login";
			header("location:admin/dashboard_admin.php");
		} else if ($data['level'] == "user") {
			// buat session login dan username
			$_SESSION['id_user'] = $data['id_user'];
			$_SESSION['username'] = $username;
			$_SESSION['level'] = "user";
			$_SESSION['status'] = "login";
			// alihkan ke halaman dashboard pegawai
			header("location:user/dashboard_user.php");
		}
	} else {
		// alihkan ke halaman login kembali
		header("location:login.php?pesan=gagal");
	}
} else {
	header("location:login.php?pesan=gagal");
}
