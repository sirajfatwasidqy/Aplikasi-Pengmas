<?php
// Detail koneksi ke database
$host = 'localhost';  // Ganti dengan host database Anda
$username = 'root';    // Ganti dengan username MySQL Anda
$password = '';        // Ganti dengan password MySQL Anda
$database = 'peng_mas'; // Ganti dengan nama database Anda

// Membuat koneksi
$conn = mysqli_connect($host, $username, $password, $database);

// Periksa apakah koneksi berhasil
if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

// Ambil data header dari database
$query_header = "SELECT * FROM header_info WHERE id = 1";
$result_header = mysqli_query($conn, $query_header);
$row_header = mysqli_fetch_assoc($result_header);

// Periksa apakah data ada
$website_name = isset($row_header['website_name']) ? $row_header['website_name'] : 'Nama Website Tidak Tersedia';
$slogan = isset($row_header['slogan']) ? $row_header['slogan'] : 'Slogan Tidak Tersedia';
$location = isset($row_header['location']) ? $row_header['location'] : 'Lokasi Tidak Tersedia';
$logo_url = isset($row_header['logo_url']) && !empty($row_header['logo_url']) ? $row_header['logo_url'] : 'p2m.jpg'; // Gunakan p2m.jpg sebagai default

?>

<header>
    <img src="<?php echo $logo_url; ?>" alt="Logo" class="logo">
    <div class="header-left">
        <h1><?php echo $website_name; ?></h1>
        <p><?php echo $slogan; ?></p>
        <p><?php echo $location; ?></p>
    </div>
</header>
