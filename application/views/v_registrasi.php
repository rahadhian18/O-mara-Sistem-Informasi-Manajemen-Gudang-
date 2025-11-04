<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
  <meta name="author" content="Creative Tim">
  <title>Omara - Register</title>
  <!-- Favicon -->
  <link rel="icon" href="../assets/img/brand/favicon.png" type="image/png">
  <!-- Fonts -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
  <!-- Icons -->
  <link rel="stylesheet" href="../assets/vendor/nucleo/css/nucleo.css" type="text/css">
  <link rel="stylesheet" href="../assets/vendor/@fortawesome/fontawesome-free/css/all.min.css" type="text/css">
  <!-- Argon CSS -->
  <link rel="stylesheet" href="../assets/css/argon.css?v=1.2.0" type="text/css">
</head>

<body class="bg-default">
  <!-- Navbar -->
  <nav id="navbar-main" class="navbar navbar-horizontal navbar-transparent navbar-main navbar-expand-lg navbar-light">
    <div class="container">
      <a class="navbar-brand" href="dashboard.html">
        <img src="../assets/img/brand/logoungu.png">
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-collapse" aria-controls="navbar-collapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="navbar-collapse navbar-custom-collapse collapse" id="navbar-collapse">
        <div class="navbar-collapse-header">
          <div class="row">
            <div class="col-6 collapse-brand">
              <a href="dashboard.html">
                <img src="../assets/img/brand/Coba.png">
              </a>
            </div>
            <div class="col-6 collapse-close">
              <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbar-collapse" aria-controls="navbar-collapse" aria-expanded="false" aria-label="Toggle navigation">
                <span></span>
                <span></span>
              </button>
            </div>
          </div>
        </div>
        <ul class="navbar-nav mr-auto">
          <li class="nav-item">
            <a href="<?php echo base_url('LoginPelanggan') ?>" class="nav-link">
              <span class="nav-link-inner--text">Login</span>
            </a>
          </li>
        </ul>
        <hr class="d-lg-none" />
        <ul class="navbar-nav align-items-lg-center ml-lg-auto">
        </ul>
      </div>
    </div>
  </nav>
  <!-- Main content -->
  <div class="main-content">
    <!-- Header -->
    <div class="header bg-gradient-primary py-7 py-lg-8 pt-lg-9">
      <div class="container">
        <div class="header-body text-center mb-7">
          <div class="row justify-content-center">
            <div class="col-xl-5 col-lg-6 col-md-8 px-5">
              <h1 class="text-white">Registrasi</h1>
              <p class="text-lead text-white">Silahkan Registrasi Terlebih Dahulu Untuk Melihat Katalog Produk Kami</p>
            </div>
          </div>
        </div>
      </div>
      <div class="separator separator-bottom separator-skew zindex-100">
        <svg x="0" y="0" viewBox="0 0 2560 100" preserveAspectRatio="none" version="1.1" xmlns="http://www.w3.org/2000/svg">
          <polygon class="fill-default" points="2560 0 2560 100 0 100"></polygon>
        </svg>
      </div>
    </div>
    <!-- Page content -->
    <div class="container mt--8 pb-5">
      <!-- Table -->
      <div class="row">
        <div class="col-lg-12">
            <div class="p-sm-3">

                <?php 
                //notifikasi validasi
                echo validation_errors('
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true"></span>
                    </button>
                ',' <span class="alert-text"> </div>');

                echo form_open_multipart('Home/registrasi') ?>

                <form action="<?php echo base_url('Home/registrasi') ?>" method="post" enctype="multipart/form-data">
                    <div class="row mb-3">
                        <div class="col-6">
                            <label class="text-white">Username</label>
                            <input class="form-control" type="text" name="username" placeholder="Masukan Nama Pengguna.." required>
                        </div>
                        <div class="col-6">
                            <label class="text-white">Password</label>
                            <input class="form-control" type="password" name="password" placeholder="Masukan Kata Sandi.." required>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="text-white">Nama Pelanggan</label>
                        <input class="form-control" type="text" name="nama_pelanggan" placeholder="Masukan Nama Lengkap.." required>
                    </div>
                    <div class="row mb-3">
                        <div class="col-6">
                            <label class="text-white">Telepon</label>
                            <input class="form-control" type="text" name="telepon" placeholder="Masukan Telepon.." required>
                        </div>
                        <div class="col-6">
                            <label class="text-white">Email</label>
                            <input class="form-control" type="text" name="email" placeholder="Masukan Email.." required>
                        </div>
                    </div>
                    <!-- <div class="mb-3">
                        <label class="text-white">Alamat</label>
                        <textarea class="form-control" name="alamat" rows="3"></textarea>
                    </div> -->
                    <div class="mt-4 mb-0">
                        <button class="btn btn-primary w-100 waves-effect waves-light" type="submit"> Sign Up </button>
                        <a href="<?php echo base_url('Home/registrasi'); ?>" class="btn btn-outline-primary w-100 waves-effect waves-light mt-2"> </a>
                    </div>
                </form>
                
                <?php echo form_close() ?>
            </div>
            
        </div> <!-- end col -->
    </div>
    <!-- end row-->

</div> <!-- end card-body -->
</div>
<!-- end card -->

</div> <!-- end col -->
</div>
<!-- end row -->
</div>
<!-- end container -->
</div>
        <!-- end page -->

        <!-- Vendor js -->
        <script src="<?php echo base_url() ?>template/system/js/vendor.min.js"></script>

        <!-- App js -->
        <script src="<?php echo base_url() ?>template/system/js/app.min.js"></script>
        
    </body>
</html>
  <!-- Footer -->
  <footer class="py-5" id="footer-main">
    <div class="container">
      <div class="row align-items-center justify-content-xl-between">
        <div class="col-xl-6">
          <div class="copyright text-center text-xl-left text-muted">
            &copy; 2020 <a href="https://www.creative-tim.com" class="font-weight-bold ml-1" target="_blank">Creative Tim</a>
          </div>
        </div>
        <div class="col-xl-6">
          <ul class="nav nav-footer justify-content-center justify-content-xl-end">
            <li class="nav-item">
              <a href="https://www.creative-tim.com" class="nav-link" target="_blank">Creative Tim</a>
            </li>
            <li class="nav-item">
              <a href="https://www.creative-tim.com/presentation" class="nav-link" target="_blank">About Us</a>
            </li>
            <li class="nav-item">
              <a href="http://blog.creative-tim.com" class="nav-link" target="_blank">Blog</a>
            </li>
            <li class="nav-item">
              <a href="https://github.com/creativetimofficial/argon-dashboard/blob/master/LICENSE.md" class="nav-link" target="_blank">MIT License</a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </footer>
  <!-- Argon Scripts -->
  <!-- Core -->
  <script src="../assets/vendor/jquery/dist/jquery.min.js"></script>
  <script src="../assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <script src="../assets/vendor/js-cookie/js.cookie.js"></script>
  <script src="../assets/vendor/jquery.scrollbar/jquery.scrollbar.min.js"></script>
  <script src="../assets/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js"></script>
  <!-- Argon JS -->
  <script src="../assets/js/argon.js?v=1.2.0"></script>
</body>

</html>

                                