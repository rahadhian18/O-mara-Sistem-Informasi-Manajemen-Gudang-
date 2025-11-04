<!DOCTYPE html>
<html>

<head>
    <title>Laporan Pembelian Produk</title>
    <!-- Custom fonts for this template-->
    <link href="<?php echo base_url('assets/vendor/fontawesome-free/css/all.min.css') ?>" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- icon no tame ni -->
    <script src="https://unpkg.com/feather-icons"></script>
    <script src="https://cdn.jsdelivr.net/npm/feather-icons/dist/feather.min.js"></script>

    <!-- Custom styles for this template-->
    <link href="<?php echo base_url('assets/css/sb-admin-2.min.css') ?>" rel="stylesheet">
    <!-- CSS untuk datatables-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.5/css/bulma.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
</head>
<!-- <body class="fix-header fix-sidebar card-no-border"> -->

<body class="fix-header fix-sidebar card-no-border" onload="window.print()">
    <br>
    <div style="text-align: center;">
        <div class="row">
            <div class="col-6">

            </div>
            <div class="col-20" style="width: 100%">
                <img src="<?php echo base_url('/assets/img/brand/Coba1.img') ?>">
                <h1 style="font-weight: bold;font-size: 20px; line-height: 50px"> Omara Clothing Store </h1>
                <h1>LAPORAN PEMBELIAN PRODUK</h1>
                <h2 style="text-align: center; line-height: 30px"><?php echo $subtitle ?></h2>
                <h3>Jl. Kenanga, Kec. Bekasi Utara, Kab. Bekasi, Jawa Barat 17532</h3>
                <h3>Telp (021) 8883098 Email : omaracloth@gmail.com</h3>
            </div>
        </div>
    </div>

    <hr>

    <table class="table table-bordered" style="width: 100%;">
        <thead>
            <tr>
                <th>No.</th>
                <th>Nama Supplier</th>
                <th>Tanggal Transaksi</th>
                <th>Harga Total</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1;
            foreach ($filter as $row) : ?>
                <tr>
                    <td><?php echo $no++; ?></td>
                    <td><?php echo $row->tj_atas_nama ?></td>
                    <td><?php echo $row->tj_tanggal?></td>
                    <td style="text-align: right;"><?php echo "Rp" . number_format($row->tj_total, 2, ',', '.') ?></td>
                </tr>
            <?php endforeach ?>
            <?php $sub_total = 0;
            foreach ($filter as $row) {
                $sub_total += $row->tj_total;
            } ?>
            <tr>
              
                <td colspan="5">Total Pengeluaran : <?php echo "Rp" . number_format($sub_total, 2, ',', '.') ?>
               
                <div style="margin-left:0px; text-align: right;">
                <h2>Bekasi, <?php echo date("d/m/Y"); ?></h2>
                <br><br>
                <h2>Mengetahui</h2>
                <h2><?php echo $this->session->userdata('username') ?></h2>
                </div>
            </td>
            </tr>

        </tbody>
    </table>

   
</body>

</html>

<!-- /.container-fluid -->

