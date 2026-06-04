<!DOCTYPE html>
<html>
<head>
    <title>Daftar Kebiasaan</title>

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

        /* Tombol Tambah */
        .btn-tambah {
            display: inline-block;
            background: #43a047;
            color: white;
            text-decoration: none;
            padding: 10px 18px;
            border-radius: 8px;
            margin-bottom: 20px;
            font-weight: bold;
        }

        .btn-tambah:hover {
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

        /* Tombol Hapus */
        .btn-hapus {
            background: #e53935;
            color: white;
            text-decoration: none;
            padding: 6px 12px;
            border-radius: 6px;
        }

        .btn-hapus:hover {
            background: #c62828;
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
            box-shadow: 0 2px 5px rgba(0,0,0,0.2);
        }

        .btn-kembali:hover {
            background: #c62828;
        }
    </style>
</head>

<body>

<h2>📝 Daftar Kebiasaan</h2>

<a href="index.php?url=kebiasaan_tambah" class="btn-tambah">
    + Tambah Kebiasaan
</a>

<table>
    <tr>
        <th>No</th>
        <th>Nama Kebiasaan</th>
        <th>Poin</th>
        <th>Aksi</th>
    </tr>

    <?php $no = 1; ?>

    <?php foreach ($kebiasaan as $k) : ?>
    <tr>
        <td><?= $no++; ?></td>

        <td><?= $k['nama_kebiasaan']; ?></td>

        <td><?= $k['poin']; ?></td>

        <td>
            <a href="index.php?url=kebiasaan_hapus&id=<?= $k['id']; ?>"
               class="btn-hapus"
               onclick="return confirm('Yakin ingin menghapus kebiasaan ini?')">
                Hapus
            </a>
        </td>
    </tr>
    <?php endforeach; ?>

</table>

<div class="footer">
    <a href="index.php?url=admin" class="btn-kembali">
        Kembali
    </a>
</div>

</body>
</html>