<div class="row page-titles">
    <div class="col-md-5 col-8 align-self-center">
        <h3 class="text-themecolor"><?=$title?></h3>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
            <?php 
            if(isset($breadcrumb)){
                if(count($breadcrumb)){
                    ?>
                    <li class="breadcrumb-item">
                        <a href="<?=$breadcrumb['link']?>"><?=$breadcrumb['name']?></a>
                    </li>
                    <?php
                }
            }
            ?>
            <li class="breadcrumb-item active"><?=$title?></li>
        </ol>
    </div>
</div>