<?php
/** @var mysqli_result $result */
?>
<!DOCTYPE html>
<html>
<head>
    <title>Pilih Aktivitas</title>
</head>
<body>

<h2>Pilih Kebiasaan Hari Ini</h2>

<form method="POST" action="index.php?url=simpan_aktivitas">

<?php while($row = $result->fetch_assoc()): ?>
    <input type="radio" name="kebiasaan_id" value="<?= $row['id']; ?>" required>
    <?= $row['nama_kebiasaan']; ?> <br>
<?php endwhile; ?>

<br>
<button type="submit">Simpan</button>

</form>

</body>
</html>