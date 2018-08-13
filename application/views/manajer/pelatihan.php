<div class="content-header row">
  <div class="content-header-left col-md-6 col-xs-12 mb-1">
    <h2 class="content-header-title">Pelatihan
    </h2>
  </div>
</div>
<div class="content-body">
  <div class="row">
    <div class="col-xs-12">
        <div class="card">
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

  });
</script>
