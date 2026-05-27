<?php
$x = 5;
$y = 10;

//Arithmetic operators
echo "Penambahan " . $x + $y . "<br>";
echo "Pengurangan " . $x - $y . "<br>";
echo "Perkalian " . $x * $y . "<br>";
echo "Pembagian " . $x / $y . "<br>";
echo "Modulus " . $x % $y . "<br>";
echo "Exponensial " . $x ** $y . "<br>";
echo("<br>");

//Assignment operators
$x += 2; //  $x = $x + 2
$y *= 2; //  $y = $y * 2
echo "Penambahan x " . $x . "<br>";
echo "Perkalian y " . $y . "<br>";
echo("<br>");

//Increment/Decrement operators
echo "Isi ++x = " . ++$x . "<br>";
echo "Isi x++ = " . $x++ . "<br>";
echo "Isi x = " . $x . "<br>";
echo("<br>");

echo "Isi --y = " . --$y . "<br>";
echo "Isi y-- = " . $y-- . "<br>";
echo "Isi y = " . $y . "<br>";
echo("<br>");

//Conditional assignment operators
$user = "Andi darmawan";
// <kondisi> ? <nilai_jika_kondisi_true> : <nilai_jika_kondisi_false>
$status = (empty($user)) ? "Kosong" : "Ada isi";
echo $status . "<br>";
// variable $color diisi dengan "red" jika $color tidak ada atau null
echo $color = $color ?? "red";

?>

<!--
Jawaban: Perbedaan $x++ dan ++$x

$x++ adalah POST-INCREMENT:
- Nilai $x digunakan/ditampilkan TERLEBIH DAHULU, KEMUDIAN baru dinaikkan 1.
- Contoh: jika $x = 7, maka echo $x++ menampilkan 7, lalu $x menjadi 8.

++$x adalah PRE-INCREMENT:
- Nilai $x dinaikkan 1 TERLEBIH DAHULU, KEMUDIAN baru digunakan/ditampilkan.
- Contoh: jika $x = 7, maka echo ++$x menampilkan 8, dan $x menjadi 8.
-->