<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<?php
$session = \Config\Services::session();
?>

<div class="content-wrapper">
    <div class="page-header">
        <h3 class="page-title"> Inventaris Data Tables </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Data Tables</a></li>
                <li class="breadcrumb-item active" aria-current="page">Inventaris Data Tables</li>
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
                    <a href="/inventaris/create" class="btn btn-success">Add Data</a>
                    <a href="/report/inventaris" target="_blank" class="btn btn-primary">Print PDF</a>
                    <table class="table text-center">
                        <thead>
                            <tr>
                                <th class="col-1">No.</th>
                                <th>Name</th>
                                <th>Type</th>
                                <th>Hourly Price</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $num = 1;
                            foreach ($invent as $in) :
                            ?>
                                <tr>
                                    <td><?= $num++ ?></td>
                                    <td><?= $in['NamaBarang'] ?></td>
                                    <td><?= $in['Jenis'] ?></td>
                                    <td>Rp <?= number_format($in['HargaPerJam'], 0, ',', '.') ?></td>
                                    <td><label class="badge <?= $in['Status'] === 'tersedia' ? 'badge-success' : 'badge-danger' ?>"><?= $in['Status'] ?></label></td>
                                    <td>
                                        <a href="/inventaris/edit/<?= $in['BarangID'] ?>" class="btn-sm btn-warning">Edit</a>
                                        <a href="/inventaris/delete/<?= $in['BarangID'] ?>" class="btn-sm btn-danger" onclick="return confirm('Are you sure delete this item?')">Delete</a>
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