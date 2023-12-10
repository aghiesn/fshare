<style>
    /* styles.css */
    @keyframes slideInFromLeft {
        from {
            transform: translateX(-100%);
        }
        to {
            transform: translateX(0);
        }
    }

    @keyframes fadeout {
        from {
            transform: scale(1);
        }
        to {
            transform: scale(0);
        }
    }
    .modal-dialog-left {
        margin-right: 2%;
        margin-left: 2%; /* Atur jarak modal dari tepi kiri */
        margin-top: 7%;
        width: 350px;
        height: auto;
        
    }

    .show-dialog {
        display: block;
        animation: slideInFromLeft .25s;
    }

    .hide-dialog {
        display: none;
        animation: fadeout .25s;
    }

    .modal-dialog-right {
        margin-right: 2%;
        margin-left: auto; /* Atur jarak modal dari tepi kiri */
        margin-top: 10%;
        width: 350px;
        height: auto;
        
    }

    .btn-c{
        box-sizing: border-box;
        border: none; 
        border-radius: 10px;
        background-color: #BFE3DF;
        width: 10px;
        height: 10px; 
    }
</style>
    <!-- Pada style diatas, untuk mengatur tampilan yang akan muncul 
di website, seperti keyframe untuk animasi, dan beberapa class untuk mengatur tampilan perclass -->
    <div class="kaki row col-13" style="margin-bottom: 10px;" data-aos="fade-up" data-aos-once="true" data-aos-offset="0">
        <div class="home card offset-0 offset-md-1 offset-lg-1" data-toggle="tooltip" data-placement="top" title="Kembali ke menu utama" style="background-color: rgba(255, 255, 255, 0); width: 100px; height: 100px; border: none;">
            <img src="<?php echo base_url();?>assets/ico/polaroid.png" class="card-img-top rounded-3" alt="..." style="width: 100%; height: 100%;">
            <a href="<?php echo base_url() ?>auth/guest" class="pe-auto" style="object-fit: cover;">
                <div class="card-img-overlay">
                    <img src="<?php echo base_url();?>assets/ico/home.png" class="ms-2 mt-2 w-75" style="object-fit: cover;">
                </div>
            </a>
        </div>
        <div class="btn card offset-0" id="menu-kat" data-toggle="tooltip" data-placement="top" title="Buka Menu Kategori" style="background-color: #BFE3DF; width: 50px; height: 50px; margin-top: 2%;">
            <a href="#" style="padding-top: 5px;">K</a>
        </div>
        <div class="profile card rounded-3 offset-4 offset-sm-6 offset-md-7 offset-lg-8" style="margin-top: 1%; width: 75px; height: 75px; border: none;">
            <a href="<?php echo base_url() ?>auth/login" class="pe-auto" data-toggle="tooltip" data-placement="top" title="<?= $user; ?>">
                <div class="card-img-overlay" >
                    <img src="<?php echo base_url();?>assets/ico/profile1.png" class="w-100" style="object-fit: cover;">
                </div>
            </a>
        </div>
    </div>

    <div id="myModal" class="modal">
        <div class="row">
            <div class="col-5">
                <div class="modal-dialog modal-dialog-left" >
                    <div class="modal-content mcontent rounded-3 ps-4 pb-4" style="background-color: #BFE3DF;">
                        <form action="<?php echo site_url('Auth/tampilkankategoriGuest'); ?>" method="post">
                            <div class="row">
                                <div class="col-3 p-1 mb-3">
                                    <button type="button" class="btn close btn-c">Tutup</button>
                                </div>
                                <div class="col p-3">
                                    <label for="category">Pilih Kategori</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-8">
                                    <?php 
                                    foreach ($l_kategori as $kat): ?>
                                    <label>
                                        <input type="radio" name="category" id="category" value="<?= $kat['id_kategori']; ?>"> <?= $kat['nama_kategori'];?>
                                        
                                    </label>
                                    <br>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-8">

                                </div>
                                <div class="col">
                                    <button type="submit" class="btn align-items-end mt-2" style="box-sizing: border-box; border: none; height: auto; width: auto; background-color: #BFE3DF;" >Filter</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>





