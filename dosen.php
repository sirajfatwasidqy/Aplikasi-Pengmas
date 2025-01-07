<?php
include('koneksi.php');

$sql = "SELECT id_dosen, nama, email, NIK FROM dosen";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
            <td>{$row['id_dosen']}</td>
            <td>{$row['nama']}</td>
            <td>{$row['email']}</td>
            <td>{$row['NIK']}</td>
            <td>
                <a href='edit_dosen.php?id={$row['id_dosen']}'>Edit</a> | 
                <a href='delete_dosen.php?id={$row['id_dosen']}' onclick='return confirm(\"Yakin ingin menghapus data ini?\")'>Hapus</a>
            </td>
        </tr>";
    }
} else {
    echo "<tr><td colspan='5'>Tidak ada data dosen</td></tr>";
}
?>
