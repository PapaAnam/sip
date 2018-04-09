<div class="row">
    <div class="col-lg-12">
        <div class="card card-outline-info">
            <div class="card-header m-b-0">
                <h4 class="card-title text-white m-b-0"><?=$title?></h4>
            </div>
            <div class="card-body">
                <div class="table-responsive p-3">
                    <table class="table table-bordered table-striped" id="datatable">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Divisi</th>
                                <th>Jabatan</th>
                                <th>Grup</th>
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
                                <td><?=$d->divisi?></td>
                                <td><?=$d->jabatan?></td>
                                <td><?=$d->grup?></td>
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