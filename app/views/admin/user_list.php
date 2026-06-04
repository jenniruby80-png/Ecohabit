<!DOCTYPE html>
<html>
<head>
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
.footer {
    position: fixed;
    bottom: 20px;
    right: 20px;
}
.container {
    background:#f1f8e9;
    padding: 25px;
    border-radius: 15px;
    box-shadow: 0 3px 10px rgba(0,0,0,0.1);
}
.btn-kembali {
    display: inline-block;
    background: #e53935;
    color: white;
    text-decoration: none;
    padding: 10px 18px;
    border-radius: 8px;
    font-weight: bold;
}

.btn-kembali:hover {
    background: #c62828;
}
   </style>
</head>
<body>
<div class="container">

<h2>🧑‍🎓 Data Siswa</h2>

<a href="index.php?url=user_tambah" class="btn-tambah">
    + Tambah Siswa
</a>

<table>
<tr>
    <th>ID</th>
    <th>Nama</th>
    <th>Email</th>
    <th>Role</th>
    <th>Aksi</th>
</tr>

<?php foreach ($users as $u): ?>
<tr>
    <td><?= $u['id'] ?></td>
    <td><?= $u['nama'] ?></td>
    <td><?= $u['email'] ?></td>
    <td><?= $u['role'] ?></td>
    <td>
        <a href="index.php?url=user_hapus&id=<?= $u['id'] ?>"
           class="btn-hapus"
           onclick="return confirm('Yakin hapus?')">
           Hapus
        </a>
    </td>
</tr>
<?php endforeach; ?>
</table>
</div>
<div class="footer">
    <a href="index.php?url=admin" class="btn-kembali">
        Kembali
    </a>
</div>