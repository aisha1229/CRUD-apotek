<?php
include 'koneksi.php';
$id = $_GET['id'];

$data = mysqli_query($koneksi, "SELECT * FROM obat WHERE id='$id'");
$row = mysqli_fetch_assoc($data);

if(isset($_POST['update'])){
    $kode = $_POST['kode'];
    $nama = $_POST['nama'];
    $kategori = $_POST['kategori'];
    $stok = $_POST['stok'];
    $harga = $_POST['harga'];

    mysqli_query($koneksi, "UPDATE obat SET
        kode_obat='$kode',
        nama_obat='$nama',
        kategori='$kategori',
        stok='$stok',
        harga='$harga'
        WHERE id='$id'");

    header("Location: index.php");
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Edit Obat</title>
<link rel="stylesheet" href="style.css">
</head>
<body>

<div class="card">
    <h2>✏️ Edit Data Obat</h2>

    <form method="POST">
        Kode Obat
        <input type="text" name="kode" 
               value="<?= $row['kode_obat']; ?>" required>

        Nama Obat
        <input type="text" name="nama" 
               value="<?= $row['nama_obat']; ?>" required>

        Kategori
        <select name="kategori">
            <option value="Tablet" <?= $row['kategori']=="Tablet"?"selected":""; ?>>Tablet</option>
            <option value="Sirup" <?= $row['kategori']=="Sirup"?"selected":""; ?>>Sirup</option>
            <option value="Kapsul" <?= $row['kategori']=="Kapsul"?"selected":""; ?>>Kapsul</option>
            <option value="Salep" <?= $row['kategori']=="Salep"?"selected":""; ?>>Salep</option>
        </select>

        Stok
        <input type="number" name="stok" 
               value="<?= $row['stok']; ?>" required>

        Harga
        <input type="number" name="harga" 
               value="<?= $row['harga']; ?>" required>

        <button type="submit" name="update">💾 Update Data</button>
    </form>
</div>

</body>
</html>