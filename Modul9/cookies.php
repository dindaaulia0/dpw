<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Cookies - Data Identitas</title>
    <style>
        body { font-family: Arial, sans-serif; max-width: 600px; margin: 60px auto; padding: 20px; background: #f5f5f5; }
        .box { background: white; padding: 30px; border-radius: 10px; box-shadow: 0 2px 8px rgba(0,0,0,0.1); margin-bottom: 20px; }
        h2 { color: #FF9800; border-bottom: 2px solid #FF9800; padding-bottom: 10px; }
        label { display: block; font-weight: bold; margin-bottom: 4px; color: #555; }
        input[type="text"], input[type="email"], input[type="number"] {
            width: 100%; padding: 8px; box-sizing: border-box;
            border: 1px solid #ccc; border-radius: 4px; margin-bottom: 12px;
        }
        input[type="submit"] { background: #FF9800; color: white; padding: 10px 20px; border: none; border-radius: 4px; cursor: pointer; }
        .btn-hapus { background: #f44336; color: white; padding: 10px 20px; border: none; border-radius: 4px; cursor: pointer; }
        .info { background: #fff3e0; border-left: 4px solid #FF9800; padding: 12px; border-radius: 4px; margin-bottom: 16px; font-size: 14px; }
        .success { color: green; font-weight: bold; }
        .cookie-data { background: #f9f9f9; padding: 16px; border-radius: 6px; border: 1px solid #eee; }
        .cookie-data p { margin: 6px 0; }
    </style>
</head>
<body>

<?php
// Durasi cookie: 30 hari
$durasi = time() + (86400 * 30);

// Proses simpan cookies
if (isset($_POST["simpan"])) {
    setcookie("nama",     $_POST["nama"],     $durasi, "/");
    setcookie("nim",      $_POST["nim"],      $durasi, "/");
    setcookie("email",    $_POST["email"],    $durasi, "/");
    setcookie("jurusan",  $_POST["jurusan"],  $durasi, "/");
    setcookie("angkatan", $_POST["angkatan"], $durasi, "/");
    echo "<script>location.reload();</script>"; // reload agar cookie langsung terbaca
}

// Proses hapus cookies
if (isset($_POST["hapus"])) {
    setcookie("nama",     "", time() - 3600, "/");
    setcookie("nim",      "", time() - 3600, "/");
    setcookie("email",    "", time() - 3600, "/");
    setcookie("jurusan",  "", time() - 3600, "/");
    setcookie("angkatan", "", time() - 3600, "/");
    echo "<script>location.reload();</script>";
}
?>

<div class="box">
    <h2> Cookies - Data Identitas</h2>

    <div class="info">
        Cookies digunakan untuk menyimpan data identitas di browser Anda. 
        Data akan tersimpan selama <b>30 hari</b>.
    </div>

    <!-- Tampilkan data dari cookie jika ada -->
    <?php if (isset($_COOKIE["nama"]) && !empty($_COOKIE["nama"])): ?>
    <div class="cookie-data">
        <h3> Data Identitas Tersimpan (dari Cookie):</h3>
        <p><b>Nama:</b> <?php echo htmlspecialchars($_COOKIE["nama"]); ?></p>
        <p><b>NIM:</b> <?php echo htmlspecialchars($_COOKIE["nim"]); ?></p>
        <p><b>Email:</b> <?php echo htmlspecialchars($_COOKIE["email"]); ?></p>
        <p><b>Jurusan:</b> <?php echo htmlspecialchars($_COOKIE["jurusan"]); ?></p>
        <p><b>Angkatan:</b> <?php echo htmlspecialchars($_COOKIE["angkatan"]); ?></p>
        <br>
        <form method="post">
            <button type="submit" name="hapus" class="btn-hapus"> Hapus Cookies</button>
        </form>
    </div>
    <?php else: ?>
    <p><i>Belum ada data cookie tersimpan.</i></p>
    <?php endif; ?>
</div>

<!-- Form Input Data -->
<div class="box">
    <h3> Simpan Data Identitas ke Cookie</h3>
    <form method="post">
        <label>Nama Lengkap:</label>
        <input type="text" name="nama" value="<?php echo isset($_COOKIE['nama']) ? htmlspecialchars($_COOKIE['nama']) : ''; ?>" placeholder="Masukkan nama lengkap">

        <label>NIM:</label>
        <input type="text" name="nim" value="<?php echo isset($_COOKIE['nim']) ? htmlspecialchars($_COOKIE['nim']) : ''; ?>" placeholder="Masukkan NIM">

        <label>Email:</label>
        <input type="email" name="email" value="<?php echo isset($_COOKIE['email']) ? htmlspecialchars($_COOKIE['email']) : ''; ?>" placeholder="Masukkan email">

        <label>Jurusan:</label>
        <input type="text" name="jurusan" value="<?php echo isset($_COOKIE['jurusan']) ? htmlspecialchars($_COOKIE['jurusan']) : ''; ?>" placeholder="Contoh: Teknik Informatika">

        <label>Angkatan:</label>
        <input type="number" name="angkatan" value="<?php echo isset($_COOKIE['angkatan']) ? htmlspecialchars($_COOKIE['angkatan']) : ''; ?>" placeholder="Contoh: 2022">

        <br>
        <input type="submit" name="simpan" value=" Simpan ke Cookie">
    </form>
</div>

</body>
</html>