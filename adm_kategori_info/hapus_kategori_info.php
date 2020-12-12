<?php

include '../koneksi.php';

$id_ktg_info = $_GET['id_ktg_info'];

mysqli_query($koneksi, "delete from kategori_info where id_ktg_info='$id_ktg_info'");

header("location:../admin/adm_kategori_info.php");
