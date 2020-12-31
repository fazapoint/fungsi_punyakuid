<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit admin</title>
</head>

<body>

    <h2>Edit admin</h2>
    <br />

    <?php

    include_once '../koneksi.php';
    $id_user = $_GET['id_user'];
    $data = mysqli_query($koneksi, "select * from user where id_user='$id_user'");

    while ($d = mysqli_fetch_array($data)) {
    ?>
        <form method="POST" action="" enctype="multipart/form-data">

            <table>
                <tr>
                    <td>Username</td>
                    <td><input type="text" name="username" value="<?php echo $d['username']; ?>" disabled></td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td><input type="text" name="email" value="<?php echo $d['email']; ?>" disabled></td>
                </tr>
                <tr>
                    <td>Nama</td>
                    <td><input type="hidden" name="id_user" value="<?php echo $d['id_user']; ?>">
                        <input type="text" name="nama" value="<?php echo $d['nama']; ?>"></>
                </tr>
                <tr>
                    <td></td>
                    <td>
                        <img src="../img/user/<?php echo $d['gambar_user']; ?>" id="uploadPreview" style="width: 150px; height: 150px;"><br>
                        <input id="uploadImage" type="file" accept=".jpg, .png" name="foto_user" onchange="PreviewImage();" />
                        <input type="hidden" name="foto_lama" value="<?php echo $d['gambar_user']; ?>">
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td><input type="submit" name="submit" value="SIMPAN"></td>
                </tr>


            </table>

        </form>
    <?php
    }
    ?>




    <?php
    include_once '../koneksi.php';

    if (isset($_POST['submit'])) {
        $id_user = mysqli_real_escape_string($koneksi, $_POST['id_user']);
        $nama = mysqli_real_escape_string($koneksi, $_POST['nama']);
        $foto_user = $_FILES['foto_user']['name'];
        $foto_lama = $_POST['foto_lama'];

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
            } elseif ($foto_lama == 'user_dummy.png') {
                move_uploaded_file($file_tmp, '../img/user/' . $nama_baru);
                $query = "update user set nama='$nama', gambar_user='$nama_baru' where id_user='$id_user'";
                $hasil = mysqli_query($koneksi, $query) or die(mysqli_error($koneksi));
                echo "<script>alert('Data berhasil disimpan');window.location='../admin/adm_admin.php';</script>";
            } else {
                unlink("../img/user/" . $foto_lama);
                move_uploaded_file($file_tmp, '../img/user/' . $nama_baru);
                $query = "update user set nama='$nama', gambar_user='$nama_baru' where id_user='$id_user'";
                $hasil = mysqli_query($koneksi, $query) or die(mysqli_error($koneksi));
                echo "<script>alert('Data berhasil disimpan');window.location='../admin/adm_admin.php';</script>";
            }
        } else {
            $query = "update user set nama='$nama' where id_user='$id_user'";
            $hasil = mysqli_query($koneksi, $query) or die(mysqli_error($koneksi));
            echo "<script>alert('Data berhasil diupdate');window.location='../admin/adm_admin.php';</script>";
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