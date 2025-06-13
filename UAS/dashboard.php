<?php
session_start();
if (!isset($_SESSION['login'])) {
    header("Location: login.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Dashboard Top Up Game</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(135deg, #caf0f8, #ffffff);
            font-family: 'Segoe UI', sans-serif;
        }
        .game-card {
            transition: all 0.3s ease;
            cursor: pointer;
            border-radius: 1rem;
            overflow: hidden;
            box-shadow: 0 8px 16px rgba(0,0,0,0.1);
        }
        .game-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 12px 25px rgba(0,0,0,0.15);
        }
        .game-img {
            height: 180px;
            object-fit: cover;
        }
        .header-title {
            font-size: 2.2rem;
            font-weight: 600;
            margin-bottom: 30px;
            color: #0077b6;
        }
        .btn-custom {
            padding: 10px 25px;
            font-weight: 500;
            font-size: 1rem;
            border-radius: 8px;
        }
        .btn-success {
            background-color: #2b9348;
            border: none;
        }
        .btn-success:hover {
            background-color: #1a7431;
        }
        .btn-outline-danger:hover {
            background-color: #dc3545;
            color: white;
        }
        .price-label {
            font-size: 0.95rem;
            color: #495057;
            margin-top: 5px;
        }
    </style>
</head>
<body>

<div class="container py-5">
    <h2 class="text-center header-title">Pilih Game untuk Top Up</h2>
    <div class="row g-4">

        <?php
        $games = [
            ["name" => "Mobile Legends", "img" => "ml.jpeg", "price" => "59.000"],
            ["name" => "Free Fire", "img" => "ff.jpg", "price" => "60.000"],
            ["name" => "PUBG Mobile", "img" => "pubg-169.jpg", "price" => "90.000"],
            ["name" => "Genshin Impact", "img" => "genshin impact.jpg", "price" => "111.000"],
            ["name" => "Roblox", "img" => "roblox.jpg", "price" => "10.000"],
            ["name" => "Call of Duty Mobile", "img" => "call of duty.webp", "price" => "25.000"]
        ];

        foreach ($games as $game): ?>
            <div class="col-md-4">
                <a href="form_topup.php?game=<?= urlencode($game['name']) ?>" class="text-decoration-none text-dark">
                    <div class="card game-card">
                        <img src="<?= $game['img'] ?>" class="card-img-top game-img" alt="<?= $game['name'] ?>">
                        <div class="card-body text-center">
                            <h5 class="card-title"><?= $game['name'] ?></h5>
                            <div class="price-label">Rp<?= $game['price'] ?></div>
                        </div>
                    </div>
                </a>
            </div>
        <?php endforeach; ?>

    </div>

    <div class="text-center mt-5">
        <a href="riwayat.php" class="btn btn-success btn-custom me-2">Lihat Riwayat Top Up</a>
        <a href="longout.php" class="btn btn-outline-danger btn-custom">Logout</a>
    </div>
</div>

</body>
</html>
