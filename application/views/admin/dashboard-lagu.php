<script>
$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip()    
});
</script>
<style>
    .kaki{
        margin-bottom: -15px;
        margin-left: ;
        background-color: ;
    }
</style>
        <div class="peringatan msg" style="display: none; margin-top: 7%; width: 40%;">
            <?= @$this->session->flashdata('msg'); ?>
        </div>
    <div class="row g-4 mt-5" style="margin-bottom: 150px;">
        <?php $id = 1; 
        foreach ($listsecond as $item): ?>
        <div class="col-6 col-md-4 col-lg-3">
            <div class="card rounded-3 " style="display: inline-block; width: 100%; height: auto; border: none; margin: 8% 0px 0px 10%; flex-basis: calc(33.33% - 20px); background-color: #f5f5f5; overflow: hidden;" data-aos="zoom-out">
                <img src="<?php echo base_url();?>assets/back/backcard.png" class="card-img-top rounded-3 w-100" alt="..." style="object-fit: cover; width: 100%; height: auto;">
                    
                    <div class="card-img-overlay text-black" style="width: auto; height: auto; object-fit: cover; ">
                        <div class="row">
                            <div class="col-2 offset-md-7 offset-6 mb-3">
                                <form class="form-horizontal" action="<?php echo base_url('admin/home/detailedsong') ?>" method="POST" enctype="multipart/form-data">
                                    <button type="submit" name="l_id" id="l_id" value="<?= $item['id_lagu']; ?>" class="btn" style="box-sizing: border-box; border: none; height: auto; width: auto; background-color: #BFE3DF;">Detail</button>
                                </form>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <img src="<?= base_url('assets/uploads/images/thumbnail/'.$item['photo']); ?>" class="w-100">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 mt-1">
                            </div>
                            <div class="card text-center mt-2" style="width: 100%; height: 40%; background-color: rgba(191, 227, 223, 0.8);">
                                <h5 class="card-title w-100 fs-5" style="object-fit: cover;"><?= $item['judul_lagu']; ?></h5>
                                <p class="card-text w-100 fs-6" style="object-fit: cover;"><small><?= $item['artist']; ?></small></p>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
        <?php endforeach; ?>

    </div>
