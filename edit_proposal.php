<?php
$host = 'localhost';
$user = 'root';
$password = '';
$dbname = 'pengmas';

$conn = new mysqli($host, $user, $password, $dbname);

$id = $_GET['id'];
$sql = "SELECT * FROM proposal_dosen WHERE id_user = $id";
$result = $conn->query($sql);
$proposal = $result->fetch_assoc();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $judul = $_POST['judul'];
    $sql = "UPDATE proposal_dosen SET judul = '$judul' WHERE id_user = $id";
    if ($conn->query($sql) === TRUE) {
        echo "Proposal berhasil diperbarui!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

?>
<link rel="stylesheet" href="styletableproposal.css">
