
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
  <script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
<!-- Page content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Data Jenis Bahan</h1>
    <a href="<?php echo site_url('jenisbahan/jnsbahanController/pageTambah') ?>" class="btn btn-primary">Tambah Jenis Bahan</a>
    <div><br></div>
    <div class="row">
        <!-- Column -->
        <div class="col-lg-12 col-md-7">
            <div class="card">
                <div class="card-block" style="padding: 20px;">
                    <div class="table-responsive">
                        
                        <table class="table table-striped table-bordered" style="width:100%" id="tabeljnsbahan">
                            <thead>
                                <tr>
                                    <th width="20">No.</th>
                                    <th>Nama Bahan</th>
                                    <th>Deskripsi</th>
                                    <th width="125">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 0; ?>
                                <?php foreach ($jnsbahan as $data) {
                                ?>
                                    <tr>
                                        <td>
                                            <?php $i++; ?>
                                            <?php echo $i; ?>
                                        </td>
                                        <td><?php echo $data->nama_bahan; ?></td>
                                        <td><?php echo $data->deskripsi; ?></td>
                                        <td>
                                            <a href="<?php echo site_url('jenisbahan/jnsbahanController/edit/' . $data->id_bahan) ?>" class="btn btn-success">Ubah</a>
                                            <a class="btn btn-xs btn-danger" data-toggle="modal" data-target="#modal_hapus<?php echo $data->id_bahan; ?>" data-backdrop="false"> Hapus</a>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->


<!-- End of Main Content -->

<!-- Footer -->
<footer class="sticky-footer bg-white">
    <div class="container my-auto">
        <div class="copyright text-center my-auto">
            <span>Copyright © 2022 O'MARA</span>
        </div>
    </div>
</footer>



<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top" style="display: none;">
    <i class="fas fa-angle-up"></i>
</a>
<?php
foreach ($jnsbahan as $data) {
?>
    <!-- ============ MODAL HAPUS =============== -->
    <div class="modal fade" id="modal_hapus<?php echo $data->id_bahan; ?>" tabindex="-1" jnsbahan="dialog" aria-labelledby="largeModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="myModalLabel">Hapus Jenis Bahan</h3>
                </div>
                <form class="form-horizontal" method="post" action="<?php echo base_url() . 'jenisbahan/jnsbahanController/hapus/' . $data->id_bahan ?>">
                    <div class="modal-body">
                        <p>Anda yakin mau menghapus <b><?php echo $data->nama_bahan; ?></b> ?</p>
                    </div>
                    <div class="modal-footer">
                        <input type="hidden" name="id_bahan" value="<?php echo $data->id_bahan; ?>">
                        <button class="btn btn-secondary" data-dismiss="modal" aria-hidden="true">Tutup</button>
                        <button class="btn btn-danger">Hapus</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php } ?>

 <!-- Core -->
 <script src="https://code.jquery.com/jquery-3.5.1.js"></script>

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
  
  <script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
<script >
    
   $(document).ready(function() {
    $('#tabeljnsbahan').DataTable();
} );
</script>



</body>

</html>