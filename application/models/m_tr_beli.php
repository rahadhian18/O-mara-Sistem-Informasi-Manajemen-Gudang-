<?php

class m_tr_beli extends CI_Model{
    //menampilkan semua data produk yang ada
    public function get_all_data(){
        $this->db->select('*');
        $this->db->from('msproduk');
        $this->db->join('msjenisbahan', 'msjenisbahan.id_bahan = msproduk.id_bahan', 'left');
        $this->db->join('msukuran', 'msukuran.id_ukuran = msproduk.id_ukuran', 'left');
        $this->db->join('msjenisproduk', 'msjenisproduk.id_jnsproduk = msproduk.id_jnsproduk', 'left');
        $this->db->where('status_produk','1');
        $this->db->order_by('id_produk', 'asc');
        return $this->db->get()->result();
    }
    
    //menampilkan detail produk yang di klik
    public function detail_produk($id_produk)
    {
        $this->db->select('*');
        $this->db->from('msproduk');
        $this->db->join('msjenisbahan', 'msjenisbahan.id_bahan = msproduk.id_bahan', 'left');
        $this->db->join('msukuran', 'msukuran.id_ukuran = msproduk.id_ukuran', 'left');
        $this->db->join('msjenisproduk', 'msjenisproduk.id_jnsproduk = msproduk.id_jnsproduk', 'left');
        $this->db->where('id_produk', $id_produk);
        return $this->db->get()->row();
    }

    //get vendor dari database
    public function getAllVendor()
    {
        return $this->db->get_where("mssupplier", ["status" => 1 || 0])->result();
    }

    //auto id
    function autoID(){
        $checkID = $this->db->query("SELECT MAX(RIGHT(id_pembelian,5)) AS lastID FROM trpembelian");
        $generateID = "";
        if($checkID->num_rows()>0){
            foreach($checkID->result() as $resultID){
                $tmp = ((int)$resultID->lastID)+1;
                $generateID = sprintf("%05s", $tmp);
            }
        }else{
            $generateID = "00001";
        }
        return $generateID;
    }

    //save ke database transaksi beli
    public function simpan_transaksi($data){
        $this->db->insert('trpembelian', $data);
    }

    //save ke database detail transaksi beli
    public function simpan_detail_transaksi($detail){
        $this->db->insert('tb_detail_beli', $detail);
    }

    //update stok
    public function stok_transaksi($jumlah, $id){
       $this->db->query("update msproduk set stok=stok + $jumlah where id_produk = $id");
    }
}
?>