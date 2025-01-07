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

// Query untuk mengambil data p2m
$sql = "SELECT * FROM p2m";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Loop data dan tampilkan
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>" . htmlspecialchars($row['id_p2m']) . "</td>
                <td>" . htmlspecialchars($row['nama']) . "</td>
                <td>" . htmlspecialchars($row['email']) . "</td>
                <td>" . htmlspecialchars($row['NIK']) . "</td>
                <td>
                    <a href='edit_p2m.php?id_p2m=" . htmlspecialchars($row['id_p2m']) . "'>
                        <button>Edit</button>
                    </a>
                    <a href='delete_p2m.php?id_p2m=" . htmlspecialchars($row['id_p2m']) . "' onclick=\"return confirm('Apakah Anda yakin ingin menghapus data ini?')\">
                        <button>Hapus</button>
                    </a>
                </td>
              </tr>";
    }
} else {
    echo "<tr><td colspan='5'>Tidak ada data P2M yang ditemukan.</td></tr>";
}

$conn->close();
?>
