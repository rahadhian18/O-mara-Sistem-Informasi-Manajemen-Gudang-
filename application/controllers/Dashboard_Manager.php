<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard_Manager extends CI_Controller {

	// public function __construct()
	// {
		
	// 	$this->load->library('session');

	// 	if (!$this->session->userdata('id_kary') && !$this->session->userdata('id_pelanggan')) {
	// 		echo 'Session tidak ada';
	// 		// exit(); // uncomment untuk debugging
	// 		redirect('LoginUser');
	// 	} else {
	// 		if ($this->session->userdata('id_kary')) {
	// 			echo 'Session karyawan terdeteksi: ' . $this->session->userdata('id_kary');
	// 		} elseif ($this->session->userdata('id_pelanggan')) {
	// 			echo 'Session pelanggan terdeteksi: ' . $this->session->userdata('id_pelanggan');
	// 		}
	// 		// exit(); // optional untuk debugging
	// 	}
	// }

	public function index()
	{
		$this->load->view('manager_header');
		//$this->load->view('index');
		
	}
}