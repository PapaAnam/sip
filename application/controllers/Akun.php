<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Akun extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if(!$this->session->userdata('username')){
			$this->session->set_userdata('belum_login', 'Anda tidak berhak mengakses halaman. Silakan masuk terlebih dahulu.');
			redirect('login');
		}
		if($this->session->userdata('role') != 'admin'){
			show_404();
		}
	}

	public function index()
	{
		$this->load->library('myview');
		$this->load->helper('tanggal');
		$this->load->model('akunmodel', 'am');
		$this->myview->table('akun/index', [
			'title'		=> 'Akun',
			'data'		=> $this->am->data()
		]);
	}

	private $tambahan = [];
	private $is_unique = true;

	public function tambah()
	{
		$this->load->library('form_validation');
		$this->load->helper('tanggal');
		$this->load->library('myview');
		$this->load->model('karyawanmodel', 'km');
		$karyawan = $this->km->data();
		$this->myview->generate('akun/tambah', [
			'title'			=> 'Tambah Akun',
			'breadcrumb'	=> [
				'link'		=> base_url('akun'),
				'name'		=> 'Akun'
			],
			'karyawan'		=> $karyawan,
		]+$this->tambahan);
	}

	private function validation()
	{
		$this->load->library('form_validation');
		if($this->is_unique)
			$this->form_validation->set_rules('username', 'Username', 'required|is_unique[akun.username]|min_length[6]');
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
		$this->form_validation->set_rules('password', 'Password', 'required|min_length[8]');
		$this->form_validation->set_rules('konfirmasi_password', 'Konfirmasi Password', 'required|matches[password]');
		$this->form_validation->set_rules('kota_asal', 'Kota Asal', 'required');
		$this->form_validation->set_rules('no_hp', 'No HP', 'required');
		$this->form_validation->set_message('required', '{field} wajib diisi!');
		$this->form_validation->set_message('numeric', '{field} hanya angka yang diperbolehkan!');
		$this->form_validation->set_message('is_unique', '{field} sudah digunakan!');
		$this->form_validation->set_message('matches', '{field} tidak sesuai dengan {param}!');
		$this->form_validation->set_message('valid_email', '{field} tidak sesuai dengan format!');
		$this->form_validation->set_message('min_length', '{field} minimal {param} karakter!');
		$this->load->library('session');
	}

	public function store()
	{
		$this->validation();
		if ($this->form_validation->run() == FALSE)
		{
			$this->tambah();
		}
		else
		{
			$config['upload_path']          = './images/avatars/';
			$config['allowed_types']        = 'jpg|png';
			$config['max_size']             = 100;
			$config['max_width']            = 1024;
			$config['max_height']           = 768;
			$this->load->library('upload', $config);

			if ( ! $this->upload->do_upload('avatar'))
			{
				$error = array('error' => $this->upload->display_errors());
				$this->tambahan = $error;
				$this->tambah();
			}
			else
			{
				$data = array('upload_data' => $this->upload->data());
				$this->load->model('akunmodel', 'am');
				$this->am->insert($this->input->post()+[
					'avatar'		=> base_url('images/avatars/'.$data['upload_data']['orig_name'])
				]);
				$this->session->set_userdata('success_msg', 'Akun baru berhasil dibuat');
				redirect('akun');
			}
		}
	}

	public function ubah($id)
	{
		$this->load->library('form_validation');
		$this->load->library('myview');
		$this->load->model('akunmodel', 'am');
		$d = $this->am->get_by_id($id);
		$this->myview->generate('akun/ubah', [
			'title'			=> 'Ubah Akun',
			'breadcrumb'	=> [
				'link'		=> base_url('akun'),
				'name'		=> 'Akun'
			],
			'd'				=> $d,
		]+$this->tambahan);
	}

	public function update($id)
	{
		$this->is_unique = false;
		$this->validation();
		if ($this->form_validation->run() == FALSE)
		{
			$this->ubah($id);
		}
		else
		{
			$update_data = $this->input->post();
			$this->load->helper('tanggal');
			if($_FILES['avatar']['name'] === '' || is_null($_FILES['avatar']['name'])){
				unset($update_data['avatar']);
			}else{
				
				$config['upload_path']          = './images/avatars/';
				$config['allowed_types']        = 'jpg|png';
				$config['max_size']             = 100;
				$config['max_width']            = 1024;
				$config['max_height']           = 768;
				$this->load->library('upload', $config);
				if ( ! $this->upload->do_upload('avatar'))
				{
					$error = array('error' => $this->upload->display_errors());
					$this->tambahan = $error;
					$this->ubah($id);
					return;
				}
				else
				{
					$data = array('upload_data' => $this->upload->data());
					$update_data = [
						'avatar'	=> base_url('images/avatars/'.$data['upload_data']['orig_name'])
					] + $update_data;
				}	
			}
			$this->load->model('akunmodel', 'am');
			$this->am->update($id, $update_data);
			$this->session->set_userdata('success_msg', 'Akun berhasil diperbarui');
			redirect('akun');
		}
	}

	public function hapus()
	{
		$this->load->model('akunmodel', 'am');
		$this->am->hapus($this->input->post('id'));
		$this->session->set_userdata('success_msg', 'Akun berhasil dihapus');
		redirect('akun');
	}

	public function imporexcel()
	{
		$this->load->library('form_validation');
		$this->load->library('myview');
		$this->myview->generate('akun/imporexcel', [
			'title'			=> 'Impor Akun Dari Excel',
			'breadcrumb'	=> [
				'link'		=> base_url('akun'),
				'name'		=> 'Akun'
			]
		]);
	}

	public function imporexcelstore()
	{
		$this->load->helper('file');
		$this->load->library('importexcel');
		$config['upload_path']          = './assets/uploads/';
		$config['allowed_types']        = 'xls|xlsx';
		$this->load->library('upload');
		$this->upload->initialize($config);
		if ( ! $this->upload->do_upload('excel'))
		{
			$this->load->library('session');
			$this->session->set_flashdata('error', $this->upload->display_errors());
			$this->imporexcel();
		}
		else
		{
			$data = array('upload_data' => $this->upload->data());
			$datanya = $this->importexcel->get($data['upload_data']['full_path']);
			$columns = $this->importexcel->get_column($data['upload_data']['full_path']);
			if(count($datanya) > 0){
				$errors = [];
				if(!in_array('username', $columns))
					$errors[] = 'Kolom username tidak ditemukan';
				if(!in_array('role', $columns))
					$errors[] = 'Kolom role tidak ditemukan';
				if(!in_array('email', $columns))
					$errors[] = 'Kolom email tidak ditemukan';
				if(!in_array('tgl_dibuat', $columns))
					$errors[] = 'Kolom tgl_dibuat tidak ditemukan';
				if(!in_array('avatar', $columns))
					$errors[] = 'Kolom avatar tidak ditemukan';
				if(!in_array('password', $columns))
					$errors[] = 'Kolom password tidak ditemukan';
				if(!in_array('kota_asal', $columns))
					$errors[] = 'Kolom kota_asal tidak ditemukan';
				if(count($errors) > 0){
					$this->session->set_flashdata('error', $errors);
					$this->imporexcel();
				}else{
					$this->load->model('akunmodel', 'am');
					if(count($datanya) > 0){
						foreach ($datanya as $d) {
							$this->am->update_or_create([
								'username'	=> $d['username']
							], ['password'=>md5($d['password'])]+$d);
						}
						$this->session->set_flashdata('success_msg', 'Impor dari excel berhasil dilakukan');
						redirect('akun');
					}
					else{
						$this->session->set_flashdata('error', 'Tidak ada yang diimport data kosong');
						$this->imporexcel();
					}
				}
			}else{
				$this->session->set_flashdata('error', 'baris tidak ditemukan');
				$this->imporexcel();
			}
		}
	}

	public function cetak()
	{
		$this->load->model('akunmodel', 'am');
		$this->load->view('akun/cetak', [
			'title'		=> 'Cetak Akun',
			'data'		=> $this->am->data()
		]);
	}

	public function pdf()
	{
		$this->load->model('akunmodel', 'am');
		$html = $this->load->view('akun/cetak', [
			'title'		=> 'Cetak Akun',
			'data'		=> $this->am->data(),
			'is_pdf'	=> true,
		], true);
		$this->load->library('pdfgenerator');
		$this->pdfgenerator->generate($html, 'data akun '.date('Y-m-d H:i:s'), true, 'legal', 'landscape', 1);
	}
}
