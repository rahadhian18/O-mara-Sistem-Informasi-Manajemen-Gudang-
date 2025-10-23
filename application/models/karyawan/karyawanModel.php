<?php defined('BASEPATH') or exit('No direct script access allowed');

class karyawanModel extends CI_Model
{
    private $_table = "mskaryawan";

    public function getAll()
    {
        return $this->db->query("SELECT * FROM mskaryawan u, msrole r WHERE u.id_role = r.id_role and u.status=1")->result();
    }

    //untuk username tidak boleh sama
    function getUsername()
    {
        $query = $this->db->query('SELECT username FROM mskaryawan');
        return $query->result();
    }

    public function getById($id_kary)
    {
        return $this->db->get_where($this->_table, ["id_kary" => $id_kary])->row();
    }

    public function save()
    {
        $post = $this->input->post();
        // $this->nama_tipe = $post["nama_tipe"];
        $this->nama_kary = $post["nama_kary"];
        $this->username = $post["username"];
        $this->password = password_hash($post["password"], PASSWORD_DEFAULT);
        $this->email = $post["email"];
        $this->status = 1;
        $this->id_role = $post["id_role"];
        $this->creaby= $post["creaby"];
        $this->modiby = "-";
        $this->creadate = date("Y/m/d");
        $this->modidate = date("Y/m/d");
        
        return $this->db->insert($this->_table, $this);
    }

    public function save2()
    {
        $post = $this->input->post();
        
        $nama_kary = $post["nama_kary"];
        $username = $post["username"];
        $password = password_hash($post["password"], PASSWORD_DEFAULT); // ENKRIPSI DI SINI
        $email = $post["email"];
        $status = 1;
        $id_role = $post["id_role"];
        $creaby = $post["creaby"];
        $modiby = "-";
        $creadate = date("Y/m/d");
        $modidate = date("Y/m/d");
        

        $this->db->query("INSERT INTO mskaryawan (nama_kary, username, password, email, status, id_role, creaby, modiby, creadate, modidate) SELECT '" . $nama_kary . "', '" . $username . "', '" . $password . "', '" . $email . "', '" . $status . "','" . $id_role . "', '" . $creaby . "', '" . $modiby . "', '" . $creadate . "', '" . $modidate . "' WHERE NOT EXISTS (SELECT username from mskaryawan WHERE username = '" . $username . "')");

        $afftectedRows = $this->db->affected_rows();
        if ($afftectedRows == 1) {
            return 1;
        } else {
            return 2;
        }
    }

    public function edit($where, $_table)
    {
        return $this->db->get_where($_table, $where);
    }

    public function update($where, $data, $_table)
    {
        // $this->db->where($where);
        // $this->db->update($_table, $data);
        $post = $this->input->post();
        $username = $post['username'];
        $id_kary = $post['id_kary'];

        $this->db->query("SELECT * from mskaryawan where username = '" . $username . "' and id_kary != $id_kary");

        $afftectedRows = $this->db->affected_rows();
        if ($afftectedRows == 0) {
            $this->db->where($where);
            $this->db->update($_table, $data);
            return 1;
        } else {
            return 2;
        }
    }


    function getRole()
    {
        $query = $this->db->query('SELECT * FROM msrole where status = 1');
        return $query->result();
    }
}
