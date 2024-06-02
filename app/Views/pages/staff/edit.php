<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<div class="content-wrapper">
    <div class="page-header">
        <h3 class="page-title"> Form Edit Staff </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Forms</a></li>
                <li class="breadcrumb-item active" aria-current="page">Form Edit Staff</li>
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
                    <h4 class="card-title">Edit Staff</h4>
                    <p class="card-description"> Form Edit Staff </p>
                    <form class="forms-sample" action="/staff/update/<?= $staff['PenjagaID'] ?>" method="post">
                        <div class="form-group">
                            <label for="Nama">Name</label>
                            <input type="text" class="form-control" id="Nama" name="Nama" value="<?= old('Nama', $staff['Nama']) ?>">
                        </div>
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" class="form-control" id="username" name="username" value="<?= old('username', $staff['username']) ?>">
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" id="password" name="password" value="<?= old('password', $staff['password']) ?>">
                        </div>


                        <div class="form-group">
                            <label for="Shift">Shift</label>
                            <select class="form-control" name="Shift" id="Shift">
                                <?php
                                // Contoh array untuk nilai enum
                                $shiftOptions = ["siang", "malam"];
                                $defaultShift = $staff['Shift'];
                                ?>
                                <?php foreach ($shiftOptions as $option) : ?>
                                    <?php if ($option == $defaultShift) : ?>
                                        <option value="<?= esc($option) ?>" selected><?= esc($option) ?></option>
                                    <?php else : ?>
                                        <option value="<?= esc($option) ?>"><?= esc($option) ?></option>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="level">Level</label>
                            <select class="form-control" name="level" id="level">
                                <option value="<?= $staff['level'] ?> ?>" selected><?= $staff['level'] ?></option>
                                <option value="1">Pimpinan</option>
                                <option value="2">Admin & Staff</option>
                            </select>
                        </div>

                        <button type="submit" class="btn btn-primary mr-2">Submit</button>
                    </form>
                    <a href="/staff" class="text-secondary text-primary">&laquo; Cancel Edit Staff</a>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>