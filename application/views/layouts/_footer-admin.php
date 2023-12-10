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
        margin-right: 0%;
        margin-left: 40%; /* Atur jarak modal dari tepi kiri */
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
        <div class="home card offset-1 offset-md-1 offset-lg-1" data-toggle="tooltip" data-placement="top" title="Kembali ke menu utama" style="background-color: rgba(255, 255, 255, 0); width: 100px; height: 100px; border: none;">
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
        <div class="btn offset-2 offset-sm-4 offset-md-6 offset-lg-7" onclick="openMp3Player()" data-toggle="tooltip" data-placement="top" title="Buka Media Player" style="background-color: #BFE3DF; width: 50px; height: 50px; margin-top: 2%;">
            <a href="#" style="padding-top: 5px;">O</a>
        </div>
        <div class="profile card rounded-3 ms-4" style="margin-top: 1%; width: 75px; height: 75px; border: none;">
            <div class="btn-group dropup card-img" style="margin-left: -12px; width: 75px; height: 75px;">
                <button type="button" class="btn pe-auto" data-toggle="tooltip" data-placement="top" data-bs-toggle="dropdown" aria-expanded="false" style="object-fit: cover;">
                    <img src="<?= base_url('assets/uploads/images/foto_profil/'.$userdata->photo); ?>" class="rounded-2 " style="object-fit: cover;  width: 50px; height: 50px; " >
                </button>
                <ul class="dropdown-menu">
                    <li class="text-center mx-2">
                        <label for="Nama User" class="p-3" style="box-sizing: border-box; border: none; height: 100%; width: 100%; background-color: #BFE3DF;">
                            login sebagai admin <br>
                            <?= $userdata->nama; ?> <br>
                            <?= $userdata->email; ?>
                        </label>
                    </li>
                    <li class="text-center mx-2">
                        <a href="<?php echo base_url(); ?>admin/home/printdata/" class="btn" style="box-sizing: border-box; border: none; height: 100%; width: 100%; background-color: #BFE3DF;">Cetak Statistik</a>
                    </li>
                    <li class="text-center mx-2">
                        <a href="<?php echo base_url(); ?>admin/home/exportToExcel/" class="btn" style="box-sizing: border-box; border: none; height: 100%; width: 100%; background-color: #BFE3DF;">Cetak Excel Top Download</a>
                    </li>
                    <li class="text-center mx-2">
                        <a href="<?php echo base_url(); ?>admin/home/exportToPdf/" class="btn" style="box-sizing: border-box; border: none; height: 100%; width: 100%; background-color: #BFE3DF;">Cetak PDF Top Download</a>
                    </li>
                    <li class="text-center mx-2">
                        <a href="<?php echo base_url(); ?>admin/home/datahome/<?php echo $this->session->userdata('id_user'); ?>" class="btn" style="box-sizing: border-box; border: none; height: 100%; width: 100%; background-color: #BFE3DF;">Kelola Data</a>
                    </li>
                    <li class="text-center mx-2">
                        <a href="<?php echo base_url(); ?>admin/home/tambahpost/<?php echo $this->session->userdata('id_user'); ?>" class="btn" style="box-sizing: border-box; border: none; height: 100%; width: 100%; background-color: #BFE3DF;">Tambah Postingan</a>
                    </li>
                    <li class="text-center mx-2">
                        <a href="<?php echo base_url(); ?>auth/profile/<?php echo $this->session->userdata('id_user'); ?>" class="btn" style="box-sizing: border-box; border: none; height: 100%; width: 100%; background-color: #BFE3DF;">Edit Profil</a>
                    </li>
                    <li class="text-center mx-2">
                        <a href="<?php echo base_url(); ?>auth/logout/" class="btn" style="box-sizing: border-box; border: none; height: 100%; width: 100%; background-color: #BFE3DF;">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
        
    <div id="myModal" class="modal" >
        <div class="row">
            <div class="col-4">
                <div class="modal-dialog modal-dialog-left" >
                    <div class="modal-content rounded-3 ps-4 pb-4" style="background-color: #BFE3DF;">
                        <form action="<?php echo site_url('Auth/tampilkankategori'); ?>" method="post">
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
            <div class="col-3">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="row rounded-3" style="background-color: #BFE3DF;">
                            <p> User Paling banyak upload </p>
                            <?php $id = 1; 
                            foreach ($datauserupload as $up): ?>
                                <div class="row">
                                    <div class="col-3"><img src="<?= base_url('assets/uploads/images/foto_profil/'.$up['photo']); ?>" class="rounded-2 " style="object-fit: cover;  width: 50px; height: 50px; " ></div>
                                    <div class="col"><?= $up['username']?></div>
                                </div>
                                <div class="row mb-1">
                                    <div class="col">Total Postingan : <?= $up['uploaded']?></div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-3">
                <div class="modal-dialog modal-dialog-right">
                    <div class="modal-content">
                        <div class="row rounded-3" style="background-color: #BFE3DF;">
                            <p> Statistik Download </p>
                            <?php $id = 1; 
                            foreach ($getdownloaded as $down): ?>
                            <form class="form-horizontal" action="<?php echo base_url('member/home/detailedsong') ?>" method="POST" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-3"><img src="<?= base_url('assets/uploads/images/thumbnail/'.$down['photo']); ?>" class="rounded-2 " style="object-fit: cover;  width: 50px; height: 50px; " ></div>
                                    <div class="col-7"><?= $down['judul_lagu']; ?></div>
                                    <div class="col"><?= $down['downloaded']; ?></div>
                                    <button type="submit" name="l_id" id="l_id" value="<?= $down['id_lagu']; ?>" class="btn col mb-2" style="box-sizing: border-box; border: none; height: auto; width: auto; background-color: #BFE3DF;">Detail</button>
                                </div>
                            </form>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>