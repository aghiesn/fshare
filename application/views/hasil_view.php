<!-- application/views/hasil_view.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Hasil Data</title>
</head>
<body>
    <h1>Hasil Data</h1>
    <ul>
        <?php foreach ($hasil_query as $row): ?>
            <li><?php echo $row->judul_lagu; ?></li> <!-- Ganti nama_kolom_yang_diinginkan dengan nama kolom yang ingin Anda tampilkan -->
        <?php endforeach; ?>
    </ul>
</body>
</html>
