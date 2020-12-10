<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD PHP</title>
</head>

<body>

    <h2>KATEGORI</h2>
    <br />
    <br />
    <h3>TAMBAH DATA KATEGORI</h3>
    <form method="post" action="">
        <table>
            <tr>
                <td>kategori</td>
                <td><input type="text" name="kategori"></td>
            </tr>
            <td></td>
            <td><input type="submit" name="submit" value="SIMPAN"></td>
            </tr>
        </table>
    </form>

    <?php
    include_once '../koneksi.php';



    if (isset($_POST['submit'])) {
        $kategori = $_POST['kategori'];
        $query = "insert into kategori_barang values('','$kategori')";
        $hasil = mysqli_query($koneksi, $query) or die(mysqli_error($koneksi));
    ?>

        <script>
            alert("Data berhasil ditambahkan");
            window.location = '../admin/adm_kategori_barang.php';
        </script>
    <?php
    }
    ?>



</body>

</html>