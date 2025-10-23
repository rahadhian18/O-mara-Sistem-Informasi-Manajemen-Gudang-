<?php

class C_kurir extends CI_Controller {
	public function __construct()
    {
		parent::__construct();
        $this->load->model('m_kurir');

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
		$data['produk'] = $this->m_kurir->tampil_data();
		$this->load->view('kurir_header');
		$this->load->view('v_kurir', $data);
		
		
	}

	//data pesanan di admin
	public function pengiriman()
	{
		$data['produk'] = $this->m_kurir->tampil_data();
		$this->load->view('kurir_header', $data, FALSE);
		$data = array(
			'kirim' => $this->m_kurir->kirim(),
			'selesai' => $this->m_kurir->selesai()			
		);
		$this->load->view('v_kurir', $data);	
	}

	public function selesai($tj_id)
	{
		$data = array(
			'tj_id' => $tj_id,
			'tj_status' => '5'			
		);
		$this->m_kurir->update_pengiriman($data);
		$this->session->set_flashdata('pesan', 'Pesanan Segera Dikirim !');

		redirect('c_kurir/pengiriman');
	}
}

?>