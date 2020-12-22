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
    /*session_start();
	if($_SESSION['status']!="login"){
		header("location:../index.php?pesan=belum_login");
	}*/

    include '../template/user_nav.php';

    $id_user = $_SESSION['id_user'];

    $data_selesai = mysqli_query($koneksi, "select id_bh from barang_hilang where id_status='4' and id_user='$id_user'");
    $jml_selesai = mysqli_num_rows($data_selesai);

    $data_cari = mysqli_query($koneksi, "select id_bh from barang_hilang where id_status='3' and id_user='$id_user'");
    $jml_cari = mysqli_num_rows($data_cari);
    ?>

    <h2>Jumlah barangmu yang sudah ketemu : <?php echo $jml_selesai ?> </h2>
    <h2>Jumlah barangmu yang yang sedang dicari : <?php echo $jml_cari ?> </h2>


</body>

</html>