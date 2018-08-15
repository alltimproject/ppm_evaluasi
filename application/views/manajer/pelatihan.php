<div class="content-header row">
  <div class="content-header-left col-md-6 col-xs-12 mb-1">
    <h2 class="content-header-title">Pelatihan
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
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>
            </div>
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
      url: '<?= base_url().'manajer/json_pelatihan' ?>',
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
          html += `<td colspan="5" align="center">Tidak ada pelatihan</td>`;
          html += '</tr>';
        } else {
          $.each(data.pelatihan, function(k, v){
            no++;
            html += '<tr>';
            html += `<td>${no}</td>`;
            html += `<td>${v.deskripsi_subyek}</td>`;
            html += `<td>${v.tgl_mulai} s/d ${v.tgl_selesai}</td>`;
            html += `<td>${v.kelas}</td>`;
            html += `<td><a href="#/peserta/${v.id_subyek}" class="btn btn-sm btn-info">Peserta <span class="tag tag-danger">${v.jml_peserta}</span></a>`;
            html += `<a href="#/sesi/${v.id_subyek}" class="btn btn-sm btn-primary">Sesi <span class="tag tag-danger">${v.jml_sesi}</span></a></td>`;
            html += '</tr>';
          });
        }

        $('#t_subyek tbody').html(html);
      }
    });
  }

  $(document).ready(function(){

    load_pelatihan();

    $('#cari').on('keyup', function(){
      var cari = $('#cari').val();
      load_pelatihan(cari);
    });

    $('#export').on('click', function(){
      $('.form-export')[0].reset();
      $('#export-subyek').modal('show');
    });

  });
</script>
