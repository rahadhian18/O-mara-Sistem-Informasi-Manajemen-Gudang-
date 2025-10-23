                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800">Ubah Data Karyawan</h1>
                    <div><br></div>
                    <div class="row">
                        <!-- Column -->
                        <div class="col-lg-12 col-md-7">
                            <div class="card">
                                <div class="card-block">
                                    <section class="content">
                                        <?php foreach ($karyawan as $data) { ?>
                                            <form role="form" action="<?php echo base_url() . 'karyawan/karyawanController/update'; ?>" method="post">
                                                <div class="box-body">
                                                    <input hidden="true" class="form-control" type="text" name="updated_by" value="<?php echo $this->session->userdata('id_kary'); ?>">
                                                    <input type="text" hidden="true" class="form-control" name="id_kary" value="<?php echo $data->id_kary ?>" required>


                                                    <div class="col-lg-5 mb-3">
                                                        <label for="nama_tipe">Nama<span style="color:red"> * </span></label>
                                                        <input type="text" class="form-control" placeholder="Masukkan Nama" name="nama_kary" value="<?php echo $data->nama_kary ?>" required>
                                                    </div>

                                                    <div class="col-lg-5 mb-3">
                                                        <label for="nama_tipe">Nama Pengguna<span style="color:red"> * </span></label>
                                                        <input type="text" class="form-control" placeholder="Masukkan Nama Pengguna" name="username" value="<?php echo $data->username ?>" required>
                                                    </div>

                                                    <div class="col-lg-5 mb-3">
                                                        <label for="nama_tipe">Kata Sandi<span style="color:red"> * </span></label>
                                                        <input type="password" class="form-control" placeholder="Masukkan Kata Sandi" name="password" value="<?php echo $data->password ?>" required>
                                                    </div>

                                                    <div class="col-lg-5 mb-3">
                                                        <label for="nama_tipe">E-Mail<span style="color:red"> * </span></label>
                                                        <input type="text" class="form-control" placeholder="Masukkan Alamat Email" name="email" value="<?php echo $data->email ?>" required>
                                                    </div>

                                                    <div class="col-lg-5 mb-3">
                                                        <label for="nama_tipe">Tipe Pengguna<span style="color:red"> * </span></label>
                                                        <select class="form-control" name="id_role" required="">
                                                            <?php foreach ($role as $row) { ?>
                                                                <option value="<?php echo $row->id_role ?>" <?php echo $row->id_role == $data->id_role ? "selected" : "" ?>>
                                                                    <?php echo $row->nama_role ?>
                                                                </option>
                                                            <?php } ?>
                                                        </select>
                                                    </div>

                                                    <div class="col-lg-5 mb-3">
                                                        <a href="<?php echo site_url('karyawan/karyawanController') ?>" class="btn btn-secondary">Kembali</a>
                                                        &nbsp;&nbsp;
                                                        <button type="submit" class="btn btn-primary">Simpan</button>
                                                    </div>

                                                </div>
                                            </form>
                                        <?php } ?>
                                    </section>
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

                <!-- Logout Modal-->
                <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>
                            <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                            <div class="modal-footer">
                                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                                <a class="btn btn-primary" href="login.html">Logout</a>
                            </div>
                        </div>
                    </div>
                </div>

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

                <script type="text/javascript">
                    $(document).ready(function() {
                        $('#tabeljnsproduk').DataTable();
                    });
                </script>
                </body>


                </html>