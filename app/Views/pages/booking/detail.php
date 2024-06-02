<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<div class="container m-5">
    <div class="">
        <h5 class="card-title"><?= esc($pemesanan->NamaMember); ?></h5>
        <h6 class="card-subtitle mb-2 text-body-secondary">Staff : <?= esc($pemesanan->NamaStaff); ?></h6>
        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>

        <p class="card-subtitle mb-2 text-body-secondary">Detail : </p>
        <ul>
            <li>Status : <?= esc($pemesanan->StatusPemesanan); ?></li>
            <li>Game : <?= esc($pemesanan->NamaBarang); ?></li>
            <li>Start Time : <?= esc($pemesanan->TanggalPemesanan); ?></li>
            <li>End Time : <?= esc($pemesanan->WaktuBerakhir); ?></li>
            <li>Duration : <?= esc($pemesanan->Durasi); ?></li>
            <li>Total Price : Rp <?= number_format(esc($pemesanan->TotalBiaya), 0, ',', '.'); ?></li>
        </ul>

        <a href="/booking" class="btn btn-primary my-2">Back to list</a>

        <?php if ($pemesanan->StatusPemesanan === 'Berjalan') : ?>
            <a href="/booking/finish/<?= esc($pemesanan->PemesananID) ?>/<?= esc($pemesanan->JenisPS) ?>" class="btn btn-success my-2" onclick="return confirm('Are you sure Finish the Game?')">Finish the Game</a>
        <?php endif; ?>

        <a href="/booking/delete/<?= esc($pemesanan->PemesananID); ?>" class="btn btn-danger my-2">Delete</a>
    </div>
</div>

<?= $this->endSection(); ?>