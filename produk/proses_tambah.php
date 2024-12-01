<?php

session_start(); //mulai sesi
//menghubungkan file ini dengan file konfigurasi databse
include("../config.php");

//mengecek apakah tombol 'simpan' telah ditekan
if(isset($_POST['simpan'])){
    /*mengambil nilai dari form input dan menyimpannya kedalam variabel*/
    
    $namaProduk = $_POST['namaProduk'];
    $harga = $_POST['harga'];
    $stok = $_POST['stok'];

    /*menyusun query SQL untuk menambahkan data ke tabel*/
    $sql = "INSERT INTO ecommerce
    ( namaProduk, harga, stok)
    VALUES('$namaProduk','$harga','$stok')";

    //menjalankan query dan menyimpan hasilnya dalam variabel $query
    $query =mysqli_query($db, $sql);

    //simpan pesan di sesi
    if($query){
        $_SESSION['notifikasi']="Data produk berhasil ditambahkan!";
    }else{
        $_SESSION['notifikasi']="Data produk gagal ditambahkan!";
    }
    //alihkan ke halaman index.php
    header('Location: index.php');
}else{
    //jika akses langsung tanpa form, tampilkan pesan error
    die("Akses ditolak...");
}
?>