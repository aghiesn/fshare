<?php
header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=$title.xls");
header("Pragma: no-cache");
header("Expires: 0");

?>

<center>
    <h3>Statistik Top Download</h3>
</center> <br>
<table border=1 class="table-data">
    <thead>
        <tr>
            <th>No</th>
            <th>ID Lagu</th>
            <th>Judul</th>
            <th>Artis</th>
            <th>Album</th>
            <th>Tahun Rilis</th>
            <th>Diupload Oleh</th>
            <th>Tanggal Upload</th>
            <th>Telah DiDownload Sebanyak</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $i = 1;
        foreach ($getdownloadedall as $b) { ?>
            <tr>
                <td><?= $i++; ?></td>
                <td><?= $b['id_lagu']; ?></td>
                <td><?= $b['judul_lagu']; ?></td>
                <td><?= $b['artist']; ?></td>
                <td><?= $b['album']; ?></td>
                <td><?= $b['tahun_rilis']; ?></td>
                <td><?= $b['upload_by']; ?></td>
                <td><?= $b['tanggal_up']; ?></td>
                <td><?= $b['downloaded']; ?></td>
            </tr>
        <?php } ?>
    </tbody>
</table>


<h3><center>Statistik Top Upload</center></h3>
<br/>

<table border="1" class="table-data">
<thead>
    <tr>
        <th>No</th>
        <th>Nama</th>
        <th>Username</th>
        <th>Email</th>
        <th>Dibuat Tanggal</th>
        <th>Terakhir Login</th>
        <th>Banyak Upload</th>
    </tr>
</thead>
<tbody>
    <?php
    $i = 1;
    foreach ($datauseruploadall as $b) { ?>
        <tr>
            <td><?= $i++; ?></td>
            <td><?= $b['nama']; ?></td>
            <td><?= $b['username']; ?></td>
            <td><?= $b['email']; ?></td>
            <td><?= $b['created_at']; ?></td>
            <td><?= $b['last_login']; ?></td>
            <td><?= $b['uploaded']; ?></td>
        </tr>
    <?php } ?>
</tbody>
</table>