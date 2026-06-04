<?php
if (!isset($_SESSION['user']) || $_SESSION['user']['role'] != 'admin') {
    die("Akses ditolak");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard Admin</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background: linear-gradient(135deg, #e8f5e9, #c8e6c9);
            margin: 0;
            padding: 0;
        }

        .container {
            width: 85%;
            margin: auto;
            padding: 20px;
        }

        /* Header Sambutan */
        .welcome {
            background: linear-gradient(135deg, #4caf50, #2e7d32);
            color: white;
            padding: 25px;
            border-radius: 15px;
            margin-bottom: 25px;
            box-shadow: 0 4px 10px rgba(0,0,0,0.15);
        }

        .welcome h1 {
            margin: 0;
        }

        .welcome p {
            margin-top: 20px;
        }


        .stat-box {
            flex: 1;
            background: white;
            text-align: center;
            padding: 20px;
            border-radius: 15px;
            box-shadow: 0 3px 10px rgba(0,0,0,0.1);
        }

        .stat-box h2 {
            margin: 0;
            font-size: 32px;
        }
        .menu-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
             margin-top: 50px;
        }

        .card {
            background: white;
            padding: 25px;
            border-radius: 15px;
            text-align: center;
            box-shadow: 0 3px 10px rgba(0,0,0,0.1);
            transition: 0.3s;
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 18px rgba(0,0,0,0.15);
        }

        .card h3 {
            margin-bottom: 15px;
        }

        .btn {
            display: inline-block;
            padding: 10px 18px;
            background: #43a047;
            color: white;
            text-decoration: none;
            border-radius: 8px;
            font-weight: bold;
        }

        .btn:hover {
            background: #2e7d32;
        }

        /* Logout */
        .logout-btn {
            position: fixed;
            bottom: 20px;
            right: 20px;
            background: #e53935;
            color: white;
            text-decoration: none;
            padding: 12px 20px;
            border-radius: 8px;
            font-weight: bold;
        }

        .logout-btn:hover {
            background: #c62828;
        }
    </style>
</head>
<body>

<div class="container">

    
    <div class="welcome">
        <h1>👋 Halo, <?= $_SESSION['user']['nama']; ?></h1>
        <p>Selamat datang di Dashboard Admin Sistem Monitoring Kebiasaan Ramah Lingkungan</p>
    </div>

    <div class="menu-grid">

        <div class="card">
            <h3>👤 Manajemen User</h3>
            <a href="index.php?url=user_list" class="btn">
                Kelola User
            </a>
        </div>

        <div class="card">
            <h3>📝 Manajemen Kebiasaan</h3>
            <a href="index.php?url=kebiasaan_list" class="btn">
                Kelola Kebiasaan
            </a>
        </div>

        <div class="card">
            <h3>📊 Laporan Aktivitas</h3>
            <a href="index.php?url=laporan" class="btn">
                Lihat Laporan
            </a>
        </div>

    </div>

</div>

<!-- Logout -->
<a href="index.php?url=logout" class="logout-btn">
    Logout
</a>

</body>
</html>