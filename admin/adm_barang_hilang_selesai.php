<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD PHP</title>
</head>

<body>

    <?php
    include_once '../template/adm_nav.php';
    ?>


    <br />
    <br />

    <table border="1">
        <tr>
            <th>NO</th>
            <th>Id Barang</th>
            <th>Username</th>
            <th>Kategori Barang</th>
            <th>Kota</th>
            <th>Nama Barang</th>
            <th>Merek Barang</th>
            <th>Tanggal Hilang</th>
            <th>Lokasi Hilang</th>
            <th>Penyebab Hilang</th>
            <th>Nama Pencari</th>
            <th>Alamat</th>
            <th>Nomor HP Pencari</th>
            <th>Status</th>
            <th>Opsi</th>
        </tr>

        <?php
        include_once '../koneksi.php';
        $no = 1;
        $data = mysqli_query(
            $koneksi,
            "select * from barang_hilang
        inner join kategori_barang on barang_hilang.id_ktg_barang = kategori_barang.id_ktg_barang
        inner join kota on barang_hilang.id_kota = kota.id_kota
        inner join user on barang_hilang.id_user = user.id_user
        inner join status on barang_hilang.id_status = status.id_status
        where status.id_status ='4'"
        );

        while ($d = mysqli_fetch_array($data)) {
        ?>
            <tr>
                <td><?php echo $no++; ?></td>
                <td><?php echo $d['id_bh']; ?></td>
                <td><?php echo $d['username']; ?></td>
                <td><?php echo $d['ktg_barang']; ?></td>
                <td><?php echo $d['nama_kota']; ?></td>
                <td><?php echo $d['nama_bh']; ?></td>
                <td><?php echo $d['merk_bh']; ?></td>
                <td><?php echo date('d-m-Y', strtotime($d['tgl_bh']));  ?></td>
                <td><?php echo $d['lokasi_bh']; ?></td>
                <td><?php echo $d['penyebab_bh']; ?></td>
                <td><?php echo $d['pencari_bh']; ?></td>
                <td><?php echo $d['alamat']; ?></td>
                <td><?php echo $d['nomor_hp']; ?></td>
                <td><?php echo $d['ket_status']; ?></td>
                <td>
                    <a href="../adm_barang_hilang_selesai/hapus_barang_hilang.php?id_bh= <?php echo $d['id_bh']; ?>">HAPUS</a>
                    <a href="../adm_barang_hilang_selesai/detail_barang_hilang.php?id_bh= <?php echo $d['id_bh']; ?>">DETAIL</a>
                </td>

            </tr>
        <?php
        }
        ?>

    </table>

</body>

</html>