<?php

class buah2
{
    public $nama;
    public $warna;
    public $bobot;

    function set_name($n)
    {
        $this->nama = $n;
    }

    protected function set_color($n)
    {
        $this->warna = $n;
    }

    private function set_weight($n)
    {
        $this->bobot = $n;
    }
}

/*
 * ANALISIS ERROR:
 * Method protected dan private tidak bisa dipanggil dari luar class
 */

// ===== VERSI PERBAIKAN =====
class buah2Fixed
{
    public $nama;
    public $warna;
    public $bobot;

    public function set_name($n)
    {
        $this->nama = $n;
    }

    public function set_color($n)
    {
        $this->warna = $n;
    }

    public function set_weight($n)
    {
        $this->bobot = $n;
    }

    public function getInfo()
    {
        return "Nama: {$this->nama}, Warna: {$this->warna}, Berat: {$this->bobot}g";
    }
}

$mango2 = new buah2Fixed();
$mango2->set_name('Mango');
$mango2->set_color('Yellow');
$mango2->set_weight('300');

echo $mango2->getInfo();

?>