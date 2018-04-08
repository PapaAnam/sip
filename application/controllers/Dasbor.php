<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dasbor extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if(!$this->session->userdata('username')){
			$this->session->set_userdata('belum_login', 'Anda tidak berhak mengakses halaman. Silakan masuk terlebih dahulu.');
			redirect('login');
		}
	}

	public function index()
	{
		$this->load->library('myview');
		$this->load->model('karyawanmodel', 'km');
		$this->load->model('penggajianmodel', 'pm');
		$this->load->model('akunmodel', 'am');
		$divisi = $this->km->divisi();
		$this->load->helper('tanggal');
		$this->myview->generate('dasbor/index', [
			'divisi'			=> $divisi,
			'title'				=> 'Dasbor',
			'total_karyawan'	=> $this->km->total_karyawan_semua(),
			'total_divisi'		=> $this->km->total_divisi(),
			'total_penggajian'	=> $this->pm->total(),
			'total_akun'		=> $this->am->total(),
			'karyawan_by_grup'	=> $this->km->by_grup(),
		]);
	}	

	
}
