
<!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800">Tambah Data Jenis Produk</h1>
<div><br></div>
<div class="row">
    <!-- Column -->
    <div class="col-lg-12 col-md-7">
        <div class="card">
            <div class="card-block">
                <form jnsproduk="form" action="<?php echo site_url('jenisproduk/jnsprodukController/tambah') ?>" method="post">
                    <div class="box-body">
                        <input hidden="true" class="form-control" type="text" name="creaby" value="<?php echo $this->session->userdata('id_kary'); ?>">
                        <div class="col-lg-5 mb-3">
                            <label for="nama_jnsproduk">Nama<span style="color:red"> * </span></label>
                            <input type="text" class="form-control" id="nama_jnsproduk" name="nama_jnsproduk" required>
                        </div>
                        <div class="col-lg-5 mb-3">
                            <label for="nama">Deskripsi<span style="color:red"> * </span></label>
                            <textarea class="form-control" name="deskripsi" required=""></textarea>
                        </div>
                        <div class="col-lg-5 mb-3">
                            <a href="<?php echo site_url('jenisproduk/jnsprodukController') ?>" class="btn btn-secondary">Kembali</a>
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
        <span>Copyright © 2025 DAZZLE HEAVEN</span>
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

<!-- Bootstrap core JavaScript-->
<script src="<?php echo base_url('assets/vendor/jquery/jquery.min.js') ?>"></script>
<script src="<?php echo base_url('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>

<!-- Core plugin JavaScript-->
<script src="<?php echo base_url('assets/vendor/jquery-easing/jquery.easing.min.js') ?>"></script>

<!-- Custom scripts for all pages-->
<script src="<?php echo base_url('assets/js/sb-admin-2.min.js') ?>"></script>

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