<?php
// Koneksi ke database MySQL
$host = "localhost";      // Server database
$user = "root";           // Username MySQL (default XAMPP biasanya root)
$pass = "";               // Password MySQL (kosong kalau pakai XAMPP)
$db   = "smartcoffe";     // Nama database

// Membuat koneksi
$conn = mysqli_connect($host, $user, $pass, $db);

// Cek koneksi berhasil atau tidak
if (!$conn) {
    die("Koneksi database gagal: " . mysqli_connect_error());
}
