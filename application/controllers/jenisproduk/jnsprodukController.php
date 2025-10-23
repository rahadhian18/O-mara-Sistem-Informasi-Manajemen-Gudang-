<?php  
    defined('BASEPATH') OR exit('No direct script access allowed');

    class jnsprodukController extends CI_Controller
    {
    	
    	public function __construct()
    	{
    		parent::__construct();
    		$this->load->model("jenisproduk/jnsprodukModel");
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
            $jnsproduk = $this->jnsprodukModel;
            $result = $jnsproduk->save();
            if($result > 0) $this->sukses();
            else $this->gagal();
        }

        //fungsi untuk meload page role tambah
        public function pageTambah()
        {
            $this->load->view('admin_header');
           
            $this->load->view('jenisproduk/jnsproduk_tambah');
        }

        function sukses()
        {
            redirect(site_url('jenisproduk/jnsprodukController'));
        }

        function gagal()
        {
            echo "<script>alert('Input data gagal')</script>";
        }

    	public function index()
    	{
    		$data["jnsproduk"] = $this->jnsprodukModel->getAll();
            $this->load->view('admin_header', $data);
            
    		$this->load->view('jenisproduk/jnsproduk_index', $data);
    	}

        //hapus data dengan mengubah nilai is_active
    	public function hapus()
    	{
            $id_jnsproduk = $this->input->post('id_jnsproduk');
    		$status = 0;

            $data = array (
                'status' => $status
            );
            $where = array (
                'id_jnsproduk' => $id_jnsproduk
            );

            $this->jnsprodukModel->update($where,$data,'msjenisproduk');
            redirect(site_url('jenisproduk/jnsprodukController'));
    	}

        //untuk get data ke page edit
    	public function edit($id_jnsproduk) {
            $where = array('id_jnsproduk' => $id_jnsproduk);
            $data["jnsproduk"] = $this->jnsprodukModel->edit($where,'msjenisproduk') -> result();
            $this->load->view('admin_header', $data);
    		$this->load->view('jenisproduk/jnsproduk_edit', $data);
        }

        //update data ke database
        public function update() {
            $id_jnsproduk = $this->input->post('id_jnsproduk');
            $nama_jnsproduk = $this->input->post('nama_jnsproduk');
            $deskripsi = $this->input->post('deskripsi');
            $modiby = $this->input->post('modiby');
            $modidate = date("Y/m/d");

            $jnsproduk = array (
                'nama_jnsproduk' => $nama_jnsproduk,
                'deskripsi' => $deskripsi,
                'modiby' => $modiby,
                'modidate' => $modidate
            );
            $where = array (
                'id_jnsproduk' => $id_jnsproduk
            );

            $this->jnsprodukModel->update($where,$jnsproduk,'msjenisproduk');
            redirect(site_url('jenisproduk/jnsprodukController'));
        }
    }
    ?>
