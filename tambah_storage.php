<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Storage</title>
    <link rel="stylesheet" href="tabel.css"> 
</head>
<body>
    <h3>Tambah Storage</h3>
    <form action="proses_tambah_storage.php" method="post">
        <label for="id_storage">ID Storage:</label>
        <input type="text" id="id_storage" name="id_storage" class="form-control" required><br>
        <label for="nama_gudang">Nama Gudang:</label>
        <input type="text" id="nama_gudang" name="nama_gudang" class="form-control" required><br>
        <label for="lokasi_gudang">Lokasi Gudang:</label>
        <input type="text" id="lokasi_gudang" name="lokasi_gudang" class="form-control" required><br>
        <button type="submit" class="submit">Submit</button>
    </form>
</body>
</html>
