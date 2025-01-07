<?php
include('koneksi.php');

// Cek apakah data dikirim melalui metode POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Ambil data dari form
    $nama_dosen = $_POST['nama_dosen'];
    $email_dosen = $_POST['email_dosen'];
    $nik = $_POST['nik'];

    // Validasi data input
    if (!empty($nama_dosen) && !empty($email_dosen) && !empty($nik)) {
        // Ambil id_login dari session
        session_start();
        if (isset($_SESSION['id_login'])) {
            $id_login = $_SESSION['id_login'];  // Menggunakan id_login yang ada di session
        } else {
            $id_login = NULL;  // Jika session tidak ditemukan, id_login bisa NULL
        }

        // Query untuk menambahkan data dosen
        $sql = "INSERT INTO dosen (id_login, NIK, nama, email) VALUES (?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssss", $id_login, $nik, $nama_dosen, $email_dosen);

        // Eksekusi query
        if ($stmt->execute()) {
            echo "<script>
                alert('Data dosen berhasil ditambahkan!');
                window.location.href = 'index.php';
            </script>";
        } else {
            echo "<script>
                alert('Gagal menambahkan data dosen!');
                window.location.href = 'index.php';
            </script>";
        }

        // Tutup statement
        $stmt->close();
    } else {
        echo "<script>
            alert('Semua field harus diisi!');
            window.location.href = 'index.php';
        </script>";
    }
}

// Tutup koneksi database
$conn->close();
?>
