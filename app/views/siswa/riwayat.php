<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Riwayat Kebiasaan</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        body {
            min-height: 100vh;
            background: linear-gradient(180deg, #dcead8, #cfe3cf);
            padding: 40px 20px;
        }

        .container {
            max-width: 1000px;
            margin: auto;
        }

        /* HEADER */

        .hero {
            background: linear-gradient(135deg, #4CAF50, #2E7D32);
            color: white;
            padding: 35px;
            border-radius: 25px;
            margin-bottom: 20px;
            box-shadow: 0 15px 35px rgba(76, 175, 80, .25);
        }

        .hero h1 {
            font-size: 34px;
            margin-bottom: 8px;
        }

        .hero p {
            opacity: .9;
            line-height: 1.6;
        }

        /* TOTAL POIN */

        .point-card {
            background: white;
            border-radius: 20px;
            padding: 25px;
            display: flex;
            align-items: center;
            gap: 20px;
            margin-bottom: 25px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, .08);
        }

        .point-icon {
            width: 70px;
            height: 70px;
            background: #e8f5e9;
            border-radius: 18px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 32px;
        }

        .point-label {
            color: #666;
            font-size: 14px;
            margin-bottom: 5px;
        }

        .point-value {
            color: #2e7d32;
            font-size: 32px;
            font-weight: 700;
        }

        /* CARD */

        .card {
            background: #f8faf7;
            border-radius: 25px;
            padding: 30px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, .08);
        }

        .section-title {
            margin-bottom: 20px;
        }

        .section-title h2 {
            color: #2e7d32;
            margin-bottom: 5px;
        }

        .section-title p {
            color: #666;
            font-size: 14px;
        }

        /* TABLE */

        .table-wrapper {
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th {
            background: #4CAF50;
            color: white;
            padding: 16px;
            text-align: left;
        }

        th:first-child {
            border-radius: 12px 0 0 0;
        }

        th:last-child {
            border-radius: 0 12px 0 0;
        }

        td {
            padding: 16px;
            border-bottom: 1px solid #edf2f7;
        }

        tbody tr {
            transition: .3s;
        }

        tbody tr:hover {
            background: #f1fff1;
        }

        /* NOMOR */

        .number {
            width: 38px;
            height: 38px;
            border-radius: 50%;
            background: #e8f5e9;
            color: #2e7d32;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 600;
        }

        /* BADGE */

        .badge {
            display: inline-block;
            padding: 8px 14px;
            border-radius: 30px;
            background: #e8f5e9;
            color: #2e7d32;
            font-size: 13px;
            font-weight: 600;
        }

        /* DATE */

        .date {
            color: #555;
            font-weight: 500;
        }

        /* EMPTY */

        .empty {
            text-align: center;
            padding: 60px 20px;
            color: #888;
        }

        .empty-icon {
            font-size: 50px;
            margin-bottom: 10px;
        }

        /* BUTTON */

        .btn-back {
            display: inline-block;
            margin-top: 25px;
            padding: 12px 22px;
            background: #4CAF50;
            color: white;
            text-decoration: none;
            border-radius: 12px;
            font-weight: 600;
            transition: .3s;
        }

        .btn-back:hover {
            background: #43a047;
            transform: translateY(-2px);
        }

        @media(max-width:768px) {

            .hero h1 {
                font-size: 28px;
            }

            .point-card {
                flex-direction: column;
                text-align: center;
            }

            .card {
                padding: 20px;
            }

            th,
            td {
                padding: 12px;
            }
        }
    </style>
</head>

<body>

<div class="container">

    <div class="hero">
        <h1>📖 Riwayat Kebiasaan</h1>
        <p>
            Lihat seluruh aktivitas dan kebiasaan positif yang telah kamu lakukan.
        </p>
    </div>

    <div class="point-card">

        <div class="point-icon">
            🏆
        </div>

        <div>
            <div class="point-label">
                Total Poin Terkumpul
            </div>

            <div class="point-value">
                <?= $total_poin ?? 0; ?> Poin
            </div>
        </div>

    </div>

    <div class="card">

        <div class="section-title">
            <h2>Daftar Aktivitas</h2>
            <p>Riwayat kebiasaan yang sudah tercatat.</p>
        </div>

        <?php if (!empty($riwayat)): ?>

            <div class="table-wrapper">

                <table>

                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kebiasaan</th>
                            <th>Tanggal</th>
                        </tr>
                    </thead>

                    <tbody>

                    <?php $no = 1; ?>

                    <?php foreach ($riwayat as $row): ?>

                        <tr>

                            <td>
                                <div class="number">
                                    <?= $no++; ?>
                                </div>
                            </td>

                            <td>
                                <span class="badge">
                                    <?= htmlspecialchars($row['nama_kebiasaan']); ?>
                                </span>
                            </td>

                            <td>
                                <span class="date">
                                    📅 <?= $row['tanggal']; ?>
                                </span>
                            </td>

                        </tr>

                    <?php endforeach; ?>

                    </tbody>

                </table>

            </div>

        <?php else: ?>

            <div class="empty">
                <div class="empty-icon">📭</div>
                <p>Tidak ada data riwayat kebiasaan.</p>
            </div>

        <?php endif; ?>

        <a href="index.php?url=siswa" class="btn-back">
            ← Kembali
        </a>

    </div>

</div>

</body>

</html>