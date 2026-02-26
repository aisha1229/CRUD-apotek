<?php
include 'koneksi.php';
$data = mysqli_query($koneksi, "SELECT * FROM obat");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Data Obat Apotek</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<h2>💊 Data Obat Apotek</h2>

<a href="tambah.php" class="btn">+ Tambah Obat</a>

<table>
    <tr>
        <th>No</th>
        <th>Kode Obat</th>
        <th>Nama Obat</th>
        <th>Kategori</th>
        <th>Stok</th>
        <th>Harga</th>
        <th>Aksi</th>
    </tr>

    <?php $no = 1; while($row = mysqli_fetch_assoc($data)) { ?>
    <tr>
        <td><?= $no++; ?></td>
        <td><?= $row['kode_obat']; ?></td>
        <td><?= $row['nama_obat']; ?></td>
        <td><?= $row['kategori']; ?></td>
        <td><?= $row['stok']; ?></td>
        <td>Rp <?= number_format($row['harga'], 0, ',', '.'); ?></td>
        <td>
            <a href="edit.php?id=<?= $row['id']; ?>">Edit</a> |
            
            <a href="hapus.php?id=<?= $row['id']; ?>" 
               onclick="return confirm('Yakin mau menghapus data ini?')">
               Hapus
            </a>
        </td>
    </tr>
    <?php } ?>

</table>

</body>
</html>