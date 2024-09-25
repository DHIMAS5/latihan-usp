<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Inventory</title>
    <link rel="stylesheet" href="tabel.css"> 
</head>
<body>
    <h3>Tambah Vendor</h3>
    <form action="proses_tambah_vendor.php" method="post">
        <label for="id_vendor">ID Vendor:</label>
        <input type="text" id="id_vendor" name="id_vendor" class="form-control" required><br>

        <label for="nama">Nama:</label>
        <input type="text" id="nama" name="nama" class="form-control" required><br>

        <label for="kontak">Kontak:</label>
        <input type="text" id="kontak" name="kontak" class="form-control" required><br>

        <label for="nama_barang">Nama_Barang:</label>
        <input type="text" id="nama_barang" name="nama_barang" class="form-control" required><br>

        <button type="submit" class="submit">Submit</button>
    </form>
</body>
</html>
