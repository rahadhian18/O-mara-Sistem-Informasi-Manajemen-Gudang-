<?php

class C_tr_jual extends CI_Controller {
    public function __construct()
	{
		parent::__construct();
		$this->load->model('m_tr_jual');
        $this->load->model('model_produk');

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
		// $data = array (
		// 	'produk' => $this->model_prdoduk->tampil_data()
		// );
       	$data['produk'] = $this->model_produk->tampil_data();
		$this->load->view('pelanggan_header');
        $this->load->view('Dashboard', $data);
		//$this->load->view('index');
		
	}

	public function cust_tr_bayar($tj_id)
	{
		// //$data['produk'] = $this->m_tr_jual->tampil_data();
		$this->load->view('pelanggan_header');
		$this->load->view('v_tr_bayar');
		$this->form_validation->set_rules('tj_atas_nama', 'Atas Nama', 'required', array('required' => '%s Harus Diisi!'));
		$this->form_validation->set_rules('tj_nama_bank', 'Nama Bank', 'required', array('required' => '%s Harus Diisi!'));
		$this->form_validation->set_rules('tj_no_rek', 'No Rekening', 'required', array('required' => '%s Harus Diisi!'));
		
		
        if ($this->form_validation->run() == TRUE) {
            $config['upload_path'] = './assets/bukti_bayar/';
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            $config['max_size']  = '2000';
            
            $this->upload->initialize($config);
            $field_name = 'tj_bukti_bayar';

            if (!$this->upload->do_upload($field_name)) {
				$value['produk'] = $this->m_tr_jual->tampil_data();
				$this->load->view('pelanggan_header', $value);
                $data = array(
                    'transaksi' 	=> $this->m_tr_jual->detail_transaksi($tj_id),
					'rekening' 		=> $this->m_tr_jual->rekening(),
                    'error_upload' => $this->upload->display_errors()
					
                );  
				
				$this->load->view('v_tr_bayar', $data); 
            }
            else {
                $upload_data = array ('uploads' => $this->upload->data());
                $config['image_library'] = 'gd2';
                $config['source_image'] = './assets/bukti_bayar/'.$upload_data['uploads']['file_name'];
                $this->load->library('image_lib', $config);
                $data = array(
                    'tj_id'         	=> $tj_id ,
                    'tj_atas_nama'		=> $this->input->post('tj_atas_nama') ,
                    'tj_nama_bank' 		=> $this->input->post('tj_nama_bank') ,
                    'tj_no_rek' 		=> $this->input->post('tj_no_rek') ,
                    'tj_bukti_bayar'	=> $upload_data['uploads']['file_name'],
                    'tj_status'     	=> '2'
                );
                $this->m_tr_jual->upload_buktibayar($data);
                redirect('DashboardPelanggan/daftar_transaksi');
            }
        } 

		$data = array(
			$this->load->view('v_tr_bayar'),
			'transaksi' => $this->m_tr_jual->detail_transaksi($tj_id),
			'rekening' 	=> $this->m_tr_jual->rekening()
		);
	}
}