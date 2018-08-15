<?php
header("Content-type: application/octet-stream");
header("Content-Disposition: attachment; filename=Data_Evaluasi.xls");
header("Pragma: no-cache");
header("Expires: 0");
$no = 1;
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <h4>PROGRAM PENGEMBANGAN EKSEKUTIF</h4>
    <h4>EVALUASI AKHIR</h4><br>

<?php foreach ($penilaian as $key): ?>
  <table>
    <tr>
      <td>Judul Subyek</td>
      <td><?= $key->deskripsi_subyek ?></td>
    </tr>
    <tr>
      <td>Tanggal</td>
      <td><?= date('d M Y', strtotime($key->tgl_mulai)).' - '.date('d M Y', strtotime($key->tgl_selesai)) ?></td>
    </tr>
    <tr>
      <td>Dosen</td>
      <td><?= $key->nama ?></td>
    </tr>
    <tr>
      <td>Kelas</td>
      <td><?= $key->kelas ?></td>
    </tr>
    <tr>
      <td>Sesi</td>
      <td><?= $key->deskripsi_sesi ?></td>
    </tr>
  </table>
<?php endforeach; ?>

<br><br>

<table>
  <tr>
    <td rowspan="2" align="center" valign="middle">No</td>
    <td rowspan="2" align="center" valign="middle">Aspek</td>
    <td colspan="10" align="center" valign="middle">Pelatihan</td>
    <td rowspan="2" align="center" valign="middle">Rate</td>
    <td rowspan="2" align="center" valign="middle">%</td>
  </tr>
  <tr>
    <td colspan="2" align="center" valign="middle">Sangat Setuju</td>
    <td colspan="2" align="center" valign="middle">Setuju</td>
    <td colspan="2" align="center" valign="middle">Netral</td>
    <td colspan="2" align="center" valign="middle">Tidak Setuju</td>
    <td colspan="2" align="center" valign="middle">Sangat Tidak Setuju</td>
  </tr>
  <tr>
    <td>1</td>
    <td>Pelatihan ini bermanfaat bagi saya</td>
    <td><?= $key->aspek1_1 ?></td>
    <td><?= ($key->aspek1_1/$key->jml_responden)*100 ?></td>
    <td><?= $key->aspek1_2 ?></td>
    <td><?= ($key->aspek1_2/$key->jml_responden)*100 ?></td>
    <td><?= $key->aspek1_3 ?></td>
    <td><?= ($key->aspek1_3/$key->jml_responden)*100 ?></td>
    <td><?= $key->aspek1_4 ?></td>
    <td><?= ($key->aspek1_4/$key->jml_responden)*100 ?></td>
    <td><?= $key->aspek1_5 ?></td>
    <td><?= ($key->aspek1_5/$key->jml_responden)*100 ?></td>
    <td><?= (($key->aspek1_1*5)+($key->aspek1_2*4)+($key->aspek1_3*3)+($key->aspek1_4*2)+($key->aspek1_5*1))/$key->jml_peserta ?></td>
    <td align="right">100%</td>
  </tr>
  <tr>
    <td>2</td>
    <td>Instruktur menyampaikan materi dengan jelas</td>
    <td><?= $key->aspek2_1 ?></td>
    <td><?= ($key->aspek2_1/$key->jml_responden)*100 ?></td>
    <td><?= $key->aspek2_2 ?></td>
    <td><?= ($key->aspek2_2/$key->jml_responden)*100 ?></td>
    <td><?= $key->aspek2_3 ?></td>
    <td><?= ($key->aspek2_3/$key->jml_responden)*100 ?></td>
    <td><?= $key->aspek2_4 ?></td>
    <td><?= ($key->aspek2_4/$key->jml_responden)*100 ?></td>
    <td><?= $key->aspek2_5 ?></td>
    <td><?= ($key->aspek2_5/$key->jml_responden)*100 ?></td>
    <td><?= (($key->aspek2_1*5)+($key->aspek2_2*4)+($key->aspek2_3*3)+($key->aspek2_4*2)+($key->aspek2_5*1))/$key->jml_peserta ?></td>
    <td align="right">100%</td>
  </tr>
  <tr>
    <td>3</td>
    <td>Metode Pengajaran yang digunakan Menarik</td>
    <td><?= $key->aspek3_1 ?></td>
    <td><?= ($key->aspek3_1/$key->jml_responden)*100 ?></td>
    <td><?= $key->aspek3_2 ?></td>
    <td><?= ($key->aspek3_2/$key->jml_responden)*100 ?></td>
    <td><?= $key->aspek3_3 ?></td>
    <td><?= ($key->aspek3_3/$key->jml_responden)*100 ?></td>
    <td><?= $key->aspek3_4 ?></td>
    <td><?= ($key->aspek3_4/$key->jml_responden)*100 ?></td>
    <td><?= $key->aspek3_5 ?></td>
    <td><?= ($key->aspek3_5/$key->jml_responden)*100 ?></td>
    <td><?= (($key->aspek3_1*5)+($key->aspek3_2*4)+($key->aspek3_3*3)+($key->aspek3_4*2)+($key->aspek3_5*1))/$key->jml_peserta ?></td>
    <td align="right">100%</td>
  </tr>
  <tr>
    <td>4</td>
    <td>Kombinasi teori dan latihan seimbang</td>
    <td><?= $key->aspek4_1 ?></td>
    <td><?= ($key->aspek4_1/$key->jml_responden)*100 ?></td>
    <td><?= $key->aspek4_2 ?></td>
    <td><?= ($key->aspek4_2/$key->jml_responden)*100 ?></td>
    <td><?= $key->aspek4_3 ?></td>
    <td><?= ($key->aspek4_3/$key->jml_responden)*100 ?></td>
    <td><?= $key->aspek4_4 ?></td>
    <td><?= ($key->aspek4_4/$key->jml_responden)*100 ?></td>
    <td><?= $key->aspek4_5 ?></td>
    <td><?= ($key->aspek4_5/$key->jml_responden)*100 ?></td>
    <td><?= (($key->aspek4_1*5)+($key->aspek4_2*4)+($key->aspek4_3*3)+($key->aspek4_4*2)+($key->aspek4_5*1))/$key->jml_peserta ?></td>
    <td align="right">100%</td>
  </tr>
  <tr>
    <td>5</td>
    <td>Jumlah subyek sesuai dengan kebutuhan</td>
    <td><?= $key->aspek5_1 ?></td>
    <td><?= ($key->aspek5_1/$key->jml_responden)*100 ?></td>
    <td><?= $key->aspek5_2 ?></td>
    <td><?= ($key->aspek5_2/$key->jml_responden)*100 ?></td>
    <td><?= $key->aspek5_3 ?></td>
    <td><?= ($key->aspek5_3/$key->jml_responden)*100 ?></td>
    <td><?= $key->aspek5_4 ?></td>
    <td><?= ($key->aspek5_4/$key->jml_responden)*100 ?></td>
    <td><?= $key->aspek5_5 ?></td>
    <td><?= ($key->aspek5_5/$key->jml_responden)*100 ?></td>
    <td><?= (($key->aspek5_1*5)+($key->aspek5_2*4)+($key->aspek5_3*3)+($key->aspek5_4*2)+($key->aspek5_5*1))/$key->jml_peserta ?></td>
    <td align="right">100%</td>
  </tr>
  <tr>
    <td>6</td>
    <td>Bahan bacaan membantu proses belajar</td>
    <td><?= $key->aspek6_1 ?></td>
    <td><?= ($key->aspek6_1/$key->jml_responden)*100 ?></td>
    <td><?= $key->aspek6_2 ?></td>
    <td><?= ($key->aspek6_2/$key->jml_responden)*100 ?></td>
    <td><?= $key->aspek6_3 ?></td>
    <td><?= ($key->aspek6_3/$key->jml_responden)*100 ?></td>
    <td><?= $key->aspek6_4 ?></td>
    <td><?= ($key->aspek6_4/$key->jml_responden)*100 ?></td>
    <td><?= $key->aspek6_5 ?></td>
    <td><?= ($key->aspek6_5/$key->jml_responden)*100 ?></td>
    <td><?= (($key->aspek6_1*5)+($key->aspek6_2*4)+($key->aspek6_3*3)+($key->aspek6_4*2)+($key->aspek6_5*1))/$key->jml_peserta ?></td>
    <td align="right">100%</td>
  </tr>
  <tr>
    <td>7</td>
    <td>Fasilitas mengajar membantu (peralatan dan ruangan)</td>
    <td><?= $key->aspek7_1 ?></td>
    <td><?= ($key->aspek7_1/$key->jml_responden)*100 ?></td>
    <td><?= $key->aspek7_2 ?></td>
    <td><?= ($key->aspek7_2/$key->jml_responden)*100 ?></td>
    <td><?= $key->aspek7_3 ?></td>
    <td><?= ($key->aspek7_3/$key->jml_responden)*100 ?></td>
    <td><?= $key->aspek7_4 ?></td>
    <td><?= ($key->aspek7_4/$key->jml_responden)*100 ?></td>
    <td><?= $key->aspek7_5 ?></td>
    <td><?= ($key->aspek7_5/$key->jml_responden)*100 ?></td>
    <td><?= (($key->aspek7_1*5)+($key->aspek7_2*4)+($key->aspek7_3*3)+($key->aspek7_4*2)+($key->aspek7_5*1))/$key->jml_peserta ?></td>
    <td align="right">100%</td>
  </tr>
  <tr>
    <td>8</td>
    <td>Partisipasi peserta lain sesuai harapan saya</td>
    <td><?= $key->aspek8_1 ?></td>
    <td><?= ($key->aspek8_1/$key->jml_responden)*100 ?></td>
    <td><?= $key->aspek8_2 ?></td>
    <td><?= ($key->aspek8_2/$key->jml_responden)*100 ?></td>
    <td><?= $key->aspek8_3 ?></td>
    <td><?= ($key->aspek8_3/$key->jml_responden)*100 ?></td>
    <td><?= $key->aspek8_4 ?></td>
    <td><?= ($key->aspek8_4/$key->jml_responden)*100 ?></td>
    <td><?= $key->aspek8_5 ?></td>
    <td><?= ($key->aspek8_5/$key->jml_responden)*100 ?></td>
    <td><?= (($key->aspek8_1*5)+($key->aspek8_2*4)+($key->aspek8_3*3)+($key->aspek8_4*2)+($key->aspek8_5*1))/$key->jml_peserta ?></td>
    <td align="right">100%</td>
  </tr>
  <tr>
    <td>9</td>
    <td>Pelayanan lainnya baik (misal: parkir, customer service)</td>
    <td><?= $key->aspek9_1 ?></td>
    <td><?= ($key->aspek9_1/$key->jml_responden)*100 ?></td>
    <td><?= $key->aspek9_2 ?></td>
    <td><?= ($key->aspek9_2/$key->jml_responden)*100 ?></td>
    <td><?= $key->aspek9_3 ?></td>
    <td><?= ($key->aspek9_3/$key->jml_responden)*100 ?></td>
    <td><?= $key->aspek9_4 ?></td>
    <td><?= ($key->aspek9_4/$key->jml_responden)*100 ?></td>
    <td><?= $key->aspek9_5 ?></td>
    <td><?= ($key->aspek9_5/$key->jml_responden)*100 ?></td>
    <td><?= (($key->aspek9_1*5)+($key->aspek9_2*4)+($key->aspek9_3*3)+($key->aspek9_4*2)+($key->aspek9_5*1))/$key->jml_peserta ?></td>
    <td align="right">100%</td>
  </tr>
  <tr>
    <td>10</td>
    <td>Secara keseluruhan saya puas</td>
    <td><?= $key->aspek10_1 ?></td>
    <td><?= ($key->aspek10_1/$key->jml_responden)*100 ?></td>
    <td><?= $key->aspek10_2 ?></td>
    <td><?= ($key->aspek10_2/$key->jml_responden)*100 ?></td>
    <td><?= $key->aspek10_3 ?></td>
    <td><?= ($key->aspek10_3/$key->jml_responden)*100 ?></td>
    <td><?= $key->aspek10_4 ?></td>
    <td><?= ($key->aspek10_4/$key->jml_responden)*100 ?></td>
    <td><?= $key->aspek10_5 ?></td>
    <td><?= ($key->aspek10_5/$key->jml_responden)*100 ?></td>
    <td><?= (($key->aspek10_1*5)+($key->aspek10_2*4)+($key->aspek10_3*3)+($key->aspek10_4*2)+($key->aspek10_5*1))/$key->jml_peserta ?></td>
    <td align="right">100%</td>
  </tr>
</table><br><br>

<h4><b>Saran dan Komentar</b></h4>
<table>
  <?php foreach ($komentar as $key2): ?>
    <tr>
      <td>- <?= $key2->komentar; ?></td>
    </tr>
  <?php endforeach; ?>
</table>


  </body>
</html>
