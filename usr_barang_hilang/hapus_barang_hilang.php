<?php

include_once '../koneksi.php';

$id_bh = $_GET['id_bh'];

//ambil data dari tabel
$d = mysqli_fetch_array(mysqli_query($koneksi, "select * from barang_hilang where id_bh = '$id_bh'"));






$hapus = mysqli_query($koneksi, "delete from barang_hilang where id_bh='$id_bh'");
if ($hapus) { //jika berhasil
    unlink("../img/barang_hilang//$d[gambar_bh]");
    echo "<script>alert('Data Berhasil Di Hapus dan gambar terhapus');window.location='../user/usr_barang_hilang.php';</script>";
} else {  //jika gagal
    echo "<script>alert('Data Gagal Di Hapus, Coba ulangi lagi');window.location='../user/usr_barang_hilang.php';</script>";
}
    //header("location:../admin/adm_admin.php");
