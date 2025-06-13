<?php
// topup_delete.php
include 'db.php';
session_start();

if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit;
}

$id = $_GET['id'];
$conn->query("DELETE FROM riwayat WHERE id=$id");
header("Location: riwayat.php");
exit;
