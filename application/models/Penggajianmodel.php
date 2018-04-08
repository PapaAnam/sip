<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Penggajianmodel extends CI_Model{

	public function insert($data)
	{
		unset($data['gaji_bersih']);
		$this->db->insert('gaji', $data);
	}

	public function data()
	{
		return $this->db->get('gaji')->result();
	}

	public function data_dg_karyawan()
	{
		$data = [];
		$karyawan = $this->db->select('*, gaji.id as gaji_id')->from('gaji')->join('karyawan', 'karyawan.id = gaji.karyawan')->get()->result();
		foreach ($karyawan as $k) {
			$data[] = $this->generate_masa_kerja($k);
		}
		return $data;
	}

	public function gaji_saya()
	{
		$data = [];
		if($this->session->userdata('karyawan')){
			$karyawan = $this->db->select('*, gaji.id as gaji_id')->from('gaji')
			->join('karyawan', 'karyawan.id = gaji.karyawan')
			->where('karyawan', $this->session->userdata('karyawan'))
			->get()
			->result();
			// dd($this->session->userdata('karyawan'));
			foreach ($karyawan as $k) {
				$data[] = $this->generate_masa_kerja($k);
			}
		}
		return $data;
	}	

	public function data_dg_karyawan_filter($tahun, $bulan)
	{
		$data = [];
		$karyawan = $this->db->select('*, gaji.id as gaji_id')->from('gaji')->where('bulan', $bulan)->where('tahun', $tahun)->join('karyawan', 'karyawan.id = gaji.karyawan')->get()->result();
		foreach ($karyawan as $k) {
			$data[] = $this->generate_masa_kerja($k);
		}
		return $data;
	}

	public function get_by_id($id)
	{
		$gaji = $this->db
		->select('*, gaji.id as gaji_id')
		->from('gaji')
		->join('karyawan', 'karyawan.id = gaji.karyawan')
		->where([
			'gaji.id' => $id
		])
		->limit(1)
		->get()
		->row();
		if(!$gaji)
			return null;
		return $this->generate_masa_kerja($gaji);
	}

	public function update($id, $data)
	{
		unset($data['gaji_bersih']);
		$this->db->where('id', $id)->update('gaji', $data);
	}

	private function generate_masa_kerja($k)
	{
		$masa_kerja = floor((strtotime($k->tgl_gabung) - strtotime(date('Y-m-d'))) / 3600 / 24);
		if($masa_kerja >= 365){
			$masa_kerja = floor($masa_kerja/365).' tahun';
			if($masa_kerja%365>0){
				$masa_kerja .= ' '.floor($masa_kerja%365).' hari';
			}
		}elseif($masa_kerja >= 30){
			$masa_kerja = floor($masa_kerja/30).' bulan';
			if($masa_kerja%30>0){
				$masa_kerja .= ' '.floor($masa_kerja%30).' hari';
			}
		}else{
			$masa_kerja .= ' hari';
		}
		$k->masa_kerja = $k->tgl_gabung == '0000-00-00' ? '' : $masa_kerja;
		$k->periode = bulan($k->bulan).' '.$k->tahun;
		$k->total_pendapatan = $k->gaji_pokok + $k->tunjangan + $k->uang_harian + $k->lembur + $k->thr + $k->bonus;
		$k->total_pengurangan = $k->sisa_pinjaman + $k->bpjs + $k->cicilan + $k->hutang;
		$k->gaji_bersih = $k->gaji_pokok + $k->tunjangan + $k->uang_harian + $k->lembur + $k->thr + $k->bonus - $k->cicilan - $k->sisa_pinjaman - $k->hutang - $k->bpjs;
		return $k;
	}

	public function hapus($id)
	{
		$this->db->from('gaji')->where('id', $id)->delete();
	}

	public function total()
	{
		return $this->db->from('gaji')->count_all_results();
	}
}