<?= $this->extend('report/template/template'); ?>

<?= $this->section('table'); ?>
<table>
    <tr>
        <th>No</th>
        <th>Name</th>
        <th>Address</th>
        <th>Telephone</th>
        <th>Email</th>
    </tr>

    <?php
    $num = 1;
    foreach ($members as $member) :
    ?>
        <tr>
            <td><?= $num++ ?></td>
            <td><?= $member['Nama'] ?></td>
            <td><?= $member['Alamat'] ?></td>
            <td><?= $member['Telepon'] ?></td>
            <td><?= $member['Email'] ?></td>
        </tr>
    <?php endforeach; ?>
</table>

<?= $this->endsection(); ?>