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
        background-color: #ABC1C9;
        margin-top: 20px;
    }
    .table-responsive{
        border-style: solid; 
        border-width: 2px; 
        border-color: white;
    }
    .table{
        text-align: center; background-color: #BFE3DF;
    }
    

</style>
<!-- Memunculkan peringatan pesan -->
<div class="peringatan msg" style="display:none;">
	<?= @$this->session->flashdata('msg'); ?>
</div>
<!-- Membuat kotak awal bagian User -->
<div class="kotak container">
    <div class="forum-kotak container col-13 rounded-4">
        <div class="forum1 row">
            <div class="col-12">
                <div class="row mt-4">
                    <div class="col-2">
                        <span class="m-2 rounded-3 p-2" style="text-align: center; background-color: #BFE3DF;">Data_User</span>
                    </div>
                    <div class="col-2 offset-6 offset-sm-7 offset-lg-8">
                    <a class="btn text-black rounded-3" href="<?php echo base_url('admin/home/allaccount'); ?>" style="text-align: center; background-color: #BFE3DF;"><i class="mt-2">Tampilkan Semua</i></a>
                    </div>
                </div>
                <!-- Kotak tabel -->
                <div class="table-responsive my-4 mx-2">
                    <table class="table mt-3 fs-6">
                        <!-- Isian data tabel -->
                        <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Role ID</th>
                            <th>Username</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $i = 1;
                        foreach ($daftarpengguna as $a) { ?>
                            <tr>
                            <td><?= $i++; ?></td>
                            <td><?= $a['nama']; ?></td>
                            <td><?= $a['email']; ?></td>
                            <td><?= $a['id_role']; ?></td>
                            <td><?= $a['username']; ?></td>
                            </tr>
                        <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Membuat kotak awal Data Lagu -->
    <div class="forum-kotak1 container col-13 rounded-4">
        <div class="forum1 row">
            <div class="col-12">
                <div class="row mt-4">
                    <div class="col-2">
                        <span class="m-2 rounded-3 p-2" style="text-align: center; background-color: #BFE3DF;">Data_Lagu</span>
                    </div>
                    <div class="col-2 offset-6 offset-sm-7 offset-lg-8">
                        <a class="btn text-black rounded-3" href="<?php echo base_url('admin/home/allsongs'); ?>" style="text-align: center; background-color: #BFE3DF;"><i class="mt-2">Tampilkan Semua</i></a>
                    </div>
                </div>
                <!-- Kotak tabel -->
                <div class="table-responsive my-4 mx-2">
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
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $i = 1;
                        foreach ($listlagulimit as $b) { ?>
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
                            </tr>
                        <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</div>
