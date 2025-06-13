<?php
session_start();
include 'db.php';

if (!isset($_SESSION['login'])) {
    header("Location: login.php");
    exit;
}

$user = $_SESSION['user'];
$userId = $user['id'];

// Ambil data dari form
$product = isset($_POST['product']) ? trim($_POST['product']) : '';
$target = isset($_POST['target']) ? trim($_POST['target']) : '';
$amount = isset($_POST['amount']) ? (int) $_POST['amount'] : 0;
$method = isset($_POST['method']) ? trim($_POST['method']) : '';

if ($product === '' || $target === '' || $amount < 50000 || $method === '') {
    echo "Data tidak valid!";
    exit;
}

// Simpan ke database
$stmt = $conn->prepare("INSERT INTO topup_history (user_id, product, target, amount, method, created_at) VALUES (?, ?, ?, ?, ?, NOW())");
$stmt->bind_param("issis", $userId, $product, $target, $amount, $method);

if ($stmt->execute()) {
    // Simpan transaksi terakhir ke session untuk ditampilkan di success.php
    $_SESSION['last_topup'] = [
        'product' => $product,
        'target' => $target,
        'amount' => $amount,
        'method' => $method,
        'created_at' => date('Y-m-d H:i:s')
    ];
    header("Location: success.php");
    exit;
} else {
    echo "Gagal menyimpan data: " . $conn->error;
    exit;
}
?>
