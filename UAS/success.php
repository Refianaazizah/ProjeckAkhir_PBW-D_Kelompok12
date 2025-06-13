<?php
session_start();
if (!isset($_SESSION['login'])) {
    header("Location: login.php");
    exit;
}

// Ambil data transaksi terakhir dari session
if (!isset($_SESSION['last_topup'])) {
    header("Location: dashboard.php");
    exit;
}

$topup = $_SESSION['last_topup'];
unset($_SESSION['last_topup']); // Hapus agar tidak tampil lagi setelah reload
?>

<!DOCTYPE html>
<html>
<head>
    <title>Top Up Berhasil</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .struk-card {
            max-width: 500px;
            margin: auto;
            margin-top: 60px;
            border-radius: 15px;
        }
        .struk-card h4 {
            margin-bottom: 1rem;
        }
    </style>
</head>
<body class="bg-light">

<div class="container">
    <div class="card struk-card shadow p-4">
        <h4 class="text-center text-success">✅ Top Up Berhasil!</h4>
        <hr>
        <p><strong>Game:</strong> <?= htmlspecialchars($topup['product']) ?></p>
        <p><strong>User ID:</strong> <?= htmlspecialchars($topup['target']) ?></p>
        <p><strong>Nominal:</strong> Rp <?= number_format($topup['amount'], 0, ',', '.') ?></p>
        <p><strong>Metode Pembayaran:</strong> <?= htmlspecialchars($topup['method']) ?></p>
        <p><strong>Tanggal:</strong> <?= date('d M Y, H:i', strtotime($topup['created_at'])) ?></p>

        <hr>
        <div class="d-grid gap-2">
            <a href="dashboard.php" class="btn btn-primary">🔙 Kembali ke Dashboard</a>
            <button onclick="window.print()" class="btn btn-outline-success">🖨️ Cetak Struk</button>
        </div>
    </div>
</div>

</body>
</html>
