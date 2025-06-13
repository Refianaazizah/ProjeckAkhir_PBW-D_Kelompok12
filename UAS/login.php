<?php
session_start();
include 'db.php';

$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = htmlspecialchars(trim($_POST['username']));
    $password = $_POST['password'];

    $stmt = $conn->prepare("SELECT * FROM users WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();

    $result = $stmt->get_result();
    if ($result && $result->num_rows === 1) {
        $user = $result->fetch_assoc();
        if (password_verify($password, $user['password'])) {
            $_SESSION['login'] = true;
            $_SESSION['user'] = $user;
            header("Location: dashboard.php");
            exit;
        } else {
            $error = "Kata sandi salah!";
        }
    } else {
        $error = "Akun tidak ditemukan!";
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Login - TopUpPro</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(135deg, #ade8f4, #caf0f8);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .login-card {
            background: white;
            border-radius: 1.2rem;
            box-shadow: 0 15px 35px rgba(0,0,0,0.15);
            padding: 40px 30px;
            width: 100%;
            max-width: 400px;
            animation: fadeIn 0.8s ease-in-out;
        }
        .login-icon {
            width: 60px;
            margin-bottom: 20px;
        }
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
    </style>
</head>
<body>

<div class="login-card text-center">
    <img src="logo.webp" class="login-icon" alt="TopUpPro Icon">
    <h3 class="mb-4 fw-bold">Masuk ke TopUpPro</h3>

    <?php if ($error): ?>
        <div class="alert alert-danger"><?= $error ?></div>
    <?php endif; ?>

    <form method="POST">
        <div class="mb-3 text-start">
            <label class="form-label">Nama Pengguna</label>
            <input type="text" name="username" class="form-control" required>
        </div>
        <div class="mb-3 text-start">
            <label class="form-label">Kata Sandi</label>
            <input type="password" name="password" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary w-100">Masuk</button>
    </form>

    <div class="mt-4">
        <small>Belum punya akun? <a href="register.php" class="text-decoration-none">Daftar di sini</a></small>
    </div>
</div>

</body>
</html>
