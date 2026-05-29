<h2>Laporan Aktivitas</h2>

<table border="1">
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