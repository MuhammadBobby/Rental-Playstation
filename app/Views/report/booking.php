<?= $this->extend('report/template/template'); ?>

<?= $this->section('table'); ?>
<table>
  <tr>
    <th>No</th>
    <th>Member</th>
    <th>Staff</th>
    <th>Duration</th>
    <th>Type Playstation</th>
    <th>Booking Date Time</th>
    <th>Finish Date Time</th>
    <th>Total Price</th>
  </tr>

  <?php
  $num = 1;
  foreach ($booking as $bk) :
  ?>
    <tr>
      <td><?= $num++ ?></td>
      <td><?= $bk['NamaMember'] ?></td>
      <td><?= $bk['NamaStaff'] ?></td>
      <td><?= $bk['Durasi'] ?> Jam</td>
      <td><?= $bk['NamaBarang'] ?></td>
      <td><?= date_format(date_create($bk['TanggalPemesanan']), 'd-m-Y H:i'); ?></td>
      <td><?= date_format(date_create($bk['WaktuBerakhir']), 'd-m-Y H:i'); ?></td>
      <td>Rp. <?= $bk['TotalBiaya'] ?></td>
    </tr>
  <?php endforeach; ?>
</table>

<?= $this->endsection(); ?>