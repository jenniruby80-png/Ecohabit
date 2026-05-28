<?php

if (!isset($_SESSION['user']) || $_SESSION['user']['role'] != 'siswa') {
    die("Akses ditolak");
}
?>

<h1>Dashboard Siswa</h1>

<p>Halo, <?= $_SESSION['user']['nama']; ?></p>

<a href="index.php?url=logout">Logout</a>