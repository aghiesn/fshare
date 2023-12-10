<!DOCTYPE html>
<html>
    <head>
        <title></title>
    </head>
    <body>
        <style type="text/css">
            .table-data{
                width: 100%;
                border-collapse: collapse;
            }
            .table-data tr th, .table-data tr td{
                border:1px solid black;
                font-size: 11pt;
                font-family:Verdana;
                padding: 10px 10px 10px 10px;
            }
            h3{
                font-family:Verdana;
            }
        </style>

        <h3><center>Statistik Top Download</center></h3>
        <br/>

        <table class="table-data">
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

        <table class="table-data">
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
        <script type="text/javascript">
            window.print();
        </script>
    </body>
</html>