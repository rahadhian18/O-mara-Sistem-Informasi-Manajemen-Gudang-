<?php

class Dashboardpelanggan extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_tr_jual');
		$this->load->model("produk/produkModel");
		$this->load->model("Model_produk");
		
	}

	public function index()
	{
		// $data = array (
		// 	'produk' => $this->model_prdoduk->tampil_data()
		// );

       	$data['produk'] = $this->m_tr_jual->tampil_data();
		$this->load->view('pelanggan_header');
        $this->load->view('Dashboard', $data);
		// $this->load->view('index');
		
	}

    public function tambah_ke_keranjang($id)
    {
        $produk = $this->m_tr_jual->find($id);

        $data = array(
            'id'    => $produk->id_produk,
            'qty'   => 1,
            'price' => $produk->harga_jual,
            'name'  => $produk->nama_produk 
        );

        $this->cart->insert($data);
        redirect('DashboardPelanggan');
    }

    public function add_keranjang()
	{
		$redirect_page =  $this->input->post('redirect_page');
		$data = array(
			'id'      => $this->input->post('id'),
			'qty'     => $this->input->post('qty'),
			'price'   => $this->input->post('price'),
			'name'    => $this->input->post('name'),
		);
		$this->cart->insert($data);
		redirect($redirect_page, 'refresh');
	}

    public function delete_keranjang($rowid)
	{
		$this->cart->remove($rowid);
		redirect('DashboardPelanggan');
	}

    public function view_keranjang()
	{
		if (empty($this->cart->contents())){
			redirect('DashbordPelanggan');
		}
		$data = array(
            'isi' => 'v_keranjang'
        );

        $this->load->view('pelanggan_header', $data, FALSE);
	}

	//mengupdate produk dari keranjang
	public function update_keranjang()
	{
		$i = 1;
		foreach ($this->cart->contents() as $items) {
			$data = array(
				'rowid' => $items['rowid'],
				'qty'   => $this->input->post($i.'[qty]')
			);
			$this->cart->update($data); 
			$i++;
		}
		redirect('DashboardPelanggan');
	}

    public function detail_keranjang()
    {

        $data['produk'] = $this->m_tr_jual->tampil_data();
		$this->load->view('pelanggan_header');
        $this->load->view('v_keranjang', $data);
		// $this->load->view('index');
    }


	//menghapus semua produk dari keranjang
	public function hapus_keranjang()
	{
		$this->cart->destroy();
		redirect('DashboardPelanggan');
	}

    public function pembayaran()
	{
		$data = array(
			'isi' => 'v_checkout'
		);
		$this->load->view('pelanggan_header');
        $this->load->view('v_checkout', $data);
		// $this->load->view('index');
	}


	public function checkout()
	{
		$kodeID = "TJ";

			$id = $this->m_tr_jual->autoID();

			//simpan ke tabel transaksi
			$data = array(
                'tj_id'         => $kodeID.$id,
                'id_pelanggan'  => $this->input->post('id_pelanggan'),
				'tj_tanggal'    => date('Y-m-d'),
				'tj_atas_nama'     	=> $this->input->post('tj_atas_nama'),
				'tj_alamat'     => $this->input->post('tj_alamat'),
				'tj_jarak'     	=> '20',
				'tj_ongkir'     => '100000',
				'tj_telepon'    => $this->input->post('tj_telepon'),
				'tj_status'     => '1',
				'tj_total'     	=> $this->input->post('tj_total')
            );
			$this->m_tr_jual->simpan_transaksi($data);
			//$this->session->set_flashdata('pesan', 'Transaksi penjualan berhasil!');

			//simpan ke tabel detail transaksi
			$i = 1;
			$j = 1;
			foreach ($this->cart->contents() as $items) {
				$detail = array( 
					'tj_id'         => $kodeID.$id,
					'id_produk'     => $items['id'],
					'tj_jumlah'   	=> $this->input->post('qty'.$i++),
					'tj_subtotal'   => $this->input->post('subtotal'.$j++)
				);
				$this->m_tr_jual->simpan_detail_transaksi($detail);
			}

			$this->cart->destroy();
			redirect('DashboardPelanggan/daftar_transaksi');
	}

	public function daftar_transaksi()
	{
		$data['produk'] = $this->m_tr_jual->tampil_data();
		$this->load->view('pelanggan_header', $data, FALSE);
		$data = array(
			'belumbayar' => $this->m_tr_jual->cust_belumbayar(),
			'diproses' => $this->m_tr_jual->cust_diproses(),
			'dikirim' => $this->m_tr_jual->cust_dikirim(),
			'selesai' => $this->m_tr_jual->cust_selesai()
			
		);
		$this->load->view('v_daftar_transaksi', $data);
	}
    public function proses_pesanan()
	{
        $this->cart->destroy();
        $data['produk'] = $this->m_tr_jual->tampil_data()->result();
		$this->load->view('pelanggan_header');
        $this->load->view('proses_pesanan', $data);
		// $this->load->view('index');
	}

	public function cust_tr_bayar($tj_id)
	{
		$this->load->view('pelanggan_header');

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
                $data = array(
                    'transaksi' 	=> $this->m_tr_jual->detail_transaksi($tj_id),
					'rekening' 		=> $this->m_tr_jual->rekening(),
                    'error_upload' => $this->upload->display_errors(),
                    
                ); 
				$this->load->view('v_tr_bayar', $data, FALSE);
				// $this->load->view('pelanggan_header', $data, FALSE);
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
                // $this->session->set_flashdata('pesan', 'Bukti Pembayaran Berhasil Diupload!');
                redirect('DashboardPelanggan/daftar_transaksi');
            }
        } 

		$data = array(
			// $this->load->view('v_tr_bayar'),
			'transaksi' => $this->m_tr_jual->detail_transaksi($tj_id),
			'rekening' 	=> $this->m_tr_jual->rekening()
		);
		$this->load->view('v_tr_bayar', $data, FALSE);
		// $this->load->view('pelanggan_header', $data, FALSE);
	}
	
	
}
