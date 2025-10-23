<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

<!-- Start Content-->
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card mt-4">
                <!-- start page title -->
                <div class="card-header">
                    <div class="row justify-content-between align-items-center">
                        <div class="col-auto">
                        <h2>Pesanan Masuk</h2>
                        </div>
                    </div> <!-- end row -->
                </div>    
                <!-- end page title --> 

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                        <div class="card-body">

                        <ul class="nav nav-tabs">
                            <li><button><a data-toggle="tab" href="#belumbayar-b1">Pesanan Masuk</a></li></button>
                            <li><button><a data-toggle="tab" href="#diproses-b1">Diproses</a></li></button>
                            <li><button><a data-toggle="tab" href="#dikirim-b1">Dikirim</a></li></button>
                            <li><button><a data-toggle="tab" href="#selesai-b1">Selesai</a></li></button>
                        </ul>
                                <div class="tab-content">
                                    <!-- Tab Belum bayar -->
                                    <div class="tab-pane show active" id="belumbayar-b1">
                                        <table id="" class="display table dt-responsive nowrap w-100">
                                            <thead>
                                                <th>NO</th>
                                                <th>ID TRANSAKSI</th>
                                                <th>TANGGAL</th>
                                                <th class="text-center">PENERIMA</th>
                                                <th>TOTAL</th>
                                                <th class="text-center">STATUS</th>
                                                <th class="text-center">AKSI</th>
                                            </thead>
                                        
                                            <tbody>
                                                <?php
                                                    $no=1;
                                                    foreach($pesanan as $key => $value) {
                                                ?>

                                                    <tr>
                                                    <?php if($value->tj_status==2) { ?>
                                                        <td><?php echo $no++ ?></td>
                                                        <td><?php echo $value->tj_id ?></td>
                                                        <td><?php echo $value->tj_tanggal ?></td>
                                                        <td class="text-center"> <?php echo $value->tj_nama ?></td>
                                                        <td><b>Rp <?php echo number_format( $value->tj_total, 0, ',', '.') ?></b></td>
                                                        <td class="text-center">
                                                            <span class="badge bg-success">Sudah Bayar</span> <br>
                                                            <span class="badge bg-primary">Menunggu Verifikasi</span>
                                                        </td>
                                                        <td class="text-center">
                                                            <?php if($value->tj_status==2) { ?>
                                                                <button class="btn btn-sm btn-success btn-flat" 
                                                                data-bs-toggle="modal" data-bs-target="#cek<?= $value->tj_id ?>">Cek Bukti Bayar</button>
                                                                <a href="<?= base_url('Dashboard/proses/' .$value->tj_id) ?>" class="btn btn-primary btn-sm"><i class="fa fa-download">&nbsp;</i>Proses</a>
                                                            <?php } ?>                                                            
                                                        </td>
                                                    <?php }
                                                    else { ?>
                                                            <?php if($value->tj_status==1) { ?>
                                                                <td><?php echo $no++ ?></td>
                                                                <td><?php echo $value->tj_id ?></td>
                                                                <td><?php echo $value->tj_tanggal ?></td>
                                                                <td class="text-center"> <?php echo $value->tj_nama ?></td>
                                                                <td><b>Rp <?php echo number_format( $value->tj_total, 0, ',', '.') ?></b></td>
                                                                <td class="text-center">
                                                                    <span class="badge bg-danger">Belum Bayar</span>
                                                                </td><td></td>
                                                            <?php } ?>
                                                        <?php } ?>
                                                    </tr>
                                                <?php }  ?>
                                            </tbody>
                                        </table>
                                    </div>
                                    <!-- End Tab Belum bayar -->

                                    <!-- Tab Proses -->
                                    <div class="tab-pane" id="diproses-b1">
                                        <table id="" class="display table dt-responsive nowrap w-100">
                                            <thead>
                                                <th>NO</th>
                                                <th>ID TRANSAKSI</th>
                                                <th>TANGGAL</th>
                                                <th class="text-center">PENERIMA</th>
                                                <th>TOTAL</th>
                                                <th class="text-center">STATUS</th>
                                                <th class="text-center">AKSI</th>
                                            </thead>
                                        
                                            <tbody>
                                                <?php
                                                    $no=1;
                                                    foreach($diproses as $key => $value) {
                                                ?>

                                                    <tr>
                                                    <?php if($value->tj_status==3) { ?>
                                                        <td><?php echo $no++ ?></td>
                                                        <td><?php echo $value->tj_id ?></td>
                                                        <td><?php echo $value->tj_tanggal ?></td>
                                                        <td class="text-center"> <?php echo $value->tj_nama ?></td>
                                                        <td><b>Rp <?php echo number_format( $value->tj_total, 0, ',', '.') ?></b></td>
                                                        <td class="text-center">
                                                            <span class="badge bg-success">Sedang Dikemas</span> <br>
                                                            <span class="badge bg-primary">Menunggu Verifikasi</span>
                                                        </td>
                                                        <td class="text-center">
                                                            <?php if($value->tj_status==3) { ?>
                                                                <button class="btn btn-sm btn-primary btn-flat" 
                                                                data-bs-toggle="modal" data-bs-target="#kirim<?= $value->tj_id ?>"><i class="fa fa-truck">&nbsp;</i>Kirim</button>
                                                            <?php } ?>                                                            
                                                        </td>
                                                    <?php }?>
                                                    </tr>
                                                <?php }  ?>
                                            </tbody>
                                        </table>
                                    </div>
                                    <!-- End Tab Proses -->

                                    <!-- Tab Dikirm -->
                                    <div class="tab-pane" id="dikirim-b1">
                                        <table id="" class="display table dt-responsive nowrap w-100">
                                            <thead>
                                                <th>NO</th>
                                                <th>ID TRANSAKSI</th>
                                                <th>NO RESI</th>
                                                <th>TANGGAL</th>
                                                <th class="text-center">PENERIMA</th>
                                                <th>TOTAL</th>
                                                <th class="text-center">STATUS</th>
                                            </thead>
                                        
                                            <tbody>
                                                <?php
                                                    $no=1;
                                                    //dikirim
                                                    foreach($pesanan as $key => $value) {
                                                ?>
                                                    <tr>
                                                    <?php if($value->tj_status==4) { ?>
                                                        <td><?php echo $no++ ?></td>
                                                        <td><?php echo $value->tj_id ?></td>
                                                        <td><?php echo $value->tj_resi ?></td>
                                                        <td><?php echo $value->tj_tanggal ?></td>
                                                        <td class="text-center"> <?php echo $value->tj_nama ?></td>
                                                        <td><b>Rp <?php echo number_format( $value->tj_total, 0, ',', '.') ?></b></td>
                                                        <td class="text-center">
                                                            <span class="badge bg-success"><i class="fa fa-truck">&nbsp;</i></span> <br>
                                                            <span class="badge bg-primary">Sedang Dikirim</span>
                                                        </td>
                                                    <?php }?>
                                                    </tr>
                                                <?php }  ?>
                                            </tbody>
                                        </table> 
                                    </div>
                                    <!-- End Tab Dikirm -->

                                    <!-- Tab Selesai -->
                                    <div class="tab-pane" id="selesai-b1">
                                    <table id="" class="display table dt-responsive nowrap w-100">
                                            <thead>
                                                <th>NO</th>
                                                <th>ID TRANSAKSI</th>
                                                <th>NO RESI</th>
                                                <th>TANGGAL</th>
                                                <th class="text-center">PENERIMA</th>
                                                <th>TOTAL</th>
                                                <th class="text-center">STATUS</th>
                                            </thead>
                                        
                                            <tbody>
                                                <?php
                                                    $no=1;
                                                    foreach($pesanan as $key => $value) {
                                                ?>

                                                    <tr>
                                                    <?php if($value->tj_status==5) { ?>
                                                        <td><?php echo $no++ ?></td>
                                                        <td><?php echo $value->tj_id ?></td>
                                                        <td><?php echo $value->tj_resi ?></td>
                                                        <td><?php echo $value->tj_tanggal ?></td>
                                                        <td class="text-center"> <?php echo $value->tj_nama ?></td>
                                                        <td><b>Rp <?php echo number_format( $value->tj_total, 0, ',', '.') ?></b></td>
                                                        <td class="text-center">
                                                            <span class="badge bg-warning">Belum Konfirmasi</span><br>
                                                            <span class="badge bg-primary">Sudah Di Pembeli</span>
                                                        </td>
                                                    <?php }
                                                    else { ?>
                                                            <?php if($value->tj_status==0) { ?>
                                                                <td><?php echo $no++ ?></td>
                                                                <td><?php echo $value->tj_id ?></td>
                                                                <td><?php echo $value->tj_resi ?></td>
                                                                <td><?php echo $value->tj_tanggal ?></td>
                                                                <td class="text-center"> <?php echo $value->tj_nama ?></td>
                                                                <td><b>Rp <?php echo number_format( $value->tj_total, 0, ',', '.') ?></b></td>
                                                                <td class="text-center">
                                                                    <span class="badge bg-success">Selesai</span>
                                                                </td><td></td>
                                                            <?php } ?>
                                                        <?php } ?>
                                                    </tr>
                                                <?php }  ?>
                                            </tbody>
                                        </table> 
                                    </div>
                                    <!-- End Tab Selesai -->
                                </div>
                            </div>
                        </div> <!-- end card-->
                    </div> <!-- end col -->
                </div>
            </div> <!-- container -->
        </div> <!-- content -->
    </div>
</div>

<!-- cek modal bukti pembayaran -->
<?php foreach ($pesanan as $key => $value) { ?>
    <div class="modal fade" id="cek<?= $value->tj_id ?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myLargeModalLabel"><?= $value->tj_id ?></h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <table class="table">
                        <tr>
                            <th>Nama Bank</th>
                            <th>:</th>
                            <td><?= $value->tj_nama_bank ?></td>
                        </tr>
                        <tr>
                            <th>No Rekening</th>
                            <th>:</th>
                            <td><?= $value->tj_no_rek ?></td>
                        </tr>
                        <tr>
                            <th>Atas Nama</th>
                            <th>:</th>
                            <td><?= $value->tj_atas_nama ?></td>
                        </tr>
                        <tr>
                            <th>Total Bayar</th>
                            <th>:</th>
                            <td><?= number_format($value->tj_total,0) ?></td>
                        </tr>
                    </table>

                    <img class="img-fluid pad" src="<?= base_url('assets/bukti_bayar/'.$value->tj_bukti_bayar) ?>" alt="">

                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
<?php } ?>

<!-- cek modal bukti pembayaran -->
<?php foreach ($diproses as $key => $value) { ?>
    <div class="modal fade" id="kirim<?= $value->tj_id ?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myLargeModalLabel"><?= $value->tj_id ?></h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <?php echo form_open('c_admin/kirim/' . $value->tj_id)?>
                    <table class="table">
                        <tr>
                            <th>Nama</th>
                            <th>:</th>
                            <th><?= $value->tj_nama ?></th>
                        </tr>
                        <tr>
                            <th>Alamat</th>
                            <th>:</th>
                            <th><?= $value->tj_alamat ?></th>
                        </tr>
                        <tr>
                            <th>Telepon</th>
                            <th>:</th>
                            <th><?= $value->tj_telepon ?></th>
                        </tr>
                        <tr>
                            <th>Ongkir</th>
                            <th>:</th>
                            <th><?= $value->tj_ongkir ?></th>
                        </tr>
                        <tr>
                            <th>No Resi</th>
                            <th>:</th>
                            <th><input name='tj_resi' class='form-control' required></th>
                        </tr>
                        <tr>
                            <th>Kurir</th>
                            <th>:</th>
                            <th><input name='tj_kurir' class='form-control' required></th>
                        </tr>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary" aria-label="Kirim">Kirim</button>
                </div>
                <?php echo form_close()?>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
<?php } ?>
