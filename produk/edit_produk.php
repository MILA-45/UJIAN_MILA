<?php
// Termasuk file konfigurasi
include("../config.php");

// Mengambil ID dari parameter URL
$produk_id = $_GET['id'];

// Mengambil data dari database berdasarkan ID
$query = $db->query("SELECT * FROM ecommerce WHERE produk_id = '$produk_id'");
$produk = $query->fetch_assoc();
?>

<!DOCTYPE html>
<html>
<head>
    <title>ECOMMERCE</title>
</head>
<body>
    <h3>Ecommerce</h3>
    <form action="proses_edit.php" method="POST">
        <!-- Menyimpan ID untuk proses selanjutnya -->
        <input type="hidden" name="produk_id" value="<?php echo $produk['produk_id']; ?>">

        <table border="0">
            <tr>
                <td>Nama Produk</td>
                <td>
                    <input type="text" name="namaProduk" value="<?php echo $produk['namaProduk']; ?>" required>
                </td>
            </tr>
            <tr>
                <td>Harga</td>
                <td>
                    <input type="text" name="harga" value="<?php echo $produk['harga']; ?>" required>
                </td>
            </tr>
              <tr>
                <td>Stok</td>
                <td>
                 <input type="text" name="stok"
                  value="<?php echo $produk['stok']; ?>">
           </td>
        </tr>
    </table>
    <button type="submit" name="simpan">Simpan</button>
   </form>
</body>
</html>