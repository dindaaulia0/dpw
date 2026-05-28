<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Galeri Gambar</title>
    <style>
        body { font-family: Arial, sans-serif; background: #f0f2f5; margin: 0; padding: 20px; }
        h2 { color: #333; text-align: center; margin-bottom: 24px; }
        .gallery {
            display: flex;
            flex-wrap: wrap;
            gap: 16px;
            justify-content: center;
            max-width: 1000px;
            margin: 0 auto;
        }
        .gallery-item {
            background: white;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 2px 8px rgba(0,0,0,0.12);
            width: 200px;
            transition: transform 0.2s;
        }
        .gallery-item:hover { transform: scale(1.04); box-shadow: 0 4px 16px rgba(0,0,0,0.2); }
        .gallery-item img {
            width: 100%;
            height: 160px;
            object-fit: cover;
            display: block;
        }
        .gallery-item p {
            margin: 0;
            padding: 8px;
            font-size: 12px;
            color: #666;
            text-align: center;
            word-break: break-all;
        }
        .empty { text-align: center; color: #999; margin-top: 60px; font-size: 18px; }
        .nav { text-align: center; margin-bottom: 20px; }
        .nav a { background: #2196F3; color: white; padding: 8px 20px; text-decoration: none; border-radius: 4px; font-size: 14px; }
        .nav a:hover { background: #1976D2; }
        .count { text-align: center; color: #888; font-size: 14px; margin-bottom: 16px; }
    </style>
</head>
<body>
    <h2> Galeri Gambar</h2>
    <div class="nav">
        <a href="upload_gambar.php">⬆ Upload Gambar Baru</a>
    </div>

<?php
$fileList = glob('gambar/*');

// Hitung jumlah file gambar
$jumlah = 0;
foreach ($fileList as $filename) {
    if (is_file($filename)) {
        $jumlah++;
    }
}

echo "<div class='count'>Total: $jumlah gambar</div>";

if ($jumlah == 0) {
    echo "<div class='empty'> Belum ada gambar. <a href='upload_gambar.php'>Upload sekarang</a></div>";
} else {
    echo "<div class='gallery'>";
    foreach ($fileList as $filename) {
        if (is_file($filename)) {
            $namaFile = basename($filename);
            echo "<div class='gallery-item'>";
            echo "<img src='" . htmlspecialchars($filename) . "' alt='" . htmlspecialchars($namaFile) . "'>";
            echo "<p>" . htmlspecialchars($namaFile) . "</p>";
            echo "</div>";
        }
    }
    echo "</div>";
}
?>
</body>
</html>