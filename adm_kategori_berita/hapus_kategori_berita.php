<?php

include '../koneksi.php';

$id_ktg_berita = $_GET['id_ktg_berita'];

mysqli_query($koneksi, "delete from kategori_berita where id_ktg_berita='$id_ktg_berita'");

header("location:../admin/adm_kategori_berita.php");
