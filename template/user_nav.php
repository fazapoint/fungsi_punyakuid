<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Membuat Login Dengan PHP dan MySQLi - WWW.MALASNGODING.COM</title>
</head>

<body>
    <h2>Halaman User</h2>


    <!-- cek apakah sudah login -->
    <?php
    session_start();

    // cek apakah yang mengakses halaman ini sudah login
    if ($_SESSION['level'] != "user") {
        header("location:../index.php?pesan=bukan_user");
    }

    if ($_SESSION['status'] != "login") {
        header("location:../index.php?pesan=belum_login");
    }

    ?>


    <h4>Selamat datang, <?php echo $_SESSION['username']; ?>! anda telah login.</h4>
    <h4>nomor id anda adalah <?php echo $_SESSION['id_user']; ?></h4>

    <a href="../logout.php">LOGOUT</a>

    <br>
    <br>
    <br>

    <table border='1'>
        <tr>
            <th><a href="../user/home.php">Profil Saya</a></th>
            <th><a href="../user/usr_tambah_barang_hilang.php">Tambah Barang Hilang</a></th>
            <th><a href="../user/usr_barang_hilang.php">Barang Hilang</a></th>
            <th><a href="../user/adm_kategori_berita.php">Menu 4</a></th>
            <th><a href="../user/adm_barang_hilang.php">Menu 5</a></th>
            <th><a href="../user/adm_orang_hilang.php">Menu 6</a></th>
        </tr>
    </table>


    <br>
    <br>




</body>

</html>