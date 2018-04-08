<!DOCTYPE html>
<html>
<head>
	<title>Slip Gaji</title>
	<style>
	body {
		font-family: sans-serif;
	}
	td {
		padding: 8px;
	}
	table, td {
		border-collapse: collapse;
	}
	.table-bordered td {
		border: 1px solid black;
	}
	.no-border td, tr, th {
		border: none !important;
	}
	.no-margin {
		margin: 0;
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
	<div style="margin-bottom: 20px;">
		<div style="width: 200px; float: left;">
			<img src="<?=base_url('images/logo-dark.png')?>">
			<p style="font-size: 11px; padding-left: 5px;">
				<?=$this->config->item('alamat')?>
			</p>
		</div>
		<div style="width: 200px; float: right;">
			<p style="font-size: 20px; font-weight: bold;">PAYSLIP</p>
			<p style="font-size: 11px; padding-left: 5px;">
				<?=$this->config->item('website')?>
			</p>
		</div>
	</div>
	<table width="100%">
		<tbody>
			<tr>
				<td>Nama</td>
				<td width="20px">:</td>
				<td><?=$d->nama?></td>
				<td>Periode</td>
				<td width="20px">:</td>
				<td><?=$d->periode?></td>
			</tr>
			<tr>
				<td>NIK</td>
				<td width="20px">:</td>
				<td><?=$d->nik?></td>
				<td>Tanggal Gajian</td>
				<td width="20px">:</td>
				<td><?=tgl_indo($d->tgl_gaji)?></td>
			</tr>
			<tr>
				<td>Grade</td>
				<td width="20px">:</td>
				<td><?=$d->grade?></td>
				<td>NPWP</td>
				<td width="20px">:</td>
				<td><?=$d->no_npwp?></td>
			</tr>
			<tr>
				<td>Jabatan</td>
				<td width="20px">:</td>
				<td><?=$d->jabatan?></td>
				<td>Join Bekerja</td>
				<td width="20px">:</td>
				<td><?=$d->tgl_gabung?></td>
			</tr>
			<tr>
				<td>Divisi</td>
				<td width="20px">:</td>
				<td><?=$d->divisi?></td>
				<td>No Rekening</td>
				<td width="20px">:</td>
				<td><?=$d->no_rek?></td>
			</tr>
		</tbody>
	</table>
	<br>
	<br>
	<table width="100%" class="table-bordered">
		<tbody>
			<tr style="background-color: #4499aa;">
				<td>
					<strong style="color: white;">
						<span style="float: left;">Pendapatan</span> <span style="float: right;">Jumlah</span>
					</strong>
				</td>
				<td>
					<strong style="color: white;">
						<span style="float: left;">Pengurangan</span> <span style="float: right;">Jumlah</span>
					</strong>
				</td>
			</tr>
			<tr>
				<td>
					<table width="100%" class="no-border no-margin">
						<tbody>
							<tr>
								<td>Gaji Pokok</td>
								<td width="10px">:</td>
								<td width="20px">Rp.</td>
								<td width="100px" align="right"><?=rp($d->gaji_pokok)?></td>
							</tr>
							<tr>
								<td>Tunjangan Jabatan</td>
								<td>:</td>
								<td>Rp.</td>
								<td align="right"><?=rp($d->tunjangan)?></td>
							</tr>
							<tr>
								<td>Uang Harian</td>
								<td>:</td>
								<td>Rp.</td>
								<td align="right"><?=rp($d->uang_harian)?></td>
							</tr>
							<tr>
								<td>Uang Lembur</td>
								<td>:</td>
								<td>Rp.</td>
								<td align="right"><?=rp($d->lembur)?></td>
							</tr>
							<tr>
								<td>THR</td>
								<td>:</td>
								<td>Rp.</td>
								<td align="right"><?=rp($d->thr)?></td>
							</tr>
							<tr>
								<td>Bonus</td>
								<td>:</td>
								<td>Rp.</td>
								<td align="right"><?=rp($d->bonus)?></td>
							</tr>
						</tbody>
					</table>
				</td>
				<td>
					<table width="100%" class="no-border no-margin">
						<tbody>
							<tr>
								<td>Sisa Pinjaman</td>
								<td width="10px">:</td>
								<td width="20px">Rp.</td>
								<td width="100px" align="right"><?=rp($d->sisa_pinjaman)?></td>
							</tr>
							<tr>
								<td>Iuran BPJS</td>
								<td>:</td>
								<td>Rp.</td>
								<td align="right"><?=rp($d->bpjs)?></td>
							</tr>
							<tr>
								<td>Cicilan</td>
								<td>:</td>
								<td>Rp.</td>
								<td align="right"><?=rp($d->cicilan)?></td>
							</tr>
							<tr>
								<td>Hutang</td>
								<td>:</td>
								<td>Rp.</td>
								<td align="right"><?=rp($d->hutang)?></td>
							</tr>
						</tbody>
					</table>
				</td>
			</tr>
			<tr>
				<td>
					<table width="100%" class="no-border no-margin">
						<tbody>
							<tr>
								<td>Total Pendapatan</td>
								<td width="10px">:</td>
								<td width="20px">Rp.</td>
								<td width="100px" align="right"><?=rp($d->total_pendapatan)?></td>
							</tr>
						</tbody>
					</table>
				</td>
				<td>
					<table width="100%" class="no-border no-margin">
						<tbody>
							<tr>
								<td>Total Pengurangan</td>
								<td width="10px">:</td>
								<td width="20px">Rp.</td>
								<td width="100px" align="right"><?=rp($d->total_pengurangan)?></td>
							</tr>
						</tbody>
					</table>				
				</td>
			</tr>
			<tr>
				<td style="border: 0;"></td>
				<td style="border: 0;"></td>
			</tr>
			<tr>
				<td style="border: 0;"></td>
				<td style="border: 0;"></td>
			</tr>
			<tr>
				<td style="border: 0;"></td>
				<td style="background-color: #4499aa;" align="center"><strong>TAKE HOME PAY</strong></td>
			</tr>
			<tr>
				<td style="border: 0;"></td>
				<td align="center">
					<strong>Rp. <?=rp($d->gaji_bersih)?></strong>
				</td>
			</tr>
		</tbody>
	</table>
	<script>
		window.print();
	</script>
</body>
</html>