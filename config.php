<?php
//menentukan nama host, biasanya "localhost"
$server = "localhost";

//nama pengguna  Mysql (default: root)
$user = "root";

//kata sandi untuk pengguna mysql (default: kosong untuk root)
$password = "";

//nama basis data yang akan dihubungkan
$nama_database ="ecommerce";

//mencoba untuk membuat koneksi ke basis data
$db = mysqli_connect($server, $user, $password, $nama_database);

//memeriksa apakah koneksi berhasil
if (!$db){
    die("gagal terhubung dengan database: ".mysqli_connect());
}
?>