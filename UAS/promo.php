<?php
session_start();
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Promo Top Up - TopUpPro</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(to right, #f1faff, #ffffff);
            font-family: 'Segoe UI', sans-serif;
        }
        .promo-card {
            border-radius: 12px;
            box-shadow: 0 4px 16px rgba(0, 0, 0, 0.1);
            transition: transform 0.2s;
        }
        .promo-card:hover {
            transform: scale(1.02);
        }
        .promo-img {
            height: 180px;
            object-fit: cover;
            border-top-left-radius: 12px;
            border-top-right-radius: 12px;
        }
    </style>
</head>
<body>

<div class="container py-5">
    <h2 class="text-center mb-4">Promo Top Up Terbaru</h2>

    <div class="row g-4">
        <div class="col-md-4">
            <div class="card promo-card">
                <img src="diskon.jpeg" class="diskon.jpeg" alt="Promo MLBB">
                <div class="card-body">
                    <h5 class="card-title">Diskon 10% untuk Mobile Legends</h5>
                    <p class="card-text">Nikmati diskon spesial untuk semua nominal top up MLBB hingga akhir bulan ini!</p>
                    <?php if (isset($_SESSION['user'])): ?>
                        <a href="form_topup.php?game=Mobile Legends" class="btn btn-primary mt-3">Top Up Sekarang</a>
                    <?php else: ?>
                        <a href="login.php" class="btn btn-warning mt-3">Login untuk Top Up</a>
                    <?php endif; ?>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card promo-card">
                <img src="diskon2.jpeg" class="promo-img" alt="Bonus Saldo">
                <div class="card-body">
                    <h5 class="card-title">Top Up 100K Dapat 110K!</h5>
                    <p class="card-text">Top up PUBG Mobile minimal 100 ribu dan dapatkan bonus 10 ribu saldo langsung!</p>
                    <?php if (isset($_SESSION['user'])): ?>
                        <a href="form_topup.php?game=PUBG Mobile" class="btn btn-primary mt-3">Top Up Sekarang</a>
                    <?php else: ?>
                        <a href="login.php" class="btn btn-warning mt-3">Login untuk Top Up</a>
                    <?php endif; ?>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card promo-card">
                <img src="diskon3.jpeg" class="promo-img" alt="Cashback">
                <div class="card-body">
                    <h5 class="card-title">Cashback 5% via ShopeePay</h5>
                    <p class="card-text">Bayar top up pakai ShopeePay dan dapat cashback 5% ke saldo e-wallet kamu.</p>
                    <?php if (isset($_SESSION['user'])): ?>
                        <a href="form_topup.php?game=Free Fire" class="btn btn-primary mt-3">Top Up Sekarang</a>
                    <?php else: ?>
                        <a href="login.php" class="btn btn-warning mt-3">Login untuk Top Up</a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>

    <div class="text-center mt-5">
        <a href="index.php" class="btn btn-outline-primary">Kembali ke Beranda</a>
    </div>
</div>

</body>
</html>
