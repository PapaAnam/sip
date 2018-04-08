<!DOCTYPE html>
<html>
<head>
	<title><?=$title?></title>
	<style>
	body {
		font-family: sans-serif;
	}
	.table {
		width: 100%;
	}
	.table, .table td, .table th {
		border-collapse: collapse;
		border: 1px solid grey;
	}
	.table td, .table th {
		padding: 5px;
	}
	.bg-blue{
		background-color: #4499aa;
	}
	h4 {
		text-align: center;
	}
	.tulisan-modul {
		display: block;
		margin-bottom: 20px;
	}
	@media print {
		body {
			-webkit-print-color-adjust: exact; 
			-ms-print-color-adjust: exact; 
			-o-print-color-adjust: exact; 
			-moz-print-color-adjust: exact; 
			print-color-adjust: exact; 
		}
	}
</style>
</head>
<body>
	<?php $this->load->view('layouts/report_header')?>