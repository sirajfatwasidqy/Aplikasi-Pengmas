<?php
$host = 'localhost';
$user = 'root';
$password = '';
$dbname = 'peng_mas';

$conn = new mysqli($host, $user, $password, $dbname);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_user = $_POST['id_user'];
    $file_proposal = $_FILES['file_proposal']['name'];
    $target_file = 'uploads/' . basename($file_proposal);

    if (move_uploaded_file($_FILES['file_proposal']['tmp_name'], $target_file)) {
        $sql = "UPDATE proposal_dosen SET file_proposal = '$file_proposal' WHERE id_user = $id_user";
        if ($conn->query($sql) === TRUE) {
            echo "File proposal berhasil diunggah!";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } else {
        echo "Gagal mengunggah file.";
    }
}
?>
<link rel="stylesheet" href="styletableproposal.css">