<?php

include_once '../koneksi.php';

$id_bh = $_GET['id_bh'];

mysqli_query($koneksi, "update barang_hilang set id_status='2' where id_bh='$id_bh'");

header("location:../admin/adm_barang_hilang_tunda.php");
