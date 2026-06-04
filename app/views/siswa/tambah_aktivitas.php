<?php
/** @var array $kebiasaan */
?>
<!DOCTYPE html>
<html>
<head>
    <title>Pilih Aktivitas</title>

    <style>
        *{
            margin:0;
            padding:0;
            box-sizing:border-box;
        }

        body{
            font-family:Arial,sans-serif;
            background:#e8f5e9;
        }

        /* Header */
        .header{
            background:#4caf50;
            color:white;
            padding:25px;
            text-align:center;
            box-shadow:0 2px 10px rgba(0,0,0,.1);
        }

        .header h1{
            margin-bottom:8px;
        }

        /* Container */
        .container{
            max-width:750px;
            margin:30px auto;
            background:white;
            padding:30px;
            border-radius:20px;
            box-shadow:0 5px 15px rgba(0,0,0,.1);
        }

        .title{
            text-align:center;
            margin-bottom:25px;
        }

        .title h2{
            color:#2e7d32;
            margin-bottom:8px;
        }

        .title p{
            color:#666;
        }

        /* Alert */
        .success{
            background:#c8e6c9;
            color:#1b5e20;
            padding:12px;
            border-radius:10px;
            margin-bottom:15px;
        }

        .error{
            background:#ffcdd2;
            color:#b71c1c;
            padding:12px;
            border-radius:10px;
            margin-bottom:15px;
        }

        /* Kebiasaan Card */
        .kebiasaan-item{
            background:#f8fff8;
            border:2px solid #dcedc8;
            border-radius:15px;
            padding:15px;
            margin-bottom:12px;
            transition:.3s;
        }

        .kebiasaan-item:hover{
            border-color:#4caf50;
            transform:translateY(-2px);
            box-shadow:0 3px 8px rgba(0,0,0,.08);
        }

        .kebiasaan-item label{
            display:flex;
            align-items:center;
            gap:12px;
            cursor:pointer;
            font-size:16px;
            font-weight:bold;
            color:#333;
        }

        input[type="radio"]{
            transform:scale(1.3);
            accent-color:#4caf50;
        }

        /* Tombol */
        .btn-area{
            margin-top:25px;
            display:flex;
            justify-content:space-between;
        }

        .btn{
            padding:12px 22px;
            border:none;
            border-radius:10px;
            font-weight:bold;
            text-decoration:none;
            cursor:pointer;
            transition:.3s;
        }

        .btn-simpan{
            background:#43a047;
            color:white;
        }

        .btn-simpan:hover{
            background:#2e7d32;
        }

        .btn-kembali{
            background:#e53935;
            color:white;
        }

        .btn-kembali:hover{
            background:#c62828;
        }

        /* Footer Card */
        .info{
            margin-top:20px;
            background:#f1f8e9;
            padding:15px;
            border-radius:12px;
            border-left:5px solid #4caf50;
            color:#555;
        }
    </style>

</head>
<body>

<div class="header">
    <h1>🌱 EcoHabit</h1>
    <p>Bangun kebiasaan baik untuk lingkungan yang lebih sehat</p>
</div>

<div class="container">

    <div class="title">
        <h2>📝 Aktivitas Hari Ini</h2>
        <p>Pilih kebiasaan yang sudah kamu lakukan hari ini</p>
    </div>

    <?php if (isset($_SESSION['success'])): ?>
        <div class="success">
            <?= $_SESSION['success']; ?>
        </div>
        <?php unset($_SESSION['success']); ?>
    <?php endif; ?>

    <?php if (isset($_SESSION['error'])): ?>
        <div class="error">
            <?= $_SESSION['error']; ?>
        </div>
        <?php unset($_SESSION['error']); ?>
    <?php endif; ?>

    <form method="POST" action="index.php?url=simpan_aktivitas">

        <?php if (!empty($kebiasaan)): ?>
            <?php foreach ($kebiasaan as $row): ?>
                <div class="kebiasaan-item">
                    <label>
                        <input type="radio"
                               name="kebiasaan_id"
                               value="<?= $row['id']; ?>"
                               required>

                        🌿 <?= $row['nama_kebiasaan']; ?>
                    </label>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p>Tidak ada data kebiasaan.</p>
        <?php endif; ?>

        <div class="btn-area">

            <button type="submit" class="btn btn-simpan">
                ✅ Simpan Aktivitas
            </button>

            <a href="index.php?url=siswa" class="btn btn-kembali">
                Kembali
            </a>

        </div>

    </form>

    <div class="info">
        💡 <b>Tips:</b> Konsisten melakukan kebiasaan baik setiap hari akan membantu meningkatkan poin dan membentuk gaya hidup ramah lingkungan.
    </div>

</div>

</body>
</html>