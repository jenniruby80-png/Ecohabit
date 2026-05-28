<?php
session_start();

if (!isset($_SESSION['user']) || $_SESSION['user']['role'] != 'admin') {
    die("Akses ditolak");
}
?>

<h1>Dashboard Admin</h1>

<p>Halo Admin, <?= $_SESSION['user']['nama']; ?></p>

<a href="index.php?url=logout">Logout</a>