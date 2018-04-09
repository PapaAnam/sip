<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profil extends CI_Controller {

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
		$this->load->helper('tanggal');
		$this->load->model('akunmodel', 'am');
		$k = [];
		$this->load->view('profil/index', [
			'title'		=> 'Profil',
			'd'			=> $this->am->get_by_username($this->session->userdata('username'))
		]+$this->tambahan);
	}

	private $tambahan = [];
	private $is_unique = true;

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

	public function perbarui()
	{
		$this->is_unique = false;
		$this->validation();
		if ($this->form_validation->run() == FALSE)
		{
			$this->index();
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
					$this->index();
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
			$user = $this->am->get_by_username($this->session->username);
			$this->am->update($user->akun_id, $update_data);
			// dd($user->akun_id);
			$this->session->set_userdata('success_msg', 'Akun berhasil diperbarui');
			$destroy_session = function(){
				$this->session->unset_userdata('username');
				$this->session->unset_userdata('avatar');
				$this->session->unset_userdata('email');
				$this->session->unset_userdata('role');
			};
			if($this->session->userdata('username') != $this->input->post('username')){
				$this->session->set_userdata('belum_login', 'Username sudah diubah. Silakan masuk kembali.');
				$destroy_session();
				redirect('login');
				return;
			}
			if($_FILES['avatar']['name'] != ''){
				$this->session->set_userdata('belum_login', 'Avatar sudah diubah. Silakan masuk kembali.');
				$destroy_session();
				redirect('login');
				return;
			}
			if($this->session->userdata('email') != $this->input->post('email')){
				$this->session->set_userdata('belum_login', 'Email sudah diubah. Silakan masuk kembali.');
				$destroy_session();
				redirect('login');
				return;
			}
			redirect('profil');
		}
	}
}
