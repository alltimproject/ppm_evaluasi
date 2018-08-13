<div class="content-header row">
  <div class="content-header-left col-md-6 col-xs-12 mb-1">
    <h2 class="content-header-title" style="color: white;">Evaluasi</h2>
  </div>
  <div class="content-header-right breadcrumbs-right breadcrumbs-top col-md-6 col-xs-12">
    <div class="breadcrumb-wrapper col-xs-12">
      <!-- <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Home</a>
        </li>
        <li class="breadcrumb-item"><a href="#">Page Layouts</a>
        </li>
        <li class="breadcrumb-item active">1 Column
        </li>
      </ol> -->
    </div>
  </div>
</div>

<div class="content-body"><!-- Description -->
  <div class="row">
    <div class="col-md-8">
      <div id="data-sesi"></div>
    </div>
    <div class="col-md-4">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">Subyek</h4>
        </div>
        <div class="card-body">
            <div class="list-group">
              <a class="list-group-item list-group-item-action">
                <h5 class="list-group-item-heading">Nama Pelatihan</h5>
                <p class="list-group-item-text text-muted"><?= $this->session->userdata('deskripsi') ?></p>
              </a>
              <a class="list-group-item list-group-item-action">
                <h5 class="list-group-item-heading">Tanggal</h5>
                <p class="list-group-item-text text-muted"><?= $this->session->userdata('tgl_mulai') ?> s/d <?= $this->session->userdata('tgl_selesai') ?></p>
              </a>
              <a class="list-group-item list-group-item-action">
                <h5 class="list-group-item-heading">Ruangan</h5>
                <p class="list-group-item-text text-muted"><?= $this->session->userdata('kelas') ?></p>
              </a>
            </div>
        </div>
      </div>

      <div class="card">
        <div class="card-header">
          <h4 class="card-title">Info User</h4>
        </div>
        <div class="card-body">
            <div class="list-group">
              <a class="list-group-item list-group-item-action">
                <h5 class="list-group-item-heading">ID Peserta</h5>
                <p class="list-group-item-text text-muted"><?= $this->session->userdata('id_peserta') ?></p>
              </a>
              <a class="list-group-item list-group-item-action">
                <h5 class="list-group-item-heading">Nama Peserta</h5>
                <p class="list-group-item-text text-muted"><?= $this->session->userdata('nama_peserta') ?></p>
              </a>
              <a class="list-group-item list-group-item-action">
                <h5 class="list-group-item-heading">Email</h5>
                <p class="list-group-item-text text-muted"><?= $this->session->userdata('email') ?></p>
              </a>
              <a class="list-group-item list-group-item-action">
                <h5 class="list-group-item-heading">Telepon</h5>
                <p class="list-group-item-text text-muted"><?= $this->session->userdata('telepon') ?></p>
              </a>
              <a class="list-group-item list-group-item-action">
                <h5 class="list-group-item-heading">Alamat</h5>
                <p class="list-group-item-text text-muted"><?= $this->session->userdata('alamat') ?></p>
              </a>
            </div>
        </div>
      </div>
    </div>
  </div>

  <div class="modal fade text-xs-left" id="modal-form" tabindex="-1" role="dialog" aria-labelledby="myModalLabel17" aria-hidden="true">
									  <div class="modal-dialog modal-lg" role="document">
										<div class="modal-content">
										  <div class="modal-header">
											<button type="button" class="close" data-dismiss="modal" aria-label="Close">
											  <span aria-hidden="true">&times;</span>
											</button>
											<h4 class="modal-title" id="myModalLabel17"></h4>
										  </div>
                      <form class="form-data">
                        <div class="modal-body">
  											   <div class="form-group">
                             <label for="">Pelatihan ini bermanfaat bagi saya</label>
                             <select class="form-control" id="aspek_1" name="aspek_1">
                               <option value=""></option>
                               <option value="Sangat Setuju">Sangat Setuju</option>
                               <option value="Setuju">Setuju</option>
                               <option value="Netral">Netral</option>
                               <option value="Tidak Setuju">Tidak Setuju</option>
                               <option value="Sangat Tidak Setuju">Sangat Tidak Setuju</option>
                             </select>
                           </div>
                           <div class="form-group">
                             <label for="">Instruktur menyampaikan materi dengan jelas</label>
                             <select class="form-control" id="aspek_2" name="aspek_2">
                               <option value=""></option>
                               <option value="Sangat Setuju">Sangat Setuju</option>
                               <option value="Setuju">Setuju</option>
                               <option value="Netral">Netral</option>
                               <option value="Tidak Setuju">Tidak Setuju</option>
                               <option value="Sangat Tidak Setuju">Sangat Tidak Setuju</option>
                             </select>
                           </div>
                           <div class="form-group">
                             <label for="">Metode Pengajaran yang digunakan Menarik</label>
                             <select class="form-control" id="aspek_3" name="aspek_3">
                               <option value=""></option>
                               <option value="Sangat Setuju">Sangat Setuju</option>
                               <option value="Setuju">Setuju</option>
                               <option value="Netral">Netral</option>
                               <option value="Tidak Setuju">Tidak Setuju</option>
                               <option value="Sangat Tidak Setuju">Sangat Tidak Setuju</option>
                             </select>
                           </div>
                           <div class="form-group">
                             <label for="">Kombinasi teori dan latihan seimbang</label>
                             <select class="form-control" id="aspek_4" name="aspek_4">
                               <option value=""></option>
                               <option value="Sangat Setuju">Sangat Setuju</option>
                               <option value="Setuju">Setuju</option>
                               <option value="Netral">Netral</option>
                               <option value="Tidak Setuju">Tidak Setuju</option>
                               <option value="Sangat Tidak Setuju">Sangat Tidak Setuju</option>
                             </select>
                           </div>
                           <div class="form-group">
                             <label for="">Jumlah subyek sesuai dengan kebutuhan</label>
                             <select class="form-control" id="aspek_5" name="aspek_5">
                               <option value=""></option>
                               <option value="Sangat Setuju">Sangat Setuju</option>
                               <option value="Setuju">Setuju</option>
                               <option value="Netral">Netral</option>
                               <option value="Tidak Setuju">Tidak Setuju</option>
                               <option value="Sangat Tidak Setuju">Sangat Tidak Setuju</option>
                             </select>
                           </div>
                           <div class="form-group">
                             <label for="">Bahan bacaan membantu proses belajar</label>
                             <select class="form-control" id="aspek_6" name="aspek_6">
                               <option value=""></option>
                               <option value="Sangat Setuju">Sangat Setuju</option>
                               <option value="Setuju">Setuju</option>
                               <option value="Netral">Netral</option>
                               <option value="Tidak Setuju">Tidak Setuju</option>
                               <option value="Sangat Tidak Setuju">Sangat Tidak Setuju</option>
                             </select>
                           </div>
                           <div class="form-group">
                             <label for="">Fasilitas mengajar membantu (peralatan dan ruangan)</label>
                             <select class="form-control" id="aspek_7" name="aspek_7">
                               <option value=""></option>
                               <option value="Sangat Setuju">Sangat Setuju</option>
                               <option value="Setuju">Setuju</option>
                               <option value="Netral">Netral</option>
                               <option value="Tidak Setuju">Tidak Setuju</option>
                               <option value="Sangat Tidak Setuju">Sangat Tidak Setuju</option>
                             </select>
                           </div>
                           <div class="form-group">
                             <label for="">Partisipasi peserta lain sesuai harapan saya</label>
                             <select class="form-control" id="aspek_8" name="aspek_8">
                               <option value=""></option>
                               <option value="Sangat Setuju">Sangat Setuju</option>
                               <option value="Setuju">Setuju</option>
                               <option value="Netral">Netral</option>
                               <option value="Tidak Setuju">Tidak Setuju</option>
                               <option value="Sangat Tidak Setuju">Sangat Tidak Setuju</option>
                             </select>
                           </div>
                           <div class="form-group">
                             <label for="">Pelayanan lainnya baik (misal: parkir, customer service)</label>
                             <select class="form-control" id="aspek_9" name="aspek_9">
                               <option value=""></option>
                               <option value="Sangat Setuju">Sangat Setuju</option>
                               <option value="Setuju">Setuju</option>
                               <option value="Netral">Netral</option>
                               <option value="Tidak Setuju">Tidak Setuju</option>
                               <option value="Sangat Tidak Setuju">Sangat Tidak Setuju</option>
                             </select>
                           </div>
                           <div class="form-group">
                             <label for="">Secara keseluruhan saya puas</label>
                             <select class="form-control" id="aspek_10" name="aspek_10">
                               <option value=""></option>
                               <option value="Sangat Setuju">Sangat Setuju</option>
                               <option value="Setuju">Setuju</option>
                               <option value="Netral">Netral</option>
                               <option value="Tidak Setuju">Tidak Setuju</option>
                               <option value="Sangat Tidak Setuju">Sangat Tidak Setuju</option>
                             </select>
                           </div>
                           <div class="form-group">
                             <label for="">Komentar</label>
                             <input type="hidden" name="id_sesi" id="id_sesi">
                             <textarea name="komentar" class="form-control" id="komentar" rows="8" cols="80"></textarea>
                           </div>
  										  </div>
  										  <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
  										  </div>
                      </form>
										</div>
									  </div>
									</div>
</div>

<script type="text/javascript">

  function load_sesi()
  {
    $.ajax({
      url: '<?= base_url().'peserta/json_sesi' ?>',
      type: 'GET',
      dataType: 'JSON',
      success: function(data)
      {
        var html = '';

        $.each(data.sesi, function(k, v){
          html += `<div class="card">`;
          html += `<div class="card-header">`;
            html += `<h4 class="card-title">${v.deskripsi_sesi}</h4><span class="text-muted">by ${v.nama}</span>`;
          html += `</div>`;
          html += `<div class="card-footer">`;

          if(v.jml_penilaian >= 1){
            html += `<p>Terimakasih telah memberikan kami penilaian.</p>`;
          } else {
            html += `<button class="btn btn-md btn-warning" id="open-modal" style="float: right;" data-id="${v.id_sesi}" data-judul="${v.deskripsi_sesi}">Beri Penilaian</button>`;
          }

          html += `</div>`;
          html += `</div>`;
        });

        $('#data-sesi').html(html);
      }

    });
  }
  $(document).ready(function(){

    load_sesi();

    $(document).on('click', '#open-modal', function(){
      var id_sesi = $(this).data('id');
      var judul = $(this).data('judul');

      $('#id_sesi').val(id_sesi);
      $('.modal-title').text(`Evaluasi ${judul}`);
      $('.form-data')[0].reset();
      $('#modal-form').modal('show');
    });

    $('.form-data').on('submit', function(e){
      e.preventDefault();
      var submit = true;

      $(this).find('select, textarea').each(function(){
        if($(this).val() == ''){
          submit = false;
        }
      });

      if(submit == true){
        $.ajax({
          url: '<?= base_url().'peserta/response_evaluasi' ?>',
          type: 'POST',
          data: $(this).serialize(),
          success: function(data){
            if(data == 'berhasil'){
              toastr.success('Terimakasih telah melakukan penilaian terhadap kami', 'Success');
              load_sesi();
              $('#modal-form').modal('hide');
            } else {
              toastr.error('Tidak berhasil melakukan penilaian', 'Error');
            }
          }
        });
      } else {
        toastr.error('Silahkan mengisi formulir dengan lengkap', 'error');
      }
    });

  });
</script>
