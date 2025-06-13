<?php
session_start();
include 'db.php';

if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit;
}

$userId = $_SESSION['user']['id'];

$search = isset($_GET['search']) ? $conn->real_escape_string($_GET['search']) : '';
$query = "SELECT * FROM topup_history WHERE user_id = $userId";
if (!empty($search)) {
    $query .= " AND (product LIKE '%$search%' OR target LIKE '%$search%' OR method LIKE '%$search%')";
}
$query .= " ORDER BY created_at DESC";
$result = $conn->query($query);

// Proses Hapus
if (isset($_GET['delete'])) {
    $id = (int)$_GET['delete'];
    $conn->query("DELETE FROM topup_history WHERE id = $id AND user_id = $userId");
    header("Location: riwayat.php");
    exit;
}

// Proses Update
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update_id'])) {
    $id = (int)$_POST['update_id'];
    $product = $conn->real_escape_string($_POST['product']);
    $target = $conn->real_escape_string($_POST['target']);
    $amount = (int)$_POST['amount'];
    $method = $conn->real_escape_string($_POST['method']);

    $conn->query("UPDATE topup_history SET product='$product', target='$target', amount=$amount, method='$method' WHERE id=$id AND user_id = $userId");
    header("Location: riwayat.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Riwayat Top Up</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container py-5">

    <h2 class="mb-4 text-center">Riwayat Top Up</h2>

    <form method="GET" class="mb-4">
        <div class="input-group">
            <input type="text" name="search" class="form-control" placeholder="Cari produk, tujuan, atau metode..." value="<?= htmlspecialchars($search) ?>">
            <button class="btn btn-primary" type="submit">Cari</button>
        </div>
    </form>

    <div class="table-responsive mb-4">
        <table class="table table-bordered table-striped table-hover bg-white shadow-sm">
            <thead class="table-primary text-center">
                <tr>
                    <th>Produk</th>
                    <th>Tujuan</th>
                    <th>Nominal</th>
                    <th>Metode</th>
                    <th>Tanggal</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
            <?php while($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?= htmlspecialchars($row['product']) ?></td>
                    <td><?= htmlspecialchars($row['target']) ?></td>
                    <td>Rp <?= number_format($row['amount']) ?></td>
                    <td><?= htmlspecialchars($row['method']) ?></td>
                    <td><?= $row['created_at'] ?></td>
                    <td class="text-center">
                        <a href="?edit=<?= $row['id'] ?>" class="btn btn-sm btn-warning">Edit</a>
                        <a href="?delete=<?= $row['id'] ?>" onclick="return confirm('Yakin ingin menghapus?')" class="btn btn-sm btn-danger">Hapus</a>
                    </td>
                </tr>
            <?php endwhile; ?>
            </tbody>
        </table>
    </div>

    <?php
    if (isset($_GET['edit'])):
        $id = (int)$_GET['edit'];
        $data = $conn->query("SELECT * FROM topup_history WHERE id = $id AND user_id = $userId")->fetch_assoc();
        if ($data):
    ?>
    <div class="card shadow mb-4">
        <div class="card-body">
            <h4 class="mb-3">Edit Data Top Up</h4>
            <form method="POST">
                <input type="hidden" name="update_id" value="<?= $data['id'] ?>">
                <div class="mb-3">
                    <label class="form-label">Produk</label>
                    <input type="text" name="product" class="form-control" value="<?= htmlspecialchars($data['product']) ?>" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Tujuan</label>
                    <input type="text" name="target" class="form-control" value="<?= htmlspecialchars($data['target']) ?>" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Nominal</label>
                    <input type="number" name="amount" class="form-control" value="<?= $data['amount'] ?>" min="50000" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Metode</label>
                    <input type="text" name="method" class="form-control" value="<?= htmlspecialchars($data['method']) ?>" required>
                </div>
                <div class="d-flex justify-content-between">
                    <a href="riwayat.php" class="btn btn-secondary">Batal</a>
                    <button type="submit" class="btn btn-success">Simpan Perubahan</button>
                </div>
            </form>
        </div>
    </div>
    <?php endif; endif; ?>

    <div class="text-center mt-3">
        <a href="dashboard.php" class="btn btn-outline-primary">Kembali ke Dashboard</a>
    </div>

</div>
</body>
</html>
