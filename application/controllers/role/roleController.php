<?php  
    defined('BASEPATH') OR exit('No direct script access allowed');

    class roleController extends CI_Controller
    {
    	
    	public function __construct()
    	{
    		parent::__construct();
    		$this->load->model("role/roleModel");
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
            $role = $this->roleModel;
            $result = $role->save();
            if($result > 0) $this->sukses();
            else $this->gagal();
        }

        //fungsi untuk meload page role tambah
        public function pageTambah()
        {
            $this->load->view('admin_header');
           
            $this->load->view('role/role_tambah');
        }

        function sukses()
        {
            redirect(site_url('role/roleController'));
        }

        function gagal()
        {
            echo "<script>alert('Input data gagal')</script>";
        }

    	public function index()
    	{
    		$data["role"] = $this->roleModel->getAll();
            $this->load->view('admin_header', $data);
            
    		$this->load->view('role/role_index', $data);
    	}

        //hapus data dengan mengubah nilai is_active
    	public function hapus()
    	{
            $id_role = $this->input->post('id_role');
    		$status = 0;

            $data = array (
                'status' => $status
            );
            $where = array (
                'id_role' => $id_role
            );

            $this->roleModel->update($where,$data,'msrole');
            redirect(site_url('role/roleController'));
    	}

        //untuk get data ke page edit
    	public function edit($id_role) {
            $where = array('id_role' => $id_role);
            $data["role"] = $this->roleModel->edit($where,'msrole') -> result();
            $this->load->view('admin_header', $data);
            
    		$this->load->view('role/role_edit', $data);
        }

        //update data ke database
        public function update() {
            $id_role = $this->input->post('id_role');
            $nama_role = $this->input->post('nama_role');
            $deskripsi = $this->input->post('deskripsi');
            $modiby = $this->input->post('modiby');
            $modidate = date("Y/m/d");

            $role = array (
                'nama_role' => $nama_role,
                'deskripsi' => $deskripsi,
                'modiby' => $modiby,
                'modidate' => $modidate
            );
            $where = array (
                'id_role' => $id_role
            );

            $this->roleModel->update($where,$role,'msrole');
            redirect(site_url('role/roleController'));
        }
    }
    ?>
