<?php
include 'db.php';

$success = '';
$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = htmlspecialchars(trim($_POST['username']));
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);

    if (!empty($username) && !empty($_POST['password'])) {
        // Cek apakah username sudah digunakan
        $check = $conn->prepare("SELECT id FROM users WHERE username = ?");
        $check->bind_param("s", $username);
        $check->execute();
        $result = $check->get_result();

        if ($result->num_rows > 0) {
            $error = "Username sudah terdaftar!";
        } else {
            // Masukkan ke database
            $stmt = $conn->prepare("INSERT INTO users (username, password, balance) VALUES (?, ?, 0)");
            $stmt->bind_param("ss", $username, $password);

            if ($stmt->execute()) {
                $success = "Registrasi berhasil! Silakan login.";
            } else {
                $error = "Gagal registrasi.";
            }
        }
    } else {
        $error = "Lengkapi semua data!";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Daftar - TopUpPro</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: #f1faff;
        }
        .card {
            border-radius: 1rem;
            box-shadow: 0 10px 25px rgba(0,0,0,0.1);
        }
    </style>
</head>
<body>

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="card p-4">
                <h3 class="text-center mb-3">Buat Akun Baru</h3>

                <?php if ($error): ?>
                    <div class="alert alert-danger"><?= $error ?></div>
                <?php elseif ($success): ?>
                    <div class="alert alert-success"><?= $success ?></div>
                <?php endif; ?>

                <form method="POST">
                    <div class="mb-3">
                        <label for="username" class="form-label">Nama Pengguna</label>
                        <input type="text" name="username" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Kata Sandi</label>
                        <input type="password" name="password" class="form-control" required>
                    </div>
                    <button type="submit" class="btn btn-primary w-100">Daftar</button>
                </form>

                <div class="mt-3 text-center">
                    <small>Sudah punya akun? <a href="login.php">Login</a></small>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>
