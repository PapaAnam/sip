<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Keluar extends CI_Controller {

	public function index()
	{
		$this->session->unset_userdata('username');
		$this->session->unset_userdata('avatar');
		$this->session->unset_userdata('email');
		$this->session->unset_userdata('role');
		$this->session->unset_userdata('karyawan');
		redirect('login');
	}	
}
