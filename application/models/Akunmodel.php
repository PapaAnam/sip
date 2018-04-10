<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require('Modelku.php');

class Akunmodel extends CI_Model{

	use Modelku;

	protected $table = 'akun';

	public function insert($data)
	{
		unset($data['konfirmasi_password']);
		$data['tgl_dibuat'] = date('Y-m-d');
		if($data['karyawan'] == '')
			$data['karyawan'] = null;
		$data['password']   = md5($data['password']);
		$this->db->insert('akun', $data);
	}

	public function data()
	{
		$data = $this->db->select('*, akun.id as akun_id')->from('akun')->join('karyawan', 'karyawan.id = akun.karyawan', 'left')->get()->result();
		$dt = [];
		foreach ($data as $d) {
			$dt[] = $this->generate_masa_kerja($d);
		}
		return $dt;
	}

	public function data_dg_karyawan()
	{
		return $this->db->from('akun')->join('karyawan', 'karyawan.id = akun.karyawan')->get()->result();
	}

	public function get_by_id($id)
	{
		return $this->db->from('akun')->where(['id'=>$id])->limit(1)->get()->row();
	}

	public function get_by_username($username)
	{
		$data = [];
		$karyawan = $this->db
		->select('*, akun.id as akun_id')
		->from('akun')
		->join('karyawan', 'karyawan.id = akun.karyawan', 'left')
		->where([
			'username'	=> $username
		])
		->limit(1)
		->get()
		->row();
		return $this->generate_masa_kerja($karyawan);
	}

	private function generate_masa_kerja($k)
	{
		$masa_kerja = '';
		if($k->tgl_gabung){
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
		}
		$k->masa_kerja = $masa_kerja;
		return $k;
	}

	public function update($id, $data)
	{
		unset($data['konfirmasi_password']);
		$data['password']   = md5($data['password']);
		$this->db->where('id', $id)->update($this->table, $data);
	}

	public function hapus($id)
	{
		$this->db->from('akun')->where('id', $id)->delete();
	}

	public function total()
	{
		return $this->db->from('akun')->count_all_results();
	}

}