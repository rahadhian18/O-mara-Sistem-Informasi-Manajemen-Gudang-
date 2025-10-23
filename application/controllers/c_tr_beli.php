<?php

class C_tr_beli extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_tr_beli');
		$this->load->model('supplier/supplierModel');
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

	//index
	public function index()
	{
		$data = array(
			'Clothing' => $this->m_tr_beli->get_all_data(),
            //'' => 'transaksi/beli/v_tr_beli'
        );

        $this->load->view('staff_header', $data, FALSE);
        $this->load->view('transaksi/beli/v_tr_beli', $data, FALSE);
	}

	//menampilkan detail produk
	public function detail_produk($id_produk)
	{
		$data = array(
			'Clothing' => $this->m_tr_beli->detail_produk($id_produk),
            //'isi' => 'transaksi/beli/v_detail_produk'
        );

        $this->load->view('staff_header', $data, FALSE);
        $this->load->view('transaksi/beli/v_detail_produk', $data, FALSE);
	}

	//melihat keranjang
	public function view_keranjang()
	{
		// if (empty($this->cart->contents())){
		// 	redirect('c_tr_beli');
		// }
		$data = array(
            'isi' => 'transaksi/beli/v_keranjang'
        );

        $this->load->view('staff_header');

        $this->load->view('transaksi/beli/v_keranjang');
	}

	//menambahkan produk ke keranjang
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

	//menghapus produk dari keranjang
	public function delete_keranjang($rowid)
	{
		$this->cart->remove($rowid);
		redirect('c_tr_beli/view_keranjang');
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
		redirect('c_tr_beli/view_keranjang');
	}

	//menghapus semua produk dari keranjang
	public function delete_all_keranjang()
	{
		$this->cart->destroy();
		redirect('c_tr_beli');
	}

	//checkout keranjang ke database
	public function view_checkout()
	{
		// Set ddl fk dari database
		$vn_nama = $this->m_tr_beli->getAllVendor();
		$data['nama_supp'] = $vn_nama;

		$data = array(
			'vendor' => $this->supplierModel->get_all_data(),
			//'isi' => 'transaksi/beli/v_checkout'
		);

		$this->load->view('staff_header', $data, FALSE);
        $this->load->view('transaksi/beli/v_checkout', $data, FALSE);
	}

	//checkout keranjang ke database
	public function checkout()
	{
		$kodeID = "TB";

		// Set ddl fk dari database
		$nama_supp = $this->m_tr_beli->getAllVendor();
		$data['nama_supp'] = $nama_supp;

			$id = $this->m_tr_beli->autoID();

			//simpan ke tabel transaksi
			$data = array(
                'id_pembelian'  => $kodeID.$id,
                'id_kary'       => $this->input->post('id_kary'),
                'id_supp'       => $this->input->post('id_supp'),
				'tb_tanggal'    => date('Y-m-d'),
				'tb_total'     	=> $this->input->post('tb_total')
            );
			$this->m_tr_beli->simpan_transaksi($data);
			
			//$this->session->set_flashdata('pesan', 'Transaksi pembelian berhasil!');

			//simpan ke tabel detail transaksi
			$i = 1;
			$j = 1;
			foreach ($this->cart->contents() as $items) {
				$detail = array( 
					'id_pembelian'     =>  $kodeID.$id,
					'id_produk'         => $items['id'],
					'tb_jumlah'   	=> $this->input->post('qty'.$i++),
					'tb_subtotal'   => $this->input->post('subtotal'.$j++)
				);
				
				$this->m_tr_beli->stok_transaksi($detail['tb_jumlah'],$detail['id_produk']);
				$this->m_tr_beli->simpan_detail_transaksi($detail);
			}

			$this->cart->destroy();
			redirect('c_tr_beli');
	}
}

?>