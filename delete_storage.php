<?php
include 'koneksi.php';

// Get the id_storage from the URL parameter
$id_storage = $_GET['id_storage'];

// Query to delete the storage data
$sql = "DELETE FROM storage WHERE id_storage = '$id_storage'";
$conn->query($sql);

// Check if the deletion was successful
if ($conn->affected_rows > 0) {
    echo "Data berhasil dihapus";
} else {
    echo "Gagal menghapus data";
}

// Close database connection
$conn->close();
?>