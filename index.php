<?php
include 'koneksi.php';

// Ambil semua data obat (PDO)
$stmt = $pdo->query("SELECT * FROM obat ORDER BY id DESC");
$data = $stmt->fetchAll(PDO::FETCH_ASSOC);
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

    <?php $no = 1; foreach($data as $row) { ?>
    <tr>
        <td><?= $no++; ?></td>
        <td><?= htmlspecialchars($row['kode_obat']); ?></td>
        <td><?= htmlspecialchars($row['nama_obat']); ?></td>
        <td><?= htmlspecialchars($row['kategori']); ?></td>
        <td><?= htmlspecialchars($row['stok']); ?></td>
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