<?php

include_once '../koneksi.php';

$id_bh = $_GET['id_bh'];

$d = mysqli_fetch_array(mysqli_query($koneksi,  "select * from barang_hilang
inner join kategori_barang on barang_hilang.id_ktg_barang = kategori_barang.id_ktg_barang
inner join kota on barang_hilang.id_kota = kota.id_kota
inner join status on barang_hilang.id_status = status.id_status
where id_bh='$id_bh'"));
?>

<table>
    <tr>
        <th>Kategori</th>
        <td><?php echo $d['ktg_barang']; ?></td>
    </tr>
    <tr>
        <th>Kota</th>
        <td><?php echo $d['nama_kota']; ?></td>
    </tr>
    <tr>
        <th>Nama Barang</th>
        <td><?php echo $d['nama_bh']; ?></td>
    </tr>
    <tr>
        <th>Merk</th>
        <td><?php echo $d['merk_bh']; ?></td>
    </tr>
    <tr>
        <th>Tanggal Hilang</th>
        <td><?php echo date('d-m-Y', strtotime($d['tgl_bh']));  ?></td>
    </tr>
    <tr>
        <th>Lokasi Hilang</th>
        <td><?php echo $d['lokasi_bh']; ?></td>
    </tr>
    <tr>
        <th>Penyebab</th>
        <td><?php echo $d['penyebab_bh']; ?></td>
    </tr>
    <tr>
        <th>Nama Pencari</th>
        <td><?php echo $d['pencari_bh']; ?></td>
    </tr>
    <tr>
        <th>Nomor HP Pencari</th>
        <td><?php echo $d['nomor_hp']; ?></td>
    </tr>
    <tr>
        <th>STATUS</th>
        <td><?php echo $d['ket_status']; ?></td>
    </tr>
</table>