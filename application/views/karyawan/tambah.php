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
                        <form class="form-horizontal form-material" method="POST" action="<?=base_url('karyawan/store')?>">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Nama Lengkap</label>
                                        <input type="text" class="form-control form-control-line" name="nama" value="<?=set_value('nama')?>">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="nik">NIK</label>
                                        <input type="text" class="form-control form-control-line" value="<?=set_value('nik')?>" name="nik" id="nik">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Kota Lahir</label>
                                        <input type="text" name="kota_lahir" value="<?=set_value('kota_lahir')?>" class="form-control form-control-line">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Tanggal Lahir</label>
                                        <input name="tgl_lahir" value="<?=set_value('tgl_lahir')?>" type="date" class="form-control form-control-line">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Grade</label>
                                        <input name="grade" value="<?=set_value('grade')?>" type="text" class="form-control form-control-line">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Divisi</label>
                                        <input name="divisi" value="<?=set_value('divisi')?>" type="text" class="form-control form-control-line">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Jabatan</label>
                                        <input name="jabatan" value="<?=set_value('jabatan')?>" type="text" class="form-control form-control-line">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Tanggal Gabung</label>
                                        <input name="tgl_gabung" value="<?=set_value('tgl_gabung')?>" type="date" class="form-control form-control-line">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>No Rekening</label>
                                        <input value="<?=set_value('no_rek')?>" name="no_rek" type="text" class="form-control form-control-line">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Pendidikan</label>
                                        <input name="pendidikan" value="<?=set_value('pendidikan')?>" type="text" class="form-control form-control-line">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Status Kawin</label>
                                        <select name="status_kawin" class="form-control form-control-line">
                                            <option <?= set_value('status_kawin') == 'Sudah Kawin' ? 'selected' : '' ?> value="Sudah Kawin">Sudah Kawin</option>
                                            <option <?= set_value('status_kawin') == 'Belum Kawin' ? 'selected' : '' ?> value="Belum Kawin">Belum Kawin</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>No NPWP</label>
                                        <input value="<?=set_value('no_npwp')?>" name="no_npwp" type="text" class="form-control form-control-line">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Grup</label>
                                        <input value="<?=set_value('grup')?>" name="grup" type="text" class="form-control form-control-line">
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