<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<?php
$session = \Config\Services::session();
?>

<div class="content-wrapper">
    <div class="page-header">
        <h3 class="page-title"> Staff Data Tables </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Data Tables</a></li>
                <li class="breadcrumb-item active" aria-current="page">Staff Data Tables</li>
            </ol>
        </nav>
    </div>


    <!-- notif flSH DATA -->
    <?php if (session()->getFlashdata('pesan')) : ?>
        <div class="alert alert-success text-center fw-bolder fs-4" role="alert">
            <?= session()->getFlashdata('pesan') ?>
        </div>
    <?php endif; ?>

    <div class="row">
        <div class="col grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <a href="/staff/create" class="btn btn-success">Add Data</a>
                    <a href="/report/staff" target="_blank" class="btn btn-primary">Print PDF</a>
                    <table class="table text-center">
                        <thead>
                            <tr>
                                <th class="col-1">No.</th>
                                <th>Name</th>
                                <th>Username</th>
                                <th>Shift</th>
                                <th>Level</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $num = 1;
                            foreach ($staff as $st) :
                            ?>
                                <tr>
                                    <td><?= $num++ ?></td>
                                    <td><?= $st['Nama'] ?></td>
                                    <td><?= $st['username'] ?></td>
                                    <td><label class="badge <?= $st['Shift'] === 'siang' ? 'badge-light' : 'badge-dark' ?>"><?= $st['Shift'] ?></label></td>
                                    <td><?= $st['level'] ?></td>
                                    <td>
                                        <a href="/staff/edit/<?= $st['PenjagaID'] ?>" class="btn-sm btn-warning">Edit</a>
                                        <a href="/staff/delete/<?= $st['PenjagaID'] ?>" class="btn-sm btn-danger" onclick="return confirm('Are you sure delete this item?')">Delete</a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>