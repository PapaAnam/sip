<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <!-- <link rel="icon" type="image/png" sizes="16x16" href="../assets/images/favicon.png"> -->
    <title>404 Halaman Tidak Ditemukan</title>
    <?php $this->load->helper('url') ?>
    <link href="<?=base_url('assets/plugins/bootstrap/css/bootstrap.min.css')?>" rel="stylesheet">
    <link href="<?=base_url('assets/css/style.css')?>" rel="stylesheet">
    <link href="<?=base_url('assets/css/colors/blue.css')?>" id="theme" rel="stylesheet">
</head>

<body class="fix-header card-no-border">
    <section id="wrapper" class="error-page">
        <div class="error-box">
            <div class="error-body text-center">
                <h1>404</h1>
                <h3 class="text-uppercase">Halaman Tidak Ditemukan !</h3>
                <p class="text-muted m-t-30 m-b-30">Mohon maaf karena kesalahan ini</p>
                <a href="<?=base_url('')?>" class="btn btn-info btn-rounded waves-effect waves-light m-b-40">Kembali ke home</a> </div>
            <footer class="footer text-center">© <?=$this->config->item('tahun_berdiri')?> <?=$this->config->item('nama_aplikasi')?></footer>
        </div>
    </section>
    <script src="<?=base_url('assets/plugins/jquery/jquery.min.js')?>"></script>
    <script src="<?=base_url('assets/plugins/bootstrap/js/tether.min.js')?>"></script>
    <script src="<?=base_url('assets/plugins/bootstrap/js/bootstrap.min.js')?>"></script>
    <script src="<?=base_url('assets/js/waves.js')?>"></script>
</body>

</html>
