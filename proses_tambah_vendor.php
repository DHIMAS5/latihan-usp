<?php
if ($_POST) {
    // Retrieve and sanitize input values
    $id_vendor = htmlspecialchars(trim($_POST['id_vendor']));
    $nama = htmlspecialchars(trim($_POST['nama']));
    $kontak = htmlspecialchars(trim($_POST['kontak']));
    $nama_barang = htmlspecialchars(trim($_POST['nama_barang']));

    // Check for empty fields
    if (empty($id_vendor) || empty($nama) || empty($kontak) || empty($nama_barang)) {
        echo "<script>alert('Semua field harus diisi!'); location.href='tambah_vendor.php';</script>";
    } else {
        include 'koneksi.php';

        // Prepare SQL statement to prevent SQL injection
        $stmt = $conn->prepare("INSERT INTO vendor (id_vendor, nama, kontak, nama_barang) VALUES (?, ?, ?, ?)");
        
        if ($stmt === false) {
            die("SQL Prepare Error: " . $conn->error);
        }

        // Bind parameters (make sure to include all four parameters)
        $stmt->bind_param("ssss", $id_vendor, $nama, $kontak, $nama_barang);
        
        // Execute the statement and check for success
        if ($stmt->execute()) {
            echo "<script>alert('Sukses menambahkan vendor'); location.href='vendor.php';</script>";
        } else {
            echo "<script>alert('Gagal menambahkan data vendor: " . $stmt->error . "'); location.href='tambah_vendor.php';</script>";
        }

        // Close the statement and connection
        $stmt->close();
        $conn->close(); 
    }
}
?>
