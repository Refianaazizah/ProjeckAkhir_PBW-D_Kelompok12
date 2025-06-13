<?php
// topup_update.php
include 'db.php';
session_start();

if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit;
}

$id = $_POST['id'];
$game = $_POST['game'];
$amount = $_POST['amount'];

$conn->query("UPDATE riwayat SET game='$game', amount=$amount WHERE id=$id");
header("Location: riwayat.php");
exit;
