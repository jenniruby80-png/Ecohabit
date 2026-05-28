<?php
if (!isset($_SESSION['user']) || $_SESSION['user']['role'] != 'admin') {
    die("Akses ditolak");
}
?>

<h1>Dashboard Admin</h1>

<p>Halo Admin, <?= $_SESSION['user']['nama']; ?></p>

<a href="index.php?url=logout">Logout</a>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard Admin</title>
    <style>
        body {
            font-family: Arial;
            background: #f3f3f3;
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
            background: #1976d2;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            margin-right: 10px;
            display: inline-block;
        }
    </style>
</head>
<body>

<div class="container">

    <h2>Dashboard Admin 👑</h2>

    <!-- USER -->
    <div class="card">
        <h3>👤 Manajemen User</h3>
        <a href="index.php?url=user_list" class="btn">Lihat User</a>
        <a href="index.php?url=user_tambah" class="btn">Tambah User</a>
    </div>

    <!-- KEBIASAAN -->
    <div class="card">
        <h3>📝 Manajemen Kebiasaan</h3>
        <a href="index.php?url=kebiasaan_list" class="btn">Lihat Kebiasaan</a>
        <a href="index.php?url=kebiasaan_tambah" class="btn">Tambah Kebiasaan</a>
    </div>

    <!-- LAPORAN -->
    <div class="card">
        <h3>📊 Laporan Aktivitas</h3>
        <a href="index.php?url=laporan" class="btn">Lihat Laporan</a>
    </div>

    <!-- GRAFIK -->
    <div class="card">
        <h3>📈 Grafik Sistem</h3>
        <a href="index.php?url=grafik_admin" class="btn">Lihat Grafik</a>
    </div>

    <br>
    <a href="index.php?url=logout">Logout</a>

</div>

</body>
</html>