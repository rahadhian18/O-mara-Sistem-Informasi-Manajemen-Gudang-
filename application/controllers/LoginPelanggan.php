<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class LoginPelanggan extends CI_Controller{
 
    public function __construct()
    {
     parent::__construct();
     $this->load->model('loginPelangganModel');
     
    }
   
    function index()
    {
     $this->load->view('loginPelanggan');
    }
   
    function validation()
    {
      $result = $this->loginPelangganModel->can_login($this->input->post('email'), $this->input->post('password'));
      if($result == '')
      {
       redirect('DashboardPelanggan');
      }
      else
      {
       $this->session->set_flashdata('message',$result);
       redirect('loginPelangganModel');
      }
     
    }
   
}
   
?>
   