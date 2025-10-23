
<?php
defined('BASEPATH') or exit('No direct script access allowed');



class karyawanController extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model("karyawan/karyawanModel");

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
        $karyawan = $this->karyawanModel;
        $result = $karyawan->save2();
        if ($result == 1) $this->sukses();
        else $this->gagal();
    }

    //fungsi untuk meload page karyawan tambah
    public function pageTambah()
    {
        $data["role"] = $this->karyawanModel->getRole();
        $data["username"] = $this->karyawanModel->getUsername();
        $this->load->view('admin_header', $data);
        $this->load->view('admin_footer', $data);
        $this->load->view('karyawan/karyawan_tambah', $data);
    }

    function sukses()
    {
        redirect(site_url('karyawan/karyawanController'));
    }

    function gagal()
    {
        echo "<script>alert('Username sudah tersedia!')
        window.location.href='".site_url('karyawan/karyawanController/pageTambah'). "';</script>";
    }

    function gagalUbah()
    {
        echo "<script>alert('Username sudah tersedia!')
        window.location.href='".site_url('karyawan/karyawanController'). "'
        ;</script>";
    }

   
    public function index()
    {
        $data["karyawan"] = $this->karyawanModel->getAll();
        $this->load->view('admin_header', $data);
        $this->load->view('admin_footer', $data);
        $this->load->view('karyawan/karyawan_index', $data);
    }

    //hapus data dengan mengubah nilai is_active
    public function hapus()
    {
        $id_kary = $this->input->post('id_kary');
        $status = 0;

        $data = array(
            'status' => $status
        );
        $where = array(
            'id_kary' => $id_kary
        );

        $this->karyawanModel->update($where, $data, 'mskaryawan');
        redirect(site_url('karyawan/karyawanController'));
    }

    //untuk get data ke page edit
    public function edit($id_kary)
    {
        $where = array('id_kary' => $id_kary);
        $data["role"] = $this->karyawanModel->getRole();
        $data["karyawan"] = $this->karyawanModel->edit($where, 'mskaryawan')->result();
        $this->load->view('admin_header', $data);
        $this->load->view('admin_footer', $data);
        $this->load->view('karyawan/karyawan_edit', $data);
    }

   

    //update data ke database untuk delete
    public function update()
    {
        $id_kary = $this->input->post('id_kary');
        $nama_kary = $this->input->post('nama_kary');
        $username = $this->input->post('username');
        $password_input = $this->input->post('password'); // Ambil input password
        $email = $this->input->post('email');
        $id_role = $this->input->post('id_role');
        $modiby = $this->input->post('modiby');
        $modidate = date("Y/m/d");

        $karyawan = array(
            'nama_kary' => $nama_kary,
            'username' => $username,
            'email' => $email,
            'id_role' => $id_role,
            'modiby' => $modiby,
            'modidate' => $modidate
        );

        // Hanya hash dan update password jika diisi
        if (!empty($password_input)) {
            $karyawan['password'] = password_hash($password_input, PASSWORD_DEFAULT);
        }

        $where = array('id_kary' => $id_kary);
        $result = $this->karyawanModel->update($where, $karyawan, 'mskaryawan');

        if ($result == 1) $this->sukses();
        else $this->gagalUbah();
    }

    public function updateAdmin()
    {
        $id_kary = $this->input->post('id_kary');
        $nama_kary = $this->input->post('nama_kary');
        $username = $this->input->post('username');
        $password_input = $this->input->post('password'); // Ambil input password
        $email = $this->input->post('email');
        $id_role = $this->input->post('id_role');
        $modiby = $this->input->post('modiby');
        $modidate = date("Y/m/d");

        $karyawan = array(
            'nama_kary' => $nama_kary,
            'username' => $username,
            'email' => $email,
            'modiby' => $modiby,
            'modidate' => $modidate
        );

        if (!empty($password_input)) {
            $karyawan['password'] = password_hash($password_input, PASSWORD_DEFAULT);
        }

        $where = array('id_kary' => $id_kary);

        // Perbarui session
        $newdata = array(
            'user_username' => $username,
            'user_name' => $nama_kary,
            'user_role' => $id_role,
            'id_kary' => $id_kary
        );
        $this->session->set_userdata($newdata);

        $result = $this->karyawanModel->update($where, $karyawan, 'mskaryawan');

        if ($result == 1) $this->sukses();
        else $this->gagalUbah();
    }

    // public function updateAnggota()
    // {
    //     $id_user = $this->input->post('id_user');
    //     $nama_user = $this->input->post('nama_user');
    //     $username = $this->input->post('username');
    //     $password = $this->input->post('password');
    //     $email = $this->input->post('email');
    //     // $created_by = "-";
    //     $updated_at = date("Y/m/d");
    //     //$update_by = $this->input->post('updated_by');
    //     $updated_by = $this->input->post('updated_by');

    //     $user = array(
    //         'nama_user' => $nama_user,
    //         'username' => $username,
    //         'email' => $email,
    //         'updated_at' => $updated_at,
    //         'updated_by' => $updated_by
    //     );
    //     $where = array(
    //         'id_user' => $id_user
    //     );

    //     $newdata = array(
    //                 'user_username' => $username,
    //                 'user_name' => $nama_user,
    //                 'user_role' => $id_role,
    //                 'id_user' => $id_user
    //                 );
    //     $this->session->set_userdata($newdata);

    //     $result = $this->userModel->update($where, $user, 'user');
    //     if ($result == 1) redirect(site_url('pelacak/pelacakController'));
    //     else $this->gagalUbahAnggota();
    // }

    // public function updatePustakawan()
    // {
    //     $id_user = $this->input->post('id_user');
    //     $nama_user = $this->input->post('nama_user');
    //     $username = $this->input->post('username');
    //     $password = $this->input->post('password');
    //     $email = $this->input->post('email');
    //     // $created_by = "-";
    //     $updated_at = date("Y/m/d");
    //     //$update_by = $this->input->post('updated_by');
    //     $updated_by = $this->input->post('updated_by');

    //     $user = array(
    //         'nama_user' => $nama_user,
    //         'username' => $username,
    //         'email' => $email,
    //         'updated_at' => $updated_at,
    //         'updated_by' => $updated_by
    //     );
    //     $where = array(
    //         'id_user' => $id_user
    //     );

    //     $newdata = array(
    //                 'user_username' => $username,
    //                 'user_name' => $nama_user,
    //                 'id_user' => $id_user
    //                 );
    //     $this->session->set_userdata($newdata);

    //     $result = $this->userModel->update($where, $user, 'user');
    //     if ($result == 1) redirect(site_url('absensi/absensiController'));
    //     else $this->gagalUbahPustakawan();
    // }
}
