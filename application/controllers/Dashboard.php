<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_pesanan_masuk');

		
	}

	public function index()
	{
		$this->load->view('admin_header');
		
		
	}

	//data pesanan di admin
	public function pesanan_masuk()
	{
		$data['produk'] = $this->m_pesanan_masuk->tampil_data();
		$this->load->view('admin_header', $data, FALSE);
		$data = array(
			'pesanan' => $this->m_pesanan_masuk->pesanan(),
			'diproses' => $this->m_pesanan_masuk->diproses(),
			'dikirim' => $this->m_pesanan_masuk->dikirim(),
			'selesai' => $this->m_pesanan_masuk->selesai()
			
		);
		$this->load->view('v_pesanan_masuk', $data);
		
	}

	public function proses($tj_id)
	{
		$data = array(
			'tj_id' => $tj_id,
			'tj_status' => '3'			
		);
		$this->m_pesanan_masuk->update_order($data);
		$this->session->set_flashdata('pesan', 'Pesanan Akan Dikemas !');

		redirect('Dashboard/pesanan_masuk');
	}

	public function kirim($tj_id)
	{
		$data = array(
			'tj_id' => $tj_id,
			'tj_resi' => $this->input->post('tj_resi'),
			'tj_kurir' => $this->input->post('tj_kurir'),
			'tj_status' => '4'			
		);
		$this->m_pesanan_masuk->update_kirim($data);
		$this->session->set_flashdata('pesan', 'Pesanan Segera Dikirim !');

		redirect('Dashboard/pesanan_masuk');
	}
}