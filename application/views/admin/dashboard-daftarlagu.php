<style>
    .kotak {
        margin-top: 75px;
        margin-bottom: 180px;
    }
    .forum-kotak{
        background-color: #ABC1C9;
        margin-left: ;
    }
    .forum-kotak1{
        background-color: white;
        margin-top: 20px;
    }
    .table-responsive{
        border-style: solid; 
        border-width: 2px; 
        border-color: white;
    }
    .table{
        text-align: center; 
        background-color: #BFE3DF;
    }
    

</style>
<!-- Memunculkan peringatan pesan -->
<div class="peringatan msg" style="display:none;">
    <?= @$this->session->flashdata('msg'); ?>
</div>

<!-- Membuat kotak awal -->
<div class="kotak container">
    <div class="forum-kotak container col-13 rounded-4">
        <div class="forum1 row">
            <div class="col-12">
                <!-- Membuat kotak tabel -->
                <div class="table-responsive my-4 mx-2">
                    <div class="page-header">
                        <div class="col-12">
                            <div class="row">
                                <div class="col-2">
                                    <span class="m-2 rounded-3 p-2" style="text-align: center; background-color: #BFE3DF;">Data Lagu</span>
                                </div>
                                <div class="col-2 offset-8">
                                    <a class="btn text-black rounded-3" href="<?php echo base_url('admin/home/'); ?>" style="text-align: center; background-color: #BFE3DF;"><i class="mt-2">Kembali</i></a>
                                </div>
                            </div>
                            <div class="row">
                                <div id="search-form col-1">
                                    <form action="<?php echo site_url('admin/home/hasil_pencarian_lagu'); ?>" method="post">
                                        <input type="text" id="keyword" class="keyword insearch" name="keyword" placeholder="Search Songs" style="padding-left: 15px; width: 150px;">
                                        <input type="submit" class="submit" value="S" style="padding: 10px; height: ; width: ;">
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <table class="table mt-3 fs-6">
                        <!-- Isian data tabel -->
                        <thead>
                        <tr>
                            <th>No</th>
                            <th>Judul</th>
                            <th>Artis</th>
                            <th>Album</th>
                            <th>Tahun Rilis</th>
                            <th>Gambar Album</th>
                            <th>Diupload Oleh</th>
                            <th>Link FLAC</th>
                            <th>Link MP3</th>
                            <th>Aksi</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $i = 1;
                        foreach ($listlagu as $b) { ?>
                            <tr>
                            <td><?= $i++; ?></td>
                            <td><?= $b['judul_lagu']; ?></td>
                            <td><?= $b['artist']; ?></td>
                            <td><?= $b['album']; ?></td>
                            <td><?= $b['tahun_rilis']; ?></td>
                            <td><img src="<?= base_url('assets/uploads/images/thumbnail/'.$b['photo']); ?>" alt="" style="width: 120px; height: 120px;"></td>
                            <td><?= $b['upload_by']; ?></td>
                            <td><a href="<?= $b['link_flac']; ?>">Klik Link</a></td>
                            <td><a href="<?= $b['link_mp3']; ?>">Klik Link</a></td>
                            <td>
                                <form class="form-horizontal mt-2" action="<?php echo base_url('admin/home/delsong') ?>" method="POST" enctype="multipart/form-data">
                                    <button type="submit" name="idlagudel" id="idlagudel" value="<?= $b['id_lagu']; ?>" class="btn text-blue" style="box-sizing: border-box; border: none; height: auto; width: auto; background-color: none;">Hapus Lagu</button>
                                </form>
                                <form class="form-horizontal mt-2" action="<?php echo base_url('auth/editlagu') ?>" method="POST" enctype="multipart/form-data">
                                    <button type="submit" name="l_id" id="l_id" value="<?= $b['id_lagu']; ?>" class="btn text-blue" style="box-sizing: border-box; border: none; height: auto; width: auto; background-color: none;">Edit</button>
                                </form>
                            </td>
                            </tr>
                        <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>