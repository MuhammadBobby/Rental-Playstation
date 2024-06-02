<?= $this->extend('report/template/template'); ?>

<?= $this->section('table'); ?>
<table>
    <tr>
        <th>No</th>
        <th>Name</th>
        <th>Type</th>
        <th>Status</th>
        <th>Hourly Price</th>
    </tr>

    <?php
    $num = 1;
    foreach ($inventaris as $invent) :
    ?>
        <tr>
            <td><?= $num++ ?></td>
            <td><?= $invent['NamaBarang'] ?></td>
            <td><?= $invent['Jenis'] ?></td>
            <td><?= $invent['Status'] ?></td>
            <td><?= $invent['HargaPerJam'] ?></td>
        </tr>
    <?php endforeach; ?>
</table>

<?= $this->endsection(); ?>