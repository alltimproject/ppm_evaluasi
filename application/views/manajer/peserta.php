<div class="content-header row">
  <div class="content-header-left col-md-6 col-xs-12 mb-1">
    <h2 class="content-header-title">Peserta
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
<script type="text/javascript">
  function load_peserta(cari)
  {
    $.ajax({
      url: '<?= base_url().'manajer/json_peserta/'.$subyek ?>',
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

    load_peserta();


  });
</script>
