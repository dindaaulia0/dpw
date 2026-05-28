<?php
require_once ('kelas/akunBank.php');

// Akun pertama
$data1 = new akunBank("001", 10000);
$data1->setNama("Mendysia Putri");

echo "<h3>Akun: " . $data1->getAccountNumber() . " - " . $data1->getNama() . "</h3>";

echo "Saldo Awal:<br>";
$data1->tampilUang();

$data1->tambahUang(50000);
echo "Setelah menambah Rp 50.000:<br>";
$data1->tampilUang();

$data1->kurangUang(20000);
echo "Setelah mengurangi Rp 20.000:<br>";
$data1->tampilUang();

$data1->hitungPajak();

echo "<hr>";

// Akun kedua
$data2 = new akunBank("002", 10000);
$data2->setNama("Dinda Aulia");

echo "<h3>Akun: " . $data2->getAccountNumber() . " - " . $data2->getNama() . "</h3>";
$data2->tampilUang();
$data2->tambahUang(100000);
$data2->tampilUang();
$data2->hitungPajak();