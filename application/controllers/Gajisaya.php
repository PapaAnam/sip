<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Gajisaya extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if(!$this->session->userdata('username')){
			$this->session->set_userdata('belum_login', 'Anda tidak berhak mengakses halaman. Silakan masuk terlebih dahulu.');
			redirect('login');
		}
		if($this->session->userdata('role') != 'karyawan'){
			show_404();
		}
	}

	private $is_update = false;

	public function index()
	{
		$this->load->library('myview');
		$this->load->model('penggajianmodel', 'pm');
		$this->myview->table('penggajian/gaji_saya', [
			'title'		=> 'Gaji Saya',
			'data'		=> $this->pm->gaji_saya(),
		]);
	}

	public function tambah()
	{
		$this->load->library('form_validation');
		$this->load->helper('tanggal');
		$this->load->library('myview');
		$this->load->model('karyawanmodel', 'km');
		$karyawan = $this->km->data();
		$this->myview->generate('penggajian/tambah', [
			'title'			=> 'Tambah Penggajian',
			'breadcrumb'	=> [
				'link'		=> base_url('penggajian'),
				'name'		=> 'Penggajian'
			],
			'karyawan'		=> $karyawan,
		]);
	}

	private function validation()
	{
		$this->load->library('form_validation');
		if(!$this->is_update){
			$this->form_validation->set_rules('karyawan', 'Karyawan', 'required');
			$this->form_validation->set_rules('tahun', 'Tahun', 'required|numeric');
			$this->form_validation->set_rules('bulan', 'Bulan', 'required|numeric');
			$this->form_validation->set_rules('tgl_gaji', 'Tanggal Gaji', 'required');
		}
		$this->form_validation->set_rules('gaji_pokok', 'Gaji Pokok', 'required|numeric');
		$this->form_validation->set_rules('tunjangan', 'Tunjangan', 'required|numeric');
		$this->form_validation->set_rules('uang_harian', 'Uang Harian', 'required|numeric');
		$this->form_validation->set_rules('lembur', 'Lembur', 'required|numeric');
		$this->form_validation->set_rules('thr', 'THR', 'required|numeric');
		$this->form_validation->set_rules('cicilan', 'Cicilan', 'required|numeric');
		$this->form_validation->set_rules('sisa_pinjaman', 'Sisa Pinjaman', 'required|numeric');
		$this->form_validation->set_rules('hutang', 'Hutang', 'required|numeric');
		$this->form_validation->set_rules('bpjs', 'BPJS', 'required|numeric');
		$this->form_validation->set_rules('gaji_bersih', 'Gaji Bersih', 'required|numeric');
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
			$this->load->model('penggajianmodel', 'pm');
			$this->pm->insert($this->input->post());
			$this->session->set_userdata('success_msg', 'Penggajian baru berhasil dibuat');
			redirect('penggajian');
		}
	}

	public function ubah($id)
	{
		$this->load->library('form_validation');
		$this->load->library('myview');
		$this->load->model('penggajianmodel', 'pm');
		$d = $this->pm->get_by_id($id);
		$this->load->helper('tanggal');
		$this->myview->generate('penggajian/ubah', [
			'title'			=> 'Ubah Penggajian',
			'breadcrumb'	=> [
				'link'		=> base_url('penggajian'),
				'name'		=> 'Penggajian'
			],
			'd'				=> $d
		]);
	}

	public function update($id)
	{
		$this->is_update = true;
		$this->validation();
		if ($this->form_validation->run() == FALSE)
		{
			$this->ubah($id);
		}
		else
		{
			$this->load->model('penggajianmodel', 'pm');
			$this->pm->update($id, $this->input->post());
			$this->session->set_userdata('success_msg', 'Gaji berhasil diperbarui');
			redirect('penggajian');
		}
	}

	public function hapus()
	{
		$this->load->model('penggajianmodel', 'pm');
		$this->pm->hapus($this->input->post('id'));
		$this->session->set_userdata('success_msg', 'Gaji berhasil dihapus');
		redirect('penggajian');
	}

	public function slip($id)
	{
		$this->load->model('penggajianmodel', 'pm');
		$d = $this->pm->get_by_id($id);
		$this->load->view('penggajian/slip', [
			'd'		=> $d
		]);
	}

	public function slip_pdf($id)
	{
		$this->load->model('penggajianmodel', 'pm');
		$d = $this->pm->get_by_id($id);
		$html = $this->load->view('penggajian/slip_pdf', [
			'd'		=> $d
		], true);
		$this->load->library('pdfgenerator');
		$this->pdfgenerator->generate($html, 'slip gaji '.date('Y-m-d H:i:s'), true, 'Legal', 'portrait', 1);
	}

	public function cetak($tahun = '', $bulan = '')
	{
		$tahun = $this->uri->segment(2) == '' ? date('Y') : $this->uri->segment(2);
		$bulan = $this->uri->segment(3) == '' ? date('m') : $this->uri->segment(3);
		$this->load->model('penggajianmodel', 'pm');
		$this->load->view('penggajian/cetak', [
			'title'		=> 'Cetak Penggajian',
			'data'		=> $this->pm->data_dg_karyawan_filter($tahun, $bulan)
		]);
	}

	public function pdf($tahun = '', $bulan = '')
	{
		$tahun = $this->uri->segment(2) == '' ? date('Y') : $this->uri->segment(2);
		$bulan = $this->uri->segment(3) == '' ? date('m') : $this->uri->segment(3);
		$this->load->model('penggajianmodel', 'pm');
		$html = $this->load->view('penggajian/cetak', [
			'title'		=> 'Cetak Penggajian',
			'data'		=> $this->pm->data_dg_karyawan_filter($tahun, $bulan),
			'is_pdf'	=> true,
		], true);
		$this->load->library('pdfgenerator');
		$this->pdfgenerator->generate($html, 'data penggajian periode '.bulan($bulan).' '.$tahun.' '.date('Y-m-d H:i:s'), true, 'a3', 'landscape', 1);
	}
}
