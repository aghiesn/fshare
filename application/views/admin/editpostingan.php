<style>
    .kontainer1 {
            padding: 5% 10% 0% 10%;
            margin: 25px 0px 150px 0px;
        }
        .kartu1 {
            position: relative;
            border-radius: 2rem;
            z-index: 0;
            background-color: #7070e9;
            margin: 0px 0px 0px 0px;
        }

        .formpengisian [type="text"], .formpengisian [type="date"], .formpengisian [type="password"], .formpengisian [type="file"], .l_kategori1 {
            text-align: left;
            box-sizing: border-box;
            background-color: rgba(255, 255, 255, 0.678);
            border-radius: 20px;
            margin: 1% 0% 0% 0%
        }
        #audio-preview-mpeg, #audio-preview-flac{
            display: none; /* Sembunyikan elemen audio secara default */
            margin-top: 10px; /* Atur jarak atas elemen audio */
            width: 100%; /* Tentukan lebar elemen audio agar sesuai dengan lebar parentnya */
            max-width: 100%; /* Tentukan lebar maksimum elemen audio */
            border-radius: 0px;
        }

        #audio-preview-mpeg[controls], #audio-preview-mpeg[controls] {
            display: block; /* Tampilkan elemen audio jika memiliki kontrol (tombol putar, jeda, dll.) */
        }

        /* Gaya kontrol audio (opsional) */
        #audio-preview-mpeg::-webkit-media-controls-play-button {
            /* Gaya tombol putar pada browser Webkit (Chrome, Safari) */
            background-color: #3498db; /* Warna latar belakang tombol putar */
            color: white; /* Warna teks tombol putar */
            border: none; /* Hilangkan border tombol putar */
            border-radius: 50%; /* Bentuk border tombol putar menjadi lingkaran */
        }

        #audio-preview-flac::-webkit-media-controls-play-button{
             /* Gaya tombol putar pada browser Webkit (Chrome, Safari) */
            background-color: #3498db; /* Warna latar belakang tombol putar */
            color: white; /* Warna teks tombol putar */
            border: none; /* Hilangkan border tombol putar */
            border-radius: 50%; /* Bentuk border tombol putar menjadi lingkaran */
        }

        #audio-preview-flac::-webkit-media-controls-volume-slider {
            /* Gaya slider volume pada browser Webkit */
            background-color: #3498db; /* Warna slider volume */
        }

        #audio-preview-mpeg::-webkit-media-controls-volume-slider {
            /* Gaya slider volume pada browser Webkit */
            background-color: #3498db; /* Warna slider volume */
        }


</style>


<div class="kontainer1 container-fluid">
            <div class="peringatan msg col-5" style="display:none;">
                <?= @$this->session->flashdata('msg'); ?>
            </div>
            <div class="kartu1 card" style="background-color: #ABC1C9;" data-aos="zoom-in" data-aos-offset="0">
                <div class="card-body">
                        <div class="container">
                            <div class="ps-0">
                                <div class="mt-3 mb-3 text-center"><h2>Form Edit Post</h2></div>
                                <div class="row">
                                        <form class="formpengisian row" action="<?php echo base_url(); ?>admin/home/updatepost" method="post" enctype="multipart/form-data" onsubmit="return validateForm();">
                                            <div class="col-lg-13">
                                                <div class="row">
                                                    <div class="input1 col-13 col-md-7 mb-3">
                                                        <input type="text" class="form-control form-control-user ps-3" id="l_judul" name="l_judul" placeholder="Judul Lagu" value="<?= $l_judul; ?>">
                                                    </div>
                                                    <div class="input2 col-13 col-md-5 mb-3">
                                                        <input type="text" class="form-control form-control-user ps-3" id="l_artist" name="l_artist" placeholder="Artist" value="<?= $l_artist; ?>">
                                                    </div>
                                                    <div class="input3 col-13 mb-3">
                                                        <input type="text" class="form-control form-control-user ps-3" id="l_album" name="l_album" placeholder="Album" value="<?= $l_album; ?>">
                                                    </div>
                                                    <div class="input4 col-13 mb-3">
                                                        <input type="text" class="form-control form-control-user ps-3" id="l_tahun" name="l_tahun" placeholder="Tahun Rilis" value="<?= $l_tahun; ?>">
                                                    </div>
                                                    <div class="input5 col-13 mb-3">
                                                        <label for="flac">File FLAC</label>
                                                        <input class="form-control mb-3 col-13" type="file" accept="audio/flac" onchange="loadflac(event)" name="flac" id="flac">
                                                        <audio controls id="audio-preview-flac" class="mb-3" style="display:block;">
                                                            <source src="<?= base_url('assets/uploads/audio/flac/' . $l_linkflac); ?>">
                                                        </audio>
                                                    </div>
                                                    <div class="input6 col-13 mb-3">
                                                        <label for="mp3">File MP3</label>
                                                        <input class="form-control mb-3 col-12" type="file" accept="audio/mpeg" onchange="loadLagu(event)" name="mp3" id="mp3">
                                                        <audio controls id="audio-preview-mpeg" class="mb-3">
                                                            <source src="<?= base_url('assets/uploads/audio/mp3/' . $l_linkmp3); ?>" type="audio/mp3">
                                                        </audio>
                                                    </div>
                                                    <div class="input10 col-13 mb-3">
                                                        <label for="arch">File Archive (Zip/7z/tgz/Rar)</label> <br>
                                                        <a href="<?= base_url('assets/uploads/audio/arch/' . $l_linkarch); ?>" download><?= $l_linkarch; ?></a>
                                                        <input class="form-control mb-3 col-12" type="file" accept="*" name="arch" id="arch" value="<?= $l_linkarch; ?>">
                                                    </div>
                                                    <div class="input11 col-13 mb-3">
                                                        <label for="footage">File Footage</label>
                                                        <input class="form-control mb-3 col-12" type="file" accept="video/*" name="footage" id="footage" onchange="loadfootage(event)" >
                                                        <video controls id="video-preview" style="width: 50%; height: auto;">
                                                        <source src="<?= base_url('assets/uploads/audio/footage/' . $l_getlagu->footage); ?>">
                                                            Your browser does not support the video tag.
                                                        </video>
                                                    </div>
                                                    <div class="input12 col-13 col-md-7 mb-3">
                                                        <input type="text" class="form-control form-control-user ps-3" id="l_id" name="l_id" placeholder="id lagu" value="<?= $l_id; ?>">
                                                    </div>
                                                    <div class="input7 mb-3 overflow-auto">
                                                        <textarea class="form-control form-control-user overflow-auto ps-3 rounded-3" id="l_deskripsi" name="l_deskripsi" placeholder="Deskripsi Tentang Album" style="height: 200px; width: 100%;"><?= $l_deskripsi; ?></textarea>
                                                    </div>
                                                    <div class="input8 mb-3">
                                                        <input type="text" id="l_uploadwho" name="l_uploadwho" value="<?= $userdata->username; ?>">
                                                    </div>
                                                    <div class="input9 mb-3">
                                                        <label for="l_kategori1 col-3">Kategori:</label>
                                                        <select name="l_kategori1" id="l_kategori1" class="l_kategori1 col-lg-10 col-md-9" required>
                                                            <?php foreach ($l_kategori1 as $row): ?>
                                                                <option value="<?php echo $row->id_kategori; ?>" <?php echo ($row->id_kategori == $l_getlagu->id_kategori) ? 'selected' : ''; ?>><?php echo $row->nama_kategori; ?></option>
                                                            <?php endforeach; ?>
                                                        </select><br>
                                                    </div>
                                                    <div class="input5">
                                                        <input class="form-control mb-3 col-12" type="file" accept="image/*" onchange="loadFile(event)" name="photo" id="photo">
                                                        <img id="output" class="img-fluid" style="box-sizing: border-box; background-color: rgba(255, 255, 255, 0.678); border-radius: 20px; object-fit: cover;" src="<?= base_url('assets/uploads/images/thumbnail/' . $l_thumb); ?>"/>
                                                    </div>
                                                    <div class="tombol1 mb-3">
                                                        <input type="submit" class="tombol_login rounded-3" value="Kirim Postingan" style="box-sizing: border-box; border: none; height: 90px; width: 100%; background-color: #BFE3DF;">
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                </div>
                                <div class="row ps-0 pe-3 mt-4">
                                    <div class="text-center">
                                        <a href="<?php echo base_url();?>" class="btn rounded-3" role="button" style="background-color: #BFE3DF;">Kembali Ke Menu Utama</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                </div>
            </div>
        </div>

    <script>
        var loadFile = function(event) {
            var output = document.getElementById('output');
            output.src = URL.createObjectURL(event.target.files[0]);
            output.onload = function() {
            URL.revokeObjectURL(output.src) // free memory
            }
        };
    </script>
    <script>
        function loadLagu(event) {
            var input = event.target;
            var audio = document.getElementById('audio-preview-mpeg');

            if (input.files && input.files[0]) {
                var newSource = URL.createObjectURL(input.files[0]);
                audio.src = newSource;
                audio.load();
                audio.play();
            }
        }
    </script>
    <script>
        function loadfootage(event) {
            var input = event.target;
            var footage = document.getElementById('video-preview');

            if (input.files && input.files[0]) {
                var newSource = URL.createObjectURL(input.files[0]);
                footage.src = newSource;
                footage.load();
                footage.play();
            }
        }
    </script>
    <script>
        function loadflac(event) {
            var input = event.target;
            var audio = document.getElementById('audio-preview-flac');

            if (input.files && input.files[0]) {
                var newSource = URL.createObjectURL(input.files[0]);
                audio.src = newSource;
                audio.load();
                audio.play();
            }
        }
    </script>