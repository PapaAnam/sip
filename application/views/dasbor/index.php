<div class="row">
    <div class="col-lg-3 col-md-6">
        <div class="card">
            <div class="card-body">
                <div class="d-flex flex-row">
                    <div class="round round-lg align-self-center round-info">
                        <i class="mdi mdi-account-check"></i>
                    </div>
                    <div class="m-l-10 align-self-center">
                        <h3 class="m-b-0 font-light"><?=$total_karyawan?></h3>
                        <h5 class="text-muted m-b-0">Total Karyawan</h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="card">
            <div class="card-body">
                <div class="d-flex flex-row">
                    <div class="round round-lg align-self-center round-warning">
                        <i class="mdi mdi-apple-keyboard-command"></i>
                    </div>
                    <div class="m-l-10 align-self-center">
                        <h3 class="m-b-0 font-lgiht"><?=$total_divisi?></h3>
                        <h5 class="text-muted m-b-0">Divisi</h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="card">
            <div class="card-body">
                <div class="d-flex flex-row">
                    <div class="round round-lg align-self-center round-primary">
                        <i class="mdi mdi-credit-card-multiple"></i>
                    </div>
                    <div class="m-l-10 align-self-center">
                        <h3 class="m-b-0 font-lgiht"><?=$total_penggajian?></h3>
                        <h5 class="text-muted m-b-0">Total Penggajian</h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="card">
            <div class="card-body">
                <div class="d-flex flex-row">
                    <div class="round round-lg align-self-center round-danger">
                        <i class="mdi mdi-account-box"></i>
                    </div>
                    <div class="m-l-10 align-self-center">
                        <h3 class="m-b-0 font-lgiht"><?=$total_akun?></h3>
                        <h5 class="text-muted m-b-0">Total Akun</h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Grup</th>
                                <th>Total Karyawan</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            $i=1; foreach($karyawan_by_grup as $k){
                                ?>
                                <tr>
                                    <td><?=$i++?></td>
                                    <td><?=$k->grup?></td>
                                    <td><?=$k->total?></td>
                                </tr>
                                <?php 
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>