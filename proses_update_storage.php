<?php
include 'koneksi.php';

// Get the updated data from the form
$id_storage = $_POST['id_storage']; // Corrected variable name
$nama_barang = $_POST['nama_gudang']; // This variable seems unused in the query
$lokasi_gudang = $_POST['lokasi_gudang'];

// Query to update the storage data
$sql = "UPDATE storage SET nama_gudang = '$nama_barang', lokasi_gudang = '$lokasi_gudang' WHERE id_storage = '$id_storage'";
$conn->query($sql);

// Check if the update was successful
if ($conn->affected_rows > 0) {
    echo "Data berhasil diupdate";
} else {
    echo "Gagal mengupdate data";
}

// Close database connection
$conn->close();
?>
