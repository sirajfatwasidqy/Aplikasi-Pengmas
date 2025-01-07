<?php
// Koneksi ke database
$host = 'localhost';
$user = 'root';
$password = '';
$dbname = 'peng_mas';

$conn = new mysqli($host, $user, $password, $dbname);

// Cek koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama_p2m = $_POST['nama_p2m'];
    $email_p2m = $_POST['email_p2m'];
    $nik = $_POST['nik'];

    // Gunakan prepared statement untuk menghindari SQL Injection
    $stmt = $conn->prepare("INSERT INTO p2m (nama, email, NIK) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $nama_p2m, $email_p2m, $nik);

    if ($stmt->execute()) {
        echo "Data P2M berhasil ditambahkan.";
        header('Location: index_p2m.php');
        exit();
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
?>
