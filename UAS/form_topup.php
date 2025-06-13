<?php
session_start();
if (!isset($_SESSION['login'])) {
    header("Location: login.php");
    exit;
}

$game = isset($_GET['game']) ? $_GET['game'] : 'Tidak Diketahui';
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Top Up - <?= htmlspecialchars($game) ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(135deg, #d0f4ff, #ffffff);
            font-family: 'Segoe UI', sans-serif;
        }
        .card {
            border-radius: 1rem;
            box-shadow: 0 12px 25px rgba(0,0,0,0.1);
        }
        .card-title {
            color: #0077b6;
            font-weight: 600;
        }
        .btn-primary {
            background-color: #0096c7;
            border: none;
        }
        .btn-primary:hover {
            background-color: #0077b6;
        }
        .btn-outline-secondary:hover {
            background-color: #adb5bd;
            color: white;
        }
    </style>
</head>
<body>

<div class="container py-5">
    <div class="card mx-auto p-4" style="max-width: 500px;">
        <h4 class="card-title text-center mb-4">Top Up <span class="text-primary"><?= htmlspecialchars($game) ?></span></h4>
        <form action="process_topup.php" method="POST">
            <input type="hidden" name="product" value="<?= htmlspecialchars($game) ?>">

            <div class="mb-3">
                <label for="target" class="form-label">ID Game / Username</label>
                <input type="text" class="form-control" id="target" name="target" required placeholder="Contoh: 123456789 / nama_user">
            </div>

            <div class="mb-3">
                <label for="amount" class="form-label">Harga Top Up (Rp)</label>
              <input type="number" class="form-control" id="amount" name="amount" Harga required placeholder
            </div>

            <div class="mb-3">
                <label for="method" class="form-label">Metode Pembayaran</label>
                <select class="form-select" name="method" id="method" required>
                    <option value="">-- Pilih Metode --</option>
                    <option value="Dana">Dana</option>
                    <option value="OVO">OVO</option>
                    <option value="Gopay">Gopay</option>
                    <option value="Gopay">ShopeePay</option>
                    <option value="Transfer Bank">Transfer Bank</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary w-100">Top Up Sekarang</button>
        </form>
    </div>

    <div class="text-center mt-4">
        <a href="dashboard.php" class="btn btn-outline-secondary">⬅ Kembali ke Dashboard</a>
    </div>
</div>

</body>
</html>
