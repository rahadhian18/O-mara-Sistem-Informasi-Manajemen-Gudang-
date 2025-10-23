<?php defined('BASEPATH') OR exit ('No direct script access allowed');

class produkModel extends CI_Model
{
	private $_table = "msproduk";

	public function getAll()
	{
       // return $this->db->query("SELECT * FROM msproduk u, msjenisbahan r, msukuran a, msjenisproduk p WHERE u.id_role = r.id_role and u.status=1")->result();

        $this->db->select('*');
        $this->db->from('msproduk');
        $this->db->join('msjenisbahan', 'msjenisbahan.id_bahan = msproduk.id_bahan', 'left');
        $this->db->join('msukuran', 'msukuran.id_ukuran = msproduk.id_ukuran', 'left');
        $this->db->join('msjenisproduk', 'msjenisproduk.id_jnsproduk = msproduk.id_jnsproduk', 'left');
        $this->db->where('status_produk', '1');
        $this->db->order_by('msproduk.id_produk', 'asc');
        return $this->db->get()->result();
	}

	public function getById($id_produk)
    {
        return $this->db->get_where($this->_table, ["id_produk" => $id_produk])->row();
    }

    function getBahan()
    {
        return $this->db->get_where("msjenisbahan", ["status" => 1 || 0])->result();
    }

    function getUkuran()
    {
        return $this->db->get_where("msukuran", ["status" => 1 || 0])->result();
    }

    function getJenisProduk()
    {
        return $this->db->get_where("msjenisproduk", ["status" => 1 || 0])->result();
    }

    // private function _uploadImage()
    // {
    //     $config['upload_path']          = './upload/produk/';
    //     $config['allowed_types']        = 'gif|jpg|png|jpeg';
    //     $config['file_name']            = $this->input->post('id_produk');
    //     $config['overwrite']            = true;
    //     $config['max_size']             = 1024; // 1MB
    //     $this->load->library('upload', $config);

    //     if ($this->upload->do_upload('gambar')) {
    //         $uploadData = $this->upload->data();
    //         $filename = $uploadData['file_name'];
    //         return $filename;

    //     }

       

    // }
	public function save()
	{

   // $this->db->insert('msproduk', $data);
		$post = $this->input->post();
        $this->id_bahan = $post["id_bahan"];
        $this->id_ukuran = $post["id_ukuran"];
        $this->id_jnsproduk = $post["id_jnsproduk"];
		$this->nama_produk = $post["nama_produk"];
        //'gambar' => $this->_uploadImage(),
		$this->harga_beli = $post["harga_beli"];
        $this->harga_jual = $post["harga_jual"];
        $this->stok = $post["stok"];
		$this->status_produk = 1;
        $this->creaby = $post["creaby"];
        $this->modiby = "-";
		$this->creadate = date("Y/m/d");
		$this->modidate= date("Y/m/d");
		
		return $this->db->insert($this->_table, $this);
	}

	public function edit($where, $_table) {
            return $this->db->get_where($_table,$where);
    }
    
    public function update($where,$data,$_table) {
        $this->db->update($_table, $data, $where);
    }

    public function delete($where, $_table){
        $this->db->delete($_table, $where);
    }

}
?>