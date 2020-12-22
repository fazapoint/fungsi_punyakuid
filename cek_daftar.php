<?php
// menghubungkan dengan koneksi
include 'koneksi.php';

// menangkap data yang dikirim dari form

$nama = mysqli_real_escape_string($koneksi, $_POST['nama']);
$username = mysqli_real_escape_string($koneksi, $_POST['username']);
$email = mysqli_real_escape_string($koneksi, $_POST['email']);
$password = mysqli_real_escape_string($koneksi, $_POST['password']);
$repassword = mysqli_real_escape_string($koneksi, $_POST['repassword']);
$password_hash = password_hash($password, PASSWORD_DEFAULT);

$cek_username = mysqli_query($koneksi, "select * from user where username='$username'");
$duplikat_username = mysqli_num_rows($cek_username);

$cek_email = mysqli_query($koneksi, "select * from user where email='$email'");
$duplikat_email = mysqli_num_rows($cek_email);



if ($duplikat_username > 0 and $duplikat_email > 0) {
    header("location:daftar.php?pesan=usernameemail");
} elseif ($duplikat_username > 0) {
    header("location:daftar.php?pesan=username");
} elseif ($duplikat_email > 0) {
    header("location:daftar.php?pesan=email");
} elseif ($password != $repassword) {
    header("location:daftar.php?pesan=password");
} else {
    $query = "insert into user values('','$nama', '$email', '$username','$password_hash','user','user_dummy.png')";
    $hasil = mysqli_query($koneksi, $query) or die(mysqli_error($koneksi));
    header("location:login.php?pesan=daftar_sukses");
}
