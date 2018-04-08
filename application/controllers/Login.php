<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function index()
	{
		$this->load->view('login/index');
	}	

	public function proses()
	{
		$exist = $this->db->from('akun')
		->where('username', $this->input->post('username'))
		->count_all_results() > 0;
		if($exist){
			$exist = $this->db->from('akun')
			->where('username', $this->input->post('username'))
			->where('password', md5($this->input->post('password')))
			->count_all_results() > 0;
			if($exist){
				$user = $this->db->from('akun')
				->where('username', $this->input->post('username'))
				->where('password', md5($this->input->post('password')))
				->limit(1)
				->get()
				->row();
				$this->db
				->where('username', $this->input->post('username'))
				->where('password', md5($this->input->post('password')))
				->update('akun', [
					'terakhir_login'	=> date('Y-m-d H:i:s')
				]);
				$this->session->set_userdata('username', $user->username);
				$this->session->set_userdata('karyawan', $user->karyawan);
				$this->session->set_userdata('avatar', $user->avatar);
				$this->session->set_userdata('email', $user->email);
				$this->session->set_userdata('role', $user->role);
				redirect('');
			}else{
				$this->load->library('session');
				$this->session->set_userdata('pass_error', 'Password yang anda masukkan salah!!!');
				redirect('login');
			}
		}else{
			$this->load->library('session');
			$this->session->set_userdata('error', 'Username tidak tersedia!!!');
			redirect('login');
		}
	}
}
