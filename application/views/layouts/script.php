<script src="<?=base_url('assets/plugins/jquery/jquery.min.js')?>"></script>
<script src="<?=base_url('assets/js/popper.min.js')?>"></script>
<script src="<?=base_url('assets/plugins/bootstrap/js/bootstrap.min.js')?>"></script>
<script src="<?=base_url('assets/js/jquery.slimscroll.js')?>"></script>
<script src="<?=base_url('assets/js/waves.js')?>"></script>
<script src="<?=base_url('assets/js/sidebarmenu.js')?>"></script>
<script src="<?=base_url('assets/plugins/sticky-kit-master/dist/sticky-kit.min.js')?>"></script>
<script src="<?=base_url('assets/js/jquery.sparkline.min.js')?>"></script>
<script src="<?=base_url('assets/js/custom.min.js')?>"></script>
<script src="<?=base_url('assets/js/jasny-bootstrap.js')?>"></script>
<script src="<?=base_url('assets/js/jQuery.style.switcher.js')?>"></script>
<script>
	function cek_karyawan(karyawan){
		$.ajax({
			url : '<?=base_url('karyawan/cek')?>/'+karyawan,
			success : function(res, status){
				var k = $.parseJSON(res)
				$('#cekkk').fadeOut().fadeIn().find('tbody').html(
					'<tr>'+
					'<td><strong>Divisi</strong></td>'+
					'<td>'+k.divisi+'</td>'+
					'<td><strong>Jabatan</strong></td>'+
					'<td>'+k.jabatan+'</td>'+
					'</tr>'+
					'<tr>'+
					'<td><strong>TTL</strong></td>'+
					'<td>'+k.kota_lahir+', '+k.tgl_lahir+'</td>'+
					'<td><strong>Tanggal Gabung</strong></td>'+
					'<td>'+k.tgl_gabung+'</td>'+
					'</tr>'+
					'<tr>'+
					'<td><strong>No Rekening</strong></td>'+
					'<td>'+k.no_rek+'</td>'+
					'<td><strong>Pendidikan</strong></td>'+
					'<td>'+k.pendidikan+'</td>'+
					'</tr>'+
					'<tr>'+
					'<td><strong>Status Kawin</strong></td>'+
					'<td>'+k.status_kawin+'</td>'+
					'<td><strong>No NPWP</strong></td>'+
					'<td>'+k.no_npwp+'</td>'+
					'</tr>'+
					'<tr>'+
					'<td><strong>Grade</strong></td>'+
					'<td>'+k.grade+'</td>'+
					'<td><strong>Grup</strong></td>'+
					'<td>'+k.grup+'</td>'+
					'</tr>'+
					'<tr>'+
					'<td><strong>Masa Kerja</strong></td>'+
					'<td>'+k.masa_kerja+'</td>'+
					'<td></td>'+
					'<td></td>'+
					'</tr>'
					)
			},
			type : 'JSON'
		})
	}

	function set_bpjs(gp) {
		$('[name="bpjs"]').val(Math.round((gp*1/100)*100)/100);
		set_gaji_bersih();
	}

	function set_gaji_bersih() {
		var gaji_pokok 		= Number($('[name="gaji_pokok"]').val());
		var tunjangan 		= Number($('[name="tunjangan"]').val());
		var uang_harian 	= Number($('[name="uang_harian"]').val());
		var lembur 			= Number($('[name="lembur"]').val());
		var thr 			= Number($('[name="thr"]').val());
		var bonus 			= Number($('[name="bonus"]').val());
		var cicilan 		= Number($('[name="cicilan"]').val());
		var sisa_pinjaman 	= Number($('[name="sisa_pinjaman"]').val());
		var hutang 			= Number($('[name="hutang"]').val());
		var bpjs 			= Number($('[name="bpjs"]').val());
		var total = gaji_pokok + tunjangan + uang_harian + lembur + thr + bonus + cicilan - sisa_pinjaman - hutang - bpjs;
		$('[name="gaji_bersih"]').val(total);
	}

	function hapus_karyawan(id) {
		if(confirm('Anda yakin?')){
			$('#form-hapus-karyawan').find('[name="karyawan"]').val(id);
			$('#form-hapus-karyawan').submit();
		}
	}
</script>
