<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>CRUD PHP</title>
</head>

<body>
	<h2>Login</h2>
	<br />
	<!-- cek pesan notifikasi -->
	<?php
	/*if(isset($_GET['pesan'])){
		if($_GET['pesan'] == "gagal"){
			echo "Login gagal! username dan password salah!";
		}else if($_GET['pesan'] == "logout"){
			echo "Anda telah berhasil logout";
		}*/

	if (isset($_GET['pesan'])) {
		if ($_GET['pesan'] == "gagal") {
			echo "<div class='alert'>Username atau Password tidak sesuai !</div>";
		} else if ($_GET['pesan'] == "belum_login") {
			echo "<div class='alert'>Anda belum login</div>";
		} else if ($_GET['pesan'] == "bukan_user") {
			echo "<div class='alert'>Anda bukan user</div>";
		} else if ($_GET['pesan'] == "bukan_admin") {
			echo "<div class='alert'>Anda bukan admin</div>";
		} else if ($_GET['pesan'] == "logout") {
			echo "<div class='alert'>Anda berhasil logout</div>";
		} else if ($_GET['pesan'] == "daftar_sukses") {
			echo "<div class='alert'>Daftar sukses silahkan login</div>";
		}
	}

	?>
	<br />
	<br />
	<form method="post" action="cek_login.php">
		<table>
			<tr>
				<td>Username</td>
				<td>:</td>
				<td><input type="text" name="username" placeholder="Masukkan username" required></td>
			</tr>
			<tr>
				<td>Password</td>
				<td>:</td>
				<td><input type="password" name="password" placeholder="Masukkan password" required></td>
			</tr>
			<tr>
				<td></td>
				<td></td>
				<td><input type="submit" value="LOGIN"></td>
			</tr>
		</table>
	</form>
	<h4>belum punya akun?</h4>
	<a href="daftar.php">Daftar</a>
</body>

</html>