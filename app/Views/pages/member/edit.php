<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<div class="content-wrapper">
    <div class="page-header">
        <h3 class="page-title"> Form Edit Member </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Forms</a></li>
                <li class="breadcrumb-item active" aria-current="page">Form Edit Member</li>
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
                    <h4 class="card-title">Edit Member</h4>
                    <p class="card-description"> Form Edit Member </p>
                    <form class="forms-sample" action="/member/update/<?= $member['MemberID'] ?>" method="post">
                        <div class="form-group">
                            <label for="Nama">Name</label>
                            <input type="text" class="form-control" id="Nama" name="Nama" value="<?= old('Nama', $member['Nama']) ?>">
                        </div>
                        <div class="form-group">
                            <label for="Alamat">Address</label>
                            <input type="text" class="form-control" id="Alamat" name="Alamat" placeholder="Jl 123" value="<?= old('Alamat', $member['Alamat']) ?>">
                        </div>
                        <div class="form-group">
                            <label for="Telepon">Telephone</label>
                            <input type="text" class="form-control" id="Telepon" name="Telepon" value="<?= old('Telepon', $member['Telepon']) ?>">
                        </div>
                        <div class="form-group">
                            <label for="Email">Email</label>
                            <input type="text" class="form-control" id="Email" name="Email" value="<?= old('Email', $member['Email']) ?>">
                        </div>

                        <button type="submit" class="btn btn-primary mr-2">Submit</button>
                    </form>
                    <a href="/member" class="text-secondary text-primary">&laquo; Cancel Edit Member</a>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>