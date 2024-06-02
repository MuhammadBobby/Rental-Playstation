<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<div class="content-wrapper">
    <div class="page-header">
        <h3 class="page-title"> Form Create Inventaris </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Forms</a></li>
                <li class="breadcrumb-item active" aria-current="page">Form Create Inventaris</li>
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
                    <h4 class="card-title">Create Inventaris</h4>
                    <p class="card-description"> Form Create Inventaris </p>
                    <form class="forms-sample" action="/inventaris/save" method="post">
                        <div class="form-group">
                            <label for="NamaBarang">Name</label>
                            <input type="text" class="form-control" id="NamaBarang" name="NamaBarang" placeholder="Name">
                        </div>
                        <div class="form-group">
                            <label for="Jenis">Type</label>
                            <select class="form-control" name="Jenis" id="Jenis">
                                <option selected>-- Select Type --</option>
                                <option value="PS5">PS5</option>
                                <option value="PS4">PS4</option>
                                <option value="PS3">PS3</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="HargaPerJam">hourly price</label>
                            <input type="number" class="form-control" id="HargaPerJam" name="HargaPerJam" placeholder="1xxxxxx">
                        </div>

                        <button type="submit" class="btn btn-primary mr-2">Submit</button>
                    </form>
                    <a href="/inventaris" class="text-secondary text-primary">&laquo; Cancel Create Inventaris</a>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>