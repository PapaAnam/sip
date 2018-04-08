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
        <a href="<?=base_url('penggajian/tambah')?>" class="btn waves-effect waves-light btn-danger m-b-3"> Tambah</a>
        <div class="row">
            <div class="col-md-2">
                <div class="form-group">
                    <label></label>
                    <select name="tahun" class="form-control form-control-line">
                        <?php 
                        foreach (range($this->config->item('tahun_berdiri'), date('Y')) as $tahun) {
                            ?>
                            <option <?=$this->uri->segment(2) == $tahun ? 'selected' : ''?> value="<?=$tahun?>"><?=$tahun?></option>
                            <?php 
                        }
                        ?>
                    </select>
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-group">
                    <label></label>
                    <select name="bulan" class="form-control form-control-line">
                        <?php 
                        foreach (range(1,12) as $bulan) {
                            ?>
                            <option <?=$this->uri->segment(3) == $bulan ? 'selected' : ''?> value="<?=$bulan?>"><?=bulan($bulan)?></option>
                            <?php 
                        }
                        ?>
                    </select>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for=""></label>
                    <button style="margin-top: 25px;" type="button" onclick="filter()" class="btn btn-danger waves-effect waves-light">Filter</button>
                    <?php
                    if($this->uri->segment(2) && $this->uri->segment(3)){
                        ?>
                        <a target="_blank" style="margin-top: 25px;" href="<?=base_url('penggajian/'.$this->uri->segment(2).'/'.$this->uri->segment(3).'/cetak')?>" class="btn btn-primary waves-effect waves-light"><i class="fa fa-print"></i> Cetak</a>
                        <a target="_blank" style="margin-top: 25px;" href="<?=base_url('penggajian/'.$this->uri->segment(2).'/'.$this->uri->segment(3).'/pdf')?>" class="btn btn-info waves-effect waves-light"><i class="fa fa-file-pdf-o"></i> PDF</a>
                        <?php 
                    }
                    ?>
                </div>
            </div>
            <?php if($this->uri->segment(2) && $this->uri->segment(3)){ ?>
            <div class="col-md-12">
                <div class="alert alert-info">
                    Menampilkan penggajian pada periode <strong><?=bulan($this->uri->segment(3)).' '.$this->uri->segment(2)?></strong>
                </div>
            </div>
            <?php } ?>
        </div>
    </div>
    <div class="col-lg-12">
        <div class="card card-outline-info">
            <div class="card-header m-b-0">
                <h4 class="card-title text-white m-b-0">Penggajian</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive p-3">
                    <table class="table table-bordered table-striped" id="datatable">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Karyawan</th>
                                <th>Divisi</th>
                                <th>Jabatan</th>
                                <th>Periode</th>
                                <th>Tanggal Gajian</th>
                                <th>Gaji Pokok</th>
                                <th>Tunjangan</th>
                                <th>Uang Harian</th>
                                <th>Lembur</th>
                                <th>THR</th>
                                <th>Bonus</th>
                                <th>Cicilan</th>
                                <th>Sisa Pinjaman</th>
                                <th>Hutang</th>
                                <th>BPJS</th>
                                <th>Gaji Bersih</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $a=1;foreach($data as $d) { ?>
                            <tr>
                                <td><?=$a++?></td>
                                <td><?=$d->nama?></td>
                                <td><?=$d->divisi?></td>
                                <td><?=$d->jabatan?></td>
                                <td><?=bulan($d->bulan).' '.$d->tahun?></td>
                                <td><?=tgl_indo($d->tgl_gaji)?></td>
                                <td><?=rp($d->gaji_pokok)?></td>
                                <td><?=rp($d->tunjangan)?></td>
                                <td><?=rp($d->uang_harian)?></td>
                                <td><?=rp($d->lembur)?></td>
                                <td><?=rp($d->thr)?></td>
                                <td><?=rp($d->bonus)?></td>
                                <td><?=rp($d->cicilan)?></td>
                                <td><?=rp($d->sisa_pinjaman)?></td>
                                <td><?=rp($d->hutang)?></td>
                                <td><?=rp($d->bpjs)?></td>
                                <td>
                                    <?=
                                    rp($d->gaji_bersih)
                                    ?>
                                </td>
                                <td>
                                    <a class="btn btn-danger" href="<?=base_url('penggajian/ubah/'.$d->gaji_id)?>">
                                        <i class="mdi mdi-lead-pencil"></i>
                                    </a>
                                    <a href="#" class="btn btn-warning" onclick="hapus(<?=$d->gaji_id?>)">
                                        <i class="mdi mdi-delete"></i>
                                    </a>
                                    <a target="_blank" href="<?=base_url('penggajian/slip/'.$d->gaji_id)?>" class="btn btn-success">
                                        Slip Gaji
                                    </a>
                                    <a target="_blank" href="<?=base_url('penggajian/slip/pdf/'.$d->gaji_id)?>" class="btn btn-danger">
                                        <i class="fa fa-file-pdf-o"></i> Slip Gaji PDF
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
<?php $this->load->view('layouts/form-hapus', ['modul' => 'penggajian']) ?>
<script>
    function filter(){
        var tahun = document.getElementsByName('tahun')[0].value
        var bulan = document.getElementsByName('bulan')[0].value
        window.location = '<?=base_url('penggajian')?>/'+tahun+'/'+bulan
    }
</script>