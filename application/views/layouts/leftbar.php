<aside class="left-sidebar">
    <div class="scroll-sidebar">
        <div class="user-profile" style="background: url(<?=base_url('images/user-info.jpg')?>) no-repeat;">
            <div class="profile-img">
                <img src="<?=$this->session->userdata('avatar')?>" alt="<?=$this->session->userdata('username')?>" /> 
            </div>
            <div class="profile-text"> <a href="#" class="dropdown-toggle u-dropdown" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="true"><?=$this->session->userdata('username')?></a>
                <div class="dropdown-menu animated flipInY">
                    <a href="<?=base_url('profil')?>" class="dropdown-item">
                        <i class="ti-user"></i> Profil Saya
                    </a>
                    <div class="dropdown-divider"></div> 
                    <a href="<?=base_url('keluar')?>" class="dropdown-item">
                        <i class="fa fa-power-off"></i> Keluar
                    </a>
                </div>
            </div>
        </div>
        <nav class="sidebar-nav">
            <ul id="sidebarnav">
                <li class="nav-small-cap" style="text-transform: uppercase;">MENU <?=$this->session->userdata('role')?></li>
                <li>
                    <a href="<?=base_url('')?>">
                        <i class="mdi mdi-view-dashboard"></i>
                        <span class="hide-menu">Dasbor </span>
                    </a>
                </li>
                <?php 
                if($this->session->userdata('role') == 'admin'){
                    ?>
                    <li>
                        <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false">
                            <i class="mdi mdi-account-check"></i>
                            <span class="hide-menu">Karyawan </span>
                        </a>
                        <ul aria-expanded="false" class="collapse">
                            <li><a href="<?=base_url('karyawan')?>">Lihat</a></li>
                            <li><a href="<?=base_url('karyawan/tambah')?>">Tambah</a></li>
                            <li><a href="<?=base_url('karyawan/imporexcel')?>">Impor Excel</a></li>
                        </ul>
                    </li>
                    <li> 
                        <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false">
                            <i class="mdi mdi-credit-card-multiple"></i>
                            <span class="hide-menu">Penggajian</span>
                        </a>
                        <ul aria-expanded="false" class="collapse">
                            <li><a href="<?=base_url('penggajian')?>">Lihat</a></li>
                            <li><a href="<?=base_url('penggajian/tambah')?>">Tambah</a></li>
                        </ul>
                    </li>
                    <li>
                        <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false">
                            <i class="mdi mdi-account-box"></i>
                            <span class="hide-menu">Akun</span>
                        </a>
                        <ul aria-expanded="false" class="collapse">
                            <li><a href="<?=base_url('akun')?>">Lihat</a></li>
                            <li><a href="<?=base_url('akun/tambah')?>">Tambah</a></li>
                            <li><a href="<?=base_url('akun/imporexcel')?>">Impor Excel</a></li>
                        </ul>
                    </li>
                    <?php 
                }else{
                    ?>
                    <li>
                        <a href="<?=base_url('/gaji-saya')?>">
                            <i class="mdi mdi-credit-card-multiple"></i>
                            <span class="hide-menu">Gaji Saya </span>
                        </a>
                    </li>
                    <?php
                }
                ?>
            </ul>
        </nav>
    </div>
    <div class="sidebar-footer">
        <a href="<?=base_url('keluar')?>" class="link" data-toggle="tooltip" title="Logout"><i class="mdi mdi-power"></i></a>
    </div>
</aside>