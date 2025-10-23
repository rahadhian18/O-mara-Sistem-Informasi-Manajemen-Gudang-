<?php

class M_tr_jual extends CI_Model{
    //menampilkan semua data produk yang ada
    public function get_all_data(){
        $this->db->select('*');
        $this->db->from('msproduk');
        $this->db->join('msjenisbahan', 'msjenisbahan.id_bahan = msproduk.id_bahan', 'left');
        $this->db->join('msukuran', 'msukuran.id_ukuran = msproduk.id_ukuran', 'left');
        $this->db->join('msjenisproduk', 'msjenisproduk.id_jnsproduk = msproduk.id_jnsproduk', 'left');
        $this->db->where('status_produk', '1');
        $this->db->order_by('id_produk', 'asc');
        return $this->db->get()->result();
    }
    
    
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

    //auto id
    function autoID(){
        $checkID = $this->db->query("SELECT MAX(RIGHT(tj_id,5)) AS lastID FROM trpemesanan");
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

    //save ke database transaksi jual
    public function simpan_transaksi($data){
        $this->db->insert('trpemesanan', $data);
    }

    //save ke database detail transaksi jual
    public function simpan_detail_transaksi($detail){
        $this->db->insert('tr_detail_jual', $detail);
    }

    //update stok
    public function stok_transaksi($data){
        $this->db->where('id_produk', $data['id_produk']);
        $this->db->update('msproduk', $data);
    }

    //view pelanggan transaksi belum dibayar
    public function cust_belumbayar(){
        $where = array('id_pelanggan' => $this->session->userdata('id_pelanggan'));
        $this->db->select('*');
        $this->db->where( $where);
        $this->db->from('trpemesanan');
        $this->db->order_by('tj_id', 'asc');
        return $this->db->get()->result();
    }

    //view pelanggan transaksi diproses
    public function cust_diproses(){
        $where = array('id_pelanggan');
        $this->db->select('*');
        $this->db->from('trpemesanan');
        return $this->db->get()->result();
    }

    //view pelanggan transaksi dikirim
    public function cust_dikirim(){
        $where = array('tj_status' => '4', 'id_pelanggan' => $this->session->userdata('id_pelanggan'));
        $this->db->select('*');
        $this->db->from('trpemesanan');
        $this->db->where( $where);
        $this->db->order_by('tj_id', 'asc');
        return $this->db->get()->result();
    }

    //view pelanggan transaksi dikirim
    public function cust_selesai(){
        $where = array('tj_status');
        $this->db->select('*');
        $this->db->from('trpemesanan');
        $this->db->where( $where);
        $this->db->order_by('tj_id', 'asc');
        return $this->db->get()->result();
    }

    public function detail_transaksi($tj_id)
    {
        $this->db->select('*');
        $this->db->from('trpemesanan');
        $this->db->where('tj_id', $tj_id);
        return  $this->db->get()->row();
    }

    public function rekening()
    {
        $this->db->select('*');
        $this->db->from('tb_jenis_pembayaran');
        return  $this->db->get()->result();
    }

    public function upload_buktibayar($data)
    {
        $this->db->where('tj_id', $data['tj_id']);
        $this->db->update('trpemesanan', $data);
    }

    public function update_status($data)
    {
        $this->db->where('tj_id', $data['tj_id']);
        $this->db->update('trpemesanan', $data);        
    }

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

?>