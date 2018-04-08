<div class="row">
    <?php
    if($this->session->userdata('success_msg')){
        ?>
        <div class="col-12">
            <div class="alert alert-success">
                <?=$this->session->userdata('success_msg')?>
            </div>
        </div>
        <?php 
        $this->session->unset_userdata('success_msg');
    }
    ?>
    <div class="col-12">
        <a href="<?=base_url('akun/tambah')?>" class="m-b-3 btn waves-effect waves-light btn-danger">Tambah</a>
        <a href="<?=base_url('akun/imporexcel')?>" class="btn m-b-3 waves-effect waves-light btn-success">Impor Excel</a>
        <a target="_blank" href="<?=base_url('akun/cetak')?>" class="btn btn-primary waves-effect waves-light"><i class="fa fa-print"></i> Cetak</a>
        <a target="_blank" href="<?=base_url('akun/pdf')?>" class="btn btn-info waves-effect waves-light"><i class="fa fa-file-pdf-o"></i> PDF</a>
    </div>
    <div class="col-lg-12">
        <div class="card card-outline-info">
            <div class="card-header">
                <h4 class="card-title text-white m-b-0">
                    <?=$title?>
                </h4>
            </div>
            <div class="card-body">
                <div class="table-responsive p-3">
                    <table class="table table-bordered table-striped" id="datatable">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Role</th>
                                <th>Username</th>
                                <th>Email</th>
                                <th>No HP</th>
                                <th>Avatar</th>
                                <th>Kota Asal</th>
                                <th>Karyawan</th>
                                <th>Tanggal Dibuat</th>
                                <th>Aksi</th>
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
                                <td><img src="<?=$d->avatar?>" style="max-width: 100px; max-height: 100px;" alt="<?=$d->username?>"></td>
                                <td><?=$d->kota_asal?></td>
                                <td><?=$d->nama?></td>
                                <td><?=tgl_indo($d->tgl_dibuat)?></td>
                                <td>
                                    <a class="btn btn-danger" href="<?=base_url('akun/ubah/'.$d->akun_id)?>">
                                        <i class="mdi mdi-lead-pencil"></i>
                                    </a>
                                    <a href="#" class="btn btn-warning" onclick="hapus(<?=$d->akun_id?>)">
                                        <i class="mdi mdi-delete"></i>
                                    </a>
                                </td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<form action="<?=base_url('akun/hapus')?>" id="form-hapus" method="POST">
    <input type="hidden" name="id">
</form>