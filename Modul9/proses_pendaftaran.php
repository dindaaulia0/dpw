<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <style>
        body { font-family: Arial, sans-serif; max-width: 600px; margin: 40px auto; padding: 20px; background: #f5f5f5; }
        .result-box { background: white; padding: 20px; border-radius: 8px; border: 1px solid #ddd; }
        h3 { color: #4CAF50; }
        a { color: #4CAF50; }
    </style>
</head>
<body>
    <div class="result-box">
        <?php
        // Proses data dari form pendaftaran (POST)
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            echo "Selamat datang <b>" . htmlspecialchars($_POST["nama"]) . "</b><br>";
            echo "NIM : " . htmlspecialchars($_POST["nim"]) . "<br>";
            echo "Email : " . htmlspecialchars($_POST["email"]) . "<br>";
            echo "Tempat, tanggal Lahir : " . htmlspecialchars($_POST["tempat"]) . " , " . htmlspecialchars($_POST["tanggal_lahir"]) . " ; <br>";
            echo "Alamat : " . htmlspecialchars($_POST["alamat"]) . "<br>";
            echo "Jenis Kelamin : " . htmlspecialchars($_POST["gender"]) . "; <br>";
        } elseif ($_SERVER["REQUEST_METHOD"] == "GET" && !empty($_GET)) {
            // Jika method diubah ke GET
            echo "Selamat datang <b>" . htmlspecialchars($_GET["nama"]) . "</b><br>";
            echo "NIM : " . htmlspecialchars($_GET["nim"]) . "<br>";
            echo "Email : " . htmlspecialchars($_GET["email"]) . "<br>";
            echo "Tempat, tanggal Lahir : " . htmlspecialchars($_GET["tempat"]) . " , " . htmlspecialchars($_GET["tanggal_lahir"]) . " ; <br>";
            echo "Alamat : " . htmlspecialchars($_GET["alamat"]) . "<br>";
            echo "Jenis Kelamin : " . htmlspecialchars($_GET["gender"]) . "; <br>";
        } else {
            echo "<p>Tidak ada data yang dikirim. Silahkan isi <a href='form_pendaftaran.html'>form pendaftaran</a>.</p>";
        }
        ?>
        <br><a href="form_pendaftaran.html">← Kembali ke Form</a>
    </div>
</body>
</html>