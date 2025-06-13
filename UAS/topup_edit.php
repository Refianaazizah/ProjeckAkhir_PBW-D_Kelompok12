<?php
// topup_edit.php
include 'db.php';
session_start();

// Cek jika user belum login
if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit;
}

$id = $_GET['id'];
$data = $conn->query("SELECT * FROM riwayat WHERE id = $id")->fetch_assoc();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Top Up</title>
</head>
<body>
    <h2>Edit Top Up</h2>
    <form action="topup_update.php" method="POST">
        <input type="hidden" name="id" value="<?= $data['id'] ?>">
        Game: <input type="text" name="game" value="<?= $data['game'] ?>"><br>
        Nominal: <input type="number" name="amount" value="<?= $data['amount'] ?>"><br>
        <button type="submit">Update</button>
    </form>
</body>
</html>
