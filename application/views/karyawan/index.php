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
        <a href="<?=base_url('karyawan/tambah')?>" class="btn m-b-3 waves-effect waves-light btn-danger">Tambah</a>
        <a href="<?=base_url('karyawan/imporexcel')?>" class="btn m-b-3 waves-effect waves-light btn-success">Impor Excel</a>
        <a target="_blank" href="<?=base_url('karyawan/cetak')?>" class="btn btn-primary waves-effect waves-light"><i class="fa fa-print"></i> Cetak</a>
        <a target="_blank" href="<?=base_url('karyawan/pdf')?>" class="btn btn-info waves-effect waves-light"><i class="fa fa-file-pdf-o"></i> PDF</a>
    </div>
    <div class="col-lg-12">
        <div class="card card-outline-info">
            <div class="card-header m-b-0">
                <h4 class="card-title m-b-0 text-white">Karyawan</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive p-3">
                    <table class="table table-bordered table-striped" id="datatable">
                        <thead>
                            <tr>
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
                                <th>Aksi</th>
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
                                <td>
                                    <a class="btn btn-danger" href="<?=base_url('karyawan/ubah/'.$d->id)?>">
                                        <i class="mdi mdi-lead-pencil"></i>
                                    </a>
                                    <a href="#" class="btn btn-warning" onclick="hapus_karyawan(<?=$d->id?>)">
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
<form action="<?=base_url('karyawan/hapus')?>" id="form-hapus-karyawan" method="POST">
    <input type="hidden" name="karyawan">
</form>