<?php
header("Content-type: application/octet-stream");
header("Content-Disposition: attachment; filename=Data_Subyek.xls");
header("Pragma: no-cache");
header("Expires: 0");
?>

<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Data Subyek</title>
  </head>

  <body>
    <h4><center>Laporan Evaluasi</center></h4><br>

    <table>
      <tr>
        <td>Divisi</td>
        <td>: Pemasaran</td>
      </tr>
      <tr>
        <td>Admin</td>
        <td>: <?= $this->session->userdata('nama') ?></td>
      </tr>
      <tr>
        <td>Periode</td>
        <td>: <?= date('d M Y', strtotime($tgl_awal)).' s/d '.date('d M Y', strtotime($tgl_akhir)) ?></td>
      </tr>
    </table>
    <br><br>

    <table>
      <tr>
        <th>No</th>
        <th>Nama Pelatihan</th>
        <th>Tanggal</th>
        <th>Jumlah Peserta</th>
        <th>Ruangan</th>
      </tr>
      <?php
        $no = 1;
        foreach ($pelatihan as $key):
      ?>
        <tr>
          <td><?= $no++ ?></td>
          <td><?= $key->deskripsi_subyek ?></td>
          <td><?= date('d M Y', strtotime($key->tgl_mulai)).' s/d '.date('d M Y', strtotime($key->tgl_selesai)) ?></td>
          <td><?= $key->jml_peserta ?></td>
          <td><?= $key->kelas ?></td>
        </tr>
      <?php endforeach; ?>
    </table>
  </body>
</html>
