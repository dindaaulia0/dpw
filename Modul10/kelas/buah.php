<?php

class buah
{
    public $nama;
    protected $warna;
    private $berat;
}

/*
 * ANALISIS ERROR:
 * protected dan private tidak bisa diakses langsung dari luar class
 */

// ===== VERSI PERBAIKAN =====
class buahFixed
{
    public $nama;
    protected $warna;
    private $berat;

    public function setWarna($warna)
    {
        $this->warna = $warna;
    }

    public function setBerat($berat)
    {
        $this->berat = $berat;
    }

    public function getInfo()
    {
        return "Nama: {$this->nama}, Warna: {$this->warna}, Berat: {$this->berat}g";
    }
}

$mango2 = new buahFixed();
$mango2->nama = 'Mango';
$mango2->setWarna('Yellow');
$mango2->setBerat('300');

echo $mango2->getInfo();

?>