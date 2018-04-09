<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Karyawanmodel extends CI_Model{

	public function insert($data)
	{
		$this->db->insert('karyawan', $data);
	}

	public function data()
	{
		$data = [];
		$karyawan = $this->db->get('karyawan')->result();
		foreach ($karyawan as $k) {
			$data[] = $this->generate_masa_kerja($k);
		}
		return $data;
	}

	public function get_by_id($id)
	{
		$k = $this->db->from('karyawan')->where(['id'=>$id])->limit(1)->get()->row();
		return $this->generate_masa_kerja($k);
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
		return $k;
	}

	public function update($id, $data)
	{
		$this->db->where('id', $id)->update('karyawan', $data);
	}

	public function hapus($id)
	{
		$this->db->from('karyawan')->where('id', $id)->delete();
	}

	public function insert_banyak($data)
	{
		$this->db->insert_batch('karyawan', $data);
	}

	public function divisi()
	{
		return $this->db->from('karyawan')
		->group_by('divisi')
		->get()
		->result();
	}

	public function total_karyawan_semua()
	{
		return $this->db->from('karyawan')->count_all_results();
	}

	public function total_divisi()
	{
		return $this->db->from('karyawan')->group_by('divisi')->count_all_results();
	}

	public function by_grup()
	{
		return  $this->db->select('grup, COUNT(grup) as total')
		->group_by('grup')
		->order_by('total', 'asc')
		->get('karyawan')
		->result();
	}

	public function get_grup()
	{
		return $this->db->select('grup')->from('karyawan')->group_by('grup')->get()->result();
	}
}