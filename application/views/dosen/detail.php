<div class="content-header row">
  <div class="content-header-left col-md-6 col-xs-12 mb-1">
    <h2 class="content-header-title">Detail</h2>
  </div>
  <div class="content-header-right breadcrumbs-right breadcrumbs-top col-md-6 col-xs-12">
    <div class="breadcrumb-wrapper col-xs-12">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#/evaluasi">Evaluasi</a>
        </li>
        <li class="breadcrumb-item active">Detail <?= $sesi ?>
        </li>
      </ol>
    </div>
  </div>
</div>

<div class="content-body">
  <div class="row">
    <div class="col-md-6">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">Sesi</h4>
        </div>
        <div class="card-body">
          <div class="list-group">
            <a class="list-group-item list-group-item-action">
              <h5 class="list-group-item-heading">Judul Subyek</h5>
              <p class="list-group-item-text text-muted" id="nama_pelatihan"></p>
            </a>
            <a class="list-group-item list-group-item-action">
              <h5 class="list-group-item-heading">Tanggal</h5>
              <p class="list-group-item-text text-muted" id="periode"></p>
            </a>
            <a class="list-group-item list-group-item-action">
              <h5 class="list-group-item-heading">Dosen</h5>
              <p class="list-group-item-text text-muted" id="dosen"></p>
            </a>
            <a class="list-group-item list-group-item-action">
              <h5 class="list-group-item-heading">Ruangan</h5>
              <p class="list-group-item-text text-muted" id="ruangan"></p>
            </a>
            <a class="list-group-item list-group-item-action">
              <h5 class="list-group-item-heading">Sesi</h5>
              <p class="list-group-item-text text-muted" id="nama_sesi"></p>
            </a>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-6">
      <div class="card">
                <div class="card-body">
                    <div class="card-block">
                        <div class="media">
                            <div class="media-body text-xs-left">
                                <h3 class="teal" id="jml_peserta"></h3>
                                <span>Jumlah Peserta</span>
                            </div>
                            <div class="media-right media-middle">
                                <i class="icon-user1 teal font-large-2 float-xs-right"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-body">
                    <div class="card-block">
                        <div class="media">
                            <div class="media-body text-xs-left">
                                <h3 class="pink" id="jml_responden"></h3>
                                <span>Jumlah Responden</span>
                            </div>
                            <div class="media-right media-middle">
                                <i class="icon-user1 pink font-large-2 float-xs-right"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

      <div class="card">
                <div class="card-body">
                    <div class="card-block">
                        <div class="media">
                            <div class="media-body text-xs-left">
                                <h3 class="teal" id="responden-rate"></h3>
                                <span>Responden Rate</span>
                            </div>
                            <div class="media-right media-middle">
                                <i class="icon-trending_up teal font-large-2 float-xs-right"></i>
                            </div>
                            <progress class="progress progress-sm progress-teal mt-1 mb-0" id="progress-rate" value="" max=""></progress>
                        </div>
                    </div>
                </div>
            </div>
    </div>
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">Penilaian</h4>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="t_penilaian" style="font-size: 10px;">
              <thead class="thead-inverse">
                <tr>
                  <th rowspan="2" style="text-align: center; padding-bottom: 25px;">No</th>
                  <th rowspan="2" style="text-align: center; padding-bottom: 25px;">Aspek</th>
                  <th colspan="10" style="text-align: center;">Penilaian</th>
                  <th rowspan="2" style="text-align: center; padding-bottom: 25px;">Rata-rata</th>
                  <th rowspan="2" style="text-align: center; padding-bottom: 25px;">%</th>
                </tr>
                <tr>
                  <th colspan="2" style="text-align: center;">Sangat Setuju</th>
                  <th colspan="2" style="text-align: center;">Setuju</th>
                  <th colspan="2" style="text-align: center;">Netral</th>
                  <th colspan="2" style="text-align: center;">Tidak Setuju</th>
                  <th colspan="2" style="text-align: center;">Sangat Tidak Setuju</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>1</td>
                  <td>Pelatihan ini bermanfaat bagi saya</td>
                  <td id="aspek1_1"></td>
                  <td id="rate1_1"></td>
                  <td id="aspek1_2"></td>
                  <td id="rate1_2"></td>
                  <td id="aspek1_3"></td>
                  <td id="rate1_3"></td>
                  <td id="aspek1_4"></td>
                  <td id="rate1_4"></td>
                  <td id="aspek1_5"></td>
                  <td id="rate1_5"></td>
                  <td id="rate1"></td>
                  <td class="percent"></td>
                </tr>
                <tr>
                  <td>2</td>
                  <td>Instruktur menyampaikan materi dengan jelas</td>
                  <td id="aspek2_1"></td>
                  <td id="rate2_1"></td>
                  <td id="aspek2_2"></td>
                  <td id="rate2_2"></td>
                  <td id="aspek2_3"></td>
                  <td id="rate2_3"></td>
                  <td id="aspek2_4"></td>
                  <td id="rate2_4"></td>
                  <td id="aspek2_5"></td>
                  <td id="rate2_5"></td>
                  <td id="rate2"></td>
                  <td class="percent"></td>
                </tr>
                <tr>
                  <td>3</td>
                  <td>Metode Pengajaran yang digunakan Menarik</td>
                  <td id="aspek3_1"></td>
                  <td id="rate3_1"></td>
                  <td id="aspek3_2"></td>
                  <td id="rate3_2"></td>
                  <td id="aspek3_3"></td>
                  <td id="rate3_3"></td>
                  <td id="aspek3_4"></td>
                  <td id="rate3_4"></td>
                  <td id="aspek3_5"></td>
                  <td id="rate3_5"></td>
                  <td id="rate3"></td>
                  <td class="percent"></td>
                </tr>
                <tr>
                  <td>4</td>
                  <td>Kombinasi teori dan latihan seimbang</td>
                  <td id="aspek4_1"></td>
                  <td id="rate4_1"></td>
                  <td id="aspek4_2"></td>
                  <td id="rate4_2"></td>
                  <td id="aspek4_3"></td>
                  <td id="rate4_3"></td>
                  <td id="aspek4_4"></td>
                  <td id="rate4_4"></td>
                  <td id="aspek4_5"></td>
                  <td id="rate4_5"></td>
                  <td id="rate4"></td>
                  <td class="percent"></td>
                </tr>
                <tr>
                  <td>5</td>
                  <td>Jumlah subyek sesuai dengan kebutuhan</td>
                  <td id="aspek5_1"></td>
                  <td id="rate5_1"></td>
                  <td id="aspek5_2"></td>
                  <td id="rate5_2"></td>
                  <td id="aspek5_3"></td>
                  <td id="rate5_3"></td>
                  <td id="aspek5_4"></td>
                  <td id="rate5_4"></td>
                  <td id="aspek5_5"></td>
                  <td id="rate5_5"></td>
                  <td id="rate5"></td>
                  <td class="percent"></td>
                </tr>
                <tr>
                  <td>6</td>
                  <td>Bahan bacaan membantu proses belajar</td>
                  <td id="aspek6_1"></td>
                  <td id="rate6_1"></td>
                  <td id="aspek6_2"></td>
                  <td id="rate6_2"></td>
                  <td id="aspek6_3"></td>
                  <td id="rate6_3"></td>
                  <td id="aspek6_4"></td>
                  <td id="rate6_4"></td>
                  <td id="aspek6_5"></td>
                  <td id="rate6_5"></td>
                  <td id="rate6"></td>
                  <td class="percent"></td>
                </tr>
                <tr>
                  <td>7</td>
                  <td>Fasilitas mengajar membantu (peralatan dan ruangan)</td>
                  <td id="aspek7_1"></td>
                  <td id="rate7_1"></td>
                  <td id="aspek7_2"></td>
                  <td id="rate7_2"></td>
                  <td id="aspek7_3"></td>
                  <td id="rate7_3"></td>
                  <td id="aspek7_4"></td>
                  <td id="rate7_4"></td>
                  <td id="aspek7_5"></td>
                  <td id="rate7_5"></td>
                  <td id="rate7"></td>
                  <td class="percent"></td>
                </tr>
                <tr>
                  <td>8</td>
                  <td>Partisipasi peserta lain sesuai harapan saya</td>
                  <td id="aspek8_1"></td>
                  <td id="rate8_1"></td>
                  <td id="aspek8_2"></td>
                  <td id="rate8_2"></td>
                  <td id="aspek8_3"></td>
                  <td id="rate8_3"></td>
                  <td id="aspek8_4"></td>
                  <td id="rate8_4"></td>
                  <td id="aspek8_5"></td>
                  <td id="rate8_5"></td>
                  <td id="rate8"></td>
                  <td class="percent"></td>
                </tr>
                <tr>
                  <td>9</td>
                  <td>Pelayanan lainnya baik (misal: parkir, customer service)</td>
                  <td id="aspek9_1"></td>
                  <td id="rate9_1"></td>
                  <td id="aspek9_2"></td>
                  <td id="rate9_2"></td>
                  <td id="aspek9_3"></td>
                  <td id="rate9_3"></td>
                  <td id="aspek9_4"></td>
                  <td id="rate9_4"></td>
                  <td id="aspek9_5"></td>
                  <td id="rate9_5"></td>
                  <td id="rate9"></td>
                  <td class="percent"></td>
                </tr>
                <tr>
                  <td>10</td>
                  <td>Secara keseluruhan saya puas</td>
                  <td id="aspek10_1"></td>
                  <td id="rate10_1"></td>
                  <td id="aspek10_2"></td>
                  <td id="rate10_2"></td>
                  <td id="aspek10_3"></td>
                  <td id="rate10_3"></td>
                  <td id="aspek10_4"></td>
                  <td id="rate10_4"></td>
                  <td id="aspek10_5"></td>
                  <td id="rate10_5"></td>
                  <td id="rate10"></td>
                  <td class="percent"></td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">Komentar Umum</h4>
        </div>
        <div class="card-body">
          <div class="list-group" id="komentar"></div>
        </div>
      </div>
      <div id="validity"></div>
    </div>
  </div>
</div>

<script type="text/javascript">
  function load_penilaian(cari)
  {
    $.ajax({
      url: '<?= base_url().'dosen/json_penilaian/'.$sesi ?>',
      type: 'POST',
      data: {
        cari: cari
      },
      dataType: 'JSON',
      success: function(data){
        var html = '';

        $.each(data.sesi, function(k, v){
          $('#nama_pelatihan').text(v.deskripsi_subyek);
          $('#periode').text(v.tgl_mulai+' s/d '+v.tgl_selesai);
          $('#ruangan').text(v.kelas);
          $('#dosen').text(v.nama);
          $('#nama_sesi').text(v.deskripsi_sesi);
          $('#progress-rate').attr('value', v.jml_responden);
          $('#progress-rate').attr('max', v.jml_peserta);

          if(v.status == 'Proses'){
            $('#validity').html(`<button class="btn btn-lg btn-primary col-md-12" id="validasi" data-id="${v.id_sesi}">Validasi</button>`);
          }

          $('#jml_peserta').text(v.jml_peserta);
          $('#jml_responden').text(v.jml_responden);

          var rate = parseFloat(v.jml_responden/v.jml_peserta*100);
          var percent = parseInt((parseInt(v.aspek1_1)+parseInt(v.aspek1_2)+parseInt(v.aspek1_3)+parseInt(v.aspek1_4)+parseInt(v.aspek1_5))/v.jml_responden*100);
          $('#responden-rate').text(`${rate.toFixed(2)}%`);
          $('.percent').text(`${percent.toFixed(0)}%`);

          var rate1 = parseFloat(((v.aspek1_1*5)+(v.aspek1_2*4)+(v.aspek1_3*3)+(v.aspek1_4*2)+(v.aspek1_5*1))/v.jml_peserta);
          $('#aspek1_1').text(`${v.aspek1_1}`);
          $('#aspek1_2').text(`${v.aspek1_2}`);
          $('#aspek1_3').text(`${v.aspek1_3}`);
          $('#aspek1_4').text(`${v.aspek1_4}`);
          $('#aspek1_5').text(`${v.aspek1_5}`);
          $('#rate1_1').text(`${parseInt(v.aspek1_1/v.jml_responden*100)}%`);
          $('#rate1_2').text(`${parseInt(v.aspek1_2/v.jml_responden*100)}%`);
          $('#rate1_3').text(`${parseInt(v.aspek1_3/v.jml_responden*100)}%`);
          $('#rate1_4').text(`${parseInt(v.aspek1_4/v.jml_responden*100)}%`);
          $('#rate1_5').text(`${parseInt(v.aspek1_5/v.jml_responden*100)}%`);
          $('#rate1').text(rate1.toFixed(2));

          var rate2 = parseFloat(((v.aspek2_1*5)+(v.aspek2_2*4)+(v.aspek2_3*3)+(v.aspek2_4*2)+(v.aspek2_5*1))/v.jml_peserta);
          $('#aspek2_1').text(`${v.aspek2_1}`);
          $('#aspek2_2').text(`${v.aspek2_2}`);
          $('#aspek2_3').text(`${v.aspek2_3}`);
          $('#aspek2_4').text(`${v.aspek2_4}`);
          $('#aspek2_5').text(`${v.aspek2_5}`);
          $('#rate2_1').text(`${parseInt(v.aspek2_1/v.jml_responden*100)}%`);
          $('#rate2_2').text(`${parseInt(v.aspek2_2/v.jml_responden*100)}%`);
          $('#rate2_3').text(`${parseInt(v.aspek2_3/v.jml_responden*100)}%`);
          $('#rate2_4').text(`${parseInt(v.aspek2_4/v.jml_responden*100)}%`);
          $('#rate2_5').text(`${parseInt(v.aspek2_5/v.jml_responden*100)}%`);
          $('#rate2').text(rate2.toFixed(2));

          var rate3 = parseFloat(((v.aspek3_1*5)+(v.aspek3_2*4)+(v.aspek3_3*3)+(v.aspek3_4*2)+(v.aspek3_5*1))/v.jml_peserta);
          $('#aspek3_1').text(`${v.aspek3_1}`);
          $('#aspek3_2').text(`${v.aspek3_2}`);
          $('#aspek3_3').text(`${v.aspek3_3}`);
          $('#aspek3_4').text(`${v.aspek3_4}`);
          $('#aspek3_5').text(`${v.aspek3_5}`);
          $('#rate3_1').text(`${parseInt(v.aspek3_1/v.jml_responden*100)}%`);
          $('#rate3_2').text(`${parseInt(v.aspek3_2/v.jml_responden*100)}%`);
          $('#rate3_3').text(`${parseInt(v.aspek3_3/v.jml_responden*100)}%`);
          $('#rate3_4').text(`${parseInt(v.aspek3_4/v.jml_responden*100)}%`);
          $('#rate3_5').text(`${parseInt(v.aspek3_5/v.jml_responden*100)}%`);
          $('#rate3').text(rate3.toFixed(2));

          var rate4 = parseFloat(((v.aspek4_1*5)+(v.aspek4_2*4)+(v.aspek4_3*3)+(v.aspek4_4*2)+(v.aspek4_5*1))/v.jml_peserta);
          $('#aspek4_1').text(`${v.aspek4_1}`);
          $('#aspek4_2').text(`${v.aspek4_2}`);
          $('#aspek4_3').text(`${v.aspek4_3}`);
          $('#aspek4_4').text(`${v.aspek4_4}`);
          $('#aspek4_5').text(`${v.aspek4_5}`);
          $('#rate4_1').text(`${parseInt(v.aspek4_1/v.jml_responden*100)}%`);
          $('#rate4_2').text(`${parseInt(v.aspek4_2/v.jml_responden*100)}%`);
          $('#rate4_3').text(`${parseInt(v.aspek4_3/v.jml_responden*100)}%`);
          $('#rate4_4').text(`${parseInt(v.aspek4_4/v.jml_responden*100)}%`);
          $('#rate4_5').text(`${parseInt(v.aspek4_5/v.jml_responden*100)}%`);
          $('#rate4').text(rate4.toFixed(2));

          var rate5 = parseFloat(((v.aspek5_1*5)+(v.aspek5_2*4)+(v.aspek5_3*3)+(v.aspek5_4*2)+(v.aspek5_5*1))/v.jml_peserta);
          $('#aspek5_1').text(`${v.aspek5_1}`);
          $('#aspek5_2').text(`${v.aspek5_2}`);
          $('#aspek5_3').text(`${v.aspek5_3}`);
          $('#aspek5_4').text(`${v.aspek5_4}`);
          $('#aspek5_5').text(`${v.aspek5_5}`);
          $('#rate5_1').text(`${parseInt(v.aspek5_1/v.jml_responden*100)}%`);
          $('#rate5_2').text(`${parseInt(v.aspek5_2/v.jml_responden*100)}%`);
          $('#rate5_3').text(`${parseInt(v.aspek5_3/v.jml_responden*100)}%`);
          $('#rate5_4').text(`${parseInt(v.aspek5_4/v.jml_responden*100)}%`);
          $('#rate5_5').text(`${parseInt(v.aspek5_5/v.jml_responden*100)}%`);
          $('#rate5').text(rate5.toFixed(2));

          var rate6 = parseFloat(((v.aspek6_1*5)+(v.aspek6_2*4)+(v.aspek6_3*3)+(v.aspek6_4*2)+(v.aspek6_5*1))/v.jml_peserta);
          $('#aspek6_1').text(`${v.aspek6_1}`);
          $('#aspek6_2').text(`${v.aspek6_2}`);
          $('#aspek6_3').text(`${v.aspek6_3}`);
          $('#aspek6_4').text(`${v.aspek6_4}`);
          $('#aspek6_5').text(`${v.aspek6_5}`);
          $('#rate6_1').text(`${parseInt(v.aspek6_1/v.jml_responden*100)}%`);
          $('#rate6_2').text(`${parseInt(v.aspek6_2/v.jml_responden*100)}%`);
          $('#rate6_3').text(`${parseInt(v.aspek6_3/v.jml_responden*100)}%`);
          $('#rate6_4').text(`${parseInt(v.aspek6_4/v.jml_responden*100)}%`);
          $('#rate6_5').text(`${parseInt(v.aspek6_5/v.jml_responden*100)}%`);
          $('#rate6').text(rate6.toFixed(2));

          var rate7 = parseFloat(((v.aspek7_1*5)+(v.aspek7_2*4)+(v.aspek7_3*3)+(v.aspek7_4*2)+(v.aspek7_5*1))/v.jml_peserta);
          $('#aspek7_1').text(`${v.aspek7_1}`);
          $('#aspek7_2').text(`${v.aspek7_2}`);
          $('#aspek7_3').text(`${v.aspek7_3}`);
          $('#aspek7_4').text(`${v.aspek7_4}`);
          $('#aspek7_5').text(`${v.aspek7_5}`);
          $('#rate7_1').text(`${parseInt(v.aspek7_1/v.jml_responden*100)}%`);
          $('#rate7_2').text(`${parseInt(v.aspek7_2/v.jml_responden*100)}%`);
          $('#rate7_3').text(`${parseInt(v.aspek7_3/v.jml_responden*100)}%`);
          $('#rate7_4').text(`${parseInt(v.aspek7_4/v.jml_responden*100)}%`);
          $('#rate7_5').text(`${parseInt(v.aspek7_5/v.jml_responden*100)}%`);
          $('#rate7').text(rate7.toFixed(2));

          var rate8 = parseFloat(((v.aspek8_1*5)+(v.aspek8_2*4)+(v.aspek8_3*3)+(v.aspek8_4*2)+(v.aspek8_5*1))/v.jml_peserta);
          $('#aspek8_1').text(`${v.aspek8_1}`);
          $('#aspek8_2').text(`${v.aspek8_2}`);
          $('#aspek8_3').text(`${v.aspek8_3}`);
          $('#aspek8_4').text(`${v.aspek8_4}`);
          $('#aspek8_5').text(`${v.aspek8_5}`);
          $('#rate8_1').text(`${parseInt(v.aspek8_1/v.jml_responden*100)}%`);
          $('#rate8_2').text(`${parseInt(v.aspek8_2/v.jml_responden*100)}%`);
          $('#rate8_3').text(`${parseInt(v.aspek8_3/v.jml_responden*100)}%`);
          $('#rate8_4').text(`${parseInt(v.aspek8_4/v.jml_responden*100)}%`);
          $('#rate8_5').text(`${parseInt(v.aspek8_5/v.jml_responden*100)}%`);
          $('#rate8').text(rate8.toFixed(2));

          var rate9 = parseFloat(((v.aspek9_1*5)+(v.aspek9_2*4)+(v.aspek9_3*3)+(v.aspek9_4*2)+(v.aspek9_5*1))/v.jml_peserta);
          $('#aspek9_1').text(`${v.aspek9_1}`);
          $('#aspek9_2').text(`${v.aspek9_2}`);
          $('#aspek9_3').text(`${v.aspek9_3}`);
          $('#aspek9_4').text(`${v.aspek9_4}`);
          $('#aspek9_5').text(`${v.aspek9_5}`);
          $('#rate9_1').text(`${parseInt(v.aspek9_1/v.jml_responden*100)}%`);
          $('#rate9_2').text(`${parseInt(v.aspek9_2/v.jml_responden*100)}%`);
          $('#rate9_3').text(`${parseInt(v.aspek9_3/v.jml_responden*100)}%`);
          $('#rate9_4').text(`${parseInt(v.aspek9_4/v.jml_responden*100)}%`);
          $('#rate9_5').text(`${parseInt(v.aspek9_5/v.jml_responden*100)}%`);
          $('#rate9').text(rate9.toFixed(2));

          var rate10 = parseFloat(((v.aspek10_1*5)+(v.aspek10_2*4)+(v.aspek10_3*3)+(v.aspek10_4*2)+(v.aspek10_5*1))/v.jml_peserta);
          $('#aspek10_1').text(`${v.aspek10_1}`);
          $('#aspek10_2').text(`${v.aspek10_2}`);
          $('#aspek10_3').text(`${v.aspek10_3}`);
          $('#aspek10_4').text(`${v.aspek10_4}`);
          $('#aspek10_5').text(`${v.aspek10_5}`);
          $('#rate10_1').text(`${parseInt(v.aspek10_1/v.jml_responden*100)}%`);
          $('#rate10_2').text(`${parseInt(v.aspek10_2/v.jml_responden*100)}%`);
          $('#rate10_3').text(`${parseInt(v.aspek10_3/v.jml_responden*100)}%`);
          $('#rate10_4').text(`${parseInt(v.aspek10_4/v.jml_responden*100)}%`);
          $('#rate10_5').text(`${parseInt(v.aspek10_5/v.jml_responden*100)}%`);
          $('#rate10').text(rate10.toFixed(2));

        });

        if(data.komentar.length == 0){
          html += '<p class="list-group-item text-md-center"> Tidak ada Komentar </p>';
        } else {
          $.each(data.komentar, function(k, v){
            html += `<a class="list-group-item list-group-item-action">`;
              html += `<h5 class="list-group-item-heading">${v.nama_peserta}</h5>`;
              html += `<p class="list-group-item-text text-muted">${v.komentar}</p>`;
            html += `</a>`;
          });
        }
        $('#komentar').html(html);
      }
    });
  }

  $(document).ready(function(){

    load_penilaian();

    $('#validity').on('click', '#validasi', function(){
      var id_sesi = $(this).data('id');

      $.ajax({
        url: '<?= base_url().'dosen/response_validasi' ?>',
        type: 'POST',
        data: {
          id_sesi: id_sesi
        },
        success: function(data){
          if(data == 'berhasil'){
            toastr.success('Berhasil melakukan validasi', 'Success');
            location.hash = '#/evaluasi';
          } else {
            toastr.error('Berhasil melakukan validasi', 'Error');
          }
        }
      });
    });

  });
</script>
