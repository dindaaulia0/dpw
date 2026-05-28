<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <style>
        body { font-family: Arial, sans-serif; max-width: 600px; margin: 40px auto; padding: 20px; background: #f5f5f5; }
        form { background: white; padding: 20px; border-radius: 8px; border: 1px solid #ddd; }
        label { display: block; font-weight: bold; margin-bottom: 4px; color: #555; }
        input[type="text"], input[type="email"], textarea {
            width: 100%; padding: 8px; box-sizing: border-box;
            border: 1px solid #ccc; border-radius: 4px; margin-bottom: 12px;
        }
        input[type="submit"] { background: #4CAF50; color: white; padding: 8px 20px; border: none; border-radius: 4px; cursor: pointer; }
        input[type="reset"] { background: #f44336; color: white; padding: 8px 20px; border: none; border-radius: 4px; cursor: pointer; margin-left: 8px; }
        .output { background: white; padding: 20px; border-radius: 8px; border: 1px solid #ddd; margin-top: 20px; }
        h3 { color: #333; }
    </style>
</head>
<body>

<?php
// Fungsi untuk membersihkan / filter input dari XSS
function bersihkan_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

$name = $email = $comment = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Gunakan fungsi filter untuk mengamankan pembacaan input
    $name    = bersihkan_input($_POST["name"]);
    $email   = bersihkan_input($_POST["email"]);
    $comment = bersihkan_input($_POST["comment"]);

    echo "<div class='output'>";
    echo "<h3>Hasil Komentar:</h3>";
    echo "Nama :" . $name . "<br>";
    echo "Email :" . $email . "<br>";
    echo "Komentar :" . $comment . "<br>";
    echo "<hr>";
    echo "</div>";
}
?>

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    <h3>Form Komentar</h3>
    <label>Nama:</label>
    <input type="text" name="name"><br>
    <label>E-mail:</label>
    <input type="email" name="email"><br>
    <label>Komentar:</label>
    <textarea name="comment" rows="5" cols="40"></textarea><br>
    <input type="submit" value="simpan">
    <input type="reset" value="bersihkan">
</form>

</body>
</html>