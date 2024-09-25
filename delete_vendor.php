<?php
include 'koneksi.php';

// Get the id_vendor from the URL parameter
$id_vendor = $_GET['id_vendor'];

// Query to delete the vendor data
$sql = "DELETE FROM vendor WHERE id_vendor = '$id_vendor'";
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