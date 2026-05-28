<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>JSON Data - Nama & Umur</title>
    <style>
        body { font-family: Arial, sans-serif; max-width: 800px; margin: 40px auto; padding: 20px; background: #f5f5f5; }
        h2 { color: #9C27B0; border-bottom: 2px solid #9C27B0; padding-bottom: 10px; }
        .box { background: white; padding: 24px; border-radius: 10px; box-shadow: 0 2px 8px rgba(0,0,0,0.1); margin-bottom: 20px; }
        pre { background: #1e1e1e; color: #d4d4d4; padding: 20px; border-radius: 8px; overflow-x: auto; font-size: 13px; line-height: 1.6; }
        table { width: 100%; border-collapse: collapse; }
        th { background: #9C27B0; color: white; padding: 10px 16px; text-align: left; }
        td { padding: 10px 16px; border-bottom: 1px solid #eee; }
        tr:hover td { background: #f3e5f5; }
        .badge { display: inline-block; background: #9C27B0; color: white; border-radius: 12px; padding: 2px 10px; font-size: 12px; }
        h3 { color: #555; margin-top: 0; }
    </style>
</head>
<body>
    <h2> JSON Data - Nama & Umur</h2>

<?php

$mahasiswa = [
    ["nama" => "Dinda Aulia",     "umur" => 18],
    ["nama" => "Mendysia Putri",     "umur" => 19],
    ["nama" => "Reva Andinta",       "umur" => 19],
    ["nama" => "Ummi Fatikhkhurrohmah",     "umur" => 18],
    ["nama" => "Michelle Milanelo",     "umur" => 19],
    ["nama" => "Putri Marta",      "umur" => 21],
    ["nama" => "Gilang Ramadhan",  "umur" => 23],
    ["nama" => "Wisnu Pratama",      "umur" => 19],
    ["nama" => "Saputra Farid",    "umur" => 20],
    ["nama" => "Ferdinand Andreas",   "umur" => 22],
    ["nama" => "Farhan Maulana",     "umur" => 21],
    ["nama" => "Aditya Firmansyah",     "umur" => 20],
    ["nama" => "Muhamad Ridwan",   "umur" => 19],
    ["nama" => "Nita Anggraeni",   "umur" => 21],
    ["nama" => "Oki Firmansyah",   "umur" => 20],
];

$json_output = json_encode($mahasiswa, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);

$data_dari_json = json_decode($json_output, true);
?>

<!-- Tabel Data -->
<div class="box">
    <h3> Tabel Data Mahasiswa (<?php echo count($mahasiswa); ?> data)</h3>
    <table>
        <tr>
            <th>#</th>
            <th>Nama</th>
            <th>Umur</th>
        </tr>
        <?php foreach ($data_dari_json as $i => $mhs): ?>
        <tr>
            <td><?php echo $i + 1; ?></td>
            <td><?php echo htmlspecialchars($mhs["nama"]); ?></td>
            <td><span class="badge"><?php echo $mhs["umur"]; ?> tahun</span></td>
        </tr>
        <?php endforeach; ?>
    </table>
</div>

<!-- Output JSON -->
<div class="box">
    <h3> Hasil Konversi ke JSON (json_encode):</h3>
    <pre><?php echo htmlspecialchars($json_output); ?></pre>
</div>

<!-- Info fungsi JSON -->
<div class="box">
    <h3> Fungsi JSON yang Digunakan:</h3>
    <ul>
        <li><code>json_encode($array)</code> → Mengubah array PHP menjadi string JSON</li>
        <li><code>json_decode($json, true)</code> → Mengubah string JSON kembali menjadi array PHP</li>
        <li><code>JSON_PRETTY_PRINT</code> → Format JSON agar rapi/mudah dibaca</li>
        <li><code>JSON_UNESCAPED_UNICODE</code> → Agar karakter unicode tidak di-escape</li>
    </ul>
</div>

</body>
</html>