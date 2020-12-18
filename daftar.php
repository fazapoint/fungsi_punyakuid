<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD PHP</title>
</head>

<body>
    <h2>DAFTAR</h2>
    <br />
    <!-- cek pesan notifikasi -->
    <?php
    if (isset($_GET['pesan'])) {
        if ($_GET['pesan'] == "username") {
            echo "<div class='alert'>Username sudah terdaftar</div>";
        } else if ($_GET['pesan'] == "email") {
            echo "<div class='alert'>Email sudah terdaftar</div>";
        } else if ($_GET['pesan'] == "password") {
            echo "<div class='alert'>Password tidak sesuai</div>";
        } else if ($_GET['pesan'] == "usernameemail") {
            echo "<div class='alert'>username dan email sudah terdaftar</div>";
        }
    }

    ?>
    <br />
    <br />
    <form method="post" action="cek_daftar.php">
        <table>
            <tr>
                <td>Nama</td>
                <td>:</td>
                <td><input type="text" name="nama" placeholder="Masukkan nama" required></td>
            </tr>
            <tr>
                <td>Username</td>
                <td>:</td>
                <td><input type="text" name="username" placeholder="Masukkan username" required></td>
            </tr>
            <tr>
                <td>Email</td>
                <td>:</td>
                <td><input type="email" name="email" placeholder="Masukkan email" required></td>
            </tr>
            <tr>
                <td>Password</td>
                <td>:</td>
                <td><input type="password" name="password" placeholder="Masukkan password" required></td>
            </tr>
            <tr>
                <td>re-pasword</td>
                <td>:</td>
                <td><input type="password" name="repassword" placeholder="Konfirmasi password" required></td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td><input type="submit" name="submit" value="DAFTAR"></td>
            </tr>
        </table>
    </form>
</body>

</html>