<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Tambah Data Karyawan</h1>
    <div><br></div>
    <div class="row">
        <!-- Column -->
        <div class="col-lg-12 col-md-7">
            <div class="card">
                <div class="card-block">
                    <form user="form" action="<?php echo site_url('karyawan/karyawanController/tambah') ?>" method="post">

                        <div class="box-body">
                            <input hidden="true" class="form-control" type="text" name="created_by" value="<?php echo $this->session->userdata('id_kary'); ?>">

                            <div class="col-lg-5 mb-3">
                                <label for="nama_tipe">Nama<span style="color:red"> * </span></label>
                                <input type="text" class="form-control" placeholder="Masukkan Nama" name="nama_kary" required>
                            </div>

                            <div class="col-lg-5 mb-3">
                                <label for="nama_tipe">Nama Pengguna<span style="color:red"> * </span></label>
                                <input type="text" class="form-control" placeholder="Masukkan Username" id="username" name="username" required>
                                <span class="error_form" style="color: red;" id="UsernameMsg"></span>
                                <select hidden="true" class="form-control" name="username2" id="username2" required>
                                    <?php
                                    foreach ($username as $row) {
                                        echo '<option hidden="true" value="' . $row->username . '">' . $row->username . '</option>';
                                    }
                                    ?>
                                </select>
                            </div>

                            <div class="col-lg-5 mb-3">
                                <label for="nama_tipe">Kata Sandi<span style="color:red"> * </span></label>
                                <input type="password" class="form-control" placeholder="Masukkan Kata Sandi" name="password" id="txtPassword" required>
                            </div>
                            <div class="col-lg-5 mb-3">
                                <label for="txtPasswordConfirm">Konfirmasi Kata Sandi</label>
                                <input type="password" class="form-control" name="password2" id="txtPasswordConfirm" required placeholder="Input password">
                                <span class="error_form" style="color: red;" id="PWMsg"></span>
                            </div>

                            <div class="col-lg-5 mb-3">
                                <label for="nama_tipe">E-Mail<span style="color:red"> * </span></label>
                                <input type="email" class="form-control" placeholder="Masukkan Alamat Email" name="email" required>
                            </div>

                            <div class="col-lg-5 mb-3">
                                <label for="nama_tipe">Tipe Pengguna<span style="color:red"> * </span></label>
                                <!-- <input type="text" class="form-control" placeholder="Masukkan Nama Tipe" name="id_role" required> -->
                                <select class="form-control" name="id_role" required>
                                    <option value="" selected="selected">Pilih Tipe Pengguna</option>
                                    <?php
                                    foreach ($role as $row) {
                                        echo '<option value="' . $row->id_role . '">' . $row->nama_role . '</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="col-lg-5 mb-3">
                                <a href="<?php echo site_url('karyawan/karyawanController') ?>" class="btn btn-secondary">Kembali</a>
                                &nbsp;&nbsp;
                                <button type="submit" id="submit" class="btn btn-primary">Simpan</button>
                            </div>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<!-- Footer -->
<footer class="sticky-footer bg-white">
    <div class="container my-auto">
        <div class="copyright text-center my-auto">
            <span>Copyright © 2022 O'MARA</span>
        </div>
    </div>
</footer>
<!-- End of Footer -->

</div>
<!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top" style="display: none;">
    <i class="fas fa-angle-up"></i>
</a>


<!-- Core -->
<script src="<?php echo base_url('assets/vendor/jquery/dist/jquery.min.js') ?>"></script>
  <script src="<?php echo base_url('assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js') ?>"></script>
  <script src="<?php echo base_url('assets/vendor/js-cookie/js.cookie.js') ?>"></script>
  <script src="<?php echo base_url('assets/vendor/jquery.scrollbar/jquery.scrollbar.min.js') ?>"></script>
  <script src="<?php echo base_url('assets/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js') ?>"></script>
  <!-- Optional JS -->
  <script src="<?php echo base_url('assets/vendor/chart.js/dist/Chart.min.js') ?>"></script>
  <script src="<?php echo base_url('assets/vendor/chart.js/dist/Chart.extension.js') ?>"></script>
  <!-- Argon JS -->
  <script src="<?php echo base_url('assets/js/argon.js?v=1.2.0') ?>"></script>
<script>

    function confirmUsername(){
          var length = $('#username2 > option').length;

          var username1=$("#username").val();
          var username2=$('#username2 option:not(:selected)');
          if(username1 != username2){
            $("#UsernameMsg").hide();
            $('#submit').prop('disabled', false);
          }else{
            $("#UsernameMsg").html("Username sudah tersedia");
            $("#UsernameMsg").show();
            $('#submit').prop('disabled', true);
            error_username_confirm = true;
          }
        }

    //konfirmasi password
        function confirmPassword(){
          var pw1=$("#txtPassword").val();
          var pw2=$("#txtPasswordConfirm").val();
          if(pw1 === pw2){
            $("#PWMsg").hide();
            $('#submit').prop('disabled', false);
          }else{
            $("#PWMsg").html("Password Tidak Cocok");
            $("#PWMsg").show();
            $('#submit').prop('disabled', true);
            error_password_confirm = true;
          }
        }

        $(function() {
            $("#PWMsg").hide();

            var error_password_confirm = false;
            var error_username_confirm = false;

            $("#txtPasswordConfirm").focusout(function(){
                confirmPassword();
            });

            $("#username").focusout(function(){
                confirmUsername();
            });
        });
</script>


</body>

</html>