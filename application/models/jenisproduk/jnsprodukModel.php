<?php defined('BASEPATH') OR exit ('No direct script access allowed');

class jnsprodukModel extends CI_Model
{
	private $_table = "msjenisproduk";

	public function getAll()
	{
		return $this->db->get_where($this->_table, ["status" => 1])->result();
	}

	public function getById($id_jnsproduk)
    {
        return $this->db->get_where($this->_table, ["id_jnsproduk" => $id_jnsproduk])->row();
    }

	public function save()
	{
		$post = $this->input->post();
		$this->nama_jnsproduk = $post["nama_jnsproduk"];
		$this->deskripsi = $post["deskripsi"];
		$this->status = 1;
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
        $this->db->where($where);
        $this->db->update($_table,$data);
    }

}
?>
