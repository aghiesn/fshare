<style>
    .baris2{
        background-color: #ABC1C9;
        margin: -5% 0% 0% 0%;
        border-radius: 10px;
    }
    .add {
        margin: -7% 0% 0% 0%;
        z-index: 4;
    }
    .thumb {
        z-index: 3;
        margin: -10% 0% 0% 0%;
        position: relative;
    }
    .thumb1 {
        z-index: 3;
        margin: -1% 0% -10% 0%;
        position: relative;
    }
    ajudul {
        font-size: 60px;
    }
    .desc1 {
        background-color: rgba(0, 0, 0, 0.3);
        border-radius: 10px;
        z-index: 2;
        margin: 0% 0% 0% 0%;
        position: relative;
        color: white;
    }
    .jarak{
        margin: 10% 0% 0% 0%;
        padding: 25px;
    }
    .container1{
        border-radius: 10px;
        margin: 14% 0% 150px 0%;
    }
</style>

<div class="container1">
    <div class="row baris1">
        <div class="desc1">
            <div class="col offset-1">
                <div class="row">
                    <ajudul><?= $l_judul; ?></ajudul>
                </div>
                <div class="row">
                    <ajudul><?= $l_artist; ?></ajudul>
                </div>
                <div class="row">
                    <div class="col">
                        <adesc><?= $l_album; ?></adesc>
                        <adesc><?= $l_tahun; ?></adesc>
                    </div>
                </div>
            </div>
        </div>
        <div class="thumb">
            <div class="col offset-5 mt-4 offset-md-6 offset-lg-8 d-none d-sm-block">
                <div class="card rounded-4" style="width: 270px; height: 270px; background-color: #ABC1C9;">
                    <img src="<?= base_url('assets/uploads/images/thumbnail/'.$l_thumb); ?>" alt="" class="rounded-4" style="object-fit: cover; width: 270px; height: 270px;">
                </div>
            </div>
        </div>
        <div class="thumb1">
            <div class="col offset-2 d-block d-sm-none">
                <div class="card rounded-4" style="width: 270px; height: 270px; background-color: #ABC1C9; ">
                    <img src="<?= base_url('assets/uploads/images/thumbnail/'.$l_thumb); ?>" alt="" class="rounded-4" style="object-fit: cover; width: 270px; height: 270px;">
                </div>
            </div>
        </div>
        <div class="add">
            <div class="col offset-9 offset-sm-10 offset-md-10 offset-lg-11">
                <form class="form-horizontal" action="<?php echo base_url('playlists/tambahplay') ?>" method="POST" enctype="multipart/form-data">
                    <button type="submit" name="lagu_id" id="lagu_id" value="<?= $l_id ?>" class="btn rounded-4" style="box-sizing: border-box; border: none; height: 75px; width: 75px; background-color: #BFE3DF;">+</button>
                </form>
            </div>
        </div>
    </div>
    <div class="row baris2">
        <div class="jarak col">
            <div class="row">
                <div class="card-body">
                    <a>Deskripsi Singkat : <br></a>
                    <p class="fs-6"><?= $l_deskripsi; ?></p>
                </div>
                <div class="card-body fs-6">
                    <a>Post ini diupload oleh :</a>
                    <p><?= $l_uploadwho; ?></p>
                    <a>Post ini diupload pada tanggal :</a>
                    <p><?= $l_tanggalupload; ?></p>
                </div>
            </div>
            <div class="row">
                <center>
                    <a class="btn text-black rounded-3 download " href="<?= base_url('assets/uploads/audio/flac/'.$l_linkflac); ?>" style="height: 75px; width: 75px; text-align: center; background-color: #BFE3DF;" onclick="addCount(<?= $l_id ?>)">Link FLAC</a>
                    <a class="btn text-black rounded-3 download " href="<?=  base_url('assets/uploads/audio/mp3/'.$l_linkmp3); ?>" style="height: 75px; width: 75px; text-align: center; background-color: #BFE3DF;" onclick="addCount(<?= $l_id ?>)">Link MP3</a>
                    <a class="btn text-black rounded-3 download " href="<?=  base_url('assets/uploads/audio/arch/'.$l_linkarch); ?>" style="height: 75px; width: 75px; text-align: center; background-color: #BFE3DF;" onclick="addCount(<?= $l_id ?>)">Link Archive</a>
                    <form class="form-horizontal mt-2" action="<?php echo base_url('auth/editlagu') ?>" method="POST" enctype="multipart/form-data">
                        <button type="submit" name="l_id" id="l_id" value="<?= $l_id ?>" class="btn rounded-3" style="height: 75px; width: 75px; text-align: center; background-color: #BFE3DF;">Edit Data</button>
                    </form>
                </center>
            </div>

        </div>
    </div>
</div>
