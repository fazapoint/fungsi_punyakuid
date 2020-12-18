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
    $id_bh = $_GET['id_bh'];

    $data = mysqli_query(
        $koneksi,
        "select * from barang_hilang
    inner join kategori_barang on barang_hilang.id_ktg_barang = kategori_barang.id_ktg_barang
    inner join kota on barang_hilang.id_kota = kota.id_kota
    inner join status on barang_hilang.id_status = status.id_status
    where id_bh='$id_bh'"
    );
    $d = mysqli_fetch_array($data);
    ?>

    <center>
        <h1><b>TELAH HILANG</b></h1>
        <h3>Sebuah barang <?php echo $d['ktg_barang']; ?></h3>
        <h3>Berupa <?php echo $d['nama_bh']; ?></h3>
    </center>


</body>

</html>