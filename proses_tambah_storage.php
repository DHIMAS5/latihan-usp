<?php
if ($_POST) {
    // Retrieve and sanitize input values
    $id_storage = htmlspecialchars(trim($_POST['id_storage']));
    $nama_gudang = htmlspecialchars(trim($_POST['nama_gudang']));
    $lokasi_gudang = htmlspecialchars(trim($_POST['lokasi_gudang']));

    // Check for empty fields
    if (empty($id_storage) || empty($nama_gudang) || empty($lokasi_gudang)) {
        echo "<script>alert('Semua field harus diisi!'); location.href='tambah_storage.php';</script>";
    } else {
        include 'koneksi.php';

        // Prepare SQL statement to prevent SQL injection
        $stmt = $conn->prepare("INSERT INTO storage (id_storage, nama_gudang, lokasi_gudang) VALUES (?, ?, ?)");
        
        if ($stmt === false) {
            die("SQL Prepare Error: " . $conn->error);
        }

        // Bind parameters
        $stmt->bind_param("sss", $id_storage, $nama_gudang, $lokasi_gudang);
        
        // Execute the statement and check for success
        if ($stmt->execute()) {
            echo "<script>alert('Sukses menambahkan storage'); location.href='storage.php';</script>";
        } else {
            echo "<script>alert('Gagal menambahkan data storage: " . $stmt->error . "'); location.href='tambah_storage.php';</script>";
        }

        // Close the statement
        $stmt->close();
        $conn->close(); // Close the database connection
    }
}
?>
