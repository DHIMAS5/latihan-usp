
<?php
include 'koneksi.php';

// Get the id_vendor from the URL parameter
$id_vendor = $_GET['id_vendor'];

// Query to select the specific vendor data
$sql = "SELECT * FROM vendor WHERE id_vendor = '$id_vendor'";
$result = $conn->query($sql);

// Check if the data exists
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
} else {
    echo "Data tidak ditemukan";
    exit;
}

// Display the update form
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="update.css"> 
</head>
<body>
<form action="proses_update_vendor.php" method="post">
    <label for="id_vendor">id_vendor:</label>
    <input type="text" id="id_vendor" name="id_vendor" value="<?php echo $row["id_vendor"]; ?>" required><br><br>
    <label for="nama">nama:</label>
    <input type="text" id="nama" name="nama" value="<?php echo $row["nama"]; ?>" required><br><br>
    <label for="kontak">kontak:</label>
    <input type="text" id="kontak" name="kontak" value="<?php echo $row["kontak"]; ?>" required><br><br>
    <label for="nama_barang">nama_barang:</label>
    <input type="text" id="nama_barang" name="nama_barang" value="<?php echo $row["nama_barang"]; ?>" required><br><br> 
    <input type="submit" name="submit" action="vendor.php">
</form>
</body>
</html>