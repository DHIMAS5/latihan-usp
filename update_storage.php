
<?php
include 'koneksi.php';

// Get the id_storage from the URL parameter
$id_storage = $_GET['id_storage'];

// Query to select the specific storage data
$sql = "SELECT * FROM storage WHERE id_storage = '$id_storage'";
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
<form action="proses_update_storage.php" method="post">
    <label for="id_storage">id_storage:</label>
    <input type="text" id="id_storage" name="id_storage" value="<?php echo $row["id_storage"]; ?>" required><br><br>
    <label for="nama_gudang">nama_gudang:</label>
    <input type="text" id="nama_gudang" name="nama_gudang" value="<?php echo $row["nama_gudang"]; ?>" required><br><br>
    <label for="lokasi_gudang">Lokasi:</label>
    <select name="lokasi_gudang" id="lokasi_gudang">
    <option value="<?php echo $row["lokasi_gudang"]; ?>"><?php echo $row["lokasi_gudang"]; ?></option>
    <option value="Gresik">Gresik</option>
    <option value="Sidoarjo">Sidoarjo</option>
    <option value="Malang">Malang</option><br><br>

    <input type="submit" name="submit" action="storage.php">
</form>
</body>
</html>