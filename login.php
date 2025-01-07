<?php
// Include koneksi database
include('koneksi.php');

// Cek apakah form login sudah disubmit
if (isset($_POST['login'])) {
    $nik = $_POST['nik'];
    $password = $_POST['password'];

    // Query untuk mengambil data pengguna berdasarkan NIK
    $query = "SELECT * FROM login WHERE NIK = '$nik'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {
        $user = mysqli_fetch_assoc($result);

        // Verifikasi password
        if ($password == $user['password']) {
            session_start();
            $_SESSION['id_login'] = $user['id_login'];
            $_SESSION['role'] = $user['role'];
            $_SESSION['nik'] = $user['NIK'];

            // Mengarahkan pengguna ke halaman sesuai dengan peran
            if ($user['role'] == 'dosen') {
                header('Location: index.php');
            } else if ($user['role'] == 'p2m') {
                header('Location: index_p2m.php');
            }
            exit();
        } else {
            $error_message = "Password salah!";
        }
    } else {
        $error_message = "NIK tidak ditemukan!";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="login-container">
        <div class="form-wrapper">
            <h2>Hello, Welcome!</h2>
            <form method="POST">
                <div class="input-group">
                    <label for="nik">NIK</label>
                    <input type="text" name="nik" id="nik" placeholder="Masukkan NIK" required>
                </div>
                <div class="input-group">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" placeholder="Masukkan Password" required>
                </div>
                <button type="submit" name="login" class="btn-login">LOGIN</button>
            </form>
            <?php if (isset($error_message)): ?>
                <p class="error-message"><?php echo $error_message; ?></p>
            <?php endif; ?>
        </div>
    </div>
</body>
</html>
