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
	<div style="width: 100%; display: block; height: 70px;">
		<div style="margin-bottom: 20px;">
			<div style="width: 200px; float: left;">
				<img src="<?=isset($is_pdf) ? $this->config->item('grup_'.$this->uri->segment(4)) : base_url($this->config->item('grup_'.$this->uri->segment(4)))?>">
				<p style="font-size: 11px; padding-left: 5px;">
					<?=$this->config->item('alamat')?>
				</p>
			</div>
			<?php 
			if(isset($with_header)){
				?>
				<div style="width: 200px; float: right;">
					<p style="font-size: 20px; font-weight: bold;">PAYSLIP</p>
					<p style="font-size: 11px; padding-left: 5px;">
						<?=$this->config->item('website')?>
					</p>
				</div>
				<?php 
			}
			?>
		</div>
	</div>
	<div class="tulisan-modul">
		<h4>
			Data Penggajian <br>
			<small>Periode <?=bulan($this->uri->segment(3)).' '.$this->uri->segment(2).' grup '.$this->uri->segment(4)?></small>
		</h4>
	</div>
	<table class="table">
		<thead>
			<tr class="bg-blue">
				<th>#</th>
				<th>Karyawan</th>
				<th>Divisi</th>
				<th>Jabatan</th>
				<th>Grup</th>
				<th>Periode</th>
				<th>Tanggal Gajian</th>
				<th>Gaji Pokok</th>
				<th>Tunjangan</th>
				<th>Uang Harian</th>
				<th>Lembur</th>
				<th>THR</th>
				<th>Bonus</th>
				<th>Cicilan</th>
				<th>Sisa Pinjaman</th>
				<th>Hutang</th>
				<th>BPJS</th>
				<th>Gaji Bersih</th>
			</tr>
		</thead>
		<tbody>
			<?php $a=1;foreach($data as $d) { ?>
			<tr>
				<td><?=$a++?></td>
				<td><?=$d->nama?></td>
				<td><?=$d->divisi?></td>
				<td><?=$d->jabatan?></td>
				<td><?=$d->grup?></td>
				<td><?=bulan($d->bulan).' '.$d->tahun?></td>
				<td><?=tgl_indo($d->tgl_gaji)?></td>
				<td><?=rp($d->gaji_pokok)?></td>
				<td><?=rp($d->tunjangan)?></td>
				<td><?=rp($d->uang_harian)?></td>
				<td><?=rp($d->lembur)?></td>
				<td><?=rp($d->thr)?></td>
				<td><?=rp($d->bonus)?></td>
				<td><?=rp($d->cicilan)?></td>
				<td><?=rp($d->sisa_pinjaman)?></td>
				<td><?=rp($d->hutang)?></td>
				<td><?=rp($d->bpjs)?></td>
				<td><?=rp($d->gaji_bersih)?></td>
			</tr>
			<?php } ?>
		</tbody>
	</table>
	<?php $this->load->view('layouts/bawah_laporan') ?>