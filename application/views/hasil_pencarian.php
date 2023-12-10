<!-- application/views/hasil_pencarian.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Hasil Pencarian</title>
</head>
<body>
    <h1>Hasil Pencarian</h1>
    <ul>
        <?php foreach ($hasil_pencarian as $row): ?>
            <li><?php echo $row->judul_lagu; ?></li> <!-- Ganti nama_kolom_pencarian dengan nama kolom yang ingin Anda tampilkan -->
        <?php endforeach; ?>
    </ul>
</body>
</html>
