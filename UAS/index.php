<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>TopUpPro - Solusi Isi Saldo Digital</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(to bottom right, #e0f7fa, #ffffff);
            font-family: 'Segoe UI', sans-serif;
        }
        .btn-primary {
            background-color: #0077b6;
            border: none;
        }
        .btn-primary:hover {
            background-color: #023e8a;
        }
        .btn-promo {
            background-color: #f94144;
            border: none;
            font-weight: 600;
        }
        .btn-promo:hover {
            background-color: #c1121f;
        }
        .logo {
            width: 50px;
        }
        .promo-bar {
            background-color: #fff0f0;
            padding: 15px;
            text-align: center;
            border-bottom: 2px solid #f94144;
        }
    </style>
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-light bg-white shadow-sm px-4">
    <a class="navbar-brand d-flex align-items-center" href="#">
        <img src="logo.webp" alt="Logo" class="logo me-2">
        <strong class="fs-4">TopUpPro</strong>
    </a>
    <div>
        <a href="login.php" class="btn btn-outline-primary me-2">Login</a>
        <a href="register.php" class="btn btn-primary">Daftar</a>
    </div>
</nav>

<!-- Promo Bar -->
<div class="promo-bar">
    🎉 Promo Spesial Bulan Ini! <a href="promo.php" class="btn btn-sm btn-promo ms-2">Lihat Promo 🔥</a>
</div>

<!-- Hero Section Full Width -->
<div class="position-relative text-white text-center">
    <img src="tampilan awal.jpeg" class="w-100 vh-100 object-fit-cover" alt="Ilustrasi Top Up" style="filter: brightness(0.6);">
    <div class="position-absolute top-50 start-50 translate-middle">
        <h1 class="display-4 fw-bold">Mudah dan Cepat TopUp Game</h1>
        <p class="lead">Top up Game hanya dengan beberapa klik. Aman, praktis, dan instan!</p>
        <a href="login.php" class="btn btn-primary btn-lg mt-3">Mulai Sekarang</a>
    </div>
</div>

</body>
</html>
