<?php

include_once '../koneksi.php';
include '../template/adm_nav.php';

$id_bh = $_GET['id_bh'];

?>

<form method="post" action="">
    <table>
        <tr>
            <td>Masukkan pesan</td>
            <td><input type="text" name="pesan_bh"></td>
        </tr>
        </tr>
        <td></td>
        <td><input type="submit" name="submit" value="SIMPAN"></td>
        </tr>
    </table>
</form>

<?php

if (isset($_POST['submit'])) {
    $pesan_bh = $_POST['pesan_bh'];

    mysqli_query($koneksi, "update barang_hilang set id_status='2', pesan_bh='$pesan_bh' where id_bh='$id_bh'");

    header("location:../admin/adm_barang_hilang_tunda.php");
}
