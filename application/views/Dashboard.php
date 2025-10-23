<div class="container-fluid">


    <!-- </div class="navbar">
                <ul class="nav navbar-nav">
                    <li>
                        <?php
                        $keranjang = 'Keranjang Belanja: ' . $this->cart->total_items() . 'items'
                        ?>

                        <?php echo $keranjang ?>
                    </li>
                </ul>
            </div>    
    <div class="row text-center"> -->

    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card mt-4">
                    <!-- Card header -->
                    <div class="card-header">
                        <div class="row justify-content-between align-items-center">
                            <div class="col-auto">
                                <h2>Pembelian Produk </h2>
                            </div>
                            <div class="col-auto">
                                <div class="text-lg-end my-1 my-lg-0">
                                    <a href="<?php echo base_url('DashboardPelanggan/detail_keranjang/') ?>"><i class="fa fa-shopping-cart"></i> Keranjang</a>
                                    &nbsp;<a href="<?php echo base_url('DashboardPelanggan/daftar_transaksi/') ?>"><i class="fa-solid fa-sidebar"></i> Daftar Transaksi</a>
                                </div>
                            </div><!-- end col-->
                        </div> <!-- end row -->
                    </div>
                    <div class="col-md-6 col-xl-3">
                        <div class="border p-3 mt-4 mt-lg-10 rounded">
                            <h4 class="header-title mb-3">Total Keranjang</h4>
                            <div class="table-responsive">
                                <table class="table mb-0">
                                    <tbody>
                                        <tr>
                                            <th>Total :</th>
                                            <th class="text-sm-end">Rp <?php echo number_format($this->cart->total(), 0, ',', '.'); ?></th>


                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div><br><br>

                    <div class="container-fluid">
                        <div class="row text-center">
                            <?php foreach ($produk as $prd) : ?>

                                <div class="card ml-3" style="width: 18rem;">
                                    <div class="bg-light p-2 text-center">
                                        <img src="<?php echo base_url('img/' . $prd->gambar); ?>"
                                            alt="product-pic"
                                            class="img-fluid"
                                            onerror="this.onerror=null;this.src='<?php echo base_url('img/default.jpg'); ?>';" />
                                    </div>

                                    <div class="card-body">

                                        <h5 class="card-title"><?php echo $prd->nama_produk ?></h5>
                                        <span class="badge badge-success">Rp. <?php echo number_format($prd->harga_jual, 0, ',', '.') ?></span><br>
                                        <?php echo anchor('DashboardPelanggan/tambah_ke_keranjang/' . $prd->id_produk, '<div class="btn btn-sm btn-primary">Tambah Keranjang</div>') ?>

                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>