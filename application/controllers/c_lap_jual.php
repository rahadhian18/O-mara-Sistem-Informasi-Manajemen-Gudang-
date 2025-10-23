<?php
defined('BASEPATH') or exit('No direct script access allowed');

class c_lap_jual extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_lap_jual');
        //loading session library
        $this->load->library('session');

        if (!$this->session->userdata('id_kary') && !$this->session->userdata('id_pelanggan')) {
            echo 'Session tidak ada';
            // exit(); // uncomment untuk debugging
            redirect('LoginUser');
        } else {
            if ($this->session->userdata('id_kary')) {
                echo 'Session karyawan terdeteksi: ' . $this->session->userdata('id_kary');
            } elseif ($this->session->userdata('id_pelanggan')) {
                echo 'Session pelanggan terdeteksi: ' . $this->session->userdata('id_pelanggan');
            }
            // exit(); // optional untuk debugging
        }
    }

    public function index()
    {
        $data['tahun'] = $this->m_lap_jual->gettahun();

        $judul = [
            'title' => 'Omara Clothing Store',
            'head' => 'Laporan Penjualan Produk',
            'username' => $this->session->userdata('username')
        ];

        $this->load->view('manager_header', array_merge($data, $judul));
        $this->load->view('laporanPenjualan/laporan_Penjualan', $data);
        //$this->load->view('template/footer', $data);
    }

    public function filter()
    {
        $tanggalawal = $this->input->post('tanggalawal');
        $tanggalakhir = $this->input->post('tanggalakhir');
        $tahun1 = $this->input->post('tahun1');
        $tahun2 = $this->input->post('tahun2');
        $bulanawal = $this->input->post('bulanawal');
        $bulanakhir = $this->input->post('bulanakhir');
        $nilaifilter = $this->input->post('nilaifilter');
        $dateawal = date_create($tanggalawal);
        $dateakhir = date_create($tanggalakhir);

        if ($nilaifilter == 1) {
            $data['title'] = "Laporan Penjualan Produk";
            $data['subtitle'] = "Periode " . date_format($dateawal, "d/m/Y") . " - " . date_format($dateakhir, "d/m/Y");
            $data['filter'] = $this->m_lap_jual->filterbytanggal($tanggalawal, $tanggalakhir);

            $this->load->view('laporanPenjualan/print_laporanPenjualan.php', $data);
        } else if ($nilaifilter == 2) {
            $data['title'] = "Laporan Pembelian Produk Berdasarkan Bulan";
            $data['subtitle'] = "Dari Bulan : " . $bulanawal . " Sampai Bulan : " . $bulanakhir . " Tahun : " . $tahun1;
            $data['filter'] = $this->m_lap_jual->filterbybulan($tahun1, $bulanawal, $bulanakhir);

            $this->load->view('laporanPenjualan/print_laporanPenjualan.php', $data);
        } else if ($nilaifilter == 3) {
            $data['title'] = "Laporan Pembelian Produk Berdasarkan Tahun";
            $data['subtitle'] = " Tahun : " . $tahun2;
            $data['filter'] = $this->m_lap_jual->filterbytahun($tahun2);
            $this->load->view('laporanPenjualan/print_laporanPenjualan.php', $data);
        }
    }
}




