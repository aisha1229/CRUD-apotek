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
</head>
<body>

<h2>Edit Data Obat</h2>

<form method="POST">
Kode Obat <br>
<input type="text" name="kode" value="<?= $row['kode_obat']; ?>"><br><br>

Nama Obat <br>
<input type="text" name="nama" value="<?= $row['nama_obat']; ?>"><br><br>

Kategori <br>
<select name="kategori">
<option <?= $row['kategori']=="Tablet"?"selected":""; ?>>Tablet</option>
<option <?= $row['kategori']=="Sirup"?"selected":""; ?>>Sirup</option>
<option <?= $row['kategori']=="Kapsul"?"selected":""; ?>>Kapsul</option>
<option <?= $row['kategori']=="Salep"?"selected":""; ?>>Salep</option>
</select><br><br>

Stok <br>
<input type="number" name="stok" value="<?= $row['stok']; ?>"><br><br>

Harga <br>
<input type="number" name="harga" value="<?= $row['harga']; ?>"><br><br>

<button type="submit" name="update">Update</button>
</form>

</body>
</html>