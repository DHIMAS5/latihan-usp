<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Inventory</title>
    <link rel="stylesheet" href="tabel.css"> 
</head>
<body>
    <h3>Tambah Inventory</h3>
    <form action="proses_tambah_inventory.php" method="post">
        <label for="id_inventory">ID Inventory:</label>
        <input type="text" id="id_inventory" name="id_inventory" class="form-control" required><br>

        <label for="nama_barang">Nama Barang:</label>
        <input type="text" id="nama_barang" name="nama_barang" class="form-control" required><br>

        <label for="jenis_barang">Jenis Barang:</label>
        <input type="text" id="jenis_barang" name="jenis_barang" class="form-control" required><br>

        <label for="kuantitas_stok">Kuantitas Stok:</label>
        <input type="text" id="kuantitas_stok" name="kuantitas_stok" class="form-control" required><br>

        <label for="lokasi_gudang">Lokasi Gudang:</label>
        <input type="text" id="lokasi_gudang" name="lokasi_gudang" class="form-control" required><br>

        <label for="harga">Harga:</label>
        <input type="text" id="harga" name="harga" class="form-control" required><br>

        <label for="serial_number">Serial Number:</label>
        <input type="text" id="serial_number" name="serial_number" class="form-control" required><br>

        <button type="submit" class="submit">Submit</button>
    </form>
</body>
</html>
