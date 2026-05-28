<!DOCTYPE html>
<html>
<head>
    <title>Riwayat Kebiasaan</title>
</head>
<body>

<h2>Riwayat Kebiasaan</h2>
<?php if (!empty($riwayat)): ?>
<table border="1" cellpadding="10">
    <tr>
        <th>No</th>
        <th>Kebiasaan</th>
        <th>Tanggal</th>
    </tr>

    <?php $no = 1; ?>
    <?php foreach ($riwayat as $row): ?>
        <tr>
            <td><?= $no++; ?></td>
            <td><?= $row['nama_kebiasaan']; ?></td>
            <td><?= $row['tanggal']; ?></td>
        </tr>
    <?php endforeach; ?>

</table>

<?php else: ?>
    <p>Tidak ada data riwayat</p>
<?php endif; ?>

</body>
</html>