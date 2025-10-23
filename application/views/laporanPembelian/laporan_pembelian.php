<main id="main" class="main">
    <div class="pagetitle">
       
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo base_url('/LaporaKonsultasi/index') ?>">Laporan</a></li>
                <li class="breadcrumb-item active">Laporan Pembelian </li>
            </ol>
        </nav>
        <section class="section">
            <?php  ?>

            <!-- Begin Page Content -->
            <div class="container-fluid">
                <div class="card">
                    <br>
                    <!-- Page Heading -->
                    <h1 style="text-align:center;" class="h1 mb-4 text-gray-200">Laporan Pembelian </h1>
                    <div class="row">
                        <!-- Column -->
                        <div class="col-lg-12 col-md-7">

                            <div class="card-block" style="padding: 20px;">
                            <center>
                            <b style="color:blue">-- Laporan Berdasarkan Tanggal --</b>
                            </center>
                                <br><br>
                                <center>
                                <form action="<?php echo base_url(); ?>c_lap_beli/filter" method="POST" target="_blank">

                                    <input type="hidden" name="nilaifilter" value="1" class="form-control">

                                    Tanggal Awal <br><br>
                                    <input type="date" name="tanggalawal" required="" class="form-control"><br><br>

                                    Tanggal Akhir <br><br>
                                    <input type="date" name="tanggalakhir" required="" class="form-control"><br>

                                    <br>
                                    <button class="btn btn-primary" type="submit" value="Print"> Cetak Laporan </button>
                                </form>
                                
                                <br>
                                <hr><br>
                                <center>
                                <b style="color:blue">-- Laporan Berdasarkan Bulan --</b>
                                </center>
                                <br><br>
                                <center>
                                <form action="<?php echo base_url(); ?>c_lap_beli/filter" method="POST" target="_blank">

                                    <input type="hidden" name="nilaifilter" value="2">

                                    Pilih Tahun <br><br>
                                    <select name="tahun1" required="" class="form-select">
                                        <?php foreach ($tahun as $row) : ?>

                                            <option value="<?php echo $row->tahun ?>"><?php echo $row->tahun ?></option>

                                        <?php endforeach ?>

                                    </select>
                                    </center>
                                     <br><br>
                                    Bulan Awal <br><br>
                                    <select name="bulanawal" required="" class="form-select">
                                        <option value="1">Januari</option>
                                        <option value="2">Februari</option>
                                        <option value="3">Maret</option>
                                        <option value="4">April</option>
                                        <option value="5">Mei</option>
                                        <option value="6">Juni</option>
                                        <option value="7">Juli</option>
                                        <option value="8">Agustus</option>
                                        <option value="9">September</option>
                                        <option value="10">Oktober</option>
                                        <option value="11">November</option>
                                        <option value="12">Desember</option>
                                    </select><br><br>

                                    Bulan Akhir <br><br>
                                    <select name="bulanakhir" required="" class="form-select">
                                        <option value="1">Januari</option>
                                        <option value="2">Februari</option>
                                        <option value="3">Maret</option>
                                        <option value="4">April</option>
                                        <option value="5">Mei</option>
                                        <option value="6">Juni</option>
                                        <option value="7">Juli</option>
                                        <option value="8">Agustus</option>
                                        <option value="9">September</option>
                                        <option value="10">Oktober</option>
                                        <option value="11">November</option>
                                        <option value="12">Desember</option>
                                    </select><br>
                                
                                    <br>
                                    <button class="btn btn-primary" type="submit" value="Print"> Cetak Laporan </button>
                                </form>
                                <br>
                                <hr><br>
                                <center>
                                <b style="color:blue">-- Laporan Berdasarkan Tahun --</b>
                                <br><br>
                                </center>
                                <form action="<?php echo base_url(); ?>c_lap_beli/filter" method="POST" target="_blank">
                                    <input type="hidden" name="nilaifilter" value="3">
                                    Pilih Tahun <br><br>
                                    <select name="tahun2" required="" class="form-select">
                                        <?php foreach ($tahun as $row) : ?>

                                            <option value="<?php echo $row->tahun ?>"><?php echo $row->tahun ?></option>

                                        <?php endforeach ?>

                                    </select>

                                    <br><br>
                                    <button class="btn btn-primary" type="submit" value="Print"> Cetak Laporan </button>
                                </form>
                                </center>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

    </div>
    <!-- End of Content Wrapper -->

    </div>


    </body>

    </html>
    </section>
</main>

