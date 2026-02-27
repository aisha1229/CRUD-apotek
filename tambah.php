<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include 'koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $kode     = $_POST['kode'];
    $nama     = $_POST['nama'];
    $kategori = $_POST['kategori'];
    $stok     = $_POST['stok'];
    $harga    = $_POST['harga'];

    try {
        $stmt = $pdo->prepare("INSERT INTO obat 
            (kode_obat, nama_obat, kategori, stok, harga) 
            VALUES (?, ?, ?, ?, ?)");

        $stmt->execute([$kode, $nama, $kategori, $stok, $harga]);

        header("Location: index.php");
        exit;

    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Tambah Obat</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="card">
    <h2>💊 Tambah Data Obat</h2>

    <form method="POST">
        
        <label>Kode Obat</label>
        <input type="text" name="kode" required>

        <label>Nama Obat</label>
        <input type="text" name="nama" required>

        <label>Kategori</label>
        <select name="kategori">
            <option value="Tablet">Tablet</option>
            <option value="Sirup">Sirup</option>
            <option value="Kapsul">Kapsul</option>
            <option value="Salep">Salep</option>
        </select>

        <label>Stok</label>
        <input type="number" name="stok" required>

        <label>Harga</label>
        <input type="number" name="harga" required>

        <button type="submit">💾 Simpan</button>
    </form>

    <a href="index.php" class="btn-kembali">← Kembali</a>
</div>

</body>
</html>