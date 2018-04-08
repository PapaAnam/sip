<?php $this->load->view('layouts/atas_laporan') ?>
<div class="tulisan-modul">
	<h4>Data Akun</h4>
</div>
<table class="table">
	<thead>
		<tr class="bg-blue">
			<th>#</th>
			<th>Role</th>
			<th>Username</th>
			<th>Email</th>
			<th>No HP</th>
			<th>Avatar</th>
			<th>Kota Asal</th>
			<th>Tanggal Dibuat</th>
		</tr>
	</thead>
	<tbody>
		<?php $a=1;foreach($data as $d) { ?>
		<tr>
			<td><?=$a++?></td>
			<td style="text-transform: capitalize;"><?=$d->role?></td>
			<td><?=$d->username?></td>
			<td><?=$d->email?></td>
			<td><?=$d->no_hp?></td>
			<td><img src="<?=isset($is_pdf) ? str_replace(base_url(''), '', $d->avatar) : $d->avatar?>" style="max-width: 100px; max-height: 100px;" alt="<?=$d->username?>"></td>
			<td><?=$d->kota_asal?></td>
			<td><?=tgl_indo($d->tgl_dibuat)?></td>
		</tr>
		<?php } ?>
	</tbody>
</table>
<?php $this->load->view('layouts/bawah_laporan') ?>