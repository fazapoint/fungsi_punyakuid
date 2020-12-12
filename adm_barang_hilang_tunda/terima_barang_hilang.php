<?php

include_once '../koneksi.php';
session_start();
$id_bh = $_GET['id_bh'];
$id_user = $_SESSION['id_user'];

mysqli_query($koneksi, "update barang_hilang set id_status='3',admin_acc='$id_user' where id_bh='$id_bh'");

header("location:../admin/adm_barang_hilang_tunda.php");
