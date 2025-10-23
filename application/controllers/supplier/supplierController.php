<?php  
    defined('BASEPATH') OR exit('No direct script access allowed');

    class supplierController extends CI_Controller
    {
    	
    	public function __construct()
    	{
    		parent::__construct();
    		$this->load->model("supplier/supplierModel");
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
            $supplier = $this->supplierModel;
            $result = $supplier->save();
            if($result > 0) $this->sukses();
            else $this->gagal();
        }

        //fungsi untuk meload page role tambah
        public function pageTambah()
        {
            $this->load->view('admin_header');
           
            $this->load->view('supplier/supplier_tambah');
        }

        function sukses()
        {
            redirect(site_url('supplier/supplierController'));
        }

        function gagal()
        {
            echo "<script>alert('Input data gagal')</script>";
        }

    	public function index()
    	{
    		$data["supplier"] = $this->supplierModel->getAll();
            $this->load->view('admin_header', $data);
            
    		$this->load->view('supplier/supplier_index', $data);
    	}

        //hapus data dengan mengubah nilai is_active
    	public function hapus()
    	{
            $id_supp = $this->input->post('id_supp');
    		$status = 0;

            $data = array (
                'status' => $status
            );
            $where = array (
                'id_supp' => $id_supp
            );

            $this->supplierModel->update($where,$data,'mssupplier');
            redirect(site_url('supplier/supplierController'));
    	}

        //untuk get data ke page edit
    	public function edit($id_supp) {
            $where = array('id_supp' => $id_supp);
            $data["supplier"] = $this->supplierModel->edit($where,'mssupplier') -> result();
            $this->load->view('admin_header', $data);
    		$this->load->view('supplier/supplier_edit', $data);
        }

        //update data ke database
        public function update() {
            $id_supp = $this->input->post('id_supp');
            $nama_supp = $this->input->post('nama_supp');
            $telepon = $this->input->post('telepon');
            $alamat = $this->input->post('alamat');
            $modiby = $this->input->post('modiby');
            $modidate = date("Y/m/d");

            $supplier = array (
                'nama_supp' => $nama_supp,
                'telepon' => $telepon,
                'alamat' => $alamat,
                'modiby' => $modiby,
                'modidate' => $modidate
            );
            $where = array (
                'id_supp' => $id_supp
            );

            $this->supplierModel->update($where,$supplier,'mssupplier');
            redirect(site_url('supplier/supplierController'));
        }
    }
    ?>
