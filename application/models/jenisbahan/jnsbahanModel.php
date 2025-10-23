<?php defined('BASEPATH') OR exit ('No direct script access allowed');

class jnsbahanModel extends CI_Model
{
	private $_table = "msjenisbahan";

	public function getAll()
	{
		return $this->db->get_where($this->_table, ["status" => 1])->result();
	}

	public function getById($id_bahan)
    {
        return $this->db->get_where($this->_table, ["id_bahan" => $id_bahan])->row();
    }

	public function save()
	{
		$post = $this->input->post();
		$this->nama_bahan = $post["nama_bahan"];
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
