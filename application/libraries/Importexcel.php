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

	public function create()
	{
		$ci =& get_instance();
		$ci->load->helper('download');
		$spreadsheet = new Spreadsheet();
		$sheet = $spreadsheet->getActiveSheet();
		return $sheet;
		$sheet->setCellValue('A1', 'Hello World !');

		$writer = new Xlsx($spreadsheet);
		$writer->save($filename);
		force_download($filename, NULL);
		// Redirect output to a client's web browser (Xlsx)
		// header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		// header('Content-Disposition: attachment;filename="01simple.xlsx"');
		// header('Cache-Control: max-age=0');
		// $writer = IOFactory::createWriter($spreadsheet, 'Xls');
		// $writer->save('php://output');
	}
}