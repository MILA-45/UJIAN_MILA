<?php
//menghubungkan file config dengan index
include("../config.php");
session_start(); //mulai sesi
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ECOMMERCE</title>
    <style>
        /*membuat styling pada table*/
        table, th, td{
            border: 1px solid black;
            border-collapse: collapse;
            padding: 10px
        }
        </style>
</head>
<body>
<h2>Ecommerce</h2>
<!--tampilkan notifikasi jika ada-->
<?php if (isset($_SESSION['notifikasi'])):?>
    <p><?php echo $_SESSION['notifikasi'];?></p>
    <!--hapus notifikasi setelah ditampilkan-->
    <?php unset($_SESSION['notifikasi']);?>
    <?php endif; ?>
    <table>
        <thead>
            <tr align="center">
                <th>#</th>
                <th>Nama Produk</th>
                <th>Harga</th>
                <th>Stok</th>
                <th><a href="tambah_produk.php">Tambah Data</a></th>
</tr>
</thead>
<tbody>
<?php
$no = 1; //membuat penomoran data dari 1
//membuat variabel untuk menjalankan query SQL
$query = $db->query("SELECT*FROM ecommerce");

/*perulangan whilw akan terus berjalan (menampilkan data)
selama kondisi $query bernilai true (adanya data pada table ecommerce)*/
while ($produk = $query->fetch_assoc()){
    /*fungsi fetch_assoc digunakan untuk mengambil data perulangan dalam bentuk array*/
   
   ?>
    <!--kode PHP ditutup untuk menyisipkan kode HTML yang akan di looping menggunakan while loop-->
    <tr>
    <td><?php echo $no++?></td>
        <td><?php echo $produk['namaProduk']?></td>
        <td><?php echo $produk['harga']?></td>
        <td><?php echo $produk['stok']?></td>
        <td align="center">

            <!--url ke halaman edit data dengan menggunakan parameter id pada kolom table-->
            <a href="edit_produk.php?id=<?php echo $produk['produk_id']?>">Edit</a>
            <!--url untuk menghapus data dengan menggunakan parameter id pada kolom table dan alert confirmasi hapus data-->
            <a onclick="return confirm('anda yakin ingin menghapus data?')"
            href="hapus_produk.php?id=<?php echo $produk['produk_id']?>">Hapus</a>
</td>
</tr>
<?php
} /*mengakhiri proses perulangan while yang dimulai*/
?>
</tbody>
</table>
<p>total: <?php echo mysqli_num_rows($query)?></p>  
</body>
</html>