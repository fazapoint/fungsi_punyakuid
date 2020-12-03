<?php

$servername = 'localhost';
$username = 'root';
$password = '';
$database = 'berita_2438';

$koneksi = mysqli_connect($servername, $username, $password, $database);
//cek koneksi
if (mysqli_connect_errno()) {
    echo "Koneksi ke database gagal : " . mysqli_connect_error();
}
