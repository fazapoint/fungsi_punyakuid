<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD PHP</title>
</head>

<body>

    <h2>BERITA</h2>
    <br />
    <br />
    <h3>TAMBAH DATA ADMIN</h3>
    <form method="post" action="">
        <table>
            <tr>
                <td>username</td>
                <td><input type="text" name="username"></td>
            </tr>
            <tr>
                <td>password</td>
                <td><input type="password" name="password"></td>
            </tr>
                <td></td>
                <td><input type="submit" name="submit" value="SIMPAN"></td>
            </tr>
        </table>
    </form>
	
	<?php
	include_once '../koneksi.php';
	
	
	
	if(isset($_POST['submit'])){
		$username = $_POST['username'];
		$password = $_POST['password'];
		$query="insert into admin values('','$username','$password')";
		$hasil=mysqli_query($koneksi,$query) or die (mysqli_error($koneksi));
	?>
	
	<script>
	alert("Data berhasil ditambahkan");
	window.location='index_admin.php';
	</script>
	<?php
	}
	?>
	


</body>

</html>