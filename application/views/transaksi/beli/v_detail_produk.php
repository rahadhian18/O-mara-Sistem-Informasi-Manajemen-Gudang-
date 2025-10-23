         <!-- Start Content-->
        <div class="container-fluid">
            
            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box">
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="<?php echo base_url('c_tr_beli') ?>"><i class="fas fa-angle-left">&nbsp;</i>Kembali</a></li>
                            </ol>
                        </div>
                        <h4 class="page-title">Detail Produk</h4>
                    </div>
                </div>
            </div>     
            <!-- end page title --> 

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-5">

                                    <div class="tab-content pt-0">
                                        <div class="tab-pane active show" id="product-1-item">
                                            <img src="<?php echo base_url('img/'). $Clothing->gambar ?>" alt="" class="card-img-top">
                                        </div>
                                    </div>

                                </div> <!-- end col -->
                                <div class="col-lg-7">
                                    <div class="ps-xl-3 mt-2 mt-xl-0">
                                        <br><br><br>
                                        <h2 class="mt-4 mb-3"><?php echo $Clothing->nama_produk ?></h2>
                                        <h3 class="mb-3"><b>Rp <?php echo number_format($Clothing->harga_beli, 0, ',', '.') ?></b></h3>
                                        <h4><span class="badge bg-soft-success text-success mb-2">Stok <?php echo $Clothing->stok ?> Pcs</span></h4>
                                       <p class="text-muted mb-1" ><?php echo $Clothing->nama_bahan?> | <?php echo $Clothing->ukuran ?> | <?php echo $Clothing->nama_jnsproduk ?></p>
                              

                                        <?php
                                            echo form_open('c_tr_beli/add_keranjang');
                                            echo form_hidden('id', $Clothing->id_produk);
                                            echo form_hidden('price', $Clothing->harga_beli);
                                            echo form_hidden('name', $Clothing->nama_produk);
                                            echo form_hidden('redirect_page',str_replace('index.php/','',current_url()));
                                        ?>

                                        <!-- <div class="row">
                                            <div class="col-sm-2">
                                                <input type="number" name="stok" class="form-control" value="1" min="1" max="<?php echo $Clothing->stok?>">
                                            </div>
                                            <div class="col-sm-8">
                                                <button type="submit" class="btn btn-success waves-effect waves-light swalDefaultSuccess">
                                                    <span class="btn-label"><i class="mdi mdi-cart"></i></span>Tambah Keranjang
                                                </button>
                                            </div>
                                        </div> -->

                                        <?php echo form_close(); ?>
                                    </div>
                                </div> <!-- end col -->
                            </div>
                            <!-- end row -->
                        </div>
                    </div> <!-- end card-->
                </div> <!-- end col-->
            </div>
            <!-- end row-->
            
        </div> <!-- container -->