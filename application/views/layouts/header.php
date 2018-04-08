<header class="topbar">
    <nav class="navbar top-navbar navbar-expand-md navbar-light">
        <div class="navbar-header">
            <a class="navbar-brand" href="<?=base_url()?>">
                <b>
                    <img src="<?=base_url('images/logo-light-text.png')?>" alt="<?=$this->config->item('nama_aplikasi')?>" class="dark-logo" />
                    <img src="<?=base_url('images/logo-light-icon.png')?>" alt="<?=$this->config->item('nama_aplikasi')?>" class="light-logo" />
                </b>
                <span>
                    <img src="../assets/images/logo-text.png" alt="homepage" class="dark-logo" />
                    <img src="<?=base_url('images/logo-light-text.png')?>" alt="<?=$this->config->item('nama_aplikasi')?>" class="light-logo" />
                </span> 
            </a>
        </div>
        <div class="navbar-collapse">
            <ul class="navbar-nav mr-auto mt-md-0">
                <li class="nav-item"> <a class="nav-link nav-toggler hidden-md-up text-muted waves-effect waves-dark" href="javascript:void(0)"><i class="mdi mdi-menu"></i></a> </li>
                <li class="nav-item"> <a class="nav-link sidebartoggler hidden-sm-down text-muted waves-effect waves-dark" href="javascript:void(0)"><i class="ti-menu"></i></a> </li>
            </ul>
            <ul class="navbar-nav my-lg-0">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <img src="<?=$this->session->userdata('avatar')?>" alt="<?=$this->session->userdata('username')?>" class="profile-pic" />
                    </a>
                    <div class="dropdown-menu dropdown-menu-right scale-up">
                        <ul class="dropdown-user">
                            <li>
                                <div class="dw-user-box">
                                    <div class="u-img">
                                        <img src="<?=$this->session->userdata('avatar')?>" alt="user">
                                    </div>
                                    <div class="u-text">
                                        <h4><?=$this->session->userdata('username')?></h4>
                                        <p class="text-muted"><?=$this->session->userdata('email')?></p>
                                        <a href="<?=base_url('profil')?>" class="btn btn-rounded btn-danger btn-sm">Lihat Profil</a>
                                    </div>
                                </div>
                            </li>
                            <li role="separator" class="divider"></li>
                            <li>
                                <a href="<?=base_url('profil')?>">
                                    <i class="ti-user"></i> Lihat Profil
                                </a>
                            </li>
                            <li>
                                <a href="<?=base_url('keluar')?>">
                                    <i class="fa fa-power-off"></i> Keluar
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
            </ul>
        </div>
    </nav>
</header>