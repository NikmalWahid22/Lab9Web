<?php
$id = $_GET['id'];

// get data
$q = mysqli_query($conn, "SELECT * FROM data_barang WHERE id_barang='$id'");
$data = mysqli_fetch_assoc($q);
?>

<h2>Edit Barang</h2>

<form method="post" enctype="multipart/form-data">

    <label>Nama Barang:</label><br>
    <input type="text" name="nama" value="<?= $data['nama'] ?>"><br><br>

    <label>Kategori:</label><br>
    <select name="kategori">
        <option <?= ($data['kategori']=="Komputer" ? "selected" : "") ?>>Komputer</option>
        <option <?= ($data['kategori']=="Elektronik" ? "selected" : "") ?>>Elektronik</option>
        <option <?= ($data['kategori']=="Hand Phone" ? "selected" : "") ?>>Hand Phone</option>
    </select><br><br>

    <label>Harga Jual:</label><br>
    <input type="number" name="harga_jual" value="<?= $data['harga_jual'] ?>"><br><br>

    <label>Harga Beli:</label><br>
    <input type="number" name="harga_beli" value="<?= $data['harga_beli'] ?>"><br><br>

    <label>Stok:</label><br>
    <input type="number" name="stok" value="<?= $data['stok'] ?>"><br><br>

    <label>Gambar Saat Ini:</label><br>
    <img src="<?= $data['gambar'] ?>" width="100"><br>
    <input type="file" name="file_gambar"><br><br>

    <button type="submit" name="submit">Simpan</button>
</form>

<?php
if (isset($_POST['submit'])) {

    $nama = $_POST['nama'];
    $kategori = $_POST['kategori'];
    $harga_jual = $_POST['harga_jual'];
    $harga_beli = $_POST['harga_beli'];
    $stok = $_POST['stok'];

    $gambar = $data['gambar'];

    if ($_FILES['file_gambar']['name'] != "") {
        $filename = str_replace(' ', '_', $_FILES['file_gambar']['name']);
        move_uploaded_file($_FILES['file_gambar']['tmp_name'], "gambar/$filename");
        $gambar = "gambar/$filename";
    }

    mysqli_query($conn, "UPDATE data_barang SET 
        nama='$nama',
        kategori='$kategori',
        harga_jual='$harga_jual',
        harga_beli='$harga_beli',
        stok='$stok',
        gambar='$gambar'
        WHERE id_barang='$id'
    ");

    echo "<script>alert('Data berhasil diupdate'); window.location='index.php?page=user/list';</script>";
}
?>
