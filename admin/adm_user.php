<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>

    <?php
    include '../template/adm_nav.php';
    ?>

    <table border="1">
        <tr>
            <th>NO</th>
            <th>id</th>
            <th>nama</th>
            <th>username</th>
            <th>password</th>
            <th>Opsi</th>
        </tr>

        <?php
        include_once '../koneksi.php';
        $no = 1;
        $data = mysqli_query($koneksi, "select * from user where level='user'");

        while ($d = mysqli_fetch_array($data)) {
        ?>
            <tr>
                <td><?php echo $no++; ?></td>
                <td><?php echo $d['id_user']; ?></td>
                <td><?php echo $d['nama']; ?></td>
                <td><?php echo $d['username']; ?></td>
                <td><?php echo $d['password']; ?></td>
                <td><img src="../img/user/<?php echo $d['gambar_user']; ?>" alt="<?php echo $d['nama']; ?>" width="100px" height="100px"></td>
                <td>
                    <a href="../adm_user/edit_user.php?id_user= <?php echo $d['id_user']; ?>">EDIT</a>
                    <a href="../adm_user/hapus_user.php?id_user= <?php echo $d['id_user']; ?>">HAPUS</a>
                </td>
            </tr>
        <?php
        }
        ?>

    </table>

</body>

</html>