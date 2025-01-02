<?php
$host = 'localhost';
$user = 'root';
$password = '';
$dbname = 'pengmas';

$conn = new mysqli($host, $user, $password, $dbname);

$id = $_GET['id'];
$sql = "DELETE FROM proposal_dosen WHERE id_user = $id";

if ($conn->query($sql) === TRUE) {
    echo "Proposal berhasil dihapus!";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
?>
<link rel="stylesheet" href="styletableproposal.css">