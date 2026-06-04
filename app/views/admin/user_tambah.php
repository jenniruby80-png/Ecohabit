<!DOCTYPE html>
<html>
<head>
<style>
body {
    font-family: Arial, sans-serif;
    background: linear-gradient(135deg, #e8f5e9, #c8e6c9);
    margin: 0;
    padding: 20px;
}

.container {
    max-width: 500px;
    margin: 30px auto;
    background: linear-gradient(135deg, #f1f8e9, #dcedc8);
    padding: 30px;
    border-radius: 15px;
    box-shadow: 0 4px 15px rgba(0,0,0,0.1);
}

h2 {
    text-align: center;
    color: #2e7d32;
    margin-bottom: 25px;
}

.form-user {
    display: flex;
    flex-direction: column;
}

.form-user label {
    margin-bottom: 6px;
    margin-top: 12px;
    font-weight: bold;
    color: #2e7d32;
}

.form-user input,
.form-user select {
    padding: 10px;
    border: 1px solid #a5d6a7;
    border-radius: 8px;
    font-size: 14px;
}

.form-user input:focus,
.form-user select:focus {
    outline: none;
    border-color: #4caf50;
    box-shadow: 0 0 5px rgba(76,175,80,0.3);
}

.form-user button {
    margin-top: 20px;
    padding: 12px;
    background: #43a047;
    color: white;
    border: none;
    border-radius: 8px;
    font-size: 15px;
    font-weight: bold;
    cursor: pointer;
}

.form-user button:hover {
    background: #2e7d32;
}
.footer {
    margin-top: 20px;
    text-align: right;
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

    <h2>➕ Tambah Siswa</h2>

    <form method="POST" class="form-user">

        <label>Nama</label>
        <input type="text" name="nama" required>

        <label>Email</label>
        <input type="email" name="email" required>

        <label>Password</label>
        <input type="password" name="password" required>

        <label>Role</label>
        <select name="role">
            <option value="siswa">Siswa</option>
            <option value="admin">Admin</option>
        </select>

        <button type="submit">Simpan</button>

    </form>

</div>
<div class="footer">
    <a href="index.php?url=admin" class="btn-kembali">
        Kembali
    </a>
</div>