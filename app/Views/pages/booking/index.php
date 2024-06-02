<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<?php
$session = \Config\Services::session();
?>

<div class="content-wrapper">
    <div class="page-header">
        <h3 class="page-title"> Booking Transaction Tables </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Transaction</a></li>
                <li class="breadcrumb-item active" aria-current="page">Booking Transaction Tables</li>
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
                    <a href="/booking/create" class="btn btn-success">Add Data</a>
                    <a href="/report/booking" target="_blank" class="btn btn-primary">Print PDF</a>
                    <a href="/report/reportExcel" target="_blank" class="btn btn-success">Print Excel</a>
                    <table class="table text-center">
                        <thead>
                            <tr>
                                <th class="col-1">No.</th>
                                <th>Member</th>
                                <th>Staff</th>
                                <th>Playstation</th>
                                <th>Finish Time</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $num = 1;
                            foreach ($booking as $bk) :
                            ?>
                                <tr>
                                    <td><?= $num++ ?></td>
                                    <td><?= $bk['NamaMember'] ?></td>
                                    <td><?= $bk['NamaStaff'] ?></td>
                                    <td><?= $bk['NamaBarang'] ?></td>
                                    <td class="text-primary"><?= date_format(date_create($bk['WaktuBerakhir']), 'H:i'); ?> WIB</td>
                                    <td><label class="badge <?= $bk['StatusPemesanan'] === 'Selesai' ? 'badge-success' : 'badge-danger' ?>"><?= $bk['StatusPemesanan'] ?></label></td>
                                    <td>
                                        <a href="/booking/show/<?= $bk['PemesananID'] ?>" class="btn-sm btn-warning">Detail</a>
                                        <a href="/booking/reportID/<?= $bk['PemesananID'] ?>" class="btn-sm btn-primary" target="_blank">Report PDF</a>
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