<!DOCTYPE html>
<html>
<head>
    <title>Tambah Kebiasaan</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f1f8e9;
            margin: 0;
            padding: 20px;
        }

        h2 {
            color: #2e7d32;
        }

        /* Form */
        .form-container {
            background: white;
            padding: 25px;
            border-radius: 12px;
            box-shadow: 0 3px 10px rgba(0,0,0,0.1);
            margin-bottom: 30px;
            max-width: 600px;
        }

        label {
            display: block;
            margin-top: 15px;
            margin-bottom: 5px;
            font-weight: bold;
        }

        input {
            width: 100%;
            padding: 10px;
            border: 1px solid #c8e6c9;
            border-radius: 8px;
            box-sizing: border-box;
        }

        .btn-simpan {
            margin-top: 20px;
            background: #43a047;
            color: white;
            border: none;
            padding: 12px 18px;
            border-radius: 8px;
            cursor: pointer;
            font-weight: bold;
        }

        .btn-simpan:hover {
            background: #2e7d32;
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

        /* Tombol Kembali */
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
        }

        .btn-kembali:hover {
            background: #c62828;
        }
    </style>
</head>
<body>

<h2>➕ Tambah Kebiasaan</h2>

<div class="form-container">
    <form method="POST" action="index.php?url=kebiasaan_tambah">

        <label>Nama Kebiasaan</label>
        <input type="text" name="nama_kebiasaan" required>

        <label>Poin</label>
        <input type="number" name="poin" required>

        <button type="submit" class="btn-simpan">
            Simpan
        </button>

    </form>
</div>

<h2>📝 Daftar Kebiasaan Saat Ini</h2>

<table>
    <tr>
        <th>No</th>
        <th>Nama Kebiasaan</th>
        <th>Poin</th>
    </tr>

    <?php $no = 1; ?>
    <?php foreach ($kebiasaan as $k) : ?>
    <tr>
        <td><?= $no++; ?></td>
        <td><?= $k['nama_kebiasaan']; ?></td>
        <td><?= $k['poin']; ?></td>
    </tr>
    <?php endforeach; ?>
</table>

<div class="footer">
    <a href="index.php?url=kebiasaan_list" class="btn-kembali">
        Kembali
    </a>
</div>

</body>
</html>