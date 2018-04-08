<?php $this->load->view('layouts/atas_laporan') ?>
<div class="tulisan-modul">
	<h4>
		Data Penggajian <br>
		<small>Periode <?=bulan($this->uri->segment(3)).' '.$this->uri->segment(2)?></small>
	</h4>
</div>
<table class="table">
	<thead>
		<tr class="bg-blue">
			<th>#</th>
			<th>Karyawan</th>
			<th>Divisi</th>
			<th>Jabatan</th>
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