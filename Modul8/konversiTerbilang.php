<?php
// Konversi angka 1-9 menjadi huruf menggunakan switch

$angka = 5; 

echo "<h2>Konversi Angka ke Terbilang</h2>";
echo "<p>Angka: $angka</p>";

switch ($angka) {
    case 1:
        echo "<p><strong>Terbilang: satu</strong></p>";
        break;
    case 2:
        echo "<p><strong>Terbilang: dua</strong></p>";
        break;
    case 3:
        echo "<p><strong>Terbilang: tiga</strong></p>";
        break;
    case 4:
        echo "<p><strong>Terbilang: empat</strong></p>";
        break;
    case 5:
        echo "<p><strong>Terbilang: lima</strong></p>";
        break;
    case 6:
        echo "<p><strong>Terbilang: enam</strong></p>";
        break;
    case 7:
        echo "<p><strong>Terbilang: tujuh</strong></p>";
        break;
    case 8:
        echo "<p><strong>Terbilang: delapan</strong></p>";
        break;
    case 9:
        echo "<p><strong>Terbilang: sembilan</strong></p>";
        break;
    default:
        echo "<p><strong>Angka tidak dalam rentang 1-9</strong></p>";
}

// Demo semua angka 1-9
echo "<br><h3>Demo semua angka 1-9:</h3>";
for ($i = 1; $i <= 9; $i++) {
    switch ($i) {
        case 1: $kata = "satu"; break;
        case 2: $kata = "dua"; break;
        case 3: $kata = "tiga"; break;
        case 4: $kata = "empat"; break;
        case 5: $kata = "lima"; break;
        case 6: $kata = "enam"; break;
        case 7: $kata = "tujuh"; break;
        case 8: $kata = "delapan"; break;
        case 9: $kata = "sembilan"; break;
    }
    echo "$i = $kata<br>";
}
?>