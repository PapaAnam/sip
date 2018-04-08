<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Karyawan extends CI_Controller {

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

	private $tambahan = [];

	public function index()
	{
		$this->load->library('myview');
		$this->load->helper('tanggal');
		$this->load->model('karyawanmodel', 'km');
		$this->myview->table('karyawan/index', [
			'title'		=> 'Karyawan',
			'data'		=> $this->km->data()
		]);
	}

	public function tambah()
	{
		$this->load->library('form_validation');
		$this->load->library('myview');
		$this->myview->generate('karyawan/tambah', [
			'title'			=> 'Tambah Karyawan',
			'breadcrumb'	=> [
				'link'		=> base_url('karyawan'),
				'name'		=> 'Karyawan'
			]
		]);
	}

	private function validation()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('nama', 'Nama Lengkap', 'required');
		$this->form_validation->set_rules('nik', 'NIK', 'required|numeric');
		$this->form_validation->set_rules('kota_lahir', 'Kota Lahir', 'required');
		$this->form_validation->set_rules('tgl_lahir', 'Tanggal Lahir', 'required');
		$this->form_validation->set_rules('grade', 'Grade', 'required');
		$this->form_validation->set_rules('divisi', 'Divisi', 'required');
		$this->form_validation->set_rules('jabatan', 'Jabatan', 'required');
		$this->form_validation->set_rules('tgl_gabung', 'Tanggal Gabung', 'required');
		$this->form_validation->set_rules('no_rek', 'No Rekening', 'required|numeric');
		$this->form_validation->set_rules('pendidikan', 'Pendidikan', 'required');
		$this->form_validation->set_rules('status_kawin', 'Status Kawin', 'required');
		$this->form_validation->set_rules('no_npwp', 'No NPWP', 'required|numeric');
		$this->form_validation->set_rules('grup', 'Grup', 'required');
		$this->form_validation->set_message('required', '{field} wajib diisi!');
		$this->form_validation->set_message('numeric', '{field} hanya angka yang diperbolehkan!');
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
			$this->load->model('karyawanmodel', 'km');
			$this->km->insert($this->input->post());
			$this->session->set_userdata('success_msg', 'Karyawan baru berhasil dibuat');
			redirect('karyawan');
		}
	}

	public function ubah($id)
	{
		$this->load->library('form_validation');
		$this->load->library('myview');
		$this->load->model('karyawanmodel', 'km');
		$d = $this->km->get_by_id($id);
		$this->myview->generate('karyawan/ubah', [
			'title'			=> 'Ubah Karyawan',
			'breadcrumb'	=> [
				'link'		=> base_url('karyawan'),
				'name'		=> 'Karyawan'
			],
			'd'				=> $d
		]);
	}

	public function update($id)
	{
		$this->validation();
		$this->validation();
		if ($this->form_validation->run() == FALSE)
		{
			$this->ubah($id);
		}
		else
		{
			$this->load->model('karyawanmodel', 'km');
			$this->km->update($id, $this->input->post());
			$this->session->set_userdata('success_msg', 'Karyawan berhasil diperbarui');
			redirect('karyawan');
		}
	}

	public function cek($id)
	{
		$this->load->model('karyawanmodel', 'km');
		echo json_encode($this->km->get_by_id($id));
	}

	public function hapus()
	{
		$this->load->model('karyawanmodel', 'km');
		$this->km->hapus($this->input->post('karyawan'));
		$this->session->set_userdata('success_msg', 'Karyawan berhasil dihapus');
		redirect('karyawan');
	}

	public function imporexcel()
	{
		$this->load->library('form_validation');
		$this->load->library('myview');
		$this->myview->generate('karyawan/imporexcel', [
			'title'			=> 'Impor Karyawan Dari Excel',
			'breadcrumb'	=> [
				'link'		=> base_url('karyawan'),
				'name'		=> 'Karyawan'
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
			$spreadsheet = $this->importexcel->generate($data['upload_data']['full_path']);
			$d = $sheetData = $spreadsheet->getActiveSheet()->toArray();
			if(count($d) > 0){
				$errors = [];
				$columns = $d[0];
				if(!in_array('nama', $columns))
					$errors[] = 'Kolom nama tidak ditemukan';
				if(!in_array('nik', $columns))
					$errors[] = 'Kolom nik tidak ditemukan';
				if(!in_array('kota_lahir', $columns))
					$errors[] = 'Kolom kota_lahir tidak ditemukan';
				if(!in_array('tgl_lahir', $columns))
					$errors[] = 'Kolom tgl_lahir tidak ditemukan';
				if(!in_array('grade', $columns))
					$errors[] = 'Kolom grade tidak ditemukan';
				if(!in_array('divisi', $columns))
					$errors[] = 'Kolom divisi tidak ditemukan';
				if(!in_array('jabatan', $columns))
					$errors[] = 'Kolom jabatan tidak ditemukan';
				if(!in_array('tgl_gabung', $columns))
					$errors[] = 'Kolom tgl_gabung tidak ditemukan';
				if(!in_array('no_rek', $columns))
					$errors[] = 'Kolom no_rek tidak ditemukan';
				if(!in_array('pendidikan', $columns))
					$errors[] = 'Kolom pendidikan tidak ditemukan';
				if(!in_array('status_kawin', $columns))
					$errors[] = 'Kolom status_kawin tidak ditemukan';
				if(!in_array('no_npwp', $columns))
					$errors[] = 'Kolom no_npwp tidak ditemukan';
				if(!in_array('grup', $columns))
					$errors[] = 'Kolom grup tidak ditemukan';
				if(count($errors) > 0){
					$this->load->library('session');
					$this->session->set_flashdata('error', $errors);
					$this->imporexcel();
				}else{
					$this->load->model('karyawanmodel', 'km');
					$columns = array_shift($sheetData);
					$data = [];
					foreach ($sheetData as $d) {
						$dt = [];
						$i = 0;
						foreach ($columns as $c) {
							$dt[$c] = $d[$i];
							$i++;
						}
						$data[] = $dt;
					}
					if(count($data) > 0){
						$this->km->insert_banyak($data);
						$this->load->library('session');
						$this->session->set_flashdata('success_msg', 'Impor dari excel berhasil dilakukan');
						redirect('karyawan');
					}
					else{
						$this->load->library('session');
						$this->session->set_flashdata('error', 'Tidak ada yang diimport data kosong');
						$this->imporexcel();
					}
				}
			}else{
				$this->load->library('session');
				$this->session->set_flashdata('error', 'baris tidak ditemukan');
				$this->imporexcel();
			}
		}
	}

	public function cetak()
	{
		$this->load->model('karyawanmodel', 'km');
		$this->load->view('karyawan/cetak', [
			'title'		=> 'Cetak Karyawan',
			'data'		=> $this->km->data()
		]);
	}

	public function pdf()
	{
		$this->load->model('karyawanmodel', 'km');
		$html = $this->load->view('karyawan/cetak', [
			'title'		=> 'Cetak Karyawan',
			'data'		=> $this->km->data(),
			'is_pdf'	=> true,
		], true);
		$this->load->library('pdfgenerator');
		$this->pdfgenerator->generate($html, 'data karyawan '.date('Y-m-d H:i:s'), true, 'legal', 'landscape', 1);
	}
	
}
