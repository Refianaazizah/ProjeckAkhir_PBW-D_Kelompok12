<?php
$host = 'localhost';
$user = 'root';
$pass = ''; // default XAMPP
$db   = 'topup_db';

$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}
?>
