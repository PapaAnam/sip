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
                        <form class="form-horizontal form-material" method="POST" action="<?=base_url('penggajian/store')?>">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Karyawan</label>
                                        <select name="karyawan" onchange="cek_karyawan(window.event.target.value)" class="form-control form-control-line">
                                            <?php 
                                            foreach ($karyawan as $k) {
                                                ?>
                                                <option value="<?=$k->id?>"><?=$k->nik.' '.$k->nama?></option>
                                                <?php 
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-12" id="cekkk" style="display: none;">
                                    <table class="table color-bordered-table info-bordered-table">
                                        <tbody></tbody>
                                    </table>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="tahun">Tahun</label>
                                        <select name="tahun" class="form-control form-control-line">
                                            <?php 
                                            foreach (range($this->config->item('tahun_berdiri'), date('Y')) as $tahun) {
                                                ?>
                                                <option><?=$tahun?></option>
                                                <?php 
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="bulan">Bulan</label>
                                        <select name="bulan" class="form-control form-control-line">
                                            <?php 
                                            foreach (range(1,12) as $bulan) {
                                                ?>
                                                <option value="<?=$bulan?>"><?=bulan($bulan)?></option>
                                                <?php 
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Tanggal Dibuat</label>
                                        <input name="tgl_gaji" value="<?=set_value('tgl_gaji') ? set_value('tgl_gaji') : date('Y-m-d')?>" type="date" class="form-control form-control-line">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Gaji Pokok</label>
                                        <input onkeyup="set_bpjs(window.event.target.value)" name="gaji_pokok" value="<?=set_value('gaji_pokok') ? set_value('gaji_pokok') : 0?>" type="number" class="form-control form-control-line">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Tunjangan</label>
                                        <input onkeyup="set_gaji_bersih()" name="tunjangan" value="<?=set_value('tunjangan') ? set_value('tunjangan') : 0?>" type="number" class="form-control form-control-line">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Uang Harian</label>
                                        <input onkeyup="set_gaji_bersih()" name="uang_harian" value="<?=set_value('uang_harian') ? set_value('uang_harian') : 0?>" type="number" class="form-control form-control-line">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Lembur</label>
                                        <input onkeyup="set_gaji_bersih()" name="lembur" value="<?=set_value('lembur') ? set_value('lembur') : 0?>" type="number" class="form-control form-control-line">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>THR</label>
                                        <input onkeyup="set_gaji_bersih()" name="thr" value="<?=set_value('thr') ? set_value('thr') : 0?>" type="number" class="form-control form-control-line">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Bonus</label>
                                        <input onkeyup="set_gaji_bersih()" name="bonus" value="<?=set_value('bonus') ? set_value('bonus') : 0?>" type="number" class="form-control form-control-line">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Cicilan</label>
                                        <input onkeyup="set_gaji_bersih()" name="cicilan" value="<?=set_value('cicilan') ? set_value('cicilan') : 0?>" type="number" class="form-control form-control-line">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Sisa Pinjaman</label>
                                        <input onkeyup="set_gaji_bersih()" name="sisa_pinjaman" value="<?=set_value('sisa_pinjaman') ? set_value('sisa_pinjaman') : 0?>" type="number" class="form-control form-control-line">
                                    </div>
                                </div>
                                <!-- <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Hutang</label>
                                        <input onkeyup="set_gaji_bersih()" name="hutang" value="<?=set_value('hutang') ? set_value('hutang') : 0?>" type="number" class="form-control form-control-line">
                                    </div>
                                </div> -->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>BPJS</label>
                                        <input readonly name="bpjs" value="<?=set_value('bpjs') ? set_value('bpjs') : 0?>" type="number" class="form-control form-control-line">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Gaji Bersih</label>
                                        <input readonly name="gaji_bersih" value="<?=set_value('gaji_bersih') ? set_value('gaji_bersih') : 0?>" type="number" class="form-control form-control-line">
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