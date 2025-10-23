<?php defined('BASEPATH') or exit('No direct script access allowed');

class supplierModel extends CI_Model
{
    private $_table = "mssupplier";

    public function get_all_data(){
        $this->db->select('*');
        $this->db->from('mssupplier');
        $this->db->where('status', '1');
        $this->db->order_by('id_supp', 'asc');
        return $this->db->get()->result();
    }
    
    public function getAll()
    {
		return $this->db->get_where($this->_table, ["status" => 1])->result();
    }

    //untuk username tidak boleh sama
   
    public function getById($id_supp)
    {
        return $this->db->get_where($this->_table, ["id_supp" => $id_supp])->row();
    }

    public function save()
    {
        $post = $this->input->post();
        // $this->nama_tipe = $post["nama_tipe"];
        $this->nama_supp = $post["nama_supp"];
        $this->telepon = $post["telepon"];
        $this->alamat = $post["alamat"];
        
        $this->status = 1;
      
        $this->creaby= $post["creaby"];
        $this->modiby = "-";
        $this->creadate = date("Y/m/d");
        $this->modidate = date("Y/m/d");
        
        return $this->db->insert($this->_table, $this);
    }

   

    public function edit($where, $_table)
    {
        return $this->db->get_where($_table, $where);
    }

    public function update($where,$data,$_table) {
        $this->db->where($where);
        $this->db->update($_table,$data);
    }


    
}
