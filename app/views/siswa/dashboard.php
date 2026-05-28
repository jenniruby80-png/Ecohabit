<?php

if (!isset($_SESSION['user'])) {
    header("Location: index.php?url=login");
    exit;
}

if ($_SESSION['user']['role'] != 'siswa') {
    echo "Akses ditolak!";
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard Siswa</title>
    <style>
        body {
            font-family: Arial;
            background: #e8f5e9;
        }
        .container {
            width: 80%;
            margin: auto;
        }
        .card {
            background: white;
            padding: 20px;
            margin-top: 20px;
            border-radius: 10px;
        }
        .btn {
            padding: 10px;
            background: green;
            color: white;
            text-decoration: none;
            border-radius: 5px;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Halo, <?= $_SESSION['user']['nama']; ?> 👋</h2>
    <p>Role: Siswa</p>

    <div class="card">
        <h3>🌱 Aktivitas Hari Ini</h3>
        <a href="index.php?url=tambah_aktivitas" class="btn">+ Tambah Aktivitas</a>
    </div>

    <div class="card">
        <h3>📒 Riwayat Aktivitas</h3>
        <a href="index.php?url=riwayat" class="btn">Lihat Riwayat</a>
    </div>

    <div class="card">
    <h3>📊 Grafik Progress</h3>
    <a href="index.php?url=grafik" class="btn">Lihat Grafik Progress</a>
    </div>

    <br>
    <a href="index.php?url=logout">Logout</a>
</div>

</body>
</html>

