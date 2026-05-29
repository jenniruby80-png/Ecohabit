<h2>Daftar Kebiasaan</h2>

<a href="index.php?url=tambah_kebiasaan">Tambah Kebiasaan</a>

<table border="1">
    <tr>
        <th>No</th>
        <th>Nama Kebiasaan</th>
        <th>Aksi</th>
    </tr>

    <?php $no = 1; ?>
    <?php foreach ($kebiasaan as $k) : ?>
    <tr>
        <td><?= $no++; ?></td>
        <td><?= $k['nama_kebiasaan']; ?></td>
        <td>
            <a href="index.php?url=hapus_kebiasaan&id=<?= $k['id']; ?>">Hapus</a>
        </td>
    </tr>
    <?php endforeach; ?>
</table>