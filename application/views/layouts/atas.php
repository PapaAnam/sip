<!DOCTYPE html>
<html lang="en">
<head>
    <?php $this->load->view('layouts/meta') ?>
    <?php $this->load->view('layouts/link_rel') ?>
    <style>
    .m-b-3 {
        margin-bottom: 3px;
    }
    .card-block {
        padding: 20px;
    }
</style>
</head>
<body class="fix-header fix-sidebar card-no-border">
    <?php $this->load->view('layouts/preloader') ?>
    <div id="main-wrapper">
        <?php $this->load->view('layouts/header') ?>
        <?php $this->load->view('layouts/leftbar') ?>
        <div class="page-wrapper">
            <div class="container-fluid">
                <?php $this->load->view('layouts/breadcrumb') ?>