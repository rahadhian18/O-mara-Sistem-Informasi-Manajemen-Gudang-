<?php  
    defined('BASEPATH') OR exit('No direct script access allowed');

    class jnsbahanController extends CI_Controller
    {
    	
    	public function __construct()
    	{
    		parent::__construct();
    		$this->load->model("jenisbahan/jnsbahanModel");
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
            $jnsbahan = $this->jnsbahanModel;
            $result = $jnsbahan->save();
            if($result > 0) $this->sukses();
            else $this->gagal();
        }

        //fungsi untuk meload page role tambah
        public function pageTambah()
        {
            $this->load->view('admin_header');
           
            $this->load->view('jenisbahan/jnsbahan_tambah');
        }

        function sukses()
        {
            redirect(site_url('jenisbahan/jnsbahanController'));
        }

        function gagal()
        {
            echo "<script>alert('Input data gagal')</script>";
        }

    	public function index()
    	{
    		$data["jnsbahan"] = $this->jnsbahanModel->getAll();
            $this->load->view('admin_header', $data);
            
    		$this->load->view('jenisbahan/jnsbahan_index', $data);
    	}

        //hapus data dengan mengubah nilai is_active
    	public function hapus()
    	{
            $id_bahan = $this->input->post('id_bahan');
    		$status = 0;

            $data = array (
                'status' => $status
            );
            $where = array (
                'id_bahan' => $id_bahan
            );

            $this->jnsbahanModel->update($where,$data,'msjenisbahan');
            redirect(site_url('jenisbahan/jnsbahanController'));
    	}

        //untuk get data ke page edit
    	public function edit($id_bahan) {
            $where = array('id_bahan' => $id_bahan);
            $data["jnsbahan"] = $this->jnsbahanModel->edit($where,'msjenisbahan') -> result();
            $this->load->view('admin_header', $data);
    		$this->load->view('jenisbahan/jnsbahan_edit', $data);
        }

        //update data ke database
        public function update() {
            $id_bahan = $this->input->post('id_bahan');
            $nama_bahan = $this->input->post('nama_bahan');
            $deskripsi = $this->input->post('deskripsi');
            $modiby = $this->input->post('modiby');
            $modidate = date("Y/m/d");

            $jnsbahan = array (
                'nama_bahan' => $nama_bahan,
                'deskripsi' => $deskripsi,
                'modiby' => $modiby,
                'modidate' => $modidate
            );
            $where = array (
                'id_bahan' => $id_bahan
            );

            $this->jnsbahanModel->update($where,$jnsbahan,'msjenisbahan');
            redirect(site_url('jenisbahan/jnsbahanController'));
        }
    }
    ?>
