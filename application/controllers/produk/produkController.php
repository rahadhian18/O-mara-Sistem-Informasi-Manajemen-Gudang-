<?php  
defined('BASEPATH') OR exit('No direct script access allowed');

class produkController extends CI_Controller
{

 public function __construct()
 {
  parent::__construct();
  $this->load->model("produk/produkModel");
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
  $this->load->library('upload');

}

        //tambah data
public function tambah()
{
    $gambar = $_FILES['gambar']['name'];


    if($gambar){
        $config['upload_path'] = './img';
        $config['allowed_types'] = 'jpg|jpeg|png|tiff';
        $config['max_size']  = '2000';

        $this->load->library('upload', $config);

        if($this->upload->do_upload('gambar')){
            $gambar = $this->upload->data('file_name');
            $this->db->set('gambar', $gambar);
        } else{
         $this->gagal();
     }
 }

 $produk = $this->produkModel;
 $result = $produk->save();
 if($result > 0) $this->sukses();
 else $this->gagal();
} 



        //fungsi untuk meload page role tambah
public function pageTambah()
{
    $data["bahan"] = $this->produkModel->getBahan();
    $data["ukuran"] = $this->produkModel->getUkuran();
    $data["jnsproduk"] = $this->produkModel->getJenisProduk();
    $this->load->view('admin_header', $data);
    $this->load->view('admin_footer', $data);
    $this->load->view('produk/produk_tambah', $data);
}

function sukses()
{
    redirect(site_url('produk/produkController'));
}

function gagal()
{
    echo "<script>alert('Input data gagal')</script>";
}

public function index()
{
  $data["produk"] = $this->produkModel->getAll();

  $this->load->view('admin_header', $data);
  $this->load->view('admin_footer', $data);
  $this->load->view('produk/produk_index', $data);
  $this->load->model('produkModel');
}

        //hapus data dengan mengubah nilai is_active
public function hapus()
{
    $id_produk = $this->input->post('id_produk');

    // menghapus gambar di folder img

    $delete_gambar = $this->produkModel->getById($id_produk);
    unlink("img/" . $delete_gambar->gambar);


    // $status = 0;

    // $data = array (
    //     'status' => $status
    // );

    $where = array (
        'id_produk' => $id_produk
    );

    $this->produkModel->delete($where,'msproduk');

    redirect(site_url('produk/produkController'));
}

        //untuk get data ke page edit
public function edit($id_produk) 
{
    $where = array('id_produk' => $id_produk);
    
    $data["bahan"] = $this->produkModel->getBahan();
    $data["ukuran"] = $this->produkModel->getUkuran();
    $data["jnsproduk"] = $this->produkModel->getJenisProduk();
    $data["produk"] = $this->produkModel->edit($where,'msproduk')->result();

    $this->load->view('admin_header', $data);
    $this->load->view('admin_footer', $data);
    $this->load->view('produk/produk_edit', $data);
}

        //update data ke database
public function update() {
    $id_produk = $this->input->post('id_produk');
    $id_bahan = $this->input->post('id_bahan');
    $id_ukuran = $this->input->post('id_ukuran');
    $id_jnsproduk = $this->input->post('id_jnsproduk');
    $nama_produk = $this->input->post('nama_produk');
    $harga_beli = $this->input->post('harga_beli');
    $harga_jual = $this->input->post('harga_jual');
    $stok = $this->input->post('stok');
    $modiby = '-';
    $modidate = date("Y/m/d");
    $gambar = $_FILES['gambar']['name'];

    if($gambar){
        $config['upload_path'] = './img';
        $config['allowed_types'] = 'jpg|jpeg|png|tiff';

        $this->load->library('upload', $config);

        if($this->upload->do_upload('gambar')){
            $gambar = $this->upload->data('file_name');
            $this->db->set('gambar', $gambar);
        } else{
            $this->gagal();
        }

                //menghapus gambar di folder img

        $delete_gambar = $this->produkModel->getById($id_produk);
        unlink("img/" . $delete_gambar->gambar);
    }

    $produk = array (
        'id_produk' => $id_produk,
        'id_bahan' => $id_bahan,
        'id_ukuran' => $id_ukuran,
        'id_jnsproduk' => $id_jnsproduk,
        'nama_produk' => $nama_produk,
        'harga_beli' => $harga_beli,
        'harga_jual' => $harga_jual,
        'stok' => $stok,
        'modiby' => $modiby,
        'modidate' => $modidate
    );

    $where = array (
        'id_produk' => $id_produk
    );

    // var_dump ($where);
    // die();

    $this->produkModel->update($where,$produk,'msproduk');
    redirect(site_url('produk/produkController'));
}
}
?>