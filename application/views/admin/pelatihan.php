<div class="content-header row">
  <div class="content-header-left col-md-4 col-xs-12 mb-1">
    <h2 class="content-header-title">Pelatihan
      <button class="btn btn-md btn-info" id="tambah"><i class="icon-plus2"></i> Add</button>
      <button class="btn btn-md btn-warning" id="export"><i class="icon-file"></i> Export</button>
    </h2>
  </div>
</div>
<div class="content-body">
  <div class="row">
    <div class="col-xs-12">
        <div class="card">
            <div class="card-header">
              <div class="form-group">
                <div class="position-relative has-icon-left">
                  <input type="text" class="form-control" placeholder="Masukkan Nama Pelatihan" name="cari" id="cari">
                    <div class="form-control-position">
                      <i class="icon-search4"></i>
                    </div>
                </div>
              </div>
            </div>
            <div class="card-body collapse in">
                <div class="table-responsive">
                    <table class="table table-hover" id="t_subyek" style="font-size:12px;">
                        <thead class="thead-inverse">
                            <tr>
                                <th>#</th>
                                <th>Nama Pelatihan</th>
                                <th>Tanggal</th>
                                <th>Ruangan</th>
                                <th></th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade text-xs-left" id="modal-subyek" tabindex="-1" role="dialog" aria-labelledby="myModalLabel4" aria-hidden="true">
		<div class="modal-dialog" role="document">
	     <div class="modal-content">
	        <div class="modal-header">
        		<button type="button" class="close" data-dismiss="modal" aria-label="Close">
        		  <span aria-hidden="true">&times;</span>
        		</button>
		        <h4 class="modal-title" id="myModalLabel4"></h4>
					</div>
          <form class="form-data">
            <div class="modal-body">
              <div class="form-group">
                <label for="deskripsi_subyek">Deskripsi Subyek</label>
                <input type="hidden" name="id_subyek" id="id_subyek">
                <input type="text" name="deskripsi_subyek" class="form-control" id="deskripsi_subyek">
              </div>
              <div class="form-group">
                <label for="tgl_mulai">Tanggal Mulai</label>
                <input type="date" name="tgl_mulai" class="form-control" id="tgl_mulai">
              </div>
              <div class="form-group">
                <label for="tgl_selesai">Tanggal Selesai</label>
                <input type="date" name="tgl_selesai" class="form-control" id="tgl_selesai">
              </div>
              <div class="form-group">
                <label for="kelas">Ruangan</label>
                <input type="text" name="kelas" class="form-control" id="kelas">
              </div>
  	        </div>
  	        <div class="modal-footer">
          		<button type="submit" class="" id="submit_subyek"></button>
          		<button type="button" class="btn grey btn-outline-secondary" data-dismiss="modal">Cancel</button>
  	        </div>
          </form>
	     </div>
    </div>
</div>

<div class="modal fade text-xs-left" id="modal-subyek2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel4" aria-hidden="true">
		<div class="modal-dialog" role="document">
	     <div class="modal-content">
	        <div class="modal-header">
        		<button type="button" class="close" data-dismiss="modal" aria-label="Close">
        		  <span aria-hidden="true">&times;</span>
        		</button>
		        <h4 class="modal-title" id="myModalLabel4">Hapus Subyek</h4>
					</div>
          <form class="form-hapus">
            <div class="modal-body">
              <p>Apakah Anda yakin ingin menghapus Data Pelatihan ini?</p>
              <input type="hidden" name="id_subyek" id="id">
  	        </div>
  	        <div class="modal-footer">
          		<button type="submit" class="btn btn-outline-danger">Ya</button>
          		<button type="button" class="btn grey btn-outline-secondary" data-dismiss="modal">Tidak</button>
  	        </div>
          </form>
	     </div>
    </div>
</div>

<div class="modal fade text-xs-left" id="export-subyek" tabindex="-1" role="dialog" aria-labelledby="myModalLabel4" aria-hidden="true">
		<div class="modal-dialog modal-sm" role="document">
	     <div class="modal-content">
	        <div class="modal-header">
        		<button type="button" class="close" data-dismiss="modal" aria-label="Close">
        		  <span aria-hidden="true">&times;</span>
        		</button>
		        <h4 class="modal-title" id="myModalLabel4">Export Pelatihan</h4>
					</div>
          <form class="form-export" action="<?= base_url().'laporan/export_subyek' ?>" method="post" target="_blank">
            <div class="modal-body">
              <div class="form-group">
                <label for="">Tanggal Awal</label>
                <input type="date" name="tgl_awal" class="form-control" id="tgl_awal">
              </div>
              <div class="form-group">
                <label for="">Tanggal Akhir</label>
                <input type="date" name="tgl_akhir" class="form-control" id="tgl_akhir">
              </div>
  	        </div>
  	        <div class="modal-footer">
          		<button type="submit" name="pdf" class="btn btn-outline-danger">PDF</button>
          		<button type="submit" name="excel" class="btn grey btn-outline-success">Excel</button>
  	        </div>
          </form>
	     </div>
    </div>
</div>

<script type="text/javascript">
  function load_pelatihan(cari)
  {
    $.ajax({
      url: '<?= base_url().'admin/json_pelatihan' ?>',
      type: 'POST',
      data: {
        cari: cari
      },
      dataType: 'JSON',
      success: function(data){
        var html = '';
        var no = 0;

        if(data.pelatihan.length == 0){
          html += '<tr>';
          html += `<td colspan="6" align="center">Tidak ada pelatihan</td>`;
          html += '</tr>';
        } else {
          $.each(data.pelatihan, function(k, v){
            no++;
            html += '<tr>';
            html += `<td>${no}</td>`;
            html += `<td>${v.deskripsi_subyek}</td>`;
            html += `<td>${v.tgl_mulai} s/d ${v.tgl_selesai}</td>`;
            html += `<td>${v.kelas}</td>`;
            html += `<td><button class="btn btn-success btn-sm" id="update" data-id_subyek="${v.id_subyek}" data-deskripsi="${v.deskripsi_subyek}" data-mulai="${v.tgl_mulai}" data-selesai="${v.tgl_selesai}" data-kelas="${v.kelas}"><i class="icon-pencil22"></i></button> `;
            html += `<button class="btn btn-danger btn-sm" id="hapus" data-id="${v.id_subyek}"><i class="icon-cross"></i></button></td>`;
            html += `<td><a href="#/peserta/${v.id_subyek}" class="btn btn-sm btn-info">Peserta <span class="tag tag-danger">${v.jml_peserta}</span></a>`;
            html += ` <a href="#/sesi/${v.id_subyek}" class="btn btn-sm btn-primary">Sesi <span class="tag tag-danger">${v.jml_sesi}</span></a></td>`;
            html += '</tr>';
          });
        }

        $('#t_subyek tbody').html(html);
      }
    });
  }

  $(document).ready(function(){
    var save_method;

    load_pelatihan();

    $('#cari').on('keyup', function(){
      var cari = $('#cari').val();
      load_pelatihan(cari);
    });

    $('#export').on('click', function(){
      $('.form-export')[0].reset();
      $('#export-subyek').modal('show');
    });

    $('#tambah').on('click', function(){
      save_method = 'tambah';

      $('#modal-subyek .modal-title').text('Tambah Subyek');
      $('#modal-subyek #submit_subyek').removeClass().addClass('btn btn-outline-info').text('Save');
      $('.form-data')[0].reset();
      $('.form-data #deskripsi_subyek, .form-data #tgl_mulai, .form-data #tgl_selesai, .form-data #kelas').removeClass('border-danger');
      $('#modal-subyek').modal('show');
    });

    $('#t_subyek').on('click', '#update', function(){
      save_method = "update";

      $('#modal-subyek .modal-title').text('Update Subyek');
      $('#modal-subyek #submit_subyek').removeClass().addClass('btn btn-outline-success').text('Update');
      $('.form-data #deskripsi_subyek, .form-data #tgl_mulai, .form-data #tgl_selesai, .form-data #kelas').removeClass('border-danger');

      $('#id_subyek').val($(this).data('id_subyek'));
      $('#deskripsi_subyek').val($(this).data('deskripsi'));
      $('#tgl_mulai').val($(this).data('mulai'));
      $('#tgl_selesai').val($(this).data('selesai'));
      $('#kelas').val($(this).data('kelas'));

      $('#modal-subyek').modal('show');
    });

    $('#t_subyek').on('click', '#hapus', function(){
      $('#id').val($(this).data('id'));
      $('#modal-subyek2').modal('show');
    });

    $('.form-data #deskripsi_subyek, .form-data #tgl_mulai, .form-data #tgl_selesai, .form-data #kelas').on('focus', function() {
    	$(this).removeClass('border-danger');
    });

    $('.form-data').on('submit', function(e){
      e.preventDefault();
      var submit = true;

      $(this).find('#deskripsi_subyek, #tgl_mulai, #tgl_selesai, #kelas').each(function(){
        if($(this).val() == ''){
          $(this).addClass('border-danger');
          submit = false;
        }
      });

      if(submit == true){
        $.ajax({
          url: '<?= base_url().'admin/response_pelatihan/' ?>'+save_method,
          type: 'POST',
          data: $(this).serialize(),
          success: function(data){
            if(data == 'berhasil'){
              toastr.success(`Data berhasil di${save_method}`, 'Success');
              $('#modal-subyek').modal('hide');
              load_pelatihan();
            } else {
              toastr.error(`Data tidak berhasil di${save_method}`, 'Error');
            }
          }
        });
      }
    });

    $('.form-hapus').on('submit', function(e){
      e.preventDefault();

        $.ajax({
          url: '<?= base_url().'admin/response_pelatihan/hapus' ?>',
          type: 'POST',
          data: $(this).serialize(),
          success: function(data){
            if(data == 'berhasil'){
              toastr.success(`Data berhasil dihapus`, 'Success');
              $('#modal-subyek2').modal('hide');
              load_pelatihan();
            } else {
              toastr.error(`Data tidak berhasil dihapus`, 'Error');
            }
          }
        });
    });

    $('.form-export').on('submit', function(){

      var tgl_awal = $('#tgl_awal').val();
      var tgl_akhir = $('#tgl_akhir').val();

      if(tgl_awal != '' && tgl_akhir != ''){
        return true;
      } else {
        return false;
      }

    });


  });
</script>
