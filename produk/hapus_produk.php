<?php
session_start(); //mulai sesi
include("../config.php");

//periksa apakah ada id yang dikirim melalui url
if (isset($_GET['id'])){
    //ambil id dari url
    $produk_id = $_GET['id'];

    //buat query untuk menghapus data berdasarkan id
    $sql = "DELETE FROM ecommerce WHERE produk_id=$produk_id";
    $query = mysqli_query($db, $sql);

    //simpan pesan notifikasi dalam sesi berdasarkan hasil query
    if($query){
        $_SESSION['notifikasi']="Data produk berhasil dihapus!";
    }else{
        $_SESSION['notifikasi']="Data produk gagal dihapus!";
    }
    //alihkan kehalaman index.php
    header('Location: index.php');
}else{
    //jika akses langsung tanpa id, tampilkan pesan error
    die("Akses ditolak...");
}
?>
