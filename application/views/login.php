
<!DOCTYPE html>
<html lang="en" data-textdirection="ltr" class="loading">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="Robust admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities.">
    <meta name="keywords" content="admin template, robust admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="PIXINVENT">
    <title>Login - Peserta</title>

    <link rel="apple-touch-icon" sizes="60x60" href="../../app-assets/images/ico/apple-icon-60.png">
    <link rel="apple-touch-icon" sizes="76x76" href="../../app-assets/images/ico/apple-icon-76.png">
    <link rel="apple-touch-icon" sizes="120x120" href="../../app-assets/images/ico/apple-icon-120.png">
    <link rel="apple-touch-icon" sizes="152x152" href="../../app-assets/images/ico/apple-icon-152.png">
    <link rel="shortcut icon" type="image/x-icon" href="../../app-assets/images/ico/favicon.ico">
    <link rel="shortcut icon" type="image/png" href="../../app-assets/images/ico/favicon-32.png">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-touch-fullscreen" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="default">
    <!-- BEGIN VENDOR CSS-->
    <link rel="stylesheet" type="text/css" href="<?= base_url().'assets/app-assets/css/bootstrap.css' ?>">
    <!-- font icons-->
    <link rel="stylesheet" type="text/css" href="<?= base_url().'assets/app-assets/fonts/icomoon.css' ?>">
    <link rel="stylesheet" type="text/css" href="<?= base_url().'assets/app-assets/fonts/flag-icon-css/css/flag-icon.min.css' ?>">
    <link rel="stylesheet" type="text/css" href="<?= base_url().'assets/app-assets/vendors/css/extensions/pace.css' ?>">
    <!-- END VENDOR CSS-->
    <!-- BEGIN ROBUST CSS-->
    <link rel="stylesheet" type="text/css" href="<?= base_url().'assets/app-assets/css/bootstrap-extended.css' ?>">
    <link rel="stylesheet" type="text/css" href="<?= base_url().'assets/app-assets/css/app.css' ?>">
    <link rel="stylesheet" type="text/css" href="<?= base_url().'assets/app-assets/css/colors.css' ?>">
    <link rel="stylesheet" type="text/css" href="<?= base_url().'assets/app-assets/vendors/toastr/build/toastr.min.css' ?>">
    <!-- END ROBUST CSS-->
    <!-- BEGIN Page Level CSS-->
    <link rel="stylesheet" type="text/css" href="<?= base_url().'assets/app-assets/css/core/menu/menu-types/vertical-menu.css' ?>">
    <link rel="stylesheet" type="text/css" href="<?= base_url().'assets/app-assets/css/core/menu/menu-types/vertical-overlay-menu.css' ?>">
    <link rel="stylesheet" type="text/css" href="<?= base_url().'assets/app-assets/css/pages/login-register.css' ?>">
    <!-- END Page Level CSS-->
    <!-- BEGIN Custom CSS-->
    <link rel="stylesheet" type="text/css" href="<?= base_url().'assets/main-assets/css/style.css' ?>">
    <!-- END Custom CSS-->
  </head>
  <body data-open="click" data-menu="vertical-menu" data-col="1-column" class="vertical-layout vertical-menu 1-column  blank-page blank-page">
    <!-- ////////////////////////////////////////////////////////////////////////////-->
    <div class="app-content content container-fluid" style="background-image: url('<?= base_url().'images/background.jpeg' ?>'); background-size: cover;">
      <div class="content-wrapper">
        <div class="content-header row">
        </div>
        <div class="content-body"><section class="flexbox-container">
    <div class="col-md-4 offset-md-4 col-xs-10 offset-xs-1  box-shadow-2 p-0">
        <div class="card border-grey border-lighten-3 m-0">
          <div class="card-header no-border">
              <div class="card-title text-xs-center">
                  <div class="p-1"><img src="<?= base_url().'images/index.png' ?>" alt="branding logo" class="col-xs-12 col-md-12"></div>
              </div>
          </div>
            <div class="card-body collapse in">
                <div class="card-block">
                    <form class="form-horizontal form-simple" id="form-login">
                        <fieldset class="form-group position-relative has-icon-left mb-0">
                            <input type="text" class="form-control form-control-lg input-lg" id="id_peserta" name="id_peserta" placeholder="Masukkan ID Peserta">
                            <div class="form-control-position">
                                <i class="icon-head"></i>
                            </div>
                        </fieldset>
                        <fieldset class="form-group position-relative has-icon-left">
                            <input type="password" class="form-control form-control-lg input-lg" id="password" name="password" placeholder="Masukkan Password">
                            <div class="form-control-position">
                                <i class="icon-key3"></i>
                            </div>
                        </fieldset>
                        <fieldset class="form-group row">
                            <div class="col-md-6 col-xs-12 text-xs-center text-md-left">
                                <fieldset>
                                    <input type="checkbox" id="show-password" class="chk-remember">
                                    <label for="remember-me"> Show Password</label>
                                </fieldset>
                            </div>
                        </fieldset>
                        <button type="submit" class="btn btn-primary btn-lg btn-block"><i class="icon-unlock2"></i> Login</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

        </div>
      </div>
    </div>
    <!-- ////////////////////////////////////////////////////////////////////////////-->

    <!-- BEGIN VENDOR JS-->
    <script src="<?= base_url().'assets/app-assets/js/core/libraries/jquery.min.js' ?>" type="text/javascript"></script>
    <script src="<?= base_url().'assets/app-assets/vendors/js/ui/tether.min.js' ?>" type="text/javascript"></script>
    <script src="<?= base_url().'assets/app-assets/js/core/libraries/bootstrap.min.js' ?>" type="text/javascript"></script>
    <script src="<?= base_url().'assets/app-assets/vendors/js/ui/perfect-scrollbar.jquery.min.js' ?>" type="text/javascript"></script>
    <script src="<?= base_url().'assets/app-assets/vendors/js/ui/unison.min.js' ?>" type="text/javascript"></script>
    <script src="<?= base_url().'assets/app-assets/vendors/js/ui/blockUI.min.js' ?>" type="text/javascript"></script>
    <script src="<?= base_url().'assets/app-assets/vendors/js/ui/jquery.matchHeight-min.js' ?>" type="text/javascript"></script>
    <script src="<?= base_url().'assets/app-assets/vendors/js/ui/screenfull.min.js' ?>" type="text/javascript"></script>
    <script src="<?= base_url().'assets/app-assets/vendors/js/extensions/pace.min.js' ?>" type="text/javascript"></script>
    <script src="<?= base_url().'assets/app-assets/vendors/toastr/build/toastr.min.js' ?>" type="text/javascript"></script>
    <script src="<?= base_url().'assets/app-assets/js/core/app-menu.js' ?>" type="text/javascript"></script>
    <script src="<?= base_url().'assets/app-assets/js/core/app.js' ?>" type="text/javascript"></script>

    <script type="text/javascript">
      $(document).ready(function(){
        $('#form-login').on('submit', function(){
          var login = true;

          $(this).find('#id_peserta, #password').each(function(){
            if($(this).val() == ''){
              login = false;
            } else {
              login = true;
            }
          });

          if(login == true){
            $.ajax({
              url: '<?= base_url().'auth/cekLogin' ?>',
              type: 'POST',
              data: $(this).serialize(),
              success: function(data){
                if(data == 'berhasil'){
                  window.location = '<?= base_url().'peserta/' ?>';
                }  else {
                  toastr.error('Username atau Password salah', 'Error');
                }
                // alert(data);
              }
            });
          } else {
            toastr.warning('Silahkan isi Username atau Passowrd', 'Warning')
          }
          return false;
        });

        $('#show-password').click(function(){
          if($(this).is(':checked'))
          {
            $('#password').attr('type', 'text');
          } else {
            $('#password').attr('type', 'password');
          }
        });
      });
    </script>
  </body>
</html>
