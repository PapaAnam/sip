<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Myview {

	public function generate($path, $data = [])
	{
		$CI =& get_instance();
		$CI->load->view('layouts/atas', $data);
		$CI->load->view($path, $data);
		$CI->load->view('layouts/bawah', $data);
	}

	public function table($path, $data = [])
	{
		$CI =& get_instance();
		$CI->load->view('layouts/atas', $data);
		$CI->load->view($path, $data);
		$CI->load->view('layouts/bawah_table', $data);
	}
}