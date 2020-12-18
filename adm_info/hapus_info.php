<?php

include_once '../koneksi.php';

$id_info = $_GET['id_info'];

mysqli_query($koneksi, "delete from info where id_info='$id_info'");

header("location:../admin/adm_info.php");
