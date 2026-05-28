<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Upload File</title>
    <meta name="description" content="Belajar PHP">
    <meta name="keywords" content="{tulis nim anda disini}">
    <meta name="author" content="{tulis nama anda disini}">
    <style>
        body { font-family: Arial, sans-serif; max-width: 500px; margin: 60px auto; padding: 20px; background: #f5f5f5; }
        .box { background: white; padding: 30px; border-radius: 10px; box-shadow: 0 2px 8px rgba(0,0,0,0.1); }
        h2 { color: #333; border-bottom: 2px solid #2196F3; padding-bottom: 10px; }
        input[type="file"] { margin: 10px 0; padding: 8px; border: 1px dashed #ccc; width: 100%; box-sizing: border-box; border-radius: 4px; }
        input[type="submit"] { background: #2196F3; color: white; padding: 10px 20px; border: none; border-radius: 4px; cursor: pointer; font-size: 14px; }
        input[type="submit"]:hover { background: #1976D2; }
        .success { color: green; font-weight: bold; margin-top: 10px; }
        .error { color: red; margin-top: 10px; }
        a { color: #2196F3; }
    </style>
</head>
<body>
<div class="box">
    <h2> Upload Gambar</h2>

    <?php
    // Semua kode pengolahan file hanya dijalankan ketika ada pengiriman data (POST + ada file)
    if (isset($_POST["submit"])) {

        $target_dir  = "gambar/";
        $target_file = $target_dir . basename($_FILES["gambar"]["name"]);
        $uploadOk    = 1;
        $tipeGambar  = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        // Cek apakah file berupa gambar
        if ($_FILES["gambar"]["error"] == 0) {

        $check = getimagesize($_FILES["gambar"]["tmp_name"]);

    if ($check !== false) {
        echo "File berupa citra/gambar - " . $check["mime"] . ".<br>";
        $uploadOk = 1;
    } else {
        echo "<p class='error'>File bukan gambar.</p>";
        $uploadOk = 0;  
    }

    } else {
        echo "<p class='error'>Pilih file terlebih dahulu.</p>";
        $uploadOk = 0;
    }

        // Deteksi apakah ada file dengan nama yang sama
        if (file_exists($target_file)) {
            echo "<p class='error'>Sorry, file already exists.</p>";
            $uploadOk = 0;
        }

        // Check file size (maks 500KB)
        if ($_FILES["gambar"]["size"] > 500000) {
            echo "<p class='error'>Sorry, file anda terlalu besar.</p>";
            $uploadOk = 0;
        }

        // Filter format file yang diizinkan
        if ($tipeGambar != "jpg" && $tipeGambar != "png" && $tipeGambar != "jpeg"
            && $tipeGambar != "gif") {
            echo "<p class='error'>Sorry, hanya file JPG, JPEG, PNG & GIF.</p>";
            $uploadOk = 0;
        }

        // Check apakah $uploadOk telah sesuai dengan kriteria
        if ($uploadOk == 0) {
            echo "<p class='error'>Sorry, File anda gagal upload.</p>";
        } else {
            // Proses upload file
            if (move_uploaded_file($_FILES["gambar"]["tmp_name"], $target_file)) {
                echo "<p class='success'>File " . htmlspecialchars(basename($_FILES["gambar"]["name"])) . " berhasil Upload.</p>";
                echo "<p><a href='galery.php'> Lihat Galeri</a></p>";
            } else {
                echo "<p class='error'>Sorry, Ada eror saat upload.</p>";
            }
        }
    }
    ?>

    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" enctype="multipart/form-data">
        <p><label>Pilih Gambar yang akan di upload: </label><br>
            <input type="file" name="gambar" id="gambar1"></p>
        <input type="submit" value="Upload Image" name="submit">
    </form>

    <br>
    <a href="galery.php"> Lihat Galeri Gambar</a>
</div>
</body>
</html>