<div class="content-header row">
  <div class="content-header-left col-md-6 col-xs-12 mb-1">
    <h2 class="content-header-title">User
      <button class="btn btn-md btn-info" id="tambah"><i class="icon-plus2"></i> Add</button>
    </h2>
  </div>
</div>

<div class="content-body">
  <div class="row">
    <div class="col-xs-12">
        <div class="card">
            <div class="card-body collapse in">
                <div class="table-responsive">
                    <table class="table table-hover" id="t_user" style="font-size:12px;">
                        <thead class="thead-inverse">
                            <tr>
                                <th>#</th>
                                <th>NIP</th>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Telepon</th>
                                <th>Level</th>
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

<div class="modal fade text-xs-left" id="modal-user" tabindex="-1" role="dialog" aria-labelledby="myModalLabel4" aria-hidden="true">
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
                <label for="">NIP</label>
                <input type="text" name="nip" class="form-control" id="nip">
              </div>
              <div class="form-group">
                <label for="">Nama</label>
                <input type="text" name="nama" class="form-control" id="nama">
              </div>
              <div class="form-group">
                <label for="">Email</label>
                <input type="email" name="email" class="form-control" id="email">
              </div>
              <div class="form-group">
                <label for="">Telepon</label>
                <input type="number" name="telepon" class="form-control" id="telepon">
              </div>
              <div class="form-group">
                <label for="">Level</label>
                <select class="form-control" name="level" id="level">
                  <option value=""></option>
                  <option value="Manajer">Manajer</option>
                  <option value="Supervisor">Supervisor</option>
                  <option value="Dosen">Dosen</option>
                </select>
              </div>
  	        </div>
  	        <div class="modal-footer">
          		<button type="submit" class="" id="submit_user"></button>
          		<button type="button" class="btn grey btn-outline-secondary" data-dismiss="modal">Cancel</button>
  	        </div>
          </form>
	     </div>
    </div>
</div>

<div class="modal fade text-xs-left" id="modal-user2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel4" aria-hidden="true">
		<div class="modal-dialog" role="document">
	     <div class="modal-content">
	        <div class="modal-header">
        		<button type="button" class="close" data-dismiss="modal" aria-label="Close">
        		  <span aria-hidden="true">&times;</span>
        		</button>
		        <h4 class="modal-title" id="myModalLabel4">Hapus User</h4>
					</div>
          <form class="form-hapus">
            <div class="modal-body">
              <p>Apakah Anda yakin ingin menghapus Data User ini?</p>
              <input type="hidden" name="nip" id="id">
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
  function load_user(cari)
  {
    $.ajax({
      url: '<?= base_url().'admin/json_user' ?>',
      type: 'POST',
      dataType: 'JSON',
      data: {
        cari: cari
      },
      success: function(data){
        var html = '';
        var no = 1;

        if(data.user.length == 0){
          $('#t_user tbody').html('<tr><td colspan="7" align="center">Tidak ada data</td></tr>')
        } else {
          $.each(data.user, function(k, v){
            html += `<tr>`;
              html += `<td>${no++}</td>`;
              html += `<td>${v.nip}</td>`;
              html += `<td>${v.nama}</td>`;
              html += `<td>${v.email}</td>`;
              html += `<td>${v.telepon}</td>`;
              html += `<td>${v.level}</td>`;
              html += `<td><button class="btn btn-success btn-sm" id="update" data-nip="${v.nip}" data-nama="${v.nama}" data-email="${v.email}" data-telepon="${v.telepon}" data-alamat="${v.alamat}" data-level="${v.level}"><i class="icon-pencil22"></i></button> `;
              html += `<button class="btn btn-danger btn-sm" id="hapus" data-nip="${v.nip}"><i class="icon-cross"></i></button></td>`;
            html += `</tr>`;
          });
        }

        $('#t_user tbody').html(html);
      }
    });
  }

  $(document).ready(function(){
    load_user();

    $('#tambah').on('click', function(){
      save_method = 'tambah';

      $('#modal-user .modal-title').text('Tambah User');
      $('#modal-user #submit_user').removeClass().addClass('btn btn-outline-info').text('Save');
      $('.form-data')[0].reset();
      $('.form-data #nip, .form-data #nama, .form-data #email, .form-data #telepon, .form-data #level').removeClass('border-danger');
      $('#modal-user').modal('show');
    });

    $('#t_user').on('click', '#update', function(){
      save_method = "update";

      $('#modal-user .modal-title').text('Update User');
      $('#modal-user #submit_user').removeClass().addClass('btn btn-outline-success').text('Update');
      $('.form-data #nip, .form-data #nama, .form-data #email, .form-data #telepon, .form-data #level').removeClass('border-danger');

      $('#nip').val($(this).data('nip'));
      $('#nama').val($(this).data('nama'));
      $('#email').val($(this).data('email'));
      $('#telepon').val($(this).data('telepon'));
      $('#level').val($(this).data('level'));

      $('#modal-user').modal('show');
    });

    $('#t_user').on('click', '#hapus', function(){
      $('#id').val($(this).data('nip'));
      $('#modal-user2').modal('show');
    });

    $('.form-data #nip, .form-data #nama, .form-data #email, .form-data #telepon, .form-data #level').on('focus', function() {
    	$(this).removeClass('border-danger');
    });

    $('.form-data').on('submit', function(e){
      e.preventDefault();
      var submit = true;

      $(this).find('#nip, #nama, #email, #telepon, #level').each(function(){
        if($(this).val() == ''){
          $(this).addClass('border-danger');
          submit = false;
        }
      });

      if(submit == true){
        $.ajax({
          url: '<?= base_url().'admin/response_user/' ?>'+save_method,
          type: 'POST',
          data: $(this).serialize(),
          success: function(data){
            if(data == 'berhasil'){
              toastr.success(`Data berhasil di${save_method}`, 'Success');
              $('#modal-user').modal('hide');
              load_user();
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
          url: '<?= base_url().'admin/response_user/hapus' ?>',
          type: 'POST',
          data: $(this).serialize(),
          success: function(data){
            if(data == 'berhasil'){
              toastr.success(`Data berhasil dihapus`, 'Success');
              $('#modal-user2').modal('hide');
              load_user();
            } else {
              toastr.error(`Data tidak berhasil dihapus`, 'Error');
            }
            // alert(data);
          }
        });
    });

  });
</script>
