
<!DOCTYPE html>
<html lang="en" data-textdirection="ltr" class="loading">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="Robust admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities.">
    <meta name="keywords" content="admin template, robust admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="PIXINVENT">
    <title>Dosen | PPM</title>
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
    <link rel="stylesheet" type="text/css" href="<?= base_url().'assets/app-assets/css/pages/timeline.css' ?>">
    <!-- END Page Level CSS-->
    <!-- BEGIN Custom CSS-->
    <link rel="stylesheet" type="text/css" href="<?= base_url().'assets/main-assets/css/style.css' ?>">
    <!-- END Custom CSS-->
  </head>
  <body data-open="click" data-menu="vertical-menu" data-col="2-columns" class="vertical-layout vertical-menu 2-columns  fixed-navbar">

    <!-- navbar-fixed-top-->
    <nav class="header-navbar navbar navbar-with-menu navbar-fixed-top navbar-semi-dark navbar-shadow">
      <div class="navbar-wrapper">
        <div class="navbar-header">
          <ul class="nav navbar-nav">
            <li class="nav-item mobile-menu hidden-md-up float-xs-left"><a class="nav-link nav-menu-main menu-toggle hidden-xs"><i class="icon-menu5 font-large-1"></i></a></li>
            <li class="nav-item"><a href="index.html" class="navbar-brand nav-link"><img alt="branding logo" src="<?= base_url().'images/index.png' ?>" data-expand="<?= base_url().'images/index.png' ?>" data-collapse="<?= base_url().'images/index.png' ?>" class="brand-logo col-md-12 col-xs-12 col-sm-12"></a></li>
            <li class="nav-item hidden-md-up float-xs-right"><a data-toggle="collapse" data-target="#navbar-mobile" class="nav-link open-navbar-container"><i class="icon-ellipsis pe-2x icon-icon-rotate-right-right"></i></a></li>
          </ul>
        </div>
        <div class="navbar-container content container-fluid">
          <div id="navbar-mobile" class="collapse navbar-toggleable-sm">
            <ul class="nav navbar-nav">
              <li class="nav-item hidden-sm-down"><a class="nav-link nav-menu-main menu-toggle hidden-xs"><i class="icon-menu5"></i></a></li>
              <li class="nav-item hidden-sm-down"><a class="nav-link nav-link-expand"><i class="ficon icon-expand2"></i></a></li>
            </ul>
            <ul class="nav navbar-nav float-xs-right">
              <li class="dropdown dropdown-user nav-item">
                <a href="#" data-toggle="dropdown" class="dropdown-toggle nav-link dropdown-user-link"><span class="avatar avatar-online"><img src="<?= base_url().'images/logo-small.png' ?>" alt="avatar"><i></i></span><span class="user-name"><?= $this->session->userdata('nama') ?></span></a>
                <div class="dropdown-menu dropdown-menu-right">
                  <a class="dropdown-item" data-toggle="modal" data-target="#modal-password"><i class="icon-lock" ></i> Ganti Password</a>
                  <div class="dropdown-divider"></div><a href="<?= base_url().'auth/logout_admin' ?>" class="dropdown-item"><i class="icon-power3"></i> Logout</a>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </nav>

    <!-- ////////////////////////////////////////////////////////////////////////////-->


    <!-- main menu-->
    <div class="main-menu menu-fixed menu-dark menu-accordion menu-shadow">
      <div class="main-menu-header"></div>
      <div class="main-menu-content">
        <ul id="main-menu-navigation" data-menu="menu-navigation" class="navigation navigation-main">
          <li>
            <a href="#/evaluasi"><i class="icon-stats-dots"></i><span data-i18n="nav.changelog.main" class="menu-title">Evaluasi</span></a>
          </li>
        </ul>
      </div>
    </div>

    <div class="app-content content container-fluid">
      <div class="content-wrapper" id="content"></div>
    </div>
    <!-- ////////////////////////////////////////////////////////////////////////////-->

<!-- Modal -->
<div class="modal fade text-xs-left" id="modal-password" tabindex="-1" role="dialog" aria-labelledby="myModalLabel19" aria-hidden="true">
									  <div class="modal-dialog modal-sm" role="document">
										<div class="modal-content">
										  <div class="modal-header">
											<button type="button" class="close" data-dismiss="modal" aria-label="Close">
											  <span aria-hidden="true">&times;</span>
											</button>
											<h4 class="modal-title" id="myModalLabel19">Ganti Password</h4>
										  </div>

                      <form class="form-data" >
                          <div class="modal-body">
                            <div class="form-group">
                              <label for="oldpassword">Old Password</label>
                              <input type="password" name="oldpassword" id="oldpassword" class="form-control">
                            </div>
                            <div class="form-group">
                              <label for="newpassword">New Password</label>
                              <input type="password" name="newpassword" id="newpassword" class="form-control">
                            </div>
                            <div class="form-group">
                              <label for="rtpassword">Retype Password</label>
                              <input type="password" name="rtpassword" id="rtpassword" class="form-control">

                            </div>
                         </div>
                         <div class="modal-footer">
                           <button type="button" class="btn grey btn-outline-secondary" data-dismiss="modal">Close</button>
                           <button type="submit" class="btn btn-outline-primary">Save</button>
                         </div>
                        </form>

										</div>
									  </div>
									</div>
    <!-- <footer class="footer footer-static footer-light navbar-border">
      <p class="clearfix text-muted text-sm-center mb-0 px-2"><span class="float-md-left d-xs-block d-md-inline-block">Copyright  &copy; 2017 <a href="https://themeforest.net/user/pixinvent/portfolio?ref=pixinvent" target="_blank" class="text-bold-800 grey darken-2">PIXINVENT </a>, All rights reserved. </span><span class="float-md-right d-xs-block d-md-inline-block">Hand-crafted & Made with <i class="icon-heart5 pink"></i></span></p>
    </footer> -->

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
        var load_content = function(href) {
            $.get(`<?= base_url().'dosen/' ?>${href}`, function(content) {
                $('#content').html(content);
            }).fail(function(jqXHR){
              location.hash = '#/error';
            });
        }

        $(window).on('hashchange', function() {
            href = location.hash.substr(2);
            load_content(href);
        });

        if (location.hash) {
            href = location.hash.substr(2);
            load_content(href);
        } else {
            location.hash = '#/evaluasi';
        }

  			toastr.options = {
  					"closeButton": true,
  					"positionClass": "toast-bottom-right",
  					"preventDuplicates": true
  			}
      });
    </script>
  </body>
</html>
