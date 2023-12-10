<style>
    #audio-player-modal {
        display: none;
        position: fixed;
        top: 50%;
        left: 50%;
        background-color: #fff;
        padding: 20px;
        transform: translate(-50%, -60%);
        border: 1px solid #ccc;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        z-index: 999;
        border-radius: 25px;
        background-color: #BFE3DF;
    }

    #close-button {
        position: absolute;
        top: 10px;
        right: 10px;
        cursor: pointer;   
        margin: 5px 5px 0px 10px;
    }

</style>




<div id="audio-player-modal">
    <span id="close-button" onclick="closeMp3Player()">✕</span>
    <audio id="audio-player" controls onended="playNextTrack()">
        Your browser does not support the audio element.
    </audio>
    <ul id="playlist">
        <?php $id = 1; 
        foreach ($getplaylist as $play): ?>
        <li class="btn" data-src="<?=  base_url('assets/uploads/audio/mp3/'.$play['url_lagu']); ?>"><?= $play['title_lagu']?></li>
        <form class="form-horizontal mb-2" action="<?php echo base_url('playlists/hapusplay') ?>" method="POST" enctype="multipart/form-data">
            <button type="submit" name="lagu_id" id="lagu_id" value="<?= $play['id_lagu']; ?>" class="btn text-blue" style="box-sizing: border-box; border: none; height: auto; width: auto; background-color: none;">Hapus Dari Playlist</button>
        </form>
        <?php endforeach; ?>
        <!-- Daftar putar akan ditambahkan melalui JavaScript -->
    </ul>
</div>


    <script>
        
    function openMp3Player() {
        document.getElementById('audio-player-modal').style.display = 'flex';
    }

    function closeMp3Player() {
        document.getElementById('audio-player-modal').style.display = 'none';
    }

    var audioPlayer = document.getElementById('audio-player');
    var playlist = document.getElementById('playlist').getElementsByTagName('li');
    var currentTrack = 0;

    // Fungsi untuk memutar lagu
    function playTrack(index) {
        var track = playlist[index];
        var audioSource = track.getAttribute('data-src');

        audioPlayer.src = audioSource;
        audioPlayer.load();
        audioPlayer.play();

        // Mengupdate indeks lagu saat ini
        currentTrack = index;
    }

    // Fungsi untuk memutar lagu berikutnya
    function playNextTrack() {
        // Memastikan indeks tidak melampaui panjang playlist
        if (currentTrack < playlist.length - 1) {
            playTrack(currentTrack + 1);
        } else {
            // Jika ini adalah lagu terakhir, putar lagu pertama
            playTrack(0);
        }
    }

    document.addEventListener('DOMContentLoaded', function () {
        // Memasang event listener untuk setiap elemen playlist
        for (var i = 0; i < playlist.length; i++) {
            playlist[i].addEventListener('click', function () {
                var index = Array.from(playlist).indexOf(this);
                playTrack(index);
            });
        }

        // Here you can set the onended event
        audioPlayer.onended = function () {
            playNextTrack();
        };
    });

    </script>