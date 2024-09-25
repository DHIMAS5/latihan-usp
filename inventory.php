<?php
include("dashboard.php");
include("koneksi.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventory</title>
    <link rel="stylesheet" href="tampilan.css"> 
</head>
<body>
<div class="konten">
    <h2>Tabel Inventory</h2>

    <a href="tambah_inventory.php" class="tombol">Tambah Data</a>
    <table border="3">
        <tr>
            <th>ID Inventory</th>
            <th>Nama Barang</th>
            <th>Jenis Barang</th>
            <th>Kuantitas Stok</th>
            <th>Lokasi Gudang</th>
            <th>Harga</th>
            <th>Serial Number</th>
            <th>Aksi</th>
        </tr>
        <?php 
        $select = "SELECT * FROM inventory";
        $hsl = mysqli_query($conn, $select);

        if (!$hsl) {
            die("Data gagal diambil: " . mysqli_error($conn));
        }

        if (mysqli_num_rows($hsl) > 0) {
            while ($data = mysqli_fetch_assoc($hsl)) {
                $kuantitas_stok = $data["kuantitas_stok"];
                $class = $kuantitas_stok < 3 ? "low-stock" : "";
                $message = $kuantitas_stok < 3 ? "Stok menipis!" : "";

                echo "<tr class='$class'>";
                echo "<td>" . htmlspecialchars($data["id_inventory"]) . "</td>"; 
                echo "<td>" . htmlspecialchars($data["nama_barang"]) . "</td>";
                echo "<td>" . htmlspecialchars($data["jenis_barang"]) . "</td>"; 
                echo "<td>" . htmlspecialchars($data["kuantitas_stok"]) . " $message</td>";
                echo "<td>" . htmlspecialchars($data["lokasi_gudang"]) . "</td>"; 
                echo "<td>" . htmlspecialchars($data["harga"]) . "</td>";
                echo "<td>" . htmlspecialchars($data["serial_number"]) . "</td>"; 
                echo "<td>
                    <form action='update_inventory.php' method='get' style='display:inline;'>
                        <input type='hidden' name='id_inventory' value='" . urlencode($data["id_inventory"]) . "'>
                        <button type='submit' class='button'>Update</button>
                    </form>
                    |
                    <form action='delete_inventory.php' method='get' style='display:inline;'>
                        <input type='hidden' name='id_inventory' value='" . urlencode($data["id_inventory"]) . "'>
                        <button type='submit' class='button'>Delete</button>
                    </form>
                </td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='8'>Tidak ada data tersedia.</td></tr>";
        }
        ?>
    </table>
</div>    
</body>
</html>
