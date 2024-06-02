<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<div class="content-wrapper">
    <div class="page-header">
        <h3 class="page-title"> Form Edit Inventaris </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Form</a></li>
                <li class="breadcrumb-item active" aria-current="page">Form Edit Inventaris</li>
            </ol>
        </nav>
    </div>

    <!-- error data -->
    <?php if (session('validation')) : ?>
        <div class="alert alert-danger alert-dismissible">
            <a href="#" class="close text-decoration-none" data-dismiss="alert" aria-label="close">X</a>
            <ul>
                <?php foreach (session('validation')->getErrors() as $error) : ?>
                    <li><?= esc($error) ?></li>
                <?php endforeach ?>
            </ul>
        </div>
    <?php endif ?>
    <!-- error data -->

    <div class="row">
        <div class="col grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Edit Inventaris</h4>
                    <p class="card-description"> Form Edit Inventaris </p>
                    <form class="forms-sample" action="/inventaris/update/<?= $invent['BarangID'] ?>" method="post">
                        <!-- status lama -->
                        <input type="hidden" name="Status" value='<?= $invent['Status'] ?>'>

                        <div class="form-group">
                            <label for="NamaBarang">Name</label>
                            <input type="text" class="form-control" id="NamaBarang" name="NamaBarang" value="<?= old('NamaBarang', $invent['NamaBarang']) ?>">
                        </div>
                        <div class="form-group">
                            <label for="Jenis">Type</label>
                            <select class="form-control" name="Jenis" id="Jenis">

                                <?php
                                // Contoh array untuk nilai enum
                                // Asumsikan $invent['Jenis'] telah berisi nilai bawaan
                                $jenisOptions = ["PS5", "PS4", "PS3"];
                                $defaultJenis = $invent['Jenis'];
                                ?>
                                <?php foreach ($jenisOptions as $option) : ?>
                                    <?php if ($option == $defaultJenis) : ?>
                                        <option value="<?= esc($option) ?>" selected><?= esc($option) ?></option>
                                    <?php else : ?>
                                        <option value="<?= esc($option) ?>"><?= esc($option) ?></option>
                                    <?php endif; ?>
                                <?php endforeach; ?>

                            </select>
                        </div>
                        <div class="form-group">
                            <label for="HargaPerJam">hourly price</label>
                            <input type="number" class="form-control" id="HargaPerJam" name="HargaPerJam" value="<?= old('HargaPerJam', $invent['HargaPerJam']) ?>">
                        </div>

                        <button type="submit" class="btn btn-primary mr-2">Submit</button>
                    </form>
                    <a href="/inventaris" class="text-secondary text-primary">&laquo; Cancel Edit Inventaris</a>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>