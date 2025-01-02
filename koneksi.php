<?php
// Detail koneksi ke database
$host = 'localhost';  // Ganti dengan host database Anda jika berbeda
$username = 'root';    // Ganti dengan username MySQL Anda
$password = '';        // Ganti dengan password MySQL Anda
$database = 'pengmas'; // Ganti dengan nama database Anda

// Membuat koneksi
$conn = mysqli_connect($host, $username, $password, $database);

// Periksa apakah koneksi berhasil
if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
?>
