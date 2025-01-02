<?php
$host = 'localhost';
$user = 'root';
$password = '';
$dbname = 'pengmas';

$conn = new mysqli($host, $user, $password, $dbname);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_user = $_POST['id_user'];
    $judul = $_POST['judul'];
    $sql = "UPDATE proposal_dosen SET judul = '$judul' WHERE id_user = $id_user";
    if ($conn->query($sql) === TRUE) {
        echo "Proposal berhasil diperbarui!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>
<link rel="stylesheet" href="styletableproposal.css">