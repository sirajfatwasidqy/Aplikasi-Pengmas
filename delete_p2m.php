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

$id_p2m = intval($_GET['id_p2m']); // Pastikan ID adalah integer

if ($id_p2m > 0) {
    $sql = "DELETE FROM p2m WHERE id_p2m = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id_p2m);

    if ($stmt->execute()) {
        header('Location: index_p2m.php');
        exit();
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
} else {
    echo "ID P2M tidak valid.";
}

$conn->close();
?>
