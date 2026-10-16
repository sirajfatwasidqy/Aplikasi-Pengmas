<?php
$host = 'localhost';
$user = 'root';
$password = '';
$dbname = 'pengmas';

$conn = new mysqli($host, $user, $password, $dbname);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_user = $_POST['id_user'];
    $id_dosen = $_POST['id_dosen'];
    $judul = $_POST['judul'];
    $tanggal_upload = date('Y-m-d');

    $file_proposal = $_FILES['file_proposal']['name'];
    $target_file = 'uploads/' . basename($file_proposal);

    if (move_uploaded_file($_FILES['file_proposal']['tmp_name'], $target_file)) {
        $sql = "INSERT INTO proposal_dosen (id_user, id_dosen, judul, file_proposal, tanggal_upload) VALUES ('$id_user', '$id_dosen', '$judul', '$file_proposal', '$tanggal_upload')";
        if ($conn->query($sql) === TRUE) {
            echo "Proposal berhasil ditambahkan!";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } else {
        echo "Gagal mengunggah file.";
    }
}
?>
<link rel="stylesheet" href="styletableproposal.css">

