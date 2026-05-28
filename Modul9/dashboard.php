<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <style>
        body { font-family: Arial, sans-serif; max-width: 600px; margin: 80px auto; padding: 20px; background: #f0f2f5; }
        .box { background: white; padding: 30px; border-radius: 10px; box-shadow: 0 2px 8px rgba(0,0,0,0.1); }
        h2 { color: #4CAF50; }
        .logout-btn { background: #f44336; color: white; padding: 8px 20px; text-decoration: none; border-radius: 4px; font-size: 14px; }
        .logout-btn:hover { background: #d32f2f; }
        .info { background: #e8f5e9; padding: 16px; border-radius: 6px; margin: 16px 0; }
    </style>
</head>
<body>
<?php
session_start();

// Cek apakah user sudah login
if (!isset($_SESSION["logged_in"]) || $_SESSION["logged_in"] !== true) {
    header("Location: login.php");
    exit();
}

?>

<div class="box">
    <h2> Dashboard</h2>
    <div class="info">
        <p>Selamat datang, <b><?php echo htmlspecialchars($_SESSION["username"]); ?></b>!</p>
        <p>Anda berhasil login menggunakan <b>Session PHP</b>.</p>
        <p><small>Session ID: <?php echo session_id(); ?></small></p>
    </div>

    <h3> Informasi Session:</h3>
    <ul>
        <li>Username: <b><?php echo htmlspecialchars($_SESSION["username"]); ?></b></li>
        <li>Status: <b>Login</b></li>
        <li>Session aktif selama browser terbuka</li>
    </ul>

    <br>
    <a href="logout.php" class="logout-btn">Logout</a>
    &nbsp;&nbsp;
    <a href="cookies.php"> Lihat Cookies</a>
    &nbsp;&nbsp;
    <a href="json_data.php"> JSON Data</a>
</div>
</body>
</html>
