<?php

class akunBank
{
    protected $accountNumber;
    protected $jmlUang;
    protected $nama;

    public function __construct($nomorAkun, $nominal)
    {
        $this->accountNumber = $nomorAkun;
        $this->jmlUang = $nominal;
    }

    // Getter dan Setter untuk $nama
    public function getNama()
    {
        return $this->nama;
    }

    public function setNama($nama)
    {
        $this->nama = $nama;
    }

    // Getter untuk nomor akun
    public function getAccountNumber()
    {
        return $this->accountNumber;
    }

    // Menambahkan jumlah uang
    public function tambahUang($jumlah)
    {
        $this->jmlUang += $jumlah;
        echo "Berhasil menambahkan Rp " . number_format($jumlah, 0, ',', '.') . "<br>";
    }

    // Mengurangi jumlah uang
    public function kurangUang($jumlah)
    {
        if ($jumlah > $this->jmlUang) {
            echo "Saldo tidak mencukupi!<br>";
        } else {
            $this->jmlUang -= $jumlah;
            echo "Berhasil mengurangi Rp " . number_format($jumlah, 0, ',', '.') . "<br>";
        }
    }

    // Menampilkan jumlah uang
    public function tampilUang()
    {
        echo "Saldo: Rp " . number_format($this->jmlUang, 0, ',', '.') . "<br>";
    }

    // Menghitung pajak (11% dari saldo)
    public function hitungPajak()
    {
        $pajak = $this->jmlUang * 0.11;
        echo "Pajak (11%): Rp " . number_format($pajak, 0, ',', '.') . "<br>";
        return $pajak;
    }
}