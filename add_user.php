<?php
include('koneksi.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nik = $_POST['nik'];
    $password = $_POST['password'];
    $role = $_POST['role'];

    // Tidak menggunakan password_hash, simpan password dalam bentuk plain text
    $sql = "INSERT INTO login (NIK, password, role) VALUES ('$nik', '$password', '$role')";

    if ($conn->query($sql) === TRUE) {
        echo "Pengguna berhasil ditambahkan!";
    } else {
        echo "Error: " . $conn->error;
    }
}
?>

<form action="add_user.php" method="POST">
    <label for="nik">NIK:</label>
    <input type="text" id="nik" name="nik" required><br>

    <label for="password">Password:</label>
    <input type="password" id="password" name="password" required><br>

    <label for="role">Role:</label>
    <select name="role" id="role" required>
        <option value="dosen">Dosen</option>
        <option value="p2m">P2M</option>
    </select><br>

    <button type="submit">Tambah Pengguna</button>
</form>
