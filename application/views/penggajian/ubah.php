<div class="row">
    <div class="col-lg-12 col-md-7">
        <div class="card card-outline-info">
            <div class="card-header">
                <h4 class="text-white m-b-0"><?=$title?></h4>
            </div>
            <div class="card-block">
                <div class="row">
                    <div class="col-lg-12">
                        <?php
                        if(validation_errors() != ''){
                            ?>
                            <div class="alert alert-danger">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button>
                                <h3 class="text-danger"><i class="fa fa-exclamation-triangle"></i> Gagal</h3>
                                <?=validation_errors()  ?>
                            </div>
                            <?php
                        }
                        ?>
                        <form class="form-horizontal form-material" method="POST" action="<?=base_url('penggajian/update/'.$d->gaji_id)?>">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Karyawan</label>
                                        <input readonly value="<?=$d->nik.' '.$d->nama ?>" type="text" class="form-control form-control-line">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <table class="table color-bordered-table info-bordered-table">
                                        <tbody>
                                            <tr>
                                                <td><strong>Divisi</strong></td>
                                                <td><?=$d->divisi?></td>
                                                <td><strong>Jabatan</strong></td>
                                                <td><?=$d->jabatan?></td>
                                            </tr>
                                            <tr>
                                                <td><strong>TTL</strong></td>
                                                <td><?=$d->kota_lahir?>, <?=tgl_indo($d->tgl_lahir)?></td>
                                                <td><strong>Tanggal Gabung</strong></td>
                                                <td><?=tgl_indo($d->tgl_gabung)?></td>
                                            </tr>
                                            <tr>
                                                <td><strong>No Rekening</strong></td>
                                                <td><?=$d->no_rek?></td>
                                                <td><strong>Pendidikan</strong></td>
                                                <td><?=$d->pendidikan?></td>
                                            </tr>
                                            <tr>
                                                <td><strong>Status Kawin</strong></td>
                                                <td><?=$d->status_kawin?></td>
                                                <td><strong>No NPWP</strong></td>
                                                <td><?=$d->no_npwp?></td>
                                            </tr>
                                            <tr>
                                                <td><strong>Grade</strong></td>
                                                <td><?=$d->grade?></td>
                                                <td><strong>Grup</strong></td>
                                                <td><?=$d->grup?></td>
                                            </tr>
                                            <tr>
                                                <td><strong>Masa Kerja</strong></td>
                                                <td><?=$d->masa_kerja?></td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Periode</label>
                                        <input readonly value="<?=bulan($d->bulan).' '.$d->tahun ?>" type="text" class="form-control form-control-line">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Tanggal Dibuat</label>
                                        <input readonly value="<?=tgl_indo($d->tgl_gaji)?>" type="text" class="form-control form-control-line">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Gaji Pokok</label>
                                        <input onkeyup="set_bpjs(window.event.target.value)" name="gaji_pokok" value="<?=set_value('gaji_pokok') ? set_value('gaji_pokok') : $d->gaji_pokok?>" type="number" class="form-control form-control-line">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Tunjangan</label>
                                        <input onkeyup="set_gaji_bersih()" name="tunjangan" value="<?=set_value('tunjangan') ? set_value('tunjangan') : $d->tunjangan?>" type="number" class="form-control form-control-line">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Uang Harian</label>
                                        <input onkeyup="set_gaji_bersih()" name="uang_harian" value="<?=set_value('uang_harian') ? set_value('uang_harian') : $d->uang_harian?>" type="number" class="form-control form-control-line">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Lembur</label>
                                        <input onkeyup="set_gaji_bersih()" name="lembur" value="<?=set_value('lembur') ? set_value('lembur') : $d->lembur?>" type="number" class="form-control form-control-line">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>THR</label>
                                        <input onkeyup="set_gaji_bersih()" name="thr" value="<?=set_value('thr') ? set_value('thr') : $d->thr?>" type="number" class="form-control form-control-line">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Bonus</label>
                                        <input onkeyup="set_gaji_bersih()" name="bonus" value="<?=set_value('bonus') ? set_value('bonus') : $d->bonus?>" type="number" class="form-control form-control-line">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Cicilan</label>
                                        <input onkeyup="set_gaji_bersih()" name="cicilan" value="<?=set_value('cicilan') ? set_value('cicilan') : $d->cicilan?>" type="number" class="form-control form-control-line">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Sisa Pinjaman</label>
                                        <input onkeyup="set_gaji_bersih()" name="sisa_pinjaman" value="<?=set_value('sisa_pinjaman') ? set_value('sisa_pinjaman') : $d->sisa_pinjaman?>" type="number" class="form-control form-control-line">
                                    </div>
                                </div>
                                <!-- <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Hutang</label>
                                        <input onkeyup="set_gaji_bersih()" name="hutang" value="<?=set_value('hutang') ? set_value('hutang') : $d->hutang?>" type="number" class="form-control form-control-line">
                                    </div>
                                </div> -->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>BPJS</label>
                                        <input readonly name="bpjs" value="<?=set_value('bpjs') ? set_value('bpjs') : $d->bpjs?>" type="number" class="form-control form-control-line">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Gaji Bersih</label>
                                        <input readonly name="gaji_bersih" value="<?=set_value('gaji_bersih') ? set_value('gaji_bersih') : $d->gaji_bersih?>" type="number" class="form-control form-control-line">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <button class="btn btn-success">Simpan</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>