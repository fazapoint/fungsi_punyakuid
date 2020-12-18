<?php


include '../koneksi.php';

$id_user = $_GET['id_user'];

//ambil data dari tabel
$d = mysqli_fetch_array(mysqli_query($koneksi, "select * from user where id_user = '$id_user'"));

//cek foto template agar tidak ikut terhapus
$dummy_photo = "user_dummy.png";


//hapus gambar dari tabel
if (($d['gambar_user']) == $dummy_photo) {
    $hapus = mysqli_query($koneksi, "delete from user where id_user='$id_user'");
    if ($hapus) { //jika berhasil
        echo "<script>alert('Data Berhasil Di Hapus gambar dummy tidak terhapus');window.location='../admin/adm_admin.php';</script>";
    } else {  //jika gagal
        echo "<script>alert('Data Gagal Di Hapus, Coba ulangi lagi');window.location='../admin/adm_admin.php'</script>";
    }
    //header("location:../admin/adm_admin.php");
} else {
    unlink("../gambar_user/$d[gambar_user]");

    $hapus = mysqli_query($koneksi, "delete from user where id_user='$id_user'");
    if ($hapus) { //jika berhasil
        echo "<script>alert('Data Berhasil Di Hapus dan gambar terhapus');window.location='../admin/adm_admin.php';</script>";
    } else {  //jika gagal
        echo "<script>alert('Data Gagal Di Hapus, Coba ulangi lagi');window.location='../admin/adm_admin.php';</script>";
    }
    //header("location:../admin/adm_admin.php");
}
