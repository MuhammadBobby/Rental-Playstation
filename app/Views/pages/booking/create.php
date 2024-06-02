<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<div class="content-wrapper">
    <div class="page-header">
        <h3 class="page-title"> Form Create Booking </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Forms</a></li>
                <li class="breadcrumb-item active" aria-current="page">Form Create Booking</li>
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
                    <h4 class="card-title">Create Booking</h4>
                    <p class="card-description"> Form Create Booking </p>
                    <form class="forms-sample" action="/booking/save" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="MemberID">Member</label>
                            <select class="form-control" name="MemberID" id="MemberID">
                                <option selected>-- Select Member --</option>
                                <?php foreach ($members as $member) : ?>
                                    <option value="<?= $member['MemberID'] ?>"><?= $member['Nama'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="PenjagaID">Staff</label>
                            <select class="form-control" name="PenjagaID" id="PenjagaID">
                                <option selected>-- Select Staff --</option>
                                <?php foreach ($staffs as $staff) : ?>
                                    <option value="<?= $staff['PenjagaID'] ?>"><?= $staff['Nama'] ?> - <?= $staff['Shift'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="Durasi">Hourly Duration</label>
                            <input type="number" name="Durasi" id="Durasi" class="form-control" min="1" value="1">
                        </div>
                        <div class="form-group">
                            <label for="gambar">Image</label>
                            <input type="file" name="gambar" id="gambar" class="form-control" required accept="image/*">
                        </div>
                        <div class="form-group">
                            <label for="JenisPS">Type</label>
                            <select class="form-control" name="JenisPS" id="JenisPS">
                                <option selected>-- Select Type Playstation --</option>
                                <?php foreach ($inventaris as $invent) : ?>
                                    <option value="<?= $invent['BarangID'] ?>"><?= $invent['NamaBarang'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <button type="submit" class="btn btn-primary mr-2">Submit</button>
                    </form>
                    <a href="/booking" class="text-secondary text-primary">&laquo; Cancel Create Booking</a>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>