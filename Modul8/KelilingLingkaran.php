<?php
// Menghitung keliling lingkaran dengan jari-jari 15 cm
// Rumus: Keliling = 2 * pi * r

$r = 15; // jari-jari dalam cm
$pi = M_PI; // konstanta pi (3.14159...)

$keliling = 2 * $pi * $r;

echo "<h2>Menghitung Keliling Lingkaran</h2>";
echo "<p>Jari-jari (r) = $r cm</p>";
echo "<p>Pi (π) = " . $pi . "</p>";
echo "<p>Keliling = 2 × π × r</p>";
echo "<p>Keliling = 2 × $pi × $r</p>";
echo "<p><strong>Keliling = " . round($keliling, 2) . " cm</strong></p>";
?>