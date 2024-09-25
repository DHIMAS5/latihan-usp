<?php
$servername = "localhost"; 
$username = "root"; 
$password = ""; 
$dbname = "stok"; 

$conn = new mysqli($servername, $username, $password, $dbname);
  
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

$search = isset($_POST['search']) ? $conn->real_escape_string($_POST['search']) : '';

$sql = "SELECT * FROM inventory i
        JOIN storage s ON i.storage_id = s.id
        JOIN vendor v ON i.vendor_id = v.id
        WHERE inventory LIKE '%$search%' OR s.lokasi LIKE '%$search%' OR v.nama_vendor LIKE '%$search%'";

$result = $conn->query($sql);

if ($result) {
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "Hasil: " . htmlspecialchars($row['nama_barang']) . "<br>";
        }
    } else {
        echo "Tidak ada hasil ditemukan.";
    }
} else {
    echo "Kesalahan dalam kueri: " . $conn->error;
}

$conn->close();
include 'dashboard.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pencarian</title>
    <link rel="stylesheet" href="search.css"> 
</head>
<body>
<form method="post">
    <input type="text" name="search" placeholder="Cari..." required>
    <input type="submit" value="Cari">
</form>
</body>
</html>
