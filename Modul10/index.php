<?php
require_once ('kelas/Manusia.php');

// Objek $dinda
$dinda = new Manusia();
$dinda->setNama("Dinda Aulia");

// Objek $mendy
$mendy = new Manusia();
$mendy->setNama("Mendysia Anggita");
$mendy->setUmur(19);

// Tampilkan nama lengkap $mendy
echo "Nama: " . $mendy->getNama();
echo "<br>";

// Tambah dengan identitas sendiri
$saya = new Manusia();
$saya->setNama("Dinda Aulia"); 
$saya->setUmur(21);

echo "Nama Saya: " . $saya->getNama();
echo "<br>";
echo "Umur Saya: " . $saya->getUmur() . " tahun";
echo "<br>";

// Tampilkan NIK
echo "NIK Mendy:" . $mendy->getNIK();
echo "<br>";

/*
 * KESIMPULAN:
 * 1. Class adalah blueprint untuk membuat objek.
 * 2. Properti adalah variabel yang dideklarasikan di dalam class.
 * 3. Method adalah fungsi yang dideklarasikan di dalam class.
 * 4. Access modifier "protected" membuat properti hanya bisa diakses
 *    dari dalam class dan turunannya, tidak bisa diakses dari luar.
 * 5. Access modifier "public" membuat method/properti bisa diakses dari mana saja.
 * 6. Access modifier "private" membuat method/properti hanya bisa diakses
 *    dari dalam class itu sendiri.
 * 7. Getter adalah method untuk membaca nilai properti yang aksesnya dibatasi.
 * 8. Setter adalah method untuk mengubah nilai properti yang aksesnya dibatasi.
 * 9. $this digunakan untuk merujuk ke properti/method milik objek saat ini.
 */