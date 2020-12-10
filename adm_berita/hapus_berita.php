<?php

include_once '../koneksi.php';

$id_berita = $_GET['id_berita'];

mysqli_query($koneksi, "delete from berita where id_berita='$id_berita'");

header("location:../admin/adm_berita.php");
