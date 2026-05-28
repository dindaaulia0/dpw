<?php
require_once ('kelas/Mahasiswa.php');

$mhs1 = new mahasiswa("Dinda Aulia"); 
$mhs1->setNIM("253307011");          
$mhs1->setKelas("TI 2A");     
$mhs1->setJurusan("Teknologi Informasi");
$mhs1->setUmur(18);

// Tampilkan nama, nim dan kelas dari $mhs1
echo "Nama    : " . $mhs1->getNama() . "<br>";
echo "NIM     : " . $mhs1->getNim() . "<br>";
echo "Kelas   : " . $mhs1->getKelas() . "<br>";
echo "Jurusan : " . $mhs1->getJurusan() . "<br>";
echo "Umur    : " . $mhs1->getUmur() . " tahun<br>";
echo "NIK     : " . $mhs1->getNIK() . "<br>";