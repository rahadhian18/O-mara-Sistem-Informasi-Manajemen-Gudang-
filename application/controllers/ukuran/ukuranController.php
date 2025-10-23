<?php  
    defined('BASEPATH') OR exit('No direct script access allowed');

    class ukuranController extends CI_Controller
    {
    	
    	public function __construct()
    	{
    		parent::__construct();
    		$this->load->model("ukuran/ukuranModel");
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

        //tambah data
        public function tambah()
        {
            $ukuran = $this->ukuranModel;
            $result = $ukuran->save();
            if($result > 0) $this->sukses();
            else $this->gagal();
        }

        //fungsi untuk meload page ukuran tambah
        public function pageTambah()
        {
            $this->load->view('admin_header');
           
            $this->load->view('ukuran/ukuran_tambah');
        }

        function sukses()
        {
            redirect(site_url('ukuran/ukuranController'));
        }

        function gagal()
        {
            echo "<script>alert('Input data gagal')</script>";
        }

    	public function index()
    	{
    		$data["ukuran"] = $this->ukuranModel->getAll();
            $this->load->view('admin_header', $data);
            
    		$this->load->view('ukuran/ukuran_index', $data);
    	}

        //hapus data dengan mengubah nilai is_active
    	public function hapus()
    	{
            $id_ukuran = $this->input->post('id_ukuran');
    		$status = 0;

            $data = array (
                'status' => $status
            );
            $where = array (
                'id_ukuran' => $id_ukuran
            );

            $this->ukuranModel->update($where,$data,'msukuran');
            redirect(site_url('ukuran/ukuranController'));
    	}

        //untuk get data ke page edit
    	public function edit($id_ukuran) {
            $where = array('id_ukuran' => $id_ukuran);
            $data["ukuran"] = $this->ukuranModel->edit($where,'msukuran') -> result();
            $this->load->view('admin_header', $data);
            
    		$this->load->view('ukuran/ukuran_edit', $data);
        }

        //update data ke database
        public function update() {
            $id_ukuran = $this->input->post('id_ukuran');
            $ukuran = $this->input->post('ukuran');
            $modiby = $this->input->post('modiby');
            $modidate = date("Y/m/d");

            $ukuran = array (
                'ukuran' => $ukuran,
                'modiby' => $modiby,
                'modidate' => $modidate
            );
            $where = array (
                'id_ukuran' => $id_ukuran
            );

            $this->ukuranModel->update($where,$ukuran,'msukuran');
            redirect(site_url('ukuran/ukuranController'));
        }
    }
    ?>
