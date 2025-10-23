
<!-- Page content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Pembelian Produk</h1>
    <a href="<?php echo base_url('c_tr_beli/view_keranjang') ?>"><i class="fa fa-shopping-cart"></i> Keranjang</a>
    <div><br></div>
    <div class="row">
        <!-- Column -->
        <div class="col-lg-12 col-md-7">
            
        <div class="card-body">
                    <table id="basic-datatable" class="table dt-responsive nowrap w-100">
                        <thead>
                            <th>NO</th>
                            <th>NAMA</th>
                            <th>HARGA</th>
                            <th class="text-center">STOK</th>
                            <th class="text-center">AKSI</th>
                        </thead>
                    
                        <tbody>
                            <?php
                                $no=1;
                                foreach($Clothing as $fn) {
                            ?>

                                <tr>

                                    <?php
                                        echo form_open('c_tr_beli/add_keranjang');
                                        echo form_hidden('id', $fn->id_produk);
                                        echo form_hidden('qty', 1);
                                        echo form_hidden('price', $fn->harga_beli);
                                        echo form_hidden('name', $fn->nama_produk);
                                        echo form_hidden('redirect_page',str_replace('index.php/','',current_url()));
                                    ?>

                                    <td><?php echo $no++ ?></td>
                                    <td><?php echo $fn->nama_produk ?></td>
                                    <td>Rp <?php echo number_format($fn->harga_beli, 0, ',', '.') ?></td>
                                    <td class="text-center"><?php echo $fn->stok ?></td>
                                    <td class="text-center">
                                        <a href="<?= base_url('c_tr_beli/detail_produk/' .$fn->id_produk) ?>" class="btn btn-outline-primary waves-effect waves-light btn-sm"><i class="fa fa-eye"></i></a>
                                        <button type="submit" class="btn btn-primary waves-effect waves-light btn-sm swalDefaultSuccess"><i class="fas fa-cart-plus">&nbsp;</i>Tambah</button>
                                    </td>

                                    <?php echo form_close(); ?>

                                </tr>
                            <?php }  ?>
                        </tbody>
                    </table>
        </div> <!-- end card body-->
       

    </div>
    <!-- /.container-fluid -->


<!-- End of Main Content -->

<!-- Footer -->
<footer class="sticky-footer bg-white">
    <div class="container my-auto">
        <div class="copyright text-center my-auto">
            <span>Copyright © 2022 O'MARA </span>
        </div>
    </div>
</footer>




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
  <script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>

<script type="text/javascript">
    $(document).ready(function() {
        $('#basic-datatable').DataTable();
    });
</script>



</body>

</html>