<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/png" sizes="16x16" href="../assets/images/favicon.png">
    <title><?=$title?></title>
    <link href="<?=base_url('assets/plugins/bootstrap/css/bootstrap.min.css')?>" rel="stylesheet">
    <link href="<?=base_url('assets/css/style.css')?>" rel="stylesheet">
    <link href="<?=base_url('assets/css/colors/blue.css')?>" id="theme" rel="stylesheet">
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
</head>
<body class="fix-header fix-sidebar card-no-border">
    <div class="preloader">
        <svg class="circular" viewBox="25 25 50 50">
            <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" /> </svg>
        </div>
        <div id="main-wrapper">
            <?php $this->load->view('layouts/header')?>
            <?php $this->load->view('layouts/leftbar') ?>
            <div class="page-wrapper">
                <div class="container-fluid">
                    <?php $this->load->view('layouts/breadcrumb') ?>
                    <div class="row">
                        <div class="col-md-12">
                            <?php $this->load->view('layouts/error_validation')?>
                            <?php $this->load->view('layouts/success_msg')?>
                        </div>
                        <div class="col-lg-4 col-xlg-3 col-md-5">
                            <div class="card">
                                <div class="card-body">
                                    <center class="m-t-30"> 
                                        <img src="<?=$d->avatar?>" class="img-circle" width="150" />
                                        <h4 class="card-title m-t-10"><?=$d->username?></h4>
                                        <div class="row text-center justify-content-md-center">
                                            Terakhir Login <br>
                                            <?=waktu_indo($d->terakhir_login)?>
                                        </div>
                                    </center>
                                </div>
                                <div>
                                    <hr> 
                                </div>
                                <div class="card-body"> 
                                    <small class="text-muted">Email </small>
                                    <h6><?=$d->email?></h6> 
                                    <small class="text-muted p-t-30 db">No HP</small>
                                    <h6><?=$d->no_hp?></h6> 
                                    <small class="text-muted p-t-30 db">Role</small>
                                    <h6 style="text-transform: capitalize;"><?=$d->role?></h6> 
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-8 col-xlg-9 col-md-7">
                            <div class="card">
                                <ul class="nav nav-tabs profile-tab" role="tablist">
                                    <li class="nav-item"> 
                                        <a class="nav-link active" data-toggle="tab" href="#profile" role="tab">Profil</a> 
                                    </li>
                                    <li class="nav-item"> 
                                        <a class="nav-link" data-toggle="tab" href="#settings" role="tab">Ubah</a> 
                                    </li>
                                </ul>
                                <div class="tab-content">
                                    <div class="tab-pane active" id="profile" role="tabpanel">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-md-3 col-xs-6 b-r"> <strong>Username</strong>
                                                    <br>
                                                    <p class="text-muted"><?=$d->username?></p>
                                                </div>
                                                <div class="col-md-3 col-xs-6 b-r"> <strong>No HP</strong>
                                                    <br>
                                                    <p class="text-muted"><?=$d->no_hp?></p>
                                                </div>
                                                <div class="col-md-3 col-xs-6 b-r"> <strong>Email</strong>
                                                    <br>
                                                    <p class="text-muted"><?=$d->email?></p>
                                                </div>
                                                <div class="col-md-3 col-xs-6"> <strong>Kota Asal</strong>
                                                    <br>
                                                    <p class="text-muted"><?=$d->kota_asal?></p>
                                                </div>
                                                <?php 
                                                if($this->session->userdata('role') == 'karyawan' && $d->karyawan){
                                                    ?>
                                                    <div class="col-md-12">
                                                        <table class="table">
                                                            <tbody>
                                                                <tr>
                                                                    <td>NIK</td>
                                                                    <td><?=$d->nik?></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Nama</td>
                                                                    <td><?=$d->nama?></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>TTL</td>
                                                                    <td><?=$d->kota_lahir?>, <?=tgl_indo($d->tgl_lahir)?></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Tgl Gabung</td>
                                                                    <td><?=tgl_indo($d->tgl_gabung)?></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Masa Kerja</td>
                                                                    <td><?=$d->masa_kerja?></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Grup</td>
                                                                    <td><?=$d->grup?></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Divisi</td>
                                                                    <td><?=$d->divisi?></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Jabatan</td>
                                                                    <td><?=$d->jabatan?></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Grade</td>
                                                                    <td><?=$d->grade?></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>No Rek</td>
                                                                    <td><?=$d->no_rek?></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Pendidikan</td>
                                                                    <td><?=$d->pendidikan?></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Status Kawin</td>    
                                                                    <td><?=$d->status_kawin?></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>No NPWP</td>
                                                                    <td><?=$d->no_npwp?></td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                    <?php 
                                                }
                                                ?>
                                            </div>
                                            <hr>
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="settings" role="tabpanel">
                                        <div class="card-body">
                                            <form class="form-horizontal form-material" method="post" action="<?=base_url('profil/perbarui')?>" enctype="multipart/form-data">
                                                <div class="form-group">
                                                    <label class="col-md-12">Username</label>
                                                    <div class="col-md-12">
                                                        <input value="<?=edit_val('username', $d->username)?>" name="username" type="text" class="form-control form-control-line">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="email" class="col-md-12">Email</label>
                                                    <div class="col-md-12">
                                                        <input value="<?=edit_val('email', $d->email)?>" type="email" class="form-control form-control-line" name="email" id="email">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-12">Password</label>
                                                    <div class="col-md-12">
                                                        <input name="password" type="password" value="<?=edit_val('password', '')?>" class="form-control form-control-line">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-12">Konfirmasi Password</label>
                                                    <div class="col-md-12">
                                                        <input name="konfirmasi_password" type="password" value="<?=edit_val('konfirmasi)password', '')?>" class="form-control form-control-line">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-12">No HP</label>
                                                    <div class="col-md-12">
                                                        <input name="no_hp" value="<?=edit_val('no_hp', $d->no_hp)?>" type="text" class="form-control form-control-line">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-12">Kota Asal</label>
                                                    <div class="col-md-12">
                                                        <input name="kota_asal" value="<?=edit_val('kota_asal', $d->kota_asal)?>" type="text" class="form-control form-control-line">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-12">Avatar</label>
                                                    <div class="col-md-12">
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
                                                <div class="form-group">
                                                    <div class="col-sm-12">
                                                        <button class="btn btn-success">Perbarui Profil</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php $this->load->view('layouts/footer')?>
        </div>
    </div>
    <?php $this->load->view('layouts/script')?>
</body>
</html>