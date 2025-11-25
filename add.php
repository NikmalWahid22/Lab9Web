<h2>Tambah Barang</h2>

<form method="post" enctype="multipart/form-data">
    <label>Nama Barang:</label><br>
    <input type="text" name="nama"><br><br>

    <label>Kategori:</label><br>
    <select name="kategori">
        <option value="Komputer">Komputer</option>
        <option value="Elektronik">Elektronik</option>
        <option value="Hand Phone">Hand Phone</option>
    </select><br><br>

    <label>Harga Jual:</label><br>
    <input type="number" name="harga_jual"><br><br>

    <label>Harga Beli:</label><br>
    <input type="number" name="harga_beli"><br><br>

    <label>Stok:</label><br>
    <input type="number" name="stok"><br><br>

    <label>File Gambar:</label><br>
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

    $gambar = null;
    if ($_FILES['file_gambar']['error'] == 0) {
        $filename = str_replace(' ', '_', $_FILES['file_gambar']['name']);
        move_uploaded_file($_FILES['file_gambar']['tmp_name'], "gambar/$filename");
        $gambar = "gambar/$filename";
    }

    mysqli_query($conn, "INSERT INTO data_barang 
        (nama, kategori, harga_jual, harga_beli, stok, gambar)
        VALUES ('$nama', '$kategori', '$harga_jual', '$harga_beli', '$stok', '$gambar')");
        
    echo "<script>alert('Data berhasil disimpan'); window.location='index.php?page=user/list';</script>";
}
?>
