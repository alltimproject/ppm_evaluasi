<div class="content-header row">
  <div class="content-header-left col-md-6 col-xs-12 mb-1">
    <h2 class="content-header-title">Sesi
      <button class="btn btn-md btn-info" id="tambah"><i class="icon-plus2"></i> Add</button>
    </h2>
  </div>
  <div class="content-header-right breadcrumbs-right breadcrumbs-top col-md-6 col-xs-12">
    <div class="breadcrumb-wrapper col-xs-12">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#/pelatihan">Pelatihan</a>
        </li>
        <li class="breadcrumb-item active">Sesi <?= $subyek ?>
        </li>
      </ol>
    </div>
  </div>
</div>

<div class="content-body">
    <div class="row">
      <div class="col-md-4">
        <div class="card">
          <div class="card-header">
            <h4 class="card-title">Subyek</h4>
          </div>
          <div class="card-body">
  						<div class="list-group">
  							<a class="list-group-item list-group-item-action">
  								<h5 class="list-group-item-heading">Nama Pelatihan</h5>
  								<p class="list-group-item-text text-muted" id="nama_pelatihan"></p>
  							</a>
  							<a class="list-group-item list-group-item-action">
  								<h5 class="list-group-item-heading">Tanggal</h5>
  								<p class="list-group-item-text text-muted" id="periode"></p>
  							</a>
  							<a class="list-group-item list-group-item-action">
  								<h5 class="list-group-item-heading">Ruangan</h5>
  								<p class="list-group-item-text text-muted" id="ruangan"></p>
  							</a>
  						</div>
          </div>
        </div>
      </div>
      <div class="col-md-8">
        <div class="card">
            <div class="card-header">
              <h4 class="card-title">Daftar Sesi</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                  <table class="table" id="t_sesi" style="font-size: 12px;">
                    <thead class="thead-inverse">
                      <tr>
                        <th>ID</th>
                        <th>Deskripsi Sesi</th>
                        <th>Pengajar</th>
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
</div>

<div class="modal fade text-xs-left" id="modal-sesi" tabindex="-1" role="dialog" aria-labelledby="myModalLabel4" aria-hidden="true">
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
                <label for="deskripsi_sesi">Deskripsi Sesi</label>
                <input type="text" name="deskripsi_sesi" class="form-control" id="deskripsi_sesi">
              </div>
              <div class="form-group">
                <label for="nip">Dosen</label>
                <select class="form-control" name="nip" id="nip"></select>
              </div>
  	        </div>
  	        <div class="modal-footer">
              <input type="hidden" name="id_sesi" id="id_sesi">
              <input type="hidden" name="id_subyek" id="id_subyek">
          		<button type="submit" class="" id="submit_sesi"></button>
          		<button type="button" class="btn grey btn-outline-secondary" data-dismiss="modal">Cancel</button>
  	        </div>
          </form>
	     </div>
    </div>
</div>

<div class="modal fade text-xs-left" id="modal-sesi2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel4" aria-hidden="true">
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
              <p>Apakah Anda yakin ingin menghapus Data Sesi ini?</p>
              <input type="hidden" name="id_sesi" id="id">
  	        </div>
  	        <div class="modal-footer">
          		<button type="submit" class="btn btn-outline-danger">Ya</button>
          		<button type="button" class="btn grey btn-outline-secondary" data-dismiss="modal">Tidak</button>
  	        </div>
          </form>
	     </div>
    </div>
</div>

<script type="text/javascript">
  function load_sesi(cari)
  {
    $.ajax({
      url: '<?= base_url().'admin/json_sesi/'.$subyek ?>',
      type: 'POST',
      data: {
        cari: cari
      },
      dataType: 'JSON',
      success: function(data){
        var html = '';
        var select = '<option value="">-- Pilih Dosen --</option>';

        if(data.sesi.length == 0){
          html += '<tr>';
          html += `<td colspan="7" align="center">Tidak ada sesi</td>`;
          html += '</tr>';
        } else {
          $.each(data.sesi, function(k, v){
            html += '<tr>';
            html += `<td>${v.id_sesi}</td>`;
            html += `<td>${v.deskripsi_sesi}</td>`;
            html += `<td>${v.nama}</td>`;
            html += `<td><button class="btn btn-sm btn-success" id="update" data-id="${v.id_sesi}" data-deskripsi="${v.deskripsi_sesi}" data-nip="${v.nip}"><i class="icon-pencil22"></i></button> `;
            html += `<button class="btn btn-sm btn-danger" id="hapus" data-id="${v.id_sesi}"><i class="icon-cross"></i></button></td>`;
            html += '</tr>';
          });
        }

        $.each(data.pelatihan, function(k, v){
          $('#nama_pelatihan').text(v.deskripsi_subyek);
          $('#periode').text(v.tgl_mulai+' s/d '+v.tgl_selesai);
          $('#ruangan').text(v.kelas);
        });

        $.each(data.dosen, function(k, v){
          select += `<option value="${v.nip}">${v.nama}</option>`;
        });

        $('#nip').html(select);
        $('#t_sesi tbody').html(html);
      }
    });
  }

  $(document).ready(function(){
    var save_method;

    load_sesi();

    $('#tambah').on('click', function(){
      save_method = 'tambah';

      $('#modal-sesi .modal-title').text('Tambah Sesi');
      $('#modal-sesi #submit_sesi').removeClass().addClass('btn btn-outline-info').text('Save');
      $('.form-data')[0].reset();
      $('#id_subyek').val('<?= $subyek ?>');
      $('.form-data #deskripsi_sesi, .form-data #nip').removeClass('border-danger');
      $('#modal-sesi').modal('show');
    });

    $('#t_sesi').on('click', '#update', function(){
      save_method = "update";

      $('#modal-sesi .modal-title').text('Update Sesi');
      $('#modal-sesi #submit_sesi').removeClass().addClass('btn btn-outline-success').text('Update');
      $('.form-data #deskripsi_sesi, .form-data #nip').removeClass('border-danger');

      $('#id_sesi').val($(this).data('id'));
      $('#deskripsi_sesi').val($(this).data('deskripsi'));
      $('#nip').val($(this).data('nip'));
      $('#modal-sesi').modal('show');
    });

    $('#t_sesi').on('click', '#hapus', function(){
      $('#id').val($(this).data('id'));
      $('#modal-sesi2').modal('show');
    });

    $('.form-data #deskripsi_sesi, .form-data #nip').on('focus', function() {
    	$(this).removeClass('border-danger');
    });

    $('.form-data').on('submit', function(e){
      e.preventDefault();
      var submit = true;

      $(this).find('#deskripsi_sesi, #nip').each(function(){
        if($(this).val() == ''){
          $(this).addClass('border-danger');
          submit = false;
        }
      });

      if(submit == true){
        $.ajax({
          url: '<?= base_url().'admin/response_sesi/' ?>'+save_method,
          type: 'POST',
          data: $(this).serialize(),
          success: function(data){
            if(data == 'berhasil'){
              toastr.success(`Data berhasil di${save_method}`, 'Success');
              $('#modal-sesi').modal('hide');
              load_sesi();
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
          url: '<?= base_url().'admin/response_sesi/hapus' ?>',
          type: 'POST',
          data: $(this).serialize(),
          success: function(data){
            if(data == 'berhasil'){
              toastr.success(`Data berhasil dihapus`, 'Success');
              $('#modal-sesi2').modal('hide');
              load_sesi();
            } else {
              toastr.error(`Data tidak berhasil dihapus`, 'Error');
            }
          }
        });
    });

  });
</script>
