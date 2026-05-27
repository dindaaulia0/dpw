<?php
/* Huruf  Nilai
   C    = 0  -> 59
   BC   = 60 -> 69
   B    = 70 -> 79
   AB   = 80 -> 89
   A    = 90 -> 100
*/

// Nilai yang akan dikonversi 
$nilai = 85;

echo "<h2>Konversi Nilai Angka ke Huruf</h2>";
echo "<p>Nilai angka: $nilai</p>";

if ($nilai >= 90 && $nilai <= 100) {
    $huruf = "A";
} elseif ($nilai >= 80 && $nilai < 90) {
    $huruf = "AB";
} elseif ($nilai >= 70 && $nilai < 80) {
    $huruf = "B";
} elseif ($nilai >= 60 && $nilai < 70) {
    $huruf = "BC";
} elseif ($nilai >= 0 && $nilai < 60) {
    $huruf = "C";
} else {
    $huruf = "Nilai tidak valid";
}

echo "<p><strong>Nilai huruf: $huruf</strong></p>";

// Tampilkan semua range untuk referensi
echo "<br><h3>Tabel Konversi Nilai:</h3>";
echo "<table border='1' cellpadding='8'>";
echo "<tr><th>Huruf</th><th>Rentang Nilai</th></tr>";
echo "<tr><td>A</td><td>90 - 100</td></tr>";
echo "<tr><td>AB</td><td>80 - 89</td></tr>";
echo "<tr><td>B</td><td>70 - 79</td></tr>";
echo "<tr><td>BC</td><td>60 - 69</td></tr>";
echo "<tr><td>C</td><td>0 - 59</td></tr>";
echo "</table>";
?>