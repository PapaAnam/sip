<div class="row">
    <div class="col-lg-12 col-md-7">
        <div class="card card-outline-info">
            <div class="card-header">
                <h4 class="text-white m-b-0"><?=$title?></h4>
            </div>
            <div class="card-block">
                <div class="row">
                    <div class="col-lg-12">
                        <?php $this->load->view('layouts/error_validation')?>
                        <form class="form-horizontal form-material" method="POST" action="<?=base_url('akun/update/'.$d->id)?>" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Username</label>
                                        <input name="username" value="<?=set_value('username') ? set_value('username') : $d->username ?>" type="text" class="form-control form-control-line">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input name="email" value="<?=set_value('email') ? set_value('email') : $d->email ?>" type="email" class="form-control form-control-line">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Password</label>
                                        <input name="password" value="" type="password" class="form-control form-control-line">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Konfirmasi Password</label>
                                        <input name="konfirmasi_password" value="" type="password" class="form-control form-control-line">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Kota Asal</label>
                                        <input name="kota_asal" value="<?=set_value('kota_asal') ? set_value('kota_asal') : $d->kota_asal ?>" type="text" class="form-control form-control-line">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>No HP</label>
                                        <input name="no_hp" value="<?=set_value('no_hp') ? set_value('no_hp') : $d->no_hp ?>" type="text" class="form-control form-control-line">
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label>Avatar</label>
                                        <div class="fileinput fileinput-new input-group" data-provides="fileinput">
                                            <div class="form-control" data-trigger="fileinput"> 
                                                <i class="glyphicon glyphicon-file fileinput-exists"></i> 
                                                <span class="fileinput-filename"></span>
                                            </div> 
                                            <span class="input-group-addon btn btn-default btn-file"> 
                                                <span class="fileinput-new">Select file</span> 
                                                <span class="fileinput-exists">Change</span>
                                                <input type="hidden">
                                                <input accept="image/jpeg,image/png" type="file" name="avatar"> 
                                            </span> 
                                            <a href="#" class="input-group-addon btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a> 
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Role</label>
                                        <select name="role" class="form-control form-control-line">
                                            <option <?= $d->role == 'karyawan' ? 'selected="selected"' : '' ?> value="karyawan">Karyawan</option>
                                            <option <?= $d->role == 'admin' ? 'selected="selected"' : '' ?> value="admin">Admin</option>
                                        </select>
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