<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\IOFactory;

class Importexcel 
{
	public function generate($file_path)
	{
		$spreadsheet = IOFactory::load($file_path);
		return $spreadsheet;
	}

	public function get($file_path)
	{
		$spreadsheet = IOFactory::load($file_path);
		$sheetData = $spreadsheet->getActiveSheet()->toArray();
		$columns = array_shift($sheetData);
		$data = [];
		foreach ($sheetData as $d) {
			$dt = [];
			$i = 0;
			$null_semua = true;
			foreach ($columns as $c) {
				if($c != '' && !is_null($c)){
					$dt[$c] = $d[$i];
					if(!is_null($d[$i]) && $d[$i] != 'null' && $d[$i] != ''){
						$null_semua = false;
					}
					$i++;
				}
			}
			if(!$null_semua){
				$data[] = $dt;
			}
		}
		return $data;
	}

	public function get_object($file_path)
	{
		$data = $this->get($file_path);
		$data_baru = [];
		foreach ($data as $d) {
			$data_baru[] = (Object) $d;
		}
		return $data_baru;
	}

	public function get_column($file_path)
	{
		$spreadsheet = IOFactory::load($file_path);
		$sheetData = $spreadsheet->getActiveSheet()->toArray();
		$columns = [];
		foreach ($sheetData[0] as $c) {
			if($c != 'null' && !is_null($c) && $c != '')
				$columns[] = $c;
		}
		return $columns;
	}

	public function create($filename, $data)
	{
		$kolom = ['A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z','AA','AB','AC','AD','AE','AF','AG','AH','AI','AJ'];
		$ci =& get_instance();
		$ci->load->helper('download');
		$spreadsheet = new Spreadsheet();
		$sheet = $spreadsheet->getActiveSheet();
		$baris = 2;
		$kolom_atas = array_keys($data[0]);
		$i = 0;
		// dd($kolom_atas);
		foreach ($kolom_atas as $k) {
			$sheet->setCellValue($kolom[$i].'1', $k);
			$i++;
		}
		// $writer = new Xlsx($spreadsheet);
		// $writer->save($filename);
		// force_download($filename, NULL);
		// return;
		foreach ($data as $d) {
			$i = 0;
			// dd($d);
			foreach ($d as $kol) {
				// dd($kolom[$i].$baris);
				// dd($kolom[$i+1].$baris);
				$sheet->setCellValue($kolom[$i].$baris, $kol);
				$i++;
			}
			$baris++;
		}
		$writer = new Xlsx($spreadsheet);
		$writer->save($filename);
		force_download($filename, NULL);
	}

	
}