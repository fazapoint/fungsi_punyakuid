<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Punyakuid - tambah admin</title>
</head>

<body>

    <h2>ADMIN</h2>
    <br />
    <br />
    <h3>TAMBAH DATA ADMIN</h3>
    <br>
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
        } else if ($_GET['pesan'] == "ekstensi") {
            echo "<div class='alert'>Ekstensi jpg dan png saja</div>";
        } else if ($_GET['pesan'] == "ukuran") {
            echo "<div class='alert'>Ukuran maksimal 1MB</div>";
        }
    }

    ?>

    <form method="post" action="" enctype="multipart/form-data">
        <table>
            <tr>
                <td>nama</td>
                <td><input type="text" name="nama"></td>
            </tr>
            <tr>
                <td>email</td>
                <td><input type="email" name="email"></td>
            </tr>
            <tr>
                <td>username</td>
                <td><input type="text" name="username"></td>
            </tr>
            <tr>
                <td>password</td>
                <td><input type="password" name="password"></td>
            </tr>
            <tr>
                <td>re-password</td>
                <td><input type="password" name="repassword"></td>
            </tr>
            <tr>
                <td></td>
                <td>
                    <img src="../img/user/user_dummy.png" id="uploadPreview" style="width: 150px; height: 150px;" /><br>
                    <input id="uploadImage" type="file" accept=".jpg, .png" name="foto_user" onchange="PreviewImage();" />
                </td>
            </tr>
            <td></td>
            <td><input type="submit" name="submit" value="SIMPAN"></td>
            </tr>
        </table>
    </form>

    <?php
    include_once '../koneksi.php';



    if (isset($_POST['submit'])) {
        $nama = mysqli_real_escape_string($koneksi, $_POST['nama']);
        $username = mysqli_real_escape_string($koneksi, $_POST['username']);
        $email = mysqli_real_escape_string($koneksi, $_POST['email']);
        $password = mysqli_real_escape_string($koneksi, $_POST['password']);
        $repassword = mysqli_real_escape_string($koneksi, $_POST['repassword']);
        $password_hash = password_hash($password, PASSWORD_DEFAULT);
        $foto_user = $_FILES['foto_user']['name'];

        $cek_username = mysqli_query($koneksi, "select * from user where username='$username'");
        $duplikat_username = mysqli_num_rows($cek_username);

        $cek_email = mysqli_query($koneksi, "select * from user where email='$email'");
        $duplikat_email = mysqli_num_rows($cek_email);

        if ($duplikat_username > 0 and $duplikat_email > 0) {
            header("location:tambah_admin.php?pesan=usernameemail");
        } elseif ($duplikat_username > 0) {
            header("location:tambah_admin.php?pesan=username");
        } elseif ($duplikat_email > 0) {
            header("location:tambah_admin.php?pesan=email");
        } elseif ($password != $repassword) {
            header("location:tambah_admin.php?pesan=password");
        } else {

            if ($foto_user != "") {
                $ekstensi_boleh = array('png', 'jpg', 'jpeg');
                $x = explode('.', $foto_user);
                $ekstensi = strtolower(end($x));
                $file_tmp = $_FILES['foto_user']['tmp_name'];
                $ukuran = $_FILES['foto_user']['size'];
                $maxsize = 1044070;
                $angka_acak = rand(1, 999);
                $nama_baru = $angka_acak . '-' . $foto_user;

                if (in_array($ekstensi, $ekstensi_boleh) === false) {
                    header("location:tambah_admin.php?pesan=ekstensi");
                } elseif ($ukuran >= $maxsize || $ukuran == 0) {
                    header("location:tambah_admin.php?pesan=ukuran");
                } else {
                    move_uploaded_file($file_tmp, '../img/user/' . $nama_baru);
                    $query = "insert into user values('','$nama', '$email', '$username','$password_hash','admin','$nama_baru')";
                    $hasil = mysqli_query($koneksi, $query) or die(mysqli_error($koneksi));
                    echo "<script>alert('Data berhasil disimpan');window.location='../admin/adm_admin.php';</script>";
                }
            } else {
                $query = "insert into user values('','$nama', '$email', '$username','$password_hash','admin','user_dummy.png')";
                $hasil = mysqli_query($koneksi, $query) or die(mysqli_error($koneksi));
                echo "<script>alert('Data berhasil disimpan');window.location='../admin/adm_admin.php';</script>";
            }
        }
    }
    ?>

    <script type="text/javascript">
        function PreviewImage() {
            var oFReader = new FileReader();
            oFReader.readAsDataURL(document.getElementById("uploadImage").files[0]);
            oFReader.onload = function(oFREvent) {
                document.getElementById("uploadPreview").src = oFREvent.target.result;
            };
        };
    </script>

</body>

</html>