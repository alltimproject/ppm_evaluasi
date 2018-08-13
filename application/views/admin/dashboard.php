<div class="content-header row">
  <div class="content-header-left col-md-6 col-xs-12 mb-1">
    <h2 class="content-header-title">Dashboard</h2>
  </div>
  <div class="content-header-right breadcrumbs-right breadcrumbs-top col-md-6 col-xs-12">
    <div class="breadcrumb-wrapper col-xs-12">

    </div>
  </div>
</div>

<div class="content-body">
  <div class="row">

    <div class="col-md-3">
      <div class="card">
                <div class="card-body">
                    <div class="card-block">
                        <div class="media">
                            <div class="media-left media-middle">
                                <i class="icon-paste blue font-large-2 float-xs-left"></i>
                            </div>
                            <div class="media-body text-xs-right">
                                <h3 class="blue" id="jml_pelatihan">0</h3>
                                <span>Total Pelatihan</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
              <div class="card-body">
                <div class="card-block">
                  <div class="media">
                    <div class="media-left media-middle">
                      <i class="icon-file-text purple lighten-1 font-large-2 float-xs-left"></i>
                    </div>
                    <div class="media-body text-xs-right">
                      <h3 class="purple lighten-1" id="jml_sesi">0</h3>
                      <span>Total Sesi</span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="card">
              <div class="card-body">
                <div class="card-block">
                  <div class="media">
                    <div class="media-left media-middle">
                      <i class="icon-users2 pink font-large-2 float-xs-left"></i>
                    </div>
                    <div class="media-body text-xs-right">
                      <h3 class="pink" id="jml_peserta">0</h3>
                      <span>Total Peserta</span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="card">
              <div class="card-body">
                <div class="card-block">
                  <div class="media">
                    <div class="media-left media-middle">
                      <i class="icon-user-tie warning font-large-2 float-xs-left"></i>
                    </div>
                    <div class="media-body text-xs-right">
                      <h3 class="warning" id="jml_user">0</h3>
                      <span>Total User</span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
    </div>

    <div class="col-md-9">

      <div class="card">
            <div class="card-header">
                <h4 class="card-title">Sesi Valid</h4>
            </div>
            <div class="card-body collapse in">
                <div class="table-responsive">
                    <table class="table" id="t_valid" style="font-size: 12px;">
                        <thead class="thead-inverse">
                            <tr>
                                <th>#</th>
                                <th>ID Sesi</th>
                                <th>Pelatihan</th>
                                <th>Sesi</th>
                                <th>Dosen</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
  </div>
</div>

<script type="text/javascript">
  function load_dashboard()
  {
    $.ajax({
      url: '<?= base_url().'admin/json_dashboard' ?>',
      type: 'POST',
      dataType: 'JSON',
      success: function(data){
        var html = '';
        var no = 1;

        if(data.valid.length == 0) {
          $('#t_valid tbody').html('<tr><td colspan="6" align="center">Tidak ada data</td></tr>');
        } else {
          $.each(data.valid, function(k, v){
            html += `<tr>`;
            html += `<td>${no++}</td>`;
            html += `<td>${v.id_sesi}</td>`;
            html += `<td>${v.deskripsi_subyek}</td>`;
            html += `<td>${v.deskripsi_sesi}</td>`;
            html += `<td>${v.nama}</td>`;
            html += `<td>${v.status}</td>`;
            html += `<tr>`;
          });
        }

        $.each(data.dashboard, function(k, v){
          $('#jml_pelatihan').text(v.jml_peserta);
          $('#jml_sesi').text(v.jml_sesi);
          $('#jml_peserta').text(v.jml_peserta);
          $('#jml_user').text(v.jml_user);
        });

        $('#t_sesi tbody').html(html);
      }
    });
  }

  $(document).ready(function(){

    load_dashboard();

  });
</script>
