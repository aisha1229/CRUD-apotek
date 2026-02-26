<?php
include 'koneksi.php';

if(isset($_POST['submit'])){
    $kode = $_POST['kode'];
    $nama = $_POST['nama'];
    $kategori = $_POST['kategori'];
    $stok = $_POST['stok'];
    $harga = $_POST['harga'];

    mysqli_query($koneksi, "INSERT INTO obat 
    VALUES('', '$kode', '$nama', '$kategori', '$stok', '$harga')");

    header("Location: index.php");
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
        Kode Obat
        <input type="text" name="kode" required>

        Nama Obat
        <input type="text" name="nama" required>

        Kategori
        <select name="kategori">
            <option value="Tablet">Tablet</option>
            <option value="Sirup">Sirup</option>
            <option value="Kapsul">Kapsul</option>
            <option value="Salep">Salep</option>
        </select>

        Stok
        <input type="number" name="stok" required>

        Harga
        <input type="number" name="harga" required>

        <button type="submit" name="submit">💾 Simpan</button>
    </form>
</div>

</body>
</html>