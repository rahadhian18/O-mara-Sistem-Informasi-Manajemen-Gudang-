<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller{
 
    public function __construct()
    {
     parent::__construct();
     $this->load->model('loginPelangganModel');

	 
    }
   
    function index()
    {
         $this->load->view('home');
    }
   
    public function registrasi()
	{
		// $kodeID = "PL";

		$this->form_validation->set_rules('username', 'Username', 'required', array('required' => '%s Harus Diisi!'));
		$this->form_validation->set_rules('password', 'Password', 'required', array('required' => '%s Harus Diisi!'));
		$this->form_validation->set_rules('nama_pelanggan', 'Nama', 'required', array('required' => '%s Harus Diisi!'));
		$this->form_validation->set_rules('telepon', 'Telepon', 'required', array('required' => '%s Harus Diisi!'));
		$this->form_validation->set_rules('email', 'Email', 'required', array('required' => '%s Harus Diisi!'));
		
		//$this->form_validation->set_rules('pl_telepon', 'Telepon', array('max_length[13]' => '%s Maksimal 13 Angka!'));
		
		if ($this->form_validation->run() == TRUE) {
			// $id = $this->login->autoID();

			$data = array(
				'id_pelanggan'         => $this->input->post('id_pelanggan') ,
				'username'              => $this->input->post('username') ,
				'password'              => $this->input->post('password') ,
				'nama_pelanggan'       => $this->input->post('nama_pelanggan') ,
				'telepon'               => $this->input->post('telepon') ,
				'email'                 => $this->input->post('email') ,
				
				'status'                => 1
			);
			$this->loginPelangganModel->add($data);
			//$this->session->$this->session->set_flashdata('pesan', 'Data Berhasil Ditambahkan.');
			redirect('Home');
		}
		
		$this->load->view('v_registrasi', FALSE);
	}
}
   
?>