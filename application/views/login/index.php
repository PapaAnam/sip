<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/png" sizes="16x16" href="../assets/images/favicon.png">
    <title>Form Masuk</title>
    <link href="<?=base_url('assets/plugins/bootstrap/css/bootstrap.min.css')?>" rel="stylesheet">
    <link href="<?=base_url('assets/css/login_style.css')?>" rel="stylesheet">
    <link href="<?=base_url('assets/css/colors/blue.css')?>" id="theme" rel="stylesheet">
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
</head>
<body>
    <div class="preloader">
        <svg class="circular" viewBox="25 25 50 50">
            <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" /> </svg>
        </div>
        <section id="wrapper">
            <div class="login-register" style="background-image:url(images/login-register.jpg);">        
                <div class="login-box card">
                    <div class="card-body">
                        <form class="form-horizontal form-material" method="POST" id="loginform" action="<?=base_url('login/proses')?>">
                            <?php 
                            if($this->session->userdata('belum_login')){
                                ?>
                                <div class="alert alert-danger">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button>
                                    <?=$this->session->userdata('belum_login')?>
                                </div>
                                <?php 
                                $this->session->unset_userdata('belum_login');
                            }
                            ?>
                            <h3 class="box-title m-b-20">Masukkan akun anda</h3>
                            <div class="form-group ">
                                <div class="col-xs-12">
                                    <input name="username" class="form-control" type="text" required="" placeholder="Username"> 
                                </div>
                                <?php 
                                if($this->session->userdata('error')){
                                    ?>
                                    <span class="help-block text-danger">
                                        <small><?=$this->session->userdata('error')?></small>
                                    </span>
                                    <?php 
                                    $this->session->unset_userdata('error');
                                }
                                ?>
                            </div>
                            <div class="form-group">
                                <div class="col-xs-12">
                                    <input name="password" class="form-control" type="password" required="" placeholder="Password"> 
                                </div>
                                <?php 
                                if($this->session->userdata('pass_error')){
                                    ?>
                                    <span class="help-block text-danger">
                                        <small><?=$this->session->userdata('pass_error')?></small>
                                    </span>
                                    <?php 
                                    $this->session->unset_userdata('pass_error');
                                }
                                ?>
                            </div>
                            <div class="form-group text-center m-t-20">
                                <div class="col-xs-12">
                                    <button class="btn btn-info btn-lg btn-block text-uppercase waves-effect waves-light" type="submit">Masuk</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
        <script src="<?=base_url('assets/plugins/jquery/jquery.min.js')?>"></script>
        <script src="<?=base_url('assets/js/popper.min.js')?>"></script>
        <script src="<?=base_url('assets/plugins/bootstrap/js/bootstrap.min.js')?>"></script>
        <script src="<?=base_url('assets/js/jquery.slimscroll.js')?>"></script>
        <script src="<?=base_url('assets/js/waves.js')?>"></script>
        <script src="<?=base_url('assets/js/sidebarmenu.js')?>"></script>
        <script src="<?=base_url('assets/plugins/sticky-kit-master/dist/sticky-kit.min.js')?>"></script>
        <script src="<?=base_url('assets/js/jquery.sparkline.min.js')?>"></script>
        <script src="<?=base_url('assets/js/custom.min.js')?>"></script>
        <script src="<?=base_url('assets/js/jQuery.style.switcher.js')?>"></script>
    </body>
    </html>