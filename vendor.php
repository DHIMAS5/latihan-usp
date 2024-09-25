<?php
include("dashboard.php");
include("koneksi.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vendor</title>
    <link rel="stylesheet" href="tampilan.css"> 
</head>
<body>
<div class="konten">
    <h2>Tabel Vendor</h2>

    <a href="tambah_vendor.php" class="tombol">Tambah Data</a>
    <table border="3">
        <tr>
            <th>ID Vendor</th>
            <th>Nama</th>
            <th>Kontak</th>
            <th>Nama Barang</th>
            <th>Aksi</th>
        </tr>
        <?php 
        $select = "SELECT * FROM vendor";
        $hsl = mysqli_query($conn, $select);

        if (!$hsl) {
            die("Data gagal diambil: " . mysqli_error($conn));
        }

        if (mysqli_num_rows($hsl) > 0) { 
            while ($data = mysqli_fetch_assoc($hsl)) {
                echo "<tr>";
                echo "<td>" . htmlspecialchars($data["id_vendor"]) . "</td>"; 
                echo "<td>" . htmlspecialchars($data["nama"]) . "</td>";
                echo "<td>" . htmlspecialchars($data["kontak"]) . "</td>";
                echo "<td>" . htmlspecialchars($data["nama_barang"]) . "</td>"; 
                echo "<td>
                    <form action='update_vendor.php' method='get' style='display:inline;'>
                        <input type='hidden' name='id_vendor' value='" . urlencode($data["id_vendor"]) . "'>
                        <button type='submit' class='button'>Update</button>
                    </form>
                    |
                    <form action='delete_vendor.php' method='get' style='display:inline;'>
                        <input type='hidden' name='id_vendor' value='" . urlencode($data["id_vendor"]) . "'>
                        <button type='submit' class='button'>Delete</button>
                    </form>
                </td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='4'>Tidak ada data tersedia.</td></tr>";
        }
        ?>
    </table>
</div>    
</body>
</html>
