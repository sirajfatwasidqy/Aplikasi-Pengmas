<?php
$host = 'localhost';
$user = 'root';
$password = '';
$dbname = 'pengmas';

$conn = new mysqli($host, $user, $password, $dbname);

$sql = "SELECT * FROM proposal_dosen";
$result = $conn->query($sql);

echo "<table border='1'>
<tr>
    <th>ID User</th>
    <th>ID Dosen</th>
    <th>Judul</th>
    <th>File Proposal</th>
    <th>Tanggal Upload</th>
    <th>Aksi</th>
</tr>";

while ($row = $result->fetch_assoc()) {
    echo "<tr>
        <td>" . $row['id_user'] . "</td>
        <td>" . $row['id_dosen'] . "</td>
        <td>" . $row['judul'] . "</td>
        <td><a href='uploads/" . $row['file_proposal'] . "'>" . $row['file_proposal'] . "</a></td>
        <td>" . $row['tanggal_upload'] . "</td>
        <td>
            <a href='edit_proposal.php?id=" . $row['id_user'] . "'>Edit</a> |
            <a href='delete_proposal.php?id=" . $row['id_user'] . "' onclick=\"return confirm('Yakin ingin menghapus?')\">Hapus</a>
        </td>
    </tr>";
}
echo "</table>";
?>
<link rel="stylesheet" href="styletableproposal.css">