<?php

include '../koneksi.php';

$id_user = $_GET['id_user'];

mysqli_query($koneksi, "delete from user where id_user='$id_user'");

header("location:../admin/adm_admin.php");
