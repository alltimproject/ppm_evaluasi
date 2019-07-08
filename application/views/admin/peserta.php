<div class="content-header row">
  <div class="content-header-left col-md-6 col-xs-12 mb-1">
    <h2 class="content-header-title">Peserta
      <button class="btn btn-md btn-info" id="tambah"><i class="icon-plus2"></i> Add</button>
    </h2>
  </div>
  <div class="content-header-right breadcrumbs-right breadcrumbs-top col-md-6 col-xs-12">
    <div class="breadcrumb-wrapper col-xs-12">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#/pelatihan">Pelatihan</a>
        </li>
        <li class="breadcrumb-item active">Peserta <?= $subyek ?>
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
              <h4 class="card-title">List Peserta</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                  <table class="table" id="t_peserta" style="font-size:12px;">
                    <thead class="thead-inverse">
                      <tr>
                        <th>ID</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Telepon</th>
                        <th>Alamat</th>
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

<div class="modal fade text-xs-left" id="modal-peserta" tabindex="-1" role="dialog" aria-labelledby="myModalLabel4" aria-hidden="true">
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
                <label for="nama_peserta">Nama</label>
                <input type="text" name="nama_peserta" class="form-control" id="nama_peserta">
              </div>
              <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" class="form-control" id="email">
              </div>
              <div class="form-group">
                <label for="telepon">Telepon</label>
                <input type="number" name="telepon" class="form-control" id="telepon">
              </div>
              <div class="form-group">
                <label for="alamat">Alamat</label>
                <input type="text" name="alamat" class="form-control" id="alamat">
              </div>
  	        </div>
  	        <div class="modal-footer">
              <input type="hidden" name="id_peserta" id="id_peserta">
              <input type="hidden" name="id_subyek" id="id_subyek">
          		<button type="submit" class="" id="submit_peserta"></button>
          		<button type="button" class="btn grey btn-outline-secondary" data-dismiss="modal">Cancel</button>
  	        </div>
          </form>
	     </div>
    </div>
</div>

<div class="modal fade text-xs-left" id="modal-peserta2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel4" aria-hidden="true">
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
              <p>Apakah Anda yakin ingin menghapus Data Peserta ini?</p>
              <input type="hidden" name="id_peserta" id="id">
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
  function load_peserta(cari)
  {
    $.ajax({
      url: '<?= base_url().'admin/json_peserta/'.$subyek ?>',
      type: 'POST',
      data: {
        cari: cari
      },
      dataType: 'JSON',
      success: function(data){
        var html = '';

        if(data.peserta.length == 0){
          html += '<tr>';
          html += `<td colspan="7" align="center">Tidak ada peserta</td>`;
          html += '</tr>';
        } else {
          $.each(data.peserta, function(k, v){
            html += '<tr>';
            html += `<td>${v.id_peserta}</td>`;
            html += `<td>${v.nama_peserta}</td>`;
            html += `<td>${v.email}</td>`;
            html += `<td>${v.telepon}</td>`;
            html += `<td>${v.alamat}</td>`;
            html += `<td><button class="btn btn-sm btn-success" id="update" data-id="${v.id_peserta}" data-nama="${v.nama_peserta}" data-email="${v.email}" data-telepon="${v.telepon}" data-alamat="${v.alamat}"><i class="icon-pencil22"></i> Edit</button> `;
            html += `<button class="btn btn-sm btn-danger" id="hapus" data-id="${v.id_peserta}"><i class="icon-cross"></i> Hapus</button></td>`;
            html += '</tr>';
          });
        }

        $.each(data.pelatihan, function(k, v){
          $('#nama_pelatihan').text(v.deskripsi_subyek);
          $('#periode').text(v.tgl_mulai+' s/d '+v.tgl_selesai);
          $('#ruangan').text(v.kelas);
        });

        $('#t_peserta tbody').html(html);
      }
    });
  }

  $(document).ready(function(){
    var save_method;

    load_peserta();

    $('#tambah').on('click', function(){
      save_method = 'tambah';

      $('#modal-peserta .modal-title').text('Tambah Peserta');
      $('#modal-peserta #submit_peserta').removeClass().addClass('btn btn-outline-info').text('Save');
      $('.form-data')[0].reset();
      $('.form-data #nama_peserta, .form-data #email, .form-data #telepon, .form-data #alamat').removeClass('border-danger');
      $('#id_subyek').val(`<?= $subyek ?>`);
      $('#modal-peserta').modal('show');
    });

    $('#t_peserta').on('click', '#update', function(){
      save_method = "update";

      $('#modal-peserta .modal-title').text('Update Subyek');
      $('#modal-peserta #submit_peserta').removeClass().addClass('btn btn-outline-success').text('Update');
      $('.form-data #nama_peserta, .form-data #email, .form-data #telepon, .form-data #alamat').removeClass('border-danger');

      $('#id_peserta').val($(this).data('id'));
      $('#nama_peserta').val($(this).data('nama'));
      $('#email').val($(this).data('email'));
      $('#telepon').val($(this).data('telepon'));
      $('#alamat').val($(this).data('alamat'));
      $('#id_subyek').val(`<?= $subyek ?>`);

      $('#modal-peserta').modal('show');
    });

    $('#t_peserta').on('click', '#hapus', function(){
      $('#id').val($(this).data('id'));
      $('#modal-peserta2').modal('show');
    });


    $('.form-data #nama_peserta, .form-data #email, .form-data #telepon, .form-data #alamat').on('focus', function() {
    	$(this).removeClass('border-danger');
    });

    $('.form-data').on('submit', function(e){
      e.preventDefault();
      var submit = true;

      $(this).find('#nama_peserta, #email, #telepon, #alamat').each(function(){
        if($(this).val() == ''){
          $(this).addClass('border-danger');
          submit = false;
        }
      });

      if(submit == true){
        $.ajax({
          url: '<?= base_url().'admin/response_peserta/' ?>'+save_method,
          type: 'POST',
          data: $(this).serialize(),
          success: function(data){
            if(data == 'berhasil'){
              toastr.success(`Data berhasil di${save_method}`, 'Success');
              $('#modal-peserta').modal('hide');
              load_peserta();
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
          url: '<?= base_url().'admin/response_peserta/hapus' ?>',
          type: 'POST',
          data: $(this).serialize(),
          success: function(data){
            if(data == 'berhasil'){
              toastr.success(`Data berhasil dihapus`, 'Success');
              $('#modal-peserta2').modal('hide');
              load_peserta();
            } else {
              toastr.error(`Data tidak berhasil dihapus`, 'Error');
            }
          }
        });
    });

  });
</script>
