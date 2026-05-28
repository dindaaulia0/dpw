<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <style>
        body { font-family: Arial, sans-serif; max-width: 400px; margin: 80px auto; padding: 20px; background: #f0f2f5; }
        .login-box { background: white; padding: 30px; border-radius: 10px; box-shadow: 0 2px 10px rgba(0,0,0,0.1); }
        h2 { color: #333; text-align: center; margin-bottom: 24px; }
        label { display: block; font-weight: bold; margin-bottom: 4px; color: #555; }
        input[type="text"], input[type="password"] {
            width: 100%; padding: 10px; box-sizing: border-box;
            border: 1px solid #ccc; border-radius: 4px; margin-bottom: 6px; font-size: 14px;
        }
        input[type="submit"] {
            width: 100%; background: #4CAF50; color: white; padding: 10px;
            border: none; border-radius: 4px; cursor: pointer; font-size: 15px; margin-top: 10px;
        }
        input[type="submit"]:hover { background: #45a049; }
        .error { color: red; font-size: 12px; margin-bottom: 8px; }
        .success { color: green; font-size: 14px; text-align: center; margin-top: 10px; font-weight: bold; }
        .alert { background: #ffe0e0; border: 1px solid red; color: red; padding: 10px; border-radius: 4px; margin-bottom: 10px; font-size: 13px; }
    </style>
</head>
<body>
<div class="login-box">
    <h2> Login</h2>

<?php
session_start();

// Fungsi untuk filter pembacaan input
function bersihkan_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

// Data user dummy untuk validasi login
$valid_users = [
    "admin"    => "admin123",
    "mahasiswa" => "mhs2026",
    "dosen"    => "dosen2026",
];

$nameErr = $emailErr = "";
$name    = $email    = "";
$loginMessage = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    try {
        // Periksa setiap variabel input apakah diisi dengan benar
        if (empty($_POST["u"])) {
            $nameErr = "masukkan username";
        } else {
            $name = bersihkan_input($_POST["u"]);
            // Validasi username: hanya huruf, angka, underscore
            if (!preg_match("/^[a-zA-Z0-9_]+$/", $name)) {
                throw new InvalidArgumentException("Username hanya boleh berisi huruf, angka, dan underscore.");
            }
        }

        if (empty($_POST["p"])) {
            $emailErr = "masukkan password";
        } else {
            $email = bersihkan_input($_POST["p"]);
            if (strlen($email) < 6) {
                throw new LengthException("Password minimal 6 karakter.");
            }
        }

        // Proses login jika tidak ada error
        if (empty($nameErr) && empty($emailErr)) {
            if (isset($valid_users[$name]) && $valid_users[$name] === $email) {
                // Simpan session
                $_SESSION["username"] = $name;
                $_SESSION["logged_in"] = true;
                echo "<div class='success'> Login berhasil! Selamat datang, <b>" . htmlspecialchars($name) . "</b>!</div>";
                echo "<br><a href='dashboard.php'>Masuk ke Dashboard →</a>";
            } else {
                throw new RuntimeException("Username atau password salah!");
            }
        }

    } catch (InvalidArgumentException $e) {
        echo "<div class='alert'> Input Error: " . $e->getMessage() . "</div>";
    } catch (LengthException $e) {
        echo "<div class='alert'> Length Error: " . $e->getMessage() . "</div>";
    } catch (RuntimeException $e) {
        echo "<div class='alert'> Login Gagal: " . $e->getMessage() . "</div>";
    } catch (Exception $e) {
        echo "<div class='alert'> Error: " . $e->getMessage() . "</div>";
    }
}
?>

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    <label>Username:</label>
    <input type="text" name="u">
    <span class="error">* <?php echo $nameErr;?></span>
    <br><br>
    <label>Password:</label>
    <input type="password" name="p">
    <span class="error">* <?php echo $emailErr;?></span>
    <br><br>
    <input type="submit" value="Login">
</form>

<br>
<small style="color:#999;">
    <b>Akun demo:</b><br>
    admin / admin123<br>
    mahasiswa / mhs2026<br>
    dosen / dosen2026
</small>

</div>
</body>
</html>