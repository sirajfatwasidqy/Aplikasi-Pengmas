<?php
// Detail koneksi ke database
$host = 'localhost';
$username = 'root';
$password = '';
$database = 'peng_mas'; // Ganti dengan nama database Anda

// Membuat koneksi
$conn = mysqli_connect($host, $username, $password, $database);

// Periksa koneksi
if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

// Query untuk mengambil data agenda kegiatan
$query_agenda = "SELECT * FROM aside_info ORDER BY tanggal ASC";
$result_agenda = mysqli_query($conn, $query_agenda);

// Menampilkan Agenda Kegiatan
echo "<h3>Agenda Kegiatan :</h3>";
if (mysqli_num_rows($result_agenda) > 0) {
    echo "<ul>";
    while ($row = mysqli_fetch_assoc($result_agenda)) {
        echo "<li><strong>{$row['judul']}</strong><br>";
        echo "Tanggal : " . date('d F Y', strtotime($row['tanggal'])) . "<br>";
        echo "Lokasi : {$row['lokasi']}<br>";
        echo "Deskripsi : {$row['deskripsi']}</li><br>";
    }
    echo "</ul>";
} else {
    echo "<p>Belum ada agenda kegiatan.</p>";
}
