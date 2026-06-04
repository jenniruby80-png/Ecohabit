<!DOCTYPE html>
<html>
<head>
    <title>Laporan Aktivitas Admin</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f1f8e9;
            margin: 0;
            padding: 20px;
        }

        h2 {
            color: #2e7d32;
            margin-bottom: 20px;
        }

        h3 {
            color: #2e7d32;
            margin-top: 30px;
            margin-bottom: 15px;
        }

        /* Tabel */
        table {
            width: 100%;
            border-collapse: collapse;
            background: white;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 3px 10px rgba(0,0,0,0.1);
        }

        th {
            background: #4caf50;
            color: white;
            padding: 12px;
        }

        td {
            padding: 12px;
            text-align: center;
            border-bottom: 1px solid #ddd;
        }

        tr:hover {
            background: #f1f8e9;
        }

        /* Grafik */
        .chart-container {
            width: 80%;
            max-width: 800px;
            background: white;
            padding: 20px;
            border-radius: 12px;
            box-shadow: 0 3px 10px rgba(0,0,0,0.1);
        }

        /* Tombol kembali */
        .footer {
            position: fixed;
            bottom: 20px;
            right: 20px;
        }

        .btn-kembali {
            background: #e53935;
            color: white;
            text-decoration: none;
            padding: 12px 20px;
            border-radius: 8px;
            font-weight: bold;
            box-shadow: 0 2px 5px rgba(0,0,0,0.2);
        }

        .btn-kembali:hover {
            background: #c62828;
        }
    </style>
</head>

<body>

    <h2>📋 Laporan Aktivitass</h2>

    <table>
        <tr>
            <th>No</th>
            <th>Nama User</th>
            <th>Kebiasaan</th>
            <th>Tanggal</th>
        </tr>

        <?php $no = 1; ?>
        <?php foreach ($laporan as $l) : ?>
        <tr>
            <td><?= $no++; ?></td>
            <td><?= $l['nama']; ?></td>
            <td><?= $l['nama_kebiasaan']; ?></td>
            <td><?= $l['tanggal']; ?></td>
        </tr>
        <?php endforeach; ?>
    </table>

    <h3>📊 Grafik Aktivitas</h3>

    <div class="chart-container">
        <canvas id="myChart"></canvas>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
    new Chart(document.getElementById('myChart'), {
        type: 'bar',
        data: {
            labels: <?= json_encode($label); ?>,
            datasets: [{
                label: 'Jumlah Aktivitas',
                data: <?= json_encode($data); ?>,
                borderWidth: 2,
                backgroundColor: '#66bb6a',
                borderColor: '#388e3c'
            }]
        },
        options: {
            responsive: true,
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: {
                        stepSize: 1,
                        precision: 0
                    }
                }
            }
        }
    });
    </script>

    <div class="footer">
        <a href="index.php?url=admin" class="btn-kembali">
            Kembali
        </a>
    </div>

</body>
</html>