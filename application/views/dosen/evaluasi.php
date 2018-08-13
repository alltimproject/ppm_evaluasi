<div class="content-header row">
  <div class="content-header-left col-md-6 col-xs-12 mb-1">
    <h2 class="content-header-title">Evaluasi</h2>
  </div>
  <div class="content-header-right breadcrumbs-right breadcrumbs-top col-md-6 col-xs-12">
    <div class="breadcrumb-wrapper col-xs-12">

    </div>
  </div>
</div>
<div class="content-body">
  <div class="row">
    <div class="col-xs-12">
        <div class="card">
            <div class="card-body collapse in">
                <div class="table-responsive">
                    <table class="table" id="t_evaluasi" style="font-size: 11px">
                        <thead class="thead-inverse">
                            <tr>
                                <th>#</th>
                                <th>Nama Sesi</th>
                                <th>Nama Pelatihan</th>
                                <th>Tanggal</th>
                                <th>Ruangan</th>
                                <th>Status</th>
                                <th>Detail</th>
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
  function load_evaluasi(cari)
  {
    $.ajax({
      url: '<?= base_url().'dosen/json_evaluasi' ?>',
      type: 'POST',
      data: {
        cari: cari
      },
      dataType: 'JSON',
      success: function(data){
        var html = '';
        var no = 0;

        if(data.evaluasi.length == 0){
          html += '<tr>';
          html += `<td colspan="5" align="center">Tidak ada pelatihan</td>`;
          html += '</tr>';
        } else {
          $.each(data.evaluasi, function(k, v){
            no++;
            html += '<tr>';
            html += `<td>${no}</td>`;
            html += `<td>${v.deskripsi_sesi}</td>`;
            html += `<td>${v.deskripsi_subyek}</td>`;
            html += `<td>${v.tgl_mulai} s/d ${v.tgl_selesai}</td>`;
            html += `<td>${v.kelas}</td>`;
            html += `<td>${v.status}</td>`;
            html += `<td><a href="#/detail/${v.id_sesi}" class="btn btn-info btn-sm"><i class="icon-search4"></i> Detail</a></td>`;
            html += '</tr>';
          });
        }

        $('#t_evaluasi tbody').html(html);
      }
    });
  }

  $(document).ready(function(){
    load_evaluasi();
  });
</script>
