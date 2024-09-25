<?php
if ($_POST) {
    // Retrieve and sanitize input values
    $id_inventory = $_POST['id_inventory'];
    $nama_barang = $_POST['nama_barang'];
    $jenis_barang = $_POST['jenis_barang'];
    $kuantitas_stok = $_POST['kuantitas_stok'];
    $lokasi_gudang = $_POST['lokasi_gudang'];
    $harga = $_POST['harga'];
    $serial_number = $_POST['serial_number'];

    // Check for empty fields
    if (empty($id_inventory) || empty($nama_barang) || empty($jenis_barang) || 
        empty($kuantitas_stok) || empty($lokasi_gudang) || empty($harga) || 
        empty($serial_number)) {
        
        echo "<script>alert('Semua field harus diisi!'); location.href='tambah_inventory.php';</script>";
    } else {
        include 'koneksi.php';

        // Prepare SQL statement to prevent SQL injection
        $stmt = $conn->prepare("INSERT INTO inventory (id_inventory, nama_barang, jenis_barang, kuantitas_stok, lokasi_gudang, harga, serial_number) VALUES (?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("sssssss", $id_inventory, $nama_barang, $jenis_barang, $kuantitas_stok, $lokasi_gudang, $harga, $serial_number);
        
        // Execute the statement and check for success
        if ($stmt->execute()) {
            echo "<script>alert('Sukses menambahkan inventory'); location.href='inventory.php';</script>";
        } else {
            echo "<script>alert('Gagal menambahkan data inventory'); location.href='tambah_inventory.php';</script>";
        }

        // Close the statement
        $stmt->close();
    }
}
?>
