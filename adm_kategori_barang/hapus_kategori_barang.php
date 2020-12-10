<?php

include '../koneksi.php';

$id_ktg_barang = $_GET['id_ktg_barang'];

mysqli_query($koneksi, "delete from kategori_barang where id_ktg_barang='$id_ktg_barang'");

header("location:../admin/adm_kategori_barang.php");
