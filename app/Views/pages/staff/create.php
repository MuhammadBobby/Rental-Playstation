<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<div class="content-wrapper">
    <div class="page-header">
        <h3 class="page-title"> Form Create Staff </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Forms</a></li>
                <li class="breadcrumb-item active" aria-current="page">Form Create Staff</li>
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
                    <h4 class="card-title">Create Staff</h4>
                    <p class="card-description"> Form Create Staff </p>
                    <form class="forms-sample" action="/staff/save" method="post">
                        <div class="form-group">
                            <label for="Nama">Name</label>
                            <input type="text" class="form-control" id="Nama" name="Nama" placeholder="Jhon Doe">
                        </div>
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" class="form-control" id="username" name="username" placeholder="JhonDoe1">
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" id="password" name="password" placeholder="xxxxxx">
                        </div>
                        <div class="form-group">
                            <label for="password2"> Confirm Password</label>
                            <input type="password" class="form-control" id="password2" name="password2" placeholder="xxxxxx">
                        </div>

                        <div class="form-group">
                            <label for="Shift">Shift</label>
                            <select class="form-control" name="Shift" id="Shift">
                                <option selected>-- Select Shift --</option>
                                <option value="siang">Siang</option>
                                <option value="malam">Malam</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="level">Level</label>
                            <select name="level" id="level" class="form-control">
                                <option selected>-- Select Level -- </option>
                                <option value="1">Pemilik</option>
                                <option value="2">Admin & Staff</option>
                            </select>
                        </div>

                        <button type="submit" class="btn btn-primary mr-2">Submit</button>
                    </form>
                    <a href="/staff" class="text-secondary text-primary">&laquo; Cancel Create Staff</a>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>