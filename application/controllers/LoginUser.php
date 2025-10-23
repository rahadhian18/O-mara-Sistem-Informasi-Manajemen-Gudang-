<?php
defined('BASEPATH') or exit('No direct script access allowed');

class LoginUser extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model("loginUserModel");
		$this->load->model("loginPelangganModel");
		$this->load->library('session');
	}

	public function index()
	{
		$this->load->view('LoginUser'); // GABUNG tampilan login user & pelanggan
	}

	public function aksi_login()
	{
		$email = $this->input->post('email');
		$password = $this->input->post('password');

		if (!empty($email) && !empty($password)) {
			// Coba cari dulu sebagai karyawan
			$karyawan = $this->loginUserModel->getByEmail($email);

			if ($karyawan && password_verify($password, $karyawan->password)) {
				// Login sebagai karyawan
				$this->session->set_userdata([
					'email' => $karyawan->email,
					'nama' => $karyawan->nama_kary,
					'id_role' => $karyawan->id_role,
					'id_user' => $karyawan->id_kary,
					'id_kary' => $karyawan->id_kary,
					'tipe' => 'karyawan'
				]);

				switch ($karyawan->id_role) {
					case '1':
						redirect('Dashboard');
						break;
					case '2':
						redirect('Dashboard_Staff');
						break;
					case '3':
						redirect('Dashboard_Manager');
						break;
					default:
						redirect('Dashboard_Kurir');
						break;
				}
			}

			// Kalau bukan karyawan, cek sebagai pelanggan
			$pelanggan = $this->loginPelangganModel->getByEmail($email); // pastikan ini ambil data pelanggan saja
// var_dump($pelanggan);
// exit;
		if ($pelanggan) {
			if (password_verify($password, $pelanggan->password)) {
				$this->session->set_userdata([
					'email' => $pelanggan->email,
					'nama' => $pelanggan->nama_pelanggan,
					'id_user' => $pelanggan->id_pelanggan,
					'id_pelanggan' => $pelanggan->id_pelanggan, // Tambahkan ini
					'tipe' => 'pelanggan'
				]);
				redirect('Dashboardpelanggan');
			} else {
				echo "<script>alert('Password salah'); window.location.href='" . site_url('LoginUser') . "';</script>";
			}
		} else {
				echo "<script>alert('Email tidak ditemukan'); window.location.href='" . site_url('LoginUser') . "';</script>";
			}
		}
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect(site_url('LoginUser'));
	}
}
