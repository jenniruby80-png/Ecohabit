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
body{
    font-family: Arial, sans-serif;
    background: #e8f5e9;
    margin: 0;
    padding: 0;
}

.container{
    width: 85%;
    margin: auto;
    padding: 20px 0;
}

/* HEADER */
.header{
    background: linear-gradient(135deg, #43a047, #66bb6a);
    color: white;
    padding: 30px 35px;
    border-radius: 20px;
    box-shadow: 0 8px 20px rgba(0,0,0,.12);

    display: flex;
    justify-content: space-between;
    align-items: center;

    position: relative;
    overflow: hidden;
}

.eco-icon{
    position: absolute;
    right: 280px;
    top: 10px;
    font-size: 90px;
    opacity: .12;
}

.header h2{
    margin: 0;
    font-size: 38px;
    font-weight: 700;
}

.header p{
    margin-top: 8px;
    font-size: 18px;
    color: #f1f8e9;
}

/* TOTAL POIN */
.point-card{
    display: flex;
    align-items: center;
    gap: 15px;

    background: rgba(255,255,255,.18);
    backdrop-filter: blur(8px);

    padding: 15px 22px;
    border-radius: 18px;

    border: 1px solid rgba(255,255,255,.25);

    transition: .3s;
}

.point-card:hover{
    transform: translateY(-3px);
}

.point-icon{
    width: 60px;
    height: 60px;

    background: rgba(255,255,255,.25);

    border-radius: 15px;

    display: flex;
    align-items: center;
    justify-content: center;

    font-size: 28px;
}

.point-label{
    color: #e8f5e9;
    font-size: 14px;
}

.point-value{
    color: white;
    font-size: 30px;
    font-weight: bold;
}

/* TIPS */
.tips-card{
    margin-top: 25px;
    background: #f1f8e9;

    border-left: 8px solid #43a047;

    padding: 22px;
    border-radius: 15px;

    box-shadow: 0 4px 12px rgba(0,0,0,.05);
}

.tips-card h3{
    margin-top: 0;
    color: #2e7d32;
}

/* MENU */
.menu-grid{
    display: grid;
    grid-template-columns: repeat(auto-fit,minmax(300px,1fr));
    gap: 25px;
    margin-top: 25px;
}

.card{
    background: white;
    padding: 25px;

    border-radius: 18px;

    border-top: 5px solid #4caf50;

    box-shadow: 0 4px 15px rgba(0,0,0,.08);

    transition: .3s;
}

.card:hover{
    transform: translateY(-8px);
    box-shadow: 0 12px 25px rgba(0,0,0,.12);
}

.card h3{
    margin-top: 0;
    color: #2e7d32;
    font-size: 32px;
}

.card p{
    color: #666;
    line-height: 1.6;
}

/* BUTTON */
.btn{
    display: inline-block;

    background: #43a047;
    color: white;

    text-decoration: none;

    padding: 12px 22px;
    border-radius: 12px;

    font-weight: bold;

    transition: .3s;
}

.btn:hover{
    background: #2e7d32;
    transform: translateY(-2px);
}

/* LOGOUT */
.logout-fixed{
    position: fixed;
    bottom: 20px;
    right: 20px;
}

.logout-btn{
    background: #e53935;
    color: white;
    text-decoration: none;

    padding: 12px 22px;
    border-radius: 12px;

    font-weight: bold;

    box-shadow: 0 4px 10px rgba(0,0,0,.2);

    transition: .3s;
}

.logout-btn:hover{
    background: #c62828;
    transform: translateY(-2px);
}

/* RESPONSIVE */
@media(max-width:768px){

    .header{
        flex-direction: column;
        gap: 20px;
        text-align: center;
    }

    .eco-icon{
        display: none;
    }
}
</style>
</head>

<body>

<div class="container">

   <div class="header">

    <div class="eco-icon">🌿</div>

    <div>
        <h2>Halo, <?= $_SESSION['user']['nama']; ?> 👋</h2>
        <p>Selamat datang di EcoHabit</p>
    </div>

    <div class="point-card">

        <div class="point-icon">🏆</div>

        <div>
            <div class="point-label">Total Poin</div>
            <div class="point-value">
                <?= $total_poin ?? 0; ?>
            </div>
        </div>

    </div>

</div>


    <!-- Tips -->
    <div class="tips-card">
        <h3>🌱 Tips Hari Ini</h3>
        <p>
            Membawa tumbler sendiri dapat mengurangi penggunaan
            botol plastik sekali pakai dan membantu menjaga lingkungan.
        </p>
    </div>

    <!-- Menu -->
    <div class="menu-grid">

        <div class="card">
            <h3>🌱 Aktivitas Hari Ini</h3>
            <p>Catat kebiasaan baik yang sudah kamu lakukan hari ini.</p>

            <a href="index.php?url=tambah_aktivitas" class="btn">
                + Tambah Aktivitas
            </a>
        </div>

        <div class="card">
            <h3>📒 Riwayat Aktivitas</h3>
            <p>Lihat semua aktivitas yang pernah kamu catat.</p>

            <a href="index.php?url=riwayat" class="btn">
                Lihat Riwayat
            </a>
        </div>

    </div>

</div>
<div class="logout-fixed">
    <a href="index.php?url=logout" class="logout-btn">
        Logout
    </a>
</div>
</body>
</html>