<?php
class loginPelangganModel extends CI_Model
{
  public function can_login($email, $password)
  {
    $this->db->where('email', $email);
    $query = $this->db->get('mspelanggan');

    if ($query->num_rows() > 0) {
      $user = $query->row();
      if (password_verify($password, $user->password)) {
        return $user;
      } else {
        return "Wrong Password";
      }
    } else {
      return "Email not registered";
    }
  }



  public function getByEmail($email)
  {
    return $this->db->get_where('mspelanggan', ['email' => $email])->row();
  }




  


  public function add($data)
  {
    return $this->db->insert('mspelanggan', $data);
  }
}
