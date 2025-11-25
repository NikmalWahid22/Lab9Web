<?php
$id = $_GET['id'];

$q = mysqli_query($conn, "SELECT gambar FROM barang WHERE id_barang='$id'");
$data = mysqli_fetch_assoc($q);

// hapus file gambar
if(file_exists("uploads/" . $data['gambar'])){
    unlink("uploads/" . $data['gambar']);
}

$delete = mysqli_query($conn, "DELETE FROM barang WHERE id_barang='$id'");

if($delete){
    echo "<script>alert('Data berhasil dihapus!');
          window.location.href='index.php?page=user/list';</script>";
} else {
    echo "<p>Gagal menghapus data!</p>";
}
?>
