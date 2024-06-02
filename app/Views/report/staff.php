<?= $this->extend('report/template/template'); ?>

<?= $this->section('table'); ?>
<table>
    <tr>
        <th>No</th>
        <th>Name</th>
        <th>Shift</th>
    </tr>

    <?php
    $num = 1;
    foreach ($staffs as $staff) :
    ?>
        <tr>
            <td><?= $num++ ?></td>
            <td><?= $staff['Nama'] ?></td>
            <td><?= $staff['Shift'] ?></td>
        </tr>
    <?php endforeach; ?>
</table>

<?= $this->endsection(); ?>