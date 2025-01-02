<?php
session_start();

// Cek apakah pengguna sudah login
if (!isset($_SESSION['id_login'])) {
    header('Location: login.php');
    exit();
}

// Ambil data pengguna dari session
$nik = $_SESSION['nik'];
$role = $_SESSION['role'];
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Penelitian & Pengabdian Masyarakat</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&family=Lora:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"> <!-- Font Awesome -->
    <script>
        function switchLayout(layout) {
            document.body.className = layout; 
            showContent('profile');
        }

        function showContent(content) {
            document.getElementById('section-content').innerHTML = document.getElementById(content).innerHTML;
        }

        // Open modal
        function openModal() {
            document.getElementById('addDosenModal').style.display = "block";
        }

        // Close modal
        function closeModal() {
            document.getElementById('addDosenModal').style.display = "none";
        }
    </script>
</head>
<body class="desktop-layout"> 

    <?php include('header.php'); ?>  <!-- Menyisipkan header.php -->

    <nav>
        <ul>
            <li><a href="#" onclick="showContent('profile')">Profile</a></li>
            <li><a href="#" onclick="showContent('pendidikan')">Tabel Proposal</a></li>
            <li><a href="#" onclick="showContent('pengalaman')">Tabel Laporan</a></li>
            <li><a href="#" onclick="showContent('keahlian')">Tabel History</a></li>
            <li><a href="logout.php">Logout</a></li>
        </ul>
    </nav>

    <section>
        <div id="section-content">
            <div id="profile">
                <h2>Data Dosen</h2>
                <table border="1">
                    <thead>
                        <tr>
                            <th>ID Dosen</th>
                            <th>Nama Dosen</th>
                            <th>Email Dosen</th>
                            <th>NIK</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php include('dosen.php'); ?>
                    </tbody>
                </table>

                <br>
                <!-- Trigger button for modal -->
                <button id="addDosenBtn" onclick="openModal()">Tambah Dosen</button>
            </div>
        </div>
    </section>

    <!-- Modal Add Dosen -->
    <div id="addDosenModal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeModal()">&times;</span>
            <h2>Tambah Dosen</h2>
            <form action="add_dosen.php" method="POST">
                <label for="nama_dosen">Nama Dosen:</label>
                <input type="text" id="nama_dosen" name="nama_dosen" required>
            
                <label for="email_dosen">Email Dosen:</label>
                <input type="email" id="email_dosen" name="email_dosen" required>
            
                <label for="nik">NIK:</label>
                <input type="text" id="nik" name="nik" required>
            
                <button type="submit">Simpan</button>
            </form>
        </div>
    </div>

    <aside>
    <?php include('aside.php'); ?>
    </aside>
    
    
    <?php include('footer.php'); ?> 


</body>
</html>
