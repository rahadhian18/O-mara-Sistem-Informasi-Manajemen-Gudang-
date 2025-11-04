
<!-- Begin Page Content -->
<div class="container-fluid">
                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800">Ubah Data Jenis Produk</h1>
                    <div><br></div>
                    <div class="row">
                    <!-- Column -->
                    <div class="col-lg-12 col-md-7">
                        <div class="card">
                            <div class="card-block">
                                <section class = "content">
                                    <?php foreach ($jnsproduk as $data) { ?>
	                                <form $jnsproduk="form" action="<?php echo base_url().'jenisproduk/jnsprodukController/update'; ?>" method="post">
	                                    <div class="box-body">
	                                    	<input type="text" hidden="true" class="form-control" name="id_jnsproduk" value="<?php echo $data->id_jnsproduk ?>" required>
                                            <input hidden="true" class="form-control" type="text" name="modiby" value="<?php echo $this->session->userdata('id_kary'); ?>">
	                                        <div class="col-lg-5 mb-3">
	                                            <label for ="nama_jnsproduk">Nama<span style="color:red"> * </span></label>
                                                <input id="nama_jnsproduk" type="text" class="form-control" name="nama_jnsproduk" value="<?php echo $data->nama_jnsproduk ?>" required>
	                                        </div>
	                                        <div class="col-lg-5 mb-3">
	                                            <label for ="deskripsi">Deskripsi<span style="color:red"> * </span></label>
	                                            <input type="text" class="form-control" name="deskripsi" value="<?php echo $data->deskripsi ?>" required>
	                                        </div>
                                            <div class="col-lg-5 mb-3">
    	                                        <a href="<?php echo site_url('jenisproduk/jnsprodukController') ?>" class="btn btn-secondary">Kembali</a>
    	                                        &nbsp;&nbsp;
    	                                        <button type="submit" class="btn btn-primary" >Simpan</button>
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
                            <span>Copyright © 20225 DAZZLE HEAVEN</span>
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
                <div class="modal fade" id="logoutModal" tabindex="-1" jnsproduk="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" jnsproduk="document">
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

                <script>
                    //validasi nama
                    $(document).on('keypress', '#nama_jnsproduk', function(event) {
                        var regex = new RegExp("^[a-zA-Z ]+$");
                        var key = String.fromCharCode(!event.charCode ? event.which : event.charCode);
                        if (!regex.test(key)) {
                            event.preventDefault();
                            return false;
                        }
                    });
                </script>

                </body>

                </html>