<?php

class Model_produk extends CI_Model{
    
    public function tampil_data(){
        $this->db->select('*');
        $this->db->from('msproduk');
        //$this->db->where('status', '1');
        $this->db->order_by('id_produk', 'asc');
        return $this->db->get()->result();
    }

    public function find($id)
    {
       
        $result = $this->db->where('id_produk', $id)
                            ->limit(1)
                            ->get('msproduk');
        if($result->num_rows() > 0){
            return $result->row();
        }else{
            return array();
        }
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

}