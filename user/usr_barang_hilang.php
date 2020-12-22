<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD PHP</title>
</head>

<body>

    <?php
    include '../template/user_nav.php';
    include_once '../koneksi.php';
    $id_user = $_SESSION['id_user'];
    ?>


    <br />
    <br />

    <table border="1">
        <tr>
            <th>No</th>
            <th>Kategori</th>
            <th>Kota</th>
            <th>Nama Barang</th>
            <th>Merk</th>
            <th>Tanggal Hilang</th>
            <th>Lokasi Hilang</th>
            <th>Penyebab</th>
            <th>Nama Pencari</th>
            <th>Alamat Pencari</th>
            <th>Nomor HP Pencari</th>
            <th>Status</th>
            <th>Opsi</th>
        </tr>

        <?php
        $no = 1;
        $data = mysqli_query(
            $koneksi,
            "select * from barang_hilang 
        inner join kategori_barang on barang_hilang.id_ktg_barang = kategori_barang.id_ktg_barang 
        inner join kota on barang_hilang.id_kota = kota.id_kota 
        inner join status on barang_hilang.id_status = status.id_status 
        where id_user='$id_user' and status.id_status <= 3 
        order by case
        when status.id_status = '2' then 1
        when status.id_status = '1' then 2
        when status.id_status = '3' then 3
        else 4
        end asc"
        );

        while ($d = mysqli_fetch_array($data)) {
        ?>
            <tr>
                <td><?php echo $no++; ?></td>
                <td><?php echo $d['ktg_barang']; ?></td>
                <td><?php echo $d['nama_kota']; ?></td>
                <td><?php echo $d['nama_bh']; ?></td>
                <td><?php echo $d['merk_bh']; ?></td>
                <td><?php echo date('d-m-Y', strtotime($d['tgl_bh'])); ?></td>
                <td><?php echo $d['lokasi_bh']; ?></td>
                <td><?php echo $d['penyebab_bh']; ?></td>
                <td><?php echo $d['pencari_bh']; ?></td>
                <td><?php echo $d['alamat']; ?></td>
                <td><?php echo $d['nomor_hp']; ?></td>
                <td><?php echo $d['ket_status']; ?></td>
                <td>
                    <?php
                    if ($d['id_status'] == "1") {
                    ?>
                        <a href="../usr_barang_hilang/edit_barang_hilang.php?id_bh= <?php echo $d['id_bh']; ?>">EDIT</a>
                        <a href="../usr_barang_hilang/hapus_barang_hilang.php?id_bh= <?php echo $d['id_bh']; ?>">HAPUS</a>
                    <?php
                    } elseif ($d['id_status'] == "2") {
                    ?>
                        <a href="../usr_barang_hilang/edit_barang_hilang.php?id_bh= <?php echo $d['id_bh']; ?>">PERBAIKI</a>
                        <a href="../usr_barang_hilang/hapus_barang_hilang.php?id_bh= <?php echo $d['id_bh']; ?>">HAPUS</a>
                    <?php
                    } elseif ($d['id_status'] == "3") {
                    ?>
                        <a href="../usr_barang_hilang/ketemu_barang_hilang.php?id_bh= <?php echo $d['id_bh']; ?>">KETEMU</a>
                        <a target="_blank" href="../usr_barang_hilang/cetak_barang_hilang.php?id_bh= <?php echo $d['id_bh']; ?>">CETAK</a>
                        <a href="../usr_barang_hilang/hapus_barang_hilang.php?id_bh= <?php echo $d['id_bh']; ?>">HAPUS</a>
                    <?php
                    }
                    ?>

                </td>
            </tr>

        <?php
        }
        ?>
    </table>

</body>

</html>