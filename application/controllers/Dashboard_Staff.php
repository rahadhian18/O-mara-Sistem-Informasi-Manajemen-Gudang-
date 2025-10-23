<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard_Staff extends CI_Controller {


	public function index()
	{
		$this->load->view('staff_header');
		//$this->load->view('index');
		
	}
}