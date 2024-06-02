<?= $this->extend('report/template/template'); ?>

<?= $this->section('table'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking Details</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <div class="container">
        <div class="card">
            <h5 class="card-title mt-1"><?= esc($pemesanan->NamaMember); ?></h5>
            <img src="/img/<?= esc($pemesanan->img); ?>" class="shadow" width="300" alt="image">
            <h6 class="card-subtitle mb-2 text-body-secondary">Staff: <?= esc($pemesanan->NamaStaff); ?></h6>

            <p class="card-subtitle mb-2 text-body-secondary">Detail:</p>
            <ul>
                <li>Status:<?= esc($pemesanan->StatusPemesanan); ?></li>
                <li>Game: <?= esc($pemesanan->NamaBarang); ?></li>
                <li>Start Time: <?= esc($pemesanan->TanggalPemesanan); ?></li>
                <li>End Time: <?= esc($pemesanan->WaktuBerakhir); ?></li>
                <li>Duration: <?= esc($pemesanan->Durasi); ?></li>
                <li>Total Price: Rp <?= number_format(esc($pemesanan->TotalBiaya), 0, ',', '.'); ?></li>
            </ul>
        </div>
    </div>
</body>

</html>

<script>
    window.print();
</script>


<?= $this->endsection(); ?>