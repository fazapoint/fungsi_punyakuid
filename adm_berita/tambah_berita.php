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
?>

    <h2>BERITA</h2>
    <br />
    <br />
    <h3>TAMBAH DATA BERITA</h3>
    <form method="post" action="">
        <table>
            <tr>
                <td>Kategori</td>
                <td>
				<select name="kategori" id="kategori">
				<?php
				$query_kategori = "select * from kategori";
				$sql_kategori = mysqli_query($koneksi,$query_kategori);
				while ($data_kategori = mysqli_fetch_array($sql_kategori)){
					//pengecekan untuk edit data data mana yang sebelumnya dipilih
					if($data['kategori']==$data_kategori['id_kategori']){
						$select = "selected";
					}else{
						$select = "";
					}
					echo "<option $select>".$data_kategori['nama_kategori']."</option>";
					?>
					
				<?php	
				}
				?>
				</select>
				</td>
            </tr>
			 <tr>
                <td>Judul</td>
                <td><input type="text" name="judul_berita"></td>
            </tr>
			<tr>
                <td>Isi</td>
                <td><input type="text" name="isi_berita"></td>
            </tr>
			<tr>
                <td>Tanggal</td>
                <td><input type="text" name="kategori"></td>
            </tr>
                <td></td>
                <td><input type="submit" name="submit" value="SIMPAN"></td>
            </tr>
        </table>
    </form>
	
	
	
	<?php
	include_once 'koneksi.php';
	
	
	
	if(isset($_POST['submit'])){
		$kategori = $_POST['kategori'];
		$query="insert into kategori values('','$kategori')";
		$hasil=mysqli_query($koneksi,$query) or die (mysqli_error($koneksi));
	?>
	
	<script>
	alert("Data berhasil ditambahkan");
	window.location='index_berita.php';
	</script>
	<?php
	}
	?>
	


</body>

</html>