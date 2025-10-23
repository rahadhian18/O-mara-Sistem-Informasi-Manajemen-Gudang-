
<!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800">Tambah Data Produk</h1>
<div><br></div>
<div class="row">
    <!-- Column -->
    <div class="col-lg-12 col-md-7">
        <div class="card">
            <div class="card-block">
                <form supplier="form" action="<?php echo site_url('produk/produkController/tambah') ?>" method="post" enctype="multipart/form-data">
                    <div class="box-body">
                        <input hidden="true" class="form-control" type="text" name="creaby" value="<?php echo $this->session->userdata('id_kary'); ?>">
                        
                        
                        <!-- ddl Bahan -->
                        <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="control-label">Jenis Bahan<span style="color: red">*</span></label>
                                        <br />
                                        <select class="form-control" name="id_bahan" required="">
                                        <option disabled selected>--Pilih Bahan--</option>
                                        <?php
                                         foreach ($bahan as $row) {
                                        echo '<option value="' . $row->id_bahan . '">' . $row->nama_bahan. '</option>';
                                        }
                                         ?>
                                        </select>
                                        
                                    </div>
                                </div>
                            </div>

                             <!-- ddl ukuran -->
                            <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="control-label">Ukuran Produk<span style="color: red">*</span></label>
                                        <br />
                                        <select class="form-control" name="id_ukuran" required="">
                                        <option disabled selected>--Pilih Ukuran--</option>
                                        <?php
                                         foreach ($ukuran as $row) {
                                        echo '<option value="' . $row->id_ukuran . '">' . $row->ukuran. '</option>';
                                        }
                                         ?>
                                        </select>
                                        
                                    </div>
                                </div>
                            </div>

                               <!-- ddl Jenis Produk -->
                               <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="control-label">Jenis Produk<span style="color: red">*</span></label>
                                        <br/>
                                        <select class="form-control" name="id_jnsproduk" required="">
                                        <option disabled selected>--Pilih Jenis Produk--</option>
                                        <?php
                                         foreach ($jnsproduk as $row) {
                                        echo '<option value="' . $row->id_jnsproduk . '">' . $row->nama_jnsproduk. '</option>';
                                        }
                                         ?>
                                        </select>
                                        
                                    </div>
                                </div>
                            </div>

                        <div class="col-lg-5 mb-3">
                            <label for="nama_produk">Nama<span style="color:red"> * </span></label>
                            <input type="text" class="form-control" id="nama_produk" name="nama_produk" required>
                        </div>
                        
                        <!-- gambar -->
                        <div class="col-lg-5 mb-3">
                        <label for="gambar">Gambar Produk</label>
                        <input type="file" class="form-control"  name="gambar" required>
                        </div>


                        <!-- <label class="control-label">Gambar<span style="color: red">*</span></label>
                        <input type="file" class="form-control mb-4" name="gambar" id="preview_gambar" placeholder="Pilih gambar.." required> -->

                       

                        <div class="col-lg-5 mb-3">
                            <label for="harga_beli">Harga Beli<span style="color:red"> * </span></label>
                            <textarea class="form-control" name="harga_beli" required=""></textarea>
                        </div>
                        <div class="col-lg-5 mb-3">
                            <label for="harga_jual">Harga Jual<span style="color:red"> * </span></label>
                            <textarea class="form-control" name="harga_jual" required=""></textarea>
                        </div>
                        <div class="col-lg-5 mb-3">
                            <label for="stok">Stok<span style="color:red"> * </span></label>
                            <textarea class="form-control" name="stok" required=""></textarea>
                        </div>
                                
                            
                        </div>
                        <div class="col-lg-5 mb-3">
                            <a href="<?php echo site_url('produk/produkController') ?>" class="btn btn-secondary">Kembali</a>
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

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" supplier="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog" supplier="document">
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
$(document).on('keypress', '#nama_produk', function(event) {
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