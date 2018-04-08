<?php $this->load->view('layouts/atas_laporan') ?>
<div class="tulisan-modul">
	<h4>Data Karyawan</h4>
</div>
<table class="table">
	<thead>
		<tr class="bg-blue">
			<th>#</th>
			<th>NIK</th>
			<th>Nama</th>
			<th>TTL</th>
			<th>Tgl Gabung</th>
			<th>Masa Kerja</th>
			<th>Grup</th>
			<th>Divisi</th>
			<th>Jabatan</th>
			<th>Grade</th>
			<th>No Rek</th>
			<th>Pendidikan</th>
			<th>Status Kawin</th>    
			<th>No NPWP</th>
		</tr>
	</thead>
	<tbody>
		<?php $a=1;foreach($data as $d) { ?>
		<tr>
			<td><?=$a++?></td>
			<td><?=$d->nik?></td>
			<td><?=$d->nama?></td>
			<td><?=$d->kota_lahir?>, <?=tgl_indo($d->tgl_lahir)?></td>
			<td><?=tgl_indo($d->tgl_gabung)?></td>
			<td><?=$d->masa_kerja?></td>
			<td><?=$d->grup?></td>
			<td><?=$d->divisi?></td>
			<td><?=$d->jabatan?></td>
			<td><?=$d->grade?></td>
			<td><?=$d->no_rek?></td>
			<td><?=$d->pendidikan?></td>
			<td><?=$d->status_kawin?></td>
			<td><?=$d->no_npwp?></td>
		</tr>
		<?php } ?>
	</tbody>
</table>
<?php $this->load->view('layouts/bawah_laporan') ?>