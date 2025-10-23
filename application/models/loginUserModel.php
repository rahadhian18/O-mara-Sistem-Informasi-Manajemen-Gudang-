<?php
defined('BASEPATH') OR exit('No direct script access allowed');

	class loginUserModel extends CI_Model{		
        
		function cek_login($table,$where){		
            return $this->db->get_where($table,$where);
        }

        private $_table = "mskaryawan";

        public function getByUsername($email)
	    {
	        return $this->db->get_where($this->_table, ["email" => $email])->row();
	    }

	public function getByEmail($email)
	{
		return $this->db->get_where($this->_table, ['email' => $email])->row();
	}


	public function getByUsernamePassword()
		{
			$post1 = $this->input->post();
			$email = $post1["email"];
			$password = $post1["password"];
			$array = array('email' => $email, 'password' => $password);
			$query = $this->db->get_where($this->_table,$array);
			return $query->row();
		}
	}
?>