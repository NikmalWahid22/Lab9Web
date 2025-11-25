<h2>Data Barang</h2>

<a href="index.php?page=user/add" class="btn">+ Tambah Barang</a>
<br><br>

<table border="1" cellpadding="8" cellspacing="0">
    <tr>
        <th>Gambar</th>
        <th>Nama</th>
        <th>Kategori</th>
        <th>Harga Jual</th>
        <th>Harga Beli</th>
        <th>Stok</th>
        <th>Aksi</th>
    </tr>

    <?php
    $query = mysqli_query($conn, "SELECT * FROM data_barang");

    while ($row = mysqli_fetch_assoc($query)) {
        echo "
        <tr>
            <td><img src='{$row['gambar']}' width='80'></td>
            <td>{$row['nama']}</td>
            <td>{$row['kategori']}</td>
            <td>{$row['harga_jual']}</td>
            <td>{$row['harga_beli']}</td>
            <td>{$row['stok']}</td>
            <td>
                <a href='index.php?page=user/edit&id={$row['id_barang']}'>Edit</a> |
                <a href='index.php?page=user/delete&id={$row['id_barang']}'
                   onclick=\"return confirm('Hapus data ini?')\">
                   Hapus
                </a>
            </td>
        </tr>
        ";
    }
    ?>
</table>
